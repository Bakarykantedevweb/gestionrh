<div>
    @include('livewire.admin.Bulletin.modal')
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Bulletin</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Tableau de Bord</a></li>
                    <li class="breadcrumb-item active">Bulletin</li>
                </ul>
            </div>
            @if ($listeBulletin)
                <div class="col-auto float-right ml-auto">
                    <button type="button" wire:click="activeContent('{{ encrypt('BulletinPreparation') }}')"
                        class="btn add-btn"><i class="fa fa-plus"></i> Preparation du Bulletin</button>
                </div>
            @endif
            @if ($BulletinPreparation)
                <div class="col-auto float-right ml-auto">
                    <button type="button" wire:click="activeContent('{{ encrypt('listeBulletin') }}')"
                        class="btn add-btn"><i class="fa fa-plus"></i> Bulletins</button>
                </div>
            @endif
        </div>
    </div>
    <!-- /Page Header -->
    @include('layouts.partials.message')
    @include('layouts.partials.error')
    @if ($listeBulletin)
        <div class="row">
            <div class="col-md-3">
                <div class="card punch-status">
                    <div class="card-body">
                        <h5 class="card-title">Choississez un mois</h5>
                        <ul>
                            @foreach ($periodes as $periode)
                                <a wire:click="selectMonth('{{ $periode->mois }}')" href="#">
                                    <li>
                                        {{ ucfirst($periode->mois) }}
                                        {{-- <button type="button"  class="mb-2 ml-2 btn btn-primary">Ouvrir</button> --}}
                                    </li>
                                </a>
                            @endforeach
                        </ul>
                    </div>
                    <button type="button" wire:click="annuler"
                        class="btn btn-primary btn-sm mb-3 ml-4 mr-4">Annuler</button>
                </div>
            </div>
            @if ($showTable)
                <div class="col-md-9">
                    <h4>Preparation pour le mois de {{ $selectedMonthName }}</h4>
                    <div>
                        <table class="table table-striped custom-table mb-0 datatable">
                            <thead>
                                <tr>
                                    <th style="width: 30px;">#</th>
                                    <th>Matricule</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $key = 1;
                                @endphp
                                @forelse ($contrats as $items)
                                    <tr>
                                        <td>{{ $key++ }}</td>
                                        <td>{{ $items->numero }}</td>
                                        <td>
                                            {{ \Carbon\Carbon::parse($items->date_creation)->locale('fr_FR')->isoFormat('dddd D MMMM YYYY') }}
                                        </td>
                                        <td>{{ $items->agent->prenom . '-' . $items->agent->nom }}</td>
                                        <td>
                                            <button type="button" data-toggle="modal" data-target="#add_bulletin"
                                                class="btn btn-primary btn-sm">Calculer</button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">Pas de Departements</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    @endif
    @if ($BulletinPreparation)
        <h1>Preparation de la Paie</h1>
        <!-- Search Filter -->
        <div class="row filter-row">
            <div class="col-sm-6 col-md-3">
                <div class="form-group form-focus select-focus">
                    <select class="form-control select floating">
                        <option value="">---</option>
                        @foreach ($feuilleCalcules as $items)
                            <option value="{{ $items->id }}">{{ $items->libelle }}</option>
                        @endforeach
                    </select>
                    <label class="focus-label">Choississez une feuille de calcule</label>
                </div>
            </div>
            {{-- <div class="col-sm-6 col-md-3">
                <a href="#" class="btn btn-success btn-block"> Search </a>
            </div> --}}
        </div>
        <!-- Search Filter -->
    @endif
</div>
