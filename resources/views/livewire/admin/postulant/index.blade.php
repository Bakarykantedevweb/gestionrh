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
        </div>
    </div>
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
        Valider les emargements
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
                                        <th>#</th>
                                        <th>Titre</th>
                                        <th>Categorie</th>
                                        <th>Prenom & Nom</th>
                                        <th>CV</th>
                                        <th>Lettre</th>
                                        <th class="text-center">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($postulersEnAttente as $postuler)
                                    <tr>
                                        <td><input wire:model="selectedItems.{{ $postuler->id }}" class="checkItem" type="checkbox"></td>
                                        <td>{{ $postuler->id }}</td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="" class="avatar"><img alt=""
                                                        src="{{ asset('uploads/admin/offre/'.$postuler->offre->image) }}"></a>
                                                <a href="">{{ $postuler->offre->titre }} </a>
                                            </h2>
                                        </td>
                                        <td>{{ $postuler->offre->categorie->nom }}</td>
                                        <td>{{ $postuler->candidat->prenom.' '.$postuler->candidat->nom }}</td>
                                        <td><a href="{{ url('uploads/frontend/candidat/cv/'.$postuler->candidat->cv) }}" target="_blank" class="btn btn-info btn-sm">Voir CV</a></td>
                                        <td><a href="{{ url('uploads/frontend/candidat/lettre/'.$postuler->candidat->lettre) }}" target="_blank" class="btn btn-success btn-sm">Voir Lettre</a></td>
                                        <td class="text-center">
                                            @if($postuler->status == '0')
                                            <button class="btn btn-primary btn-sm">En Attente</button>
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
                                        <th>#</th>
                                        <th>Titre</th>
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
                                        <td>{{ $postuler->id }}</td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="" class="avatar"><img alt=""
                                                        src="{{ asset('uploads/admin/offre/'.$postuler->offre->image) }}"></a>
                                                <a href="">{{ $postuler->offre->titre }} </a>
                                            </h2>
                                        </td>
                                        <td>{{ $postuler->offre->categorie->nom }}</td>
                                        <td>{{ $postuler->candidat->prenom.' '.$postuler->candidat->nom }}</td>
                                        <td><a href="{{ url('uploads/frontend/candidat/cv/'.$postuler->candidat->cv) }}"
                                                target="_blank" class="btn btn-info btn-sm">Voir CV</a></td>
                                        <td><a href="{{ url('uploads/frontend/candidat/lettre/'.$postuler->candidat->lettre) }}"
                                                target="_blank" class="btn btn-success btn-sm">Voir Lettre</a></td>
                                        <td class="text-center">
                                            @if($postuler->status == '1')
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
                                        <th>#</th>
                                        <th>Titre</th>
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
                                        <td>{{ $postuler->id }}</td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="" class="avatar"><img alt=""
                                                        src="{{ asset('uploads/admin/offre/'.$postuler->offre->image) }}"></a>
                                                <a href="">{{ $postuler->offre->titre }} </a>
                                            </h2>
                                        </td>
                                        <td>{{ $postuler->offre->categorie->nom }}</td>
                                        <td>{{ $postuler->candidat->prenom.' '.$postuler->candidat->nom }}</td>
                                        <td><a href="{{ url('uploads/frontend/candidat/cv/'.$postuler->candidat->cv) }}"
                                                target="_blank" class="btn btn-info btn-sm">Voir CV</a></td>
                                        <td><a href="{{ url('uploads/frontend/candidat/lettre/'.$postuler->candidat->lettre) }}"
                                                target="_blank" class="btn btn-success btn-sm">Voir Lettre</a></td>
                                        <td class="text-center">
                                            @if($postuler->status == '2')
                                            <button class="btn btn-primary btn-sm">Rejeté</button>
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
</div>
