
@include('frontend.layouts.header')
@section('content')
<!-- ✅ Static Banner (Slider Removed) -->
@php
    $banners = json_decode($product->banner); // decode JSON array
    $firstBanner = isset($banners[0]) ? $banners[0] : 'assets/img/default-banner.jpg';
@endphp

<div class="banner-wrapper">
    <img src="{{ asset($firstBanner) }}" 
         class="d-block w-100 banner-slide" 
         style="height:85vh; object-fit:cover;">
</div>

<!-- ✅ Kitchen Intro Section -->
<section class="py-5" style="background-color:#fff;">
    <div class="container">
        <h1 class="text-uppercase fw-bold mb-4" style="color: #c19a6b; font-size:2rem;">
            {{ $product->product_name }}
        </h1>
        
        <p class="text-secondary mb-4" style="font-size:1.05rem; line-height:1.8;">
            {!! $product->description !!}
        </p>
    </div>
</section>

<!-- ✅ Grid Layout -->
<div class="kitchen-grid-container bg-light">

    @foreach($subcategories as $index => $subcategory)
        <div class="kitchen-card {{ $index >= 6 ? 'extra-card' : '' }}" 
             style="{{ $index >= 6 ? 'display:none;' : '' }}">

            <!-- Subcategory Image -->
            <img src="{{ asset($subcategory->sub_category_img) }}" 
                 alt="{{ $subcategory->name }}" />

            <div class="kitchen-card-content">
                <!-- Subcategory Name -->
                <h3>{{ $subcategory->name }}</h3>

                <!-- Link to Subcategory Products -->
                <a href="{{ url('subcategory/products/' . $subcategory->products_subcategory_id) }}" 
                   class="kitchen-btn">
                    View Products
                </a>
            </div>
        </div>
    @endforeach
</div>

@if(count($subcategories) > 6)
<div class="text-center mt-4">
    <button id="viewMoreBtn" class="btn btn-primary px-4 py-2 rounded-pill">
        View More
    </button>
</div>
@endif

<script>
document.addEventListener('DOMContentLoaded', function() {
    const btn = document.getElementById('viewMoreBtn');
    if(btn) {
        btn.addEventListener('click', function() {
            const extraCards = document.querySelectorAll('.extra-card');
            extraCards.forEach(card => {
                card.style.display = 'block'; // Show the hidden cards
            });
            btn.style.display = 'none'; // Hide the button
        });
    }
});
</script>




<style>
/* ✅ Kitchen Card Layout */
.kitchen-grid-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 25px;
    padding: 60px 10%;
}
/* ✅ Fix image size and maintain proportion */
.kitchen-card img {
    width: 100%;
    height: 220px; /* Fixed height for all images */
    object-fit: cover; /* Ensures image doesn’t stretch */
    border-bottom: 3px solid #f1e7da; /* Optional: adds a nice divider */
}
/* ✅ Card container */
.kitchen-card {
    background: #fff;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}
.kitchen-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
}
.kitchen-card-content {
    padding: 20px;
    text-align: center;
}
.kitchen-card-content h3 {
    font-size: 1.1rem;
    color: #222;
    margin-bottom: 10px;
    min-height: 60px;
}
.kitchen-btn {
    display: inline-block;
    background: #c19a6b;
    color: #fff;
    padding: 10px 20px;
    border-radius: 4px;
    font-weight: 600;
    transition: background 0.3s ease;
}
.kitchen-btn:hover {
    background: #c19a6b;
}
</style>


<!-- ✅ Informational Sections -->
{{-- <section class="kitchen-info-section py-5">
    <div class="container">
        <h2>Understanding Kitchen Decor</h2>
        <p>
            Kitchen decor is an extension of your personality. It combines function, comfort, and aesthetic appeal
            to make cooking a joyful experience. From materials to lighting and layout, every detail defines the kitchen’s mood.
        </p>
        <h2>Modular Kitchen Interior Design Concept</h2>
        <p>
            Modular kitchens use pre-designed cabinet modules for flexibility and functionality. Choose U-shaped, L-shaped,
            parallel, or island layouts for a perfect blend of efficiency and style.
        </p>
        <h2>Open Kitchen Setup</h2>
        <p>
            The open kitchen setup fosters interaction and modern aesthetics, connecting your kitchen to your living area seamlessly.
        </p>
        <h2>Traditional vs Modern Kitchen Styles</h2>
        <p>
            Traditional kitchens use rich textures and warm materials, while modern kitchens emphasize minimalism and clean finishes.
            Blending both brings timeless elegance and function.
        </p>
        <h2>Essential Elements of Kitchen Units Design</h2>
        <ol>
            <li><strong>Kitchen Cabinet Design:</strong> Offers storage, style, and structure.</li>
            <li><strong>Kitchen Sink Design:</strong> Functionally vital; choose from single, double, or under-mount sinks.</li>
            <li><strong>Kitchen Tile Design:</strong> Tiles influence brightness and hygiene; glossy tiles expand visual space.</li>
        </ol>
        <h2>Popular Modern Kitchen Design Styles</h2>
        <p>
            From island kitchens to straight-line layouts, explore space-smart designs that balance aesthetic and practicality.
        </p>
    </div>
</section> --}}

