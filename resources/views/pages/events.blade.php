@extends('main')
@section('content')
    
<div id="portfolio">
    <div class="container-fluid p-0">
        <div class="row g-0 justify-content-center">
            <hr class="my-4" />
            @foreach ($events as $event) 
            <div class="col-lg-4 col-sm-6">
                <a class="portfolio-box" href="/storage/{{ $event->image }}" title="{{ $event->title }}">
                    <img class="img-fluid w-100" src="/storage/{{ $event->image }}" alt="..." />
                    <div class="portfolio-box-caption">
                        <div class="project-category text-white-50">{{ $event->title }}</div>
                        <div class="project-name">{{ $event->title }}</div>
                    </div>
                </a>
            </div>
            <hr class="my-4" />
            @endforeach
            <div class="d-flex justify-content-end md-4">
                {{ $events->links() }}
            </div>

            {{-- <div class="col-lg-4 col-sm-6">
                <a class="portfolio-box" href="assets/img/portfolio/fullsize/2.jpg" title="Project Name">
                    <img class="img-fluid" src="assets/img/portfolio/thumbnails/2.jpg" alt="..." />
                    <div class="portfolio-box-caption">
                        <div class="project-category text-white-50">Category</div>
                        <div class="project-name">Project Name</div>
                    </div>
                </a>
            </div> --}}

        </div>
    </div>
</div>
@endsection
