<?php

namespace App\Http\Livewire\Admin\Profile;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class Profile extends Component
{
    public $telephone, $adresse,$photo,$password, $password_confirmation;
    public $name,$email;
    use WithFileUploads;

    public function mount()
    {
        $user = User::where('id',Auth::user()->id)->first();
        $this->telephone = $user->telephone;
        $this->adresse = $user->adresse;
        $this->name = $user->name;
        $this->email = $user->email;
    }

    protected $rules = [
        'telephone' => 'min:8',
        'adresse' => 'string',
        'name' => 'string|string',
        'email' => 'string|email',
        'photo' => 'image|max:1024',
        'password' => ['confirmed', 'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{10,}$/'],
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    protected $messages = [
        'password' => '
            Contient au moins une lettre majuscule.
            Contient au moins une lettre minuscule.
            Contient au moins un chiffre.
            Contient au moins un caractère spécial parmi @, $, !, %, *, ?, &.
            A une longueur minimale de 10 caractères.
        ',
    ];



    public function updateUser()
    {
        $validatedData = $this->validate();
        $user = User::where('id', Auth::user()->id)->first();
        $user->telephone = $validatedData['telephone'];
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->adresse = $validatedData['adresse'];
        $user->password = $validatedData['password'];
        $imageName = Carbon::now()->timestamp . '.' . $this->photo->extension();
        $this->photo->storeAs('admin/profile/', $imageName);
        $user->photo = $imageName;
        $user->update();
        return redirect('admin/profiles')->with('message','Profile Mise a jour avec success');
    }
    public function render()
    {
        return view('livewire.admin.profile.profile');
    }
}
