<?php

namespace App\Http\Livewire\Admin\Exercice;

use App\Models\Exercice;
use Livewire\Component;

class Index extends Component
{
    public $exercices;
    public $nom, $date_debut, $date_fin, $status, $exercice_id;

    protected $rules = [
        'nom' => 'required|string',
        'date_debut' => 'required|date',
        'date_fin' => 'required|date',
        'status' => 'required|integer'
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function editExercice($id)
    {
        $exercice = Exercice::find($id);
        if ($exercice) {
            $this->exercice_id = $id;
            $this->nom = $exercice->nom;
            $this->date_debut = $exercice->date_debut;
            $this->date_fin = $exercice->date_fin;
            $this->status = $exercice->status;
        }
    }

    public function saveExercice()
    {
        $validatedData = $this->validate();
        $exercice = new Exercice();
        if ($this->exercice_id) {
            $exercice = Exercice::find($this->exercice_id);
        }
        $exercice->nom = $validatedData['nom'];
        $exercice->date_debut = $validatedData['date_debut'];
        $exercice->date_fin = $validatedData['date_fin'];
        $exercice->status = $validatedData['status'];
        $exercice->save();
        session()->flash('success', 'Operation effectuée avec Success');
        return redirect('admin/exercices');
    }


    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->nom = '';
        $this->date_debut = '';
        $this->date_fin = '';
        $this->status = '';
    }
    public function render()
    {
        $this->exercices = Exercice::get();
        return view('livewire.admin.exercice.index');
    }
}
