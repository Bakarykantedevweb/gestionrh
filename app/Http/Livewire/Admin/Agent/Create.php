<?php

namespace App\Http\Livewire\Admin\Agent;

use App\Mail\WelcomeAgent;
use Carbon\Carbon;
use App\Models\Agent;
use Livewire\Component;
use App\Models\Departement;
use App\Models\Diplome;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public $agents, $departements, $postes = [], $diplomes;
    public $prenom, $nom, $age, $email, $sexe, $telephone, $departement_id, $poste_id;
    public $jour, $mois, $annee, $nombre;
    public $agent_id;
    public $classification_id, $diplome_id, $photo;

    protected function rules()
    {
        return [
            'prenom' => 'required|string',
            'nom' => 'required|string',
            'jour' => 'required',
            'mois' => 'required',
            'annee' => 'required',
            'age' => 'required|integer',
            'email' => 'required|email|unique:agents',
            'telephone' => 'required|integer|min:8',
            'departement_id' => 'required|integer',
            'poste_id' => 'required|integer|unique:agents',
            'sexe' => 'required|string',
            'photo' => 'image|max:1024',
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

    public function updatedDiplomeId($value)
    {
        $diplome = Diplome::find($value);
        $this->classification_id = $diplome ? $diplome->classification->nom : null;
    }

    public function updatedDepartementId($value)
    {
        $departement = Departement::find($value);
        $this->postes = $departement ? $departement->postes : [];
    }



    public function saveEmploye()
    {
        $validatedData = $this->validate();
        try {
            // $data = [
            //     'nom' => $validatedData['nom'],
            //     'prenom' => $validatedData['prenom'],
            //     'email' => $validatedData['email']
            // ];
            // Mail::to($validatedData['email'])
            //     ->queue(new WelcomeAgent($data));
            $agent = new Agent();
            $agent->matricule = '00000';
            $agent->prenom = $validatedData['prenom'];
            $agent->nom = $validatedData['nom'];
            $agent->email = $validatedData['email'];
            $agent->jour = $validatedData['jour'];
            $agent->mois = $validatedData['mois'];
            $agent->annee = $validatedData['annee'];
            $agent->age = $this->age;
            $agent->telephone = $validatedData['telephone'];
            $agent->departement_id = $validatedData['departement_id'];
            $agent->poste_id = $validatedData['poste_id'];
            $agent->sexe = $validatedData['sexe'];
            $imageName = Carbon::now()->timestamp . '.' . $this->photo->extension();
            $this->photo->storeAs('admin/agent/', $imageName);
            $agent->photo = $imageName;
            $agent->password = Hash::make('password');
            $agent->save();
            $matricule = 'MA' . str_pad($agent->id, 3, '0', STR_PAD_LEFT);
            $agent->matricule = $matricule;
            $agent->save();
            toastr()->success('Message', 'Operation effectue avec Success');
            return redirect('admin/agents');
        } catch (\Throwable $th) {
            //throw $th;
            toastr()->error('error', $th);
            return redirect()->back();
        }
    }
    public function render()
    {
        $this->agents = Agent::get();
        $this->departements = Departement::get();
        $this->diplomes = Diplome::get();
        return view('livewire.admin.agent.create');
    }
}
