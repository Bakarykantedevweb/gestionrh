@extends('layouts.admin')
@section('content')
<livewire:admin.type-pret.type-pret-show>
@endsection
@section('script')
<script>
    window.addEventListener('close-modal', event => {
        $('#add_type_pret').modal('hide');
        $('#edit_type_pret').modal('hide');
        $('#delete_type_pret').modal('hide');
    });
</script>
@endsection

