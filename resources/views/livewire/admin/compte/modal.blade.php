<!-- Add Department Modal -->
<div wire:ignore.self id="add_compte" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $compte_id ? 'Modifier' : 'Ajouter' }}</h5>
                <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="saveCompte">
                    <div class="form-group">
                        <label>Agent <span class="text-danger">*</span></label>
                        <select wire:model="agent_id" class="form-control">
                            <option value=""></option>
                            @foreach ($agents as $agent)
                                <option value="{{ $agent->id }}">{{ $agent->prenom.' '.$agent->nom }}</option>
                            @endforeach
                        </select>
                        @error('agent_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>prefixe <span class="text-danger">*</span></label>
                        <input class="form-control" wire:model="prefixe" type="text">
                        @error('prefixe')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Numero de compte <span class="text-danger">*</span></label>
                        <input class="form-control" wire:model="numero" type="text">
                        @error('numero')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">{{ $compte_id ? 'Mettre a jour':'Enregistrer' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Add Department Modal -->
