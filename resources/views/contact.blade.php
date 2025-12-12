@include('frontend.layouts.header')

    <!-- Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: rgba(0, 0, 0, .5);">
                <div class="modal-header border-0">
                    <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="input-group" style="max-width: 600px;">
                        <input type="text" class="form-control bg-transparent border-light p-3" placeholder="Type search keyword">
                        <button class="btn btn-light px-4"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search End -->


    <!-- Offcanvas Start -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <a href="home-1.html"  id="offcanvasRightLabel">
                <h1 class="text-primary m-0"><img class="me-3" src="img/icons/icon-1.png" alt="Icon">HNO</h1>
            </a>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <p class="mb-4">Stet no et lorem dolor et diam, amet duo ut dolore vero eos. No stet est diam rebum amet diam ipsum. Clita clita labore, dolor duo nonumy clita sit at, sed sit sanctus dolor eos.</p>
            <p class="mb-2"><i class="fa fa-map-marker-alt text-primary me-3"></i>123 Street, New York, USA</p>
            <p class="mb-2"><i class="fa fa-phone-alt text-primary me-3"></i>+012 345 67890</p>
            <p class="mb-2"><i class="fa fa-envelope text-primary me-3"></i><a href="https://demo.htmlcodex.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="b7ded9d1d8f7d2cfd6dac7dbd299d4d8da">[email&#160;protected]</a></p>
            <div class="d-flex pt-4">
                <a class="btn btn-lg-square btn-outline-body me-1" href="#"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-lg-square btn-outline-body me-1" href="#"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-lg-square btn-outline-body me-1" href="#"><i class="fab fa-youtube"></i></a>
                <a class="btn btn-lg-square btn-outline-body me-0" href="#"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <div class="row g-4 mt-3">
            <div class="col-4">
                <a href="#"><img class="img-fluid" src="{{ asset('assets/img/project-lg-1.jpg') }}" alt=""></a>
            </div>
            <div class="col-4">
                <a href="#"><img class="img-fluid" src="{{ asset('assets/img/project-lg-2.jpg') }}" alt=""></a>
            </div>
            <div class="col-4">
                <a href="#"><img class="img-fluid" src="{{ asset('assets/img/project-lg-3.jpg') }}" alt=""></a>
            </div>
        </div>

        </div>
    </div>
    <!-- Offcanvas End -->


    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0 wow fadeIn" 
        data-wow-delay="0.1s" 
        style="background-image: url('{{ asset('assets/img/carousel-1.jpg') }}');">
        <div class="container-fluid page-header-inner py-5">
            <div class="container py-5">
                <h1 class="display-1 text-white animated slideInDown">Contact</h1>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h4 class="section-title">Contact Us</h4>
                <h1 class="display-5 mb-4">If You Have Any Query, Please Feel Free To Contact Us</h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-light d-flex align-items-center w-100 p-4 mb-4">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-dark" style="width: 55px; height: 55px;">
                            <i class="fa fa-map-marker-alt text-primary"></i>
                        </div>
                        <div class="ms-4">
                            <p class="mb-2">Address</p>
                            <h3 class="mb-0">pune</h3>
                        </div>
                    </div>
                    <div class="bg-light d-flex align-items-center w-100 p-4 mb-4">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-dark" style="width: 55px; height: 55px;">
                            <i class="fa fa-phone-alt text-primary"></i>
                        </div>
                        <div class="ms-4">
                            <p class="mb-2">Call Us Now</p>
                            <h3 class="mb-0">
                                <a href="tel:+918989764587">+91-8989764587</a>
                            </h3>
                        </div>
                    </div>
                    <div class="bg-light d-flex align-items-center w-100 p-4 mb-0">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-dark" style="width: 55px; height: 55px;">
                            <i class="fa fa-envelope-open text-primary"></i>
                        </div>
                    <div class="ms-4">
                        <p class="mb-2">Mail Us Now</p>
                        <h3 class="mb-0">
                            <a href="mailto:hno@xyz.com" class="email">hno@xyz.com</a>
                        </h3>
                    </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="contact-form wow fadeInUp" data-wow-delay="0.2s">
                        <div id="alertMessage"></div>
                        <form id="contactForm" novalidate="novalidate">
                            <div class="row gx-3">
                                <div class="col-md-6 control-group">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name" placeholder="Your Name" required="required" data-validation-required-message="Please enter your name">
                                        <label for="name">Your Name</label>
                                    </div>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="col-md-6 control-group">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" placeholder="Your Email" required="required" data-validation-required-message="Please enter your email">
                                        <label for="email">Your Email</label>
                                    </div>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="col-12 control-group">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="subject" placeholder="Subject" required="required" data-validation-required-message="Please enter a subject">
                                        <label for="subject">Subject</label>
                                    </div>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="col-12 control-group">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Leave a message here" id="message" required="required" data-validation-required-message="Please enter your message" style="height: 165px"></textarea>
                                        <label for="message">Message</label>
                                    </div>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit" id="sendMessageButton">
                                        <span>Send Message</span>
                                        <div class="d-none spinner-border spinner-border-sm text-light ms-3" role="status"></div>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

    <!-- Google Map Start -->
    <div class="container-xxl pt-5 px-0 wow fadeIn" data-wow-delay="0.1s">
        <iframe class="w-100 mb-n2" style="height: 450px;"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3782.189325210702!2d73.8171485748819!3d18.52043078739417!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2bf2f06c92b7f%3A0x69bb948c1bdebd2a!2sPune%2C%20Maharashtra%2C%20India!5e0!3m2!1sen!2sin!4v1697191234567!5m2!1sen!2sin"
            frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
    <!-- Google Map End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    @include('frontend.layouts.footer')
