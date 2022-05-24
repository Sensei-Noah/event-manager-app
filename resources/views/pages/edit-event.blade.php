@extends('main')
@section('content')
<div class="container p-2">
<form action="/update/{{ $event->id }}" method="post" enctype="multipart/form-data">
    @csrf
    @include('_partials.errors')
    <div class="input-group mb-2">
        <input type="text" class="form-control" name="title" placeholder="Title" value="{{ $event->title }}">
    </div>
    <div class="input-group mb-2">
        <textarea class="form-control" id="" cols="30" rows="10" name="description" placeholder="Description">{{ $event->description}}</textarea>
    </div>
    <div class="input-group mb-2">
        <input class="form-control" type="datetime-local" name="dateTime" required value="{{ $dateTimeStr }}">
    </div>
    <div class="mb-2">
        <label for="formFile" class="form-label">Add an image</label>
        <input class="form-control" type="file" id="formFile" name="image">
    </div>
    <div class="input-group mb-2">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>
</div>
@endsection