<?php
include "config.php";
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin.php");
    exit;
}

// Handle delete
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM produk WHERE id=$id");
    header("Location: dashboard.php");
    exit;
}

// Fetch products
$produk = $conn->query("SELECT * FROM produk ORDER BY id DESC");

// Statistik penjualan
$total_pesanan = 0;
$produk_terlaris = '-';
$stok_terendah = '-';

// Total pesanan
$res = $conn->query("SELECT COUNT(*) as total FROM pesanan");
if($res && $row = $res->fetch_assoc()) $total_pesanan = $row['total'];

// Produk terlaris
$res = $conn->query("SELECT produk, SUM(jumlah) as total FROM pesanan GROUP BY produk ORDER BY total DESC LIMIT 1");
if($res && $row = $res->fetch_assoc()) $produk_terlaris = $row['produk'] . ' (' . $row['total'] . ')';

// Stok terendah
$res = $conn->query("SELECT nama, stok FROM produk ORDER BY stok ASC LIMIT 1");
if($res && $row = $res->fetch_assoc()) $stok_terendah = $row['nama'] . ' (' . $row['stok'] . ')';

// Notifikasi stok menipis
$stok_menipis = [];
$res = $conn->query("SELECT nama, stok FROM produk WHERE stok <= 5 ORDER BY stok ASC");
if($res && $res->num_rows > 0) {
    while($row = $res->fetch_assoc()) {
        $stok_menipis[] = $row['nama'] . ' (sisa ' . $row['stok'] . ')';
    }
}

// Data penjualan 7 hari terakhir
$labels = [];
$data = [];
for($i=6;$i>=0;$i--){
    $tgl = date('Y-m-d', strtotime("-$i days"));
    $labels[] = date('d/m', strtotime($tgl));
    $res = $conn->query("SELECT SUM(jumlah) as total FROM pesanan WHERE DATE(tanggal)='$tgl'");
    $row = $res && $res->fetch_assoc() ? $res->fetch_assoc() : ['total'=>0];
    $data[] = (int)($row['total'] ?? 0);
}

