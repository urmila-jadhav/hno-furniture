@include('frontend.layouts.header')

<div class="container-fluid p-0">
    <div class="row g-0 align-items-stretch">
        <div class="col-12">

            <div class="owl-carousel banner-carousel position-relative overflow-hidden">

                @foreach($banners as $banner)
                    <div class="position-relative banner-slide">

                        <!-- Banner Image -->
                        <img src="{{ $banner->image 
                            ? asset('storage/'.$banner->image) 
                            : asset('assets/img/default.jpg') }}"
                             class="w-100 object-fit-cover banner-img rounded-4"
                             alt="{{ $banner->title ?? 'Banner Image' }}"
                             style="height:450px;">

                        <!-- Overlay -->
                        <div class="overlay"></div>

                        <!-- Banner Content -->
                        <div class="banner-content position-absolute top-50 start-0 translate-middle-y ps-5 text-white"
                             style="z-index:2; max-width:700px;">

                            @if($banner->title)
                                <h4 class="fw-semibold text-warning sub-title mb-2">
                                    {{ $banner->title }}
                                </h4>
                            @endif

                            @if($banner->subtitle)
                                <h1 class="fw-bold text-warning display-4 mb-3 main-title">
                                    {{ $banner->subtitle }}
                                </h1>
                            @endif

                            @if($banner->description)
                                <p class="fs-5 mb-4 fade-text">
                                    {{ $banner->description }}
                                </p>
                            @endif

                            @if($banner->button_text)
                                <a href="{{ $banner->button_link ?? '#' }}"
                                   class="btn btn-warning text-dark fw-semibold px-5 py-3 rounded-pill shadow-sm banner-btn">
                                   {{ $banner->button_text }}
                                </a>
                            @endif

                        </div>

                    </div>
                @endforeach

            </div>

        </div>
    </div>
</div>

<!-- ==========================
     CSS
========================== -->
<style>
.object-fit-cover { object-fit: cover; }

/* --- Banner --- */
.banner-img {
    height: 650px;
    transition: transform 3s ease-in-out;
}
.owl-item.active .banner-img {
    transform: scale(1.05);
}

/* Blink animation for each slide */
.fade-in-banner {
    animation: fadeBlink 1s ease-in-out;
}
@keyframes fadeBlink {
    0% { opacity: 0; transform: scale(1.05); }
    50% { opacity: 1; transform: scale(1); }
    100% { opacity: 1; }
}

/* --- Text Animations --- */
.banner-content .sub-title,
.banner-content .main-title,
.banner-content .fade-text,
.banner-content .banner-btn {
    opacity: 0;
    transform: translateY(25px);
    transition: all 0.8s ease;
}
.owl-item.active .banner-content .sub-title {
    opacity: 1; transform: translateY(0); transition-delay: 0.2s;
}
.owl-item.active .banner-content .main-title {
    opacity: 1; transform: translateY(0); transition-delay: 0.4s;
}
.owl-item.active .banner-content .fade-text {
    opacity: 1; transform: translateY(0); transition-delay: 0.6s;
}
.owl-item.active .banner-content .banner-btn {
    opacity: 1; transform: translateY(0); transition-delay: 0.8s;
}

/* Dark overlay */
.overlay {
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 100%;
   
}

/* --- Button Hover --- */
.banner-btn:hover {
    background-color: #fff !important;
    color: #B78D65 !important;
    transform: scale(1.05);
    transition: 0.3s ease;
}

/* --- Dots --- */
.banner-carousel .owl-dots {
    position: absolute;
    bottom: 25px;
    left: 50%;
    transform: translateX(-50%);
}
.banner-carousel .owl-dot span {
    background: #fff !important;
    opacity: 0.4;
}
.banner-carousel .owl-dot.active span {
    background: #B78D65 !important;
    opacity: 1;
}

/* --- Navigation Arrows --- */
.banner-carousel .owl-nav {
    position: absolute;
    top: 50%;
    width: 100%;
    transform: translateY(-50%);
    display: flex;
    justify-content: space-between;
    padding: 0 25px;
    z-index: 3;
}
.banner-carousel .owl-prev,
.banner-carousel .owl-next {
    background: rgba(56, 49, 49, 0.85) !important;
    border-radius: 50%;
    width: 50px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #B78D65 !important;
    font-size: 24px !important;
    transition: 0.3s;
}
.banner-carousel .owl-prev:hover,
.banner-carousel .owl-next:hover {
    background: #B78D65 !important;
    color: #fff !important;
}

/* --- Responsive --- */
@media (max-width: 991px) {
    .banner-img { height: 450px; }
    .main-title { font-size: 1.9rem; }
    .banner-btn { padding: 10px 30px; }
}
@media (max-width: 576px) {
    .banner-img { height: 330px; }
    .banner-content { padding-left: 1.5rem !important; }
    .main-title { font-size: 1.6rem; }
}
</style>

<!-- ==========================
     JS (Owl Carousel)
