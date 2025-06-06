<!DOCTYPE html>
<html lang="en">
@include('frontend.components.head')

<body>

<!-- LOADER -->
    @include('frontend.components.preloader')
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
@include('frontend.components.script')

</body>
</html>
