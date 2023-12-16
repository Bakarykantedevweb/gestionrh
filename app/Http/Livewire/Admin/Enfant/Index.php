<?php

namespace App\Http\Livewire\Admin\Enfant;

use Carbon\Carbon;
use App\Models\Agent;
use App\Models\Enfant;
use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithFileUploads;
    public $agents;
    public $prenom, $nom, $age;
    public $jour, $mois, $annee;
    public $agent_id;
    public $photo;
    public $enfants;

    protected function rules()
    {
        return [
            'prenom' => 'required|string',
            'nom' => 'required|string',
            'jour' => 'required',
            'mois' => 'required',
            'annee' => 'required',
            'age' => 'required|integer',
            'agent_id' => 'required|integer',
            'photo' => 'image|max:1024|file|mimes:png,jpg,jpeg',
        ];
    }

    public function updated($champs)
    {
        $this->validateOnly($champs);
    }

    public function updatedAnnee()
    {
        if (!empty($this->annee)) {
            $currentYear = date('Y');
            $this->age = $currentYear - $this->annee;
        }
    }

    public function saveEnfant()
    {
        $validatedData = $this->validate();
        try {
            $enfant = new Enfant();
            $enfant->nom = $validatedData['nom'];
            $enfant->prenom = $validatedData['prenom'];
            $enfant->jour = $validatedData['jour'];
            $enfant->mois = $validatedData['mois'];
            $enfant->annee = $validatedData['annee'];
            $enfant->age = $validatedData['age'];
            $imageName = Carbon::now()->timestamp . '.' . $this->photo->extension();
            $this->photo->storeAs('admin/acte/', $imageName);
            $enfant->piece_jointe = $imageName;
            $enfant->agent_id = $validatedData['agent_id'];
            $enfant->save();
            toastr()->success('Enfant creer avec success');
            return redirect('admin/enfants');
        } catch (\Throwable $th) {
            toastr()->error($th);
            return redirect('admin/enfants');
        }
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->nom = '';
        $this->prenom = '';
        $this->jour = '';
        $this->mois = '';
        $this->annee = '';
        $this->jour = '';
        $this->agent_id = '';
        $this->photo = '';
    }

    public function render()
    {
        $this->enfants = Enfant::get();
        $this->agents = Agent::where('sexe','M')->get();
        return view('livewire.admin.enfant.index');
    }
}
