@extends('ui')

@section('content')
<div class="row mb-5">
    <!-- Hero Section -->
    <div class="col-12">
        <div class="card border-0 bg-gradient" style="background: linear-gradient(135deg, #0d6efd 0%, #0b5ed7 100%); color: white; padding: 4rem 2rem;">
            <div class="card-body text-center">
                <h1 class="display-4 fw-bold mb-3" style="animation: slideDown 0.6s ease-out;">
                    <i class="fas fa-graduation-cap me-3"></i>Welcome to New Diamond Academy
                </h1>
                <p class="lead mb-4" style="animation: slideUp 0.8s ease-out;">
                    A space for students, teachers, and founders to connect, share, and grow together
                </p>
                <div class="d-flex gap-3 justify-content-center flex-wrap" style="animation: fadeIn 1s ease-out;">
                    <a class="btn btn-light btn-lg fw-bold" href="{{ route('news.index') }}" role="button">
                        <i class="fas fa-newspaper me-2"></i>View Student News
                    </a>
                    <a class="btn btn-outline-light btn-lg fw-bold" href="{{ route('slider') }}" role="button">
                        <i class="fas fa-images me-2"></i>Meet Our Community
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Features Section -->
<div class="row mb-5">
    <div class="col-md-4 mb-3">
        <div class="card h-100 feature-card">
            <div class="card-body text-center">
                <div class="feature-icon mb-3" style="font-size: 3rem; color: #0d6efd;">
                    <i class="fas fa-book-open"></i>
                </div>
                <h5 class="card-title fw-bold">Student News</h5>
                <p class="card-text text-muted">
                    Stay updated with the latest news, achievements, and announcements from our student community.
                </p>
                <a href="{{ route('news.index') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-arrow-right me-1"></i>Explore
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="card h-100 feature-card">
            <div class="card-body text-center">
                <div class="feature-icon mb-3" style="font-size: 3rem; color: #198754;">
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="card-title fw-bold">Recommendations</h5>
                <p class="card-text text-muted">
                    Share recommendations and feedback to help improve our academy and support fellow members.
                </p>
                <a href="{{ route('recommendations.create') }}" class="btn btn-success btn-sm">
                    <i class="fas fa-arrow-right me-1"></i>Share
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="card h-100 feature-card">
            <div class="card-body text-center">
                <div class="feature-icon mb-3" style="font-size: 3rem; color: #0dcaf0;">
                    <i class="fas fa-people-line"></i>
                </div>
                <h5 class="card-title fw-bold">Meet The Team</h5>
                <p class="card-text text-muted">
                    Connect with teachers, founders, and mentors who are shaping the future of education.
                </p>
                <a href="{{ route('slider') }}" class="btn btn-info btn-sm">
                    <i class="fas fa-arrow-right me-1"></i>Connect
                </a>
            </div>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="row mb-5">
    <div class="col-12">
        <div class="card border-0" style="background: linear-gradient(135deg, #198754 0%, #157347 100%); color: white;">
            <div class="card-body text-center py-5">
                <h3 class="fw-bold mb-3">
                    <i class="fas fa-handshake me-2"></i>Join Our Community
                </h3>
                <p class="mb-4">
                    Sign up or log in to participate in discussions, share news, and make recommendations.
                </p>
                @guest
                    <div class="d-flex gap-2 justify-content-center flex-wrap">
                        <a class="btn btn-light btn-lg fw-bold" href="{{ route('login') }}">
                            <i class="fas fa-sign-in-alt me-2"></i>Sign In
                        </a>
                        <a class="btn btn-outline-light btn-lg fw-bold" href="{{ route('register') }}">
                            <i class="fas fa-user-plus me-2"></i>Create Account
                        </a>
                    </div>
                @else
                    <p class="fw-bold">Welcome back, {{ auth()->user()->name }}!</p>
                @endguest
            </div>
        </div>
    </div>
</div>

<!-- Statistics Section -->
<div class="row mb-5">
    <div class="col-12">
        <h3 class="mb-4 fw-bold text-center">
            <i class="fas fa-chart-bar me-2"></i>Academy Statistics
        </h3>
    </div>
    <div class="col-md-3 col-sm-6 mb-3">
        <div class="card stats-card text-center">
            <div class="card-body">
                <h4 class="text-primary fw-bold">
                    {{ \App\Models\User::count() }}
                </h4>
                <p class="text-muted">Total Members</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 mb-3">
        <div class="card stats-card text-center">
            <div class="card-body">
                <h4 class="text-success fw-bold">
                    {{ \App\Models\News::count() }}
                </h4>
                <p class="text-muted">News Articles</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 mb-3">
        <div class="card stats-card text-center">
            <div class="card-body">
                <h4 class="text-info fw-bold">
                    {{ \App\Models\Recommendation::count() }}
                </h4>
                <p class="text-muted">Recommendations</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 mb-3">
        <div class="card stats-card text-center">
            <div class="card-body">
                <h4 class="text-warning fw-bold">
                    {{ \App\Models\User::where('is_admin', true)->count() }}
                </h4>
                <p class="text-muted">Administrators</p>
            </div>
        </div>
    </div>
</div>

<style>
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

    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

    .feature-card {
        transition: all 0.3s ease;
        border: 0;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .feature-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    }

    .feature-icon {
        transition: all 0.3s ease;
    }

    .feature-card:hover .feature-icon {
        transform: scale(1.15) rotate(5deg);
    }

    .stats-card {
        border: 0;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
    }

    .stats-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 16px rgba(0,0,0,0.12);
    }
</style>
@endsection
