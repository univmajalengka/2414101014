<?php
include 'koneksi.php';

// Test data
$nama = 'Test Nama';
$hp = '08123456789';
$email = 'test@example.com';
$tanggal = '2025-12-15';
$hari = 1;
$peserta = 1;
$paket = 'Paket Test';
$penginapan = 1000000;
$transportasi = 1200000;
$makan = 500000;

$harga_paket = $penginapan + $transportasi + $makan;
$total = $harga_paket * $hari * $peserta;

$query = "INSERT INTO pesanan 
(nama, hp, email, tanggal, hari, peserta, paket, penginapan, transportasi, makan, harga_paket, total)
VALUES 
('$nama','$hp','$email','$tanggal','$hari','$peserta','$paket',
'$penginapan','$transportasi','$makan','$harga_paket','$total')";

if (mysqli_query($conn, $query)) {
    echo "Insert berhasil";
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>