<?php

namespace App\Http\Controllers\Auth;

use App\Models\Agent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginAgentController extends Controller
{
    public function index(Request $req)
    {
        return view('auth-agent.login');
    }

    public function login(Request $request)
    {
        // Validez les données du formulaire
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        try {
            // Récupérez l'agent en fonction de l'adresse e-mail
            $agent = Agent::where('email', $request->email)->firstOrFail();

            if ($agent->blocked == 1) {
                return back()->with(['error' => 'Votre compte est désactivé, veuillez contacter la GRH.']);
            }

            if (Auth::guard('webagent')->attempt($request->only('email', 'password'))) {
                $agent->resetLoginAttempts();
                return redirect()->route('agent-dashboard');
            } else {
                $agent->incrementLoginAttempts();
                // Vérifie si l'agent doit être bloqué après un certain nombre de tentatives
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
}
