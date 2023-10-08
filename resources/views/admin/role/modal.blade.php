    {{-- Add Role --}}
    <div id="add_role" class="modal custom-modal fade" role="dialog">
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
                        <div class="row">
                            @foreach ($droits as $droit)
                                <div class="col-md-4">
                                    <input id="id{{ $droit->id }}" name="role_droits[]" value="{{ $droit->id }}"
                                        type="checkbox" class='ml-1'>
                                    <label for="id{{ $droit->id }}">{{ $droit->nom }}</label>
                                </div>
                            @endforeach
                        </div>
                        {{-- <div class="table-responsive m-t-15">
                            <table class="table table-striped custom-table">
                                <thead>
                                    <tr>
                                        <th>Permission</th>
                                        <th class="text-center">Read</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($droits as $droit)
                                        <tr>
                                            <td>{{ $droit->nom }}</td>
                                            <td class="text-center">
                                                <input name="role_droits[]" value="{{ $droit->id }}" type="checkbox">
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> --}}
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
                        <div class="row" id="droits_listes">

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
