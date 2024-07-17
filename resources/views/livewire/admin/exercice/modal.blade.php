<div wire:ignore.self id="add_exercice" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $this->exercice_id ? 'Modifier' : 'Ajouter' }}</h5>
                <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="saveExercice">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="">Nom</label>
                            <input type="text" class="form-control" wire:model="nom">
                            @error('nom')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Date debut</label>
                            <input type="date" class="form-control" wire:model="date_debut">
                            @error('date_debut')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Date Fin</label>
                            <input type="date" class="form-control" wire:model="date_fin">
                            @error('date_fin')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="">Status</label>
                        <select wire:model="status" class="form-control">
                            <option value="">...</option>
                            <option value="0">Actif</option>
                            <option value="1">Inactif</option>
                        </select>
                        @error('status')
                        <span class="text-danger">Le champs est obligatoire</span>
                        @enderror
                    </div>
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">{{ $this->exercice_id ? 'Mettre a jour' : 'Enregistrer' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
