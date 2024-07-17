<div>
    @include('livewire.admin.exercice.modal')
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Exercice</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Tableau de Bord</a></li>
                    <li class="breadcrumb-item active">Exercice</li>
                </ul>
            </div>
            <div class="col-auto float-right ml-auto">
                <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_exercice"><i
                        class="fa fa-plus"></i>
                    Nouvelle Exercice</a>
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
                            <th>Date debut</th>
                            <th>Date Fin</th>
                            <th>Status</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($exercices as $items)
                            <tr>
                                <td>{{ $items->id }}</td>
                                <td>{{ $items->nom }}</td>
                                <td>{{ $items->date_debut }}</td>
                                <td>{{ $items->date_fin }}</td>
                                <td>
                                    @if ($items->status == '0')
                                        <span class="btn btn-success btn-sm">En cours</span>
                                    @else
                                        <span class="btn btn-danger btn-sm">En Attente</span>
                                    @endif
                                </td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                            aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item"
                                                href="#" wire:click="editExercice({{ $items->id }})" data-toggle="modal" data-target="#add_exercice"><i
                                                    class="fa fa-pencil m-r-5"></i>
                                                Edit</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">Pas d'experience</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
