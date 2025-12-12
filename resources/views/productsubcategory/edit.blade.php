
@extends('admin.layouts.header')
@section('content')
<div class="container">
    <h2>Edit Subcategory</h2>

    <form action="{{ route('subcategories.productsubcategory.update', $subcategory->products_subcategory_id) }}" 
          method="POST" enctype="multipart/form-data">  
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Category</label>
            <select name="pid" class="form-control" required>
                <option value="">-- Select Category --</option>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->pid }}" 
                        {{ $subcategory->pid == $cat->pid ? 'selected' : '' }}>
                        {{ $cat->category_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ $subcategory->name }}" required>
        </div>

        <div class="mb-3">
            <label>Subcategory Image</label><br>
            @if($subcategory->sub_category_img)
                <img src="{{ asset($subcategory->sub_category_img) }}" width="80" height="80" class="mb-2"><br>
            @endif
            <input type="file" name="sub_category_img" class="form-control">
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('subcategories.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
