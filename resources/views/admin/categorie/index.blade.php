@extends('layouts.admin')
@section('content')
<livewire:admin.categorie.index>
@endsection
@section('script')
<script>
    window.addEventListener('close-modal', event => {
        $('#add_categorie').modal('hide');
        $('#edit_categorie').modal('hide');
        $('#delete_categorie').modal('hide');
    });
</script>
@endsection

