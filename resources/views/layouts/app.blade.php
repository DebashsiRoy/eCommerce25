<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{ asset('frontend/assets/images/favicon.ico') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Allura&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins/swiper.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/custom.css') }}" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
          integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw=="
          crossorigin="anonymous" referrerpolicy="no-referrer">
    @stack('styles')
    <script src="{{ asset('admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/js/axios.min.js') }}"></script>
    <script src="{{ asset('admin/js/toastify-js.js') }}"></script>

</head>
<body class="gradient-bg">
@include('frontend.components.svg')
<style>
    #header {
        padding-top: 8px;
        padding-bottom: 8px;
    }

    .logo__image {
        max-width: 220px;
    }
</style>
<div class="header-mobile header_sticky">
    <div class="container d-flex align-items-center h-100">
        <a class="mobile-nav-activator d-block position-relative" href="#">
            <svg class="nav-icon" width="25" height="18" viewBox="0 0 25 18" xmlns="http://www.w3.org/2000/svg">
                <use href="#icon_nav" />
            </svg>
            <button class="btn-close-lg position-absolute top-0 start-0 w-100"></button>
        </a>

        <div class="logo">
            <a href="{{ route('home.index') }}">
                <img src="{{ asset('frontend/assets/images/logo.png') }}" alt="Uomo" class="logo__image d-block" />
            </a>
        </div>

        <a href="#" class="header-tools__item header-tools__cart js-open-aside" data-aside="cartDrawer">
            <svg class="d-block" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#icon_cart" />
            </svg>
            <span class="cart-amount d-block position-absolute js-cart-items-count">3</span>
        </a>
    </div>

    @include('frontend.components.frontend-header-nav')
</div>

@include('frontend.components.header')

@yield('content')

<hr class="mt-5 text-secondary" />
@include('frontend.components.footer')

<div id="scrollTop" class="visually-hidden end-0"></div>
<div class="page-overlay"></div>
<script src="{{ asset('vendor/flasher/flasher.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/plugins/jquery.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/plugins/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/plugins/bootstrap-slider.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/plugins/swiper.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/plugins/countdown.js') }}"></script>
<script src="{{ asset('frontend/assets/js/theme.js') }}"></script>
@stack('scripts')
</body>
</html>
