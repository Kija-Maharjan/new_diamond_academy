@extends('ui')

@section('content')
<div class="content-wrapper">
    <h1>Student News</h1>

    @if(session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    @auth
    <form method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data">
        @csrf
        <div>
            <input type="text" name="title" placeholder="Title" required>
        </div>
        <div>
            <textarea name="body" placeholder="Body" required></textarea>
        </div>
        <div>
            <label>Image (optional)</label>
            <input type="file" name="image" accept="image/*">
        </div>
        <button type="submit">Post News</button>
    </form>
    @else
        <p><a href="{{ route('login') }}">Log in</a> to post or edit news.</p>
    @endauth

    <hr>

    @foreach($news as $item)
        <article class="news-item">
            <h3>{{ $item->title }}</h3>
            @if($item->image)
                <div><img src="{{ asset('storage/'.$item->image) }}" alt="{{ $item->title }}" style="max-width:100%; height:auto"></div>
            @endif
            <p>{{ $item->body }}</p>
            <p class="meta">Posted by {{ $item->author->name ?? 'Unknown' }} at {{ $item->created_at->diffForHumans() }}</p>

            @auth
                @if(auth()->id() === $item->user_id || auth()->user()->is_admin)
                    <a href="{{ route('news.edit', $item) }}">Edit</a>
                    <form method="POST" action="{{ route('news.destroy', $item) }}" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                @endif
            @endauth
        </article>
    @endforeach
</div>
@endsection
