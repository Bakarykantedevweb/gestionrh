<?php

namespace App\Http\Controllers\Agent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardAgentController extends Controller
{
    public function index()
    {
        return view('agent.dashboard');
    }

    public function logout()
    {
        Auth::guard('webagent')->logout();
        return redirect('/login-agent')->with('message', 'Merci pour votre site'); // Redirige où vous le souhaitez après la déconnexion
    }
}
