<?php
$is_shs = isset($_GET['shs']); // Check if "shs" is in the URL
?>

<div class="accordion-item">
    <h2 class="accordion-header" id="headingBasicInfo">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBasicInfo">
            Step 1: Basic Information
        </button>
    </h2>
    <div id="collapseBasicInfo" class="accordion-collapse collapse show">
        <div class="accordion-body">
            <form>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Admission Type *</label>
                        <select class="form-select" required>
                            <?php if ($is_shs): ?>
                                <option value="" selected disabled>Select Admission Type</option>
                                <option value="incoming_grade11">Incoming Grade 11</option>
                                <option value="incoming_grade12">Incoming Grade 12</option>
                            <?php else: ?>
                                <option value="" selected disabled>Select Admission Type</option>
                                <option value="new_regular">New Regular</option>
                                <option value="transferee">Transferee</option>
                                <option value="returnee">Returnee</option>
                            <?php endif; ?>
                        </select>
                    </div>

                    <!-- Show LRN Field Only If SHS -->
                    <?php if ($is_shs): ?>
                    <div class="col-md-6">
                        <label class="form-label">Learner Reference Number (LRN) *</label>
                        <input type="text" class="form-control" placeholder="Enter LRN" required>
                    </div>
                    <?php endif; ?>
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

                <div class="row mb-3">
                    <div class="col-md-3">
                        <label class="form-label">Sex *</label>
                        <select class="form-select" required>
                            <option value="" selected disabled>Select</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Civil Status *</label>
                        <select class="form-select" required>
                            <option value="" selected disabled>Select</option>
                            <option value="single">Single</option>
                            <option value="married">Married</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Religion</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Disability</label>
                        <select class="form-select">
                            <option value="" selected disabled>Select</option>
                            <option value="none">None</option>
                            <option value="others">Others</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3">
                        <label class="form-label">Indigenous People Group</label>
                        <select class="form-select">
                            <option value="" selected disabled>Select</option>
                            <option value="none">None</option>
                            <option value="others">Others</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Birthday *</label>
                        <input type="date" class="form-control" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Email Address *</label>
                        <input type="email" class="form-control" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Contact Number *</label>
                        <input type="text" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <label class="form-label">Facebook / Messenger Name *</label>
                        <input type="text" class="form-control" required>
                    </div>
                </div>

                <div class="text-end mt-4">
                    <button type="button" class="btn btn-custom">Next</button>
                </div>
            </form>
        </div>
    </div>
</div>
