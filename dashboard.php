<?php
require ("./auth/config.php");
session_start();
$akses = @$_SESSION["akses"];

if ($akses != false )
{
    header("location:./form_login.php?error=Halaman Dashboard harus login!");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
    </style>
</head>
<body>
    <header>
        <h2>Dashboard User</h2>
    </header>

    <div class="container">
        <a href="./logout.php" class="logout-btn">Logout</a>

        <?php
            $sql = "select * from user";
            $query = mysqli_query($connect, $sql);
        ?>

        <table>
            <thead>
                <tr>
                    <th>Nomor</th>
                    <th>Username</th>
                    <th>Password</th>
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
                    echo "</tr>";

                    $nomor++;
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>