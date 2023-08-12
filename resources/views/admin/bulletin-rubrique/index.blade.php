@extends('layouts.admin')
@section('content')
<livewire:admin.bulletin-rubrique.index>
@endsection
@section('script')
<script>
    window.addEventListener('close-modal', event => {
        $('#add_bulletin').modal('hide');
        $('#edit_bulletin').modal('hide');
        $('#delete_bulletin').modal('hide');
    });
</script>
@endsection
