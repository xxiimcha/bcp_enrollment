<?php
session_start();
include '../config/database.php'; // Ensure this file connects to your MySQL database

$action = $_GET['action'] ?? '';

switch ($action) {
    case 'login':
        login($conn);
        break;

    case 'logout':
        logout();
        break;

    default:
        echo json_encode(["status" => "error", "message" => "Invalid action."]);
        break;
}

function login($conn) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = md5(trim($_POST['password']));

    $query = "SELECT id, username, password_hash, role, first_name, last_name FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        if (trim($password) === trim($user['password_hash'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['full_name'] = $user['first_name'] . ' ' . $user['last_name'];

            echo json_encode([
                "status" => "success",
                "message" => "Login successful!",
                "redirect" => getDashboardURL($user['role'])
            ]);
        } else {
            echo json_encode(["status" => "error", "message" => "Invalid password."]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "User not found."]);
    }
}

function logout() {
    session_destroy();
    header("Location: ../index.php");
    exit();
}


function getDashboardURL($role) {
    if ($role === 'admin') {
        return "../common/dashboard.php";
    } elseif ($role === 'student') {
        return "../public/home/dashboard.php";
    }
    return "../common/dashboard.php";
}

mysqli_close($conn);
?>
