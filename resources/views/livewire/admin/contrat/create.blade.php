<div>
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Contrats</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Tableau de Bord</a></li>
                    <li class="breadcrumb-item active">Contrats</li>
                </ul>
            </div>
            <div class="col-auto float-right ml-auto">
                <a href="{{ url('admin/contrats') }}" class="btn add-btn"><i class="fa fa-list"></i>
                    Retour
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Creation d'un contrat</h4>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="SaveContrat">
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
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Type Contrat <span
                                            class="text-danger">*</span></label>
                                    <select wire:model="type_contrat_id" class="form-control">
                                        <option value="">Choisissez un type de contrat</option>
                                        @forelse ($typeContrats as $typeContrat)
                                            <option value="{{ $typeContrat->id }}">{{ $typeContrat->nom }}</option>
                                        @empty
                                            <option value="" selected>pas de Type contrat</option>
                                        @endforelse
                                    </select>
                                    @error('type_contrat_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Diplome <span class="text-danger">*</span></label>
                                    <select wire:model="diplome_id" class="form-control">
                                        <option value="">...</option>
                                        @foreach ($diplomes as $diplome)
                                            <option value="{{ $diplome->id }}">{{ $diplome->nom }}</option>
                                        @endforeach
                                    </select>
                                    @error('diplome_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Date<span class="text-danger">*</span></label>
                                    <input type="date" wire:model="date_entre" class="form-control">
                                    @error('date_entre')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
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
                                    @error('selectedOption')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                @if ($selectedOption == 'Marie')
                                    <div class="form-group">
                                        <label for="">Date Mariage</label>
                                        <input type="date" wire:model="date_mariage" class="form-control">
                                    </div>
                                @endif
                                @if ($selectedOption == 'Divorce')
                                    <div class="form-group">
                                        <label for="">Date Divorce</label>
                                        <input type="date" wire:model="date_divorve" class="form-control">
                                    </div>
                                @endif
                                @if ($selectedOption == 'Veuf')
                                    <div class="form-group">
                                        <label for="">Date Veuve</label>
                                        <input type="date" wire:model="date_veuve" class="form-control">
                                    </div>
                                @endif
                                @if ($selectedOption == 'Célibataire')
                                    <div class="form-group">
                                        <label for="">Nombre d'enfants</label>
                                        <input type="number" wire:model="nombre_enfant" class="form-control">
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-6">
                                @if ($selectedOption == 'Marie')
                                    <div class="form-group">
                                        <label for="">Nombres d'enfants</label>
                                        <input type="number" wire:model="nombre_enfant" class="form-control">
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-6">
                                @if ($selectedOption == 'Marie')
                                    <div class="form-group">
                                        <label for="">Nombres de femmes</label>
                                        <input type="number" max="4" wire:model="nombre_femme"
                                            class="form-control">
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            {{-- <div class="col-md-6">
                                <label for="">Nombre de jour de Travail</label>
                                <input type="number" min="1" class="form-control" wire:model="nombre_jour_travail" placeholder="30">
                            </div>
                            <div class="col-md-6">
                                <label for="">Nombre de jour conge</label>
                                <input type="number" min="1" class="form-control" wire:model="nombre_jour_conge" placeholder="2.5">
                            </div> --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Centre Impots <span
                                            class="text-danger">*</span></label>
                                    <select wire:model="centre_impot_id" class="form-control">
                                        <option value="">Choisissez</option>
                                        @forelse ($centreImpots as $centreImpot)
                                            <option value="{{ $centreImpot->id }}">{{ $centreImpot->libelle }}
                                            </option>
                                        @empty
                                            <option value="" selected>pas de Centre Impots</option>
                                        @endforelse
                                    </select>
                                    @error('centre_impot_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Conventions <span
                                            class="text-danger">*</span></label>
                                    <select wire:model="selectedConvention" class="form-control">
                                        <option value="">Choisissez</option>
                                        @forelse ($conventions as $convention)
                                            <option value="{{ $convention->id }}">{{ $convention->libelle }}</option>
                                        @empty
                                            <option value="" selected>pas de Conventions</option>
                                        @endforelse
                                    </select>
                                    @error('selectedConvention')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category">Catégorie associée :</label>
                                    <select wire:model="selectedCategory" class="form-control" id="category">
                                        <option>Choisissez</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->libelle }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('selectedCategory')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Feuille de Calcule <span
                                            class="text-danger">*</span></label>
                                    <select wire:model="feuille_calcule_id" class="form-control">
                                        <option value="">Choisissez</option>
                                        @forelse ($feuilles as $feuille)
                                            <option value="{{ $feuille->id }}">
                                                {{ $feuille->code . '-' . $feuille->libelle }}
                                            </option>
                                        @empty
                                            <option value="" selected>pas de Feuille de Calcule</option>
                                        @endforelse
                                    </select>
                                    @error('feuille_calcule_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="">Prefix compte</label>
                                <input type="text" class="form-control" wire:model="prefix">
                                @error('prefix')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-9">
                                <label for="">Numero de compte</label>
                                <input type="text" class="form-control" wire:model="compte">
                                @error('compte')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="">Salaire de Base</label>
                                <input type="text" class="form-control" wire:model="montantCategorie" readonly>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <button class="btn btn-primary" type="submit">Creer le contrat</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