========================== -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script>
$(document).ready(function () {
    const $carousel = $('.banner-carousel');

    $carousel.owlCarousel({
        items: 1,
        loop: true,
        autoplay: true,
        autoplayTimeout: 4000,
        autoplayHoverPause: true,
        dots: true,
        nav: true,
        navText: [
            '<i class="bi bi-chevron-left"></i>', 
            '<i class="bi bi-chevron-right"></i>'
        ],
        smartSpeed: 1000,
    });

    // Add blink effect on every slide change
    $carousel.on('changed.owl.carousel', function() {
        $('.owl-item.active .banner-slide').addClass('fade-in-banner');
        setTimeout(() => {
            $('.banner-slide').removeClass('fade-in-banner');
        }, 1200);
    });
});
</script>
<!-- Interior Section Start -->
<section class="py-5" style="background-color: #f5f5f5; ">
    <div class="container">
        <div class="row align-items-center">

            <!-- LEFT SIDE -->
            <div class="col-lg-6 col-md-12 mb-4 mb-lg-0">
                <h1 style="font-size: 52px; font-weight: 700; color: #c19a6b; line-height: 1.1;">
                    END TO END<br>INTERIORS
                </h1>
            </div>

            <!-- RIGHT SIDE -->
            <div class="col-lg-6 col-md-12">
                <p style="font-size: 18px; color: #4a4a4a; line-height: 1.6;">
                    Experience the ease and efficiency of end-to-end interiors, where our 
                    expert team handles everything from concept to completion, ensuring a 
                    cohesive and stunning final result.
                </p>

                <a href="about" 
                    class="btn px-4 py-2"
                    style="background-color: #c19a6b; color: #fff; font-size: 18px; border-radius: 8px;">
                        Explore
                    </a>

            </div>

        </div>

    </div>
</section>
<!-- Interior Section End -->

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<!-- Shop By Categories Start -->




<div class="row g-4 justify-content-center wow fadeInUp" 
     data-wow-delay="0.3s" 
     style="padding: 73px;">

    @foreach($categories as $index => $category)
        <div class="col-md-4 col-lg-3 category-item {{ $index >= 4 ? 'd-none extra-category' : '' }}">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">

      <a href="{{ url('category/'.$category->pid) }}">
    <img src="{{ asset($category->category_image) }}"
         class="img-fluid"
         alt="{{ $category->category_name }}"
         style="height:200px; object-fit:cover;">
</a>



                <div class="card-body text-center py-3">
                    <h6 class="fw-semibold text-uppercase mb-0">
                        {{ $category->category_name }}
                    </h6>
                </div>

            </div>
        </div>
    @endforeach

</div>


<!-- View All / View Less Button -->
<div class="text-center mt-3">
    <a href="#" id="toggleViewBtn" class="btn btn-primary px-4 py-2 rounded-pill">
        View All
    </a>
</div>

<script>
document.getElementById('toggleViewBtn').addEventListener('click', function(e) {
    e.preventDefault();
    const extraItems = document.querySelectorAll('.extra-category');
    const btn = document.getElementById('toggleViewBtn');

    if (btn.innerText === 'View All') {
        extraItems.forEach(item => item.classList.remove('d-none'));
        btn.innerText = 'View Less';
    } else {
        extraItems.forEach(item => item.classList.add('d-none'));
        btn.innerText = 'View All';
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }
});
</script>




<!-- ✅ CSS -->
<style>
  


/* Active category button */
.category-btn.active {
    background-color: #c19a6b;
    color: #fff;
    border-color: #c19a6b;
}

/* Category card container */
.category-item .card {
    height: auto;               /* Let content dictate height */
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

/* Hover effect on card */
.category-item .card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
}

/* Category image */
.category-item img {
    width: 100%;
    height: 180px;               /* Reduced height for compact design */
    object-fit: cover;
    display: block;
    border-bottom: 1px solid #eee;
    transition: transform 0.4s ease;
    margin-bottom: 10px;         /* Space between image and text */
}

/* Hover effect on image */
.category-item:hover img {
    transform: scale(1.05);
}

/* Category name text */
.card-body h6 {
    color: #c19a6b;
    font-weight: 600;
    font-size: 0.9rem;
    margin: 0;                    /* Remove default margin */
    padding-bottom: 8px;          /* Space below text */
}

.btn-primary {
  background-color: #c19a6b;
  border: none;
}
.btn-primary:hover {
  background-color: #a97d4f;
}

@media (max-width: 768px) {
  .category-btn {
    font-size: 0.85rem;
    padding: 0.4rem 0.8rem;
  }
}
</style>

