<?php

namespace App\Http\Livewire\Admin\Contrat;

use App\Models\Agent;
use Livewire\Component;
use App\Models\Categorie;
use App\Models\Convention;
use App\Models\CentreImpot;
use App\Models\Contrat;
use App\Models\TypeContrat;
use App\Models\FeuilleCalcule;

class Index extends Component
{
    public $cdiListes;
    public $cddListes;
    public $cdqListes;
    public $typeContrat;
    public $contratTermineListes = [];
    // public $contratCaisseListes;

    public $cdi = true;
    public $cdd = false;
    public $cdq = false;
    public $contratTermine = false;
    // public $contratCaisse = false;

    public $contrat_id;

    public $date_creation, $date_fin;

    private function disableContents()
    {
        $this->cdi = false;
        $this->cdd = false;
        $this->cdq = false;
        $this->contratTermine = false;
        // $this->contratCaisse = false;
    }

    protected $rules = [
        'date_creation' => 'required|date',
        'date_fin' => 'required|date',
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function mount()
    {
        $this->cdiListes = Contrat::where('type_contrat_id', 1)->get();
        $this->cddListes = Contrat::where('type_contrat_id', 2)->where('date_fin', '>=', now())->get();
        $this->cdqListes = Contrat::where('type_contrat_id', 3)->where('date_fin', '>=', now())->get();
        $this->contratTermineListes = Contrat::where('date_fin', '<', now())->get();
    }

    public function updatedTypeContrat()
    {
        $this->contratTermineListes = Contrat::where('type_contrat_id', $this->typeContrat)
            ->where('date_fin', '<', now())
            ->get();
    }

    public function activeContent(string $content)
    {
        $content = decrypt($content);
        $this->disableContents();
        $this->$content = true;
    }

    public function relancerContrat($id)
    {
        $this->contrat_id = $id;
    }

    public function UpdateContrat()
    {
        $validatedData = $this->validate();
        try {
            if($validatedData['date_fin'] < $validatedData['date_creation'])
            {
                toastr()->error('La date de fin est superieur a la date de creation');
                $this->date_fin = '';
            }
            else
            {

                $contrat = Contrat::find($this->contrat_id);
                $contrat->date_creation = $validatedData['date_creation'];
                $contrat->date_fin = $validatedData['date_fin'];
                $contrat->save();
                toastr()->success('Operation effectue avec success');
                return redirect('admin/contrats');
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->date_creation = '';
        $this->date_fin = '';
    }

    public function render()
    {
        return view('livewire.admin.contrat.index');
    }
}
