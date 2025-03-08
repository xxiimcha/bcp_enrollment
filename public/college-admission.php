<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Admission Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style>
        body {
            background-color: #eef2f7;
        }
        .container-section {
            padding: 50px 20px;
        }
        .form-card {
            border: 2px solid #0d6efd;
            border-radius: 10px;
            padding: 30px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .step {
            background: #0d6efd;
            color: white;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }
        .step i {
            margin-right: 10px;
        }
        .btn-custom {
            background-color: #0d6efd;
            color: white;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 20px;
            transition: background 0.3s;
        }
        .btn-custom:hover {
            background-color: #0b5ed7;
        }
        .requirements-card {
            border: 2px solid #0d6efd;
            border-radius: 10px;
            padding: 20px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container container-section">
        <h2 class="text-center mb-4 text-primary">College Admission</h2>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="form-card">
                    <div class="step">
                        <i class="fas fa-user"></i> <strong>Step 1: Basic Information</strong>
                    </div>
                    <form>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Admission Type *</label>
                                <select class="form-select" required>
                                    <option value="" selected disabled>Select Admission Type</option>
                                    <option value="new_regular">New Regular</option>
                                    <option value="transferee">Transferee</option>
                                    <option value="returnee">Returnee</option>
                                </select>
                            </div>
                            <div class="col-md-6 d-flex align-items-center">
                                <input type="checkbox" id="workingStudent" class="me-2">
                                <label for="workingStudent" class="form-label">Are you a Working Student?</label>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label class="form-label">Last Name *</label>
                                <input type="text" class="form-control" required>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">First Name *</label>
                                <input type="text" class="form-control" required>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Middle Name</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Suffix</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="text-end mt-4">
                            <button type="button" class="btn btn-custom">Next</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="requirements-card">
                    <h4 class="text-primary"><i class="fas fa-file-alt"></i> Enrollment Requirements</h4>
                    <ul>
                        <li>Form 138 (Report Card)</li>
                        <li>Form 137</li>
                        <li>Certificate of Good Moral Character</li>
                        <li>PSA Authenticated Birth Certificate</li>
                        <li>2x2 ID Picture (White Background) - 2 pcs</li>
                        <li>Barangay Clearance</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
