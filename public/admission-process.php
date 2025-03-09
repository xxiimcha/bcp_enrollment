<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Process - Enrollment System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style>
        /* General Styling */
        body {
            background-color: #f8f9fa;
            font-family: 'Poppins', sans-serif;
        }

        /* Header Section */
        .header-section {
            background: linear-gradient(to right, #0d47a1, #0057d9);
            color: white;
            text-align: center;
            padding: 50px 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
        .content-section {
            padding: 50px 20px;
            margin: 0; /* Ensures there is no margin */
            width: 100%;
            max-width: 100%;
        }

        /* Card Styling */
        .card {
            border: none;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            border-radius: 10px;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
        }

        /* List Group Styling */
        .list-group-item {
            font-size: 16px;
            font-weight: 500;
            background-color: white;
            border: none;
        }

        /* Footer */
        .footer {
            background-color: #222;
            color: white;
            padding: 20px 0;
            text-align: center;
            font-size: 14px;
        }

        /* Custom Buttons */
        .btn-custom {
            background-color: #0d47a1;
            color: white;
            padding: 12px 25px;
            border-radius: 6px;
            font-weight: bold;
            transition: background 0.3s ease-in-out, transform 0.2s ease-in-out;
        }

        .btn-custom:hover {
            background-color: #063970;
            transform: scale(1.05);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .content-section {
                padding: 30px 15px;
            }
            .btn-custom {
                width: 100%;
            }
        }

        /* Styling for Requirements Section */
.requirements-list li {
    font-size: 14px;
    font-weight: 500;
    padding: 8px 0;
    display: flex;
    align-items: center;
}

.requirements-list li i {
    margin-right: 10px;
    font-size: 18px;
}

/* Card Hover Effect */
.card {
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .border-end {
        border: none !important;
    }
}

    </style>
</head>
<body>

    <!-- Header -->
    <div class="header-section">
        <h2>Bestlink College of the Philippines Enrollment Management System</h2>
        <h1 class="fw-bold">Application Process</h1>
    </div>

    <!-- Content -->
    <div class="container content-section">
        <p class="text-center lead">The Admission's online application process is quick, easy, and secure. You will receive a unique applicant number, allowing you to track and manage your application efficiently.</p>

        <!-- Basic Requirements -->
        <h3 class="text-primary mt-4">Basic Requirements</h3>
        <ul class="list-group shadow-sm mb-4">
            <li class="list-group-item"><i class="fas fa-check-circle text-success"></i> You will graduate from Junior High School this year or have already graduated.</li>
            <li class="list-group-item"><i class="fas fa-check-circle text-success"></i> You want to study and develop yourself in a new environment.</li>
            <li class="list-group-item"><i class="fas fa-check-circle text-success"></i> You can write and communicate in the language used in the studies.</li>
            <li class="list-group-item"><i class="fas fa-check-circle text-success"></i> You will graduate ALS – Alternative Learning System, PEPT – Philippine Educational Placement Test.</li>
        </ul>

        <!-- Steps to Apply -->
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

        <!-- Required Documents Section -->
        <div class="card p-4 my-4 shadow-sm">
            <h3 class="text-primary">
                <i class="fas fa-file-upload"></i> Fill in and Submit an Online Application Form
            </h3>
            <p>In the online application form, you have to submit personal information, academic results, and references from your teacher(s).</p>

            <hr>

            <h5 class="text-dark fw-bold">Documents required for the application:</h5>
            <p class="fw-light">Original copy of the following:</p>

            <div class="row">
                <!-- College Requirements -->
                <div class="col-md-6 border-end">
                    <h4 class="fw-bold text-primary"><i class="fas fa-university"></i> College Requirements</h4>

                    <h5 class="text-dark"><i class="fas fa-user-graduate text-primary"></i> College Freshmen Requirements:</h5>
                    <ul class="requirements-list list-unstyled">
                        <li><i class="fas fa-check-circle text-primary"></i> Form 138 (Report Card)</li>
                        <li><i class="fas fa-check-circle text-primary"></i> Form 137</li>
                        <li><i class="fas fa-check-circle text-primary"></i> Certificate of Good Moral</li>
                        <li><i class="fas fa-check-circle text-primary"></i> PSA Authenticated Birth Certificate</li>
                        <li><i class="fas fa-check-circle text-primary"></i> Passport Size ID Picture (White Background, Formal Attire) - 2pcs</li>
                        <li><i class="fas fa-check-circle text-primary"></i> Barangay Clearance</li>
                    </ul>

                    <h5 class="text-dark"><i class="fas fa-exchange-alt text-success"></i> College Transferee Requirements:</h5>
                    <ul class="requirements-list list-unstyled">
                        <li><i class="fas fa-check-circle text-primary"></i> Transcript of Records from Previous School</li>
                        <li><i class="fas fa-check-circle text-primary"></i> Honorable Dismissal</li>
                        <li><i class="fas fa-check-circle text-primary"></i> Certificate of Good Moral</li>
                        <li><i class="fas fa-check-circle text-primary"></i> PSA Authenticated Birth Certificate</li>
                        <li><i class="fas fa-check-circle text-primary"></i> Passport Size ID Picture (White Background, Formal Attire) - 2pcs</li>
                        <li><i class="fas fa-check-circle text-primary"></i> Barangay Clearance</li>
                    </ul>
                </div>

                <!-- Senior High School Requirements -->
                <div class="col-md-6">
                    <h4 class="fw-bold text-primary"><i class="fas fa-school"></i> Senior High School Requirements</h4>

                    <ul class="requirements-list list-unstyled">
                        <li><i class="fas fa-check-circle text-primary"></i> Form 138 (Report Card)</li>
                        <li><i class="fas fa-check-circle text-primary"></i> Form 137</li>
                        <li><i class="fas fa-check-circle text-primary"></i> Certificate of Good Moral</li>
                        <li><i class="fas fa-check-circle text-primary"></i> 2"x2" ID Picture (White Background) - 2pcs</li>
                        <li><i class="fas fa-check-circle text-primary"></i> Photocopy of NCAE Result</li>
                        <li><i class="fas fa-check-circle text-primary"></i> ESC Certificate, if a graduate of a private Junior High School</li>
                        <li><i class="fas fa-check-circle text-primary"></i> PSA Authenticated Birth Certificate</li>
                        <li><i class="fas fa-check-circle text-primary"></i> Barangay Clearance</li>
                        <li><i class="fas fa-check-circle text-primary"></i> Photocopy of Diploma</li>
                    </ul>
                </div>
            </div>

            <hr>

            <!-- Additional Notes -->
            <ul class="mt-3">
                <li><strong>Provide a valid email:</strong> Used by the Admissions and Registrar’s Office for communication.</li>
                <li><strong>No corrections:</strong> Our personnel cannot modify your application; ensure it’s correct before submission.</li>
                <li><strong>Incorrect applications:</strong> If there are mistakes, the Admission's Office may reject the application.</li>
                <li><strong>Privacy:</strong> Your data will remain confidential and only be used for contacting you regarding your application.</li>
                <li><strong>Online Readiness:</strong> We will provide ample time to prepare for the learning modalities available.</li>
            </ul>
        </div>

        <!-- Buttons -->
        <div class="text-center mt-4">
            <a href="#" class="btn btn-custom"><i class="fas fa-file-invoice"></i> Check Your DepEd Voucher Eligibility</a>
        </div>
        <div class="text-center mt-4">
            <a href="admission-path.php" class="btn btn-custom"><i class="fas fa-arrow-right"></i> Proceed to Admission</a>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer mt-5">
        <p>&copy; 2025 Enrollment System | Designed for a seamless student experience</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
