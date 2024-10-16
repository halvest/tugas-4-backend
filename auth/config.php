<?php
session_start();

$server = "localhost";
$user = "root";
$password = "";
$nama_database = "db_shinta";

$connect = mysqli_connect($server, $user, $password, $nama_database);
?>
