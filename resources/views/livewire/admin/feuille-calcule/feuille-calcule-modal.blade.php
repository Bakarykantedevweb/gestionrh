<!-- Add Department Modal -->
<div wire:ignore.self id="add_feuille_calcule" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nouvelle Feuille de Calcule</h5>
                <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="saveFeuilledeCalcule">
                    <div class="form-group">
                        <label>Feuille de Calcule Code <span class="text-danger">*</span></label>
                        <input class="form-control" wire:model="code" type="text">
                        @error('code')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Feuille de Calcule libelle <span class="text-danger">*</span></label>
                        <input class="form-control" wire:model="libelle" type="text">
                        @error('libelle')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    {{-- <div>
                        <label class="mb-2">Rubriques :</label>
                        @foreach ($rubriques as $rubrique)
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" wire:model="selectRubrique"
                                    value="{{ $rubrique->id }}" id="rubrique{{ $rubrique->id }}">
                                <label class="form-check-label" for="rubrique{{ $rubrique->id }}">
                                    {{ $rubrique->libelle }}
                                </label>
                            </div>
                        @endforeach
                    </div> --}}

                    <div class="table-responsive m-t-15">
                        <table class="table table-striped custom-table">
                            <thead>
                                <tr>
                                    <th>Rubriques</th>
                                    <th class="text-center">Select</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rubriques as $rubrique)
                                    <tr>
                                        <td>{{ $rubrique->libelle }}</td>
                                        <td class="text-center">
                                            <input wire:model="selectRubrique" value="{{ $rubrique->id }}" type="checkbox">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
<div wire:ignore.self id="edit_feuille_calcule" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modifier Feuille de Calcule</h5>
                <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="updateFeuilledeCalcule">
                    <div class="form-group">
                        <label>Feuille de Calcule Code <span class="text-danger">*</span></label>
                        <input class="form-control" wire:model="code" type="text">
                        @error('code')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Feuille de Calcule libelle <span class="text-danger">*</span></label>
                        <input class="form-control" wire:model="libelle" type="text">
                        @error('libelle')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="table-responsive m-t-15">
                        <table class="table table-striped custom-table">
                            <thead>
                                <tr>
                                    <th>Rubriques</th>
                                    <th class="text-center">Select</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rubriques as $rubrique)
                                    <tr>
                                        <td>{{ $rubrique->libelle }}</td>
                                        <td class="text-center">
                                            <input wire:model="selectRubrique" value="{{ $rubrique->id }}" type="checkbox">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
<div wire:ignore.self id="delete_feuille_calcule" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Supprimer Feuille de Calcule</h5>
                <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="destroyFeuilledeCalcule">
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
