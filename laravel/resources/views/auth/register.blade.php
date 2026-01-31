@extends('ui')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 60vh;">
    <div class="card w-100" style="max-width: 500px; border: 0; box-shadow: 0 4px 20px rgba(0,0,0,0.1);">
        <div class="card-body p-5">
            <!-- Header -->
            <div class="text-center mb-4">
                <h2 class="fw-bold mb-2" style="color: #198754;">
                    <i class="fas fa-user-plus me-2"></i>Create Account
                </h2>
                <p class="text-muted">Join our academy community today</p>
            </div>

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <strong>Registration Error!</strong>
                    <ul class="mb-0 mt-2">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form method="POST" action="{{ route('register.post') }}" class="auth-form">
                @csrf
                
                <!-- Name Input -->
                <div class="mb-3">
                    <label class="form-label fw-bold" for="name">
                        <i class="fas fa-user me-2" style="color: #198754;"></i>Full Name
                    </label>
                    <input 
                        class="form-control form-control-lg @error('name') is-invalid @enderror" 
                        type="text" 
                        id="name"
                        name="name" 
                        value="{{ old('name') }}" 
                        placeholder="John Doe"
                        required
                        autocomplete="name"
                        style="border-radius: 8px; border: 2px solid #e9ecef; transition: all 0.3s ease;"
                    >
                    @error('name')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email Input -->
                <div class="mb-3">
                    <label class="form-label fw-bold" for="email">
                        <i class="fas fa-envelope me-2" style="color: #198754;"></i>Email Address
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
                        <i class="fas fa-lock me-2" style="color: #198754;"></i>Password
                    </label>
                    <input 
                        class="form-control form-control-lg @error('password') is-invalid @enderror" 
                        type="password" 
                        id="password"
                        name="password" 
                        placeholder="Create a strong password"
                        required
                        autocomplete="new-password"
                        style="border-radius: 8px; border: 2px solid #e9ecef; transition: all 0.3s ease;"
                    >
                    <small class="form-text text-muted d-block mt-2">
                        <i class="fas fa-info-circle me-1"></i>Minimum 8 characters, with uppercase, lowercase, and numbers
                    </small>
                    @error('password')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Confirm Password Input -->
                <div class="mb-4">
                    <label class="form-label fw-bold" for="password_confirmation">
                        <i class="fas fa-check-circle me-2" style="color: #198754;"></i>Confirm Password
                    </label>
                    <input 
                        class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror" 
                        type="password" 
                        id="password_confirmation"
                        name="password_confirmation" 
                        placeholder="Confirm your password"
                        required
                        autocomplete="new-password"
                        style="border-radius: 8px; border: 2px solid #e9ecef; transition: all 0.3s ease;"
                    >
                    @error('password_confirmation')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Terms Checkbox -->
                <div class="mb-4 form-check">
                    <input 
                        class="form-check-input @error('terms') is-invalid @enderror" 
                        type="checkbox" 
                        name="terms" 
                        id="terms"
                        value="1"
                        {{ old('terms') ? 'checked' : '' }}
                        style="cursor: pointer; width: 20px; height: 20px;"
                    >
                    <label class="form-check-label" for="terms" style="cursor: pointer;">
                        <i class="fas fa-file-contract me-1" style="color: #198754;"></i>I agree to the terms and conditions
                    </label>
                    @error('terms')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Register Button -->
                <button 
                    class="btn btn-success w-100 btn-lg fw-bold" 
                    type="submit"
                    style="border-radius: 8px; background: linear-gradient(135deg, #198754 0%, #157347 100%); border: 0; padding: 12px; transition: all 0.3s ease;"
                >
                    <i class="fas fa-user-plus me-2"></i>Create Account
                </button>
            </form>

            <!-- Divider -->
            <div class="my-4 text-center">
                <hr>
                <span class="text-muted small">Already have an account?</span>
            </div>

            <!-- Login Link -->
            <div class="text-center">
                <a 
                    href="{{ route('login') }}" 
                    class="btn btn-outline-success w-100 btn-lg fw-bold"
                    style="border-radius: 8px; border: 2px solid #198754; transition: all 0.3s ease;"
                >
                    <i class="fas fa-sign-in-alt me-2"></i>Sign In to Existing Account
                </a>
            </div>

            <!-- Footer Info -->
            <p class="text-center text-muted mt-4 small">
                <i class="fas fa-shield-alt me-1"></i>We respect your privacy and never share your data
            </p>
        </div>
    </div>
</div>

<style>
    .form-control:focus {
        border-color: #198754 !important;
        box-shadow: 0 0 0 0.2rem rgba(25, 135, 84, 0.25) !important;
    }

    .is-invalid:focus {
        border-color: #dc3545 !important;
        box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25) !important;
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
