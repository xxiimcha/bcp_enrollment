<?php
header("Content-Type: application/json");
include '../config/database.php';

$query = "SELECT 
    COUNT(*) AS total,
    SUM(CASE WHEN status = 'approved' THEN 1 ELSE 0 END) AS approved,
    SUM(CASE WHEN status = 'pending' THEN 1 ELSE 0 END) AS pending,
    SUM(CASE WHEN status = 'declined' OR status = 'rejected' THEN 1 ELSE 0 END) AS declined,
    SUM(CASE WHEN status = 'endorsed' THEN 1 ELSE 0 END) AS endorsed
    FROM student_registration";

$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);

echo json_encode($data);
