<!-- Add Department Modal -->
<div wire:ignore.self id="add_bulletin" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nouveau Bulletin</h5>
                <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="saveBulletin">
                    <div class="form-group">
                        <label>Agent <span class="text-danger">*</span></label>
                        <select wire:model="agent_id" class="form-control">
                            <option value="">---</option>
                            @forelse ($agents as $agent)
                                <option value="{{ $agent->id }}">{{ $agent->prenom.' '.$agent->nom }}</option>
                            @empty
                                <option value="" selected>Pas d'agents</option>
                            @endforelse
                        </select>
                        @error('agent_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Periode <span class="text-danger">*</span></label>
                        <select wire:model="periode_id" class="form-control">
                            <option value="">---</option>
                            @forelse ($periodes as $periode)
                                <option value="{{ $periode->id }}">{{ $periode->mois }}</option>
                            @empty
                                <option value="" selected>Pas de periode</option>
                            @endforelse
                        </select>
                        @error('periode_id')
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

<!-- Edit Department Modal -->
<div wire:ignore.self id="edit_bulletin" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modifier Bulletin</h5>
                <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="updateBulletin">
                    <div class="form-group">
                        <label>Agent <span class="text-danger">*</span></label>
                        <select wire:model="agent_id" class="form-control">
                            <option value="">---</option>
                            @forelse ($agents as $agent)
                                <option value="{{ $agent->id }}">{{ $agent->prenom.' '.$agent->nom }}</option>
                            @empty
                                <option value="" selected>Pas d'agents</option>
                            @endforelse
                        </select>
                        @error('agent_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Periode <span class="text-danger">*</span></label>
                        <select wire:model="periode_id" class="form-control">
                            <option value="">---</option>
                            @forelse ($periodes as $periode)
                                <option value="{{ $periode->id }}">{{ $periode->mois }}</option>
                            @empty
                                <option value="" selected>Pas de periode</option>
                            @endforelse
                        </select>
                        @error('periode_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Mettre a jour</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Edit Department Modal -->

<!-- Delete Department Modal -->
<div wire:ignore.self id="delete_bulletin" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Supprimer Bulletin</h5>
                <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="destroyBulletin">
                    <div class="form-header">
                        <p>Voulez-vous vraiment supprimer?</p>
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
