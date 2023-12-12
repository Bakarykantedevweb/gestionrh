@extends('layouts.admin')
@section('content')
<livewire:admin.generation.index>
    @endsection
    @section('script')
    <script>
        window.addEventListener('close-modal', event => {
        $('#add_generation').modal('hide');
        $('#edit_generation').modal('hide');
        $('#delete_generation').modal('hide');
    });
    </script>
    @endsection
