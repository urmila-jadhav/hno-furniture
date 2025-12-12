@extends('admin.layouts.header')
@section('title', 'Add Product')

@section('content')
    <div class="container mt-4">

        <h2 class="mb-4">Add New Product</h2>

       <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <!-- Category -->
            <div class="mb-3">
                <label class="form-label">Select Category</label>
                <select id="category" name="category_id" class="form-control" onchange="filterSubcategories()" required>
                    <option value="">-- Select Category --</option>
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->pid }}">{{ $cat->category_name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Subcategory (Filtered) -->
            <div class="mb-3">
                <label class="form-label">Select Subcategory</label>
                <select id="subcategory" name="sub_category_id" class="form-control" required>
                    <option value="">-- Select Subcategory --</option>

                    @foreach ($subcategories as $sub)
                        <option value="{{ $sub->products_subcategory_id }}" class="subcat-option"
                            data-pid="{{ $sub->pid }}" style="display:none;">
                            {{ $sub->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <!-- Product Name -->
            <div class="mb-3">
                <label class="form-label">Product Name</label>
                <input type="text" name="product_name" class="form-control" placeholder="Enter Product Name">
            </div>

            <!-- Price -->
            <div class="mb-3">
                <label class="form-label">Select Price Range</label>
                <select name="price_id" class="form-control" required>
                    @foreach ($prices as $p)
                        <option value="{{ $p->range_id }}">
                            ₹{{ $p->from_price }} - ₹{{ $p->to_price }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Product Images --}}
            <div class="mb-3">
                <label class="form-label">Upload Product Images (Multiple)</label>
                <input type="file" name="multiple_img[]" multiple class="form-control">
            </div>

            {{-- Banner Images --}}
            <div class="mb-3">
                <label class="form-label">Product Banners (Multiple)</label>
                <input type="file" name="banner[]" multiple class="form-control">
            </div>

            {{-- Specification --}}
            <div class="mb-3">
                <label class="form-label fw-bold">Description</label>
                <textarea name="specification" id="summernote" class="form-control"></textarea>
            </div>

            {{-- FAQ --}}
            <div class="mb-2 fw-bold">FAQ (Questions & Answers)</div>

            <div id="faqArea">
                <div class="faq-item mb-2">
                    <input type="text" name="f_que[]" class="form-control mb-2" placeholder="FAQ Question">
                    <input type="text" name="f_ans[]" class="form-control" placeholder="FAQ Answer">
                </div>
            </div>

            <button type="button" class="btn mb-3" id="addFaqBtn"
                style="background:#0069d9;color:white;border:none;padding:6px 14px;">
                + Add FAQ
            </button>

            {{-- Description --}}
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" id="descEditor" class="form-control"></textarea>
            </div>

            {{-- Options --}}
            <div class="row mb-3">
                <div class="col">
                    <label><input type="checkbox" name="toprated" value="1"> Top Rated</label>
                </div>
                <div class="col">
                    <label><input type="checkbox" name="premium" value="1"> Premium</label>
                </div>
            </div>

            {{-- Slug --}}
            <div class="mb-3">
                <label class="form-label">Slug</label>
                <input type="text" name="slug" class="form-control">
            </div>

            {{-- Meta --}}
            <div class="mb-3">
                <label class="form-label">Meta Title</label>
                <input type="text" name="meta_title" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Meta Key</label>
                <input type="text" name="meta_key" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Meta Description</label>
                <textarea name="meta_description" class="form-control"></textarea>
            </div>

            {{-- Status --}}
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                </select>
            </div>

         {{-- Submit --}}
            <button type="submit" class="btn btn-success">Save Product</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

    <script>
        function filterSubcategories() {
            let selectedCategory = document.getElementById("category").value;

            document.querySelectorAll(".subcat-option").forEach(opt => {
                if (opt.dataset.pid == selectedCategory) {
                    opt.style.display = "block";
                } else {
                    opt.style.display = "none";
                }
            });
            document.getElementById("subcategory").value = "";
        }
        // ADD FAQ
        document.getElementById('addFaqBtn').addEventListener('click', function() {
            let faqHtml = `
        <div class="faq-item mb-2 d-flex gap-2">
            <input type="text" name="f_que[]" class="form-control" placeholder="FAQ Question">
            <input type="text" name="f_ans[]" class="form-control" placeholder="FAQ Answer">
            <button type="button" class="btn btn-danger btn-sm removeFaq">X</button>
        </div>
    `;
            document.getElementById('faqArea').insertAdjacentHTML('beforeend', faqHtml);
        });

        // REMOVE FAQ
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('removeFaq')) {
                e.target.parentElement.remove();
            }
        });
    </script>
@endsection
