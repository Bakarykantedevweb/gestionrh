<div>
    @include('livewire.admin.offre.modal')
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Gestion des Ofrres</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Tableau de Bord</a></li>
                    <li class="breadcrumb-item active">Gestion des Ofrres</li>
                </ul>
            </div>
            @if ($Offre)
                <div class="col-auto float-right ml-auto">
                    <a href="{{ url('admin/offres/create') }}" class="btn add-btn"><i class="fa fa-plus"></i>
                        Offres</a>
                </div>
            @endif
        </div>
    </div>
    <!-- /Page Header -->
    <div class="card">
        <div class="card-body">
            <!-- <h4 class="card-title">Solid justified</h4> -->
            <ul class="nav nav-tabs nav-tabs-solid nav-justified">
                <li class="nav-item"><a class="nav-link{{ $Offre ? ' active' : '' }}" href="#"
                        wire:click="activeContent('{{ encrypt('Offre') }}')">Offres</a></li>
                <li class="nav-item"><a class="nav-link{{ $Offrehistorique ? ' active' : '' }}" href="#"
                        wire:click="activeContent('{{ encrypt('Offrehistorique') }}')">Archives</a></li>

            </ul>
        </div>
    </div>
    @if ($Offre)
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Listes des offres</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table datatable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Titre</th>
                                        <th>Categorie</th>
                                        <th>Type Contrat</th>
                                        <th>Date Debut</th>
                                        <th>Date Fin</th>
                                        <th class="text-center">Nombre de Place</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($offres as $offre)
                                        <tr>
                                            <td>{{ $offre->id }}</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="" class="avatar"><img alt=""
                                                            src="{{ asset('uploads/admin/offre/' . $offre->image) }}"></a>
                                                    <a href="">{{ $offre->titre }} </a>
                                                </h2>
                                            </td>
                                            <td>{{ $offre->categorie->nom }}</td>
                                            <td>{{ $offre->typeContrat->nom }}</td>
                                            <td>{{ $offre->date_publication }}</td>
                                            <td>{{ $offre->date_limite }}</td>
                                            <td class="text-center">{{ $offre->nombre_place }}</td>
                                            <td class="text-right">
                                                <a href="{{ url('admin/offres/' . encrypt($offre->id) . '/edit') }}"
                                                    class="btn btn-primary btn-sm">
                                                    Modifier
                                                </a>
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
    @if ($Offrehistorique)
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Historiques</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table mb-0 datatable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Titre</th>
                                        <th>Categorie</th>
                                        <th>Type Contrat</th>
                                        <th>Date Debut</th>
                                        <th>Date Fin</th>
                                        <th class="text-center">Nombre de Place</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($OffrehistoriqueListe as $offre)
                                        <tr>
                                            <td>{{ $offre->id }}</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="" class="avatar"><img alt=""
                                                            src="{{ asset('uploads/admin/offre/' . $offre->image) }}"></a>
                                                    <a href="">{{ $offre->titre }} </a>
                                                </h2>
                                            </td>
                                            <td>{{ $offre->categorie->nom }}</td>
                                            <td>{{ $offre->typeContrat->nom }}</td>
                                            <td>{{ $offre->date_publication }}</td>
                                            <td>{{ $offre->date_limite }}</td>
                                            <td class="text-center">{{ $offre->nombre_place }}</td>
                                            <td class="text-right">
                                                <button wire:click="relancerOffre({{ $offre->id }})"
                                                    data-toggle="modal" data-target="#relancer"
                                                    class="btn btn-primary btn-sm" type="button">Relancer</button>
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
