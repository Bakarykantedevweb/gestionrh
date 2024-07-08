@extends('layouts.agent')
@section('content')
    {{-- <div class="content container-fluid">
        <div class="page-name 	mb-4">
            <h4 class="m-0"><img src="{{ asset('uploads/admin/agent/' . Auth::guard('webagent')->user()->photo) }}" class="mr-1" alt="profile" />
                Bienvenue {{ Auth::guard('webagent')->user()->prenom . ' - ' . Auth::guard('webagent')->user()->nom }}</h4>
            <label>
                @php
                    use Carbon\Carbon;

                    // Définir la locale en français pour les dates
                    Carbon::setLocale('fr');

                    // Obtenir la date actuelle et la formater en "jour mois année" en français
                    $date = ucfirst(Carbon::now()->isoFormat('dddd, D MMMM YYYY', 'Do MMMM YYYY'));

                    echo $date; // Affiche la date formatée avec la première lettre en majuscule

                @endphp
            </label>
        </div>
        <div class="row mb-4">
            <div class="col-xl-6 col-sm-12 col-12">
                <div class="breadcrumb-path ">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('agent-dashboard') }}"><img src="{{ asset('agent/assets/img/dash.png') }}"
                                    class="mr-3" alt="breadcrumb" />Acceuil</a>
                        </li>
                        <li class="breadcrumb-item active">Tableau de Bord</li>
                    </ul>
                    <h3>Tableau de Bord</h3>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card board1 fill1 ">
                    <div class="card-body">
                        <div class="card_widget_header">
                            <label>Solde Congé</label>
                            <h4>{{ Auth::guard('webagent')->user()->contrat->nombre_jour_conge }}</h4>
                        </div>
                        <div class="card_widget_img">
                            <img src="{{ asset('agent/assets/img/dash1.png') }}" alt="card-img" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card board1 fill4 ">
                    <div class="card-body">
                        <div class="card_widget_header">
                            <label>Salaire de Base</label>
                            <h4>{{ number_format(Auth::guard('webagent')->user()->contrat->salaire) }}</h4>
                        </div>
                        <div class="card_widget_img">
                            <img src="{{ asset('agent/assets/img/dash4.png') }}" alt="card-img" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card board1 fill2 ">
                    <div class="card-body">
                        <div class="card_widget_header">
                            <label>Companies</label>
                            <h4>30</h4>
                        </div>
                        <div class="card_widget_img">
                            <img src="{{ asset('agent/assets/img/dash2.png') }}" alt="card-img" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card board1 fill3 ">
                    <div class="card-body">
                        <div class="card_widget_header">
                            <label>Leaves</label>
                            <h4>9</h4>
                        </div>
                        <div class="card_widget_img">
                            <img src="{{ asset('agent/assets/img/dash3.png') }}" alt="card-img" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 d-flex mobile-h">
                <div class="card flex-fill">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Total Employees</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="invoice_chart"></div>
                        <div class="text-center text-muted">
                            <div class="row">
                                <div class="col-4">
                                    <div class="mt-4">
                                        <p class="mb-2 text-truncate"><i class="fas fa-circle text-primary mr-1"></i>
                                            Business</p>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mt-4">
                                        <p class="mb-2 text-truncate"><i class="fas fa-circle text-success mr-1"></i>
                                            Testing</p>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mt-4">
                                        <p class="mb-2 text-truncate"><i class="fas fa-circle text-danger mr-1"></i>
                                            Development</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Total Salary By Unit</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="sales_chart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    @livewire('agent.dashboard')
@endsection
