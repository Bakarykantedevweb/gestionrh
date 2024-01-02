@extends('layouts.admin')
@section('content')
{{-- <livewire:admin.offre.create> --}}
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Gestion des Ofrres</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Tableau de Bord</a></li>
                    <li class="breadcrumb-item active">Gestion des Ofrres</li>
                </ul>
            </div>
            <div class="col-auto float-right ml-auto">
                <a href="{{ route('offre.index') }}" class="btn add-btn"><i class="fa fa-list"></i>
                    Retour</a>
            </div>
        </div>
    </div>
    <!-- /Page Header -->
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ url('admin/offres/'.encrypt($offre->id).'/edit') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Type Contrat</label>
                            <select name="type_contrat_id" class="form-control">
                                <option value="">---</option>
                                @forelse ($typesContrats as $typesContrat)
                                <option value="{{ $typesContrat->id }}" {{ $typesContrat->id == $offre->type_contrat_id ? 'selected' : '' }}>
                                    {{ $typesContrat->nom }}
                                </option>
                                @empty
                                <option selected disabled></option>
                                @endforelse
                            </select>
                            @error('type_contrat_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="">Titre</label>
                                <input type="text" value="{{ $offre->titre }}" name="titre" class="form-control">
                                @error('titre')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-goup col-md-6">
                                <label for="">Photo</label>
                                <input type="file" name="photo" class="form-control">
                                @error('photo')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Date Publication</label>
                                    <input type="date" value="{{ $offre->date_publication }}" name="date_publication" class="form-control">
                                    @error('date_publication')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Date Limite</label>
                                    <input type="date" value="{{ $offre->date_limite }}" name="date_limite" class="form-control">
                                    @error('date_limite')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nombre de Place</label>
                                    <input type="number" value="{{ $offre->nombre_place }}" name="nombre_place" class="form-control">
                                    @error('nombre_place')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Categorie</label>
                                    <select name="categorie_id" class="form-control">
                                        <option value="">---</option>
                                        @forelse ($categories as $categorie)
                                            <option value="{{ $categorie->id }}" {{ $categorie->id == $offre->categorie_id ? ' selected' : '' }}>
                                                {{ $categorie->nom }}
                                            </option>
                                        @empty
                                        <option selected disabled></option>
                                        @endforelse
                                    </select>
                                    @error('categorie_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea rows="4" name="description" class="form-control summernote"
                                placeholder="Enter your message here">{!! $offre->description !!}</textarea>
                        </div>
                        <div class="form-group mb-0">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary"><span>Mettre a jour</span> <i
                                        class="fa fa-edit m-l-5"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
