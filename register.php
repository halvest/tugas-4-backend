<?php
include("auth/config.php");

$username = $_POST['username'];
$password = md5($_POST['password']);

// Query untuk memasukkan data pengguna baru
$sql = "INSERT INTO user (username, password) VALUES ('$username', '$password')";
$query = mysqli_query($connect, $sql);

// Jika query berhasil
if ($query) {
    $message = "Register Berhasil!";
    $type = "success";
} else {
    $message = "Maaf, username sudah terdaftar. Silakan login.: " . mysqli_error($connect);
    $type = "error";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Status</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f5f5f5;
            margin: 0;
        }
        .message-container {
            background-color: white;
            width: 400px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .message-container h2 {
            font-size: 22px;
            margin-bottom: 20px;
        }
        .message {
            padding: 15px;
            border-radius: 5px;
            margin: 10px 0;
            font-size: 16px;
            color: white;
            text-align: center;
        }
        .message.success {
            background-color: #6f3ad0;
        }
        .message.error {
            background-color: #dc3545;
        }
        .back-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
        }
        .back-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="message-container">
        <h2>Status Registrasi</h2>
        <div class="message <?php echo $type; ?>">
            <?php echo $message; ?>
        </div>
        <a href="form_register.php" class="back-btn">Kembali ke Halaman Register</a>
    </div>
</body>
</html>
