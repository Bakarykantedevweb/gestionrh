@extends('layouts.frontend')
@section('content')
    <div class="header-inner bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-primary">A propos de nous</h2>
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="/"> Acceuil
                            </a></li>
                        <li class="breadcrumb-item active"> <i class="fas fa-chevron-right"></i> <span> A propos de nous
                            </span></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="space-pt">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-6 col-md-10">
                    <h2 class="mb-4">Des millions d'emplois, trouvez celui qui vous
                        convient</h2>
                </div>
            </div>
            <div class="row text-center justify-content-center">
                <div class="col-lg-10">
                    <div class="text-center">
                        <p class="mb-lg-5 mb-4 lead">Nous connaissons également ces
                            histoires épiques, ces légendes modernes entourant les premiers
                            échecs de personnes aussi prospères que Michael Jordan et Bill
                            Gates. Nous pouvons remonter un peu plus loin dans le temps
                            jusqu’à Albert Einstein ou encore plus loin jusqu’à Abraham
                            Lincoln.</p>
                        <img class="img-fluid mt-lg-4 mt-3" src="{{ asset('frontend/images/about/05.png') }}" alt>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="space-ptb bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <div class="feature-info-02 text-start p-4 border bg-white">
                        <div class="feature-info-icon">
                            <i class="fas fa-file-contract"></i>
                        </div>
                        <div class="feature-info-content ps-0 ps-sm-3">
                            <h5 class="title text-dark">Annoncer un emploi</h5>
                            <p class="mb-0">Si le succès est un processus comportant un
                                certain nombre d’étapes définies.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <div class="feature-info-02 text-start p-4 border bg-white">
                        <div class="feature-info-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="feature-info-content ps-0 ps-sm-3">
                            <h5 class="title text-dark">Profils de recruteurs</h5>
                            <p class="mb-0">Il existe essentiellement six domaines clés pour
                                obtenir de meilleurs résultats.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="feature-info-02 text-start p-4 border bg-white">
                        <div class="feature-info-icon">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <div class="feature-info-content ps-0 ps-sm-3">
                            <h5 class="title text-dark">Trouvez l'emploi de vos rêves</h5>
                            <p class="mb-0">L'introspection est l'astuce. Comprenez ce que
                                vous voulez.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="space-ptb">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="row align-items-center">
                        <div class="col-sm-7">
                            <img class="img-fluid mb-4 mb-sm-0 w-100" src="{{ asset('frontend/images/about/01.jpg') }}" alt>
                        </div>
                        <div class="col-sm-5">
                            <img class="img-fluid mb-2 w-100" src="{{ asset('frontend/images/about/06.jpg') }}" alt>
                            <div class=" mt-4">
                                <a class="popup-icon popup-youtube bg-holder bg-overlay-black-70"
                                    href="">
                                    <i class="fas fa-play-circle"></i>
                                    <img class="img-fluid w-100" src="{{ asset('frontend/images/about/04.jpg') }}" alt>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 pt-2 pt-sm-3 pt-md-0">
                    <div class="section-title mb-4">
                        <h2 class="title"><span>Pourquoi avez-vous choisi ce métier
                                ?</span></h2>
                        <p>Je crois sincèrement que les paroles d'Augustin sont vraies et
                            si vous regardez l'histoire, vous savez qu'elles sont vraies. Il
                            existe de nombreuses personnes dans le monde dotées de talents
                            incroyables. qui ne réalisent qu’un petit pourcentage de leur
                            potentiel. Nous connaissons tous des gens qui vivent cette
                            vérité.</p>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="border d-flex align-items-center px-4 py-3 mb-4">
                                <i class="text-primary fas fa-user-tie me-3 fa-3x"></i>
                                <h5 class="mb-0">Personnages les plus talentueux</h5>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border d-flex align-items-center px-4 py-3 mb-4">
                                <i class="text-primary fas fa-search me-3 fa-3x"></i>
                                <h5 class="mb-0">Simple à trouver un candidat</h5>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border d-flex align-items-center px-4 py-3 mb-4 mb-md-0">
                                <i class="text-primary fas fa-comments me-3 fa-3x"></i>
                                <h5 class="mb-0">Clair pour communiquer</h5>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border d-flex align-items-center px-4 py-3">
                                <i class="text-primary fas fa-globe me-3 fa-3x"></i>
                                <h5 class="mb-0">Choix de recrutement</h5>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="space-pb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="bg-dark py-5">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6">
                                <div class="counter mb-5 mb-lg-0 justify-content-center">
                                    <div class="counter-icon">
                                        <i class="fas fa-file-contract"></i>
                                    </div>
                                    <div class="counter-content">
                                        <span class="timer mb-1 text-white" data-to="1227" data-speed="10000">1227</span>
                                        <label class="mb-0 text-white">Emplois affichés</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="counter mb-5 mb-lg-0 justify-content-center">
                                    <div class="counter-icon">
                                        <i class="fas fa-briefcase"></i>
                                    </div>
                                    <div class="counter-content">
                                        <span class="timer mb-1 text-white" data-to="123" data-speed="10000">123</span>
                                        <label class="mb-0 text-white">Emplois pourvus</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="counter mb-5 mb-sm-0 justify-content-center">
                                    <div class="counter-icon">
                                        <i class="fas fa-building"></i>
                                    </div>
                                    <div class="counter-content">
                                        <span class="timer mb-1 text-white" data-to="170" data-speed="10000">170</span>
                                        <label class="mb-0 text-white">Entreprises</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="counter justify-content-center">
                                    <div class="counter-icon">
                                        <i class="fas fa-users"></i>
                                    </div>
                                    <div class="counter-content">
                                        <span class="timer mb-1 text-white" data-to="127" data-speed="10000">127</span>
                                        <label class="mb-0 text-white">Membres</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="space-pb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div class="section-title center">
                        <h2 class="title"><span>Ce que nos clients satisfaits disent de
                                nous</span></h2>
                        <p>La concentration, c'est avoir l'attention inébranlable
                            nécessaire pour mener à bien ce que vous avez l'intention de
                            faire.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="owl-carousel owl-nav-bottom-center" data-nav-arrow="false" data-nav-dots="true"
                        data-items="1" data-md-items="1" data-sm-items="1" data-xs-items="1" data-xx-items="1"
                        data-space="0">
                        <div class="item">
                            <div class="testimonial-item text-center">
                                <div class="testimonial-quote position-absolute ms-2 ps-2 ms-sm-5 ps-sm-5 mt-4">
                                    <i class="fas fa-quote-left fa-3x text-primary"></i>
                                </div>
                                <div class="avatar">
                                    <img class="img-fluid rounded-circle" src="{{ asset('frontend/images/avatar/04.jpg') }}" alt>
                                </div>
                                <div class="testimonial-content">
                                    <p>Leur délai d'exécution pour résoudre tout problème n'est que de quelques minutes
                                        minutes, et c'est appréciable. Leurs affaires
                                        L'équipe de développement est toujours là pour vous aider à tout moment
                                        temps. Merci beaucoup pour tous vos efforts.</p>
                                </div>
                                <div class="testimonial-name">
                                    <h6 class="mb-1">Aissata Traore</h6>
                                    <span>Chef de Projet</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-item text-center">
                                <div class="testimonial-quote position-absolute ms-2 ps-2 ms-sm-5 ps-sm-5 mt-4">
                                    <i class="fas fa-quote-left fa-3x text-primary"></i>
                                </div>
                                <div class="avatar">
                                    <img class="img-fluid rounded-circle" src="{{ asset('frontend/images/avatar/01.jpg') }}" alt>
                                </div>
                                <div class="testimonial-content">
                                    <p>OptiRH est un excellent portail d'emploi. Nous valorisons les CV
                                        reçu par ce canal. Recherche et pouvoir magiques
                                        la recherche sont des outils pratiques. Nous sommes ravis de leur
                                        service.</p>
                                </div>
                                <div class="testimonial-name">
                                    <h6 class="mb-1 text-primary">Fousseyni Diallo</h6>
                                    <span>Designer graphique</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
