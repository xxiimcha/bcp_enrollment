<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Enrollment Management System - Login</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
  <link href="./assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">

  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: 'Inter', sans-serif;
      height: 100vh;
      display: flex;
    }

    .left-panel {
      flex: 1;
      background: #000;
      color: #fff;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 40px;
    }

    .left-panel img {
      width: 100px;
      margin-bottom: 24px;
    }

    .left-panel h2 {
      font-size: 2rem;
      margin-bottom: 8px;
    }

    .left-panel p {
      font-size: 1rem;
      max-width: 300px;
      text-align: center;
      line-height: 1.5;
    }

    .right-panel {
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 40px;
      background-color: #f9f9f9;
    }

    .login-box {
      background-color: #fff;
      border-radius: 16px;
      padding: 48px;
      width: 100%;
      max-width: 400px;
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
    }

    .login-box h1 {
      font-size: 1.5rem;
      font-weight: 600;
      margin-bottom: 32px;
      text-align: center;
    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-bottom: 8px;
      font-weight: 500;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 14px;
      border-radius: 10px;
      border: 1px solid #ccc;
      font-size: 1rem;
      outline: none;
      transition: border-color 0.2s;
    }

    input:focus {
      border-color: #000;
    }

    .btn-user {
      width: 100%;
      background-color: #000;
      color: #fff;
      border: none;
      padding: 14px;
      border-radius: 10px;
      font-size: 1rem;
      font-weight: 500;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    .btn-user:hover {
      background-color: #333;
    }

    .alert {
      display: none;
      background: #ffeded;
      color: #b70000;
      padding: 12px;
      border-radius: 8px;
      margin-bottom: 20px;
      font-size: 0.95rem;
    }

    .spinner-overlay {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100vw;
      height: 100vh;
      background: rgba(0, 0, 0, 0.5);
      justify-content: center;
      align-items: center;
      z-index: 999;
    }

    @media (max-width: 768px) {
      body {
        flex-direction: column;
      }

      .left-panel,
      .right-panel {
        flex: none;
        width: 100%;
        height: auto;
      }

      .left-panel {
        padding: 20px;
        text-align: center;
      }
    }
  </style>
</head>

<body>
  <div class="spinner-overlay">
    <div class="spinner-border text-light" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>

  <div class="left-panel">
    <img src="../../assets/images/logo.png" alt="BCP Logo">
    <h2>Welcome to BCP</h2>
    <p>Manage your enrollment seamlessly and securely through our portal.</p>
  </div>

  <div class="right-panel">
    <div class="login-box">
      <h1>Login</h1>

      <div id="alertMessage" class="alert"></div>

      <form id="loginForm">
        <div class="form-group">
          <label for="email">Email Address</label>
          <input type="text" id="email" name="email" placeholder="Enter your email" required>
        </div>

        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" placeholder="Enter your password" required>
        </div>

        <button type="submit" class="btn-user">Login</button>
      </form>
    </div>
  </div>

  <script>
    document.getElementById("loginForm").addEventListener("submit", async function (event) {
      event.preventDefault();

      let email = document.getElementById("email").value;
      let password = document.getElementById("password").value;
      let alertMessage = document.getElementById("alertMessage");
      let loginButton = document.querySelector(".btn-user");
      let spinnerOverlay = document.querySelector(".spinner-overlay");

      spinnerOverlay.style.display = "flex";
      loginButton.disabled = true;

      try {
        let response = await fetch("controllers/LoginController.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/x-www-form-urlencoded",
          },
          body: new URLSearchParams({ email, password })
        });

        let result = await response.json();

        spinnerOverlay.style.display = "none";
        loginButton.disabled = false;

        if (result.status === "success") {
          window.location.href = result.redirect;
        } else {
          alertMessage.style.display = "block";
          alertMessage.innerText = result.message;
        }
      } catch (error) {
        spinnerOverlay.style.display = "none";
        loginButton.disabled = false;
        alertMessage.style.display = "block";
        alertMessage.innerText = "An error occurred. Please try again.";
      }
    });
  </script>
</body>

</html>
