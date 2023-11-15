<?php

namespace App\Http\Livewire\Admin\Classification;

use Livewire\Component;
use App\Models\Classification;

class Index extends Component
{
    public $classifications;
    public $nom,$montant, $classification_id;

    protected $rules = [
        'nom' => 'required|string',
        'montant' => 'required|string',
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function saveClassification()
    {
        $validatedData = $this->validate();
        $classification = new Classification();
        if ($this->classification_id)
        {
            $classification = Classification::find($this->classification_id);
        }
        $classification->nom = $validatedData['nom'];
        $classification->montant = $validatedData['montant'];
        $classification->save();
        session()->flash('message', 'Operation effectuée avec Success');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function editClassification($id)
    {
        $classification = Classification::find(decrypt($id));
        if ($classification) {
            $this->classification_id = $classification->id;
            $this->nom = $classification->nom;
            $this->montant = $classification->montant;
        }
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->nom = '';
        $this->montant = '';
    }

    public function render()
    {
        $this->classifications = Classification::get();
        return view('livewire.admin.classification.index');
    }
}
