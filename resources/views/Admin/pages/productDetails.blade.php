@extends('Admin.app')
@section('content')
    @include('Admin.components.productsDetails.productDetails-list')
    @include('Admin.components.productsDetails.productDetails-create')
    @include('Admin.components.productsDetails.productDetails-delete')
    @include('Admin.components.productsDetails.productDetails-update')
@endsection
