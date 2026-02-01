@extends('ui')

@section('content')
<div class="container py-5">
    <div class="row mb-4">
        <div class="col-12">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h1 class="fw-bold mb-0">About New Diamond Academy</h1>
                @if(auth()->check() && auth()->user()->is_admin)
                    <a href="{{ route('about.edit') }}" class="btn btn-primary">
                        <i class="fas fa-edit me-2"></i>Edit
                    </a>
                @endif
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm" style="border-radius: 16px; overflow: hidden;">
        <div style="background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%); color: white; padding: 3rem 2rem; text-align: center;">
            <i class="fas fa-crown" style="font-size: 3rem; margin-bottom: 1rem; display: block;"></i>
            <h2 class="fw-bold mb-2">Welcome to Our Community</h2>
            <p style="font-size: 1.1rem; margin: 0;">A premier space where students, teachers, and founders connect, collaborate, and grow together</p>
        </div>

        <div class="card-body p-4">
            @if(file_exists(storage_path('app/about_content.txt')))
                <div style="font-size: 1.1rem; line-height: 1.8; color: #333;">
                    {!! nl2br(e(file_get_contents(storage_path('app/about_content.txt')))) !!}
                </div>
            @else
                <div style="text-align: center; padding: 2rem; color: #666;">
                    <p style="font-size: 1.1rem;">
                        <i class="fas fa-info-circle me-2"></i>
                        No content yet. 
                        @if(auth()->check() && auth()->user()->is_admin)
                            <a href="{{ route('about.edit') }}">Click here to add content.</a>
                        @else
                            Please check back soon!
                        @endif
                    </p>
                </div>
            @endif
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm text-center" style="border-radius: 16px; padding: 2rem;">
                <div style="font-size: 3rem; color: #0d6efd; margin-bottom: 1rem;">
                    <i class="fas fa-users"></i>
                </div>
                <h5 class="fw-bold mb-2">Community Focused</h5>
                <p class="text-muted">Building a supportive environment for all members</p>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm text-center" style="border-radius: 16px; padding: 2rem;">
                <div style="font-size: 3rem; color: #198754; margin-bottom: 1rem;">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <h5 class="fw-bold mb-2">Learning Excellence</h5>
                <p class="text-muted">Dedicated to quality education and personal growth</p>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm text-center" style="border-radius: 16px; padding: 2rem;">
                <div style="font-size: 3rem; color: #0dcaf0; margin-bottom: 1rem;">
                    <i class="fas fa-handshake"></i>
                </div>
                <h5 class="fw-bold mb-2">Collaboration</h5>
                <p class="text-muted">Working together to achieve shared goals</p>
            </div>
        </div>
    </div>
</div>
@endsection
