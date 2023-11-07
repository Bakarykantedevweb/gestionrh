<?php

namespace App\Http\Livewire\Admin\Agence;

use App\Models\Agence;
use Livewire\Component;

class Index extends Component
{
    public $agences;
    public $agence_id,$nom;
    protected function rules()
    {
        return [
            'nom' => 'required|string',
        ];
    }

    public function updated($champs)
    {
        $this->validateOnly($champs);
    }

    public function SaveAgence()
    {
        $validatedData = $this->validate();
        $agence = new Agence;
        if($this->agence_id)
        {
            $agence = Agence::find($this->agence_id);
        }
        $agence->nom = $validatedData['nom'];
        $agence->save();
        session()->flash('message', 'Operation effectuée avec Success');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function editAgence($id)
    {
        $agence = Agence::find($id);
        if($agence){
            $this->agence_id = $agence->id;
            $this->nom = $agence->nom;
        }
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->nom = '';
    }
    public function render()
    {
        $this->agences = Agence::where('status', '0')->get();
        return view('livewire.admin.agence.index');
    }
}
