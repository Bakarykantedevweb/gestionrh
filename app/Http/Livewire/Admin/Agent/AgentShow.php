<?php

namespace App\Http\Livewire\Admin\Agent;

use Carbon\Carbon;
use App\Models\Agent;
use App\Models\Poste;
use App\Models\Agence;
use App\Models\Contrat;
use App\Models\Diplome;
use Livewire\Component;
use App\Mail\WelcomeAgent;
use App\Models\Affectation;
use App\Models\CentreImpot;
use App\Models\Departement;
use App\Models\TypeContrat;
use Livewire\WithFileUploads;
use App\Models\FeuilleCalcule;
use App\Models\ContratRubrique;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AgentShow extends Component
{
    use WithFileUploads;
    public $agents, $departements, $postes = [], $diplomes;
    public $prenom, $nom, $age, $email, $sexe, $telephone, $departement_id, $poste_id;
    public $search = '';
    public $jour, $mois, $annee, $nombre;
    public $agent_id;
    public $classification_id, $diplome_id, $profile, $photo;

    // Contrat
    public $typeContrats, $centreImpots, $feuilles; // Variable pour stocker le montant de la catégorie sélectionnée
    public $montantCategorie;
    public $type_contrat_id, $date_entre, $date_mariage,
        $date_divorce, $date_veuve,
        $nombre_enfant, $nombre_femme, $centre_impot_id, $feuille_calcule_id,
        $prefix, $compte, $date_fin;
    public $classifications;
    public $rubriques = [];
    public $montant = [];
    public $sexeAgent;
    public $showInputs = false;
    public $showInputsAgence = false;
    public $selectedOption;
    public $agences;
    public $detailAgent;

    public $agentListes = true;
    public $agentEdit = false;
    public $agence_id;
    public $date_debut;

    public $options = [
        'Marie' => 'text',
        'Divorce' => 'text',
        'Veuf' => 'text',
        'Célibataire' => 'hidden',
    ];

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

            // 'agence_id' => 'required|integer',
            // 'date_debut' => 'required'
        ];
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

    public function changeTypeAgence()
    {
        $this->showInputsAgence = $this->agence_id == 1; // Vérifiez si l'ID est 2 pour le type CDD
    }

    public function updatedDiplomeId($value)
    {
        $diplome = Diplome::find($value);
        $this->classification_id = $diplome ? $diplome->classification->nom : null;
    }

    public function updatedDepartementId($value)
    {
        $departement = Departement::find($value);
        $this->postes = $departement ? $departement->postes : [];
    }


    public function changeType()
    {
        $this->showInputs = $this->type_contrat_id == 2; // Vérifiez si l'ID est 2 pour le type CDD
    }

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

    public function updateMontant()
    {
        $diplome = Diplome::find($this->diplome_id);
        $this->montantCategorie = $diplome->classification->montant;
    }

    public function editAgent($id)
    {
        $agent = Agent::find($id);

        if ($agent) {
            $this->agent_id = $agent->id;
            $this->prenom = $agent->prenom;
            $this->nom = $agent->nom;
            $this->email = $agent->email;
            $this->jour = $agent->jour;
            $this->mois = $agent->mois;
            $this->annee = $agent->annee;
            $this->age = $agent->age;
            $this->telephone = $agent->telephone;
            $this->departement_id = $agent->departement_id;

            if ($this->departement_id) {
                $this->poste_id = $agent->poste_id;
            }

            $this->sexe = $agent->sexe;

            if ($agent->contrat) {
                $contrat = $agent->contrat;

                // Vérification avant d'affecter les valeurs
                $this->type_contrat_id = $contrat->type_contrat_id ?? null;
                $this->date_entre = $contrat->date_creation ?? null;
                $this->date_fin = $contrat->date_fin ?? null;
                $this->diplome_id = $contrat->diplome_id ?? null;
                $this->montantCategorie = $contrat->salaire ?? null;
                $this->selectedOption = $contrat->situation_matrimoniale ?? null;
                $this->date_mariage = $contrat->date_mariage ?? null;
                $this->nombre_enfant = $contrat->nombre_enfant ?? null;
                $this->centre_impot_id = $contrat->centre_impot_id ?? null;
                $this->feuille_calcule_id = $contrat->feuille_calcule_id ?? null;

                if ($this->feuille_calcule_id) {
                    $contratRubriques = $contrat->contratRubriques;

                    foreach ($contratRubriques as $contratRubrique) {
                        // Vérification avant d'affecter les valeurs
                        $this->montant[$contratRubrique->rubrique_id] = $contratRubrique->montant ?? null;
                    }
                }
            }

            $this->agentEdit = true;
            $this->agentListes = false;
        }
    }

    public function UpdateEmploye()
    {
        $validatedData = $this->validate();
        try {

            // dd($this->agent_id);
            $agent = Agent::find($this->agent_id);
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
            $agent->password = Hash::make('password');
            $agent->save();
            if ($agent) {
                $contrat = $agent->contrat;
                $contrat->date_creation = $validatedData['date_entre'];
                if ($validatedData['type_contrat_id'] == 1) {
                    $contrat->date_fin = NULL;
                } else {
                    $contrat->date_fin = $this->date_fin;
                }
                $contrat->situation_matrimoniale = $this->selectedOption;
                $contrat->date_mariage = $this->date_mariage;
                $contrat->nombre_enfant = $this->nombre_enfant;
                $contrat->salaire = $this->montantCategorie;
                $contrat->nombre_jour_conge = 0;
                $contrat->agent_id = $agent->id;
                $contrat->type_contrat_id = $validatedData['type_contrat_id'];
                $contrat->centre_impot_id = $validatedData['centre_impot_id'];
                $contrat->feuille_calcule_id = $validatedData['feuille_calcule_id'];
                $contrat->diplome_id = $validatedData['diplome_id'];
                $contrat->save();
                foreach ($this->rubriques as $rubrique) {
                    $contratRubrique = ContratRubrique::firstOrNew([
                        'contrat_id' => $contrat->id,
                        'rubrique_id' => $rubrique->id,
                    ]);

                    $contratRubrique->montant = $this->montant[$rubrique->id];
                    $contratRubrique->save();
                }

            }
            toastr()->success('message', 'Operation effectue avec Success');
            return redirect('admin/agents');
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        } catch (\Throwable $th) {
            //throw $th;
            toastr()->error('error', $th);
            return redirect('admin/agents');
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        }
    }

    public function affectation($id)
    {
        $this->detailAgent = Agent::find($id);
    }

    public function SaveAffectation()
    {
        // dd($this->agence_id);
        $validatedData = $this->validate([
            'departement_id' => 'nullable',
            'poste_id' => 'nullable',
        ]);

        try {
            $existingAffectation = Affectation::where('agent_id', $this->detailAgent->id)
                ->where('agence_id', $validatedData['agence_id'])
                ->where('departement_id', $validatedData['departement_id'])
                ->where('poste_id', $validatedData['poste_id'])
                ->where(function ($query) use ($validatedData) {
                    $query->where('date_debut', '<=', $validatedData['date_debut'])
                    ->where('date_fin', '>=', $validatedData['date_debut']);
                })
                ->first();

            if ($existingAffectation) {
                toastr()->error("Cet agent est déjà affecté à la même agence, département, poste avec une date de début qui chevauche.");
                return redirect('admin/agents');
            }

            $affectation = new Affectation();
            $affectation->agent_id = $this->detailAgent->id;
            $affectation->agence_id = $validatedData['agence_id'];
            $affectation->departement_id = $validatedData['departement_id'];
            $affectation->poste_id = $validatedData['poste_id'];
            $affectation->date_debut = $validatedData['date_debut'];
            $affectation->date_fin = $validatedData['date_fin'];
            $affectation->save();

            toastr()->success("L'affectation de l'agent a été effectuée avec succès");
            return redirect('admin/agents');
        } catch (\Throwable $th) {
            toastr()->error('Erreur', $th->getMessage());
            return redirect('admin/agents');
        }
    }


    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->prenom = '';
        $this->nom = '';
        $this->jour = '';
        $this->mois = '';
        $this->annee = '';
        $this->age = '';
        $this->email = '';
        $this->telephone = '';
        $this->departement_id = '';
        $this->poste_id = '';
        $this->sexe = '';
        $this->photo = '';
    }

    public function activer(int $agent_id)
    {
        $agent = Agent::findOrFail($agent_id); // Retrouver l'agent par ID

        $agent->unblockAccount();
        $agent->resetLoginAttempts();
        toastr()->success('Le compte de l\'agent a été activé.');
        return redirect('admin/agents');
    }



    public function render()
    {
        $this->agents = Agent::get();
        $this->departements = Departement::get();
        $this->diplomes = Diplome::get();
        $this->typeContrats = TypeContrat::limit(2)->get();
        $this->centreImpots = CentreImpot::get();
        $this->feuilles = FeuilleCalcule::get();
        $this->agences = Agence::get();
        return view('livewire.admin.agent.agent-show');
    }
}
