<?php

namespace App\Http\Livewire\Admin\Convention;

use Livewire\Component;
use App\Models\Categorie;
use App\Models\Convention;

class ConventionShow extends Component
{
    public $conventions, $categories,$libelle,$id_convention;
    public $selectCategorie = [];
    protected function rules()
    {
        return [
            'libelle' => 'required|string',
        ];
    }

    public function updated($champs)
    {
        $this->validateOnly($champs);
    }

    public function saveConvention()
    {
        $validatedData = $this->validate();
        try {
            $dep = new Convention();
            $dep->libelle = $validatedData['libelle'];
            $dep->save();
            if ($dep) {
                $dep->categories()->attach($this->selectCategorie);
            }
            toastr()->success('Convention ajouter avec Success');
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('error', $th);
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        }
    }

    public function edit_convention(int $id_convention)
    {
        $dep = Convention::find($id_convention);
        if ($dep) {
            $this->id_convention = $id_convention;
            $this->libelle = $dep->libelle;

            // Récupérez les catégories associées à la convention
            $selectedCategories = $dep->categories->pluck('id')->toArray();
            $this->selectCategorie = $selectedCategories;
        }
    }


    public function updateConvention()
    {
        $validatedData = $this->validate();

        try {
            // Recherchez la convention que vous souhaitez mettre à jour par son ID
            $dep = Convention::find($this->id_convention);

            if ($dep) {
                // Mettez à jour les attributs de la convention
                $dep->libelle = $validatedData['libelle'];
                $dep->save();

                // Supprimez les catégories existantes associées à la convention
                $dep->categories()->detach();

                // Ajoutez les nouvelles catégories sélectionnées
                $dep->categories()->attach($this->selectCategorie);

                toastr()->success('Convention mise à jour avec succès');
            }

            // Réinitialisez les données du formulaire et fermez la modal
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        } catch (\Throwable $th) {
            session()->flash('error', $th);
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        }
    }


    public function delete_convention(int $id_convention)
    {
        $this->id_convention = $id_convention;
    }

    public function destroyConvention()
    {
        try {
            Convention::where('id', $this->id_convention)->delete();
            session()->flash('message', 'Convention Supprimé avec Success');
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
        $this->selectCategorie = [];
    }
    public function render()
    {
        $this->conventions = Convention::get();
        $this->categories = Categorie::get();
        return view('livewire.admin.convention.convention-show');
    }
}
