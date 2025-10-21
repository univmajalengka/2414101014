CREATE TABLE ulasan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    rating INT NOT NULL,
    isi TEXT NOT NULL,
    tanggal DATETIME NOT NULL
);
