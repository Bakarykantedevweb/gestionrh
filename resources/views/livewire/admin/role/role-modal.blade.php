        <div wire:ignore.self id="add_role" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ajouter un Role</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="saveRole">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Nom du Role <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" wire:model="nom">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Etat <span class="text-danger">*</span></label>
                                    <select wire:model="type" id="" class="form-control">
                                        <option value="" selected disabled>Choisir</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            {{-- <div class="form-group leave-duallist">
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
                                        <select wire:model="role_droits[]" id="customleave_select_to" class="form-control"
                                            size="10" multiple="multiple">
                                        </select>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="table-responsive m-t-15">
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
                                                    <input wire:model="role_droits.{{ $loop->index }}" type="checkbox">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="submit-section">
                                <button type="submit" class="btn btn-primary submit-btn">Enregistrer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
