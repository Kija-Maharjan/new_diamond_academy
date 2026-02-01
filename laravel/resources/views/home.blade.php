@extends('ui')

@section('content')
<!-- Bento Box Container -->
<div class="bento-box-container" style="padding: 2rem 0; max-width: 1300px; margin: 0 auto;">
    <!-- Welcome Section (Large) -->
    <a href="{{ route('about.index') }}" class="bento-box-item bento-large" style="background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%); color: white; text-decoration: none; grid-column: 1 / 3; grid-row: 1 / 3;">
        <div class="bento-content">
            <i class="fas fa-crown" style="font-size: 4rem; margin-bottom: 1rem; display: block;"></i>
            <h1 style="font-size: 2.8rem; margin-bottom: 1rem; font-weight: 800;">Welcome to<br>New Diamond Academy</h1>
            <p style="font-size: 1.1rem; opacity: 0.9;">A premier space where students, teachers, and founders connect, collaborate, and grow together</p>
        </div>
    </a>

    <!-- Student News (Large - Same width as Welcome) -->
    <a href="{{ route('news.index') }}" class="bento-box-item bento-large" style="background: linear-gradient(135deg, rgba(13, 110, 253, 0.1) 0%, rgba(13, 110, 253, 0.05) 100%); border: 2px solid #0d6efd; color: #0d6efd; text-decoration: none; grid-column: 3 / 5; grid-row: 1 / 3;">
        <div class="bento-content">
            <i class="fas fa-book-open" style="font-size: 2.5rem; margin-bottom: 1rem; display: block;"></i>
            <h3 style="font-size: 1.5rem; margin-bottom: 0.5rem; font-weight: 700;">Student News</h3>
            <p style="font-size: 0.95rem;">Latest updates & achievements</p>
        </div>
    </a>

    <!-- Recommendations (Large - Below Student News) -->
    <a href="{{ route('recommendations.create') }}" class="bento-box-item bento-large" style="background: linear-gradient(135deg, rgba(25, 135, 84, 0.1) 0%, rgba(25, 135, 84, 0.05) 100%); border: 2px solid #198754; color: #198754; text-decoration: none; grid-column: 3 / 5; grid-row: 3 / 4;">
        <div class="bento-content">
            <i class="fas fa-star" style="font-size: 2.5rem; margin-bottom: 1rem; display: block;"></i>
            <h3 style="font-size: 1.5rem; margin-bottom: 0.5rem; font-weight: 700;">Recommendations</h3>
            <p style="font-size: 0.95rem;">Share your feedback</p>
        </div>
    </a>

    <!-- Community (Medium) -->
    <a href="{{ route('slider') }}" class="bento-box-item bento-medium" style="background: linear-gradient(135deg, rgba(13, 202, 240, 0.1) 0%, rgba(13, 202, 240, 0.05) 100%); border: 2px solid #0dcaf0; color: #0dcaf0; text-decoration: none; grid-column: 1 / 3; grid-row: 3 / 4;">
        <div class="bento-content">
            <i class="fas fa-people-line" style="font-size: 2.5rem; margin-bottom: 1rem; display: block;"></i>
            <h3 style="font-size: 1.5rem; margin-bottom: 0.5rem; font-weight: 700;">Meet The Team</h3>
            <p style="font-size: 0.95rem;">Connect with mentors</p>
        </div>
    </a>

    <!-- Statistics (Small Cards Row 2) - Only for Admins -->
    @if(auth()->check() && auth()->user()->is_admin)
        <a href="{{ url('/') }}" class="bento-box-item bento-small" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; text-decoration: none;">
            <div class="bento-content">
                <div style="font-size: 2rem; font-weight: 800; margin-bottom: 0.5rem;">{{ \App\Models\User::count() }}</div>
                <p style="font-size: 0.85rem;">Total Members</p>
            </div>
        </a>

        <a href="{{ route('news.index') }}" class="bento-box-item bento-small" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); color: white; text-decoration: none;">
            <div class="bento-content">
                <div style="font-size: 2rem; font-weight: 800; margin-bottom: 0.5rem;">{{ \App\Models\News::count() }}</div>
                <p style="font-size: 0.85rem;">News Articles</p>
            </div>
        </a>

        <a href="{{ route('recommendations.create') }}" class="bento-box-item bento-small" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); color: white; text-decoration: none;">
            <div class="bento-content">
                <div style="font-size: 2rem; font-weight: 800; margin-bottom: 0.5rem;">{{ \App\Models\Recommendation::count() }}</div>
                <p style="font-size: 0.85rem;">Recommendations</p>
            </div>
        </a>

        <a href="{{ route('admin') }}" class="bento-box-item bento-small" style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%); color: white; text-decoration: none;">
            <div class="bento-content">
                <div style="font-size: 2rem; font-weight: 800; margin-bottom: 0.5rem;">{{ \App\Models\User::where('is_admin', true)->count() }}</div>
                <p style="font-size: 0.85rem;">Administrators</p>
            </div>
        </a>
    @endif

    @if(!auth()->check())
    <!-- Login Call to Action (Full Width at Bottom) -->
    <a href="{{ route('login') }}" class="bento-box-item bento-full-width" style="background: linear-gradient(135deg, #198754 0%, #157347 100%); color: white; text-decoration: none; grid-column: 1 / 5; grid-row: 4 / 5; margin-top: 1rem;">
        <div class="bento-content">
            <i class="fas fa-sign-in-alt" style="font-size: 3rem; margin-bottom: 1rem; display: block;"></i>
            <h3 style="font-size: 2rem; margin-bottom: 1rem; font-weight: 800;">Join Us</h3>
            <p style="font-size: 1rem; margin-bottom: 1.5rem;">Sign in to unlock exclusive features</p>
            <button class="btn btn-light btn-sm" style="border-radius: 8px;">Click Here</button>
        </div>
    </a>
    @endif
