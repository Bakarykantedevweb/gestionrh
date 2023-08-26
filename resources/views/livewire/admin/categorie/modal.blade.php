<!-- Add Department Modal -->
<div wire:ignore.self id="add_categorie" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nouvelle Categorie</h5>
                <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="saveCategorie">
                    <div class="form-group">
                        <label>Libelle <span class="text-danger">*</span></label>
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
<div wire:ignore.self id="edit_categorie" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modifier Categorie</h5>
                <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="updateCategorie">
                    <div class="form-group">
                        <label>Libelle <span class="text-danger">*</span></label>
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
<div wire:ignore.self id="delete_categorie" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Supprimer Categorie</h5>
                <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="destroyCategorie">
                    <div class="form-header">
                        <p>Si vous supprimez ce Categorie tous les agents liés a ce dernier seront supprmiés?</p>
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
