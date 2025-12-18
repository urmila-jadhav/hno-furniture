
@include('frontend.layouts.header')
<!-- ✅ Banner Start -->
<!-- ✅ Banner Start -->
<div class="container-fluid page-header mb-5 p-0" 
     data-wow-delay="0.1s"
     style="position: relative; 
            height: 90vh; 
            background: url('{{ asset('assets/img/carousel-1.jpg') }}') center/cover no-repeat;">
    <!-- ✅ Centered Content -->
    <div class="d-flex align-items-center justify-content-center h-100">
        <h1 class="display-1 text-white fw-bold text-center animated slideInDown">
            About HNO
        </h1>
    </div>
</div>
<!-- Banner End -->
<!-- About Section Start -->
<section class="about-section py-5" style="background-color: #f8f5f2;">
    <div class="container">
        <div class="row g-5 align-items-center">
            <!-- Left Side: Images -->
            <div class="col-lg-6 col-md-12 position-relative wow fadeInLeft" data-wow-delay="0.2s">
                <div class="about-images position-relative">
                    <!-- Primary Image -->
                    <img src="{{ asset('assets/img/carousel-3.jpg') }}"
                         class="img-fluid main-img rounded-4 shadow-lg"
                         alt="Premium Furniture">
                    <!-- Overlay Image -->
                    <img src="{{ asset('assets/img/carousel-3.jpg') }}"
                         class="img-fluid overlay-img rounded-4 shadow-lg"
                         alt="Modern Living Room">
                </div>
            </div>
            <!-- Right Side: Content -->
            <div class="col-lg-6 col-md-12 wow fadeInRight" data-wow-delay="0.4s">
                <h4 class="section-title text-uppercase fw-bold" style="color: #c19a6b letter-spacing: 2px;">Our Story</h4>
                <h1 class="display-5 fw-bold mb-4" style="color: #1e1e1e;">Crafting Comfort, One Piece at a Time</h1>
                
                <p class="text-muted mb-3" style="font-size: 1.05rem; line-height: 1.8;">
                    Welcome to <strong style="color:  #c19a6b;">HNO Furniture</strong> — where design meets craftsmanship.
                    For over two decades, we’ve been shaping homes with furniture that blends timeless elegance and modern functionality.
                    Every creation tells a story of dedication, artistry, and attention to detail.
                </p>
                <p class="text-muted mb-4" style="font-size: 1.05rem; line-height: 1.8;">
                    From luxurious living room sets to contemporary workspace designs, our furniture is more than décor — 
                    it’s a reflection of your lifestyle and comfort. We believe that great furniture doesn’t just fill a space; 
                    it transforms it into something extraordinary.
                </p>
                <!-- Experience Counter -->
                <div class="d-flex align-items-center mb-5">
                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center border border-4 rounded-circle"
                         style="width: 120px; height: 120px; border-color: #8B4513; background-color: #fff;">
                        <h1 id="experience-counter" class="display-3 fw-bold mb-0" style="color:  #c19a6b;">0</h1>
                    </div>
                    <div class="ps-4">
                        <h3 class="fw-semibold mb-1">Years of</h3>
                        <h3 class="fw-semibold mb-1">Design</h3>
                        <h3 class="fw-bold text-uppercase" style="color:  #c19a6b;">Excellence</h3>
                    </div>
                </div>
                <!-- CTA Button -->
                <a class="btn px-5 py-3 text-white"
                   style="background-color:  #c19a6b; border-radius: 50px; font-weight: 600; box-shadow: 0 4px 10px rgba(139, 69, 19, 0.3); transition: all 0.3s ease;"
                   href="#">
                    Discover More
                </a>
            </div>
        </div>
    </div>
</section>
<!-- About Section End -->
<!-- Styling -->
<style>
    .about-section .about-images {
        position: relative;
        min-height: 420px;
    }
    .about-section .about-images .main-img {
        width: 100%;
        height: 420px;
        object-fit: cover;
        border: 5px solid #fff;
        border-radius: 20px;
    }
    .about-section .about-images .overlay-img {
        position: absolute;
        bottom: -25px;
        right: -25px;
        width: 60%;
        height: 280px;
        object-fit: cover;
        border: 5px solid #fff;
        border-radius: 20px;
        transition: transform 0.4s ease, box-shadow 0.4s ease;
    }
    .about-section .about-images .overlay-img:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.25);
    }
    .about-section .main-img:hover {
        transform: scale(1.02);
        transition: all 0.4s ease;
    }
    @media (max-width: 991px) {
        .about-section .about-images {
            min-height: auto;
        }
        .about-section .about-images .overlay-img {
            position: relative;
            right: 0;
            bottom: 0;
            width: 100%;
            height: auto;
            margin-top: 20px;
            transform: none;
        }
    }
