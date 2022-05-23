@extends('main')
@section('content')

<!-- Services-->
<section class="page-section" id="services">
    <div class="container px-4 px-lg-5">
        <h2 class="text-center mt-0">Events
            <br/>
            <a class="btn btn-primary mt-2" href="/add-event">Create Event</a>
        </h2>
        <hr class="divider" />
        <div class="row gx-4 gx-lg-5">

            @foreach ($events as $event)
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5 mb-3 p-1 border border-3 rounded-3">
                        <h3 class="h4 mb-2">{{ $event->title }}</h3>
                        <p  class="border-top text-muted mb-1" 
                            style="
                            white-space: nowrap;
                            overflow: hidden;
                            text-overflow: ellipsis;
                            max-width: 500px;">
                            {{ $event->description }}
                        </p>
                    </div>
                    <a class="btn btn-primary" href="/event/{{ $event->id }}">More about</a>
                </div>
            @endforeach
            <div class="d-flex justify-content-end md-4 pt-2">
                {{ $events->links() }}
            </div>

            {{-- <div class="col-lg-3 col-md-6 text-center">
                <div class="mt-5">
                    <div class="mb-2"><i class="bi-laptop fs-1 text-primary"></i></div>
                    <h3 class="h4 mb-2">Up to Date</h3>
                    <p class="text-muted mb-0">All dependencies are kept current to keep things fresh.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="mt-5">
                    <div class="mb-2"><i class="bi-globe fs-1 text-primary"></i></div>
                    <h3 class="h4 mb-2">Ready to Publish</h3>
                    <p class="text-muted mb-0">You can use this design as is, or you can make changes!</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="mt-5">
                    <div class="mb-2"><i class="bi-heart fs-1 text-primary"></i></div>
                    <h3 class="h4 mb-2">Made with Love</h3>
                    <p class="text-muted mb-0">Is it really open source if it's not made with love?</p>
                </div>
            </div> --}}
        </div>
    </div>
</section>
@endsection
