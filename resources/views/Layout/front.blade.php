<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>@yield('title')</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CVarela+Round" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{ asset('storage/colorlib/css/bootstrap.min.css') }}" />

    <!-- Owl Carousel -->
    <link type="text/css" rel="stylesheet" href="{{ asset('storage/colorlib/css/owl.carousel.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('storage/colorlib/css/owl.theme.default.css') }}" />

    <!-- Magnific Popup -->
    <link type="text/css" rel="stylesheet" href="{{ asset('storage/colorlib/css/magnific-popup.css') }}" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{ asset('storage/colorlib/css/font-awesome.min.css') }}">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('storage/colorlib/css/style.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('storage/css/style.css') }}" />

    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('storage/summernote-emoji/tam-emoji/css/emoji.css') }}">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<!-- Nav -->
<nav id="nav" class="navbar" style="border-bottom: 1px solid #eee;">
    <div class="container">

        <div class="navbar-header">
            <!-- Logo -->
            <div class="navbar-brand">
                <a href="/">
                    <img class="logo" src="{{ asset('storage/colorlib/img/logo.png') }}" alt="logo">
                    <img class="logo-alt" src="{{ asset('storage/colorlib/img/logo-alt.png') }}" alt="logo">
                </a>
            </div>
            <!-- /Logo -->

            <!-- Collapse nav button -->
            <div class="nav-collapse">
                <span></span>
            </div>
            <!-- /Collapse nav button -->
        </div>

        <!--  Main navigation  -->
        <ul class="main-nav nav navbar-nav navbar-right">
            <li><a href="{{ action('Front\HomeController@index') }}">Home</a></li>
            <li><a href="/#service">Services</a></li>
            @if (\Illuminate\Support\Facades\Session::has('poster'))
                <li class="has-dropdown">
                    <a href="#">{{ \Illuminate\Support\Facades\Session::get('poster')->name }}</a>
                    <ul class="dropdown">
                        <li><a href="{{ action('Front\User\UserController@profile', \Illuminate\Support\Facades\Session::get('poster')->id) }}">Profile</a></li>
                        <li><a href="{{ action('Front\Post\PostController@index') }}">My Posts</a></li>
                        <li><a href="{{ action('Front\HomeController@signout') }}">Sign Out</a></li>
                    </ul>
                </li>
            @else
                <li><a href="{{ action('Front\HomeController@signin') }}">Sign in</a></li>
                <li><a href="{{ action('Front\HomeController@signup') }}">Sign up</a></li>
            @endif
        </ul>
        <!-- /Main navigation -->

    </div>
</nav>
<!-- /Nav -->

<div class="wrapper">
    @yield('content')
</div>

<!-- Footer -->
<footer id="footer" class="sm-padding bg-dark">

    <!-- Container -->
    <div class="container">

        <!-- Row -->
        <div class="row">

            <div class="col-md-12">

                <!-- footer logo -->
                <div class="footer-logo">
                    <a href="index.html"><img src="{{ asset('storage/colorlib/img/logo-alt.png') }}" alt="logo"></a>
                </div>
                <!-- /footer logo -->

                <!-- footer follow -->
                <ul class="footer-follow">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                </ul>
                <!-- /footer follow -->

                <!-- footer copyright -->
                <div class="footer-copyright">
                    <p>Copyright © 2017. All Rights Reserved. Designed by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
                </div>
                <!-- /footer copyright -->

            </div>

        </div>
        <!-- /Row -->

    </div>
    <!-- /Container -->

</footer>
<!-- /Footer -->

<!-- Back to top -->
<div id="back-to-top"></div>
<!-- /Back to top -->

<!-- Preloader -->
<div id="preloader">
    <div class="preloader">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>
<!-- /Preloader -->

<!-- jQuery Plugins -->
<script type="text/javascript" src="{{ asset('storage/colorlib/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('storage/colorlib/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('storage/colorlib/js/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('storage/colorlib/js/jquery.magnific-popup.js') }}"></script>
<script type="text/javascript" src="{{ asset('storage/colorlib/js/main.js') }}"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>
<script src="{{ asset('storage/summernote-emoji/tam-emoji/js/config.js') }}"></script>
<script src="{{ asset('storage/summernote-emoji/tam-emoji/js/tam-emoji.js') }}"></script>

@yield('script')
</body>

</html>
