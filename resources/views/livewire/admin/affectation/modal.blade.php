    <!-- Add Department Modal -->
    <div wire:ignore.self id="mettre_fin" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Fin Affectation</h5>
                    <button type="button" wire:click="closeModal" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="UpdateAffectation">
                        <div class="form-group">
                            <label>Date Prise de Service <span class="text-danger">*</span></label>
                            <input class="form-control" readonly type="date" wire:model="date_debut">
                            @error('date_debut')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Date Fin <span class="text-danger">*</span></label>
                            <input class="form-control" min="{{ $date_debut }}" type="date" wire:model="date_fin">
                            @error('date_fin')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="checkbox" wire:model="status">
                            <label>Mettre fin</label>
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary" type="submit">Soumettre</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Add Department Modal -->


    <!-- Add Department Modal -->
    <div wire:ignore.self id="add_affectation" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Reaffectation</h5>
                    <button type="button" wire:click="closeModal" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="SaveAffectation">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Agence <span class="text-danger">*</span></label>
                                    <select wire:model="agence_id" class="form-control">
                                        <option>---</option>
                                        @foreach ($agences as $agence)
                                            <option value="{{ $agence->id }}">{{ $agence->nom }}</option>
                                        @endforeach
                                    </select>
                                    @error('agence_id')
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
                                            <option value="{{ $dep->id }}">
                                                {{ $dep->code }} - {{ $dep->nom }}
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Date Prise service<span
                                            class="text-danger">*</span></label>
                                    <input type="date" wire:model="date_debut" min="{{ $date_fin }}"
                                        class="form-control">
                                    @error('date_debut')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary" type="submit">Soumettre</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Add Department Modal -->
