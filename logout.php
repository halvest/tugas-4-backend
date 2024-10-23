<?php
require ("./auth/config.php");
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .logout-container {
            text-align: center;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        .logout-container h2 {
            color: #6f3ad0;
            margin-bottom: 20px;
        }
        .logout-container p {
            color: #333;
            margin-bottom: 10px;
        }
        .spinner {
            margin-top: 20px;
            border: 4px solid #f3f3f3;
            border-radius: 50%;
            border-top: 4px solid #6f3ad0;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <div class="logout-container">
        <h2>Anda berhasil logout</h2>
        <p>Silakan login kembali.</p>
        <p>Anda akan dialihkan ke halaman login dalam beberapa detik...</p>
        <div class="spinner"></div>
    </div>

    <?php
    // Redirect ke form_login.php setelah 3 detik
    header("Refresh: 3; url=./form_login.php");
    exit();
    ?>
</body>
</html>
