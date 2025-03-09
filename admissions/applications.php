<?php
include '../config/database.php';
include '../partials/head.php';
include '../partials/sidebar.php';
?>

<div class="container-fluid">
    <h3 class="mt-4">Application Submissions</h3>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Student Name</th>
                    <th>Course</th>
                    <th>Branch</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="applicationTable">
                <!-- Data will load via AJAX -->
            </tbody>
        </table>
    </div>
</div>

<script>
    $(document).ready(function () {
        loadApplications();

        function loadApplications() {
            $.ajax({
                url: '../controllers/ApplicationController.php?action=getPendingApplications',
                type: 'GET',
                dataType: 'json',
                success: function (response) {
                    let html = "";
                    response.data.forEach(student => {
                        html += `<tr>
                            <td>${student.id}</td>
                            <td>${student.last_name}, ${student.first_name}</td>
                            <td>${student.course}</td>
                            <td>${student.preferred_branch}</td>
                            <td><span class="badge bg-warning text-dark">${student.status}</span></td>
                            <td>
                                <button class="btn btn-success btn-sm" onclick="updateStatus(${student.id}, 'approved')">Approve</button>
                                <button class="btn btn-danger btn-sm" onclick="updateStatus(${student.id}, 'rejected')">Reject</button>
                            </td>
                        </tr>`;
                    });
                    $("#applicationTable").html(html);
                }
            });
        }

        function updateStatus(studentId, status) {
            $.post('../controllers/ApplicationController.php?action=updateStatus', { id: studentId, status: status }, function (response) {
                alert(response.message);
                loadApplications();
            }, 'json');
        }
    });
</script>

<?php include '../partials/foot.php'; ?>
