<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ trans('common.tag.title_site') }}</title>
    <!--/tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="user" content="{{ Auth::check() ? Auth::user()->id : ''}}">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="sing, LG, SonyEricsson, Motorola web design"/>
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);
        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>

    <!--//tags -->
    <link href="{{ asset('source/site/css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{ asset('source/site/css/style.css') }}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{ asset('source/site/css/font-awesome.css') }}" rel="stylesheet">
    <!--pop-up-box-->
    <link href="{{ asset('source/site/css/popuo-box.css') }}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{ asset('source/site/css/custom-banner.css') }}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{ asset('source/site/css/custom-header.css') }}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{ asset('source/site/css/custom-container.css') }}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{ asset('source/site/css/custom-footer.css') }}" rel="stylesheet" type="text/css" media="all"/>
    <!--//pop-up-box-->
    <!-- price range -->
    <link rel="stylesheet" type="text/css" href="{{ asset('source/site/css/jquery-ui1.css') }}">
    <script src="{{ asset('source/site/js/172.jquery.min.js') }}"></script>
    <!-- js-files -->
    <!-- jquery -->

    <script src="{{ asset('source/site/js/jquery-2.1.4.min.js') }}"></script>
    <!-- //jquery -->
    <!-- popup modal (for signin & signup)-->
    <script src="{{ asset('source/site/js/jquery.magnific-popup.js') }}"></script>
    <!-- cart-js -->
    <script src="{{ asset('source/site/js/minicart.js') }}"></script>
    <!-- price range (top products) -->
    <script src="{{ asset('source/site/js/jquery-ui.js') }}"></script>
    <!-- flexisel (for special offers) -->
    <script src="{{ asset('source/site/js/jquery.flexisel.js') }}"></script>
    <script src="{{ asset('source/site/js/SmoothScroll.min.js') }}"></script>
    <script src="{{ asset('source/site/js/move-top.js') }}"></script>
    <script src="{{ asset('source/site/js/easing.js') }}"></script>
    <script src="{{ asset('source/site/js/bootstrap.js') }}"></script>
    <script src="{{ asset('source/site/js/custom.js') }}"></script>
    <script src="{{ asset('source/site/js/jquery-ui1.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('source/site/css/jquery-ui.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('source/site/css//star-rating.css') }}" type="text/css">
    <script src="{{ asset('source/site/js/star-rating.js') }}"></script>
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <!-- fonts -->
    <script>
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.1&appId=274435310069045&autoLogAppEvents=1';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
</head>
<body>
<div class="app">
    @include('site/layouts/header')
    @yield('content')
    @include('site/layouts/footer')
</div>
</body>
</html>

