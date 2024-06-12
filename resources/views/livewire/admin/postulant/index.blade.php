<div>
    @include('livewire.admin.postulant.modal')
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Listes des Postulants</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Tableau de Bord</a></li>
                    <li class="breadcrumb-item active">Gestion des Ofrres</li>
                </ul>
            </div>
            @if ($detail)
                <div class="col-auto float-right ml-auto">
                    <a href="#" wire:click='annuler' class="btn add-btn"><i class="fa fa-list"></i>
                        Retour</a>
                </div>
            @endif
        </div>
    </div>
    @if (!$detail)
        <div class="card">
            <div class="card-body">
                <!-- <h4 class="card-title">Solid justified</h4> -->
                <ul class="nav nav-tabs nav-tabs-solid nav-justified">
                    <li class="nav-item"><a class="nav-link{{ $OffreEnAttente ? ' active' : '' }}" href="#"
                            wire:click="activeContent('{{ encrypt('OffreEnAttente') }}')">Offre en attente</a></li>
                    <li class="nav-item"><a class="nav-link{{ $OffreAccepte ? ' active' : '' }}" href="#"
                            wire:click="activeContent('{{ encrypt('OffreAccepte') }}')">Offre Acceptée</a></li>
                    <li class="nav-item"><a class="nav-link{{ $OffreRejete ? ' active' : '' }}" href="#"
                            wire:click="activeContent('{{ encrypt('OffreRejete') }}')">Offre Rejetée </a></li>
                </ul>
            </div>
        </div>
        @if ($OffreEnAttente)
            <button data-toggle="modal" data-target="#emargement" type="button" class="btn btn-primary mb-3"
                wire:click="traiterElementsCoches">
                Valider les offres
            </button>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-table">
                        <div class="card-header">
                            <h3 class="card-title mb-0">Les Offres en Attente</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-nowrap custom-table mb-0">
                                    <thead>
                                        <tr>
                                            <th>Select</th>
                                            <th>Offre</th>
                                            <th>Categorie</th>
                                            <th>Prenom & Nom</th>
                                            <th>E-mail</th>
                                            <th>CV</th>
                                            <th>Lettre</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($postulersEnAttente as $postuler)
                                            <tr>
                                                <td><input wire:model="selectedItems.{{ $postuler->id }}"
                                                        class="checkItem" type="checkbox"></td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="" class="avatar"><img alt=""
                                                                src="{{ asset('uploads/admin/offre/' . $postuler->offre->image) }}"></a>
                                                        <a href="#"
                                                            wire:click="detailOffre({{ $postuler->offre->id }})">{{ $postuler->offre->titre }}
                                                        </a>
                                                    </h2>
                                                </td>
                                                <td>{{ $postuler->offre->categorie->nom }}</td>
                                                <td>{{ $postuler->candidat->prenom . ' ' . $postuler->candidat->nom }}</td>
                                                <td>{{ $postuler->candidat->email }}</td>
                                                <td><a href="{{ url('uploads/frontend/candidat/cv/' . $postuler->candidat->cv) }}"
                                                        target="_blank" class="btn btn-info btn-sm">Voir CV</a></td>
                                                <td><a href="{{ url('uploads/frontend/candidat/lettre/' . $postuler->candidat->lettre) }}"
                                                        target="_blank" class="btn btn-success btn-sm">Voir Lettre</a>
                                                </td>
                                                <td class="text-center">
                                                    @if ($postuler->status == '0')
                                                        <button class="btn btn-danger btn-sm">En Attente</button>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8" class="text-center">Pas d'Offres</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if ($OffreAccepte)
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-table">
                        <div class="card-header">
                            <h3 class="card-title mb-0">Les Offres Acceptées</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-nowrap custom-table mb-0">
                                    <thead>
                                        <tr>

                                            <th>Offre</th>
                                            <th>Categorie</th>
                                            <th>Prenom & Nom</th>
                                            <th>CV</th>
                                            <th>Lettre</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($postulersAccepte as $postuler)
                                            <tr>

                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="" class="avatar"><img alt=""
                                                                src="{{ asset('uploads/admin/offre/' . $postuler->offre->image) }}"></a>
                                                        <a href="">{{ $postuler->offre->titre }} </a>
                                                    </h2>
                                                </td>
                                                <td>{{ $postuler->offre->categorie->nom }}</td>
                                                <td>{{ $postuler->candidat->prenom . ' ' . $postuler->candidat->nom }}</td>
                                                <td><a href="{{ url('uploads/frontend/candidat/cv/' . $postuler->candidat->cv) }}"
                                                        target="_blank" class="btn btn-info btn-sm">Voir CV</a></td>
                                                <td><a href="{{ url('uploads/frontend/candidat/lettre/' . $postuler->candidat->lettre) }}"
                                                        target="_blank" class="btn btn-success btn-sm">Voir Lettre</a>
                                                </td>
                                                <td class="text-center">
                                                    @if ($postuler->status == '1')
                                                        <button class="btn btn-success btn-sm">Acceptée</button>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8" class="text-center">Pas d'Offres</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if ($OffreRejete)
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-table">
                        <div class="card-header">
                            <h3 class="card-title mb-0">Les Offres Rejetée</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-nowrap custom-table mb-0">
                                    <thead>
                                        <tr>

                                            <th>Offre</th>
                                            <th>Categorie</th>
                                            <th>Prenom & Nom</th>
                                            <th>CV</th>
                                            <th>Lettre</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($postulersRejete as $postuler)
                                            <tr>

                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="" class="avatar"><img alt=""
                                                                src="{{ asset('uploads/admin/offre/' . $postuler->offre->image) }}"></a>
                                                        <a href="">{{ $postuler->offre->titre }} </a>
                                                    </h2>
                                                </td>
                                                <td>{{ $postuler->offre->categorie->nom }}</td>
                                                <td>{{ $postuler->candidat->prenom . ' ' . $postuler->candidat->nom }}</td>
                                                <td><a href="{{ url('uploads/frontend/candidat/cv/' . $postuler->candidat->cv) }}"
                                                        target="_blank" class="btn btn-info btn-sm">Voir CV</a></td>
                                                <td><a href="{{ url('uploads/frontend/candidat/lettre/' . $postuler->candidat->lettre) }}"
                                                        target="_blank" class="btn btn-success btn-sm">Voir Lettre</a>
                                                </td>
                                                <td class="text-center">
                                                    @if ($postuler->status == '2')
                                                        <button class="btn btn-danger btn-sm">Rejeté</button>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8" class="text-center">Pas d'Offres</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @else
        <div class="row">
            <div class="col-md-8">
                <div class="job-info job-widget">
                    <h3 class="job-title">{{ $offre->titre }}</h3>
                    <span class="job-dept">{{ $offre->categorie->nom }}</span>
                    <ul class="job-post-det">
                        <li><i class="fa fa-calendar"></i> Date publication: <span class="text-blue">{{ \Carbon\Carbon::parse($offre->date_publication)->isoFormat('LL') }}</span></li>
                        <li><i class="fa fa-calendar"></i> Date Limite: <span class="text-blue">{{ \Carbon\Carbon::parse($offre->date_limite)->isoFormat('LL') }}</span></li>
                        <li><i class="fa fa-user-o"></i> Nombre de place: <span class="text-blue">{{ $offre->nombre_place }}</span></li>
                        {{-- <li><i class="fa fa-eye"></i> Views: <span class="text-blue">3806</span></li> --}}
                    </ul>
                </div>
                <div class="job-content job-widget">
                    <div class="job-description">
                        <p>{!! $offre->description !!}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="job-det-info job-widget">
                    {{-- <a class="btn job-btn" href="#" data-toggle="modal" data-target="#edit_job">Edit</a> --}}
                    <div class="info-list">
                        <span><i class="fa fa-bar-chart"></i></span>
                        <h5>Categorie</h5>
                        <p>{{ $offre->categorie->nom }}</p>
                    </div>
                    <div class="info-list">
                        <span><i class="fa fa-money"></i></span>
                        <h5>Salaire</h5>
                        <p>{{ $offre->salaire->salaire_debut }} - {{ $offre->salaire->salaire_fin }}</p>
                    </div>
                    <div class="info-list">
                        <span><i class="fa fa-suitcase"></i></span>
                        <h5>Experience</h5>
                        <p>{{ $offre->experience->nom }}</p>
                    </div>
                    {{-- <div class="info-list">
                        <span><i class="fa fa-ticket"></i></span>
                        <h5>Vacancy</h5>
                        <p>5</p>
                    </div> --}}
                    <div class="info-list">
                        <span><i class="fa fa-map-signs"></i></span>
                        <h5>Adresse</h5>
                        <p> Banque Internationale pour le Mali
                            <br> Boulevard de l'independence,
                            <br> Bamako, Mali,
                            <br>
                        </p>
                    </div>
                    <div class="info-list">
                        <p class="text-truncate"> +223 70-06-07-62
                            <br> <a href="mailto:kantebakary742@gmail.com"
                                title="kantebakary742@gmail.com">kantebakary742@gmail.com</a>
                        </p>
                    </div>
                    {{-- <div class="info-list text-center">
                        <a class="app-ends" href="#">Application ends in 2d 7h 6m</a>
                    </div> --}}
                </div>
            </div>
        </div>
    @endif
</div>
