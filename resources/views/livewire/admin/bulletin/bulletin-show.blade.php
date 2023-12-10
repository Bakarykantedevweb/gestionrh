<div>
    @include('livewire.admin.Bulletin.modal')
    <div class="page-header">
        <div class="row align-contrats-center">
            <div class="col">
                <h3 class="page-title">Bulletin</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-contrat"><a href="{{ route('dashboard') }}">Tableau de Bord </a></li>
                    <li class="breadcrumb-contrat active">Bulletin</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->
    @include('layouts.partials.message')
    @include('layouts.partials.error')
    <form wire:submit.prevent="SaveBulletin">
        <div class="row">
            <div class="col-md-2">
                <div class="card flex-fill dash-statistics">
                    <div class="card-body">
                        <h5 class="card-title">Choisissez</h5>
                        @foreach ($periodes as $periode)
                        <div class="stats-list mb-2">
                            <a href="#" wire:click="selectMonth('{{ $periode->mois }}')">
                                {{ ucfirst($periode->mois) }}
                            </a>
                        </div>
                        @endforeach
                        <button wire:click="annuler" type="button" class="btn btn-primary">Annuler</button>
                    </div>
                </div>
            </div>
            @if ($showTable)
                <div class="col-md-10">
                    <h3>Preparation de la Paie {{ $selectedMonthName }}</h3>
                    <!-- Search Filter -->
                    <div class="row filter-row">
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label class="focus-label">Choississez une feuille de calcule</label>
                                <select wire:model="feuilleCalculeId" wire:change="getRubriques" class="form-control">
                                    <option value="0">---</option>
                                    @forelse ($feuilleCalcules as $feuille)
                                        <option value="{{ $feuille->id }}">{{ $feuille->libelle }}</option>
                                    @empty
                                        <option value="0" disabled>Aucune feuille de calcul trouvée</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- Search Filter -->
                    <div class="table-responsive m-t-15">
                        <table class="table table-striped custom-table">
                            <thead>
                                @if ($rubriques)
                                <tr>
                                    <th>Agents</th>
                                    @foreach ($rubriques as $rubrique)
                                        <th class="text-center">{{ $rubrique->libelle }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($contrats as $contrat)
                                <tr>
                                    <td>{{ $contrat->agent->prenom.' '.$contrat->agent->nom }}</td>
                                    @foreach ($rubriques as $rubrique)
                                        <td class="text-center">
                                            <input type="number" min="1" wire:model="montant.{{ $contrat->id }}.{{ $rubrique->id }}"
                                                class="form-control">
                                        </td>
                                    @endforeach
                                </tr>
                                @empty
                                    <td class="text-center">Pas D'contrats pour cette feuille</td>
                                @endforelse
                                @else
                                <tr>
                                    <td colspan="2" class="text-center">Aucune rubrique trouvée</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    @if ($rubriques)
                        <button class="btn btn-primary btn-outline-light" type="submit">Terminer</button>
                    @endif
                </div>
            @endif
        </div>
    </form>

</div>
