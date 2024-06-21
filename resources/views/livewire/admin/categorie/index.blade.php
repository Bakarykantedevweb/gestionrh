<div>
    @include('livewire.admin.categorie.modal')
    <!-- Page Header -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Categories</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Categories</li>
                </ul>
            </div>
            <div class="col-auto float-right ml-auto">
                <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_categorie"><i
                        class="fa fa-plus"></i> Add Categories</a>
            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped custom-table mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom </th>
                            <th>Status</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $categorie)
                        <tr>
                            <td>{{ $categorie->id }}</td>
                            <td>{{ $categorie->nom }}</td>
                            <td>
                                @if ($categorie->status == '1')
                                <a><i class="fa fa-dot-circle-o text-success"></i>
                                    Active
                                </a>
                                @else
                                <a><i class="fa fa-dot-circle-o text-danger"></i>
                                    Inactive
                                </a>
                                @endif
                            </td>
                            <td class="text-right">
                                <div class="dropdown dropdown-action">
                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                        aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" wire:click="editCategorie({{ $categorie->id }})" href="#" data-toggle="modal"
                                            data-target="#add_categorie"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                        <a class="dropdown-item" wire:click="deleteCategorie({{ $categorie->id }})" href="#" data-toggle="modal"
                                            data-target="#delete_categorie"><i class="fa fa-trash m-r-5"></i>
                                            Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">Pas de Categories</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
