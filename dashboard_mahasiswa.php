<?php
session_start();
require("./auth/config.php");

// Memastikan hanya mahasiswa yang bisa mengakses halaman ini
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login" || $_SESSION['level'] != "Mahasiswa") {
    header("location: form_login.php?error=unauthorized");
    exit();
}

// Mengambil data nilai dari tabel grades berdasarkan NIM mahasiswa yang sedang login
$sql = "SELECT mahasiswa.nim, mahasiswa.nama, grades.grade AS nilai 
        FROM mahasiswa 
        LEFT JOIN grades ON mahasiswa.nim = grades.nim";
$query = mysqli_query($connect, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Mahasiswa</title>
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
        .logout-btn {
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            background-color: #dc3545;
            color: white;
            cursor: pointer;
            margin: 20px 0;
        }
        .logout-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <header>
        <h2>Dashboard Mahasiswa - Data Nilai Pribadi</h2>
    </header>
    <div class="container">
        <a href="./logout.php" class="logout-btn">Logout</a>

        <table>
            <thead>
                <tr>
                    <th>Nomor</th>
                    <th>Nama Mahasiswa</th>
                    <th>NIM</th>
                    <th>Nilai</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $nomor = 1;
                while ($data = mysqli_fetch_assoc($query)) {
                    echo "<tr>";
                    echo "<td>" . $nomor . "</td>";
                    echo "<td>" . htmlspecialchars($data['nama']) . "</td>"; // Sanitasi output nama
                    echo "<td>" . htmlspecialchars($data['nim']) . "</td>";  // Sanitasi output NIM
                    echo "<td>" . (isset($data['nilai']) ? htmlspecialchars($data['nilai']) : '-') . "</td>"; // Sanitasi output nilai jika ada
                    echo "</tr>";
                    $nomor++;
                }

                // Tampilkan pesan jika data kosong
                if (mysqli_num_rows($query) == 0) {
                    echo "<tr><td colspan='4' style='text-align: center;'>Data nilai belum tersedia</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php include("view_footer.php"); ?>
