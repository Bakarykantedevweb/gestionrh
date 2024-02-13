<div>
    @include('livewire.admin.type-formation.modal')
    <!-- Page Header -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Type Formations</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Type Formations</li>
                </ul>
            </div>
            <div class="col-auto float-right ml-auto">
                <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_type_formateur"><i
                        class="fa fa-plus"></i>Type Formateur</a>
            </div>
        </div>
    </div>
    <!-- /Page Header -->
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped custom-table mb-0 datatable">
                    <thead>
                        <tr>
                            <th style="width: 30px;">#</th>
                            <th>Titre</th>
                            <th>Status</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($typeFormations as $items)
                            <tr>
                                <td>{{ $items->id }}</td>
                                <td>{{ $items->titre }}</td>
                                <td>
                                    @if ($items->status == 1)
                                        <span class="badge bg-inverse-success">Active</span>
                                    @else
                                        <span class="badge bg-inverse-danger">Inactive</span>
                                    @endif
                                </td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="material-icons">more_vert</i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#" data-toggle="modal"
                                                wire:click="edit_type_formation({{ $items->id }})"
                                                data-target="#add_type_formateur">
                                                <i class="fa fa-pencil m-r-5"></i> Edit
                                            </a>
                                            <a class="dropdown-item" href="#" data-toggle="modal"
                                                wire:click="delete_type_formation({{ $items->id }})"
                                                data-target="#delete_type_formateur">
                                                <i class="fa fa-trash-o m-r-5"></i> Delete
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Pas de Type formation</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
