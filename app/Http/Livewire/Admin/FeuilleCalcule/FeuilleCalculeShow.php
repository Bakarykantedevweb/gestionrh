<?php

namespace App\Http\Livewire\Admin\FeuilleCalcule;

use Livewire\Component;
use App\Models\FeuilleCalcule;

class FeuilleCalculeShow extends Component
{
    public $FeuilledeCalcules, $code, $libelle, $feuille_id;

    protected function rules()
    {
        return [
            'code' => 'required|string',
            'libelle' => 'required|string',
        ];
    }

    public function updated($champs)
    {
        $this->validateOnly($champs);
    }

    public function saveFeuilledeCalcule()
    {
        $validatedData = $this->validate();
        try {
            $dep = new FeuilleCalcule();
            $dep->code = $validatedData['code'];
            $dep->libelle = $validatedData['libelle'];
            $dep->save();
            session()->flash('message', 'Feuille de Calcule ajouter avec Success');
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('error', $th);
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        }
    }

    public function editFeuilledeCalcule(int $feuille_id)
    {
        $dep = FeuilleCalcule::find($feuille_id);
        if ($dep) {
            $this->feuille_id = $feuille_id;
            $this->code = $dep->code;
            $this->libelle = $dep->libelle;
        }
    }

    public function updateFeuilledeCalcule()
    {
        $validatedData = $this->validate();
        try {
            $dep = FeuilleCalcule::find($this->feuille_id);
            $dep->code = $validatedData['code'];
            $dep->libelle = $validatedData['libelle'];
            $dep->save();
            session()->flash('message', 'Feuille de Calcule Modifié avec Success');
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('error', $th);
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        }
    }

    public function deleteFeuilledeCalcule(int $feuille_id)
    {
        $this->feuille_id = $feuille_id;
    }

    public function destroyFeuilledeCalcule()
    {
        try {
            FeuilleCalcule::where('id', $this->feuille_id)->delete();
            session()->flash('message', 'Feuille de Calcule Supprimé avec Success');
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
        $this->code = '';
        $this->libelle = '';
    }
    public function render()
    {
        $this->FeuilledeCalcules = FeuilleCalcule::get();
        return view('livewire.admin.feuille-calcule.feuille-calcule-show');
    }
}