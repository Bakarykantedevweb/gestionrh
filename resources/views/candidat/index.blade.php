@extends('layouts.candidat')
@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="row">
        <div class="col-sm-12">
            <h3 class="page-title">Tableau de Bord</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('candidat/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item">Offres</li>
            </ul>
        </div>
    </div>
</div>
<!-- /Page Header -->
{{-- <div class="row">
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="card dash-widget">
            <div class="card-body">
                <span class="dash-widget-icon"><i class="fa fa-file-text-o"></i></span>
                <div class="dash-widget-info">
                    <h3>110</h3>
                    <span>Offered</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="card dash-widget">
            <div class="card-body">
                <span class="dash-widget-icon"><i class="fa fa-clipboard"></i></span>
                <div class="dash-widget-info">
                    <h3>40</h3>
                    <span>Applied</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="card dash-widget">
            <div class="card-body">
                <span class="dash-widget-icon"><i class="fa fa-retweet"></i></span>
                <div class="dash-widget-info">
                    <h3>374</h3>
                    <span>Visited</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="card dash-widget">
            <div class="card-body">
                <span class="dash-widget-icon"><i class="fa fa-floppy-o"></i></span>
                <div class="dash-widget-info">
                    <h3>220</h3>
                    <span>Saved</span>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="row">
    <div class="col-md-12">
        <div class="card card-table">
            <div class="card-header">
                <h3 class="card-title mb-0">Les Offres</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-nowrap custom-table mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Titre</th>
                                <th>Categorie</th>
                                <th>Type Contrat</th>
                                <th>Date Debut</th>
                                <th>Date Fin</th>
                                <th class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($postulers as $postuler)
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
                                    <td>{{ $postuler->offre->typeContrat->nom }}</td>
                                    <td>{{ $postuler->offre->date_publication }}</td>
                                    <td>{{ $postuler->offre->date_limite }}</td>
                                    <td class="text-center">
                                        @if($postuler->status == '0')
                                            <button class="btn btn-primary btn-sm">En Attente</button>
                                        @elseif($postuler->status == '1')
                                            <button class="btn btn-success btn-sm">Approuver</button>
                                        @elseif($postuler->status == '2')
                                            <button class="btn btn-danger btn-sm">Rejeter</button>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Pas d'Offres</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
