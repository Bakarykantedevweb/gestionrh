<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserShow extends Component
{
    public $users, $role_name,$roles,
    $role_type_user_id,$role,$name,$email,$user_id;

    protected function rules()
    {
        return [
            'name' => 'required|string|',
            'email' => 'required|email|',
            'role_type_user_id' => 'required|integer',
            'role' => 'required|integer',
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function saveUser()
    {
        $validatedData = $this->validate();
        try {
            $user = new User();
            $user->name = $validatedData['name'];
            $user->email = $validatedData['email'];
            $user->role_type_user_id = $validatedData['role_type_user_id'];
            $user->role_id = $validatedData['role'];
            $user->password = Hash::make('password');
            $user->save();
            session()->flash('message', 'Administrateur Cree avec Success');
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        } catch (\Throwable $th) {
            session()->flash('error', $th);
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        }
    }

    public function editUser(int $user_id)
    {
        $user = User::find($user_id);
        if($user){
            $this->user_id = $user_id;
            $this->name = $user->name;
            $this->email = $user->email;
            $this->role_type_user_id = $user->role_type_user_id;
            $this->role = $user->role_id;
        }
    }

    public function UpdateUser()
    {
        $validatedData = $this->validate();
        try {
            $user = User::find($this->user_id);
            $user->name = $validatedData['name'];
            $user->email = $validatedData['email'];
            $user->role_type_user_id = $validatedData['role_type_user_id'];
            $user->role_id = $validatedData['role'];
            //$user->password = Hash::make('password');
            $user->save();
            session()->flash('message', 'Administrateur Modifié avec Success');
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        } catch (\Throwable $th) {
            session()->flash('error', $th);
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        }
    }

    public function deleteUser(int $user_id)
    {

        $this->user_id = $user_id;
    }

    public function DestroyUser()
    {
        try {
            User::where('id', $this->user_id)->delete();
            session()->flash('message', 'Administrateur Supprimé avec Success');
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
        $this->name = '';
        $this->email = '';
        $this->role_type_user_id = '';
        $this->role = '';
    }
    public function render()
    {
        $this->users = User::get();
        $this->role_name   = DB::table('role_type_users')->get();
        $this->roles         = Role::where('type', 1)->get();
        return view('livewire.admin.user.user-show');
    }
}
