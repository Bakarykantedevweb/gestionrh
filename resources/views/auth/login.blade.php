@extends('layouts.auth')
@section('title','Gestion Scolaire | Connexion')
@section('content')
    <div class="account-content">
        <div class="container">

            <!-- Account Logo -->
            <div class="account-logo">
                <a href="/"><img src="admin/assets/img/logo2.png" alt="Dreamguy's Technologies"></a>
            </div>
            <!-- /Account Logo -->

            <div class="account-box">
                <div class="account-wrapper">
                    <h3 class="account-title">Connexion</h3>
                    <p class="account-subtitle">Accéder à votre tableau de bord</p>

                    <!-- Account Form -->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label>Email Address</label>
                            <input class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" autocomplete="email" autofocus type="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label>Password</label>
                                </div>
                                {{-- <div class="col-auto">
                                    <a class="text-muted" href="">
                                        Mot de passe oublié?
                                    </a>
                                </div> --}}
                            </div>
                            <input class="form-control @error('password') is-invalid @enderror" name="password"
                                autocomplete="current-password" type="password">
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-primary account-btn" type="submit">Se Connecter</button>
                        </div>
                        {{-- <div class="account-footer">
                            <p>Vous n'avez pas encore de compte ? <a href="{{ route('register') }}">S'inscrire</a></p>
                        </div> --}}
                    </form>
                    <!-- /Account Form -->

                </div>
            </div>
        </div>
    </div>
@endsection
