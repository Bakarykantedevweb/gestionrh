<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contrat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ContratController extends Controller
{
    public function index()
    {
        $autorisation = $this->autorisation(Auth::user()->role, 'contrat.index');
        if ($autorisation == 'false') {
            toastr()->info('Vous n\'avez pas le droit d\'acceder à ces ressources', 'Tentative échoué');
            return redirect()->route('dashboard');
        }
        return view('admin.contrat.index');
    }
}
