<div class="accordion-item">
    <h2 class="accordion-header" id="headingFive">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
            <i class="fas fa-graduation-cap me-2"></i> <strong>Step 5: Educational Background</strong>
        </button>
    </h2>
    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#admissionAccordion">
        <div class="accordion-body">
            <div class="row mb-3">
                <div class="col-md-8">
                    <label class="form-label">Primary *</label>
                    <input type="text" class="form-control" placeholder="Enter Primary School Name" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Year Graduated *</label>
                    <select class="form-select" required>
                        <option value="" selected disabled>Select Year</option>
                        <?php for ($year = date("Y"); $year >= 1980; $year--) { ?>
                            <option value="<?= $year; ?>"><?= $year; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-8">
                    <label class="form-label">Secondary *</label>
                    <input type="text" class="form-control" placeholder="Enter Secondary School Name" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Year Graduated *</label>
                    <select class="form-select" required>
                        <option value="" selected disabled>Select Year</option>
                        <?php for ($year = date("Y"); $year >= 1980; $year--) { ?>
                            <option value="<?= $year; ?>"><?= $year; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-8">
                    <label class="form-label">Last School Attended *</label>
                    <input type="text" class="form-control" placeholder="Enter Last School Attended" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Last School Year Attended *</label>
                    <select class="form-select" required>
                        <option value="" selected disabled>Select Year</option>
                        <?php for ($year = date("Y"); $year >= 1980; $year--) { ?>
                            <option value="<?= $year; ?>"><?= $year; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="text-end mt-4">
                <button type="button" class="btn btn-secondary">Back</button>
                <button type="button" class="btn btn-custom">Next</button>
            </div>
        </div>
    </div>
</div>
