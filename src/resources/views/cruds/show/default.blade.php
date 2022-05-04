@extends('jcrud::vendor.adminlte.page')

@section('title_prefix')
@lang('entities.' . snake_case($entity) . '.singular') -
@stop

@if (! View::hasSection('content_header'))
    @section('content_header')
        <h1>
            {{ title_case(trans('entities.' . snake_case($entity) . '.plural')) }}
            <small>{{ trans('crud.show_single', ['entity' => str_lower(trans('entities.' . snake_case($entity) . '.singular'))]) }}</small>
        </h1>
    @stop
@endif

@if (! View::hasSection('content'))
    @section('content')
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">
                    {{ trans('crud.show_single', ['entity' => trans('entities.' . snake_case($entity) . '.singular')]) }}
                </h3>
            </div>
            @yield('before_attributes')
            <div class="box-body attributes-container">
                @foreach (data_get($views, 'show.fields', array_keys($attributes)) as $key)
                    @include('jcrud::cruds.partials.attribute', array('name'=> $key, 'value' => $attributes[$key], 'model' => $model))
                @endforeach
            </div>
            @yield('after_attributes')
            <div class="box-footer">
                <a href="{{ URL::previous() }}" class="btn btn-primary pull-right">
                    <i class="fa fa-fw fa-chevron-left"></i>
                    {{ trans('buttons.back') }}
                </a>
            </div>
        </div>
    @stop
@endif
