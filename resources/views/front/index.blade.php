@extends('front.components.template')
@section('title', 'Home')

@section('content')
<!--====== ABOUT PART START ======-->

<section id="about" class="about-area pb-130 pt-80">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about-image mt-50 wow fadeInLeft" data-wow-duration="1s">
                    <img src="{{ asset('front') }}/images/about.png" alt="About">
                </div> <!-- about image -->
            </div>
            <div class="col-lg-6">
                <div class="about-content mt-45 wow fadeInRight" data-wow-duration="1s">
                    <div class="section-title">
                        <h2 class="title">About Our Meetups</h2>
                    </div> <!-- section title -->

                    <p class="text mt-30">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip. <br> <br> Adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>
                    <p class="date"><span>25<sup>th</sup></span> December’ 19</p>
                </div> <!-- about content -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<!--====== ABOUT PART ENDS ======-->

<!--====== COUNTER PART START ======-->

<section id="counter" class="counter-area pt-80 pb-130">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="single-counter text-center mt-100 wow fadeIn" data-wow-duration="1s" data-wow-delay="0s">
                    <div class="counter-icon">
                        <i class="lni-mic"></i>
                    </div>
                    <div class="counter-content">
                        <span class="count counter">45</span>
                        <p class="text">Expert Speaker</p>
                    </div>
                </div> <!-- single counter -->
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-counter text-center mt-100 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
                    <div class="counter-icon">
                        <i class="lni-bulb"></i>
                    </div>
                    <div class="counter-content">
                        <span class="count counter">800</span>
                        <p class="text">Seats Available</p>
                    </div>
                </div> <!-- single counter -->
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-counter text-center mt-100 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.6s">
                    <div class="counter-icon">
                        <i class="lni-briefcase"></i>
                    </div>
                    <div class="counter-content">
                        <span class="count counter">29</span>
                        <p class="text">Sonsors</p>
                    </div>
                </div> <!-- single counter -->
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-counter text-center mt-100 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.9s">
                    <div class="counter-icon">
                        <i class="lni-coffee-cup"></i>
                    </div>
                    <div class="counter-content">
                        <span class="count counter">56</span>
                        <p class="text">Sessions</p>
                    </div>
                </div> <!-- single counter -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<!--====== COUNTER PART ENDS ======-->

<!--====== EVENT SCHEDULE PART START ======-->

