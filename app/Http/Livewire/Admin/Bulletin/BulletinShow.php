<?php

namespace App\Http\Livewire\Admin\Bulletin;

use App\Models\Agent;
use App\Models\Contrat;
use App\Models\Periode;
use Livewire\Component;
use App\Models\Bulletin;
use App\Models\Rubrique;
use App\Models\FeuilleCalcule;
use App\Models\BulletinRubrique;

class BulletinShow extends Component
{
    public $agents;
    public $contrats = [];
    public $feuilleCalcules;
    public $feuilleCalculeId;
    public $rubriques;
    public $periodes;
    public $periode_id;
    public $montant = [];
    public $selectedMonth;
    public $showTable = false;
    public $selectedMonthName;

    public function __construct()
    {
        $this->feuilleCalcules = FeuilleCalcule::get();
        $this->periodes = Periode::get();
    }

    public function selectMonth($month)
    {
        $this->selectedMonth = $month;
        $this->selectedMonthName = ucfirst($month);
        $this->showTable = true;
    }

    public function annuler()
    {
        $this->showTable = false;
    }

    public function getRubriques()
    {
        $feuilleCalcule = FeuilleCalcule::find($this->feuilleCalculeId);
        // dd($feuilleCalcule);
        // Vérifier si la feuille de calcul existe
        if ($feuilleCalcule) {
            // Récupérer les rubriques liées à la feuille via la table de liaison feuille_rubrique
            $this->rubriques = $feuilleCalcule->rubriques ?? [];
            $this->contrats = [];
            $this->montant = [];
            // Récupérer la liste des agents liés à la feuille sélectionnée via la table contrats
            if(count($feuilleCalcule->contrats))
            {
                $this->contrats = $feuilleCalcule->contrats;
            }

        } else {
            $this->rubriques = [];
            $this->agents = [];
        }
    }

    public function SaveBulletin()
    {
        $mois = strtolower($this->selectedMonthName);
        $periode = Periode::where('mois',$mois)->first();
        
        // foreach ($this->montants as $rubriqueId => $montants) {
        //     foreach ($montants as $agentId => $montant) {
        //         $bulletinRubrique = new BulletinRubrique([
        //             'rubrique_id' => $rubriqueId,
        //             'agent_id' => $agentId,
        //             'montant' => $montant,
        //         ]);
        //         $bulletinRubrique->save();
        //     }
        // }
        // $this->reset('montants');
    }

    public function render()
    {
        return view('livewire.admin.bulletin.bulletin-show');
    }
}
