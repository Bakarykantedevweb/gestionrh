<div>
    <!-- Page Header -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Formations</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Formations</li>
                </ul>
            </div>
            <div class="col-auto float-right ml-auto">
                <a href="{{ route('formation.index') }}" class="btn add-btn"><i
                        class="fa fa-list"></i> Retour </a>
            </div>
        </div>
    </div>
    <!-- /Page Header -->
    @include('layouts.partials.message')
    @include('layouts.partials.error')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Creation de la formation</h4>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="SaveFormation">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Type Formation</label>
                                <select wire:model="type_formation_id" class="form-control">
                                    <option>---</option>
                                    @forelse ($typeFormations as $typeFormation)
                                        <option value="{{ $typeFormation->id }}">{{ $typeFormation->titre }}</option>
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
                                <input type="date" class="form-control" min="@php echo date('Y-m-d') @endphp" wire:model="date_debut">
                                 @error('date_debut')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Date Fin</label>
                                <input type="date" class="form-control" min="@php echo date('Y-m-d') @endphp" wire:model="date_fin">
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
                            </div>
                            <div class="form-group col-md-12">
                                <label>Decription</label>
                                <textarea rows="4" wire:model="description" class="form-control @error('name') is-invalid @enderror" placeholder="Enter your message here"></textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <input wire:model="search" type="search" class="form-control" placeholder="Recherche...">
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
                                                    <td>{{ $agent->prenom . ' ' . $agent->nom }} ({{ $agent->departement->code }})</td>
                                                    <td class="text-center">
                                                        <input wire:model="agentListes" value="{{ $agent->id }}"
                                                            type="checkbox">
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
</div>
