@extends('layouts.admin')
@section('content')
<livewire:admin.contrat.index>
@endsection
@section('script')
<script>
    window.addEventListener('close-modal', event => {
        $('#add_contrat').modal('hide');
        $('#edit_contrat').modal('hide');
        $('#delete_contrat').modal('hide');
    });
</script>
@endsection

