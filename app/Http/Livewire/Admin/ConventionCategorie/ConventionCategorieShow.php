<?php

namespace App\Http\Livewire\Admin\ConventionCategorie;

use Livewire\Component;
use App\Models\Convention;
use App\Models\ConventionCategorie;

class ConventionCategorieShow extends Component
{
    public $conventions, $conventionCategories, $libelle, $montant, $id_convention_categorie, $convention_id;
    protected function rules()
    {
        return [
            'libelle' => 'required|string',
            'montant' => 'required|string',
            'convention_id' => 'required|integer',
        ];
    }

    public function updated($champs)
    {
        $this->validateOnly($champs);
    }

    public function saveConventionCategorie()
    {
        $validatedData = $this->validate();
        try {
            $dep = new ConventionCategorie();
            $dep->convention_id = $validatedData['convention_id'];
            $dep->libelle = $validatedData['libelle'];
            $dep->montant = $validatedData['montant'];
            $dep->save();
            session()->flash('message', 'Convention Categorie ajouter avec Success');
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('error', $th);
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        }
    }

    public function edit_convention_categorie(int $id_convention_categorie)
    {
        $dep = ConventionCategorie::find($id_convention_categorie);
        if ($dep) {
            $this->id_convention_categorie = $id_convention_categorie;
            $this->convention_id = $dep->convention_id;
            $this->libelle = $dep->libelle;
            $this->montant = $dep->montant;
        }
    }

    public function updateConventionCategorie()
    {
        $validatedData = $this->validate();
        try {
            $dep = ConventionCategorie::find($this->id_convention_categorie);
            $dep->libelle = $validatedData['libelle'];
            $dep->convention_id = $validatedData['convention_id'];
            $dep->libelle = $validatedData['libelle'];
            $dep->montant = $validatedData['montant'];
            $dep->save();
            session()->flash('message', 'Convention Categorie Modifié avec Success');
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('error', $th);
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        }
    }

    public function delete_convention_categorie(int $id_convention_categorie)
    {
        $this->id_convention_categorie = $id_convention_categorie;
    }

    public function destroyConventionCategorie()
    {
        try {
            ConventionCategorie::where('id', $this->id_convention_categorie)->delete();
            session()->flash('message', 'Convention Categorie Supprimé avec Success');
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('error', $th);
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        }
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->libelle = '';
        $this->montant = '';
        $this->convention_id = '';
    }
    public function render()
    {
        $this->conventions = Convention::get();
        $this->conventionCategories = ConventionCategorie::get();
        return view('livewire.admin.convention-categorie.convention-categorie-show');
    }
}
