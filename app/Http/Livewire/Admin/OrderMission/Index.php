<?php

namespace App\Http\Livewire\Admin\OrderMission;

use App\Models\Agence;
use App\Models\Agent;
use Livewire\Component;
use App\Models\OrdreMission;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class Index extends Component
{
    public $afficherListe = true;
    public $afficherForm = false;
    public $editOrdreForm = false;

    public $ordreMissions;
    public $agents , $agences;

    public $objet, $agent_id, $superieur_id, $agence_id, $moyen_transport,$grh;
    public $objetTitre, $date_debut, $date_fin, $duree, $heure_depart, $heure_retour;

    public $reponsableDCH;

    public $optionsObjet = [
        'Formation' => 'hidden',
        'Semaire' => 'hidden',
        'Accompagnement' => 'hidden',
        'Autre' => 'text',
    ];

    public $optionsMoyenTransport = [
        'Voiture BIM sa' => 'hidden',
        'Train' => 'hidden',
        'Car' => 'hidden',
        'Avion' => 'text',
    ];

    protected function rules()
    {
        return [
            'agent_id' => 'required|integer',
            'superieur_id' => 'required|integer',
            'agence_id' => 'required|integer',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date',
            'objet' => 'required|string',
            'moyen_transport' => 'required|string',
        ];
    }

    public function updated($champs)
    {
        $this->validateOnly($champs);
    }


    public function mount()
    {
        $this->ordreMissions = OrdreMission::get();
        $this->agents = Agent::get();
        $this->agences = Agence::get();
        $agentDCH = Agent::where('poste_id',82)->first();
        $this->grh = $agentDCH->prenom.''.$agentDCH->nom;

    }

    public function activeContent()
    {
        $this->afficherForm = true;
        $this->afficherListe = false;
    }

    public function retour()
    {
        $this->afficherListe = true;
        $this->afficherForm = false;
    }

    public function updatedDateDebut($value)
    {
        $this->calculateDuree();
    }

    public function updatedDateFin($value)
    {
        $this->calculateDuree();
    }

    private function calculateDuree()
    {
        if ($this->date_debut && $this->date_fin) {
            $start = new \DateTime($this->date_debut);
            $end = new \DateTime($this->date_fin);
            $diff = $start->diff($end);

            $this->duree = $diff->days;
        } else {
            $this->duree = null;
        }
    }

    public function SaveOrdreMission()
    {
        $validatedData = $this->validate();
        try {
            $ordreMission = new OrdreMission();
            $ordreMission->numero = '000';
            $ordreMission->objet = $validatedData['objet'];
            $ordreMission->objetTitre = $this->objetTitre;
            $ordreMission->date_debut = $validatedData['date_debut'];
            $ordreMission->date_fin = $validatedData['date_fin'];
            $ordreMission->duree = $this->duree;
            $ordreMission->moyen_transport = $validatedData['moyen_transport'];
            $ordreMission->heure_depart = $this->heure_depart;
            $ordreMission->heure_retour = $this->heure_retour;
            $ordreMission->agent_id = $validatedData['agent_id'];
            $ordreMission->agence_id = $validatedData['agence_id'];
            $ordreMission->superieur_id = $validatedData['superieur_id'];
            $ordreMission->grh = $this->grh;
            $ordreMission->save();
            $numero = 'ORM-' . str_pad($ordreMission->id, 3, '0', STR_PAD_LEFT);
            $ordreMission->numero = $numero;
            $ordreMission->save();
            session()->flash('success','Operation effectue avec success');
            return redirect('admin/ordre-missions');
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('error', 'Un probleme est survenue lors du traitement de la page'.$th);
            // return redirect('admin/ordre-missions');
        }

    }

    public function editOrdreMission($id)
    {
        $this->editOrdreForm = true;
        $this->afficherListe = false;
        $this->afficherForm = false;
    }

    public function render()
    {
        return view('livewire.admin.order-mission.index');
    }
}
