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

                <?php
                // Determine the enrollment type from URL
                $enrollment_type = isset($_GET['college']) ? 'college' : (isset($_GET['shs']) ? 'shs' : 'default');

                // Define required documents for College & Senior High School
                $upload_requirements = [
                    'college' => [
                        'Form 138 (Report Card)' => 'form_138',
                        'Form 137' => 'form_137',
                        'Certificate of Good Moral Character' => 'good_moral',
                        'PSA Authenticated Birth Certificate' => 'birth_certificate',
                        'Passport Size ID Picture (White Background, Formal Attire) - 2 pcs' => 'id_picture',
                        'Barangay Clearance' => 'barangay_clearance'
                    ],
                    'shs' => [
                        'Form 138 (Report Card)' => 'form_138',
                        'Form 137' => 'form_137',
                        'Certificate of Good Moral Character' => 'good_moral',
                        '2x2 ID Picture (White Background) - 2 pcs' => 'id_picture',
                        'Photocopy of NCAE Result' => 'ncae_result',
                        'ESC Certificate (if applicable)' => 'esc_certificate',
                        'PSA Authenticated Birth Certificate' => 'birth_certificate',
                        'Barangay Clearance' => 'barangay_clearance',
                        'Photocopy of Diploma' => 'diploma'
                    ]
                ];

                // Get the correct requirements based on the enrollment type
                $current_uploads = $upload_requirements[$enrollment_type] ?? [];

                // Loop through the required documents and generate file upload fields dynamically
                foreach ($current_uploads as $label => $name) {
                    echo '<div class="mb-3">';
                    echo '<label class="form-label">' . $label . '</label>';
                    echo '<input type="file" class="form-control" name="' . $name . '" required>';
                    echo '</div>';
                }
                ?>

                <div class="text-end mt-3">
                    <button type="submit" class="btn btn-primary">Upload Documents</button>
                </div>
            </form>
        </div>
    </div>
</div>
