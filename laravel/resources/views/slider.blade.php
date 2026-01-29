@extends('ui')

@section('content')
<h1 class="h3 mb-3">Teacher / Founder Slider</h1>
<div id="academyCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://via.placeholder.com/1200x400?text=Founder+1" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Founder 1</h5>
                <p>Short bio or title here.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://via.placeholder.com/1200x400?text=Teacher+2" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Teacher 2</h5>
                <p>Short bio or title here.</p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#academyCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#academyCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
@endsection