<!-- CTA Banner Section -->
<section class="cta-banner my-5">
  <div class="container-fluid py-5 px-5 cta-container rounded-4 text-white position-relative">
    <!-- Background Image -->
    <div class="cta-bg"></div>
    <div class="row align-items-center position-relative">
      <div class="col-md-8">
        <h3 class="fw-bold mb-2">Visit Our Store & Get Extra</h3>
        <h1 class="display-5 fw-bold mb-2">UPTO ₹25,000* <span class="fs-5 fw-normal">Instant Discount</span></h1>
        <p class="mt-2 mb-0">+ Free Delivery & No Cost EMI Available <span class="text-warning fw-semibold">*</span></p>
      </div>
      <div class="col-md-4 text-md-end text-center mt-4 mt-md-0">
        <a href="#" class="btn btn-warning btn-lg fw-semibold rounded-pill px-4 py-2 shadow-lg d-inline-flex align-items-center gap-2">
          <i class="fa fa-store fs-5"></i> Visit Store
        </a>
      </div>
    </div>
  </div>
</section>
<style>

/* --- CTA Section Styling --- */
.cta-container {
  position: relative;
  overflow: hidden;
  border-radius: 1.5rem;
  z-index: 1;
  color: #fff;
}

/* Background Image + Gradient Overlay */
.cta-bg {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: 
    linear-gradient(90deg, rgba(98, 53, 12, 0.85) 0%, rgba(41, 39, 37, 0.75) 100%),
    url('{{ asset("assets/img/carousel-3.jpg") }}') center/cover no-repeat;
  z-index: 0;
  transition: transform 6s ease-in-out;
}

.cta-container:hover .cta-bg {
  transform: scale(1.05);
}

/* Typography */
.cta-container h3 {
  color: #d5b247ff;
  letter-spacing: 0.5px;
}
.cta-container h1 {
  color: #fff;
  text-shadow: 0 2px 6px rgba(0,0,0,0.3);
}

/* Button Styling */
.btn-warning {
  background-color: #ffdb70;
  border: none;
  color: #3a2d1e;
  transition: all 0.3s ease-in-out;
}
.btn-warning:hover {
  background-color: #f1c40f;
  transform: scale(1.08);
  box-shadow: 0 8px 25px rgba(255, 219, 112, 0.4);
}

/* Responsive Adjustments */
@media (max-width: 768px) {
  .cta-container {
    text-align: center;
    padding: 2.5rem 1.5rem;
  }
  .cta-container h1 {
    font-size: 1.8rem;
  }
  .cta-bg {
    background-position: center;
  }
}
</style>

    <!-- Facts Start ->
    <div class="container-xxl py-5">
        <div class="container pt-5">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="fact-item text-center bg-light h-100 p-5 pt-0">
                        <div class="fact-icon">
                            <img src="{{ asset('assets/img/icons/icon-2.png') }}" alt="Icon">
                        </div>
                        <h3 class="mb-3">Design Approach</h3>
                        <p class="mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="fact-item text-center bg-light h-100 p-5 pt-0">
                        <div class="fact-icon">
                            <img src="{{ asset('assets/img/icons/icon-3.png') }}" alt="Icon">
                        </div>
                        <h3 class="mb-3">Innovative Solutions</h3>
                        <p class="mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="fact-item text-center bg-light h-100 p-5 pt-0">
                        <div class="fact-icon">
                            <img src="{{ asset('assets/img/icons/icon-4.png') }}" alt="Icon">
                        </div>
                        <h3 class="mb-3">Project Management</h3>
                        <p class="mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!- Facts End -->

    <!-- About Start -->
   <!-- <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="about-img">
                        <img class="img-fluid" src="{{ asset('assets/img/about-1.jpg') }}" alt="About Image 1">
                        <img class="img-fluid" src="{{ asset('assets/img/about-2.jpg') }}" alt="About Image 2">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h4 class="section-title">About Us</h4>
                    <h1 class="display-5 mb-4">A Creative Architecture Agency For Your Dream Home</h1>
                    <p>Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                    <p class="mb-4">Stet no et lorem dolor et diam, amet duo ut dolore vero eos. No stet est diam rebum amet diam ipsum. Clita clita labore, dolor duo nonumy clita sit at, sed sit sanctus dolor eos.</p>
                    <div class="d-flex align-items-center mb-5">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center border border-5 border-primary" style="width: 120px; height: 120px;">
                            <h1 class="display-1 mb-n2" data-toggle="counter-up">25</h1>
                        </div>
                        <div class="ps-4">
                            <h3>Years</h3>
                            <h3>Working</h3>
                            <h3 class="mb-0">Experience</h3>
                        </div>
                    </div>
                    <a class="btn btn-primary py-3 px-5" href="#">Read More</a>
                </div>
            </div>
        </div>
    </div>-->
    <!-- About End -->


    <!-- Services Start -->

    <section class="py-5" style="background-color: #f8f5f2;">
    <div class="container">
        <div class="text-center mx-auto mb-5" style="max-width: 650px;">
            <h4 class="text-uppercase fw-bold text-primary mb-3">Our Products</h4>
            <h1 class="display-5 mb-4">Crafting Modern Furniture & Beautiful Interiors</h1>
            <p class="text-muted">We combine craftsmanship, creativity, and comfort to transform your spaces into timeless designs.</p>
        </div>

        <div class="row g-4">
            @forelse($products as $product)
                <div class="col-lg-4 col-md-6 d-flex">
                    <div class="furni-service-card flex-fill">
                        <!-- Product Image -->
                        @php
    $images = json_decode($product->multiple_img); // decode JSON
    $firstImage = isset($images[0]) ? $images[0] : 'assets/img/default-product.jpg';
