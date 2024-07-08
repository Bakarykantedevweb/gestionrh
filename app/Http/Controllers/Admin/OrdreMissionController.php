<?php

namespace App\Http\Controllers\Admin;

use App\Models\OrdreMission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class OrdreMissionController extends Controller
{
    public function index()
    {
        $autorisation = $this->autorisation(Auth::user()->role, 'offre.index');
        if ($autorisation == 'false') {
            toastr()->info('Vous n\'avez pas le droit d\'acceder à ces ressources', 'Tentative échoué');
            return redirect()->route('dashboard');
        }
        return view('admin.ordre-mission.index');
    }

    public function generation($id)
    {
        $ordreMission = OrdreMission::where('id', $id)->first();
        $data = ['ordreMission' => $ordreMission];
        $pdf = Pdf::loadView('pdf.ordre-mission', $data);
        $todayDate = Carbon::now()->format('d-m-Y');
        return $pdf->download('ODM - ' . $ordreMission->agent->nom . ' - ' . $todayDate . '.pdf');
    }

}
