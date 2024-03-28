<div>
    <div class="account-content">
        <div class="container">

            <!-- Account Logo -->
            <div class="account-logo">
                <a href="/"><img src="admin/assets/img/or.jpg" alt="Dreamguy's Technologies"></a>
            </div>
            <!-- /Account Logo -->
            @include('layouts.partials.error')
            @include('layouts.partials.message')
            <div class="account-box">
                <div class="account-wrapper">
                    <!-- Account Form -->
                    @if (!$showInput)
                         <h3 class="account-title">Connexion</h3>
                        <p class="account-subtitle">Accéder à votre tableau de bord</p>
                        <form wire:submit.prevent="saveLogin">
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control @error('email') is-invalid @enderror" wire:model="email"
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
                                        <label>Mot de passe</label>
                                    </div>
                                </div>
                                <input class="form-control @error('password') is-invalid @enderror"
                                    wire:model="password" autocomplete="current-password" type="password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-primary account-btn" type="submit">Se Connecter</button>
                            </div>
                        </form>
                    @else
                         <h3 class="account-title">Changement de mot de passe</h3>
                        <p class="account-subtitle">Pour des raisons de securité veuillez changer votre mot de passe</p>
                        <form wire:submit.prevent="updatePassword">
                            <!-- Nouveau mot de passe -->
                            <div class="form-group">
                                <label>Nouveau mot de passe</label>
                                <input class="form-control" wire:model="newpassword" type="password">
                                @error('newpassword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Confirmation du nouveau mot de passe -->
                            <div class="form-group">
                                <label>Confirmez le nouveau mot de passe</label>
                                <input class="form-control" wire:model="confirmpassword" type="password">
                            </div>

                            <!-- Bouton de soumission -->
                            <div class="form-group text-center">
                                <button class="btn btn-primary account-btn" type="submit">Mettre à jour le mot de
                                    passe</button>
                            </div>
                        </form>
                    @endif
                    <div class="account-footer">
                        <p>Developpé par Bakary Kante <a href="{{ route('login') }}">Tout droit reservé</a></p>
                    </div>
                    <!-- /Account Form -->
                </div>
            </div>
        </div>
    </div>
</div>
