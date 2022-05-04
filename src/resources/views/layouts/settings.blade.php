@extends('jcrud::vendor.adminlte.page')

@if (! View::hasSection('content_header'))
    @section('content_header')
    <h1>
        {{ title_case(trans('titles.settings')) }}
    </h1>
    @stop
@endif

@if (! View::hasSection('content'))
    @section('content')
        <div class="row">
            <div class="col-md-3">
                @include('jcrud::partials.settings_menu')
            </div>
            <!-- Settings Item -->
            <div class="col-md-9">
                @yield('settings')
            </div>
            <!-- End Settings Item -->
        </div>
    @stop
@endif
