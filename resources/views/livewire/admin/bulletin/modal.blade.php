<!-- Add Department Modal -->
<div wire:ignore.self id="add_bulletin" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Bulletin {{ $selectedMonthName }}</h5>
                <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="">
                    <div class="row">
                        {{-- <div class="form-group col-md-6">
                            <label>Periode <span class="text-danger">*</span></label>
                            <select wire:model="periode_id" class="form-control">
                                <option value="">---</option>
                                @foreach ($periodes as $periode)
                                <option value="{{ $periode->id }}">{{ ucfirst($periode->mois) }}</option>
                                @endforeach
                            </select>
                            @error('periode_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div> --}}
                        {{-- <div class="form-group col-md-6">
                            <label>Agent <span class="text-danger">*</span></label>
                            <select wire:model="contrat_id" class="form-control">
                                <option value="">---</option>
                                @forelse ($contrats as $items)
                                    <option value="{{ $items->id }}">
                                        {{ $items->agent->prenom . ' ' . $items->agent->nom }}</option>
                                @empty
                                    <option value="" selected>Pas d'agents</option>
                                @endforelse
                            </select>
                            @error('contrat_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div> --}}
                    </div>
                    <div class="table-responsive m-t-15">
                        <table class="table table-striped custom-table">
                            <thead>
                                <tr>
                                    <th>Rubriques</th>
                                    <th class="text-center">Montant</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rubriques as $rubrique)
                                    <tr>
                                        <td>{{ $rubrique->libelle }}</td>
                                        <td class="text-center">
                                            <input type="number" class="form-control">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Add Department Modal -->

<!-- Edit Department Modal -->
<div wire:ignore.self id="edit_bulletin" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modifier Bulletin</h5>
                <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="updateBulletin">
                    <div class="form-group">
                        <label>Periode <span class="text-danger">*</span></label>
                        <input type="text" wire:model="periode" class="form-control">
                        @error('periode')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Agent <span class="text-danger">*</span></label>
                        <select wire:model="contrat_id" class="form-control">
                            <option value="">---</option>
                            @forelse ($contrats as $items)
                                <option value="{{ $items->id }}">
                                    {{ $items->agent->prenom . ' ' . $items->agent->nom }}
                                </option>
                            @empty
                                <option value="" selected>Pas d'agents</option>
                            @endforelse
                        </select>
                        @error('contrat_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Mettre a jour</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Edit Department Modal -->

<!-- Delete Department Modal -->
<div wire:ignore.self id="delete_bulletin" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Supprimer Bulletin</h5>
                <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="destroyBulletin">
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
<!-- /Delete Department Modal -->
