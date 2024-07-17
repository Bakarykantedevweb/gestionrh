<?php

namespace App\Http\Controllers\admin;

use App\Models\Stagiaire;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
class StagiaireController extends Controller
{
    public function index()
    {
        $autorisation = $this->autorisation(Auth::user()->role, 'rubrique.index');
        if ($autorisation == 'false') {
            toastr()->info('Vous n\'avez pas le droit d\'acceder à ces ressources', 'Tentative échoué');
            return redirect('admin/404');
        }
        return view('admin.stagiaire.index');
    }

    public function generation($matricule)
    {
        $stagiaire = Stagiaire::where('matricule',$matricule)->first();
        $data = ['stagiaire' => $stagiaire];
        $pdf = Pdf::loadView('pdf.convention', $data);
        $todayDate = Carbon::now()->format('Y-m-d');
        return $pdf->download('conevntion - '.$stagiaire->prenom.' '. $stagiaire->nom.' '.$todayDate . '.pdf');
    }

    public function generationAttestation($matricule)
    {
        $stagiaire = Stagiaire::where('matricule', $matricule)->first();
        $data = ['stagiaire' => $stagiaire];
        $pdf = Pdf::loadView('pdf.attestation', $data);
        $todayDate = Carbon::now()->format('Y-m-d');
        return $pdf->download('Attestation - ' . $stagiaire->prenom . ' ' . $stagiaire->nom . ' ' . $todayDate . '.pdf');
    }
}
