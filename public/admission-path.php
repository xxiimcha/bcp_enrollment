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
            margin: 0;
            padding: 0;
        }

        /* Header */
        .header-section {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 30px 20px;
            margin-bottom: 20px;
            border-bottom: 5px solid #0056b3;
        }

        .header-section h1 {
            font-size: 28px;
            font-weight: bold;
        }

        .header-section h2 {
            font-size: 22px;
            margin-top: 5px;
        }

        /* Container */
        .container-section {
            padding: 40px 20px;
        }

        /* Card Styling */
        .card-custom {
            border: 2px solid #007bff;
            border-radius: 12px;
            padding: 30px;
            text-align: center;
            background: white;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            cursor: pointer;
            text-decoration: none;
        }

        .card-custom:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
            border-color: #0056b3;
        }

        /* Icon Styling */
        .icon-container {
            width: 70px;
            height: 70px;
            background: #e3f2fd;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            margin: 0 auto 15px;
        }

        .icon-container i {
            font-size: 32px;
            color: #007bff;
        }

        /* Titles */
        .card-custom h3 {
            font-weight: bold;
            color: #343a40;
            margin-bottom: 10px;
        }

        .card-custom hr {
            width: 50px;
            border: 2px solid #007bff;
            margin: 10px auto;
            opacity: 1;
        }

        /* List Styling */
        .requirements-list {
            text-align: left;
            padding: 0;
            list-style: none;
        }

        .requirements-list li {
            font-size: 16px;
            font-weight: 500;
            padding: 8px 0;
            display: flex;
            align-items: center;
        }

        .requirements-list li i {
            margin-right: 10px;
            font-size: 18px;
            color: #007bff;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .container-section {
                padding: 20px;
            }
        }
    </style>
</head>
<body>

    <!-- Header Section -->
    <div class="header-section">
        <h1>Bestlink College of the Philippines</h1>
        <h2>Application Process</h2>
    </div>

    <!-- Main Content -->
    <div class="container container-section">
        <div class="row justify-content-center">
            <!-- College Section -->
            <div class="col-md-5 mb-4">
                <a href="admission-form.php?college" class="card-custom d-block">
                    <div class="icon-container">
                        <i class="fas fa-university"></i>
                    </div>
                    <h3>College</h3>
                    <hr>
                    <h5><strong>Original Copy of the following documents:</strong></h5>
                    <p><strong>College New/Freshmen</strong></p>
                    <ul class="requirements-list">
                        <li><i class="fas fa-check-circle"></i> Form 138 (Report Card)</li>
                        <li><i class="fas fa-check-circle"></i> Form 137</li>
                        <li><i class="fas fa-check-circle"></i> Certificate of Good Moral Character</li>
                        <li><i class="fas fa-check-circle"></i> PSA Authenticated Birth Certificate</li>
                        <li><i class="fas fa-check-circle"></i> Passport Size ID Picture - 2 pcs</li>
                        <li><i class="fas fa-check-circle"></i> Barangay Clearance</li>
                    </ul>
                    <p><strong>College Transferee</strong></p>
                    <ul class="requirements-list">
                        <li><i class="fas fa-check-circle"></i> Transcript of Records</li>
                        <li><i class="fas fa-check-circle"></i> Honorable Dismissal</li>
                        <li><i class="fas fa-check-circle"></i> Certificate of Good Moral Character</li>
                        <li><i class="fas fa-check-circle"></i> PSA Authenticated Birth Certificate</li>
                        <li><i class="fas fa-check-circle"></i> Passport Size ID Picture - 2 pcs</li>
                        <li><i class="fas fa-check-circle"></i> Barangay Clearance</li>
                    </ul>
                </a>
            </div>

            <!-- Senior High School Section -->
            <div class="col-md-5 mb-4">
                <a href="admission-form.php?shs" class="card-custom d-block">
                    <div class="icon-container">
                        <i class="fas fa-school"></i>
                    </div>
                    <h3>Senior High School</h3>
                    <hr>
                    <h5><strong>Original Copy of the following documents:</strong></h5>
                    <ul class="requirements-list">
                        <li><i class="fas fa-check-circle"></i> Form 138 (Report Card)</li>
                        <li><i class="fas fa-check-circle"></i> Form 137</li>
                        <li><i class="fas fa-check-circle"></i> Certificate of Good Moral Character</li>
                        <li><i class="fas fa-check-circle"></i> 2x2 ID Picture - 2 pcs</li>
                        <li><i class="fas fa-check-circle"></i> Photocopy of NCAE Result</li>
                        <li><i class="fas fa-check-circle"></i> ESC Certificate (if applicable)</li>
                        <li><i class="fas fa-check-circle"></i> PSA Authenticated Birth Certificate</li>
                        <li><i class="fas fa-check-circle"></i> Barangay Clearance</li>
                        <li><i class="fas fa-check-circle"></i> Photocopy of Diploma</li>
                    </ul>
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
