    <!-- Add Employee Modal -->
    <div wire:ignore.self id="add_employee" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $agent_id ? 'Modification Agent':'Creation d\'un agent' }}</h5>
                    <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="saveEmploye">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Prenom <span class="text-danger">*</span></label>
                                    <input class="form-control" wire:model="prenom" type="text">
                                    @error('prenom')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Nom</label>
                                    <input class="form-control" wire:model="nom" type="text">
                                    @error('nom')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Email <span class="text-danger">*</span></label>
                                    <input class="form-control" wire:model="email" type="email">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="col-form-label">Date de Naissance <span
                                        class="text-danger">*</span></label>
                                <div class="row">
                                    <div class="col-md-4">
                                        <select class="form-control" wire:model="jour">
                                            <option>Jour</option>
                                            <?php for ($i = 1; $i <= 31; $i++) : ?>
                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
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
                                            <?php for ($i = 1900; $i <= date('Y'); $i++) : ?>
                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Age <span class="text-danger">*</span></label>
                                    <input class="form-control" readonly wire:model="age" type="number">
                                    @error('age')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Telephone <span class="text-danger">*</span></label>
                                    <input class="form-control" wire:model="telephone" type="text">
                                    @error('telephone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Departement <span class="text-danger">*</span></label>
                                    <select class="form-control" wire:model="departement_id">
                                        <option value="">---</option>
                                        @foreach ($departements as $dep)
                                            <option value="{{ $dep->id }}">{{ $dep->nom . '(' . $dep->code . ')' }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('departement_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Poste <span class="text-danger">*</span></label>
                                    <select class="form-control" wire:model="poste_id">
                                        <option value="">---</option>
                                        @foreach ($postes as $pos)
                                            <option value="{{ $pos->id }}">{{ $pos->nom }}</option>
                                        @endforeach
                                    </select>
                                    @error('poste_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Sexe <span class="text-danger">*</span></label>
                                    <select wire:model="sexe" class="form-control">
                                        <option value="">...</option>
                                        <option value="M">Masculin</option>
                                        <option value="F">Feminin</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">{{ $agent_id ? 'Modifier':'Enregistrer' }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Add Employee Modal -->
