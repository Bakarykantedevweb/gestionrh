@extends('layouts.frontend')
@section('title','BIM sa | Acceuil')
@section('content')
    <!-- slider Area Start-->
    <div class="slider-area ">
        <!-- Mobile Menu -->
        <div class="slider-active">
            <div class="single-slider slider-height d-flex align-items-center"
                data-background="{{ asset('frontend/assets/img/hero/h1_hero.jpg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-9 col-md-10">
                            <div class="hero__caption">
                                <h1>Trouvez les emplois de vos reves</h1>
                            </div>
                        </div>
                    </div>
                    <!-- Search Box -->
                    <div class="row">
                        <div class="col-xl-8">
                            <!-- form -->
                            <form action="#" class="search-box">
                                <div class="input-form">
                                    <input type="text" placeholder="Job Tittle or keyword">
                                </div>
                                <div class="select-form">
                                    <div class="select-itms">
                                        <select name="select" id="select1">
                                            <option value="">Location BD</option>
                                            <option value="">Location PK</option>
                                            <option value="">Location US</option>
                                            <option value="">Location UK</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="search-form">
                                    <a href="#">Find job</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->
    <!-- Our Services Start -->
    <div class="our-services section-pad-t30">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle text-center">
                        <span>Tendance</span>
                        <h2>Parcourez les meilleures catégories </h2>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-contnet-center">
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                    <div class="single-services text-center mb-30">
                        <div class="services-ion">
                            <span class="flaticon-tour"></span>
                        </div>
                        <div class="services-cap">
                            <h5><a href="">Design & Creative</a></h5>
                            <span>(653)</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                    <div class="single-services text-center mb-30">
                        <div class="services-ion">
                            <span class="flaticon-cms"></span>
                        </div>
                        <div class="services-cap">
                            <h5><a href="">Design & Development</a></h5>
                            <span>(658)</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                    <div class="single-services text-center mb-30">
                        <div class="services-ion">
                            <span class="flaticon-report"></span>
                        </div>
                        <div class="services-cap">
                            <h5><a href="">Sales & Marketing</a></h5>
                            <span>(658)</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                    <div class="single-services text-center mb-30">
                        <div class="services-ion">
                            <span class="flaticon-app"></span>
                        </div>
                        <div class="services-cap">
                            <h5><a href="">Mobile Application</a></h5>
                            <span>(658)</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                    <div class="single-services text-center mb-30">
                        <div class="services-ion">
                            <span class="flaticon-helmet"></span>
                        </div>
                        <div class="services-cap">
                            <h5><a href="">Construction</a></h5>
                            <span>(658)</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                    <div class="single-services text-center mb-30">
                        <div class="services-ion">
                            <span class="flaticon-high-tech"></span>
                        </div>
                        <div class="services-cap">
                            <h5><a href="">Information Technology</a></h5>
                            <span>(658)</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                    <div class="single-services text-center mb-30">
                        <div class="services-ion">
                            <span class="flaticon-real-estate"></span>
                        </div>
                        <div class="services-cap">
                            <h5><a href="">Real Estate</a></h5>
                            <span>(658)</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                    <div class="single-services text-center mb-30">
                        <div class="services-ion">
                            <span class="flaticon-content"></span>
                        </div>
                        <div class="services-cap">
                            <h5><a href="">Content Writer</a></h5>
                            <span>(658)</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- More Btn -->
            <!-- Section Button -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="browse-btn2 text-center mt-50">
                        <a href="" class="border-btn2">Browse All Sectors</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Our Services End -->
    <!-- Online CV Area Start -->
    <div class="online-cv cv-bg section-overly pt-90 pb-120" data-background="{{ asset('frontend/assets/img/gallery/cv_bg.jpg') }}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="cv-caption text-center">
                        <p class="pera1">VISITES EN VEDETTE</p>
                        <p class="pera2"> Faites une différence avec votre CV en ligne!</p>
                        @if (Auth::guard('candidat')->check())
                            <a href="#" class="border-btn2 border-btn4">Télécharger votre CV</a>
                        @else
                            <a href="{{ url('login-candidat') }}" class="border-btn2 border-btn4">Connecter vous</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Online CV Area End-->
    <!-- Featured_job_start -->
    <section class="featured-job-area feature-padding">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle text-center">
                        <span>Tendance</span>
                        <h2>Parcourez les offres</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <!-- single-job-content -->
                    <div class="single-job-items mb-30">
                        <div class="job-items">
                            <div class="company-img">
                                <a href=""><img src="{{ asset('frontend/assets/img/icon/job-list1.png') }}" alt=""></a>
                            </div>
                            <div class="job-tittle">
                                <a href="">
                                    <h4>Digital Marketer</h4>
                                </a>
                                <ul>
                                    <li>Creative Agency</li>
                                    <li><i class="fas fa-map-marker-alt"></i>Athens, Greece</li>
                                    <li>$3500 - $4000</li>
                                </ul>
                            </div>
                        </div>
                        <div class="items-link f-right">
                            <a href="">Full Time</a>
                            <span>7 hours ago</span>
                        </div>
                    </div>
                    <!-- single-job-content -->
                    <div class="single-job-items mb-30">
                        <div class="job-items">
                            <div class="company-img">
                                <a href=""><img src="{{ asset('frontend/assets/img/icon/job-list2.png') }}" alt=""></a>
                            </div>
                            <div class="job-tittle">
                                <a href="">
                                    <h4>Digital Marketer</h4>
                                </a>
                                <ul>
                                    <li>Creative Agency</li>
                                    <li><i class="fas fa-map-marker-alt"></i>Athens, Greece</li>
                                    <li>$3500 - $4000</li>
                                </ul>
                            </div>
                        </div>
                        <div class="items-link f-right">
                            <a href="">Full Time</a>
                            <span>7 hours ago</span>
                        </div>
                    </div>
                    <!-- single-job-content -->
                    <div class="single-job-items mb-30">
                        <div class="job-items">
                            <div class="company-img">
                                <a href=""><img src="{{ asset('frontend/assets/img/icon/job-list3.png') }}" alt=""></a>
                            </div>
                            <div class="job-tittle">
                                <a href="">
                                    <h4>Digital Marketer</h4>
                                </a>
                                <ul>
                                    <li>Creative Agency</li>
                                    <li><i class="fas fa-map-marker-alt"></i>Athens, Greece</li>
                                    <li>$3500 - $4000</li>
                                </ul>
                            </div>
                        </div>
                        <div class="items-link f-right">
                            <a href="">Full Time</a>
                            <span>7 hours ago</span>
                        </div>
                    </div>
                    <!-- single-job-content -->
                    <div class="single-job-items mb-30">
                        <div class="job-items">
                            <div class="company-img">
                                <a href=""><img src="{{ asset('frontend/assets/img/icon/job-list4.png') }}" alt=""></a>
                            </div>
                            <div class="job-tittle">
                                <a href="">
                                    <h4>Digital Marketer</h4>
                                </a>
                                <ul>
                                    <li>Creative Agency</li>
                                    <li><i class="fas fa-map-marker-alt"></i>Athens, Greece</li>
                                    <li>$3500 - $4000</li>
                                </ul>
                            </div>
                        </div>
                        <div class="items-link f-right">
                            <a href="">Full Time</a>
                            <span>7 hours ago</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Featured_job_end -->
@endsection
