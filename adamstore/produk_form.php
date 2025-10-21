<?php
include "config.php";
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin.php");
    exit;
}

// Inisialisasi variabel
$id = $nama = $jenis = $harga = $stok = "";
$edit = false;

// Jika edit
if (isset($_GET['id'])) {
    $edit = true;
    $id = intval($_GET['id']);
    $result = $conn->query("SELECT * FROM produk WHERE id=$id");
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nama = $row['nama'];
        $jenis = $row['jenis'];
        $harga = $row['harga'];
        $stok = $row['stok'];
    }
}

// Jika submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $harga = intval($_POST['harga']);
    $stok = intval($_POST['stok']);
    if (isset($_POST['id']) && $_POST['id'] != "") {
        // Update
        $id = intval($_POST['id']);
        $conn->query("UPDATE produk SET nama='$nama', jenis='$jenis', harga=$harga, stok=$stok WHERE id=$id");
    } else {
        // Insert
        $conn->query("INSERT INTO produk (nama, jenis, harga, stok) VALUES ('$nama', '$jenis', $harga, $stok)");
    }
    header("Location: dashboard.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title><?= $edit ? 'Edit' : 'Tambah' ?> Produk</title>
    <style>
        body { font-family: Arial; background: #f4f4f4; }
        .form-box {
            width: 340px; margin: 60px auto; background: #fff; padding: 32px 24px; border-radius: 14px; box-shadow: 0 2px 18px rgba(0,0,0,0.10); }
        h2 { text-align: center; margin-bottom: 18px; }
        form { display: flex; flex-direction: column; gap: 12px; }
        label { font-size: 14px; color: #444; margin-bottom: 2px; }
        input, select { width: 100%; padding: 12px 14px; border: 1.5px solid #e0e0e0; border-radius: 14px; font-size: 15px; background: #fff; margin: 0; box-sizing: border-box; box-shadow: none; outline: none; transition: border 0.2s; }
        input:focus, select:focus { border: 1.5px solid #2196F3; }
        button { width: 100%; padding: 11px; background: #4CAF50; border: none; color: white; border-radius: 6px; font-size: 16px; cursor: pointer; margin-top: 12px; transition: background 0.2s; }
        button:hover { background: #388e3c; }
        .back-btn { display: block; text-align: center; margin-top: 16px; color: #2196F3; text-decoration: none; }
    </style>
</head>
<body>
    <div class="form-box">
        <h2><?= $edit ? 'Edit' : 'Tambah' ?> Produk</h2>
        <form method="post">
            <?php if($edit): ?><input type="hidden" name="id" value="<?= $id ?>"><?php endif; ?>
            <label for="nama">Nama Produk</label>
            <input type="text" id="nama" name="nama" value="<?= htmlspecialchars($nama) ?>" required>
            <label for="jenis">Jenis</label>
            <select id="jenis" name="jenis" required>
                <option value="">-- Pilih Jenis --</option>
                <option value="Galon" <?= $jenis=="Galon"?'selected':'' ?>>Isi Ulang Galon</option>
                <option value="Gas" <?= $jenis=="Gas"?'selected':'' ?>>Gas LPG 3kg</option>
            </select>
            <label for="harga">Harga</label>
            <input type="number" id="harga" name="harga" value="<?= htmlspecialchars($harga) ?>" required>
            <label for="stok">Stok</label>
            <input type="number" id="stok" name="stok" value="<?= htmlspecialchars($stok) ?>" required>
            <button type="submit"><?= $edit ? 'Update' : 'Tambah' ?> Produk</button>
        </form>
        <a href="dashboard.php" class="back-btn">&larr; Kembali ke Dashboard</a>
    </div>
</body>
</html>
