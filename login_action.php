<?php
session_start();
include("auth/config.php");

$username = $_POST['username'];
$password = $_POST['password'];

// Mengecek apakah username dan password tidak kosong
if (!empty($username) && !empty($password)) {

    // Hashing password sesuai kebutuhan (gunakan hashing lebih aman seperti password_hash jika bisa)
    $password_md5 = md5($password);
    
    // Query untuk mencari user berdasarkan username dan password
    $query = mysqli_query($connect, "SELECT * FROM user WHERE username = '$username' AND password = '$password_md5'");

    // Cek apakah user ditemukan
    if (mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_assoc($query);

        // Set session untuk status login
        $_SESSION['status'] = "login";
        $_SESSION['username'] = $username;
        $_SESSION['level'] = $data['level'];

        // Pengalihan berdasarkan level user
        if ($data['level'] == "Admin") {
            header("location: ./dashboard_admin.php");

        } elseif ($data['level'] == "Mahasiswa") {
            header("location: ./dashboard_mahasiswa.php");

        } elseif ($data['level'] == "Dosen") {
            header("location: ./dashboard_dosen.php");

        } else {
            $_SESSION['error'] = "Level pengguna tidak dikenali.";
            header("location: ./form_login.php?error=level_invalid");
        }
        exit();

    } else {
        $_SESSION['error'] = "Username atau Password Anda salah";
        header("location: ./form_login.php?error=invalid_login");
        exit();
    }

} else {
    $_SESSION['error'] = "Username atau password tidak boleh kosong";
    header("location: ./form_login.php?error=empty_fields");
    exit();
}
?>
