<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM pesanan WHERE id='$id'");
$d = mysqli_fetch_array($data);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pesanan - Desa Wisata Bantaragung</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <meta name="theme-color" content="#1e4620">
    <style>
        .site-font{font-family: Poppins, Arial, sans-serif;}
        .form-container{max-width: 600px; margin: 0 auto; background: var(--card-bg); padding: 24px; border-radius: 12px; box-shadow: 0 8px 26px rgba(5,25,10,0.06);}
        .form-group{margin-bottom: 16px;}
        label{display: block; margin-bottom: 4px; font-weight: 600;}
        input, select{width: 100%; padding: 10px; border: 1px solid #e5e7eb; border-radius: 8px; font-size: 16px;}
    </style>
</head>
<body class="site-font">
    <header class="header">
        <div class="container header-inner">
            <div>
                <a href="index.php" class="brand-link" aria-label="Beranda Desa Wisata Bantaragung">
                    <img src="images/logo.png" alt="Logo Desa Wisata Bantaragung" class="site-logo">
                <span class="brand-text">Desa Wisata Bantaragung</span>
</a>
                <p class="tagline">Kecamatan Sindangwangi, Kabupaten Majalengka</p>
            </div>
            <nav class="navbar" aria-label="Main navigation">
                <button class="nav-toggle" aria-expanded="false" aria-controls="nav-list">☰</button>
                <ul id="nav-list">
                    <li><a href="modifikasi_pesanan.php">Daftar Pesanan</a></li>
                    <li><a href="index.php">Beranda</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <section class="container" style="padding: 36px 0;">
            <h2 style="text-align: center; margin-bottom: 24px;">Edit Pesanan Wisata</h2>
            <div class="form-container">
                <form action="proses_edit.php" method="POST">
                    <input type="hidden" name="id" value="<?= $d['id']; ?>">

                    <div class="form-group">
                        <label for="paket">Paket Wisata</label>
                        <select name="paket" id="paket">
                            <option value="Paket Eduwisata Bantaragung" <?= (isset($d['paket']) && $d['paket'] == 'Paket Eduwisata Bantaragung') ? 'selected' : ''; ?>>Paket Eduwisata Bantaragung</option>
                            <option value="Paket Camping Curug Cipeuteuy" <?= (isset($d['paket']) && $d['paket'] == 'Paket Camping Curug Cipeuteuy') ? 'selected' : ''; ?>>Paket Camping Curug Cipeuteuy</option>
                            <option value="Paket Desa Wisata Bantaragung" <?= (isset($d['paket']) && $d['paket'] == 'Paket Desa Wisata Bantaragung') ? 'selected' : ''; ?>>Paket Desa Wisata Bantaragung</option>
                            <option value="Paket Live in desa Bantaragung" <?= (isset($d['paket']) && $d['paket'] == 'Paket Live in desa Bantaragung') ? 'selected' : ''; ?>>Paket Live in desa Bantaragung</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama Pemesan</label>
                        <input type="text" name="nama" id="nama" value="<?= $d['nama']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="hp">Nomor HP</label>
                        <input type="tel" name="hp" id="hp" value="<?= $d['hp']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value="<?= isset($d['email']) ? $d['email'] : ''; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="tanggal">Tanggal Pesan</label>
                        <input type="date" name="tanggal" id="tanggal" value="<?= $d['tanggal']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="hari">Waktu Perjalanan (Hari)</label>
                        <input type="number" name="hari" id="hari" value="<?= $d['hari']; ?>" min="1" required>
                    </div>

                    <div class="form-group">
                        <label for="peserta">Jumlah Peserta</label>
                        <input type="number" name="peserta" id="peserta" value="<?= $d['peserta']; ?>" min="1" required>
                    </div>

                    <button type="submit" class="btn primary" style="width: 100%; padding: 12px; font-size: 16px;">Update Pesanan</button>
                </form>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2025 Desa Wisata Bantaragung. All rights reserved.</p>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>
