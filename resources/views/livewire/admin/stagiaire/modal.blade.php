<!-- Add Employee Modal -->
<div wire:ignore.self id="add_stagiaire" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $stagiaire_id ? 'Modifier' : 'Ajouter' }}</h5>
                <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="SaveStagiaire">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Departements <span class="text-danger">*</span></label>
                                <select wire:model="departement_id" class="form-control">
                                    <option value="">---</option>
                                    @foreach ($departements as $items)
                                        <option value="{{ $items->id }}">{{ $items->nom }} ({{ $items->code }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('departement_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Agences <span class="text-danger">*</span></label>
                                <select wire:model="agence_id" class="form-control">
                                    <option value="">---</option>
                                    @foreach ($agences as $agence)
                                        <option value="{{ $agence->id }}">{{ $agence->nom }}</option>
                                    @endforeach
                                </select>
                                @error('agence_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Nom <span class="text-danger">*</span></label>
                                <input class="form-control" wire:model="nom" type="text">
                                @error('nom')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Prenom</label>
                                <input class="form-control" wire:model="prenom" type="text">
                                @error('prenom')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Email <span class="text-danger">*</span></label>
                                <input class="form-control" wire:model="email" type="email">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Telephone <span class="text-danger">*</span></label>
                                <input type="text" wire:model="telephone" class="form-control">
                                @error('telephone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Date Debut <span class="text-danger">*</span></label>
                                <div class="">
                                    <input class="form-control" wire:model="date_debut" type="date">
                                </div>
                                @error('date_debut')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Date Fin <span class="text-danger">*</span></label>
                                <div class="">
                                    <input class="form-control" wire:model="date_fin" type="date">
                                </div>
                                @error('date_fin')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="submit-section">
                        <button class="btn btn-primary" type="submit">Soumettre</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Add Employee Modal -->

<!-- Add Employee Modal -->
<div wire:ignore.self id="voir_stagiaire" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Listes des stagiaires</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    {{-- <div class="card-header">
                        <h4 class="card-title mb-0">Basic Table</h4>
                    </div> --}}
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>Matricule</th>
                                        <th>Prenom</th>
                                        <th>Nom</th>
                                        <th>Email</th>
                                        <th>Téléphone</th>
                                        <th>Date Debut</th>
                                        <th>Date Fin</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($stagiaireAgences ?? [] as $sta)
                                        <tr @if($sta->date_fin < now()) class="table-danger" @endif>
                                            <td>{{ $sta->matricule }}</td>
                                            <td>{{ $sta->prenom }}</td>
                                            <td>{{ $sta->nom }}</td>
                                            <td>{{ $sta->email }}</td>
                                            <td>+223 {{ $sta->telephone }}</td>
                                            <td>{{ $sta->date_debut }}</td>
                                            <td>{{ $sta->date_fin }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Pas de stagiaire</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Add Employee Modal -->
