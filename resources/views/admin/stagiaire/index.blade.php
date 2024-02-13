@extends('layouts.admin')
@section('content')
<livewire:admin.stagiaire.index>
@endsection
@section('script')
<script>
    window.addEventListener('close-modal', event => {
        $('#add_stagiaire').modal('hide');
        $('#delete_stagiaire').modal('hide');
    });
</script>
@endsection
