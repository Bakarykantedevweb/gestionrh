<div>
    @include('livewire.admin.formateur.modal')
    <!-- Page Header -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Formateurs</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Formateurs</li>
                </ul>
            </div>
            <div class="col-auto float-right ml-auto">
                <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_formateur"><i class="fa fa-plus"></i> Formateur</a>
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
                            <th>Preom & Nom</th>
                            <th>Email</th>
                            <th>Telephone </th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($formateurs as $items)
                            <tr>
                                <td>{{ $items->id }}</td>
                                <td>
                                    <h2 class="table-avatar">
                                        <a href="" class="avatar"><img alt="" src="{{ asset('admin/assets/img/téléchargement.png') }}"></a>

                                        <a href="">{{ $items->prenom.' '.$items->nom }}</a>
                                    </h2>
                                </td>
                                <td>{{ $items->email }}</td>
                                <td>{{ $items->telephone }}</td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#" data-toggle="modal" wire:click="edit_formateur({{ $items->id }})" data-target="#add_formateur"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <a class="dropdown-item" href="#" data-toggle="modal" wire:click="delete_formateur({{ $items->id }})" data-target="#delete_formateur"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Pas de Formateurs</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
