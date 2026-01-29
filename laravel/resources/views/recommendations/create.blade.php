@extends('ui')

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Send a Recommendation / Note</h4>
        <form method="POST" action="{{ route('recommendations.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Your name (optional)</label>
                <input class="form-control" type="text" name="name" value="{{ old('name') }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Email (optional)</label>
                <input class="form-control" type="email" name="email" value="{{ old('email') }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Recommendation / Note</label>
                <textarea class="form-control" name="note" rows="5" required>{{ old('note') }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Attachment (optional)</label>
                <input class="form-control" type="file" name="attachment">
            </div>
            <button class="btn btn-success" type="submit">Send Recommendation</button>
        </form>
        <p class="mt-3 text-muted">These suggestions will be stored for future projects and can be reviewed by admins.</p>
    </div>
</div>
@endsection