</style>
<!-- Counter Script -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const counter = document.getElementById('experience-counter');
        const target = 25; // years
        const duration = 2000; // 2 seconds
        let start = 0;
        let started = false;
        function countUp() {
            const increment = target / (duration / 50);
            const interval = setInterval(() => {
                start += increment;
                if (start >= target) {
                    start = target;
                    clearInterval(interval);
                }
                counter.textContent = Math.floor(start);
            }, 50);
        }
        function isInView(el) {
            const rect = el.getBoundingClientRect();
            return rect.top < window.innerHeight && rect.bottom >= 0;
        }
        function scrollHandler() {
            if (!started && isInView(counter)) {
                started = true;
                countUp();
                window.removeEventListener('scroll', scrollHandler);
            }
        }
        window.addEventListener('scroll', scrollHandler);
    });
</script>

<!-- Feature Start ->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <h4 class="section-title">Why Choose Us</h4>
                <h1 class="display-5 mb-4">Where Style, Comfort & Quality Come Together</h1>
                <p class="mb-4">At HNO, every piece is designed to bring warmth and personality into your home. From selecting premium materials to ensuring lasting comfort, our commitment is to create furniture that elevates your everyday living experience.</p>
                <div class="row g-4">
                    <div class="col-12">
                        <div class="d-flex align-items-start">
                            <img class="flex-shrink-0" src="{{ asset('assets/img/icons/icon-2.png') }}" alt="Design Icon">
                            <div class="ms-4">
                                <h3>Thoughtful Design</h3>
                                <p class="mb-0">Our design process blends aesthetics and ergonomics — ensuring beauty, comfort, and functionality in every piece.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-flex align-items-start">
                            <img class="flex-shrink-0" src="{{ asset('assets/img/icons/icon-3.png') }}" alt="Innovation Icon">
                            <div class="ms-4">
                                <h3>Premium Craftsmanship</h3>
                                <p class="mb-0">Every item is handcrafted by skilled artisans using quality materials built to stand the test of time.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-flex align-items-start">
                            <img class="flex-shrink-0" src="{{ asset('assets/img/icons/icon-4.png') }}" alt="Service Icon">
                            <div class="ms-4">
                                <h3>Personalized Service</h3>
                                <p class="mb-0">We listen, design, and deliver furniture tailored to your taste, ensuring a smooth experience from concept to creation.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="feature-img">
                    <img class="img-fluid" src="{{ asset('assets/img/about-2.jpg') }}" alt="Furniture Collection">
                    <img class="img-fluid" src="{{ asset('assets/img/about-1.jpg') }}" alt="Modern Furniture">
                </div>
            </div>
        </div>
    </div>
</div>
<!- Feature End -->
<!-- Founder Section Start -->
<section class="founder-section py-5" style="background-color: #f8f5f2;">
    <div class="container">
        <div class="row g-5 align-items-center">
            
            <!-- Left Side: Image -->
            <div class="col-lg-5 col-md-12 wow fadeInLeft" data-wow-delay="0.2s">
                <div class="founder-img position-relative">
                    <img src="{{ asset('assets/img/team-2.jpg') }}" 
                         alt="Founder of HNO Furniture" 
                         class="img-fluid rounded-4 shadow-lg object-fit-cover" 
                         style="border: 5px solid #fff;">
                    <div class="position-absolute bottom-0 start-0 bg-dark text-white px-4 py-2 rounded-end-4"
                         style="font-weight: 600; letter-spacing: 1px;">
                        Founder &amp; Visionary
                    </div>
                </div>
            </div>
            <!-- Right Side: Content -->
            <div class="col-lg-7 col-md-12 wow fadeInRight" data-wow-delay="0.4s">
                <h4 class="section-title text-uppercase fw-bold" style="color: #c19a6b; letter-spacing: 2px;">
                    Our Founder
                </h4>
                <h1 class="display-5 fw-bold mb-3" style="color: #1e1e1e;">Mr.XYZ</h1>
                <h5 class="text-muted mb-4" style="font-style: italic;">
                    “Design is not just what it looks like, but how it feels when you live with it.”
                </h5>
                <p class="text-muted mb-3" style="font-size: 1.05rem; line-height: 1.8;">
                    The journey of <strong style="color: #c19a6b;">HNO Furniture</strong> began with a vision — to craft furniture that brings together
                    timeless design, comfort, and affordability. Under the leadership of our founder,
                    HNO has grown from a small design studio to a trusted furniture brand across India.
                </p>
                <p class="text-muted mb-4" style="font-size: 1.05rem; line-height: 1.8;">
                    His belief in innovation, sustainability, and craftsmanship continues to guide our team.
                    Every piece we create reflects his commitment to turning houses into homes filled with elegance and warmth.
                </p>
                <!-- Founder Signature or Name -->
                <div class="mt-4">
                    <h4 class="fw-bold mb-0" style="color: #c19a6b;">Mr.XYZ</h4>
                    <p class="text-muted mb-0">Founder &amp; CEO, HNO Furniture</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Founder Section End -->
