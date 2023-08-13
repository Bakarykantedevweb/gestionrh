<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AgentAuthController extends Controller
{
    public function login(Request $request)
    {
        // Validez les données du formulaire
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::guard('webagent')->attempt($credentials)) {
            return redirect()->route('agent-dashboard');
        } else {
            return back()->with(['error' => 'Authentication failed']);
        }
    }

}
