<?php

namespace App\Http\Controllers\Agent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutAgentController extends Controller
{
    public function logout()
    {
        dd('ok');
        Auth::guard('webagent')->logout(); 
        toastr()->success('Merci pour votre visite');
        return redirect('login-agent');
    }
}
