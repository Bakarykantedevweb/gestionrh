<!-- Add Employee Modal -->
<div wire:ignore.self id="add_enfant" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Creation d'un enfant</h5>
                <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="saveEnfant">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Prenom</label>
                            <input type="text" class="form-control" wire:model="prenom">
                            @error('prenom')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="">Nom</label>
                            <input type="text" class="form-control" wire:model="nom">
                            @error('nom')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="col-form-label">Date de Naissance <span class="text-danger">*</span></label>
                            <div class="row">
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="jour">
                                        <option>Jour</option>
                                        <?php for ($i = 1; $i <= 31; $i++) : ?>
                                        <option value="<?php echo $i; ?>">
                                            <?php echo $i; ?>
                                        </option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="mois">
                                        <option>Mois</option>
                                        <option value="Janvier">Janvier</option>
                                        <option value="Fevrier">Fevrier</option>
                                        <option value="Mars">Mars</option>
                                        <option value="Avril">Avril</option>
                                        <option value="Mai">Mai</option>
                                        <option value="Juin">Juin</option>
                                        <option value="Juillet">Juillet</option>
                                        <option value="Aout">Aout</option>
                                        <option value="Septembre">Septembre</option>
                                        <option value="Octobre">Octobre</option>
                                        <option value="Novembre">Novembre</option>
                                        <option value="Decembre">Decembre</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="annee">
                                        <option>Annee</option>
                                        <?php for ($i = 2006; $i <= date('Y'); $i++) : ?>
                                        <option value="<?php echo $i; ?>">
                                            <?php echo $i; ?>
                                        </option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Age <span class="text-danger">*</span></label>
                                <input class="form-control" readonly wire:model="age" type="number">
                                @error('age')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Agent <span class="text-danger">*</span></label>
                                <select wire:model="agent_id" class="form-control">
                                    <option value="">Choisissez un agent</option>
                                    @forelse ($agents as $agent)
                                    <option value="{{ $agent->id }}">{{ $agent->prenom . ' ' . $agent->nom }}
                                    </option>
                                    @empty
                                    <option value="" selected>pas d'Agents</option>
                                    @endforelse
                                </select>
                                @error('agent_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="">Piece Jointe</label>
                            <input type="file" wire:model="photo" class="form-control">
                        </div>
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Add Employee Modal -->
