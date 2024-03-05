<div>
    <!-- Page Header -->
    @include('livewire.admin.agent.modal')
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Agents</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                    <li class="breadcrumb-item active">Agent</li>
                </ul>
            </div>
            @if ($agentListes)
                <div class="col-auto float-right ml-auto">
                    <a href="{{ route('agent.create') }}" class="btn add-btn"><i class="fa fa-plus"></i> Ajouter un
                        Agent</a>
                    <div class="view-icons">
                        <a href="" class="grid-view btn btn-link active"><i class="fa fa-th"></i></a>
                    </div>
                </div>
            @endif
            @if ($agentEdit)
                <div class="col-auto float-right ml-auto">
                    <a href="{{ route('agent.index') }}" class="btn add-btn"><i class="fa fa-list"></i> Retour</a>
                    <div class="view-icons">
                        <a href="" class="grid-view btn btn-link active"><i class="fa fa-th"></i></a>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <!-- /Page Header -->
    @include('layouts.partials.message')
    @include('layouts.partials.error')
    @if ($agentListes)
        <!-- Search Filter -->
        <div class="row filter-row">
            <div class="col-sm-6 col-md-3">
                <div class="form-group form-focus">
                    <input type="text" class="form-control floating">
                    <label class="focus-label">Employee ID</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="form-group form-focus">
                    <input type="text" class="form-control floating">
                    <label class="focus-label">Employee Name</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="form-group form-focus select-focus">
                    <select class="form-control">
                        <option>Select Designation</option>
                        <option>Web Developer</option>
                        <option>Web Designer</option>
                        <option>Android Developer</option>
                        <option>Ios Developer</option>
                    </select>
                    <label class="focus-label">Designation</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="form-group form-focus select-focus">
                    <select class="form-control">
                        <option>Select Designation</option>
                        <option>Web Developer</option>
                        <option>Web Designer</option>
                        <option>Android Developer</option>
                        <option>Ios Developer</option>
                    </select>
                    <label class="focus-label">Designation</label>
                </div>
            </div>
        </div>
        <!-- Search Filter -->
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table datatable">
                        <thead>
                            <tr>
                                <th>Nom complet</th>
                                <th>Matricule</th>
                                <th>Email</th>
                                <th>Telephone</th>
                                <th class="text-nowrap">Date de naissance</th>
                                <th>Age</th>
                                <th class="text-right no-sort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($agents as $items)
                                <tr @if ($items->blocked == 1) class="table-danger" @endif>
                                    <td>
                                        <h2 class="table-avatar">
                                            @if ($items->photo)
                                                <a href="" class="avatar"><img
                                                        src="{{ asset('uploads/admin/agent/' . $items->photo) }}"
                                                        alt=""></a>
                                            @else
                                                <a href=""><img
                                                        src="{{ asset('admin/assets/img/téléchargement.png') }}"
                                                        alt=""></a>
                                            @endif
                                            <a href="">{{ $items->prenom . ' ' . $items->nom }}
                                                <span>{{ $items->departement->code }}</span></a>
                                        </h2>
                                    </td>
                                    <td>{{ $items->matricule }}</td>
                                    <td>{{ $items->email }}</td>
                                    <td>+223 {{ $items->telephone }}</td>
                                    <td>{{ $items->jour . '-' . $items->mois . '-' . $items->annee }}</td>
                                    <td>{{ $items->age }}</td>
                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                                aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <button type="button" class="dropdown-item"
                                                    wire:click="editAgent({{ $items->id }})"><i
                                                        class="fa fa-pencil m-r-5"></i>
                                                    Modifier</button>
                                                <a href="{{ url('admin/agents/'.$items->matricule.'/detail') }}" class="dropdown-item"><i class="fa fa-history m-r-5"></i>
                                                    Historique</a>
                                                @if ($items->blocked == 1)
                                                    <a class="dropdown-item" wire:click="activer({{ $items->id }})"
                                                        href="#" data-toggle="modal" data-target=""><i
                                                            class="fa fa-unlock m-r-5"></i>
                                                        Activer</a>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Pas d'agents pour le moment</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
    @if ($agentEdit)
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Modification d'un agent</h4>
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent="UpdateEmploye">
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
                                                <?php for ($i = 1900; $i <= date('Y'); $i++) : ?>
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
                                        <label class="col-form-label">Telephone <span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" wire:model="telephone" type="text">
                                        @error('telephone')
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
                                                    {{ $dep->nom . '(' . $dep->code . ')' }}
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
                                            @foreach ($postes as $pos)
                                                <option value="{{ $pos->id }}"
                                                    {{ $this->departement_id ? 'selected' : '' }}>
                                                    {{ $pos->nom }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('poste_id')
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
                                                        <option value="{{ $typeContrat->id }}">
                                                            {{ $typeContrat->nom }}</option>
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
                                                        {{ $diplome->nom }}-{{ $diplome->classification->nom }}
                                                    </option>
                                                @endforeach
                                            </select>
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
                                                        <option value="{{ $option }}">{{ $option }}
                                                        </option>
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
                                                    <input type="date" wire:model="date_mariage"
                                                        class="form-control">
                                                </div>
                                            @endif
                                            @if ($selectedOption == 'Veuf')
                                                <div class="form-group">
                                                    <label for="">Date Veuve</label>
                                                    <input type="date" wire:model="date_veuve"
                                                        class="form-control">
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
                                                    <input type="number" wire:model="nombre_enfant" min="0"
                                                        max="4" class="form-control">
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            @if ($selectedOption == 'Célibataire')
                                                <div class="form-group">
                                                    <label for="">Nombres d'enfants</label>
                                                    <input type="number" min="0" max="4"
                                                        wire:model="nombre_enfant" class="form-control">
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
                                                        max="4" class="form-control">
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
                                                        <option value="0" selected>pas de Feuille de Calcule
                                                        </option>
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
                                                        <td><input type="number" class=""
                                                                wire:model="montant.{{ $rubrique->id }}" /></td>
                                                    @endforeach
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Mettre a Jour</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
