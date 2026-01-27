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
                <div class="sidebar-section-title">Getting Started</div>
                <a href="#introduction" class="sidebar-item active">Introduction</a>
                <a href="#installation" class="sidebar-item">Installation</a>
                <a href="#configuration" class="sidebar-item">Configuration</a>
            </div>

            <div class="sidebar-section">
                <div class="sidebar-section-title">Core Concepts</div>
                <a href="#routing" class="sidebar-item">Routing</a>
                <a href="#controllers" class="sidebar-item">Controllers</a>
                <a href="#models" class="sidebar-item">Models</a>
                <a href="#views" class="sidebar-item">Views</a>
            </div>

            <div class="sidebar-section">
                <div class="sidebar-section-title">Advanced Topics</div>
                <a href="#authentication" class="sidebar-item">Authentication</a>
                <a href="#middleware" class="sidebar-item">Middleware</a>
                <a href="#database" class="sidebar-item">Database</a>
            </div>

            <div class="sidebar-section">
                <div class="sidebar-section-title">Resources</div>
                <a href="#examples" class="sidebar-item">Examples</a>
                <a href="#api" class="sidebar-item">API Reference</a>
                <a href="#faq" class="sidebar-item">FAQ</a>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="main-content" id="mainContent">
            <div class="content-wrapper">
                <h1 class="doc-title">Welcome to the Documentation</h1>

                <div class="doc-section" id="introduction">
                    <h2>Introduction</h2>
                    <p>Welcome to our comprehensive documentation. This guide will help you understand and use our system effectively.</p>
                    
                    <div class="tip">
                        <strong>💡 Tip:</strong> Use the sidebar menu to navigate through different sections quickly.
                    </div>
                </div>

                <div class="doc-section" id="installation">
                    <h2>Installation</h2>
                    <p>Follow these steps to install the system:</p>
                    
                    <h3>Prerequisites</h3>
                    <p>Before you begin, ensure you have the following installed:</p>
                    <ul>
                        <li>PHP 8.1 or higher</li>
                        <li>Composer</li>
                        <li>MySQL or PostgreSQL</li>
                    </ul>

                    <h3>Installation Steps</h3>
                    <div class="code-block">
                        <code>
composer create-project laravel/laravel my-project<br>
cd my-project<br>
php artisan serve
                        </code>
                    </div>

                    <div class="note">
                        <strong>⚠️ Note:</strong> Make sure to configure your .env file before running migrations.
                    </div>
                </div>

                <div class="doc-section" id="configuration">
                    <h2>Configuration</h2>
                    <p>Configure your application by editing the <code>.env</code> file in the root directory.</p>
                    
                    <div class="code-block">
                        <code>
DB_CONNECTION=mysql<br>
DB_HOST=127.0.0.1<br>
DB_PORT=3306<br>
DB_DATABASE=your_database<br>
DB_USERNAME=your_username<br>
DB_PASSWORD=your_password
                        </code>
                    </div>
                </div>

                <div class="doc-section" id="routing">
                    <h2>Routing</h2>
                    <p>Routes are defined in the <code>routes/web.php</code> file.</p>
                    
                    <h3>Basic Routing</h3>
                    <div class="code-block">
                        <code>
Route::get('/home', function () {<br>
&nbsp;&nbsp;&nbsp;&nbsp;return view('home');<br>
});
                        </code>
                    </div>
                </div>
            </div>
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