<!-- Additional Styling -->
<style>
    .founder-section .founder-img {
        overflow: hidden;
        border-radius: 20px;
    }
    .founder-section .founder-img img {
        width: 100%;
        height: 500px;
        object-fit: cover;
        transition: transform 0.4s ease;
    }
    .founder-section .founder-img:hover img {
        transform: scale(1.05);
    }
    @media (max-width: 991px) {
        .founder-section .founder-img img {
            height: 400px;
        }
    }
</style>

<!-- Vision & Mission Section Start -->
<section class="vision-mission-section py-5" style="background-color: #f8f5f2;">
    <div class="container">
        <!-- Section Title -->
        <div class="text-center mb-5">
            <h3 class="section-title text-uppercase fw-bold" style="color:  #c19a6b; letter-spacing: 2px;">Our Vision & Mission</h3>
             <div style="width: 500px; height: 3px; background-color: #1a1414ff; margin: 10px auto;"></div> 
        </div>
        <!-- Vision Section -->
        <div class="row g-0 align-items-stretch mb-5 overflow-hidden rounded-4 shadow-sm">
            <!-- Vision Image -->
            <div class="col-lg-6 col-md-12">
                <img src="{{ asset('assets/img/carousel-3.jpg') }}" alt="Our Vision"
                     class="img-fluid w-100 h-100 object-fit-cover rounded-start-4">
            </div>
            <!-- Vision Content -->
        <div class="col-lg-6 col-md-12 d-flex align-items-center">
            <div class="p-5 w-100 h-100 d-flex flex-column justify-content-center align-items-center text-center bg-dark text-white rounded-end-4 shadow-sm"
                style="border-right: 4px solid #c19a6b;">
                
                <h2 class="mb-4 text-uppercase fw-bold" style="color: #c19a6b; letter-spacing: 1px;">
                    Our Vision
                </h2>
                
                <p class="mb-3" style="font-size: 1.05rem; line-height: 1.8;">
                    Emerge as a global leader in the furniture industry, redefining modern living with style and comfort.
                </p>
                <p class="mb-3" style="font-size: 1.05rem; line-height: 1.8;">
                    Create boundless growth opportunities for our employees, partners, and communities.
                </p>
                <p style="font-size: 1.05rem; line-height: 1.8;">
                    Elevate every home and workspace with designs that blend functionality and beauty at unbeatable value.
                </p>
            </div>
        </div>
        </div>
        <!-- Mission Section -->
        <div class="row g-0 align-items-stretch flex-lg-row flex-column-reverse overflow-hidden rounded-4 shadow-sm">
            <!-- Mission Content -->
            <div class="col-lg-6 col-md-12 d-flex align-items-center">
                <div class="p-5 w-100 h-100 d-flex flex-column justify-content-center align-items-center text-center bg-dark text-white rounded-start-4"
                    style="border-left: 4px solid #c19a6b;">
                    <h2 class="mb-4 text-uppercase fw-bold" style="color: #c19a6b; letter-spacing: 1px;">
                        Our Mission
                    </h2>
                    <p class="mb-3" style="font-size: 1.05rem; line-height: 1.8;">
                        Deliver international-quality furniture that transforms everyday spaces into stylish experiences.
                    </p>
                    <p class="mb-3" style="font-size: 1.05rem; line-height: 1.8;">
                        Offer beautifully crafted furnishings at competitive prices, backed by exceptional service.
                    </p>
                    <p style="font-size: 1.05rem; line-height: 1.8;">
                        Create seamless experiences for our customers across India — from store to doorstep.
                    </p>
                </div>
            </div>
            <!-- Mission Image -->
            <div class="col-lg-6 col-md-12">
                <img src="{{ asset('assets/img/carousel-3.jpg') }}" alt="Our Mission"
                    class="img-fluid w-100 h-100 object-fit-cover rounded-end-4">
            </div>
        </div>
    </div>