<section id="event" class="event-schedule pt-115 pb-130">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title text-center">
                    <h2 class="title">EVENT SCHEDULE</h2>
                    <p class="text">Lorem ipsum dolor sit amet, in quodsi vulputate pro. Ius illum vocent mediocritatem reiciendis odit sed, vero amet blanditiis cule dicta iriure at phaedrum.</p>
                </div> <!-- section title -->
            </div>
        </div> <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="event-tab mt-60">
                    <ul class="nav justify-content-between align-items-center" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="active" id="day-1-tab" data-toggle="tab" href="#day-1" role="tab" aria-controls="day-1" aria-selected="true">
                                <h4 class="nav-title">Day 1</h4>
                                <span>28 July, 2022</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a id="day-2-tab" data-toggle="tab" href="#day-2" role="tab" aria-controls="day-2" aria-selected="false">
                                <h4 class="nav-title">Day 2</h4>
                                <span>28 July, 2022</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a id="day-3-tab" data-toggle="tab" href="#day-3" role="tab" aria-controls="day-3" aria-selected="false">
                                <h4 class="nav-title">Day 3</h4>
                                <span>28 July, 2022</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a id="day-4-tab" data-toggle="tab" href="#day-4" role="tab" aria-controls="day-4" aria-selected="false">
                                <h4 class="nav-title">Day 4</h4>
                                <span>28 July, 2022</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="day-1" role="tabpanel" aria-labelledby="day-1-tab">
                            <div class="event-content pt-40">
                                <div class="single-event d-md-flex mt-30">
                                    <div class="event-image">
                                        <img src="{{ asset('front') }}/images/event-1.jpg" alt="Event">
                                    </div>
                                    <div class="event-content media-body">
                                        <h4 class="event-title">Web Design Principle and Best Practise</h4>
                                        <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet minima dolores rerum maiores qui at commodi quas, reprehenderit eius consectetur quae magni molestias veniam, provident illum facere iure libero asperiores!</p>
                                        <ul class="event-meta">
                                            <li>Start: 12.00 PM</li>
                                            <li>End: 15.00 PM</li>
                                            <li>Location: Hall 1 , Building A, Golden Street, Southafrica</li>
                                        </ul>
                                    </div>
                                </div> <!-- single event -->

                                <div class="single-event d-md-flex mt-30">
                                    <div class="event-image">
                                        <img src="{{ asset('front') }}/images/event-2.jpg" alt="Event">
                                    </div>
                                    <div class="event-content media-body">
                                        <h4 class="event-title">15 FREE PRODUCTIVE DESIGN TOOLS</h4>
                                        <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet minima dolores rerum maiores qui at commodi quas, reprehenderit eius consectetur quae magni molestias veniam, provident illum facere iure libero asperiores!</p>
                                        <ul class="event-meta">
                                            <li>Start: 12.00 PM</li>
                                            <li>End: 15.00 PM</li>
                                            <li>Location: Hall 1 , Building A, Golden Street, Southafrica</li>
                                        </ul>
                                    </div>
                                </div> <!-- single event -->

                                <div class="single-event d-md-flex mt-30">
                                    <div class="event-image">
                                        <img src="{{ asset('front') }}/images/event-3.jpg" alt="Event">
                                    </div>
                                    <div class="event-content media-body">
                                        <h4 class="event-title">GETTING STARTED WITH SKETCHAPP</h4>
                                        <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet minima dolores rerum maiores qui at commodi quas, reprehenderit eius consectetur quae magni molestias veniam, provident illum facere iure libero asperiores!</p>
                                        <ul class="event-meta">
                                            <li>Start: 12.00 PM</li>
                                            <li>End: 15.00 PM</li>
                                            <li>Location: Hall 1 , Building A, Golden Street, Southafrica</li>
                                        </ul>
                                    </div>
                                </div> <!-- single event -->
                            </div> <!-- event content -->
                        </div>
                        <div class="tab-pane fade" id="day-2" role="tabpanel" aria-labelledby="day-2-tab">
                            <div class="event-content pt-40">
                                <div class="single-event d-md-flex mt-30">
                                    <div class="event-image">
                                        <img src="{{ asset('front') }}/images/event-1.jpg" alt="Event">
                                    </div>
                                    <div class="event-content media-body">
                                        <h4 class="event-title">Web Design Principle and Best Practise</h4>
                                        <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet minima dolores rerum maiores qui at commodi quas, reprehenderit eius consectetur quae magni molestias veniam, provident illum facere iure libero asperiores!</p>
                                        <ul class="event-meta">
                                            <li>Start: 12.00 PM</li>
                                            <li>End: 15.00 PM</li>
                                            <li>Location: Hall 1 , Building A, Golden Street, Southafrica</li>
                                        </ul>
                                    </div>
                                </div> <!-- single event -->

                                <div class="single-event d-md-flex mt-30">
                                    <div class="event-image">
                                        <img src="{{ asset('front') }}/images/event-2.jpg" alt="Event">
                                    </div>
                                    <div class="event-content media-body">
                                        <h4 class="event-title">15 FREE PRODUCTIVE DESIGN TOOLS</h4>
                                        <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet minima dolores rerum maiores qui at commodi quas, reprehenderit eius consectetur quae magni molestias veniam, provident illum facere iure libero asperiores!</p>
                                        <ul class="event-meta">
                                            <li>Start: 12.00 PM</li>
                                            <li>End: 15.00 PM</li>
                                            <li>Location: Hall 1 , Building A, Golden Street, Southafrica</li>
                                        </ul>
                                    </div>
                                </div> <!-- single event -->

                                <div class="single-event d-md-flex mt-30">
                                    <div class="event-image">
                                        <img src="{{ asset('front') }}/images/event-3.jpg" alt="Event">
                                    </div>
                                    <div class="event-content media-body">
                                        <h4 class="event-title">GETTING STARTED WITH SKETCHAPP</h4>
                                        <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet minima dolores rerum maiores qui at commodi quas, reprehenderit eius consectetur quae magni molestias veniam, provident illum facere iure libero asperiores!</p>
                                        <ul class="event-meta">
                                            <li>Start: 12.00 PM</li>
                                            <li>End: 15.00 PM</li>
                                            <li>Location: Hall 1 , Building A, Golden Street, Southafrica</li>
                                        </ul>
                                    </div>
                                </div> <!-- single event -->
                            </div> <!-- event content -->
                        </div>
                        <div class="tab-pane fade" id="day-3" role="tabpanel" aria-labelledby="day-3-tab">
                            <div class="event-content pt-40">
                                <div class="single-event d-md-flex mt-30">
                                    <div class="event-image">
                                        <img src="{{ asset('front') }}/images/event-1.jpg" alt="Event">
                                    </div>
                                    <div class="event-content media-body">
                                        <h4 class="event-title">Web Design Principle and Best Practise</h4>
                                        <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet minima dolores rerum maiores qui at commodi quas, reprehenderit eius consectetur quae magni molestias veniam, provident illum facere iure libero asperiores!</p>
                                        <ul class="event-meta">
                                            <li>Start: 12.00 PM</li>
                                            <li>End: 15.00 PM</li>
                                            <li>Location: Hall 1 , Building A, Golden Street, Southafrica</li>
                                        </ul>
                                    </div>
                                </div> <!-- single event -->

                                <div class="single-event d-md-flex mt-30">
                                    <div class="event-image">
                                        <img src="{{ asset('front') }}/images/event-2.jpg" alt="Event">
                                    </div>
                                    <div class="event-content media-body">
                                        <h4 class="event-title">15 FREE PRODUCTIVE DESIGN TOOLS</h4>
                                        <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet minima dolores rerum maiores qui at commodi quas, reprehenderit eius consectetur quae magni molestias veniam, provident illum facere iure libero asperiores!</p>
                                        <ul class="event-meta">
                                            <li>Start: 12.00 PM</li>
                                            <li>End: 15.00 PM</li>
                                            <li>Location: Hall 1 , Building A, Golden Street, Southafrica</li>
                                        </ul>
                                    </div>
                                </div> <!-- single event -->

                                <div class="single-event d-md-flex mt-30">
                                    <div class="event-image">
                                        <img src="{{ asset('front') }}/images/event-3.jpg" alt="Event">
                                    </div>
                                    <div class="event-content media-body">
                                        <h4 class="event-title">GETTING STARTED WITH SKETCHAPP</h4>
                                        <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet minima dolores rerum maiores qui at commodi quas, reprehenderit eius consectetur quae magni molestias veniam, provident illum facere iure libero asperiores!</p>
                                        <ul class="event-meta">
                                            <li>Start: 12.00 PM</li>
                                            <li>End: 15.00 PM</li>
                                            <li>Location: Hall 1 , Building A, Golden Street, Southafrica</li>
                                        </ul>
                                    </div>
                                </div> <!-- single event -->
                            </div> <!-- event content -->
                        </div>
                        <div class="tab-pane fade" id="day-4" role="tabpanel" aria-labelledby="day-4-tab">
                            <div class="event-content pt-40">
                                <div class="single-event d-md-flex mt-30">
                                    <div class="event-image">
                                        <img src="{{ asset('front') }}/images/event-1.jpg" alt="Event">
                                    </div>
                                    <div class="event-content media-body">
                                        <h4 class="event-title">Web Design Principle and Best Practise</h4>
                                        <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet minima dolores rerum maiores qui at commodi quas, reprehenderit eius consectetur quae magni molestias veniam, provident illum facere iure libero asperiores!</p>
                                        <ul class="event-meta">
                                            <li>Start: 12.00 PM</li>
                                            <li>End: 15.00 PM</li>
                                            <li>Location: Hall 1 , Building A, Golden Street, Southafrica</li>
                                        </ul>
                                    </div>
                                </div> <!-- single event -->

                                <div class="single-event d-md-flex mt-30">
                                    <div class="event-image">
                                        <img src="{{ asset('front') }}/images/event-2.jpg" alt="Event">
                                    </div>
                                    <div class="event-content media-body">
                                        <h4 class="event-title">15 FREE PRODUCTIVE DESIGN TOOLS</h4>
                                        <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet minima dolores rerum maiores qui at commodi quas, reprehenderit eius consectetur quae magni molestias veniam, provident illum facere iure libero asperiores!</p>
                                        <ul class="event-meta">
                                            <li>Start: 12.00 PM</li>
                                            <li>End: 15.00 PM</li>
                                            <li>Location: Hall 1 , Building A, Golden Street, Southafrica</li>
                                        </ul>
                                    </div>
                                </div> <!-- single event -->

                                <div class="single-event d-md-flex mt-30">
                                    <div class="event-image">
                                        <img src="{{ asset('front') }}/images/event-3.jpg" alt="Event">
                                    </div>
                                    <div class="event-content media-body">
                                        <h4 class="event-title">GETTING STARTED WITH SKETCHAPP</h4>
                                        <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet minima dolores rerum maiores qui at commodi quas, reprehenderit eius consectetur quae magni molestias veniam, provident illum facere iure libero asperiores!</p>
                                        <ul class="event-meta">
                                            <li>Start: 12.00 PM</li>
                                            <li>End: 15.00 PM</li>
                                            <li>Location: Hall 1 , Building A, Golden Street, Southafrica</li>
                                        </ul>
                                    </div>
                                </div> <!-- single event -->
                            </div> <!-- event content -->
                        </div>
                    </div>
                </div> <!-- event tab -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<!--====== EVENT SCHEDULE PART ENDS ======-->

