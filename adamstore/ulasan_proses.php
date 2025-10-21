<?php
include 'config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = mysqli_real_escape_string($conn, $_POST['nama_ulasan']);
    $rating = intval($_POST['rating']);
    $isi = mysqli_real_escape_string($conn, $_POST['isi_ulasan']);
    $sql = "INSERT INTO ulasan (nama, rating, isi, tanggal) VALUES ('$nama', $rating, '$isi', NOW())";
    if ($conn->query($sql) === TRUE) {
        header('Location: index.php?ulasan=sukses#ulasan');
        exit;
    } else {
        header('Location: index.php?ulasan=gagal#ulasan');
        exit;
    }
} else {
    header('Location: index.php');
    exit;
}
