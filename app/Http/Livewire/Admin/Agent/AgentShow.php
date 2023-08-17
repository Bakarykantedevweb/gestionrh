<?php

namespace App\Http\Livewire\Admin\Agent;

use App\Models\Agent;
use Livewire\Component;
use App\Models\Departement;
use App\Models\Poste;
use Illuminate\Support\Facades\Hash;

class AgentShow extends Component
{
    public $agents,$departements,$postes;
    public $prenom,$nom,$username,$email, $sexe,$telephone,$departement_id,$poste_id;

    protected function rules()
    {
        return [
            'prenom' => 'required|string',
            'nom' => 'required|string',
            'username' => 'required|string',
            'email' => 'required|email',
            'telephone' => 'required|integer|min:8',
            'departement_id' => 'required|integer',
            'poste_id' => 'required|integer',
            'sexe' => 'required|string',
        ];
    }

    public function updated($champs)
    {
        $this->validateOnly($champs);
    }

    public function saveEmploye()
    {
        $validatedData = $this->validate();
        try {
            $agent = new Agent();
            $agent->prenom = $validatedData['prenom'];
            $agent->nom = $validatedData['nom'];
            $agent->email = $validatedData['email'];
            $agent->username = $validatedData['username'];
            $agent->telephone = $validatedData['telephone'];
            $agent->departement_id = $validatedData['departement_id'];
            $agent->poste_id = $validatedData['poste_id'];
            $agent->sexe = $validatedData['sexe'];
            $agent->password = Hash::make('password');
            $agent->save();
            $matricule = 'MA' . str_pad($agent->id, 3, '0', STR_PAD_LEFT);
            $agent->matricule = $matricule;
            $agent->save();
            session()->flash('message', 'Employe ajouter avec Success');
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('error', $th);
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        }
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->prenom = '';
        $this->nom = '';
        $this->username = '';
        $this->email = '';
        $this->telephone = '';
        $this->departement_id = '';
        $this->poste_id = '';
        $this->sexe = '';
    }

    public function activer(int $agent_id)
    {
        $agent = Agent::findOrFail($agent_id); // Retrouver l'agent par ID

        $agent->unblockAccount();
        $agent->resetLoginAttempts();

        return redirect()->route('agent.index')
        ->with('message', 'Le compte de l\'agent a été activé.');
    }
    public function render()
    {
        $this->agents = Agent::get();
        $this->departements = Departement::get();
        $this->postes = Poste::get();
        return view('livewire.admin.agent.agent-show');
    }
}
