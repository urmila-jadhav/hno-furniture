{{-- <section class="py-5" style="background-color:#fff;">
    <div class="container">
        <h1 class="text-uppercase fw-bold mb-4" style="color: #c19a6b; font-size:2rem;">
            {{ $category->category_name }}
        </h1>
        
        <p class="text-secondary mb-4" style="font-size:1.05rem; line-height:1.8;">
            {!! $category->description !!}
        </p>
    </div>
</section> --}}
@include('frontend.layouts.header')
@section('content')

<!-- ✅ Banner Section -->
@php
    $banner = !empty($category->banner_image) ? $category->banner_image : 'assets/img/default-banner.jpg';
@endphp

<div class="banner-wrapper">
    <img src="{{ asset($banner) }}" 
         class="d-block w-100 banner-slide" 
         alt="{{ $category->category_name }}" 
         style="height:71vh; object-fit:cover;">
</div>
<!-- ✅ Category Details Section -->
<section class="category-details-section py-5">
    <div class="container">
        <div class="row align-items-center">
            
            <!-- Left Column: Category Image -->
            <div class="col-lg-6 mb-4 mb-lg-0">
                <img src="{{ asset($category->category_image) }}" 
                     alt="{{ $category->category_name }}" 
                     class="img-fluid rounded-4 shadow-sm" 
                     style="width:100%; height:auto; object-fit:cover;">
            </div>

            <!-- Right Column: Description -->
            <div class="col-lg-6">
                <h1 class="text-uppercase fw-bold mb-4" style="color: #c19a6b; font-size:2.5rem;">
                    {{ $category->category_name }}
                </h1>
                
                <p class="text-secondary" style="font-size:1.1rem; line-height:1.8;">
                    {!! $category->description !!}
                </p>
            </div>
        </div>
    </div>
</section>
<!-- Category Intro Section -->
{{-- <section class="category-intro py-5 bg-white">
    <div class="container text-center">
        <h1 class="category-title text-uppercase fw-bold mb-4">
            {{ $category->category_name }}
        </h1>
        
        <p class="category-description text-secondary mb-0">
            {!! $category->description !!}
        </p>
    </div>
</section> --}}

<!-- Subcategories Grid -->
<section class="subcategories-grid py-5 bg-light">
    <div class="container">
        <div class="row g-4 justify-content-center">
            @foreach($subcategories as $index => $subcategory)
                <div class="col-md-4 col-lg-3 category-card {{ $index >= 6 ? 'd-none extra-card' : '' }}">
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">
                        <a href="{{ url('subcategory/products/' . $subcategory->products_subcategory_id) }}">
                            <img src="{{ asset($subcategory->sub_category_img) }}" 
                                 class="card-img-top" 
                                 alt="{{ $subcategory->name }}">
                        </a>
                        <div class="card-body text-center">
                            <h5 class="card-title mb-3">{{ $subcategory->name }}</h5>
                            {{-- <a href="{{ url('subcategory/products/' . $subcategory->products_subcategory_id) }}" 
                               class="btn btn-primary px-4 py-2 rounded-pill">
                               View Products
                            </a> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @if(count($subcategories) > 6)
        <div class="text-center mt-4">
            <button id="viewMoreBtn" class="btn btn-outline-primary px-4 py-2 rounded-pill">
                View More
            </button>
        </div>
        @endif
    </div>
</section>

<!-- Related Categories Section -->
{{-- <section class="related-categories py-4 bg-white text-center">
    <div class="container">
        <h5 class="fw-semibold mb-3" style="color:#444;">You may also be interested in</h5>
        <p class="text-warning fw-medium mb-0">
            @foreach($categories as $cat)
                <a href="{{ url('category/'.$cat->pid) }}" class="text-decoration-none mx-1" style="color:#c19a6b;">
                    {{ $cat->category_name }}
                </a>
                @if(!$loop->last) | @endif
            @endforeach
        </p>
    </div>
</section> --}}

<!-- FAQ Section -->
@if(!empty($category->faq_question) && !empty($category->faq_answer))
@php
    $questions = json_decode($category->faq_question, true);
    $answers   = json_decode($category->faq_answer, true);
@endphp

<section class="faq-section py-5">
  <div class="container">
    <h2 class="text-center mb-4 fw-bold" style="color: #c19a6b;">Frequently Asked Questions</h2>
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

<!-- Scripts -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const btn = document.getElementById('viewMoreBtn');
    if(btn) {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.extra-card').forEach(card => card.classList.remove('d-none'));
            btn.style.display = 'none';
        });
    }
});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Category & Subcategory CSS -->
<style>
    .banner-wrapper {
    position: relative;
}
.category-grid-container .category-card {
    transition: all 0.3s ease;
}
.category-grid-container .category-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
}
.card-body h6 {
    font-size: 1rem;
    color: #222;
    margin-bottom: 0;
}
/* Typography */
body { font-family: "Poppins", sans-serif; color: #444; }

/* Category Title */
.category-title { font-size: 2.5rem; color: #c19a6b; }
.category-details-section img {
    border-radius: 1rem;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}
.subcategory-card {
    transition: all 0.3s ease;
}
.subcategory-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
}
.card-body h6 {
    font-size: 1rem;
    color: #222;
    margin-bottom: 0;
}
/* Category Description */
.category-description { font-size: 1.05rem; line-height: 1.8; }

/* Banner */
.banner-wrapper img { border-radius: 0; }

/* Subcategory Cards */
.category-card .card { transition: all 0.3s ease; }
.category-card .card:hover { transform: translateY(-5px); box-shadow: 0 10px 25px rgba(0,0,0,0.2); }
.category-card img { height: 220px; object-fit: cover; }
.category-card .card-body { text-align: center; }
.category-card h5 { font-size: 1.1rem; margin-bottom: 15px; }

/* Buttons */
.btn-primary, .btn-outline-primary { background-color: #c19a6b; border-color: #c19a6b; color: #fff; font-weight: 600; transition: all 0.3s ease; }
.btn-outline-primary { background-color: transparent; color: #c19a6b; }
.btn-primary:hover, .btn-outline-primary:hover { background-color: #a87f58; border-color: #a87f58; }

/* FAQ Accordion */
.accordion-button { font-weight: 600; background-color: #fff; }
.accordion-button::after { transform: rotate(0deg); transition: transform 0.3s ease; }
.accordion-button:not(.collapsed)::after { transform: rotate(180deg); }
.accordion-item { border: 1px solid #eee; border-radius: 5px; margin-bottom: 10px; }
</style>

@include('frontend.layouts.footer')

