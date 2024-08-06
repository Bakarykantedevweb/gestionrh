<?php

namespace App\Http\Livewire\Admin\Agent;

use Carbon\Carbon;
use App\Models\Periode;
use Livewire\Component;
use App\Models\Bulletin;
use App\Models\Education;
use App\Models\Affectation;
use Livewire\WithFileUploads;
use App\Models\ContratRubrique;
use App\Models\BulletinRubrique;

class Detail extends Component
{
    use WithFileUploads;
    public $agent;
    public $contrat;
    public $contratRubriques;
    public $affectations;
    public $educations;


    public $nom_diplome, $nom_universite, $date_debut,$date_fin,$fichier;

    public function mount()
    {
        $this->contrat = $this->agent->contrat;
        $this->contratRubriques = ContratRubrique::where('contrat_id', $this->contrat->id)->get();
        $this->affectations = Affectation::where('agent_id', $this->agent->id)->OrderBy('id', 'asc')->get();
        $this->educations = Education::where('agent_id', $this->agent->id)->get();
    }

    protected function rules()
    {
        return [
            'nom_diplome' => 'required|string',
            'nom_universite' => 'required|string',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date',
        ];
    }

    public function updated($champs)
    {
        $this->validateOnly($champs);
    }

    public function SaveEducation()
    {
        $validatedData = $this->validate();
        try {
            $education = new Education;
            $education->nom_diplome = $validatedData['nom_diplome'];
            $education->nom_universite = $validatedData['nom_universite'];
            $education->date_debut = $validatedData['date_debut'];
            $education->date_fin = $validatedData['date_fin'];
            $imageName = Carbon::now()->timestamp . '.' . $this->fichier->extension();
            $this->fichier->storeAs('admin/education/', $imageName);
            $education->fichier = $imageName;
            $education->agent_id = $this->agent->id;
            $education->save();
            toastr()->success('Diplome ajoute avec success');
            return redirect('admin/agents/'.$this->contrat->agent->matricule.'/detail');
        } catch (\Throwable $th) {
            //throw $th;
            toastr()->error('Une erreur est survenue lors traitement de la page',$th);
        }
    }
    public function render()
    {
        return view('livewire.admin.agent.detail');
    }
}
