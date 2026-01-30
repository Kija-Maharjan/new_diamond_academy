<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'New Diamond Academy' }}</title>

    <!-- Bootstrap CSS (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-..." crossorigin="anonymous">

    <!-- Optional custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <style>
        body { padding-top: 56px; }
        .sidebar-offcanvas { width: 250px; }
        .news-card img { max-height: 300px; object-fit: cover; }
        /* Ensure offcanvas and its backdrop are visually behind the navbar */
        .navbar { z-index: 1200 !important; }
        .offcanvas, .offcanvas-backdrop { z-index: 1000 !important; }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="/" id="brandTitle" title="Right-click to toggle menu">New Diamond Academy</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('slider') }}">Slider</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('news.index') }}">News</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('recommendations.create') }}">Recommend</a></li>
                </ul>

                <ul class="navbar-nav ms-auto">
                    @guest
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
                                @if(auth()->user()->is_admin)
                                    <li><a class="dropdown-item" href="{{ route('admin') }}">Admin Panel</a></li>
                                @endif
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button class="dropdown-item" type="submit">Logout</button>
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
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasSidebarLabel">Menu</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Start Page</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('slider') }}">Teacher / Founder Slider</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('news.index') }}">Student News</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('recommendations.create') }}">Send Recommendation</a></li>
                @auth
                    @if(auth()->user()->is_admin)
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin') }}">Admin Panel</a></li>
                    @endif
                @endauth
            </ul>
        </div>
    </div>

    <main class="container mt-4">
        <!-- Flash messages -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
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