-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2018 at 05:51 AM
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
  `harga_beli` decimal(12,2) DEFAULT NULL,
  `total_barang` decimal(5,2) DEFAULT NULL,
  `keterangan_barang` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kd_barang`, `kd_kualitas`, `nama_barang`, `satuan_barang`, `harga_beli`, `total_barang`, `keterangan_barang`, `created_at`, `updated_at`) VALUES
('KD-0003', 'KW-001', 'Kalung', 'Gram', '0.00', '0.00', 'asdasdad', '2018-04-27 13:17:45', '2018-04-28 07:43:04'),
('KD-002', '10003', 'Cincin Kawin', 'Gram', NULL, NULL, 'Baik', '2018-05-06 11:28:19', NULL),
('KD-005', '10004', 'Anting-Anting2', 'Gram', NULL, NULL, 'Ok', '2018-05-06 11:29:31', '2018-05-06 18:30:03');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `kd_customer` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_customer` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_customer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp_customer` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_customer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`kd_customer`, `nama_customer`, `alamat_customer`, `telp_customer`, `keterangan_customer`, `created_at`, `updated_at`) VALUES
('SP-0002', 'Tarmudi', 'Semarang tengah', '0898787878', 'Supplier mas batangan', NULL, '2018-04-28 05:24:36'),
('SP-0003', 'Joni', 'Tegal', '087878787', 'Supplier anting', NULL, NULL),
('SP-006', 'Sugandi', 'Pekalongan', '08877876767', 'Supplier cicin kawin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `kd_detail_transaksi` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_transaksi` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kd_barang` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `berat_transaksi` decimal(12,2) NOT NULL,
  `qty_transaksi` int(5) NOT NULL,
  `harga_satuan` decimal(10,2) NOT NULL,
  `harga_total` decimal(10,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `id_user` mediumint(8) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`kd_detail_transaksi`, `no_transaksi`, `kd_barang`, `berat_transaksi`, `qty_transaksi`, `harga_satuan`, `harga_total`, `status`, `id_user`, `created_at`, `updated_at`) VALUES
('DT060518001', NULL, 'KD-0003', '1.30', 1, '200000.00', '260000.00', 0, 0, '2018-05-06 14:51:34', NULL),
('DT060518002', NULL, 'KD-0003', '1.50', 1, '200000.00', '300000.00', 0, 0, '2018-05-06 14:58:54', NULL),
('DT060518003', NULL, 'KD-0003', '1.50', 1, '200000.00', '300000.00', 0, 0, '2018-05-06 15:01:41', NULL),
('DT060518004', NULL, 'KD-0003', '1.50', 1, '200000.00', '300000.00', 0, 0, '2018-05-06 15:01:49', NULL),
('DT060518005', NULL, 'KD-0003', '1.50', 1, '200000.00', '300000.00', 0, 0, '2018-05-06 15:09:25', NULL),
('DT060518006', NULL, 'KD-0003', '1.50', 1, '200000.00', '300000.00', 0, 0, '2018-05-06 15:11:19', NULL),
('DT060518007', NULL, 'KD-0003', '1.50', 1, '200000.00', '300000.00', 0, 0, '2018-05-06 15:12:25', NULL),
('DT060518008', NULL, 'KD-0003', '1.50', 1, '200000.00', '300000.00', 0, 0, '2018-05-06 15:15:21', NULL),
('DT060518009', NULL, 'KD-0003', '1.30', 1, '200000.00', '260000.00', 0, 0, '2018-05-06 15:18:12', NULL),
('DT060518010', NULL, 'KD-0003', '1.40', 1, '200000.00', '280000.00', 0, 0, '2018-05-06 15:19:00', NULL),
('DT060518011', NULL, 'KD-0003', '1.40', 1, '200000.00', '280000.00', 0, 0, '2018-05-06 15:19:14', NULL),
('DT060518012', NULL, 'KD-0003', '1.40', 1, '200000.00', '280000.00', 0, 0, '2018-05-06 15:20:19', NULL),
('DT060518013', NULL, 'KD-0003', '1.40', 1, '200000.00', '280000.00', 0, 0, '2018-05-06 15:21:31', NULL),
('DT060518014', NULL, 'KD-0003', '1.60', 2, '200000.00', '640000.00', 0, 0, '2018-05-06 15:25:29', NULL);

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
  `harga_jual` decimal(12,0) NOT NULL,
  `keterangan_kualitas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kualitas`
--

INSERT INTO `kualitas` (`kd_kualitas`, `persentase_kualitas`, `harga_jual`, `keterangan_kualitas`, `created_at`, `updated_at`) VALUES
('10003', '80.0', '0', 'murni', '2018-04-27 09:57:08', '2018-04-27 16:57:32'),
('10004', '50.0', '250000', 'campuran', '2018-04-27 09:57:24', '2018-04-28 07:42:30'),
('1005', '80.0', '300000', 'campuran 20 persen perak', '2018-04-27 22:46:09', '2018-04-28 07:38:58'),
('KW-001', '37.6', '200000', 'baik', '2018-04-28 00:29:12', '2018-04-28 07:38:49');

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

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`kd_supplier`, `nama_supplier`, `alamat_supplier`, `telp_supplier`, `keterangan_supplier`, `created_at`, `updated_at`) VALUES
('SP-0002', 'Tarmudi', 'Semarang tengah', '0898787878', 'Supplier mas batangan', NULL, '2018-04-28 05:24:36'),
('SP-0003', 'Joni', 'Tegal', '087878787', 'Supplier anting', NULL, NULL),
('SP-006', 'Sugandi', 'Pekalongan', '08877876767', 'Supplier cicin kawin', NULL, NULL);

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

--
-- Dumping data for table `tipe_transaksi`
--

INSERT INTO `tipe_transaksi` (`kd_tipe_transaksi`, `nama_transaksi`, `created_at`, `updated_at`) VALUES
('BL0001', 'Pembelian', '2018-05-03 22:10:31', NULL),
('JL0001', 'Penjualan', '2018-05-03 22:10:48', NULL),
('TB0001', 'Tambah Stok Penjualan', '2018-05-03 22:11:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `no_transaksi` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kd_tipe_transaksi` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `grand_total` decimal(10,0) NOT NULL,
  `keterangan_lain` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kd_customer` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(6, 'joko', '97c358728f7f947c9a279ba9be88308395c7cc3a', 'Joko Haji', 'Aktif', '2018-03-13 23:57:05', '2018-05-07 05:50:23', 4);

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
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`kd_customer`);

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
  MODIFY `id_user` mediumint(1) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=601;

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
