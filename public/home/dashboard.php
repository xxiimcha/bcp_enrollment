<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard - BCP Enrollment</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Poppins', sans-serif;
            color: #333;
        }

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

        .dashboard-header {
            padding: 40px 20px;
            background: linear-gradient(to right, #0048B3, #0057D9);
            color: white;
            text-align: center;
        }

        .dashboard-header h1 {
            font-size: 3rem;
            font-weight: bold;
            color: #FFD700;
        }

        .dashboard-section {
            padding: 40px 20px;
        }

        .card {
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .footer {
            background-color: #0048B3;
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 1rem;
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
                <li class="nav-item"><a class="nav-link" href="../public/dashboard.php">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="#">My Applications</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Profile</a></li>
                <li class="nav-item"><a class="nav-link btn btn-warning text-dark" href="../controllers/AuthController.php?action=logout">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Dashboard Header -->
<section class="dashboard-header">
    <h1>Welcome, Student!</h1>
    <p class="lead">This is your personal dashboard. Manage your enrollment status and profile easily.</p>
</section>

<!-- Dashboard Cards -->
<section class="dashboard-section container">
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card p-4 text-center">
                <i class="fas fa-file-alt fa-3x text-primary mb-3"></i>
                <h5 class="card-title">My Applications</h5>
                <p class="card-text">Check the status of your enrollment applications.</p>
                <a href="#" class="btn btn-outline-primary btn-sm">View Applications</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-4 text-center">
                <i class="fas fa-user-circle fa-3x text-success mb-3"></i>
                <h5 class="card-title">Profile</h5>
                <p class="card-text">View and update your personal information.</p>
                <a href="#" class="btn btn-outline-success btn-sm">Go to Profile</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-4 text-center">
                <i class="fas fa-question-circle fa-3x text-warning mb-3"></i>
                <h5 class="card-title">Help & Support</h5>
                <p class="card-text">Need assistance? Reach out to our support team.</p>
                <a href="#" class="btn btn-outline-warning btn-sm">Get Help</a>
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
