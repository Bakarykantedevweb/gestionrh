<?php

namespace App\Http\Livewire\Admin\Bulletin;

use App\Models\Agent;
use App\Models\Contrat;
use App\Models\Periode;
use Livewire\Component;
use App\Models\Bulletin;
use App\Models\Rubrique;
use App\Models\FeuilleCalcule;

class BulletinShow extends Component
{
    public $agents,$contrat_id, $periode_id,$id_bulletin;
    public $contrats;
    public $periodes;
    public $rubriques;
    public $selectedMonth;
    public $showTable = false;
    public $selectedMonthName;
    public $listeBulletin = true;
    public $BulletinPreparation = false;
    public $feuilleCalcules;

    private function disableContents()
    {
        $this->listeBulletin = false;
        $this->BulletinPreparation = false;
    }

    public function activeContent(string $content)
    {
        $content = decrypt($content);
        $this->disableContents();
        $this->$content = true;
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->contrat_id = '';
        $this->periode_id = '';
    }

    public function selectMonth($month)
    {
        $this->selectedMonth = $month;
        $this->selectedMonthName = ucfirst($month); // Mettez le nom du mois en majuscules
        $this->showTable = true;
    }

    public function annuler()
    {
        $this->showTable = false;
    }

    public function render()
    {
        $this->contrats = Contrat::get();
        $this->periodes = Periode::get();
        $this->rubriques = Rubrique::get();
        $this->feuilleCalcules = FeuilleCalcule::get();
        return view('livewire.admin.bulletin.bulletin-show');
    }
}
