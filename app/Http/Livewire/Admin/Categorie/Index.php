<?php

namespace App\Http\Livewire\Admin\Categorie;

use App\Models\Categorie;
use Livewire\Component;

class Index extends Component
{
    public $categories,$libelle,$montant,$cate_id;
    protected function rules()
    {
        return [
            'libelle' => 'required|string',
            'montant' => 'required|string',
        ];
    }

    public function updated($champs)
    {
        $this->validateOnly($champs);
    }

    public function saveCategorie()
    {
        $validatedData = $this->validate();
        try {
            $dep = new Categorie();
            $dep->libelle = $validatedData['libelle'];
            $dep->montant = $validatedData['montant'];
            $dep->save();
            session()->flash('message', 'Categorie ajoutée avec Success');
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('error', $th);
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        }
    }

    public function editCategorie(int $cate_id)
    {
        $dep = Categorie::find($cate_id);
        if ($dep) {
            $this->cate_id = $cate_id;
            $this->libelle = $dep->libelle;
            $this->montant = $dep->montant;
        }
    }

    public function updateCategorie()
    {
        $validatedData = $this->validate();
        try {
            $dep = Categorie::find($this->cate_id);
            $dep->libelle = $validatedData['libelle'];
            $dep->montant = $validatedData['montant'];
            $dep->save();
            session()->flash('message', 'Categorie Modifiée avec Success');
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('error', $th);
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        }
    }

    public function deleteCategorie(int $cate_id)
    {
        $this->cate_id = $cate_id;
    }

    public function destroyCategorie()
    {
        try {
            Categorie::where('id', $this->cate_id)->delete();
            session()->flash('message', 'Categorie Supprimée avec Success');
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
    }
    public function render()
    {
        $this->categories = Categorie::get();
        return view('livewire.admin.categorie.index');
    }
}
