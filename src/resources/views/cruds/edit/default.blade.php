@extends('jcrud::vendor.adminlte.page')

@section('title_prefix')
@lang('entities.' . snake_case($entity) . '.singular') -
@stop

@section('content_header')
    <h1>
        {{ title_case(trans('entities.' . snake_case($entity) . '.plural')) }}
        <small>{{ trans('crud.edit', ['entity' => Str::lower(trans('entities.' . snake_case($entity) . '.singular'))]) }}</small>
    </h1>
@stop

@if (! View::hasSection('content'))
    @section('content')
        @if (isset($card))
            @include('jcrud::partials.cards.default')
        @endif

        @if (isset($tabs))
            <div class="tab-box{{isset($card) ? ' profile-content' : ''}}">
                @include('jcrud::cruds.partials.form_tabs', array('action' => 'edit', 'model' => $model))
            </div>
        @else
            <div class="box{{isset($card) ? ' profile-content' : ''}}">
                @include('jcrud::cruds.partials.form', array('action' => 'edit', 'model' => $model))
            </div>
        @endif
    @stop
@endif
