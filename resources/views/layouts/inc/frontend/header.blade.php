 <header class="header header-default">
            <nav
                class="navbar navbar-static-top navbar-expand-lg navbar-light header-sticky">
                <div class="container-fluid">
                    <button id="nav-icon4" type="button" class="navbar-toggler"
                        data-bs-toggle="collapse"
                        data-bs-target=".navbar-collapse">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <a class="navbar-brand" href="{{ route('frontend.index') }}">
                        <img class="img-fluid" src="{{ asset('frontend/images/1.png') }}" alt="logo">
                    </a>
                    <div class="navbar-collapse collapse justify-content-start">
                        <ul class="nav navbar-nav">
                            <li class="nav-item {{ request()->routeIs('frontend.index') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('frontend.index') }}">Acceuil</a>
                            </li>
                            <li class="nav-item {{ request()->routeIs('frontend.about') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('frontend.about') }}">A
                                    Propos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"
                                    href="">Offres</a>
                            </li>
                            <li class="nav-item {{ request()->routeIs('frontend.contact') ? 'active' : '' }}">
                                <a class="nav-link"
                                    href="{{ route('frontend.contact') }}">Contectez-nous</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle"
                                    href="javascript:void(0)"
                                    data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    Bakary Kante <i
                                        class="fas fa-chevron-down fa-xs"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-submenu">
                                        <a class
                                            href="">
                                            Tableau de bord
                                        </a>

                                    </li>
                                    <li><a class="dropdown-item"
                                            href="">Curriculum
                                            Vitae
                                            <span
                                                class="badge bg-danger ms-2">CV</span></a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="add-listing">
                        <div class="login d-inline-block me-4">
                            <a href="{{ route('login.index') }}">
                                <i class="far fa-user pe-2"></i>Se connecter</a>
                        </div>
                        <a class="btn btn-primary btn-md"
                            href="{{ route('register.index') }}">S'inscrire</a>
                    </div>
                </div>
            </nav>
        </header>
