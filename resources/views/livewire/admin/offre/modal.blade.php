<!-- Delete Holiday Modal -->
<div wire:ignore.self id="relancer" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Relancer un offre</h5>
                <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="saveRelancer">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Date Limite</label>
                            <input type="date" class="form-control" wire:model="date_limite">
                            @error('date_limite')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- /Delete Holiday Modal -->
