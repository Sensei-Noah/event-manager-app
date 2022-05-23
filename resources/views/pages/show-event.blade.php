@extends('main')
@section('content')
<div class="container">
    <h1 class="mt-4">{{ $event->title }}</h1>
    <p class="text-muted">Made by {{ auth()->user()->name }}</p>
    <p>{{ $date }} / {{ $time }}</p>
    <hr class="my-4" />
    <div class="row">
        <p class="col-9">{{ $event->description }}</p>
        <img class="col-3 img-thumbnail" style="max-width:100%" src="/storage/{{ $event->image }}"></img>
    </div>

    <div class="mt-5">
        <hr class="my-4" />
        <h3>Controls</h3>
        <ul class="" type="none">
             @if (Auth::check()) {{-- TODO: Registering for the actual event --}}
                <li>
                    <a href="/event/update/{{ $event->id }}" class="btn btn-primary mt-2">Editing</a>
                </li>
                <li>
                    <button type="button" class="btn btn-danger mt-2" data-bs-toggle="modal" data-bs-target="#deleteConformation">Deletion</button>
                </li>
            @else
                <li>
                    <a class="btn btn-primary mt-2" href="/login">Login</a>
                </li>
                <li>
                    <a class="btn btn-primary mt-2" href="/register">Register</a>
                </li>
            @endif
        </ul>
    </div>
        
    
</div>

<div class="modal fade" id="deleteConformation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <a href="/event/delete/{{ $event->id }}" class="btn btn-danger">Confirm delete</a>
        </div>
      </div>
    </div>
  </div>

@endsection