<?php

namespace App\Http\Livewire\Admin\Agent;

use Carbon\Carbon;
use App\Models\Agent;
use App\Models\Poste;
use App\Models\Agence;
use App\Models\Contrat;
use App\Models\Diplome;
use Livewire\Component;
use App\Models\Exercice;
use App\Models\Education;
use App\Mail\WelcomeAgent;
use App\Models\Affectation;
use App\Models\CentreImpot;
use App\Models\Departement;
use App\Models\TypeContrat;
use Livewire\WithFileUploads;
use App\Models\FeuilleCalcule;
use App\Models\ContratRubrique;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class Create extends Component
{
    use WithFileUploads;
    public $agents, $departements, $postes = [], $diplomes;
    public $prenom, $nom, $age, $email, $sexe, $telephone, $departement_id, $poste_id;
    public $jour, $mois, $annee, $nombre;
    public $agent_id;
    public $photo;

    // Contrat
    public $selectedOption;

    public $options = [
        'Marie' => 'text',
        'Divorce' => 'text',
        'Veuf' => 'text',
        'Célibataire' => 'hidden',
    ];
    public $typeContrats, $centreImpots, $feuilles; // Variable pour stocker le montant de la catégorie sélectionnée
    public $montantCategorie;
    public $type_contrat_id, $diplome_id, $date_entre, $date_mariage,
        $date_divorce, $date_veuve,
        $nombre_enfant, $nombre_femme, $centre_impot_id, $feuille_calcule_id,
        $prefix, $compte, $date_fin;
    public $classifications;
    public $rubriques = [];
    public $montant = [];
    public $sexeAgent;
    public $showInputs = false;
    public $showInputsCQ = false;
    public $agences;
    public $agence_id;
    public $date_debut;
    protected function rules()
    {
        return [
            'prenom' => 'required|string|min:3',
            'nom' => 'required|string|min:2',
            'jour' => 'required',
            'mois' => 'required',
            'annee' => 'required',
            'age' => 'required|integer',
            'email' => 'required|email|unique:agents',
            'telephone' => 'required|integer|min:8',
            'agence_id' => 'required|integer',
            'departement_id' => 'required|integer',
            'poste_id' => 'required|integer',
            'sexe' => 'required|string',
            'photo' => 'image|max:1024',
            // Contrat
            'type_contrat_id' => 'required|integer',
            'centre_impot_id' => 'required|integer',
            'diplome_id' => 'required|integer',
            'feuille_calcule_id' => 'required|integer',
            'date_entre' => 'required|date',
            'date_debut' => 'required|date',
            'selectedOption' => 'required|string',
        ];
    }

    // Contrat
    public function getRubriques()
    {
        $feuilleCalcule = FeuilleCalcule::find($this->feuille_calcule_id);
        //dd($feuilleCalcule);
        // Vérifier si la feuille de calcul existe
        if ($feuilleCalcule) {
            // Récupérer les rubriques liées à la feuille via la table de liaison feuille_rubrique
            $this->rubriques = $feuilleCalcule->rubriques ?? [];
        } else {
            $this->rubriques = [];
        }
    }

    public function getSexe()
    {
        $Agent = Agent::find($this->agent_id);
        if ($Agent) {
            $this->sexeAgent = $Agent->sexe;
        }
    }

    public function updateMontant()
    {
        $diplome = Diplome::find($this->diplome_id);
        $this->montantCategorie = $diplome->classification->montant;
    }

    public function changeType()
    {
        $this->showInputs = $this->type_contrat_id == 2;
        $this->showInputsCQ = $this->type_contrat_id == 3;
    }


    public function updated($champs)
    {
        $this->validateOnly($champs);
    }

    public function updatedAnnee()
    {
        if (!empty($this->annee)) {
            $currentYear = date('Y');
            $this->age = $currentYear - $this->annee;
        }
    }


    public function updatedDepartementId($value)
    {
        $departement = Departement::find($value);
        $this->postes = $departement ? $departement->postes : [];
    }

    function genererMotDePasse($longueur = 12)
    {
        $caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()';
        $motDePasse = '';

        for ($i = 0; $i < $longueur; $i++) {
            $motDePasse .= $caracteres[random_int(0, strlen($caracteres) - 1)];
        }

        return $motDePasse;
    }

    public function saveEmploye()
    {
        $validatedData = $this->validate();

        try {
            $poste = Poste::find($validatedData['poste_id']);

            // Si le poste est responsable
            if ($poste->is_responsable) {
                $existingAgent = Agent::where('departement_id', $validatedData['departement_id'])
                    ->where('poste_id', $validatedData['poste_id'])
                    ->first();

                if ($existingAgent) {
                    toastr()->error('Il ne peut y avoir qu\'un seul agent pour ce poste de responsable dans ce département.');
                    return;
                }
            }

            // Création de l'agent
            $exerciceActive = Exercice::where('status','0')->first();
            $agent = new Agent();
            $agent->matricule = '00000';
            $agent->prenom = $validatedData['prenom'];
            $agent->nom = $validatedData['nom'];
            $agent->email = $validatedData['email'];
            $agent->jour = $validatedData['jour'];
            $agent->mois = $validatedData['mois'];
            $agent->annee = $validatedData['annee'];
            $agent->age = $this->age;
            $agent->telephone = $validatedData['telephone'];
            $password = $this->genererMotDePasse();
            $agent->password = Hash::make($password);
            $agent->agence_id = $validatedData['agence_id'];
            $agent->departement_id = $validatedData['departement_id'];
            $agent->poste_id = $validatedData['poste_id'];
            $agent->exercice_id = $exerciceActive->id;
            $agent->sexe = $validatedData['sexe'];

            // Gestion de la photo
            $imageName = Carbon::now()->timestamp . '.' . $this->photo->extension();
            $this->photo->storeAs('admin/agent/', $imageName);
            $agent->photo = $imageName;
            $agent->save();

            // Mise à jour du matricule
            $matricule = 'MA-' . str_pad($agent->id, 3, '0', STR_PAD_LEFT);
            $agent->matricule = $matricule;
            $agent->save();

            //Envoi d'un email de bienvenue avec les identifiants
            $data = [
                'nom' => $agent->nom,
                'prenom' => $agent->prenom,
                'email' => $agent->email,
                'password' => $password,  // Envoyer le mot de passe en clair par email (attention à la sécurité)
            ];

            Mail::to($agent->email)->queue(new WelcomeAgent($data));

            // Création de l'affectation
            $affectation = new Affectation();
            $affectation->agent_id = $agent->id;
            $affectation->agence_id = $validatedData['agence_id'];
            $affectation->departement_id = $validatedData['departement_id'];
            $affectation->poste_id = $validatedData['poste_id'];
            $affectation->date_debut = $validatedData['date_debut'];
            $affectation->save();

            // Création du contrat
            $contrat = new Contrat;
            $contrat->numero = '0000';
            $contrat->date_creation = $validatedData['date_entre'];
            $contrat->date_fin = $this->date_fin;
            $contrat->situation_matrimoniale = $this->selectedOption;
            $contrat->date_mariage = $this->date_mariage;
            $contrat->date_voeuf = $this->date_veuve;
            $contrat->date_divorce = $this->date_divorce;
            $contrat->nombre_enfant = $this->nombre_enfant;
            $contrat->salaire = $this->montantCategorie;
            $contrat->nombre_jour_conge = 0;
            $contrat->agent_id = $agent->id;
            $contrat->type_contrat_id = $validatedData['type_contrat_id'];
            $contrat->centre_impot_id = $validatedData['centre_impot_id'];
            $contrat->feuille_calcule_id = $validatedData['feuille_calcule_id'];
            $contrat->diplome_id = $validatedData['diplome_id'];
            $contrat->save();
            $numero = 'CR-' . str_pad($contrat->id, 5, '0', STR_PAD_LEFT);
            $contrat->numero = $numero;
            $contrat->save();

            // Création des rubriques du contrat
            foreach ($this->rubriques as $rubrique) {
                $contratRubrique = new ContratRubrique();
                $contratRubrique->contrat_id = $contrat->id;
                $contratRubrique->rubrique_id = $rubrique->id;
                $contratRubrique->montant = $this->montant[$rubrique->id];
                $contratRubrique->save();
            }

            session()->flash('success', 'Opération effectuée avec succès');
            return redirect('admin/agents');
        } catch (\Throwable $th) {
            toastr()->error('Erreur : ' . $th->getMessage());
            return redirect()->back();
        }
    }

    public function render()
    {
        $this->agents = Agent::get();
        $this->departements = Departement::get();
        $this->diplomes = Diplome::get();
        $this->typeContrats = TypeContrat::limit(3)->get();
        $this->centreImpots = CentreImpot::get();
        $this->feuilles = FeuilleCalcule::get();
        $this->agences = Agence::get();
        return view('livewire.admin.agent.create');
    }
}
