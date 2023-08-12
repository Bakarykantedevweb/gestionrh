@extends('layouts.admin')
@section('content')
<livewire:admin.feuille-calcule.feuille-calcule-show>
@endsection
@section('script')
<script>
    window.addEventListener('close-modal', event => {
        $('#add_feuille_calcule').modal('hide');
        $('#edit_feuille_calcule').modal('hide');
        $('#delete_feuille_calcule').modal('hide');
    });
</script>
@endsection