<!--====== FEATURES PART START ======-->

<section id="features" class="features-area pt-115 pb-130 gray-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title text-center pb-20">
                    <h2 class="title">Why You Should Join?</h2>
                    <p class="text">Lorem ipsum dolor sit amet, in quodsi vulputate pro. Ius illum vocent mediocritatem reiciendis odit sed, vero amet blanditiis cule dicta iriure at phaedrum.</p>
                </div> <!-- section title -->
            </div>
        </div> <!-- row -->
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 col-sm-8">
                <div class="single-features text-center mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0s">
                    <div class="features-icon">
                        <i class="lni-microphone"></i>
                        <span>01</span>
                    </div>
                    <div class="features-content">
                        <h4 class="features-title"><a href="#">Great Speakers</a></h4>
                        <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor dunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                    </div>
                </div> <!-- single features -->
            </div>
            <div class="col-lg-4 col-md-6 col-sm-8">
                <div class="single-features text-center mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                    <div class="features-icon">
                        <i class="lni-users"></i>
                        <span>02</span>
                    </div>
                    <div class="features-content">
                        <h4 class="features-title"><a href="#">New People</a></h4>
                        <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor dunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                    </div>
                </div> <!-- single features -->
            </div>
            <div class="col-lg-4 col-md-6 col-sm-8">
                <div class="single-features text-center mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="1s">
                    <div class="features-icon">
                        <i class="lni-bullhorn"></i>
                        <span>03</span>
                    </div>
                    <div class="features-content">
                        <h4 class="features-title"><a href="#">Global Event</a></h4>
                        <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor dunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                    </div>
                </div> <!-- single features -->
            </div>
            <div class="col-lg-4 col-md-6 col-sm-8">
                <div class="single-features text-center mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                    <div class="features-icon">
                        <i class="lni-heart"></i>
                        <span>04</span>
                    </div>
                    <div class="features-content">
                        <h4 class="features-title"><a href="#">Get Inspired</a></h4>
                        <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor dunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                    </div>
                </div> <!-- single features -->
            </div>
            <div class="col-lg-4 col-md-6 col-sm-8">
                <div class="single-features text-center mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="1s">
                    <div class="features-icon">
                        <i class="lni-cup"></i>
                        <span>05</span>
                    </div>
                    <div class="features-content">
                        <h4 class="features-title"><a href="#">Networking Session</a></h4>
                        <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor dunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                    </div>
                </div> <!-- single features -->
            </div>
            <div class="col-lg-4 col-md-6 col-sm-8">
                <div class="single-features text-center mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="1.5s">
                    <div class="features-icon">
                        <i class="lni-gallery"></i>
                        <span>06</span>
                    </div>
                    <div class="features-content">
                        <h4 class="features-title"><a href="#">Meet New Faces</a></h4>
                        <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor dunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                    </div>
                </div> <!-- single features -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<!--====== FEATURES PART ENDS ======-->

