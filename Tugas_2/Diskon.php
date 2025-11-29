<?php
// 1. Pembuatan Fungsi (Prosedur)
function hitungDiskon($totalBelanja) {
    // 2. Logika Diskon
    // Kondisi 1: Total belanja >= 100.000 (Diskon 10%)
    if ($totalBelanja >= 100000) {
        $nominalDiskon = $totalBelanja * 0.10;
    } 
    // Kondisi 2: Total belanja >= 50.000 DAN < 100.000 (Diskon 5%)
    elseif ($totalBelanja >= 50000 && $totalBelanja < 100000) {
        $nominalDiskon = $totalBelanja * 0.05;
    } 
    // Kondisi 3: Total belanja < 50.000 (Tidak ada diskon)
    else {
        $nominalDiskon = 0;
    }

    // 3. Nilai Kembalian (Return Value)
    // Mengembalikan nilai dalam bentuk nominal rupiah
    return $nominalDiskon;
}

// 4. Eksekusi dan Output
// Deklarasi variabel totalBelanja dengan contoh nilai Rp. 120.000
$totalBelanja = 187000;

// Memanggil fungsi hitungDiskon
$diskon = hitungDiskon($totalBelanja);

// Menghitung total yang harus dibayar
$totalBayar = $totalBelanja - $diskon;

// Menampilkan hasil
echo "=== Rincian Pembayaran ===" . "<br>";
echo "Total Belanja : Rp. " . number_format($totalBelanja, 0, ',', '.') . "<br>";
echo "Diskon        : Rp. " . number_format($diskon, 0, ',', '.') . "<br>";
echo "--------------------------" . "<br>";
echo "Total Bayar   : Rp. " . number_format($totalBayar, 0, ',', '.') . "<br>";
?>