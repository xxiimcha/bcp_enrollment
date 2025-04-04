<?php include('../partials/head.php'); ?>

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">

<div id="wrapper">
    <?php include('../partials/sidebar.php'); ?>

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <?php include('../partials/nav.php'); ?>

            <div class="container-fluid">
                <h1 class="h3 mb-4 text-gray-800">User Management</h1>

                <!-- ✅ USER TABLE -->
                <div class="row mt-4">
                    <div class="col-lg-12">
                        <div class="card shadow-sm">
                            <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                                <h6 class="m-0">All Users</h6>
                                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addUserModal">
                                    <i class="fas fa-user-plus"></i> Add New User
                                </button>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered" id="userTable" width="100%" cellspacing="0">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
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

<!-- 🔲 ADD USER MODAL -->
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="../controllers/UserController.php?action=addUser" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Add New User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="first_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="last_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>User Role</label>
                        <select name="role" class="form-control" required>
                            <option value="admin">Admin</option>
                            <option value="student">Student</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control" required>
                            <option value="Active" selected>Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Temporary Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add User</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include('../partials/modal.php'); ?>
<?php include('../partials/foot.php'); ?>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready(function () {
        $('#userTable').DataTable({
            ajax: {
                url: '../controllers/UserController.php?action=getAllUsers',
                dataSrc: function (json) {
                    if (json.success) {
                        const wrapper = document.createElement('tbody');
                        wrapper.innerHTML = json.usersHTML;
                        const rows = Array.from(wrapper.querySelectorAll('tr')).map(row => {
                            const cells = row.querySelectorAll('td');
                            return [
                                cells[0]?.innerHTML,
                                cells[1]?.innerHTML,
                                cells[2]?.innerHTML,
                                cells[3]?.innerHTML,
                                cells[4]?.innerHTML
                            ];
                        });
                        return rows;
                    } else {
                        return [];
                    }
                }
            },
            columns: [
                { title: "Name" },
                { title: "Email" },
                { title: "Role" },
                { title: "Status" },
                { title: "Actions", className: "text-center", orderable: false }
            ],
            responsive: true,
            pageLength: 10,
            language: {
                emptyTable: "No users found"
            }
        });
    });

    // Attach click handler to dynamically loaded status badges
    $(document).on('click', '.toggle-status', function () {
        const badge = $(this);
        const userId = badge.data('id');

        $.ajax({
            url: '../controllers/UserController.php?action=toggleStatus',
            type: 'POST',
            data: { id: userId },
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    const newStatus = response.newStatus;
                    badge
                        .text(newStatus)
                        .toggleClass('badge-success badge-danger')
                        .toggleClass('bg-success bg-danger'); // optional Bootstrap 5 style support
                } else {
                    alert(response.message || 'Failed to toggle status.');
                }
            },
            error: function () {
                alert('An error occurred while updating status.');
            }
        });
    });

</script>
