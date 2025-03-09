document.addEventListener("DOMContentLoaded", function () {
    const steps = document.querySelectorAll(".accordion-item");
    const nextButtons = document.querySelectorAll(".btn-next");

    nextButtons.forEach((button, index) => {
        button.addEventListener("click", function () {
            const currentStep = steps[index];
            const nextStep = steps[index + 1];

            if (validateForm(currentStep)) {
                enableNextStep(nextStep);
            }
        });
    });

    function validateForm(step) {
        const requiredFields = step.querySelectorAll("input[required], select[required]");
        let isValid = true;

        requiredFields.forEach((field) => {
            if (!field.value.trim()) {
                field.classList.add("is-invalid");
                isValid = false;
            } else {
                field.classList.remove("is-invalid");
            }
        });

        return isValid;
    }

    function enableNextStep(step) {
        if (step) {
            const button = step.querySelector(".accordion-button");
            button.classList.remove("collapsed");
            button.removeAttribute("disabled");
        }
    }
});
