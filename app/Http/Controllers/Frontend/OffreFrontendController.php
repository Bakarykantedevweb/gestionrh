<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Offre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OffreFrontendController extends Controller
{
    public function index()
    {
        return view('frontend.offre.index');
    }

    public function detail($titre)
    {
        if(!$titre)
        {
            toastr()->error('Aucun element Trouve !!!!!');
            return redirect('offres');
        }
        $offre = Offre::where('titre', $titre)->where('date_limite','>',now())->first();
        if($offre)
        {
            return view('frontend.offre.detail',compact('offre'));
        }
        else
        {
            toastr()->error('Une erreur est survenue lors du traitement !!!!!');
            return redirect('offres');
        }
    }
}
