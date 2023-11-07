@extends('layouts.admin')
@section('content')
<livewire:admin.agence.index>
@endsection
@section('script')
<script>
    window.addEventListener('close-modal', event => {
        $('#add_agence').modal('hide');
        $('#delete_agence').modal('hide');
    });
</script>
@endsection

