<div>
    <div class="content container-fluid">
        <div class="row">
            <div class="col-xl-12 col-sm-12 col-12">
                <div class="breadcrumb-path mt-4">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('agent-dashboard') }}"><img src="assets/img/dash.png"
                                    class="mr-2" alt="breadcrumb" />Acceuil</a>
                        </li>
                        <li class="breadcrumb-item active"> Formations</li>
                    </ul>
                    <h3>Formations</h3>
                </div>
            </div>
            <div class="col-xl-12 col-sm-12 col-12 mt-4">
                <div class="head-link-set">
                    <ul>
                        <li>
                            <a class="{{ $FormationEnCour ? ' active' : '' }}" href="#"
                                wire:click="activeContent('{{ encrypt('FormationEnCour') }}')">
                                Formation en cours
                            </a>
                        </li>
                        <li>
                            <a class="{{ $FormationTerminee ? ' active' : '' }}" href="#"
                                wire:click="activeContent('{{ encrypt('FormationTerminee') }}')">
                                Formation Terminée
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            @if ($FormationEnCour)
                <div class="col-xl-12 col-sm-12 col-12 mt-4">
                    <div class="card">
                        <div class="table-heading">
                            <h2>Listes des Formations</h2>
                        </div>
                        <div class="table-responsive">
                            <table class="table custom-table">
                                <thead>
                                    <tr>
                                        <th>Formateur</th>
                                        <th>Type Formation</th>
                                        <th>Titre</th>
                                        <th>Duree</th>
                                        <th>Status</th>
                                        <th>Fichier</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($formations as $formation)
                                        <tr>
                                            <td>{{ $formation->formateur->prenom . ' ' . $formation->formateur->nom }}</td>
                                            <td>{{ $formation->type_formation->titre }}</td>
                                            <td>{{ $formation->titre }}</td>
                                            <td>{{ \Carbon\Carbon::parse($formation->date_debut)->isoFormat('LL') }} -
                                                {{ \Carbon\Carbon::parse($formation->date_fin)->isoFormat('LL') }}
                                            </td>
                                            <td>
                                                @if ($formation->status == 1)
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ asset('uploads/admin/formation/fichier/'.$formation->fichier) }}"><span class="badge badge-success">Fichier</span></a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">Pas de Formations disponible</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif
            @if ($FormationTerminee)
                <div class="col-xl-12 col-sm-12 col-12 mt-4">
                    <div class="card">
                        <div class="table-heading">
                            <h2>Historiques des Formations</h2>
                        </div>
                        <div class="table-responsive">
                            <table class="table custom-table">
                                <thead>
                                    <tr>
                                        <th>Formateur</th>
                                        <th>Type Formation</th>
                                        <th>Titre</th>
                                        <th>Duree</th>
                                        <th>Status</th>
                                        <th>Fichier</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($formationsTerminees as $formation)
                                        <tr>
                                            <td>{{ $formation->formateur->prenom . ' ' . $formation->formateur->nom }}</td>
                                            <td>{{ $formation->type_formation->titre }}</td>
                                            <td>{{ $formation->titre }}</td>
                                            <td>{{ \Carbon\Carbon::parse($formation->date_debut)->isoFormat('LL') }} -
                                                {{ \Carbon\Carbon::parse($formation->date_fin)->isoFormat('LL') }}
                                            </td>
                                            <td>
                                                @if ($formation->status == 1)
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ asset('uploads/admin/formation/fichier/'.$formation->fichier) }}"><span class="badge badge-success">Fichier</span></a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">Pas de Formations disponible</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
