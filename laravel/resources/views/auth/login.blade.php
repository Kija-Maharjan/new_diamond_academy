@extends('ui')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 60vh;">
    <div class="card w-100" style="max-width: 450px; border: 0; box-shadow: 0 4px 20px rgba(0,0,0,0.1);">
        <div class="card-body p-5">
            <!-- Header -->
            <div class="text-center mb-4">
                <h2 class="fw-bold mb-2" style="color: #0d6efd;">
                    <i class="fas fa-sign-in-alt me-2"></i>Welcome Back
                </h2>
                <p class="text-muted">Sign in to your account to continue</p>
            </div>

            <!-- Success Message (after registration) -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>
                    <strong>Success!</strong>
                    <div>{{ session('success') }}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Error Messages -->
            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    <strong>Login Failed!</strong>
                    @if($errors->count() == 1)
                        <div>{{ $errors->first() }}</div>
                    @else
                        <ul class="mb-0 mt-2">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form method="POST" action="{{ route('login.post') }}" class="auth-form">
                @csrf
                
                <!-- Email Input -->
                <div class="mb-3">
                    <label class="form-label fw-bold" for="email">
                        <i class="fas fa-envelope me-2" style="color: #0d6efd;"></i>Email Address
                    </label>
                    <input 
                        class="form-control form-control-lg @error('email') is-invalid @enderror" 
                        type="email" 
                        id="email"
                        name="email" 
                        value="{{ old('email') }}" 
                        placeholder="you@example.com"
                        required
                        autocomplete="email"
                        style="border-radius: 8px; border: 2px solid #e9ecef; transition: all 0.3s ease;"
                    >
                    @error('email')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password Input -->
                <div class="mb-3">
                    <label class="form-label fw-bold" for="password">
                        <i class="fas fa-lock me-2" style="color: #0d6efd;"></i>Password
                    </label>
                    <input 
                        class="form-control form-control-lg @error('password') is-invalid @enderror" 
                        type="password" 
                        id="password"
                        name="password" 
                        placeholder="Enter your password"
                        required
                        autocomplete="current-password"
                        style="border-radius: 8px; border: 2px solid #e9ecef; transition: all 0.3s ease;"
                    >
                    @error('password')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Remember Me Checkbox -->
                <div class="mb-4 form-check">
                    <input 
                        class="form-check-input" 
                        type="checkbox" 
                        name="remember" 
                        id="remember"
                        value="1"
                        {{ old('remember') ? 'checked' : '' }}
                        style="cursor: pointer; width: 20px; height: 20px;"
                    >
                    <label class="form-check-label" for="remember" style="cursor: pointer;">Remember me</label>
                </div>

                <!-- Login Button -->
                <button 
                    class="btn btn-primary w-100 btn-lg fw-bold" 
                    type="submit"
                    style="border-radius: 8px; background: linear-gradient(135deg, #0d6efd 0%, #0b5ed7 100%); border: 0; padding: 12px; transition: all 0.3s ease;"
                >
                    <i class="fas fa-sign-in-alt me-2"></i>Sign In
                </button>
            </form>

            <!-- Divider -->
            <div class="my-4 text-center">
                <hr>
                <span class="text-muted small">New here?</span>
            </div>

            <!-- Registration Link -->
            <div class="text-center">
                <p class="mb-3 text-muted">Don't have an account?</p>
                <a 
                    href="{{ route('register') }}" 
                    class="btn btn-outline-primary w-100 btn-lg fw-bold"
                    style="border-radius: 8px; border: 2px solid #0d6efd; transition: all 0.3s ease;"
                >
                    <i class="fas fa-user-plus me-2"></i>Create New Account
                </a>
            </div>

            <!-- Footer Info -->
            <p class="text-center text-muted mt-4 small">
                <i class="fas fa-shield-alt me-1"></i>Your account is secure and encrypted
            </p>
        </div>
    </div>
</div>

<style>
    .form-control:focus {
        border-color: #0d6efd !important;
        box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25) !important;
    }

    .is-invalid:focus {
        border-color: #dc3545 !important;
        box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25) !important;
    }

    .form-check-input {
        cursor: pointer;
    }

    .form-check-input:not(:checked) {
        background-color: #fff;
        border: 2px solid #dee2e6;
    }

    .form-check-input:checked {
        background-color: #0d6efd;
        border-color: #0d6efd;
    }

    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }

    .auth-form {
        animation: slideUp 0.5s ease-out;
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
</style>
@endsection
