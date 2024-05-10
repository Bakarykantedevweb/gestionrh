<div>
    <section class="space-ptb bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="bg-white p-4 shadow-sm">
                        <div class="candidates-user-info">
                            <div class="jobster-user-info">
                                <div class="profile-avatar">
                                    <img class="img-fluid "
                                        src="{{ asset('uploads/frontend/candidat/profile/' . Auth::guard('webcandidat')->user()->photo) }}"
                                        alt>
                                    <i class="fas fa-pencil-alt"></i>
                                </div>
                                <div class="profile-avatar-info">
                                    <h3>{{ Auth::guard('webcandidat')->user()->prenom . ' ' . Auth::guard('webcandidat')->user()->nom }}
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="progress mt-2">
                            <div class="progress-bar" role="progressbar" style="width:85%" aria-valuenow="85"
                                aria-valuemin="0" aria-valuemax="100">
                            </div>
                        </div>
                        <div class="secondary-menu">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a class="{{ $dashboard ? ' active' : '' }}" href="#"
                                        wire:click="activeContent('{{ encrypt('dashboard') }}')" href="#">
                                        Tableau de Bord
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ $profile ? ' active' : '' }}" href="#"
                                        wire:click="activeContent('{{ encrypt('profile') }}')" href="#">
                                        Profile
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ $changePassword ? ' active' : '' }}" href="#"
                                        wire:click="activeContent('{{ encrypt('changePassword') }}')" href="#">
                                        Changer le Mot de passe
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ $cv ? ' active' : '' }}" href="#"
                                        wire:click="activeContent('{{ encrypt('cv') }}')" href="#">Mon cv
                                    </a>
                                </li>
                                {{-- <li>
                                    <a class="{{ $dashboard ? ' active' : '' }}" href="#"
                                        wire:click="activeContent('{{ encrypt('dashboard') }}')" href="#">Tableau de
                                        Bord
                                    </a>
                                </li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
                @if ($dashboard)
                    <div class="col-lg-9 mt-4 mt-lg-0">
                        <div class="row mb-3 mb-lg-4 mt-3 mt-lg-0">
                            <div class="col-sm-6 col-lg-4 mb-4 mb-lg-0">
                                <div class="candidates-feature-info shadow-sm border-0">
                                    <div class="candidates-info-icon text-primary">
                                        <i class="fas fa-globe-asia"></i>
                                    </div>
                                    <div class="candidates-info-content">
                                        <h6 class="candidates-info-title">Offres</h6>
                                    </div>
                                    <div class="candidates-info-count">
                                        <h3 class="mb-0">01</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4 mb-4 mb-lg-0">
                                <div class="candidates-feature-info shadow-sm border-0">
                                    <div class="candidates-info-icon text-primary">
                                        <i class="fas fa-thumbs-up"></i>
                                    </div>
                                    <div class="candidates-info-content">
                                        <h6 class="candidates-info-title">Acceptés</h6>
                                    </div>
                                    <div class="candidates-info-count">
                                        <h3 class="mb-0">00</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4 mb-4 mb-lg-0">
                                <div class="candidates-feature-info shadow-sm border-0">
                                    <div class="candidates-info-icon text-primary">
                                        <i class="fas fa-thumbs-down"></i>
                                    </div>
                                    <div class="candidates-info-content">
                                        <h6 class="candidates-info-title">Rejetés</h6>
                                    </div>
                                    <div class="candidates-info-count">
                                        <h3 class="mb-0">00</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="user-dashboard-info-box bg-white p-4 shadow-sm">
                            <div id="chart">
                            </div>
                        </div>
                        <div class="user-dashboard-info-box bg-white p-4 shadow-sm mb-0">
                            <div class="section-title mb-4">
                                <h4>Mes offres</h4>
                            </div>
                            <div class="row">
                                @forelse ($postulers as $postuler)
                                    <div class="col-12">
                                        <div class="job-list border-bottom">
                                            <div class="job-list-logo">
                                                <img class="img-fluid"
                                                    src="{{ asset('uploads/admin/offre/' . $postuler->offre->image) }}"
                                                    alt>
                                            </div>
                                            <div class="job-list-details">
                                                <div class="job-list-info">
                                                    <div class="job-list-title">
                                                        <h5 class="mb-0"><a
                                                                href="{{ url('offres/' . $postuler->offre->titre . '/detail') }}">{{ $postuler->offre->titre }}</a>
                                                        </h5>
                                                        @if ($postuler->status == '0')
                                                            <span class="part-time">En Attente</span>
                                                        @elseif ($postuler->status == '1')
                                                            <span class="freelance">Approuvée</span>
                                                        @elseif ($postuler->status == '2')
                                                            <span class="temporary">Rejetée</span>
                                                        @endif
                                                    </div>
                                                    <div class="job-list-option">
                                                        <ul class="list-unstyled">
                                                            <li> <span>via</span> <a href="">Banque
                                                                    Internationale
                                                                    pour la Mali</a> </li>
                                                            <li><i
                                                                    class="fas fa-filter pe-1"></i>{{ $postuler->offre->categorie->nom }}
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="job-list-favourite-time"><span
                                                    class="job-list-time order-1">{{ \Carbon\Carbon::parse($postuler->offre->date_publication)->isoFormat('LL') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <h2 class="text-center">Pas d'offre</h2>
                                @endforelse
                            </div>
                            <div class="row">
                                <div class="col-12 text-center mt-4 mt-md-5">
                                    <ul class="pagination justify-content-center mb-md-4 mb-0">
                                        <li class="page-item disabled"> <span class="page-link">Prev</span> </li>
                                        <li class="page-item active" aria-current="page"><span class="page-link">1
                                            </span>
                                            <span class="sr-only">(current)</span>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">...</a></li>
                                        <li class="page-item"><a class="page-link" href="#">25</a></li>
                                        <li class="page-item"> <a class="page-link" href="#">Next</a> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if ($profile)
                    <div class="col-lg-9 mt-4 mt-lg-0">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="user-dashboard-info-box bg-white p-4 shadow-sm">
                                    <div class="section-title-02 mb-2">
                                        <h4>Information de base</h4>
                                    </div>
                                    <form wire:submit.prevent=UpdateCandidat>
                                        <div class="cover-photo-contact">
                                            <div class="upload-file">
                                                <div class="custom-file">
                                                    <input type="file" wire:model="photo"
                                                        class="custom-file-input">
                                                    <label class="custom-file-label form-label">Mettre a jour la
                                                        Photo</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-2">
                                            <div class="mb-3 col-sm-6">
                                                <label class="form-label">Nom</label>
                                                <input type="text" wire:model="nom" class="form-control">
                                            </div>
                                            <div class="mb-3 col-sm-6">
                                                <label class="form-label">Prenom</label>
                                                <input type="text" wire:model="prenom" class="form-control">
                                            </div>
                                            <div class="mb-3 col-sm-6">
                                                <label class="form-label">Nom d'utilisateur</label>
                                                <input type="text" wire:model="username" class="form-control">
                                            </div>
                                            <div class="mb-3 col-sm-6">
                                                <label class="form-label">Email</label>
                                                <input type="email" wire:model="email" class="form-control">
                                            </div>
                                            <div class="mb-3 col-sm-6  mt-0">
                                                <label class="form-label">Telephone</label>
                                                <input type="text" wire:model="telephone" class="form-control">
                                            </div>
                                            <div class="mb-3 col-sm-6">
                                                <label class="form-label">Date de naissance</label>
                                                <input type="date" wire:model="date_naissance" class="form-control">
                                            </div>
                                            <div class="mb-3 col-sm-6">
                                                <label class="form-label">Adresse</label>
                                                <input type="text" wire:model="adresse" class="form-control">
                                            </div>
                                            <div class="mb-3 col-sm-6">
                                                <label class="form-label">Sexe</label>
                                                <select wire:model="sexe" class="form-control">
                                                    <option value="">---</option>
                                                    <option value="Homme">Homme</option>
                                                    <option value="Femme">Femme</option>
                                                </select>
                                            </div>
                                        </div>
                                        <button class="btn btn-md btn-primary mt-4" type="submit">Mettre a
                                            jour</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if ($changePassword)
                    <div class="col-lg-9 mt-4 mt-lg-0">
                        <div class="user-dashboard-info-box bg-white p-4 shadow-sm mb-0">
                            <div class="section-title-02 mb-4">
                                <h4>Changement de votre mot de passe</h4>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <form class="form-row" wire:submit.prevent="UpdatePassword">
                                        <div class="mb-3 col-md-12">
                                            <label class="form-label">Mot de passe actuel</label>
                                            <input type="password" class="form-control" wire:model="old_password">
                                            @error('old_password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-md-12">
                                            <label class="form-label">Nouveau mot de passe</label>
                                            <input type="password" class="form-control" wire:model="new_password">
                                            @error('new_password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mb-0">
                                            <label class="form-label">Confirmez le mot de passe</label>
                                            <input type="password" class="form-control"
                                                wire:model="confirm_password">
                                        </div>
                                        <button class="btn btn-lg btn-primary mt-4" type="submit">Mettre a
                                            jour</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if ($cv)
                    <div class="col-lg-9 mt-4 mt-lg-0">
                        <div class="row">
                            <div class="col-12">
                                <div class="user-dashboard-info-box bg-white p-4 shadow-sm">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="section-title-02 mb-4">
                                                <h3>Cirriculum Vitae</h3>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 text-lg-end">
                                            <a class="btn btn-primary btn-md mb-4" href="">Aperçu de mon cv</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="user-dashboard-info-box bg-white p-4 shadow-sm">
                                    <div class="dashboard-resume-title d-flex align-items-center">
                                        <div class="section-title-02 mb-sm-0">
                                            <h4 class="mb-0">Education</h4>
                                        </div>
                                        <a class="btn btn-md ms-sm-auto btn-primary" data-bs-toggle="collapse"
                                            href="#dateposted" role="button" aria-expanded="false"
                                            aria-controls="dateposted">Add Education</a>
                                    </div>
                                    <div class="collapse show" id="dateposted">
                                        <div class="bg-light p-3 mt-4">
                                            <form class="row g-2">
                                                <div class="mb-3 col-md-12">
                                                    <label class="form-label">Nom du diplome</label>
                                                    <input type="text" class="form-control" value="">
                                                </div>
                                                <div class="mb-3 col-sm-12 mt-0">
                                                    <label class="form-label">Nom de l'ecole</label>
                                                    <input type="text" class="form-control" value="">
                                                </div>
                                                <div class="mb-3 col-sm-6 select-border mt-0">
                                                    <label class="form-label">Date-Debut</label>
                                                    <select class="form-control basic-select">
                                                        <option value="value 01" selected="selected">2022</option>
                                                        <option value="value 02">2008</option>
                                                        <option value="value 03">2009</option>
                                                        <option value="value 04">2010</option>
                                                        <option value="value 05">2011</option>
                                                        <option value="value 06">2012</option>
                                                        <option value="value 07">2013</option>
                                                        <option value="value 08">2014</option>
                                                        <option value="value 09">2015</option>
                                                        <option value="value 10">2016</option>
                                                        <option value="value 11">2017</option>
                                                        <option value="value 12">2018</option>
                                                        <option value="value 13">2019</option>
                                                        <option value="value 14">2022</option>
                                                        <option value="value 15">2021</option>
                                                        <option value="value 16">2022</option>
                                                        <option value="value 17">2023</option>
                                                        <option value="value 18">2024</option>
                                                        <option value="value 19">2025</option>
                                                        <option value="value 20">2026</option>
                                                        <option value="value 21">2027</option>
                                                        <option value="value 22">2028</option>
                                                        <option value="value 23">2029</option>
                                                        <option value="value 14">2030</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3 col-sm-6 select-border mt-0">
                                                    <label class="form-label">Date Fin</label>
                                                    <select class="form-control basic-select">
                                                        <option value="value 01" selected="selected">2022</option>
                                                        <option value="value 02">2008</option>
                                                        <option value="value 03">2009</option>
                                                        <option value="value 04">2010</option>
                                                        <option value="value 05">2011</option>
                                                        <option value="value 06">2012</option>
                                                        <option value="value 07">2013</option>
                                                        <option value="value 08">2014</option>
                                                        <option value="value 09">2015</option>
                                                        <option value="value 10">2016</option>
                                                        <option value="value 11">2017</option>
                                                        <option value="value 12">2018</option>
                                                        <option value="value 13">2019</option>
                                                        <option value="value 14">2022</option>
                                                        <option value="value 15">2021</option>
                                                        <option value="value 16">2022</option>
                                                        <option value="value 17">2023</option>
                                                        <option value="value 18">2024</option>
                                                        <option value="value 19">2025</option>
                                                        <option value="value 20">2026</option>
                                                        <option value="value 21">2027</option>
                                                        <option value="value 22">2028</option>
                                                        <option value="value 23">2029</option>
                                                        <option value="value 14">2030</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3 col-md-12 mt-0">
                                                    <label class="form-label">Description</label>
                                                    <textarea class="form-control" rows="4"></textarea>
                                                </div>
                                                <div class="col-md-12 mb-0 mt-0">
                                                    <a class="btn btn-md btn-primary" href="#">Add</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    {{-- <div class="jobster-candidate-timeline mt-4">
                                        <div class="jobster-timeline-icon">
                                            <i class="fas fa-graduation-cap"></i>
                                        </div>
                                        <div class="jobster-timeline-item">
                                            <div class="jobster-timeline-cricle">
                                                <i class="far fa-circle"></i>
                                            </div>
                                            <div class="jobster-timeline-info">
                                                <div class="dashboard-timeline-info">
                                                    <div class="dashboard-timeline-edit">
                                                        <ul class="list-unstyled d-flex">
                                                            <li><a class="text-end" data-bs-toggle="collapse"
                                                                    href="#dateposted-02" role="button"
                                                                    aria-expanded="false" aria-controls="dateposted">
                                                                    <i class="fas fa-pencil-alt text-info me-2"></i>
                                                                </a></li>
                                                            <li><a href="#"><i
                                                                        class="far fa-trash-alt text-danger"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <span class="jobster-timeline-time">2018 - Pres</span>
                                                    <h6 class="mb-2">Masters in Software Engineering</h6>
                                                    <span>- Engineering University</span>
                                                    <p class="mt-2">This is the beginning of creating the life that
                                                        you want to live. Know what the future holds for you as a result
                                                        of the choice you can make today.</p>
                                                </div>
                                                <div class="collapse show" id="dateposted-02">
                                                    <div class="bg-light p-3">
                                                        <form class="row g-2 collapse show" id="dateposted-01">
                                                            <div class="mb-3 col-md-12">
                                                                <label class="form-label">Title</label>
                                                                <input type="text" class="form-control"
                                                                    value="Masters in Software Engineering">
                                                            </div>
                                                            <div class="mb-3 col-sm-6 select-border mt-0">
                                                                <label class="form-label">Year</label>
                                                                <select class="form-control basic-select">
                                                                    <option value="value 01" selected="selected">2022
                                                                    </option>
                                                                    <option value="value 02">2008</option>
                                                                    <option value="value 03">2009</option>
                                                                    <option value="value 04">2010</option>
                                                                    <option value="value 05">2011</option>
                                                                    <option value="value 06">2012</option>
                                                                    <option value="value 07">2013</option>
                                                                    <option value="value 08">2014</option>
                                                                    <option value="value 09">2015</option>
                                                                    <option value="value 10">2016</option>
                                                                    <option value="value 11">2017</option>
                                                                    <option value="value 12">2018</option>
                                                                    <option value="value 13">2019</option>
                                                                    <option value="value 14">2022</option>
                                                                    <option value="value 15">2021</option>
                                                                    <option value="value 16">2022</option>
                                                                    <option value="value 17">2023</option>
                                                                    <option value="value 18">2024</option>
                                                                    <option value="value 19">2025</option>
                                                                    <option value="value 20">2026</option>
                                                                    <option value="value 21">2027</option>
                                                                    <option value="value 22">2028</option>
                                                                    <option value="value 23">2029</option>
                                                                    <option value="value 14">2030</option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3 col-sm-6 mt-0">
                                                                <label class="form-label">Institute</label>
                                                                <input type="text" class="form-control"
                                                                    value="Engineering University">
                                                            </div>
                                                            <div class="mb-3 col-md-12 mt-0">
                                                                <label class="form-label">Description</label>
                                                                <textarea class="form-control" rows="4"
                                                                    placeholder="This is the beginning of creating the life that you want to live. Know what the future holds for you as a result of the choice you can make today."></textarea>
                                                            </div>
                                                            <div class="col-md-12 mb-0 mt-0">
                                                                <a class="btn btn-md btn-primary"
                                                                    href="#">Update</a>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="jobster-timeline-item mb-0">
                                            <div class="jobster-timeline-cricle">
                                                <i class="far fa-circle"></i>
                                            </div>
                                            <div class="jobster-timeline-info">
                                                <div class="dashboard-timeline-info">
                                                    <div class="dashboard-timeline-edit">
                                                        <ul class="list-unstyled d-flex">
                                                            <li><a class="text-end" data-bs-toggle="collapse"
                                                                    href="#dateposted-03" role="button"
                                                                    aria-expanded="false" aria-controls="dateposted">
                                                                    <i class="fas fa-pencil-alt text-info me-2"></i>
                                                                </a></li>
                                                            <li><a href="#"><i
                                                                        class="far fa-trash-alt text-danger"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <span class="jobster-timeline-time">2014 - 2018</span>
                                                    <h6 class="mb-2">Diploma in Graphics Design</h6>
                                                    <span>- Graphic Arts Institute</span>
                                                    <p class="mt-2">Have some fun and hypnotize yourself to be your
                                                        very own “Ghost of Christmas future” and see what the future
                                                        holds for you.</p>
                                                </div>
                                                <div class="collapse" id="dateposted-03">
                                                    <div class="bg-light p-3">
                                                        <form class="row g-2 collapse show" id="dateposted-04">
                                                            <div class="mb-3 col-md-12">
                                                                <label class="form-label">Title</label>
                                                                <input type="text" class="form-control"
                                                                    value="Diploma in Graphics Design">
                                                            </div>
                                                            <div class="mb-3 col-md-6 select-border mt-0">
                                                                <label class="form-label">Year</label>
                                                                <select class="form-control basic-select">
                                                                    <option value="value 01" selected="selected">2022
                                                                    </option>
                                                                    <option value="value 02">2008</option>
                                                                    <option value="value 03">2009</option>
                                                                    <option value="value 04">2010</option>
                                                                    <option value="value 05">2011</option>
                                                                    <option value="value 06">2012</option>
                                                                    <option value="value 07">2013</option>
                                                                    <option value="value 08">2014</option>
                                                                    <option value="value 09">2015</option>
                                                                    <option value="value 10">2016</option>
                                                                    <option value="value 11">2017</option>
                                                                    <option value="value 12">2018</option>
                                                                    <option value="value 13">2019</option>
                                                                    <option value="value 14">2022</option>
                                                                    <option value="value 15">2021</option>
                                                                    <option value="value 16">2022</option>
                                                                    <option value="value 17">2023</option>
                                                                    <option value="value 18">2024</option>
                                                                    <option value="value 19">2025</option>
                                                                    <option value="value 20">2026</option>
                                                                    <option value="value 21">2027</option>
                                                                    <option value="value 22">2028</option>
                                                                    <option value="value 23">2029</option>
                                                                    <option value="value 14">2030</option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3 col-md-6 mt-0">
                                                                <label class="form-label">Institute</label>
                                                                <input type="text" class="form-control"
                                                                    value="Graphic Arts Institute">
                                                            </div>
                                                            <div class="mb-3 col-md-12 mt-0">
                                                                <label class="form-label">Description</label>
                                                                <textarea class="form-control" rows="4"
                                                                    placeholder="Have some fun and hypnotize yourself to be your very own “Ghost of Christmas future” and see what the future holds for you."></textarea>
                                                            </div>
                                                            <div class="col-md-12 mb-0 mt-0">
                                                                <a class="btn btn-md btn-primary"
                                                                    href="#">Update</a>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                                <div class="user-dashboard-info-box bg-white p-4 shadow-sm">
                                    <div class="dashboard-resume-title d-flex align-items-center">
                                        <div class="section-title-02 mb-sm-0">
                                            <h4 class="mb-0">Work & Experience</h4>
                                        </div>
                                        <a class="btn btn-md ms-sm-auto btn-primary" data-bs-toggle="collapse"
                                            href="#dateposted-05" role="button" aria-expanded="false"
                                            aria-controls="dateposted">Add Experience</a>
                                    </div>
                                    <div class="collapse show" id="dateposted-05">
                                        <div class="bg-light p-3 mt-4">
                                            <form class="row g-2">
                                                <div class="mb-3 col-md-12">
                                                    <label class="form-label">Title</label>
                                                    <input type="text" class="form-control" value="">
                                                </div>
                                                <div class="mb-3 col-md-12 mt-0">
                                                    <label class="form-label">Company name</label>
                                                    <input type="text" class="form-control" value="">
                                                </div>
                                                <div class="mb-3 col-sm-6 select-border mt-0">
                                                    <label class="form-label">From</label>
                                                    <div class="input-group date" id="datetimepicker-01"
                                                        data-target-input="nearest">
                                                        <input type="text"
                                                            class="form-control datetimepicker-input"
                                                            value="14/09/2017" data-target="#datetimepicker-01">
                                                        <div class="input-group-append d-flex"
                                                            data-target="#datetimepicker-01"
                                                            data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i
                                                                    class="far fa-calendar-alt"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 col-sm-6 select-border mt-0">
                                                    <label class="form-label">Two</label>
                                                    <div class="input-group date" id="datetimepicker-02"
                                                        data-target-input="nearest">
                                                        <input type="text"
                                                            class="form-control datetimepicker-input"
                                                            value="08/11/2021" data-target="#datetimepicker-02">
                                                        <div class="input-group-append d-flex"
                                                            data-target="#datetimepicker-02"
                                                            data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i
                                                                    class="far fa-calendar-alt"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 col-md-12 mt-0">
                                                    <label class="form-label">Description</label>
                                                    <textarea class="form-control" rows="4"></textarea>
                                                </div>
                                                <div class="col-md-12 mb-0 mt-0">
                                                    <a class="btn btn-md btn-primary" href="#">Add</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    {{-- <div class="jobster-candidate-timeline mt-4">
                                        <div class="jobster-timeline-icon">
                                            <i class="fas fa-briefcase"></i>
                                        </div>
                                        <div class="jobster-timeline-item">
                                            <div class="jobster-timeline-cricle">
                                                <i class="far fa-circle"></i>
                                            </div>
                                            <div class="jobster-timeline-info">
                                                <div class="dashboard-timeline-info">
                                                    <div class="dashboard-timeline-edit">
                                                        <ul class="list-unstyled d-flex">
                                                            <li><a class="text-end" data-bs-toggle="collapse"
                                                                    href="#dateposted-06" role="button"
                                                                    aria-expanded="false" aria-controls="dateposted">
                                                                    <i class="fas fa-pencil-alt text-info me-2"></i>
                                                                </a></li>
                                                            <li><a href="#"><i
                                                                        class="far fa-trash-alt text-danger"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <span class="jobster-timeline-time">2019-6-01 to 2022-6-01</span>
                                                    <h6 class="mb-2">Web Designer</h6>
                                                    <span>- Inwave Studio</span>
                                                    <p class="mt-2">One of the main areas that I work on with my
                                                        clients is shedding these non-supportive beliefs and replacing
                                                        them with beliefs that will help them to accomplish their
                                                        desires.</p>
                                                </div>
                                                <div class="collapse show" id="dateposted-06">
                                                    <div class="bg-light p-3">
                                                        <form class="row g-2 collapse show" id="dateposted-form-01">
                                                            <div class="mb-3 col-md-12">
                                                                <label class="form-label">Title</label>
                                                                <input type="text" class="form-control"
                                                                    value="Web Designer">
                                                            </div>
                                                            <div class="mb-3 col-md-12 mt-0">
                                                                <label class="form-label">Company name</label>
                                                                <input type="text" class="form-control"
                                                                    value="Inwave Studio">
                                                            </div>
                                                            <div class="mb-3 col-sm-6 select-border mt-0">
                                                                <label class="form-label">From</label>
                                                                <div class="input-group date" id="datetimepicker-03"
                                                                    data-target-input="nearest">
                                                                    <input type="text"
                                                                        class="form-control datetimepicker-input"
                                                                        value="08/11/1999"
                                                                        data-target="#datetimepicker-03">
                                                                    <div class="input-group-append d-flex"
                                                                        data-target="#datetimepicker-03"
                                                                        data-toggle="datetimepicker">
                                                                        <div class="input-group-text"><i
                                                                                class="far fa-calendar-alt"></i></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 col-sm-6 select-border mt-0">
                                                                <label class="form-label">Two</label>
                                                                <div class="input-group date" id="datetimepicker-04"
                                                                    data-target-input="nearest">
                                                                    <input type="text"
                                                                        class="form-control datetimepicker-input"
                                                                        value="08/11/1999"
                                                                        data-target="#datetimepicker-04">
                                                                    <div class="input-group-append d-flex"
                                                                        data-target="#datetimepicker-04"
                                                                        data-toggle="datetimepicker">
                                                                        <div class="input-group-text"><i
                                                                                class="far fa-calendar-alt"></i></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 col-md-12 mt-0">
                                                                <label class="form-label">Description</label>
                                                                <textarea class="form-control" rows="4"
                                                                    placeholder="One of the main areas that I work on with my clients is shedding these non-supportive beliefs and replacing them with beliefs that will help them to accomplish their desires."></textarea>
                                                            </div>
                                                            <div class="col-md-12 mb-0 mt-0">
                                                                <a class="btn btn-md btn-primary"
                                                                    href="#">Update</a>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="jobster-timeline-item mb-0">
                                            <div class="jobster-timeline-cricle">
                                                <i class="far fa-circle"></i>
                                            </div>
                                            <div class="jobster-timeline-info">
                                                <div class="dashboard-timeline-info">
                                                    <div class="dashboard-timeline-edit">
                                                        <ul class="list-unstyled d-flex">
                                                            <li><a class="text-end" data-bs-toggle="collapse"
                                                                    href="#dateposted-07" role="button"
                                                                    aria-expanded="false" aria-controls="dateposted">
                                                                    <i class="fas fa-pencil-alt text-info me-2"></i>
                                                                </a></li>
                                                            <li><a href="#"><i
                                                                        class="far fa-trash-alt text-danger"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <span class="jobster-timeline-time">2019-6-01 to 2022-6-01</span>
                                                    <h6 class="mb-2">Secondary School Certificate</h6>
                                                    <span>- Engineering High School</span>
                                                    <p class="mt-2">Figure out what you want, put a plan together to
                                                        achieve it, understand the cost, believe in yourself then go and
                                                        get it!</p>
                                                </div>
                                                <div class="collapse" id="dateposted-07">
                                                    <div class="bg-light p-3">
                                                        <form class="row g-2 collapse show" id="dateposted-form-02">
                                                            <div class="mb-3 col-md-12">
                                                                <label class="form-label">Title</label>
                                                                <input type="text" class="form-control"
                                                                    value="Secondary School Certificate">
                                                            </div>
                                                            <div class="mb-3 col-md-12 mt-0">
                                                                <label class="form-label">Company name</label>
                                                                <input type="text" class="form-control"
                                                                    value="Engineering High School">
                                                            </div>
                                                            <div class="mb-3 col-md-6 select-border mt-0">
                                                                <label class="form-label">From</label>
                                                                <div class="input-group date" id="datetimepicker-05"
                                                                    data-target-input="nearest">
                                                                    <input type="text"
                                                                        class="form-control datetimepicker-input"
                                                                        value="08/11/1999"
                                                                        data-target="#datetimepicker-05">
                                                                    <div class="input-group-append d-flex"
                                                                        data-target="#datetimepicker-05"
                                                                        data-toggle="datetimepicker">
                                                                        <div class="input-group-text"><i
                                                                                class="far fa-calendar-alt"></i></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 col-md-6 select-border mt-0">
                                                                <label class="form-label">Two</label>
                                                                <div class="input-group date" id="datetimepicker-06"
                                                                    data-target-input="nearest">
                                                                    <input type="text"
                                                                        class="form-control datetimepicker-input"
                                                                        value="08/11/1999"
                                                                        data-target="#datetimepicker-06">
                                                                    <div class="input-group-append d-flex"
                                                                        data-target="#datetimepicker-06"
                                                                        data-toggle="datetimepicker">
                                                                        <div class="input-group-text"><i
                                                                                class="far fa-calendar-alt"></i></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 col-md-12 mt-0">
                                                                <label class="form-label">Description</label>
                                                                <textarea class="form-control" rows="4"
                                                                    placeholder="Figure out what you want, put a plan together to achieve it, understand the cost, believe in yourself then go and get it!"></textarea>
                                                            </div>
                                                            <div class="col-md-12 mb-0 mt-0">
                                                                <a class="btn btn-md btn-primary"
                                                                    href="#">Update</a>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                                <div class="user-dashboard-info-box bg-white p-4 shadow-sm">
                                    <div class="dashboard-resume-title d-flex align-items-center">
                                        <div class="section-title-02 mb-sm-0">
                                            <h4 class="mb-0">Professional Skill</h4>
                                        </div>
                                        <a class="btn btn-md ms-sm-auto btn-primary" href="#">Add Skill</a>
                                    </div>
                                    <div class="collapse show" id="dateposted-11">
                                        <div class="bg-light p-3 mt-4">
                                            <form class="row g-2 align-items-center">
                                                <div class="mb-3 col-sm-6">
                                                    <label class="form-label">Title</label>
                                                    <input type="text" class="form-control" value="Photoshop">
                                                </div>
                                                <div class="mb-3 col-sm-5">
                                                    <label class="form-label">Percentage</label>
                                                    <input type="text" class="form-control" value="70%">
                                                </div>
                                                <div class="mb-3 col-sm-1 text-sm-center">
                                                    <a class="mt-3 d-block" href="#"><i
                                                            class="far fa-trash-alt text-danger"></i></a>
                                                </div>
                                            </form>
                                            <form class="row g-2 align-items-center">
                                                <div class="mb-3 col-sm-6">
                                                    <label class="form-label">Title</label>
                                                    <input type="text" class="form-control" value="HTML/CSS">
                                                </div>
                                                <div class="mb-3 col-sm-5">
                                                    <label class="form-label">Percentage</label>
                                                    <input type="text" class="form-control" value="55%">
                                                </div>
                                                <div class="mb-3 col-sm-1 text-sm-center">
                                                    <a class="mt-3 d-block" href="#"><i
                                                            class="far fa-trash-alt text-danger"></i></a>
                                                </div>
                                            </form>
                                            <form class="row g-2 align-items-center">
                                                <div class="mb-3 col-sm-6">
                                                    <label class="form-label">Title</label>
                                                    <input type="text" class="form-control" value="JavaScript80">
                                                </div>
                                                <div class="mb-3 col-sm-5">
                                                    <label class="form-label">Percentage</label>
                                                    <input type="text" class="form-control" value="80%">
                                                </div>
                                                <div class="mb-3 col-sm-1 text-sm-center">
                                                    <a class="mt-3 d-block" href="#"><i
                                                            class="far fa-trash-alt text-danger"></i></a>
                                                </div>
                                            </form>
                                            <form class="row g-2 align-items-center">
                                                <div class="mb-3 col-sm-6">
                                                    <label class="form-label">Title</label>
                                                    <input type="text" class="form-control" value="PHP">
                                                </div>
                                                <div class="mb-3 col-sm-5">
                                                    <label class="form-label">Percentage</label>
                                                    <input type="text" class="form-control" value="60%">
                                                </div>
                                                <div class="mb-3 col-sm-1 text-sm-center">
                                                    <a class="mt-3 d-block" href="#"><i
                                                            class="far fa-trash-alt text-danger"></i></a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="user-dashboard-info-box bg-white p-4 shadow-sm">
                                    <div class="dashboard-resume-title d-flex align-items-center">
                                        <div class="section-title-02 mb-sm-0">
                                            <h4 class="mb-0">Awards</h4>
                                        </div>
                                        <a class="btn btn-md ms-sm-auto btn-primary" data-bs-toggle="collapse"
                                            href="#dateposted-15" role="button" aria-expanded="false"
                                            aria-controls="dateposted">Add Awards</a>
                                    </div>
                                    <div class="collapse show" id="dateposted-15">
                                        <div class="bg-light p-3 mt-4">
                                            <form class="row g-2">
                                                <div class="mb-3 col-md-12">
                                                    <label class="form-label">Title</label>
                                                    <input type="text" class="form-control" value="">
                                                </div>
                                                <div class="mb-3 col-md-12 mt-0">
                                                    <label class="form-label">Institute</label>
                                                    <input type="text" class="form-control" value="">
                                                </div>
                                                <div class="mb-3 col-sm-6 select-border mt-0">
                                                    <label class="form-label">From</label>
                                                    <div class="input-group date" id="datetimepicker-10"
                                                        data-target-input="nearest">
                                                        <input type="text"
                                                            class="form-control datetimepicker-input"
                                                            value="08/11/2017" data-target="#datetimepicker-10">
                                                        <div class="input-group-append d-flex"
                                                            data-target="#datetimepicker-10"
                                                            data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i
                                                                    class="far fa-calendar-alt"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 col-sm-6 select-border mt-0">
                                                    <label class="form-label">Two</label>
                                                    <div class="input-group date" id="datetimepicker-11"
                                                        data-target-input="nearest">
                                                        <input type="text"
                                                            class="form-control datetimepicker-input"
                                                            value="08/11/2022" data-target="#datetimepicker-11">
                                                        <div class="input-group-append d-flex"
                                                            data-target="#datetimepicker-11"
                                                            data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i
                                                                    class="far fa-calendar-alt"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 col-md-12 mt-0">
                                                    <label class="form-label">Description</label>
                                                    <textarea class="form-control" rows="4"></textarea>
                                                </div>
                                                <div class="col-md-12 mb-0 mt-0">
                                                    <a class="btn btn-md btn-primary" href="#">Add</a>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="jobster-candidate-timeline mt-4">
                                            <div class="jobster-timeline-icon">
                                                <i class="fas fa-trophy"></i>
                                            </div>
                                            <div class="jobster-timeline-item">
                                                <div class="jobster-timeline-cricle">
                                                    <i class="far fa-circle"></i>
                                                </div>
                                                <div class="jobster-timeline-info">
                                                    <div class="dashboard-timeline-info">
                                                        <div class="dashboard-timeline-edit">
                                                            <ul class="list-unstyled d-flex">
                                                                <li><a class="text-end" data-bs-toggle="collapse"
                                                                        href="#dateposted-16" role="button"
                                                                        aria-expanded="false"
                                                                        aria-controls="dateposted"> <i
                                                                            class="fas fa-pencil-alt text-info me-2"></i>
                                                                    </a></li>
                                                                <li><a href="#"><i
                                                                            class="far fa-trash-alt text-danger"></i></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <span class="jobster-timeline-time">2008 - 2012</span>
                                                        <h6 class="mb-2">Perfect Attendance Programs</h6>
                                                        <span>- Engineering High School</span>
                                                        <p class="mt-2">Having clarity of purpose and a clear picture
                                                            of what you desire, is probably the single most important
                                                            factor in achievement. Why is Clarity so important?</p>
                                                    </div>
                                                    <div class="collapse show" id="dateposted-16">
                                                        <div class="bg-light p-3">
                                                            <form class="row g-2 collapse show"
                                                                id="dateposted-form-07">
                                                                <div class="mb-3 col-md-12">
                                                                    <label class="form-label">Title</label>
                                                                    <input type="text" class="form-control"
                                                                        value="Perfect Attendance Programs">
                                                                </div>
                                                                <div class="mb-3 col-md-12 mt-0">
                                                                    <label class="form-label">Institute</label>
                                                                    <input type="text" class="form-control"
                                                                        value="Engineering High School">
                                                                </div>
                                                                <div class="mb-3 col-sm-6 select-border mt-0">
                                                                    <label class="form-label">From</label>
                                                                    <div class="input-group date"
                                                                        id="datetimepicker-12"
                                                                        data-target-input="nearest">
                                                                        <input type="text"
                                                                            class="form-control datetimepicker-input"
                                                                            value="08/11/1999"
                                                                            data-target="#datetimepicker-12">
                                                                        <div class="input-group-append d-flex"
                                                                            data-target="#datetimepicker-12"
                                                                            data-toggle="datetimepicker">
                                                                            <div class="input-group-text"><i
                                                                                    class="far fa-calendar-alt"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3 col-sm-6 select-border mt-0">
                                                                    <label class="form-label">Two</label>
                                                                    <div class="input-group date"
                                                                        id="datetimepicker-13"
                                                                        data-target-input="nearest">
                                                                        <input type="text"
                                                                            class="form-control datetimepicker-input"
                                                                            value="08/11/1999"
                                                                            data-target="#datetimepicker-13">
                                                                        <div class="input-group-append d-flex"
                                                                            data-target="#datetimepicker-13"
                                                                            data-toggle="datetimepicker">
                                                                            <div class="input-group-text"><i
                                                                                    class="far fa-calendar-alt"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3 col-md-12 mt-0">
                                                                    <label class="form-label">Description</label>
                                                                    <textarea class="form-control" rows="4"
                                                                        placeholder="Having clarity of purpose and a clear picture of what you desire, is probably the single most important factor in achievement. Why is Clarity so important?"></textarea>
                                                                </div>
                                                                <div class="col-md-12 mb-0 mt-0">
                                                                    <a class="btn btn-md btn-primary"
                                                                        href="#">Update</a>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="jobster-timeline-item mb-0">
                                                <div class="jobster-timeline-cricle">
                                                    <i class="far fa-circle"></i>
                                                </div>
                                                <div class="jobster-timeline-info">
                                                    <div class="dashboard-timeline-info">
                                                        <div class="dashboard-timeline-edit">
                                                            <ul class="list-unstyled d-flex">
                                                                <li><a class="text-end" data-bs-toggle="collapse"
                                                                        href="#dateposted-17" role="button"
                                                                        aria-expanded="false"
                                                                        aria-controls="dateposted"> <i
                                                                            class="fas fa-pencil-alt text-info me-2"></i>
                                                                    </a></li>
                                                                <li><a href="#"><i
                                                                            class="far fa-trash-alt text-danger"></i></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <span class="jobster-timeline-time">2012 - 2014</span>
                                                        <h6 class="mb-2">Secondary School Certificate</h6>
                                                        <span>- Engineering High School</span>
                                                        <p class="mt-2">So, make the decision to move forward. Commit
                                                            your decision to paper, just to bring it into focus. Then,
                                                            go for it!</p>
                                                    </div>
                                                    <div class="collapse" id="dateposted-17">
                                                        <div class="bg-light p-3">
                                                            <form class="row g-2 collapse show"
                                                                id="dateposted-form-08">
                                                                <div class="mb-3 col-md-12">
                                                                    <label class="form-label">Title</label>
                                                                    <input type="text" class="form-control"
                                                                        value="Secondary School Certificate">
                                                                </div>
                                                                <div class="mb-3 col-md-12 mt-0">
                                                                    <label class="form-label">Institute</label>
                                                                    <input type="text" class="form-control"
                                                                        value="Engineering High School">
                                                                </div>
                                                                <div class="mb-3 col-md-6 select-border mt-0">
                                                                    <label class="form-label">From</label>
                                                                    <div class="input-group date"
                                                                        id="datetimepicker-14"
                                                                        data-target-input="nearest">
                                                                        <input type="text"
                                                                            class="form-control datetimepicker-input"
                                                                            value="08/11/2017"
                                                                            data-target="#datetimepicker-14">
                                                                        <div class="input-group-append d-flex"
                                                                            data-target="#datetimepicker-14"
                                                                            data-toggle="datetimepicker">
                                                                            <div class="input-group-text"><i
                                                                                    class="far fa-calendar-alt"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3 col-md-6 select-border mt-0">
                                                                    <label class="form-label">Two</label>
                                                                    <div class="input-group date"
                                                                        id="datetimepicker-15"
                                                                        data-target-input="nearest">
                                                                        <input type="text"
                                                                            class="form-control datetimepicker-input"
                                                                            value="08/11/2022"
                                                                            data-target="#datetimepicker-15">
                                                                        <div class="input-group-append d-flex"
                                                                            data-target="#datetimepicker-15"
                                                                            data-toggle="datetimepicker">
                                                                            <div class="input-group-text"><i
                                                                                    class="far fa-calendar-alt"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3 col-md-12 mt-0">
                                                                    <label class="form-label">Description</label>
                                                                    <textarea class="form-control" rows="4"
                                                                        placeholder="So, make the decision to move forward. Commit your decision to paper, just to bring it into focus. Then, go for it!"></textarea>
                                                                </div>
                                                                <div class="col-md-12 mb-0 mt-0">
                                                                    <a class="btn btn-md btn-primary"
                                                                        href="#">Update</a>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a class="btn btn-md btn-primary mt-4" href="#">Save Settings</a>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
</div>
