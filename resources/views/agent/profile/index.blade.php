@extends('layouts.agent')
@section('content')
    @livewire('agent.profile.index',['agent' => $agent])
@endsection
