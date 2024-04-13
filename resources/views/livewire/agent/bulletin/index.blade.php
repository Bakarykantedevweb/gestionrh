<div>
    <div class="content container-fluid">
        <div class="row">
            <div class="col-xl-12 col-sm-12 col-12 mt-4">
                <div class="breadcrumb-path ">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('agent-dashboard') }}"><img src="assets/img/dash.png"
                                    class="mr-2" alt="breadcrumb">Acceuil</a>
                        </li>
                        <li class="breadcrumb-item active"> Bulletins</li>
                    </ul>
                    <h3>Bulletins</h3>
                </div>
            </div>
            @if ($listeGeneration)
                <div class="col-xl-6 col-sm-12 col-12 mt-4">
                    <div class="form-group">
                        <select class="form-control" wire:model="PeriodeId" wire:change="chargerContrats">
                            <option value="0">---</option>
                            @forelse ($periodes as $periode)
                                <option value="{{ $periode->id }}">{{ ucfirst($periode->mois) }}</option>
                            @empty
                                <option value="0" disabled>Aucune feuille de calcul trouvée</option>
                            @endforelse
                        </select>
                    </div>
                </div>
                <div class="col-xl-12 col-sm-12 col-12 mt-4">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-titles">Listes des Bulletins</h2>
                        </div>
                        <div class="table-responsive">
                            <table class="table  custom-table  no-footer">
                                <thead>
                                    <tr>
                                        <th>Matricule </th>
                                        <th>Mois </th>
                                        <th>Nom et Prenom </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($bulletins as $items)
                                        <tr>
                                            <td>
                                                <label>{{ $items->contrat->agent->matricule }} </label>
                                            </td>
                                            <td>
                                                <label>{{ Str::ucfirst($items->periode->mois) }} </label>
                                            </td>
                                            <td>
                                                <label>{{ $items->contrat->agent->prenom . '-' . $items->contrat->agent->nom }}
                                                </label>
                                            </td>
                                            <td>
                                                <div class="actionset">
                                                    <label>
                                                        <a wire:click="afficherRubriques({{ $items->id }},{{ $items->contrat_id }})"
                                                            class="action_label5" href="#">Generer <i
                                                                data-feather="edit"></i></a>
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">Pas de Bulletins pour le moment</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif
            @if ($GenerationBulletin)
                @php
                    $montant = 0;
                    $salaireBrut = 0;
                    $inps = 0;
                    $amo = 0;
                    $its = 0;
                    $tauxReduction = 0;
                    $salaireNet = 0;
                @endphp
                    <a href="#" wire:click="retour" class="action_label5 mt-3 ml-3 mb-3">Retour a la liste</a>
                </div>
                <!-- /Page Header -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="text-center">Bulletin pour le mois de {{ $detailBulletin->periode->mois }},
                                    {{ date('Y') }}</h4>
                                <div class="row">
                                    <div class="col-sm-6 m-b-20">
                                        <img src="{{ asset('admin/assets/img/bim.png') }}" class="inv-logo"
                                            alt="" width="100">
                                        <ul class="list-unstyled mb-0">
                                            <li>Banque International du Mali</li>
                                            <li>Bamako,Mali</li>
                                            <li>Boulevard de l'independance</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-lg-12 m-b-20">
                                        <ul class="list-unstyled">
                                            <li>
                                                <h5 class="mb-0">
                                                    <strong>{{ $detailContrat->agent->prenom .' '.$detailContrat->agent->nom }}</strong>
                                                </h5>
                                            </li>
                                            <li><span>{{ $detailContrat->agent->poste->nom }}</span></li>
                                            <li>Matricule: {{ $detailContrat->agent->matricule }}</li>
                                            {{-- <li>Joining Date: 1 Jan 2013</li> --}}
                                        </ul>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-6">
                                        <div>
                                            <h4 class="m-b-10"><strong>Les Rubriques</strong></h4>
                                            <table class="table table-bordered">
                                                <tbody>
                                                    @forelse ($rubriquesDuBulletin as $item)
                                                        <tr>
                                                            <td><strong>{{ $item->rubrique->libelle }}</strong>
                                                                <span
                                                                    class="float-right">{{ number_format($item->montant) }}</span>
                                                            </td>
                                                        </tr>
                                                        @php $montant += $item->montant; @endphp
                                                    @empty
                                                        <tr>
                                                            <td class="text-center">Aucun elements Trouves</td>
                                                        </tr>
                                                    @endforelse
                                                    <tr>
                                                        <td><strong>Salaire de Base</strong>
                                                            <span
                                                                class="float-right"><strong>{{ number_format($detailContrat->salaire) }}</strong></span>
                                                        </td>
                                                    </tr>
                                                    @php
                                                        // Calcul de l'INPS et du revenu imposable
                                                        $salaireBrut = $montant + $detailContrat->salaire;
                                                        $inps = ($salaireBrut * 3.6) / 100;
                                                        $amo = ($salaireBrut * 3.06) / 100;

                                                        $revenu = $salaireBrut - $inps - $amo;
                                                        $revenuArrondi = round($revenu, 0);
                                                        $revenuAnnuelle = $revenuArrondi * 12;
                                                        $salaireArrondi = floor($revenuAnnuelle / 1000) * 1000;

                                                        // echo "Revenu : $revenuArrondi FCFA <br>";
                                                        // echo "Revenu Annulle : $revenuAnnuelle FCFA <br>";
                                                        // echo "Revenu Arrondi : $salaireArrondi FCFA <br>";

                                                    function calculerITS($revenuAnnuel)
                                                    {
                                                        // Tableau des tranches
                                                        $tranches = [
                                                            ['min' => 0, 'max' => 330000, 'taux' => 0],
                                                            ['min' => 330001, 'max' => 578400, 'taux' => 5],
                                                            ['min' => 578401, 'max' => 1176400, 'taux' => 12],
                                                            ['min' => 1176401, 'max' => 1789733, 'taux' => 18],
                                                            ['min' => 1789734, 'max' => 2384195, 'taux' => 26],
                                                            ['min' => 2384196, 'max' => 3494130, 'taux' => 31],
                                                            ['min' => 3494131, 'max' => PHP_INT_MAX, 'taux' => 37], // Ajout de la dernière tranche
                                                        ];

                                                        $cumulITS = 0;

                                                        // Parcourir les tranches
                                                        foreach ($tranches as $tranche) {
                                                            // Vérifier si le revenu annuel est dans la tranche
                                                            if (
                                                                $revenuAnnuel > $tranche['min'] &&
                                                                $revenuAnnuel <= $tranche['max']
                                                            ) {
                                                                // Ajuster la valeur maximale de la tranche au revenu annuel donné
                                                                $tranche['max'] = $revenuAnnuel;

                                                                // Calculer l'ITS pour cette tranche
                                                                    $itsTranche = round(
                                                                        $tranche['max'] - $tranche['min'],
                                                                    ); // Arrondir le résultat
                                                                    $cumulITS += round(
                                                                        $itsTranche * ($tranche['taux'] / 100),
                                                                    ); // Arrondir le résultat

                                                                    // Terminer la boucle dès que la tranche appropriée est trouvée
                                                                    break;
                                                                } else {
                                                                    // Calculer l'ITS pour cette tranche
                                                            $itsTranche = round(
                                                                $tranche['max'] - $tranche['min'],
                                                            ); // Arrondir le résultat
                                                            $cumulITS += round(
                                                                $itsTranche * ($tranche['taux'] / 100),
                                                                        ); // Arrondir le résultat
                                                                    }
                                                                }

                                                                return $cumulITS;
                                                            }

                                                            $revenuAnnuel = $salaireArrondi;

                                                            $resultatITS = calculerITS($revenuAnnuel);

                                                            //echo "Pour un revenu annuel de $revenuAnnuel FCFA, l'ITS est de $resultatITS FCFA. <br>";

                                                            function calculerITSAvecReductions(
                                                                $itsAvantReduction,
                                                                $etatCivil,
                                                                $nombreEnfants,
                                                            ) {
                                                                // Appliquer la réduction en fonction de l'état civil
                                                                switch ($etatCivil) {
                                                                    case 'Célibataire':
                                                                    case 'Divorce':
                                                                    case 'Veuf':
                                                                        // Pas de réduction pour célibataire, divorcé ou veuf
                                                                        $reductionEtatCivil = 0;
                                                                        break;
                                                                    case 'Marie':
                                                                        // Réduction de 10% pour les travailleurs mariés
                                                                        $reductionEtatCivil = 0.1;
                                                                        break;
                                                                    default:
                                                                        $reductionEtatCivil = 0;
                                                                        break;
                                                                }

                                                                // Appliquer la réduction en fonction du nombre d'enfants à charge
                                                                $reductionEnfants = min(0.025 * $nombreEnfants, 0.25); // Maximum de 25%

                                                                // Calculer le total des réductions
                                                                $totalReductions = $reductionEtatCivil + $reductionEnfants;

                                                                // Calculer l'ITS après les réductions
                                                                $itsApresReduction =
                                                                    $itsAvantReduction * (1 - $totalReductions);

                                                                // Calculer le pourcentage du taux de réduction
                                                                $pourcentageReduction = $totalReductions * 100;

                                                                $itsApresReduction = round(
                                                                    $itsApresReduction,
                                                                    0,
                                                                    PHP_ROUND_HALF_DOWN,
                                                                );

                                                                return [
                                                                    'itsApresReduction' => $itsApresReduction,
                                                                    'pourcentageReduction' => $pourcentageReduction,
                                                                ];
                                                            }

                                                            // Exemple d'utilisation
                                                            $itsAvantReduction = $resultatITS; // Montant de l'ITS avant réduction
                                                            $etatCivil = $detailContrat->situation_matrimoniale; // État civil du travailleur (celibataire, marie, divorce, veuf)
                                                            $nombreEnfants = $detailContrat->nombre_enfant; // Nombre d'enfants à charge     // True si l'enfant est invalide, sinon false

                                                            $resultats = calculerITSAvecReductions(
                                                                $itsAvantReduction,
                                                                $etatCivil,
                                                                $nombreEnfants,
                                                            );

                                                        // echo "ITS avant réduction : $itsAvantReduction FCFA <br>";
                                                        // echo "ITS après réduction : {$resultats['itsApresReduction']} FCFA <br>";
                                                        // echo "Pourcentage du taux de réduction : {$resultats['pourcentageReduction']}% <br>";
                                                        // echo "Revenu Annuel $revenuAnnuelle <br>";
                                                        // echo "Situation matrimoniale $detailContrat->situation_matrimoniale <br>";
                                                        // echo "Nombre enfant $detailContrat->nombre_enfant <br>";
                                                        $tauxITS =
                                                            ($resultats['itsApresReduction'] / $revenuAnnuelle) * 100;
                                                        $tauxReduit = $tauxITS - 2;
                                                        $ITSAnnuelReduit = ($revenuAnnuelle * $tauxReduit) / 100;
                                                        $its = $ITSAnnuelReduit / 12;

                                                        $salaireNet = $salaireBrut - $inps - $amo - $its;

                                                    @endphp
                                                    <tr>
                                                        <td><strong>Salaire Brut</strong>
                                                            <span
                                                                class="float-right"><strong>{{ number_format($salaireBrut) }}</strong></span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>
                                            <h4 class="m-b-10"><strong>Charges</strong></h4>
                                            <table class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td><strong>INPS</strong> <span
                                                                class="float-right">{{ number_format($inps) }}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>AMO</strong> <span
                                                                class="float-right">{{ number_format($amo) }}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>ITS</strong> <span
                                                                class="float-right">{{ number_format($its) }}</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="col-sm-12">
                                                <h3><strong>Salaire Net: {{ number_format($salaireNet) }}</strong></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
