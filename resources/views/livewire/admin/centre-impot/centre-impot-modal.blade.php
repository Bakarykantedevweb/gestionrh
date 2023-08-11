<!-- Add Department Modal -->
<div wire:ignore.self id="add_centre_impot" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nouveau Centre Impot</h5>
                <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="saveCentreImpot">
                    <div class="form-group">
                        <label>Centre Impot libelle <span class="text-danger">*</span></label>
                        <input class="form-control" wire:model="libelle" type="text">
                        @error('libelle')
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
<div wire:ignore.self id="edit_centre_impot" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modifier Centre Impot</h5>
                <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="updateCentreImpot">
                    <div class="form-group">
                        <label>Centre Impot libelle <span class="text-danger">*</span></label>
                        <input class="form-control" wire:model="libelle" type="text">
                        @error('libelle')
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
<div wire:ignore.self id="delete_centre_impot" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Supprimer Centre Impot</h5>
                <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="destroyCentreImpot">
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