@endphp

<img src="{{ asset($firstImage) }}" 
     alt="{{ $product->product_name }}" 
     class="service-img">
                        <div class="service-content text-center mt-2">
                            <h4>{{ $product->product_name }}</h4>
                            <p class="text-muted">
                                @if(isset($product->from_price) && isset($product->to_price))
                                    ₹{{ $product->from_price }} - ₹{{ $product->to_price }}
                                @endif
                            </p>
                            <!-- Link using ID instead of slug -->
                           <a href="{{ route('product.details', $product->id) }}" class="read-more">
    View Details <i class="fa fa-arrow-right ms-2"></i>
</a>

                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-muted">No products found.</p>
                </div>
            @endforelse
        </div>
    </div>

    <div class="text-center mt-4">
        <a href="/all-services" class="btn btn-primary px-4 py-2 rounded-pill">
            View All
        </a>
    </div>
</section>

<!-- Services End -->

<!-- Custom CSS -->
<style>
.text-primary {
    color: #c19a6b !important;
}

.furni-service-card {
    background-color: #fff;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    transition: all 0.4s ease;
    text-align: center;
    display: flex;
    flex-direction: column;
    height: 100%;
}

.furni-service-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
}

.service-img {
    width: 100%;
    height: 250px;
    object-fit: cover;
    border-bottom: 4px solid #c19a6b;
}

.service-content {
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    padding: 25px;
}

.service-content h4 {
    color: #1f1f1f;
    font-weight: 600;
    margin-bottom: 10px;
    font-size: 18px;
}

.service-content .offer {
    color: #b08458;
    font-weight: 500;
    margin-bottom: 10px;
}

.service-content p {
    color: #666;
    font-size: 15px;
    line-height: 1.6;
    flex-grow: 1;
}

.read-more {
    text-decoration: none;
    color: #c19a6b;
    font-weight: 500;
    transition: 0.3s;
}

.read-more:hover {
    color: #b08458;
}

@media (max-width: 768px) {
    .furni-service-card {
        margin-bottom: 25px;
    }

    .service-img {
        height: 200px;
    }
}
</style>
<!-- Best Sellers Section (with Slider) -->
<section class="py-5 bg-light position-relative">
    <div class="container">
        <h2 class="text-center mb-5 fw-bold text-uppercase" style="letter-spacing: 1px; color:#c19a6b;">
            Best Sellers
        </h2>

        <div class="owl-carousel best-seller-carousel">
            <!-- Product 1 -->
            <div class="card border-0 shadow-sm position-relative rounded-4 overflow-hidden mx-2">
                <span class="badge bg-danger position-absolute top-0 start-0 m-2">56% off</span>
                <img src="{{ asset('assets/img/blog-lg-1.jpg') }}" class="card-img-top" alt="Product 1">
                <div class="card-body text-center">
                    <span class="badge bg-dark mb-2">Best Seller</span>
                    <h6 class="fw-semibold mb-2">HNO Chocolate Study Desk</h6>
                    <div class="text-warning mb-2">★★★★★</div>
                    
                    
                </div>
            </div>

            <!-- Product 2 -->
            <div class="card border-0 shadow-sm position-relative rounded-4 overflow-hidden mx-2">
                <span class="badge bg-danger position-absolute top-0 start-0 m-2">50% off</span>
                <img src="{{ asset('assets/img/blog-lg-2.jpg') }}" class="card-img-top" alt="Product 2">
                <div class="card-body text-center">
                    <span class="badge bg-dark mb-2">Best Seller</span>
                    <h6 class="fw-semibold mb-2">HNO Logan Computer Table</h6>
                    <div class="text-warning mb-2">★★★★★</div>
                    
                </div>
            </div>

            <!-- Product 3 -->
            <div class="card border-0 shadow-sm position-relative rounded-4 overflow-hidden mx-2">
                <span class="badge bg-danger position-absolute top-0 start-0 m-2">45% off</span>
                <img src="{{ asset('assets/img/blog-lg-3.jpg') }}" class="card-img-top" alt="Product 3">
                <div class="card-body text-center">
                    <span class="badge bg-dark mb-2">Best Seller</span>
                    <h6 class="fw-semibold mb-2">HNO Oakwood TV Unit</h6>
                    <div class="text-warning mb-2">★★★★★</div>
                   
                </div>
            </div>
             <!-- Product 4 -->

            <div class="card border-0 shadow-sm position-relative rounded-4 overflow-hidden mx-2">
                <span class="badge bg-danger position-absolute top-0 start-0 m-2">40% off</span>
                <img src="{{ asset('assets/img/blog-lg-3.jpg') }}" class="card-img-top" alt="Product 3">
                <div class="card-body text-center">
                    <span class="badge bg-dark mb-2">Best Seller</span>
                    <h6 class="fw-semibold mb-2">HNO  Wood Coffee Table</h6>
                    <div class="text-warning mb-2">★★★★★</div>
                    
   
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Include Owl Carousel CSS & JS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<!-- Initialize Carousel -->
<script>
$(document).ready(function(){
    $(".best-seller-carousel").owlCarousel({
        loop: true,
        margin: 20,
        autoplay: true,
        autoplayTimeout: 1500,
        autoplayHoverPause: true,
        dots: false,
        nav: true,
        navText: [
            "<i class='bi bi-chevron-left fs-3'></i>",
            "<i class='bi bi-chevron-right fs-3'></i>"
        ],
        responsive: {
            0: { items: 1 },
            576: { items: 2 },
            768: { items: 3 },
            992: { items: 4 }
        }
    });
});
</script>

