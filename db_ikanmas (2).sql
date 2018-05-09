-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2018 at 11:05 PM
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
('B0012', '10003', 'Gelang', 'Gram', NULL, NULL, 'Bagus', '2018-05-09 14:54:52', NULL),
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
  `kd_detail_transaksi` int(12) NOT NULL,
  `no_transaksi` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(1805090001, 'TRJ1805090001', 'KD-0003', '2.00', 1, '200000.00', '400000.00', 1, 1, '2018-05-09 12:09:58', '2018-05-09 19:10:01'),
(1805090002, 'TRJ1805090002', 'KD-005', '2.00', 1, '250000.00', '500000.00', 1, 1, '2018-05-09 12:12:26', '2018-05-09 19:12:28'),
(1805090003, 'TRJ1805090003', 'KD-005', '2.00', 1, '250000.00', '500000.00', 1, 1, '2018-05-09 12:13:27', '2018-05-09 19:13:32'),
(1805090005, 'TRJ1805090004', 'KD-002', '2.00', 1, '175000.00', '350000.00', 1, 1, '2018-05-09 12:22:30', '2018-05-09 19:22:39'),
(1805090006, 'TRJ1805090005', 'KD-002', '1.00', 1, '175000.00', '175000.00', 1, 1, '2018-05-09 12:23:46', '2018-05-09 19:24:00'),
(1805090007, 'TRJ1805090006', 'KD-0003', '2.00', 1, '200000.00', '400000.00', 1, 1, '2018-05-09 13:25:24', '2018-05-09 20:25:33'),
(1805090008, 'TRJ1805090007', 'KD-005', '2.00', 1, '250000.00', '500000.00', 1, 1, '2018-05-09 13:26:40', '2018-05-09 20:27:15'),
(1805090011, 'TRB1805090002', 'KD-005', '10.00', 1, '130000.00', '1300000.00', 1, 1, '2018-05-09 16:00:12', '2018-05-09 23:01:21'),
(1805090012, 'TRB1805090002', 'KD-002', '10.00', 12, '50000.00', '6000000.00', 1, 1, '2018-05-09 16:01:18', '2018-05-09 23:01:21');

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
('10003', '80.0', '175000', 'murni', '2018-04-27 09:57:08', '2018-05-09 19:22:18'),
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
  `no_transaksi` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kd_tipe_transaksi` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `grand_total` decimal(10,0) NOT NULL,
  `keterangan_lain` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT 'Transaksi Umum',
  `customer` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kd_supplier` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_user` tinyint(1) NOT NULL,
  `created-at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`no_transaksi`, `kd_tipe_transaksi`, `tanggal_transaksi`, `grand_total`, `keterangan_lain`, `customer`, `kd_supplier`, `id_user`, `created-at`) VALUES
('TRB1805090002', 'BL0001', '2018-05-09', '7300000', 'Transaksi Umum', NULL, 'SP-0002', 1, '2018-05-09 16:01:21'),
('TRJ1805090001', 'JL0001', '2018-05-09', '400000', NULL, 'anda', NULL, 1, '2018-05-09 12:10:01'),
('TRJ1805090002', 'JL0001', '2018-05-09', '500000', NULL, 'adasd', NULL, 1, '2018-05-09 12:12:28'),
('TRJ1805090003', 'JL0001', '2018-05-09', '500000', NULL, 'qeq', NULL, 1, '2018-05-09 12:13:32'),
('TRJ1805090004', 'JL0001', '2018-05-09', '350000', NULL, 'khkjhj', NULL, 1, '2018-05-09 12:22:39'),
('TRJ1805090005', 'JL0001', '2018-05-09', '175000', NULL, 'qweqeqe', NULL, 1, '2018-05-09 12:24:00'),
('TRJ1805090006', 'JL0001', '2018-05-09', '400000', '\'Penjualan Umum\'', 'warkono', NULL, 1, '2018-05-09 13:25:33'),
('TRJ1805090007', 'JL0001', '2018-05-09', '500000', 'jual ke suplier emas pinggir jalan', 'meong', NULL, 1, '2018-05-09 13:27:15');

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
  ADD CONSTRAINT `kd_barang` FOREIGN KEY (`kd_barang`) REFERENCES `barang` (`kd_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `tipe_transaksi` FOREIGN KEY (`kd_tipe_transaksi`) REFERENCES `tipe_transaksi` (`kd_tipe_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
