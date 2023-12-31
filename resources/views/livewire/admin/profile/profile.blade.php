<div>
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Profile</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->
    @include('layouts.partials.message')
    <div class="card mb-0">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="profile-view">
                        <div class="profile-img-wrap">
                            <div class="profile-img">
                                <a href="#">
                                    @if (Auth::user()->photo)
                                        <img alt="" src="{{ asset('uploads/admin/profile/'.Auth::user()->photo) }}">
                                    @else
                                        <img alt="" src="{{ asset('admin/assets/img/téléchargement.png') }}">
                                    @endif
                                </a>
                            </div>
                        </div>
                        <div class="profile-basic">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="profile-info-left">
                                        <h3 class="user-wire:model m-t-0 mb-0">{{ Auth::user()->name }}</h3>
                                        <h6 class="text-muted">{{ Auth::user()->role_type_user->role_type }}</h6>
                                        <small class="text-muted">{{ Auth::user()->role->nom }}</small>
                                        <div class="staff-id">Employee ID : MA-000{{ Auth::user()->id }}</div>
                                        <div class="small doj text-muted">Date de creation : {{ date('d-m-Y') }}</div>
                                        {{-- <div class="staff-msg"><a class="btn btn-custom" href="">Send
                                                Message</a></div> --}}
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <ul class="personal-info">
                                        <li>
                                            <div class="title">Phone:</div>
                                            <div class="text"><a href="">+223 {{ Auth::user()->telephone }}</a></div>
                                        </li>
                                        <li>
                                            <div class="title">Email:</div>
                                            <div class="text"><a href="">{{ Auth::user()->email }}</a></div>
                                        </li>
                                        {{-- <li>
                                            <div class="title">Birthday:</div>
                                            <div class="text">24th July</div>
                                        </li> --}}
                                        <li>
                                            <div class="title">Address:</div>
                                            <div class="text">{{ Auth::user()->adresse }}</div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="pro-edit"><a data-target="#profile_info" data-toggle="modal" class="edit-icon"
                                href="#"><i class="fa fa-pencil"></i></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card tab-box">
        <div class="row user-tabs">
            <div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
                <ul class="nav nav-tabs nav-tabs-bottom">
                    <li class="nav-item"><a href="#emp_profile" data-toggle="tab" class="nav-link active">Profile</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="tab-content">

        <!-- Profile Info Tab -->
        <div id="emp_profile" class="pro-overview tab-pane fade show active">
            <div class="row">
                <div class="col-md-12 d-flex">
                    <div class="card profile-box flex-fill">
                        <div class="card-body">
                            <h3 class="card-title">Informations Personnelles<a href="#" class="edit-icon"
                                    data-toggle="modal" data-target="#personal_info_modal"><i class="fa fa-pencil"></i></a>
                            </h3>
                            <form wire:submit.prevent="updateUser">
                                <div class="form-group">
                                    <label for="">Nom Complet</label>
                                    <input type="text" wire:model="name" class="form-control">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">E-mail</label>
                                    <input type="email" wire:model="email" class="form-control">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Telephone</label>
                                    <input type="number" wire:model="telephone" class="form-control">
                                    @error('telephone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Adresse</label>
                                    <input type="text" wire:model="adresse" class="form-control">
                                    @error('adresse')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Photo</label>
                                    <input type="file" wire:model="photo" class="form-control">
                                    @error('photo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Mot de passe</label>
                                    <input type="password" wire:model="password" class="form-control">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Confirmation Mot de passe</label>
                                    <input type="password" wire:model="password_confirmation" class="form-control">
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn" type="submit">Mettre a jour</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Profile Info Tab -->
    </div>
</div>
