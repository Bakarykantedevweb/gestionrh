<?php

namespace App\Http\Livewire\Admin\Contrat;

use App\Models\Agent;
use Livewire\Component;
use App\Models\Categorie;
use App\Models\Convention;
use App\Models\CentreImpot;
use App\Models\Contrat;
use App\Models\TypeContrat;
use App\Models\FeuilleCalcule;

class Index extends Component
{

    public $contrats;

    public function render()
    {
        $this->contrats = Contrat::get();
        return view('livewire.admin.contrat.index');


    }
}
