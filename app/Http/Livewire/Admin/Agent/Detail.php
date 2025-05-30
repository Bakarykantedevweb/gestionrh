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
use App\Mail\GenererPasswordMail;
use Illuminate\Support\Facades\Hash;

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

    function genererMotDePasse($longueur = 12)
    {
        $caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()';
        $motDePasse = '';

        for ($i = 0; $i < $longueur; $i++) {
            $motDePasse .= $caracteres[random_int(0, strlen($caracteres) - 1)];
        }

        return $motDePasse;
    }

    public function genererPassword()
    {
        $agent = \App\Models\Agent::where('id',$this->agent->id)->first();
        $agent->unblockAccount();
        $agent->resetLoginAttempts();
        $password = $this->genererMotDePasse();
        $agent->password = Hash::make($password);
        $agent->password_changed = false;
        $agent->save();
        $data = [
            'nom' => $agent->nom,
            'prenom' => $agent->prenom,
            'email' => $agent->email,
            'password' => $password,  // Envoyer le mot de passe en clair par email (attention à la sécurité)
        ];

        \Illuminate\Support\Facades\Mail::to($agent->email)->queue(new GenererPasswordMail($data));

        toastr()->success('Le Mot de passe a ete genere avec success');
    }

    public function render()
    {
        return view('livewire.admin.agent.detail');
    }
}
