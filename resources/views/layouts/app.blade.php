<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="Anil z" name="author">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Shopwise is Powerful features and You Can Use The Perfect Build this Template For Any eCommerce Website. The template is built for sell Fashion Products, Shoes, Bags, Cosmetics, Clothes, Sunglasses, Furniture, Kids Products, Electronics, Stationery Products and Sporting Goods.">
    <meta name="keywords" content="ecommerce, electronics store, Fashion store, furniture store,  bootstrap 4, clean, minimal, modern, online store, responsive, retail, shopping, ecommerce store">

    <!-- SITE TITLE -->
    <title>Shopwise - eCommerce Bootstrap 5 HTML Template</title>
    <!-- Favicon Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/images/favicon.png') }}">
    <!-- Animation CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.css') }}">
    <!-- Latest Bootstrap min CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/bootstrap/css/bootstrap.min.css') }}">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/linearicons.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/simple-line-icons.css') }}">
    <!--- owl carousel CSS-->
    <link rel="stylesheet" href="{{ asset('frontend/assets/owlcarousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/owlcarousel/css/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/owlcarousel/css/owl.theme.default.min.css') }}">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/magnific-popup.css') }}">
    <!-- Slick CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/slick-theme.css') }}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css') }}">
    <script src="{{ asset('frontend/assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

</head>

<body>

<!-- LOADER -->
{{--    @include('frontend.components.preloader')--}}
<!-- END LOADER -->

<!-- Home Popup Section -->
{{--    @include('frontend.components.pop-up')--}}
<!-- End Screen Load Popup Section -->

<!-- START HEADER -->
    @include('frontend.components.header')
<!-- END HEADER -->
    @yield('content')

<!-- START FOOTER -->
    @include('frontend.components.footer')
<!-- END FOOTER -->

<a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a>

<!-- Latest jQuery -->

<!-- popper min js -->
<script src="{{ asset('frontend/assets/js/popper.min.js') }}"></script>
<!-- Latest compiled and minified Bootstrap -->
<script src="{{ asset('frontend/assets/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- owl-carousel min js  -->
<script src="{{ asset('frontend/assets/owlcarousel/js/owl.carousel.min.js') }}"></script>
<!-- magnific-popup min js  -->
<script src="{{ asset('frontend/assets/js/magnific-popup.min.js') }}"></script>
<!-- waypoints min js  -->
<script src="{{ asset('frontend/assets/js/waypoints.min.js') }}"></script>
<!-- parallax js  -->
<script src="{{ asset('frontend/assets/js/parallax.js') }}"></script>
<!-- countdown js  -->
<!-- scripts js -->
<script src="{{ asset('frontend/assets/js/scripts.js') }}"></script>

</body>
</html>
