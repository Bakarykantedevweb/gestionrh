<div>
    @include('livewire.frontend.offre.modal')
    <section class="header-inner header-inner-big bg-holder text-white"
        style="background-image: url({{ asset('frontend/images/bg/banner-01.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-12 position-relative">
                    <h1 class="text-white mb-3">{{ $offre->titre }}.</h1>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
banner -->

    <!--=================================
job list -->
    <section class="space-ptb">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="job-list border">
                                <div class=" job-list-logo">
                                    <img class="img-fluid" src="{{ asset('uploads/admin/offre/' . $offre->image) }}"
                                        alt="">
                                </div>
                                <div class="job-list-details">
                                    <div class="job-list-info">
                                        <div class="job-list-title">
                                            <h5 class="mb-0">{{ $offre->titre }}</h5>
                                        </div>
                                        <div class="job-list-option">
                                            <ul class="list-unstyled">
                                                <li><i class="fas fa-map-marker-alt pe-1"></i>Banque Internationale
                                                    pour le Mali</li>
                                                <li><i class="fa-solid fa-phone"></i><span class="ps-2">+223
                                                        70-06-07-62</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="job-list-favourite-time">
                                    <a class="job-list-favourite order-2" href="#"><i
                                            class="far fa-heart"></i></a>
                                    <span
                                        class="job-list-time order-1">{{ \Carbon\Carbon::parse($offre->date_publication)->isoFormat('LL') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="border p-4 mt-4 mt-lg-5">
                        <div class="row">
                            <div class="col-md-4 col-sm-6 mb-4">
                                <div class="d-flex">
                                    <i class="font-xll text-primary align-self-center fas fa-money-check-alt"></i>
                                    <div class="feature-info-content ps-3">
                                        <label class="mb-1">Salaire</label>
                                        <span
                                            class="mb-0 fw-bold d-block text-dark">{{ $offre->salaire->salaire_debut . '-' . $offre->salaire->salaire_fin }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 mb-4">
                                <div class="d-flex">
                                    <i class="font-xll text-primary align-self-center fas fa-users"></i>
                                    <div class="feature-info-content ps-3">
                                        <label class="mb-1">Nombre de place</label>
                                        <span class="mb-0 fw-bold d-block text-dark">{{ $offre->nombre_place }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 mb-4">
                                <div class="d-flex">
                                    <i class="font-xll text-primary align-self-center fas fa-chart-bar"></i>
                                    <div class="feature-info-content ps-3">
                                        <label class="mb-1">Type Contrat</label>
                                        <span
                                            class="mb-0 fw-bold d-block text-dark">{{ $offre->typeContrat->nom }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 mb-md-0 mb-4">
                                <div class="d-flex">
                                    <i class="font-xll text-primary align-self-center fas fa-building"></i>
                                    <div class="feature-info-content ps-3">
                                        <label class="mb-1">Categorie</label>
                                        <span class="mb-0 fw-bold d-block text-dark">{{ $offre->categorie->nom }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 mb-sm-0 mb-4">
                                <div class="d-flex">
                                    <i class="font-xll text-primary align-self-center fas fa-medal"></i>
                                    <div class="feature-info-content ps-3">
                                        <label class="mb-1">Experience</label>
                                        <span
                                            class="mb-0 fw-bold d-block text-dark">{{ $offre->experience->nom }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="d-flex">
                                    <i class="font-xll text-primary align-self-center fas fa-graduation-cap"></i>
                                    <div class="feature-info-content ps-3">
                                        <label class="mb-1">Diplome</label>
                                        <span class="mb-0 fw-bold d-block text-dark">{{ $offre->diplome->nom }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="my-4 my-lg-5">
                        {!! $offre->description !!}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar mb-0">
                        @if (Auth::guard('webcandidat')->check())
                            @if (!$checkPostuler)
                                <div class="widget border-0 d-grid">
                                    <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" href="#">
                                        <i class="far fa-paper-plane"></i>
                                        Postuler
                                    </a>
                                </div>
                            @else
                                <div class="widget border-0 d-grid">
                                    <a class="btn btn-primary" href="#">
                                        <i class="far fa-close"></i>
                                        Deja Postuler
                                    </a>
                                </div>
                            @endif
                        @else
                            <div class="widget border-0 d-grid">
                                <a class="btn btn-primary" href="{{ route('login.index') }}">
                                    <i class="far fa-user pe-2"></i>Se connecter</a>
                            </div>
                        @endif
                        <div class="widget">
                            <div class="widget-title mb-0">
                                <h5>Offres Similaires</h5>
                            </div>
                            <div class="similar-jobs-item widget-box">
                                @forelse ($offreSimilaires as $offreSimilaire)
                                    <div class="job-list border-bottom">
                                        <div class="job-list-logo">
                                            <img class="img-fluid"
                                                src="{{ asset('uploads/admin/offre/' . $offreSimilaire->image) }}"
                                                alt="">
                                        </div>
                                        <div class="job-list-details">
                                            <div class="job-list-info">
                                                <div class="job-list-title">
                                                    <h6><a
                                                            href="{{ url('offres/' . $offreSimilaire->titre . '/detail') }}">{{ $offreSimilaire->titre }}</a>
                                                    </h6>
                                                    <span class="freelance">Similaire</span>
                                                </div>
                                                <div class="job-list-option">
                                                    <ul class="list-unstyled">
                                                        <li>
                                                            <span>via</span>
                                                            <a href="">Banque Internationale pour le Mali</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <h3 class="text-center">Pas d'offres</h3>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
                <!--=================================
      sidebar -->
            </div>
        </div>
    </section>
</div>
