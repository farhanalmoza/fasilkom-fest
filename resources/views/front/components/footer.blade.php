<!--====== CLIENT PART START ======-->

<div id="client" class="client-area pt-115 pb-130">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title text-center pb-50">
                    <h2 class="title">Event Sponsors</h2>
                    <p class="text">Lorem ipsum dolor sit amet, in quodsi vulputate pro. Ius illum vocent mediocritatem reiciendis odit sed, vero amet blanditiis cule dicta iriure at phaedrum.</p>
                </div> <!-- section title -->
            </div>
        </div> <!-- row -->
        <div class="row client-active">
            <div class="col-lg-3">
                <div class="single-client">
                    <img src="{{ asset('front') }}/images/client-1.png" alt="Client">
                </div> <!-- single client -->
            </div>
            <div class="col-lg-3">
                <div class="single-client">
                    <img src="{{ asset('front') }}/images/client-2.png" alt="Client">
                </div> <!-- single client -->
            </div>
            <div class="col-lg-3">
                <div class="single-client">
                    <img src="{{ asset('front') }}/images/client-3.png" alt="Client">
                </div> <!-- single client -->
            </div>
            <div class="col-lg-3">
                <div class="single-client">
                    <img src="{{ asset('front') }}/images/client-4.png" alt="Client">
                </div> <!-- single client -->
            </div>
            <div class="col-lg-3">
                <div class="single-client">
                    <img src="{{ asset('front') }}/images/client-5.png" alt="Client">
                </div> <!-- single client -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</div>

<!--====== CLIENT PART ENDS ======-->

<!--====== CONTACT PART START ======-->

<section id="contact" class="contact-area pt-80 pb-130 gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="contact-info pt-40">
                    <div class="section-title pb-10">
                        <h2 class="title">Get In Touch</h2>
                    </div> <!-- section title -->
                    <ul>
                        <li>
                            <div class="single-info d-flex mt-25">
                                <div class="info-icon">
                                    <i class="lni-envelope"></i>
                                </div>
                                <div class="info-content media-body">
                                    <h6 class="info-title">Email address</h6>
                                    <p class="text">event@fasilkom-fest.com</p>
                                </div>
                            </div> <!-- single info -->
                        </li>
                        <li>
                            <div class="single-info d-flex mt-25">
                                <div class="info-icon">
                                    <i class="lni-phone-handset"></i>
                                </div>
                                <div class="info-content media-body">
                                    <h6 class="info-title">Phone Number</h6>
                                    <p class="text">+831 546 547</p>
                                </div>
                            </div> <!-- single info -->
                        </li>
                        <li>
                            <div class="single-info d-flex mt-25">
                                <div class="info-icon">
                                    <i class="lni-money-location"></i>
                                </div>
                                <div class="info-content media-body">
                                    <h6 class="info-title">Location</h6>
                                    <p class="text">Gedung Serba Guna Giri Loka, UPN Veteran Jawa Timur</p>
                                </div>
                            </div> <!-- single info -->
                        </li>
                    </ul>
                </div> <!-- contact info -->
            </div>
            <div class="col-lg-8">
                <div class="contact-form pt-20">
                    <form id="contact-form" action="{{ asset('front') }}/contact.php" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="single-form">
                                    <input type="text" name="name" placeholder="Your Name">
                                    <i class="lni-user"></i>
                                </div> <!-- single form -->
                            </div>
                            <div class="col-md-6">
                                <div class="single-form">
                                    <input type="email" name="email" placeholder="Your Email">
                                    <i class="lni-envelope"></i>
                                </div> <!-- single form -->
                            </div>
                            <div class="col-md-6">
                                <div class="single-form">
                                    <input type="text" name="subject" placeholder="Your Subject">
                                    <i class="lni-pencil-alt"></i>
                                </div> <!-- single form -->
                            </div>
                            <div class="col-md-6">
                                <div class="single-form">
                                    <input type="text" name="number" placeholder="Phone Number">
                                    <i class="lni-phone-handset"></i>
                                </div> <!-- single form -->
                            </div>
                            <div class="col-md-12">
                                <div class="single-form">
                                    <textarea name="message" placeholder="Your Message"></textarea>
                                    <i class="lni-comment-alt"></i>
                                </div> <!-- single form -->
                            </div>
                            <p class="form-message"></p>
                            <div class="col-md-12">
                                <div class="single-form">
                                    <button type="submit" class="main-btn main-btn-2">Send Message</button>
                                </div> <!-- single form -->
                            </div>
                        </div> <!-- row -->
                    </form>
                </div> <!-- contact form -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<!--====== CONTACT PART ENDS ======-->

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
                            <a class="contact-link" href="#">Contact Our Authority</a>
                        </div> <!-- footer address -->
                    </div>
                    <div class="col-lg-6">
                        <div class="footer-contact mt-40">
                            <h5 class="f-title">Social Connection</h5>
                            <p class="text">Jangan lewatkan apa pun! Ikuti akun media sosial kami untuk mendapatkan informasi yang cepat dan akurat di manapun Anda berada.</p>
                            <ul class="social">
                                <!-- <li><a href="#"><i class="lni-facebook-filled"></i></a></li> -->
                                <li><a href="#"><i class="lni-envelope"></i></a></li>
                                <li><a href="#"><i class="lni-linkedin-original"></i></a></li>
                                <li><a href="#"><i class="lni-instagram-original"></i></a></li>
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