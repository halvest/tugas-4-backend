<?php
require("./auth/config.php");
session_start();

if ($_SESSION['status'] != "login") {
    header("location:./form_login.php?pesan=belum_login");
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Lakukan validasi input jika diperlukan
    $password_encrypted = md5($password); // Menggunakan MD5, namun disarankan untuk ganti dengan bcrypt di masa depan

    // Insert data baru ke dalam database
    $sql = "INSERT INTO user (username, password) VALUES ('$username', '$password_encrypted')";
    if (mysqli_query($connect, $sql)) {
        header("location:./dashboard.php?pesan=berhasil_tambah");
    } else {
        echo "<div class='error'>Terjadi kesalahan: " . mysqli_error($connect) . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data User</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
        }
        header {
            background-color: #6f3ad0;
            color: white;
            padding: 10px 20px;
            text-align: center;
        }
        header h2 {
            margin: 0;
            color: white;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: white;
            padding: 30px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }
        .input-group {
            margin-bottom: 20px;
        }
        .input-group label {
            display: block;
            font-size: 14px;
            color: #555;
            margin-bottom: 5px;
        }
        .input-group input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .btn {
            display: inline-block;
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
            width: 100%;
            font-size: 16px;
        }
        .btn:hover {
            background-color: #218838;
        }
        .back-btn {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
            text-decoration: none;
            width: auto; 
            min-width: 100px; 
        }

        .back-btn:hover {
            background-color: #0056b3;
        }
        .error {
            margin-top: 20px;
            padding: 10px;
            background-color: #f44336;
            color: white;
            border-radius: 5px;
            text-align: center;
        }
    </style>
</head>
<body>
    <header>
        <h2>Tambah Data User</h2>
    </header>

    <div class="container">
        <form action="" method="POST">
            <div class="input-group">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
            </div>
            <button type="submit" name="submit" class="btn">Tambah Data</button>
        </form>
        <a href="./dashboard.php" class="back-btn">Kembali ke Dashboard</a>
    </div>
</body>
</html>

<?php include("view_footer.php"); ?>
