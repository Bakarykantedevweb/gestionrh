<div>
    @include('livewire.admin.enfant.modal')
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Gestion des Enfants</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Tableau de Bord</a></li>
                    <li class="breadcrumb-item active">Gestion des Enfants</li>
                </ul>
            </div>
            <div class="col-auto float-right ml-auto">
                <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_enfant"><i class="fa fa-plus"></i>
                    Nouveau Enfant</a>
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
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Date Naissance</th>
                            <th>Age</th>
                            <th>Parent</th>
                            <th>Acte de Naissance</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($enfants as $items)
                        <tr>
                            <td>{{ $items->id }}</td>
                            <td>{{ $items->nom }}</td>
                            <td>{{ $items->prenom }}</td>
                            <td>{{ $items->jour.'-'.$items->mois.'-'.$items->annee }}</td>
                            <td>{{ $items->age}}</td>
                            <td>{{ $items->agent->prenom.'-'.$items->agent->nom }}</td>
                            <td><button class="btn btn-info"><i class="fa fa-eye"></i></button></td>
                            <td class="text-right">
                                <div class="dropdown dropdown-action">
                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                        aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a wire:click="editenfant({{ $items->id }})" class="dropdown-item" href="#"
                                            data-toggle="modal" data-target="#edit_enfant"><i
                                                class="fa fa-pencil m-r-5"></i>
                                            Edit</a>
                                        <a class="dropdown-item" href="#" data-toggle="modal"
                                            data-target="#delete_enfant"><i class="fa fa-trash-o m-r-5"></i>
                                            Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center">Pas de Departements</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
