<?php

namespace App\Http\Livewire\Admin\Agent;

use Carbon\Carbon;
use App\Models\Agent;
use App\Models\Diplome;
use Livewire\Component;
use App\Models\CentreImpot;
use App\Models\Departement;
use App\Models\TypeContrat;
use Livewire\WithFileUploads;
use App\Models\FeuilleCalcule;

class Edit extends Component
{
    public $agent;

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
    public $showInputs = true;
    public $showInputsCQ = false;

    // Formation
    public $schools = [
        ['name' => '', 'cycle' => '', 'diplome' => '', 'year' => ''],
    ];

    public function mount()
    {
        $this->agent_id = $this->agent->id;
        $this->prenom = $this->agent->prenom;
        $this->nom = $this->agent->nom;
        $this->email = $this->agent->email;
        $this->jour = $this->agent->jour;
        $this->mois = $this->agent->mois;
        $this->annee = $this->agent->annee;
        $this->age = $this->agent->age;
        $this->telephone = $this->agent->telephone;
        $this->departement_id = $this->agent->departement_id;
        $this->poste_id = $this->agent->poste_id;
        $this->sexe = $this->agent->sexe;
        if ($this->agent->contrat) {
            $contrat = $this->agent->contrat;

            $this->type_contrat_id = $contrat->type_contrat_id;
            $this->date_entre = $contrat->date_creation;
            $this->date_fin = $contrat->date_fin;
            $this->diplome_id = $contrat->diplome_id;
            $this->montantCategorie = $contrat->salaire;
            $this->selectedOption = $contrat->situation_matrimoniale;
            $this->date_mariage = $contrat->date_mariage;
            $this->nombre_enfant = $contrat->nombre_enfant;
            $this->centre_impot_id = $contrat->centre_impot_id;
            $this->feuille_calcule_id = $contrat->feuille_calcule_id;
            $contratRubriques = $contrat->contratRubriques;
            foreach ($contratRubriques as $contratRubrique) {
                $this->montant[$contratRubrique->rubrique_id] = $contratRubrique->montant;
            }
        }
    }


    protected function rules()
    {
        return [
            'prenom' => 'required|string',
            'nom' => 'required|string',
            'jour' => 'required',
            'mois' => 'required',
            'annee' => 'required',
            'age' => 'required|integer',
            'email' => 'required|email',
            'telephone' => 'required|integer|min:8',
            'departement_id' => 'required|integer',
            'poste_id' => 'required|integer',
            'sexe' => 'required|string',
            // 'photo' => 'image|max:1024',
            // Contrat
            'type_contrat_id' => 'required|integer',
            'centre_impot_id' => 'required|integer',
            'diplome_id' => 'required|integer',
            'feuille_calcule_id' => 'required|integer',
            'date_entre' => 'required|date',
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
        if ($this->showInputsCQ == TRUE) {
            $this->montantCategorie = $diplome->classification->montant;
        } else {
            $this->montantCategorie = 0;
        }
    }

    public function changeType()
    {
        if ($this->type_contrat_id == 2) {
            $this->showInputs = True;
            $this->showInputsCQ = False;
        } else if ($this->type_contrat_id == 3) {
            $this->showInputsCQ = True;
            $this->showInputs = False;
        } else {
            $this->showInputs = False;
            $this->showInputsCQ = False;
        } // Vérifiez si l'ID est 2 pour le type CDD
    }

    // Formation


    public function addSchool()
    {
        $this->schools[] = ['name' => '', 'cycle' => '', 'diplome' => '', 'year' => ''];
        $this->emit('tabChanged', 'emp_formation'); // Émettre un événement pour changer l'onglet actif
    }


    public function removeSchool($index)
    {
        unset($this->schools[$index]);
        $this->schools = array_values($this->schools);
        $this->emit('tabChanged', 'emp_formation');
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

    public function UpdateEmploye()
    {
        $validatedData = $this->validate();

        try {
            // Récupérer l'agent existant
            $agent = Agent::find($this->agent_id);

            // Mettre à jour les informations de base de l'agent
            $agent->prenom = $validatedData['prenom'];
            $agent->nom = $validatedData['nom'];
            $agent->email = $validatedData['email'];
            $agent->jour = $validatedData['jour'];
            $agent->mois = $validatedData['mois'];
            $agent->annee = $validatedData['annee'];
            $agent->age = $this->age;
            $agent->telephone = $validatedData['telephone'];
            $agent->departement_id = $validatedData['departement_id'];
            $agent->poste_id = $validatedData['poste_id'];
            $agent->sexe = $validatedData['sexe'];
            $agent->save();
            // Mettre à jour le contrat lié à l'agent
            $contrat = $agent->contrat;
            $contrat->date_creation = $validatedData['date_entre'];
            $contrat->situation_matrimoniale = $this->selectedOption;
            $contrat->date_mariage = $this->date_mariage;
            $contrat->nombre_enfant = $this->nombre_enfant;
            $contrat->salaire = $this->montantCategorie;
            if($validatedData['type_contrat_id'] == 1)
            {
                $contrat->date_fin = NULL;
            }else{
                $contrat->date_fin = $this->date_fin;
            }
            $contrat->type_contrat_id = $validatedData['type_contrat_id'];
            $contrat->centre_impot_id = $validatedData['centre_impot_id'];
            $contrat->feuille_calcule_id = $validatedData['feuille_calcule_id'];
            $contrat->diplome_id = $validatedData['diplome_id'];
            $contrat->save();

            // Mettre à jour les rubriques du contrat
            foreach ($this->rubriques as $rubrique) {
                $contratRubrique = $contrat->contratRubriques->firstWhere('rubrique_id', $rubrique->id);
                if ($contratRubrique) {
                    $contratRubrique->contrat_id = $contrat->id;
                    $contratRubrique->rubrique_id = $rubrique->id;
                    $contratRubrique->montant = $this->montant[$rubrique->id];
                    $contratRubrique->save();
                }
            }

            // Réinitialisez les données après la mise à jour
            $this->reset();

            toastr()->success('Message', 'Opération effectuée avec succès');
            return redirect('admin/agents');
        } catch (\Throwable $th) {
            // Gérer les erreurs
            toastr()->error('Erreur', $th);
            return redirect()->back();
        }
    }


    public function render()
    {
        $this->agents = Agent::get();
        $this->departements = Departement::get();
        $this->diplomes = Diplome::get();
        $this->typeContrats = TypeContrat::limit(2)->get();
        $this->centreImpots = CentreImpot::get();
        $this->feuilles = FeuilleCalcule::get();
        return view('livewire.admin.agent.edit');
    }
}
