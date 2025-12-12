@extends('admin.layouts.header')

@section('title', 'Add Product Category')

@section('head')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="container mt-4" style="max-width: 1100px;">
    
    <h2 class="mb-3 fw-bold">Add Product Category</h2>

    <a href="{{ route('products.categories.index') }}" class="btn btn-secondary mb-3">← Back to Categories</a>

    {{-- Alerts --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card shadow-sm" style="border-radius: 12px;">
        <div class="card-body">

            <form action="{{ route('products.categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Row 1: Category Name + Images --}}
                <div class="row g-4">
                    
                    <div class="col-md-4">
                        <label class="fw-bold">Category Name</label>
                        <input type="text" name="category_name" class="form-control" placeholder="Enter Category Name" required>
                    </div>

                    <div class="col-md-4">
                        <label class="fw-bold">Category Image</label>
                        <input type="file" name="category_image" class="form-control" accept="image/*" id="categoryImage" required>
                        <small class="text-muted d-block">Max: 2MB (JPG, PNG, GIF)</small>
                        <img id="categoryPreview" class="img-fluid rounded mt-2" style="max-height:80px; display:none;">
                    </div>

                    <div class="col-md-4">
                        <label class="fw-bold">Banner Image</label>
                        <input type="file" name="banner_image" class="form-control" accept="image/*" id="bannerImage">
                        <small class="text-muted d-block">Recommended: 1920×500</small>
                        <img id="bannerPreview" class="img-fluid rounded mt-2" style="max-height:80px; display:none;">
                    </div>

                </div>

                {{-- Description --}}
                <div class="mt-4">
                    <label class="fw-bold">Description</label>
                    <textarea name="description" id="summernote" class="form-control"></textarea>
                </div>

                {{-- FAQ SECTION --}}
                <div class="mt-4">
                    <label class="fw-bold">FAQs (Questions & Answers)</label>

                    <div id="faqArea">
                        <div class="faq-item d-flex gap-2 mt-2">
                            <input type="text" name="faq_question[]" class="form-control" placeholder="FAQ Question">
                            <input type="text" name="faq_answer[]" class="form-control" placeholder="FAQ Answer">
                        </div>
                    </div>

                    <button type="button" class="btn btn-primary mt-3" id="addFaqBtn">+ Add FAQ</button>
                </div>

                <button type="submit" class="btn btn-success mt-4 px-5">Save Category</button>

            </form>

        </div>
    </div>

</div>
@endsection

{{-- ✅ WORKING SCRIPTS - Always loaded --}}
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>

<script>
$(document).ready(function () {

    console.log("Loaded Successfully ✔");

    // Summernote
    $('#summernote').summernote({
        height: 150
    });

    // Preview: Category Image
    $('#categoryImage').change(function(){
        let file = this.files[0];
        if(file){
            $('#categoryPreview').attr('src', URL.createObjectURL(file)).show();
        }
    });

    // Preview: Banner Image
    $('#bannerImage').change(function(){
        let file = this.files[0];
        if(file){
            $('#bannerPreview').attr('src', URL.createObjectURL(file)).show();
        }
    });

    // ADD FAQ
    $('#addFaqBtn').click(function () {
        let newFaq = `
            <div class="faq-item d-flex gap-2 mt-2">
                <input type="text" name="faq_question[]" class="form-control" placeholder="FAQ Question">
                <input type="text" name="faq_answer[]" class="form-control" placeholder="FAQ Answer">
                <button type="button" class="btn btn-danger btn-sm removeFaq">X</button>
            </div>`;

        $('#faqArea').append(newFaq);
    });

    // REMOVE FAQ
    $(document).on('click', '.removeFaq', function () {
        $(this).closest('.faq-item').remove();
    });

});
</script>
