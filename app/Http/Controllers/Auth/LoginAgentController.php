<?php

namespace App\Http\Controllers\Auth;

use App\Models\Departement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginAgentController extends Controller
{
    public function index()
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
            'departement_id' => 'required|integer'
        ]);

        $credentials = $request->only('email', 'password', 'departement_id');
        if (Auth::guard('webagent')->attempt($credentials)) {
            return redirect()->route('agent-dashboard');
        } else {
            return back()->with(['error' => 'Authentication failed']);
        }
    }
}
