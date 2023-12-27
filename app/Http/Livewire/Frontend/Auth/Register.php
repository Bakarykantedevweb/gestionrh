<?php

namespace App\Http\Livewire\Frontend\Auth;

use Livewire\Component;
use App\Models\Candidat;
use Illuminate\Support\Facades\Hash;

class Register extends Component
{
    public $nom,$prenom,$email,$telephone,$password;

    protected function rules()
    {
        return [
            'prenom' => 'required|string',
            'nom' => 'required|string',
            'email' => 'required|email|unique:candidats',
            'telephone' => 'required|string|unique:candidats',
            'password' => 'required|min:8',
        ];
    }
    public function updated($champs)
    {
        $this->validateOnly($champs);
    }

    public function saveCandidat()
    {
        $validatedData = $this->validate();
        $candidat = new Candidat();
        $candidat->nom = $validatedData['nom'];
        $candidat->prenom = $validatedData['prenom'];
        $candidat->email = $validatedData['email'];
        $candidat->telephone = $validatedData['telephone'];
        $candidat->password = Hash::make($validatedData['password']);
        $candidat->save();
        toastr()->success('Votre Compte a bien ete cree');
        return redirect('login-candidat');

    }

    public function render()
    {
        return view('livewire.frontend.auth.register');
    }
}
