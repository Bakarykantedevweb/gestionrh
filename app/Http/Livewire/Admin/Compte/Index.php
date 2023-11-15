<?php

namespace App\Http\Livewire\Admin\Compte;

use App\Models\Agent;
use App\Models\Compte;
use Livewire\Component;

class Index extends Component
{
    public $compte_id,$agents,$comptes;
    public $agent_id,$prefixe,$numero;

    protected $rules = [
        'agent_id' => 'required|integer',
        'prefixe' => 'required|',
        'numero' => 'required',
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function saveCompte()
    {
        $validatedData = $this->validate();
        try {
            $compte = new compte;
            if($this->compte_id){
                $compte = Compte::find($this->compte_id);
            }
            $compte->agent_id = $validatedData['agent_id'];
            $compte->prefixe = $validatedData['prefixe'];
            $compte->numero = $validatedData['numero'];
            $compte->save();
            session()->flash('message', 'Operation effectue avec success');
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        } catch (\Throwable $th) {
            session()->flash('error', 'Une erreur est survenue lors du traitement');
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        }
    }

    public function editCompte($id)
    {
        $compte = Compte::find(decrypt($id));
        if($compte){
            $this->compte_id = $compte->id;
            $this->agent_id = $compte->agent_id;
            $this->prefixe = $compte->prefixe;
            $this->numero = $compte->numero;
        }
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->agent_id = '';
        $this->prefixe = '';
        $this->numero = '';
    }

    public function render()
    {
        $this->agents = Agent::get();
        $this->comptes = Compte::get();
        return view('livewire.admin.compte.index');
    }
}
