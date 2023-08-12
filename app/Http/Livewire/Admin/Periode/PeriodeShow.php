<?php

namespace App\Http\Livewire\Admin\Periode;

use App\Models\Periode;
use Livewire\Component;

class PeriodeShow extends Component
{
    public $Periodes,$mois,$annee,$periode_id;

    protected function rules()
    {
        return [
            'mois' => 'required|string',
            'annee' => 'required|integer',
        ];
    }

    public function updated($champs)
    {
        $this->validateOnly($champs);
    }

    public function savePeriode()
    {
        $validatedData = $this->validate();
        try {
            $Periode = new Periode();

            $Periode->mois = $validatedData['mois'];
            $Periode->annee = $validatedData['annee'];
            $Periode->save();
            session()->flash('message', 'Periode ajouter avec Success');
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('error', $th);
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        }
    }

    public function editPeriode(int $periode_id)
    {
        $Periode = Periode::find($periode_id);
        if ($Periode) {
            $this->periode_id = $periode_id;
            $this->mois = $Periode->mois;
            $this->annee = $Periode->annee;
        }
    }

    public function updatePeriode()
    {
        $validatedData = $this->validate();
        try {
            $Periode = Periode::find($this->periode_id);
            $Periode->mois = $validatedData['mois'];
            $Periode->annee = $validatedData['annee'];
            $Periode->save();
            session()->flash('message', 'Periode Modifié avec Success');
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('error', $th);
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        }
    }

    public function deletePeriode(int $periode_id)
    {
        $this->periode_id = $periode_id;
    }

    public function destroyPeriode()
    {
        try {
            Periode::where('id', $this->periode_id)->delete();
            session()->flash('message', 'Periode Supprimé avec Success');
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
        $this->mois = '';
        $this->annee = '';
    }

    public function render()
    {
        $this->Periodes = Periode::get();
        return view('livewire.admin.periode.periode-show');
    }
}
