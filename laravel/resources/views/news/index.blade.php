@extends('ui')

@section('content')
<div class="mb-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">Student News</h1>
    </div>

    @auth
    <div class="card mb-4">
        <div class="card-body">
            <form method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <input class="form-control" type="text" name="title" placeholder="Title" required>
                </div>
                <div class="mb-3">
                    <textarea class="form-control" name="body" placeholder="Body" rows="4" required></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Image (optional)</label>
                    <input class="form-control" type="file" name="image" accept="image/*">
                </div>
                <button class="btn btn-success" type="submit">Post News</button>
            </form>
        </div>
    </div>
    @else
        <div class="alert alert-info">Please <a href="{{ route('login') }}">log in</a> to post or edit news.</div>
    @endauth

    <div class="row">
        @foreach($news as $item)
            <div class="col-md-6 mb-4">
                <div class="card news-card h-100">
                    @if($item->image)
                        <img src="{{ asset('storage/'.$item->image) }}" class="card-img-top" alt="{{ $item->title }}">
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $item->title }}</h5>
                        <p class="card-text">{{ 
                            
                            Str::limit($item->body, 200)
                        }}</p>
                        <p class="text-muted small mt-auto">Posted by {{ $item->author->name ?? 'Unknown' }} · {{ $item->created_at->diffForHumans() }}</p>
                        <div class="mt-2">
                            @auth
                                @if(auth()->id() === $item->user_id || auth()->user()->is_admin)
                                    <a href="{{ route('news.edit', $item) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                    <form method="POST" action="{{ route('news.destroy', $item) }}" style="display:inline" onsubmit="return confirm('Delete this news item?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                    </form>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
