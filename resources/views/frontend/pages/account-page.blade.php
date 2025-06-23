@extends('layouts.app')
@section('content')
    @include('frontend.components.account')
    @include('frontend.components.order')
    @include('frontend.components.invoiceProductModal')
    @include('frontend.components.newsletter')
    <script>
        (async () =>{
            await  orderListDetails();
            $(".preloader").delay(50).fadeOut(100).addClass('loaded')
        })()
    </script>
@endsection
