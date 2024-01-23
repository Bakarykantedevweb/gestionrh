<?php

namespace App\Http\Livewire\Admin\Formateur;

use App\Models\Formateur;
use Livewire\Component;

class Index extends Component
{
    public $formateur_id;
    public $nom,$prenom,$email,$telephone;
    public $formateurs;
    protected function rules()
    {
        return [
            'prenom' => 'required|string',
            'nom' => 'required|string',
            'email' => 'required',
            'telephone' => 'required',
        ];
    }
    public function updated($champs)
    {
        $this->validateOnly($champs);
    }

    public function saveFormateur()
    {
        $validatedData = $this->validate();
        try {
            $formateur = new Formateur();
            if ($this->formateur_id) {
                $formateur = Formateur::find($this->formateur_id);
            }
            $formateur->nom = $validatedData['nom'];
            $formateur->prenom = $validatedData['prenom'];
            $formateur->email = $validatedData['email'];
            $formateur->telephone = $validatedData['telephone'];
            $formateur->save();
            toastr()->success("Operation effectue avec success");
            return redirect('admin/formateurs');
        } catch (\Throwable $th) {
            toastr()->error("Une erreur est survenue lors du traitement de la page");
            return redirect('admin/formateurs');
        }
    }

    public function edit_formateur($id)
    {
        $formateur = Formateur::find($id);
        if($formateur)
        {
            $this->formateur_id = $id;
            $this->nom = $formateur->nom;
            $this->prenom = $formateur->prenom;
            $this->email = $formateur->email;
            $this->telephone = $formateur->telephone;
        }

    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->nom = '';
        $this->prenom = '';
        $this->email = '';
        $this->telephone = '';
    }
    public function render()
    {
        $this->formateurs = Formateur::get();
        return view('livewire.admin.formateur.index');
    }
}
