document.addEventListener("DOMContentLoaded", function () {
    const previewButton = document.getElementById("previewButton");
    const finalSubmitButton = document.getElementById("finalSubmitButton");

    if (previewButton) {
        previewButton.addEventListener("click", function () {
            // Gather data from form fields safely using optional chaining
            const summaryBasicInfo = `
                <strong>Admission Type:</strong> ${document.getElementById("admissionType")?.value || "N/A"}<br>
                <strong>Last Name:</strong> ${document.getElementById("lastName")?.value || "N/A"}<br>
                <strong>First Name:</strong> ${document.getElementById("firstName")?.value || "N/A"}<br>
                <strong>Birthday:</strong> ${document.getElementById("birthday")?.value || "N/A"}<br>
                <strong>Email:</strong> ${document.getElementById("email")?.value || "N/A"}<br>
            `;

            const summaryAddress = `
                <strong>Address:</strong> ${document.getElementById("address")?.value || "N/A"}<br>
                <strong>Barangay:</strong> ${document.getElementById("barangay")?.value || "N/A"}<br>
                <strong>City:</strong> ${document.getElementById("city")?.value || "N/A"}<br>
                <strong>Region:</strong> ${document.getElementById("region")?.value || "N/A"}<br>
            `;

            const summaryGuardian = `
                <strong>Father's Name:</strong> ${document.getElementById("fatherFirstName")?.value || "N/A"} ${document.getElementById("fatherLastName")?.value || "N/A"}<br>
                <strong>Mother's Name:</strong> ${document.getElementById("motherFirstName")?.value || "N/A"} ${document.getElementById("motherLastName")?.value || "N/A"}<br>
                <strong>Guardian Name:</strong> ${document.getElementById("guardianFirstName")?.value || "N/A"} ${document.getElementById("guardianLastName")?.value || "N/A"}<br>
                <strong>Guardian Contact:</strong> ${document.getElementById("guardianContact")?.value || "N/A"}<br>
            `;

            const summaryEnrollment = `
                <strong>Preferred Branch:</strong> ${document.getElementById("branchSelect")?.value || "N/A"}<br>
                <strong>Course/Strand:</strong> ${document.getElementById("courseSelect")?.value || "N/A"}<br>
                <strong>Year Level:</strong> ${document.getElementById("yearLevelSelect")?.value || "N/A"}<br>
            `;

            const summaryEducation = `
                <strong>Primary School:</strong> ${document.getElementById("primarySchool")?.value || "N/A"}, ${document.getElementById("primaryGradYear")?.value || "N/A"}<br>
                <strong>Secondary School:</strong> ${document.getElementById("secondarySchool")?.value || "N/A"}, ${document.getElementById("secondaryGradYear")?.value || "N/A"}<br>
                <strong>Last School Attended:</strong> ${document.getElementById("lastSchool")?.value || "N/A"}, ${document.getElementById("lastSchoolYear")?.value || "N/A"}<br>
            `;

            // Insert into the modal (if elements exist)
            document.getElementById("summaryBasicInfo")?.innerHTML = summaryBasicInfo;
            document.getElementById("summaryAddress")?.innerHTML = summaryAddress;
            document.getElementById("summaryGuardian")?.innerHTML = summaryGuardian;
            document.getElementById("summaryEnrollment")?.innerHTML = summaryEnrollment;
            document.getElementById("summaryEducation")?.innerHTML = summaryEducation;

            // Show the modal
            var summaryModal = new bootstrap.Modal(document.getElementById("summaryModal"));
            summaryModal.show();
        });
    } else {
        console.error("Preview button not found.");
    }

    // Handle Final Submission
    if (finalSubmitButton) {
        finalSubmitButton.addEventListener("click", function () {
            document.querySelector("form")?.submit();
        });
    } else {
        console.error("Final submit button not found.");
    }
});
