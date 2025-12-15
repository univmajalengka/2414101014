<?php
include 'koneksi.php';
$data = mysqli_query($conn, "SELECT * FROM pesanan");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pesanan - Desa Wisata Bantaragung</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <meta name="theme-color" content="#1e4620">
    <style>
        .site-font{font-family: Poppins, Arial, sans-serif;}
        .table-container{max-width: 1000px; margin: 0 auto; background: var(--card-bg); padding: 24px; border-radius: 12px; box-shadow: 0 8px 26px rgba(5,25,10,0.06);}
        table{width: 100%; border-collapse: collapse;}
        th, td{padding: 12px; text-align: left; border-bottom: 1px solid #e5e7eb;}
        th{background: var(--green-800); color: #fff; font-weight: 600;}
        .btn-small{padding: 6px 12px; font-size: 14px; border-radius: 6px; text-decoration: none; display: inline-block; margin: 2px;}
        .btn-edit{background: #007bff; color: #fff;}
        .btn-delete{background: #dc3545; color: #fff;}
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
                    <li><a href="index.php">Beranda</a></li>
                    <li><a href="index.php#objek">Objek Wisata</a></li>
                    <li><a href="index.php#tentang">Tentang</a></li>
                    <li><a href="index.php#fasilitas">Fasilitas</a></li>
                    <li><a href="index.php#paket">Paket</a></li>
                    <li><a href="index.php#video">Video</a></li>
                    <li><a href="index.php#galeri">Galeri</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <section class="container" style="padding: 36px 0;">
            <h2 style="text-align: center; margin-bottom: 24px;">Daftar Pesanan Paket Wisata</h2>
            <div class="table-container">
                <table>
                    <tr>
                        <th>Nama</th>
                        <th>HP</th>
                        <th>Email</th>
                        <th>Tanggal</th>
                        <th>Paket</th>
                        <th>Total Tagihan</th>
                        <th>Aksi</th>
                    </tr>

                    <?php while($d = mysqli_fetch_array($data)) { ?>
                    <tr>
                        <td><?= $d['nama']; ?></td>
                        <td><?= $d['hp']; ?></td>
                        <td><?= isset($d['email']) ? $d['email'] : '-'; ?></td>
                        <td><?= $d['tanggal']; ?></td>
                        <td><?= isset($d['paket']) ? $d['paket'] : '-'; ?></td>
                        <td>Rp <?= number_format($d['total']); ?></td>
                        <td>
                            <a href="edit_pesanan.php?id=<?= $d['id']; ?>" class="btn-small btn-edit">Edit</a>
                            <a href="hapus_pesanan.php?id=<?= $d['id']; ?>" class="btn-small btn-delete"
                               onclick="return confirm('Yakin ingin menghapus pesanan ini?')">
                               Hapus
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
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
