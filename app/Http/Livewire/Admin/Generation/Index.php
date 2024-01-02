<?php

namespace App\Http\Livewire\Admin\Generation;

use App\Models\Contrat;
use App\Models\Periode;
use Livewire\Component;
use App\Models\Bulletin;
use App\Models\BulletinRubrique;

class Index extends Component
{
    public $listeGeneration = true;
    public $GenerationBulletin = false;


    public $bulletins = [];
    public $periodes;
    public $PeriodeId;
    public $rubriquesDuBulletin = null;
    public $detailContrat;

    // private function disableContents()
    // {
    //     $this->listeGeneration = false;
    //     $this->GenerationBulletin = false;
    // }

    public function afficherRubriques($bulletinId, $contratId)
    {
        // Récupérez les rubriques du bulletin depuis la table bulletin_rubrique
        $this->rubriquesDuBulletin = BulletinRubrique::where('bulletin_id', $bulletinId)->get();
        $this->detailContrat = Contrat::where('id', $contratId)->first();
        $this->listeGeneration = false;
        $this->GenerationBulletin = true;
    }

    public function retour()
    {
        $this->listeGeneration = true;
        $this->GenerationBulletin = false;
    }

    public function mount()
    {
        $this->periodes = Periode::get();
    }

    public function chargerContrats()
    {
        // Vérifiez si la période est sélectionnée
        if ($this->PeriodeId) {
            // Récupérez les contrats associés à la période sélectionnée
            $this->bulletins = Bulletin::where('periode_id', $this->PeriodeId)->get();
        } else {
            // Réinitialisez la liste des contrats si aucune période n'est sélectionnée
            $this->bulletins = [];
        }
    }



    public function render()
    {
        return view('livewire.admin.generation.index');
    }
}
