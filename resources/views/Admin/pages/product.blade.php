@extends('Admin.app')
@section('content')
    @include('Admin.components.products.product-list')
    @include('Admin.components.products.product-create')
    @include('Admin.components.products.product-delete')
    @include('Admin.components.products.product-update')
@endsection
