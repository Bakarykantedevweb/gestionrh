<div>
    @include('livewire.admin.contrat.modal')
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Contrats</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Tableau de Bord</a></li>
                    <li class="breadcrumb-item active">Contrats</li>
                </ul>
            </div>
            {{-- <div class="col-auto float-right ml-auto">
                <a href="{{ url('admin/contrats/create') }}" class="btn add-btn"><i class="fa fa-plus"></i> Nouveau
                    Contrat</a>
            </div> --}}
        </div>
    </div>
    <!-- /Page Header -->
    @include('layouts.partials.message')
    @include('layouts.partials.error')
    <div class="card">
        <div class="card-body">
            <!-- <h4 class="card-title">Solid justified</h4> -->
            <ul class="nav nav-tabs nav-tabs-solid nav-justified">
                <li class="nav-item"><a class="nav-link{{ $cdi ? ' active' : '' }}" href="#"
                        wire:click="activeContent('{{ encrypt('cdi') }}')">CDI</a></li>
                <li class="nav-item"><a class="nav-link{{ $cdd ? ' active' : '' }}" href="#"
                        wire:click="activeContent('{{ encrypt('cdd') }}')">CDD</a></li>
                <li class="nav-item"><a class="nav-link{{ $cdq ? ' active' : '' }}" href="#"
                        wire:click="activeContent('{{ encrypt('cdq') }}')">CQ</a></li>
                <li class="nav-item"><a class="nav-link{{ $contratTermine ? ' active' : '' }}" href="#"
                        wire:click="activeContent('{{ encrypt('contratTermine') }}')">Contrat Terminé </a></li>
                {{-- <li class="nav-item"><a class="nav-link{{ $contratCaisse ? ' active' : '' }}" href="#"
                        wire:click="activeContent('{{ encrypt('contratCaisse') }}')">Contrat Caissé</a></li> --}}
            </ul>
        </div>
    </div>
    @if ($cdi)
        <div class="row">
            <div class="col-md-12">
                <div>
                    <table class="table table-striped custom-table mb-0 datatable">
                        <thead>
                            <tr>
                                <th style="width: 30px;">#</th>
                                <th>Numero Contrat</th>
                                <th>Date creation</th>
                                <th>Agent</th>
                                <th>Contrat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $key = 1;
                            @endphp
                            @forelse ($cdiListes as $items)
                                <tr>
                                    <td>{{ $key++ }}</td>
                                    <td>{{ $items->numero }}</td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($items->date_creation)->locale('fr_FR')->isoFormat('dddd D MMMM
                                                                            YYYY') }}
                                    </td>
                                    <td>{{ $items->agent->prenom . '-' . $items->agent->nom }}</td>
                                    <td>{{ $items->typeContrat->nom }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Pas de Contrats</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
    @if ($cdd)
        <div class="row">
            <div class="col-md-12">
                <div>
                    <table class="table table-striped custom-table mb-0 datatable">
                        <thead>
                            <tr>
                                <th style="width: 30px;">#</th>
                                <th>Numero Contrat</th>
                                <th>Date creation</th>
                                <th>Date Fin</th>
                                <th>Agent</th>
                                <th>Contrat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $key = 1;
                            @endphp
                            @forelse ($cddListes as $items)
                                <tr>
                                    <td>{{ $key++ }}</td>
                                    <td>{{ $items->numero }}</td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($items->date_creation)->locale('fr_FR')->isoFormat('dddd D MMMM
                                                                            YYYY') }}
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($items->date_fin)->locale('fr_FR')->isoFormat('dddd D MMMM
                                                                            YYYY') }}
                                    </td>
                                    <td>{{ $items->agent->prenom . '-' . $items->agent->nom }}</td>
                                    <td>{{ $items->typeContrat->nom }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Pas de Contrats</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
    @if ($cdq)
        <div class="row">
            <div class="col-md-12">
                <div>
                    <table class="table table-striped custom-table mb-0 datatable">
                        <thead>
                            <tr>
                                <th style="width: 30px;">#</th>
                                <th>Numero Contrat</th>
                                <th>Date creation</th>
                                <th>Date Fin</th>
                                <th>Agent</th>
                                <th>Contrat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $key = 1;
                            @endphp
                            @forelse ($cdqListes as $items)
                                <tr>
                                    <td>{{ $key++ }}</td>
                                    <td>{{ $items->numero }}</td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($items->date_creation)->locale('fr_FR')->isoFormat('dddd D MMMM
                                                                            YYYY') }}
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($items->date_fin)->locale('fr_FR')->isoFormat('dddd D MMMM
                                                                            YYYY') }}
                                    </td>
                                    <td>{{ $items->agent->prenom . '-' . $items->agent->nom }}</td>
                                    <td>{{ $items->typeContrat->nom }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Pas de Contrats</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
    @if ($contratTermine)
        <!-- Search Filter -->
        <div>
            <div class="row filter-row">
                <div class="col-sm-6 col-md-3">
                    <div class="form-group form-focus select-focus">
                        <select class="form-control" wire:model="typeContrat">
                            <option value="0">Choisissez un type de contrat</option>
                            <option value="2">CDD</option>
                            <option value="3">CQ</option>
                        </select>
                        <label class="focus-label">Designation</label>
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
                                    <th>Numero Contrat</th>
                                    <th>Date creation</th>
                                    <th>Date Fin</th>
                                    <th>Agent</th>
                                    <th>Contrat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $key = 1;
                                @endphp
                                @forelse ($contratTermineListes as $items)
                                    <tr>
                                        <td>{{ $key++ }}</td>
                                        <td>{{ $items->numero }}</td>
                                        <td>{{ \Carbon\Carbon::parse($items->date_creation)->locale('fr_FR')->isoFormat('dddd D MMMM YYYY') }}
                                        </td>
                                        <td class="text-danger">
                                            {{ \Carbon\Carbon::parse($items->date_fin)->locale('fr_FR')->isoFormat('dddd D MMMM YYYY') }}
                                        </td>
                                        <td>{{ $items->agent->prenom . '-' . $items->agent->nom }}</td>
                                        <td>{{ $items->typeContrat->nom }}</td>
                                        <td>
                                            <button type="button" wire:click="relancerContrat({{ $items->id }})"
                                                data-toggle="modal" data-target="#add_classification"
                                                class="btn btn-primary btn-sm">
                                                Relancer
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Pas de Contrats</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    @endif
</div>
