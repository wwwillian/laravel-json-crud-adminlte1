@extends('jcrud::vendor.adminlte.register')

@section('body')
<div class="register-box">
    <div class="register-logo">
        <a href="{{ url(config('adminlte.dashboard_url', 'home')) }}">{!! trans('title.logo') !!}</a>
    </div>

    <div class="register-box-body">
        <p class="login-box-msg">{{ trans('adminlte::adminlte.register_message') }}</p>
        <form action="{{ url(config('adminlte.register_url', 'register')) }}" method="post">
            @csrf

            @foreach ($attributes as $key => $attribute)
                @include('jcrud::partials.inputs.'.$attribute['frontend']['type'], [ 'name' => $key, 'attribute' => $attribute ])
            @endforeach

            <button type="submit" class="btn btn-primary btn-block btn-flat">{{ trans('adminlte::adminlte.register') }}</button>
        </form>
        <div class="auth-links">
            <a href="{{ url(config('adminlte.login_url', 'login')) }}" class="text-center">{{ trans('adminlte::adminlte.i_already_have_a_membership') }}</a>
        </div>
    </div>
    <!-- /.form-box -->
</div><!-- /.register-box -->
@stop 
