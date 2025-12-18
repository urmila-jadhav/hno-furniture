@include('frontend.layouts.header')
<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 p-0 wow fadeIn" data-wow-delay="0.1s"
    style="
        background-image: url('{{ asset('assets/img/study-banner.jpg') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        position: relative;
        height: 60vh; /* Adjust banner height */
        display: flex;
        align-items: center;
        justify-content: center;
     ">
</div>
<!-- Page Header End -->
<!-- CTA Offer Section - HNO Furniture -->
<section class="cta-offer-section my-5">
    <div class="container-fluid cta-box text-white position-relative overflow-hidden py-4 px-5">
        <div class="row align-items-center justify-content-between gy-3">
            <!-- Left Content -->
            <div class="col-lg-8">
                <h3 class="fw-bold text-uppercase mb-2 text-warning">Exclusive Offers from HNO Furniture</h3>
                <p class="mb-3 text-light">Bank Offers | Free Delivery & Installation | Visit Your Nearest Store</p>

                <div class="row g-3 text-white">
                    <div class="col-md-4">
                        <div class="d-flex align-items-center feature-item">
                            <div class="icon-box me-3">
                                <i class="fa fa-credit-card fs-5"></i>
                            </div>
                            <div>
                                <h6 class="fw-semibold mb-0 text-warning">Bank Offers</h6>
                                <small>Up to ₹25,000 Instant Discount*</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-flex align-items-center feature-item">
                            <div class="icon-box me-3">
                                <i class="fa fa-truck fs-5"></i>
                            </div>
                            <div>
                                <h6 class="fw-semibold mb-0 text-warning">Free Delivery</h6>
                                <small>Free Installation Across All Mejor Cities</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="d-flex align-items-center feature-item">
                            <div class="icon-box me-3">
                                <i class="fa fa-store fs-5"></i>
                            </div>
                            <div>
                                <h6 class="fw-semibold mb-0 text-warning">Visit Store</h6>
                                <small>Find your nearest HNO outlet</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right CTA Button -->
            <div class="col-lg-3 text-lg-end text-center">
                <a href="#" class="btn btn-gold btn-lg fw-semibold rounded-pill px-5 py-2 shadow-lg">
                    Visit Store
                </a>
            </div>

        </div>

        <!-- Background Decorative Overlay -->
        <div class="cta-overlay"></div>
    </div>
</section>

<style>
    /* --- CTA Full Width --- */
    .cta-box {
        width: 100%;
        background: linear-gradient(90deg, #1b1a17 0%, #3a2d1e 100%);
        border-radius: 0;
        position: relative;
    }

    /* --- Decorative Overlay --- */

    .cta-overlay {
        content: "";
        position: absolute;
        top: -40px;
        right: -60px;
        width: 250px;
        height: 250px;
        background: rgba(255, 255, 255, 0.08);
        border-radius: 50%;
        filter: blur(20px);
        z-index: 0;
    }

    /* --- Text + Icons --- */

    .icon-box {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: linear-gradient(135deg, #b68d40, #8b5e2b);
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        transition: transform 0.3s ease;
    }

    .feature-item:hover .icon-box {
        transform: scale(1.1);
    }

    /* --- Button --- */

    .btn-gold {
        background: linear-gradient(135deg, #b68d40, #8b5e2b);
        color: #fff;
        border: none;
        transition: all 0.3s ease-in-out;
    }

    .btn-gold:hover {
        background: linear-gradient(135deg, #d4a857, #9a6f3a);
        transform: scale(1.05);
    }

    /* --- Reduce Height --- */

    .cta-offer-section {
        margin: 0;
    }

    .cta-box {
        padding-top: 2rem !important;
        padding-bottom: 2rem !important;
    }

    /* --- Responsive --- */

    @media (max-width: 768px) {
        .cta-box {
            text-align: center;
        }

        .btn-gold {
            width: 100%;
            margin-top: 15px;
        }
    }
</style>

<!-- Shop By Categories Start -->
<div class="container-xxl py-5 bg-light">
    <div class="container">

        <!-- Section Title -->
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 700px;">
            <h4 class="section-title text-uppercase" style="color: #b88e2f;">Shop By Categories</h4>
        </div>

        <!-- Category Buttons -->
        <div class="d-flex justify-content-center flex-wrap mb-4 gap-3 wow fadeInUp" data-wow-delay="0.2s">
            <button class="btn btn-outline-warning rounded-pill active px-3 py-1 category-btn" data-filter="all">
                All
            </button>

            @foreach ($categories as $category)
                <button class="btn btn-outline-warning rounded-pill px-3 py-1 category-btn"
                    data-filter="{{ \Illuminate\Support\Str::slug($category->category_name) }}">
                    {{ $category->category_name }}
                </button>
            @endforeach
        </div>

        <!-- Subcategory Items -->
        <div class="row g-4 justify-content-center wow fadeInUp" data-wow-delay="0.3s">
            @foreach ($subcategories as $subcategory)
                <div class="col-md-4 col-lg-3 category-item
                    {{ \Illuminate\Support\Str::slug($subcategory->category?->category_name ?? 'uncategorized') }}">
                    
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">

                        <div class="img-box">
                            <img src="{{ asset($subcategory->sub_category_img ?? 'uploads/subcategory/default.jpg') }}"
                                alt="{{ $subcategory->name }}">
                        </div>

                        <div class="card-body text-center py-3">
                            <h6 class="fw-semibold text-uppercase mb-0">{{ $subcategory->name }}</h6>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>


    </div>
</div>
<style>
/* Perfect responsive image size inside card */
.img-box {
    width: 100%;
    aspect-ratio: 4 / 3;       /* PERFECT SIZE — no fixed height needed */
    overflow: hidden;
    background: #f8f8f8;       /* smooth background when image loads */
}

.img-box img {
    width: 100%;
    height: 100%;
    object-fit: cover;         /* PERFECT crop — no distortion */
    display: block;
}

/* Ensures cards stay equal height */
.card {
    height: 100%;
    border-radius: 16px;
}
.category-item {
    transition: all 0.3s ease;
}


</style>


<!-- Shop By Categories End -->

<!-- Script: Filter Categories -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const buttons = document.querySelectorAll(".category-btn");
        const items = document.querySelectorAll(".category-item");

        buttons.forEach(button => {
            button.addEventListener("click", function () {
                buttons.forEach(btn => btn.classList.remove("active"));
                this.classList.add("active");

                const filter = this.getAttribute("data-filter");

                items.forEach(item => {
                    if (filter === "all") {
                        item.style.display = "block";
                    } 
                    else if (item.classList.contains(filter)) {
                        item.style.display = "block";
                    } 
                    else {
                        item.style.display = "none";
                    }
                });
            });
        });
    });
</script>



<style>
    .category-btn.active {
        background-color: #c19a6b;
        color: #fff;
        border-color: #c19a6b;
    }

    .category-item img {
        transition: transform 0.4s ease;
    }

    .category-item:hover img {
        transform: scale(1.05);
    }

    .card-body h6 {
        color: #c19a6b;
    }

    @media (max-width: 768px) {
        .category-btn {
            font-size: 0.85rem;
            padding: 0.4rem 0.8rem;
        }
    }
</style>

<!-- Best Sellers Section (with Slider) -->
<section class="py-5 bg-light position-relative">
    <div class="container">
        <h2 class="text-center mb-5 fw-bold text-uppercase" style="letter-spacing: 1px; color: #c19a6b;">
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
                  
                    </p>
                
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
                    </p>
                  
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
                    </p>
                  
                </div>
            </div>

            <!-- Product 4 -->
            <div class="card border-0 shadow-sm position-relative rounded-4 overflow-hidden mx-2">
                <span class="badge bg-danger position-absolute top-0 start-0 m-2">40% off</span>
                <img src="{{ asset('assets/img/blog-lg-3.jpg') }}" class="card-img-top" alt="Product 4">
                <div class="card-body text-center">
                    <span class="badge bg-dark mb-2">Best Seller</span>
                    <h6 class="fw-semibold mb-2">HNO Sheesham Wood Coffee Table</h6>
                    <div class="text-warning mb-2">★★★★★</div>
                    </p>
                   
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Include Owl Carousel CSS & JS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<!-- Initialize Carousel -->
<script>
    $(document).ready(function() {
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
                0: {
                    items: 1
                },
                576: {
                    items: 2
                },
                768: {
                    items: 3
                },
                992: {
                    items: 4
                }
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
                    <img src="{{ asset('assets/img/blog-lg-1.jpg') }}" class="img-fluid rounded"
                        alt="Crystal Wall Art">
                </div>
                <h6 class="fw-semibold mt-3 mb-0 text-dark">Crystal Wall Art</h6>
            </div>

            <!-- Decor Item 5 -->
            <div class="decor-card card border-0 rounded-4 text-center p-3 mx-2">
                <div class="decor-img-container">
                    <img src="{{ asset('assets/img/blog-lg-1.jpg') }}" class="img-fluid rounded"
                        alt="Luxury Mirrors">
                </div>
                <h6 class="fw-semibold mt-3 mb-0 text-dark">Luxury Mirrors</h6>
            </div>
        </div>
    </div>
</section>

<!-- Include Owl Carousel CSS & JS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<!-- Initialize Carousel -->
<script>
    $(document).ready(function() {
        $(".royal-decor-carousel").owlCarousel({
            loop: true,
            margin: 20,
            autoplay: true,
            autoplayTimeout: 1500,
            autoplayHoverPause: true,
            dots: false,

            responsive: {
                0: {
                    items: 1
                },
                576: {
                    items: 2
                },
                768: {
                    items: 3
                },
                992: {
                    items: 4
                }
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
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
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
        color: #b88e2f;
        /* Elegant gold accent */
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


<!-- Design Conversion Start -->
<div class="container-xxl project py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h4 class="section-title">Design Conversion</h4>
            <h1 class="display-5 mb-4">What We Do! Check Our Design Conversion</h1>
        </div>
        <div class="twentytwenty-container wow fadeInUp" data-wow-delay="0.1s">
            <img class="img-fluid w-100" src="{{ asset('assets/img/blog-lg-1.jpg') }}" alt="Before Image">
            
        </div>

    </div>
</div>
<!-- Design Conversion End -->

@include('frontend.layouts.footer')
