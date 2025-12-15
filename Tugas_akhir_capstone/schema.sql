-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2025 at 01:59 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wisata_umkm`
--

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `hp` varchar(20) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `hari` int(11) NOT NULL,
  `peserta` int(11) NOT NULL,
  `paket` varchar(255) NOT NULL,
  `penginapan` int(11) DEFAULT 0,
  `transportasi` int(11) DEFAULT 0,
  `makan` int(11) DEFAULT 0,
  `harga_paket` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `nama`, `hp`, `email`, `tanggal`, `hari`, `peserta`, `paket`, `penginapan`, `transportasi`, `makan`, `harga_paket`, `total`) VALUES
(2, 'adam', '08911299400', 'owiowo@gmail.com', '2025-12-14', 2, 2, 'Paket Eduwisata Bantaragung', 1000000, 1200000, 500000, 2700000, 10800000),
(3, 'bobi', '08123733829292', 'bobi@gmail.com', '2005-08-07', 3, 1, 'Paket Live in desa Bantaragung', 0, 0, 500000, 500000, 1500000),
(4, 'usep', '087263738883', 'usep@gmail.com', '2017-07-15', 2, 1, 'Paket Camping Curug Cipeuteuy', 0, 0, 500000, 500000, 1000000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
