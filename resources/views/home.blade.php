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
    <div class="container">
        <!-- Banner Section -->
        <div class="banner">
            <img src="{{ asset('assets/web.webp') }}" alt="Homepage Banner" class="img-fluid">
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

