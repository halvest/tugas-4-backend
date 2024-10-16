<?php
include("auth/config.php"); 

$username = $_POST['username'];
$password = md5($_POST['password']); 

// buat query
$db_shinta = "INSERT INTO user (username, password) VALUES ('$username', '$password')";
$query = mysqli_query($connect, $db_shinta); 

if ($query) {
    echo "Register Berhasil!.";
    exit;
} else {
    echo "Maaf, username sudah terdaftar. Silakan login.: " . mysqli_error($connect);
    exit;
}
?>
