<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $page_title ?? "Technology and Growth" }}</title>
    <!-- Include CSS for styling -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Add Bootstrap or other CSS frameworks if necessary -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">

    @yield('custom-style')
</head>
<body> 

    <!-- Header and Navigation -->
    @include('frontend.layout.header')


    <!-- Main Content Section -->
    @yield('main-content')

    <!-- Footer (optional) -->
    @include('frontend.layout.footer')

    <!-- Add Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>

    @yield('custom-script')
</body>
</html>

