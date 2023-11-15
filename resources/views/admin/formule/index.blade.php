@extends('layouts.admin')
@section('content')
<livewire:admin.formule.index>
@endsection
@section('script')
<script>
    window.addEventListener('close-modal', event => {
        $('#add_formule').modal('hide');
        $('#delete_formule').modal('hide');
    });
</script>
@endsection

