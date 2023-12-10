<?php

namespace App\Http\Livewire\Admin\Bulletin;

use App\Models\Agent;
use App\Models\Contrat;
use App\Models\Periode;
use Livewire\Component;
use App\Models\Bulletin;
use App\Models\Rubrique;
use App\Models\FeuilleCalcule;
use App\Models\BulletinRubrique;

class BulletinShow extends Component
{
    public $agents;
    public $contrats = [];
    public $feuilleCalcules;
    public $feuilleCalculeId;
    public $rubriques;
    public $periodes;
    public $periode_id;
    public $montant = [];
    public $selectedMonth;
    public $showTable = false;
    public $selectedMonthName;

    public function __construct()
    {
        $this->feuilleCalcules = FeuilleCalcule::get();
        $this->periodes = Periode::get();
        $this->montant = [];
    }

    public function selectMonth($month)
    {
        $this->selectedMonth = $month;
        $this->selectedMonthName = ucfirst($month);
        $this->showTable = true;
    }

    public function annuler()
    {
        $this->showTable = false;
    }

    public function getRubriques()
    {
        $feuilleCalcule = FeuilleCalcule::find($this->feuilleCalculeId);
        // dd($feuilleCalcule);
        // Vérifier si la feuille de calcul existe
        if ($feuilleCalcule) {
            // Récupérer les rubriques liées à la feuille via la table de liaison feuille_rubrique
            $this->rubriques = $feuilleCalcule->rubriques ?? [];
            $this->contrats = [];
            $this->montant = [];
            // Récupérer la liste des agents liés à la feuille sélectionnée via la table contrats
            if(count($feuilleCalcule->contrats))
            {
                $this->contrats = $feuilleCalcule->contrats;
            }

        } else {
            $this->rubriques = [];
            $this->agents = [];
        }
    }

    public function SaveBulletin()
    {
        // Vérifiez si les données nécessaires sont disponibles
        if ($this->feuilleCalculeId && $this->selectedMonthName) {
            // Obtenez la période
            $mois = strtolower($this->selectedMonthName);
            $periode = Periode::where('mois', $mois)->first();

            // Parcourez les contrats pour enregistrer dans la table bulletin
            foreach ($this->contrats as $contrat) {
                // Insérez ou mettez à jour dans la table bulletin
                $bulletin = Bulletin::updateOrCreate(
                    [
                        'periode_id' => $periode->id,
                        'contrat_id' => $contrat->id,
                    ],
                );

                // Créez un tableau pour les montants de l'agent
                $montantsAgent = [];

                // Parcourez les rubriques pour récupérer les montants pour l'agent actuel
                foreach ($this->rubriques as $rubrique) {
                    $contratId = $contrat->id;
                    $rubriqueId = $rubrique->id;

                    // Vérifiez si la clé existe avant d'accéder à $this->montant
                    if (isset($this->montant[$contratId][$rubriqueId])) {
                        // Ajoutez le montant à $montantsAgent
                        $montantsAgent[$rubriqueId] = $this->montant[$contratId][$rubriqueId];

                        // Utilisez la méthode create pour insérer dans la table bulletin_rubrique
                        BulletinRubrique::create([
                            'bulletin_id' => $bulletin->id,
                            'rubrique_id' => $rubriqueId,
                            'montant' => $montantsAgent[$rubriqueId],
                        ]);
                    }
                }
            }

            // Ajoutez d'autres actions nécessaires après l'enregistrement
        }

        // Ajoutez d'autres actions nécessaires après le traitement

        // Rafraîchissez la page ou redirigez si nécessaire
        toastr()->success('Preparation effectue avec success');
        $this->reset();
        return redirect('admin/bulletins');
    }


    public function render()
    {
        return view('livewire.admin.bulletin.bulletin-show');
    }
}
