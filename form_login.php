<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
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
        .login-container {
            background-color: white;
            width: 350px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .login-container h2 {
            font-size: 20px;
            margin-bottom: 20px;
        }
        .login-container label {
            display: block;
            text-align: left;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }
        .login-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #6f3ad0;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .login-container input[type="submit"]:hover {
            background-color: #a600ff;
        }
        .register {
            margin-top: 15px;
            font-size: 12px;
        }
        .register a {
            color: #007bff;
            text-decoration: none;
        }
        .register a:hover {
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
    <div class="login-container">
        <div class="image-container">
            <img src="img\logo.png" alt="Logo Amikom">
        </div>
        <h2>Sign into your account</h2>
        <form action="login.php" method="POST">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" value="">

            <label for="password">Password</label>
            <input type="password" id="password" name="password" value="">

            <input type="submit" value="Login">
        </form>
        <div class="register">
            <p>Don't have an account? <a href="form_register.php">Register here</a></p>
        </div>
    </div>
    <div class="notification">
            <?php
            if (isset($_GET['pesan'])) {
                if ($_GET['pesan'] == "gagal") {
                    echo "Login gagal! Username dan password salah!";
                } else if ($_GET['pesan'] == "logout") {
                    echo "Anda telah berhasil logout";
                } else if ($_GET['pesan'] == "belum_login") {
                    echo "Anda harus login untuk mengakses halaman admin";
                }
            }
            ?>
        </div>
    </div>
    
</body>
</html>
