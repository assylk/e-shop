<?php
/* Main page with two forms: sign up and log in */
require 'db.php';
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css" />
</head>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (isset($_POST['login'])) { //user logging in

        require 'login.php';

    }

    elseif (isset($_POST['register'])) { //user registering

        require 'register.php';

    }
}
?>
<body>
    <div class="form-container">
        <!-- Login Form -->
        <!-- Toggle Buttons -->
        <div class="toggle-buttons">
            <button id="showLoginBtn" onclick="showLogin()">Login</button>
            <button id="showRegisterBtn" onclick="showRegister()">Register</button>
        </div>
        <div class="login-container" id="loginContainer">
            <h2>Welcome Back!</h2>
            <p>Please login to your account</p>
            <form action="security.php" method="post" id="loginForm">
                <div class="input-container">
                    <input type="text" id="email" name="email" class="input-field" placeholder="Email" required />
                    <div id="emailMessage" class="message"></div>
                </div>
                <div class="input-container">
                    <input type="password" id="password" name="password" class="input-field" placeholder="Password"
                        required />
                    <div id="passwordMessage" class="message"></div>
                </div>
                <button type="submit" name="login" id="loginBtn" class="btn">
                    Login
                </button>
            </form>
        </div>

        <!-- Registration Form -->
        <div class="login-container" id="registerContainer" style="display: none">
            <h2>Create Account</h2>
            <p>Register for a new account</p>
            <form id="registerForm" action="security.php" method="post">
                <div class="input-container">
                    <input type="text" id="" class="input-field" name="firstname" placeholder="First Name" required />
                    <!-- You can add a message div if needed -->
                </div>
                <div class="input-container">
                    <input type="text" id="" class="input-field" autocomplete="off" name="lastname"
                        placeholder="Last Name" required />
                    <!-- You can add a message div if needed -->
                </div>
                <div class="input-container">
                    <input type="text" id="registerEmail" name="email" class="input-field" placeholder="Email"
                        required />
                    <!-- You can add a message div if needed -->
                </div>
                <div class="input-container">
                    <input type="text" id="" autocomplete="off" name="address" class="input-field" placeholder="Adresse"
                        required />
                    <!-- You can add a message div if needed -->
                </div>
                <div class="input-container">
                    <input type="tel" id="" autocomplete="off" name="phone" class="input-field"
                        placeholder="Example 53 219 645" required />
                    <!-- You can add a message div if needed -->
                </div>
                <div class="input-container">
                    <input type="password" id="registerPassword" autocomplete="off" name="password" class="input-field"
                        placeholder="Password" required />
                    <!-- You can add a message div if needed -->
                </div>
                <button type="submit" class="btn" name="register">Register</button>
            </form>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>