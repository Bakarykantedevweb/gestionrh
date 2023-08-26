<!-- Add Client Modal -->
<div wire:ignore.self id="add_contrat" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Creer un Contrat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Agent <span class="text-danger">*</span></label>
                                <select wire:model="agent_id" class="form-control">
                                    <option value="">Choisissez un agent</option>
                                    @forelse ($agents as $agent)
                                        <option value="{{ $agent->id }}">{{ $agent->prenom . ' ' . $agent->nom }}
                                        </option>
                                    @empty
                                        <option value="" selected>pas d'Agents</option>
                                    @endforelse
                                </select>
                                @error('agent_id')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Type Contrat <span class="text-danger">*</span></label>
                                <select wire:model="" class="form-control">
                                    <option value="">Choisissez un agent</option>
                                    @forelse ($typeContrats as $typeContrat)
                                        <option value="{{ $typeContrat->id }}">{{ $typeContrat->nom }}</option>
                                    @empty
                                        <option value="" selected>pas de Type contrat</option>
                                    @endforelse
                                </select>
                                @error('')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Numero Contrat <span class="text-danger">*</span></label>
                                <input type="text" wire:model="numero_contrat" class="form-control">
                                @error('numero_contrat')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Date<span class="text-danger">*</span></label>
                                <input type="text" wire:model="date_entre" class="form-control">
                                @error('date_entre')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card tab-box">
                        <div class="row user-tabs">
                            <div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
                                <ul class="nav nav-tabs nav-tabs-bottom">
                                    <li class="nav-item"><a href="#emp_famille" data-toggle="tab"
                                            class="nav-link active">Famille</a></li>
                                    <li class="nav-item"><a href="#emp_salaire" data-toggle="tab"
                                            class="nav-link">Autres</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content">

                        <!-- Profile Info Tab -->
                        <div id="emp_famille" class="pro-overview tab-pane fade show active">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Situation Matrimoniale</label>
                                        <select wire:model="selectedOption" class="form-control">
                                            <option value="">---</option>
                                            @foreach ($options as $option => $inputType)
                                                <option value="{{ $option }}">{{ $option }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    @if ($selectedOption == 'Marie')
                                        <div class="form-group">
                                            <label for="">Date Mariage</label>
                                            <input type="date" wire:model="" class="form-control">
                                        </div>
                                    @endif
                                    @if ($selectedOption == 'Divorce')
                                        <div class="form-group">
                                            <label for="">Date Divorce</label>
                                            <input type="date" wire:model="" class="form-control">
                                        </div>
                                    @endif
                                    @if ($selectedOption == 'Veuf')
                                        <div class="form-group">
                                            <label for="">Date Veuf</label>
                                            <input type="date" wire:model="" class="form-control">
                                        </div>
                                    @endif
                                    @if ($selectedOption == 'Célibataire')
                                        <div class="form-group">
                                            <label for="">Nombre d'enfants</label>
                                            <input type="number" wire:model="" class="form-control">
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    @if ($selectedOption == 'Marie')
                                        <div class="form-group">
                                            <label for="">Nombres d'enfants</label>
                                            <input type="number" wire:model="" class="form-control">
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    @if ($selectedOption == 'Marie')
                                        <div class="form-group">
                                            <label for="">Nombres de femmes</label>
                                            <input type="number" max="4" wire:model=""
                                                class="form-control">
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- /Profile Info Tab -->

                        <!-- Projects Tab -->
                        <div class="tab-pane fade" id="emp_salaire">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Nombre de jour de Travail</label>
                                    <input type="number" class="form-control" wire:model="" value="30">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Nombre de jour conge</label>
                                    <input type="number" class="form-control" wire:model="" value="2.5">
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Centre Impots <span
                                                class="text-danger">*</span></label>
                                        <select wire:model="" class="form-control">
                                            <option value="">Choisissez</option>
                                            @forelse ($centreImpots as $centreImpot)
                                                <option value="{{ $centreImpot->id }}">{{ $centreImpot->libelle }}
                                                </option>
                                            @empty
                                                <option value="" selected>pas de Centre Impots</option>
                                            @endforelse
                                        </select>
                                        @error('')
                                            <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Conventions <span
                                                class="text-danger">*</span></label>
                                        <select class="form-control">
                                            <option value="">Choisissez</option>
                                            @forelse ($conventions as $convention)
                                                <option value="{{ $convention->id }}">{{ $convention->libelle }}
                                                </option>
                                            @empty
                                                <option value="" selected>pas de Conventions</option>
                                            @endforelse
                                        </select>
                                        @error('')
                                            <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="category">Catégorie associée :</label>
                                        <select wire:model="" class="form-control" id="category">
                                            <option value="">Aucune catégorie sélectionnée</option>
                                                <option value="1">A</option>
                                        </select>
                                        @error('')
                                            <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Feuille de Calcule <span
                                                class="text-danger">*</span></label>
                                        <select wire:model="" class="form-control">
                                            <option value="">Choisissez</option>
                                            @forelse ($feuilles as $feuille)
                                                <option value="{{ $feuille->id }}">
                                                    {{ $feuille->code . '-' . $feuille->libelle }}
                                                </option>
                                            @empty
                                                <option value="" selected>pas de Feuille de Calcule</option>
                                            @endforelse
                                        </select>
                                        @error('')
                                            <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="">Prefix compte</label>
                                    <input type="text" class="form-control" wire:model="">
                                </div>
                                <div class="col-md-9">
                                    <label for="">Numero de compte</label>
                                    <input type="text" class="form-control" wire:model="">
                                </div>
                                {{-- <div class="col-md-6">
                                    <label for="">Salaire de Base</label>
                                    <input type="text" class="form-control" wire:model="">
                                </div> --}}
                                <div class="col-md-12">
                                    <label for="">Salaire de Base</label>
                                    <input type="text" class="form-control" wire:model="">
                                </div>
                            </div>
                        </div>
                        <!-- /Projects Tab -->

                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Add Client Modal -->
