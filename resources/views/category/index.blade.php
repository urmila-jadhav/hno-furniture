@extends('admin.layouts.header')

@section('title', 'Categories')

@section('content')
    <div class="container mt-4">

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <h2 class="mb-4 d-flex justify-content-between">
            Categories
            <a href="{{ route('products.category.create') }}" class="btn btn-primary">Add Category</a>
        </h2>

        <table class="table table-bordered">
            <thead class="bg-dark text-white">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th width="170px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($maincategory as $key => $cat)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $cat->category_name }}</td>
                        <td>
                            @if ($cat->category_image)
                                <img src="{{ asset('storage/' . $cat->category_image) }}" width="60">
                            @else
                                <span class="text-muted">No Image</span>
                            @endif
                        </td>
                        <td>{{ Str::limit($cat->category_description, 50) }}</td>

                        <td>
                            <a href="{{ route('products.category.edit', $cat->category_id) }}"
                                class="btn btn-sm btn-warning">Edit</a>

                            <form action="{{ route('products.category.delete', $cat->category_id) }}" method="POST"
                                class="d-inline" onsubmit="return confirm('Are you sure?')">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
