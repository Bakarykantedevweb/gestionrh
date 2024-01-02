<!-- Add Department Modal -->
<div wire:ignore.self id="add_postuler" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Postuler pour l'offre {{ $offre->titre }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="SavePostuler">
                    <div class="form-group">
                        <label>Votre CV <span class="text-danger">* NB: en pdf</span></label>
                        <input class="form-control" wire:model="cv" type="file">
                        @error('cv')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Lettre de Motivation <span class="text-danger">* NB: en pdf</span></label>
                        <input class="form-control" wire:model="lettre" type="file">
                        @error('lettre')
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
