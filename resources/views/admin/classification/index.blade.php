@extends('layouts.admin')
@section('content')
<livewire:admin.classification.index>
@endsection
@section('script')
<script>
    window.addEventListener('close-modal', event => {
        $('#add_classification').modal('hide');
        $('#delete_classification').modal('hide');
    });
</script>
@endsection

