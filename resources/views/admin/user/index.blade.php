@extends('layouts.admin')
@section('content')
<livewire:admin.user.user-show>
@endsection
@section('script')
<script>
    window.addEventListener('close-modal', event => {
        $('#add_user').modal('hide');
        $('#edit_user').modal('hide');
        $('#delete_user').modal('hide');
    });
</script>
@endsection

