<?php

namespace App\Http\Controllers\Agent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AgentBulletinController extends Controller
{
    public function index()
    {
        return view('agent.bulletin.index');
    }
}
