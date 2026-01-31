<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('storage/ndalogo.png') }}">
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
            --secondary-color: #6c757d;
            --success-color: #198754;
            --danger-color: #dc3545;
            --dark-color: #212529;
            --light-color: #f8f9fa;
        }

        * {
            transition: all 0.3s ease;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
        }

        /* Navbar Animations */
        .navbar {
            z-index: 1200 !important;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            animation: slideDown 0.5s ease-out;
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
            box-shadow: 0 2px 12px rgba(0,0,0,0.08);
            border-radius: 12px;
            overflow: hidden;
            animation: cardSlide 0.6s ease-out;
            transition: all 0.3s ease;
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
            transform: translateY(-8px);
            box-shadow: 0 8px 24px rgba(0,0,0,0.15);
        }

        .card-img-top {
            object-fit: cover;
            height: 250px;
        }

        /* Button Animations */
        .btn {
            border: 0;
            border-radius: 8px;
            font-weight: 600;
            padding: 0.6rem 1.4rem;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
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
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        }

        .btn-primary {
            background: linear-gradient(135deg, #0d6efd 0%, #0b5ed7 100%);
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #0b5ed7 0%, #0a58ca 100%);
        }

        /* Link Hover Effects */
        a {
            text-decoration: none;
            position: relative;
        }

        a.nav-link {
            position: relative;
            overflow: hidden;
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
            background: white;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 2px 16px rgba(0,0,0,0.08);
            margin-bottom: 2rem;
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

        /* Theme toggle button styling */
        .theme-toggle {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            z-index: 999;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: linear-gradient(135deg, #0d6efd 0%, #0b5ed7 100%);
            border: 0;
            color: white;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
            transition: all 0.3s ease;
            font-size: 1.2rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .theme-toggle:hover {
            transform: scale(1.1) rotate(180deg);
            box-shadow: 0 6px 16px rgba(0,0,0,0.3);
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
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <i class="fas fa-graduation-cap me-2"></i>New Diamond Academy
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar" title="Toggle Menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">
                            <i class="fas fa-home me-1"></i>Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('slider') }}">
                            <i class="fas fa-images me-1"></i>Slider
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('news.index') }}">
                            <i class="fas fa-newspaper me-1"></i>News
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('recommendations.create') }}">
                            <i class="fas fa-star me-1"></i>Recommend
                        </a>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                <i class="fas fa-sign-in-alt me-1"></i>Login
                            </a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <!-- Offcanvas Sidebar -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasSidebar" aria-labelledby="offcanvasSidebarLabel">
        <div class="offcanvas-header bg-primary text-white">
            <h5 class="offcanvas-title" id="offcanvasSidebarLabel">
                <i class="fas fa-bars me-2"></i>Menu
            </h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="nav flex-column gap-2">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">
                        <i class="fas fa-home me-2"></i>Start Page
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('slider') }}">
                        <i class="fas fa-images me-2"></i>Teacher / Founder Slider
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('news.index') }}">
                        <i class="fas fa-newspaper me-2"></i>Student News
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('recommendations.create') }}">
                        <i class="fas fa-star me-2"></i>Send Recommendation
                    </a>
                </li>
                @auth
                    @if(auth()->user()->is_admin)
                        <li class="nav-item">
                            <hr class="my-2">
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin') }}">
                                <i class="fas fa-lock me-2"></i>Admin Panel
                            </a>
                        </li>
                    @endif
                @endauth
            </ul>
        </div>
    </div>

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

    <!-- Theme Toggle Button -->
    <button class="theme-toggle" id="themeToggle" title="Toggle Dark Mode">
        <i class="fas fa-moon"></i>
    </button>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS for animations and interactivity -->
    <script>
        // Theme toggle functionality
        const themeToggle = document.getElementById('themeToggle');
        const html = document.documentElement;
        
        // Check for saved theme preference or default to 'light'
        const currentTheme = localStorage.getItem('theme') || 'light';
        if (currentTheme === 'dark') {
            html.style.colorScheme = 'dark';
            themeToggle.innerHTML = '<i class="fas fa-sun"></i>';
        }
        
        themeToggle.addEventListener('click', function() {
            const newTheme = html.style.colorScheme === 'dark' ? 'light' : 'dark';
            html.style.colorScheme = newTheme;
            localStorage.setItem('theme', newTheme);
            themeToggle.innerHTML = newTheme === 'dark' ? '<i class="fas fa-sun"></i>' : '<i class="fas fa-moon"></i>';
        });

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
    </script>
</body>
</html>
                </ul>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Bootstrap JS (CDN) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-..." crossorigin="anonymous"></script>

    <script>
        // Right-click the brand to toggle the offcanvas menu (keeps it visually behind the navbar)
        document.addEventListener('DOMContentLoaded', function() {
            var brand = document.getElementById('brandTitle');
            if (!brand) return;

            brand.addEventListener('contextmenu', function(e) {
                e.preventDefault(); // suppress browser context menu on brand
                var offcanvasEl = document.getElementById('offcanvasSidebar');
                if (!offcanvasEl) return;
                var instance = bootstrap.Offcanvas.getOrCreateInstance(offcanvasEl);
                if (offcanvasEl.classList.contains('show')) {
                    instance.hide();
                } else {
                    instance.show();
                }
            });
        });
    </script>
</body>
</html>