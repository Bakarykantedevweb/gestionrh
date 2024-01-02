<div>
    @include('livewire.frontend.offre.modal')
    <!-- Hero Area Start-->
    <div class="slider-area ">
        <div class="single-slider section-overly slider-height2 d-flex align-items-center"
            data-background="{{ asset('frontend/assets/img/hero/about.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>{{ $offre->titre }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Area End -->
    <!-- job post company Start -->
    <div class="job-post-company pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-between">
                <!-- Left Content -->
                <div class="col-xl-7 col-lg-8">
                    <!-- job single -->
                    <div class="single-job-items mb-50">
                        <div class="job-items">
                            <div class="company-img company-img-details">
                                <a href="#"><img src="{{ asset('uploads/admin/offre/'.$offre->image) }}" alt=""></a>
                            </div>
                            <div class="job-tittle">
                                <a href="#">
                                    <h4>{{ $offre->titre }}</h4>
                                </a>
                                <ul>
                                    <li>{{ $offre->categorie->nom }}</li>
                                    <li><i class="fas fa-map-marker-alt"></i>Bamako, Bim sa</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- job single End -->

                    <div class="job-post-details">
                        <div class="post-details1 mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Description</h4>
                            </div>
                            <p>{!! $offre->description !!}.</p>
                        </div>
                    </div>

                </div>
                <!-- Right Content -->
                <div class="col-xl-4 col-lg-4">
                    <div class="post-details3  mb-50">
                        <!-- Small Section Tittle -->
                        <div class="small-section-tittle">
                            <h4>Detail Offre</h4>
                        </div>
                        <ul>
                            <li>Date Publication : <span>{{ $offre->date_publication }}</span></li>
                            <li>Adresse : <span>Bamako</span></li>
                            <li>Nombre de Place : <span>{{ $offre->nombre_place }}</span></li>
                            <li>Type Contrat : <span>{{ $offre->typeContrat->nom }}</span></li>
                            <li>Date Limite : <span>{{ $offre->date_limite }}</span></li>
                        </ul>
                        @if (Auth::guard('candidat')->check())
                            <div class="apply-btn2">
                                <button type="button" data-toggle="modal" data-target="#add_postuler" class="btn">Postuler</button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- job post company End -->
</div>
