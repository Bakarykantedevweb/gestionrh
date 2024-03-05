@extends('layouts.admin')
@section('content')
    @livewire('admin.agent.detail',["agent" => $agent])
@endsection

