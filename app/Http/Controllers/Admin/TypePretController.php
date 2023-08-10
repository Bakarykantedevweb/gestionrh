<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TypePretController extends Controller
{
    public function index()
    {
        $autorisation = $this->autorisation(Auth::user()->role, 'Typeconge.index');
        if ($autorisation == 'false') {
            //Toastr::info('Vous n\'avez pas le droit d\'acceder à ces ressources', 'Tentative échoué');
            return redirect()->route('dashboard');
        }
        return view('admin.type_pret.index');
    }
}
