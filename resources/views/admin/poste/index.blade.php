@extends('layouts.admin')
@section('content')
<livewire:admin.poste.poste-show>
@endsection
@section('script')
<script>
    window.addEventListener('close-modal', event => {
        $('#add_poste').modal('hide');
        $('#edit_poste').modal('hide');
        $('#delete_poste').modal('hide');
    });
</script>
@endsection

