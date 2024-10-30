<?php
include("./auth/config.php");
include("view_footer.php");
session_start();

// Memastikan pengguna sudah login
if ($_SESSION['status'] != "login") {
    header("location:./form_login.php?pesan=belum_login");
    exit();
}

// Mendapatkan data yang dikirimkan dari form update
$username = $_POST['username'];
$password = $_POST['password'];

// Validasi data yang diperlukan
if (empty($username) || empty($password)) {
    echo "<div class='error'>Username dan password tidak boleh kosong!</div>";
    exit();
}

// Mengenkripsi password baru
$password_encrypted = md5($password);  // Menggunakan md5 (pertimbangkan menggunakan hash yang lebih kuat seperti bcrypt di masa mendatang)

// Buat query untuk update data user berdasarkan username
$sql = "UPDATE user SET password='$password_encrypted' WHERE username='$username'";
$query = mysqli_query($connect, $sql);

// Cek apakah query berhasil dijalankan
if ($query) {
    echo "
    <div class='notification'>
        <p>Data berhasil diperbarui!</p>
        <a href='dashboard.php' class='btn'>Kembali ke Dashboard</a>
    </div>";
} else {
    echo "<div class='error'>Gagal memperbarui data: " . mysqli_error($connect) . "</div>";
}
?>