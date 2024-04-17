@extends('layouts.frontend')
@section('content')
    <div class="header-inner bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-primary">Inscription</h2>
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="/"> Acceuil
                            </a></li>
                        <li class="breadcrumb-item active"> <i class="fas fa-chevron-right"></i> <span> S'inscrire
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
                            <h2 class="title"><span>Créez votre compte</span></h2>
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
                                <form class="mt-4">
                                    <div class="row g-2">
                                        <div class="mb-2 col-sm-6">
                                            <label class="form-label">Nom <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="mb-2 col-sm-6">
                                            <label class="form-label">Prenom <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="mb-2 col-sm-6">
                                            <label class="form-label">Nom d'utilisateur <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="mb-2 col-sm-6">
                                            <label class="form-label">E-mail <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="mb-2 col-12">
                                            <label class="form-label" for="phone">Telephone <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="mb-2 col-sm-6">
                                            <label class="form-label">Mot de passe <span
                                                    class="text-danger">*</span></label>
                                            <input type="password" class="form-control">
                                        </div>
                                        <div class="mb-2 col-sm-6">
                                            <label class="form-label" for="password2">Confirmez le mot de passe <span
                                                    class="text-danger">*</span></label>
                                            <input type="password" class="form-control" id="password2">
                                        </div>
                                        <div class="mb-3 col-12 mt-3">
                                            <div class="custom-control form-check">
                                                <input type="checkbox" class="form-check-input" id="accepts-02">
                                                <label class="custom-control-label form-check-label" for="accepts-02">Vous
                                                    acceptez nos Conditions générales d'utilisation et notre Politique de
                                                    confidentialité.</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-2">
                                        <div class="col-md-6">
                                            <a class="btn btn-primary d-block" href="#">S'inscrire</a>
                                        </div>
                                        <div class="col-md-6 text-md-end mt-2 text-center">
                                            <a href="#">Vous avez déjà un compte ?</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="mt-4">
                                <fieldset>
                                    <legend class="px-2">Connectez-vous avec</legend>
                                    <div class="social-login">
                                        <ul class="list-unstyled d-flex mb-0">
                                            <li class="google text-center">
                                                <a href="#"> <i class="fab fa-google me-3 me-md-4"></i>Connexion
                                                    avec Google</a>
                                            </li>
                                        </ul>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
