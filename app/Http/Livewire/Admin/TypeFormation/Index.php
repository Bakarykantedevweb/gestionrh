<?php

namespace App\Http\Livewire\Admin\TypeFormation;

use Livewire\Component;
use App\Models\TypeFormation;

class Index extends Component
{
    public $type_formation_id;
    public $titre,$status;
    public $typeFormations;
    protected function rules()
    {
        return [
            'titre' => 'required|string',
            'status' => 'required|integer',
        ];
    }
    public function updated($champs)
    {
        $this->validateOnly($champs);
    }

    public function saveTypeFormation()
    {
        $validatedData = $this->validate();
        try {
            $formateur = new TypeFormation();
            if ($this->type_formation_id) {
                $formateur = TypeFormation::find($this->type_formation_id);
            }
            $formateur->titre = $validatedData['titre'];
            $formateur->status = $validatedData['status'];
            $formateur->save();
            toastr()->success("Operation effectue avec success");
            return redirect('admin/type-formations');
        } catch (\Throwable $th) {
            toastr()->error("Une erreur est survenue lors du traitement de la page");
            return redirect('admin/type-formations');
        }
    }

    public function edit_type_formation($id)
    {
        $formateur = TypeFormation::find($id);
        if ($formateur) {
            $this->type_formation_id = $id;
            $this->titre = $formateur->titre;
            $this->status = $formateur->status;
        }
    }

    public function delete_type_formation($id)
    {
        $this->type_formation_id = $id;
    }

    public function destroyTypeFormation()
    {
        TypeFormation::where('id', $this->type_formation_id)->delete();
        toastr()->success("Operation effectue avec success");
        return redirect('admin/type-formations');
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->titre = '';
        $this->status = '';
    }
    public function render()
    {
        $this->typeFormations = TypeFormation::get();
        return view('livewire.admin.type-formation.index');
    }
}
