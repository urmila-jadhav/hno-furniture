@include('frontend.layouts.header')
<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 p-0 wow fadeIn" 
     data-wow-delay="0.1s" 
     style="background-image: url('{{ asset('assets/img/carousel-3.jpg') }}');">
        <div class="container-fluid page-header-inner py-5">
            <div class="container py-5">
                <h1 class="display-1 text-white animated slideInDown">Blog Detail</h1>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Blog Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <!-- Detail Start -->
                <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.1s">
                    <div id="detail-carousel" class="carousel slide mb-5" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                    <img class="w-100" src="{{ asset('assets/img/blog-lg-1.jpg') }}" alt="Image">
                            </div>
                            <div class="carousel-item">
                                <img class="w-100" src="{{ asset('assets/img/blog-lg-2.jpg') }}" alt="Image">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#detail-carousel"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#detail-carousel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <div class="breadcrumb blog-meta">
                        <div class="breadcrumb-item"><a href="#">01 Jan, 2045</a></div>
                        <div class="breadcrumb-item"><a href="#">Admin</a></div>
                    </div>
                    <a href="#" class="d-block h1 mb-3">We have 25 years of experience in architecture industry</a>
                    <p>Sadipscing labore amet rebum est et justo gubergren. Et eirmod ipsum sit diam ut
                        magna lorem. Nonumy vero labore lorem sanctus rebum et lorem magna kasd, stet
                        amet magna accusam consetetur eirmod. Kasd accusam sit ipsum sadipscing et at at
                        sanctus et. Ipsum sit gubergren dolores et, consetetur justo invidunt at et
                        aliquyam ut et vero clita.
                    </p>
                    <p class="mb-5">Volup est stet invidunt sed rebum nonumy stet, clita dolores
                        vero stet consetetur elitr takimata rebum sanctus. Sit sed accusam stet sit
                        nonumy kasd diam dolores, sanctus lorem kasd duo dolor dolor vero sit et. Labore
                        ipsum duo sanctus amet eos et. Consetetur no sed ipsum justo et,
                        clita lorem sit vero amet amet est dolor elitr, stet et no diam sit.
                    </p>
                    <div class="row g-4 mb-4">
                        <div class="col-sm-6">
                            <img class="img-fluid" src="{{ asset('assets/img/blog-md-1.jpg') }}" alt="">
                        </div>
                        <div class="col-sm-6">
                            <img class="img-fluid" src="{{ asset('assets/img/blog-md-2.jpg') }}" alt="">
                        </div>
                    </div>
                    <p class="mb-4">Sadipscing labore amet rebum est et justo gubergren. Et eirmod ipsum sit diam ut
                        magna lorem. Nonumy vero labore lorem sanctus rebum et lorem magna kasd, stet
                        amet magna accusam consetetur eirmod. Kasd accusam sit ipsum sadipscing et at at
                        sanctus et. Ipsum sit gubergren dolores et, consetetur justo invidunt at et
                        aliquyam ut et vero clita.
                    </p>
                    <figure class="border-start border-5 ps-4 mb-5">
                        <blockquote class="blockquote mb-4">
                            <p>Nonumy vero labore lorem sanctus rebum et lorem magna kasd, stet
                                amet magna accusam consetetur eirmod. Kasd accusam sit ipsum sanctus et. Ipsum sit gubergren dolores et justo ut et vero clita.
                            </p>
                        </blockquote>
                        <figcaption class="blockquote-footer fw-medium">John Doe</figcaption>
                    </figure>
                    <!-- Blog Detail End -->

                    <!-- Bio Start -->
                    <div class="bg-light d-flex flex-column flex-sm-row p-4 mb-5 wow fadeInUp" data-wow-delay="0.1s">
                            <img class="img-fluid flex-shrink-0 mb-4 mb-sm-0" src="{{ asset('assets/img/user-1.jpg') }}" style="width: 100px; height: 100px;" />
                        <div class="ps-sm-4">
                            <h3>Author Name</h3>
                            <p class="mb-0">
                                Lorem ipsum dolor sit amet elit. Integer lorem augue purus mollis, non eros leo in nunc. Donec a nulla vel turpis tempor ac vel justo hac.
                            </p>
                        </div>
                    </div>
                    <!-- Bio End -->

                    <!-- Related Post Start -->
                    <div class="mb-5 wow fadeInUp" data-wow-delay="0.1s">
                        <h3 class="section-title text-dark mb-4">Related Post</h3>
                        <div class="owl-carousel related-carousel position-relative">
                            <div class="d-flex bg-light p-4">
                                    <img class="img-fluid flex-shrink-0" src="{{ asset('assets/img/blog-sm-1.jpg') }}" style="width: 75px; height: 75px; object-fit: cover;" alt="">
                                <div class="ps-3">
                                    <a href="#" class="h5 mb-0">Lorem ipsum dolor sit amet consec adipis elit</a>
                                    <div class="breadcrumb blog-meta mb-0">
                                        <small class="breadcrumb-item"><a href="#">01 Jan, 2045</a></small>
                                        <small class="breadcrumb-item"><a href="#">Admin</a></small>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex bg-light p-4">
                                    <img class="img-fluid flex-shrink-0" src="{{ asset('assets/img/blog-sm-2.jpg') }}" style="width: 75px; height: 75px; object-fit: cover;" alt="">
                                <div class="ps-3">
                                    <a href="#" class="h5 mb-0">Lorem ipsum dolor sit amet consec adipis elit</a>
                                    <div class="breadcrumb blog-meta mb-0">
                                        <small class="breadcrumb-item"><a href="#">01 Jan, 2045</a></small>
                                        <small class="breadcrumb-item"><a href="#">Admin</a></small>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex bg-light p-4">
                                    <img class="img-fluid flex-shrink-0" src="{{ asset('assets/img/blog-sm-3.jpg') }}" style="width: 75px; height: 75px; object-fit: cover;" alt="">
                                <div class="ps-3">
                                    <a href="#" class="h5 mb-0">Lorem ipsum dolor sit amet consec adipis elit</a>
                                    <div class="breadcrumb blog-meta mb-0">
                                        <small class="breadcrumb-item"><a href="#">01 Jan, 2045</a></small>
                                        <small class="breadcrumb-item"><a href="#">Admin</a></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Related Post End -->

                    <!-- Comment List Start -->
                    <div class="mb-5 wow fadeInUp" data-wow-delay="0.1s">
                        <h3 class="section-title text-dark mb-4">3 Comments</h3>
                        <div class="d-flex mb-4">
                                <img src="{{ asset('assets/img/user-1.jpg') }}" class="img-fluid flex-shrink-0" style="width: 45px; height: 45px;">
                            <div class="ps-3">
                                <h5>John Doe <small class="text-body fw-normal fst-italic">01 Jan 2045</small></h5>
                                <p class="mb-2">Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor labore
                                    accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed eirmod</p>
                                <a href="#"><i class="fa fa-reply me-2"></i> Reply</a>
                            </div>
                        </div>
                        <div class="d-flex mb-4">
                                <img src="{{ asset('assets/img/user-2.jpg') }}" class="img-fluid flex-shrink-0" style="width: 45px; height: 45px;">
                            <div class="ps-3">
                                <h5>John Doe <small class="text-body fw-normal fst-italic">01 Jan 2045</small></h5>
                                <p class="mb-2">Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor labore
                                    accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed eirmod</p>
                                <a href="#"><i class="fa fa-reply me-2"></i> Reply</a>
                            </div>
                        </div>
                        <div class="d-flex ms-5 mb-4">
                                <img src="{{ asset('assets/img/user-3.jpg') }}" class="img-fluid flex-shrink-0" style="width: 45px; height: 45px;">
                            <div class="ps-3">
                                <h5>John Doe <small class="text-body fw-normal fst-italic">01 Jan 2045</small></h5>
                                <p class="mb-2">Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor labore
                                    accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed eirmod</p>
                                <a href="#"><i class="fa fa-reply me-2"></i> Reply</a>
                            </div>
                        </div>
                    </div>
                    <!-- Comment List End -->

                    <!-- Comment Form Start -->
                    <div class="bg-light p-4 p-md-5 wow fadeInUp" data-wow-delay="0.1s">
                        <h3 class="section-title text-dark mb-4">Leave A Comment</h3>
                        <form>
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control bg-white border-0" placeholder="Your Name" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="email" class="form-control bg-white border-0" placeholder="Your Email" style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <input type="text" class="form-control bg-white border-0" placeholder="Website" style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control bg-white border-0" rows="5" placeholder="Comment"></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Leave Your Comment</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Comment Form End -->
                </div>
                <!-- Detail End -->
    
                <!-- Sidebar Start -->
                <div class="col-lg-4">
                    <!-- Search Form Start -->
                    <div class="bg-light p-4 mb-5 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="input-group">
                            <input type="text" class="form-control p-3" placeholder="Keyword">
                            <button class="btn btn-dark px-4"><i class="bi bi-search"></i></button>
                        </div>
                    </div>
                    <!-- Search Form End -->

                    <!-- Category Start -->
                    <div class="bg-light p-4 mb-5 wow fadeInUp" data-wow-delay="0.1s">
                        <h3 class="section-title text-dark mb-4">Categories</h3>
                        <div class="category-list d-flex flex-column">
                            <a class="bg-white text-body" href="#">Architecture</a>
                            <a class="bg-white text-body" href="#">3D Animation</a>
                            <a class="bg-white text-body" href="#">House Planning</a>
                            <a class="bg-white text-body" href="#">Interior Design</a>
                            <a class="bg-white text-body" href="#">Renovation</a>
                            <a class="bg-white text-body" href="#">Construction</a>
                        </div>
                    </div>
                    <!-- Category End -->

                    <!-- More Post Start -->
                    <div class="blog-tab bg-light p-4 mb-5 wow fadeInUp" data-wow-delay="0.1s">
                        <h3 class="section-title text-dark mb-4">Blog Post</h3>
                        <ul class="nav nav-pills d-flex justify-content-between border-bottom mb-3">
                            <li class="nav-item">
                                <a class="d-flex align-items-center active" data-bs-toggle="pill" href="#tab-1">
                                    <h4>Featured</h4>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="d-flex align-items-center" data-bs-toggle="pill" href="#tab-2">
                                    <h4>Popular</h4>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="d-flex align-items-center" data-bs-toggle="pill" href="#tab-3">
                                    <h4>Latest</h4>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab-1" class="tab-pane fade show p-0 active">
                                <div class="row g-3">
                                    <div class="col-12 d-flex">
                                            <img class="img-fluid flex-shrink-0" src="{{ asset('assets/img/blog-sm-1.jpg') }}" alt="">
                                        <div class="ps-3">
                                            <a href="#" class="h5 mb-0">Lorem ipsum dolor sit amet consec adipis elit</a>
                                            <div class="breadcrumb blog-meta mb-0">
                                                <small class="breadcrumb-item"><a href="#">01 Jan, 2045</a></small>
                                                <small class="breadcrumb-item"><a href="#">Admin</a></small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex">
                                            <img class="img-fluid flex-shrink-0" src="{{ asset('assets/img/blog-sm-2.jpg') }}" alt="">
                                        <div class="ps-3">
                                            <a href="#" class="h5 mb-0">Lorem ipsum dolor sit amet consec adipis elit</a>
                                            <div class="breadcrumb blog-meta mb-0">
                                                <small class="breadcrumb-item"><a href="#">01 Jan, 2045</a></small>
                                                <small class="breadcrumb-item"><a href="#">Admin</a></small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex">
                                            <img class="img-fluid flex-shrink-0" src="{{ asset('assets/img/blog-sm-3.jpg') }}" alt="">
                                        <div class="ps-3">
                                            <a href="#" class="h5 mb-0">Lorem ipsum dolor sit amet consec adipis elit</a>
                                            <div class="breadcrumb blog-meta mb-0">
                                                <small class="breadcrumb-item"><a href="#">01 Jan, 2045</a></small>
                                                <small class="breadcrumb-item"><a href="#">Admin</a></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tab-2" class="tab-pane fade show p-0">
                                <div class="row g-3">
                                    <div class="col-12 d-flex">
                                            <img class="img-fluid flex-shrink-0" src="{{ asset('assets/img/blog-sm-1.jpg') }}" alt="">
                                        <div class="ps-3">
                                            <a href="#" class="h5 mb-0">Lorem ipsum dolor sit amet consec adipis elit</a>
                                            <div class="breadcrumb blog-meta mb-0">
                                                <small class="breadcrumb-item"><a href="#">01 Jan, 2045</a></small>
                                                <small class="breadcrumb-item"><a href="#">Admin</a></small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex">
                                            <img class="img-fluid flex-shrink-0" src="{{ asset('assets/img/blog-sm-2.jpg') }}" alt="">
                                        <div class="ps-3">
                                            <a href="#" class="h5 mb-0">Lorem ipsum dolor sit amet consec adipis elit</a>
                                            <div class="breadcrumb blog-meta mb-0">
                                                <small class="breadcrumb-item"><a href="#">01 Jan, 2045</a></small>
                                                <small class="breadcrumb-item"><a href="#">Admin</a></small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex">
                                        <img class="img-fluid flex-shrink-0" src="img/blog-sm-3.jpg" alt="">
                                        <div class="ps-3">
                                            <a href="#" class="h5 mb-0">Lorem ipsum dolor sit amet consec adipis elit</a>
                                            <div class="breadcrumb blog-meta mb-0">
                                                <small class="breadcrumb-item"><a href="#">01 Jan, 2045</a></small>
                                                <small class="breadcrumb-item"><a href="#">Admin</a></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tab-3" class="tab-pane fade show p-0">
                                <div class="row g-3">
                                    <div class="col-12 d-flex">
                                        <img class="img-fluid flex-shrink-0" src="img/blog-sm-1.jpg" alt="">
                                        <div class="ps-3">
                                            <a href="#" class="h5 mb-0">Lorem ipsum dolor sit amet consec adipis elit</a>
                                            <div class="breadcrumb blog-meta mb-0">
                                                <small class="breadcrumb-item"><a href="#">01 Jan, 2045</a></small>
                                                <small class="breadcrumb-item"><a href="#">Admin</a></small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex">
                                        <img class="img-fluid flex-shrink-0" src="img/blog-sm-2.jpg" alt="">
                                        <div class="ps-3">
                                            <a href="#" class="h5 mb-0">Lorem ipsum dolor sit amet consec adipis elit</a>
                                            <div class="breadcrumb blog-meta mb-0">
                                                <small class="breadcrumb-item"><a href="#">01 Jan, 2045</a></small>
                                                <small class="breadcrumb-item"><a href="#">Admin</a></small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex">
                                        <img class="img-fluid flex-shrink-0" src="img/blog-sm-3.jpg" alt="">
                                        <div class="ps-3">
                                            <a href="#" class="h5 mb-0">Lorem ipsum dolor sit amet consec adipis elit</a>
                                            <div class="breadcrumb blog-meta mb-0">
                                                <small class="breadcrumb-item"><a href="#">01 Jan, 2045</a></small>
                                                <small class="breadcrumb-item"><a href="#">Admin</a></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- More Post End -->

                    <!-- Image Start -->
                    <div class="bg-light p-4 mb-5 wow fadeInUp" data-wow-delay="0.1s">
                        <a href="#">
                        <img class="img-fluid" src="{{ asset('assets/img/blog-md-1.jpg') }}" alt="">
                        </a>
                    </div>
                    <!-- Image End -->

                    <!-- Tag Start -->
                    <div class="bg-light p-4 mb-5 wow fadeInUp" data-wow-delay="0.1s">
                        <h3 class="section-title text-dark mb-4">Tags Cloud</h3>
                        <div class="d-flex flex-wrap m-n1">
                            <a href="#" class="btn btn-tag m-1">Design</a>
                            <a href="#" class="btn btn-tag m-1">Development</a>
                            <a href="#" class="btn btn-tag m-1">Marketing</a>
                            <a href="#" class="btn btn-tag m-1">SEO</a>
                            <a href="#" class="btn btn-tag m-1">Writing</a>
                            <a href="#" class="btn btn-tag m-1">Consulting</a>
                            <a href="#" class="btn btn-tag m-1">Design</a>
                            <a href="#" class="btn btn-tag m-1">Development</a>
                            <a href="#" class="btn btn-tag m-1">Marketing</a>
                            <a href="#" class="btn btn-tag m-1">SEO</a>
                            <a href="#" class="btn btn-tag m-1">Writing</a>
                            <a href="#" class="btn btn-tag m-1">Consulting</a>
                        </div>
                    </div>
                    <!-- Tag End -->
                </div>
                <!-- Sidebar End -->
            </div>
        </div>
    </div>
    <!-- Blog End -->
        

   
@include('frontend.layouts.footer')