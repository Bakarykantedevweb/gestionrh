<?php

namespace App\Http\Livewire\Admin\BulletinRubrique;

use Livewire\Component;
use App\Models\Bulletin;
use App\Models\BulletinRubrique;
use App\Models\Rubrique;

class Index extends Component
{
    public $rubriques,$bulletins, $bulletin_rubrique, $bulletin_id, $valeur, $rubrique_id, $id_bulletin_rubrique_rubrique;

    protected function rules()
    {
        return [
            'bulletin_id' => 'required|integer',
            'rubrique_id' => 'required|integer',
            'valeur' => 'required',
        ];
    }

    public function updated($champs)
    {
        $this->validateOnly($champs);
    }

    public function saveBulletin()
    {
        $validatedData = $this->validate();
        try {
            $dep = new Bulletin();
            $dep->agent_id = $validatedData['agent_id'];
            $dep->periode_id = $validatedData['periode_id'];
            $dep->valeur = $validatedData['valeur'];
            $dep->save();
            session()->flash('message', 'Bulletin Rubrique ajouter avec Success');
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
        $this->bulletin_id = '';
        $this->rubrique_id = '';
        $this->valeur = '';
    }
    public function render()
    {
        $this->rubriques = Rubrique::get();
        $this->bulletins = Bulletin::get();
        $this->bulletin_rubrique = BulletinRubrique::get();
        return view('livewire.admin.bulletin-rubrique.index');
    }
}
