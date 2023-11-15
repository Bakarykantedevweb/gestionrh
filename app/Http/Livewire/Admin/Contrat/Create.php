<?php

namespace App\Http\Livewire\Admin\Contrat;

use App\Models\Agent;
use App\Models\Contrat;
use App\Models\Diplome;
use Livewire\Component;
use App\Models\CentreImpot;
use App\Models\TypeContrat;
use App\Models\Classification;
use App\Models\FeuilleCalcule;

class Create extends Component
{
    public $selectedOption;

    public $options = [
        'Marie' => 'text',
        'Divorce' => 'text',
        'Veuf' => 'text',
        'Célibataire' => 'hidden',
    ];
    public $agents, $typeContrats, $centreImpots, $feuilles, $diplomes;// Variable pour stocker le montant de la catégorie sélectionnée
    public $montantCategorie;
    public $agent_id, $type_contrat_id, $diplome_id, $date_entre, $date_mariage,
            $date_divorce, $date_veuve,
            $nombre_enfant, $nombre_femme, $centre_impot_id, $feuille_calcule_id,
            $prefix,$compte;
    public $classifications;

    protected $rules = [
        'agent_id' => 'required|integer',
        'type_contrat_id' => 'required|integer',
        'centre_impot_id' => 'required|integer',
        'diplome_id' => 'required|integer',
        'feuille_calcule_id' => 'required|integer',
        'date_entre' => 'required|date',
        'selectedOption' => 'required|string',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updateMontant()
    {
        $diplome = Diplome::find($this->diplome_id);
        $this->montantCategorie = $diplome->classification->montant;
    }

    public function SaveContrat()
    {
        $validatedData = $this->validate();
        $contrat = new Contrat;
        $contrat->numero = '0000';
        $contrat->date_creation = $validatedData['date_entre'];
        $contrat->situation_matrimoniale = $this->selectedOption;
        $contrat->date_mariage = $this->date_mariage;
        $contrat->date_voeuf = $this->date_veuve;
        $contrat->date_divorce = $this->date_divorce;
        $contrat->nombre_enfant = $this->nombre_enfant;
        $contrat->nombre_femme = $this->nombre_femme;
        $contrat->salaire = $this->montantCategorie;
        $contrat->nombre_jour_conge = 0;
        $contrat->agent_id = $validatedData['agent_id'];
        $contrat->type_contrat_id = $validatedData['type_contrat_id'];
        $contrat->centre_impot_id = $validatedData['centre_impot_id'];
        $contrat->feuille_calcule_id = $validatedData['feuille_calcule_id'];
        $contrat->diplome_id = $validatedData['diplome_id'];
        $contrat->save();
        $numero = 'CR' . str_pad($contrat->id, 5, '0', STR_PAD_LEFT);
        $contrat->numero = $numero;
        $contrat->save();
        return redirect('admin/contrats')->with('message','Contrat cree avec success');
    }

    // public function getClassificationMontants()
    // {
    //     return Diplome::with('classification')->get();
    // }

    public function render()
    {
        // Chargement des données depuis la base de données pour les différentes sélections
        $this->agents = Agent::get();
        $this->typeContrats = TypeContrat::get();
        $this->centreImpots = CentreImpot::get();
        $this->feuilles = FeuilleCalcule::get();
        $this->diplomes = Diplome::get();
        return view('livewire.admin.contrat.create');
    }
}
