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
            session()->flash('message', 'Convention ajouter avec Success');
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
        }
    }

    public function updateConvention()
    {
        $validatedData = $this->validate();
        try {
            $dep = Convention::find($this->id_convention);
            $dep->libelle = $validatedData['libelle'];
            $dep->save();
            session()->flash('message', 'Convention Modifié avec Success');
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        } catch (\Throwable $th) {
            //throw $th;
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
