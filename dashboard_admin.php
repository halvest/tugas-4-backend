<?php
require("./auth/config.php");
session_start();

// Mengecek apakah pengguna sudah login dan memiliki level Admin
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login" || $_SESSION['level'] != "Admin") {
    header("location: form_login.php?error=unauthorized");
    exit();
}

// Menampilkan pesan error jika ada
$errorMessage = isset($_GET["error"]) ? htmlspecialchars($_GET["error"]) : "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
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
        }
        a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }
        a:hover {
            color: #0056b3;
        }
        .container {
            max-width: 1000px;
            margin: 30px auto;
            background-color: white;
            padding: 20px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th, table td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        table th {
            background-color: #343a40;
            color: white;
        }
        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .logout-btn, .tambah-btn {
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin: 20px 0;
        }
        .logout-btn {
            background-color: #dc3545;
            color: white;
        }
        .logout-btn:hover {
            background-color: #c82333;
        }
        .tambah-btn {
            background-color: #28a745;
            color: white;
        }
        .tambah-btn:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <header>
        <h2>Dashboard Admin - Tambah Data Mahasiswa</h2>
    </header>

    <div class="container">
        <?php if ($errorMessage): ?>
            <div class="alert alert-danger"><?= $errorMessage; ?></div>
        <?php endif; ?>

        <a href="./logout.php" class="logout-btn">Logout</a>
        <a href="./add_student.php" class="tambah-btn">Tambah Mahasiswa</a>

        <?php
            $sql = "SELECT * FROM mahasiswa";
            $query = mysqli_query($connect, $sql);
        ?>

        <table>
            <thead>
                <tr>
                    <th>Nomor</th>
                    <th>Nama Mahasiswa</th>
                    <th>NIM</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $nomor = 1;
                while ($data = mysqli_fetch_array($query)) {
                    echo "<tr>";
                    echo "<td>" . $nomor++ . "</td>";
                    echo "<td>" . htmlspecialchars($data['nama']) . "</td>"; // Sanitize output
                    echo "<td>" . htmlspecialchars($data['nim']) . "</td>"; // Sanitize output
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php include("view_footer.php"); ?>
