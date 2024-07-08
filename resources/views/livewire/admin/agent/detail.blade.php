<div>
    @include('livewire.admin.agent.modal')
    <!-- Page Header -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Profile</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ul>
            </div>
            <div class="col-auto float-right ml-auto">
                <a href="{{ route('agent.index') }}" class="btn add-btn"><i class="fa fa-list"></i> Retour</a>
            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <div class="card mb-0">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="profile-view">
                        <div class="profile-img-wrap">
                            <div class="profile-img">
                                <a href="#"><img alt=""
                                        src="{{ asset('uploads/admin/agent/' . $this->agent->photo) }}"></a>
                            </div>
                        </div>
                        <div class="profile-basic">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="profile-info-left">
                                        <h3 class="user-name m-t-0 mb-0">
                                            {{ $this->agent->prenom . ' ' . $this->agent->nom }}</h3>
                                        <h6 class="text-muted">{{ $this->agent->departement->code }} -
                                            {{ $this->agent->departement->nom }}</h6>
                                        <small class="text-muted">{{ $this->agent->poste->nom }}</small>
                                        <div class="staff-id">Matricule : {{ $this->agent->matricule }}</div>
                                        {{-- <div class="small doj text-muted">Date of Join : 1st Jan 2013</div> --}}
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <ul class="personal-info">
                                        <li>
                                            <div class="title">Telephone:</div>
                                            <div class="text"><a href="">+223
                                                    {{ $this->agent->telephone }}</a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="title">Email:</div>
                                            <div class="text"><a href="">{{ $this->agent->email }}</a></div>
                                        </li>
                                        <li>
                                            <div class="title">Date:</div>
                                            <div class="text">
                                                {{ $this->agent->jour . ' ' . $this->agent->mois . ' ' . $this->agent->annee }}
                                            </div>
                                        </li>
                                        <li>
                                            <div class="title">Age:</div>
                                            <div class="text">{{ $this->agent->age }} ans</div>
                                        </li>
                                        <li>
                                            <div class="title">Genre:</div>
                                            <div class="text">
                                                @if ($this->agent->sexe == 'M')
                                                    Homme
                                                @else
                                                    Femme
                                                @endif
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="pro-edit"><a data-target="#profile_info" data-toggle="modal" class="edit-icon"
                                href="#"><i class="fa fa-pencil"></i></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card tab-box">
        <div class="row user-tabs">
            <div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
                <ul class="nav nav-tabs nav-tabs-bottom">
                    <li class="nav-item"><a href="#emp_profile" data-toggle="tab" class="nav-link active">Profile</a>
                    </li>
                    <li class="nav-item"><a href="#emp_projects" data-toggle="tab" class="nav-link">Historiques</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="tab-content">

        <!-- Profile Info Tab -->
        <div id="emp_profile" class="pro-overview tab-pane fade show active">
            <div class="row">
                <div class="col-md-6 d-flex">
                    <div class="card profile-box flex-fill">
                        <div class="card-body">
                            <h3 class="card-title">Contrat Information <a href="#" class="edit-icon"
                                    data-toggle="modal" data-target="#personal_info_modal"><i
                                        class="fa fa-pencil"></i></a></h3>
                            <ul class="personal-info">
                                <li>
                                    <div class="title">Contrat No.</div>
                                    <div class="text">{{ $this->contrat->numero }}</div>
                                </li>
                                <li>
                                    <div class="title">Type de Contrat.</div>
                                    <div class="text">{{ $this->contrat->typeContrat->nom }}</div>
                                </li>
                                <li>
                                    <div class="title">Date Creation</div>
                                    <div class="text">
                                        {{ \Carbon\Carbon::parse($this->contrat->date_creation)->isoFormat('LL') }}
                                    </div>
                                </li>
                                <li>
                                    <div class="title">Date de cloture</div>
                                    <div class="text">
                                        @if ($this->contrat->date_fin == '')
                                            Indeterminée
                                        @else
                                            {{ \Carbon\Carbon::parse($this->contrat->date_fin)->isoFormat('LL') }}
                                        @endif
                                    </div>
                                </li>
                                <li>
                                    <div class="title">Situation Matrimoniale</div>
                                    <div class="text">{{ $this->contrat->situation_matrimoniale }}</div>
                                </li>
                                <li>
                                    <div class="title">Nombre enfanfs</div>
                                    <div class="text">{{ $this->contrat->nombre_enfant }}</div>
                                </li>
                                <li>
                                    <div class="title">Feuille de Calcule</div>
                                    <div class="text">{{ $this->contrat->feuilleCalcule->libelle }}</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 d-flex">
                    <div class="card profile-box flex-fill">
                        <div class="card-body">
                            <h3 class="card-title">Salaire Information <a href="#" class="edit-icon"
                                    data-toggle="modal" data-target="#personal_info_modal"><i
                                        class="fa fa-pencil"></i></a></h3>
                            <ul class="personal-info">
                                @php
                                    $montant = 0;
                                @endphp
                                @foreach ($contratRubriques as $contratRubrique)
                                    <li>
                                        <div class="title">{{ $contratRubrique->rubrique->libelle }}.</div>
                                        <div class="text">{{ number_format($contratRubrique->montant) }}</div>
                                    </li>
                                    @php
                                        $montant += $contratRubrique->montant;
                                    @endphp
                                @endforeach
                                <li>
                                    <div class="title">Salaire de Base</div>
                                    <div class="text">{{ number_format($this->contrat->salaire) }}</div>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <div class="title">Salaire Brut.</div>
                                    <div class="text">{{ number_format($montant + $this->contrat->salaire) }}</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 d-flex">
                    <div class="card profile-box flex-fill">
                        <div class="card-body">
                            <h3 class="card-title">Education Informations <a href="#" class="edit-icon"
                                    data-toggle="modal" data-target="#education_info"><i
                                        class="fa fa-plus"></i></a></h3>
                            <div class="experience-box">
                                <ul class="experience-list">
                                    <li>
                                        <div class="experience-user">
                                            <div class="before-circle"></div>
                                        </div>
                                        <div class="experience-content">
                                            <div class="timeline-content">
                                                <a href="#/" class="name">International College of Arts and
                                                    Science (UG)</a>
                                                <div>Bsc Computer Science</div>
                                                <span class="time">2000 - 2003</span>
                                            </div>
                                        </div>
                                    </li>
                                    {{-- <li>
                                        <div class="experience-user">
                                            <div class="before-circle"></div>
                                        </div>
                                        <div class="experience-content">
                                            <div class="timeline-content">
                                                <a href="#/" class="name">International College of Arts and
                                                    Science (PG)</a>
                                                <div>Msc Computer Science</div>
                                                <span class="time">2000 - 2003</span>
                                            </div>
                                        </div>
                                    </li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 d-flex">
                    <div class="card profile-box flex-fill">
                        <div class="card-body">
                            <h3 class="card-title">Experience <a href="#" class="edit-icon"
                                    data-toggle="modal" data-target="#experience_info"><i
                                        class="fa fa-plus"></i></a></h3>
                            <div class="experience-box">
                                <ul class="experience-list">
                                    <li>
                                        <div class="experience-user">
                                            <div class="before-circle"></div>
                                        </div>
                                        <div class="experience-content">
                                            <div class="timeline-content">
                                                <a href="#/" class="name">Web Designer at Zen Corporation</a>
                                                <span class="time">Jan 2013 - Present (5 years 2 months)</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Profile Info Tab -->

        <!-- Projects Tab -->
        <div class="tab-pane fade" id="emp_projects">
            <div class="card">
                <div class="card-header">
                    <h4 class="texte-center">
                        Historques des affectations {{ $this->agent->prenom }} {{ $this->agent->nom }}
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div>
                                <table class="table table-striped custom-table mb-0 datatable">
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
                                                <td>{{ $items->departement->nom }}</td>
                                                <td>{{ $items->poste->nom }}</td>
                                                <td>{{ \Carbon\Carbon::parse($items->date_debut)->isoFormat('LL') }}
                                                </td>
                                                <td>
                                                    @if ($items->date_fin == '')
                                                        <span class="badge bg-inverse-success">En cour</span>
                                                    @else
                                                        <span
                                                            class="badge bg-inverse-danger">{{ \Carbon\Carbon::parse($items->date_fin)->isoFormat('LL') }}</span>
                                                    @endif
                                                </td>
                                                {{-- <td class="text-right">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle"
                                                            data-toggle="dropdown" aria-expanded="false"><i
                                                                class="material-icons">more_vert</i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            @if ($items->date_fin == '')
                                                                <a wire:click="MettreFin({{ $items->id }})"
                                                                    class="dropdown-item" href="#"
                                                                    data-toggle="modal" data-target="#mettre_fin"><i
                                                                        class="fa fa-close m-r-5"></i>
                                                                    Mettre fin</a>
                                                            @elseif($items->date_fin != '' and $items->status == 1)
                                                                <a wire:click="AddAffectation({{ $items->agent_id }},{{ $items->id }})"
                                                                    class="dropdown-item" href="#"
                                                                    data-toggle="modal"
                                                                    data-target="#add_affectation"><i
                                                                        class="fa fa-plus m-r-5"></i>
                                                                    Nouveau</a>
                                                            @elseif(!$items->date_fin != '' and $items->status == 2)

                                                            @endif
                                                        </div>
                                                    </div>
                                                </td> --}}
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
        <!-- /Projects Tab -->

    </div>
</div>
