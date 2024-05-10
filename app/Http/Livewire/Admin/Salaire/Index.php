<?php

namespace App\Http\Livewire\Admin\Salaire;

use App\Models\Salaire;
use Livewire\Component;

class Index extends Component
{
    public $salaires;

    public $salaire_debut, $salaire_fin, $salaire_id;

    public function mount()
    {
        $this->salaires = Salaire::get();
    }

    protected function rules()
    {
        return [
            'salaire_debut' => 'required|integer',
            'salaire_fin' => 'required|integer',
        ];
    }

    public function updated($champs)
    {
        $this->validateOnly($champs);
    }

    public function saveSalaire()
    {
        $validatedData = $this->validate();
        try {
            $salaire = new Salaire;
            if ($this->salaire_id) {
                $salaire = Salaire::find($this->salaire_id);
            }
            $salaire->salaire_debut = $validatedData['salaire_debut'];
            $salaire->salaire_fin = $validatedData['salaire_fin'];
            $salaire->save();
            toastr()->success('Operation effectuée avec success');
            return redirect('admin/salaires');
        } catch (\Throwable $th) {
            toastr()->error('Une erreur est survenue lors du traitement de la page');
        }
    }

    public function editsalaire($id)
    {
        $salaire = Salaire::find($id);
        if ($salaire) {
            $this->salaire_id = $id;
            $this->salaire_debut = $salaire->salaire_debut;
            $this->salaire_fin = $salaire->salaire_fin;
        }
    }


    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->salaire_debut = '';
        $this->salaire_fin = '';
    }

    public function render()
    {
        return view('livewire.admin.salaire.index');
    }
}
