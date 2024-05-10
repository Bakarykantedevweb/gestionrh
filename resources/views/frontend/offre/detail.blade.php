@extends('layouts.frontend')
@section('content')
     @livewire('frontend.offre.detail',['offre' => $offre])
@endsection