<!-- New Arrivals Section -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5 fw-bold text-uppercase" style="letter-spacing: 1px; color: #c19a6b;">
            New Arrivals
        </h2>

        <div class="row g-4 justify-content-center">
            <!-- Product 1 -->
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product-card card border-0 shadow-sm rounded-4 overflow-hidden position-relative">
                    <span class="badge bg-danger position-absolute top-0 start-0 m-2">54% Off</span>
                    <img src="{{ asset('assets/img/blog-lg-1.jpg') }}" class="card-img-top" alt="New Arrival 1">
                    <div class="card-body text-center">
                        <span class="badge bg-dark text-white mb-2">New Arrival</span>
                        <h6 class="fw-semibold mb-2">HNO Cotton Printed Mat</h6>
                        
                      
                    </div>
                </div>
            </div>

            <!-- Product 2 -->
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product-card card border-0 shadow-sm rounded-4 overflow-hidden position-relative">
                    <span class="badge bg-success position-absolute top-0 start-0 m-2">New</span>
                    <img src="{{ asset('assets/img/blog-lg-1.jpg') }}" class="card-img-top" alt="New Arrival 2">
                    <div class="card-body text-center">
                        <span class="badge bg-dark text-white mb-2">New Arrival</span>
                        <h6 class="fw-semibold mb-2">Handcrafted Wooden Lamp</h6>
                        
                       
                    </div>
                </div>
            </div>

            <!-- Product 3 -->
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product-card card border-0 shadow-sm rounded-4 overflow-hidden position-relative">
                    <span class="badge bg-warning text-dark position-absolute top-0 start-0 m-2">Limited</span>
                    <img src="{{ asset('assets/img/blog-lg-1.jpg') }}" class="card-img-top" alt="New Arrival 3">
                    <div class="card-body text-center">
                        <span class="badge bg-dark text-white mb-2">New Arrival</span>
                        <h6 class="fw-semibold mb-2">Classic Ceramic Vase</h6>
                        
                        
                    </div>
                </div>
            </div>

            <!-- Product 4 -->
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product-card card border-0 shadow-sm rounded-4 overflow-hidden position-relative">
                    <span class="badge bg-danger position-absolute top-0 start-0 m-2">35% Off</span>
                    <img src="{{ asset('assets/img/blog-lg-1.jpg') }}" class="card-img-top" alt="New Arrival 4">
                    <div class="card-body text-center">
                        <span class="badge bg-dark text-white mb-2">New Arrival</span>
                        <h6 class="fw-semibold mb-2">Modern Wall Clock</h6>
                        
                        
                    </div>
                </div>
            </div>

            <!-- Product 5 -->
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product-card card border-0 shadow-sm rounded-4 overflow-hidden position-relative">
                    <span class="badge bg-info text-dark position-absolute top-0 start-0 m-2">Trending</span>
                    <img src="{{ asset('assets/img/blog-lg-1.jpg') }}" class="card-img-top" alt="New Arrival 5">
                    <div class="card-body text-center">
                        <span class="badge bg-dark text-white mb-2">New Arrival</span>
                        <h6 class="fw-semibold mb-2">Elegant Candle Holder</h6>
                       
                        
                    </div>
                </div>
            </div>

            <!-- Product 6 -->
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product-card card border-0 shadow-sm rounded-4 overflow-hidden position-relative">
                    <span class="badge bg-primary position-absolute top-0 start-0 m-2">Hot</span>
                    <img src="{{ asset('assets/img/blog-lg-1.jpg') }}" class="card-img-top" alt="New Arrival 6">
                    <div class="card-body text-center">
                        <span class="badge bg-dark text-white mb-2">New Arrival</span>
                        <h6 class="fw-semibold mb-2">Luxury Crystal Frame</h6>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Royal Decor Section with Slider -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5 fw-bold text-uppercase" style="letter-spacing: 1px; color: #c19a6b;">
            Royal Decor
        </h2>

        <div class="owl-carousel royal-decor-carousel">
            <!-- Decor Item 1 -->
            <div class="decor-card card border-0 rounded-4 text-center p-3 mx-2">
                <div class="decor-img-container">
                    <img src="{{ asset('assets/img/blog-lg-1.jpg') }}" class="img-fluid rounded" alt="Idols">
                </div>
                <h6 class="fw-semibold mt-3 mb-0 text-dark">Idols</h6>
            </div>

            <!-- Decor Item 2 -->
            <div class="decor-card card border-0 rounded-4 text-center p-3 mx-2">
                <div class="decor-img-container">
                    <img src="{{ asset('assets/img/blog-lg-2.jpg') }}" class="img-fluid rounded" alt="Figurines">
                </div>
                <h6 class="fw-semibold mt-3 mb-0 text-dark">Figurines</h6>
            </div>

            <!-- Decor Item 3 -->
            <div class="decor-card card border-0 rounded-4 text-center p-3 mx-2">
                <div class="decor-img-container">
                    <img src="{{ asset('assets/img/blog-lg-3.jpg') }}" class="img-fluid rounded" alt="Vases">
                </div>
                <h6 class="fw-semibold mt-3 mb-0 text-dark">Vases</h6>
            </div>

            <!-- Decor Item 4 -->
            <div class="decor-card card border-0 rounded-4 text-center p-3 mx-2">
                <div class="decor-img-container">
                    <img src="{{ asset('assets/img/blog-lg-1.jpg') }}" class="img-fluid rounded" alt="Crystal Wall Art">
                </div>
                <h6 class="fw-semibold mt-3 mb-0 text-dark">Crystal Wall Art</h6>
            </div>

            <!-- Decor Item 5 -->
            <div class="decor-card card border-0 rounded-4 text-center p-3 mx-2">
                <div class="decor-img-container">
                    <img src="{{ asset('assets/img/blog-lg-1.jpg') }}" class="img-fluid rounded" alt="Luxury Mirrors">
                </div>
                <h6 class="fw-semibold mt-3 mb-0 text-dark">Luxury Mirrors</h6>
            </div>
        </div>
    </div>
