<div>
    <div class="w-full px-[var(--margin-x)] pb-8">
        @if ($listeGeneration)
            <div class="flex items-center space-x-4 py-5 lg:py-6">
                <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
                    Bulletins
                </h2>
                <div class="hidden h-full py-1 sm:flex">
                    <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>
                </div>
                <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
                    <li class="flex items-center space-x-2">
                        <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent"
                            href="{{ route('agent-dashboard') }}">Tableau de Bord
                        </a>
                        <svg x-ignore="" xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none"
                            viewbox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                    </li>
                    <li>Bulletins</li>
                </ul>
            </div>
            <div class="grid grid-cols-1 gap-4 sm:gap-5 lg:gap-6">
                <!-- Basic Table -->
                <div class="card px-4 pb-4 sm:px-5">
                    <div class="my-3 flex h-8 items-center justify-between">
                        <h2
                            class="font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100 lg:text-base">
                            Bulletins
                        </h2>
                    </div>
                    <div class="flex space-x-4">
                        <label class="flex-1">
                            <span>Choississez une Exercice</span>
                            <select wire:model="ExerciceId"
                                class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent">
                                <option value="0">---</option>
                                @forelse ($exercices as $exercice)
                                    <option value="{{ $exercice->id }}">{{ ucfirst($exercice->nom) }}</option>
                                @empty
                                    <option value="0" disabled>Aucune feuille de calcul trouvée</option>
                                @endforelse
                            </select>
                        </label>
                        <label class="flex-1">
                            <span>Choississez une Période</span>
                            <select wire:model="PeriodeId"
                                class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent">
                                <option value="0">---</option>
                                @forelse ($periodes as $periode)
                                    <option value="{{ $periode->id }}">{{ ucfirst($periode->mois) }}</option>
                                @empty
                                    <option value="0" disabled>Aucune période trouvée</option>
                                @endforelse
                            </select>
                        </label>
                    </div>

                    <div>
                        <div class="mt-5">
                            <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
                                <table class="w-full text-left">
                                    <thead>
                                        <tr
                                            class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                                            <th
                                                class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                                                Matricule
                                            </th>
                                            <th
                                                class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                                                Nom & Prenom
                                            </th>
                                            <th
                                                class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                                                Mois
                                            </th>
                                            <th
                                                class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($bulletins as $items)
                                            <tr
                                                class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                    {{ $items->contrat->agent->matricule }}</td>
                                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                    {{ $items->contrat->agent->prenom . ' ' . $items->contrat->agent->nom }}
                                                </td>
                                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                    {{ Str::ucfirst($items->periode->mois) }}
                                                </td>
                                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                    <button type="button"
                                                        wire:click="afficherRubriques({{ $items->id }},{{ $items->contrat_id }})"
                                                        class="btn bg-primary font-medium text-white hover:bg-primary-focus hover:shadow-lg hover:shadow-primary/50 focus:bg-primary-focus focus:shadow-lg focus:shadow-primary/50 active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:hover:shadow-accent/50 dark:focus:bg-accent-focus dark:focus:shadow-accent/50 dark:active:bg-accent/90">
                                                        Generer
                                                    </button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center">Pas de Bulletins pour le moment
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
            <div class="flex items-center justify-between py-5 lg:py-6">
                <h2 class="text-xl font-medium text-slate-700 line-clamp-1 dark:text-navy-50 lg:text-2xl">
                    Bulletin de paie
                </h2>

                <div class="flex">
                    <button @click="window.print()"
                        class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 sm:h-9 sm:w-9">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewbox="0 0 24 24"
                            stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z">
                            </path>
                        </svg>
                        {{-- </button> --}}
                </div>
            </div>
            <button wire:click="retour"
                class="btn border border-primary font-medium text-primary hover:bg-primary hover:text-white focus:bg-primary focus:text-white active:bg-primary/90 dark:border-accent dark:text-accent-light dark:hover:bg-accent dark:hover:text-white dark:focus:bg-accent dark:focus:text-white dark:active:bg-accent/90">
                Retour
            </button>
            <div class="grid grid-cols-1 mt-3">
                <div class="card px-5 py-12 sm:px-18">
                    <div class="flex flex-col justify-between sm:flex-row">
                        <div class="text-center sm:text-left">
                            <h2 class="text-2xl font-semibold uppercase text-primary dark:text-accent-light">
                                OptiRH
                            </h2>
                            <div class="space-y-1 pt-2">
                                <p>Banque International du Mali.</p>
                                <p>Bamako,Mali</p>
                                <p>Boulevard de l'independance</p>
                            </div>
                        </div>
                        <div class="mt-4 text-center sm:m-0 sm:text-right">
                            <h2 class="text-2xl font-semibold uppercase text-primary dark:text-accent-light">
                                Bulletin de paie
                            </h2>
                            <div class="space-y-1 pt-2">
                                <p>Matricule #: <span
                                        class="font-semibold">{{ $detailContrat->agent->matricule }}</span></p>
                                <p>
                                    Created: <span class="font-semibold">{{ $detailBulletin->periode->mois }},
                                        {{ date('Y') }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="my-7 h-px bg-slate-200 dark:bg-navy-500"></div>
                    <div class="flex flex-col justify-between sm:flex-row">
                        <div class="text-center sm:text-left">
                            <p class="text-lg font-medium text-slate-600 dark:text-navy-100">
                                Bulletin de :
                            </p>
                            <div class="space-y-1 pt-2">
                                <p class="font-semibold">
                                    {{ $detailContrat->agent->prenom . ' ' . $detailContrat->agent->nom }}</p>
                                <p>{{ $detailContrat->agent->email }}</p>
                                <p>{{ $detailContrat->agent->poste->nom }}.</p>
                            </div>
                        </div>
                        <div class="mt-4 text-center sm:m-0 sm:text-right">
                            <p class="text-lg font-medium text-slate-600 dark:text-navy-100">
                                Contrat information:
                            </p>
                            <div class="space-y-1 pt-2">
                                <p class="font-medium">Situation matrimoniale :
                                    {{ $detailContrat->situation_matrimoniale }}</p>
                                <p class="font-medium">Nombre d'enfant : {{ $detailContrat->nombre_enfant }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="my-7 h-px bg-slate-200 dark:bg-navy-500"></div>
                    <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
                        <table class="is-zebra w-full text-left">
                            <thead>
                                <tr>
                                    <th
                                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                        RUBRIQUES
                                    </th>
                                    <th
                                        class="whitespace-nowrap bg-slate-200 px-3 py-3 text-right font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                        MONTANT
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rubriquesDuBulletin as $item)
                                    <tr>
                                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                            <div>
                                                <p class="font-medium text-slate-600 dark:text-navy-100">
                                                    {{ $item->rubrique->libelle }}
                                                </p>
                                            </div>
                                        </td>
                                        <td class="w-3/12 whitespace-nowrap px-4 py-3 text-right sm:px-5">
                                            {{ number_format($item->montant) }}
                                        </td>
                                        @php $montant += $item->montant; @endphp
                                    </tr>
                                @endforeach
                                <tr>
                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5"><strong>Salaire de Base</strong>
                                    </td>
                                    <td class="w-3/12 whitespace-nowrap px-4 py-3 text-right sm:px-5">
                                        <strong>{{ number_format($detailContrat->salaire) }}</strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="my-7 h-px bg-slate-200 dark:bg-navy-500"></div>
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
        if ($revenuAnnuel > $tranche['min'] && $revenuAnnuel <= $tranche['max']) {
            // Ajuster la valeur maximale de la tranche au revenu annuel donné
            $tranche['max'] = $revenuAnnuel;

            // Calculer l'ITS pour cette tranche
                                    $itsTranche = round($tranche['max'] - $tranche['min']); // Arrondir le résultat
                                    $cumulITS += round($itsTranche * ($tranche['taux'] / 100)); // Arrondir le résultat

                                    // Terminer la boucle dès que la tranche appropriée est trouvée
                                    break;
                                } else {
                                    // Calculer l'ITS pour cette tranche
            $itsTranche = round($tranche['max'] - $tranche['min']); // Arrondir le résultat
            $cumulITS += round($itsTranche * ($tranche['taux'] / 100)); // Arrondir le résultat
        }
    }

    return $cumulITS;
}

