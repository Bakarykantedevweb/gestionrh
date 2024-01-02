<?php

namespace App\Http\Controllers\Candidat;

use App\Http\Controllers\Controller;
use App\Models\Postuler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidatDashboardController extends Controller
{
    public function index()
    {
        $postulers = Postuler::where('candidat_id',Auth::guard('candidat')->user()->id)->orderBy('id','desc')->get();
        return view('candidat.index',compact('postulers'));
    }
}
