@extends('ui')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="display-5 fw-bold">
                        <i class="fas fa-newspaper me-3" style="color: #198754;"></i>Student News
                    </h1>
                    <p class="text-muted">{{ $news->count() }} articles published</p>
                </div>
                @auth
                <button class="btn btn-success btn-lg" data-bs-toggle="modal" data-bs-target="#newsModal">
                    <i class="fas fa-plus me-2"></i>Add New Article
                </button>
                @endauth
            </div>
        </div>
    </div>

    @if (!$news->count())
    <div class="alert alert-info">
        <i class="fas fa-info-circle me-2"></i>
        No news articles yet. @auth<a href="#" data-bs-toggle="modal" data-bs-target="#newsModal">Create one now!</a>@endauth
    </div>
    @else
    <div class="row">
        @foreach($news as $item)
        <div class="col-lg-6 col-xl-4 mb-4">
            <div class="card h-100 border-0 shadow-sm overflow-hidden" style="transition: all 0.3s ease;">
                @if($item->image)
                <img src="{{ asset('storage/'.$item->image) }}" class="card-img-top" alt="{{ $item->title }}" style="height: 250px; object-fit: cover;">
                @else
                <div class="bg-light d-flex align-items-center justify-content-center" style="height: 250px;">
                    <i class="fas fa-image" style="font-size: 3rem; color: #ccc;"></i>
                </div>
                @endif
                <div class="card-body d-flex flex-column">
                    <div class="mb-2">
                        <span class="badge bg-success">
                            <i class="fas fa-check-circle me-1"></i>Published
                        </span>
                        <span class="badge bg-secondary ms-2">
                            {{ $item->created_at->format('M d, Y') }}
                        </span>
                    </div>
                    <h5 class="card-title fw-bold mb-2">{{ $item->title }}</h5>
                    <p class="card-text text-muted flex-grow-1">{{ Str::limit($item->body, 150) }}</p>
                    <p class="text-muted small mb-3">
                        <i class="fas fa-user-circle me-1"></i>
                        By <strong>{{ $item->author->name ?? 'Unknown' }}</strong>
                    </p>
                    <div class="d-flex gap-2">
                        <a href="{{ route('news.edit', $item) }}" class="btn btn-sm btn-primary flex-fill">
                            <i class="fas fa-edit me-1"></i>View/Edit
                        </a>
                        @auth
                        @if(auth()->id() === $item->user_id || auth()->user()->is_admin)
                        <form method="POST" action="{{ route('news.destroy', $item) }}" style="display:inline;" class="flex-fill">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger w-100" onclick="return confirm('Delete this article?')">
                                <i class="fas fa-trash me-1"></i>Delete
                            </button>
                        </form>
                        @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>

<!-- Add/Edit News Modal -->
@auth
<div class="modal fade" id="newsModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">
                    <i class="fas fa-plus-circle me-2"></i>Create New Article
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4">
                <form method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data" id="newsForm">
                    @csrf
                    
                    <!-- Title -->
                    <div class="mb-3">
                        <label class="form-label fw-bold" for="title">
                            <i class="fas fa-heading me-2" style="color: #198754;"></i>Article Title
                        </label>
                        <input 
                            class="form-control form-control-lg @error('title') is-invalid @enderror" 
                            type="text" 
                            id="title"
                            name="title" 
                            value="{{ old('title') }}"
                            placeholder="Enter article title"
                            required
                            style="border-radius: 8px;"
                        >
                        @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Body -->
                    <div class="mb-3">
                        <label class="form-label fw-bold" for="body">
                            <i class="fas fa-file-alt me-2" style="color: #198754;"></i>Article Content
                        </label>
                        <textarea 
                            class="form-control @error('body') is-invalid @enderror" 
                            id="body"
                            name="body" 
                            rows="6"
                            placeholder="Write your article content here..."
                            required
                            style="border-radius: 8px;"
                        >{{ old('body') }}</textarea>
                        @error('body')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Image -->
                    <div class="mb-3">
                        <label class="form-label fw-bold" for="image">
                            <i class="fas fa-image me-2" style="color: #198754;"></i>Featured Image (Optional)
                        </label>
                        <input 
                            class="form-control @error('image') is-invalid @enderror" 
                            type="file" 
                            id="image"
                            name="image" 
                            accept="image/*"
                            style="border-radius: 8px;"
                        >
                        <small class="text-muted d-block mt-2">
                            <i class="fas fa-info-circle me-1"></i>Max file size: 2MB. Supported formats: JPG, PNG, GIF
                        </small>
                        @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-2"></i>Cancel
                </button>
                <button type="submit" form="newsForm" class="btn btn-success">
                    <i class="fas fa-check me-2"></i>Publish Article
                </button>
            </div>
        </div>
    </div>
</div>
@endauth

<style>
    .card {
        border-radius: 12px !important;
    }

    .card:hover {
        transform: translateY(-8px);
        box-shadow: 0 8px 24px rgba(0,0,0,0.12) !important;
    }

    .card-img-top {
        transition: transform 0.3s ease;
    }

    .card:hover .card-img-top {
        transform: scale(1.05);
    }

    .btn {
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .btn:hover {
        transform: translateY(-2px);
    }
</style>
@endsection

