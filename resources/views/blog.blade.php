 @include('frontend.layouts.header')
 <!-- Page Header Start -->
<div class="container-fluid page-header mb-5 p-0 wow fadeIn" 
     data-wow-delay="0.1s" 
     style="background-image: url('{{ asset('assets/img/carousel-1.jpg') }}');">

        <div class="container-fluid page-header-inner py-5">
            <div class="container py-5">
                <h1 class="display-1 text-white animated slideInDown">Blogs</h1>
            </div>
        </div>
    </div>
<!-- Page Header End -->
<!-- Blog Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <!-- Blog List End -->
                <div class="col-lg-8">
                    <div class="row g-5">
                        <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="blog-item">
                                <div class="overflow-hidden">
                                    <img class="img-fluid w-100" src="{{ asset('assets/img/blog-lg-1.jpg') }}" alt="">
                                </div>

                                <div class="bg-light p-4">
                                    <div class="breadcrumb blog-meta">
                                        <div class="breadcrumb-item"><a href="#">01 Jan, 2045</a></div>
                                        <div class="breadcrumb-item"><a href="#">Admin</a></div>
                                    </div>
                                    <a href="#" class="d-block h3 mb-3">We have 25 years of experience in architecture industry</a>
                                    <p class="mb-4">Stet no et lorem dolor et diam, amet duo ut dolore vero eos. No stet est diam rebum amet diam ipsum. Clita clita labore, dolor duo nonumy clita sit at, sed sit sanctus dolor eos.</p>
                                    <a href="#" class="btn btn-outline-body px-3">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="blog-item">
                                <div class="overflow-hidden">
                                    <img class="img-fluid w-100" src="{{ asset('assets/img/blog-lg-2.jpg') }}" alt="">
                                </div>

                                <div class="bg-light p-4">
                                    <div class="breadcrumb blog-meta">
                                        <div class="breadcrumb-item"><a href="#">01 Jan, 2045</a></div>
                                        <div class="breadcrumb-item"><a href="#">Admin</a></div>
                                    </div>
                                    <a href="#" class="d-block h3 mb-3">We have 25 years of experience in architecture industry</a>
                                    <p class="mb-4">Stet no et lorem dolor et diam, amet duo ut dolore vero eos. No stet est diam rebum amet diam ipsum. Clita clita labore, dolor duo nonumy clita sit at, sed sit sanctus dolor eos.</p>
                                    <a href="#" class="btn btn-outline-body px-3">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="blog-item">
                                <div class="overflow-hidden">
                                    <img class="img-fluid w-100" src="{{ asset('assets/img/blog-lg-3.jpg') }}" alt="">
                                </div>

                                <div class="bg-light p-4">
                                    <div class="breadcrumb blog-meta">
                                        <div class="breadcrumb-item"><a href="#">01 Jan, 2045</a></div>
                                        <div class="breadcrumb-item"><a href="#">Admin</a></div>
                                    </div>
                                    <a href="#" class="d-block h3 mb-3">We have 25 years of experience in architecture industry</a>
                                    <p class="mb-4">Stet no et lorem dolor et diam, amet duo ut dolore vero eos. No stet est diam rebum amet diam ipsum. Clita clita labore, dolor duo nonumy clita sit at, sed sit sanctus dolor eos.</p>
                                    <a href="#" class="btn btn-outline-body px-3">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
                            <nav aria-label="Page navigation">
                                <ul class="pagination pagination-lg m-0">
                                    <li class="page-item disabled">
                                        <a class="page-link rounded-0" href="#" aria-label="Previous">
                                            <span aria-hidden="true"><i class="bi bi-arrow-left"></i></span>
                                        </a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link rounded-0" href="#" aria-label="Next">
                                            <span aria-hidden="true"><i class="bi bi-arrow-right"></i></span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- Blog List End -->
    
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
                            <div id="tab-3" class="tab-pane fade show p-0">
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