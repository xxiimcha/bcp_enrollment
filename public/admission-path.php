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
        .container-section {
            padding: 50px 20px;
        }
        .card-custom {
            border: 2px solid #4CAF50;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .icon-container {
            width: 60px;
            height: 60px;
            background-color: #e8f5e9;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            margin: 0 auto 15px;
        }
        .btn-custom {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 20px;
            transition: background 0.3s;
        }
        .btn-custom:hover {
            background-color: #388E3C;
        }
    </style>
</head>
<body>

    <div class="container container-section">
        <div class="row justify-content-center">
            <div class="col-md-5 mb-4">
                <div class="card-custom">
                    <div class="icon-container">
                        <i class="fas fa-graduation-cap fa-2x text-success"></i>
                    </div>
                    <h3>College</h3>
                    <hr>
                    <h5>Original Copy of the following documents:</h5>
                    <p><strong>College New/Freshmen</strong></p>
                    <ul class="list-unstyled text-start">
                        <li><i class="fas fa-check text-success"></i> Form 138 (Report Card)</li>
                        <li><i class="fas fa-check text-success"></i> Form 137</li>
                        <li><i class="fas fa-check text-success"></i> Certificate of Good Moral Character</li>
                        <li><i class="fas fa-check text-success"></i> PSA Authenticated Birth Certificate</li>
                        <li><i class="fas fa-check text-success"></i> Passport Size ID Picture - 2 pcs</li>
                        <li><i class="fas fa-check text-success"></i> Barangay Clearance</li>
                    </ul>
                    <a href="college-admission.php" class="btn btn-custom">Proceed</a>
                </div>
            </div>

            <div class="col-md-5 mb-4">
                <div class="card-custom">
                    <div class="icon-container">
                        <i class="fas fa-school fa-2x text-success"></i>
                    </div>
                    <h3>Senior High School</h3>
                    <hr>
                    <h5>Original Copy of the following documents:</h5>
                    <ul class="list-unstyled text-start">
                        <li><i class="fas fa-check text-success"></i> Form 138 (Report Card)</li>
                        <li><i class="fas fa-check text-success"></i> Form 137</li>
                        <li><i class="fas fa-check text-success"></i> Certificate of Good Moral Character</li>
                        <li><i class="fas fa-check text-success"></i> 2x2 ID Picture - 2 pcs</li>
                        <li><i class="fas fa-check text-success"></i> Photocopy of NCAE Result</li>
                        <li><i class="fas fa-check text-success"></i> ESC Certificate (if applicable)</li>
                        <li><i class="fas fa-check text-success"></i> PSA Authenticated Birth Certificate</li>
                        <li><i class="fas fa-check text-success"></i> Barangay Clearance</li>
                        <li><i class="fas fa-check text-success"></i> Photocopy of Diploma</li>
                    </ul>
                    <button class="btn btn-custom">Proceed</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
