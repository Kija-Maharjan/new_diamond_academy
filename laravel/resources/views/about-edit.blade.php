@extends('ui')

@section('content')
<div class="container py-5">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="fw-bold mb-0">Edit About Page</h1>
        </div>
    </div>

    <div class="card border-0 shadow-sm" style="border-radius: 16px; overflow: hidden;">
        <div style="background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%); color: white; padding: 2rem;">
            <h2 class="fw-bold mb-0">Update Academy Information</h2>
        </div>

        <div class="card-body p-4">
            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <h6 class="fw-bold mb-2">Errors:</h6>
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ route('about.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="content" class="form-label fw-bold" style="font-size: 1.1rem;">About Content</label>
                    <textarea class="form-control" id="content" name="content" rows="12" placeholder="Write about the New Diamond Academy..." style="border-radius: 8px; border: 1px solid #ddd; padding: 1rem; font-size: 1rem;">{{ file_exists(storage_path('app/about_content.txt')) ? file_get_contents(storage_path('app/about_content.txt')) : '' }}</textarea>
                    <small class="text-muted d-block mt-2">
                        <i class="fas fa-info-circle me-1"></i>
                        Share information about the academy's mission, values, history, and vision.
                    </small>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary btn-lg" style="border-radius: 8px;">
                        <i class="fas fa-save me-2"></i>Save Changes
                    </button>
                    <a href="{{ route('about.index') }}" class="btn btn-secondary btn-lg" style="border-radius: 8px;">
                        <i class="fas fa-times me-2"></i>Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
