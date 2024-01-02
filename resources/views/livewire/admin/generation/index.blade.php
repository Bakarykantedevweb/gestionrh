<div>
    @if($listeGeneration)
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Generations Bulletins</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Tableau de Bord</a></li>
                    <li class="breadcrumb-item active">Generations Bulletins</li>
                </ul>
            </div>
            {{-- <div class="col-auto float-right ml-auto">
                <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_generation"><i
                        class="fa fa-plus"></i>Generations Bulletins</a>
            </div> --}}
        </div>
    </div>
    <!-- /Page Header -->
    @include('layouts.partials.message')
    @include('layouts.partials.error')
    <!-- Search Filter -->
    <div class="row filter-row">
        <div class="col-sm-6 col-md-3">
            <div class="form-group">
                <label class="focus-label">Choississez une Periode</label>
                <select wire:model="PeriodeId" wire:change="chargerContrats" class="form-control">
                    <option value="0">---</option>
                    @forelse ($periodes as $periode)
                    <option value="{{ $periode->id }}">{{ ucfirst($periode->mois) }}</option>
                    @empty
                    <option value="0" disabled>Aucune feuille de calcul trouvée</option>
                    @endforelse
                </select>
            </div>
        </div>
    </div>
    <!-- Search Filter -->
    <div class="row">
        <div class="col-md-12">
            <div>
                <table class="table table-striped custom-table mb-0 datatable">
                    <thead>
                        <tr>
                            <th style="width: 30px;">#</th>
                            <th>Matricule</th>
                            <th>Agents</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $key = 1;
                        @endphp
                        @forelse ($bulletins as $items)
                        <tr>
                            <td>{{ $key++ }}</td>
                            <td>{{ $items->contrat->agent->matricule }}</td>
                            <td>{{ $items->contrat->agent->prenom.' '.$items->contrat->agent->nom }}</td>
                            <td class="text-right">
                                <div class="">
                                    <button wire:click="afficherRubriques({{ $items->id }},{{ $items->contrat_id }})"
                                        class="btn btn-primary btn-sm btn-outline-light">Generer</button>
                                </div>
                                {{-- <div class="">
                                    <a href="{{ url('admin/generations/'.$items->id.'/contrat/'.$items->contrat_id) }}"
                                        target="_blank"><button
                                            class="btn btn-primary btn-sm btn-outline-light">Generer</button></a>
                                </div> --}}
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">Pas de Generations Bulletins</td>
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
        $its = 0;
        $nombre_part = 0;
        $salaireNet = 0;
        $Impotbrut = 0;
        $ReductionChargeFamille=0;
    @endphp
    <!-- Page Header -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Payslip</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Bulletin de Paie</li>
                </ul>
            </div>
            <div class="col-auto float-right ml-auto">
                <div class="btn-group btn-group-sm">
                    <button class="btn btn-white">CSV</button>
                    <button class="btn btn-white">PDF</button>
                    <button class="btn btn-white"><i class="fa fa-print fa-lg"></i> Print</button>
                </div>
            </div>
        </div>
        <button type="button" wire:click="retour" class="btn btn-primary mt-2">Retour a la liste</button>
    </div>
    <!-- /Page Header -->

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="payslip-title">Payslip for the month of Feb 2019</h4>
                    <div class="row">
                        <div class="col-sm-6 m-b-20">
                            <img src="{{ asset('admin/assets/img/bim.png') }}" class="inv-logo" alt="">
                            <ul class="list-unstyled mb-0">
                                <li>Banque International du Mali</li>
                                <li>Bamako,Mali</li>
                                <li>Boulevard de l'independance</li>
                            </ul>
                        </div>
                        <div class="col-sm-6 m-b-20">
                            <div class="invoice-details">
                                <h3 class="text-uppercase">Payslip #49029</h3>
                                <ul class="list-unstyled">
                                    <li>Salaire du mois: <span>Janvier, {{ date('Y') }}</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 m-b-20">
                            <ul class="list-unstyled">
                                <li>
                                    <h5 class="mb-0"><strong>{{ $detailContrat->agent->prenom.'
                                            '.$detailContrat->agent->nom }}</strong></h5>
                                </li>
                                <li><span>{{ $detailContrat->agent->poste->nom }}</span></li>
                                <li>Matricule: {{ $detailContrat->agent->matricule }}</li>
                                {{-- <li>Joining Date: 1 Jan 2013</li> --}}
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div>
                                <h4 class="m-b-10"><strong>Les Rubriques</strong></h4>
                                <table class="table table-bordered">
                                    <tbody>
                                        @forelse ($rubriquesDuBulletin as $item)
                                        <tr>
                                            <td><strong>{{ $item->rubrique->libelle }}</strong>
                                                <span class="float-right">{{ number_format($item->montant) }}</span>
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
                                                <span class="float-right"><strong>{{ number_format($detailContrat->salaire) }}</strong></span>
                                                </td>
                                        </tr>
                                        @php

                                        // Calcul de l'INPS et du revenu imposable
                                        $salaireBrut = $montant + $detailContrat->salaire;
                                        $inps = ($salaireBrut * 3.6)/100;
                                        $RevenuImposable = $salaireBrut - $inps;
                                        if ($RevenuImposable > 3494130)
                                        {
                                            $ImpotBrut = ($RevenuImposable - 3494130) * 37 / 100; // Tranche 7 : 37%
                                        }
                                        elseif ($RevenuImposable > 2384195)
                                        {
                                            $ImpotBrut = ($RevenuImposable - 2384195) * 31 / 100; // Tranche 6 : 31%
                                        }
                                        elseif ($RevenuImposable > 1789733)
                                        {
                                            $ImpotBrut = ($RevenuImposable - 1789733) * 26 / 100; // Tranche 5 : 26%
                                        }
                                        elseif ($RevenuImposable > 1176400)
                                        {
                                            $ImpotBrut = ($RevenuImposable - 1176400) * 18 / 100; // Tranche 4 : 18%
                                        }
                                        elseif ($RevenuImposable > 578400)
                                        {
                                            $ImpotBrut = ($RevenuImposable - 578400) * 12 / 100; // Tranche 3 : 12%
                                        }
                                        elseif ($RevenuImposable > 330000)
                                        {
                                            $ImpotBrut = ($RevenuImposable - 330000) * 5 / 100; // Tranche 2 : 5%
                                        }
                                        else {
                                            $ImpotBrut = 0; // Tranche 1 : 0%
                                        }

                                        if ($detailContrat->situation_matrimoniale == 'Célibataire' || $detailContrat->situation_matrimoniale == 'Divorce' ||$detailContrat->situation_matrimoniale == 'Veuf')
                                        {
                                            $ReductionChargeFamille = 0; // Célibataire, divorcé(e) ou veuf (veuve), sans enfant à charge
                                        }
                                        elseif ($detailContrat->situation_matrimoniale == 'Marie' && $detailContrat->nombre_enfant == 0)
                                        {
                                            $ReductionChargeFamille = 10; // Marié(e), sans enfant à charge
                                        }
                                        elseif ($detailContrat->situation_matrimoniale == 'Marie' && $detailContrat->agent->sexe == 'M')
                                        {
                                            $ReductionChargeFamille = ($detailContrat->nombre_enfant * 2.5) + 10; // Marié(e), homme, avec enfant(s)
                                        } elseif ($detailContrat->situation_matrimoniale == 'Marie' && $detailContrat->agent->sexe == 'F')
                                        {
                                            $ReductionChargeFamille = 10; // Marié(e), femme, avec enfant(s)

                                        // TODO: Ajouter la logique pour la répartition entre les époux si nécessaire
                                        }

                                        $its = $ImpotBrut - $ReductionChargeFamille;
                                        $salaireNet = $salaireBrut - $its;

                                        @endphp
                                        <tr>
                                            <td><strong>Salaire Brut</strong>
                                                <span class="float-right"><strong>{{ number_format($salaireBrut) }}</strong></span>
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
                                                    class="float-right">{{ number_format($inps) }}</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Impot Brut</strong> <span class="float-right">{{ number_format($ImpotBrut) }}</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>ITS</strong> <span class="float-right">{{ number_format($its) }}</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Charge de Familles</strong> <span class="float-right">{{ $ReductionChargeFamille }}</span></td>
                                        </tr>
                                        {{-- <tr>
                                            <td><strong>Total Deductions</strong> <span
                                                    class="float-right"><strong>$59698</strong></span></td>
                                        </tr> --}}
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
