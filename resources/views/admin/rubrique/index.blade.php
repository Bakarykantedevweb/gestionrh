@extends('layouts.admin')
@section('content')
<livewire:admin.rubrique.rubrique-show>
@endsection
@section('script')
<script>
    window.addEventListener('close-modal', event => {
        $('#add_rubrique').modal('hide');
        $('#edit_rubrique').modal('hide');
        $('#delete_rubrique').modal('hide');
    });
</script>
@endsection
