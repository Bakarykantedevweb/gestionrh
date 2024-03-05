    {{-- <!-- Add Department Modal -->
    <div wire:ignore.self id="add_affectation" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Affectation Agent</h5>
                    <button type="button" wire:click="closeModal" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="SaveAffectation">
                        <div class="form-group">
                            <label>Agence <span class="text-danger">*</span></label>
                            <select wire:model="agence_id" wire:click="changeTypeAgence" class="form-control">
                                <option>---</option>
                                @foreach ($agences as $agence)
                                    <option value="{{ $agence->id }}">{{ $agence->nom }}</option>
                                @endforeach
                            </select>
                            @error('agence_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        @if ($showInputsAgence)
                            <div class="form-group">
                            <label>Departement <span class="text-danger">*</span></label>
                            <select wire:model="departement_id" class="form-control">
                                <option>---</option>
                                @foreach ($departements as $dep)
                                    <option value="{{ $dep->id }}">{{ $dep->nom }} ({{ $dep->code }})</option>
                                @endforeach
                            </select>
                            @error('departement_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Poste <span class="text-danger">*</span></label>
                            <select wire:model="poste_id" class="form-control">
                                <option>---</option>
                                @foreach ($postes as $poste)
                                    <option value="{{ $poste->id }}">{{ $poste->nom }}</option>
                                @endforeach
                            </select>
                            @error('poste_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        @endif
                        <div class="form-group">
                            <label for="">Date debut</label>
                            <input type="date" wire:model="date_debut" class="form-control">
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary" type="submit">Affecter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Add Department Modal --> --}}
