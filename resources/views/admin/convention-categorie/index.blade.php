@extends('layouts.admin')
@section('content')
<livewire:admin.convention-categorie.convention-categorie-show>
@endsection
@section('script')
<script>
    window.addEventListener('close-modal', event => {
        $('#add_convention_categorie').modal('hide');
        $('#edit_convention_categorie').modal('hide');
        $('#delete_convention_categorie').modal('hide');
    });
</script>
@endsection

