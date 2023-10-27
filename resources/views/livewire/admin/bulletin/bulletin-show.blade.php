<div>
    @include('livewire.admin.Bulletin.modal')
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Bulletin</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Tableau de Bord</a></li>
                    <li class="breadcrumb-item active">Bulletin</li>
                </ul>
            </div>
            <div class="col-auto float-right ml-auto">
                <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_bulletin"><i
                        class="fa fa-plus"></i> Nouveau Bulletin</a>
            </div>
        </div>
    </div>
    <!-- /Page Header -->
    @include('layouts.partials.message')
    @include('layouts.partials.error')
    <div class="row">
        <div class="col-md-3">
            <div class="card punch-status">
                <div class="card-body">
                    <h5 class="card-title">Choississez un mois</h5>
                    <ul>
                        @foreach ($periodes as $periode)
                        <a href="#">
                            <li>
                                {{ $periode->mois }}
                                {{-- <button type="button"  class="mb-2 ml-2 btn btn-primary">Ouvrir</button> --}}
                            </li>
                        </a>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
