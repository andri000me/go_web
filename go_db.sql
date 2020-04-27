-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2020 at 08:16 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `go_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang_tbl`
--

CREATE TABLE `barang_tbl` (
  `barang_id` int(255) NOT NULL,
  `barang_nama` varchar(255) NOT NULL,
  `barang_jumlah` int(255) NOT NULL,
  `barang_diterima` varchar(255) DEFAULT NULL,
  `barang_harga` varchar(255) DEFAULT NULL,
  `kode_cabang` int(255) NOT NULL,
  `barang_lampiran` varchar(255) NOT NULL,
  `barang_tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cabang_tbl`
--

CREATE TABLE `cabang_tbl` (
  `kode_cabang` int(255) NOT NULL,
  `cabang_nama` varchar(255) NOT NULL,
  `cabang_alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tagihan_tbl`
--

CREATE TABLE `tagihan_tbl` (
  `tagihan_id` int(255) NOT NULL,
  `tagihan_nama` varchar(255) NOT NULL,
  `tagihan_tanggal` date NOT NULL,
  `kode_cabang` int(255) NOT NULL,
  `tagihan_pra` varchar(255) DEFAULT NULL,
  `tagihan_pasca` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('1','2','3') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`) VALUES
(9, 'pusat', '42836637e4afa63e6ba120974d7671dc', '1'),
(10, 'cabang', 'f74e4339be40ffd3b2a263873e653be4', '2'),
(11, 'gudang', '202446dd1d6028084426867365b0c7a1', '3'),
(14, 'ara', '636bfa0fb2716ff876f5e33854cc9648', '3'),
(15, 'aria', 'aafa7ed7cc46d6b04fc6e2b20baab657', '2'),
(16, 'nares', '9d662521b7b6d3b187550b5027428b0e', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang_tbl`
--
ALTER TABLE `barang_tbl`
  ADD PRIMARY KEY (`barang_id`);

--
-- Indexes for table `cabang_tbl`
--
ALTER TABLE `cabang_tbl`
  ADD PRIMARY KEY (`kode_cabang`);

--
-- Indexes for table `tagihan_tbl`
--
ALTER TABLE `tagihan_tbl`
  ADD PRIMARY KEY (`tagihan_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang_tbl`
--
ALTER TABLE `barang_tbl`
  MODIFY `barang_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cabang_tbl`
--
ALTER TABLE `cabang_tbl`
  MODIFY `kode_cabang` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tagihan_tbl`
--
ALTER TABLE `tagihan_tbl`
  MODIFY `tagihan_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
