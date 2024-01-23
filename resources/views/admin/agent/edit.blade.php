@extends('layouts.admin')
@section('content')
@livewire('admin.agent.edit',['agent' => $agent])
@endsection
@section('script')
<script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('tabChanged', function (tabId) {
            $('.nav-tabs a[href="#' + tabId + '"]').tab('show');
        });
    });
</script>
@endsection

