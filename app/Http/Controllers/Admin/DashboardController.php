<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\Contrat;
use App\Models\Departement;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::count();
        $contrats = Contrat::count();
        $departements = Departement::count();
        $agents = Agent::count();
        return view('admin.dashboard',compact('users', 'contrats', 'departements', 'agents'));
    }
}
