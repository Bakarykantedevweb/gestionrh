<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PosteController extends Controller
{
    public function index()
    {
        $autorisation = $this->autorisation(Auth::user()->role, 'poste.index');
        if ($autorisation == 'false') {
            return redirect()->route('dashboard');
        }
        return view('admin.poste.index');
    }
}
