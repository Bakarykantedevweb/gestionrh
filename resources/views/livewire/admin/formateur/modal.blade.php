<!-- Add Department Modal -->
<div wire:ignore.self id="add_formateur" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $formateur_id ? 'Modification' : 'Nouveau Formateur' }}</h5>
                <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="saveFormateur">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Nom <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" wire:model="nom">
                                @error('nom')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Prenom <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" wire:model="prenom">
                                @error('prenom')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Email <span class="text-danger">*</span></label>
                                <input class="form-control" type="email" wire:model="email">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Telephone <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" wire:model="telephone">
                                @error('telephone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="submit-section">
                        <button
                            class="btn btn-primary submit-btn">{{ $formateur_id ? 'Mettre a jour' : 'Enregistrer' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Add Department Modal -->
<div wire:ignore.self class="modal custom-modal fade" id="delete_formateur" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-header">
                    <h3>Suppression Formateur</h3>
                    <p>Etes-vous sur de vouloir Supprimer?</p>
                </div>
                <div class="modal-btn delete-action">
                    <form wire:submit.prevent='destroyFormateur'>
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
