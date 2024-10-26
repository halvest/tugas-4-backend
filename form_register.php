<?php
$errorMessage = @$_GET["error"];
session_start();
if($_SESSION['status']=="login"){
    header("location:./dashboard.php");
    }
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register New Account</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f5f5f5;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }
            .register-container {
                background-color: white;
                width: 400px;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                text-align: center;
            }
            .register-container h2 {
                font-size: 22px;
                margin-bottom: 20px;
            }
            .register-container label {
                display: block;
                text-align: left;
                margin-bottom: 5px;
                font-weight: bold;
            }
            .register-container input[type="text"] {
                width: 100%;
                padding: 5px;
                margin-bottom: 15px;
                border: 1px solid #ccc;
                border-radius: 5px;
                font-size: 14px;
            }
            .register-container .radio-group {
                margin-bottom: 20px;
                text-align: left;
            }
            .register-container input[type="submit"] {
                width: 100%;
                padding: 10px;
                background-color: #6f3ad0;
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                font-size: 16px;
            }
            .register-container input[type="submit"]:hover {
                background-color: #a600ff;
            }
            .login-link {
                margin-top: 15px;
                font-size: 12px;
            }
            .login-link a {
                color: #007bff;
                text-decoration: none;
            }
            .login-link a:hover {
                text-decoration: underline;
            }
            .image-container img {
                width: 100px;
                height: auto;
                border-radius: 8px;
                margin-bottom: 20px;
            }
        </style>
    </head>
    <body>
        <div class="register-container">
            <div class="image-container">
                <img src="img\logo.png" alt="Logo Amikom">
            </div>
            <h2>Register New Account</h2>
            <form action="register.php" method="POST">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" value="">

                <label for="subject">Password</label>
                <input type="text" id="password" name="password" value="">

                <input type="submit" value="Register">
            </form>
            <div class="login-link">
                <p>Have an account? <a href="form_login.php">Login here</a></p>
            </div>
        </div>
    </body>
    </html>
