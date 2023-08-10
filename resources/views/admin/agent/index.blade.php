@extends('layouts.admin')
@section('content')
<livewire:admin.agent.agent-show>
@endsection
@section('script')
<script>
    window.addEventListener('close-modal', event => {
        $('#add_employee').modal('hide');
        $('#edit_agent').modal('hide');
        $('#delete_agent').modal('hide');
    });
</script>
@endsection