<!--====== TEAM PART START ======-->

<section id="team" class="team-area pt-115 pb-130">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title text-center pb-20">
                    <h2 class="title">Who’s Speaking</h2>
                    <p class="text">Lorem ipsum dolor sit amet, in quodsi vulputate pro. Ius illum vocent mediocritatem reiciendis odit sed, vero amet blanditiis cule dicta iriure at phaedrum.</p>
                </div> <!-- section title -->
            </div>
        </div> <!-- row -->

        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="single-team text-center mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0s">
                    <div class="team-image">
                        <img src="{{ asset('front') }}/images/team-1.jpg" alt="Team">
                    </div>
                    <div class="team-content">
                        <div class="team-social">
                            <ul class="social">
                                <li><a href="#"><i class="lni-instagram-original"></i></a></li>
                                <li><a href="#"><i class="lni-envelope"></i></a></li>
                                <li><a href="#"><i class="lni-linkedin-original"></i></a></li>
                            </ul>
                        </div>
                        <h4 class="team-name"><a href="#">Mark A. Parker</a></h4>
                        <span class="sub-title">Web Developer</span>
                    </div>
                </div> <!-- single team -->
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="single-team text-center mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                    <div class="team-image">
                        <img src="{{ asset('front') }}/images/team-2.jpg" alt="Team">
                    </div>
                    <div class="team-content">
                        <div class="team-social">
                            <ul class="social">
                                <li><a href="#"><i class="lni-instagram-original"></i></a></li>
                                <li><a href="#"><i class="lni-envelope"></i></a></li>
                                <li><a href="#"><i class="lni-linkedin-original"></i></a></li>
                            </ul>
                        </div>
                        <h4 class="team-name"><a href="#">Jonathan P Deo</a></h4>
                        <span class="sub-title">UX Speacilist</span>
                    </div>
                </div> <!-- single team -->
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="single-team text-center mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="1s">
                    <div class="team-image">
                        <img src="{{ asset('front') }}/images/team-3.jpg" alt="Team">
                    </div>
                    <div class="team-content">
                        <div class="team-social">
                            <ul class="social">
                                <li><a href="#"><i class="lni-instagram-original"></i></a></li>
                                <li><a href="#"><i class="lni-envelope"></i></a></li>
                                <li><a href="#"><i class="lni-linkedin-original"></i></a></li>
                            </ul>
                        </div>
                        <h4 class="team-name"><a href="#">Adam Smith</a></h4>
                        <span class="sub-title">UX Speacilist</span>
                    </div>
                </div> <!-- single team -->
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="single-team text-center mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                    <div class="team-image">
                        <img src="{{ asset('front') }}/images/team-4.jpg" alt="Team">
                    </div>
                    <div class="team-content">
                        <div class="team-social">
                            <ul class="social">
                                <li><a href="#"><i class="lni-instagram-original"></i></a></li>
                                <li><a href="#"><i class="lni-envelope"></i></a></li>
                                <li><a href="#"><i class="lni-linkedin-original"></i></a></li>
                            </ul>
                        </div>
                        <h4 class="team-name"><a href="#">Robert Jhonson</a></h4>
                        <span class="sub-title">UX Speacilist</span>
                    </div>
                </div> <!-- single team -->
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="single-team text-center mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="1s">
                    <div class="team-image">
                        <img src="{{ asset('front') }}/images/team-5.jpg" alt="Team">
                    </div>
                    <div class="team-content">
                        <div class="team-social">
                            <ul class="social">
                                <li><a href="#"><i class="lni-instagram-original"></i></a></li>
                                <li><a href="#"><i class="lni-envelope"></i></a></li>
                                <li><a href="#"><i class="lni-linkedin-original"></i></a></li>
                            </ul>
                        </div>
                        <h4 class="team-name"><a href="#">Jonathan P Deo</a></h4>
                        <span class="sub-title">UX Speacilist</span>
                    </div>
                </div> <!-- single team -->
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="single-team text-center mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="1.5s">
                    <div class="team-image">
                        <img src="{{ asset('front') }}/images/team-6.jpg" alt="Team">
                    </div>
                    <div class="team-content">
                        <div class="team-social">
                            <ul class="social">
                                <li><a href="#"><i class="lni-instagram-original"></i></a></li>
                                <li><a href="#"><i class="lni-envelope"></i></a></li>
                                <li><a href="#"><i class="lni-linkedin-original"></i></a></li>
                            </ul>
                        </div>
                        <h4 class="team-name"><a href="#">Steve Jk Jobs</a></h4>
                        <span class="sub-title">UX Speacilist</span>
                    </div>
                </div> <!-- single team -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<!--====== TEAM PART ENDS ======-->

