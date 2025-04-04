<?php
// Define a global root path constant
define('BASE_PATH', $_SERVER['DOCUMENT_ROOT'] . '/bcp_enrollment');

// DB credentials
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'bcp_enrollment');

// Create DB connection
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
