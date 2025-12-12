@extends('admin.layouts.header')
@section('title', 'Manage Products')

@section('content')
<div class="container mt-4">
     <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light p-2 px-3 rounded">
             <li>
                    <a href="{{ url('admin/dashboard') }}" class="text-gray-200 fw-normal text-15 hover-text-main-600">Dashboard</a>
                </li>
            <li>
                    <span class="text-gray-500 fw-normal d-flex"><i class="ph ph-caret-right"></i></span>
                </li>
            <li>
                    <span class="text-main-600 fw-normal text-15">Manage Product</span>
                </li>
        </ol>
    </nav>
    {{-- ====== TITLE + BUTTON + SEARCH BAR ====== --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="m-0">Products List</h2>

        <div class="d-flex gap-2">
            {{-- Search Bar --}}
             <div>
        <input type="text" id="categorySearch" class="form-control" placeholder="Search Categories..." style="min-width: 200px;">
    </div>
            {{-- Add Product Button --}}
            <a href="{{ route('products.create') }}" class="btn btn-primary">
                + Add Product
            </a>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered align-middle text-center mt-8">
        <thead class="table-grey">
            <tr>
                <th>Sr No</th>
                <th>Category</th>
                <th>Name</th>
                <th>Top Rated</th>
                <th>Premium</th>
                <th>Feature</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr id="product-{{ $product->id }}">
                   <td>{{ $loop->iteration }}</td>
                    <td>{{ $product->category_name ?? 'N/A' }}</td>
                    <td>{{ $product->product_name }}</td>

                    <td>{{ $product->toprated ? 'Yes' : 'No' }}</td>
                    <td>{{ $product->premium ? 'Yes' : 'No' }}</td>

                    {{-- FEATURE --}}
                    <td>
                        <label class="me-2">
                            <input type="radio" 
                                   class="form-check-input feature-radio"
                                   data-id="{{ $product->id }}"
                                   name="feature_{{ $product->id }}"
                                   value="Yes"
                                   {{ $product->feature == 'Yes' ? 'checked' : '' }}>
                            Yes
                        </label>

                        <label>
                            <input type="radio" 
                                   class="form-check-input feature-radio"
                                   data-id="{{ $product->id }}"
                                   name="feature_{{ $product->id }}"
                                   value="No"
                                   {{ $product->feature == 'No' ? 'checked' : '' }}>
                            No
                        </label>
                    </td>

                    {{-- STATUS --}}
                    <td>
                        <label class="me-2">
                            <input type="radio"
                                   class="form-check-input status-radio"
                                   data-id="{{ $product->id }}"
                                   name="status_{{ $product->id }}"
                                   value="Active"
                                   {{ $product->status == 'Active' ? 'checked' : '' }}>
                            Active
                        </label>

                        <label>
                            <input type="radio"
                                   class="form-check-input status-radio"
                                   data-id="{{ $product->id }}"
                                   name="status_{{ $product->id }}"
                                   value="Inactive"
                                   {{ $product->status == 'Inactive' ? 'checked' : '' }}>
                            Inactive
                        </label>
                    </td>

                    <td>
                        <a href="{{ route('products.edit', $product->id) }}"
                           class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('products.destroy', $product->id) }}" 
                              method="POST"
                              style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Delete this product?');">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8">No products found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- AJAX --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.feature-radio').forEach(function(el) {
        el.addEventListener('change', function () {
            const productId = this.dataset.id;
            const featureValue = this.value;

            fetch("{{ route('products.updateFeature') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ id: productId, feature: featureValue })
            })
            .then(resp => resp.json())
            .then(json => console.log('Feature updated'))
            .catch(err => alert('Error updating feature'));
        });
    });
});
</script>
@endsection
