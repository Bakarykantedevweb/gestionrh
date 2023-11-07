<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DiplomeController extends Controller
{
    public function index()
    {
        $autorisation = $this->autorisation(Auth::user()->role, 'diplome.index');
        if ($autorisation == 'false') {
            return redirect()->route('dashboard');
        }
        return view('admin.diplome.index');
    }
}
