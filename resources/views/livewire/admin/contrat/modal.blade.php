<!-- Add Department Modal -->
<div wire:ignore.self id="add_classification" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Relancer un contrat</h5>
                <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="UpdateContrat">
                    <div class="form-group">
                        <label>Date Debut <span class="text-danger">*</span></label>
                        <input class="form-control" wire:model="date_creation" type="date">
                        @error('date_creation')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Date Fin <span class="text-danger">*</span></label>
                        <input class="form-control" wire:model="date_fin" type="date">
                        @error('date_fin')
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
<!-- /Add Department Modal -->
