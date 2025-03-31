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

<header id="header" class="header header-fullwidth header-transparent-bg">
    <div class="container">
        <div class="header-desk header-desk_type_1">
            <div class="logo">
                <a href="{{ route('home.index') }}">
                    <img src="{{ asset('frontend/assets/images/logo.png') }}" alt="Uomo" class="logo__image d-block" />
                </a>
            </div>

            <nav class="navigation">
                <ul class="navigation__list list-unstyled d-flex">
                    <li class="navigation__item">
                        <a href="{{ route('home.index') }}" class="navigation__link">Home</a>
                    </li>
                    <li class="navigation__item">
                        <a href="shop.html" class="navigation__link">Shop</a>
                    </li>
                    <li class="navigation__item">
                        <a href="cart.html" class="navigation__link">Cart</a>
                    </li>
                    <li class="navigation__item">
                        <a href="about.html" class="navigation__link">About</a>
                    </li>
                    <li class="navigation__item">
                        <a href="contact.html" class="navigation__link">Contact</a>
                    </li>
                </ul>
            </nav>

            <div class="header-tools d-flex align-items-center">
                <div class="header-tools__item hover-container">
                    <div class="js-hover__open position-relative">
                        <a class="js-search-popup search-field__actor" href="#">
                            <svg class="d-block" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <use href="#icon_search" />
                            </svg>
                            <i class="btn-icon btn-close-lg"></i>
                        </a>
                    </div>

                    <div class="search-popup js-hidden-content">
                        <form action="#" method="GET" class="search-field container">
                            <p class="text-uppercase text-secondary fw-medium mb-4">What are you looking for?</p>
                            <div class="position-relative">
                                <input class="search-field__input search-popup__input w-100 fw-medium" type="text"
                                       name="search-keyword" placeholder="Search products" />
                                <button class="btn-icon search-popup__submit" type="submit">
                                    <svg class="d-block" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <use href="#icon_search" />
                                    </svg>
                                </button>
                                <button class="btn-icon btn-close-lg search-popup__reset" type="reset"></button>
                            </div>

                            <div class="search-popup__results">
                                <div class="sub-menu search-suggestion">
                                    <h6 class="sub-menu__title fs-base">Quicklinks</h6>
                                    <ul class="sub-menu__list list-unstyled">
                                        <li class="sub-menu__item"><a href="shop2.html" class="menu-link menu-link_us-s">New Arrivals</a>
                                        </li>
                                        <li class="sub-menu__item"><a href="#" class="menu-link menu-link_us-s">Dresses</a></li>
                                        <li class="sub-menu__item"><a href="shop3.html" class="menu-link menu-link_us-s">Accessories</a>
                                        </li>
                                        <li class="sub-menu__item"><a href="#" class="menu-link menu-link_us-s">Footwear</a></li>
                                        <li class="sub-menu__item"><a href="#" class="menu-link menu-link_us-s">Sweatshirt</a></li>
                                    </ul>
                                </div>

                                <div class="search-result row row-cols-5"></div>
                            </div>
                        </form>
                    </div>
                </div>

                @guest
                    <div class="header-tools__item hover-container">
                        <a href="{{ route('login') }}" class="header-tools__item">
                            <svg class="d-block" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <use href="#icon_user" />
                            </svg>
                        </a>
                    </div>
                @else
                    <div class="header-tools__item hover-container">
                        <a href="{{ Auth::user()->usertype === 'admin' ? route('admin.index'): route('user.dashboard') }}" class="header-tools__item">
                            <span style="padding-right: 5px" class="pr-6px">{{ Auth::user()->name }}</span>
                            <svg class="d-block" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <use href="#icon_user" />
                            </svg>
                        </a>
                    </div>
                @endguest

                <a href="wishlist.html" class="header-tools__item">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <use href="#icon_heart" />
                    </svg>
                </a>

                <a href="cart.html" class="header-tools__item header-tools__cart">
                    <svg class="d-block" width="20" height="20" viewBox="0 0 20 20" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <use href="#icon_cart" />
                    </svg>
                    <span class="cart-amount d-block position-absolute js-cart-items-count">3</span>
                </a>
            </div>
        </div>
    </div>
</header>

@yield('content')

<hr class="mt-5 text-secondary" />
@include('frontend.components.footer')


<footer class="footer-mobile container w-100 px-5 d-md-none bg-body">
    <div class="row text-center">
        <div class="col-4">
            <a href="index.html" class="footer-mobile__link d-flex flex-column align-items-center">
                <svg class="d-block" width="18" height="18" viewBox="0 0 18 18" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_home" />
                </svg>
                <span>Home</span>
            </a>
        </div>

        <div class="col-4">
            <a href="index.html" class="footer-mobile__link d-flex flex-column align-items-center">
                <svg class="d-block" width="18" height="18" viewBox="0 0 18 18" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_hanger" />
                </svg>
                <span>Shop</span>
            </a>
        </div>

        <div class="col-4">
            <a href="index.html" class="footer-mobile__link d-flex flex-column align-items-center">
                <div class="position-relative">
                    <svg class="d-block" width="18" height="18" viewBox="0 0 20 20" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <use href="#icon_heart" />
                    </svg>
                    <span class="wishlist-amount d-block position-absolute js-wishlist-count">3</span>
                </div>
                <span>Wishlist</span>
            </a>
        </div>
    </div>
</footer>

<div id="scrollTop" class="visually-hidden end-0"></div>
<div class="page-overlay"></div>

<script src="{{ asset('frontend/assets/js/plugins/jquery.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/plugins/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/plugins/bootstrap-slider.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/plugins/swiper.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/plugins/countdown.js') }}"></script>
<script src="{{ asset('frontend/assets/js/theme.js') }}"></script>
@stack('scripts')
</body>
</html>
