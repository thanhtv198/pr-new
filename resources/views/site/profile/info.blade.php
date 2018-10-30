@extends('site/layouts/master')
@section('content')
    <section class="content-header">
        @include('site/notice')
    </section>
    <!-- Main content -->
    <body>
    <div class="container" view="info">
        <h2 class="time-line-head">{{ trans('common.info.head') }}</h2>
        {!! Form::open(['route' => ['post_profile', Auth::user()->id], 'method' => 'post', 'class' => 'form-signin', 'files' => true]) !!}
        <div class="col-md-4 account">
            <div class="text-center">
                @if(!isset($user->avatar))
                    <img src="//placehold.it/100" class="avatar img-circle" alt="avatar">
                @else
                    <img src="{{ url(config('model.user.upload')) }}/{{ $user->avatar }}" class="avatar img-circle" alt="avatar" width="120px">
                @endif
                <div class="form-group">
                    <h6>Upload a different photo...</h6>
                    {!! Form::file('image', null, ['class' => 'form-control my-colorpicker1 colorpicker-element']) !!}
                </div>
            </div>
        </div>
        <div class="col-md-8 account">
            <p>{{ trans('common.info.info_config') }}</p>
            <div class="checkout-left">
                <div class="address_form_agile">

                    <div class="creditly-wrapper wthree, w3_agileits_wrapper">
                        <div class="information-wrapper">
                            <div class="first-row">
                                <div class="form-group">
                                    <h3>{{ trans('common.form.name') }}</h3>
                                    {!! Form::text('name', Auth::user()->name, ['class' => 'form-control my-colorpicker1colorpicker-element']) !!}
                                </div>
                                <div class="form-group">
                                    <h3>{{ trans('common.form.email') }}</h3>
                                    {!! Form::text('email', Auth::user()->email, ['class' => 'form-control my-colorpicker1colorpicker-element']) !!}
                                </div>
                                <div class="form-group">
                                    <h3>{{ trans('common.form.city') }}</h3>
                                    {!! Form::select('city_id', $city, "$user->city_id", ['class' => 'my-colorpicker1colorpicker-element select-info']) !!}
                                </div>
                                <div class="form-group">
                                    <h3>{{ trans('common.form.address') }}</h3>
                                    {!! Form::text('address', Auth::user()->address, ['class' => 'form-control my-colorpicker1colorpicker-element']) !!}
                                </div>
                                <div class="form-group">
                                    <h3>{{ trans('common.form.phone_number') }}</h3>
                                    {!! Form::number('phone_number', Auth::user()->phone_number, ['class' => 'form-control my-colorpicker1colorpicker-element']) !!}
                                </div>
                                <div class="form-group">
                                    <h3>{{ trans('common.form.birthday') }}</h3>
                                    {!! Form::date('birthday', Auth::user()->birthday, ['class' => 'form-control my-colorpicker1colorpicker-element']) !!}
                                </div>
                                <div class="form-group">
                                    <h3>{{ trans('common.form.password') }}</h3>
                                    {!! Form::input('password', 'password', Auth::user()->password, ['class' => 'form-control my-colorpicker1colorpicker-element']) !!}
                                </div>
                                <div class="form-group">
                                    <h3>{{ trans('common.form.repassword') }}</h3>
                                    {!! Form::input('password', 'password_confirmation', Auth::user()->password, ['class' => 'form-control my-colorpicker1colorpicker-element']) !!}
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <p>{!! Form::button(trans('common.button.save'), ['type' => 'submit', 'class' => 'submit-info']) !!}</p>
                    </div>

                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    <div class="clearfix"></div>
    </body>
@endsection

