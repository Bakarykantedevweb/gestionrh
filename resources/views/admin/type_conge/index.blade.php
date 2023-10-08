@extends('layouts.admin')
@section('content')
<livewire:admin.type-conge.index>
@endsection
@section('script')
<script>
    window.addEventListener('close-modal', event => {
        $('#add_type_conge').modal('hide');
        $('#edit_type_conge').modal('hide');
        $('#delete_type_conge').modal('hide');
    });
</script>
@endsection

