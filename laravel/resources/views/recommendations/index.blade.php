@extends('ui')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="display-5 fw-bold">
                        <i class="fas fa-star me-3" style="color: #ffc107;"></i>Recommendations
                    </h1>
                    <p class="text-muted">{{ $recs->count() }} total recommendations received</p>
                </div>
                <a href="{{ route('recommendations.create') }}" class="btn btn-warning btn-lg">
                    <i class="fas fa-plus me-2"></i>Send Recommendation
                </a>
            </div>
        </div>
    </div>

    @if (!$recs->count())
    <div class="alert alert-warning">
        <i class="fas fa-inbox me-2"></i>
        No recommendations yet. <a href="{{ route('recommendations.create') }}">Share your feedback!</a>
    </div>
    @else
    <div class="row">
        @foreach($recs as $r)
        <div class="col-lg-6 mb-4">
            <div class="card h-100 border-0 shadow-sm overflow-hidden" style="transition: all 0.3s ease;">
                <div class="card-header bg-warning text-dark">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h5 class="mb-1 fw-bold">
                                <i class="fas fa-user-circle me-2"></i>{{ $r->name ?? ($r->user->name ?? 'Anonymous') }}
                            </h5>
                            <small class="text-muted">
                                <i class="fas fa-envelope me-1"></i>{{ $r->email ?? 'Not provided' }}
                            </small>
                        </div>
                        <span class="badge bg-dark">
                            <i class="fas fa-calendar me-1"></i>{{ $r->created_at->format('M d, Y') }}
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    <p class="card-text mb-3">{{ $r->note }}</p>
                    
                    @if($r->attachment_path)
                    <div class="alert alert-info mb-3">
                        <i class="fas fa-paperclip me-2"></i>
                        <strong>Attachment:</strong>
                        <a href="{{ route('recommendations.attachment', $r) }}" class="btn btn-sm btn-outline-info ms-2">
                            <i class="fas fa-download me-1"></i>Download File
                        </a>
                    </div>
                    @endif

                    <div class="mt-3">
                        @auth
                        @if(auth()->user()->is_admin)
                        <div class="d-flex gap-2">
                            <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#markModal{{ $r->id }}">
                                <i class="fas fa-check me-1"></i>Mark as Read
                            </button>
                            <form method="POST" action="{{ route('recommendations.delete', $r->id) }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this recommendation?')">
                                    <i class="fas fa-trash me-1"></i>Delete
                                </button>
                            </form>
                        </div>
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

<style>
    .card {
        border-radius: 12px !important;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 24px rgba(0,0,0,0.12) !important;
    }

    .card-header {
        border-radius: 12px 12px 0 0 !important;
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

