<?php

namespace App\Http\Livewire\Admin\Agent;

use Livewire\Component;
use App\Models\Affectation;
use App\Models\ContratRubrique;

class Detail extends Component
{
    public $agent;
    public $contrat;
    public $contratRubriques;
    public $affectations;

    public function mount()
    {
        $this->contrat = $this->agent->contrat;
        $this->contratRubriques = ContratRubrique::where('contrat_id',$this->contrat->id)->get();
        $this->affectations = Affectation::where('agent_id',$this->agent->id)->OrderBy('id','asc')->get();
    }
    public function render()
    {
        return view('livewire.admin.agent.detail');
    }
}
