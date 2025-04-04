<?php
include('../partials/head.php');
include('../config/database.php');

if (!isset($_GET['id'])) {
    echo "<div class='alert alert-danger m-4'>Invalid application ID.</div>";
    exit;
}

$student_id = intval($_GET['id']);

$student = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM student_registration WHERE id = $student_id"));
$guardian = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM student_guardians WHERE student_id = $student_id"));
$address = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM student_address WHERE student_id = $student_id"));
$academic = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM student_academics WHERE student_id = $student_id"));
$filesResult = mysqli_query($conn, "SELECT * FROM student_files WHERE student_id = $student_id");
?>

<div id="wrapper">
    <?php include('../partials/sidebar.php'); ?>

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <?php include('../partials/nav.php'); ?>

            <div class="container-fluid mt-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="text-gray-800"><i class="fas fa-user-check mr-2"></i>View Application</h3>
                    <a href="javascript:history.back()" class="btn btn-sm btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
                </div>

                <!-- STUDENT INFO -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <strong>Student Information</strong>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Full Name</label>
                                <input type="text" readonly class="form-control-plaintext" value="<?= "{$student['last_name']}, {$student['first_name']} {$student['middle_name']} {$student['suffix']}" ?>">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Sex</label>
                                <input type="text" readonly class="form-control-plaintext" value="<?= $student['sex'] ?>">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Birthday</label>
                                <input type="text" readonly class="form-control-plaintext" value="<?= $student['birthday'] ?>">
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>LRN</label>
                                <input type="text" readonly class="form-control-plaintext" value="<?= $student['LRN'] ?>">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Admission Type</label>
                                <input type="text" readonly class="form-control-plaintext" value="<?= $student['admission_type'] ?>">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Working Student?</label>
                                <input type="text" readonly class="form-control-plaintext" value="<?= $student['is_working_student'] ? 'Yes' : 'No' ?>">
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Status</label>
                                <input type="text" readonly class="form-control-plaintext" value="<?= $student['status'] ?>">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Contact</label>
                                <input type="text" readonly class="form-control-plaintext" value="<?= $student['contact_number'] ?>">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Email</label>
                                <input type="text" readonly class="form-control-plaintext" value="<?= $student['email'] ?>">
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="form-group">
                            <label>Facebook</label>
                            <input type="text" readonly class="form-control-plaintext" value="<?= $student['facebook_name'] ?>">
                        </div>
                    </div>
                </div>

                <!-- ADDRESS -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-info text-white">
                        <strong>Address Information</strong>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Street Address</label>
                                <input type="text" readonly class="form-control-plaintext" value="<?= $address['address'] ?? '-' ?>">
                            </div>
                            <div class="form-group col-md-2">
                                <label>Barangay</label>
                                <input type="text" readonly class="form-control-plaintext" value="<?= $address['barangay'] ?? '-' ?>">
                            </div>
                            <div class="form-group col-md-2">
                                <label>City</label>
                                <input type="text" readonly class="form-control-plaintext" value="<?= $address['city_municipality'] ?? '-' ?>">
                            </div>
                            <div class="form-group col-md-2">
                                <label>Region</label>
                                <input type="text" readonly class="form-control-plaintext" value="<?= $address['region'] ?? '-' ?>">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- GUARDIAN -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-warning text-dark">
                        <strong>Guardian Information</strong>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Father's Name</label>
                                <input type="text" readonly class="form-control-plaintext" value="<?= "{$guardian['father_last_name']}, {$guardian['father_first_name']} {$guardian['father_middle_name']}" ?>">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Mother's Name</label>
                                <input type="text" readonly class="form-control-plaintext" value="<?= "{$guardian['mother_last_name']}, {$guardian['mother_first_name']} {$guardian['mother_middle_name']}" ?>">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Guardian Name</label>
                                <input type="text" readonly class="form-control-plaintext" value="<?= "{$guardian['guardian_last_name']}, {$guardian['guardian_first_name']} {$guardian['guardian_middle_name']}" ?>">
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Guardian Contact</label>
                                <input type="text" readonly class="form-control-plaintext" value="<?= $guardian['guardian_contact'] ?>">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Occupation</label>
                                <input type="text" readonly class="form-control-plaintext" value="<?= $guardian['guardian_occupation'] ?>">
                            </div>
                            <div class="form-group col-md-2">
                                <label>4Ps Member</label>
                                <input type="text" readonly class="form-control-plaintext" value="<?= $guardian['is_4ps_member'] ? 'Yes' : 'No' ?>">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ACADEMICS -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-success text-white">
                        <strong>Academic Information</strong>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Preferred Branch</label>
                                <input type="text" readonly class="form-control-plaintext" value="<?= $academic['preferred_branch'] ?>">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Course</label>
                                <input type="text" readonly class="form-control-plaintext" value="<?= $academic['course'] ?>">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Year Level</label>
                                <input type="text" readonly class="form-control-plaintext" value="<?= $academic['year_level'] ?>">
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Primary School</label>
                                <input type="text" readonly class="form-control-plaintext" value="<?= $academic['primary_school'] ?> (<?= $academic['primary_grad_year'] ?>)">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Secondary School</label>
                                <input type="text" readonly class="form-control-plaintext" value="<?= $academic['secondary_school'] ?> (<?= $academic['secondary_grad_year'] ?>)">
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="form-group">
                            <label>Last School Attended</label>
                            <input type="text" readonly class="form-control-plaintext" value="<?= $academic['last_school_attended'] ?> (<?= $academic['last_school_year_attended'] ?>)">
                        </div>
                    </div>
                </div>

                <!-- FILES -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-dark text-white">
                        <strong>Uploaded Documents</strong>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-bordered">
                            <thead>
                                <tr>
                                    <th>Document Type</th>
                                    <th>Status</th>
                                    <th>File</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($file = mysqli_fetch_assoc($filesResult)) { ?>
                                    <tr>
                                        <td><?= $file['document_type'] ?></td>
                                        <td><?= $file['status'] ?></td>
                                        <td><a href="<?= $file['file_path'] ?>" target="_blank" class="btn btn-sm btn-outline-primary">View</a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- ACTION BUTTONS -->
                <?php if (strtolower($student['status']) === 'pending'): ?>
                    <!-- ACTION BUTTONS -->
                    <div class="text-right mb-5">
                        <button class="btn btn-success mr-2" id="endorseBtn">
                            <i class="fas fa-share-square"></i> Endorse to Registrar
                        </button>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#declineModal">
                            <i class="fas fa-times-circle"></i> Decline
                        </button>
                    </div>
                <?php endif; ?>


                <!-- DECLINE MODAL -->
                <div class="modal fade" id="declineModal" tabindex="-1" role="dialog" aria-labelledby="declineModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form id="declineForm">
                            <input type="hidden" name="id" value="<?= $student_id ?>">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Decline Application</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span>&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <label for="reason">Reason for declining:</label>
                                    <textarea name="reason" id="reason" class="form-control" required></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger">Submit Decline</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

        <footer class="sticky-footer bg-white mt-4">
            <div class="container my-auto">
                <div class="text-center my-auto">
                    <span>&copy; 2025 Bestlink College - All Rights Reserved</span>
                </div>
            </div>
        </footer>
    </div>
</div>

<?php include('../partials/foot.php'); ?>

<script>
$(document).ready(function () {
    $('#endorseBtn').click(function () {
        if (confirm("Are you sure you want to endorse this application to the registrar?")) {
            $.post('../controllers/ApplicationController.php?action=endorse', { id: <?= $student_id ?> }, function (res) {
                alert(res.message);
                if (res.success) location.reload();
            }, 'json');
        }
    });

    $('#declineForm').submit(function (e) {
        e.preventDefault();
        const reason = $('#reason').val().trim();
        if (!reason) return alert('Reason is required.');

        $.post('../controllers/ApplicationController.php?action=decline', {
            id: <?= $student_id ?>,
            reason: reason
        }, function (res) {
            alert(res.message);
            if (res.success) {
                $('#declineModal').modal('hide');
                location.reload();
            }
        }, 'json');
    });
});
</script>
