<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Agent;
use App\Models\Contrat;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AgentController extends Controller
{
    public function index()
    {
        $autorisation = $this->autorisation(Auth::user()->role, 'agent.index');
        if ($autorisation == 'false') {
            toastr()->info('Vous n\'avez pas le droit d\'acceder à ces ressources', 'Tentative échoué');
            return redirect('admin/404');
        }

        return view('admin.agent.index');
    }

    public function create()
    {
        $autorisation = $this->autorisation(Auth::user()->role, 'agent.index');
        if ($autorisation == 'false') {
            toastr()->info('Vous n\'avez pas le droit d\'acceder à ces ressources', 'Tentative échoué');
            return redirect('admin/404');
        }

        return view('admin.agent.create');
    }

    public function detail($matricule)
    {
        $autorisation = $this->autorisation(Auth::user()->role, 'agent.index');
        if ($autorisation == 'false') {
            toastr()->info('Vous n\'avez pas le droit d\'acceder à ces ressources', 'Tentative échoué');
            return redirect('admin/404');
        }
        try {
            $agent = Agent::where('matricule',$matricule)->first();
            if(!$agent){
                toastr()->error('Vous n\'avez pas le droit d\'acceder à ces ressources', 'Tentative échoué');
                return redirect()->route('agent.index');
            }
            return view('admin.agent.detail',compact('agent'));
        } catch (\Throwable $th) {
            //throw $th;
            toastr()->error('Vous n\'avez pas le droit d\'acceder à ces ressources', 'Tentative échoué');
            return redirect()->route('agent.index');
        }

    }

    public function contrat($matricule)
    {
        $autorisation = $this->autorisation(Auth::user()->role, 'agent.index');
        if ($autorisation == 'false') {
            toastr()->info('Vous n\'avez pas le droit d\'acceder à ces ressources', 'Tentative échoué');
            return redirect('admin/404');
        }
        try {
            $agent = Agent::where('matricule', $matricule)->first();
            if (!$agent) {
                toastr()->error('Vous n\'avez pas le droit d\'acceder à ces ressources', 'Tentative échoué');
                return redirect()->route('agent.index');
            }
            $contrat = $agent->contrat;
            $data = [
                'agent' => $agent,
                'contrat' => $contrat,
            ];
            $pdf = Pdf::loadView('pdf.contrat', $data);
            return $pdf->download('Contrat - ' . $agent->prenom . ' - ' . $agent->nom . '.pdf');
        } catch (\Throwable $th) {
            //throw $th;
            toastr()->error('Vous n\'avez pas le droit d\'acceder à ces ressources', 'Tentative échoué');
            return redirect()->route('agent.index');
        }
    }
}
