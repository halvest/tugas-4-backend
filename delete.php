<?php
session_start();
require "./auth/config.php";

$akses = @$_SESSION['akses'];

if($_SESSION['status']!="login"){
    header("location:./form_login.php?pesan=belum_login");

} else {
    $username = @$_GET["username"];

    if (empty($username)){
        header("location: ./dashboard.php");
    }
    $query = "DELETE FROM user WHERE username='$username'";
    mysqli_query($connect,$query);

    header("location: ./dashboard.php");
}