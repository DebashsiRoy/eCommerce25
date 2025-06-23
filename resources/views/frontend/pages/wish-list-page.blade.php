@extends('layouts.app')
@section('content')
    @include('frontend.components.wish-list')
    @include('frontend.components.newsletter')
    <script>
        (async () =>{
            $(".preloader").delay(50).fadeOut(100).addClass('loaded')
        })()
    </script>
@endsection
