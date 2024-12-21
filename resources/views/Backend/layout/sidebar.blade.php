
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    /* General Reset */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Arial', sans-serif;
      background-color: #f4f5f7;
      margin: 0;
      padding: 0;
      display: flex;
    }

    /* Sidebar Container */
    .sidebar {
      width: 250px;
      background-color: #1d1f27;
      color: #ffffff;
      height: 100vh;
      position: fixed;
      top: 0;
      left: 0;
      display: flex;
      flex-direction: column;
      padding: 20px 0;
    }

    /* Sidebar Header */
    .sidebar h3 {
      font-size: 22px;
      font-weight: bold;
      text-align: center;
      color: #ffffff;
      margin-bottom: 20px;
      border-bottom: 2px solid #343744;
      padding-bottom: 10px;
    }

    /* Sidebar Links */
    .sidebar a {
      text-decoration: none;
      display: flex;
      align-items: center;
      padding: 15px 20px;
      font-size: 16px;
      color: #ffffff;
      transition: background-color 0.3s, padding-left 0.3s;
    }

    .sidebar a i {
      margin-right: 15px;
      font-size: 18px;
    }

    .sidebar a:hover {
      background-color: #343744;
      padding-left: 25px;
    }

    /* Dropdown Submenu Styling */
    .sidebar .dropdown-toggle {
      cursor: pointer;
      display: flex;
      align-items: center;
      padding: 15px 20px;
      font-size: 16px;
      color: #ffffff;
      transition: background-color 0.3s, padding-left 0.3s;
    }

    .sidebar .dropdown-toggle i {
      margin-right: 15px;
      font-size: 18px;
    }

    .sidebar .dropdown-toggle:hover {
      background-color: #343744;
      padding-left: 25px;
    }

    .sidebar .submenu {
      display: none;
      flex-direction: column;
      background-color: #2d2f39;
      padding-left: 20px;
    }

    .sidebar .submenu a {
      font-size: 14px;
      padding: 10px 20px;
    }

    .sidebar .submenu a:hover {
      padding-left: 25px;
    }

    /* Footer Section */
    .sidebar .footer {
      margin-top: auto;
      text-align: center;
      padding: 15px;
      border-top: 1px solid #2d2f39;
    }

    .sidebar .footer a {
      color: #ff6b6b;
      font-size: 14px;
      text-decoration: none;
      transition: color 0.3s;
    }

    .sidebar .footer a:hover {
      color: #ff9b9b;
    }

  </style>
</head>
<body>

            <div class="sidebar">
            <!-- Sidebar Header -->
            <h3>Dashboard</h3>

            <!-- Sidebar Links -->
            <a href="{{ route('adminDashboard') }}">
                <i class="fas fa-home"></i> Dashboard
            </a>

            <!-- User Management -->
            <a href="{{ route('listOfUser') }}">
                <i class="fas fa-list"></i> User List
            </a>

            <!-- Catalog Menu -->
            <div class="dropdown-toggle active" onclick="toggleSubmenu(this)">
                <i class="fas fa-th-list"></i> Catalog
            </div>
            <div class="submenu" style="display: flex;">
                <a href="{{ route('adminHomeSlider') }}"><i class="fas fa-images"></i> Home Slider</a>
                <a href="{{ route('adminProducts.create') }}"><i class="fas fa-plus-circle"></i> Add New Product</a>
                <a href="{{ route('adminProducts') }}"><i class="fas fa-boxes"></i> All Products</a>
            </div>

            <!-- Footer Section -->
            <hr>
            <div class="footer">
                <a href="{{ route('logOut') }}"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
            </div>

<script>
    // Toggle Submenu Visibility
    function toggleSubmenu(element) {
      const submenu = element.nextElementSibling;

      // Toggle "active" class and submenu display
      if (submenu.style.display === 'flex') {
        submenu.style.display = 'none';
        element.classList.remove('active');
      } else {
        submenu.style.display = 'flex';
        element.classList.add('active');
      }
    }
  </script>