<!-- ✅ FAQ Section with Animated Arrows -->
<!-- ===============================
     RELATED LINKS SECTION
=============================== -->
<section class="py-4 bg-light text-center">
    <div class="container">
        <h5 class="fw-semibold mb-3" style="color:#444;">
            You may also be interested in
        </h5>
        <p class="text-warning fw-medium mb-0" style="font-size:1rem;">
            @foreach($categories as $category)
                <a href="{{ url('category/'.$category->pid) }}" 
                   class="text-decoration-none mx-1" 
                   style="color:#c19a6b;">
                   {{ $category->category_name }}
                </a>
                @if(!$loop->last)
                    |
                @endif
            @endforeach
        </p>
    </div>
</section>


@if(!empty($product->f_que) && !empty($product->f_ans))

@php
    $questions = json_decode($product->f_que, true);
    $answers   = json_decode($product->f_ans, true);
@endphp

<section class="faq-section py-5">
  <div class="container">

    <h2 class="text-center mb-4 fw-bold" style="color: #c19a6b;">
        Frequently Asked Questions
    </h2>

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


<!-- ✅ CSS -->
<style>
  .accordion-button::after {
    /* content: '\25BC'; single arrow ↓ */
    font-size: 1rem;
    transform: rotate(0deg);
    transition: transform 0.3s ease;
  }
  .accordion-button:not(.collapsed)::after {
    transform: rotate(180deg); /* arrow ↑ when open */
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
<!-- ✅ JavaScript -->
<script>
  function toggleFaq() {
    const extraFaqs = document.querySelectorAll('.extra-faq');
    const showMoreBtn = document.getElementById('showMoreBtn');
    let isHidden = [...extraFaqs].some(faq => faq.classList.contains('d-none'));
    if (isHidden) {
      extraFaqs.forEach(faq => faq.classList.remove('d-none'));
      showMoreBtn.innerHTML = 'Show Less ↑';
    } else {
      extraFaqs.forEach(faq => faq.classList.add('d-none'));
      showMoreBtn.innerHTML = 'Show More ↓';
    }
  }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- ✅ STYLING -->
<style>
/* GENERAL TYPOGRAPHY */
body {
    font-family: "Poppins", sans-serif;
    color: #444;
}
/* BANNER */
.banner-arrow {
    background: rgba(0, 0, 0, 0.5);
    border-radius: 50%;
    padding: 8px 12px;
    color: #fff;
}
/* HEADING */
.kitchen-title {
    font-size: 2.3rem;
    color: #c19a6b;
    margin-bottom: 25px;
}
/* GRID CARDS */
.kitchen-grid-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 25px;
    padding: 60px 10%;
}
.kitchen-card {
    background: #fff;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
}
.kitchen-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
}
.kitchen-card-content {
    padding: 20px;
    text-align: center;
}
.kitchen-btn {
    display: inline-block;
    background: #c19a6b;
    color: #fff;
    padding: 10px 20px;
    border-radius: 4px;
    font-weight: 600;
    transition: all 0.3s ease;
}
.kitchen-btn:hover {
    background: #c19a6b;
}
/* INFO SECTION */
.kitchen-info-section h2 {
    font-size: 1.5rem;
    font-weight: 600;
    color: #c19a6b;
    margin-top: 40px;
    margin-bottom: 10px;
    /* border-bottom: 2px solid #f1e7da; */
    padding-bottom: 5px;
}
/* .kitchen-info-section p, .kitchen-info-section li {
    line-height: 1.8;
} */
@include('frontend.layouts.footer')

