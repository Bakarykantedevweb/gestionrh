@extends('layouts.frontend')
@section('content')
    <div class="header-inner bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-primary">Connexion</h2>
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="/"> Acceuil
                            </a></li>
                        <li class="breadcrumb-item active"> <i class="fas fa-chevron-right"></i> <span> Connexion
                            </span></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="space-ptb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-10 col-md-12">
                    <div class="login-register">
                        <div class="section-title center text-center">
                            <h2 class="title"><span>Connectez-vous à votre
                                    compte</span></h2>
                        </div>
                        <fieldset class="border-redush-0">
                            <ul class="nav nav-tabs nav-tabs-border d-flex" role="tablist">
                                <li class="nav-item me-4">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#candidate" role="tab"
                                        aria-selected="false">
                                        <div class="d-flex">
                                            <div class="tab-icon">
                                                <i class="fas fa-users"></i>
                                            </div>
                                            <div class="ms-3">
                                                <h6 class="mb-0">Candidat</h6>
                                                <p class="mb-0">Connectez-vous en tant que
                                                    candidat</p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </fieldset>
                        <div class="tab-content">
                            <div class="tab-pane active" id="candidate" role="tabpanel">
                                <form class="mt-4" method="POST" action="{{ route('login.store') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="mb-3 col-12">
                                            <label class="form-label" for="Email2">E-mail: <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="email" class="form-control" id="Email22">
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-12">
                                            <label class="form-label" for="password2">Mot de passe <span
                                                    class="text-danger">*</span></label>
                                            <input type="password" name="password" class="form-control" id="password32">
                                            @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row g-2">
                                        <div class="col-md-4">
                                            <button class="btn btn-primary d-grid" type="submit">Se Connecter</button>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="{{ route('google.redirect') }}">
                                                <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png" style="margin-left: 3em;">
                                            </a>
                                        </div>
                                        <div class="col-md-4">

                                            <div class="ms-md-3 mt-3 mt-md-0 forgot-pass">
                                                <a href="#">Mot de passe oublié ?</a>
                                                <p class="mt-1">Vous n'avez pas de compte? <a
                                                        href="{{ url('register-candidat') }}">Inscrivez-vous ici</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
