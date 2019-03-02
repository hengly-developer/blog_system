@extends('Layout.front')

@section('content')

        <!-- Header -->
<header id="home">
    <!-- Background Image -->
    <div class="bg-img" style="background-image: url('./storage/colorlib/img/background1.jpg');">
        <div class="overlay"></div>
    </div>
    <!-- /Background Image -->
    <!-- home wrapper -->
    <div class="home-wrapper">
        <div class="container">
            <div class="row">

                <!-- home content -->
                <div class="col-md-10 col-md-offset-1">
                    <div class="home-content">
                        <h1 class="white-text">I am your property agent</h1>
                        <p class="white-text">
                            I can deliver your posts to telegram groups and facebook pages on your schedule basis.
                        </p>
                        <a href="{{ action('Front\HomeController@signin') }}" class="white-btn">Get Started!</a>
                        <button class="main-btn">Learn more</button>
                    </div>
                </div>
                <!-- /home content -->

            </div>
        </div>
    </div>
    <!-- /home wrapper -->

</header>
<!-- /Header -->

        <!-- Service -->
<div id="service" class="section md-padding">

    <!-- Container -->
    <div class="container">

        <!-- Row -->
        <div class="row">

            <!-- Section header -->
            <div class="section-header text-center">
                <h2 class="title">What we offer</h2>
            </div>
            <!-- /Section header -->

            <!-- service -->
            <div class="col-md-4 col-sm-6">
                <div class="service">
                    <i class="fa fa-telegram"></i>
                    <h3>Posts to Telegram Group</h3>
                    <p>Send your posts to telegram groups</p>
                </div>
            </div>
            <!-- /service -->

            <!-- service -->
            <div class="col-md-4 col-sm-6">
                <div class="service">
                    <i class="fa fa-facebook"></i>
                    <h3>Post to Facebook Pages</h3>
                    <p>Send your posts to facebook pages which have thousands of followers and watchers</p>
                </div>
            </div>
            <!-- /service -->

            <!-- service -->
            <div class="col-md-4 col-sm-6">
                <div class="service">
                    <i class="fa fa-rocket"></i>
                    <h3>Schedule Posts</h3>
                    <p>Auto posting your posts to telegram groups which hold thousands of users being online</p>
                </div>
            </div>
            <!-- /service -->
        </div>
        <!-- /Row -->

    </div>
    <!-- /Container -->

</div>
<!-- /Service -->
@endsection