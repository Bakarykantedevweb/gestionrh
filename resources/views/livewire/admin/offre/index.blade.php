<div>
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Gestion des Ofrres</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Tableau de Bord</a></li>
                    <li class="breadcrumb-item active">Gestion des Ofrres</li>
                </ul>
            </div>
            <div class="col-auto float-right ml-auto">
                <a href="{{ url('admin/offres/create') }}" class="btn add-btn"><i class="fa fa-plus"></i>
                    Offres</a>
            </div>
        </div>
    </div>
    <!-- /Page Header -->
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
                        @forelse ($offres as $offre)
                            <tr>
                                <td>{{ $offre->id }}</td>
                                <td>
                                    <h2 class="table-avatar">
                                    <a href="" class="avatar"><img alt="" src="{{ asset('uploads/admin/offre/'.$offre->image) }}"></a>
                                    <a href="">{{ $offre->titre }} </a>
                                    </h2>
                                </td>
                                <td>{{ $offre->categorie->nom }}</td>
                                <td>{{ $offre->typeContrat->nom }}</td>
                                <td>{{ $offre->date_publication }}</td>
                                <td>{{ $offre->date_limite }}</td>
                                <td class="text-center">{{ $offre->nombre_place }}</td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                                                class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="{{ url('admin/offres/'.encrypt($offre->id).'/edit') }}" class="dropdown-item"><i
                                                    class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <a href="#" class="dropdown-item" data-toggle="modal" data-target="#delete_job"><i
                                                    class="fa fa-trash-o m-r-5"></i> Delete</a>
                                        </div>
                                    </div>
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
