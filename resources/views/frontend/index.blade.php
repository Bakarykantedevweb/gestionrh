@extends('layouts.frontend')
@section('content')
    <section class="banner bg-holder bg-overlay-black-30 text-white"
        style="background-image: url({{ asset('frontend/images/bg/banner-01.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-12 position-relative">
                    <h1 class="text-white mb-3">Il est temps de faire le
                        meilleur <br> travail de votre vie.</h1>
                    <p class="lead mb-4 mb-lg-5 fw-normal">Il y a toujours
                        un moyen de faire mieux... trouve-le.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="space-pb j-mt-sm-n6">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel owl-nav-bottom-center category-style-01" data-nav-arrow="false"
                        data-nav-dots="false" data-items="5" data-md-items="3" data-sm-items="2" data-xs-items="2"
                        data-xx-items="1" data-space="20" data-autoheight="true">
                        <a href="#" class="category-item">
                            <div class="category-icon mb-4">
                                <i class="fas fa-user-tie"></i>
                            </div>
                            <h6>Accountancy</h6>
                            <span class="mb-0">140 Open Position </span>
                        </a>
                        <a href="#" class="category-item">
                            <div class="category-icon mb-4">
                                <i class="fas fa-money-bill-wave"></i>
                            </div>
                            <h6>Purchasing</h6>
                            <span class="mb-0">202 Open Position </span>
                        </a>
                        <a href="#" class="category-item">
                            <div class="category-icon mb-4">
                                <i class="fas fa-bullhorn"></i>
                            </div>
                            <h6>Sales & Marketing</h6>
                            <span class="mb-0">245 Open Position </span>
                        </a>
                        <a href="#" class="category-item">
                            <div class="category-icon mb-4">
                                <i class="fas fa-user-md"></i>
                            </div>
                            <h6>Health Care</h6>
                            <span class="mb-0">514 Open Position </span>
                        </a>
                        <a href="#" class="category-item">
                            <div class="category-icon mb-4">
                                <i class="fas fa-hard-hat"></i>
                            </div>
                            <h6>IT Contractor</h6>
                            <span class="mb-0">120 Open Position </span>
                        </a>
                        <a href="#" class="category-item">
                            <div class="category-icon mb-4">
                                <i class="fas fa-building"></i>
                            </div>
                            <h6>Construction</h6>
                            <span class="mb-0">410 Open Position </span>
                        </a>
                        <a href="#" class="category-item">
                            <div class="category-icon mb-4">
                                <i class="fas fa-home"></i>
                            </div>
                            <h6>Architecture</h6>
                            <span class="mb-0">104 Open Position </span>
                        </a>
                        <a href="#" class="category-item">
                            <div class="category-icon mb-4">
                                <i class="fas fa-money-check-alt"></i>
                            </div>
                            <h6>Finance</h6>
                            <span class="mb-0">241 Open Position </span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="space-ptb bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <div class="section-title">
                        <h2 class="title"><span>Annonce des offres d'emploi en vedette</span></h2>
                    </div>
                    <div class="nav-tabs-style-02 d-flex border-0">
                        <div class>
                            <ul class="nav nav-tabs justify-content-center d-flex" id="myTab1" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="hot-jobs-tab" data-bs-toggle="tab" href="#hot-jobs"
                                        role="tab" aria-controls="hot-jobs" aria-selected="true">Tendances</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="recent-jobs-tab" data-bs-toggle="tab" href="#recent-jobs"
                                        role="tab" aria-controls="recent-jobs" aria-selected="false">Récents</a>
                                </li>
                            </ul>
                        </div>
                        <div class="job-found ms-auto mb-0">
                            <span class="badge badge-lg bg-primary">24123</span>
                            <h6 class="ms-3 mb-0">Emploi trouvé</h6>
                        </div>
                    </div>
                    <div class="tab-content" id="myTabContent">
                        <!-- Hot jobs -->
                        <div class="tab-pane fade show active" id="hot-jobs" role="tabpanel"
                            aria-labelledby="hot-jobs-tab">
                            <!-- Freelance -->
                            <div class="job-list">
                                <div class="job-list-logo">
                                    <img class="img-fluid" src="{{ asset('frontend/images/svg/10.svg') }}" alt>
                                </div>
                                <div class="job-list-details">
                                    <div class="job-list-info">
                                        <div class="job-list-title">
                                            <h5 class="mb-0"><a href="job-detail.html">Graphic
                                                    Design courses</a></h5>
                                            <span class="freelance">Freelance</span>
                                        </div>
                                        <div class="job-list-option">
                                            <ul class="list-unstyled">
                                                <li>
                                                    <span>via</span>
                                                    <a href="employer-detail.html">Trout
                                                        Design Ltd</a>
                                                </li>
                                                <li><i class="fas fa-map-marker-alt pe-1"></i>Parsippany,
                                                    NJ 07054</li>
                                                <li><i class="fas fa-filter pe-1"></i>Accountancy</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="job-list-favourite-time">
                                    <a class="job-list-favourite order-2" href="#"><i class="far fa-heart"></i></a>
                                    <span class="job-list-time order-1"><i class="far fa-clock pe-1"></i>1H
                                        ago</span>
                                </div>
                            </div>
                            <!-- Part-Time -->
                            <div class="job-list">
                                <div class="job-list-logo">
                                    <img class="img-fluid" src="{{ asset('frontend/images/svg/02.svg') }}" alt>
                                </div>
                                <div class="job-list-details">
                                    <div class="job-list-info">
                                        <div class="job-list-title">
                                            <h5 class="mb-0"><a href="job-detail.html">Adobe
                                                    Photoshop
                                                    courses</a></h5>
                                            <span class="part-time">Part-Time</span>
                                        </div>
                                        <div class="job-list-option">
                                            <ul class="list-unstyled">
                                                <li>
                                                    <span>via</span>
                                                    <a href="employer-detail.html">Adobe
                                                        Photoshop
                                                        courses</a>
                                                </li>
                                                <li><i class="fas fa-map-marker-alt pe-1"></i>Glen
                                                    Cove, NY 11542</li>
                                                <li><i class="fas fa-filter pe-1"></i>IT
                                                    Contractor</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="job-list-favourite-time">
                                    <a class="job-list-favourite order-2" href="#"><i class="far fa-heart"></i></a>
                                    <span class="job-list-time order-1"><i class="far fa-clock pe-1"></i>3D
                                        ago</span>
                                </div>
                            </div>
                            <!-- Temporary -->
                            <div class="job-list">
                                <div class=" job-list-logo">
                                    <img class="img-fluid" src="{{ asset('frontend/images/svg/06.svg') }}" alt>
                                </div>
                                <div class="job-list-details">
                                    <div class="job-list-info">
                                        <div class="job-list-title">
                                            <h5 class="mb-0"><a href="job-detail.html">Group
                                                    Marketing
                                                    Manager</a></h5>
                                            <span class="temporary">Temporary</span>
                                        </div>
                                        <div class="job-list-option">
                                            <ul class="list-unstyled">
                                                <li>
                                                    <span>via</span>
                                                    <a href="employer-detail.html">Marvelous
                                                        Designer courses</a>
                                                </li>
                                                <li><i class="fas fa-map-marker-alt pe-1"></i>Minneapolis,
                                                    MN 55406</li>
                                                <li><i class="fas fa-filter pe-1"></i>Finance</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="job-list-favourite-time">
                                    <a class="job-list-favourite order-2" href="#"><i class="far fa-heart"></i></a>
                                    <span class="job-list-time order-1"><i class="far fa-clock pe-1"></i>2W
                                        ago</span>
                                </div>
                            </div>
                        </div>
                        <!-- Recent jobs -->
                        <div class="tab-pane fade" id="recent-jobs" role="tabpanel" aria-labelledby="recent-jobs-tab">
                            <!-- Freelance -->
                            <div class="job-list">
                                <div class="job-list-logo">
                                    <img class="img-fluid" src="images/svg/11.svg" alt>
                                </div>
                                <div class="job-list-details">
                                    <div class="job-list-info">
                                        <div class="job-list-title">
                                            <h5 class="mb-0"><a href="job-detail.html">Toon
                                                    Boom Harmony courses</a>
                                            </h5>
                                            <span class="freelance">Freelance</span>
                                        </div>
                                        <div class="job-list-option">
                                            <ul class="list-unstyled">
                                                <li>
                                                    <span>via</span>
                                                    <a href="employer-detail.html">Toon
                                                        Boom Harmony
                                                        courses</a>
                                                </li>
                                                <li><i class="fas fa-map-marker-alt pe-1"></i>Parsippany,
                                                    NJ 07054</li>
                                                <li><i class="fas fa-filter pe-1"></i>Accountancy</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="job-list-favourite-time">
                                    <a class="job-list-favourite order-2" href="#"><i class="far fa-heart"></i></a>
                                    <span class="job-list-time order-1"><i class="far fa-clock pe-1"></i>1H
                                        ago</span>
                                </div>
                            </div>
                            <!-- Part-Time -->
                            <div class="job-list">
                                <div class="job-list-logo">
                                    <img class="img-fluid" src="images/svg/12.svg" alt>
                                </div>
                                <div class="job-list-details">
                                    <div class="job-list-info">
                                        <div class="job-list-title">
                                            <h5 class="mb-0"><a href="job-detail.html">Senior
                                                    Rolling Stock
                                                    Technician</a></h5>
                                            <span class="part-time">Part-Time</span>
                                        </div>
                                        <div class="job-list-option">
                                            <ul class="list-unstyled">
                                                <li>
                                                    <span>via</span>
                                                    <a href="employer-detail.html">
                                                        Adobe Photoshop
                                                        courses</a>
                                                </li>
                                                <li><i class="fas fa-map-marker-alt pe-1"></i>Glen
                                                    Cove, NY 11542</li>
                                                <li><i class="fas fa-filter pe-1"></i>IT
                                                    Contractor</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="job-list-favourite-time">
                                    <a class="job-list-favourite order-2" href="#"><i class="far fa-heart"></i></a>
                                    <span class="job-list-time order-1"><i class="far fa-clock pe-1"></i>3D
                                        ago</span>
                                </div>
                            </div>
                            <!-- Temporary -->
                            <div class="job-list">
                                <div class=" job-list-logo">
                                    <img class="img-fluid" src="images/svg/13.svg" alt>
                                </div>
                                <div class="job-list-details">
                                    <div class="job-list-info">
                                        <div class="job-list-title">
                                            <h5 class="mb-0"><a href="job-detail.html">Marketing
                                                    & Business courses</a>
                                            </h5>
                                            <span class="temporary">Temporary</span>
                                        </div>
                                        <div class="job-list-option">
                                            <ul class="list-unstyled">
                                                <li>
                                                    <span>via</span>
                                                    <a href="employer-detail.html">
                                                        Marvelous Designer
                                                        courses</a>
                                                </li>
                                                <li><i class="fas fa-map-marker-alt pe-1"></i>Minneapolis,
                                                    MN 55406</li>
                                                <li><i class="fas fa-filter pe-1"></i>Finance</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="job-list-favourite-time">
                                    <a class="job-list-favourite order-2" href="#"><i class="far fa-heart"></i></a>
                                    <span class="job-list-time order-1"><i class="far fa-clock pe-1"></i>2W
                                        ago</span>
                                </div>
                            </div>
                        </div>
                        <!-- Popular jobs -->
                        <div class="row">
                            <div class="col-12 justify-content-center d-flex mt-4">
                                <a class="btn btn-primary btn-lg" href="job-listing.html">View More
                                    Jobs</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title">
                                <h2 class="title"><span>Top 10
                                        Companies</span></h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="employers-grid mb-5">
                                <div class="employers-list-logo">
                                    <img class="img-fluid" src="{{ asset('frontend/images/svg/09.svg') }}" alt>
                                </div>
                                <div class="employers-list-details">
                                    <div class="employers-list-info">
                                        <div class="employers-list-title">
                                            <h5 class="mb-0"><a href="employer-detail.html">Marketing
                                                    & Business
                                                    courses</a></h5>
                                        </div>
                                        <div class="employers-list-option">
                                            <ul class="list-unstyled">
                                                <li><i class="fas fa-map-marker-alt pe-1"></i>Botchergate,
                                                    Carlisle</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="employers-list-position">
                                    <a class="btn btn-sm btn-dark" href="#">17 Open position</a>
                                </div>
                            </div>
                            <div class="employers-grid mt-n3">
                                <div class="employers-list-logo">
                                    <img class="img-fluid" src="{{ asset('frontend/images/svg/10.svg') }}" alt>
                                </div>
                                <div class="employers-list-details">
                                    <div class="employers-list-info">
                                        <div class="employers-list-title">
                                            <h5 class="mb-0"><a href="employer-detail.html">Google
                                                    Spreadsheets
                                                    courses</a></h5>
                                        </div>
                                        <div class="employers-list-option">
                                            <ul class="list-unstyled">
                                                <li><i class="fas fa-map-marker-alt pe-1"></i>Battle
                                                    Ground, WA 98604
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="employers-list-position">
                                    <a class="btn btn-sm btn-dark" href="#">20 Open position</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="space-ptb">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-lg-0 mb-4">
                    <div class="feature-info-01 p-4 p-md-5 primary-box">
                        <div class="feature-info-icon mb-3 text-primary">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <div class="feature-info-content ps-sm-4 ps-0">
                            <h4>Looking For Job?</h4>
                            <p>Your next role could be with one of these top
                                leading organizations.</p>
                            <a href="#">Apply now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="feature-info-01 p-4 p-md-5 dark-box">
                        <div class="feature-info-icon mb-3 text-dark">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="feature-info-content ps-sm-4 ps-0">
                            <h4>Are You Recruiting?</h4>
                            <p>Five million searchable CVs in one place with
                                our linked CV database.</p>
                            <a class="text-dark" href="#">Post a job</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="space-ptb bg-holder bg-dark" style="background-image: url({{ asset('frontend/images/bg/01.png') }});">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div class="section-title center">
                        <h2 class="title"><span>How it works</span></h2>
                        <p class="text-white">Give yourself the power of
                            responsibility. Remind yourself the only thing
                            stopping you is yourself.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="feature-step text-center">
                        <div class="feature-info-icon">
                            <i class="fas fa-user-plus fa-6x text-primary"></i>
                        </div>
                        <div class="feature-info-content mt-3">
                            <h4 class="text-white mb-3">Create Account</h4>
                            <p class="mb-0 text-white">Create an account and
                                access your saved settings on any
                                device.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="feature-step text-center">
                        <div class="feature-info-icon">
                            <i class="fas fa-search fa-6x text-primary"></i>
                        </div>
                        <div class="feature-info-content mt-3">
                            <h4 class="text-white mb-3">Find Your
                                Vacancy</h4>
                            <p class="mb-0 text-white">Don't just find. Be
                                found. Put your CV in front of great
                                employers.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-0">
                    <div class="feature-step text-center">
                        <div class="feature-info-icon">
                            <i class="fas fa-briefcase fa-6x text-primary"></i>
                        </div>
                        <div class="feature-info-content mt-3">
                            <h4 class="text-white mb-3">Get A Job</h4>
                            <p class="mb-0 text-white">Your next career move
                                starts here. Choose a job from thousands of
                                companies.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="space-ptb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div class="section-title center">
                        <h2 class="title"><span>Ce que disent nos clients
                                satisfaits à notre sujet</span></h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col">
                    <div class="owl-carousel owl-nav-bottom-center testimonial-style-02" data-nav-arrow="false"
                        data-items="2" data-md-items="1" data-sm-items="1" data-xs-items="1" data-xx-items="1"
                        data-space="30" data-autoheight="true">
                        <div class="item">
                            <div class="testimonial-content">
                                <p>
                                    <i class="fas fa-quote-left quotes"></i>
                                    La base de données OptiRH a été l'une de
                                    nos sources actuelles de recrutement,
                                    soutenue par une équipe très.
                                    expérimentée qui se donne beaucoup de
                                    mal pour s'assurer que les demandes sont
                                    prises en charge rapidement.
                                </p>
                            </div>
                            <div class="testimonial-author">
                                <div class="testimonial-avatar avatar avatar-xl">
                                    <img class="img-fluid rounded-circle"
                                        src="{{ asset('frontend/images/avatar/01.jpg') }}" alt>
                                </div>
                                <div class="testimonial-name">
                                    <h6 class="mb-1">Bakary Kante</h6>
                                    <span>Developpeur Web</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-content">
                                <p>
                                    <i class="fas fa-quote-left quotes"></i>
                                    Le
                                    portail est très convivial pour la
                                    d'offre d'emploi. De
                                    plus, ils disposent d'une excellente
                                    base de données pour la recherche de CV.
                                    En ce qui concerne les services, c'est
                                    vraiment excellent !
                                </p>
                            </div>
                            <div class="testimonial-author">
                                <div class="testimonial-avatar avatar avatar-xl">
                                    <img class="img-fluid rounded-circle"
                                        src="{{ asset('frontend/images/avatar/02.jpg') }}" alt>
                                </div>
                                <div class="testimonial-name">
                                    <h6 class="mb-1">Fousseyni Diallo</h6>
                                    <span>Developpeur Web</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-content">
                                <p>
                                    <i class="fas fa-quote-left quotes"></i>
                                    OptiRh
                                    est un excellent portail d'emploi. Nous
                                    apprécions les CV reçus par le biais de
                                    cette plateforme. Les outils de
                                    recherche Magic Search et Power Search
                                    sont très utiles. Nous sommes ravis de
                                    leur service.
                                </p>
                            </div>
                            <div class="testimonial-author">
                                <div class="testimonial-avatar avatar avatar-xl">
                                    <img class="img-fluid rounded-circle"
                                        src="{{ asset('frontend/images/avatar/04.jpg') }}" alt>
                                </div>
                                <div class="testimonial-name">
                                    <h6 class="mb-1">Aissata Traore</h6>
                                    <span>Chef de projet</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
