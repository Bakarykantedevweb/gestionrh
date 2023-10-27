@extends('layouts.admin')
@section('content')
<livewire:admin.diplome.index>
@endsection
@section('script')
<script>
    window.addEventListener('close-modal', event => {
        $('#add_diplome').modal('hide');
        $('#edit_diplome').modal('hide');
        $('#delete_diplome').modal('hide');
    });
</script>
@endsection

