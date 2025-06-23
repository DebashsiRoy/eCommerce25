@extends('layouts.app')
@section('content')
    @include('frontend.components.cart-page')
    @include('frontend.components.newsletter')
    @include('frontend.components.paymentList')
    <script>
        (async () =>{

            $(".preloader").delay(50).fadeOut(100).addClass('loaded')
            await  cartList();
        })()
    </script>
@endsection
