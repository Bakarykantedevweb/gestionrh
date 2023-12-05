<!-- Add Variable Modal -->
<div wire:ignore.self id="add_variable" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $variable_id ? 'Modifier':'Nouvelle' }}</h5>
                <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="saveVariable">
                    <div class="form-group">
                        <label>Variable Nom <span class="text-danger">*</span></label>
                        <input class="form-control" wire:model="nom" type="text">
                        @error('nom')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Add Variable Modal -->


<!-- Add Variable Modal -->
<div wire:ignore.self id="delete_variable" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Suppresion de la variable</h5>
                <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="DestroyVariable">
                    <h3>Etes-vous sur de vouloir supprimer cette variable</h3>
                    <div class="submit-section">
                        <button class="btn btn-primary" type="submit">Supprimer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Add Variable Modal -->
