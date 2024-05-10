<div>
    <section class="header-inner header-inner-big bg-holder text-white"
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
    <section class="space-ptb">
        <div class="container">
            <div class="row">
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
                                            <input type="checkbox" wire:model="selectedCategories" value="{{ $categorie->id }}" class="form-check-input">
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
                                            <input type="checkbox" wire:model="selectedDiplomes" value="{{ $diplome->id }}" class="form-check-input">
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
                                            <input type="checkbox" wire:model="selectedExperiences" value="{{ $experience->id }}" class="form-check-input">
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
                                            <input type="checkbox" wire:model="selectedSalaires" value="{{ $salaire->id }}" class="form-check-input">
                                            <label class="custom-control-label">{{ $salaire->salaire_debut.'-'.$salaire->salaire_fin }}</label>
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
                                <h6 class="mb-0"><span class="badge badge-lg bg-primary">{{ count($offres) }}</span>
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
                                                <h5 class="mb-0"><a href="{{ url('offres/'.$offre->titre.'/detail') }}">{{ $offre->titre }}</a>
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
</div>
