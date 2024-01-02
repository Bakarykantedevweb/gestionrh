<?php

namespace App\Http\Livewire\Admin\Categorie;

use Livewire\Component;
use App\Models\Categorie;
use PhpOffice\PhpSpreadsheet\Calculation\Category;

class Index extends Component
{
    public $categories,$categorie_id;
    public $nom,$status;
    protected function rules()
    {
        return [
            'nom' => 'required|string',
            'status' => 'required|integer',
        ];
    }

    public function updated($champs)
    {
        $this->validateOnly($champs);
    }

    public function SaveCategorie()
    {
        $validatedData = $this->validate();
        $categorie = new Categorie();
        if ($this->categorie_id) {
            $categorie = Categorie::find($this->categorie_id);
        }
        $categorie->nom = $validatedData['nom'];
        $categorie->status = $validatedData['status'];
        $categorie->save();
        toastr()->success('message', 'Operation effectuée avec Success');
        return redirect('admin/categories');
    }

    public function editCategorie($id)
    {
        $categorie = Categorie::find($id);
        if($categorie){
            $this->categorie_id = $id;
            $this->nom = $categorie->nom;
            $this->status = $categorie->status;
        }
    }

    public function deleteCategorie($id)
    {
        $this->categorie_id = $id;
    }

    public function DestroyCategorie()
    {
        try {
            Categorie::where('id', $this->categorie_id)->delete();
            return redirect('admin/categories');
            toastr()->success('message', 'Operation effectuée avec Success');
        } catch (\Throwable $th) {
            toastr()->error('Une Erreur est survenue lors du traitement de la page');
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
        $this->status = '';
    }

    public function render()
    {
        $this->categories = Categorie::get();
        return view('livewire.admin.categorie.index');
    }
}
