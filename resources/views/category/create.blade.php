@extends('admin.layouts.header')

@section('title', 'Add Category')

@section('content')
<div class="container mt-4">
    <h2>Add Category</h2>
    <a href="{{ route('category.index') }}" class="btn btn-secondary mb-3">Back</a>

    <form action="{{ route('products.category.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Category Name -->
        <div class="mb-3">
            <label class="form-label">Category Name *</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Category Image -->
        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" name="category_image" class="form-control">
            @error('category_image') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Category Description -->
        <div class="mb-3">
            <label class="form-label">Description *</label>
            <textarea name="category_description" class="form-control" rows="4" required>{{ old('category_description') }}</textarea>
            @error('category_description') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button class="btn btn-success">Save Category</button>
    </form>
</div>
@endsection
