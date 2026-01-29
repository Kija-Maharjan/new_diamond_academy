<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Documentation' }}</title>
    <link rel="stylesheet" href="/css/ui.css">
</head>
<body>
    <!-- Header -->
    <div class="header">
        <div class="header-title">{{ $headerTitle ?? 'My Documentation' }}</div>
        <button class="toggle-btn" onclick="toggleSidebar()">☰ Toggle Menu</button>
    </div>

    <!-- Main Container -->
    <div class="container">
        <!-- Sidebar -->
        <nav class="sidebar" id="sidebar">
            <div class="sidebar-section">
                <div class="sidebar-section-title">Main</div>
                <a href="/" class="sidebar-item">Start Page</a>
                @auth
                    @if(auth()->user()->is_admin)
                        <a href="{{ route('admin') }}" class="sidebar-item">Admin Panel</a>
                    @endif
                @endauth
                <a href="{{ route('slider') }}" class="sidebar-item">Teacher / Founder Slider</a>
                <a href="{{ route('news.index') }}" class="sidebar-item">Student News</a>
                <a href="{{ route('recommendations.create') }}" class="sidebar-item">Send Recommendation</a>
            </div>

            <div class="sidebar-section">
                <div class="sidebar-section-title">Account</div>
                @guest
                    <a href="{{ route('login') }}" class="sidebar-item">Log in</a>
                @else
                    <div class="sidebar-item">Signed in as {{ auth()->user()->name }}</div>
                    <form method="POST" action="{{ route('logout') }}" style="margin:0; padding:0">
                        @csrf
                        <button type="submit" class="sidebar-item" style="background:none; border:none; padding:0; text-align:left;">Logout</button>
                    </form>
                @endguest
            </div>
        </nav>

        <!-- Main Content -->
        <main class="main-content" id="mainContent">
            @yield('content')
        </main>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');
            
            sidebar.classList.toggle('hidden');
            sidebar.classList.toggle('visible');
            mainContent.classList.toggle('expanded');
        }

        // Active link highlighting
        document.querySelectorAll('.sidebar-item').forEach(item => {
            item.addEventListener('click', function(e) {
                document.querySelectorAll('.sidebar-item').forEach(i => i.classList.remove('active'));
                this.classList.add('active');
            });
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>
</html>