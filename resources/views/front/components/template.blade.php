<!doctype html>
<html lang="en">

<head>

    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--====== Title ======-->
    <title>@yield('title') - Fasilkom Fest</title>

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{ asset('front') }}/images/favicon.png" type="image/png">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="{{ asset('front') }}/css/bootstrap.min.css">

    <!--====== Flaticon css ======-->
    <link rel="stylesheet" href="{{ asset('front') }}/css/flaticon.css">

    <!--====== Line Icons css ======-->
    <link rel="stylesheet" href="{{ asset('front') }}/css/LineIcons.css">

    <!--====== Animate css ======-->
    <link rel="stylesheet" href="{{ asset('front') }}/css/animate.css">

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="{{ asset('front') }}/css/magnific-popup.css">

    <!--====== Slick css ======-->
    <link rel="stylesheet" href="{{ asset('front') }}/css/slick.css">

    <!--====== Default css ======-->
    <link rel="stylesheet" href="{{ asset('front') }}/css/default.css">

    <!--====== Style css ======-->
    <link rel="stylesheet" href="{{ asset('front') }}/css/style.css">


</head>

<body>

    <!--====== PRELOADER PART START ======-->

    <div class="preloader">
        <div class="loader">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== PRELOADER PART ENDS ======-->

    <!--====== HEADER PART START ======-->

    <header class="header-area">
        <div class="navbar-area navbar-two">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        @include('front.components.navbar') <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div>

        @include('front.components.header') <!-- header content -->
    </header>

    <!--====== HEADER PART ENDS ======-->

    @yield('content')

    @include('front.components.footer') <!-- footer -->
    
    <!--====== BACK TOP TOP PART START ======-->

    <a href="#" class="back-to-top"><i class="lni-chevron-up"></i></a>

    <!--====== BACK TOP TOP PART ENDS ======--> 

    <!--====== PART START ======-->

<!--
    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-">
                    
                </div>
            </div>
        </div>
    </section>
-->

    <!--====== PART ENDS ======-->

    <!-- row -->

    <!--====== jquery js ======-->
    <script src="{{ asset('front') }}/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="{{ asset('front') }}/js/vendor/jquery-1.12.4.min.js"></script>

    <!--====== Bootstrap js ======-->
    <script src="{{ asset('front') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('front') }}/js/popper.min.js"></script>

    <!--====== Counter Up js ======-->
    <script src="{{ asset('front') }}/js/waypoints.min.js"></script>
    <script src="{{ asset('front') }}/js/jquery.counterup.min.js"></script>

    <!--====== Slick js ======-->
    <script src="{{ asset('front') }}/js/slick.min.js"></script>

    <!--====== Magnific Popup js ======-->
    <script src="{{ asset('front') }}/js/jquery.magnific-popup.min.js"></script>

    <!--====== Scrolling Nav js ======-->
    <script src="{{ asset('front') }}/js/jquery.easing.min.js"></script>
    <script src="{{ asset('front') }}/js/scrolling-nav.js"></script>

    <!--====== Countdown js ======-->
    <script src="{{ asset('front') }}/js/jquery.countdown.min.js"></script>

    <!--====== wow js ======-->
    <script src="{{ asset('front') }}/js/wow.min.js"></script>

    <!--====== Ajax Contact js ======-->
    <script src="{{ asset('front') }}/js/ajax-contact.js"></script>

    <!--====== Main js ======-->
    <script src="{{ asset('front') }}/js/main.js"></script>

    <!--====== My js ======-->
    <script>
        const BASE_URL = '{{ url("/") }}'
        const ASSET = '{{ asset("dashboard") }}'
        const URL_DATA = '{{ url("data") }}'
        const email = '{{ auth()->user()->email }}'
        const user_id = '{{ auth()->user()->id }}'
    </script>
    <script src="{{ asset('dashboard') }}/js/functions.js"></script>
    @yield('js')
</body>

</html>