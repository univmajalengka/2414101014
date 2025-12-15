<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pemesanan Wisata - Desa Wisata Bantaragung</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <meta name="theme-color" content="#1e4620">
    <style>
        /* tiny inline fallback to avoid FOIT while font loads */
        .site-font{font-family: Poppins, Arial, sans-serif;}
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
            <h2 style="text-align: center; margin-bottom: 24px;">Form Pemesanan Paket Wisata</h2>
            <div style="max-width: 600px; margin: 0 auto; background: var(--card-bg); padding: 24px; border-radius: 12px; box-shadow: 0 8px 26px rgba(5,25,10,0.06);">
                <form action="proses_simpan.php" method="POST">
                    <div style="margin-bottom: 16px;">
                        <label for="paket" style="display: block; margin-bottom: 4px; font-weight: 600;">Pilih Paket Wisata</label>
                        <select name="paket" id="paket" required style="width: 100%; padding: 10px; border: 1px solid #e5e7eb; border-radius: 8px; font-size: 16px;">
                            <option value="">-- Pilih Paket --</option>
                            <option value="Paket Eduwisata Bantaragung">Paket Eduwisata Bantaragung (Rp 85.000)</option>
                            <option value="Paket Camping Curug Cipeuteuy">Paket Camping Curug Cipeuteuy (Rp 350.000)</option>
                            <option value="Paket Desa Wisata Bantaragung">Paket Desa Wisata Bantaragung (Rp 100.000)</option>
                            <option value="Paket Live in desa Bantaragung">Paket Live in desa Bantaragung (Rp 750.000)</option>
                        </select>
                    </div>

                    <div style="margin-bottom: 16px;">
                        <label for="nama" style="display: block; margin-bottom: 4px; font-weight: 600;">Nama Pemesan</label>
                        <input type="text" name="nama" id="nama" required style="width: 100%; padding: 10px; border: 1px solid #e5e7eb; border-radius: 8px; font-size: 16px;">
                    </div>

                    <div style="margin-bottom: 16px;">
                        <label for="hp" style="display: block; margin-bottom: 4px; font-weight: 600;">Nomor HP</label>
                        <input type="tel" name="hp" id="hp" required style="width: 100%; padding: 10px; border: 1px solid #e5e7eb; border-radius: 8px; font-size: 16px;">
                    </div>

                    <div style="margin-bottom: 16px;">
                        <label for="email" style="display: block; margin-bottom: 4px; font-weight: 600;">Email</label>
                        <input type="email" name="email" id="email" required style="width: 100%; padding: 10px; border: 1px solid #e5e7eb; border-radius: 8px; font-size: 16px;">
                    </div>

                    <div style="margin-bottom: 16px;">
                        <label for="tanggal" style="display: block; margin-bottom: 4px; font-weight: 600;">Tanggal Pesan</label>
                        <input type="date" name="tanggal" id="tanggal" required style="width: 100%; padding: 10px; border: 1px solid #e5e7eb; border-radius: 8px; font-size: 16px;">
                    </div>

                    <div style="margin-bottom: 16px;">
                        <label for="hari" style="display: block; margin-bottom: 4px; font-weight: 600;">Waktu Perjalanan (Hari)</label>
                        <input type="number" name="hari" id="hari" min="1" required style="width: 100%; padding: 10px; border: 1px solid #e5e7eb; border-radius: 8px; font-size: 16px;">
                    </div>

                    <div style="margin-bottom: 16px;">
                        <label for="peserta" style="display: block; margin-bottom: 4px; font-weight: 600;">Jumlah Peserta</label>
                        <input type="number" name="peserta" id="peserta" min="1" required style="width: 100%; padding: 10px; border: 1px solid #e5e7eb; border-radius: 8px; font-size: 16px;">
                    </div>

                    <div style="margin-bottom: 20px;">
                        <label style="display: block; margin-bottom: 8px; font-weight: 600;">Pelayanan Tambahan</label>
                        <div style="display: flex; flex-direction: column; gap: 8px;">
                            <label style="display: flex; align-items: center; gap: 8px;">
                                <input type="checkbox" name="penginapan" value="1000000">
                                Penginapan (Rp 1.000.000)
                            </label>
                            <label style="display: flex; align-items: center; gap: 8px;">
                                <input type="checkbox" name="transportasi" value="1200000">
                                Transportasi (Rp 1.200.000)
                            </label>
                            <label style="display: flex; align-items: center; gap: 8px;">
                                <input type="checkbox" name="makan" value="500000">
                                Makan (Rp 500.000)
                            </label>
                        </div>
                    </div>

                    <button type="submit" class="btn primary" style="width: 100%; padding: 12px; font-size: 16px;">Kirim Pesanan</button>
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
