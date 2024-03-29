@extends('layouts.agent')
@section('content')
    <div class="content container-fluid">
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
                            <label>Congés</label>
                            <h4>700</h4>
                        </div>
                        <div class="card_widget_img">
                            <img src="{{ asset('agent/assets/img/dash1.png') }}" alt="card-img" />
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
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card board1 fill4 ">
                    <div class="card-body">
                        <div class="card_widget_header">
                            <label>Salaire Brut</label>
                            <h4>$5.8M</h4>
                        </div>
                        <div class="card_widget_img">
                            <img src="{{ asset('agent/assets/img/dash4.png') }}" alt="card-img" />
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
        {{-- <div class="row">
            <div class="col-xl-6 col-sm-12 col-12 d-flex">
                <div class="card card-list flex-fill">
                    <div class="card-header ">
                        <h4 class="card-title">Total Salary By Unit</h4>
                    </div>
                    <div class="card-body">
                        <div class="team-list">
                            <div class="team-view">
                                <div class="team-img">
                                    <img src="{{ asset('agent/assets/img/profiles/avatar-03.jpg') }}" alt="avatar" />
                                </div>
                                <div class="team-content">
                                    <label>Maria Cotton</label>
                                    <span>PHP</span>
                                </div>
                            </div>
                            <div class="team-action">
                                <ul>
                                    <li><a><i data-feather="trash-2"></i></a></li>
                                    <li><a><i data-feather="edit-2"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="team-list">
                            <div class="team-view">
                                <div class="team-img">
                                    <img src="{{ asset('agent/assets/img/profiles/avatar-04.jpg') }}" alt="avatar" />
                                </div>
                                <div class="team-content">
                                    <label>Linda Craver</label>
                                    <span>IOS</span>
                                </div>
                            </div>
                            <div class="team-action">
                                <ul>
                                    <li><a><i data-feather="trash-2"></i></a></li>
                                    <li><a><i data-feather="edit-2"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="team-list">
                            <div class="team-view">
                                <div class="team-img">
                                    <img src="{{ asset('agent/assets/img/profiles/avatar-06.jpg') }}" alt="avatar" />
                                </div>
                                <div class="team-content">
                                    <label>Jenni Sims</label>
                                    <span>Android</span>
                                </div>
                            </div>
                            <div class="team-action">
                                <ul>
                                    <li><a><i data-feather="trash-2"></i></a></li>
                                    <li><a><i data-feather="edit-2"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="team-list">
                            <div class="team-view">
                                <div class="team-img">
                                    <img src="{{ asset('agent/assets/img/profiles/avatar-11.jpg') }}" alt="avatar" />
                                </div>
                                <div class="team-content">
                                    <label>Danny</label>
                                    <span>Design</span>
                                </div>
                            </div>
                            <div class="team-action">
                                <ul>
                                    <li><a><i data-feather="trash-2"></i></a></li>
                                    <li><a><i data-feather="edit-2"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-12 col-12 d-flex">
                <div class="card card-list flex-fill">
                    <div class="card-header">
                        <div class="">
                            <h4 class="card-title">Recent Activities</h3>
                        </div>
                    </div>
                    <div class="card-body dash-activity">
                        <div class="slimscroll activity_scroll">
                            <div class="activity-set">
                                <div class="activity-img">
                                    <img src="{{ asset('agent/assets/img/profiles/avatar-02.jpg') }}" alt="avatar">
                                </div>
                                <div class="activity-content">
                                    <label>Lorem ipsum dolor sit amet,</label>
                                    <span>2 hours ago</span>
                                </div>
                            </div>
                            <div class="activity-set">
                                <div class="activity-img">
                                    <img src="{{ asset('agent/assets/img/profiles/avatar-05.jpg') }}" alt="avatar">
                                </div>
                                <div class="activity-content">
                                    <label>Lorem ipsum dolor sit amet,</label>
                                    <span>3 hours ago</span>
                                </div>
                            </div>
                            <div class="activity-set">
                                <div class="activity-img">
                                    <img src="{{ asset('agent/assets/img/profiles/avatar-07.jpg') }}" alt="avatar">
                                </div>
                                <div class="activity-content">
                                    <label>Lorem ipsum dolor sit amet,</label>
                                    <span>4 hours ago</span>
                                </div>
                            </div>
                            <div class="activity-set">
                                <div class="activity-img">
                                    <img src="{{ asset('agent/assets/img/profiles/avatar-08.jpg') }}" alt="avatar">
                                </div>
                                <div class="activity-content">
                                    <label>Lorem ipsum dolor sit amet,</label>
                                    <span>5 hours ago</span>
                                </div>
                            </div>
                            <div class="activity-set">
                                <div class="activity-img">
                                    <img src="{{ asset('agent/assets/img/profiles/avatar-09.jpg') }}" alt="avatar">
                                </div>
                                <div class="activity-content">
                                    <label>Lorem ipsum dolor sit amet,</label>
                                    <span>6 hours ago</span>
                                </div>
                            </div>
                            <div class="activity-set">
                                <div class="activity-img">
                                    <img src="{{ asset('agent/assets/img/profiles/avatar-10.jpg') }}" alt="avatar">
                                </div>
                                <div class="activity-content">
                                    <label>Lorem ipsum dolor sit amet,</label>
                                    <span>2 hours ago</span>
                                </div>
                            </div>
                            <div class="activity-set">
                                <div class="activity-img">
                                    <img src="{{ asset('agent/assets/img/profiles/avatar-12.jpg') }}" alt="avatar">
                                </div>
                                <div class="activity-content">
                                    <label>Lorem ipsum dolor sit amet,</label>
                                    <span>3 hours ago</span>
                                </div>
                            </div>
                            <div class="activity-set">
                                <div class="activity-img">
                                    <img src="{{ asset('agent/assets/img/profiles/avatar-13.jpg') }}" alt="avatar">
                                </div>
                                <div class="activity-content">
                                    <label>Lorem ipsum dolor sit amet,</label>
                                    <span>4 hours ago</span>
                                </div>
                            </div>
                        </div>
                        <div class="leave-viewall activit">
                            <a>View all <img src="{{ asset('agent/assets/img/right-arrow.png') }}" class="ml-2" alt="arrow"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-12 col-12 d-flex">
                <div class="card card-list flex-fill">
                    <div class="card-header ">
                        <h4 class="card-title-dash">Your Upcoming Leave</h4>
                        <div class="dropdown">
                            <button class="btn btn-action " type="button" id="roomsBtn" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-h"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="roomsBtn">
                                <a class="dropdown-item" href="#">Action</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="leave-set">
                            <span class="leave-inactive">
                                <i class="fas fa-briefcase"></i>
                            </span>
                            <label>Mon, 16 Dec 2021</label>
                        </div>
                        <div class="leave-set">
                            <span class="leave-active">
                                <i class="fas fa-briefcase"></i>
                            </span>
                            <label>Fri, 20 Dec 2021</label>
                        </div>
                        <div class="leave-set">
                            <span class="leave-active">
                                <i class="fas fa-briefcase"></i>
                            </span>
                            <label>Wed, 25 Dec 2021</label>
                        </div>
                        <div class="leave-set">
                            <span class="leave-active">
                                <i class="fas fa-briefcase"></i>
                            </span>
                            <label>Fri, 27 Dec 2021</label>
                        </div>
                        <div class="leave-set">
                            <span class="leave-active">
                                <i class="fas fa-briefcase"></i>
                            </span>
                            <label>Tue, 31 Dec 2021</label>
                        </div>
                        <div class="leave-viewall">
                            <a href="leave.html">View all <img src="assets/img/right-arrow.png" class="ml-2"
                                    alt="arrow" /></a>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
@endsection
