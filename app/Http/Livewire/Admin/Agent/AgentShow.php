<?php

namespace App\Http\Livewire\Admin\Agent;

use App\Mail\WelcomeAgent;
use Carbon\Carbon;
use App\Models\Agent;
use App\Models\Poste;
use Livewire\Component;
use App\Models\Departement;
use App\Models\Diplome;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Livewire\WithFileUploads;

class AgentShow extends Component
{
    use WithFileUploads;
    public $agents,$departements,$postes = [], $diplomes;
    public $prenom,$nom,$age,$email, $sexe,$telephone,$departement_id,$poste_id;
    public $search = '';
    public $jour,$mois,$annee, $nombre;
    public $agent_id;
    public $classification_id,$diplome_id,$profile,$photo;
    protected function rules()
    {
        return [
            'prenom' => 'required|string',
            'nom' => 'required|string',
            'jour' => 'required',
            'mois' => 'required',
            'annee' => 'required',
            'age' => 'required|integer',
            'email' => 'required|email|',
            'telephone' => 'required|integer|min:8',
            'departement_id' => 'required|integer',
            'poste_id' => 'required|integer',
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
            if($this->agent_id){
                $agent = Agent::find($this->agent_id);
            }else{
                $agent = new Agent();
                $data = [
                    'nom' => $validatedData['nom'],
                    'prenom' => $validatedData['prenom'],
                    'email' => $validatedData['email']
                ];
                Mail::to($validatedData['email'])
                ->queue(new WelcomeAgent($data));
            }
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
                session()->flash('message', 'Operation effectue avec Success');
                $this->resetInput();
                $this->dispatchBrowserEvent('close-modal');
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('error', $th);
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        }
    }

    public function editAgent($id)
    {
        $agent = Agent::find(decrypt($id));
        if ($agent) {
            $this->agent_id = $agent->id;
            $this->prenom = $agent->prenom;
            $this->nom = $agent->nom;
            $this->email = $agent->email;
            $this->jour = $agent->jour;
            $this->mois = $agent->mois;
            $this->annee = $agent->annee;
            $this->age = $agent->age;
            $this->telephone = $agent->telephone;
            $this->departement_id = $agent->departement_id;
            $this->poste_id = $agent->poste_id;
            $this->sexe = $agent->sexe;
        }
    }

    public function deleteAgent($id)
    {
        $this->agent_id = decrypt($id);
    }

    public function destroyAgent()
    {
        Agent::where('id', $this->agent_id)->delete();
        toastr()->success('Operation effectue avec Success');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->prenom = '';
        $this->nom = '';
        $this->jour = '';
        $this->mois = '';
        $this->annee = '';
        $this->age = '';
        $this->email = '';
        $this->telephone = '';
        $this->departement_id = '';
        $this->poste_id = '';
        $this->sexe = '';
    }

    public function activer(int $agent_id)
    {
        $agent = Agent::findOrFail($agent_id); // Retrouver l'agent par ID

        $agent->unblockAccount();
        $agent->resetLoginAttempts();

        return redirect()->route('agent.index')
        ->with('message', 'Le compte de l\'agent a été activé.');
    }

    public function render()
    {
        $this->agents = Agent::get();
        $this->departements = Departement::get();
        $this->diplomes = Diplome::get();
        return view('livewire.admin.agent.agent-show');
    }
}
