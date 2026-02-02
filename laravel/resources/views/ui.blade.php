<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <title>{{ $title ?? 'New Diamond Academy' }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom CSS with Animations -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ui.css') }}">

    <style>
        :root {
            --primary-color: #0d6efd;
            --accent-color: #198754;
            --neutral-color: #6c757d;
        }

        * {
            transition: all 0.3s ease;
        }

        /* Global white text by default. Pages that need dark text should add body.keep-dark class. */
        body:not(.keep-dark), body:not(.keep-dark) * {
            color: #ffffff !important;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: url('{{ asset("resources/views/nda_image/nda_bg_image.1.jpg") }}') center/cover fixed;
            min-height: 100vh;
        }

        /* Navbar Animations */
        .navbar {
            z-index: 1200 !important;
            box-shadow: 0 2px 20px rgba(0,0,0,0.1);
            animation: slideDown 0.5s ease-out;
            background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%) !important;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            letter-spacing: 0.5px;
            animation: fadeIn 0.8s ease-out;
        }

        /* Toggle Button Animation */
        .navbar-toggler {
            border: 2px solid rgba(255,255,255,0.5);
            transition: all 0.3s ease;
        }

        .navbar-toggler:hover {
            border-color: white;
            transform: scale(1.1);
        }

        .navbar-toggler:not(.collapsed) .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='white' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M5 14l6-6m0 0L5 2'/%3e%3c/svg%3e");
        }

        /* Offcanvas Sidebar */
        .offcanvas {
            animation: slideInLeft 0.3s ease-out;
        }

        @keyframes slideInLeft {
            from {
                transform: translateX(-100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        /* Alert Animations */
        .alert {
            animation: slideUp 0.5s ease-out;
            border: 0;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.98) !important;
            color: #212529 !important;
            border-left: 4px solid #0d6efd;
        }

        .alert-success {
            border-left-color: #198754 !important;
        }

        .alert-danger {
            border-left-color: #0d6efd !important;
        }

        .alert-info {
            border-left-color: #6c757d !important;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Main Content */
        .container {
            animation: fadeIn 0.6s ease-out;
        }
        
        main.container {
            background: transparent;
            padding: 0 1rem;
            border-radius: 0;
            margin-left: auto;
            margin-right: auto;
            max-width: 1200px;
        }

        .row {
            margin-bottom: 3rem;
        }

        .col-12, .col-md-4, .col-lg-6 {
            margin-bottom: 2rem;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        /* Card Animations */
        .card {
            border: 0;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            border-radius: 16px;
            background: rgba(255, 255, 255, 0.98) !important;
            overflow: hidden;
            animation: cardSlide 0.6s ease-out;
            transition: all 0.4s ease;
        }

        @keyframes cardSlide {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card:hover {
            transform: translateY(-12px);
            box-shadow: 0 12px 40px rgba(0,0,0,0.2);
        }

        .card-img-top {
            object-fit: cover;
            height: 250px;
        }

        /* Button Animations */
        .btn {
            border: 0;
            border-radius: 10px;
            font-weight: 600;
            padding: 0.7rem 1.6rem;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            font-size: 0.85rem;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255,255,255,0.3);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .btn:hover::before {
            width: 300px;
            height: 300px;
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.15);
        }

        .btn-primary {
            color: white;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 700;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #0b5ed7 0%, #0a58ca 100%);
            color: white;
        }

        .btn-success {
            background: linear-gradient(135deg, #198754 0%, #157347 100%);
            color: white;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 700;
        }

        .btn-success:hover {
            background: linear-gradient(135deg, #157347 0%, #146c43 100%);
            color: white;
        }

        .btn-outline-primary {
            color: #0d6efd;
            border: 2px solid #0d6efd;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 700;
        }

        .btn-outline-primary:hover {
            background: #0d6efd;
            color: white;
            border-color: #0d6efd
            background: linear-gradient(135deg, #0b5ed7 0%, #0a58ca 100%);
        }

        /* Form controls */
        .form-control, .form-select {
            border: 2px solid #dee2e6 !important;
            border-radius: 8px !important;
            padding: 0.75rem 1rem !important;
            color: #212529 !important;
            background: rgba(255, 255, 255, 0.99) !important;
        }

        .form-control:focus, .form-select:focus {
            border-color: #0d6efd !important;
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25) !important;
            color: #212529;
        }

        .form-label {
            color: #212529 !important;
            font-weight: 600 !important;
            margin-bottom: 0.5rem;
        }

        .text-muted {
            color: #6c757d !importantnone;
            position: relative;
            color: #0d6efd;
        }

        a:hover {
            color: #0b5ed7;
        }

        a.nav-link {
            position: relative;
            overflow: hidden;
            color: white !important;
        }

        a.nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: -100%;
            width: 100%;
            height: 2px;
            background: white;
            transition: left 0.3s ease;
        }

        a.nav-link:hover::after {
            left: 0;
        }

        /* Body padding */
        body {
            padding-top: 70px;
        }

        /* Content wrapper */
        .content-wrapper {
            background: rgba(255, 255, 255, 0.99);
            border-radius: 16px;
            padding: 2.5rem;
            box-shadow: 0 10px 40px rgba(0,0,0,0.12);
            margin-bottom: 2rem;
            border-left: 6px solid #0d6efd;
            transition: all 0.3s ease;
        }

        .content-wrapper:hover {
            box-shadow: 0 15px 50px rgba(0,0,0,0.15);
        }

        .content-wrapper h1, .content-wrapper h2, .content-wrapper h3 {
            color: #212529 !important;
        }

        .content-wrapper p {
            color: #495057 !important;
        }

        /* Smooth scroll behavior */
        html {
            scroll-behavior: smooth;
        }

        /* Scrollbar styling */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #0d6efd;
            border-radius: 5px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #0b5ed7;
        }

        /* Loading animation */
        .spinner-border {
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Responsive */
        @media (max-width: 768px) {
            body {
                padding-top: 60px;
            }

            .content-wrapper {
                padding: 1rem;
            }

            .card-img-top {
                height: 200px;
            }
        }

        /* Dark mode support */
        @media (prefers-color-scheme: dark) {
            body {
                background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
                color: #e0e0e0;
            }

            .content-wrapper {
                background: #0f3460;
                color: #e0e0e0;
            }

            .card {
                background: #16213e;
                color: #e0e0e0;
            }

            .navbar {
                background: #0f3460 !important;
            }

            .offcanvas {
                background: #16213e;
                color: #e0e0e0;
            }

            .btn-close {
                filter: invert(1);
            }
        }

        /* Text color improvements */
        h1, h2, h3, h4, h5, h6 {
            color: #212529 !important;
            font-weight: 700 !important;
        }

        .card-title, .card-text {
            color: #212529 !important;
            font-weight: 600 !important;
        }

        .card-text {
            font-size: 1rem !important;
            line-height: 1.6 !important;
            color: #495057 !important;
        }

        .feature-icon {
            color: #0d6efd !important;
            font-size: 3rem !important;
        }

        p {
            color: #495057 !important;
        }

        /* Feature Cards */
        .feature-card {
            background: rgba(255, 255, 255, 0.99) !important;
            color: #212529 !important;
            border: 0 !important;
            text-align: center;
            padding: 2rem 1.5rem !important;
        }

        .feature-card .card-title {
            color: #212529 !important;
        }

        .feature-card .card-text {
            color: #6c757d !important;
        }

        .feature-card .feature-icon {
            color: #0d6efd !important;
        }

        .feature-card .btn {
            margin-top: 1rem;
        }
    </style>
    </head>
    <body class="{{ (request()->routeIs('login') || request()->routeIs('register') || request()->routeIs('recommendations.*')) ? 'keep-dark' : '' }}">
    <!-- Navbar Collapse Content -->
    <div class="collapse" id="navbarToggleExternalContent" data-bs-theme="dark">
        <div class="p-4" style="background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);">
            <h5 class="text-white h4"><i class="fas fa-bars me-2"></i>Navigation</h5>
            <ul class="nav flex-column gap-2">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ url('/') }}">
                        <i class="fas fa-home me-2"></i>Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('slider') }}">
                        <i class="fas fa-images me-2"></i>Slider
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('news.index') }}">
                        <i class="fas fa-newspaper me-2"></i>News
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('recommendations.create') }}">
                        <i class="fas fa-star me-2"></i>Recommend
                    </a>
                </li>
                @guest
                    <li class="nav-item">
                        <hr class="my-2 border-light">
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('login') }}">
                            <i class="fas fa-sign-in-alt me-2"></i>Login
                        </a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
    

    <!-- Navbar -->
    <nav class="navbar navbar-dark bg-primary fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <i class="fas fa-graduation-cap me-2"></i>New Diamond Academy
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            @auth
                <div class="ms-auto d-none d-lg-block">
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="userMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-circle me-1"></i>{{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
                            @if(auth()->user()->is_admin)
                                <li>
                                    <a class="dropdown-item" href="{{ route('admin') }}">
                                        <i class="fas fa-lock me-2"></i>Admin Panel
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                            @endif
                            <li>
                                <form method="POST" action="{{ route('logout') }}" class="m-0">
                                    @csrf
                                    <button class="dropdown-item" type="submit">
                                        <i class="fas fa-sign-out-alt me-2"></i>Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            @endauth
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container mt-4 pb-5">
        <!-- Flash messages with animations -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        
        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-triangle me-2"></i>
                <strong>Validation Errors:</strong>
                <ul class="mb-0 mt-2">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    
    <!-- Custom JS for animations and interactivity -->
    <script>
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });

        // Add animation class to elements on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -100px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animation = 'cardSlide 0.6s ease-out forwards';
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        document.querySelectorAll('.card').forEach(card => {
            observer.observe(card);
        });

        console.log('✓ JavaScript loaded');
    </script>

    