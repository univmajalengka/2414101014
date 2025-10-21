CREATE TABLE pesanan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    whatsapp VARCHAR(30) NOT NULL,
    alamat TEXT NOT NULL,
    produk VARCHAR(30) NOT NULL,
    jumlah INT NOT NULL,
    tanggal DATETIME NOT NULL
);
