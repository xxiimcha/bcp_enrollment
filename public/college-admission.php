<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Admission Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<!-- ======= HEADER ======= -->
<header class="bg-primary text-white py-3">
    <div class="container text-center">
        <h3 class="mb-1">Bestlink College of the Philippines</h3>
        <p class="mb-0">College Admission Form</p>
    </div>
</header>

<!-- ======= MAIN CONTENT ======= -->
<div class="container container-section">
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
                
                <!-- Step 6: Upload Requirements -->
                <?php include('forms/step6_upload_requirement.php'); ?>

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

<!-- ======= FOOTER ======= -->
<footer class="bg-dark text-white text-center py-3 mt-5">
    <p class="mb-0">© 2025 Bestlink College of the Philippines - All Rights Reserved</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/scripts.js"></script>
<script src="scripts/form.js"></script>

</body>
</html>
