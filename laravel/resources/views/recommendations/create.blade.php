@extends('ui')

@section('content')
<div class="content-wrapper">
    <h1>Send a Recommendation / Note</h1>

    @if(session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('recommendations.store') }}" enctype="multipart/form-data">
        @csrf
        <div>
            <label>Your name (optional)</label>
            <input type="text" name="name" value="{{ old('name') }}">
        </div>
        <div>
            <label>Email (optional)</label>
            <input type="email" name="email" value="{{ old('email') }}">
        </div>
        <div>
            <label>Recommendation / Note</label>
            <textarea name="note" required>{{ old('note') }}</textarea>
        </div>
        <div>
            <label>Attachment (optional)</label>
            <input type="file" name="attachment">
        </div>
        <button type="submit">Send Recommendation</button>
    </form>

    <p>These suggestions will be stored for future projects and can be reviewed by admins.</p>
</div>
@endsection
