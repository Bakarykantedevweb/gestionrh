<?php

namespace App\Http\Controllers\Admin;

use App\Models\Agent;
use App\Models\Contrat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AgentController extends Controller
{
    public function index()
    {
        $autorisation = $this->autorisation(Auth::user()->role, 'agent.index');
        if ($autorisation == 'false') {
            toastr()->info('Vous n\'avez pas le droit d\'acceder à ces ressources', 'Tentative échoué');
            return redirect()->route('dashboard');
        }

        return view('admin.agent.index');
    }

    public function create()
    {
        $autorisation = $this->autorisation(Auth::user()->role, 'agent.index');
        if ($autorisation == 'false') {
            toastr()->info('Vous n\'avez pas le droit d\'acceder à ces ressources', 'Tentative échoué');
            return redirect()->route('dashboard');
        }

        return view('admin.agent.create');
    }
}
