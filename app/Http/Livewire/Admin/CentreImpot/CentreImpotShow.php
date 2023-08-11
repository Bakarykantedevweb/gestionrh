<?php

namespace App\Http\Livewire\Admin\CentreImpot;

use App\Models\CentreImpot;
use Livewire\Component;

class CentreImpotShow extends Component
{
    public $CentreImpots, $libelle, $id_centre_impot;
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

    public function saveCentreImpot()
    {
        $validatedData = $this->validate();
        try {
            $dep = new CentreImpot();
            $dep->libelle = $validatedData['libelle'];
            $dep->save();
            session()->flash('message', 'Centre Impot ajouter avec Success');
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('error', $th);
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        }
    }

    public function edit_CentreImpot(int $id_centre_impot)
    {
        $dep = CentreImpot::find($id_centre_impot);
        if ($dep) {
            $this->id_centre_impot = $id_centre_impot;
            $this->libelle = $dep->libelle;
        }
    }

    public function updateCentreImpot()
    {
        $validatedData = $this->validate();
        try {
            $dep = CentreImpot::find($this->id_centre_impot);
            $dep->libelle = $validatedData['libelle'];
            $dep->save();
            session()->flash('message', 'Centre Impot Modifié avec Success');
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('error', $th);
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        }
    }

    public function delete_CentreImpot(int $id_centre_impot)
    {
        $this->id_centre_impot = $id_centre_impot;
    }

    public function destroyCentreImpot()
    {
        try {
            CentreImpot::where('id', $this->id_centre_impot)->delete();
            session()->flash('message', 'Centre Impot Supprimé avec Success');
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
        $this->CentreImpots = CentreImpot::get();
        return view('livewire.admin.centre-impot.centre-impot-show');
    }
}
