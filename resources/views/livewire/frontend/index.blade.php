<div>
    <section class="banner bg-holder bg-overlay-black-30 text-white">
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
        <div class="slideshow">
            <div class="slideshow-item" style="background-image: url('{{ asset('frontend/images/bg/1.jpg') }}');"></div>
            <div class="slideshow-item" style="background-image: url('{{ asset('frontend/images/bg/2.jpg') }}');"></div>
            <div class="slideshow-item" style="background-image: url('{{ asset('frontend/images/bg/3.jpg') }}');"></div>
            <div class="slideshow-item" style="background-image: url('{{ asset('frontend/images/bg/4.jpg') }}');"></div>
            <div class="slideshow-item" style="background-image: url('{{ asset('frontend/images/bg/5.jpg') }}');"></div>
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
                <div class="section-title">
                    <h2 class="title"><span>Annonce des offres d'emploi en vedette</span></h2>
                </div>
                <div class="col-lg-3">
                    <div class="sidebar">
                        <div class="widget">
                            <div class="widget-title widget-collapse">
                                <h6>Categories</h6>
                                <a class="ms-auto" data-bs-toggle="collapse" href="#specialism" role="button"
                                    aria-expanded="false" aria-controls="specialism"> <i
                                        class="fas fa-chevron-down"></i> </a>
                            </div>
                            <div class="collapse show" id="specialism">
                                <div class="widget-content">
                                    @forelse ($categories as $categorie)
                                        <div class="custom-control custom-checkbox form-check">
                                            <input type="checkbox" wire:model="selectedCategories"
                                                value="{{ $categorie->id }}" class="form-check-input">
                                            <label class="custom-control-label">{{ $categorie->nom }}</label>
                                        </div>
                                    @empty
                                        <span>Pas de Categorie</span>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                        <div class="widget">
                            <div class="widget-title widget-collapse">
                                <h6>Diplome</h6>
                                <a class="ms-auto" data-bs-toggle="collapse" href="#experience" role="button"
                                    aria-expanded="false" aria-controls="experience"> <i
                                        class="fas fa-chevron-down"></i> </a>
                            </div>
                            <div class="collapse show" id="experience">
                                <div class="widget-content">
                                    @forelse ($diplomes as $diplome)
                                        <div class="custom-control custom-checkbox form-check">
                                            <input type="checkbox" wire:model="selectedDiplomes"
                                                value="{{ $diplome->id }}" class="form-check-input">
                                            <label class="custom-control-label">{{ $diplome->nom }}</label>
                                        </div>
                                    @empty
                                        <span>Pas de Diplome</span>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                        <div class="widget">
                            <div class="widget-title widget-collapse">
                                <h6>Experiences</h6>
                                <a class="ms-auto" data-bs-toggle="collapse" href="#experience" role="button"
                                    aria-expanded="false" aria-controls="experience"> <i
                                        class="fas fa-chevron-down"></i> </a>
                            </div>
                            <div class="collapse show" id="experience">
                                <div class="widget-content">
                                    @forelse ($experiences as $experience)
                                        <div class="custom-control custom-checkbox form-check">
                                            <input type="checkbox" wire:model="selectedExperiences"
                                                value="{{ $experience->id }}" class="form-check-input">
                                            <label class="custom-control-label">{{ $experience->nom }}</label>
                                        </div>
                                    @empty
                                        <span>Pas d'experience'</span>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                        <div class="widget">
                            <div class="widget-title widget-collapse">
                                <h6>Salaires</h6>
                                <a class="ms-auto" data-bs-toggle="collapse" href="#Offeredsalary" role="button"
                                    aria-expanded="false" aria-controls="Offeredsalary"> <i
                                        class="fas fa-chevron-down"></i> </a>
                            </div>
                            <div class="collapse show" id="Offeredsalary">
                                <div class="widget-content">
                                    @forelse ($salaires as $salaire)
                                        <div class="custom-control custom-checkbox form-check">
                                            <input type="checkbox" wire:model="selectedSalaires"
                                                value="{{ $salaire->id }}" class="form-check-input">
                                            <label
                                                class="custom-control-label">{{ $salaire->salaire_debut . '-' . $salaire->salaire_fin }}</label>
                                        </div>
                                    @empty
                                        <span>Pas d'experience'</span>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="section-title mb-3 mb-lg-4">
                                <h6 class="mb-0"><span
                                        class="badge badge-lg bg-primary">{{ count($offres) }}</span>
                                    Emplois trouvés </h6>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="job-filter-tag">
                                <ul class="list-unstyled">
                                    <li><a href="#">Freelance <i class="fas fa-times-circle"></i> </a></li>
                                    <li><a class="filter-clear" href="#">Reset Search <i
                                                class="fas fa-redo-alt"></i> </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="job-filter mb-4 d-sm-flex align-items-center">
                        <div class="job-shortby ms-sm-auto d-flex align-items-center">
                            <form class="form-inline">
                                <div class="mb-0 d-flex align-items-center">
                                    <label class="justify-content-start me-2">Filtrer :</label>
                                    <div class="short-by">
                                        <select class="form-control basic-select">
                                            <option>Recente</option>
                                            <option>Ancienne</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        @forelse ($offres as $offre)
                            <div class="col-12">
                                <div class="job-list border-bottom">
                                    <div class="job-list-logo">
                                        <img class="img-fluid"
                                            src="{{ asset('uploads/admin/offre/' . $offre->image) }}" alt="">
                                    </div>
                                    <div class="job-list-details">
                                        <div class="job-list-info">
                                            <div class="job-list-title">
                                                <h5 class="mb-0"><a
                                                        href="{{ url('offres/' . $offre->titre . '/detail') }}">{{ $offre->titre }}</a>
                                                </h5>
                                                <span class="full-time">Nouveau</span>
                                            </div>
                                            <div class="job-list-option">
                                                <ul class="list-unstyled">
                                                    <li><i class="fas fa-map-marker-alt pe-1"></i>Banque Internationale
                                                        pour le Mali
                                                    </li>
                                                    <li><i class="fas fa-filter pe-1"></i>{{ $offre->categorie->nom }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="job-list-favourite-time"> <a class="job-list-favourite order-2"
                                            href="#"><i class="far fa-heart"></i></a> <span
                                            class="job-list-time order-1">{{ \Carbon\Carbon::parse($offre->date_publication)->isoFormat('LL') }}</span>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <h2 class="text-center">Pas d'offres</h2>
                            </div>
                        @endforelse
                    </div>
                    <div class="row">
                        <div class="col-12 text-center mt-4 mt-md-5">
                            <ul class="pagination justify-content-center mb-0">
                                <li class="page-item disabled"> <span class="page-link">Prev</span> </li>
                                <li class="page-item active" aria-current="page"><span class="page-link">1 </span>
                                    <span class="sr-only">(current)</span>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">...</a></li>
                                <li class="page-item"><a class="page-link" href="#">25</a></li>
                                <li class="page-item"> <a class="page-link" href="#">Next</a> </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="space-ptb bg-holder bg-dark"
        style="background-image: url({{ asset('frontend/images/bg/01.png') }});">
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
</div>
