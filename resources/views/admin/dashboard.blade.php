@extends('layouts.admin')
@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Bienvenue {{ Auth::user()->name }}</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active">Tableau de Bord</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->
    <div class="row">
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="card-body">
                    <span class="dash-widget-icon"><i class="fa fa-users"></i></span>
                    <div class="dash-widget-info">
                        <h3>{{ $users }}</h3>
                        <span>Administrateurs</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="card-body">
                    <span class="dash-widget-icon"><i class="fa fa-money"></i></span>
                    <div class="dash-widget-info">
                        <h3>{{ $contrats }}</h3>
                        <span>Contrats</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="card-body">
                    <span class="dash-widget-icon"><i class="fa fa-diamond"></i></span>
                    <div class="dash-widget-info">
                        <h3>{{ $departements }}</h3>
                        <span>Departements</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="card-body">
                    <span class="dash-widget-icon"><i class="fa fa-user"></i></span>
                    <div class="dash-widget-info">
                        <h3>{{ $agents }}</h3>
                        <span>Agents</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-8 text-center">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Agents</h3>
                            <div id="bar-charts"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <select class="form-control">
                                        <option value="">Veuillez choissir une agence</option>
                                        <option value="">Bolibana</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <select class="form-control">
                                        <option value="">Veuillez choissir un departement</option>
                                        <option value="">Bolibana</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <select class="form-control">
                                        <option value="">Veuillez choissir le sexe</option>
                                        <option value="M">Homme</option>
                                        <option value="F">Femme</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
