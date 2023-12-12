<div>
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
            @if ($rubriquesDuBulletin)
            <h2>Rubriques du Bulletin</h2>
            <ul>
                @php
                    $montant = 0;
                    $salaireBruit = 0;
                    $inps = 0;
                    $its = 0;
                    $nombre_part = 0;
                    $salaireNet = 0;
                @endphp
                @foreach ($rubriquesDuBulletin as $item)
                <li>{{ $item->rubrique->libelle }} : {{ number_format($item->montant) }}</li>
                @php $montant += $item->montant; @endphp
                @endforeach
                <li>Salaire de Base : {{ number_format($detailContrat->salaire) }}</li>
            </ul>
            <h3>Salaire Brut: @php echo number_format($salaireBruit = $montant + $detailContrat->salaire ) @endphp</h3>
            @php
                $inps = ($salaireBruit * 3.6)/100;

                if($detailContrat->situation_matrimoniale == 'Marie' AND $detailContrat->agent->sexe == 'F')
                {
                    $nombre_part = 10;
                }

                if($detailContrat->situation_matrimoniale == 'Marie' AND $detailContrat->agent->sexe == 'M')
                {
                    $nombreEnfant = $detailContrat->nombre_enfant * 2.5;
                    $nombre_part = $nombreEnfant + 10;
                }

                $its = ($salaireBruit * $nombre_part) /100;

                $salaireNet = $salaireBruit - $inps - $its;
            @endphp
            <h3>INPS: @php echo number_format($inps) @endphp</h3>
            <h3>ITS: @php echo number_format($its) @endphp</h3>
            <h3>ITS: @php echo number_format($salaireNet) @endphp</h3>
            @endif
        </div>
    </div>

</div>
