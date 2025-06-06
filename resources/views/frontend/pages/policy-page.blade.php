@extends('layouts.app')
@section('content')
    @include('frontend.components.policy')
    @include('frontend.components.top-brand')
    <script>
        (async  () => {
            await Policy()
            await   TopBrandList();
            $(".preloader").delay(50).fadeOut(100).addClass('loaded')

        })()
    </script>
@endsection
