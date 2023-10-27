<?php

namespace App\Http\Livewire\Admin\Diplome;

use App\Models\Diplome;
use Livewire\Component;

class Index extends Component
{
    public $diplomes,$diplome_id;
    public $nom;
    protected function rules()
    {
        return [
            'nom' => 'required|string|',
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
            $diplome->save();
            toastr()->success('Operation effectué avec succès');
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
        $this->diplomes = Diplome::get();
        return view('livewire.admin.diplome.index');
    }
}
