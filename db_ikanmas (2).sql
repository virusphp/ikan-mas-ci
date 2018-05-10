-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2018 at 06:47 PM
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
  `keterangan_barang` text COLLATE utf8mb4_unicode_ci,
  `berat_gudang` decimal(12,2) NOT NULL,
  `qty_gudang` int(12) NOT NULL,
  `berat_kasir` decimal(12,2) NOT NULL,
  `qty_kasir` int(12) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kd_barang`, `kd_kualitas`, `nama_barang`, `satuan_barang`, `keterangan_barang`, `berat_gudang`, `qty_gudang`, `berat_kasir`, `qty_kasir`, `created_at`, `updated_at`) VALUES
('22CK', 'KW02', 'Cicin Krincing', 'Gram', 'baik', '40.00', 30, '0.00', 0, '2018-05-10 09:23:14', '2018-05-10 18:37:27'),
('22CN', 'KW01', 'Cincin', 'Gram', 'baik', '0.00', 0, '0.00', 0, '2018-05-10 09:20:53', NULL),
('22GB', 'KW02', 'Gelang Bayi', 'Gram', 'Baik', '0.00', 0, '0.00', 0, '2018-05-06 11:28:19', '2018-05-10 16:16:16'),
('22GK', 'KW04', 'Gelang Krincing', 'Gram', 'asdasdad', '0.00', 0, '0.00', 0, '2018-04-27 13:17:45', '2018-05-10 16:15:52'),
('22GL', 'KW02', 'Gelang', 'Gram', 'Bagus', '10.00', 5, '0.00', 0, '2018-05-09 14:54:52', '2018-05-10 18:39:04'),
('22KL', 'KW03', 'Kalung', 'Gram', 'Ok', '0.00', 0, '0.00', 0, '2018-05-06 11:29:31', '2018-05-10 16:20:08'),
('22LT', 'KW01', 'Liontin', 'Gram', 'baik', '0.00', 0, '0.00', 0, '2018-05-10 09:23:43', NULL),
('22MR', 'KW01', 'Markis', 'Gram', 'baik', '0.00', 0, '0.00', 0, '2018-05-10 09:24:10', NULL);

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
(1805090011, 'TBG1805090002', '22KL', '10.00', 1, '130000.00', '1300000.00', 1, 1, '2018-05-09 16:00:12', '2018-05-09 23:01:21'),
(1805090012, 'TBG1805090002', '22GB', '10.00', 12, '50000.00', '6000000.00', 1, 1, '2018-05-09 16:01:18', '2018-05-09 23:01:21'),
(1805100001, 'TBG1805100001', '22GL', '10.00', 1, '130000.00', '1300000.00', 1, 1, '2018-05-10 08:11:46', '2018-05-10 15:11:58'),
(1805100002, 'TBG1805100002', '22KL', '10.00', 5, '130000.00', '6500000.00', 1, 1, '2018-05-10 08:32:41', '2018-05-10 15:33:06'),
(1805100003, 'TBG1805100002', '22GB', '50.00', 46, '150000.00', '99999999.99', 1, 1, '2018-05-10 08:33:02', '2018-05-10 15:33:06'),
(1805100004, 'TJK1805100001', '22GB', '0.79', 1, '175000.00', '138250.00', 1, 1, '2018-05-10 08:51:27', '2018-05-10 15:54:02'),
(1805100005, 'TJK1805100001', '22GB', '1.05', 1, '175000.00', '183750.00', 1, 1, '2018-05-10 08:52:30', '2018-05-10 15:54:02'),
(1805100006, 'TJK1805100002', '22GL', '1.00', 1, '175000.00', '175000.00', 1, 1, '2018-05-10 09:09:21', '2018-05-10 16:10:00'),
(1805100007, 'TJK1805100002', '22GK', '2.00', 1, '200000.00', '400000.00', 1, 1, '2018-05-10 09:09:37', '2018-05-10 16:10:00'),
(1805100008, 'TBG1805100003', '22CK', '20.00', 15, '200000.00', '60000000.00', 1, 2, '2018-05-10 11:13:15', '2018-05-10 18:37:27'),
(1805100009, 'TBG1805100004', '22GL', '10.00', 5, '100000.00', '5000000.00', 1, 1, '2018-05-10 11:39:02', '2018-05-10 18:39:04');

--
-- Triggers `detail_transaksi`
--
DELIMITER $$
CREATE TRIGGER `before_update_nota` BEFORE UPDATE ON `detail_transaksi` FOR EACH ROW BEGIN
    UPDATE barang
    set berat_gudang =berat_gudang+OLD.berat_transaksi,
    qty_gudang=qty_gudang+OLD.qty_transaksi
    WHERE kd_barang=OLD.kd_barang;
END
$$
DELIMITER ;

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
  `persentase_kualitas` decimal(4,1) NOT NULL,
  `harga_jual` decimal(12,0) NOT NULL,
  `keterangan_kualitas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kualitas`
--

INSERT INTO `kualitas` (`kd_kualitas`, `persentase_kualitas`, `harga_jual`, `keterangan_kualitas`, `created_at`, `updated_at`) VALUES
('KW01', '100.0', '300000', '24 karat', '2018-04-27 22:46:09', '2018-05-10 16:14:01'),
('KW02', '80.0', '275000', '12 karat', '2018-04-27 09:57:08', '2018-05-10 16:14:24'),
('KW03', '50.0', '250000', 'campuran', '2018-04-27 09:57:24', '2018-05-10 16:12:15'),
('KW04', '40.5', '200000', 'baik', '2018-04-28 00:29:12', '2018-05-10 16:14:53');

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
('BG-0001', 'Pembelian Gudang', '2018-05-03 22:10:31', '2018-05-10 15:46:03'),
('BK-0001', 'Pembelian Kasir', '2018-05-10 08:47:24', NULL),
('JK-0001', 'Penjualan Kasir', '2018-05-03 22:10:48', '2018-05-10 15:46:07'),
('SK-0001', 'Tambah Stok Kasir', '2018-05-03 22:11:38', '2018-05-10 15:46:11');

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
('TBG1805090002', 'BG-0001', '2018-05-09', '7300000', 'Transaksi Umum', NULL, 'SP-0002', 1, '2018-05-09 16:01:21'),
('TBG1805100001', 'BG-0001', '2018-05-10', '1300000', 'Transaksi Umum', NULL, 'SP-0003', 1, '2018-05-10 08:11:58'),
('TBG1805100002', 'BG-0001', '2018-05-10', '106500000', 'Transaksi Umum', NULL, 'SP-006', 1, '2018-05-10 08:33:06'),
('TBG1805100003', 'BG-0001', '2018-05-10', '60000000', 'Transaksi Umum', NULL, 'SP-0002', 1, '2018-05-10 11:13:18'),
('TBG1805100004', 'BG-0001', '2018-05-10', '5000000', 'Transaksi Umum', NULL, 'SP-0003', 1, '2018-05-10 11:39:04'),
('TJK1805100001', 'JK-0001', '2018-05-10', '322000', 'Transaksi Umum', 'ander', NULL, 1, '2018-05-10 08:54:02'),
('TJK1805100002', 'JK-0001', '2018-05-10', '575000', 'Transaksi Umum', 'inva', NULL, 1, '2018-05-10 09:10:00');

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
