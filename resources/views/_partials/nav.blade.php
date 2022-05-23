<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container-fluid px-4 px-lg-5">
        <a class="navbar-brand" href="/">Event Manager</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto my-2 my-lg-0 text-danger">
                @if (Auth::check())
                    <li class="nav-item"><a class="nav-link disabled">Hello, {{ auth()->user()->name }} !</a></li>
                @else
                    <li class="nav-item"><a class="nav-link disabled">Hello, Guest !</a></li>
                @endif
                <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="/events">Events</a></li>
                <li class="nav-item"><a class="nav-link" href="/contacts ">Contact</a></li>
                @if (Auth::check())
                    <li class="nav-item"><a class="nav-link text-danger" href="/logout">Logout</a></li>
                @else
                    <li class="nav-item"><a class="nav-link text-success" href="/login">Login</a></li>
                    <li class="nav-item"><a class="nav-link text-success" href="/register">Register</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>