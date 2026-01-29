@extends('ui')

@section('content')
<div class="content-wrapper">
    <h1>Edit News</h1>

    <form method="POST" action="{{ route('news.update', $news) }}">
        @csrf
        @method('PUT')
        <div>
            <input type="text" name="title" value="{{ $news->title }}" required>
        </div>
        <div>
            <textarea name="body" required>{{ $news->body }}</textarea>
        </div>
        <button type="submit">Save</button>
    </form>
</div>
@endsection
