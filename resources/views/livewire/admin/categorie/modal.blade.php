<!-- Add Department Modal -->
<div wire:ignore.self id="add_categorie" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $categorie_id ? 'Modifier':'Ajouter' }}</h5>
                <button type="button" wire:click="closeModal" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="SaveCategorie">
                    <div class="form-group">
                        <label>Nom <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" wire:model="nom">
                        @error('nom')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Status <span class="text-danger">*</span></label>
                        <select wire:model="status" class="form-control">
                            <option value="">---</option>
                            <option value="0">Inactive</option>
                            <option value="1">Active</option>
                        </select>
                        @error('status')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary" type="submit">{{ $categorie_id ? 'Mettre a jour':'Enregistrer'
                            }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Add Department Modal -->

<!-- Delete Holiday Modal -->
<div wire:ignore.self id="delete_categorie" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-header">
                    <h3>Delete </h3>
                    <p>Are you sure want to delete?</p>
                </div>
                <form wire:submit.prevent="DestroyCategorie">
                    <div class="modal-btn delete-action">
                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-primary continue-btn" type="submit">Delete</button>
                            </div>
                            <div class="col-6">
                                <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Delete Holiday Modal -->
