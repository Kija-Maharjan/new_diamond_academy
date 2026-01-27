<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Documentation' }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            color: #333;
        }

        /* Header */
        .header {
            background-color: #2c3e50;
            color: white;
            padding: 1rem 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .header-title {
            font-size: 1.5rem;
            font-weight: 600;
        }

        /* Toggle Button */
        .toggle-btn {
            background-color: #34495e;
            border: none;
            color: white;
            padding: 0.75rem 1rem;
            cursor: pointer;
            border-radius: 4px;
            font-size: 1rem;
            transition: background-color 0.3s;
        }

        .toggle-btn:hover {
            background-color: #415a77;
        }

        /* Main Container */
        .container {
            display: flex;
            min-height: calc(100vh - 70px);
        }

        /* Sidebar */
        .sidebar {
            width: 280px;
            background-color: #34495e;
            color: white;
            padding: 2rem 0;
            transition: transform 0.3s ease;
            position: fixed;
            height: calc(100vh - 70px);
            overflow-y: auto;
        }

        .sidebar.hidden {
            transform: translateX(-280px);
        }

        .sidebar-section {
            margin-bottom: 2rem;
        }

        .sidebar-section-title {
            padding: 0.5rem 1.5rem;
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #bdc3c7;
            font-weight: 600;
        }

        .sidebar-item {
            padding: 0.75rem 1.5rem;
            color: #ecf0f1;
            text-decoration: none;
            display: block;
            transition: background-color 0.2s, padding-left 0.2s;
        }

        .sidebar-item:hover {
            background-color: #2c3e50;
            padding-left: 2rem;
        }

        .sidebar-item.active {
            background-color: #3498db;
            border-left: 4px solid #2980b9;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            padding: 2rem;
            margin-left: 280px;
            transition: margin-left 0.3s ease;
        }

        .main-content.expanded {
            margin-left: 0;
        }

        .content-wrapper {
            max-width: 900px;
            background-color: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        /* Documentation Content Styles */
        .doc-title {
            font-size: 2rem;
            color: #2c3e50;
            margin-bottom: 1rem;
            border-bottom: 3px solid #3498db;
            padding-bottom: 0.5rem;
        }

        .doc-section {
            margin-bottom: 2rem;
        }

        .doc-section h2 {
            color: #34495e;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .doc-section h3 {
            color: #546e7a;
            font-size: 1.25rem;
            margin-bottom: 0.75rem;
            margin-top: 1.5rem;
        }

        .doc-section p {
            line-height: 1.6;
            margin-bottom: 1rem;
            color: #555;
        }

        .code-block {
            background-color: #f8f9fa;
            border-left: 4px solid #3498db;
            padding: 1rem;
            margin: 1rem 0;
            border-radius: 4px;
            overflow-x: auto;
        }

        .code-block code {
            font-family: 'Courier New', monospace;
            color: #e74c3c;
        }

        .note {
            background-color: #fff3cd;
            border-left: 4px solid #ffc107;
            padding: 1rem;
            margin: 1rem 0;
            border-radius: 4px;
        }

        .tip {
            background-color: #d1ecf1;
            border-left: 4px solid #17a2b8;
            padding: 1rem;
            margin: 1rem 0;
            border-radius: 4px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-280px);
            }

            .sidebar.visible {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .content-wrapper {
                padding: 1rem;
            }
        }

        /* Scrollbar */
        .sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: #2c3e50;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: #555;
            border-radius: 3px;
        }
    </style>
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
                @yield('content')
                
                <!-- Default Content (remove @yield above if using this) -->
                {{-- 
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
                --}}
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