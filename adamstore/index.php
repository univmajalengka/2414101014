<?php
// index.php
include 'config.php';

// Ambil stok produk dari database
$stok_galon = $stok_gas = 0;
$result = $conn->query("SELECT * FROM produk");
if ($result) {
  while ($row = $result->fetch_assoc()) {
    if (strtolower($row['jenis']) == 'galon') {
      $stok_galon = $row['stok'];
    } elseif (strtolower($row['jenis']) == 'gas') {
      $stok_gas = $row['stok'];
    }
  }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Adam Store - Air Isi Ulang dan Gas LPG 3KG</title>
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="assets/css/style.css">

  <style>
    body { background-color: #f8fbff; }
    .hero { background: linear-gradient(to right, #0077b6, #0096c7); color: white; }
    .card:hover { transform: scale(1.05); transition: 0.3s; }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg glass shadow-sm">
  <div class="container">
    <!-- Logo -->
    <a class="navbar-brand d-flex align-items-center" href="index.php">
      <img src="assets/images/logo.jpg" alt="Adam Store" width="56" height="56" class="me-2">
      <span class="fw-bold text-primary">Adam Store</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="mainNavbar">
      <div class="navbar-nav ms-auto">
  <a href="index.php" class="btn btn-primary mx-1 my-1 my-lg-0"><i class="bi bi-house-door-fill me-1"></i>Home</a>
  <a href="#order" class="btn btn-success mx-1 my-1 my-lg-0"><i class="bi bi-cart-fill me-1"></i>Order</a>
  <a href="admin.php" class="btn btn-warning mx-1 my-1 my-lg-0"><i class="bi bi-person-gear me-1"></i>Admin</a>
      </div>
    </div>
  </div>
</nav>

<!-- Hero -->
<div class="hero text-center p-5">
  <h1>Air Isi Ulang Segar & Gas LPG 3 Kg, Cepat Sampai</h1>
  <p>Adam Store menghadirkan layanan antar galon isi ulang dan gas LPG 3 kg langsung ke rumah Anda dengan kualitas terjamin dan harga terjangkau.</p>
</div>

<!-- Tentang Kami -->
<div class="container my-5">
  <h2 class="text-center mb-4">Tentang Adam Store</h2>
  <div class="row align-items-center">
    <div class="col-md-7">
      <p class="text-center text-md-start">
        Adam Store berdiri sejak tahun 2018 sebagai kios galon isi ulang dan penyedia gas LPG 3 kg terpercaya.<br>
        Kami berkomitmen menyediakan air minum segar, higienis, serta gas rumah tangga dengan harga terjangkau untuk masyarakat Majalengka.<br>
        Dengan proses penyaringan modern dan pelayanan antar cepat, kami siap memenuhi kebutuhan harian Anda dengan aman dan praktis.
      </p>
    </div>
    <div class="col-md-5 text-center mt-4 mt-md-0">
      <img src="assets/images/owner.jpg" alt="Pengisian Galon oleh Owner" class="img-fluid rounded shadow" style="max-height:320px;object-fit:cover;">
      <p class="mt-2 text-muted" style="font-size:15px;">Proses pengisian galon oleh owner</p>
    </div>
  </div>
</div>

<!-- Visi Misi -->
<div class="container my-5">
  <div class="row text-center">
    <div class="col-md-6">
      <h3>Visi</h3>
      <p>Menjadi penyedia air isi ulang higienis dan gas LPG 3 kg terpercaya di Majalengka yang mampu memberikan layanan cepat, praktis, dan terjangkau untuk mendukung kesehatan serta kenyamanan masyarakat.</p>
    </div>
    <div class="col-md-6">
      <h3>Misi</h3>
      <ul class="text-start">
        <li>Menyediakan air isi ulang higienis dengan proses penyaringan modern.</li>
        <li>Menyediakan gas LPG 3 kg dengan stok terjamin dan distribusi aman.</li>
        <li>Memberikan pelayanan antar cepat dan ramah.</li>
        <li>Menawarkan harga terjangkau tanpa mengurangi kualitas.</li>
        <li>Menjadi mitra terpercaya masyarakat.</li>
        <li>Meningkatkan kualitas layanan secara berkelanjutan.</li>
      </ul>
    </div>
  </div>
</div>

<!-- Keunggulan -->
<div class="container my-5">
  <h2 class="text-center mb-4">Keunggulan Adam Store</h2>
  <div class="row text-center">
    <div class="col-md-3">
      <div class="card glass p-3 shadow">
        <h5>🚚 Antar Cepat</h5>
        <p>Kurang dari 30 menit.</p>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card glass p-3 shadow">
        <h5>💧 Air Higienis</h5>
        <p>Mesin sterilisasi modern.</p>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card glass p-3 shadow">
        <h5>🔥 Gas LPG 3 Kg</h5>
        <p>Stok aman & distribusi cepat.</p>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card glass p-3 shadow">
        <h5>😊 Pelayanan Ramah</h5>
        <p>Selalu Membantu Anda.</p>
      </div>
    </div>
  </div>
</div>

<!-- Produk Galon & Gas -->
<div class="container my-5" id="order">
  <div class="row justify-content-center mb-4">
    <div class="col-md-5 mb-3 mb-md-0">
      <div class="card glass h-100 shadow-sm text-center p-3">
        <img src="assets/images/galon.jpg" alt="Galon" class="img-fluid mx-auto" style="max-height:170px;object-fit:contain;">
        <h5 class="mt-3">Isi Ulang Air Galon</h5>
      </div>
    </div>
    <div class="col-md-5">
      <div class="card glass h-100 shadow-sm text-center p-3">
        <img src="assets/images/gas.jpg" alt="Gas LPG 3 Kg" class="img-fluid mx-auto" style="max-height:170px;object-fit:contain;">
        <h5 class="mt-3">Gas LPG 3 Kg</h5>
      </div>
    </div>
  </div>
  <h2 class="text-center mb-4">Form Pemesanan Galon / Gas LPG 3 Kg</h2>
  <div class="row justify-content-center">
    <div class="col-lg-7 col-md-9">
      <?php if(isset($_GET['status'])): ?>
        <?php if($_GET['status']==='sukses'): ?>
          <div class="alert alert-success text-center">Pesanan berhasil dikirim! Kami akan segera memproses pesanan Anda.</div>
        <?php elseif($_GET['status']==='gagal'): ?>
          <div class="alert alert-danger text-center">Gagal menyimpan pesanan. Silakan coba lagi.</div>
        <?php endif; ?>
      <?php endif; ?>
      <form action="order.php" method="POST" class="p-4 border rounded bg-white shadow-lg" style="box-shadow:0 4px 24px rgba(0,0,0,0.08)!important;">
        <div class="mb-3">
          <label for="nama" class="form-label">Nama Lengkap</label>
          <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama lengkap" required>
        </div>
        <div class="mb-3">
          <label for="whatsapp" class="form-label">Nomor WhatsApp</label>
          <input type="text" name="whatsapp" id="whatsapp" class="form-control" placeholder="08xxxxxxxxxx" required>
        </div>
        <div class="mb-3">
          <label for="alamat" class="form-label">Alamat</label>
          <textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat lengkap pengantaran" required></textarea>
        </div>
        <div class="mb-3">
          <label for="produk" class="form-label">Pilih Produk</label>
          <select name="produk" id="produk" class="form-control" required>
            <option value="air_galon">Air Isi Ulang Galon</option>
            <option value="gas">Gas LPG 3 Kg</option>
            <option value="air_galon+gas">Air Isi Ulang Galon + Gas LPG 3 Kg</option>
          </select>
          <div class="form-text mt-2">
            <b>Stok Tersedia:</b><br>
            Air Isi Ulang Galon: <span id="stok_galon" class="fw-bold <?php echo ($stok_galon<=5?'text-danger':'text-success'); ?>"><?php echo $stok_galon; ?></span><br>
            Gas LPG 3 Kg: <span id="stok_gas" class="fw-bold <?php echo ($stok_gas<=5?'text-danger':'text-success'); ?>"><?php echo $stok_gas; ?></span>
          </div>
        </div>
        <div class="mb-3">
          <label for="jumlah" class="form-label">Jumlah</label>
          <input type="number" name="jumlah" id="jumlah" class="form-control" min="1" placeholder="Jumlah pesanan" required>
        </div>
        <div class="mb-3">
          <label for="catatan" class="form-label">Catatan Tambahan <span class="text-muted" style="font-size:13px;">(opsional)</span></label>
          <textarea name="catatan" id="catatan" class="form-control" placeholder="Contoh: Tolong antar siang, galon sekalian dicuci, dsb"></textarea>
        </div>
        <button type="submit" class="btn btn-lg btn-primary w-100 fw-bold" style="font-size:1.2rem;">Pesan Sekarang</button>
      </form>
    </div>
  </div>
</div>

<!-- Ulasan Customer -->
<div class="container my-5" id="ulasan">
  <h2 class="text-center mb-4">Ulasan Customer</h2>
  <!-- Notifikasi -->
  <?php if(isset($_GET['ulasan'])): ?>
    <?php if($_GET['ulasan']==='sukses'): ?>
      <div class="alert alert-success text-center">Terima kasih atas ulasan Anda!</div>
    <?php elseif($_GET['ulasan']==='gagal'): ?>
      <div class="alert alert-danger text-center">Gagal mengirim ulasan. Silakan coba lagi.</div>
    <?php endif; ?>
  <?php endif; ?>
  <!-- Form Ulasan -->
  <div class="row justify-content-center mb-4">
    <div class="col-lg-7 col-md-9">
      <form action="ulasan_proses.php" method="POST" class="p-4 border rounded bg-white shadow-sm">
        <div class="mb-3">
          <label for="nama_ulasan" class="form-label">Nama</label>
          <input type="text" name="nama_ulasan" id="nama_ulasan" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="rating" class="form-label">Rating</label>
          <select name="rating" id="rating" class="form-control" required>
            <option value="5">⭐⭐⭐⭐⭐ (5)</option>
            <option value="4">⭐⭐⭐⭐ (4)</option>
            <option value="3">⭐⭐⭐ (3)</option>
            <option value="2">⭐⭐ (2)</option>
            <option value="1">⭐ (1)</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="isi_ulasan" class="form-label">Ulasan</label>
          <textarea name="isi_ulasan" id="isi_ulasan" class="form-control" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-success w-100 fw-bold">Kirim Ulasan</button>
      </form>
    </div>
  </div>
  <!-- Daftar Ulasan -->
  <div class="row">
    <?php
    $ulasan = $conn->query("SELECT * FROM ulasan ORDER BY tanggal DESC LIMIT 6");
    if($ulasan && $ulasan->num_rows > 0):
      while($u = $ulasan->fetch_assoc()): ?>
        <div class="col-md-4 mb-4">
          <div class="card glass h-100 shadow-sm">
            <div class="card-body">
              <div class="mb-2" style="font-size:1.2rem; color:#ffc107;">
                <?php for($i=1;$i<=5;$i++) echo $i<=$u['rating']?'★':'☆'; ?>
              </div>
              <p class="card-text">"<?= htmlspecialchars($u['isi']) ?>"</p>
            </div>
            <div class="card-footer bg-white border-0 text-end">
              <small class="text-muted">- <?= htmlspecialchars($u['nama']) ?>, <?= date('d/m/Y', strtotime($u['tanggal'])) ?></small>
            </div>
          </div>
        </div>
      <?php endwhile;
    else: ?>
      <div class="col-12 text-center text-muted">Belum ada ulasan customer.</div>
    <?php endif; ?>
  </div>
</div>

<!-- Jam Operasional -->
<div class="container my-5">
  <h2 class="text-center mb-4">Jam Operasional</h2>
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card glass shadow-sm p-3">
        <ul class="list-group list-group-flush text-center">
          <li class="list-group-item">Senin - Sabtu: <b>12.00 - 17.30</b></li>
          <li class="list-group-item">Minggu & Tanggal Merah: <b>10.00 - 16.00</b></li>
        </ul>
        <div class="mt-2 text-muted" style="font-size:14px;">*Order di luar jam operasional akan diproses di hari berikutnya.</div>
      </div>
    </div>
  </div>
</div>

<!-- Lokasi Google Maps -->
<div class="container my-5">
  <h2 class="text-center mb-4">Lokasi Kami</h2>
  <div class="ratio ratio-16x9">
  <iframe src="https://www.google.com/maps?q=-6.8540833,108.2624024&hl=id&z=19&output=embed" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>
</div>

<!-- Footer -->
<footer class="text-center p-3 bg-dark text-white">
  <p>🏪 Adam Store | 📍 Bumdes Kawunghilir No.10, Cigasong, Majalengka</p>
  <p>📲 081321593288 | 📧 adamstore@gmail.com</p>
  <p>FB/IG/TikTok: @adamstoremajalengka</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
