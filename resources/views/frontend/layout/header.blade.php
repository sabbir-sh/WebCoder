<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('assets/logo_1.jpg') }}" alt="logo" style="width: 10% "></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('home') }}"> Home </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('about') }}"> About Us </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('services') }}"> Services </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('contact') }}"> Contact Us </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('Privacy.Policy') }}"> Privacy Policy </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
