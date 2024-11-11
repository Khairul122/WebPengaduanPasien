-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 11, 2024 at 09:09 AM
-- Server version: 8.0.30
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengaduan_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_masyarakat`
--

CREATE TABLE `tbl_masyarakat` (
  `id_masyarakat` int NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama` varchar(90) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengaduan`
--

CREATE TABLE `tbl_pengaduan` (
  `id_pengaduan` int NOT NULL,
  `subjek_pengaduan` varchar(150) NOT NULL,
  `tgl_pengaduan` date NOT NULL,
  `isi_pengaduan` text NOT NULL,
  `bukti_pengaduan` varchar(100) DEFAULT NULL,
  `balasan_pengaduan` enum('Belum','Proses','Selesai') NOT NULL,
  `id_masyarakat` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_petugas`
--

CREATE TABLE `tbl_petugas` (
  `id_petugas` int NOT NULL,
  `nama` varchar(90) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telepon` varchar(16) NOT NULL,
  `password` varchar(150) NOT NULL,
  `level` enum('Admin','Petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_petugas`
--

INSERT INTO `tbl_petugas` (`id_petugas`, `nama`, `email`, `telepon`, `password`, `level`) VALUES
(1, 'Admin', 'admin@gmail.com', '089651900165', '21232f297a57a5a743894a0e4a801fc3', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tanggapan`
--

CREATE TABLE `tbl_tanggapan` (
  `id_tanggapan` int NOT NULL,
  `tgl_balas_tanggapan` date NOT NULL,
  `status_tanggapan` enum('Proses','Selesai') NOT NULL,
  `isi_tanggapan` text NOT NULL,
  `id_petugas` int NOT NULL,
  `id_pengaduan` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Triggers `tbl_tanggapan`
--
DELIMITER $$
CREATE TRIGGER `update_balasan` AFTER INSERT ON `tbl_tanggapan` FOR EACH ROW UPDATE tbl_pengaduan SET
balasan_pengaduan = NEW.status_tanggapan
WHERE id_pengaduan = NEW.id_pengaduan
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_masyarakat`
--
ALTER TABLE `tbl_masyarakat`
  ADD PRIMARY KEY (`id_masyarakat`);

--
-- Indexes for table `tbl_pengaduan`
--
ALTER TABLE `tbl_pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indexes for table `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `tbl_tanggapan`
--
ALTER TABLE `tbl_tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_masyarakat`
--
ALTER TABLE `tbl_masyarakat`
  MODIFY `id_masyarakat` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_pengaduan`
--
ALTER TABLE `tbl_pengaduan`
  MODIFY `id_pengaduan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  MODIFY `id_petugas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_tanggapan`
--
ALTER TABLE `tbl_tanggapan`
  MODIFY `id_tanggapan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
