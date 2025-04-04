<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'student') {
    header("Location: ../auth/login.php");
    exit();
}

require_once(BASE_PATH . '/config/database.php');

$pageTitle = "My Profile";

// Fetch user data
$userId = $_SESSION['user_id'];
$query = "SELECT * FROM users WHERE id = $userId LIMIT 1";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

include('../partials/public_layout.php');
?>

<!-- Page Title -->
<div class="text-center mb-5">
    <h2 class="fw-bold">My Profile</h2>
    <p class="text-muted">Review your personal and account information</p>
</div>

<!-- Profile Card -->
<div class="d-flex justify-content-center">
    <div class="card shadow-sm border-0 w-100" style="max-width: 800px;">
        <div class="card-header bg-white border-bottom">
            <h5 class="mb-0 fw-semibold">Account Information</h5>
        </div>
        <div class="card-body">
            <div class="row gy-3">
                <div class="col-md-6">
                    <p class="mb-1"><strong>First Name:</strong></p>
                    <p><?= htmlspecialchars($user['first_name']) ?></p>

                    <p class="mb-1"><strong>Last Name:</strong></p>
                    <p><?= htmlspecialchars($user['last_name']) ?></p>

                    <p class="mb-1"><strong>Email:</strong></p>
                    <p><?= htmlspecialchars($user['email']) ?></p>
                </div>
                <div class="col-md-6">
                    <p class="mb-1"><strong>Username:</strong></p>
                    <p><?= htmlspecialchars($user['username']) ?></p>

                    <p class="mb-1"><strong>Role:</strong></p>
                    <p><?= ucfirst($user['role']) ?></p>

                    <p class="mb-1"><strong>Status:</strong></p>
                    <p><?= htmlspecialchars($user['status']) ?></p>
                </div>
            </div>
        </div>
        <div class="card-footer text-end bg-white border-top">
            <a href="#" class="btn btn-primary">Edit Profile</a>
        </div>
    </div>
</div>

<?php include('../partials/public_footer.php'); ?>
