<div>
    @include('livewire.admin.agent.agent-modal')
    <!-- Page Header -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Agents</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                    <li class="breadcrumb-item active">Agent</li>
                </ul>
            </div>
            <div class="col-auto float-right ml-auto">
                <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_employee"><i
                        class="fa fa-plus"></i> Ajouter un Agent</a>
                <div class="view-icons">
                    <a href="" class="grid-view btn btn-link active"><i class="fa fa-th"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Header -->
    @include('layouts.partials.message')
    @include('layouts.partials.error')
    <!-- Search Filter -->
    <div class="row filter-row">
        {{-- <div class="col-sm-6 col-md-3">
            <div class="form-group form-focus">
                <input type="text" class="form-control floating">
                <label class="focus-label">Employee ID</label>
            </div>
        </div> --}}
        <div class="col-sm-6 col-md-6">
            <div class="form-group form-focus">
                <input type="search" wire:model.debounce.300ms="search" class="form-control floating">
                <label class="focus-label">Search...</label>
            </div>
        </div>
        {{-- <div class="col-sm-6 col-md-3">
            <a href="#" class="btn btn-success btn-block"> Search </a>
        </div> --}}
    </div>
    <!-- Search Filter -->

    <div class="row staff-grid-row">
        @forelse ($agents as $items)
            <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                <div class="profile-widget">
                    <div class="profile-img">
                        <a href="" class="avatar">
                            @if ($items->photo)
                                <img src="{{ asset('uploads/admin/agent/'.$items->photo) }}" alt="">
                            @else
                                <img src="{{ asset('admin/assets/img/téléchargement.png') }}" alt="">
                            @endif
                        </a>
                    </div>
                    <div class="dropdown profile-action">
                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                            aria-expanded="false"><i class="material-icons">more_vert</i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#" wire:click="editAgent('{{ encrypt($items->id) }}')" data-toggle="modal" data-target="#add_employee"><i
                                    class="fa fa-pencil m-r-5"></i> Edit</a>
                            <a class="dropdown-item" wire:click="deleteAgent('{{ encrypt($items->id) }}')" href="#" data-toggle="modal"
                                data-target="#delete_employee"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                            @if ($items->blocked == 1)
                                <a class="dropdown-item" wire:click="activer({{ $items->id }})" href="#" data-toggle="modal"
                                data-target=""><i class="fa fa-unlock m-r-5"></i> Activer</a>
                            @endif
                        </div>
                    </div>
                    <h4 class="user-name m-t-10 mb-0 text-ellipsis">
                        <a href="">{{ $items->prenom.' '.$items->nom }}</a>
                    </h4>
                    @if ($items->blocked == 1)
                        <div class="small text-danger">Le compte est Desactivé <i class="fa fa-lock"></i></div>
                        <div class="small text-danger">Nombres de Tentatives({{ $items->login_attempts }})</div>
                    @endif
                    <div class="small text-muted">{{ $items->poste->nom }}</div>
                    <div class="small text-muted">({{ $items->departement->code }})</div>
                </div>
            </div>
        @empty
            <h4 class="text-center">Pas d'employees</h4>
        @endforelse
    </div>
</div>
