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
            <form id="basicInfoForm">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Admission Type *</label>
                        <select class="form-select required-field" id="admissionType" required>
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

                    <?php if ($is_shs): ?>
                    <div class="col-md-6">
                        <label class="form-label">Learner Reference Number (LRN) *</label>
                        <input type="text" class="form-control required-field" id="lrn" placeholder="Enter LRN" required>
                    </div>
                    <?php endif; ?>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3">
                        <label class="form-label">Last Name *</label>
                        <input type="text" class="form-control required-field" id="lastName" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">First Name *</label>
                        <input type="text" class="form-control required-field" id="firstName" required>
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
                        <select class="form-select required-field" id="sex" required>
                            <option value="" selected disabled>Select</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Civil Status *</label>
                        <select class="form-select required-field" id="civilStatus" required>
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
                        <label class="form-label">Birthday *</label>
                        <input type="date" class="form-control required-field" id="birthday" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3">
                        <label class="form-label">Email Address *</label>
                        <input type="email" class="form-control required-field" id="email" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Contact Number *</label>
                        <input type="text" class="form-control required-field" id="contactNumber" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Facebook / Messenger Name *</label>
                        <input type="text" class="form-control required-field" id="facebookName" required>
                    </div>
                </div>

                <div class="text-end mt-4">
                    <button type="button" class="btn btn-custom" id="nextButton">Next</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.getElementById("nextButton").addEventListener("click", function () {
    let allFieldsFilled = true;
    const requiredFields = document.querySelectorAll(".required-field");

    requiredFields.forEach(field => {
        if (!field.value.trim()) {
            allFieldsFilled = false;
            field.classList.add("is-invalid"); // Highlight missing fields
        } else {
            field.classList.remove("is-invalid");
        }
    });

    if (allFieldsFilled) {
        // Move to the next accordion step
        const nextAccordion = document.getElementById("collapseBasicInfo").nextElementSibling;
        if (nextAccordion) {
            new bootstrap.Collapse(nextAccordion, { toggle: true });
        }
    }
});
</script>
