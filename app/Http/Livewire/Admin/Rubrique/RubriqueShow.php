<?php

namespace App\Http\Livewire\Admin\Rubrique;

use Livewire\Component;
use App\Models\Rubrique;
use App\Models\NatureRubrique;

class RubriqueShow extends Component
{
    public $natures, $rubriques,$nature_id,$code,$libelle;
    protected function rules()
    {
        return [
            'code' => 'required|string',
            'libelle' => 'required|string',
            'nature_id' => 'required|integer',
        ];
    }

    public function updated($champs)
    {
        $this->validateOnly($champs);
    }

    public function saveRubrique()
    {
        $validatedData = $this->validate();
        try {
            $dep = new Rubrique();
            $dep->nature_id = $validatedData['nature_id'];
            $dep->libelle = $validatedData['libelle'];
            $dep->code = $validatedData['code'];
            $dep->save();
            session()->flash('message', 'Rubrique ajouter avec Success');
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('error', $th);
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        }
    }

    public function edit_rubrique(int $nature_id)
    {
        $dep = Rubrique::find($nature_id);
        if ($dep) {
            $this->nature_id = $nature_id;
            $this->nature_id = $dep->nature_id;
            $this->libelle = $dep->libelle;
            $this->code = $dep->code;
        }
    }

    public function updateRubrique()
    {
        $validatedData = $this->validate();
        try {
            $dep = Rubrique::find($this->nature_id);
            $dep->nature_id = $validatedData['nature_id'];
            $dep->libelle = $validatedData['libelle'];
            $dep->code = $validatedData['code'];
            $dep->save();
            session()->flash('message', 'Rubrique Modifié avec Success');
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('error', 'Une erreur est survenue lors de la modification de la rubrique'.$th);
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        }
    }

    public function delete_rubrique(int $nature_id)
    {
        $this->nature_id = $nature_id;
    }

    public function destroyRubrique()
    {
        try {
            Rubrique::where('id', $this->nature_id)->delete();
            session()->flash('message', 'Rubrique Supprimé avec Success');
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
        $this->code = '';
        $this->nature_id = '';
    }

    public function render()
    {
        $this->natures = NatureRubrique::get();
        $this->rubriques = Rubrique::get();
        return view('livewire.admin.rubrique.rubrique-show');
    }
}
