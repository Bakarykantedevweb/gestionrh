<div>
    @include('livewire.agent.profile.modal')
    <div class="content container-fluid">
        <div class="row">
            <div class="col-xl-12 col-sm-12 col-12">
                <div class="breadcrumb-path mt-4">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('agent-dashboard') }}"><img
                                    src="{{ asset('agent/assets/img/dash.png') }}" class="mr-2"
                                    alt="breadcrumb">Acceuil</a>
                        </li>
                        <li class="breadcrumb-item active"> Profile</li>
                    </ul>
                    <h3>Profile </h3>
                </div>
            </div>
            <div class="col-xl-12 col-sm-12 col-12 mt-4">
                <div class="head-link-set">
                    <ul>
                        <li>
                            <a class="{{ $detail ? ' active' : '' }}" href="#"
                                wire:click="activeContent('{{ encrypt('detail') }}')">
                                Detail
                            </a>
                        </li>
                        <li>
                            <a class="{{ $affectation ? ' active' : '' }}" href="#"
                                wire:click="activeContent('{{ encrypt('affectation') }}')">
                                Affectation
                            </a>
                        </li>
                        <li>
                            <a class="{{ $parametre ? ' active' : '' }}" href="#"
                                wire:click="activeContent('{{ encrypt('parametre') }}')">
                                Paramètres
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            @if ($detail)
                <div class="col-xl-12 col-sm-12 col-12 mt-4">
                    <div class="row">
                        <div class="col-xl-4 col-sm-12 col-12 d-flex">
                            <div class="card card-lists flex-fill">
                                <div class="card-header">
                                    <h2 class="card-titles">Information Personnelle</h2>
                                </div>
                                <div class="card-body">
                                    <div class="member-info">
                                        <ul>
                                            <li>
                                                <label>Matricule </label>
                                                <span>{{ $this->agent->matricule }}</span>
                                            </li>
                                            <li>
                                                <label>Prenom </label>
                                                <span>{{ $this->agent->prenom }}</span>
                                            </li>
                                            <li>
                                                <label>Nom </label>
                                                <span>{{ $this->agent->nom }}</span>
                                            </li>
                                            <li>
                                                <label>Date de naissannce </label>
                                                <span>{{ $this->agent->jour . '-' . $this->agent->mois . '-' . $this->agent->annee }}</span>
                                            </li>
                                            <li>
                                                <label>Sexe </label>
                                                <span><?= $this->agent->sexe == 'M' ? 'Homme' : 'Femme' ?></span>
                                            </li>
                                            <li>
                                                <label>Agence</label>
                                                <span>{{ $this->agent->agence->nom }}</span>
                                            </li>
                                            <li>
                                                <label>Departement</label>
                                                <span>{{ $this->agent->departement->code }}</span>
                                            </li>
                                            <li>
                                                <label>Poste</label>
                                                <span>{{ $this->agent->poste->nom }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-sm-12 col-12 d-flex">
                            <div class="card card-lists flex-fill">
                                <div class="card-header">
                                    <h2 class="card-titles">Contrat Information</h2>
                                </div>
                                <div class="card-body">
                                    <div class="member-info">
                                        <ul>
                                            <li>
                                                <label>Contrat No </label>
                                                <span>{{ $this->contrat->numero }}</span>
                                            </li>
                                            <li>
                                                <label>Type Contrat</label>
                                                <span>{{ $this->contrat->typeContrat->nom }}</span>
                                            </li>
                                            <li>
                                                <label>Date Creation </label>
                                                <span>{{ \Carbon\Carbon::parse($this->contrat->date_creation)->isoFormat('LL') }}</span>
                                            </li>
                                            <li>
                                                <label>Date Cloture </label>
                                                <span>
                                                    @if ($this->contrat->date_fin == '')
                                                        Indeterminée
                                                    @else
                                                        {{ \Carbon\Carbon::parse($this->contrat->date_fin)->isoFormat('LL') }}
                                                    @endif
                                                </span>
                                            </li>
                                            <li>
                                                <label>Situation Matrimoniale </label>
                                                <span>{{ $this->contrat->situation_matrimoniale }}</span>
                                            </li>
                                            <li>
                                                <label>Nombre Enfants </label>
                                                <span>{{ $this->contrat->nombre_enfant }}</span>
                                            </li>
                                            <li>
                                                <label>Feuille de Calcule </label>
                                                <span>{{ $this->contrat->feuilleCalcule->libelle }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-sm-12 col-12 d-flex">
                            <div class="card card-lists flex-fill">
                                <div class="card-header">
                                    <h2 class="card-titles">Information salaire</h2>
                                </div>
                                <div class="card-body">
                                    <div class="member-info">
                                        <ul>
                                            @php
                                                $montant = 0;
                                            @endphp
                                            @foreach ($contratRubriques as $contratRubrique)
                                                <li>
                                                    <label>{{ $contratRubrique->rubrique->libelle }} </label>
                                                    <span>{{ number_format($contratRubrique->montant) }}</span>
                                                </li>
                                                @php
                                                    $montant += $contratRubrique->montant;
                                                @endphp
                                            @endforeach
                                            <li>
                                                <label>Salaire de Base </label>
                                                <span>{{ number_format($this->contrat->salaire) }}</span>
                                            </li>
                                            <hr class="dropdown-divider">
                                            <li>
                                                <label>Salaire Brut </label>
                                                <span>{{ number_format($montant + $this->contrat->salaire) }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-sm-12 col-12 mt-4">
                    <div class="row">
                        <div class="col-xl-6 col-sm-12 col-12 d-flex">
                            <div class="card card-lists flex-fill">
                                <div class="card-header">
                                    <h2 class="card-titles">Education</h2>
                                    <a href="#" class="edit-icon"
                                    data-toggle="modal" data-target="#education_info"><i
                                        class="fa fa-plus"></i></a>
                                </div>
                                <div class="card-body">

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-sm-12 col-12 d-flex">
                            <div class="card card-lists flex-fill">
                                <div class="card-header">
                                    <h2 class="card-titles">Experience</h2>
                                    <a href="#" class="edit-icon"
                                    data-toggle="modal" data-target="#experience_info"><i
                                        class="fa fa-plus"></i></a>
                                </div>
                                <div class="card-body">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if ($affectation)
                <div class="col-xl-12 col-sm-12 col-12 mt-4">
                    <div class="row">
                        <div class="col-xl-12 col-sm-12 col-12">
                            <div class="card ">
                                <div class="card-header">
                                    <h2 class="card-titles">Listes des affectations</h2>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped custom-table mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Agence</th>
                                                    <th>Departement</th>
                                                    <th>Poste</th>
                                                    <th>Date prise de service</th>
                                                    <th>Date fin de service</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($affectations as $items)
                                                    <tr>
                                                        <td>{{ $items->agence->nom }}</td>
                                                        <td>{{ $items->departement->code }}</td>
                                                        <td>{{ $items->poste->nom }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($items->date_debut)->isoFormat('LL') }}
                                                        </td>
                                                        <td>
                                                            @if ($items->date_fin == '')
                                                                <span class="btn btn-success btn-sm">En cour</span>
                                                            @else
                                                                <span
                                                                    class="btn btn-danger btn-sm">{{ \Carbon\Carbon::parse($items->date_fin)->isoFormat('LL') }}</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="4" class="text-center">Pas d'Agences</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if ($parametre)
                <div class="col-xl-12 col-sm-12 col-12 mt-4">
                    <div class="row">
                        <div class="col-xl-6 col-sm-6 col-6 d-flex">
                            <div class="card flex-fill">
                                <div class="card-header">
                                    <h2 class="card-titles">Changement de votre mot de passe</h2>
                                </div>
                                <div class="card-body">
                                    <form wire:submit.prevent="UpdatePassword">
                                        <div class="form-group">
                                            <input type="password" class="form-control" wire:model="old_password"
                                                placeholder="Mot de passe courant">
                                            @error('old_password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" wire:model="new_password"
                                                placeholder="Nouveau mot de passe">
                                            @error('new_password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" wire:model="confirm_password"
                                                placeholder="Confirmez le mot de passe">
                                        </div>
                                        <div class="btn-set pl-0">
                                            <button type="submit" class="btn btn-apply">Mettre a jour</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
