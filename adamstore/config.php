<?php
$host = "localhost"; // server
$user = "root";      // default user XAMPP
$pass = "";          // default password kosong di XAMPP
$db   = "adamstore"; // nama database (pastikan sudah dibuat di phpMyAdmin)

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
