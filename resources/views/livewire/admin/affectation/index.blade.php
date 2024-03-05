<div>
    @include('livewire.admin.affectation.modal')
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Listes des affectations</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Tableau de Bord</a></li>
                    <li class="breadcrumb-item active">Listes des affectations</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->
    @include('layouts.partials.message')
    @include('layouts.partials.error')
    <div class="row">
        <div class="col-md-12">
            <div>
                <table class="table table-striped custom-table mb-0 datatable">
                    <thead>
                        <tr>
                            <th>Agent</th>
                            <th>Agence</th>
                            <th>Departement</th>
                            <th>Poste</th>
                            <th>Date prise de service</th>
                            <th>Date fin de service</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($affectations as $items)
                            <tr>
                                <td>{{ $items->agent->prenom . ' ' . $items->agent->nom }}</td>
                                <td>{{ $items->agence->nom }}</td>
                                <td>{{ $items->departement->code }}</td>
                                <td>{{ $items->poste->nom }}</td>
                                <td>{{ \Carbon\Carbon::parse($items->date_debut)->isoFormat('LL') }}</td>
                                <td>
                                    @if ($items->date_fin == '')
                                        <span class="badge bg-inverse-success">En cour</span>
                                    @else
                                        <span
                                            class="badge bg-inverse-danger">{{ \Carbon\Carbon::parse($items->date_fin)->isoFormat('LL') }}</span>
                                    @endif
                                </td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                            aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            @if ($items->date_fin == '')
                                                <a wire:click="MettreFin({{ $items->id }})" class="dropdown-item"
                                                    href="#" data-toggle="modal" data-target="#mettre_fin"><i
                                                        class="fa fa-close m-r-5"></i>
                                                    Mettre fin</a>
                                            @elseif($items->date_fin != '' and $items->status == 1)
                                                <a wire:click="AddAffectation({{ $items->agent_id }},{{ $items->id }})"
                                                    class="dropdown-item" href="#" data-toggle="modal"
                                                    data-target="#add_affectation"><i class="fa fa-plus m-r-5"></i>
                                                    Nouveau</a>
                                            @elseif(!$items->date_fin != '' and $items->status == 2)
                                                {{-- <a wire:click="AddAffectation({{ $items->agent_id }},{{ $items->id }})"
                                                    class="dropdown-item" href="#" data-toggle="modal"
                                                    data-target="#add_affectation"><i class="fa fa-plus m-r-5"></i>
                                                    Nouveau</a> --}}
                                            @endif
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Pas d'Agences</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
