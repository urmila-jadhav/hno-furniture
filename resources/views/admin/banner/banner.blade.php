@extends('admin.layouts.header')
@section('title', 'User Management')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="dashboard-body">

    <!-- Breadcrumb -->
    <div class="breadcrumb-with-buttons mb-24 flex-between flex-wrap gap-8">
        <div class="breadcrumb mb-24">
            <ul class="flex-align gap-4">
                <li>
                    <a href="{{ url('admin/dashboard') }}" class="text-gray-200 fw-normal text-15 hover-text-main-600">
                        Dashboard
                    </a>
                </li>
                <li><span class="text-gray-500 fw-normal d-flex"><i class="ph ph-caret-right"></i></span></li>
                <li><span class="text-main-600 fw-normal text-15">Banners</span></li>
            </ul>
        </div>
    </div>

    <!-- Main Section -->
    <div class="row gy-4">

        <!-- ADD BANNER FORM -->
        <div class="col-xxl-8 col-md-4 col-sm-5">
            <div class="card">
                <div class="card-body">

                    <form action="{{ route('banners.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Banner Title -->
                        <div class="mb-3 position-relative">
                            <input type="text" id="bannerTitle" maxlength="100" name="title"
                                   class="text-counter placeholder-13 form-control py-11 pe-76"
                                   placeholder="Banner Title" required>
                        </div>
                        <!-- Image Upload -->
                        <div class="mb-3">
                            <label class="fw-bold">Upload Image</label>
                            <input type="file" name="image" class="form-control" accept="image/*" required>
                        </div>


                        <!-- Submit Button -->
                        <div class="flex-align mt-10">
                            <button type="submit" class="btn btn-main rounded-pill py-9">
                                <i class="fas fa-upload"></i> Upload Banner
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="row gy-4"></div>
        <!-- EXISTING BANNERS TABLE -->
        <div class="col-xxl-8 col-md-8 col-sm-7">
            <div class="mb-20">
                <label class="h5 fw-semibold font-heading mb-0">Existing Banners</label>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th width="180">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($banners as $banner)
                        <tr>

                            <!-- Image -->
                            <td>
                                <img src="{{ asset('storage/' . $banner->image) }}"
                                     width="100" height="60" style="object-fit:cover;">
                            </td>

                            <!-- Title -->
                            <td>{{ $banner->title }}</td>

                            <!-- Actions -->
                            <td>
                                <!-- Edit -->
                                <a href="{{ route('banners.edit', $banner->id) }}"
                                   class="btn btn-warning btn-sm">
                                    <i class="far fa-edit"></i>
                                </a>

                                <!-- Delete -->
                                <form action="{{ route('banners.destroy', $banner->id) }}"
                                      method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure?')">
                                        Delete
                                    </button>
                                </form>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>

    </div>

</div>
@endsection
