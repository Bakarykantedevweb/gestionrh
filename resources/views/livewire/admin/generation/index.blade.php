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
                                {{-- <div class="">
                                    <button wire:click="afficherRubriques({{ $items->id }},{{ $items->contrat_id }})"
                                        class="btn btn-primary btn-sm btn-outline-light">Generer</button>
                                </div> --}}
                                <div class="">
                                    <a href="{{ url('admin/generations/'.$items->id.'/contrat/'.$items->contrat_id) }}" target="_blank"><button class="btn btn-primary btn-sm btn-outline-light">Generer</button></a>
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
        </div>
    </div>

</div>
