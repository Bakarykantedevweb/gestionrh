<?php

namespace App\Http\Livewire\Admin\Agence;

use App\Models\Agence;
use Livewire\Component;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithFileUploads;
    public $agences;
    public $agence_id,$nom;
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

    public function SaveAgence()
    {
        $validatedData = $this->validate();
        $agence = new Agence;
        if($this->agence_id)
        {
            $agence = Agence::find($this->agence_id);
        }
        $agence->nom = $validatedData['nom'];
        $agence->save();
        session()->flash('message', 'Operation effectuée avec Success');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function editAgence($id)
    {
        $agence = Agence::find($id);
        if($agence){
            $this->agence_id = $agence->id;
            $this->nom = $agence->nom;
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
                Agence::create([
                    'nom' => $nom,
                ]);
            } catch (\Exception $e) {
                session()->flash('error', $e->getMessage());
            }
        }
        toastr()->success('Importation Reussie avec success');
        return redirect('admin/agences');
    }
    public function render()
    {
        $this->agences = Agence::where('status', '0')->get();
        return view('livewire.admin.agence.index');
    }
}
