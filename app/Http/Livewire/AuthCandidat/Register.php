<?php

namespace App\Http\Livewire\AuthCandidat;

use App\Models\Candidat;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    public $nom,$prenom,$username,$email,$telephone,$password, $password_confirm;

    protected function rules()
    {
        return [
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'username' => 'required|string',
            'email' => 'required|email',
            'telephone' => 'required|regex:/^[0-9]{8}$/',
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
        try
        {
            if(Candidat::where('email', $validatedData['email'])->exists())
            {
                toastr()->error('Adresse Email deja utilisé');
                $this->email = '';
            }
            if($validatedData['password'] != '' && $this->password_confirm)
            {
                toastr()->error('Les deux mot de passe ne sont pas identiques');
                $this->password = '';
                $this->password_confirm = '';
            }
            else
            {
                $candidat = new Candidat;
                $candidat->nom = $validatedData['nom'];
                $candidat->prenom = $validatedData['prenom'];
                $candidat->username = $validatedData['username'];
                $candidat->email = $validatedData['email'];
                $candidat->telephone = $validatedData['telephone'];
                $candidat->password = Hash::make($validatedData['password']);
                $candidat->save();
                toastr()->success('Votre compte a bien ete cree');
                return redirect('login-candidat');
            }
        } catch (\Throwable $th)
        {
            toastr()->error('Une Erreur est survenue lors du traitement de la page');
        }
    }

    public function render()
    {
        return view('livewire.auth-candidat.register');
    }
}
