<?php

namespace App\Http\Livewire\Admin\NatureRubrique;

use App\Models\NatureRubrique;
use Livewire\Component;

class NatureRubriqueShow extends Component
{
    public $natureRubriques, $libelle, $nature_id;

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

    public function saveNatureRubrique()
    {
        $validatedData = $this->validate();
        try {
            $poste = new NatureRubrique();

            $poste->libelle = $validatedData['libelle'];
            $poste->save();
            session()->flash('message', 'Poste ajouter avec Success');
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
        $poste = NatureRubrique::find($nature_id);
        if ($poste) {
            $this->nature_id = $nature_id;
            $this->libelle = $poste->libelle;
        }
    }

    public function updateNatureRubrique()
    {
        $validatedData = $this->validate();
        try {
            $poste = NatureRubrique::find($this->nature_id);
            $poste->libelle = $validatedData['libelle'];
            $poste->save();
            session()->flash('message', 'Poste Modifié avec Success');
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
            session()->flash('message', 'Poste Supprimé avec Success');
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
    }
    public function render()
    {
        $this->natureRubriques = NatureRubrique::get();
        return view('livewire.admin.nature-rubrique.nature-rubrique-show');
    }
}
