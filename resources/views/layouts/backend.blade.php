<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/backend.app.css') }}" rel="stylesheet">
    <link href="{{ asset('components/inputs/style.css') }}" rel="stylesheet">

    @yield("css")
</head>
@inject('direction', 'App\Services\DirectionService')
<body class="page {{ $direction->isRtl() ? "rtl" : "ltr" }}">
@include("backend.side-column")
@yield('content')

<!-- Scripts -->
<script src="{{ asset('components/jquery/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('components/inputs/plugin.js') }}"></script>
<script src="{{ asset('components/inputs/setup.js') }}"></script>
<script src="{{ asset('js/side-bar.js') }}"></script>
<script src="{{ asset('js/top-bar.js') }}"></script>
@yield("js")
</body>
</html>
