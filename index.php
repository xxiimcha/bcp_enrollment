<?php
session_start();
$pageTitle = "BCP Enrollment System";

require_once('config/database.php'); // Database connection

$loggedUser = null;
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE id = $userId LIMIT 1");
    if ($result && mysqli_num_rows($result) > 0) {
        $loggedUser = mysqli_fetch_assoc($result);
    }
}

include('public/partials/public_layout.php');
?>

<!-- Hero Section -->
<section class="hero-section container-fluid mb-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-12 mb-4 mb-lg-0">
                <div class="hero-content">
                    <h1 class="text-warning fw-bold mb-3">Welcome to BCP Online Enrollment</h1>
                    <p class="lead text-light-emphasis mb-4">
                        A seamless and hassle-free way to enroll for your academic journey at Bestlink College of the Philippines.
                    </p>

                    <?php if ($loggedUser): ?>
                        <div>
                            <a href="public/home/dashboard.php" class="btn btn-primary btn-lg px-4">Go to Dashboard</a>
                        </div>
                    <?php else: ?>
                        <div class="d-flex flex-wrap gap-3">
                            <a href="public/admission-process.php" class="btn btn-warning btn-lg px-4">Enroll Now</a>
                            <a href="auth/" class="btn btn-outline-light btn-lg px-4">Login</a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-6 col-12 text-center">
                <img src="assets/images/bcp.jpg" alt="Students Learning" class="hero-image img-fluid shadow rounded">
            </div>
        </div>
    </div>
</section>

<!-- How It Works Section -->
<section id="how-it-works" class="container mb-5">
    <h2 class="text-center text-primary fw-bold mb-5">How to Enroll</h2>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="steps h-100 p-4 border rounded text-center shadow-sm bg-white">
                <div class="mb-3"><i class="fas fa-user-plus fa-3x text-primary"></i></div>
                <h4 class="fw-semibold mb-2">Step 1: Register</h4>
                <p class="text-muted">Create your account and enter your basic personal information.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="steps h-100 p-4 border rounded text-center shadow-sm bg-white">
                <div class="mb-3"><i class="fas fa-file-upload fa-3x text-success"></i></div>
                <h4 class="fw-semibold mb-2">Step 2: Upload Documents</h4>
                <p class="text-muted">Submit all required documents for your application review.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="steps h-100 p-4 border rounded text-center shadow-sm bg-white">
                <div class="mb-3"><i class="fas fa-check-circle fa-3x text-warning"></i></div>
                <h4 class="fw-semibold mb-2">Step 3: Get Approved</h4>
                <p class="text-muted">Wait for your documents to be verified and finalize your enrollment.</p>
            </div>
        </div>
    </div>
</section>

<?php include('public/partials/public_footer.php'); ?>
