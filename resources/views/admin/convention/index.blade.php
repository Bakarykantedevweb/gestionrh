@extends('layouts.admin')
@section('content')
<livewire:admin.convention.convention-show>
@endsection
@section('script')
<script>
    window.addEventListener('close-modal', event => {
        $('#add_convention').modal('hide');
        $('#edit_convention').modal('hide');
        $('#delete_convention').modal('hide');
    });
</script>
@endsection

