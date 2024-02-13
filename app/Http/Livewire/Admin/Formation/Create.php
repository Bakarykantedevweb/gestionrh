<?php

namespace App\Http\Livewire\Admin\Formation;

// Create.php

use App\Mail\FormationMailAgent;
use Carbon\Carbon;
use App\Models\Agent;
use Livewire\Component;
use App\Models\Formateur;
use App\Models\Formation;
use App\Models\TypeFormation;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Mail;

class Create extends Component
{
    use WithFileUploads;

    public $typeFormations, $formateurs, $agents;
    public $search = '';
    public $type_formation_id, $formateur_id, $titre, $status;
    public $date_debut, $date_fin;
    public $heure, $fichier, $description;
    public $agentListes = [];

    protected function rules()
    {
        return [
            'type_formation_id' => 'required|integer',
            'formateur_id' => 'required|integer',
            'titre' => 'required|string',
            'status' => 'required|integer',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date',
            'description' => 'required|string',
            'heure' => 'required'
        ];
    }

    public function updated($champs)
    {
        $this->validateOnly($champs);
    }

    public function SaveFormation()
    {
        $validatedData = $this->validate();

        // try {
            $formation = new Formation();
            $formation->titre = $validatedData['titre'];
            $formation->description = $validatedData['description'];
            $formation->date_debut = $validatedData['date_debut'];
            $formation->date_fin = $validatedData['date_fin'];
            $formation->status = $validatedData['status'];
            $formation->heure = $validatedData['heure'];
            $fichierName = Carbon::now()->timestamp . '.' . $this->fichier->extension();
            $this->fichier->storeAs('admin/formation/fichier/', $fichierName);
            $formation->fichier = $fichierName;
            $formation->type_formation_id = $validatedData['type_formation_id'];
            $formation->formateur_id = $validatedData['formateur_id'];
            $formation->save();
            if($formation){
                $formation->agents()->attach($this->agentListes);
                foreach ($this->agentListes as $isChecked) {
                    if ($isChecked) {
                        $agent = Agent::find($isChecked);
                        if ($agent) {
                            $data = [
                                'formation' => $formation
                            ];
                            Mail::to($agent->email)
                            ->queue(new FormationMailAgent($data));
                        }
                    }
                }
            }
            toastr()->success('Formation ajoutée avec success');
            return redirect('admin/formations');
        // } catch (\Throwable $th) {
        //     //throw $th;
        //     toastr()->error($th);
        // }
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

        return view('livewire.admin.formation.create');
    }
}
