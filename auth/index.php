<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bestlink College - Login & Enrollment</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <style>
        /* General Styling */
        body {
            background-color: #eef2f7;
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Login Card */
        .auth-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 8px 18px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 400px;
            text-align: center;
            border: 2px solid #0057D9;
        }

        .auth-card h3 {
            font-weight: bold;
            color: #0057D9;
        }

        .auth-card p {
            color: #555;
        }

        /* Input Fields */
        .form-control {
            border-radius: 8px;
            padding: 12px;
            border: 1px solid #b0c4de;
            transition: all 0.3s ease-in-out;
            background: #f8f9fa;
            color: #333;
        }

        .form-control:focus {
            border-color: #0057D9;
            box-shadow: 0 0 10px rgba(0, 87, 217, 0.3);
            background: white;
        }

        /* Buttons */
        .btn-custom {
            background-color: #0057D9;
            color: white;
            font-weight: bold;
            padding: 14px;
            border-radius: 8px;
            width: 100%;
            transition: all 0.3s ease-in-out;
            border: none;
        }

        .btn-custom:hover {
            background-color: #0048B3;
            transform: scale(1.05);
            box-shadow: 0px 8px 20px rgba(0, 91, 187, 0.3);
        }

        /* Footer */
        .footer {
            text-align: center;
            font-size: 14px;
            margin-top: 20px;
            color: #777;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .auth-card {
                width: 90%;
            }
        }

        /* Error & Success Messages */
        .alert {
            display: none;
            margin-top: 15px;
            padding: 10px;
            border-radius: 5px;
        }

        .alert-success {
            background-color: #28a745;
            color: white;
        }

        .alert-danger {
            background-color: #dc3545;
            color: white;
        }
    </style>
</head>
<body>

<!-- Main Container -->
<div class="auth-card">
    <h3><i class="fas fa-user-circle"></i> Login</h3>
    <p>Sign in to access your account</p>

    <form id="loginForm">
        <div class="alert alert-danger" id="errorMessage"></div>
        <div class="alert alert-success" id="successMessage"></div>

        <div class="mb-3">
            <input type="text" name="username" id="username" class="form-control" placeholder="Enter your username" required>
        </div>
        <div class="mb-3">
            <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" required>
        </div>
        <button type="submit" class="btn btn-custom">Login</button>
    </form>

    <hr class="my-4 text-muted">
    <p class="footer">&copy; 2025 Bestlink College - All Rights Reserved</p>
</div>

<script>
$(document).ready(function () {
    $("#loginForm").submit(function (event) {
        event.preventDefault(); // Prevent page reload

        var username = $("#username").val();
        var password = $("#password").val();

        $.ajax({
            url: "../controllers/AuthController.php?action=login",
            type: "POST",
            data: { username: username, password: password },
            success: function (response) {
                var res = JSON.parse(response);

                if (res.status === "success") {
                    $("#successMessage").text(res.message).fadeIn();
                    setTimeout(function () {
                        window.location.href = res.redirect; // Redirect to dashboard
                    }, 2000);
                } else {
                    $("#errorMessage").text(res.message).fadeIn();
                }
            },
            error: function () {
                $("#errorMessage").text("An error occurred. Please try again.").fadeIn();
            }
        });
    });
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
