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

    case 'endorse':
        endorseApplication($conn);
        break;

    case 'decline':
        declineApplication($conn);
        break;

    default:
        echo json_encode(["success" => false, "message" => "Invalid action."]);
        break;
}

function getAllApplications($conn) {
    $query = "
        SELECT 
            sr.id,
            sr.first_name,
            sr.last_name,
            sr.middle_name,
            sr.suffix,
            sr.status,
            sr.created_at AS application_date,
            sa.course
        FROM student_registration sr
        LEFT JOIN student_academics sa ON sr.id = sa.student_id
        ORDER BY sr.created_at DESC
    ";

    $result = mysqli_query($conn, $query);
    $html = "";

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $studentName = htmlspecialchars($row['last_name'] . ', ' . $row['first_name'] . ' ' . $row['middle_name'] . ' ' . $row['suffix']);
            $course = htmlspecialchars($row['course'] ?? 'N/A');
            $date = htmlspecialchars(date('F d, Y', strtotime($row['application_date'])));
            $status = getStatusBadge($row['status']);
            $id = (int)$row['id'];

            $html .= "
                <tr>
                    <td>$studentName</td>
                    <td>$course</td>
                    <td>$date</td>
                    <td>$status</td>
                    <td>
                        <a href='../admissions/view_application.php?id=$id' class='btn btn-sm btn-info'>View</a>
                    </td>
                </tr>
            ";
        }

        echo json_encode(["success" => true, "applicationsHTML" => $html]);
    } else {
        echo json_encode(["success" => false, "applicationsHTML" => ""]);
    }
}

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

// ✅ ENDORSE action
function endorseApplication($conn) {
    $id = $_POST['id'] ?? '';

    if (!empty($id)) {
        $query = "UPDATE student_registration SET status = 'endorsed' WHERE id = '$id'";
        if (mysqli_query($conn, $query)) {
            echo json_encode(["success" => true, "message" => "Application successfully endorsed to registrar."]);
        } else {
            echo json_encode(["success" => false, "message" => "Failed to endorse application."]);
        }
    } else {
        echo json_encode(["success" => false, "message" => "Invalid application ID."]);
    }
}

// ✅ DECLINE action with remarks
function declineApplication($conn) {
    $id = $_POST['id'] ?? '';
    $reason = mysqli_real_escape_string($conn, $_POST['reason'] ?? '');

    if (!empty($id) && !empty($reason)) {
        $query = "UPDATE student_registration SET status = 'declined', remarks = '$reason' WHERE id = '$id'";
        if (mysqli_query($conn, $query)) {
            echo json_encode(["success" => true, "message" => "Application declined with reason."]);
        } else {
            echo json_encode(["success" => false, "message" => "Failed to decline application."]);
        }
    } else {
        echo json_encode(["success" => false, "message" => "ID and reason required."]);
    }
}

// ✅ Badge Display
function getStatusBadge($status) {
    switch (strtolower($status)) {
        case 'approved':
            return '<span class="badge badge-success">Approved</span>';
        case 'pending':
            return '<span class="badge badge-warning">Pending</span>';
        case 'rejected':
        case 'declined':
            return '<span class="badge badge-danger">Declined</span>';
        case 'endorsed':
            return '<span class="badge badge-primary">Endorsed</span>';
        default:
            return '<span class="badge badge-secondary">Unknown</span>';
    }
}

mysqli_close($conn);
?>
