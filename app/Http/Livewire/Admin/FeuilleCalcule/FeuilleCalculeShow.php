<?php

namespace App\Http\Livewire\Admin\FeuilleCalcule;

use Livewire\Component;
use App\Models\Rubrique;
use App\Models\FeuilleCalcule;
use Illuminate\Support\Facades\DB;

class FeuilleCalculeShow extends Component
{
    public $FeuilledeCalcules, $code, $libelle, $feuille_id;
    public $rubriques, $selectRubrique = [];
    protected function rules()
    {
        return [
            'libelle' => 'required|string',
        ];
    }

    public function updated($champs)
    {
        $this->validateOnly($champs);
    }

    public function saveFeuilledeCalcule()
    {
        $validatedData = $this->validate();
        try {
            $dep = new FeuilleCalcule();
            $dep->code = '00';
            $dep->libelle = $validatedData['libelle'];
            $dep->save();
            $code = 'F-' . str_pad($dep->id, 2, '0', STR_PAD_LEFT);
            $dep->code = $code;
            $dep->save();
            if($dep){
                $dep->rubriques()->attach($this->selectRubrique);
            }
            toastr()->success('message', 'Feuille de Calcule ajouter avec Success');
            return redirect('admin/feuille-calcules');
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('error', $th);
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        }
    }

    public function editFeuilledeCalcule(int $feuille_id)
    {
        $dep = FeuilleCalcule::find($feuille_id);
        if ($dep) {
            $this->feuille_id = $feuille_id;
            $this->code = $dep->code;
            $this->libelle = $dep->libelle;

            // Répérez les catégories associées à la convention
            $selectedCategories = $dep->rubriques->pluck('id')->toArray();
            $this->selectRubrique = $selectedCategories;
        }
    }

    public function updateFeuilledeCalcule()
    {
        $validatedData = $this->validate();
        try {
            $dep = FeuilleCalcule::find($this->feuille_id);
            $dep->code = $validatedData['code'];
            $dep->libelle = $validatedData['libelle'];
            $dep->save();
            $dep->rubriques()->detach();
            $dep->rubriques()->attach($this->selectRubrique);
            toastr()->success('Feuille de Calcule Modifié avec Success');
            return redirect('admin/feuille-calcules');
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('error', $th);
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        }
    }

    public function deleteFeuilledeCalcule(int $feuille_id)
    {
        $this->feuille_id = $feuille_id;
    }

    public function destroyFeuilledeCalcule()
    {
        try {
            FeuilleCalcule::where('id', $this->feuille_id)->delete();
            session()->flash('message', 'Feuille de Calcule Supprimé avec Success');
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
        $this->code = '';
        $this->libelle = '';
        $this->selectRubrique = '';
    }
    public function render()
    {
        $this->rubriques = Rubrique::OrderBy('libelle','ASC')->get();
        $this->FeuilledeCalcules = FeuilleCalcule::get();
        return view('livewire.admin.feuille-calcule.feuille-calcule-show');
    }
}
