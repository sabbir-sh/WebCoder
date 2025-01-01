<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $page_title ?? "Gadget-And-Services (Technology and Growth)" }}</title>
    <!-- Include CSS for styling -->
    <!-- Add Bootstrap or other CSS frameworks if necessary -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            margin: 0;
            background-color: #f8f9fa;
        }

        .sidebar {
            width: 250px;
            background-color: #020202;
            color: white;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 20px;
        }

        .sidebar h3 {
            text-align: center;
            margin-bottom: 20px;
        }

        .sidebar a {
            color: #adb5bd;
            text-decoration: none;
            font-size: 16px;
            padding: 10px 20px;
            display: block;
            border-radius: 4px;
            margin-bottom: 5px;
        }

        .sidebar a:hover,
        .sidebar a.active {
            color: white;
            background-color: #495057;
        }

        .main-content {
            margin-left: 250px;
            width: calc(100% - 250px);
        }

        .table-container {
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .navbar {
            background-color: #000000;
        }

        .navbar a {
            color: white !important;
        }
    </style>
    @yield('custom-style')
</head>
<body>

    <!-- Header and Navigation -->
    @include('Backend.layout.sidebar')

    <div class="main-content">
    <!-- Header and Navigation -->
    @include('Backend.layout.header')


    <!-- Main Content Section -->
    @yield('main-content')

    </div>
    <!-- Footer (optional) -->
    @include('Backend.layout.footer')

    <!-- Add Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    @include('toaster')
    @yield('custom-script')
</body>
</html>

