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
        <div class="section bg_default small_pt small_pb">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="heading_s1 mb-md-0 heading_light">
                            <h3>Subscribe Our Newsletter</h3>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="newsletter_form">
                            <form>
                                <input type="text" required="" class="form-control rounded-0" placeholder="Enter Email Address">
                                <button type="submit" class="btn btn-dark rounded-0" name="submit" value="Submit">Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
