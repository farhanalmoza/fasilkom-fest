<!doctype html>
<html lang="en">

<head>

    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--====== Title ======-->
    <title>Registration @yield('title') - Fasilkom Fest</title>

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{asset('front')}}/images/logofav.png" type="image/png">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="{{asset('front')}}/css/bootstrap.min.css">

    <!--====== Flaticon css ======-->
    <link rel="stylesheet" href="{{asset('front')}}/css/flaticon.css">

    <!--====== Line Icons css ======-->
    <link rel="stylesheet" href="{{asset('front')}}/css/LineIcons.css">

    <!--====== Animate css ======-->
    <link rel="stylesheet" href="{{asset('front')}}/css/animate.css">

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="{{asset('front')}}/css/magnific-popup.css">

    <!--====== Slick css ======-->
    <link rel="stylesheet" href="{{asset('front')}}/css/slick.css">

    <!--====== Default css ======-->
    <link rel="stylesheet" href="{{asset('front')}}/css/default.css">

    <!--====== Style css ======-->
    <link rel="stylesheet" href="{{asset('front')}}/css/style.css">

    {{-- my CSS --}}
    @yield('css')
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
                        @include('participant.pendaftaran.components.navbar') <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div>

        <div id="home" class="subheader bg_cover d-flex align-items-center" style="background-image: url({{asset('front')}}/images/header-bg.jpg)">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">                        
                        <div class="header-content text-center">
                            <h2 class="header-title">@yield('title')</h2>
                        </div>  <!-- header content -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- header content -->
    </header>

    {{-- section for show message --}}
    <section id="alert-message">
        
    </section>

    <!--====== HEADER PART ENDS ======-->

    @yield('content')

    <!--====== FOOTER PART START ======-->

    <section id="footer" class="footer-area bg_cover" style="background-image: url({{ asset('front') }}/images/footer.jpg)">
        <div class="footer-widget">
            <div class="container">
                <div class="widget  pt-50 pb-130">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="footer-address mt-40">
                                <h5 class="f-title">Venue Location</h5>
                                <p class="text">18 - 21 DECEMBER, 2022 <br> 51 Francis Street, Cesare Rosaroll, 118 80139 Eventine</p>
                            </div> <!-- footer address -->
                        </div>
                        <div class="col-lg-6">
                            <div class="footer-contact mt-40">
                                <h5 class="f-title">Social Connection</h5>
                                <p class="text">Don't miss anything! Follow our social media accounts for fast and accurate information wherever you are.</p>
                                <ul class="social">
                                    <!-- <li><a href="#"><i class="lni-facebook-filled"></i></a></li> -->
                                    <li><a href="#" id="link-email"><i class="lni-envelope"></i></a></li>
                                    <li><a href="#" id="link-instagram"><i class="lni-instagram-original"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div> <!-- row -->
                </div> <!-- widget -->
            </div> <!-- container -->
        </div> <!-- footer widget -->
        
        <div class="footer-copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright text-center">
                            <p class="text"><a href="#" rel="nofollow">BEM Fasilkom</a> UPN Veteran Jawa Timur 2022</p>
                        </div> <!-- copyright -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- container -->
    </section>

    <!--====== FOOTER PART ENDS ======-->
    
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
    <script src="{{asset('front')}}/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="{{asset('front')}}/js/vendor/jquery-1.12.4.min.js"></script>

    <!--====== Bootstrap js ======-->
    <script src="{{asset('front')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('front')}}/js/popper.min.js"></script>

    <!--====== Counter Up js ======-->
    <script src="{{asset('front')}}/js/waypoints.min.js"></script>
    <script src="{{asset('front')}}/js/jquery.counterup.min.js"></script>

    <!--====== Slick js ======-->
    <script src="{{asset('front')}}/js/slick.min.js"></script>

    <!--====== Magnific Popup js ======-->
    <script src="{{asset('front')}}/js/jquery.magnific-popup.min.js"></script>

    <!--====== Scrolling Nav js ======-->
    <script src="{{asset('front')}}/js/jquery.easing.min.js"></script>

    <!--====== wow js ======-->
    <script src="{{asset('front')}}/js/wow.min.js"></script>

    <!--====== Ajax Contact js ======-->
    <script src="{{asset('front')}}/js/ajax-contact.js"></script>

    <!--====== Main js ======-->
    <script src="{{asset('front')}}/js/main.js"></script>

    <!-- Validation -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js" integrity="sha512-6Uv+497AWTmj/6V14BsQioPrm3kgwmK9HYIyWP+vClykX52b0zrDGP7lajZoIY1nNlX4oQuh7zsGjmF7D0VZYA==" crossorigin="anonymous"></script>

    <!--====== My js ======-->
    <script>
        const URL_DATA = '{{ url("data") }}'
    </script>
    <script src="{{ asset('dashboard') }}/js/functions.js"></script>
    @yield('js')
</body>

</html>