</section>

<!-- Include Owl Carousel CSS & JS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<!-- Initialize Carousel -->
<script>
$(document).ready(function(){
    $(".royal-decor-carousel").owlCarousel({
        loop: true,
        margin: 20,
        autoplay: true,
        autoplayTimeout: 1500,
        autoplayHoverPause: true,
        dots: false,
       
        responsive: {
            0: { items: 1 },
            576: { items: 2 },
            768: { items: 3 },
            992: { items: 4 }
        }
    });
});
</script>

<style>
    .hover-effect {
    transition: all 0.3s ease;
}
.hover-effect:hover {
    transform: translateY(-8px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1);
}
.bg-purple {
    background-color: #6f42c1;
}

.decor-card {
    background: #fff;
    transition: all 0.3s ease-in-out;
    border-radius: 15px;
    overflow: hidden;
    cursor: pointer;
}

.decor-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
}

.decor-img-container {
    overflow: hidden;
    border-radius: 12px;
}

.decor-img-container img {
    transition: transform 0.4s ease;
}

.decor-card:hover img {
    transform: scale(1.08);
}

.decor-card h6 {
    transition: color 0.3s ease;
}

.decor-card:hover h6 {
    color: #b88e2f; /* Elegant gold accent */
}

.product-card {
    transition: all 0.3s ease-in-out;
    background-color: #fff;
}

.product-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
}

.product-card img {
    transition: transform 0.4s ease;
}

.product-card:hover img {
    transform: scale(1.05);
}

.product-card .badge {
    font-size: 0.75rem;
    border-radius: 0.5rem;
}

.btn-outline-dark:hover {
    background-color: #b88e2f;
    border-color: #b88e2f;
    color: #fff;
}


