@extends('layouts.admin')
@section('content')
<livewire:admin.type-contrat.typecontrat-show>
@endsection
@section('script')
<script>
    window.addEventListener('close-modal', event => {
        $('#add_type_contrat').modal('hide');
        $('#edit_type_contrat').modal('hide');
        $('#delete_type_contrat').modal('hide');
    });
</script>
@endsection

