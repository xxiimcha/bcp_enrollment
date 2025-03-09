<div class="accordion-item">
    <h2 class="accordion-header" id="headingFour">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
            <i class="fas fa-school me-2"></i> <strong>Step 4: Enrollment Information</strong>
        </button>
    </h2>
    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#admissionAccordion">
        <div class="accordion-body">
            <div class="row mb-3">
                <div class="col-md-12">
                    <label class="form-label">Preferred Branch</label>
                    <select class="form-select" id="branchSelect" required>
                        <option value="" selected disabled>Select Branch</option>
                        <option value="main">Main Branch</option>
                        <option value="bulacan">Bulacan Branch</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-8">
                    <label class="form-label">Course/Strand</label>
                    <select class="form-select" id="courseSelect" required>
                        <option value="" selected disabled>Select a Branch First</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Year Level *</label>
                    <select class="form-select" id="yearLevelSelect" required>
                        <option value="" selected disabled>Select Year Level</option>
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

<script>
document.addEventListener("DOMContentLoaded", function () {
    const branchSelect = document.getElementById("branchSelect");
    const courseSelect = document.getElementById("courseSelect");
    const yearLevelSelect = document.getElementById("yearLevelSelect");

    const urlParams = new URLSearchParams(window.location.search);
    const isCollege = urlParams.has("college");

    function populateYearLevels() {
        yearLevelSelect.innerHTML = '';
        if (isCollege) {
            yearLevelSelect.innerHTML += `
                <option value="1">1st Year</option>
                <option value="2">2nd Year</option>
                <option value="3">3rd Year</option>
                <option value="4">4th Year</option>
            `;
        } else {
            yearLevelSelect.innerHTML += `
                <option value="11">Grade 11</option>
                <option value="12">Grade 12</option>
            `;
        }
    }

    function fetchCourses(branch) {
        courseSelect.innerHTML = '<option value="" selected disabled>Loading...</option>';
        
        fetch("http://localhost/bcp_registrar/api/courses.php")
            .then(response => response.json())
            .then(data => {
                if (data.success && data.courses) {
                    courseSelect.innerHTML = '<option value="" selected disabled>Select Course/Strand</option>';
                    
                    data.courses.forEach(course => {
                        if ((isCollege && course.level === "College") || (!isCollege && course.level === "SHS")) {
                            if ((branch === "main" && course.main_branch === "1") || 
                                (branch === "bulacan" && course.bulacan_branch === "1")) {
                                courseSelect.innerHTML += `<option value="${course.code}">${course.name}</option>`;
                            }
                        }
                    });

                    populateYearLevels();
                } else {
                    courseSelect.innerHTML = '<option value="" disabled>Error loading courses</option>';
                }
            })
            .catch(error => {
                console.error("Error fetching courses:", error);
                courseSelect.innerHTML = '<option value="" disabled>Error loading courses</option>';
            });
    }

    branchSelect.addEventListener("change", function () {
        const selectedBranch = branchSelect.value;
        if (selectedBranch) {
            fetchCourses(selectedBranch);
        } else {
            courseSelect.innerHTML = '<option value="" selected disabled>Select a Branch First</option>';
        }
    });

});
</script>