</section>
<!-- Vision & Mission Section End -->
<!-- Optional Styling -->
<style>
    .vision-mission-section img {
        min-height: 400px;
        max-height: 500px;
        object-fit: cover;
    }
    .vision-mission-section .bg-dark {
        background-color: #1e1e1e !important;
    }
    @media (max-width: 991px) {
        .vision-mission-section .rounded-start-4,
        .vision-mission-section .rounded-end-4 {
            border-radius: 0 !important;
        }
        .vision-mission-section img {
            border-radius: 0 !important;
        }
    }
</style>
<!-- Achievements Section Start -->
<section class="achievements-section py-5" style="background-color: #f8f5f2;">
    <div class="container text-center">
        <div class="mb-5 wow fadeInUp" data-wow-delay="0.1s">
            <h4 class="section-title text-uppercase fw-bold" style="color: #c19a6b; letter-spacing: 2px;">
                Our Achievements
            </h4>
            <h1 class="display-5 fw-bold mb-3" style="color: #1e1e1e;">Milestones of Excellence</h1>
            <p class="text-muted mx-auto" style="max-width: 700px; font-size: 1.05rem;">
                At <strong style="color: #c19a6b;">HNO Furniture</strong>, every achievement is a reflection of our dedication to quality,
                craftsmanship, and customer satisfaction. Here's a glimpse of our journey so far.
            </p>
        </div>
        <!-- Counter Section -->
        <div class="row g-4 justify-content-center">
            <!-- Counter 1 -->
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                <div class="achievement-box bg-white rounded-4 shadow-sm p-4">
                    <div class="icon mb-3">
                        <i class="fa fa-couch fa-3x" style="color: #c19a6b;"></i>
                    </div>
                    <h2 class="counter fw-bold mb-2" data-target="5000">0</h2>
                    <p class="text-muted fw-semibold mb-0">+ Products Delivered</p>
                </div>
            </div>
            <!-- Counter 2 -->
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="achievement-box bg-white rounded-4 shadow-sm p-4">
                    <div class="icon mb-3">
                        <i class="fa fa-smile fa-3x" style="color: #c19a6b;"></i>
                    </div>
                    <h2 class="counter fw-bold mb-2" data-target="3500">0</h2>
                    <p class="text-muted fw-semibold mb-0">+ Happy Customers</p>
                </div>
            </div>
            <!-- Counter 3 -->
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                <div class="achievement-box bg-white rounded-4 shadow-sm p-4">
                    <div class="icon mb-3">
                        <i class="fa fa-briefcase fa-3x" style="color: #c19a6b;"></i>
                    </div>
                    <h2 class="counter fw-bold mb-2" data-target="25">0</h2>
                    <p class="text-muted fw-semibold mb-0">+ Years of Experience</p>
                </div>
            </div>
            <!-- Counter 4 -->
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="achievement-box bg-white rounded-4 shadow-sm p-4">
                    <div class="icon mb-3">
                        <i class="fa fa-store fa-3x" style="color: #c19a6b;"></i>
                    </div>
                    <h2 class="counter fw-bold mb-2" data-target="20">0</h2>
                    <p class="text-muted fw-semibold mb-0">+ Stores Nationwide</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Achievements Section End -->
<!-- Counter Script -->
<script>
    const counters = document.querySelectorAll('.counter');
    const speed = 100; // Adjust animation speed
    counters.forEach(counter => {
        const animate = () => {
            const value = +counter.getAttribute('data-target');
            const data = +counter.innerText;
            const time = value / speed;
            if (data < value) {
                counter.innerText = Math.ceil(data + time);
                setTimeout(animate, 60);
            } else {
                counter.innerText = value;
            }
        };
        animate();
    });
