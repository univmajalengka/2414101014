<?php
include 'config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $whatsapp = mysqli_real_escape_string($conn, $_POST['whatsapp']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    $produk = mysqli_real_escape_string($conn, $_POST['produk']);
    $jumlah = intval($_POST['jumlah']);

    $sql = "INSERT INTO pesanan (nama, whatsapp, alamat, produk, jumlah, tanggal) VALUES ('$nama', '$whatsapp', '$alamat', '$produk', $jumlah, NOW())";
    if ($conn->query($sql) === TRUE) {
        // Kurangi stok produk sesuai pesanan
        if ($produk == 'air_galon') {
            $conn->query("UPDATE produk SET stok = stok - $jumlah WHERE jenis = 'Galon'");
        } elseif ($produk == 'gas') {
            $conn->query("UPDATE produk SET stok = stok - $jumlah WHERE jenis = 'Gas'");
        } elseif ($produk == 'air_galon+gas' || $produk == 'air_galon+gas') {
            $conn->query("UPDATE produk SET stok = stok - $jumlah WHERE jenis = 'Galon'");
            $conn->query("UPDATE produk SET stok = stok - $jumlah WHERE jenis = 'Gas'");
        }
        echo '<script>alert("Pesanan berhasil dikirim! Kami akan segera memproses pesanan Anda.");window.location="index.php";</script>';
    } else {
        echo '<script>alert("Gagal menyimpan pesanan. Silakan coba lagi.");window.location="index.php";</script>';
    }
} else {
    header('Location: index.php');
    exit;
}
