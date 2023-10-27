<?php

namespace App\Http\Livewire\Admin\Droit;

use App\Models\Droit;
use Livewire\Component;
use App\Models\Type_droit;
use Livewire\WithPagination;

class DroitShow extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $type_droits, $droits , $type_droit_id, $nom,$acces,$route, $droit_id;
    protected function rules()
    {
        return [
            'type_droit_id' => 'required|integer',
            'nom' => 'required|string',
            'acces' => 'required|integer',
            'route' => 'required|string',
        ];
    }

    public function updated($champs)
    {
        $this->validateOnly($champs);
    }

    public function saveDroit()
    {
        $validatedData = $this->validate();
        try {
            //code...
            $droit = new Droit();
            $droit->nom = $validatedData['nom'];
            $droit->acces = $validatedData['acces'];
            $droit->type_droit_id = $validatedData['type_droit_id'];
            $droit->route = $validatedData['route'];
            $droit->save();
            session()->flash('message', 'Droit ajouter avec Success');
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('error',$th);
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        }
    }

    public function editDroit(int $droit_id)
    {
        $droit = Droit::find($droit_id);
        if($droit){
            $this->droit_id = $droit_id;
            $this->nom = $droit->nom;
            $this->acces = $droit->acces;
            $this->type_droit_id = $droit->type_droit_id;
            $this->route = $droit->route;
        }
    }

    public function UpdateDroit()
    {
        $validatedData = $this->validate();
        try {
            //code...
            $droit = Droit::find($this->droit_id);
            $droit->nom = $validatedData['nom'];
            $droit->acces = $validatedData['acces'];
            $droit->type_droit_id = $validatedData['type_droit_id'];
            $droit->route = $validatedData['route'];
            $droit->save();
            session()->flash('message', 'Droit Modifier avec Success');
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
        $this->type_droit_id = '';
        $this->nom = '';
        $this->acces = '';
        $this->route = '';
    }
    public function render()
    {
        $this->type_droits = Type_droit::get();
        $this->droits = Droit::get();
        return view('livewire.admin.droit.droit-show');
    }
}