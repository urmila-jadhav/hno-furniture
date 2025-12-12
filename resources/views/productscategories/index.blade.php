@extends('admin.layouts.header')

@section('title', 'Manage Product Categories')

@section('head')
    <!-- Summernote CSS -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="dashboard-body">
    <div class="breadcrumb-with-buttons mb-24 flex-between flex-wrap gap-8">
        <div class="breadcrumb mb-24">
            <ul class="flex-align gap-4">
                <li>
                    <a href="{{ url('admin/dashboard') }}" class="text-gray-200 fw-normal text-15 hover-text-main-600">Dashboard</a>
                </li>
                <li>
                    <span class="text-gray-500 fw-normal d-flex"><i class="ph ph-caret-right"></i></span>
                </li>
                <li>
                    <span class="text-main-600 fw-normal text-15">Product Categories</span>
                </li>
            </ul>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
<div class="d-flex justify-content-between align-items-center mb-3">

    <h2 class="m-0">Category List</h2>

  <div class="d-flex align-items-center gap-4">
    <input type="text" id="categorySearch" class="form-control" 
           placeholder="Search Categories..." 
           style="min-width: 200px;">

    <a href="{{ route('products.categories.create') }}" 
       class="btn btn-primary" 
       id="showAddBtn">
       Add Category
    </a>
</div>


</div>


{{-- Existing Categories Section --}}
<div id="existingCategorySection">
    
    <div class="table-responsive">
        <table class="table table-bordered align-middle mt-5" id="categoriesTable">
            <thead class="table-light">
                <tr>
                    <th>Sr No</th>
                    <th>Name</th>
                    <th>Category Image</th>
                    <th>Banner</th>
                    <th width="120">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                <tr>
                   <td>{{ $loop->iteration }}</td>

                    <td>{{ $category->category_name }}</td>
                    <td>
                        @if($category->category_image)
                            <img src="{{ asset($category->category_image) }}" width="60" height="60" style="object-fit:cover; border-radius:8px;">
                        @else
                            <span class="text-muted">No image</span>
                        @endif
                    </td>
                    <td>
                        @if($category->banner_image)
                            <img src="{{ asset($category->banner_image) }}" width="80" height="40" style="object-fit:cover; border-radius:4px;">
                        @else
                            <span class="text-muted">No banner</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('products.categories.edit', $category->pid) }}" class="btn btn-warning btn-sm"><i class="far fa-edit"></i></a>
                        <form action="{{ route('products.categories.destroy', $category->pid) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete this category & FAQs?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">No categories found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

   

        {{-- Add Category Section --}}
        <div id="addCategorySection" style="display:none;">
            <h2 class="text-2xl font-bold mb-4">Add Product Category</h2>
       

            {{-- Existing Add Category Form --}}
            <form action="{{ route('products.categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <input type="text" name="category_name" placeholder="Enter Category Name"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <div class="mb-4">
                    <label class="fw-bold">Category Image</label>
                    <input type="file" name="category_image" class="form-control" accept="image/*" required>
                </div>

                <div class="mb-4">
                    <label class="fw-bold">Banner Image</label>
                    <input type="file" name="banner_image" id="bannerImage" class="form-control" accept="image/*">
                    <div class="mt-2">
                        <img id="bannerPreview" src="" class="w-32 h-32 object-cover rounded-lg hidden">
                    </div>
                </div>

                <div class="mb-4">
                    <label class="fw-bold">Description</label>
                    <textarea name="description" id="summernote" class="form-control" rows="4"></textarea>
                </div>

                <div class="mb-4">
                    <label class="fw-bold">FAQs (Questions & Answers)</label>
                    <div id="faqArea">
                        <div class="faq-item mb-2 d-flex gap-2">
                            <input type="text" name="faq_question[]" class="form-control" placeholder="FAQ Question">
                            <input type="text" name="faq_answer[]" class="form-control" placeholder="FAQ Answer">
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary mt-2" id="addFaqBtn">+ Add FAQ</button>
                </div>

                <button type="submit" class="btn btn-success mt-4">Add Category</button>
            </form>
        </div>

      

    </div>
</div>
@endsection

@section('scripts')
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
            ['style', ['bold','italic','underline','clear']],
            ['font', ['strikethrough','superscript','subscript']],
            ['para', ['ul','ol','paragraph']],
            ['insert', ['link','picture','video']],
            ['view', ['fullscreen','codeview','help']]
        ]
    });

    // Banner Preview
    $('#bannerImage').change(function(event){
        const reader = new FileReader();
        reader.onload = function(e) {
            $('#bannerPreview').attr('src', e.target.result).removeClass('hidden');
        }
        reader.readAsDataURL(event.target.files[0]);
    });

    // Add FAQ
    $('#addFaqBtn').click(function(){
        let faqHtml = `<div class="faq-item mb-2 d-flex gap-2">
            <input type="text" name="faq_question[]" class="form-control" placeholder="FAQ Question">
            <input type="text" name="faq_answer[]" class="form-control" placeholder="FAQ Answer">
            <button type="button" class="btn btn-danger btn-sm removeFaq">X</button>
        </div>`;
        $('#faqArea').append(faqHtml);
    });

    $(document).on('click', '.removeFaq', function(){
        $(this).parent().remove();
    });

    // ==================== Toggle Sections ====================
    $('#addCategorySection').hide(); // hide add form by default
    $('#existingCategorySection').show(); // show table by default

    $('#showAddBtn').on('click', function() {
        $('#existingCategorySection').hide();
        $('#addCategorySection').show();
        $(this).removeClass('btn-outline-primary').addClass('btn-primary');
        $('#showExistingBtn').removeClass('btn-primary').addClass('btn-outline-primary');
    });

    $('#showExistingBtn').on('click', function() {
        $('#addCategorySection').hide();
        $('#existingCategorySection').show();
        $(this).removeClass('btn-outline-primary').addClass('btn-primary');
        $('#showAddBtn').removeClass('btn-primary').addClass('btn-outline-primary');
    });
});
</script>
@endsection
