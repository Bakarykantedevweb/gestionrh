<?php

namespace App\Http\Livewire\Admin\Role;

use App\Models\Role;
use App\Models\Droit;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class RoleShow extends Component
{
    public $roles,$droits ,$nom, $type , $selectedItems = [];
    public $selectAll;

    public function updatedSelectAll()
    {
        if ($this->selectAll) {
            // Cochez toutes les cases à cocher
            $this->selectedItems = array_fill_keys($this->obtenirIdsMesDonnees(), true);
        } else {
            // Décochez toutes les cases à cocher
            $this->selectedItems = [];
        }
    }

    private function obtenirIdsMesDonnees()
    {
        return collect($this->droits)->pluck('id')->all();
    }


    protected function rules()
    {
        return [
            'nom' => 'required|string',
            'type' => 'required|integer',
        ];
    }

    public function updated($champs)
    {
        $this->validateOnly($champs);
    }

    public function saveRole()
    {
        $validatedData = $this->validate();
        try {
            $role = new Role();
            $role->nom = $validatedData['nom'];
            $role->type = $validatedData['type'];
            $role->save();
            if($role){
                $role->droits()->attach($this->selectedItems);
            }
            session()->flash('message', 'Role Cree avec Succuess');
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
        $this->type = '';
    }

    public function render()
    {
        $this->droits = Droit::get();
        $this->roles = Role::get();
        return view('livewire.admin.role.role-show');
    }
}
