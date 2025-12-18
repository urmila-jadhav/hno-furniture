@include('frontend.layouts.header')
@section('content')

<!--  Static Banner -->
@php
    $banners = json_decode($product->banner); // decode JSON array
    $firstBanner = isset($banners[0]) ? $banners[0] : 'assets/img/default-banner.jpg';
@endphp

<div class="banner-wrapper">
    <img src="{{ asset($firstBanner) }}" 
         class="d-block w-100 banner-slide" 
         style="height:71vh; object-fit:cover;">
</div>

<!--  Product Intro Section -->
<section class="py-5 category-intro">
    <div class="container">
        <h1 class="text-uppercase fw-bold mb-4 category-title">
            {{ $product->product_name }}
        </h1>
        <p class="text-secondary description-text">
            {!! $product->description !!}
        </p>
    </div>
</section>

<!--  Subcategory Grid -->
<div class="subcategory-grid-container">
    @foreach($subcategories as $index => $subcategory)
        <div class="subcategory-card {{ $index >= 6 ? 'extra-card' : '' }}" 
             style="{{ $index >= 7 ? 'display:none;' : '' }}">
            <img src="{{ asset($subcategory->sub_category_img) }}" 
                 alt="{{ $subcategory->name }}">
            <h3>{{ $subcategory->name }}</h3>
        </div>
    @endforeach

    @if(count($subcategories) > 6)
        <div class="subcategory-card see-more-card" id="seeMoreCard">
            <span class="plus-icon">+</span>
            <h3>See More</h3>
        </div>
    @endif
</div>

<!-- FAQ Section -->
@if(!empty($product->f_que) && !empty($product->f_ans))
@php
    $questions = json_decode($product->f_que, true);
    $answers   = json_decode($product->f_ans, true);
@endphp

<section class="faq-section py-5">
    <div class="container">
        <h2 class="text-center mb-4 fw-bold faq-title">Frequently Asked Questions</h2>
        <div class="accordion" id="faqAccordion">
            @foreach($questions as $index => $q)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading{{ $index }}">
                        <button class="accordion-button collapsed" type="button" 
                                data-bs-toggle="collapse"
                                data-bs-target="#collapse{{ $index }}" 
                                aria-expanded="false" aria-controls="collapse{{ $index }}">
                            {{ $q }}
                        </button>
                    </h2>
                    <div id="collapse{{ $index }}" 
                         class="accordion-collapse collapse"
                         aria-labelledby="heading{{ $index }}" 
                         data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            {!! $answers[$index] ?? '' !!}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@include('frontend.layouts.footer')

<!-- ====================== CSS ====================== -->
<style>
/* GENERAL */
body {
    font-family: "Poppins", sans-serif;
    color: #444;
}

/* BANNER */
.banner-wrapper img {
    object-fit: cover;
    width: 100%;
    height: 85vh;
}

/* PRODUCT / CATEGORY INTRO */
.category-intro {
    background-color: #fff;
    padding: 60px 0;
}
.category-title {
    color: #c19a6b;
    font-size: 2rem;
}
.description-text {
    font-size: 1.05rem;
    line-height: 1.8;
    color: #555;
}

/* SUBCATEGORY GRID */
.subcategory-grid-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 30px;
    padding: 40px 10%;
    background-color: #f8f9fa;
}
.subcategory-card {
    background: #fff;
    border-radius: 10px;
    overflow: hidden;
    text-align: center;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    padding: 15px;
    cursor: pointer;
}
.subcategory-card img {
    width: 100%;
    height: 180px;
    object-fit: cover;
    border-radius: 8px;
    margin-bottom: 15px;
}
.subcategory-card h3 {
    font-size: 1.1rem;
    color: #333;
    margin: 0;
}
.subcategory-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
}

/* SEE MORE CARD */
.see-more-card {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    font-size: 1.2rem;
    font-weight: 600;
    color: #c19a6b;
    background: #f1e7da;
    transition: background 0.3s ease, transform 0.3s ease;
}
.see-more-card .plus-icon {
    font-size: 2.5rem;
    margin-bottom: 10px;
}
.see-more-card:hover {
    background: #e0cfa5;
    transform: scale(1.05);
}

/* FAQ */
.accordion-button::after {
    font-size: 1rem;
    transform: rotate(0deg);
    transition: transform 0.3s ease;
}
.accordion-button:not(.collapsed)::after {
    transform: rotate(180deg);
}
.accordion-button {
    background-color: #fff;
    box-shadow: none !important;
    font-weight: 600;
}
.accordion-item {
    border: 1px solid #eee;
    border-radius: 5px;
    margin-bottom: 10px;
}
</style>

<!-- ====================== JS ====================== -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // See More card
    const seeMoreCard = document.getElementById('seeMoreCard');
    if(seeMoreCard){
        seeMoreCard.addEventListener('click', function() {
            const extraCards = document.querySelectorAll('.extra-card');
            extraCards.forEach(card => {
                card.style.display = 'block';
                card.style.opacity = 0;
                setTimeout(() => {
                    card.style.transition = 'opacity 0.5s';
                    card.style.opacity = 1;
                }, 50);
            });
            seeMoreCard.style.display = 'none';
        });
    }
});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
