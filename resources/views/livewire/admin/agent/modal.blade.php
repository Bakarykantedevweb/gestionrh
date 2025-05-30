<!-- Education Modal -->
<div wire:ignore.self id="education_info" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Ajouter un diplome</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="SaveEducation">
                    <div class="form-scroll">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nom Diplome</label>
                                            <input type="text" wire:model="nom_diplome" placeholder="Master en Informatique"
                                                class="form-control ">
                                            @error('nom_diplome')
                                                <span class="text-danger">Le champs est obligatoire</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Universite</label>
                                            <input type="text" wire:model="nom_universite" placeholder="INTEC SUP"
                                                class="form-control ">
                                            @error('nom_universite')
                                                <span class="text-danger">Le champs est obligatoire</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="">
                                                <label >Date debut</label>
                                                <input type="date" wire:model="date_debut" class="form-control">
                                                @error('date_debut')
                                                    <span class="text-danger">Le champs est obligatoire</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="">
                                                <label >Date fin</label>
                                                <input type="date" wire:model="date_fin" class="form-control">
                                                @error('date_fin')
                                                    <span class="text-danger">Le champs est obligatoire</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label >Fichier</label>
                                            <input type="file" wire:model="fichier" class="form-control">
                                            @error('fichier')
                                                <span class="text-danger">Le champs est obligatoire</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

