<?php

namespace App\Http\Livewire\Agent\Conge;

use App\Models\Conge;
use Livewire\Component;
use App\Models\TypeConge;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $conges;
    public $typeConges;
    public $conge_id;

    public $afficherListe = true;
    public $afficherEdit = false;

    public $date_debut;
    public $date_fin;
    public $duree;
    public $motif;
    public $type_conge_id;



    public function mount()
    {
        $this->typeConges = TypeConge::get();
        $this->conges = Conge::where('agent_id',Auth::guard('webagent')->user()->id)->get();
    }

    protected function rules()
    {
        return [
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'motif' => 'required|string',
            'type_conge_id' => 'required',
        ];
    }

    public function updated($champs)
    {
        $this->validateOnly($champs);
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

    public function editConge($id)
    {
        $conge = Conge::find($id);
        if ($conge) {
            $this->conge_id = $conge->id;
            $this->type_conge_id = $conge->type_conge_id;
            $this->date_debut = $conge->date_debut;
            $this->date_fin = $conge->date_fin;
            $this->duree = $conge->duree;
            $this->motif = $conge->motif;

            $this->afficherEdit = true;
            $this->afficherListe = false;
        }
    }


    public function updateConge()
    {
        $validatedData = $this->validate();
        if ($this->duree > Auth::guard('webagent')->user()->contrat->nombre_jour_conge) {
            toastr()->error('Votre Solde est insuffisant');
            $this->date_fin = '';
            $this->duree = '';
        } else {
            $conge = Conge::find($this->conge_id);
            $conge->agent_id = Auth::guard('webagent')->user()->id;
            $conge->type_conge_id = $validatedData['type_conge_id'];
            $conge->date_debut = $validatedData['date_debut'];
            $conge->date_fin = $validatedData['date_fin'];
            $conge->duree = $this->duree;
            $conge->motif = $validatedData['motif'];
            $conge->save();
            toastr()->success('Votre demande a ete prise en compte');
            return redirect('agent/conges');
        }
    }


    public function render()
    {
        return view('livewire.agent.conge.index');
    }
}
