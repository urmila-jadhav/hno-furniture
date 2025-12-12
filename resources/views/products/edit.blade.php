@extends('admin.layouts.header')
@section('title', 'Edit Product')

@section('content')
<div class="container mt-4">
    <h2>Edit Product</h2>

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Category -->
        <div class="mb-3">
            <label>Category</label>
            <select name="category_id" id="category_id" class="form-control" required>
                <option value="">-- Select Category --</option>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->pid }}"
                        {{ $product->category_id == $cat->pid ? 'selected' : '' }}>
                        {{ $cat->category_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Subcategory -->
        <div class="mb-3">
            <label>Subcategory</label>
            <select name="sub_category_id" id="sub_category_id" class="form-control">
                <option value="">-- Select Subcategory --</option>
                @foreach ($subcategories as $sub)
                    <option value="{{ $sub->products_subcategory_id }}"
                        data-category="{{ $sub->pid }}"
                        {{ $product->sub_category_id == $sub->products_subcategory_id ? 'selected' : '' }}>
                        {{ $sub->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Product Name -->
        <div class="mb-3">
            <label>Product Name *</label>
            <input type="text" name="product_name" class="form-control"
                   value="{{ $product->product_name }}" required>
        </div>

        <!-- Price Range -->
        <div class="mb-3">
            <label>Price Range</label>
            <select name="price_id" class="form-control">
                <option value="">-- Select Price Range --</option>
                @foreach ($prices as $price)
                    <option value="{{ $price->range_id }}"
                        {{ $product->price_id == $price->range_id ? 'selected' : '' }}>
                        {{ $price->from_price }} - {{ $price->to_price }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Multiple Images -->
        <div class="mb-3">
            <label>Upload Additional Images</label>
            <input type="file" name="multiple_img[]" multiple class="form-control">

            <div class="mt-2">
                @foreach (json_decode($product->multiple_img ?? '[]') as $img)
                    <img src="{{ asset($img) }}" width="70" class="me-2 mb-2 rounded">
                @endforeach
            </div>
        </div>

        <!-- Banner Images -->
        <div class="mb-3">
            <label>Product Banners</label>
            <input type="file" name="banner[]" multiple class="form-control">
        </div>

        @if($product->banner)
            <div class="mt-2">
                @foreach(json_decode($product->banner, true) as $ban)
                    <img src="{{ asset($ban) }}" width="100" class="me-1 mb-2">
                @endforeach
            </div>
        @endif

        <!-- Specification -->
        <div class="mb-3">
            <label>Specification</label>
            <textarea name="specification" id="summernote1" class="form-control">
                {{ $product->specification }}
            </textarea>
        </div>

        <!-- FAQ -->
        <div class="mb-2 fw-bold">FAQ (Questions & Answers)</div>
        <div id="faqArea">
            @php
                $f_que = json_decode($product->f_que, true) ?? [];
                $f_ans = json_decode($product->f_ans, true) ?? [];
            @endphp

            @foreach($f_que as $i => $q)
                <div class="faq-item mb-2 d-flex gap-2">
                    <input type="text" name="f_que[]" class="form-control" value="{{ $q }}">
                    <input type="text" name="f_ans[]" class="form-control" value="{{ $f_ans[$i] ?? '' }}">
                    <button type="button" class="btn btn-danger btn-sm removeFaq">X</button>
                </div>
            @endforeach
        </div>

        <button type="button" class="btn btn-outline-primary mb-3" id="addFaqBtn">+ Add FAQ</button>

        <!-- Description -->
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" id="summernote2" class="form-control">
                {{ $product->description }}
            </textarea>
        </div>

        <!-- Checkboxes -->
        <div class="row mb-3">
            <div class="col">
                <label>Top Rated</label>
                <input type="checkbox" name="toprated" value="1" {{ $product->toprated ? 'checked' : '' }}>
            </div>

            <div class="col">
                <label>Premium</label>
                <input type="checkbox" name="premium" value="1" {{ $product->premium ? 'checked' : '' }}>
            </div>
        </div>

        <!-- SEO -->
        <div class="mb-3">
            <label>Slug</label>
            <input type="text" name="slug" class="form-control" value="{{ $product->slug }}">
        </div>

        <div class="mb-3">
            <label>Meta Title</label>
            <input type="text" name="meta_title" class="form-control" value="{{ $product->meta_title }}">
        </div>

        <div class="mb-3">
            <label>Meta Key</label>
            <input type="text" name="meta_key" class="form-control" value="{{ $product->meta_key }}">
        </div>

        <div class="mb-3">
            <label>Meta Description</label>
            <textarea name="meta_description" class="form-control">{{ $product->meta_description }}</textarea>
        </div>

        <!-- Status -->
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="Active" {{ $product->status == 'Active' ? 'selected' : '' }}>Active</option>
                <option value="Inactive" {{ $product->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update Product</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

{{-- Dynamic FAQ & Subcategory --}}
<script>
document.getElementById("addFaqBtn").addEventListener("click", function () {
    let div = document.createElement("div");
    div.classList.add("faq-item", "mb-2", "d-flex", "gap-2");
    div.innerHTML = `
        <input type="text" name="f_que[]" class="form-control" placeholder="Question">
        <input type="text" name="f_ans[]" class="form-control" placeholder="Answer">
        <button type="button" class="btn btn-danger btn-sm removeFaq">X</button>
    `;
    document.getElementById("faqArea").appendChild(div);
});

document.addEventListener("click", function (e) {
    if (e.target.classList.contains("removeFaq")) {
        e.target.parentElement.remove();
    }
});


// Filter Subcategories when category changes (NO ROUTE)
document.getElementById('category_id').addEventListener('change', function () {
    let catId = this.value;
    let subSelect = document.getElementById('sub_category_id');

    [...subSelect.options].forEach(opt => {
        if (opt.value === "") return;
        opt.style.display = (opt.dataset.category == catId) ? "block" : "none";
    });

    subSelect.value = "";
});

// Auto-run filter for pre-selected category
document.getElementById('category_id').dispatchEvent(new Event('change'));
</script>

@endsection
