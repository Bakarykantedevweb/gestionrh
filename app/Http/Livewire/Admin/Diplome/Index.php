<?php

namespace App\Http\Livewire\Admin\Diplome;

use App\Models\Diplome;
use Livewire\Component;
use App\Models\Classification;

class Index extends Component
{
    public $diplomes,$diplome_id;
    public $nom, $classification_id;
    public $classifications, $selectClassification = [];
    protected function rules()
    {
        return [
            'nom' => 'required|string|',
            'classification_id' =>'required|integer|',
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function saveDiplome()
    {
        $validatedData = $this->validate();
        try {
            $diplome = new Diplome;
            if($this->diplome_id)
            {
                $diplome = Diplome::find($this->diplome_id);
            }
            $diplome->nom = $validatedData['nom'];
            $diplome->classification_id = $validatedData['classification_id'];
            $diplome->save();
            session()->flash('message', 'Operation effectuée avec Success');
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        } catch (\Throwable $th) {
            //throw $th;
            toastr()->error($th);
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        }
    }

    public function editDiplome($id)
    {
        $diplome = Diplome::find(decrypt($id));
        if($diplome){
            $this->diplome_id = $diplome->id;
            $this->nom = $diplome->nom;
            $this->classification_id = $diplome->classification_id;
        }
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->nom = '';
        $this->classification_id = '';
    }
    public function render()
    {
        $this->diplomes = Diplome::get();
        $this->classifications = Classification::get();
        return view('livewire.admin.diplome.index');
    }
}
