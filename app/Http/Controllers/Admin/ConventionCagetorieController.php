<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ConventionCagetorieController extends Controller
{
    public function index()
    {
        $autorisation = $this->autorisation(Auth::user()->role, 'convention.index');
        if ($autorisation == 'false') {
            return redirect()->route('dashboard');
        }

        return view('admin.convention-categorie.index');
    }
}
