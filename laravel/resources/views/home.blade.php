@extends('ui')

@section('content')
<div class="p-4 bg-light rounded-3">
    <div class="container-fluid py-3">
        <h1 class="display-5 fw-bold">Welcome to Diamond Academy</h1>
        <p class="col-md-8 fs-4">A space for students, teachers, and founders. Use the navigation to browse news, send recommendations, and manage the site if you are an admin.</p>
        <a class="btn btn-primary btn-lg" href="{{ route('news.index') }}" role="button">View Student News</a>
    </div>
</div>
@endsection
