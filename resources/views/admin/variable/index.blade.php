@extends('layouts.admin')
@section('content')
<livewire:admin.variable.index>
@endsection
@section('script')
<script>
    window.addEventListener('close-modal', event => {
        $('#add_variable').modal('hide');
        $('#delete_variable').modal('hide');
    });
</script>
@endsection

