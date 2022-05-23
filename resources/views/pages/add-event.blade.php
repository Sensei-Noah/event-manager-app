@extends('main')
@section('content')
<div class="container p-2">
<form action="/store" method="post" enctype="multipart/form-data">
    @csrf
    @include('_partials.errors')
    <div class="input-group mb-2">
        <input type="text" class="form-control" name="title" placeholder="Title">
    </div>
    <div class="input-group mb-2">
        <textarea class="form-control" id="" cols="30" rows="10" name="description" placeholder="Description"></textarea>
    </div>
    <div class="input-group mb-2">
        <input class="form-control" type="datetime-local" required name="dateTime">
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