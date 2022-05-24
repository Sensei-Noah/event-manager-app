@extends('main')
@section('content')
<section class="page-section">
    <div class="container px-4 px-lg-5">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">phone_number</th>
                <th scope="col">Event ID</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($signup as $signups)
                
            <tr>
                <th scope="row">{{ $signups->id }}</th>
                <td>{{ $signups->name }}</td>
                <td>{{ $signups->email }}</td>
                <td>{{ $signups->phone_number }}</td>
                <td>{{ $signups->event_id }}</td>
                 <td><a class="btn btn-success" href="">Approve</a></td> {{-- TODO --}}
                <td><a class="btn btn-danger" href="">Delete</a></td> {{-- TODO --}}
            </tr>
            @endforeach

            </tbody>
        </table>
    </div>
</section>
@endsection