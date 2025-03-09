<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BCP Enrollment System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style>
        /* General Styling */
        body {
            background-color: #f8f9fa;
            font-family: 'Poppins', sans-serif;
            color: #333;
        }

        /* Navbar */
        .navbar {
            background: #0057D9;
            padding: 15px;
        }

        .navbar-brand {
            font-size: 1.6rem;
            font-weight: bold;
        }

        .nav-link {
            color: white !important;
            font-weight: 500;
            transition: 0.3s ease-in-out;
        }

        .nav-link:hover {
            color: #FFD700 !important;
        }

        /* Hero Section */
        .hero-section {
            position: relative;
            height: 85vh;
            display: flex;
            align-items: center;
            text-align: left;
            padding: 40px;
            background: linear-gradient(to right, #0048B3, #0057D9);
            color: white;
        }

        .hero-content {
            z-index: 1;
        }

        .hero-section h1 {
            font-size: 3.5rem;
            font-weight: bold;
            color: #FFD700;
        }

        .hero-section p {
            font-size: 1.2rem;
            max-width: 600px;
            line-height: 1.6;
        }

        .btn-custom {
            padding: 14px 30px;
            font-size: 1.2rem;
            border-radius: 8px;
            font-weight: bold;
            transition: all 0.3s ease-in-out;
            border: none;
        }

        .btn-custom:hover {
            transform: scale(1.05);
            box-shadow: 0px 10px 20px rgba(255, 215, 0, 0.3);
        }

        .hero-image {
            max-width: 90%;
            border-radius: 12px;
            box-shadow: 0 8px 18px rgba(0, 0, 0, 0.2);
            animation: fadeIn 1s ease-in-out;
        }

        /* How It Works Section */
        .steps {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
            text-align: center;
        }

        .steps:hover {
            transform: translateY(-5px);
        }

        /* FAQ */
        .accordion-button {
            font-weight: 600;
            background-color: #0057D9;
            color: white;
        }

        .accordion-button:hover {
            background-color: #0048B3;
        }

        .accordion-button:not(.collapsed) {
            background-color: #0048B3;
        }

        .accordion-body {
            background-color: #ffffff;
            color: #333;
        }

        /* Footer */
        .footer {
            background-color: #0048B3;
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 1rem;
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .hero-section {
                flex-direction: column;
                text-align: center;
                height: auto;
                padding: 50px 20px;
            }

            .hero-content h1 {
                font-size: 2.5rem;
            }

            .hero-image {
                margin-top: 20px;
            }

            .hero-section p {
                max-width: 100%;
            }
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">BCP Enrollment</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#how-it-works">How It Works</a></li>
                    <li class="nav-item"><a class="nav-link" href="#faq">FAQ</a></li>
                    <li class="nav-item"><a class="nav-link btn btn-warning text-dark" href="public/admission-process.php">Enroll Now</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section container-fluid">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="hero-content">
                        <h1>Welcome to BCP Online Enrollment</h1>
                        <p class="lead">A seamless and hassle-free way to enroll for your academic journey.</p>
                        <div>
                            <a href="public/admission-process.php" class="btn btn-warning btn-custom">Enroll Now</a>
                            <a href="auth/" class="btn btn-outline-light btn-custom">Login</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <img src="assets/images/bcp.jpg" alt="Students Learning" class="hero-image">
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section id="how-it-works" class="container mt-5">
        <h2 class="text-center text-primary mb-4">How to Enroll</h2>
        <div class="row text-center">
            <div class="col-md-4">
                <div class="steps">
                    <i class="fas fa-user-plus fa-3x mb-3 text-primary"></i>
                    <h4>Step 1: Register</h4>
                    <p>Create an account and fill out your personal details.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="steps">
                    <i class="fas fa-file-upload fa-3x mb-3 text-success"></i>
                    <h4>Step 2: Upload Documents</h4>
                    <p>Submit the required documents for verification.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="steps">
                    <i class="fas fa-check-circle fa-3x mb-3 text-warning"></i>
                    <h4>Step 3: Get Approved</h4>
                    <p>Once verified, confirm your enrollment and start your journey!</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer mt-5">
        <p>&copy; 2025 Bestlink College of the Philippines | All Rights Reserved</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
