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
    <footer class="bg-light py-5">
        <div class="container">
            <div class="row text-center">
                <!-- Footer Branding -->
                <div class="col-md-4 mb-3">
                    <h5 class="text-primary">Your Website</h5>
                    <p>&copy; 2025 Your Website. All rights reserved.</p>
                </div>

                <!-- Quick Links -->
                <div class="col-md-4 mb-3">
                    <h6 class="text-uppercase">Quick Links</h6>
                    <ul class="list-unstyled">
                        <li><a href="/" class="text-decoration-none text-dark">Home</a></li>
                        <li><a href="/about" class="text-decoration-none text-dark">About</a></li>
                        <li><a href="/contact" class="text-decoration-none text-dark">Contact</a></li>
                        <li><a href="/privacy&policy" class="text-decoration-none text-dark">Privacy & Policy </a></li>
                        <li><a href="/terms" class="text-decoration-none text-dark">Term Conditions</a></li>
                    </ul>
                </div>

                <!-- Social Media Links -->
                <div class="col-md-4">
                    <h6 class="text-uppercase">Follow Us</h6>
                    <div class="d-flex justify-content-center">
                        <a href="https://facebook.com" target="_blank" class="mx-2 text-primary">
                            <i class="fab fa-facebook fa-lg"></i>
                        </a>
                        <a href="https://twitter.com" target="_blank" class="mx-2 text-info">
                            <i class="fab fa-twitter fa-lg"></i>
                        </a>
                        <a href="https://instagram.com" target="_blank" class="mx-2 text-danger">
                            <i class="fab fa-instagram fa-lg"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <!-- Optional Bootstrap JS (if needed) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

