<?php

namespace App\Http\Livewire\Admin\TypePret;

use Livewire\Component;
use App\Models\TypePret;

class TypePretShow extends Component
{
    public $typePrets, $nom, $type_pret_id;
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

    public function savetypePret()
    {
        $validatedData = $this->validate();
        try {
            $typepret = new TypePret();

            $typepret->nom = $validatedData['nom'];
            $typepret->save();
            session()->flash('message', 'Type Pret ajouter avec Success');
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('error', $th);
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        }
    }

    public function edittypepret(int $type_pret_id)
    {
        $typepret = TypePret::find($type_pret_id);
        if ($typepret) {
            $this->type_pret_id = $type_pret_id;
            $this->nom = $typepret->nom;
        }
    }

    public function updatetypePret()
    {
        $validatedData = $this->validate();
        try {
            $typepret = TypePret::find($this->type_pret_id);
            $typepret->nom = $validatedData['nom'];
            $typepret->save();
            session()->flash('message', 'Type Pret modifier avec Success');
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('error', $th);
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        }
    }

    public function deletetypepret(int $type_pret_id)
    {
        $this->type_pret_id = $type_pret_id;
    }

    public function destroytypePret()
    {
        try {
            TypePret::where('id', $this->type_pret_id)->delete();
            session()->flash('message', 'Type Pret Supprimé avec Success');
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
        $this->typePrets = TypePret::get();
        return view('livewire.admin.type-pret.type-pret-show');
    }
}
