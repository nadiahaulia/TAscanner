@extends('adminlte::layouts.auth')

@section('htmlheader_title')
    Log in
@endsection

@section('content')
<body class="hold-transition login-page" style="width: 100%; height: 100%; overflow:hidden;">
    <div id="app">
        <div class="login-box">
            <div class="login-logo">
                <b>Admin UMPN</b>
            </div><!-- /.login-logo -->

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> {{ trans('adminlte_lang::message.someproblems') }}<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="login-box-body">
        <div style="border:2px solid black; padding: 30px; background-color:#808080; margin:-10px;">
         <center><img src="img/logopnj.png" width="100" height="100"></center><br>
        <form action="{{ url('/login') }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder="{{ trans('adminlte_lang::message.email') }}" name="email"/>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="{{ trans('adminlte_lang::message.password') }}" name="password"/>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="checkbox icheck">
                <label style="color:white; font-size: 10pt;">
                    <input type="checkbox" name="remember"> {{ trans('adminlte_lang::message.remember') }}
                </label>
            </div>
            <div class="form-group">
                <button style="border-radius: 3px;" type="submit" class="btn btn-primary btn-block btn-flat">{{ trans('adminlte_lang::message.login') }}</button>
            </div>
        </form>

        <center><a style=" color:white; font-size: 10pt;" href="{{ url('/register') }}" class="text-center">{{ trans('adminlte_lang::message.registermember') }}</a></center>
        </div>
    </div><!-- /.login-box-body -->

    </div><!-- /.login-box -->
    </div>
    @include('adminlte::layouts.partials.scripts_auth')

    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
</body>

@endsection
