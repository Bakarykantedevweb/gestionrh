<?php

namespace App\Http\Livewire\Admin\Formation;

use Carbon\Carbon;
use App\Models\Agent;
use Livewire\Component;
use App\Models\Formateur;
use App\Models\Formation;
use App\Models\TypeFormation;
use Livewire\WithFileUploads;
use App\Models\AgentFormation;
use PhpOffice\PhpSpreadsheet\Calculation\TextData\Format;

class Index extends Component
{
    use WithFileUploads;
    public $formations;
    public $formationsTerminees;
    public $formationsListes = true;
    public $formationsEdit = false;
    public $formation_id;

    public $typeFormations, $formateurs, $agents;
    public $search = '';
    public $type_formation_id, $formateur_id, $titre, $status;
    public $date_debut, $date_fin;
    public $heure, $fichier, $description;
    public $agentListes = [];

    public $FormationEnCour = true;
    public $FormationTerminee = false;


    public function activeContent(string $content)
    {
        $content = decrypt($content);
        $this->disableContents();
        $this->$content = true;
    }

    private function disableContents()
    {
        $this->FormationEnCour = false;
        $this->FormationTerminee = false;
    }

    protected function rules()
    {
        return [
            'type_formation_id' => 'required|integer',
            'formateur_id' => 'required|integer',
            'titre' => 'required|string',
            'status' => 'required|integer',
            'date_debut' => 'required',
            'date_fin' => 'required',
            'description' => 'required|string',
            'heure' => 'required',
        ];
    }

    public function updated($champs)
    {
        $this->validateOnly($champs);
    }

    public function changeContent($id)
    {
        $this->formation_id = $id;
        $formation = Formation::find($this->formation_id);
        $this->titre = $formation->titre;
        $this->status = $formation->status;
        $this->date_debut = $formation->date_debut;
        $this->date_fin = $formation->date_fin;
        $this->description = $formation->description;
        $this->type_formation_id = $formation->type_formation_id;
        $this->formateur_id = $formation->formateur_id;
        $selectedAgents = $formation->agents->pluck('id')->toArray();
        $this->agentListes = $selectedAgents;
        $this->heure = $formation->heure;
        $this->fichier = $formation->fichier;
        $this->formationsListes = false;
        $this->formationsEdit = true;
    }

    public function SaveFormation()
    {
        $validatedData = $this->validate();

        $validatedData = $this->validate();

        try {
            $formation = Formation::find($this->formation_id);
            $formation->titre = $validatedData['titre'];
            $formation->description = $validatedData['description'];
            $formation->date_debut = $validatedData['date_debut'];
            $formation->date_fin = $validatedData['date_fin'];
            $formation->status = $validatedData['status'];
            $formation->heure = $validatedData['heure'];
            if($this->fichier){
                $formation->fichier = $this->fichier;
            }else{
                $fichierName = Carbon::now()->timestamp . '.' . $this->fichier->extension();
                $this->fichier->storeAs('admin/formation/fichier/', $fichierName);
                $formation->fichier = $fichierName;
            }
            $formation->type_formation_id = $validatedData['type_formation_id'];
            $formation->formateur_id = $validatedData['formateur_id'];
            $formation->save();
            if ($formation) {
                $formation->agents()->detach();
                $formation->agents()->attach($this->agentListes);
            }
            toastr()->success('Formation ajoutée avec success');
            return redirect('admin/formations');
        } catch (\Throwable $th) {
            //throw $th;
            toastr()->error($th);
        }
    }

    public function deleteContent($id)
    {
        $this->formation_id = $id;
    }

    public function destroyFormation()
    {
        try {
            if (AgentFormation::where('formation_id', $this->formation_id)->exists()) {
                toastr()->error('Une Erreur est survenue lors du traitement de la page');
                return redirect('admin/formations');
            }
            Formation::where('id', $this->formation_id)->delete();
            toastr()->success('Formation supprimée succès');
            return redirect('admin/formations');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function render()
    {
        $this->typeFormations = TypeFormation::where('status', 1)->get();
        $this->formateurs = Formateur::orderBy('id', 'desc')->get();
        $this->agents = Agent::whereRaw('LOWER(prenom) like ?', ['%' . strtolower($this->search) . '%'])
            ->orWhereRaw('LOWER(nom) like ?', ['%' . strtolower($this->search) . '%'])
            ->orWhereHas('departement', function ($query) {
                $query->whereRaw('LOWER(code) like ?', ['%' . strtolower($this->search) . '%']);
            })
            ->orderBy('prenom', 'asc')->get();
        $this->formations = Formation::where('date_fin', '>=', now())->get();
        $this->formationsTerminees = Formation::where('date_fin','<',now())->get();
        return view('livewire.admin.formation.index');
    }
}
