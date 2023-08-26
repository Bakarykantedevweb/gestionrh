<?php

namespace App\Http\Controllers\Auth;

use App\Models\Agent;
use App\Models\Departement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginAgentController extends Controller
{
    public function index(Request $req)
    {
        $departements = Departement::get();

        return view('auth-agent.login',compact('departements'));
    }

    public function login(Request $request)
    {
        // Validez les données du formulaire
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password', 'departement_id');

        // Récupérez l'agent en fonction de l'adresse e-mail
        $agent = Agent::where('email', $request->email)->first();
        //dd($agent->email);
        if ($agent->blocked == 1) {
            return back()->with(['error' => 'Votre compte est desactivé veuillez contacter La GRH.']);
        }

        if ($agent && Auth::guard('webagent')->attempt($credentials)) {
            $agent->resetLoginAttempts();
            return redirect()->route('agent-dashboard');
        } else {
            if ($agent) {
                $agent->incrementLoginAttempts();
                // Vérifie si l'agent doit être bloqué après un certain nombre de tentatives
                if ($agent->login_attempts >= 3) {
                    $agent->blockAccount();
                    return back()->with(['error' => 'Votre compte a été bloqué en raison de trop de tentatives de connexion échouées.']);
                }
            }
            return back()->with(['error' => 'L\'authentification a échoué']);
        }
    }
}
