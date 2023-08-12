@extends('layouts.admin')
@section('content')
<livewire:admin.nature-rubrique.nature-rubrique-show>
@endsection
@section('script')
<script>
    window.addEventListener('close-modal', event => {
        $('#add_nature_rubrique').modal('hide');
        $('#edit_nature_rubrique').modal('hide');
        $('#delete_nature_rubrique').modal('hide');
    });
</script>
@endsection

