@extends('layouts.admin')
@section('content')
<livewire:admin.periode.periode-show>
@endsection
@section('script')
<script>
    window.addEventListener('close-modal', event => {
        $('#add_periode').modal('hide');
        $('#edit_periode').modal('hide');
        $('#delete_periode').modal('hide');
    });
</script>
@endsection

