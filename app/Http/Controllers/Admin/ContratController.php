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

    public function create()
    {
        $autorisation = $this->autorisation(Auth::user()->role, 'contrat.index');
        if ($autorisation == 'false') {
            toastr()->info('Vous n\'avez pas le droit d\'acceder à ces ressources', 'Tentative échoué');
            return redirect()->route('dashboard');
        }
        return view('admin.contrat.create');
    }
    public function edit($numero)
    {
        $autorisation = $this->autorisation(Auth::user()->role, 'contrat.index');
        if ($autorisation == 'false') {
            toastr()->info('Vous n\'avez pas le droit d\'acceder à ces ressources', 'Tentative échoué');
            return redirect()->route('dashboard');
        }
        $autorisation = $this->autorisation(Auth::user()->role, 'contrat.index');
        if ($autorisation == 'false') {
            toastr()->info('Vous n\'avez pas le droit d\'acceder à ces ressources', 'Tentative échoué');
            return redirect()->route('dashboard');
        }
        try {
            if($numero)
            {
                $contrat = Contrat::where('numero', $numero)->first();
                if ($contrat) {
                    return view('admin.contrat.edit',compact('contrat'));
                } else {
                    toastr()->error('Une Erreur est survenue lors du traitement', 'Tentative échoué');
                    return redirect()->route('contrat.index');
                }
            }
            else{
                toastr()->error('Une Erreur est survenue lors du traitement', 'Tentative échoué');
                return redirect()->route('contrat.index');
            }
        } catch (\Throwable $th) {
            toastr()->error('Une Erreur est survenue lors du traitement', 'Tentative échoué');
            return redirect()->route('contrat.index');
        }
    }
}
