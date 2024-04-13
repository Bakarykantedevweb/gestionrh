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
        Auth::guard('webagent')->logout(); // Assurez-vous que le nom du garde correspond à celui que vous avez défini dans votre configuration

        toastr()->success('Merci pour votre visite');

        return redirect('login-agent');
    }

}
