<!-- Add Department Modal -->
<div wire:ignore.self id="add_departement" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nouveau Departement</h5>
                <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="saveDepartement">
                    <div class="form-group">
                        <label>Departement Code <span class="text-danger">*</span></label>
                        <input class="form-control" wire:model="code" type="text">
                        @error('code')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Departement Nom <span class="text-danger">*</span></label>
                        <input class="form-control" wire:model="nom" type="text">
                        @error('nom')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="table-responsive m-t-15">
                        <input wire:model="search" type="search" class="form-control" placeholder="Recherche...">
                        <table class="table table-striped custom-table">
                            <thead>
                                <tr>
                                    <th>Postes</th>
                                    <th class="text-center">Select</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($postes as $poste)
                                <tr>
                                    <td>{{ $poste->nom }}</td>
                                    <td class="text-center">
                                        <input wire:model="selectPoste" value="{{ $poste->id }}" type="checkbox">
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

<!-- import Poste Modal -->
<div wire:ignore.self id="import_departement" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Choisissez Votre ficher</h5>
                <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="importDepartement">
                    <div class="form-group">
                        <label>Ficher <span class="text-danger">*</span></label>
                        <input class="form-control" wire:model="fichier" type="file">
                        @error('fichier')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-success submit-btn">Importer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /import Poste Modal -->

<!-- Edit Department Modal -->
<div wire:ignore.self id="edit_departement" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modifier Departement</h5>
                <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="updateDepartement">
                    <div class="form-group">
                        <label>Departement Code <span class="text-danger">*</span></label>
                        <input class="form-control" wire:model="code" type="text">
                        @error('code')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Departement Nom <span class="text-danger">*</span></label>
                        <input class="form-control" wire:model="nom" type="text">
                        @error('nom')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="table-responsive m-t-15">
                        <input wire:model="search" type="search" class="form-control" placeholder="Recherche...">
                        <table class="table table-striped custom-table">
                            <thead>
                                <tr>
                                    <th>Postes</th>
                                    <th class="text-center">Select</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($postes as $poste)
                                <tr>
                                    <td>{{ $poste->nom }}</td>
                                    <td class="text-center">
                                        <input wire:model="selectPoste" value="{{ $poste->id }}" type="checkbox">
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
<div wire:ignore.self id="delete_departement" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Supprimer Departement</h5>
                <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="destroyDepartement">
                    <div class="form-header">
                        <p>Si vous supprimez ce departement tous les agents liés a ce dernier seront supprmiés?</p>
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
