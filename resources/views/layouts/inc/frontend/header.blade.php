<header>
    <!-- Header Start -->
    <div class="header-area header-transparrent">
        <div class="headder-top header-sticky">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-2">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="/"><img src="{{ asset('frontend/assets/img/logo/logo.png') }}"
                                    alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="menu-wrapper">
                            <!-- Main-menu -->
                            <div class="main-menu">
                                <nav class="d-none d-lg-block">
                                    <ul id="navigation">
                                        <li><a href="">Acceuil</a></li>
                                        <li><a href="">Categories </a></li>
                                        <li><a href="">Offres</a></li>
                                        <li><a href="">Contact</a></li>
                                        @if (Auth::guard('candidat')->check())
                                            <li><a href="#">{{ Auth::guard('candidat')->user()->prenom.' '.Auth::guard('candidat')->user()->nom }}</a>
                                                <ul class="submenu">
                                                    <li><a href="">Mes Offres</a></li>
                                                    <li><a href="">Mon Profil</a></li>
                                                </ul>
                                            </li>
                                        @endif
                                    </ul>
                                </nav>
                            </div>
                            <!-- Header-btn -->
                            @if (Auth::guard('candidat')->check())
                            <div class="header-btn d-none f-right d-lg-block">
                                <a href="{{ url('logout-candidat') }}" class="btn head-btn2">Deconnexion</a>
                            </div>
                            @else
                            <div class="header-btn d-none f-right d-lg-block">
                                <a href="{{ url('register-candidat') }}" class="btn head-btn1">S'incrire</a>
                                <a href="{{ url('login-candidat') }}" class="btn head-btn2">Se Connecter</a>
                            </div>
                            @endif
                        </div>
                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>
