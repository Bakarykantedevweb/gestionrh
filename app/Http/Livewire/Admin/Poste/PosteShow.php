<?php

namespace App\Http\Livewire\Admin\Poste;

use App\Models\Poste;
use Livewire\Component;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Livewire\WithFileUploads;

class PosteShow extends Component
{
    use WithFileUploads;
    public $postes,$nom, $poste_id;
    public $fichier;

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

    public function savePoste()
    {
        $validatedData = $this->validate();
        try {
            $poste = new Poste();

            $poste->nom = $validatedData['nom'];
            $poste->save();
            session()->flash('message', 'Poste ajouter avec Success');
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('error', $th);
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        }
    }

    public function editPoste(int $poste_id)
    {
        $poste = Poste::find($poste_id);
        if ($poste) {
            $this->poste_id = $poste_id;
            $this->nom = $poste->nom;
        }
    }

    public function updatePoste()
    {
        $validatedData = $this->validate();
        try {
            $poste = Poste::find($this->poste_id);
            $poste->nom = $validatedData['nom'];
            $poste->save();
            session()->flash('message', 'Poste Modifié avec Success');
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('error', $th);
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        }
    }

    public function deletePoste(int $poste_id)
    {
        $this->poste_id = $poste_id;
    }

    public function destroyPoste()
    {
        try {
            Poste::where('id', $this->poste_id)->delete();
            session()->flash('message', 'Poste Supprimé avec Success');
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

    public function importPoste()
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
                $nom = $worksheet->getCell('A' . $row)->getValue();
                $is_responsable = $worksheet->getCell('B' . $row)->getValue();
                Poste::create([
                    'nom' => $nom,
                    'is_responsable' =>$is_responsable
                ]);
            } catch (\Exception $e) {
                session()->flash('error', $e->getMessage());
            }
        }
        toastr()->success('Importation Reussie avec success');
        return redirect('admin/postes');
    }

    public function render()
    {
        $this->postes = Poste::OrderBy('nom','asc')->get();
        return view('livewire.admin.poste.poste-show');
    }
}
