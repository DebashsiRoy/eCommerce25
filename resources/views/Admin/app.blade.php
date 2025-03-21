<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    @include('Admin.components.css')
    @include('Admin.components.js')

    @stack('scripts')

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
                    <div id="loader" class="loader-line d-none"></div>
                    @yield('content')
                    @include('Admin.components.copy-section')
                </div>

            </div>
        </div>
    </div>
</div>


</body>

</html>
