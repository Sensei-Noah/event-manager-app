@extends('main')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body mb-2">
                    @if (session('status'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('There has been and error. Please try again') }}
                </div>
                <a class="btn btn-primary mt-2" href="{{ url()->previous() }}">Go back</a>
            </div>
        </div>
    </div>
</div>
@endsection
