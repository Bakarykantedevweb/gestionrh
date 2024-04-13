<?php

namespace App\Http\Livewire\Agent\Bulletin;

use App\Models\Contrat;
use App\Models\Periode;
use Livewire\Component;
use App\Models\Bulletin;
use App\Models\BulletinRubrique;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $listeGeneration = true;
    public $GenerationBulletin = false;


    public $bulletins = [];
    public $periodes;
    public $PeriodeId;
    public $rubriquesDuBulletin = null;
    public $detailContrat;
    public $detailBulletin;
    public $contrat;

    public function mount()
    {
        $this->contrat = Auth::guard('webagent')->user()->contrat;
        // dd($this->contrat);
        $this->periodes = Periode::get();
    }

    public function chargerContrats()
    {
        // Vérifiez si la période est sélectionnée
        if ($this->PeriodeId) {
            // Récupérez les contrats associés à la période sélectionnée
            $this->bulletins = Bulletin::where('contrat_id',$this->contrat->id)->where('periode_id', $this->PeriodeId)->get();
        } else {
            // Réinitialisez la liste des contrats si aucune période n'est sélectionnée
            $this->bulletins = [];
        }
    }

    public function afficherRubriques($bulletinId, $contratId)
    {
        // Récupérez les rubriques du bulletin depuis la table bulletin_rubrique
        $this->rubriquesDuBulletin = BulletinRubrique::where('bulletin_id', $bulletinId)->get();
        $this->detailBulletin = Bulletin::where('id', $bulletinId)->first();
        $this->detailContrat = Contrat::where('id', $contratId)->first();
        $this->listeGeneration = false;
        $this->GenerationBulletin = true;
    }

    public function retour()
    {
        $this->listeGeneration = true;
        $this->GenerationBulletin = false;
    }

    public function render()
    {
        return view('livewire.agent.bulletin.index');
    }
}
