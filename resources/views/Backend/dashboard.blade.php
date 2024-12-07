
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title> Admin Dashboard </title>
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
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h3>Dashboard</h3>
        <a href="#userSubMenu" data-bs-toggle="collapse" class="dropdown-toggle">User Management</a>
        <div class="collapse ps-3" id="userSubMenu">
            <a href="{{ route('listOfUser') }}">User List</a>
        </div>










        <hr>
        <a href="{{ route('logOut') }}">Logout</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Admin Dashboard</a>
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


        <!-- Content -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
