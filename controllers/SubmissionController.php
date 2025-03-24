<?php
include '../config/database.php'; // Ensure this file connects to your MySQL database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Step 1: Insert into student_registration
    $admission_type = $_POST['admissionType'];
    $is_working_student = isset($_POST['isWorkingStudent']) ? 1 : 0;
    $LRN = $_POST['LRN'] ?? NULL;
    $last_name = $_POST['lastName'];
    $first_name = $_POST['firstName'];
    $middle_name = $_POST['middleName'] ?? NULL;
    $suffix = $_POST['suffix'] ?? NULL;
    $sex = $_POST['sex'];
    $civil_status = $_POST['civilStatus'];
    $religion = $_POST['religion'] ?? NULL;
    $disability = $_POST['disability'] ?? NULL;
    $indigenous_group = $_POST['indigenousGroup'] ?? NULL;
    $birthday = $_POST['birthday'];
    $email = $_POST['email'];
    $contact_number = $_POST['contactNumber'];
    $facebook_name = $_POST['facebookName'];
    $status = "pending"; // Default status

    $query = "INSERT INTO student_registration (admission_type, is_working_student, LRN, last_name, first_name, middle_name, suffix, sex, civil_status, religion, disability, indigenous_group, birthday, email, contact_number, facebook_name, status)
              VALUES ('$admission_type', '$is_working_student', '$LRN', '$last_name', '$first_name', '$middle_name', '$suffix', '$sex', '$civil_status', '$religion', '$disability', '$indigenous_group', '$birthday', '$email', '$contact_number', '$facebook_name', '$status')";
    mysqli_query($conn, $query);
    $student_id = mysqli_insert_id($conn);

    // Step 2: Insert into student_address
    $address = $_POST['address'];
    $barangay = $_POST['barangay'];
    $city_municipality = $_POST['city_municipality'];
    $region = $_POST['region'];

    $query = "INSERT INTO student_address (student_id, address, barangay, city_municipality, region)
              VALUES ('$student_id', '$address', '$barangay', '$city_municipality', '$region')";
    mysqli_query($conn, $query);

    // Step 3: Insert into student_guardians
    $father_last_name = $_POST['fatherLastName'];
    $father_first_name = $_POST['fatherFirstName'];
    $father_middle_name = $_POST['fatherMiddleName'] ?? NULL;
    $mother_last_name = $_POST['motherLastName'];
    $mother_first_name = $_POST['motherFirstName'];
    $mother_middle_name = $_POST['motherMiddleName'] ?? NULL;
    $guardian_last_name = $_POST['guardianLastName'];
    $guardian_first_name = $_POST['guardianFirstName'];
    $guardian_middle_name = $_POST['guardianMiddleName'] ?? NULL;
    $guardian_contact = $_POST['guardianContact'];
    $guardian_occupation = $_POST['guardianOccupation'];
    $is_4ps_member = isset($_POST['is4PsMember']) ? 1 : 0;

    $query = "INSERT INTO student_guardians (student_id, father_last_name, father_first_name, father_middle_name, mother_last_name, mother_first_name, mother_middle_name, guardian_last_name, guardian_first_name, guardian_middle_name, guardian_contact, guardian_occupation, is_4ps_member)
              VALUES ('$student_id', '$father_last_name', '$father_first_name', '$father_middle_name', '$mother_last_name', '$mother_first_name', '$mother_middle_name', '$guardian_last_name', '$guardian_first_name', '$guardian_middle_name', '$guardian_contact', '$guardian_occupation', '$is_4ps_member')";
    mysqli_query($conn, $query);

    // Step 4: Insert into student_academics
    $preferred_branch = $_POST['branchSelect'];
    $course = $_POST['courseSelect'];
    $year_level = $_POST['yearLevelSelect'];
    $primary_school = $_POST['primarySchool'];
    $primary_grad_year = $_POST['primaryYear'];
    $secondary_school = $_POST['secondarySchool'];
    $secondary_grad_year = $_POST['secondaryYear'];
    $last_school_attended = $_POST['lastSchool'];
    $last_school_year_attended = $_POST['lastYearAttended'];

    $query = "INSERT INTO student_academics (student_id, preferred_branch, course, year_level, primary_school, primary_grad_year, secondary_school, secondary_grad_year, last_school_attended, last_school_year_attended)
              VALUES ('$student_id', '$preferred_branch', '$course', '$year_level', '$primary_school', '$primary_grad_year', '$secondary_school', '$secondary_grad_year', '$last_school_attended', '$last_school_year_attended')";
    mysqli_query($conn, $query);

    // Step 5: Handle file uploads for student_files
    $upload_dir = "uploads/";
    
    foreach ($_FILES as $key => $file) {
        $document_type = $key; // Example: form_138, birth_certificate, etc.
        $file_name = basename($file["name"]);
        $file_path = $upload_dir . $file_name;

        if (move_uploaded_file($file["tmp_name"], $file_path)) {
            $query = "INSERT INTO student_files (student_id, document_type, file_path, status)
                      VALUES ('$student_id', '$document_type', '$file_path', 'pending')";
            mysqli_query($conn, $query);
        }
    }

    // Redirect to success page
    header("Location: success.php");
    exit();
} else {
    echo "Invalid Request";
}
?>