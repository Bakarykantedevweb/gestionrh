<?php

namespace App\Http\Controllers\Auth;

use App\Models\Agent;
use Livewire\Livewire;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\Agent\Password\Index;

class LoginAgentController extends Controller
{
    public function index()
    {
        return view('auth-agent.login');
    }

    public function logout()
    {
        Auth::guard('webagent')->logout(); // Assurez-vous que le nom du garde correspond à celui que vous avez défini dans votre configuration

        toastr()->success('Merci pour votre visite');

        return redirect('login-agent');
    }
}
