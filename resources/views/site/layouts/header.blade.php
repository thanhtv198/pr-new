<!-- header-bot-->
<div>
    <div class="col-md-12 header-most-top" id="thanh-header-top">
        <!-- header-bot-->
        <!-- header-bot -->
        <!-- header lists -->
        <ul class="thanh-list-inline list-inline pull-left">
            <li>
                <div class="sl-nav">
                    <ul>
                        <li>
                            <b>
                                @if($lang == 'en')
                                    {{ trans('common.header.lang') }}: <img src="{{ asset('source/site/images/english.png') }}">
                                @else
                                    {{ trans('common.header.lang') }}: <img src="{{ asset('source/site/images/vietnam.png') }}">
                                @endif
                            </b>
                            <i class="fa fa-angle-down" aria-hidden="true"></i>
                            <div class="triangle"></div>
                            <ul>
                                <li>
                                    <a href="{!! route('change-language', ['en']) !!}">
                                        <img src="{{ asset('source/site/images/english.png') }}">
                                        English
                                    </a>

                                </li>
                                <li>
                                    <a href="{!! route('change-language', ['vi']) !!}">
                                        <img src="{{ asset('source/site/images/vietnam.png') }}">
                                        Tiếng việt
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </li>
            @if(Auth::check())
            <li>
                <div class="sl-nav">
                    <ul>
                        <li class="li-user">
                            <b>
                                <a class="dropdown-toggle hover-li-top" data-toggle="dropdown" data-target="#" href="javascript:;">
                                    {{ auth()->user()->name }}
                                    @if(Auth::user()->avatar)
                                    <img src="{{ url(config('model.user.upload')) }}/{{ Auth::user()->avatar }}"
                                         width="37px" style="border-radius: 50%; border:1px solid #2196f3">
                                    @endif
                                </a>
                            </b>
                            <i class="fa fa-angle-down" aria-hidden="true"></i>
                            <div class="triangle"></div>
                            <ul class="dropdown-menu dropdown-user" id="dropdown-top">
                                <li><a href="{{ route('time_line', Auth::user()->id) }}"><i class="nav-icon fa fa-user"></i>{{ trans('common.header.time_line') }}</a></li>
                                <li><a href="{{ route('get_interact', Auth::user()->id) }}"><i class="nav-icon fa fa-cog"></i>{{ trans('common.header.interact') }}</a></li>
                                <li><a href="{{ route('get_profile', Auth::user()->id) }}"><i class="nav-icon fa fa-user"></i>{{ trans('common.header.my_account') }}</a></li>
                                <li><a href="{{ route('logout') }}"><i class="nav-icon fa fa-sign-out"></i>{{ trans('common.header.logout') }}</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </li>
            @endif
        </ul>
        <ul class="list-inline nav navbar-nav menu__list pull-right ul-top" view="header">
            <!-- cart details -->

            @if(!Auth::check())
                <li class="li-top">
                    <a href="{{ route('cart') }}" class="hover-li-top">
                        <span class="fa fa-cart-arrow-down" aria-hidden="true"></span>
                        <b>{{ trans('common.header.cart') }}</b>(<span
                                id="count_cart">
                            {{ Cart::instance('default')->count() }}</span>)
                    </a>
                </li>
                <li class="li-top">
                    <a view="compare" href="{{ route('get_compare') }}" class="hover-li-top">
                        <span class="fa fa-balance-scale" aria-hidden="true"></span>
                        <b>{{ trans('common.header.compare') }}</b>(<span
                                id="count_compare">{{ Cart::instance('compare')->count() }}</span>)
                    </a>
                </li>
                <li class="li-top">
                    <a href="#" data-toggle="modal" class="hover-li-top" data-target="#myModal1">
                        <span class="fa fa-unlock-alt" aria-hidden="true"></span>
                        <b>{{ trans('common.header.sign_in') }}</b>
                    </a>
                </li>
                <li class="li-top">
                    <a href="#" data-toggle="modal" class="hover-li-top" data-target="#myModal2">
                        <span class="fa fa-pencil-square-o" aria-hidden="true">
                        </span>
                        <b>{{ trans('common.header.sign_up') }}</b>
                    </a>
                </li>
            @else
                <li class="li-top">
                    <a href="{{ route('cart') }}" class="hover-li-top">
                        <span class="fa fa-cart-arrow-down" aria-hidden="true"></span>
                        <b>{{ trans('common.header.cart') }}</b>
                        (<span id="count_cart">{{ Cart::instance('default')->count() }}</span>)
                    </a>
                </li>

                <li class="li-top">
                    <ul class="" style="margin-top: 14px">
                    <div class="sl-nav">
                        <ul>
                            <li class="li-user" style="color:#337ab7;">
                                <span class="fa fa-bell-o count_notify">  </span>
                                    <b>{{ trans('common.header.notify') }}</b>
                                    <a class="dropdown-toggle hover-li-top" data-toggle="dropdown" data-target="#" href="javascript:;">
                                    (<span>{{ count(auth()->user()->unreadNotifications) }}</span>)
                                    </a>

                                <i class="fa fa-angle-down" aria-hidden="true"></i>
                                <div class="triangle"></div>
                                @if(auth()->user()->unreadNotifications->count())
                                    <ul class="dropdown-menu notify" style="width:300px">
                                        @foreach(auth()->user()->unreadNotifications as $no)
                                            @if(isset($no->data['product_name']))
                                                <li style="cursor: pointer">
                                                    <div class="read read1" id="{{ $no->data['product_name'] }}">
                                                        <a href="{{ route('get_order_sold') }}" id="{{ $no->id }}"
                                                           class="pro">
                                                            {{ __('common.header.you_have_order_with') }}
                                                            {{ $no->data['qty'] }} product
                                                            <b>{!! ($no->data['product_name']) !!}</b><span style="font-size: 15px;color:black">{{ $no->created_at->diffForHumans()  }}</span>
                                                        </a>
                                                    </div>
                                                </li>
                                            @endif

                                            @if(isset($no->data['sender_name']))
                                                <li style="cursor: pointer">
                                                    <div class="read read2" id="{{ $no->data['sender_id'] }}">
                                                        <a href="{{ route('send', $no->data['sender_id']) }}" class="user" id="{{ $no->id }}">
                                                            {{ __('common.header.you_have_mesage_from') }}
                                                            <b>{!! ($no->data['sender_name']) !!}</b> <span style="font-size: 12px;color: black">{{ $no->created_at->diffForHumans()  }}</span>
                                                        </a>
                                                    </div>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                @else
                                    <ul class="dropdown-menu notify" style="width:300px">
                                        <li>
                                            <div>
                                                <a>
                                                    {{ __('common.header.notify') }}
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                @endif
                            </li>
                        </ul>
                    </div>
                    </ul>
                </li>

                <li class="li-top">
                    <a view="compare" href="{{ route('get_wishlist') }}" class="hover-li-top" aria-hidden="true">
                        <span class="fa-heart-o fa" aria-hidden="true">
                            <b>{{ trans('common.header.wishlist') }}</b>
                            (<span id="count_wishlist">{{ $wishlistHeader }}</span>)
                        </span>
                    </a>
                </li>
                <li class="li-top">
                    <a href="{{ route('get_compare') }}" class="hover-li-top" aria-hidden="true">
                        <span class="fa fa-balance-scale" aria-hidden="true"></span>
                        <b>{{ trans('common.header.compare') }}</b>
                        (<span id="count_compare">{{ Cart::instance('compare')->count() }}</span>)
                    </a>
                </li>
            @endif
        </ul>
        <!-- //header lists -->
    </div>
    <div class="clearfix"></div>
