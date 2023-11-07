<!-- Add Department Modal -->
<div wire:ignore.self id="add_diplome" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $diplome_id ? 'Modifier Diplome':'Nouveau Diplome' }}</h5>
                <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="saveDiplome">
                    <div class="form-group">
                        <label>Nom <span class="text-danger">*</span></label>
                        <input class="form-control" wire:model="nom" type="text">
                        @error('nom')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Classification</label>
                        <select wire:model="classification_id" class="form-control">
                            <option></option>
                            @foreach ($classifications as $classification)
                                <option value="{{ $classification->id }}">{{ $classification->nom }}</option>
                            @endforeach
                        </select>
                        @error('classification_id')
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

<!-- Delete Department Modal -->
<div wire:ignore.self id="delete_diplome" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Supprimer Diplome</h5>
                <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="destroyDiplome">
                    <div class="form-header">
                        <p>Si vous supprimez ce Diplome tous les agents liés a ce dernier seront supprmiés?</p>
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
