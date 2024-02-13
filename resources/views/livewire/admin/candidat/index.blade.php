<div>
    <!-- Page Header -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Candidats</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Offres</li>
                    <li class="breadcrumb-item active">Candidats</li>
                </ul>
            </div>
            {{-- <div class="col-auto float-right ml-auto">
                <a href="#" data-toggle="modal" data-target="#add_employee" class="btn add-btn"> Add Candidates</a>
            </div> --}}
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
                            <th>Nom & Prenom</th>
                            <th>Telephone</th>
                            <th>Email</th>
                            {{-- <th class="text-center">Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($candidats as $candidat)
                        <tr>
                            <td>{{ $candidat->id }}</td>
                            <td>
                                <h2 class="table-avatar">
                                    <a href="profile.html" class="avatar"><img alt=""
                                            src="assets/img/profiles/avatar-02.jpg"></a>
                                    <a href="">{{ $candidat->prenom.' '.$candidat->nom }}</a>
                                </h2>
                            </td>
                            <td>{{ $candidat->telephone }}</td>
                            <td>{{ $candidat->email }}</td>
                            {{-- <td class="text-center">
                                <button type="button" class="btn btn-primary btn-sm">Supprimer</button>
                            </td> --}}
                        </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Pas de Candidats</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
