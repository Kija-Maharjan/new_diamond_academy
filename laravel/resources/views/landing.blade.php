o !DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Diamond Academy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .landing-container {
            width: 100%;
            height: 100vh;
            background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), 
                        url('{{ asset('storage/nda_bg_image.1.jpg') }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .landing-content {
            text-align: center;
            color: white;
            z-index: 10;
            animation: fadeInUp 0.8s ease-out;
        }

        .landing-content a {
            text-decoration: none;
            color: white;
            cursor: pointer;
        }

        .landing-text {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
            letter-spacing: 2px;
        }

        .landing-subtext {
            font-size: 1.5rem;
            opacity: 0.9;
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.5);
            animation: pulse 2s infinite;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes pulse {
            0%, 100% {
                opacity: 0.8;
            }
            50% {
                opacity: 1;
            }
        }

        @media (max-width: 768px) {
            .landing-text {
                font-size: 2rem;
            }

            .landing-subtext {
                font-size: 1.1rem;
            }
        }
    </style>
</head>
<body>
    <a href="{{ route('home') }}" class="landing-container" onclick="window.location.href='{{ route('home') }}'; return false;">
        <div class="landing-content">
            <div class="landing-text">New Diamond Academy</div>
            <div class="landing-subtext">Click Anywhere to Enter</div>
        </div>
    </a>

    <script>
        // Redirect on any click
        document.addEventListener('click', function(e) {
            if (e.target.closest('a')) return; // Allow link navigation
            window.location.href = '{{ route('home') }}';
        });

        // Redirect on any key press
        document.addEventListener('keydown', function(e) {
            window.location.href = '{{ route('home') }}';
        });

        // Redirect on touch
        document.addEventListener('touchstart', function(e) {
            window.location.href = '{{ route('home') }}';
        });

        // Show visual feedback on hover
        const container = document.querySelector('.landing-container');
        container.addEventListener('mouseenter', function() {
            this.style.opacity = '0.9';
        });
        container.addEventListener('mouseleave', function() {
            this.style.opacity = '1';
        });
    </script>
</body>
</html>
