<?php
header("Content-Type: application/json");
include '../config/database.php'; // Database connection

$action = $_GET['action'] ?? '';

switch ($action) {
    case 'getAllEnrollees':
        getAllEnrollees($conn);
        break;
    
    case 'getEnrollee':
        $id = $_GET['id'] ?? null;
        getEnrolleeById($conn, $id);
        break;

    default:
        echo json_encode(["success" => false, "message" => "Invalid action."]);
        break;
}

// ✅ Fetch All Enrollees with Details
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

function getEnrolleeById($conn, $id) {
    if (!$id || !is_numeric($id)) {
        echo json_encode(["success" => false, "message" => "Invalid enrollee ID."]);
        return;
    }

    // Sanitize the ID to prevent SQL injection
    $id = intval($id);

    $query = "SELECT 
                *
              FROM student_registration sr
              LEFT JOIN student_academics sa ON sr.id = sa.student_id
              LEFT JOIN student_guardians sg ON sr.id = sg.student_id
              LEFT JOIN student_address sa2 ON sr.id = sa2.student_id
              WHERE sr.id = $id";

    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo json_encode(["success" => true, "data" => $row]);
    } else {
        echo json_encode(["success" => false, "message" => "Enrollee not found."]);
    }
}

mysqli_close($conn);
?>
