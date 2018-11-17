
<header class="main-header">
    <!-- Logo -->
    <a href="{{ route('home_admin') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>{{ trans('common.tag.header_admin_home_page') }}</b></span>
    </a>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button"></a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="messages-menu" style="margin-top: 10px">
                    <div class="sl-nav">
                        <ul>
                            <li>
                                <span style="color: white">
                                    @if($lang == 'en')
                                        {{ trans('common.header.lang') }}: <img src="{{ asset('source/site/images/english.png') }}">
                                    @else
                                        {{ trans('common.header.lang') }}: <img src="{{ asset('source/site/images/vietnam.png') }}">
                                    @endif
                                </span>
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
                <li class="messages-menu">
                    <!-- Menu toggle button -->
                    <a href="#" class="dropdown-toggle">
                        <span class="hidden-xs">{{ trans('common.tag.header_admin_site_page') }}</span>
                    </a>
                </li>
                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="hidden-xs">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                            <p>{{ Auth::user()->name }}
                                <small>{{ trans('common.tag.header_admin_user') }}</small>
                            </p>
                        </li>
                                <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-right">
                                <a href="{{ route('logout_admin') }}" class="btn btn-default btn-flat">{{ trans('common.tag.header_admin_sign_out') }}</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<style>
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
        /*padding-bottom: 10px;*/
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

</style>

