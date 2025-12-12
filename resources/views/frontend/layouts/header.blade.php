<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'HNO - Furniture')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link href="{{ asset('assets/img/favicon.ico') }}" rel="icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <!-- Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Libraries -->
    <link href="{{ asset('assets/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <!-- Bootstrap + Custom CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <style>
        /* SIMPLE HEADER */
        .navbar {
            padding: 10px 20px;
            font-family: 'Poppins', sans-serif;
        }
        .navbar-nav .nav-link {
            color: #000 !important;
            font-weight: 500;
            text-transform: uppercase;
            font-size: 14px;
            margin: 0 10px;
            padding: 10px 18px !important;
            transition: 0.3s ease;
        }
        .navbar-nav .nav-link.active {
            border-bottom: 2px solid #000;
        }
        .dropdown-menu {
            border-radius: 8px;
            padding: 8px 0;
        }
        .dropdown-item {
            text-transform: uppercase;
            font-size: 14px;
            padding: 10px 20px;
        }
        .dropdown-item:hover {
            background-color: rgba(0,0,0,0.05);
        }
        .navbar-brand img {
            height: 65px;
        }
    </style>
</head>
<body>
<!-- ✅ SIMPLE NAVBAR WITH NORMAL DROPDOWN -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container-fluid">
        <!-- LOGO -->
        <a href="{{ url('/') }}" class="navbar-brand">
            <img src="{{ asset('assets/img/HNO furniture_black.png') }}" alt="HNO Logo">
        </a>
        <!-- MOBILE TOGGLE -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- NAV LINKS -->
        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link {{ Request::is('/') ? 'active' : '' }}">Home</a>
                </li>
                <li class="nav-item">
                        <a href="{{ url('/about') }}" class="nav-link {{ Request::is('about') ? 'active' : '' }}"> About Us</a>
                </li>

       {{-- <a class="nav-link" href="{{ route('ai.2d.form') }}">AI 2D Interior</a> --}}


                <!-- <li class="nav-item">
                        <a href="{{ url('/projects') }}" class="nav-link {{ Request::is('project') ? 'active' : '' }}"> our projects</a>
                </li> -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ Request::is('projects*') ? 'active' : '' }}" 
                    href="#" 
                    id="projectsDropdown" 
                    role="button" 
                    data-bs-toggle="dropdown" 
                    aria-expanded="false">
                        Our Projects
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="projectsDropdown">
                        <li><a class="dropdown-item" href="{{ url('/projects') }}">All</a></li>
                        <li><a class="dropdown-item" href="{{ url('/kitchen') }}">Kitchens</a></li>
                        <li><a class="dropdown-item" href="{{ url('/projects/wardrobe') }}">Wardrobe</a></li>
                        <li><a class="dropdown-item" href="{{ url('/projects/full-home-modular') }}">Full Home Modular</a></li>
                    </ul>
                </li>

                <!--✅ NORMAL DROPDOWN 1 -->
                <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ Request::is('about*') ? 'active' : '' }}"
                       href="/about" id="aboutDropdown" role="button" data-bs-toggle="dropdown">
                        About Us
                    </a> -->
                    
                    <!-- <ul class="dropdown-menu" aria-labelledby="aboutDropdown">
                        <li><a class="dropdown-item" href="{{ url('/about') }}">Our Company</a></li>
                        <li><a class="dropdown-item" href="{{ url('/testimonials') }}">Customer Speaks</a></li>
                        <li><a class="dropdown-item" href="{{ url('/blog') }}">Blogs</a></li>
                        <li><a class="dropdown-item" href="{{ url('/franchise') }}">Franchise Enquiry</a></li>
                        <li><a class="dropdown-item" href="{{ url('/career') }}">Career</a></li>
                    </ul>
                </li> -->
                <!-- ✅ NORMAL DROPDOWN 2 -->
                 <li class="nav-item">
                    <a href="{{ url('/services') }}" class="nav-link {{ Request::is('services') ? 'active' : '' }}">Our Services</a>
                </li>
          
                <li class="nav-item">
                    <a href="{{ url('/contact') }}" class="nav-link {{ Request::is('contact') ? 'active' : '' }}">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/blog') }}" class="nav-link {{ Request::is('blog') ? 'active' : '' }}">Blog</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- ✅ MAIN CONTENT -->
<main>
    @yield('content')
</main>
<!-- ✅ SCRIPTS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
@stack('scripts')
</body>
</html>