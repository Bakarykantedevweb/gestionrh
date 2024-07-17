<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="keywords" content="HTML5 Template" />
        <meta name="description" content="Jobster - Job Board HTML5 Template" />
        <meta name="author" content="potenzaglobalsolutions.com" />
        <meta name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>OptiRH</title>

        <!-- Favicon -->
        <link href="images/favicon.ico" rel="shortcut icon" />

        <!-- Google Font -->
        <link
            href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700"
            rel="stylesheet">

        <!-- CSS Global Compulsory (Do not remove)-->
        <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome/all.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('frontend/css/flaticon/flaticon.css') }}" />
        <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap/bootstrap.min.css') }}" />

        <!-- Page CSS Implementing Plugins (Remove the plugin CSS here if site does not use that feature)-->
        <link rel="stylesheet" href="{{ asset('frontend/css/owl-carousel/owl.carousel.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup/magnific-popup.css') }}" />
        <link rel="stylesheet" href="{{ asset('frontend/css/select2/select2.css') }}" />

        <!-- Template Style -->
        <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" />

        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

        @livewireStyles
    </head>

    <body>
       @include('layouts.inc.frontend.header')

        @yield('content')

        <section class="mb-n4 mb-lg-n5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-sm-12">
                        <div class="p-4 p-sm-5 bg-primary">
                            <div class="row">
                                <div class="col-xl-7 col-lg-6 mb-4 mb-lg-0">
                                    <h3 class="text-white">Téléchargez l'application</h3>
                                    <p class="text-white mb-0">Téléchargez dès maintenant les dernières applications d'emploi Slick.</p>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="d-block d-sm-flex">
                                        <a
                                            class="btn-app btn btn-white btn-sm me-0 me-sm-4 mb-2 mb-sm-0 py-2 ms-lg-auto"
                                            href="#">
                                            <i class="fab fa-apple"></i>
                                            <div class="btn-text text-start">
                                                <small
                                                    class="fw-normal">Téléchargez sur </small>
                                                <span class="mb-0 d-block">App
                                                    Store</span>
                                            </div>
                                        </a>
                                        <a
                                            class="btn-app btn btn-white btn-sm mb-2 mb-sm-0 py-2"
                                            href="#">
                                            <i class="fab fa-google-play"></i>
                                            <div class="btn-text text-start">
                                                <small class="fw-normal">Obtenez-le sur</small>
                                                <span
                                                    class="mb-0 d-block">Google
                                                    Play</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <footer class="footer bg-dark">
            <div class="container">
                <div class="row mt-4">
                    <div class="col-lg-3 col-md-6 mt-lg-0">
                        <div class="footer-contact-info">
                            <h5 class="mb-4 text-white">Contactez-nous</h5>
                            <ul class="list-unstyled mb-0">
                                <li> <i
                                        class="fas fa-map-marker-alt text-primary"></i><span>Boulevard de l’Indépendance Bolibana Dravela BP 15 Bamako Mali</span> </li>
                                <li> <i
                                        class="fas fa-mobile-alt text-primary"></i><span>+223 20 22 50 66</span> </li>
                                <li> <i
                                        class="far fa-envelope text-primary"></i><span>bim@bim.com.ml</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-link">
                            <h5 class="mb-4 text-white">Menu</h5>
                            <ul class="list-unstyled">
                                <li><a href="#">Acceuil</a></li>
                                <li><a href="#">Services</a></li>
                                <li><a href="#">Offres</a></li>
                                <li><a href="#">Contactez-nous</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mt-4 mt-md-0">
                        <div class="footer-link">
                            <h5 class="mb-4 text-white">Trending Companies</h5>
                            <ul class="list-unstyled">
                                <li><a href="#">Shortcodes</a></li>
                                <li><a href="#">Job Page</a></li>
                                <li><a href="#">Job Page Alternative</a></li>
                                <li><a href="#">Resume Page</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
                        <h5 class="mb-4 text-white">Abonnez-vous</h5>
                        <div class="footer-subscribe">
                            <p>Inscrivez-vous à notre newsletter pour recevoir les dernières nouvelles et offres.</p>
                            <form>
                                <div class="mb-3">
                                    <input type="email" class="form-control"
                                        id="exampleInputEmail1"
                                        placeholder="Enter email">
                                </div>
                                <button type="button"
                                    class="btn btn-primary btn-md">Recevez une notification</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <section class="bg-dark py-5">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 mb-4 mb-sm-5 mb-lg-0">
                            <div class="d-sm-flex">
                                <div
                                    class="align-self-center footer-top-logo"><img
                                        class="img-fluid"
                                        src="{{ asset('frontend/images/1.png') }}" alt></div>
                                <div
                                    class="ps-sm-3 ms-sm-3 mt-3 mt-sm-0 border-sm-left text-white">Créez un compte gratuit pour trouver des milliers d'emplois, d'emplois et d'opportunités de carrière autour de vous !</div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="counter mb-4 mb-sm-0">
                                        <div class="counter-icon">
                                            <i class="fas fa-file-contract"></i>
                                        </div>
                                        <div class="counter-content">
                                            <span class="timer mb-1 text-white"
                                                data-to="1049"
                                                data-speed="10000">1049</span>
                                            <label class="mb-0">Emplois affichés</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="counter mb-4 mb-sm-0">
                                        <div class="counter-icon">
                                            <i class="fas fa-briefcase"></i>
                                        </div>
                                        <div class="counter-content">
                                            <span class="timer mb-1 text-white"
                                                data-to="123"
                                                data-speed="10000">123</span>
                                            <label class="mb-0">Emplois pourvus</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="counter">
                                        <div class="counter-icon">
                                            <i class="fas fa-building"></i>
                                        </div>
                                        <div class="counter-content">
                                            <span class="timer mb-1 text-white"
                                                data-to="240"
                                                data-speed="10000">240</span>
                                            <label
                                                class="mb-0">Entreprises</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
            <div class="footer-bottom bg-dark">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 ">
                            <div
                                class="d-flex justify-content-md-start justify-content-center">
                                <ul class="list-unstyled d-flex mb-0">
                                    <li><a href="#">Politique de confidentialité</a></li>
                                </ul>
                            </div>
                        </div>
                        <div
                            class="col-md-6 text-center text-md-end mt-4 mt-md-0">
                            <p class="mb-0 text-white"> &copy;Copyright <span
                                    id="copyright">
                                    <script>document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))</script>
                                </span> <a href="#"> OptiRH </a> Tous droits réservés </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <div id="back-to-top" class="back-to-top">
            <i class="fas fa-angle-up"></i>
        </div>

        <!-- JS Global Compulsory (Do not remove)-->
        <script src="{{ asset('frontend/js/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('frontend/js/popper/popper.min.js') }}"></script>
        <script src="{{ asset('frontend/js/bootstrap/bootstrap.min.js') }}"></script>

        <!-- Page JS Implementing Plugins (Remove the plugin script here if site does not use that feature)-->
        <script src="{{ asset('frontend/js/jquery.appear.js') }}"></script>
        <script src="{{ asset('frontend/js/counter/jquery.countTo.js') }}"></script>
        <script src="{{ asset('frontend/js/owl-carousel/owl-carousel.min.js') }}"></script>
        <script src="{{ asset('frontend/js/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('frontend/js/select2/select2.full.js') }}"></script>

        <!-- Template Scripts (Do not remove)-->
        <script src="{{ asset('frontend/js/custom.js') }}"></script>
        @livewireScripts
    </body>

</html>
