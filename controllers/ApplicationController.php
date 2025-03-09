<?php
header("Content-Type: application/json");
include '../config/database.php';

$action = $_GET['action'] ?? '';

switch ($action) {
    case 'getPendingApplications':
        getPendingApplications($conn);
        break;

    case 'updateStatus':
        updateApplicationStatus($conn);
        break;

    default:
        echo json_encode(["success" => false, "message" => "Invalid action."]);
        break;
}

// ✅ Fetch all applications with "pending" status
function getPendingApplications($conn) {
    $query = "SELECT * FROM student_registration WHERE status = 'pending' ORDER BY created_at DESC";
    $result = mysqli_query($conn, $query);
    
    $applications = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $applications[] = $row;
    }

    echo json_encode([
        "success" => true,
        "total" => count($applications),
        "data" => $applications
    ]);
}

// ✅ Update application status (approve/reject)
function updateApplicationStatus($conn) {
    $id = $_POST['id'] ?? '';
    $status = $_POST['status'] ?? '';

    if (!empty($id) && !empty($status)) {
        $query = "UPDATE student_registration SET status = '$status' WHERE id = '$id'";
        if (mysqli_query($conn, $query)) {
            echo json_encode(["success" => true, "message" => "Application updated successfully."]);
        } else {
            echo json_encode(["success" => false, "message" => "Error updating application."]);
        }
    } else {
        echo json_encode(["success" => false, "message" => "Invalid request."]);
    }
}

mysqli_close($conn);
?>
