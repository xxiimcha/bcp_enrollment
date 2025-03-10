<?php
header("Content-Type: application/json");
include '../config/database.php';

$action = $_GET['action'] ?? '';

switch ($action) {
    case 'getAllApplications':
        getAllApplications($conn);
        break;

    case 'updateStatus':
        updateApplicationStatus($conn);
        break;

    default:
        echo json_encode(["success" => false, "message" => "Invalid action."]);
        break;
}

// ✅ Fetch all applications (pending, approved, rejected) with course data from student_academics
function getAllApplications($conn) {
    $query = "SELECT sr.*, sa.course FROM student_registration sr
              LEFT JOIN student_academics sa ON sr.id = sa.student_id
              ORDER BY sr.created_at DESC";
    $result = mysqli_query($conn, $query);
    
    $applications = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $applications[] = $row;
    }

    // Generate table rows for frontend
    $applicationsHTML = "";
    foreach ($applications as $app) {
        $statusBadge = getStatusBadge($app['status']);
        $course = $app['course'] ?? 'N/A'; // Fetch course from student_academics
        $studentName = $app['last_name'] . ', ' . $app['first_name']; // Construct full name
        $applicationsHTML .= "<tr>
            <td>{$studentName}</td>
            <td>{$course}</td>
            <td>{$app['created_at']}</td>
            <td>{$statusBadge}</td>
        </tr>";
    }

    echo json_encode([
        "success" => true,
        "total" => count($applications),
        "applicationsHTML" => $applicationsHTML,
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

// ✅ Helper function to display status badge
function getStatusBadge($status) {
    switch ($status) {
        case 'approved':
            return '<span class="badge badge-success">Approved</span>';
        case 'pending':
            return '<span class="badge badge-warning">Pending</span>';
        case 'rejected':
            return '<span class="badge badge-danger">Rejected</span>';
        default:
            return '<span class="badge badge-secondary">Unknown</span>';
    }
}

mysqli_close($conn);
?>
