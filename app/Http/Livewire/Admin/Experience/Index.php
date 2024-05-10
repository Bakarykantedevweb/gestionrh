<?php

namespace App\Http\Livewire\Admin\Experience;

use App\Models\Experience;
use Livewire\Component;

class Index extends Component
{
    public $experiences;

    public $nom,$experience_id;

    public function mount()
    {
        $this->experiences = Experience::get();
    }

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

    public function saveExperience()
    {
        $validatedData = $this->validate();
        try {
            $experience = new Experience;
            if($this->experience_id)
            {
                $experience = Experience::find($this->experience_id);
            }
            $experience->nom = $validatedData['nom'];
            $experience->save();
            toastr()->success('Operation effectuée avec success');
            return redirect('admin/experiences');
        } catch (\Throwable $th) {
            toastr()->error('Une erreur est survenue lors du traitement de la page');
        }
    }

    public function editexperience($id)
    {
        $experience = Experience::find($id);
        if($experience){
            $this->experience_id = $id;
            $this->nom = $experience->nom;
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
        return view('livewire.admin.experience.index');
    }
}
