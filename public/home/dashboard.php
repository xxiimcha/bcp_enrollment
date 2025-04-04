<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'student') {
    header("Location: ../auth/login.php");
    exit();
}

$pageTitle = "Student Dashboard";
include('../partials/public_layout.php');
?>

<h1 class="text-center mb-4">Welcome to Your Dashboard</h1>

<div class="row g-4 mb-4">
    <!-- My Applications -->
    <div class="col-md-4">
        <div class="card p-4 text-center">
            <i class="fas fa-file-alt fa-3x text-primary mb-3"></i>
            <h5 class="card-title">My Applications</h5>
            <p class="card-text">View your enrollment status.</p>
            <a href="#" class="btn btn-outline-primary btn-sm">View</a>
        </div>
    </div>

    <!-- My Profile -->
    <div class="col-md-4">
        <div class="card p-4 text-center">
            <i class="fas fa-user fa-3x text-success mb-3"></i>
            <h5 class="card-title">My Profile</h5>
            <p class="card-text">Manage your personal details and contact info.</p>
            <a href="profile.php" class="btn btn-outline-success btn-sm">View Profile</a>
        </div>
    </div>

    <!-- Notifications -->
    <div class="col-md-4">
        <div class="card p-4 text-center">
            <i class="fas fa-bell fa-3x text-warning mb-3"></i>
            <h5 class="card-title">Notifications</h5>
            <p class="card-text">Check updates from the admissions and registrar.</p>
            <a href="#" class="btn btn-outline-warning btn-sm">View Notifications</a>
        </div>
    </div>
</div>

<!-- Enrollment Progress -->
<div class="card p-4 mb-4">
    <h5 class="mb-3"><i class="fas fa-tasks me-2 text-info"></i>Enrollment Progress</h5>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">Step 1: Application Submitted</li>
        <li class="list-group-item">Step 2: Documents Reviewed</li>
        <li class="list-group-item">Step 3: Approval in Process</li>
        <li class="list-group-item">Step 4: Payment (pending)</li>
        <li class="list-group-item">Step 5: Enrollment Confirmation (pending)</li>
    </ul>
</div>

<!-- Important Announcements -->
<div class="card p-4 mb-4">
    <h5 class="mb-3"><i class="fas fa-bullhorn me-2 text-danger"></i>Important Announcements</h5>
    <ul>
        <li><strong>Enrollment deadline:</strong> March 30, 2025</li>
        <li><strong>Orientation week:</strong> April 5–9, 2025</li>
        <li><strong>Classes begin:</strong> April 15, 2025</li>
    </ul>
</div>

<!-- Quick Links & Tips -->
<div class="row g-4 mb-4">
    <!-- Quick Links -->
    <div class="col-md-6">
        <div class="card p-4">
            <h5><i class="fas fa-link me-2 text-primary"></i>Quick Links</h5>
            <ul class="list-unstyled mt-3">
                <li><a href="#" class="text-decoration-none">View Enrollment Guidelines</a></li>
                <li><a href="#" class="text-decoration-none">Upload Documents</a></li>
                <li><a href="#" class="text-decoration-none">Contact Registrar</a></li>
                <li><a href="#" class="text-decoration-none">View Calendar</a></li>
            </ul>
        </div>
    </div>

    <!-- Student Tips -->
    <div class="col-md-6">
        <div class="card p-4">
            <h5><i class="fas fa-lightbulb me-2 text-warning"></i>Student Tips & Reminders</h5>
            <ul class="mt-3">
                <li>Double-check your uploaded documents.</li>
                <li>Keep track of SMS or email updates.</li>
                <li>Always log out from public computers.</li>
                <li>Check your dashboard regularly for updates.</li>
            </ul>
        </div>
    </div>
</div>

<?php include('../partials/public_footer.php'); ?>
