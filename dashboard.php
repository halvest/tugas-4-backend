<?php
require("./auth/config.php");
session_start();

if ($_SESSION['status'] != "login") {
    header("location:./form_login.php?pesan=belum_login");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    
    <style>
        /* CSS sama seperti sebelumnya */
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
            background-color: #dc3545;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 20px;
        }
        .logout-btn:hover {
            background-color: #c82333;
        }
        .tambah-btn {
            background-color: #28a745;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-bottom: 20px;
        }
        .tambah-btn:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <header>
        <h2>Dashboard User</h2>
    </header>

    <div class="container">
        <a href="./logout.php" class="logout-btn">Logout</a>

        <!-- Link Tambah Data -->
        <a href="./add.php" class="tambah-btn">Tambah Data</a>

        <?php
            $sql = "SELECT * FROM user";
            $query = mysqli_query($connect, $sql);
        ?>

        <table>
            <thead>
                <tr>
                    <th>Nomor</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $nomor = 1;
                while ($datauser = mysqli_fetch_array($query)) {
                    echo "<tr>";
                    echo "<td>". $nomor ."</td>";
                    echo "<td>". $datauser["username"] ."</td>";
                    echo "<td>". $datauser["password"] ."</td>";
                    echo "<td>";
                    echo "<a href='./update.php?username=" . $datauser['username'] . "'>Edit</a> | ";
                    echo "<a href='./delete.php?username=" . $datauser['username'] . "' onclick=\"return confirm('Apakah Anda yakin ingin menghapus?')\">Hapus</a>";
                    echo "</td>";
                    echo "</tr>";

                    $nomor++;
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php include("view_footer.php"); ?>
