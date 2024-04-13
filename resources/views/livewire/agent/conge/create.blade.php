<div>
    <div class="content container-fluid">
        <div class="row">
            <div class="col-xl-12 col-sm-12 col-12 ">
                <div class="breadcrumb-path mt-4">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('agent-dashboard') }}">Acceuil</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Congé</li>
                    </ul>
                    <h3>Demande Congé</h3>
                </div>
            </div>
            <div class="col-xl-12 col-sm-12 col-12 mt-4">
                <div class="head-link-set">
                    <a class="btn-add" href="{{ route('congeAgent.index') }}"><i data-feather="plus"></i> Retour</a>
                </div>
            </div>
            <div class="col-xl-12 col-sm-12 col-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-titles text-danger">Solde de conge
                            {{ Auth::guard('webagent')->user()->contrat->nombre_jour_conge }}
                            {{-- <span>Organized and secure.</span> --}}
                        </h2>
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent="saveConge">
                            <div class="row">
                                <div class="col-xl-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="">Type Conge</label>
                                        <select wire:model="type_conge_id" class="form-control">
                                            <option>---</option>
                                            @forelse ($typeConges as $typeConge)
                                                <option value="{{ $typeConge->id }}">{{ $typeConge->nom }}</option>
                                            @empty
                                                <option selected>Pas de type de contrat</option>
                                            @endforelse
                                        </select>
                                        @error('type_conge_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-6 col-sm-12 col-12 ">
                                    <div class="form-group">
                                        <label for="">Date Debut</label>
                                        <input type="date" wire:model="date_debut" class="form-control">
                                        @error('date_debut')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-6 col-sm-12 col-12 ">
                                    <div class="form-group">
                                        <label for="">Date Fin</label>
                                        <input type="date" wire:model="date_fin" class="form-control">
                                        @error('date_fin')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-12 col-sm-12 col-12 ">
                                    <div class="form-group">
                                        <input type="number" wire:model="duree" class="form-control"
                                            placeholder="Duree" readonly>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-sm-12 col-12 ">
                                    <div class="form-group">
                                        <label for="">Motif</label>
                                        <textarea class="form-control" wire:model="motif" cols="30" rows="10"></textarea>
                                        @error('motif')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 col-sm-12 col-12 ">
                                    <div class="form-btn">
                                        <button type="submit" class="btn btn-apply w-auto">Soumettre</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