// Data pie chart penjualan per produk 7 hari terakhir
$produkPie = [];
$dataPie = [];
$warnaPie = [];
$res = $conn->query("SELECT produk, SUM(jumlah) as total FROM pesanan WHERE tanggal >= DATE_SUB(NOW(), INTERVAL 7 DAY) GROUP BY produk");
$warnaDasar = ['#36A2EB','#FF6384','#FFCE56','#4BC0C0','#9966FF','#FF9F40'];
$i=0;
if($res && $res->num_rows>0){
    while($row = $res->fetch_assoc()){
        $produkPie[] = $row['produk'];
        $dataPie[] = (int)$row['total'];
        $warnaPie[] = $warnaDasar[$i%count($warnaDasar)];
        $i++;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
    <style>
        body { font-family: Arial; background: #f4f4f4; }
        .container { max-width: 800px; margin: 40px auto; background: #fff; padding: 32px 28px; border-radius: 14px; box-shadow: 0 2px 18px rgba(0,0,0,0.10); }
        h2 { text-align: center; margin-bottom: 24px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { padding: 10px 8px; border-bottom: 1px solid #eee; text-align: center; }
        th { background: #f0f0f0; }
        .actions a { margin: 0 4px; text-decoration: none; color: #2196F3; }
        .actions a.delete { color: #e53935; }
        .add-btn { display: inline-block; padding: 8px 18px; background: #4CAF50; color: #fff; border-radius: 6px; text-decoration: none; margin-bottom: 18px; }
        .add-btn:hover { background: #388e3c; }
        .logout-btn { float: right; background: #e53935; color: #fff; padding: 7px 14px; border-radius: 6px; text-decoration: none; }
        .logout-btn:hover { background: #b71c1c; }
        .statistik { display: flex; justify-content: space-between; margin-bottom: 24px; }
        .statistik div { flex: 1; margin: 0 10px; padding: 20px; border-radius: 8px; color: #fff; text-align: center; }
        .statistik .total-pesanan { background: #28a745; }
        .statistik .produk-terlaris { background: #007bff; }
        .statistik .stok-terendah { background: #dc3545; }
        .alert { padding: 10px 15px; border-radius: 6px; margin-bottom: 20px; }
        .alert-danger { background: #f8d7da; color: #721c24; border-color: #f5c6cb; }
    </style>
</head>
<body>
    <div class="container">
        <a href="logout.php" class="logout-btn">Logout</a>
        <h2>Dashboard Admin</h2>
        
        <!-- Statistik Penjualan -->
        <div class="statistik">
            <div class="total-pesanan">
                <div style="font-size:1.3rem;">Total Pesanan</div>
                <div style="font-size:2rem;font-weight:bold;"><?= $total_pesanan ?></div>
            </div>
            <div class="produk-terlaris">
                <div style="font-size:1.3rem;">Produk Terlaris</div>
                <div style="font-size:1.1rem;font-weight:bold;"><?= $produk_terlaris ?></div>
            </div>
            <div class="stok-terendah">
                <div style="font-size:1.3rem;">Stok Terendah</div>
                <div style="font-size:1.1rem;font-weight:bold;"><?= $stok_terendah ?></div>
            </div>
        </div>

        <?php if(count($stok_menipis) > 0): ?>
            <div class="alert alert-danger text-center fw-bold mb-4">Stok menipis: <?= implode(', ', $stok_menipis) ?></div>
        <?php endif; ?>

        <a href="produk_form.php" class="add-btn">+ Tambah Produk</a>
        <table>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Jenis</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
            <?php $no=1; if($produk) while($row = $produk->fetch_assoc()): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($row['nama']) ?></td>
                <td><?= htmlspecialchars($row['jenis']) ?></td>
                <td>Rp<?= number_format($row['harga'],0,',','.') ?></td>
                <td><?= $row['stok'] ?></td>
                <td class="actions">
                    <a href="produk_form.php?id=<?= $row['id'] ?>">Edit</a>
                    <a href="dashboard.php?delete=<?= $row['id'] ?>" class="delete" onclick="return confirm('Yakin hapus produk?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>

        <!-- Tabel Pesanan Customer -->
        <h3 id="pesanan" class="mt-5 mb-3">Daftar Pesanan Customer</h3>
        <table>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Tanggal</th>
            </tr>
            <?php
            // Ambil data pesanan
            $pesanan = $conn->query("SELECT * FROM pesanan ORDER BY tanggal DESC");
            $no=1;
            if($pesanan && $pesanan->num_rows>0):
                while($p = $pesanan->fetch_assoc()): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= htmlspecialchars($p['nama']) ?></td>
                    <td><?= htmlspecialchars($p['produk']) ?></td>
                    <td><?= $p['jumlah'] ?></td>
                    <td><?= date('d/m/Y H:i', strtotime($p['tanggal'])) ?></td>
                </tr>
            <?php endwhile; else: ?>
                <tr><td colspan="5" class="text-muted">Belum ada pesanan.</td></tr>
            <?php endif; ?>
        </table>

        <!-- Manajemen Admin -->
        <h3 class="mt-5 mb-3">Manajemen Admin</h3>
        <table>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Aksi</th>
            </tr>
            <?php
            $adminList = $conn->query("SELECT * FROM admin ORDER BY id ASC");
            $no=1;
            if($adminList && $adminList->num_rows>0):
                while($a = $adminList->fetch_assoc()): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= htmlspecialchars($a['username']) ?></td>
                    <td>
                        <?php if($a['username'] != $_SESSION['admin_username']): ?>
                        <a href="dashboard.php?deladmin=<?= $a['id'] ?>" class="delete" onclick="return confirm('Yakin hapus admin ini?')">Hapus</a>
                        <?php else: ?>
                        <span class="text-muted">(Login)</span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endwhile; else: ?>
                <tr><td colspan="3" class="text-muted">Belum ada admin lain.</td></tr>
            <?php endif; ?>
        </table>
        <form method="post" class="p-3 border rounded bg-light" style="max-width:400px;margin:auto;">
            <h4 class="mb-3">Tambah Admin Baru</h4>
            <input type="text" name="new_admin" class="form-control mb-2" placeholder="Username" required>
            <input type="password" name="new_pass" class="form-control mb-2" placeholder="Password" required>
            <button type="submit" name="add_admin" class="btn btn-primary w-100">Tambah Admin</button>
        </form>
        <?php
        // Proses tambah admin
        if(isset($_POST['add_admin'])){
            $user = mysqli_real_escape_string($conn, $_POST['new_admin']);
            $pass = md5($_POST['new_pass']);
            $cek = $conn->query("SELECT * FROM admin WHERE username='$user'");
            if($cek->num_rows==0){
                $conn->query("INSERT INTO admin (username, password) VALUES ('$user', '$pass')");
                // Log aktivitas
                $admin = $_SESSION['admin_username'];
                $conn->query("INSERT INTO log_aktivitas (admin, aksi, waktu) VALUES ('$admin', 'Tambah admin: $user', NOW())");
                echo '<script>alert("Admin berhasil ditambah!");window.location="dashboard.php";</script>';
            } else {
                echo '<script>alert("Username sudah terdaftar!");</script>';
            }
        }
        // Proses hapus admin
        if(isset($_GET['deladmin'])){
            $id = intval($_GET['deladmin']);
            $userdel = $conn->query("SELECT username FROM admin WHERE id=$id");
            $userdel = $userdel && $userdel->num_rows>0 ? $userdel->fetch_assoc()['username'] : '';
            $conn->query("DELETE FROM admin WHERE id=$id");
            // Log aktivitas
            $admin = $_SESSION['admin_username'];
            $conn->query("INSERT INTO log_aktivitas (admin, aksi, waktu) VALUES ('$admin', 'Hapus admin: $userdel', NOW())");
            echo '<script>alert("Admin berhasil dihapus!");window.location="dashboard.php";</script>';
        }
        ?>

        <!-- Log Aktivitas Admin -->
        <h3 class="mt-5 mb-3">Log Aktivitas Admin</h3>
        <table>
            <tr>
                <th>No</th>
                <th>Admin</th>
                <th>Aksi</th>
                <th>Waktu</th>
            </tr>
            <?php
            $log = $conn->query("SELECT * FROM log_aktivitas ORDER BY waktu DESC LIMIT 10");
            $no=1;
            if($log && $log->num_rows>0):
                while($l = $log->fetch_assoc()): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= htmlspecialchars($l['admin']) ?></td>
                    <td><?= htmlspecialchars($l['aksi']) ?></td>
                    <td><?= date('d/m/Y H:i', strtotime($l['waktu'])) ?></td>
                </tr>
            <?php endwhile; else: ?>
                <tr><td colspan="4" class="text-muted">Belum ada aktivitas.</td></tr>
            <?php endif; ?>
        </table>

        <!-- Grafik Penjualan 7 Hari Terakhir -->
        <div class="mb-4">
          <h3 class="mb-3">Grafik Penjualan 7 Hari Terakhir</h3>
          <canvas id="chartPenjualan" height="90"></canvas>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
        const ctx = document.getElementById('chartPenjualan').getContext('2d');
        const chartPenjualan = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?= json_encode($labels) ?>,
                datasets: [{
                    label: 'Jumlah Penjualan',
                    data: <?= json_encode($data) ?>,
                    backgroundColor: 'rgba(54, 162, 235, 0.7)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: { beginAtZero: true, precision:0 }
                }
            }
        });
        </script>

        <!-- Grafik Persentase Penjualan per Produk (Pie Chart) -->
        <div class="mb-4">
          <h3 class="mb-3">Persentase Penjualan per Produk (7 Hari)</h3>
          <div style="max-width:400px;margin:auto;">
            <canvas id="piePenjualan" height="90"></canvas>
          </div>
        </div>
        <script>
        const ctxPie = document.getElementById('piePenjualan').getContext('2d');
        const piePenjualan = new Chart(ctxPie, {
            type: 'pie',
            data: {
                labels: <?= json_encode($produkPie) ?>,
                datasets: [{
                    data: <?= json_encode($dataPie) ?>,
                    backgroundColor: <?= json_encode($warnaPie) ?>,
                    borderColor: '#fff',
                    borderWidth: 2
                }]
            },
            options: {
                plugins: {
                    legend: { position: 'bottom', labels: { font: { size: 15 } } },
                    tooltip: { callbacks: { label: function(context) {
                        let label = context.label || '';
                        let value = context.parsed || 0;
                        let total = context.chart._metasets[0].total || 1;
                        let percent = ((value/total)*100).toFixed(1);
                        return label+': '+value+' ('+percent+'%)';
                    }}}
                }
            }
        });
        </script>
    </div>
</body>
</html>