$revenuAnnuel = $salaireArrondi;

$resultatITS = calculerITS($revenuAnnuel);

//echo "Pour un revenu annuel de $revenuAnnuel FCFA, l'ITS est de $resultatITS FCFA. <br>";

function calculerITSAvecReductions($itsAvantReduction, $etatCivil, $nombreEnfants)
{
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
    $itsApresReduction = $itsAvantReduction * (1 - $totalReductions);

    // Calculer le pourcentage du taux de réduction
    $pourcentageReduction = $totalReductions * 100;

    $itsApresReduction = round($itsApresReduction, 0, PHP_ROUND_HALF_DOWN);

    return [
        'itsApresReduction' => $itsApresReduction,
        'pourcentageReduction' => $pourcentageReduction,
    ];
}

// Exemple d'utilisation
$itsAvantReduction = $resultatITS; // Montant de l'ITS avant réduction
$etatCivil = $detailContrat->situation_matrimoniale; // État civil du travailleur (celibataire, marie, divorce, veuf)
$nombreEnfants = $detailContrat->nombre_enfant; // Nombre d'enfants à charge     // True si l'enfant est invalide, sinon false

$resultats = calculerITSAvecReductions($itsAvantReduction, $etatCivil, $nombreEnfants);

// echo "ITS avant réduction : $itsAvantReduction FCFA <br>";
// echo "ITS après réduction : {$resultats['itsApresReduction']} FCFA <br>";
// echo "Pourcentage du taux de réduction : {$resultats['pourcentageReduction']}% <br>";
// echo "Revenu Annuel $revenuAnnuelle <br>";
// echo "Situation matrimoniale $detailContrat->situation_matrimoniale <br>";
// echo "Nombre enfant $detailContrat->nombre_enfant <br>";
                        $tauxITS = ($resultats['itsApresReduction'] / $revenuAnnuelle) * 100;
                        $tauxReduit = $tauxITS - 2;
                        $ITSAnnuelReduit = ($revenuAnnuelle * $tauxReduit) / 100;
                        $its = $ITSAnnuelReduit / 12;

                        $salaireNet = $salaireBrut - $inps - $amo - $its;
                    @endphp

                    <div class="flex flex-col justify-end sm:flex-row">
                        <div class="mt-4 text-center sm:m-0 sm:text-right">
                            <p class="text-lg font-medium text-slate-600 dark:text-navy-100">
                                Salaire Brut: {{ number_format($salaireBrut) }} F
                            </p>
                            <div class="space-y-1 pt-2">
                                <p>INPS : <span class="font-medium">{{ number_format($inps) }} F</span></p>
                                <p>AMO : <span class="font-medium">{{ number_format($amo) }} F</span></p>
                                <p>ITS : <span class="font-medium">{{ number_format($its) }} F</span></p>
                                <p class="text-lg text-primary dark:text-accent-light">
                                    Salaire Net: <span class="font-medium">{{ number_format($salaireNet) }} F</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
