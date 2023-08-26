<div>
    @include('livewire.admin.categorie.modal')
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Categorie</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Tableau de Bord</a></li>
                    <li class="breadcrumb-item active">Categorie</li>
                </ul>
            </div>
            <div class="col-auto float-right ml-auto">
                <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_categorie"><i
                        class="fa fa-plus"></i> Nouveau Categorie</a>
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
                            <th>Libelle</th>
                            <th>Montant</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $items)
                            <tr>
                                <td>{{ $items->id }}</td>
                                <td>{{ $items->libelle }}</td>
                                <td>{{ $items->montant }}</td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                            aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a wire:click="editCategorie({{ $items->id }})" class="dropdown-item" href="#" data-toggle="modal"
                                                data-target="#edit_categorie"><i class="fa fa-pencil m-r-5"></i>
                                                Edit</a>
                                            <a wire:click="deleteCategorie({{ $items->id }})" class="dropdown-item" href="#" data-toggle="modal"
                                                data-target="#delete_categorie"><i class="fa fa-trash-o m-r-5"></i>
                                                Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Pas de Categorie</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
