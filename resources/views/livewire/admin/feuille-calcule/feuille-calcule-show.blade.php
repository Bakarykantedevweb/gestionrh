<div>
    @include('livewire.admin.feuille-calcule.feuille-calcule-modal')
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Feuille de Calcule</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Tableau de Bord</a></li>
                    <li class="breadcrumb-item active">Feuille de Calcule</li>
                </ul>
            </div>
            <div class="col-auto float-right ml-auto">
                <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_feuille_calcule"><i
                        class="fa fa-plus"></i> Nouvelle Feuille de Calcule</a>
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
                            <th>Feuille de Calcule Code</th>
                            <th>Feuille de Calcule Nom</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($FeuilledeCalcules as $items)
                            <tr>
                                <td>{{ $items->id }}</td>
                                <td>{{ $items->code }}</td>
                                <td>{{ $items->libelle }}</td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                            aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a wire:click="editFeuilledeCalcule({{ $items->id }})" class="dropdown-item" href="#" data-toggle="modal"
                                                data-target="#edit_feuille_calcule"><i class="fa fa-pencil m-r-5"></i>
                                                Edit</a>
                                            <a wire:click="deleteFeuilledeCalcule({{ $items->id }})" class="dropdown-item" href="#" data-toggle="modal"
                                                data-target="#delete_feuille_calcule"><i class="fa fa-trash-o m-r-5"></i>
                                                Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Pas de Feuille de Calcules</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

