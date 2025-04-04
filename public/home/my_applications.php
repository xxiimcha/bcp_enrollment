<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'student') {
    header("Location: ../auth/login.php");
    exit();
}

include('../partials/public_layout.php');

$userId = $_SESSION['user_id'];
$userQuery = "SELECT student_id FROM users WHERE id = $userId";
$userResult = mysqli_query($conn, $userQuery);
$user = mysqli_fetch_assoc($userResult);
$studentId = $user['student_id'] ?? null;

$application = null;
$academic = null;
$guardian = null;
$address = null;
$files = [];

if ($studentId) {
    $application = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM student_registration WHERE id = $studentId"));
    $academic = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM student_academics WHERE student_id = $studentId"));
    $guardian = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM student_guardians WHERE student_id = $studentId"));
    $address = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM student_address WHERE student_id = $studentId"));
    $filesResult = mysqli_query($conn, "SELECT * FROM student_files WHERE student_id = $studentId");
    while ($row = mysqli_fetch_assoc($filesResult)) {
        $files[] = $row;
    }
}
?>

<div class="container mt-4 mb-5">
    <h3 class="mb-4"><i class="fas fa-file-alt me-2"></i>My Application Details</h3>

    <?php if ($application): ?>
        <!-- Application Status -->
        <div class="card shadow-sm mb-4 border-left-primary">
            <div class="card-body">
                <h5 class="mb-3"><i class="fas fa-info-circle text-primary me-2"></i>Status & Submission</h5>
                <p><strong>Status:</strong>
                    <?php
                        $status = strtolower($application['status']);
                        if ($status === 'approved') {
                            echo '<span class="badge badge-success">Approved</span>';
                        } elseif ($status === 'pending') {
                            echo '<span class="badge badge-warning">Pending</span>';
                        } elseif ($status === 'rejected' || $status === 'declined') {
                            echo '<span class="badge badge-danger">Declined</span>';
                        } elseif ($status === 'endorsed') {
                            echo '<span class="badge badge-primary">Endorsed</span>';
                        } else {
                            echo '<span class="badge badge-secondary">Unknown</span>';
                        }
                    ?>
                </p>
                <p><strong>Applied On:</strong> <?= date('F d, Y h:i A', strtotime($application['created_at'])) ?></p>
            </div>
        </div>

        <!-- Student Info -->
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-primary text-white">
                <strong>Personal Information</strong>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6"><strong>Full Name:</strong> <?= "{$application['last_name']}, {$application['first_name']} {$application['middle_name']} {$application['suffix']}" ?></div>
                    <div class="col-md-3"><strong>Sex:</strong> <?= $application['sex'] ?></div>
                    <div class="col-md-3"><strong>Birthday:</strong> <?= $application['birthday'] ?></div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4"><strong>LRN:</strong> <?= $application['LRN'] ?></div>
                    <div class="col-md-4"><strong>Admission Type:</strong> <?= $application['admission_type'] ?></div>
                    <div class="col-md-4"><strong>Working Student?</strong> <?= $application['is_working_student'] ? 'Yes' : 'No' ?></div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4"><strong>Contact:</strong> <?= $application['contact_number'] ?></div>
                    <div class="col-md-4"><strong>Email:</strong> <?= $application['email'] ?></div>
                    <div class="col-md-4"><strong>Facebook:</strong> <?= $application['facebook_name'] ?></div>
                </div>
            </div>
        </div>

        <!-- Address Info -->
        <?php if ($address): ?>
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-info text-white">
                <strong>Address Information</strong>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6"><strong>Street Address:</strong> <?= $address['address'] ?></div>
                    <div class="col-md-3"><strong>Barangay:</strong> <?= $address['barangay'] ?></div>
                    <div class="col-md-3"><strong>City:</strong> <?= $address['city_municipality'] ?></div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-3"><strong>Region:</strong> <?= $address['region'] ?></div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <!-- Guardian Info -->
        <?php if ($guardian): ?>
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-warning text-dark">
                <strong>Guardian Information</strong>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4"><strong>Father:</strong> <?= "{$guardian['father_last_name']}, {$guardian['father_first_name']} {$guardian['father_middle_name']}" ?></div>
                    <div class="col-md-4"><strong>Mother:</strong> <?= "{$guardian['mother_last_name']}, {$guardian['mother_first_name']} {$guardian['mother_middle_name']}" ?></div>
                    <div class="col-md-4"><strong>Guardian:</strong> <?= "{$guardian['guardian_last_name']}, {$guardian['guardian_first_name']} {$guardian['guardian_middle_name']}" ?></div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6"><strong>Contact:</strong> <?= $guardian['guardian_contact'] ?></div>
                    <div class="col-md-4"><strong>Occupation:</strong> <?= $guardian['guardian_occupation'] ?></div>
                    <div class="col-md-2"><strong>4Ps Member:</strong> <?= $guardian['is_4ps_member'] ? 'Yes' : 'No' ?></div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <!-- Academic Info -->
        <?php if ($academic): ?>
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-success text-white">
                <strong>Academic Information</strong>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4"><strong>Preferred Branch:</strong> <?= $academic['preferred_branch'] ?></div>
                    <div class="col-md-4"><strong>Course:</strong> <?= $academic['course'] ?></div>
                    <div class="col-md-4"><strong>Year Level:</strong> <?= $academic['year_level'] ?></div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6"><strong>Primary School:</strong> <?= $academic['primary_school'] ?> (<?= $academic['primary_grad_year'] ?>)</div>
                    <div class="col-md-6"><strong>Secondary School:</strong> <?= $academic['secondary_school'] ?> (<?= $academic['secondary_grad_year'] ?>)</div>
                </div>
                <hr>
                <p><strong>Last School Attended:</strong> <?= $academic['last_school_attended'] ?> (<?= $academic['last_school_year_attended'] ?>)</p>
            </div>
        </div>
        <?php endif; ?>

        <!-- Files -->
        <div class="card shadow-sm mb-5">
            <div class="card-header bg-dark text-white">
                <strong>Uploaded Documents</strong>
            </div>
            <div class="card-body">
                <?php if (count($files)): ?>
                    <table class="table table-sm table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>Document Type</th>
                                <th>Status</th>
                                <th>File</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($files as $file): ?>
                            <tr>
                                <td><?= ucfirst($file['document_type']) ?></td>
                                <td><?= $file['status'] ?></td>
                                <td><a href="<?= $file['file_path'] ?>" target="_blank" class="btn btn-sm btn-outline-primary">View</a></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p class="text-muted">No documents uploaded yet.</p>
                <?php endif; ?>
            </div>
        </div>
    <?php else: ?>
        <div class="alert alert-info">
            <i class="fas fa-info-circle"></i> No application record found.
        </div>
    <?php endif; ?>
</div>

<?php include('../partials/public_footer.php'); ?>
