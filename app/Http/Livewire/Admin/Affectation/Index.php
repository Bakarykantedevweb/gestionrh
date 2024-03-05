<?php

namespace App\Http\Livewire\Admin\Affectation;

use App\Models\Agent;
use App\Models\Poste;
use App\Models\Agence;
use Livewire\Component;
use App\Models\Affectation;
use App\Models\Departement;

class Index extends Component
{
    public $affectations;
    public $date_fin;
    public $date_debut;
    public $affectation_id;
    public $agent_id;
    public $status;
    public $agences,$departements, $postes = [];
    public $agence_id,$departement_id,$poste_id;

    protected function rules()
    {
        return [
            'date_fin' => 'required|date',
        ];
    }

    public function updated($champs)
    {
        $this->validateOnly($champs);
    }


    public function MettreFin($id)
    {
        $affectation = Affectation::find($id);
        $this->affectation_id = $affectation->id;
        $this->date_debut = $affectation->date_debut;
    }


    public function updatedDepartementId($value)
    {
        $departement = Departement::find($value);
        $this->postes = $departement ? $departement->postes : [];
    }

    public function UpdateAffectation()
    {
        $validatedData = $this->validate([
            'status' => 'required',
            'date_fin' => 'required|date',
        ]);
        try {
            if($validatedData['date_fin'] < $this->date_debut)
            {
                toastr()->error('La date fin est inferieur a la date prise de service');
                $this->date_fin = '';
                // return redirect('admin/affectations');
            }
            else
            {
                $affectation = Affectation::find($this->affectation_id);
                $affectation->date_fin = $validatedData['date_fin'];
                $affectation->status = 1;
                $affectation->save();
                toastr()->success('Operation effectue avec success');
                return redirect('admin/affectations');
            }
        } catch (\Throwable $th) {
            session()->flash('error', $th);
            return redirect('admin/affectations');
        }

    }

    public function AddAffectation($agentID,$affectID)
    {
        $agent = Agent::find($agentID);
        $this->agent_id = $agent->id;
        $aff = Affectation::where('id',$affectID)->where('agent_id', $agentID)->first();
        $this->affectation_id = $aff->id;
        $this->date_fin = $aff->date_fin;
        $this->status = $aff->status;
    }

    public function SaveAffectation()
    {
        //dd($this->affectation_id);
        $validatedData = $this->validate([
            'date_debut' =>
            ['required', 'date', "after_or_equal:$this->date_fin"],
            'agence_id' => 'required|integer',
            'departement_id' => 'required|integer',
            'poste_id' => 'required|integer',
        ]);
        try {
                if(Affectation::where('agent_id', $this->agent_id)->where('departement_id', $validatedData['departement_id'])->where('poste_id',$validatedData['poste_id'])->exists())
                {
                    toastr()->error("L'agent a ete deja affecte sur ce poste");
                    $this->departement_id = '';
                    $this->poste_id = '';
                    // return redirect('admin/affectations');
                }
                else
                {
                    $affectation = new Affectation();
                    $affectation->agent_id = $this->agent_id;
                    $affectation->agence_id  = $validatedData['agence_id'];
                    $affectation->departement_id = $validatedData['departement_id'];
                    $affectation->poste_id = $validatedData['poste_id'];
                    $affectation->date_debut = $validatedData['date_debut'];
                    $affectation->save();
                    if($affectation)
                    {
                        $aff = Affectation::where('id', $this->affectation_id)->where('agent_id', $this->agent_id)->first();
                        $aff->status = 2;
                        $aff->save();

                    }
                    toastr()->success('Operation effectue avec success');
                    return redirect('admin/affectations');
                }
        } catch (\Throwable $th) {
            session()->flash('error', $th);
            return redirect('admin/affectations');
        }
    }


    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->date_fin = '';
    }
    public function render()
    {
        $this->affectations = Affectation::OrderBy('id','asc')->get();
        $this->departements = Departement::get();
        $this->agences = Agence::get();
        return view('livewire.admin.affectation.index');
    }
}
