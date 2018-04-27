-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2018 at 08:17 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ikanmas`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kd_barang` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kd_kualitas` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_barang` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satuan_barang` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_beli` decimal(12,2) NOT NULL,
  `harga_jual` decimal(12,2) NOT NULL,
  `total_barang` decimal(5,2) NOT NULL,
  `keterangan_barang` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kd_barang`, `kd_kualitas`, `nama_barang`, `satuan_barang`, `harga_beli`, `harga_jual`, `total_barang`, `keterangan_barang`, `created_at`, `updated_at`) VALUES
('KD-0001', '10002', 'Liontin', 'Gram', '0.00', '200000.00', '0.00', 'mas 30 mputan perak', '2018-04-27 12:31:34', '2018-04-27 20:09:35'),
('KD-0003', '10004', 'asdad', 'Gram', '0.00', '1232131231.00', '0.00', 'asdasdad', '2018-04-27 13:17:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `kd_detail_transaksi` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_transaksi` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kd_barang` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `berat_transaksi` decimal(12,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `gid` tinyint(1) UNSIGNED NOT NULL,
  `usergroup` varchar(15) NOT NULL,
  `level_akses` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`gid`, `usergroup`, `level_akses`) VALUES
(1, 'Admin', 'Administrator'),
(2, 'Gudang', 'Gudang'),
(3, 'Kasir', 'Staff Kasir');

-- --------------------------------------------------------

--
-- Table structure for table `kualitas`
--

CREATE TABLE `kualitas` (
  `kd_kualitas` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `persentase_kualitas` decimal(3,1) NOT NULL,
  `keterangan_kualitas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kualitas`
--

INSERT INTO `kualitas` (`kd_kualitas`, `persentase_kualitas`, `keterangan_kualitas`, `created_at`, `updated_at`) VALUES
('10002', '70.0', 'murni', '2018-04-27 09:56:55', NULL),
('10003', '80.0', 'murni', '2018-04-27 09:57:08', '2018-04-27 16:57:32'),
('10004', '50.0', 'campuran', '2018-04-27 09:57:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `kd_supplier` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_supplier` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_supplier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp_supplier` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_supplier` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tipe_transaksi`
--

CREATE TABLE `tipe_transaksi` (
  `kd_tipe_transaksi` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_transaksi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `no_transaksi` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kd_tipe_transaksi` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `id_user` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` mediumint(1) UNSIGNED NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` text NOT NULL,
  `nama_pengguna` varchar(50) NOT NULL,
  `status` enum('Aktif','Non Aktif') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_login` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `gid` tinyint(1) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `nama_pengguna`, `status`, `created_at`, `last_login`, `gid`) VALUES
(1, 'admin', '$2a$08$QQpKu4PnB22GEPgLH5fnNOTKdVQMBIybxZcepBIY.ggSC0Tt14hKa', 'Bang Admin', 'Aktif', '2018-03-13 23:57:05', NULL, 1),
(2, 'gudang', '$2a$08$QQpKu4PnB22GEPgLH5fnNOTKdVQMBIybxZcepBIY.ggSC0Tt14hKa', 'Centini', 'Aktif', '2018-03-13 23:57:05', '2018-04-20 20:34:17', 2),
(3, 'kasir2', '08dfc5f04f9704943a423ea5732b98d3567cbd49', 'Kasir Dua', 'Aktif', '2018-03-13 23:57:05', NULL, 2),
(4, 'jaka', '2ec22095503fe843326e7c19dd2ab98716b63e4d', 'Jaka Sembung', 'Aktif', '2018-03-13 23:57:05', NULL, 3),
(5, 'jaka', '2ec22095503fe843326e7c19dd2ab98716b63e4d', 'Jaka Sembung', 'Aktif', '2018-03-13 23:57:05', NULL, 3),
(6, 'joko', '97c358728f7f947c9a279ba9be88308395c7cc3a', 'Joko Haji', 'Aktif', '2018-03-13 23:57:05', NULL, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kd_barang`),
  ADD KEY `kd_kualitas` (`kd_kualitas`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`kd_detail_transaksi`),
  ADD KEY `kd_barang` (`kd_barang`),
  ADD KEY `no_transaksi` (`no_transaksi`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`gid`);

--
-- Indexes for table `kualitas`
--
ALTER TABLE `kualitas`
  ADD PRIMARY KEY (`kd_kualitas`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`kd_supplier`);

--
-- Indexes for table `tipe_transaksi`
--
ALTER TABLE `tipe_transaksi`
  ADD PRIMARY KEY (`kd_tipe_transaksi`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`no_transaksi`),
  ADD KEY `tipe_transaksi` (`kd_tipe_transaksi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `gid` tinyint(1) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` mediumint(1) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `kd_kualitas` FOREIGN KEY (`kd_kualitas`) REFERENCES `kualitas` (`kd_kualitas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `kd_barang` FOREIGN KEY (`kd_barang`) REFERENCES `barang` (`kd_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `no_transaksi` FOREIGN KEY (`no_transaksi`) REFERENCES `transaksi` (`no_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `tipe_transaksi` FOREIGN KEY (`kd_tipe_transaksi`) REFERENCES `tipe_transaksi` (`kd_tipe_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
