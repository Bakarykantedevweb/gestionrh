<?php

namespace App\Http\Livewire\Admin\Stagiaire;


use App\Models\Agence;
use Livewire\Component;
use App\Models\Stagiaire;
use App\Models\Departement;


class Index extends Component
{
    public $departementSearchs;
    public $departements;
    public $stagiaire_id;
    public $departement_id, $agence_id, $nom, $prenom, $email, $telephone, $date_debut, $date_fin;
    public $stagiaires;
    public $stageTermines;
    public $agences;
    public $sexe;
    public $sexeS;

    public $matricule;
    public $departementId;
    public $agenceId;
    public $stagiaireAgences;

    public $stageEnCour = true;
    public $stageTermine = false;
    public $statistique = false;
    public $showInputs = false;

    public function changeType()
    {
        $this->showInputs = $this->agence_id == 1; // Vérifiez si l'ID est 2 pour le type CDD
    }

    private function disableContents()
    {
        $this->stageEnCour = false;
        $this->stageTermine = false;
        $this->statistique = false;
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
            'agence_id' => 'required|integer',
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email',
            'telephone' => 'required',
            'date_debut' => 'required',
            'date_fin' => 'required',
            'sexe' => 'required|string',
        ];
    }

    public function updated($champs)
    {
        $this->validateOnly($champs);
    }
    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->departement_id = '';
        $this->nom = '';
        $this->prenom = '';
        $this->email = '';
        $this->telephone = '';
        $this->date_debut = '';
        $this->date_fin = '';
        $this->agence_id = '';
        $this->sexe = '';
    }
    public function SaveStagiaire()
    {
        $validatedData = $this->validate();
        try {
            // Vérifier s'il s'agit d'une opération de mise à jour
            if (!$this->stagiaire_id) {
                // S'il ne s'agit pas d'une mise à jour, vérifier l'existence de l'e-mail et du téléphone
                if (Stagiaire::where('email', $validatedData['email'])->exists()) {
                    toastr()->error('E-mail déjà utilisé');
                    $this->email = '';
                } else if (Stagiaire::where('telephone', $validatedData['telephone'])->exists()) {
                    toastr()->error('Numéro de téléphone déjà utilisé');
                    $this->telephone = '';
                }
            }


            // Logique commune pour la sauvegarde et la mise à jour
            $stagiaire = new Stagiaire();
            if ($this->stagiaire_id) {
                $stagiaire = Stagiaire::find($this->stagiaire_id);
            }
            $stagiaire->matricule = '00000';
            $stagiaire->agence_id = $validatedData['agence_id'];
            $stagiaire->departement_id = $this->departement_id;
            $stagiaire->nom = $validatedData['nom'];
            $stagiaire->prenom = $validatedData['prenom'];
            $stagiaire->email = $validatedData['email'];
            $stagiaire->telephone = $validatedData['telephone'];
            $stagiaire->date_debut = $validatedData['date_debut'];
            $stagiaire->date_fin = $validatedData['date_fin'];
            $stagiaire->sexe = $validatedData['sexe'];
            $stagiaire->save();

            // Logique supplémentaire pour la sauvegarde et la mise à jour
            $matricule = 'STA' . str_pad($stagiaire->id, 2, '0', STR_PAD_LEFT);
            $stagiaire->matricule = $matricule;
            $stagiaire->save();

            session()->flash('message', 'Stagiaire ajouté avec succès');
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        } catch (\Throwable $th) {
            toastr()->error($th);
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        }
    }


    public function editStagiaire($id)
    {
        $stagiaire = Stagiaire::find($id);
        if ($stagiaire) {
            $this->stagiaire_id = $id;
            $this->departement_id = $stagiaire->departement_id;
            $this->agence_id = $stagiaire->agence_id;
            $this->nom = $stagiaire->nom;
            $this->prenom = $stagiaire->prenom;
            $this->email = $stagiaire->email;
            $this->telephone = $stagiaire->telephone;
            $this->date_debut = $stagiaire->date_debut;
            $this->date_fin = $stagiaire->date_fin;
            $this->sexe = $stagiaire->sexe;
        }
    }

    public function deleteStagiaire($id)
    {
        $this->stagiaire_id = $id;
    }

    public function destroyStagiaire()
    {
        try {
            Stagiaire::where('id', $this->stagiaire_id)->delete();
            toastr()->success('Stagiaire a été supprimé avec success');
            return redirect('admin/stagiaires');
        } catch (\Throwable $th) {
            //throw $th;
            toastr()->error('Une Erreur est survenue lors du traitement de la page');
            return redirect('admin/stagiaires');
        }
    }

    public function voirStagiaires($id)
    {
        $this->stagiaireAgences = Stagiaire::where('agence_id',$id)->get();
    }

    public function render()
    {
        $this->departementSearchs = Departement::get();
        $this->departements = Departement::get();
        $this->stagiaires = Stagiaire::when($this->matricule, function ($query) {
            $query->where('matricule', 'ILIKE', '%' . $this->matricule . '%');
        })
        ->when($this->departementId, function ($query) {
            $query->where('departement_id', $this->departementId);
        })
        ->when($this->agenceId, function ($query) {
            $query->where('agence_id', $this->agenceId);
        })
        ->when($this->sexeS, function ($query) {
            $query->where('sexe', $this->sexeS);
        })
        ->where('date_fin', '>=', now())
        ->get();

        $this->stageTermines = Stagiaire::when($this->matricule, function ($query) {
            $query->where('matricule', 'ILIKE', '%' . $this->matricule . '%');
        })->when($this->departementId, function ($query) {
            $query->where('departement_id', $this->departementId);
        })
        ->when($this->agenceId, function ($query) {
            $query->where('agence_id', $this->agenceId);
        })
        ->when($this->sexeS, function ($query) {
            $query->where('sexe', $this->sexeS);
        })
        ->where('date_fin', '<', now())
        ->get();

        if($this->statistique || $this->stageEnCour){

            $this->agences = Agence::where('status','0')->get();

        }
        return view('livewire.admin.stagiaire.index');
    }
}
