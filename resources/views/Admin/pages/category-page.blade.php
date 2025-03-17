@extends('Admin.app')
@section('content')
    @include('Admin.components.category.category-list')
    @include('Admin.components.category.category-delete')
    @include('Admin.components.category.category-create')
    @include('Admin.components.category.category-update')
@endsection
