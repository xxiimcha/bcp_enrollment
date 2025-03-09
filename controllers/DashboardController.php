<?php
include '../config/database.php'; // Ensure this file connects to your MySQL database

$action = $_GET['action'] ?? '';

switch ($action) {
    case 'all':
        fetchDashboardData($conn);
        break;
    default:
        echo json_encode(["success" => false, "error" => "Invalid action"]);
        break;
}

// ✅ Fetch Dashboard Statistics and Charts Data
function fetchDashboardData($conn) {
    $response = [
        "success" => true,
        "totalStudents" => getTotalStudents($conn),
        "pendingApplications" => getPendingApplicationsCount($conn),
        "approvedApplications" => getApprovedApplicationsCount($conn),
        "rejectedApplications" => getRejectedApplicationsCount($conn),
        "enrollmentTrends" => getEnrollmentTrends($conn),
        "programBreakdown" => getProgramBreakdown($conn),
        "pendingApplicationsHTML" => getPendingApplicationsTable($conn)
    ];

    echo json_encode($response);
}

// ✅ Get Total Students Count
function getTotalStudents($conn) {
    $query = "SELECT COUNT(*) AS total FROM student_registration";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
    return $data['total'] ?? 0;
}

// ✅ Get Pending Applications Count
function getPendingApplicationsCount($conn) {
    $query = "SELECT COUNT(*) AS total FROM student_registration WHERE status = 'pending'";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
    return $data['total'] ?? 0;
}

// ✅ Get Approved Applications Count
function getApprovedApplicationsCount($conn) {
    $query = "SELECT COUNT(*) AS total FROM student_registration WHERE status = 'enrolled'";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
    return $data['total'] ?? 0;
}

// ✅ Get Rejected Applications Count
function getRejectedApplicationsCount($conn) {
    $query = "SELECT COUNT(*) AS total FROM student_registration WHERE status = 'rejected'";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
    return $data['total'] ?? 0;
}

// ✅ Get Enrollment Trends (Enrollments per Day)
function getEnrollmentTrends($conn) {
    $query = "SELECT DATE(created_at) AS date, COUNT(*) AS total FROM student_registration GROUP BY DATE(created_at) ORDER BY DATE(created_at) DESC LIMIT 7";
    $result = mysqli_query($conn, $query);

    $labels = [];
    $data = [];

    while ($row = mysqli_fetch_assoc($result)) {
        array_unshift($labels, $row['date']); // Insert at the beginning (for correct order)
        array_unshift($data, $row['total']);
    }

    return ["labels" => $labels, "data" => $data];
}

// ✅ Get Student Distribution by Course/Program
function getProgramBreakdown($conn) {
    $query = "SELECT course, COUNT(*) AS total FROM student_academics GROUP BY course";
    $result = mysqli_query($conn, $query);

    $labels = [];
    $data = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $labels[] = $row['course'];
        $data[] = $row['total'];
    }

    return ["labels" => $labels, "data" => $data];
}

// ✅ Generate HTML for Pending Applications Table
function getPendingApplicationsTable($conn) {
    $query = "SELECT s.last_name, s.first_name, a.course, s.created_at 
              FROM student_registration s 
              JOIN student_academics a ON s.id = a.student_id 
              WHERE s.status = 'pending' 
              ORDER BY s.created_at DESC LIMIT 5";
    
    $result = mysqli_query($conn, $query);
    
    $html = "";
    while ($row = mysqli_fetch_assoc($result)) {
        $html .= "<tr>
                    <td>{$row['last_name']}, {$row['first_name']}</td>
                    <td>{$row['course']}</td>
                    <td>{$row['created_at']}</td>
                    <td><span class='badge bg-warning text-dark'>Pending</span></td>
                  </tr>";
    }
    
    return $html ?: "<tr><td colspan='4' class='text-center'>No pending applications</td></tr>";
}

mysqli_close($conn);
?>
