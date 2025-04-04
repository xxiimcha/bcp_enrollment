<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/bcp_enrollment/config/database.php');

// Fetch logged-in user info (if available)
$loggedUser = null;
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE id = $userId LIMIT 1");
    if ($result && mysqli_num_rows($result) > 0) {
        $loggedUser = mysqli_fetch_assoc($result);
    }
}

if (!isset($pageTitle)) $pageTitle = "BCP Enrollment System";
ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?></title>
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

        .user-info {
            color: #FFD700;
            font-weight: 600;
            margin-right: 15px;
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
        <a class="navbar-brand" href="/bcp_enrollment/">BCP Enrollment</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="/bcp_enrollment/">Home</a></li>
                <?php if ($loggedUser): ?>
                    <li class="nav-item d-flex align-items-center px-2">
                        <span class="user-info">
                            <i class="fas fa-user-circle me-1"></i>
                            <?= htmlspecialchars($loggedUser['first_name'] . ' ' . $loggedUser['last_name']) ?>
                        </span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/bcp_enrollment/controllers/AuthController.php?action=logout">Logout</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link" href="/bcp_enrollment/auth/">Login</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<div class="container my-5">
