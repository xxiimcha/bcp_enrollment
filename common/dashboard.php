<?php include('../partials/head.php'); ?>

<div id="wrapper">
    <?php include('../partials/sidebar.php'); ?>

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <?php include('../partials/nav.php'); ?>

            <div class="container-fluid">
                <h1 class="h3 mb-4 text-gray-800">Enrollment Dashboard</h1>

                <!-- ✅ STATISTICS CARDS ROW -->
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="card shadow-sm border-left-primary">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h6 class="text-primary font-weight-bold">Total Students</h6>
                                        <h4 class="font-weight-bold text-dark" id="totalStudents">Loading...</h4>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card shadow-sm border-left-warning">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h6 class="text-warning font-weight-bold">Pending Applications</h6>
                                        <h4 class="font-weight-bold text-dark" id="pendingApplications">Loading...</h4>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-clock fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card shadow-sm border-left-success">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h6 class="text-success font-weight-bold">Approved Applications</h6>
                                        <h4 class="font-weight-bold text-dark" id="approvedApplications">Loading...</h4>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card shadow-sm border-left-danger">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h6 class="text-danger font-weight-bold">Rejected Applications</h6>
                                        <h4 class="font-weight-bold text-dark" id="rejectedApplications">Loading...</h4>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-times-circle fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ✅ CHARTS ROW (Enrollment Trends & Program Breakdown) -->
                <div class="row mt-4">
                    <div class="col-lg-6">
                        <div class="card shadow-sm">
                            <div class="card-header bg-primary text-white">
                                <h6 class="m-0">Enrollment Trends</h6>
                            </div>
                            <div class="card-body">
                                <div id="enrollmentTrendsChart" style="height: 300px;"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card shadow-sm">
                            <div class="card-header bg-success text-white">
                                <h6 class="m-0">Program Enrollment Breakdown</h6>
                            </div>
                            <div class="card-body">
                                <div id="programBreakdownChart" style="height: 300px;"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ✅ PENDING APPLICATIONS TABLE -->
                <div class="row mt-4">
                    <div class="col-lg-12">
                        <div class="card shadow-sm">
                            <div class="card-header bg-warning text-dark">
                                <h6 class="m-0">Pending Applications</h6>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Student Name</th>
                                            <th>Course</th>
                                            <th>Application Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody id="pendingApplicationsTable">
                                        <tr><td colspan="4" class="text-center">Loading...</td></tr>
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

<script>
    $(document).ready(function () {
        loadDashboardData();

        function loadDashboardData() {
            $.ajax({
                url: '../controllers/DashboardController.php?action=all',
                type: 'GET',
                dataType: 'json',
                success: function (response) {
                    if (response.success) {
                        $("#totalStudents").text(response.totalStudents);
                        $("#pendingApplications").text(response.pendingApplications);
                        $("#approvedApplications").text(response.approvedApplications);
                        $("#rejectedApplications").text(response.rejectedApplications);

                        if (response.enrollmentTrends.labels.length > 0) {
                            updateEnrollmentTrendsChart(response.enrollmentTrends.labels, response.enrollmentTrends.data);
                        }

                        if (response.programBreakdown.labels.length > 0) {
                            updateProgramBreakdownChart(response.programBreakdown.labels, response.programBreakdown.data);
                        }

                        $("#pendingApplicationsTable").html(response.pendingApplicationsHTML);
                    }
                },
                error: function () {
                    console.error("Error loading dashboard data");
                }
            });
        }

        function updateEnrollmentTrendsChart(labels, data) {
            $("#enrollmentTrendsChart").html("");
            var options = {
                chart: { type: 'line', height: 300 },
                series: [{ name: 'Enrollments', data: data }],
                xaxis: { categories: labels },
                colors: ['#007bff'],
                stroke: { curve: 'smooth' },
                dataLabels: { enabled: false }
            };
            new ApexCharts(document.querySelector("#enrollmentTrendsChart"), options).render();
        }

        function updateProgramBreakdownChart(labels, data) {
            $("#programBreakdownChart").html("");
            var options = {
                chart: { type: 'pie', height: 300 },
                series: data,
                labels: labels
            };
            new ApexCharts(document.querySelector("#programBreakdownChart"), options).render();
        }
    });
</script>
