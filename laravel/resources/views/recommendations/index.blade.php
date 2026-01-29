@extends('ui')

@section('content')
<div class="content-wrapper">
    <h1>Recommendations</h1>

    @foreach($recs as $r)
        <div class="recommendation">
            <p>{{ $r->note }}</p>
            <p class="meta">From: {{ $r->name ?? ($r->user->name ?? 'Anonymous') }} {{ $r->email ? '('.$r->email.')' : '' }} — {{ $r->created_at->diffForHumans() }}</p>
            @if($r->attachment_path)
                <p><a href="{{ route('recommendations.attachment', $r) }}">Download attachment (admin)</a></p>
            @endif
        </div>
    @endforeach
</div>
@endsection
