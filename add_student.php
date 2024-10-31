<?php
session_start();
require("./auth/config.php");

// Memastikan hanya admin yang bisa mengakses halaman ini
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login" || $_SESSION['level'] != "Admin") {
    header("location: form_login.php?error=unauthorized");
    exit();
}

// Inisialisasi variabel untuk pesan sukses atau error
$successMessage = "";
$errorMessage = "";

// Proses form jika ada data yang dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = mysqli_real_escape_string($connect, $_POST['nama']);
    $nim = mysqli_real_escape_string($connect, $_POST['nim']);
    
    // Validasi apakah data nama dan NIM sudah diisi
    if (!empty($nama) && !empty($nim)) {
        $sql = "INSERT INTO mahasiswa (nama, nim) VALUES ('$nama', '$nim')";
        if (mysqli_query($connect, $sql)) {
            $successMessage = "Data mahasiswa berhasil ditambahkan.";
        } else {
            $errorMessage = "Gagal menambahkan data mahasiswa: " . mysqli_error($connect);
        }
    } else {
        $errorMessage = "Nama dan NIM harus diisi.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
        }
        header {
            background-color: #6f3ad0;
            color: white;
            padding: 15px 0;
            width: 100%;
            text-align: center;
        }
        header h2 {
            margin: 0;
            font-weight: 600;
        }
        .container {
            max-width: 600px;
            width: 100%;
            margin: 30px auto;
            background-color: white;
            padding: 20px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        .btn-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .btn {
            padding: 10px 20px;
            border-radius: 4px;
            text-decoration: none;
            color: white;
            font-weight: 500;
            display: inline-block;
        }
        .btn-primary {
            background-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-success {
            background-color: #28a745;
        }
        .btn-success:hover {
            background-color: #218838;
        }
        .alert {
            padding: 15px;
            margin-top: 20px;
            border-radius: 4px;
            font-weight: 500;
            text-align: center;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
        }
        .form-label {
            font-weight: 600;
            display: block;
            margin-top: 10px;
        }
        .mb-3 {
            margin-bottom: 20px;
        }
        .form-control {
            width: 100%;
            padding: 8px 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <header>
        <h2>Tambah Mahasiswa</h2>
    </header>

    <div class="container">
        <!-- Tampilkan pesan sukses atau error -->
        <?php if ($successMessage) : ?>
            <div class="alert alert-success"><?php echo $successMessage; ?></div>
        <?php endif; ?>
        <?php if ($errorMessage) : ?>
            <div class="alert alert-danger"><?php echo $errorMessage; ?></div>
        <?php endif; ?>

        <!-- Form tambah mahasiswa -->
        <form action="add_student.php" method="POST">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Mahasiswa</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="nim" class="form-label">NIM Mahasiswa</label>
                <input type="text" class="form-control" id="nim" name="nim" required>
            </div>
            <div class="btn-container">
                <a href="./dashboard_admin.php" class="btn btn-primary">Kembali ke Dashboard Admin</a>
                <button type="submit" class="btn btn-success">Tambah Mahasiswa</button>
            </div>
        </form>
    </div>
</body>
</html>
