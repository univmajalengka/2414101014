<?php
include 'koneksi.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$hp = $_POST['hp'];
$email = $_POST['email'];
$tanggal = $_POST['tanggal'];
$hari = $_POST['hari'];
$peserta = $_POST['peserta'];
$paket = $_POST['paket'];

$query = "UPDATE pesanan SET 
nama='$nama', hp='$hp', email='$email', tanggal='$tanggal', hari='$hari', peserta='$peserta', paket='$paket'
WHERE id='$id'";

mysqli_query($conn, $query);

header("Location: modifikasi_pesanan.php");
?>