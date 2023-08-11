@extends('layouts.admin')
@section('content')
<livewire:admin.centre-impot.centre-impot-show>
@endsection
@section('script')
<script>
    window.addEventListener('close-modal', event => {
        $('#add_centre_impot').modal('hide');
        $('#edit_centre_impot').modal('hide');
        $('#delete_centre_impot').modal('hide');
    });
</script>
@endsection

