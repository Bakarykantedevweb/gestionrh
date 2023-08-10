<?php

namespace App\Http\Livewire\Admin\TypeContrat;

use Livewire\Component;
use App\Models\TypeContrat;

class TypecontratShow extends Component
{
    public $typeContrats,$nom,$type_contrat_id;

    protected function rules()
    {
        return [
            'nom' => 'required|string',
        ];
    }

    public function updated($champs)
    {
        $this->validateOnly($champs);
    }

    public function savetypeContrat()
    {
        $validatedData = $this->validate();
        try {
            $typecontrat = new TypeContrat();

            $typecontrat->nom = $validatedData['nom'];
            $typecontrat->save();
            session()->flash('message', 'Type Contrat ajouter avec Success');
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('error', $th);
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        }
    }

    public function editTypeContrat(int $type_contrat_id)
    {
        $typecontrat = TypeContrat::find($type_contrat_id);
        if ($typecontrat) {
            $this->type_contrat_id = $type_contrat_id;
            $this->nom = $typecontrat->nom;
        }
    }

    public function updatetypeContrat()
    {
        $validatedData = $this->validate();
        try {
            $typecontrat = TypeContrat::find($this->type_contrat_id);
            $typecontrat->nom = $validatedData['nom'];
            $typecontrat->save();
            session()->flash('message', 'Type Contrat modifier avec Success');
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('error', $th);
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        }
    }

    public function deleteTypeContrat(int $type_contrat_id)
    {
        $this->type_contrat_id = $type_contrat_id;
    }

    public function destroytypeContrat()
    {
        try {
            TypeContrat::where('id', $this->type_contrat_id)->delete();
            session()->flash('message', 'Type Contrat Supprimé avec Success');
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
        $this->nom = '';
    }

    public function render()
    {
        $this->typeContrats = TypeContrat::get();
        return view('livewire.admin.type-contrat.typecontrat-show');
    }
}
