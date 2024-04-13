<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AgentFormationController extends Controller
{
    public function index()
    {
        return view('agent.formation.index');
    }
}
