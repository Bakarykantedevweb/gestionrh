<?php

namespace App\Http\Livewire\Admin\Contrat;

use App\Models\Agent;
use Livewire\Component;
use App\Models\Categorie;
use App\Models\Convention;
use App\Models\CentreImpot;
use App\Models\TypeContrat;
use App\Models\FeuilleCalcule;

class Index extends Component
{
    public $selectedOption;

    public $options = [
        'Marie' => 'text',
        'Divorce' => 'text',
        'Veuf' => 'text',
        'Célibataire' => 'hidden',
    ];
    public $agents ,$typeContrats,$centreImpots,$feuilles;
    public $conventions ;

    public $selectedConvention;
    public $categories;

    public function mount()
    {
        $this->categories = [];
    }

    public function updatedSelectedConvention($value)
    {
        $convention = Convention::find($value);
        $this->categories = $convention ? $convention->categories : [];
    }

    public function render()
    {
        $this->agents = Agent::get();
        $this->typeContrats = TypeContrat::get();
        $this->centreImpots = CentreImpot::get();
        $this->feuilles = FeuilleCalcule::get();
        $this->conventions = Convention::get();
        return view('livewire.admin.contrat.index');


    }
}
