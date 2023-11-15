@extends('layouts.admin')
@section('content')
<livewire:admin.compte.index>
@endsection
@section('script')
<script>
    window.addEventListener('close-modal', event => {
        $('#add_compte').modal('hide');
        $('#delete_compte').modal('hide');
    });
</script>
@endsection

