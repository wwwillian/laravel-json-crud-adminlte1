@extends('jcrud::cruds.index.default')

@section('additionalButtons')
    @include('jcrud::partials.buttons.reorder', array('route' => $routes['self'] . '.reorder'))
@stop
