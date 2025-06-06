@extends('layouts.app')
    @section('content')
        @include('frontend.components.by-category-page')

        <script>
            (async () => {
                await headerName();
                $(".preloader").delay(50).fadeOut(100).addClass('loaded')

            })()
        </script>
    @endsection

