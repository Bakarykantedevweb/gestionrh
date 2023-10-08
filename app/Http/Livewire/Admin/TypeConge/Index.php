<?php

namespace App\Http\Livewire\Admin\TypeConge;

use Livewire\Component;
use App\Models\TypeConge;

class Index extends Component
{
    public $typeConges, $nom, $type_conge_id;

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

    public function savetypeConge()
    {
        $validatedData = $this->validate();
        try {
            $TypeConge = new TypeConge();

            $TypeConge->nom = $validatedData['nom'];
            $TypeConge->save();
            session()->flash('message', 'Type Contrat ajouter avec Success');
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('error', $th);
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        }
    }

    public function editTypeConge(int $type_conge_id)
    {
        $TypeConge = TypeConge::find($type_conge_id);
        if ($TypeConge) {
            $this->type_conge_id = $type_conge_id;
            $this->nom = $TypeConge->nom;
        }
    }

    public function updatetypeConge()
    {
        $validatedData = $this->validate();
        try {
            $TypeConge = TypeConge::find($this->type_conge_id);
            $TypeConge->nom = $validatedData['nom'];
            $TypeConge->save();
            session()->flash('message', 'Type Contrat modifier avec Success');
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('error', $th);
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        }
    }

    public function deleteTypeConge(int $type_conge_id)
    {
        $this->type_conge_id = $type_conge_id;
    }

    public function destroytypeConge()
    {
        try {
            TypeConge::where('id', $this->type_conge_id)->delete();
            session()->flash('message', 'Type Contrat Supprimé avec Success');
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
        $this->nom = '';
    }
    public function render()
    {
        $this->typeConges = TypeConge::get();
        return view('livewire.admin.type-conge.index');
    }
}
