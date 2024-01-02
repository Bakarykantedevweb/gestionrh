@extends('layouts.frontend')
@section('title','BIM sa | Offres')
@section('content')
@livewire('frontend.offre.detail',['offre' => $offre])
@endsection
