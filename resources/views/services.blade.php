@include('frontend.layouts.header')

<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 p-0 wow fadeIn" 
    data-wow-delay="0.1s" 
    style="background-image: url('{{ asset('assets/img/carousel-3.jpg') }}'); 
           background-size: cover; 
           background-position: center;">
    <div class="container-fluid page-header-inner py-5">
        <div class="container py-5">
            <h1 class="display-1 text-white animated slideInDown">Services</h1>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h4 class="section-title">Our Services</h4>
            <h1 class="display-5 mb-4">Transforming Spaces With Elegant Furniture & Interior Solutions</h1>
        </div>

        <div class="row g-4">
            <!-- Furniture Design -->
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item d-flex position-relative text-center h-100">
                    <img class="bg-img" src="{{ asset('assets/img/service-1.jpg') }}" alt="Furniture Design">
                    <div class="service-text p-5">
                        <img class="mb-4" src="{{ asset('assets/img/icons/icon-5.png') }}" alt="Icon">
                        <h3 class="mb-3">Custom Furniture Design</h3>
                        <p class="mb-4">We create personalized furniture pieces that reflect your taste and fit perfectly into your space.</p>
                        <a class="btn" href="#"><i class="fa fa-plus text-primary me-3"></i>Read More</a>
                    </div>
                </div>
            </div>

            <!-- 3D Visualization -->
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item d-flex position-relative text-center h-100">
                    <img class="bg-img" src="{{ asset('assets/img/service-2.jpg') }}" alt="3D Visualization">
                    <div class="service-text p-5">
                        <img class="mb-4" src="{{ asset('assets/img/icons/icon-6.png') }}" alt="Icon">
                        <h3 class="mb-3">3D Visualization</h3>
                        <p class="mb-4">Visualize your interiors before they’re built with our realistic 3D renders and design walkthroughs.</p>
                        <a class="btn" href="#"><i class="fa fa-plus text-primary me-3"></i>Read More</a>
                    </div>
                </div>
            </div>

            <!-- Space Planning -->
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item d-flex position-relative text-center h-100">
                    <img class="bg-img" src="{{ asset('assets/img/service-3.jpg') }}" alt="Space Planning">
                    <div class="service-text p-5">
                        <img class="mb-4" src="{{ asset('assets/img/icons/icon-7.png') }}" alt="Icon">
                        <h3 class="mb-3">Space Planning</h3>
                        <p class="mb-4">Maximize functionality and comfort with smart space layouts tailored to your home or office.</p>
                        <a class="btn" href="#"><i class="fa fa-plus text-primary me-3"></i>Read More</a>
                    </div>
                </div>
            </div>

            <!-- Interior Styling -->
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item d-flex position-relative text-center h-100">
                    <img class="bg-img" src="{{ asset('assets/img/service-4.jpg') }}" alt="Interior Styling">
                    <div class="service-text p-5">
                        <img class="mb-4" src="{{ asset('assets/img/icons/icon-8.png') }}" alt="Icon">
                        <h3 class="mb-3">Interior Styling</h3>
                        <p class="mb-4">From wall colors to décor pieces, our experts bring life and personality to every corner of your room.</p>
                        <a class="btn" href="#"><i class="fa fa-plus text-primary me-3"></i>Read More</a>
                    </div>
                </div>
            </div>

            <!-- Furniture Restoration -->
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item d-flex position-relative text-center h-100">
                    <img class="bg-img" src="{{ asset('assets/img/service-5.jpg') }}" alt="Furniture Restoration">
                    <div class="service-text p-5">
                        <img class="mb-4" src="{{ asset('assets/img/icons/icon-9.png') }}" alt="Icon">
                        <h3 class="mb-3">Furniture Restoration</h3>
                        <p class="mb-4">We carefully restore and refinish your classic furniture, preserving its charm while enhancing durability.</p>
                        <a class="btn" href="#"><i class="fa fa-plus text-primary me-3"></i>Read More</a>
                    </div>
                </div>
            </div>

            <!-- Modular Solutions -->
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item d-flex position-relative text-center h-100">
                    <img class="bg-img" src="{{ asset('assets/img/service-6.jpg') }}" alt="Modular Furniture">
                    <div class="service-text p-5">
                        <img class="mb-4" src="{{ asset('assets/img/icons/icon-10.png') }}" alt="Icon">
                        <h3 class="mb-3">Modular Furniture</h3>
                        <p class="mb-4">Explore our modular kitchens, wardrobes, and furniture systems that combine beauty with practicality.</p>
                        <a class="btn" href="#"><i class="fa fa-plus text-primary me-3"></i>Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service End -->
 
@include('frontend.layouts.footer')
