<!-- Add Periode Modal -->
<div wire:ignore.self id="add_periode" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Periode</h5>
                <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="savePeriode">
                    <div class="form-group">
                        <label>Mois<span class="text-danger">*</span></label>
                        <select wire:model="mois" class="form-control">
                            <option value="">...</option>
                            <option value="janvier">Janvier</option>
                            <option value="fevrier">Février</option>
                            <option value="mars">Mars</option>
                            <option value="avril">Avril</option>
                            <option value="mai">Mai</option>
                            <option value="juin">Juin</option>
                            <option value="juillet">Juillet</option>
                            <option value="aout">Août</option>
                            <option value="septembre">Septembre</option>
                            <option value="octobre">Octobre</option>
                            <option value="novembre">Novembre</option>
                            <option value="decembre">Décembre</option>
                        </select>
                        @error('mois')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Année<span class="text-danger">*</span></label>
                        <select class="form-control" wire:model="annee">
                            <option value="">...</option>
                            <?php
                            for ($i = date('Y'); $i < 2099; $i++) {
                                echo '<option value="' . $i . '">' . $i . '</option>';
                            }
                            ?>
                        </select>
                        @error('annee')
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
<!-- /Add Periode Modal -->

<!-- Edit Periode Modal -->
<div wire:ignore.self id="edit_periode" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modifier Periode</h5>
                <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="updatePeriode">
                    <div class="form-group">
                        <label>Mois<span class="text-danger">*</span></label>
                        <select wire:model="mois" class="form-control">
                            <option value="">...</option>
                            <option value="janvier">Janvier</option>
                            <option value="fevrier">Février</option>
                            <option value="mars">Mars</option>
                            <option value="avril">Avril</option>
                            <option value="mai">Mai</option>
                            <option value="juin">Juin</option>
                            <option value="juillet">Juillet</option>
                            <option value="aout">Août</option>
                            <option value="septembre">Septembre</option>
                            <option value="octobre">Octobre</option>
                            <option value="novembre">Novembre</option>
                            <option value="decembre">Décembre</option>
                        </select>
                        @error('mois')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Année<span class="text-danger">*</span></label>
                        <select class="form-control" wire:model="annee">
                            <option value="">...</option>
                            <?php
                            for ($i = date('Y'); $i < 2099; $i++) {
                                echo '<option value="' . $i . '">' . $i . '</option>';
                            }
                            ?>
                        </select>
                        @error('annee')
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
<!-- /Edit Periode Modal -->

<!-- Delete Periode Modal -->
<div wire:ignore.self id="delete_periode" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Supprimer Periode</h5>
                <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="destroyPeriode">
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
<!-- /Delete Periode Modal -->
