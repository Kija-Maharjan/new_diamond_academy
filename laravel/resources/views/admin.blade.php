@extends('ui')

@section('content')
<h1 class="h3 mb-3">Admin Panel</h1>
<div class="row">
    <div class="col-md-4 mb-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Manage News</h5>
                <p class="card-text">Create, edit, and remove student news items.</p>
                <a href="{{ route('news.index') }}" class="btn btn-sm btn-primary">Open News</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Recommendations</h5>
                <p class="card-text">View submitted recommendations and attachments.</p>
                <a href="{{ route('recommendations.index') }}" class="btn btn-sm btn-primary">View Recommendations</a>
            </div>
        </div>
    </div>
</div>
@endsection
