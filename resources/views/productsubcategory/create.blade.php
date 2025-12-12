@extends('admin.layouts.header')
@section('content')

<div class="container mt-7 d-flex justify-content-center">
    <div class="card shadow-sm" style="width: 50%; border-radius:10px; min-height: 200px;">

        <div class="card-header bg-white mt-6">
            <h4 class="mb-0 fw-bold">Add Subcategory</h4>
        </div>

        <div class="card-body mt-">

            <form action="{{ route('subcategories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-semibold">Select Category</label>
                    <select name="pid" class="form-select" required>
                        <option value="">-- Choose Category --</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->pid }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                    @error('pid') 
                        <small class="text-danger">{{ $message }}</small> 
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="fw-semibold">Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-4">
                    <label class="fw-semibold">Subcategory Image</label>
                    <input type="file" name="sub_category_img" class="form-control">
                </div>

                <div class="d-flex justify-content-between">
                    <button class="btn btn-success px-4">Save</button>
                    <a href="{{ route('subcategories.index') }}" class="btn btn-secondary px-4">Back</a>
                </div>

            </form>

        </div>
    </div>
</div>

@endsection
