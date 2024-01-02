<?php

namespace App\Http\Livewire\Admin\Offre;

use App\Models\Offre;
use Livewire\Component;
use App\Models\Categorie;

class Create extends Component
{
    public $categories;

    public $titre,$date_publication,$date_limite,$nombre_place,$categorie_id,$description;

    protected function rules()
    {
        return [
            'titre' => 'required|string',
            'date_publication' => 'required',
            'date_limite' => 'required',
            'nombre_place' => 'required|integer',
            'categorie_id' => 'required|integer',
            'description' => 'required|string'
        ];
    }

    public function updated($champs)
    {
        $this->validateOnly($champs);
    }

    public function saveOffre()
    {
        $validatedData = $this->validate();
        try {
            $offre = new Offre;
            $offre->titre = $validatedData['titre'];
            $offre->date_publication = $validatedData['date_publication'];
            $offre->date_limite = $validatedData['date_limite'];
            $offre->nombre_place = $validatedData['nombre_place'];
            $offre->categorie_id = $validatedData['categorie_id'];
            $offre->description = $validatedData['description'];
            $offre->save();
            toastr()->success("Offre crée avec Success");
            return redirect('admin/offres');
        } catch (\Throwable $th) {
            toastr()->error($th->getMessage());
            return redirect('admin/offres');
        }
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->titre = '';
        $this->date_publication = '';
        $this->date_limite = '';
        $this->date_limite = '';
        $this->nombre_place = '';
        $this->categorie_id = '';
        $this->description = '';
    }

    public function render()
    {
        $this->categories = Categorie::get();
        return view('livewire.admin.offre.create');
    }
}
