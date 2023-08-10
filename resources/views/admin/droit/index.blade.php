@extends('layouts.admin')
@section('content')
<livewire:admin.droit.droit-show>
@endsection
@section('script')
<script>
    window.addEventListener('close-modal', event => {
        $('#add_droit').modal('hide');
        $('#edit_droit').modal('hide');
        $('#delete_droit').modal('hide');
    });
</script>
@endsection