<!--====== PRICING PART START ======-->

<section id="pricing" class="pricing-area pt-115 pb-200 gray-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title text-center pb-20">
                    <h2 class="title">Ticket Pricing</h2>
                    <p class="text">Lorem ipsum dolor sit amet, in quodsi vulputate pro. Ius illum vocent mediocritatem reiciendis odit sed, vero amet blanditiis cule dicta iriure at phaedrum.</p>
                </div> <!-- section title -->
            </div>
        </div> <!-- row -->
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-8 col-sm-9">
                <div class="single-pricing text-center mt-30 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0s">
                    <div class="pricing-name">
                        <h4 class="pricing-title">BASIC PASS</h4>
                        <span class="sub-title">Price Excluding 20% VAT</span>
                    </div>
                    <div class="pricing-price">
                        <span>$ 29.00</span>
                        <p class="text">Per Day</p>
                    </div>
                    <div class="pricing-list">
                        <ul>
                            <li>Pro  Regular Seating</li>
                            <li>Best Comfortable Seat</li>
                            <li>Coffee Break With Snacks</li>
                            <li>One Workshop For Practise</li>
                            <li>Course Certificate</li>
                        </ul>
                    </div>
                    <div class="pricing-btn">
                        <a class="main-btn" href="javascript:(0)">Buy Ticket</a>
                    </div>
                </div> <!-- single pricing -->
            </div>
            <div class="col-lg-4 col-md-8 col-sm-9">
                <div class="single-pricing active text-center mt-30 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
                    <div class="pricing-name">
                        <h4 class="pricing-title">STANDARD PASS</h4>
                        <span class="sub-title">Price Excluding 20% VAT</span>
                    </div>
                    <div class="pricing-price">
                        <span>$ 39.00</span>
                        <p class="text">Per Day</p>
                    </div>
                    <div class="pricing-list">
                        <ul>
                            <li>Pro  Regular Seating</li>
                            <li>Best Comfortable Seat</li>
                            <li>Coffee Break With Snacks</li>
                            <li>One Workshop For Practise</li>
                            <li>Course Certificate</li>
                        </ul>
                    </div>
                    <div class="pricing-btn">
                        <a class="main-btn main-btn-2" href="#">Buy Ticket</a>
                    </div>
                </div> <!-- single pricing -->
            </div>
            <div class="col-lg-4 col-md-8 col-sm-9">
                <div class="single-pricing text-center mt-30 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0s">
                    <div class="pricing-name">
                        <h4 class="pricing-title">PREMIUM PASS</h4>
                        <span class="sub-title">Price Excluding 20% VAT</span>
                    </div>
                    <div class="pricing-price">
                        <span>$ 49.00</span>
                        <p class="text">Per Day</p>
                    </div>
                    <div class="pricing-list">
                        <ul>
                            <li>Pro  Regular Seating</li>
                            <li>Best Comfortable Seat</li>
                            <li>Coffee Break With Snacks</li>
                            <li>One Workshop For Practise</li>
                            <li>Course Certificate</li>
                        </ul>
                    </div>
                    <div class="pricing-btn">
                        <a class="main-btn" href="#">Buy Ticket</a>
                    </div>
                </div> <!-- single pricing -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<!--====== PRICING PART ENDS ======-->
@endsection