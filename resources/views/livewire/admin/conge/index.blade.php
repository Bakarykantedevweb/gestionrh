<div>
    @include('livewire.admin.conge.modal')
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Liste des Conges</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Tableau de Bord</a></li>
                    <li class="breadcrumb-item active">Conges</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->
    @include('layouts.partials.message')
    @include('layouts.partials.error')
    <div class="card">
        <div class="card-body">
            <!-- <h4 class="card-title">Solid justified</h4> -->
            <ul class="nav nav-tabs nav-tabs-solid nav-justified">
                <li class="nav-item"><a class="nav-link{{ $congeEnAttende ? ' active' : '' }}" href="#"
                        wire:click="activeContent('{{ encrypt('congeEnAttende') }}')">Conge en attende</a></li>
                <li class="nav-item"><a class="nav-link{{ $congeValide ? ' active' : '' }}" href="#"
                        wire:click="activeContent('{{ encrypt('congeValide') }}')">Conge validé</a></li>
                <li class="nav-item"><a class="nav-link{{ $congeRejete ? ' active' : '' }}" href="#"
                        wire:click="activeContent('{{ encrypt('congeRejete') }}')">Conge rejeté</a></li>
            </ul>
        </div>
    </div>
    @if ($congeEnAttende)
        <div class="row">
            <div class="col-md-12">
                <div>
                    <table class="table table-striped custom-table mb-0 datatable">
                        <thead>
                            <tr>
                                <th style="width: 30px;">#</th>
                                <th>Agent</th>
                                <th>Type Conge</th>
                                <th>Date debut</th>
                                <th>Date fin</th>
                                <th>Duree</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $key = 1;
                            @endphp
                            @forelse ($congeEnAttendeListes as $conge)
                                <tr>
                                    <td>{{ $key++ }}</td>
                                    <td>
                                        <label>{{ $conge->agent->prenom.' '.$conge->agent->nom }}</label>
                                    </td>
                                    <td>
                                        <label>{{ $conge->typeConge->nom }}</label>
                                    </td>
                                    <td>
                                        <label>{{ \Carbon\Carbon::parse($conge->date_debut)->isoFormat('LL') }}</label>
                                    </td>
                                    <td>
                                        <label>{{ \Carbon\Carbon::parse($conge->date_fin)->isoFormat('LL') }}</label>
                                    </td>
                                    <td><label>{{ $conge->duree }} jours</label></td>
                                    <td>
                                        <span class="btn btn-warning btn-sm">En attente</span>
                                    </td>
                                    <td>
                                        <button data-toggle="modal" wire:click="editConge({{ $conge->id }})" data-target="#emargement" type="button"
                                            class="btn btn-primary btn-sm">
                                            Action
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Pas de Conge</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
    @if ($congeValide)
        <div class="row">
            <div class="col-md-12">
                <div>
                    <table class="table table-striped custom-table mb-0 datatable">
                        <thead>
                            <tr>
                                <th style="width: 30px;">#</th>
                                <th>Agent</th>
                                <th>Type Conge</th>
                                <th>Date debut</th>
                                <th>Date fin</th>
                                <th>Duree</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $key = 1;
                            @endphp
                            @forelse ($congeValideListes as $conge)
                                <tr>
                                    <td>{{ $key++ }}</td>
                                    <td>
                                        <label>{{ $conge->agent->prenom.' '.$conge->agent->nom }}</label>
                                    </td>
                                     <td>
                                        <label>{{ $conge->typeConge->nom }}</label>
                                    </td>
                                    <td>
                                        <label>{{ \Carbon\Carbon::parse($conge->date_debut)->isoFormat('LL') }}</label>
                                    </td>
                                    <td>
                                        <label>{{ \Carbon\Carbon::parse($conge->date_fin)->isoFormat('LL') }}</label>
                                    </td>
                                    <td><label>{{ $conge->duree }} jours</label></td>
                                    <td>
                                        <span class="btn btn-success btn-sm">Approuvée</span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Pas de Conge</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
    @if ($congeRejete)
        <div class="row">
            <div class="col-md-12">
                <div>
                    <table class="table table-striped custom-table mb-0 datatable">
                        <thead>
                            <tr>
                                <th style="width: 30px;">#</th>
                                <th>Agent</th>
                                <th>Type Conge</th>
                                <th>Date debut</th>
                                <th>Date fin</th>
                                <th>Duree</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $key = 1;
                            @endphp
                            @forelse ($congeRejeteListes as $conge)
                                <tr>
                                    <td>{{ $key++ }}</td>
                                    <td>
                                        <label>{{ $conge->agent->prenom.' '.$conge->agent->nom }}</label>
                                    </td>
                                    <td>
                                        <label>{{ $conge->typeConge->nom }}</label>
                                    </td>
                                    <td>
                                        <label>{{ \Carbon\Carbon::parse($conge->date_debut)->isoFormat('LL') }}</label>
                                    </td>
                                    <td>
                                        <label>{{ \Carbon\Carbon::parse($conge->date_fin)->isoFormat('LL') }}</label>
                                    </td>
                                    <td><label>{{ $conge->duree }} jours</label></td>
                                    <td>
                                        <span class="btn btn-danger btn-sm">Rejeté</span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Pas de Conge</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
</div>
