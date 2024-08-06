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
<!-- /Education Modal -->



{{-- <div id="experience_info" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Experience Informations</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-scroll">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Experience Informations</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-focus">
                                            <input type="text" class="form-control "
                                                value="Digital Devlopment Inc">
                                            <label >Company Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-focus">
                                            <input type="text" class="form-control "
                                                value="United States">
                                            <label >Location</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-focus">
                                            <input type="text" class="form-control "
                                                value="Web Developer">
                                            <label >Job Position</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-focus">
                                            <div class="cal-icon">
                                                <input type="text" class="form-control  datetimepicker"
                                                    value="01/07/2007">
                                            </div>
                                            <label >Period From</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-focus">
                                            <div class="cal-icon">
                                                <input type="text" class="form-control  datetimepicker"
                                                    value="08/06/2018">
                                            </div>
                                            <label >Period To</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> --}}
