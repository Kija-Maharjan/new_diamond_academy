@extends('ui')

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Edit News</h4>
        <form method="POST" action="{{ route('news.update', $news) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <input class="form-control" type="text" name="title" value="{{ $news->title }}" required>
            </div>
            <div class="mb-3">
                <textarea class="form-control" name="body" rows="6" required>{{ $news->body }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Replace image (optional)</label>
                <input class="form-control" type="file" name="image" accept="image/*">
            </div>
            <button class="btn btn-primary" type="submit">Save</button>
        </form>
    </div>
</div>
@endsection
