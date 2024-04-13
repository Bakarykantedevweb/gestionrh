<div>
    <div wire:ignore.self id="delete_formation" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Supprimer Formation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="destroyFormation">
                        <div class="form-header">
                            <p>Voulez-vous vraiment supprimer?</p>
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Supprimer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Liste des Formations</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Formations</li>
                </ul>
            </div>
            @if ($formationsListes)
                <div class="col-auto float-right ml-auto">
                    <a href="{{ route('formation.create') }}" class="btn add-btn"><i class="fa fa-plus"></i> Formations
                    </a>
                </div>
            @endif
            @if ($formationsEdit)
                <div class="col-auto float-right ml-auto">
                    <a href="{{ route('formation.index') }}" class="btn add-btn"><i class="fa fa-list"></i> Retour
                    </a>
                </div>
            @endif
        </div>
    </div>
    <!-- /Page Header -->
    @if ($formationsListes)
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table mb-0 datatable">
                        <thead>
                            <tr>
                                {{-- <th style="width: 30px;">#</th> --}}
                                <th>Titre</th>
                                <th>Type Formation</th>
                                <th>Formateur</th>
                                <th>Agents</th>
                                <th>Duree</th>
                                <th>Status </th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $key = 1;
                            @endphp
                            @foreach ($formations as $formation)
                                <tr>
                                    {{-- <td>{{ $key++ }}</td> --}}
                                    <td>{{ $formation->titre }}</td>
                                    <td>{{ $formation->type_formation->titre }}</td>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="" class="avatar"><img alt=""
                                                    src="assets/img/profiles/avatar-02.jpg"></a>
                                            <a href="">{{ $formation->formateur->prenom . ' ' . $formation->formateur->nom }}
                                            </a>
                                        </h2>
                                    </td>
                                    <td>
                                        <ul class="team-members">
                                            <li class="dropdown avatar-dropdown">
                                                <a href="#" class="all-users dropdown-toggle"
                                                    data-toggle="dropdown" aria-expanded="false">+
                                                    {{ count($formation->agents) }}</a>
                                            </li>
                                        </ul>
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($formation->date_debut)->isoFormat('LL') }} -
                                        {{ \Carbon\Carbon::parse($formation->date_fin)->isoFormat('LL') }}
                                    </td>
                                    <td>
                                        @if ($formation->status == 1)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                                aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#"
                                                    wire:click="changeContent({{ $formation->id }})"><i
                                                        class="fa fa-pencil m-r-5"></i> Edit</a>
                                                {{-- <a class="dropdown-item" href="#"
                                                        wire:click="deleteContent({{ $formation->id }})"
                                                        data-toggle="modal" data-target="#delete_formation"><i
                                                            class="fa fa-trash-o m-r-5"></i>
                                                        Delete</a> --}}
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
    @if ($formationsEdit)
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Modification de la formation</h4>
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent="SaveFormation" enctype="multipart/form-data">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Type Formation</label>
                                    <select wire:model="type_formation_id" class="form-control">
                                        <option>---</option>
                                        @forelse ($typeFormations as $typeFormation)
                                            <option value="{{ $typeFormation->id }}">{{ $typeFormation->titre }}
                                            </option>
                                        @empty
                                            <option selected>Pas de Type de Formation</option>
                                        @endforelse
                                    </select>
                                    @error('type_formation_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Formateur</label>
                                    <select wire:model="formateur_id" class="form-control">
                                        <option>---</option>
                                        @forelse ($formateurs as $formateur)
                                            <option value="{{ $formateur->id }}">
                                                {{ $formateur->prenom . ' ' . $formateur->nom }}</option>
                                        @empty
                                            <option selected>Pas de Formateur</option>
                                        @endforelse
                                    </select>
                                    @error('formateur_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Titre</label>
                                    <input type="text" class="form-control" wire:model="titre">
                                    @error('titre')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Status</label>
                                    <select wire:model="status" class="form-control">
                                        <option value="">---</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                    @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Date Debut</label>
                                    <input type="date" class="form-control" min="@php echo date('Y-m-d') @endphp"
                                        wire:model="date_debut">
                                    @error('date_debut')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Date Fin</label>
                                    <input type="date" class="form-control" min="@php echo date('Y-m-d') @endphp"
                                        wire:model="date_fin">
                                    @error('date_fin')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Heure de la formation</label>
                                    <input type="time" class="form-control" wire:model="heure">
                                    @error('heure')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Ficher de formation</label>
                                    <input type="file" class="form-control" wire:model="fichier">
                                    @error('fichier')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    @if ($this->fichier)
                                        <a href="{{ url('uploads/admin/formation/fichier/' . $this->fichier) }}"
                                            target="_blank" class="btn btn-primary btn-sm mt-2">Fichier</a>
                                    @endif
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Decription</label>
                                    <textarea rows="4" wire:model="description" class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Enter your message here"></textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <input wire:model="search" type="search" class="form-control"
                                        placeholder="Recherche...">
                                    <div class="table-responsive m-t-15">
                                        <table class="table table-striped custom-table">
                                            <thead>
                                                <tr>
                                                    <th>Agents</th>
                                                    <th class="text-center">Select</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($agents as $agent)
                                                    <tr>
                                                        <td>{{ $agent->prenom . ' ' . $agent->nom }}
                                                            ({{ $agent->departement->code }})
                                                        </td>
                                                        <td class="text-center">
                                                            <input wire:model="agentListes"
                                                                value="{{ $agent->id }}" type="checkbox">
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary btn-outline-light" type="submit">Terminer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
