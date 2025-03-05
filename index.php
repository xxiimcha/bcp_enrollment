<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrollment System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .hero-section {
            background: url('https://source.unsplash.com/1600x900/?education,students') no-repeat center center/cover;
            height: 100vh;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            flex-direction: column;
            padding: 20px;
            backdrop-filter: blur(3px);
        }
        .hero-section h1 {
            font-size: 3rem;
            font-weight: bold;
        }
        .btn-custom {
            padding: 12px 25px;
            font-size: 1.2rem;
        }
        .steps {
            background-color: #fff;
            padding: 50px 20px;
            border-radius: 10px;
        }
        .footer {
            background-color: #000;
            color: white;
            padding: 20px 0;
            text-align: center;
        }
    </style>
</head>
<body>

    <!-- Hero Section -->
    <section class="hero-section">
        <h1>Welcome to the Online Enrollment System</h1>
        <p class="lead">A seamless way to register and enroll for your academic journey</p>
        <div>
            <a href="register.php" class="btn btn-primary btn-custom">Register Now</a>
            <a href="login.php" class="btn btn-outline-light btn-custom">Login</a>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="container mt-5">
        <h2 class="text-center mb-4">How to Enroll</h2>
        <div class="row text-center">
            <div class="col-md-4">
                <div class="steps p-3">
                    <i class="fas fa-file-alt fa-3x mb-3 text-primary"></i>
                    <h4>Step 1: Register</h4>
                    <p>Create an account and fill out your application details.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="steps p-3">
                    <i class="fas fa-check-circle fa-3x mb-3 text-success"></i>
                    <h4>Step 2: Submit & Verify</h4>
                    <p>Submit the required documents and wait for approval.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="steps p-3">
                    <i class="fas fa-university fa-3x mb-3 text-warning"></i>
                    <h4>Step 3: Enrollment Complete</h4>
                    <p>Once approved, finalize your enrollment and start learning!</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="container mt-5">
        <h2 class="text-center mb-4">Frequently Asked Questions</h2>
        <div class="accordion" id="faqAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                        What are the requirements for enrollment?
                    </button>
                </h2>
                <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        You need to submit an ID, proof of previous education, and a completed application form.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                        How long does approval take?
                    </button>
                </h2>
                <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        The approval process usually takes 3-5 business days.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                        Can I track my enrollment status?
                    </button>
                </h2>
                <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Yes, you can log in to your account and check your application status.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer mt-5">
        <p>&copy; 2025 Enrollment System | Designed for a seamless student experience</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
