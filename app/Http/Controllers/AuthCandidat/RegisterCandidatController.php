<?php

namespace App\Http\Controllers\AuthCandidat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterCandidatController extends Controller
{
    public function index()
    {
        return view('auth-candidat.register');
    }
}
