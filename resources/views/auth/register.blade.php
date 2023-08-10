@extends('layouts.auth')
@section('title', 'Gestion Scolaire | Inscription')
@section('content')
    <div class="account-content">
        <div class="container">

            <!-- Account Logo -->
            {{-- <div class="account-logo">
                <a href="/"><img src="assets/img/logo2.png" alt="Dreamguy's Technologies"></a>
            </div> --}}
            <!-- /Account Logo -->

            <div class="account-box">
                <div class="account-wrapper">
                    <h3 class="account-title">Inscription</h3>
                    <p class="account-subtitle">Accéder à votre tableau de bord</p>

                    <!-- Account Form -->
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" autocomplete="name" autofocus type="text">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
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
                            <label>Password</label>
                            <input class="form-control @error('password') is-invalid @enderror" name="password"
                                autocomplete="new-password" type="password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Repeat Password</label>
                            <input class="form-control" name="password_confirmation" autocomplete="new-password" type="password">
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-primary account-btn" type="submit">S'inscrire</button>
                        </div>
                        <div class="account-footer">
                            <p>Vous avez déjà un compte? <a href="{{ url('/') }}">Se connecter</a></p>
                        </div>
                    </form>
                    <!-- /Account Form -->
                </div>
            </div>
        </div>
    </div>
@endsection
