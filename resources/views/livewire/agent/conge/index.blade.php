<div>
    <div class="content container-fluid">
        <div class="row">
            <div class="col-xl-12 col-sm-12 col-12">
                <div class="breadcrumb-path mt-4">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('agent-dashboard') }}"><img src="assets/img/dash.png"
                                    class="mr-2" alt="breadcrumb" />Acceuil</a>
                        </li>
                        <li class="breadcrumb-item active"> Congés</li>
                    </ul>
                    <h3>Congés</h3>
                </div>
            </div>
            @if ($afficherListe)
                <div class="col-xl-12 col-sm-12 col-12 mt-4">
                    <div class="head-link-set">
                        <a class="btn-add" href="{{ route('congeAgent.create') }}"><i data-feather="plus"></i> Faire
                            une demande</a>
                    </div>
                </div>
                <div class="col-xl-12 col-sm-12 col-12 mt-4">
                    <div class="card">
                        <div class="table-heading">
                            <h2>Listes des congés</h2>
                        </div>
                        <div class="table-responsive">
                            <table class="table  custom-table no-footer">
                                <thead>
                                    <tr>
                                        <th>Type Conge</th>
                                        <th>Date Debut</th>
                                        <th>Date Fin</th>
                                        <th>Duree</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($conges as $conge)
                                        <tr>
                                            <td>
                                                <label>{{ $conge->typeConge->nom }}</label>
                                            </td>
                                            <td>
                                                <label>{{ \Carbon\Carbon::parse($conge->date_debut)->isoFormat('LL') }}</label>
                                            </td>
                                            <td>
                                                <label>{{ \Carbon\Carbon::parse($conge->date_fin)->isoFormat('LL') }}</label>
                                            </td>
                                            <td><label>{{ $conge->duree }} jours</label></td>
                                            <td>
                                                @if ($conge->status == 0)
                                                    <span class="btn btn-warning btn-sm">En attente</span>
                                                @elseif ($conge->status == 2)
                                                    <span class="btn btn-danger btn-sm">Rejeté</span>
                                                @elseif ($conge->status == 1)
                                                    <span class="btn btn-success btn-sm">Approuvé</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($conge->status == 0)
                                                    <a href="#" wire:click="editConge({{ $conge->id }})"
                                                        class="edit-link"> <i data-feather="edit"></i></a>
                                                @else
                                                    <span class="btn btn-success btn-sm">Terminée</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center"><label>Pas de conge</label></td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif
            @if ($afficherEdit)
                <div class="col-xl-12 col-sm-12 col-12 mt-4">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-titles text-danger">Solde de conge
                                {{ Auth::guard('webagent')->user()->contrat->nombre_jour_conge }}
                                {{-- <span>Organized and secure.</span> --}}
                            </h2>
                        </div>
                        <div class="card-body">
                            <form wire:submit.prevent="updateConge">
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
            @endif
        </div>
    </div>
</div>
