<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}"><b>Bioxin IT Services</b></a>
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
                        <a class="nav-link active" href="{{ route('job_applications.create') }}"> Career </a>
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
