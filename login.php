<?php
session_start();

include 'auth/config.php';

$username = $_POST['username'];
$password = $_POST['password'];

if (!empty($username) && !empty($password)) {

    $password_md5 = md5($password);

    $query = mysqli_query($connect, "SELECT * FROM user WHERE username='$username' AND password='$password_md5'");

    $result = mysqli_num_rows($query);

    if ($result > 0) {
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "login";
        header("/view/home.php");
    } else {
        $_SESSION['error'] = "Username atau Password Anda salah";
        header("/index.php?app=gagal");
    }

} else {
    $_SESSION['error'] = "Username atau password tidak boleh kosong";
    header("/index.php?app=error");
}
?>