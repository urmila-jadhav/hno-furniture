@extends('admin.layouts.header')

@section('title', 'Edit Category')

@section('head')
    <!-- Summernote CSS -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
@endsection

@section('content')
@php
$faq_questions = json_decode($category->faq_question ?? '[]', true);
$faq_answers = json_decode($category->faq_answer ?? '[]', true);
@endphp

<div class="container py-4">
    <h2>Edit Category</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.categories.update', $category->pid) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Category Name --}}
        <div class="mb-3">
            <label class="form-label">Category Name</label>
            <input type="text" name="category_name" class="form-control" value="{{ $category->category_name }}" required>
        </div>

        {{-- Description --}}
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" id="summernote" class="form-control" rows="5" required>{{ $category->description }}</textarea>
        </div>

        {{-- Category Image --}}
        <div class="mb-3">
            <label class="form-label">Category Image</label>
            <input type="file" name="category_image" class="form-control" accept="image/*">
            @if($category->category_image)
                <div class="mt-2">
                    <img src="{{ asset($category->category_image) }}" width="120" height="80" style="object-fit: cover; border:1px solid #ccc;">
                </div>
            @endif
        </div>

        {{-- Banner Image --}}
        <div class="mb-3">
            <label class="form-label">Banner Image</label>
            <input type="file" name="banner_image" class="form-control" accept="image/*">
            @if($category->banner_image)
                <div class="mt-2">
                    <img src="{{ asset($category->banner_image) }}" width="200" height="100" style="object-fit: cover; border:1px solid #ccc;">
                </div>
            @endif
        </div>

        {{-- FAQ Section --}}
        <label class="form-label fw-bold">FAQs</label>
        <div id="faqArea">
            @if(!empty($faq_questions))
                @foreach($faq_questions as $key => $q)
                    <div class="row mb-2 faq-box">
                        <div class="col-md-5">
                            <input type="text" name="faq_question[]" class="form-control" value="{{ $q }}" placeholder="FAQ Question">
                        </div>
                        <div class="col-md-5">
                            <input type="text" name="faq_answer[]" class="form-control" value="{{ $faq_answers[$key] ?? '' }}" placeholder="FAQ Answer">
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-danger removeFaq">X</button>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="row mb-2 faq-box">
                    <div class="col-md-5">
                        <input type="text" name="faq_question[]" class="form-control" placeholder="FAQ Question">
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="faq_answer[]" class="form-control" placeholder="FAQ Answer">
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-danger removeFaq">X</button>
                    </div>
                </div>
            @endif
        </div>

        <button type="button" id="addFaq" class="btn btn-info mb-3">+ Add FAQ</button>

        <br>
        <button type="submit" class="btn btn-success">Update Category</button>
        <a href="{{ route('products.categories.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection {{-- end content --}}

@section('scripts')
    <!-- Ensure jQuery is loaded first -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>

    <script>
        $(function() {
            // Initialize Summernote
            $('#summernote').summernote({
                placeholder: 'Enter category description',
                tabsize: 2,
                height: 150,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });

            // Add FAQ row
            $('#addFaq').on('click', function() {
                $('#faqArea').append(`
                    <div class="row mb-2 faq-box">
                        <div class="col-md-5">
                            <input type="text" name="faq_question[]" class="form-control" placeholder="FAQ Question">
                        </div>
                        <div class="col-md-5">
                            <input type="text" name="faq_answer[]" class="form-control" placeholder="FAQ Answer">
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-danger removeFaq">X</button>
                        </div>
                    </div>
                `);
            });

            // Remove FAQ row
            $(document).on('click', '.removeFaq', function() {
                $(this).closest('.faq-box').remove();
            });
        });
    </script>
@endsection
