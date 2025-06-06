@extends('layouts.app')
    @section('content')
        @include('frontend.components.by-brand')

        <script>
            (async () => {
                await headerName();
                $(".preloader").delay(50).fadeOut(100).addClass('loaded')

            })()
        </script>
    @endsection

