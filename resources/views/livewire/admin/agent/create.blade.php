<div>
    <!-- Page Header -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Agents</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                    <li class="breadcrumb-item active">Agent</li>
                </ul>
            </div>
            <div class="col-auto float-right ml-auto">
                <a href="{{ route('agent.index') }}" class="btn add-btn"><i class="fa fa-list"></i> Retour</a>
                <div class="view-icons">
                    <a href="" class="grid-view btn btn-link active"><i class="fa fa-th"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Header -->
    @include('layouts.partials.message')
    @include('layouts.partials.error')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Creation d'un agent</h4>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="saveEmploye">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Prenom <span class="text-danger">*</span></label>
                                    <input class="form-control" wire:model="prenom" type="text">
                                    @error('prenom')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Nom <span class="text-danger">*</span></label>
                                    <input class="form-control" wire:model="nom" type="text">
                                    @error('nom')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Email <span class="text-danger">*</span></label>
                                    <input class="form-control" wire:model="email" type="email">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="col-form-label">Date de Naissance <span
                                        class="text-danger">*</span></label>
                                <div class="row">
                                    <div class="col-md-4">
                                        <select class="form-control" wire:model="jour">
                                            <option>Jour</option>
                                            <?php for ($i = 1; $i <= 31; $i++) : ?>
                                            <option value="<?php echo $i; ?>">
                                                <?php echo $i; ?>
                                            </option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <select class="form-control" wire:model="mois">
                                            <option>Mois</option>
                                            <option value="Janvier">Janvier</option>
                                            <option value="Fevrier">Fevrier</option>
                                            <option value="Mars">Mars</option>
                                            <option value="Avril">Avril</option>
                                            <option value="Mai">Mai</option>
                                            <option value="Juin">Juin</option>
                                            <option value="Juillet">Juillet</option>
                                            <option value="Aout">Aout</option>
                                            <option value="Septembre">Septembre</option>
                                            <option value="Octobre">Octobre</option>
                                            <option value="Novembre">Novembre</option>
                                            <option value="Decembre">Decembre</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <select class="form-control" wire:model="annee">
                                            <option value="0">Annee</option>
                                            <?php for ($i = 1964; $i <= 2006; $i++) : ?>
                                            <option value="<?php echo $i; ?>">
                                                <?php echo $i; ?>
                                            </option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Age <span class="text-danger">*</span></label>
                                    <input class="form-control" readonly wire:model="age" type="number">
                                    @error('age')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Telephone <span class="text-danger">*</span></label>
                                    <input class="form-control" wire:model="telephone" type="number">
                                    @error('telephone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Agence <span class="text-danger">*</span></label>
                                    <select wire:model="agence_id" class="form-control">
                                        <option>---</option>
                                        @foreach ($agences as $agence)
                                            <option value="{{ $agence->id }}">{{ $agence->nom }}</option>
                                        @endforeach
                                    </select>
                                    @error('agence_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Departement <span
                                            class="text-danger">*</span></label>
                                    <select class="form-control" wire:model="departement_id">
                                        <option value="">---</option>
                                        @foreach ($departements as $dep)
                                            <option value="{{ $dep->id }}">
                                                {{ $dep->code }} - {{ $dep->nom }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('departement_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Poste <span class="text-danger">*</span></label>
                                    <select class="form-control" wire:model="poste_id">
                                        <option value="">---</option>
                                        @foreach ($postes as $pos)
                                            <option value="{{ $pos->id }}">{{ $pos->nom }}</option>
                                        @endforeach
                                    </select>
                                    @error('poste_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Date Prise service<span
                                            class="text-danger">*</span></label>
                                    <input type="date" wire:model="date_debut" class="form-control">
                                    @error('date_debut')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Sexe <span class="text-danger">*</span></label>
                                    <select wire:model="sexe" class="form-control">
                                        <option value="">...</option>
                                        <option value="M">Masculin</option>
                                        <option value="F">Feminin</option>
                                    </select>
                                    @error('sexe')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="">Photo</label>
                                <input type="file" wire:model="photo" class="form-control">
                            </div>
                        </div>
                        <div class="card tab-box">
                            <div class="row user-tabs">
                                <div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
                                    <ul class="nav nav-tabs nav-tabs-bottom">
                                        <li class="nav-item"><a href="#emp_contrat" data-toggle="tab"
                                                class="nav-link active">Contrat</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content">
                            <div id="emp_contrat" class="pro-overview tab-pane fade show active">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Type Contrat <span
                                                    class="text-danger">*</span></label>
                                            <select wire:model="type_contrat_id" wire:change="changeType"
                                                class="form-control">
                                                <option value="">Choisissez un type de contrat</option>
                                                @forelse ($typeContrats as $typeContrat)
                                                    <option value="{{ $typeContrat->id }}">{{ $typeContrat->nom }}
                                                    </option>
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
                                            <label class="col-form-label">Date Creation<span
                                                    class="text-danger">*</span></label>
                                            <input type="date" wire:model="date_entre" class="form-control">
                                            @error('date_entre')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    @if ($showInputs)
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Date Fin du CDD<span
                                                        class="text-danger">*</span></label>
                                                <input type="date" wire:model="date_fin" class="form-control">
                                                @error('date_fin')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    @endif
                                    <div class="col-md-6">
                                        <label for="">Diplome</label>
                                        <select wire:model="diplome_id" wire:change="updateMontant"
                                            class="form-control">
                                            <option value=""></option>
                                            @foreach ($diplomes as $diplome)
                                                <option value="{{ $diplome->id }}">
                                                    {{ $diplome->nom }}-{{ $diplome->classification->nom }}</option>
                                            @endforeach
                                        </select>
                                        @error('diplome_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Salaire de Base</label>
                                        <input type="text" class="form-control" wire:model="montantCategorie"
                                            readonly>
                                    </div>
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
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        @if ($selectedOption == 'Marie')
                                            <div class="form-group">
                                                <label for="">Date Mariage</label>
                                                <input type="date" wire:model="date_mariage" class="form-control">
                                            </div>
                                        @endif
                                        @if ($selectedOption == 'Veuf')
                                            <div class="form-group">
                                                <label for="">Date Veuve</label>
                                                <input type="date" wire:model="date_veuve" class="form-control">
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        @if ($selectedOption == 'Marie')
                                            <div class="form-group">
                                                <label for="">Nombres d'enfants</label>
                                                <input type="number" min="0" max="4"
                                                    wire:model="nombre_enfant" class="form-control">
                                            </div>
                                        @endif
                                        @if ($selectedOption == 'Veuf')
                                            <div class="form-group">
                                                <label for="">Nombres d'enfants</label>
                                                <input type="number" min="0" max="4"
                                                    wire:model="nombre_enfant" class="form-control">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        @if ($selectedOption == 'Célibataire')
                                            <div class="form-group">
                                                <label for="">Nombres d'enfants</label>
                                                <input type="number" wire:model="nombre_enfant" min="0"
                                                    max="4" class="form-control">
                                            </div>
                                        @endif
                                        @if ($selectedOption == 'Divorce')
                                            <div class="form-group">
                                                <label for="">Nombres d'enfants</label>
                                                <input type="number" wire:model="nombre_enfant" min="0"
                                                    max="4" class="form-control">
                                            </div>
                                        @endif
                                        @if ($selectedOption == 'Veuf')
                                            <div class="form-group">
                                                <label for="">Nombres d'enfants</label>
                                                <input type="number" wire:model="nombre_enfant" min="0"
                                                    class="form-control">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Centre Impots <span
                                                    class="text-danger">*</span></label>
                                            <select wire:model="centre_impot_id" class="form-control">
                                                <option value="">Choisissez</option>
                                                @forelse ($centreImpots as $centreImpot)
                                                    <option value="{{ $centreImpot->id }}">
                                                        {{ $centreImpot->libelle }}
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
                                            <label class="col-form-label">Feuille de Calcule <span
                                                    class="text-danger">*</span></label>
                                            <select wire:model="feuille_calcule_id" wire:change="getRubriques"
                                                class="form-control">
                                                <option value="0">Choisissez</option>
                                                @forelse ($feuilles as $feuille)
                                                    <option value="{{ $feuille->id }}">
                                                        {{ $feuille->code . '-' . $feuille->libelle }}
                                                    </option>
                                                @empty
                                                    <option value="0" selected>pas de Feuille de Calcule</option>
                                                @endforelse
                                            </select>
                                            @error('feuille_calcule_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive m-t-15">
                                    <table class="table table-striped custom-table">
                                        <thead>
                                            <tr>
                                                @foreach ($rubriques as $rubrique)
                                                    <th class="text-center">{{ $rubrique->libelle }}</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                @foreach ($rubriques as $rubrique)
                                                    <td>
                                                        <input type="number" class="form-control"
                                                            wire:model="montant.{{ $rubrique->id }}" />
                                                    </td>
                                                @endforeach
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {{-- <div id="emp_formation" class="pro-overview tab-pane fade show">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">Formations</h3>
                                        <div class="add-more">
                                            <button type="button" class="btn btn-primary btn-sm mb-3"
                                                wire:click.prevent="addEntry">
                                                <i class="fa fa-plus-circle"></i> Ajouter
                                            </button>
                                        </div>
                                        @foreach ($formEntries as $index => $entry)
                                            <div class="row">
                                                <!-- Les champs du formulaire pour chaque entrée -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Nom de L'ecole <span
                                                                class="text-danger">*</span></label>
                                                        <input class="form-control" type="text"
                                                            wire:model="formEntries.{{ $index }}.name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Cycle <span
                                                                class="text-danger">*</span></label>
                                                        <input class="form-control" type="text"
                                                            wire:model="formEntries.{{ $index }}.cycle">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Diplome <span
                                                                class="text-danger">*</span></label>
                                                        <input class="form-control" type="text"
                                                            wire:model="formEntries.{{ $index }}.diplome">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Annee Universitaire <span
                                                                class="text-danger">*</span></label>
                                                        <input class="form-control" type="text"
                                                            wire:model="formEntries.{{ $index }}.year">
                                                    </div>
                                                </div>
                                                <!-- ... Ajoutez les autres champs du formulaire de la même manière ... -->

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Piece Jointe <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="file"
                                                            wire:model="formEntries.{{ $index }}.piece_jointe">
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        wire:click="removeEntry({{ $index }})">Supprimer</button>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div> --}}
                            {{-- <div id="emp_experience" class="pro-overview tab-pane fade show">
                                <h1>Experience</h1>
                            </div> --}}
                        </div>
                        <button class="btn btn-primary" type="submit">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