</style>
<!-- Why Choose Us - HNO Furniture -->
<div class="container-xxl py-5 position-relative" style="background-color: #f8f5f2;">
    <div class="container">
        <div class="row g-5 align-items-center flex-lg-row flex-column-reverse">

            <!-- Right Images -->
            <div class="col-lg-6 text-center wow fadeInRight" data-wow-delay="0.4s">
                <div class="position-relative d-inline-block">
                    <!-- Main Image -->
                    <img src="{{ asset('assets/img/blog-lg-1.jpg') }}"
                         class="img-fluid rounded-4 shadow-lg main-img"
                         alt="Luxury Furniture">
                    <!-- last  Image -->
                    <img src="{{ asset('assets/img/blog-lg-1.jpg') }}"
                         class="img-fluid rounded-4 shadow-lg main-img"
                         alt="Luxury Furniture">

                    <!-- Secondary Image
                    <img src="{{ asset('assets/img/blog-lg-1.jpg') }}"
                         class="img-fluid rounded-4 shadow-lg small-img position-absolute"
                         alt="Elegant Interiors"> -->

                    <!-- Floating Icon -->
                    <div class="check-badge position-absolute d-flex align-items-center justify-content-center">
                        <i class="fa fa-check fs-2 text-white"></i>
                    </div>
                </div>
            </div>

            <!-- Left Content -->
            <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.2s">
                <h4 class="section-title text-uppercase fw-bold mb-3" style="color: #b68d40;">Why Choose HNO</h4>
                <h1 class="display-5 fw-bold mb-4" style="color: #3a2d1e;">Crafting Comfort & Elegance for Every Home</h1>
                <p class="mb-5 text-muted" style="font-size: 16px;">
                    At <strong>HNO Furniture</strong>, we believe that furniture should not just fill a space — it should define it.
                    Our mission is to create timeless pieces that combine luxury, comfort, and sustainability.
                    Every piece we craft tells a story of art, quality, and passion.
                </p>

                <!-- Features -->
                <div class="row g-4">
                    <div class="col-12">
                        <div class="feature-card d-flex align-items-start p-4 rounded-4 shadow-sm bg-white h-100">
                            <div class="icon-box d-flex align-items-center justify-content-center flex-shrink-0">
                                <i class="fa fa-couch text-white fs-4"></i>
                            </div>
                            <div class="ms-4">
                                <h4 class="fw-semibold mb-2" style="color: #3a2d1e;">Premium Craftsmanship</h4>
                                <p class="text-muted mb-0">Each HNO piece is handcrafted with expert precision using sustainable materials.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="feature-card d-flex align-items-start p-4 rounded-4 shadow-sm bg-white h-100">
                            <div class="icon-box d-flex align-items-center justify-content-center flex-shrink-0">
                                <i class="fa fa-seedling text-white fs-4"></i>
                            </div>
                            <div class="ms-4">
                                <h4 class="fw-semibold mb-2" style="color: #3a2d1e;">Sustainable Materials</h4>
                                <p class="text-muted mb-0">We use eco-conscious materials to create long-lasting, nature-friendly furniture.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="feature-card d-flex align-items-start p-4 rounded-4 shadow-sm bg-white h-100">
                            <div class="icon-box d-flex align-items-center justify-content-center flex-shrink-0">
                                <i class="fa fa-home text-white fs-4"></i>
                            </div>
                            <div class="ms-4">
                                <h4 class="fw-semibold mb-2" style="color: #3a2d1e;">Elegant Designs</h4>
                                <p class="text-muted mb-0">Our designs blend comfort, functionality, and timeless beauty for every home.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Custom Styling -->
<style>
/* --- Feature Cards --- */
.feature-card {
    transition: all 0.4s ease;
    border: 1px solid rgba(0, 0, 0, 0.05);
}
.feature-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 25px rgba(0, 0, 0, 0.12);
}

