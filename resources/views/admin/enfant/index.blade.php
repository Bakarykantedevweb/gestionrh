@extends('layouts.admin')
@section('content')
    <livewire:admin.enfant.index>
@endsection
@section('script')
<script>
    window.addEventListener('close-modal', event => {
        $('#add_enfant').modal('hide');
        $('#edit_enfant').modal('hide');
        $('#delete_enfant').modal('hide');
    });
</script>
@endsection