</div>

<style>
    .bento-box-container {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1.5rem;
        grid-auto-rows: 250px;
    }

    .bento-box-item {
        border-radius: 20px;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        cursor: pointer;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
    }

    .bento-box-item:hover {
        transform: translateY(-12px) scale(1.02);
        box-shadow: 0 16px 40px rgba(0, 0, 0, 0.2);
    }

    .bento-box-item::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: radial-gradient(circle at top right, rgba(255,255,255,0.2), transparent);
        pointer-events: none;
    }

    .bento-content {
        position: relative;
        z-index: 1;
        padding: 2rem;
        width: 100%;
        animation: fadeInUp 0.6s ease-out;
    }

    .bento-large {
        grid-column: 1 / 3;
        grid-row: 1 / 3;
        grid-auto-rows: 250px;
    }

    .bento-medium {
        grid-column: span 1;
    }

    .bento-small {
        grid-row: span 1;
    }

    .bento-tall {
        grid-row: 2 / 4;
    }

    .bento-full-width {
        grid-column: 1 / -1;
        height: 180px;
        margin: 1rem 0;
        padding: 1.5rem;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @media (max-width: 1024px) {
        .bento-box-container {
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            grid-auto-rows: 200px;
        }

        .bento-large {
            grid-column: 1 / 3;
            grid-row: 1 / 2;
        }

        .bento-tall {
            grid-column: 1 / 3;
            grid-row: auto;
        }

        .bento-full-width {
            grid-column: 1 / -1;
            height: 160px;
            margin: 1rem 0;
        }
    }

    @media (max-width: 768px) {
        .bento-box-container {
            grid-template-columns: 1fr;
            gap: 1rem;
            grid-auto-rows: 180px;
        }

        .bento-large,
        .bento-tall,
        .bento-medium,
        .bento-full-width {
            grid-column: 1 !important;
            grid-row: auto !important;
        }

        .bento-content {
            padding: 1.5rem;
        }

        .bento-box-item:hover {
            transform: translateY(-8px) scale(1.01);
        }

        .bento-full-width {
            height: auto;
            min-height: 140px;
        }
    }
</style>

@endsection