/* --- Icon Styling --- */
.icon-box {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: linear-gradient(135deg, #b68d40, #8b5e2b);
    transition: all 0.3s ease;
}
.feature-card:hover .icon-box {
    transform: scale(1.1);
    box-shadow: 0 0 15px rgba(182, 141, 64, 0.4);
}

/* --- Image Section --- */
.main-img {
    width: 100%;
    border: 5px solid #fff;
    border-radius: 20px;
    transition: all 0.5s ease;
    position: relative;
}
.small-img {
    width: 65%;
    border: 5px solid #fff;
    border-radius: 18px;
    bottom: -30px;
    right: -40px;
    transition: all 0.4s ease;
}
.check-badge {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #b68d40, #8b5e2b);
    border-radius: 50%;
    box-shadow: 0 0 25px rgba(182, 141, 64, 0.4);
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

/* --- Hover Effects --- */
/* .main-img:hover {
    transform: scale(1.03);
}
.small-img:hover {
    transform: scale(1.02);
} */

/* --- Responsive Fixes --- */
@media (max-width: 992px) {
    .small-img {
        position: relative !important;
        right: 0;
        bottom: 0;
        width: 85%;
        margin-top: 1.5rem;
        transform: none !important;
    }
    .check-badge {
        display: none;
    }
}
</style>
<!-- Why Choose Us End -->



    <!-- Team Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h4 class="section-title">Team Members</h4>
            <h1 class="display-5 mb-4">We Are Creative Architecture Team For Your Dream Home</h1>
        </div>
        <div class="row g-0 team-items">
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item position-relative">
                    <div class="position-relative">
                        <img class="img-fluid" src="{{ asset('assets/img/team-1.jpg') }}" alt="">
                        <div class="team-social text-center">
                            <a class="btn btn-square" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="bg-light text-center p-4">
                        <h3 class="mt-2">Architect Name</h3>
                        <span class="text-primary">Designation</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="team-item position-relative">
                    <div class="position-relative">
                        <img class="img-fluid" src="{{ asset('assets/img/team-2.jpg') }}" alt="">
                        <div class="team-social text-center">
                            <a class="btn btn-square" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="bg-light text-center p-4">
                        <h3 class="mt-2">Architect Name</h3>
                        <span class="text-primary">Designation</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="team-item position-relative">
                    <div class="position-relative">
                        <img class="img-fluid" src="{{ asset('assets/img/team-3.jpg') }}" alt="">
                        <div class="team-social text-center">
                            <a class="btn btn-square" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="bg-light text-center p-4">
                        <h3 class="mt-2">Architect Name</h3>
                        <span class="text-primary">Designation</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                <div class="team-item position-relative">
                    <div class="position-relative">
                        <img class="img-fluid" src="{{ asset('assets/img/team-4.jpg') }}" alt="">
                        <div class="team-social text-center">
                            <a class="btn btn-square" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="bg-light text-center p-4">
                        <h3 class="mt-2">Snehal Pawar</h3>
                        <span class="text-primary">Designation</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Team End -->

<!-- Testimonial Start -->
<div class="container-xxl py-5 bg-light">
    <div class="container">
        <div class="text-center mx-auto mb-5" style="max-width: 700px;">
            <h4 class="section-title text-uppercase" style="color: #b88e2f;">Client Feedback</h4>
            <h1 class="display-5 mb-4 fw-bold">What Our Clients Say</h1>
            <p class="text-muted">Our clients love working with us. Here's what they have to say about our services.</p>
        </div>

        <div class="owl-carousel testimonial-carousel">
            <!-- Testimonial 1 -->
            <div class="testimonial-item text-center">
                <i class="fa fa-quote-left quote-icon mb-3"></i>
                <p class="fst-italic text-muted">"Olivia is my go-to virtual assistant. She is a fast learner, extremely flexible, and great to work with."</p>
                <h5 class="fw-bold mb-0">deepak</h5>
                <span class="text-primary">Client</span>
            </div>

            <!-- Testimonial 2 -->
            <div class="testimonial-item text-center">
                <i class="fa fa-quote-left quote-icon mb-3"></i>
                <p class="fst-italic text-muted">"I love their customized furniture options. Every piece feels premium and thoughtfully designed for daily use."</p>
                <h5 class="fw-bold mb-0">sakshi joshi</h5>
                <span class="text-primary">Architect</span>
            </div>

            <!-- Testimonial 3 -->
            <div class="testimonial-item text-center">
                <i class="fa fa-quote-left quote-icon mb-3"></i>
                <p class="fst-italic text-muted">"I love their customized furniture options. Every piece feels premium and thoughtfully designed for daily use."</p>
                <h5 class="fw-bold mb-0">shrddha </h5>
                <span class="text-primary">interior designer</span>
            </div>


        </div>
    </div>
</div>
<!-- Testimonial End -->

<!-- Owl Carousel JS -->
<script>
$('.testimonial-carousel').owlCarousel({
    loop: true,
    margin: 20,
    autoplay: true,
    autoplayTimeout: 5000,
    autoplayHoverPause: true,
    nav: false,
    responsive: {
        0: { items: 1 },
        768: { items: 2 },
        992: { items: 3 }
    }
});
</script>

<!-- Testimonial CSS -->
 
<style>
.testimonial-item {
    background: #fff;
    border-radius: 20px;
    padding: 30px 20px;
    margin: 10px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    display: flex;
    flex-direction: column;
    justify-content: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    min-height: 100px;
}

.testimonial-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.12);
}

.quote-icon {
    font-size: 30px;
    color: #b88e2f;
}

.testimonial-item p {
    font-size: 14px;
    line-height: 1.6;
    color: #555;
    margin-bottom: 15px;
}

.testimonial-item h5 {
    font-size: 16px;
    font-weight: bold;
    margin-bottom: 3px;
}

.testimonial-item span {
    font-size: 13px;
    color: #888;
}
</style>

    <!-- Blog Start -->
    <div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h4 class="section-title">Latest Blog</h4>
            <h1 class="display-5 mb-4">Latest Articles From Our Blog Post</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="blog-item">
                    <div class="overflow-hidden">
                        <img class="img-fluid" src="{{ asset('assets/img/blog-md-1.jpg') }}" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <div class="breadcrumb blog-meta">
                            <div class="breadcrumb-item"><a href="#">01 Jan, 2045</a></div>
                            <!--<div class="breadcrumb-item"><a href="#">Admin</a></div>-->
                        </div>
                        <a href="#" class="d-block h3 mb-4">We have 25 years of experience in this industry</a>
                       
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="blog-item">
                    <div class="overflow-hidden">
                        <img class="img-fluid" src="{{ asset('assets/img/blog-md-2.jpg') }}" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <div class="breadcrumb blog-meta">
                            <div class="breadcrumb-item"><a href="#">01 Jan, 2045</a></div>
                            
                        </div>
                        <a href="#" class="d-block h3 mb-4">We have 25 years of experience in this industry</a>
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="blog-item">
                    <div class="overflow-hidden">
                        <img class="img-fluid" src="{{ asset('assets/img/blog-md-3.jpg') }}" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <div class="breadcrumb blog-meta">
                            <div class="breadcrumb-item"><a href="#">01 Jan, 2045</a></div>
                        </div>
                        <a href="#" class="d-block h3 mb-4">We have 25 years of experience in this industry</a>
                        
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>
 <!-- Blog End -->
    <!-- Back to Top -->
    @include('frontend.layouts.footer')