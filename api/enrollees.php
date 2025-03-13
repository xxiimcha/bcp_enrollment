<?php
header("Content-Type: application/json");
include '../config/database.php'; // Database connection

$action = $_GET['action'] ?? '';

switch ($action) {
    case 'getAllEnrollees':
        getAllEnrollees($conn);
        break;

    default:
        echo json_encode(["success" => false, "message" => "Invalid action."]);
        break;
}

function getAllEnrollees($conn) {
    $query = "SELECT * FROM student_registration 
              LEFT JOIN student_academics ON student_registration.id = student_academics.student_id
              LEFT JOIN student_guardians ON student_registration.id = student_guardians.student_id
              LEFT JOIN student_address ON student_registration.id = student_address.student_id
              ORDER BY student_registration.created_at DESC";

    $result = mysqli_query($conn, $query);
    
    $enrollees = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $enrollees[] = $row;
    }

    echo json_encode([
        "success" => true,
        "total" => count($enrollees),
        "data" => $enrollees
    ]);
}

mysqli_close($conn);
?>
