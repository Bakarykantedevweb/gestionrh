<?php

namespace App\Http\Livewire\Admin\Generation;

use App\Models\Contrat;
use App\Models\Periode;
use Livewire\Component;
use App\Models\Bulletin;
use App\Models\BulletinRubrique;
use App\Models\Exercice;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $listeGeneration = true;
    public $GenerationBulletin = false;


    public $bulletins = [];
    public $periodes;
    public $exercices;
    public $PeriodeId;
    public $ExerciceId;
    public $rubriquesDuBulletin = null;
    public $detailContrat;
    public $detailBulletin;
    public $contrat;

    public function mount()
    {
        $this->periodes = Periode::get();
        $this->exercices = Exercice::get();
    }

    public function updatedExerciceId()
    {
        // Charger les contrats lorsqu'un exercice est sélectionné
        $this->chargerContrats();
    }

    public function updatedPeriodeId()
    {
        // Charger les contrats lorsqu'une période est sélectionnée
        $this->chargerContrats();
    }

    public function chargerContrats()
    {
        // Vérifiez si l'exercice et la période sont sélectionnés
        if ($this->ExerciceId && $this->PeriodeId) {
            // Récupérez les bulletins associés à l'exercice et la période sélectionnés
            $this->bulletins = Bulletin::where('periode_id', $this->PeriodeId)
                ->where('exercice_id', $this->ExerciceId)
                ->get();
        } else {
            // Réinitialisez la liste des bulletins si l'exercice ou la période ne sont pas sélectionnés
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
        return view('livewire.admin.generation.index');
    }
}
