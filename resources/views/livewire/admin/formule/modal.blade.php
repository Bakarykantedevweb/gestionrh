<!-- Add Department Modal -->
<div wire:ignore.self id="add_formule" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $formule_id ? 'Modifier' : 'Ajouter' }}</h5>
                <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="saveFormule">
                    <div class="form-group">
                        <label>Nom <span class="text-danger">*</span></label>
                        <input class="form-control" wire:model="nom" type="text">
                        @error('nom')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="row">
                        @foreach ($variables as $variable)
                            <div class="col-md-4" wire:click="addVariableToFormule({{ $variable->id }})"
                                wire:change="updateFormule" style="cursor: pointer;">
                                <label>{{ $variable->nom }}</label>
                            </div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label>Formule <span class="text-danger">*</span></label>
                        <input class="form-control" wire:model="formule" type="text">
                        @error('formule')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary"
                            type="submit">{{ $formule_id ? 'Mettre a jour' : 'Enregistrer' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Add Department Modal -->


<!-- Add Department Modal -->
<div wire:ignore.self id="calcule_formule" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $formule_id ? 'Modifier' : 'Ajouter' }}</h5>
                <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="">
                    <div class="form-group">
                        <label>Choisissez une formule <span class="text-danger">*</span></label>
                        <select wire:model="selectedFormuleId" class="form-control">
                            <option value="">Sélectionnez une formule</option>
                            @foreach ($formules as $formule)
                                <option value="{{ $formule->id }}">{{ $formule->nom }}</option>
                            @endforeach
                        </select>
                        @error('selectedFormuleId')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Afficher dynamiquement les champs d'entrée pour les valeurs des variables -->
                    @if ($selectedFormuleId)
                        @if ($variables)
                            <div class="row">
                                @foreach ($variables as $variable)
                                    <div class="col-md-12">
                                        <label>Valeur pour {{ $variable->nom }} :</label>
                                        <input class="form-control" wire:model="variableValues.{{ $variable->id }}"
                                            type="number" placeholder="Valeur pour {{ $variable->nom }}">
                                    </div>
                                @endforeach
                            </div>
                            <div class="submit-section">
                                <button wire:click.prevent="saveFormule" class="btn btn-primary">Enregistrer la
                                    formule</button>
                            </div>
                        @endif
                    @endif
                </form>
            </div>

        </div>
    </div>
</div>
<!-- /Add Department Modal -->
