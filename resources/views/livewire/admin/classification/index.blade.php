<div>
    @include('livewire.admin.classification.modal')
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Classifications</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Tableau de Bord</a></li>
                    <li class="breadcrumb-item active">Classification</li>
                </ul>
            </div>
            <div class="col-auto float-right ml-auto">
                <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_classification"><i
                        class="fa fa-plus"></i>Classification</a>
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
                            <th>Classification</th>
                            <th>Montant</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $key = 1
                        @endphp
                        @forelse ($classifications as $items)
                            <tr>
                                <td>{{ $key++ }}</td>
                                <td>{{ $items->nom }}</td>
                                <td>{{ $items->montant }}</td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                            aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a wire:click="editClassification('{{ encrypt($items->id) }}')" class="dropdown-item" href="#" data-toggle="modal"
                                                data-target="#add_classification"><i class="fa fa-pencil m-r-5"></i>
                                                Edit</a>
                                            <a wire:click="deleteClassification({{ $items->id }})" class="dropdown-item" href="#" data-toggle="modal"
                                                data-target="#delete_classification"><i class="fa fa-trash-o m-r-5"></i>
                                                Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Pas de Classifications</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
