<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'dk Shop') }}</title>
    @include('Admin.components.css')
    <script src="{{ asset('admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/js/axios.min.js') }}"></script>
    <script src="{{ asset('admin/js/toastify-js.js') }}"></script>
    <script src="{{ asset('admin/js/config.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/js/main.js') }}"></script>
    <script src="{{ asset('admin/js/dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/js/flasher.min.js') }}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-bs4.min.js"></script>



</head>

<body class="body">

<div id="wrapper">
    <div id="page" class="">
        <div class="layout-wrap">

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
