<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer Example</title>

    <!-- Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!-- Bootstrap CSS (optional, if not already included) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        /* Footer Styles */
        footer {
            background-color: #f8f9fa; /* Light gray background */
            color: #6c757d; /* Subtle text color */
            border-top: 1px solid #dee2e6; /* Soft border */
        }

        footer p {
            font-size: 14px;
            margin-bottom: 0;
        }

        /* Social Media Links */
        .social-links a {
            color: #6c757d; /* Default color for icons */
            transition: color 0.3s ease;
        }

        .social-links a:hover {
            color: #007bff; /* Hover color */
        }

        /* Responsive Adjustments */
        @media (max-width: 576px) {
            footer p {
                font-size: 12px;
            }

            .social-links a {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>


    <!-- Footer -->
    <footer class="text-center py-4 bg-light">
        <p class="mb-2">&copy; 2025 Your Website. All rights reserved.</p>
        <div class="social-links">
            <a href="https://facebook.com" target="_blank" class="mx-2 text-decoration-none">
                <i class="fab fa-facebook fa-lg"></i>
            </a>
            <a href="https://twitter.com" target="_blank" class="mx-2 text-decoration-none">
                <i class="fab fa-twitter fa-lg"></i>
            </a>
            <a href="https://instagram.com" target="_blank" class="mx-2 text-decoration-none">
                <i class="fab fa-instagram fa-lg"></i>
            </a>
        </div>
    </footer>

    <!-- Optional Bootstrap JS (if needed) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
