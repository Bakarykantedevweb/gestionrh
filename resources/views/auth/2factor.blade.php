@extends('layouts.auth')

@section('content')
<div class="container">
    <h2>Configurez Google Authenticator</h2>
    <p>Scannez ce QR code avec Google Authenticator :</p>
    <div>
        <img src="{{ $QR_Image }}" alt="QR Code">
    </div>
</div>
@endsection
