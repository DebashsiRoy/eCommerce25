<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/animation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/font/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/icon/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('admin/images/favicon.ico') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('admin/images/favicon.ico') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/sweetalert.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/custom.css') }}">
    @stack('styles')

</head>

<body class="body">
<div id="wrapper">
    <div id="page" class="">
        <div class="layout-wrap">

            <!-- <div id="preload" class="preload-container">
<div class="preloading">
    <span></span>
</div>
</div> -->


            <div class="section-content-right">
                @include('Admin.components.left-nav')
                @include('Admin.components.header-nav')
                <div class="main-content">
                    @yield('content')
                    @include('Admin.components.copy-section')
                </div>

            </div>
        </div>
    </div>
</div>

<script src="{{ asset('admin/js/jquery.min.js') }}"></script>
<script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('admin/js/sweetalert.min.js') }}"></script>
<script src="{{ asset('admin/js/apexcharts/apexcharts.js') }}"></script>
<script src="{{ asset('admin/js/main.js') }}"></script>
<script src="{{ asset('admin/js/custom.js') }}"></script>
@stack('scripts')
</body>

</html>
