<?php

namespace App\Http\Livewire\Agent\Formation;

use App\Models\Agent;
use Livewire\Component;
use App\Models\Formation;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $formations;

    public function mount()
    {
        // Récupérer l'agent connecté (par exemple, en utilisant l'authentification)
        $agentId = Auth::guard('webagent')->user()->id;

        // Récupérer les formations de l'agent connecté
        $agent = Agent::find($agentId);

        if ($agent) {
            // Charger les formations associées à cet agent
            $this->formations = $agent->formations()->get();
        }
    }

    public function render()
    {
        return view('livewire.agent.formation.index');
    }
}
