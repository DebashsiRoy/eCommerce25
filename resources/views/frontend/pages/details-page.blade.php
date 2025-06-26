@extends('layouts.app')
@section('content')
    @include('frontend.components.product-details')
    @include('frontend.components.top-brand')
    <script>
        (async () =>{
            await
            $(".preloader").delay(50).fadeOut(100).addClass('loaded')
        })()
    </script>
@endsection
