@extends('Admin.app')
@section('content')
    @include('Admin.components.brands.brand-list')
    @include('Admin.components.brands.brand-create')
    @include('Admin.components.brands.brand-delete')
    @include('Admin.components.brands.brand-update')
@endsection
