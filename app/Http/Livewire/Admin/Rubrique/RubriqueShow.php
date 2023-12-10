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
            $rubrique = new Rubrique();
            $rubrique->nature_rubrique_id = $validatedData['nature_id'];
            $rubrique->libelle = $validatedData['libelle'];
            $rubrique->code = $validatedData['code'];
            $rubrique->save();
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
        $rubrique = Rubrique::find($nature_id);
        if ($rubrique) {
            $this->nature_id = $nature_id;
            $this->nature_id = $rubrique->nature_rubrique_id;
            $this->libelle = $rubrique->libelle;
            $this->code = $rubrique->code;
        }
    }

    public function updateRubrique()
    {
        $validatedData = $this->validate();
        try {
            $rubrique = Rubrique::find($this->nature_id);
            $rubrique->nature_rubrique_id = $validatedData['nature_id'];
            $rubrique->libelle = $validatedData['libelle'];
            $rubrique->code = $validatedData['code'];
            $rubrique->save();
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
        $this->rubriques = Rubrique::orderBy('libelle', 'asc')->get();;
        return view('livewire.admin.rubrique.rubrique-show');
    }
}
