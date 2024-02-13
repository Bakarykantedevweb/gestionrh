<div>
    @include('livewire.admin.stagiaire.modal')
    <!-- Page Header -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Stagiaires</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Stagiaires</li>
                </ul>
            </div>
            @if ($stageEnCour)
                <div class="col-auto float-right ml-auto">
                    <button class="btn add-btn" data-toggle="modal" data-target="#add_stagiaire"><i
                            class="fa fa-plus"></i>
                        Ajouter un Stagiaire</button>
                </div>
            @endif
        </div>
    </div>
    <!-- /Page Header -->
    @include('layouts.partials.message')
    @include('layouts.partials.error')
    <div class="card">
        <div class="card-body">
            <!-- <h4 class="card-title">Solid justified</h4> -->
            <ul class="nav nav-tabs nav-tabs-solid nav-justified">
                <li class="nav-item"><a class="nav-link{{ $stageEnCour ? ' active' : '' }}" href="#"
                        wire:click="activeContent('{{ encrypt('stageEnCour') }}')">Stage en Cours</a></li>
                <li class="nav-item"><a class="nav-link{{ $statistique ? ' active' : '' }}" href="#"
                        wire:click="activeContent('{{ encrypt('statistique') }}')">Statistiques</a></li>
                <li class="nav-item"><a class="nav-link{{ $stageTermine ? ' active' : '' }}" href="#"
                        wire:click="activeContent('{{ encrypt('stageTermine') }}')">Stage Termine</a></li>
            </ul>
        </div>
    </div>
    @if ($stageEnCour)
        <!-- Search Filter -->
        <div class="row filter-row">
            <div class="col-sm-3 col-md-3">
                <div class="form-group form-focus">
                    <input type="search" wire:model="matricule" class="form-control floating">
                    <label class="focus-label">Matricule</label>
                </div>
            </div>
            <div class="col-sm-3 col-md-3">
                <div class="form-group form-focus">
                    <select wire:model="departementId" class="form-control">
                        <option value="">---</option>
                        @foreach ($departementSearchs as $items)
                            <option value="{{ $items->id }}">{{ $items->nom }} ({{ $items->code }})</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-3 col-md-3">
                <div class="form-group form-focus">
                    <select wire:model="agenceId" class="form-control">
                        <option value="">---</option>
                        @foreach ($agences as $item)
                            <option value="{{ $item->id }}">{{ $item->nom }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            {{-- <div class="col-sm-6 col-md-3">
            <a href="#" class="btn btn-success btn-block"> Search </a>
        </div> --}}
        </div>
        <!-- Search Filter -->
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table mb-0 datatable">
                        <thead>
                            <tr>
                                <th>Matricule</th>
                                <th>Prenom & Nom</th>
                                <th>Email</th>
                                <th>Telephone</th>
                                <th>Date Debut</th>
                                <th>Date Fin</th>
                                <th>Departement</th>
                                <th>Agence</th>
                                <th>Convention</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($stagiaires as $stagiaire)
                                <tr>
                                    <td>{{ $stagiaire->matricule }}</td>
                                    <td>{{ $stagiaire->prenom }} {{ $stagiaire->nom }}</td>
                                    <td>{{ $stagiaire->email }}</td>
                                    <td>{{ $stagiaire->telephone }}</td>
                                    <td>{{ \Carbon\Carbon::parse($stagiaire->date_debut)->isoFormat('LL') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($stagiaire->date_fin)->isoFormat('LL') }}</td>
                                    <td>{{ $stagiaire->departement->code }}</td>
                                    <td>{{ $stagiaire->agence->nom }}</td>
                                    <td>
                                        <a href="{{ url('admin/convention/'.$stagiaire->matricule) }}" target="_blank" class="btn btn-primary btn-sm">
                                            <i class="fa fa-file-pdf-o"></i>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                                aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#"
                                                    wire:click="editStagiaire({{ $stagiaire->id }})"
                                                    data-toggle="modal" data-target="#add_stagiaire"><i
                                                        class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal"
                                                    data-target="#delete_job"><i class="fa fa-trash-o m-r-5"></i>
                                                    Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">Pas de Stagiaires</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
    @if ($statistique)
        <div class="card">
            {{-- <div class="card-header">
                <h4 class="card-title mb-0">Listes des agences</h4>
            </div> --}}
            <div class="card-body">
                <div class="row">
                    @forelse ($agences as $agence)
                        <div class="col-md-3 text-center">
                            <div class="stats-box mb-4">
                                <p>{{ $agence->nom }}</p>
                                <h3>{{ count($agence->stagiaires) }}</h3>
                                <button class="btn btn-primary" wire:click="voirStagiaires({{ $agence->id }})" data-toggle="modal" data-target="#voir_stagiaire"><i class="fa fa-eye"></i></button>
                            </div>
                        </div>
                    @empty
                        <h2>Pas d'agences</h2>
                    @endforelse
                </div>
            </div>
        </div>
    @endif
    @if ($stageTermine)
        <!-- Search Filter -->
        <div class="row filter-row">
            <div class="col-sm-3 col-md-3">
                <div class="form-group form-focus">
                    <input type="search" wire:model="matricule" class="form-control floating">
                    <label class="focus-label">Matricule</label>
                </div>
            </div>
            <div class="col-sm-3 col-md-3">
                <div class="form-group form-focus">
                    <select wire:model="departementId" class="form-control">
                        <option value="">---</option>
                        @foreach ($departementSearchs as $items)
                            <option value="{{ $items->id }}">{{ $items->nom }} ({{ $items->code }})</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-3 col-md-3">
                <div class="form-group form-focus">
                    <select wire:model="agenceId" class="form-control">
                        <option value="">---</option>
                        @foreach ($agences as $item)
                            <option value="{{ $item->id }}">{{ $item->nom }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            {{-- <div class="col-sm-6 col-md-3">
            <a href="#" class="btn btn-success btn-block"> Search </a>
        </div> --}}
        </div>
        <!-- Search Filter -->
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table mb-0 datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Matricule</th>
                                <th>Prenom</th>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Telephone</th>
                                <th class="text-danger">Date Debut</th>
                                <th class="text-danger">Date Fin</th>
                                <th>Departement</th>
                                <th>Agence</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($stageTermines as $stagiaire)
                                <tr>
                                    <td>{{ $stagiaire->id }}</td>
                                    <td>{{ $stagiaire->matricule }}</td>
                                    <td>{{ $stagiaire->prenom }}</td>
                                    <td>{{ $stagiaire->nom }}</td>
                                    <td>{{ $stagiaire->email }}</td>
                                    <td>{{ $stagiaire->telephone }}</td>
                                    <td class="text-danger">
                                        {{ \Carbon\Carbon::parse($stagiaire->date_debut)->isoFormat('LL') }}</td>
                                    <td class="text-danger">
                                        {{ \Carbon\Carbon::parse($stagiaire->date_fin)->isoFormat('LL') }}</td>
                                    <td>{{ $stagiaire->departement->code }}</td>
                                    <td>{{ $stagiaire->agence->nom }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('admin/attestation/'.$stagiaire->matricule) }}" target="_blank" class="btn btn-primary btn-sm">
                                            Attestation
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="text-center">Pas de Stagiaires</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
</div>
