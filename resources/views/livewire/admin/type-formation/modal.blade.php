<!-- Add Department Modal -->
<div wire:ignore.self id="add_type_formateur" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $type_formation_id ? 'Modification' : 'Nouveau' }}</h5>
                <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="saveTypeFormation">
                    <div class="form-group">
                        <label>Titre <span class="text-danger">*</span></label>
                        <input class="form-control" wire:model="titre" type="text">
                        @error('titre')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Status</label>
                        <select class="form-control" wire:model="status">
                            <option value="">---</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                        @error('status')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="submit-section">
                        <button
                            class="btn btn-primary submit-btn">{{ $type_formation_id ? 'Mettre a jour' : 'Enregistrer' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Add Department Modal -->
<div wire:ignore.self class="modal custom-modal fade" id="delete_type_formateur" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-header">
                    <h3>Suppression Type Formateur</h3>
                    <p>Etes-vous sur de vouloir Supprimer?</p>
                </div>
                <div class="modal-btn delete-action">
                    <form wire:submit.prevent='destroyTypeFormation'>
                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-primary submit-btn">Supprimer</button>
                            </div>
                            <div class="col-6">
                                <a href="javascript:void(0);" data-dismiss="modal"
                                    class="btn btn-primary cancel-btn">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
