<?php
$server = "localhost";
$user = "root";
$password = "";
$nama_database = "db_responsi";

$connect = mysqli_connect($server, $user, $password, $nama_database);

// Cek koneksi ke database
if (!$connect) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>
