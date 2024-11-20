<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Website</title>
    <!-- Include CSS for styling -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Add Bootstrap or other CSS frameworks if necessary -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Header and Navigation -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="/"><img src="{{ asset('assets/logo.png') }}" alt="logo" style="width: 20%"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Content Section -->
    <div id="homepageSlider" class="carousel slide" data-bs-ride="carousel">
        <!-- Indicators -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#homepageSlider" data-bs-slide-to="0" class="active" aria-current="true"></button>
            <button type="button" data-bs-target="#homepageSlider" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#homepageSlider" data-bs-slide-to="2"></button>
        </div>

        <!-- Slider Items -->
        <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active">
                <img src="{{ asset('assets/slider1.webp') }}" class="d-block w-100" alt="Slide 1">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Welcome to Our Website</h5>
                    <p>Discover amazing features and content.</p>
                </div>
            </div>
            <!-- Slide 2 -->
            <div class="carousel-item">
                <img src="{{ asset('assets/slider2.jpg') }}" class="d-block w-100" alt="Slide 2">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Our Services</h5>
                    <p>Explore our wide range of offerings.</p>
                </div>
            </div>
            <!-- Slide 3 -->
            <div class="carousel-item">
                <img src="{{ asset('assets/slider3.jpg') }}" class="d-block w-100" alt="Slide 3">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Join Us</h5>
                    <p>Sign up today and start your journey.</p>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#homepageSlider" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#homepageSlider" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-6 p-4 bg-light border rounded shadow">
                <h3 class="text-center">Welcome</h3>
                <p class="text-center">
                    This is a simple col-6 box with text inside. You can add more content or customize it as needed.
                </p>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-6 p-4 bg-light border rounded shadow">
                <h3 class="text-center">Welcome</h3>
                <p class="text-center">
                    This is a simple col-6 box with text inside. You can add more content or customize it as needed.
                </p>
            </div>
        </div>
    </div><div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-6 p-4 bg-light border rounded shadow">
                <h3 class="text-center">Welcome</h3>
                <p class="text-center">
                    This is a simple col-6 box with text inside. You can add more content or customize it as needed.
                </p>
            </div>
        </div>
    </div><div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-6 p-4 bg-light border rounded shadow">
                <h3 class="text-center">Welcome</h3>
                <p class="text-center">
                    This is a simple col-6 box with text inside. You can add more content or customize it as needed.
                </p>
            </div>
        </div>
    </div><div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-6 p-4 bg-light border rounded shadow">
                <h3 class="text-center">Welcome</h3>
                <p class="text-center">
                    This is a simple col-6 box with text inside. You can add more content or customize it as needed.
                </p>
            </div>
        </div>
    </div>


    @yield('content')

    <!-- Footer (optional) -->
    <footer class="text-center py-4">
        <p>&copy; 2024 Your Website. All rights reserved.</p>
    </footer>

    <!-- Add Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

