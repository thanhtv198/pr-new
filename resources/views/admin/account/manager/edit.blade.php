@extends('admin/layouts/master')
@section('content')
    <section class="content-header">
        <h1>{{ trans('common.title_form.account_manager_head') }}</h1>
    </section>
    <div class="content">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('common.title_form.account_manager_title') }}</h3>
                @include('admin.notice')
            </div>
            @if(Auth::user()->id == $user->id || Auth::user()->role_id == 1)
            {!! Form::open(['route' => ['postEdit_manager', $user->id, 'method' => 'post', 'class' => 'form-signin']]) !!}
            @endif
                <div class="row">
                <div class="col-md-6">
                    <!-- iCheck -->
                    <div class="box box-info">
                        <div class="box-body">
                            <div class="form-group">
                                <label>{{ trans('common.form.name') }}</label>
                                {!! Form::text('name', $user->name, ['class' => 'form-control my-colorpicker1colorpicker-element']) !!}
                            </div>
                            <div class="form-group">
                                <label>{{ trans('common.form.email') }}</label>
                                {!! Form::text('email', $user->email, ['class' => 'form-control my-colorpicker1colorpicker-element']) !!}
                            </div>
                            <div class="form-group">
                                <label>{{ trans('common.form.address') }}</label>
                                {!! Form::text('address', $user->address, ['class' => 'form-control my-colorpicker1colorpicker-element']) !!}
                            </div>
                            <div class="form-group">
                                <label>{{ trans('common.form.password') }}</label>
                                {!! Form::input('password', 'password', $user->password, ['class' => 'form-control my-colorpicker1colorpicker-element']) !!}
                            </div>
                            <div class="form-group">
                                <label>{{ trans('common.form.repassword') }}</label>
                                {!! Form::input('password', 'password_confirmation', $user->password, ['class' => 'form-control my-colorpicker1colorpicker-element']) !!}
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <div class="col-md-6">
                    <div class="box box-danger" view="user-manage">
                        <div class="box-body">
                            <div class="form-group">
                                <label>{{ trans('common.form.birthday') }}</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    {!! Form::date('birthday', $user->birthday, ['class' => 'form-control my-colorpicker1 colorpicker-element']) !!}
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->
                            <div class="form-group">
                                <label>{{ trans('common.form.phone_number') }}</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    {!! Form::number('phone_number', $user->phone_number, ['class' => 'form-control my-colorpicker1 colorpicker-element']) !!}
                                </div>
                            </div>
                            <!-- /.form group -->
                            <div class="form-group">
                                <label>{{ trans('common.form.city') }}</label>
                                {!! Form::select('city_id', $city, "$user->city_id", ['class' => 'span2 col-md-2 form-control']) !!}
                            </div>
                            <!-- /.form group -->
                            @if(Auth::user()->role_id == 1)
                                <div class="form-group">
                                    <label>{{ trans('common.form.role') }}</label>
                                    {!! Form::select('role_id', $role, "$user->role_id", ['class' => 'span2 col-md-2 form-control']) !!}
                                </div>
                            @else
                                {!! Form::hidden('role_id', 2) !!}
                            @endif
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
            @if(Auth::user()->id == $user->id || Auth::user()->role_id == 1)
            <div class="add">
                {{ Form::submit(trans('common.button.save'), ['class' => 'btn btn-primary']) }}
            </div>
            @endif
            <!-- /.row -->
            {!! Form::close() !!}
        </div>
    </div>
    </section>
@endsection

