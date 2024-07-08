    {{-- Add Role --}}
    <div id="add_custom_policy" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter un Role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('role.store') }}">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Nom du Role <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="nom">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Etat <span class="text-danger">*</span></label>
                                <select name="type" id="" class="form-control">
                                    <option value="" selected disabled>Choisir</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group leave-duallist">
                            <label>Affecter des Droits</label>
                            <div class="row">
                                <div class="col-lg-5 col-sm-5">
                                    <select name="droit_list" id="customleave_select" class="form-control"
                                        size="{{ count($droits) }}" multiple="multiple">
                                        @foreach ($droits as $droit)
                                            <option value="{{ $droit->id }}">{{ $droit->nom }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="multiselect-controls col-lg-2 col-sm-2">
                                    <button type="button" id="customleave_select_rightAll"
                                        class="btn btn-block btn-white"><i class="fa fa-forward"></i></button>
                                    <button type="button" id="customleave_select_rightSelected"
                                        class="btn btn-block btn-white"><i class="fa fa-chevron-right"></i></button>
                                    <button type="button" id="customleave_select_leftSelected"
                                        class="btn btn-block btn-white"><i class="fa fa-chevron-left"></i></button>
                                    <button type="button" id="customleave_select_leftAll"
                                        class="btn btn-block btn-white"><i class="fa fa-backward"></i></button>
                                </div>
                                <div class="col-lg-5 col-sm-5">
                                    <select name="role_droits[]" id="customleave_select_to" class="form-control"
                                        size="10" multiple="multiple">
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="submit-section">
                            <button type="submit" class="btn btn-primary submit-btn">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Edit Role --}}

    <div id="edit_custom_policy" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modifier le Role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('role.update') }}">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6 col-sm-12">
                                <input type="hidden" id="e_role_id" name="id">
                                <label>Nom du Role<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="" id="e_role_nom"
                                    name="nom">
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label>Etat du Role <span class="text-danger">*</span></label>
                                <select name="type" class="form-control" id="e_role_type">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group leave-duallist">
                            <label>Affecter des droits</label>
                            <div class="row">
                                <div class="col-lg-5 col-sm-5">
                                    <select id="edit_customleave_select" class="form-control" size="5"
                                        multiple="multiple">

                                    </select>
                                </div>
                                <div class="multiselect-controls col-lg-2 col-sm-2">
                                    <button type="button" id="edit_customleave_select_rightAll"
                                        class="btn btn-block btn-white"><i class="fa fa-forward"></i></button>
                                    <button type="button" id="edit_customleave_select_rightSelected"
                                        class="btn btn-block btn-white"><i class="fa fa-chevron-right"></i></button>
                                    <button type="button" id="edit_customleave_select_leftSelected"
                                        class="btn btn-block btn-white"><i class="fa fa-chevron-left"></i></button>
                                    <button type="button" id="edit_customleave_select_leftAll"
                                        class="btn btn-block btn-white"><i class="fa fa-backward"></i></button>
                                </div>
                                <div class="col-lg-5 col-sm-5">
                                    <select id="edit_customleave_select_to" class="form-control" size="8"
                                        multiple="multiple" name="droits[]">

                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="submit-section">
                            <button type="submit" class="btn btn-primary submit-btn">Modifier</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Delete Role --}}
    <div class="modal custom-modal fade" id="delete_custom_policy" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('role.delete') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" class="e_role_id">
                    <div class="modal-body">
                        <div class="form-header">
                            <h3>Supprimer le droit</h3>
                            <p>Des Utilisateurs peuvent être en cours d'utilisation de ce droit,
                                Êtes vous sûr ?</p>
                        </div>
                        <div class="modal-btn delete-action">
                            <div class="row">
                                <div class="col-6">
                                    <button type="submit" class="btn btn-primary continue-btn">Supprimer</button>
                                </div>
                                <div class="col-6">
                                    <a href="javascript:void(0);" data-dismiss="modal"
                                        class="btn btn-primary cancel-btn">Annuler</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
