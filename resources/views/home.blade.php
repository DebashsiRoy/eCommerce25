@extends('layouts.app')

@section('content')

    <!-- START SECTION SLIDER -->
    @include('frontend.components.slider')
    <!-- END SECTION SLIDER -->

    <!-- END MAIN CONTENT -->
    <div class="main_content">

        <!-- START SECTION BANNER -->

        <!-- END SECTION BANNER -->
        <!--Top Category Start-->
            @include('frontend.components.top-category')
        <!--Top Category End-->
        <!-- START SECTION SHOP -->
        <!-- START SECTION SHOP -->
        @include('frontend.components.exclusive-product')
        <!-- END SECTION SHOP -->

        <!-- END SECTION SHOP -->
        <!-- Top Brand Section Start-->
            @include('frontend.components.top-brand')
        <!-- Top Brand Section End-->
        <!-- START SECTION SUBSCRIBE NEWSLETTER -->
            @include('frontend.components.newsletter')
        <!-- START SECTION SUBSCRIBE NEWSLETTER -->

    </div>
    <!-- END MAIN CONTENT -->
    <script>
        (async () => {
            await headerName();
            await  getSliderList();
            await   TopCategoryList();
            $(".preloader").delay(50).fadeOut(100).addClass('loaded')
            await   Popular();
            await   New();
            await   Top();
            await   Special();
            await   Trending();
            await   TopBrandList();
        })()
    </script>
@endsection
