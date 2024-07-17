<?php

namespace App\Http\Controllers\admin;

use App\Models\Contrat;
use Illuminate\Http\Request;
use App\Models\BulletinRubrique;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class GenerationController extends Controller
{
    public function index()
    {
        $autorisation = $this->autorisation(Auth::user()->role, 'generation.index');
        if ($autorisation == 'false') {
            toastr()->info('Vous n\'avez pas le droit d\'acceder à ces ressources', 'Tentative échoué');
            return redirect('admin/404');
        }
        return view('admin.generation.index');
    }

    public function generer($id, $contrat_id)
    {
        try {
            // Vérifier si le bulletin avec l'ID existe
            if (!BulletinRubrique::where('id', $id)->exists()) {
                toastr()->error('Une Erreur est survenue lors du traitement de la page');
                return redirect()->route('generation.index');
            }

            // Vérifier si le contrat avec l'ID existe
            if (!Contrat::where('id', $contrat_id)->exists()) {
                toastr()->error('Une Erreur est survenue lors du traitement de la page');
                return redirect()->route('generation.index');
            }

            // Récupérez les rubriques du bulletin depuis la table bulletin_rubrique
            $rubriquesDuBulletin = BulletinRubrique::where('bulletin_id', $id)->get();
            $detailContrat = Contrat::where('id', $contrat_id)->first();

            return view('admin.generation.bulletin', [
                'rubriquesDuBulletin' => $rubriquesDuBulletin,
                'detailContrat' => $detailContrat,
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            toastr()->error('Une Erreur est survenue lors du traitement de la page');
            return redirect()->route('generation.index');
        }
    }
}
