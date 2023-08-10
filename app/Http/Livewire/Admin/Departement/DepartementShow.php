<?php

namespace App\Http\Livewire\Admin\Departement;

use App\Models\Departement;
use Livewire\Component;

class DepartementShow extends Component
{
    public $departements , $code, $nom , $dep_id;

    protected function rules()
    {
        return [
            'code' => 'required|string',
            'nom' => 'required|string',
        ];
    }

    public function updated($champs)
    {
        $this->validateOnly($champs);
    }

    public function saveDepartement()
    {
        $validatedData = $this->validate();
        try {
            $dep = new Departement();
            $dep->code = $validatedData['code'];
            $dep->nom = $validatedData['nom'];
            $dep->save();
            session()->flash('message', 'Departement ajouter avec Success');
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('error', $th);
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        }
    }

    public function editDepartement(int $dep_id)
    {
        $dep = Departement::find($dep_id);
        if($dep){
            $this->dep_id = $dep_id;
            $this->code = $dep->code;
            $this->nom = $dep->nom;
        }
    }

    public function updateDepartement()
    {
        $validatedData = $this->validate();
        try {
            $dep = Departement::find($this->dep_id);
            $dep->code = $validatedData['code'];
            $dep->nom = $validatedData['nom'];
            $dep->save();
            session()->flash('message', 'Departement Modifié avec Success');
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('error', $th);
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        }
    }

    public function deleteDepartement(int $dep_id)
    {
        $this->dep_id = $dep_id;
    }

    public function destroyDepartement()
    {
        try {
            Departement::where('id',$this->dep_id)->delete();
            session()->flash('message', 'Departement Supprimé avec Success');
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
        $this->code = '';
        $this->nom = '';
    }

    public function render()
    {
        $this->departements = Departement::get();
        return view('livewire.admin.departement.departement-show');
    }
}
