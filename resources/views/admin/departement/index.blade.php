@extends('layouts.admin')
@section('content')
<livewire:admin.departement.departement-show>
@endsection
@section('script')
<script>
    window.addEventListener('close-modal', event => {
        $('#add_departement').modal('hide');
        $('#edit_departement').modal('hide');
        $('#delete_departement').modal('hide');
    });
</script>
@endsection

