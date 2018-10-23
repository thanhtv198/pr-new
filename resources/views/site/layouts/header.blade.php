<!-- header-bot-->
<div>
    <div class="col-md-12 header-most-top" id="thanh-header-top">
        <!-- header-bot-->
        <!-- header-bot -->

        <!-- header lists -->
        <ul class="list-inline col-md-6 pull-left">
            <li>
                <a><img src="{{ asset('source/site/images/vietnam.png') }}"></a>
            </li>
            <li>
                <a><img src="{{ asset('source/site/images/english.png') }}"></a>
            </li>
        </ul>
        <ul class="list-inline col-md-6 nav navbar-nav menu__list pull-right" view="header">
            <!-- cart details -->

            @if(!Auth::check())
                <li id="li-top">
                    <a href="#" data-toggle="modal" class="hover-li-top" data-target="#myModal1">
                        <span class="fa fa-unlock-alt" aria-hidden="true"></span> Sign In </a>
                </li>
                <li id="li-top">
                    <a href="#" data-toggle="modal" class="hover-li-top" data-target="#myModal2">
                        <span class="fa fa-pencil-square-o" aria-hidden="true"></span> Sign Up </a>
                </li>
            @else
                <li class="dropdown" id="li-top" >
                    <a class="dropdown-toggle hover-li-top" data-toggle="dropdown" data-target="#" href="javascript:;">
                        <i class="nav-icon fa fa-user"></i>
                        {{ auth()->user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-user" id="dropdown-top">
                        <li class="user-icon"><a href=""><i class="nav-icon fa fa-user"></i>Timeline</a></li>
                        <li class="user-icon"><a href=""><i class="nav-icon fa fa-cog"></i>My Account</a></li>
                        <li class="user-icon"><a href="{{ route('logout') }}"><i class="nav-icon fa fa-sign-out"></i>Logout</a>
                        </li>
                    </ul>
                </li>
                <li id="li-top">
                    <a href="javascript:;" class="hover-li-top">
                        <i class="nav-icon fa fa-bell-o"></i>
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
                    <h3 class="agileinfo_sign">Sign In </h3>
                    <p>
                        Sign In now, Let's start your Grocery Shopping. Don't have an account?
                        <a href="#" data-toggle="modal" data-target="#myModal2">
                            Sign Up Now</a>
                    </p>
                    {!! Form::open(['route' => 'login', 'method' => 'post']) !!}
                    <div class="styled-input agile-styled-input-top">
                        {!! Form::text('email', null, ['class' => 'form-control my-colorpicker1 colorpicker-element']) !!}
                    </div>
                    <div class="styled-input">
                        {!! Form::password('password', ['class' => 'form-control my-colorpicker1 colorpicker-element']) !!}
                    </div>
                    <input type="submit" value="Sign In">
                    {!! Form::close() !!}
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
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
            <div class="modal-body modal-body-sub_agile">
                <div class="main-mailposi">
                    <span class="fa fa-envelope-o" aria-hidden="true"></span>
                </div>
                <div class="modal_body_left modal_body_left1">
                    <h3 class="agileinfo_sign">Sign Up</h3>
                    <p>
                        Come join the Grocery Shoppy! Let's set up your Account.
                    </p>
                    <form action="#" method="post">
                        <div class="styled-input agile-styled-input-top">
                            <input type="text" placeholder="Name" name="Name" required="">
                        </div>
                        <div class="styled-input">
                            <input type="email" placeholder="E-mail" name="Email" required="">
                        </div>
                        <div class="styled-input">
                            <input type="password" placeholder="Password" name="password" id="password1" required="">
                        </div>
                        <div class="styled-input">
                            <input type="password" placeholder="Confirm Password" name="Confirm Password" id="password2"
                                   required="">
                        </div>
                        <input type="submit" value="Sign Up">
                    </form>
                    <p>
                        <a href="#">By clicking register, I agree to your terms</a>
                    </p>
                </div>
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
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                    data-target="#bs-example-navbar-collapse-1"
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
                                    <a class="nav-stylehead" href="index.html">Home
                                        <span class="sr-only">(current)</span>
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle nav-stylehead" data-toggle="dropdown"
                                       role="button" aria-haspopup="true" aria-expanded="false">
                                        Categories
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu multi-column columns-3">
                                        <div class="agile_inner_drop_nav_info">
                                            @foreach($categoriesHeader as $row)
                                                    <div class="col-sm-4 multi-gd-img">
                                                        <h2>{{ $row->name }}</h2>
                                                        <ul class="multi-column-dropdown">
                                                            @foreach($row->subCategory as $sub)
                                                                <li>
                                                                    <a href="product.html">{{ $sub->name }}</a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                            @endforeach
                                            <div class="col-sm-4 multi-gd-img">
                                                <img src="images/nav.png" alt="">
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a class="nav-stylehead dropdown-toggle" href="#" data-toggle="dropdown">
                                        Write Post
                                        <b class="caret"></b>
                                    </a>
                                    <ul class="dropdown-menu agile_short_dropdown">
                                        <li id="li-category">
                                            <a href="icons.html">Sell product</a>
                                        </li>
                                        <li id="li-category">
                                            <a href="typography.html">Discuss</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="">
                                    <a class="nav-stylehead" href="contact.html">Forums</a>
                                </li>
                                <li class="dropdown" id="drop-search">
                                    <div class="input-group" id="thanh-input-group">
                                        <input type="text" class="form-control">
                                        <span class="input-group-btn">
                                            <button class="btn search-button-header">
                                                Search
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