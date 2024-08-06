<div>
    <!-- Page Header -->
    @include('livewire.admin.agent.modal')
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Agents</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Agent</li>
                </ul>
            </div>
            @if ($agentListes)
                <div class="col-auto float-right ml-auto">
                    <a href="{{ route('agent.create') }}" class="btn add-btn"><i class="fa fa-plus"></i> Ajouter un
                        Agent</a>
                </div>
            @endif
            @if ($agentEdit)
                <div class="col-auto float-right ml-auto">
                    <a href="{{ route('agent.index') }}" class="btn add-btn"><i class="fa fa-list"></i> Retour</a>
                </div>
            @endif
        </div>
    </div>
    <!-- /Page Header -->
    @include('layouts.partials.message')
    @include('layouts.partials.error')
    @if ($agentListes)
        <!-- Search Filter -->
        {{-- <div class="row filter-row">
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
        </div> --}}
        <!-- Search Filter -->
        <div class="row staff-grid-row">
            @foreach ($agents as $items)
                @php
                    $isContratTermine = $items->contrats->where('date_fin', '<', now())->count() > 0;
                @endphp
                <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                    <div class="profile-widget {{ $isContratTermine ? 'bg-danger' : '' }}">
                        <div class="profile-img">
                            <a href="{{ url('admin/agents/' . $items->matricule . '/detail') }}" class="avatar">
                                @if ($items->photo)
                                    <img src="{{ asset('uploads/admin/agent/' . $items->photo) }}" alt="">
                                @else
                                    <img src="{{ asset('admin/assets/img/téléchargement.png') }}" alt="">
                                @endif
                            </a>
                        </div>
                        <div class="dropdown profile-action">
                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                aria-expanded="false"><i class="material-icons">more_vert</i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <button type="button" class="dropdown-item"
                                    wire:click="editAgent({{ $items->id }})"><i class="fa fa-pencil m-r-5"></i>
                                    Modifier</button>
                                @if ($items->blocked == 1)
                                    <a class="dropdown-item" wire:click="activer({{ $items->id }})" href="#"><i
                                            class="fa fa-unlock m-r-5"></i> Activer</a>
                                @endif
                            </div>
                        </div>
                        <h4 class="user-name m-t-10 mb-0 text-ellipsis">
                            {{ $items->prenom . ' ' . $items->nom }}
                        </h4>
                        <h5 class="user-name m-t-10 mb-0 text-ellipsis"><a
                                href="">{{ $items->departement->code }}</a></h5>
                        <div class="small text-muted">{{ $items->matricule }}</div>
                        <a href="{{ url('admin/agents/' . $items->matricule . '/contrat') }}" target="_blank"
                            class="btn btn-white btn-sm m-t-10">Contrat
                        </a>
                        <a href="{{ url('admin/agents/' . $items->matricule . '/detail') }}"
                            class="btn btn-white btn-sm m-t-10">Voir Profile
                        </a>
                    </div>
                </div>
            @endforeach
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
                                                    {{ $this->poste_id ? 'selected' : '' }}>
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
                                        @if ($showInputsCQ)
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Date Fin du CQ<span
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
                                                        <td><input type="number" class="form-control"
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
