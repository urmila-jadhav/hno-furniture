@extends('admin.layouts.header')

@section('title', 'Product Subcategories')

@section('content')
<div class="container mt-4">

    {{-- Page Header --}}
   <div class="d-flex justify-content-between align-items-center mb-3">

    <h2 class="m-0">Product Subcategories</h2>

    <div class="d-flex align-items-center gap-2">

        <input type="text" id="subcategorySearch" 
               class="form-control"
               placeholder="Search Subcategories..."
               style="min-width: 220px;">

        <a href="{{ route('subcategories.create') }}" 
           class="btn btn-primary" 
           style="width:180px;">
            Add Subcategory
        </a>

    </div>

</div>


    {{-- Success Message --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Subcategories Table --}}
    <div class="table-responsive">
        <table class="table table-bordered align-middle text-center">
            <thead class="table-light">
                <tr>
                    <th>Sr No</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($subcategories as $sub)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $sub->name }}</td>
                        <td>
                            @if ($sub->sub_category_img)
                                <img src="{{ asset($sub->sub_category_img) }}" width="80" height="80" style="object-fit:cover; border-radius:8px;">
                            @else
                                <span class="text-muted">No Image</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('subcategories.productsubcategory.edit', $sub->products_subcategory_id) }}" class="btn btn-warning btn-sm">
                                <i class="far fa-edit"></i> Edit
                            </a>
                            <a href="{{ route('subcategories.delete', $sub->products_subcategory_id) }}" class="btn btn-danger btn-sm"
                               onclick="return confirm('Are you sure you want to delete this subcategory?');">
                                <i class="far fa-trash-alt"></i> Delete
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted">No subcategories found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
