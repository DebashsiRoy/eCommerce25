@extends('layouts.app')

@section('content')
    <main>
        @include('frontend.components.slider')

        <div class="container mw-1620 bg-white border-radius-10">
            <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>
            @include('frontend.components.mostLike')
            @include('frontend.components.topCategory')
            @include('frontend.components.top-brand')

            <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>

            @include('frontend.components.hotdeals')

            <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>

            <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>

            @include('frontend.components.featuredProduct')
        </div>

        <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>

    </main>
@endsection
