<?php

namespace App\Http\Livewire\Admin\Classification;

use Livewire\Component;
use App\Models\Classification;

class Index extends Component
{
    public $classifications;
    public $nom, $classification_id;

    protected $rules = [
        'nom' => 'required|string',
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
        }
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->nom = '';
    }

    public function render()
    {
        $this->classifications = Classification::get();
        return view('livewire.admin.classification.index');
    }
}
