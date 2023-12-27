<div class="main-wrapper">
    <div class="account-content">
        <a href="/" class="btn btn-primary apply-btn">Apply Job</a>
        <div class="container">

            <!-- Account Logo -->
            {{-- <div class="account-logo">
                <a href="/"><img src="{{ asset('admin/assets/img/logo2.png') }}" alt="Dreamguy's Technologies"></a>
            </div> --}}
            <!-- /Account Logo -->

            <div class="account-box">
                <div class="account-wrapper">
                    <h3 class="account-title">Creez un compte</h3>

                    <!-- Account Form -->
                    <form wire:submit.prevent="saveCandidat">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Prenom</label>
                                <input class="form-control" wire:model="prenom" type="text">
                                @error('prenom')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Nom</label>
                                <input class="form-control" wire:model="nom" type="text">
                                @error('nom')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Email</label>
                                <input class="form-control" wire:model="email" type="email">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Numero de Telephone</label>
                                <input class="form-control" wire:model="telephone" type="text">
                                @error('telephone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label>Mot de passe</label>
                                <input class="form-control" wire:model="password" type="password">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- <div class="form-group col-md-6">
                                <label>Confirmer Mot de passe</label>
                                <input class="form-control" wire:model="password_confirm" type="password">
                            </div> --}}
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-primary account-btn" type="submit">S'inscrie</button>
                        </div>
                        <div class="account-footer">
                            <p>Vous avez un compte ? <a href="{{ url('login-candidat') }}">Se Connecter</a></p>
                        </div>
                    </form>
                    <!-- /Account Form -->
                </div>
            </div>
        </div>
    </div>
</div>
