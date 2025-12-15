<?php
include 'koneksi.php';

$nama      = $_POST['nama'];
$hp        = $_POST['hp'];
$email     = $_POST['email'];
$tanggal   = $_POST['tanggal'];
$hari      = $_POST['hari'];
$peserta   = $_POST['peserta'];
$paket     = $_POST['paket'];

$penginapan   = isset($_POST['penginapan']) ? $_POST['penginapan'] : 0;
$transportasi = isset($_POST['transportasi']) ? $_POST['transportasi'] : 0;
$makan        = isset($_POST['makan']) ? $_POST['makan'] : 0;

$harga_paket = $penginapan + $transportasi + $makan;
$total = $harga_paket * $hari * $peserta;

$query = "INSERT INTO pesanan 
(nama, hp, email, tanggal, hari, peserta, paket, penginapan, transportasi, makan, harga_paket, total)
VALUES 
('$nama','$hp','$email','$tanggal','$hari','$peserta','$paket',
'$penginapan','$transportasi','$makan','$harga_paket','$total')";

if (mysqli_query($conn, $query)) {
    header("Location: modifikasi_pesanan.php");
} else {
    die("Error menyimpan data: " . mysqli_error($conn));
}
?>
