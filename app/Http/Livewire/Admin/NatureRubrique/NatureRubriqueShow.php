<?php

namespace App\Http\Livewire\Admin\NatureRubrique;

use App\Models\Formule;
use Livewire\Component;
use App\Models\NatureRubrique;

class NatureRubriqueShow extends Component
{
    public $natureRubriques, $formule_id, $libelle, $nature_id;
    public $formules;
    protected function rules()
    {
        return [
            'libelle' => 'required|string',
            'formule_id' => 'required|integer',
        ];
    }

    public function updated($champs)
    {
        $this->validateOnly($champs);
    }

    public function saveNatureRubrique()
    {
        $validatedData = $this->validate();
        try {
            $natureRubrique = new NatureRubrique();
            $natureRubrique->formule_id = $validatedData['formule_id'];
            $natureRubrique->libelle = $validatedData['libelle'];
            $natureRubrique->save();
            session()->flash('message', 'natureRubrique ajouter avec Success');
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('error', $th);
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        }
    }

    public function editnatureRubrique(int $nature_id)
    {
        $natureRubrique = NatureRubrique::find($nature_id);
        if ($natureRubrique) {
            $this->nature_id = $nature_id;
            $this->formule_id = $natureRubrique->formule_id;
            $this->libelle = $natureRubrique->libelle;
        }
    }

    public function updateNatureRubrique()
    {
        $validatedData = $this->validate();
        try {
            $natureRubrique = NatureRubrique::find($this->nature_id);
            $natureRubrique->formule_id = $validatedData['formule_id'];
            $natureRubrique->libelle = $validatedData['libelle'];
            $natureRubrique->save();
            session()->flash('message', 'natureRubrique Modifié avec Success');
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('error', $th);
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        }
    }

    public function deletenatureRubrique(int $nature_id)
    {
        $this->nature_id = $nature_id;
    }

    public function destroyNatureRubrique()
    {
        try {
            NatureRubrique::where('id', $this->nature_id)->delete();
            session()->flash('message', 'natureRubrique Supprimé avec Success');
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
        $this->formule_id = '';
    }
    public function render()
    {
        $this->natureRubriques = NatureRubrique::get();
        $this->formules = Formule::get();
        return view('livewire.admin.nature-rubrique.nature-rubrique-show');
    }
}
