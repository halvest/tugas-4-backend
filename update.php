<?php
include("./auth/config.php");
session_start();

if ($_SESSION['status'] != "login") {
    header("location:./form_login.php?pesan=belum_login");
    exit;
}

// Mendapatkan username dari parameter URL
$username = $_GET['username'];

// Buat query untuk mengambil data dari database berdasarkan username
$sql = mysqli_query($connect, "SELECT * FROM user WHERE username='$username'");
$user = mysqli_fetch_assoc($sql);

// Jika data yang di-edit tidak ditemukan
if (mysqli_num_rows($sql) < 1) {
    die("Data tidak ditemukan...");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: white;
            padding: 30px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h3 {
            text-align: center;
            margin-bottom: 20px;
            color: #6f3ad0;
        }
        fieldset {
            border: none;
            padding: 0;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 10px;
            color: #333;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 4px;
            border: 1px solid #ddd;
            font-size: 16px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #6f3ad0;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #5b29b6;
        }
        .container header {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h3>Form Update Data User</h3>
        </header>

        <form action="update_action.php" method="POST">
            <fieldset>
                <p>
                    <label for="username">Username:</label>
                    <input type="text" name="username" value="<?php echo $user['username']; ?>" readonly />
                </p>
                <p>
                    <label for="password">Password Baru:</label>
                    <input type="password" name="password" placeholder="Masukkan password baru" />
                </p>
                <p>
                    <input type="submit" value="Update" name="edit" />
                </p>
            </fieldset>
        </form>
    </div>
</body>
</html>

<?php include("view_footer.php"); ?>
