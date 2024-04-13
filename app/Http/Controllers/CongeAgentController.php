<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CongeAgentController extends Controller
{
    public function index()
    {
        return view('agent.conge.index');
    }

    public function create()
    {
        return view('agent.conge.create');
    }
}
