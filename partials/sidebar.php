<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #000; color: #fff;">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../dashboard/index.php">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-user-shield"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Enrollment Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="../dashboard/index.php">
            <i class="fas fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Student Admissions -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#admissionsMenu"
            aria-expanded="true" aria-controls="admissionsMenu">
            <i class="fas fa-user-plus"></i>
            <span>Student Admissions</span>
        </a>
        <div id="admissionsMenu" class="collapse" aria-labelledby="admissionsHeading" data-parent="#accordionSidebar">
            <div class="bg-dark py-2 collapse-inner rounded">
                <a class="collapse-item text-white" href="../admissions/applications.php">Applications</a>
                <a class="collapse-item text-white" href="../admissions/approve.php">Approve Applications</a>
                <a class="collapse-item text-white" href="../admissions/rejected.php">Rejected Applications</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Enrollment Management -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#enrollmentMenu"
            aria-expanded="true" aria-controls="enrollmentMenu">
            <i class="fas fa-user-check"></i>
            <span>Enrollment Management</span>
        </a>
        <div id="enrollmentMenu" class="collapse" aria-labelledby="enrollmentHeading" data-parent="#accordionSidebar">
            <div class="bg-dark py-2 collapse-inner rounded">
                <a class="collapse-item text-white" href="../enrollment/new.php">New Enrollments</a>
                <a class="collapse-item text-white" href="../enrollment/approve.php">Approve Enrollment</a>
                <a class="collapse-item text-white" href="../enrollment/withdrawals.php">Withdrawals & Dropped</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Student Enrollment Records -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#studentRecordsMenu"
            aria-expanded="true" aria-controls="studentRecordsMenu">
            <i class="fas fa-users"></i>
            <span>Enrollment Records</span>
        </a>
        <div id="studentRecordsMenu" class="collapse" aria-labelledby="studentRecordsHeading" data-parent="#accordionSidebar">
            <div class="bg-dark py-2 collapse-inner rounded">
                <a class="collapse-item text-white" href="../students/view.php">Enrolled Students</a>
                <a class="collapse-item text-white" href="../students/enrollment_status.php">Enrollment Status</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Reports & Analytics -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#reportMenu"
            aria-expanded="true" aria-controls="reportMenu">
            <i class="fas fa-chart-line"></i>
            <span>Reports & Analytics</span>
        </a>
        <div id="reportMenu" class="collapse" aria-labelledby="reportHeading" data-parent="#accordionSidebar">
            <div class="bg-dark py-2 collapse-inner rounded">
                <a class="collapse-item text-white" href="../reports/enrollment.php">Enrollment Reports</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - System Settings -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#settingsMenu"
            aria-expanded="true" aria-controls="settingsMenu">
            <i class="fas fa-cogs"></i>
            <span>System Settings</span>
        </a>
        <div id="settingsMenu" class="collapse" aria-labelledby="settingsHeading" data-parent="#accordionSidebar">
            <div class="bg-dark py-2 collapse-inner rounded">
                <a class="collapse-item text-white" href="../settings/profile.php">Admin Profile</a>
                <a class="collapse-item text-white" href="../settings/system.php">System Configuration</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
