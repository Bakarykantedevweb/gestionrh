<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Agent Dashboard</title>

    <link rel="shortcut icon" href="{{ asset('agent/assets/img/favicon.png') }}">

    <link rel="stylesheet" href="{{ asset('agent/assets/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('agent/assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('agent/assets/plugins/fontawesome/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('agent/assets/css/style.css') }}">
    <!--[if lt IE 9]>
   <script src="assets/js/html5shiv.min.js"></script>
   <script src="assets/js/respond.min.js"></script>
  <![endif]-->
  @livewireStyles
</head>

<body>

    <div class="main-wrapper">
        @include('layouts.inc.agent.header')
        @include('layouts.inc.agent.sidebar')
        <div class="page-wrapper">
            @yield('content')
        </div>

    </div>


    <script src="{{ asset('agent/assets/js/jquery-3.6.0.min.js') }}"></script>

    <script src="{{ asset('agent/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('agent/assets/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('agent/assets/js/feather.min.js') }}"></script>

    <script src="{{ asset('agent/assets/plugins/select2/js/select2.min.js') }}"></script>

    <script src="{{ asset('agent/assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

    <script src="{{ asset('agent/assets/plugins/apexchart/apexcharts.min.js') }}"></script>
    <script src="{{ asset('agent/assets/plugins/apexchart/chart-data.js') }}"></script>

    <script src="{{ asset('agent/assets/js/script.js') }}"></script>
    @yield('script')
    @livewireScripts
</body>

</html>
