<?php

namespace App\Http\Livewire\Admin\Departement;

use App\Models\Agent;
use App\Models\Departement;
use App\Models\Poste;
use Livewire\Component;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Livewire\WithFileUploads;

class DepartementShow extends Component
{
    use WithFileUploads;
    public $departements , $code, $nom , $dep_id;
    public $postes,$selectPoste = [];
    public $search = '';
    public $fichier;

    public $liste = true;
    public $statistique = false;

    public $agentDepartements = [];

    private function disableContents()
    {
        $this->liste = false;
        $this->statistique = false;
    }

    public function activeContent(string $content)
    {
        $content = decrypt($content);
        $this->disableContents();
        $this->$content = true;
    }

    protected function rules()
    {
        return [
            'code' => 'required|string',
            'nom' => 'required|string',
        ];
    }

    public function updated($champs)
    {
        $this->validateOnly($champs);
    }

    public function saveDepartement()
    {
        $validatedData = $this->validate();
        try {
            $dep = new Departement();
            $dep->code = $validatedData['code'];
            $dep->nom = $validatedData['nom'];
            $dep->save();
            if($dep){
                $dep->postes()->attach($this->selectPoste);
            }
            toastr()->success('Departement ajouter avec Success!');
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('error', $th);
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        }
    }

    public function editDepartement(int $dep_id)
    {
        $dep = Departement::find($dep_id);
        if($dep){
            $this->dep_id = $dep_id;
            $this->code = $dep->code;
            $this->nom = $dep->nom;

            // Récupérez les catégories associées à la convention
            $selectedCategories = $dep->postes->pluck('id')->toArray();
            $this->selectPoste = $selectedCategories;
        }
    }

    public function updateDepartement()
    {
        $validatedData = $this->validate();
        try {
            $dep = Departement::find($this->dep_id);
            $dep->code = $validatedData['code'];
            $dep->nom = $validatedData['nom'];
            $dep->postes()->detach();
            $dep->postes()->attach($this->selectPoste);
            $dep->save();
            session()->flash('message', 'Departement Modifié avec Success');
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('error', $th);
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        }
    }

    public function deleteDepartement(int $dep_id)
    {
        $this->dep_id = $dep_id;
    }

    public function destroyDepartement()
    {
        try {
            Departement::where('id',$this->dep_id)->delete();
            session()->flash('message', 'Departement Supprimé avec Success');
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('error', $th);
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        }
    }

    public function importDepartement()
    {
        $this->validate([
            'fichier' => 'required|mimes:xlsx',
        ]);

        $file = $this->fichier->getRealPath();
        $spreadsheet = IOFactory::load($file);
        $worksheet = $spreadsheet->getActiveSheet();
        $highestRow = $worksheet->getHighestRow();

        for ($row = 2; $row <= $highestRow; $row++) {
            try {
                $code = $worksheet->getCell('A' . $row)->getValue();
                $nom = $worksheet->getCell('B' . $row)->getValue();

                Departement::create([
                    'code' => $code,
                    'nom' => $nom,
                ]);
            } catch (\Exception $e) {
                session()->flash('success', $e->getMessage());
            }
        }
        toastr()->success('Importation Reussie avec success');
        return redirect('admin/departements');
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->code = '';
        $this->nom = '';
        $this->selectPoste = '';
        $this->fichier = '';
        $this->search = '';
    }

    public function voirAgent($id)
    {
        $this->agentDepartements = Agent::where('departement_id', $id)->get();
        // dd($this->agentDepartements);
    }

    public function render()
    {
        $this->departements = Departement::get();
        $this->postes = Poste::orWhereRaw('LOWER(nom) like ?', ['%' . strtolower($this->search) . '%'])
                            ->get();
        return view('livewire.admin.departement.departement-show');
    }
}