</script>
<!-- Additional Styling -->
<style>
    .achievements-section .achievement-box {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .achievements-section .achievement-box:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
    }
    .achievements-section .counter {
        font-size: 2.5rem;
        color: #1e1e1e;
    }
    .achievements-section .icon i {
        transition: transform 0.3s ease;
    }
    .achievements-section .achievement-box:hover .icon i {
        transform: scale(1.1);
    }
</style>

<!-- Why Choose Us Section -->
<section class="why-choose-us py-5 wow fadeInUp" data-wow-delay="0.3s">
    <div class="container">
        <!-- Title -->
        <div class="text-center mb-5">
            <h2 class="fw-bold text-uppercase text-gold">Why Choose HNO?</h2>
            <p class="text-muted fs-5">In-house craftsmanship, premium in quality</p>
        </div>
        <!-- Cards -->
        <div class="row g-4 justify-content-center">
            <!-- Card 1 -->
            <div class="col-md-6 col-lg-3">
                <div class="why-card position-relative overflow-hidden rounded-4 shadow-sm">
                    <img src="{{ asset('assets/img/blog-lg-1.jpg') }}" class="img-fluid w-100 card-img" alt="Safe for Home">
                    <div class="overlay position-absolute bottom-0 start-0 w-100 text-white p-3">
                        <h5 class="fw-bold mb-1">Safe for Your Home</h5>
                        <p class="small mb-0">Finished with organic non-VOC polish for a toxin-free, safer living space.</p>
                    </div>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="col-md-6 col-lg-3">
                <div class="why-card position-relative overflow-hidden rounded-4 shadow-sm">
                    <img src="{{ asset('assets/img/blog-lg-2.jpg') }}" class="img-fluid w-100 card-img" alt="Crafted Strong">
                    <div class="overlay position-absolute bottom-0 start-0 w-100 text-white p-3">
                        <h5 class="fw-bold mb-1">Crafted with the Strongest Bonds</h5>
                        <p class="small mb-0">Joined using premium adhesive and hardware for unmatched stability.</p>
                    </div>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="col-md-6 col-lg-3">
                <div class="why-card position-relative overflow-hidden rounded-4 shadow-sm">
                    <img src="{{ asset('assets/img/carousel-1.jpg') }}" class="img-fluid w-100 card-img" alt="Built Stronger">
                    <div class="overlay position-absolute bottom-0 start-0 w-100 text-white p-3">
                        <h5 class="fw-bold mb-1">Built Heavier, Built Stronger</h5>
                        <p class="small mb-0">Made with optimal wood thickness for unmatched durability.</p>
                    </div>
                </div>
            </div>
            <!-- Card 4 -->
            <div class="col-md-6 col-lg-3">
                <div class="why-card position-relative overflow-hidden rounded-4 shadow-sm">
                    <img src="{{ asset('assets/img/carousel-2.jpg') }}" class="img-fluid w-100 card-img" alt="Protection">
                    <div class="overlay position-absolute bottom-0 start-0 w-100 text-white p-3">
                        <h5 class="fw-bold mb-1">Protection from Termites & Borers</h5>
                        <p class="small mb-0">Engineered with toxin-free treatment for long-lasting protection.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
/* Why Choose Us Section */
.why-choose-us {
    background: linear-gradient(to bottom, #fffaf2, #ffffff);
}
.text-gold {
    color: #c19a6b;
    letter-spacing: 1px;
}
/* Card styling */
.why-card {
    transition: all 0.4s ease-in-out;
    border: none;
    height: 100%;
}
.why-card img.card-img {
    transition: transform 0.5s ease;
    height: 230px;
    object-fit: cover;
}
.why-card .overlay {
    background: rgba(0, 0, 0, 0.55);
    transition: background 0.3s ease-in-out;
}
/* Hover effect */
.why-card:hover img.card-img {
    transform: scale(1.1);
}
.why-card:hover .overlay {
    background: rgba(0, 0, 0, 0.7);
}
.why-card h5 {
    font-size: 1rem;
}
.why-card p {
    font-size: 0.85rem;
    color: #eaeaea;
}
/* Responsive spacing */
@media (max-width: 768px) {
    .why-choose-us {
        padding: 3rem 1rem;
    }
    .why-card img.card-img {
        height: 200px;
    }
}
</style>
@include('frontend.layouts.footer')
