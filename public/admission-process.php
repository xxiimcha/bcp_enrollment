<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Process - Enrollment System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .header-section {
            background-color: #0d47a1;
            color: white;
            text-align: center;
            padding: 40px 20px;
        }
        .content-section {
            padding: 50px 20px;
        }
        .card {
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .requirements-list {
            padding-left: 20px;
        }
        .footer {
            background-color: #000;
            color: white;
            padding: 15px 0;
            text-align: center;
        }
        .btn-custom {
            background-color: #0d47a1;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background 0.3s;
        }
        .btn-custom:hover {
            background-color: #063970;
            color: white;
        }
    </style>
</head>
<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Enrollment System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Programs</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Admissions</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <div class="header-section">
        <h2>Bestlink College of the Philippines Enrollment Management System</h2>
        <h1 class="fw-bold">Application Process</h1>
    </div>

    <!-- Content -->
    <div class="container content-section">
        <p class="text-center lead">The Admission's online application process is quick, easy, and secure. You will receive a unique applicant number, allowing you to track and manage your application efficiently.</p>

        <h3 class="text-primary">Basic Requirements</h3>
        <ul class="list-group mb-4">
            <li class="list-group-item">You will graduate from Junior High School this year or have already graduated.</li>
            <li class="list-group-item">You want to study and develop yourself in a new environment.</li>
            <li class="list-group-item">You can write and communicate in the language used in the studies.</li>
            <li class="list-group-item">You will graduate ALS – Alternative Learning System, PEPT – Philippine Educational Placement Test.</li>
        </ul>

        <div class="row">
            <div class="col-md-6">
                <div class="card p-4 mb-4">
                    <h4><i class="fas fa-search text-primary"></i> Find a Track or Course of Your Interest</h4>
                    <p>Use the course finder to explore various opportunities. Click the course listing to start your application.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card p-4 mb-4">
                    <h4><i class="fas fa-file-alt text-success"></i> Fill in and Submit an Online Application</h4>
                    <p>Provide personal details, academic records, and references from your teacher(s).</p>
                </div>
            </div>
        </div>

        <div class="card p-4 my-4">
            <h3 class="text-primary"><i class="fas fa-file-upload"></i> Required Documents</h3>
            <div class="row">
                <div class="col-md-4">
                    <h5>College Freshmen</h5>
                    <ul class="requirements-list">
                        <li>Form 138 (Report Card)</li>
                        <li>Certificate of Good Moral Character</li>
                        <li>PSA Authenticated Birth Certificate</li>
                        <li>Barangay Clearance</li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>College Transferee</h5>
                    <ul class="requirements-list">
                        <li>Transcript of Records</li>
                        <li>Honorable Dismissal</li>
                        <li>Certificate of Good Moral Character</li>
                        <li>PSA Authenticated Birth Certificate</li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Senior High School</h5>
                    <ul class="requirements-list">
                        <li>Form 138 (Report Card)</li>
                        <li>Photocopy of NCAE Result</li>
                        <li>ESC Certificate (if applicable)</li>
                        <li>PSA Authenticated Birth Certificate</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="text-center mt-4">
            <a href="#" class="btn btn-custom">Check Your DepEd Voucher Eligibility</a>
        </div>
        <div class="text-center mt-4">
            <a href="admission-path.php" class="btn btn-custom">Proceed to admission</a>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer mt-5">
        <p>&copy; 2025 Enrollment System | Designed for a seamless student experience</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
