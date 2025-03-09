<div class="accordion-item">
    <h2 class="accordion-header" id="headingStep6">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseStep6" aria-expanded="false" aria-controls="collapseStep6">
            Step 6: Upload Requirements
        </button>
    </h2>
    <div id="collapseStep6" class="accordion-collapse collapse" aria-labelledby="headingStep6" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <form action="process_upload.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="student_id" value="<?php echo $_SESSION['student_id']; ?>">

                <div class="mb-3">
                    <label class="form-label">Form 138 (Report Card)</label>
                    <input type="file" class="form-control" name="form_138" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Form 137</label>
                    <input type="file" class="form-control" name="form_137" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Certificate of Good Moral Character</label>
                    <input type="file" class="form-control" name="good_moral" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">PSA Authenticated Birth Certificate</label>
                    <input type="file" class="form-control" name="birth_certificate" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">2x2 ID Picture (White Background)</label>
                    <input type="file" class="form-control" name="id_picture" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Barangay Clearance</label>
                    <input type="file" class="form-control" name="barangay_clearance" required>
                </div>

                <div class="text-end mt-3">
                    <button type="submit" class="btn btn-primary">Upload Documents</button>
                </div>
            </form>
        </div>
    </div>
</div>
