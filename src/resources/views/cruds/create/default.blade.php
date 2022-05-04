@extends('jcrud::vendor.adminlte.page')

@section('title_prefix')
@lang('entities.' . snake_case($entity) . '.singular') -
@stop

@if (! View::hasSection('content_header'))
    @section('content_header')
    <h1>
        {{ title_case(trans('entities.' . snake_case($entity) . '.plural')) }}
        <small>@lang('crud.create_new', ['entity' => str_lower(trans('entities.' . snake_case($entity) . '.singular'))])</small>
    </h1>
    @stop
@endif

@if (! View::hasSection('content'))
    @section('content')
        <div class="box">
            @include('jcrud::cruds.partials.form', array('action' => 'create'))
        </div>
    @stop
@endif
