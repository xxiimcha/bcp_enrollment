<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../auth/login.php");
    exit();
}

include('../partials/head.php');
?>

<div id="wrapper">
    <?php include('../partials/sidebar.php'); ?>

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <?php include('../partials/nav.php'); ?>

            <div class="container-fluid pt-4">
                <h3 class="mb-4 text-gray-800"><i class="fas fa-chart-line me-2"></i>Enrollment Reports & Analytics</h3>

                <!-- Filters -->
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <form class="row g-3">
                            <div class="col-md-4">
                                <label for="filterBranch" class="form-label">Branch</label>
                                <select class="form-control" id="filterBranch">
                                    <option value="">All</option>
                                    <option>Main Campus</option>
                                    <option>Branch 1</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="filterCourse" class="form-label">Course</label>
                                <select class="form-control" id="filterCourse">
                                    <option value="">All</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="filterYear" class="form-label">Academic Year</label>
                                <select class="form-control" id="filterYear">
                                    <option value="">All</option>
                                    <option>2024-2025</option>
                                    <option>2023-2024</option>
                                    <option>2022-2023</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Stats Overview -->
                <div class="row g-3 mb-4">
                    <div class="col-md-2">
                        <div class="card text-white bg-primary text-center p-3 shadow">
                            <h6>Total</h6>
                            <h3 id="totalApplications">0</h3>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card text-white bg-success text-center p-3 shadow">
                            <h6>Approved</h6>
                            <h3 id="approvedApplications">0</h3>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card text-white bg-warning text-center p-3 shadow">
                            <h6>Pending</h6>
                            <h3 id="pendingApplications">0</h3>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card text-white bg-danger text-center p-3 shadow">
                            <h6>Declined</h6>
                            <h3 id="declinedApplications">0</h3>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card text-white bg-info text-center p-3 shadow">
                            <h6>Endorsed</h6>
                            <h3 id="endorsedApplications">0</h3>
                        </div>
                    </div>
                </div>

                <!-- Chart -->
                <div class="card shadow-sm mb-5">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-chart-bar me-2 text-primary"></i>Enrollment by Course</h5>
                    </div>
                    <div class="card-body">
                        <div style="height: 400px;">
                            <canvas id="enrollmentChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="text-center my-auto">
                    <span>&copy; 2025 Bestlink College - All Rights Reserved</span>
                </div>
            </div>
        </footer>
    </div>
</div>

<?php include('../partials/foot.php'); ?>

<!-- Chart.js and Script -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Fetch courses
    fetch('http://localhost/bcp_registrar/api/courses.php')
        .then(res => res.json())
        .then(data => {
            const courseSelect = document.getElementById('filterCourse');
            if (data.success && Array.isArray(data.courses)) {
                data.courses.forEach(course => {
                    const option = document.createElement('option');
                    option.value = course.course_code;
                    option.textContent = `${course.course_code} - ${course.name}`;
                    courseSelect.appendChild(option);
                });
            }
        });

    // Fetch stats
    fetch('../api/enrollment_stats.php')
        .then(res => res.json())
        .then(data => {
            document.getElementById('totalApplications').textContent = data.total || 0;
            document.getElementById('approvedApplications').textContent = data.approved || 0;
            document.getElementById('pendingApplications').textContent = data.pending || 0;
            document.getElementById('declinedApplications').textContent = data.declined || 0;
            document.getElementById('endorsedApplications').textContent = data.endorsed || 0;
        });

    // Chart setup
    const ctx = document.getElementById('enrollmentChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['BSIT', 'BSED', 'BSBA', 'BSCRIM'],
            datasets: [{
                label: 'Enrolled Students',
                data: [120, 90, 45, 75],
                backgroundColor: ['#4e73df', '#1cc88a', '#f6c23e', '#e74a3b'],
                borderRadius: 6,
                barThickness: 40
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: true
                },
                tooltip: {
                    callbacks: {
                        label: function (context) {
                            return `${context.dataset.label}: ${context.parsed.y}`;
                        }
                    }
                }
            },
            scales: {
                x: {
                    ticks: {
                        font: { weight: 'bold' }
                    }
                },
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});
</script>
