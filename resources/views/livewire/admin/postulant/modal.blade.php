<!-- Add Droit Modal -->
<div wire:ignore.self id="emargement" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Valider</h5>
                <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="UpdatePostuler">
                    <div class="form-group">
                        <select wire:model="status" wire:change="changeType" class="form-control">
                            <option value="">...</option>
                            <option value="1">Validé</option>
                            <option value="2">Rejeté</option>
                        </select>
                        @error('status')
                        <span class="text-danger">Le champs est obligatoire</span>
                        @enderror
                    </div>
                    @if ($showInputs)
                        <div class="form-group">
                            <label for="">Date entretien</label>
                            <input type="date" wire:model="date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Heure</label>
                            <input type="time" wire:model="heure" class="form-control">
                        </div>
                    @endif
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Add Droit Modal -->
