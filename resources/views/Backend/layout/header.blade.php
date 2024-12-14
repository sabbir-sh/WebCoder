<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        {{-- <a class="navbar-brand" href="{{route('adminDashboard')}}">{{ $page_title ?? "Dashboard" }}</a> --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <!-- Show User's Name -->
                @if(Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                           {{ Auth::user()->name }}
                        </a>
                    </li>
                @endif

                <!-- Profile Link -->
                <li class="nav-item">
                    <a class="nav-link" href="#">Profile</a>
                </li>

                <!-- Logout Link -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logOut') }}">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
