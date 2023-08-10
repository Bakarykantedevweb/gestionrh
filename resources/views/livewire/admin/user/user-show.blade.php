<div>
    @include('livewire.admin.user.user-modal')
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Gestion des Administrateurs</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Tableau de Bord</a></li>
                    <li class="breadcrumb-item active">Gestion des Administrateurs</li>
                </ul>
            </div>
            <div class="col-auto float-right ml-auto">
                <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_user"><i
                        class="fa fa-plus"></i> Nouveau</a>
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
                            <th>E-mail</th>
                            <th>Type Utilisateur</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $items)
                            <tr>
                                <td>{{ $items->id }}</td>
                                <td>{{ $items->name }}</td>
                                <td>{{ $items->email }}</td>
                                <td>{{ $items->role_type_user->role_type }}</td>
                                <td>{{ $items->role->nom }}</td>
                                <td>
                                    @if ($items->role->type == 1)
                                        <span class="badge bg-inverse-success">Active</span>
                                    @else
                                        <span class="badge bg-inverse-danger">Inactive</span>
                                    @endif
                                </td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#"
                                            class="action-icon dropdown-toggle" data-toggle="dropdown"
                                            aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a wire:click="editUser({{ $items->id }})" class="dropdown-item" href="#" data-toggle="modal"
                                                data-target="#edit_user"><i class="fa fa-pencil m-r-5"></i>
                                                Edit</a>
                                            <a wire:click="deleteUser({{ $items->id }})" class="dropdown-item" href="#" data-toggle="modal"
                                                data-target="#delete_user"><i class="fa fa-trash-o m-r-5"></i>
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
