<?php include('../partials/head.php'); ?>

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

<div id="wrapper">
    <?php include('../partials/sidebar.php'); ?>

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <?php include('../partials/nav.php'); ?>

            <div class="container-fluid">
                <h1 class="h3 mb-4 text-gray-800">All Admission Applications</h1>

                <!-- ✅ APPLICATIONS TABLE -->
                <div class="row mt-4">
                    <div class="col-lg-12">
                        <div class="card shadow-sm">
                            <div class="card-header bg-primary text-white">
                                <h6 class="m-0">All Applications</h6>
                            </div>
                            <div class="card-body">
                                <table id="applicationsTable" class="table table-striped">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Student Name</th>
                                            <th>Course</th>
                                            <th>Application Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr><td colspan="5" class="text-center">Loading...</td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="sticky-footer bg-white mt-4">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>&copy; 2025 Bestlink College - All Rights Reserved</span>
                </div>
            </div>
        </footer>
    </div>
</div>

<?php include('../partials/modal.php'); ?>
<?php include('../partials/foot.php'); ?>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function () {
        $.ajax({
            url: '../controllers/ApplicationController.php?action=getAllApplications',
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    $("#applicationsTable tbody").html(response.applicationsHTML);
                    $('#applicationsTable').DataTable({
                        responsive: true,
                        pageLength: 10
                    });
                } else {
                    $("#applicationsTable tbody").html('<tr><td colspan="5" class="text-center">No applications found.</td></tr>');
                }
            },
            error: function () {
                $("#applicationsTable tbody").html('<tr><td colspan="5" class="text-center text-danger">Failed to load applications.</td></tr>');
            }
        });
    });
</script>
