<?php

namespace App\Http\Controllers\Agent;

use App\Models\Agent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class profileAgentController extends Controller
{
    public function index()
    {
        if(Auth::guard('webagent')->check())
        {
            $agent = Agent::where('id',Auth::guard('webagent')->user()->id)->first();
            return view('agent.profile.index',compact('agent'));
        }
        else
        {
            toastr()->success('Votre session a ete desactiver');
            return redirect('login-agent');
        }
    }
}
