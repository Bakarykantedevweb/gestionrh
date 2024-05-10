<?php

namespace App\Http\Controllers\frontend;

use App\Models\Offre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendOffreController extends Controller
{
    public function index()
    {
        return view('frontend.offre.index');
    }

    public function detail($titre)
    {
        $offre = Offre::where('titre', $titre)->first();
        if(!$offre)
        {
            toastr()->error('Une erreur est survenue lors du traitement de la page');
            return redirect('admin/offres');
        }
        return view('frontend.offre.detail',compact('offre'));
    }
}
