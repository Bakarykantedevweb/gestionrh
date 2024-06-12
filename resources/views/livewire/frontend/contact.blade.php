<div>
     <div class="header-inner bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-primary">Contactez-nous</h2>
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="/"> Acceuil
                            </a></li>
                        <li class="breadcrumb-item active"> <i class="fas fa-chevron-right"></i> <span> Contactez-nous
                            </span></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="space-ptb">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title">
                                <h2 class="title"><span>Entrons en contact !</span></h2>
                                <p>Nous avons réalisé plus de 1000+ projets pour cinq cents
                                    clients. Donnez-nous votre prochain projet.</p>
                            </div>
                        </div>
                    </div>
                    <form wire:submit.prevent="saveContact">
                        <div class="row g-2">
                            <div class="mb-2 col-md-6">
                                <input type="text" wire:model="nom_complet" class="form-control" id="Username"
                                    placeholder="Entrez votre nom complet">
                                @error('nom_complet')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-2 col-md-6">
                                <input type="text" wire:model="sujet" class="form-control" id="email" placeholder="Sujet">
                                @error('sujet')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-2 col-md-6">
                                <input type="text" wire:model="email" class="form-control" id="Password"
                                    placeholder="Entrez votre adresse email ">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-2 col-md-6">
                                <input type="text" wire:model="telephone" class="form-control" id="phone"
                                    placeholder="Entrez votre numero telephone">
                                @error('telephone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-12 mb-0">
                                <textarea rows="5" wire:model="message" class="form-control" id="sector" placeholder="Message"></textarea>
                                @error('message')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-12 mt-4">
                                <button class="btn btn-primary" type="submit">Envoyez votre message</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-xl-6 mt-4 mt-xl-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title">
                                <h2 class="title"><span>Coordonnées</span></h2>
                                <p>Comment pouvons-nous nous motiver? L’un des aspects les
                                    plus difficiles pour réussir est de rester motivé sur le
                                    long terme.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="border d-flex align-items-center p-4">
                                <i class="text-primary fas fa-map-marker-alt me-3 fa-3x"></i>
                                <div>
                                    <h5 class="mb-2">Adresse</h5>
                                    <span class="d-block">BP 15 Bamako Mali</span>
                                    <span>Boulevard de l’Indépendance </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="border d-flex align-items-center p-4">
                                <i class="text-primary fas fa-phone-alt me-3 fa-3x"></i>
                                <div>
                                    <h5 class="mb-2">Téléphone</h5>
                                    <span class="d-block">+223 20 22 50 66</span>
                                    <span>+223 20 22 51 11</span><br>
                                    <span>+223 20 22 51 08</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4 mb-md-0">
                            <div class="border d-flex align-items-center p-4">
                                <i class="text-primary far fa-envelope me-3 fa-3x"></i>
                                <div>
                                    <h5 class="mb-2">Email</h5>
                                    <span class="d-block">bim@bim.com.ml</span>
                                    <span>http://www.bim.com.ml</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border d-flex align-items-center p-4">
                                <i class="text-primary fas fa-fax me-3 fa-3x"></i>
                                <div>
                                    <h5 class="mb-2">Fax</h5>
                                    <span class="d-block">+223 20 22 45 66</span>
                                    <span>+223 73 28 20 20</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="space-pb ">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <div class="feature-info-02 text-start p-4 border">
                        <div class="feature-info-icon">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <div class="feature-info-content ps-0 ps-sm-3">
                            <h5 class="title text-dark">Discutez avec nous en ligne</h5>
                            <p class="mb-0">Discutez avec nous en ligne si vous avez des questions.</p>
                            <a class="mt-2 mb-0 d-block" href="http://www.bim.com.ml" target="_blank">Cliquez ici pour
                                ouvrir le chat</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <div class="feature-info-02 text-start p-4 border">
                        <div class="feature-info-icon">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="feature-info-content ps-0 ps-sm-3">
                            <h5>Appelez-nous</h5>
                            <p class="mb-0">Notre agent de support travaillera avec vous pour respecter votre prêt.</p>
                            <h5 class="mt-2 mb-0">+223 70-06-07-62</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="feature-info-02 text-start p-4 border">
                        <div class="feature-info-icon">
                            <i class="fas fa-comments"></i>
                        </div>
                        <div class="feature-info-content ps-0 ps-sm-3">
                            <h5>Lisez nos dernières nouvelles</h5>
                            <p class="mb-0">Visitez notre page Blog et en savoir plus sur les actualités.</p>
                            <a class="mt-2 mb-0 d-block" href="http://www.bim.com.ml" target="_blank">Lire l'article du
                                blog</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
