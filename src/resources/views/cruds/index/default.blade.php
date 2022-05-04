@extends('jcrud::vendor.adminlte.page')

@section('title_prefix')
@lang('entities.' . snake_case($entity) . '.plural') -
@stop

@section('content_header')
    <h1>@lang('titles.'.$routePrefix)</h1>
@stop

@section('content')
    @include('jcrud::partials.flash_message')
    @include('jcrud::partials.datatables.table')
@stop
