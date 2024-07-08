<?php

namespace App\Http\Livewire\Agent\Profile;

use App\Models\Agent;
use Livewire\Component;
use App\Models\Affectation;
use App\Models\ContratRubrique;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Index extends Component
{
    public $agent;
    public $contrat;
    public $contratRubriques;
    public $affectations;
    public $detail = true;
    public $parametre = false;
    public $affectation = false;

    public $old_password, $new_password, $confirm_password;

    public function mount()
    {
        $this->contrat = $this->agent->contrat;
        $this->contratRubriques = ContratRubrique::where('contrat_id', $this->contrat->id)->get();
        $this->affectations = Affectation::where('agent_id', $this->agent->id)->OrderBy('id', 'asc')->get();
        // dd($this->affectations);
    }

    private function disableContents()
    {
        $this->detail = false;
        $this->parametre = false;
        $this->affectation = false;
    }

    public function activeContent(string $content)
    {
        $content = decrypt($content);
        $this->disableContents();
        $this->$content = true;
    }

    protected function rules()
    {
        return [
            'old_password' => 'required',
            'new_password' => 'required|min:8',
        ];
    }
    public function updated($champs)
    {
        $this->validateOnly($champs);
    }

    public function UpdatePassword()
    {
        $validatedData = $this->validate();
        $agent = Agent::where('id', Auth::guard('webagent')->user()->id)->first();
        if (!password_verify($validatedData['old_password'], $agent->password)) {
            toastr()->error("L'ancien mot de passe n'est pas correcte");
            $this->old_password = '';
        }

        if (!$validatedData['new_password'] != $this->confirm_password)
        {
            $agent->password = Hash::make($validatedData['new_password']);
            $agent->save();
            toastr()->success('Votre Mot de passe a ete modifié avec success');
            $this->old_password = '';
            $this->detail = true;
            $this->parametre = false;
        }
        else
        {
            toastr()->error("Les deux mots de passe ne sont pas les memes");
            $this->new_password = '';
            $this->confirm_password = '';
        }

    }

    public function render()
    {
        return view('livewire.agent.profile.index');
    }
}
