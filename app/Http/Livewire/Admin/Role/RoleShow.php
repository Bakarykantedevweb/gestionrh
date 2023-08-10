<?php

namespace App\Http\Livewire\Admin\Role;

use App\Models\Role;
use App\Models\Droit;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class RoleShow extends Component
{
    public $roles,$droits ,$nom, $type, $role_droits = [];

    protected function rules()
    {
        return [
            'nom' => 'required|string',
            'type' => 'required|integer',
            'role_droits' => 'required',
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
            $role->droits()->toggle($validatedData['role_droits']);
            // if($role){
            //     for ($i = 0; $i < count($validatedData['role_droits']); $i++) {
            //         DB::table('droit_role')->insert([
            //             'droit_id' => $validatedData['role_droits[$i]'],
            //             'role_id' => $role->id,
            //         ]);
            //     }
            // }
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
