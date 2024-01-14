    <!-- Add Department Modal -->
    <div wire:ignore.self id="add_agence" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $agence_id ? 'Modifier':'Ajouter' }}</h5>
                    <button type="button" wire:click="closeModal" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="SaveAgence">
                        <div class="form-group">
                            <label>Agence Nom <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" wire:model="nom">
                            @error('nom')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary" type="submit">{{ $agence_id ? 'Mettre a jour':'Enregistrer' }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Add Department Modal -->

    <!-- import Poste Modal -->
    <div wire:ignore.self id="import_agence" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Choisissez Votre ficher</h5>
                    <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="importPoste">
                        <div class="form-group">
                            <label>Ficher <span class="text-danger">*</span></label>
                            <input class="form-control" wire:model="fichier" type="file">
                            @error('fichier')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary" type="submit">Importer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /import Poste Modal -->
