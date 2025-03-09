<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Admission Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
<style>
/* General Styling */
body {
    background-color: #eef2f7;
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
}

/* Full-width Container */
.container-section {
    padding: 40px 15px;
    width: 100%;
    max-width: 100%;
    margin: 0;
}

/* Accordion Style */
.accordion-button {
    background-color: #007bff !important;
    color: white !important;
    font-weight: bold;
    border-radius: 6px !important;
    transition: all 0.3s ease-in-out;
}

.accordion-button:not(.collapsed) {
    background-color: #0056b3 !important;
    box-shadow: none !important;
}

.accordion-button:focus {
    box-shadow: none !important;
}

/* Accordion Content */
.accordion-body {
    background-color: #ffffff;
    border-radius: 6px;
    padding: 20px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

/* Form Fields */
.form-label {
    font-weight: bold;
    color: #333;
}

.form-control,
.form-select {
    border-radius: 6px;
    border: 1px solid #ced4da;
    padding: 12px;
    font-size: 16px;
    transition: all 0.3s ease-in-out;
    background-color: #f8f9fa;
}

.form-control:focus,
.form-select:focus {
    border-color: #007bff;
    box-shadow: 0 0 8px rgba(0, 123, 255, 0.25);
}

/* Button Styling */
.btn-custom {
    background-color: #007bff;
    color: white;
    font-weight: bold;
    padding: 12px 20px;
    border-radius: 6px;
    transition: background 0.3s ease-in-out, transform 0.2s;
}

.btn-custom:hover {
    background-color: #0056b3;
    transform: scale(1.05);
}

.btn-secondary {
    background-color: #6c757d;
    color: white;
    font-weight: bold;
    padding: 12px 20px;
    border-radius: 6px;
    transition: background 0.3s ease-in-out, transform 0.2s;
}

.btn-secondary:hover {
    background-color: #5a6268;
    transform: scale(1.05);
}

/* Requirements Box */
.requirements-card {
    border: 2px solid #007bff;
    border-radius: 6px;
    padding: 20px;
    background-color: white;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.requirements-card h5 {
    color: #007bff;
    font-weight: bold;
}

.requirements-card ul {
    padding-left: 20px;
    font-size: 15px;
}

/* Make the form more responsive */
@media (max-width: 768px) {
    .container-section {
        padding: 20px;
    }
    
    .btn-custom, .btn-secondary {
        width: 100%;
        text-align: center;
    }
}
</style>
<div class="container container-section">
    <h2 class="text-center mb-4 text-primary">College Admission</h2>
    <div class="row">
        <div class="col-md-8">
            <div class="accordion" id="admissionAccordion">
                
                <!-- Step 1: Basic Information -->
                <?php include('forms/step1_basic_info.php'); ?>

                <!-- Step 2: Address Information -->
                <?php include('forms/step2_address_info.php'); ?>

                <!-- Step 3: Parent/Guardian Information -->
                <?php include('forms/step3_guardian_info.php'); ?>

                <!-- Step 4: Enrollment Information -->
                <?php include('forms/step4_enrollment_info.php'); ?>

                <!-- Step 5: Educational Background -->
                <?php include('forms/step5_educational_background.php'); ?>

            </div>
        </div>

        <div class="col-md-4">
            <div class="requirements-card">
                <h5 class="text-primary">Enrollment Requirements</h5>
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
<script src="../assets/js/scripts.js"></script>
<script src="scripts/form.js"></script>

</body>
</html>
