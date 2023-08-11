<!-- Add Department Modal -->
<div wire:ignore.self id="add_convention_categorie" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nouveau Convention Categorie</h5>
                <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="saveConventionCategorie">
                    <div class="form-group">
                        <label>Convention libelle <span class="text-danger">*</span></label>
                        <select wire:model="convention_id" class="form-control">
                            <option value="">---</option>
                            @forelse ($conventions as $items)
                                <option value="{{ $items->id }}">{{ $items->libelle }}</option>
                            @empty
                                <option value="">Pas de Convention</option>
                            @endforelse
                            @error('convention_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Convention libelle <span class="text-danger">*</span></label>
                        <input class="form-control" wire:model="libelle" type="text">
                        @error('libelle')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Montant <span class="text-danger">*</span></label>
                        <input class="form-control" wire:model="montant" type="text">
                        @error('montant')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
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
<div wire:ignore.self id="edit_convention_categorie" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modifier Convention Categorie</h5>
                <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="updateConventionCategorie">
                    <div class="form-group">
                        <label>Convention libelle <span class="text-danger">*</span></label>
                        <select wire:model="convention_id" class="form-control">
                            <option value="">---</option>
                            @forelse ($conventions as $items)
                                <option value="{{ $items->id }}">{{ $items->libelle }}</option>
                            @empty
                                <option value="">Pas de Convention</option>
                            @endforelse
                            @error('convention_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Convention libelle <span class="text-danger">*</span></label>
                        <input class="form-control" wire:model="libelle" type="text">
                        @error('libelle')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Montant <span class="text-danger">*</span></label>
                        <input class="form-control" wire:model="montant" type="text">
                        @error('montant')
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
<div wire:ignore.self id="delete_convention_categorie" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Supprimer Convention Categorie</h5>
                <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="destroyConventionCategorie">
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
