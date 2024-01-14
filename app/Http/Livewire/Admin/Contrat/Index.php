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
    public $contratTermineListes;
    public $contratCaisseListes;

    public $cdi = true;
    public $cdd = false;
    public $contratTermine = false;
    public $contratCaisse = false;

    private function disableContents()
    {
        $this->cdi = false;
        $this->cdd = false;
        $this->contratTermine = false;
        $this->contratCaisse = false;
    }

    public function activeContent(string $content)
    {
        $content = decrypt($content);
        $this->disableContents();
        $this->$content = true;
    }

    public function render()
    {
        $this->cdiListes = Contrat::where('type_contrat_id',1)->get();
        $this->cddListes = Contrat::where('type_contrat_id', 2)->where('date_fin', '>', now())->get();
        $this->contratTermineListes = Contrat::where('type_contrat_id', 2)->where('date_fin', '<', now())->get();
        $this->contratCaisseListes = Contrat::where('status', 1)->get();
        return view('livewire.admin.contrat.index');
    }
}
