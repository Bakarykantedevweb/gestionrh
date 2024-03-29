<?php

namespace App\Http\Livewire\Agent\Login;

use App\Models\Agent;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Login extends Component
{
    public $email, $password;
    public $showInput = false;
    public $newpassword, $confirmpassword;
    public $agentID;
    protected function rules()
    {
            return [
                'email' => 'required|email',
                'password' => 'required',
            ];
    }


    public function updated($champs)
    {
        $this->validateOnly($champs);
    }

    public function saveLogin()
    {
        $validatedData = $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        try {
            $agent = Agent::where('email', $validatedData['email'])->firstOrFail();
            $this->agentID = $agent->id;
            if ($agent->blocked == 1) {
                return back()->with(['error' => 'Votre compte est désactivé, veuillez contacter la GRH.']);
            }

            // Si l'agent a réussi à s'authentifier avec son ancien mot de passe
            if (Auth::guard('webagent')->attempt(['email' => $validatedData['email'], 'password' => $validatedData['password']])) {
                // Si le mot de passe a été changé mais le formulaire montre toujours le champ pour le nouveau mot de passe
                if ($agent->password_changed == false && $this->showInput) {
                    $this->validate([
                        'newpassword' => 'required|min:8|confirmed',
                    ]);

                    // Mettre à jour le mot de passe de l'agent avec le nouveau mot de passe
                    $agent->password = bcrypt($this->newpassword);
                    $agent->password_changed = true; // Marquer que le mot de passe a été changé
                    $agent->save();

                    // Rediriger l'agent vers le tableau de bord après la mise à jour du mot de passe
                    return redirect()->route('agent-dashboard');
                } else {
                    // Si le mot de passe a été changé mais le formulaire montre toujours le champ pour le nouveau mot de passe
                    if ($agent->password_changed == false) {
                        $this->showInput = true;
                        return;
                    } else {
                        // Réinitialiser les tentatives de connexion et rediriger vers le tableau de bord
                        $agent->resetLoginAttempts();
                        return redirect()->route('agent-dashboard');
                    }
                }
            } else {
                $agent->incrementLoginAttempts();

                if ($agent->login_attempts >= 3) {
                    $agent->blockAccount();
                    return back()->with(['error' => 'Votre compte a été bloqué en raison de trop de tentatives de connexion échouées.']);
                }
                return back()->with(['error' => 'L\'authentification a échoué']);
            }
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $exception) {
            return back()->with(['error' => 'Aucun agent trouvé avec cette adresse e-mail.']);
        }
    }

    public function updatePassword()
    {
        // $validatedData = $this->validate([
        //     'newpassword' => ['required', 'confirmed', 'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{10,}$/'],
        // ],
        // [
        //     'newpassword.required' => 'Le mot de passe est obligatoire.',
        //     'newpassword.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
        //     'newpassword.regex' => 'Le mot de passe doit contenir au moins une lettre majuscule, une lettre minuscule, un chiffre, un caractère spécial et avoir une longueur minimale de 10 caractères.',
        // ]);

        // Logique pour la mise à jour du mot de passe
        // ...
        $agent = Agent::find($this->agentID);
        // Mettre à jour le mot de passe de l'agent avec le nouveau mot de passe
        $agent->password = Hash::make($this->newpassword);
        $agent->password_changed = true; // Marquer que le mot de passe a été changé
        $agent->save();

        // Rediriger l'agent vers le tableau de bord après la mise à jour du mot de passe
        return redirect()->route('agent-dashboard');
    }


    public function render()
    {
        return view('livewire.agent.login.login');
    }
}
