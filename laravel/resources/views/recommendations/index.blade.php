@extends('ui')

@section('content')
<h3>Recommendations</h3>
<div class="list-group">
    @foreach($recs as $r)
        <div class="list-group-item">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">{{ $r->name ?? ($r->user->name ?? 'Anonymous') }}</h5>
                <small class="text-muted">{{ $r->created_at->diffForHumans() }}</small>
            </div>
            <p class="mb-1">{{ $r->note }}</p>
            <small class="text-muted">{{ $r->email ? $r->email : '' }}</small>
            @if($r->attachment_path)
                <div class="mt-2">
                    <a class="btn btn-sm btn-outline-primary" href="{{ route('recommendations.attachment', $r) }}">Download attachment</a>
                </div>
            @endif
        </div>
    @endforeach
</div>
@endsection
