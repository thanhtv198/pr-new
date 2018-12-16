@extends('admin/layouts/head')
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href=""><b>{{ trans('common.tag.welcome_login') }}</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        {!! Form::open(['route' => 'login_admin', 'method' => 'post']) !!}
            <div class="form-group has-feedback">
                {!! Form::text('email', null, ['class' => 'form-control']) !!}
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                {!! Form::password('password', ['class' => 'form-control']) !!}
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label class="">
                            <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    {{ Form::submit(trans('common.button.login'), ['class' => 'btn btn-lg btn-primary btn-block']) }}
                </div>
                <!-- /.col -->
            </div>
        {!! Form::close() !!}
    </div>
    <!-- /.login-box-body -->
</div>
</body>

