<!-- Add Employee Modal -->
<div wire:ignore.self id="add_salaire" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nouveau Salaire</h5>
                <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="saveSalaire">
                    <div class="form-group">
                        <label for="">Salaire debut</label>
                        <input type="number" class="form-control" wire:model="salaire_debut">
                        @error('salaire_debut')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Salaire Fin</label>
                        <input type="number" class="form-control" wire:model="salaire_fin">
                        @error('salaire_fin')
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
<!-- /Add Employee Modal -->
