<?php

namespace App\Http\Livewire\Agent\Formation;

use App\Models\Agent;
use Livewire\Component;
use App\Models\Formation;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $formations;
    public $formationsTerminees;

    public $FormationEnCour = true;
    public $FormationTerminee = false;

    public function mount()
    {
        // Récupérer l'agent connecté (par exemple, en utilisant l'authentification)
        $agentId = Auth::guard('webagent')->user()->id;

        // Récupérer les formations de l'agent connecté
        $agent = Agent::find($agentId);

        if ($agent) {
            // Charger les formations associées à cet agent
            $this->formations = $agent->formations()->where('date_fin','>=',now())->get();
            $this->formationsTerminees = $agent->formations()->where('date_fin', '<', now())->get();
        }
    }

    public function activeContent(string $content)
    {
        $content = decrypt($content);
        $this->disableContents();
        $this->$content = true;
    }

    private function disableContents()
    {
        $this->FormationEnCour = false;
        $this->FormationTerminee = false;
    }

    public function render()
    {
        return view('livewire.agent.formation.index');
    }
}
