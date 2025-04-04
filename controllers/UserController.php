<?php
include '../config/database.php';

$action = $_GET['action'] ?? $_POST['action'] ?? '';

switch ($action) {
    case 'getAllUsers':
        getAllUsers($conn);
        break;

    case 'addUser':
        addUser($conn);
        break;
    
    case 'toggleStatus':
        toggleStatus($conn);
        break;

    default:
        echo json_encode(['success' => false, 'message' => 'Invalid action.']);
        break;
}

function toggleStatus($conn)
{
    $id = intval($_POST['id'] ?? 0);

    if ($id === 0) {
        echo json_encode(['success' => false, 'message' => 'Invalid user ID.']);
        return;
    }

    $query = "SELECT status FROM users WHERE id = $id";
    $result = $conn->query($query);
    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $newStatus = ($user['status'] === 'Active') ? 'Inactive' : 'Active';

        $update = "UPDATE users SET status = '$newStatus' WHERE id = $id";
        if ($conn->query($update)) {
            echo json_encode(['success' => true, 'newStatus' => $newStatus]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to update status.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'User not found.']);
    }
}

function getAllUsers($conn)
{
    $query = "SELECT * FROM users ORDER BY id DESC";
    $result = $conn->query($query);

    $html = '';

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $fullName = htmlspecialchars($row['first_name'] . ' ' . $row['last_name']);
            $badgeRole = $row['role'] === 'admin' 
                ? '<span class="badge badge-primary">Admin</span>'
                : '<span class="badge badge-secondary">Student</span>';

            $badgeStatus = $row['status'] === 'Active'
                ? '<span class="badge badge-success toggle-status" data-id="' . $row['id'] . '" style="cursor:pointer;">Active</span>'
                : '<span class="badge badge-danger toggle-status" data-id="' . $row['id'] . '" style="cursor:pointer;">Inactive</span>';


            $html .= '
                <tr>
                    <td>' . $fullName . '</td>
                    <td>' . htmlspecialchars($row['email']) . '</td>
                    <td>' . htmlspecialchars($row['role']) . '</td>
                    <td>' . $badgeStatus . '</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
            ';
        }

        echo json_encode(['success' => true, 'usersHTML' => $html]);
    } else {
        echo json_encode(['success' => false, 'usersHTML' => '']);
    }
}

function addUser($conn)
{
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name'] ?? '');
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name'] ?? '');
    $email = mysqli_real_escape_string($conn, $_POST['email'] ?? '');
    $username = mysqli_real_escape_string($conn, $_POST['username'] ?? '');
    $role = mysqli_real_escape_string($conn, $_POST['role'] ?? 'student');
    $password = $_POST['password'] ?? '';
    $status = mysqli_real_escape_string($conn, $_POST['status'] ?? 'Active');

    if (empty($first_name) || empty($last_name) || empty($email) || empty($username) || empty($password)) {
        echo json_encode(['success' => false, 'message' => 'All fields are required.']);
        return;
    }

    $password_hash = password_hash($password, PASSWORD_BCRYPT);
    $created_at = $updated_at = date('Y-m-d H:i:s');

    $query = "
        INSERT INTO users (first_name, last_name, email, username, password_hash, role, status, created_at, updated_at)
        VALUES ('$first_name', '$last_name', '$email', '$username', '$password_hash', '$role', '$status', '$created_at', '$updated_at')
    ";

    if ($conn->query($query)) {
        header("Location: ../users/index.php");
        exit();
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to add user.']);
    }
}
