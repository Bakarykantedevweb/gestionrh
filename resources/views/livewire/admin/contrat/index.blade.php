<div>
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Contrats</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Tableau de Bord</a></li>
                    <li class="breadcrumb-item active">Contrats</li>
                </ul>
            </div>
            <div class="col-auto float-right ml-auto">
                <a href="{{ url('admin/contrats/create') }}" class="btn add-btn"><i class="fa fa-plus"></i> Nouveau
                    Contrat</a>
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
                            <th style="width: 30px;">#</th>
                            <th>Numero Contrat</th>
                            <th>Date creation</th>
                            <th>Agent</th>
                            <th class="text-right">Action</th>
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
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                            aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a wire:click="editDepartement({{ $items->id }})" class="dropdown-item"
                                                href="#" data-toggle="modal" data-target="#edit_departement"><i
                                                    class="fa fa-pencil m-r-5"></i>
                                                Edit</a>
                                            <a wire:click="deleteDepartement({{ $items->id }})" class="dropdown-item"
                                                href="#" data-toggle="modal" data-target="#delete_departement"><i
                                                    class="fa fa-trash-o m-r-5"></i>
                                                Delete</a>
                                        </div>
                                    </div>
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
    </div>
</div>