</div>

<!-- //shop locator (popup) -->
<!-- signin Model -->
<!-- Modal1 -->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body modal-body-sub_agile">
                <div class="main-mailposi">
                    <span class="fa fa-envelope-o" aria-hidden="true"></span>
                </div>
                <div class="modal_body_left modal_body_left1">
                    <h3 class="agileinfo_sign">{{ trans('common.tag.sign_in') }}</h3>

                    {!! Form::open(['route' => 'login', 'method' => 'post']) !!}
                    <div class="styled-input agile-styled-input-top">
                        {!! Form::text('email', null, ['class' => 'form-control my-colorpicker1 colorpicker-element']) !!}
                    </div>
                    <div class="styled-input">
                        {!! Form::password('password', ['class' => 'form-control my-colorpicker1 colorpicker-element']) !!}
                    </div>
                    <input type="submit" value="{{ trans('common.tag.sign_in') }}">
                    {!! Form::close() !!}
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
                <div class="row omb_row-sm-offset-3 omb_socialButtons">
                    <div class="row">
                        <div class="col-md-5 custom-login-fb">
                            <a href="{{ url('login/facebook') }}" class="btn btn-lg btn-block omb_btn-facebook loginBtn loginBtn--facebook">
                                <i class="fa fa-facebook visible-xs"></i>
                                <span class="hidden-xs">{{ trans('common.button.sign_in_fb') }}</span>
                            </a>
                        </div>
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-5 custom-login-gg ">
                            <a href="{{ url('login/google') }}" class="btn btn-lg btn-block omb_btn-google loginBtn loginBtn--google">
                                <i class="fa fa-google-plus visible-xs"></i>
                                <span class="hidden-xs"> {{ trans('common.button.sign_in_gg') }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //Modal content-->
    </div>
</div>
<!-- //Modal1 -->
<!-- //signin Model -->
<!-- signup Model -->
<!-- Modal2 -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <h3 class="agileinfo_sign" style="margin-top: 20px;">{{ trans('common.site.sign_up') }}</h3>
            @include('site/notice')
            {!! Form::open(['route' => 'post_signup', 'method' => 'post', 'class' => 'creditly-card-form agileinfo_form']) !!}
            <div class="creditly-wrapper wthree, w3_agileits_wrapper modal-body modal-body-sub_agile">
                <div class="information-wrapper">
                    <div class="first-row">
                        <div class="w3_agileits_card_number_grids">
                            <div class="form-group">
                                <label>{{ trans('common.form.name') }}</label>
                                {!! Form::text('name', null, ['class' => 'form-control my-colorpicker1 colorpicker-element']) !!}
                            </div>
                            <div class="form-group">
                                <label>{{ trans('common.form.email') }}</label>
                                {!! Form::text('email', null, ['class' => 'form-control my-colorpicker1 colorpicker-element']) !!}
                            </div>
                            <div class="form-group" view="city">
                                <label>{{ trans('common.form.city') }}</label><br>
                                {!! Form::select('city_id', $city, null, ['class' => 'my-colorpicker1colorpicker-element select-checkout-a', 'placeholder' => 'Choose location']) !!}
                            </div>
                            <div class="form-group">
                                <label>{{ trans('common.form.address') }}</label>
                                {!! Form::text('address', null, ['class' => 'form-control my-colorpicker1 colorpicker-element']) !!}
                            </div>
                            <div class="form-group">
                                <label>{{ trans('common.form.phone_number') }}</label>
                                {!! Form::number('phone_number', null, ['class' => 'span2 col-md-2 form-control']) !!}
                            </div>
                            <div class="form-group">
                                <label>{{ trans('common.form.birthday') }}</label>
                                {!! Form::date('birthday', null, ['class' => 'span2 col-md-2 form-control']) !!}
                            </div>
                            <div class="form-group">
                                <label>{{ trans('common.form.password') }}</label>
                                {!! Form::password('password', ['class' => 'form-control my-colorpicker1 colorpicker-element']) !!}
                            </div>
                            <div class="form-group">
                                <label>{{ trans('common.form.repassword') }}</label>
                                {!! Form::password('password_confirmation', ['class' => 'form-control my-colorpicker1 colorpicker-element']) !!}
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                    {{ Form::submit(trans('common.button.sign_up'), ['class' =>'btn btn-success']) }}
                </div>
            </div>
            {!! Form::close() !!}
            <div class="row omb_row-sm-offset-3 omb_socialButtons">
                <div class="row">
                    <div class="col-md-5 custom-login-fb">
                        <a href="{{ url('login/facebook') }}" class="btn btn-lg btn-block omb_btn-facebook loginBtn loginBtn--facebook">
                            <i class="fa fa-facebook visible-xs"></i>
                            <span class="hidden-xs">{{ trans('common.button.sign_up_fb') }}</span>
                        </a>
                    </div>
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-5 custom-login-gg ">
                        <a href="{{ url('login/google') }}" class="btn btn-lg btn-block omb_btn-google loginBtn loginBtn--google">
                            <i class="fa fa-google-plus visible-xs"></i>
                            <span class="hidden-xs"> {{ trans('common.button.sign_up_gg') }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- //Modal content-->
</div>
</div>
<div class="clear"></div>
<!-- //Modal2 -->
<!-- //signup Model -->
<!-- //header-bot -->
<!-- navigation -->
<div>
    <div class="ban-top thanh-ban-top">
        <div class="container">
            <div class="top_nav_left" id="thanh_top_nav_left">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
                                    aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav menu__list" id="thanh-menu-header">
                                <li class="active">
                                    <a class="nav-stylehead" href="{{ route('home_page') }}">
                                        {{ trans('common.header.home')}}
                                        <span class="sr-only">(current)</span>
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle nav-stylehead" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        {{ trans('common.header.category')}}
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu multi-column columns-3">
                                        <div class="agile_inner_drop_nav_info">
                                            @foreach($categoriesHeader as $row)
                                                <div class="col-sm-4 multi-gd-img">
                                                    @if($row->parent_id == null && $row->childs)
                                                    <h2>{{ $row->name }}</h2>
                                                    <ul class="multi-column-dropdown">
                                                        @foreach($row->subCategory as $sub)
                                                            <li>
                                                                <a href="{{ route('site_category', $sub->id) }}">{{ $sub->name }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                    @endif
                                                </div>
                                            @endforeach
                                            <div class="col-sm-4 multi-gd-img">
                                                <img src="images/nav.png" alt="">
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </ul>
                                </li>
                                @if(Auth::check())
                                    <li class="dropdown">
                                        <a class="nav-stylehead dropdown-toggle" href="#" data-toggle="dropdown">
                                            {{ trans('common.header.write_post')}}
                                            <b class="caret"></b>
                                        </a>
                                        <ul class="dropdown-menu agile_short_dropdown">
                                            <li id="li-category">
                                                <a href="{{ route('sell.index') }}"> {{ trans('common.header.sell_product')}}</a>
                                            </li>
                                            <li id="li-category">
                                                <a href="{{ route('posts.user', Auth::user()->id)}}"> {{ trans('common.header.discuss')}}</a>
                                            </li>
                                        </ul>
                                    </li>
                                @endif
                                <li class="">
                                    <a class="nav-stylehead" href="{{ route('posts.index')}}"> {{ trans('common.header.forumn')}}</a>
                                </li>
                                <li class="dropdown" id="drop-search">
                                    <div class="input-group" id="thanh-input-group">
                                        <input type="text" class="form-control">
                                        <span class="input-group-btn">
                                            <button class="btn search-button-header">
                                                 {{ trans('common.button.search')}}
                                            </button>
                                        </span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>

<!-- //navigation -->
<style>
    body {
        font-family: Arial;
        font-family: 'Muli', sans-serif;
    }

    .nav-wrapper {
        width: 300px;
        margin: 100px auto;
        text-align: center;
    }

    .sl-nav {
        display: inline;
    }

    .sl-nav ul {
        margin: 0;
        padding: 0;
        list-style: none;
        position: relative;
        display: inline-block;
    }

    .sl-nav li {
        cursor: pointer;
        padding-bottom: 10px;
    }

    .sl-nav li ul {
        display: none;
    }

    .sl-nav li:hover ul {
        position: absolute;
        top: 29px;
        right: -15px;
        display: block;
        background: #fff;
        min-width: 140px;
        padding-top: 0px;
        z-index: 1;
        border-radius: 5px;
        box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
    }

    .sl-nav .li-user:hover ul {
        position: absolute;
        top: 29px;
        right: -15px;
        display: block;
        background: #fff;
        min-width: 250px;
        padding-top: 0px;
        z-index: 1;
        border-radius: 5px;
        box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
    }

    .sl-nav li:hover .triangle {
        position: absolute;
        top: 15px;
        right: -10px;
        z-index: 10;
        height: 14px;
        overflow: hidden;
        width: 30px;
        background: transparent;
    }

    .sl-nav li:hover .triangle:after {
        content: '';
        display: block;
        z-index: 20;
        width: 15px;
        transform: rotate(45deg) translateY(0px) translatex(10px);
        height: 15px;
        background: #fff;
        border-radius: 2px 0px 0px 0px;
        box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
    }

    .sl-nav li ul li {
        position: relative;
        text-align: left;
        background: transparent;
        padding: 10px 10px;
        padding-bottom: 0;
        z-index: 2;
        font-size: 15px;
        color: #3c3c3c;
    }

    .sl-nav li ul li:last-of-type {
        padding-bottom: 15px;
    }

    .sl-nav li ul li span {
        padding-left: 5px;
    }

    .sl-nav li ul li span:hover, .sl-nav li ul li span.active {
        color: #146c78;
    }

    .sl-flag {
        display: inline-block;
        box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.4);
        width: 15px;
        height: 15px;
        background: #aaa;
        border-radius: 50%;
        position: relative;
        top: 2px;
        overflow: hidden;
    }

    /*login facebook google*/
    .btn-lg {

        font-size: 15px !important;
    }

    .loginBtn {
        box-sizing: border-box;
        position: relative;
        /* width: 13em;  - apply for fixed size */
        margin: 0.2em;
        padding: 0 15px 0 46px;
        border: none;
        text-align: left;
        line-height: 34px;
        white-space: nowrap;
        border-radius: 0.2em;
        font-size: 16px;
        color: #FFF;
    }

    .loginBtn:before {
        content: "";
        box-sizing: border-box;
        position: absolute;
        top: 0;
        left: 0;
        width: 34px;
        height: 100%;
    }

    .loginBtn:focus {
        outline: none;
    }

    .loginBtn:active {
        box-shadow: inset 0 0 0 32px rgba(0, 0, 0, 0.1);
    }

    /* Facebook */
    .loginBtn--facebook {
        background-color: #4C69BA;
        background-image: linear-gradient(#4C69BA, #3B55A0);
        /*font-family: "Helvetica neue", Helvetica Neue, Helvetica, Arial, sans-serif;*/
        text-shadow: 0 -1px 0 #354C8C;
    }

    .loginBtn--facebook:before {
        border-right: #364e92 1px solid;
        background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/14082/icon_facebook.png') 6px 6px no-repeat;
    }

    .loginBtn--facebook:hover,
    .loginBtn--facebook:focus {
        background-color: #5B7BD5;
        background-image: linear-gradient(#5B7BD5, #4864B1);
    }

    /* Google */
    .loginBtn--google {
        /*font-family: "Roboto", Roboto, arial, sans-serif;*/
        background: #DD4B39;
    }

    .loginBtn--google:before {
        border-right: #BB3F30 1px solid;
        background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/14082/icon_google.png') 6px 6px no-repeat;
    }

    .loginBtn--google:hover,
    .loginBtn--google:focus {
        background: #E74B37;
    }

    @media (min-width: 768px) {
        .omb_row-sm-offset-3 div:first-child[class*="col-"] {
            margin-left: 25%;
        }
    }

    .omb_login .omb_authTitle {
        text-align: center;
        line-height: 300%;
    }

    .omb_login .omb_socialButtons a {
        color: white;
    / / In yourUse @body-bg opacity: 0.9;
    }

    .omb_login .omb_socialButtons a:hover {
        color: white;
        opacity: 1;
    }

    .omb_login .omb_socialButtons .omb_btn-facebook {
        background: #3b5998;
    }

    .omb_login .omb_socialButtons .omb_btn-twitter {
        background: #00aced;
    }

    .omb_login .omb_socialButtons .omb_btn-google {
        background: #c32f10;
    }

    .omb_login .omb_loginOr {
        position: relative;
        font-size: 1.5em;
        color: #aaa;
        margin-top: 1em;
        margin-bottom: 1em;
        padding-top: 0.5em;
        padding-bottom: 0.5em;
    }

    .omb_login .omb_loginOr .omb_hrOr {
        background-color: #cdcdcd;
        height: 1px;
        margin-top: 0px !important;
        margin-bottom: 0px !important;
    }

    .omb_login .omb_loginOr .omb_spanOr {
        display: block;
        position: absolute;
        left: 50%;
        top: -0.6em;
        margin-left: -1.5em;
        background-color: white;
        width: 3em;
        text-align: center;
    }

    .omb_login .omb_loginForm .input-group.i {
        width: 2em;
    }

    .omb_login .omb_loginForm .help-block {
        color: red;
    }

    .omb_login {
        margin-bottom: 100px;
    }

    @media (min-width: 768px) {
        .omb_login .omb_forgotPwd {
            text-align: right;
            margin-top: 10px;
        }
    }

    .custom-login-fb {
        margin-left: 20px !important;
    }

    .custom-login-gg {
        margin-rightt: 20px !important;
    }

</style>