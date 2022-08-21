-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2021 at 01:12 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `joki_jatnika_rev4`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(5) NOT NULL,
  `kode_barang` varchar(25) NOT NULL,
  `nup` int(5) NOT NULL,
  `nama_barang` varchar(250) NOT NULL,
  `merk` varchar(100) DEFAULT NULL,
  `tgl_rekap` date NOT NULL,
  `tgl_perolehan` date NOT NULL,
  `pemegang` varchar(50) DEFAULT NULL,
  `asal_perolehan` varchar(100) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `kode_barang`, `nup`, `nama_barang`, `merk`, `tgl_rekap`, `tgl_perolehan`, `pemegang`, `asal_perolehan`, `active`, `modified`, `created`) VALUES
(170, '371000P.C AS2007', 371, 'P.C Unit', 'ASUS k5130', '2007-12-30', '2007-04-15', 'Iyan', 'CV.NOVETA SAMUEL', 1, '2021-07-30 21:50:41', '2021-07-30 21:50:41'),
(171, '372000P.C LE2007', 372, 'P.C Unit', 'LENOVO', '2007-12-30', '2007-04-15', NULL, 'CV.NOVETA SAMUEL', 1, '2021-07-30 21:50:41', '2021-07-30 21:50:41'),
(172, '373000P.C LE2007', 373, 'P.C Unit', 'LENOVO', '2007-12-30', '2007-04-15', NULL, 'CV.NOVETA SAMUEL', 1, '2021-07-30 21:50:41', '2021-07-30 21:50:41'),
(173, '374000P.C LE2007', 374, 'P.C Unit', 'LENOVO', '2007-12-30', '2007-10-23', NULL, 'CV.NOVETA SAMUEL', 1, '2021-07-30 21:50:41', '2021-07-30 21:50:41'),
(174, '375000P.C LE2007', 375, 'P.C Unit', 'LENOVO', '2007-12-30', '2007-10-23', NULL, 'CV.NOVETA SAMUEL', 1, '2021-07-30 21:50:41', '2021-07-30 21:50:41'),
(175, '376000P.C HP2008', 376, 'P.C Unit', 'HP PAVILION P2-1250L', '2008-09-11', '2008-10-21', NULL, 'CV. PRIMATECH', 1, '2021-07-30 21:50:41', '2021-07-30 21:50:41'),
(176, '377000P.C HP2008', 377, 'P.C Unit', 'HP PAVILION P2-1250L', '2008-09-11', '2008-10-21', NULL, 'CV. PRIMATECH', 1, '2021-07-30 21:50:41', '2021-07-30 21:50:41'),
(177, '378000P.C HP2009', 378, 'P.C Unit', 'HP PALIVION SLIMELNE S.5189D', '2009-12-30', '2009-10-20', NULL, 'CV.NOVETA SAMUEL', 1, '2021-07-30 21:50:41', '2021-07-30 21:50:41'),
(178, '379000P.C HP2009', 379, 'P.C Unit', 'HP PALIVION SLIMELNE S.5189D', '2009-12-30', '2009-02-12', NULL, 'CV.NOVETA SAMUEL', 1, '2021-07-30 21:50:41', '2021-07-30 21:50:41'),
(179, '380000P.C HP2009', 380, 'P.C Unit', 'HP PALIVION SLIMELNE S.5189D', '2009-12-30', '2009-11-10', NULL, 'CV.NOVETA SAMUEL', 1, '2021-07-30 21:50:41', '2021-07-30 21:50:41'),
(180, '381000P.C HP2009', 381, 'P.C Unit', 'HP PALIVION SLIMELNE S.5189D', '2009-12-30', '2009-11-10', NULL, 'CV.NOVETA SAMUEL', 1, '2021-07-30 21:50:41', '2021-07-30 21:50:41'),
(181, '382000P.C AS2011', 382, 'P.C Unit', 'ASUS k5130', '2011-04-28', '2011-04-28', NULL, 'CV.Daya Cipta', 1, '2021-07-30 21:50:41', '2021-07-30 21:50:41'),
(182, '383000P.C DE2011', 383, 'P.C Unit', 'DELL TYPE SCODIO XPS 8300', '2011-07-24', '2011-05-07', NULL, 'CV.SILVIA MAJU', 1, '2021-07-30 21:50:41', '2021-07-30 21:50:41'),
(183, '384000P.C DE2011', 384, 'P.C Unit', 'DELL TYPE SCODIO XPS 8300', '2011-07-24', '2011-05-07', NULL, 'CV.SILVIA MAJU', 1, '2021-07-30 21:50:41', '2021-07-30 21:50:41'),
(184, '385000P.C DE2011', 385, 'P.C Unit', 'DELL INSPIRION 620 MT', '2011-07-24', '2011-05-07', NULL, 'CV.SILVIA MAJU', 1, '2021-07-30 21:50:41', '2021-07-30 21:50:41'),
(185, '386000P.C DE2011', 386, 'P.C Unit', 'DELL INSPIRION 620 MT', '2011-07-24', '2011-05-07', NULL, 'CV.SILVIA MAJU', 1, '2021-07-30 21:50:41', '2021-07-30 21:50:41'),
(186, '387000P.C DE2011', 387, 'P.C Unit', 'DELL INSPIRION 620 MT', '2011-07-24', '2011-05-07', NULL, 'CV.SILVIA MAJU', 1, '2021-07-30 21:50:41', '2021-07-30 21:50:41'),
(187, '388000P.C DE2011', 388, 'P.C Unit', 'DELL INSPIRION 620 MT', '2011-07-24', '2011-05-07', NULL, 'CV.SILVIA MAJU', 1, '2021-07-30 21:50:41', '2021-07-30 21:50:41'),
(188, '389000P.C DE2011', 389, 'P.C Unit', 'DELL INSPIRION 620 MT', '2011-07-24', '2011-05-07', NULL, 'CV.SILVIA MAJU', 1, '2021-07-30 21:50:41', '2021-07-30 21:50:41'),
(189, '390000P.C DE2011', 390, 'P.C Unit', 'DELL INSPIRION 620 MT', '2011-07-24', '2011-05-07', NULL, 'CV.SILVIA MAJU', 1, '2021-07-30 21:50:41', '2021-07-30 21:50:41'),
(190, '391000P.C DE2011', 391, 'P.C Unit', 'DELL INSPIRION 620 MT', '2011-07-24', '2011-05-07', NULL, 'CV.SILVIA MAJU', 1, '2021-07-30 21:50:41', '2021-07-30 21:50:41'),
(191, '392000P.C DE2011', 392, 'P.C Unit', 'DELL INSPIRION 620 MT', '2011-07-24', '2011-05-07', NULL, 'CV.SILVIA MAJU', 1, '2021-07-30 21:50:41', '2021-07-30 21:50:41'),
(192, '393000P.C DE2011', 393, 'P.C Unit', 'DELL INSPIRION 620 MT', '2011-07-24', '2011-05-07', NULL, 'CV.SILVIA MAJU', 1, '2021-07-30 21:50:41', '2021-07-30 21:50:41'),
(193, '394000P.C DE2011', 394, 'P.C Unit', 'DELL INSPIRION 620 MT', '2011-07-24', '2011-05-07', NULL, 'CV.SILVIA MAJU', 1, '2021-07-30 21:50:41', '2021-07-30 21:50:41'),
(194, '395000P.C DE2011', 395, 'P.C Unit', 'DELL INSPIRION 620 MT', '2011-07-24', '2011-05-07', NULL, 'CV.SILVIA MAJU', 1, '2021-07-30 21:50:41', '2021-07-30 21:50:41'),
(195, '396000P.C DE2011', 396, 'P.C Unit', 'DELL INSPIRION 620 MT', '2011-07-24', '2011-05-07', NULL, 'CV.SILVIA MAJU', 1, '2021-07-30 21:50:41', '2021-07-30 21:50:41'),
(196, '397000P.C DE2011', 397, 'P.C Unit', 'DELL INSPIRION 620 MT', '2011-07-24', '2011-05-07', NULL, 'CV.SILVIA MAJU', 1, '2021-07-30 21:50:41', '2021-07-30 21:50:41'),
(197, '398000P.C DE2011', 398, 'P.C Unit', 'DELL INSPIRION 620 MT', '2011-07-24', '2011-05-07', NULL, 'CV.SILVIA MAJU', 1, '2021-07-30 21:50:41', '2021-07-30 21:50:41'),
(198, '399000P.C HP2012', 399, 'P.C Unit', 'HP PAVILION P2-1250L', '2012-11-29', '2012-10-30', NULL, 'CV.DUTA SAWARGA PI', 1, '2021-07-30 21:50:41', '2021-07-30 21:50:41'),
(199, '400000P.C HP2012', 400, 'P.C Unit', 'HP PAVILION P2-1250L', '2012-11-29', '2012-10-30', NULL, 'CV.DUTA SAWARGA PI', 1, '2021-07-30 21:50:41', '2021-07-30 21:50:41'),
(200, '401000P.C HP2012', 401, 'P.C Unit', 'HP PAVILION P2-1250L', '2012-11-29', '2012-10-30', NULL, 'CV.DUTA SAWARGA PI', 1, '2021-07-30 21:50:41', '2021-07-30 21:50:41'),
(201, '402000P.C HP2012', 402, 'P.C Unit', 'HP PAVILION P2-1250L', '2012-11-29', '2012-10-30', NULL, 'CV.DUTA SAWARGA PI', 1, '2021-07-30 21:50:41', '2021-07-30 21:50:41'),
(202, '403000P.C HP2012', 403, 'P.C Unit', 'HP PAVILION P2-1250L', '2012-11-29', '2012-10-30', NULL, 'CV.DUTA SAWARGA PI', 1, '2021-07-30 21:50:41', '2021-07-30 21:50:41'),
(203, '404000P.C HP2012', 404, 'P.C Unit', 'HP PAVILION P2-1250L', '2012-11-29', '2012-10-30', NULL, 'CV.DUTA SAWARGA PI', 1, '2021-07-30 21:50:41', '2021-07-30 21:50:41'),
(204, '405000P.C HP2012', 405, 'P.C Unit', 'HP PAVILION P2-1250L', '2012-11-29', '2012-10-30', NULL, 'CV.DUTA SAWARGA PI', 1, '2021-07-30 21:50:41', '2021-07-30 21:50:41'),
(205, '406000P.C HP2013', 406, 'P.C Unit', 'HP-pavilion 20-b1', '2013-12-05', '2013-04-28', NULL, 'CV.TRISTEK', 1, '2021-07-30 21:50:41', '2021-07-30 21:50:41'),
(206, '407000P.C HP2013', 407, 'P.C Unit', 'HP-pavilion 20-b1', '2013-12-05', '2013-04-28', NULL, 'CV.TRISTEK', 1, '2021-07-30 21:50:41', '2021-07-30 21:50:41'),
(207, '408000P.C HP2013', 408, 'P.C Unit', 'HP-pavilion 20-b1', '2013-12-05', '2013-04-28', NULL, 'CV.TRISTEK', 1, '2021-07-30 21:50:41', '2021-07-30 21:50:41'),
(208, '432000P.C AS2013', 432, 'P.C Unit', 'ASUS k5130', '2013-10-29', '2013-09-18', NULL, 'VC.GADING KOMPUTER', 1, '2021-07-30 21:50:41', '2021-07-30 21:50:41'),
(209, '433000P.C AS2013', 433, 'P.C Unit', 'ASUS k5130', '2013-10-29', '2013-09-18', NULL, 'VC.GADING KOMPUTER', 1, '2021-07-30 21:50:41', '2021-07-30 21:50:41'),
(210, '434000P.C HP2013', 434, 'P.C Unit', 'HP Pavilion  20-b110d AIO', '2013-06-11', '2013-03-11', NULL, 'CV.TRISTEK', 1, '2021-07-30 21:50:41', '2021-07-30 21:50:41'),
(211, '435000P.C HP2014', 435, 'P.C Unit', 'HP PAVILION P2-1250L', '2014-03-23', '2014-03-23', NULL, 'CV.SENADA', 1, '2021-07-30 21:50:41', '2021-07-30 21:50:41'),
(212, '436000P.C HP2014', 436, 'P.C Unit', 'HP PAVILION P2-1250L', '2014-03-23', '2014-03-23', NULL, 'CV.SENADA', 1, '2021-07-30 21:50:41', '2021-07-30 21:50:41'),
(213, '437000P.C HP2014', 437, 'P.C Unit', 'HP PAVILION P2-1250L', '2014-03-23', '2014-03-23', NULL, 'CV.SENADA', 1, '2021-07-30 21:50:41', '2021-07-30 21:50:41'),
(214, '438000P.C HP2014', 438, 'P.C Unit', 'HP PAVILION P2-1250L', '2014-03-23', '2014-03-23', NULL, 'CV.SENADA', 1, '2021-07-30 21:50:41', '2021-07-30 21:50:41'),
(215, '439000P.C HP2014', 439, 'P.C Unit', 'HP PAVILION P2-1250L', '2014-03-23', '2014-03-23', NULL, 'CV.SENADA', 1, '2021-07-30 21:50:41', '2021-07-30 21:50:41'),
(216, '440000P.C HP2014', 440, 'P.C Unit', 'HP PAVILION P2-1250L', '2014-03-23', '2014-03-23', NULL, 'CV.SENADA', 1, '2021-07-30 21:50:41', '2021-07-30 21:50:41'),
(217, '345000P.C HP2015', 345, 'P.C Unit', 'HP PAVILION P2-1250L', '2015-10-24', '2015-11-24', NULL, 'CV.SENADA', 1, '2021-07-30 21:50:41', '2021-07-30 21:50:41'),
(218, '411000P.C HP2015', 411, 'P.C Unit', 'HP PAVILION P2-1250L', '2015-10-25', '2015-11-24', NULL, 'CV.SENADA', 1, '2021-07-30 21:50:41', '2021-07-30 21:50:41'),
(219, '412000PRINHP2016', 412, 'PRINTER ', 'HP LASERJET PRO P 1102', '2016-08-14', '2016-03-15', NULL, 'CV.GADING KOMPUTER', 1, '2021-07-30 21:50:41', '2021-07-30 21:50:41'),
(220, '413000PRINHP2016', 413, 'PRINTER ', 'HP LASERJET PRO P 1103', '2016-08-14', '2016-03-18', NULL, 'CV.GADING KOMPUTER', 1, '2021-07-30 21:50:41', '2021-07-30 21:50:41'),
(221, '414000PRINHP2016', 414, 'PRINTER ', 'HP LASERJET PRO P 1104', '2016-08-14', '2016-03-18', NULL, 'CV.GADING KOMPUTER', 1, '2021-07-30 21:50:41', '2021-07-30 21:50:41'),
(222, '415000PRINHP2016', 415, 'PRINTER ', 'HP LASERJET PRO P 1105', '2016-08-14', '2016-03-18', NULL, 'CV.GADING KOMPUTER', 1, '2021-07-30 21:50:41', '2021-07-30 21:50:41'),
(223, '', 0, 'dsadsa', 'dsad', '0000-00-00', '0000-00-00', NULL, 'dsad', 1, '2021-08-20 10:24:22', '2021-08-20 10:24:22');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`) VALUES
(0, 'Tidak Ada Kategori'),
(1, 'Baik'),
(2, 'Masih Bisa Diperbaiki'),
(3, 'Rusak');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(5) NOT NULL,
  `nama_barang` varchar(250) NOT NULL,
  `merk` varchar(100) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `harga` int(25) NOT NULL,
  `tgl_pembelian` date NOT NULL,
  `asal_perolehan` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `modified` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `nama_barang`, `merk`, `jumlah`, `harga`, `tgl_pembelian`, `asal_perolehan`, `foto`, `modified`, `created`) VALUES
(1, 'dsadsa', 'dsad', 13, 159800000, '2024-06-17', 'dsad', '1629456607_8fd3a459120fb71d3d0e.jpeg', '2021-08-20 10:50:07', '2021-08-20 10:29:43');

-- --------------------------------------------------------

--
-- Table structure for table `pengadaan`
--

CREATE TABLE `pengadaan` (
  `id_pengadaan` int(5) NOT NULL,
  `nama_barang_pengadaan` varchar(100) NOT NULL,
  `merk_pengadaan` varchar(100) NOT NULL,
  `jumlah_pengadaan` int(5) NOT NULL,
  `harga_satuan` int(25) NOT NULL,
  `total_harga` int(25) NOT NULL,
  `status` int(5) NOT NULL DEFAULT 0,
  `keterangan` text DEFAULT NULL,
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengadaan`
--

INSERT INTO `pengadaan` (`id_pengadaan`, `nama_barang_pengadaan`, `merk_pengadaan`, `jumlah_pengadaan`, `harga_satuan`, `total_harga`, `status`, `keterangan`, `modified`, `created`) VALUES
(4, 'Komputer', 'Asus', 5, 100000, 500000, 1, ' jhgjhfu\r\n', '2021-07-22 18:47:01', '2021-07-15 10:27:42'),
(5, 'Kulkas', 'Polytron', 5, 200000, 1000000, 1, 'Kemahalan', '2021-07-22 18:01:20', '2021-07-15 10:28:35'),
(6, 'Laptop', 'Asus', 1, 500000, 550000, 2, 'dsadas', '2021-07-19 22:49:40', '2021-07-15 10:28:50'),
(7, 'gfjfjhfj', 'hgjhf', 1, 6576476, 6567467, 1, 'percobaan saja', '2021-07-22 18:46:32', '2021-07-22 18:29:39');

-- --------------------------------------------------------

--
-- Table structure for table `pengecekan`
--

CREATE TABLE `pengecekan` (
  `id_pengecekan` int(5) NOT NULL,
  `periode` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengecekan`
--

INSERT INTO `pengecekan` (`id_pengecekan`, `periode`) VALUES
(11, '2020-02-06');

--
-- Triggers `pengecekan`
--
DELIMITER $$
CREATE TRIGGER `trigger_pengecekan_tambah` AFTER INSERT ON `pengecekan` FOR EACH ROW BEGIN
  INSERT INTO pengecekan_detail
  (barang, pengecekan)
  SELECT id_barang, NEW.id_pengecekan
  FROM barang
  WHERE active=1;  
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pengecekan_detail`
--

CREATE TABLE `pengecekan_detail` (
  `id_pengecekan_detail` int(11) NOT NULL,
  `pengecekan` int(5) NOT NULL,
  `barang` int(5) NOT NULL,
  `kondisi` int(5) NOT NULL DEFAULT 0,
  `catatan` text DEFAULT NULL,
  `foto` varchar(250) DEFAULT NULL,
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengecekan_detail`
--

INSERT INTO `pengecekan_detail` (`id_pengecekan_detail`, `pengecekan`, `barang`, `kondisi`, `catatan`, `foto`, `modified`, `created`) VALUES
(241, 11, 170, 2, 'dasdas', '1628276825_78834aa25ebd44bd2814.jpg', '2021-08-06 19:07:05', '2021-07-30 21:59:49'),
(242, 11, 171, 1, '', '1628276853_090a3a0996db4043b61d.jpeg', '2021-08-06 19:07:33', '2021-07-30 21:59:49'),
(243, 11, 172, 0, NULL, NULL, '2021-07-30 21:59:49', '2021-07-30 21:59:49'),
(244, 11, 173, 0, NULL, NULL, '2021-07-30 21:59:49', '2021-07-30 21:59:49'),
(245, 11, 174, 0, NULL, NULL, '2021-07-30 21:59:49', '2021-07-30 21:59:49'),
(246, 11, 175, 0, NULL, NULL, '2021-07-30 21:59:49', '2021-07-30 21:59:49'),
(247, 11, 176, 0, NULL, NULL, '2021-07-30 21:59:49', '2021-07-30 21:59:49'),
(248, 11, 177, 0, NULL, NULL, '2021-07-30 21:59:49', '2021-07-30 21:59:49'),
(249, 11, 178, 0, NULL, NULL, '2021-07-30 21:59:49', '2021-07-30 21:59:49'),
(250, 11, 179, 0, NULL, NULL, '2021-07-30 21:59:49', '2021-07-30 21:59:49'),
(251, 11, 180, 0, NULL, NULL, '2021-07-30 21:59:49', '2021-07-30 21:59:49'),
(252, 11, 181, 0, NULL, NULL, '2021-07-30 21:59:49', '2021-07-30 21:59:49'),
(253, 11, 182, 0, NULL, NULL, '2021-07-30 21:59:49', '2021-07-30 21:59:49'),
(254, 11, 183, 0, NULL, NULL, '2021-07-30 21:59:49', '2021-07-30 21:59:49'),
(255, 11, 184, 0, NULL, NULL, '2021-07-30 21:59:49', '2021-07-30 21:59:49'),
(256, 11, 185, 0, NULL, NULL, '2021-07-30 21:59:49', '2021-07-30 21:59:49'),
(257, 11, 186, 0, NULL, NULL, '2021-07-30 21:59:49', '2021-07-30 21:59:49'),
(258, 11, 187, 0, NULL, NULL, '2021-07-30 21:59:49', '2021-07-30 21:59:49'),
(259, 11, 188, 0, NULL, NULL, '2021-07-30 21:59:49', '2021-07-30 21:59:49'),
(260, 11, 189, 0, NULL, NULL, '2021-07-30 21:59:49', '2021-07-30 21:59:49'),
(261, 11, 190, 0, NULL, NULL, '2021-07-30 21:59:49', '2021-07-30 21:59:49'),
(262, 11, 191, 0, NULL, NULL, '2021-07-30 21:59:49', '2021-07-30 21:59:49'),
(263, 11, 192, 0, NULL, NULL, '2021-07-30 21:59:49', '2021-07-30 21:59:49'),
(264, 11, 193, 0, NULL, NULL, '2021-07-30 21:59:49', '2021-07-30 21:59:49'),
(265, 11, 194, 0, NULL, NULL, '2021-07-30 21:59:49', '2021-07-30 21:59:49'),
(266, 11, 195, 0, NULL, NULL, '2021-07-30 21:59:49', '2021-07-30 21:59:49'),
(267, 11, 196, 0, NULL, NULL, '2021-07-30 21:59:49', '2021-07-30 21:59:49'),
(268, 11, 197, 0, NULL, NULL, '2021-07-30 21:59:49', '2021-07-30 21:59:49'),
(269, 11, 198, 0, NULL, NULL, '2021-07-30 21:59:49', '2021-07-30 21:59:49'),
(270, 11, 199, 0, NULL, NULL, '2021-07-30 21:59:49', '2021-07-30 21:59:49'),
(271, 11, 200, 0, NULL, NULL, '2021-07-30 21:59:49', '2021-07-30 21:59:49'),
(272, 11, 201, 0, NULL, NULL, '2021-07-30 21:59:49', '2021-07-30 21:59:49'),
(273, 11, 202, 0, NULL, NULL, '2021-07-30 21:59:49', '2021-07-30 21:59:49'),
(274, 11, 203, 0, NULL, NULL, '2021-07-30 21:59:49', '2021-07-30 21:59:49'),
(275, 11, 204, 0, NULL, NULL, '2021-07-30 21:59:49', '2021-07-30 21:59:49'),
(276, 11, 205, 0, NULL, NULL, '2021-07-30 21:59:49', '2021-07-30 21:59:49'),
(277, 11, 206, 0, NULL, NULL, '2021-07-30 21:59:49', '2021-07-30 21:59:49'),
(278, 11, 207, 0, NULL, NULL, '2021-07-30 21:59:49', '2021-07-30 21:59:49'),
(279, 11, 208, 0, NULL, NULL, '2021-07-30 21:59:49', '2021-07-30 21:59:49'),
(280, 11, 209, 0, NULL, NULL, '2021-07-30 21:59:49', '2021-07-30 21:59:49'),
(281, 11, 210, 0, NULL, NULL, '2021-07-30 21:59:49', '2021-07-30 21:59:49'),
(282, 11, 211, 0, NULL, NULL, '2021-07-30 21:59:49', '2021-07-30 21:59:49'),
(283, 11, 212, 0, NULL, NULL, '2021-07-30 21:59:49', '2021-07-30 21:59:49'),
(284, 11, 213, 0, NULL, NULL, '2021-07-30 21:59:49', '2021-07-30 21:59:49'),
(285, 11, 214, 0, NULL, NULL, '2021-07-30 21:59:49', '2021-07-30 21:59:49'),
(286, 11, 215, 0, NULL, NULL, '2021-07-30 21:59:49', '2021-07-30 21:59:49'),
(287, 11, 216, 0, NULL, NULL, '2021-07-30 21:59:49', '2021-07-30 21:59:49'),
(288, 11, 217, 0, NULL, NULL, '2021-07-30 21:59:49', '2021-07-30 21:59:49'),
(289, 11, 218, 0, NULL, NULL, '2021-07-30 21:59:49', '2021-07-30 21:59:49'),
(290, 11, 219, 0, NULL, NULL, '2021-07-30 21:59:49', '2021-07-30 21:59:49'),
(291, 11, 220, 0, NULL, NULL, '2021-07-30 21:59:49', '2021-07-30 21:59:49'),
(292, 11, 221, 0, NULL, NULL, '2021-07-30 21:59:49', '2021-07-30 21:59:49'),
(293, 11, 222, 0, NULL, NULL, '2021-07-30 21:59:49', '2021-07-30 21:59:49');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama_pengguna` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `token` varchar(100) DEFAULT NULL,
  `role` int(5) NOT NULL,
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `username`, `nama_pengguna`, `email`, `password`, `token`, `role`, `modified`, `created`) VALUES
(1, 'pendataan', 'Irsyad Nurdin', 'irsyadnurdin12@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '30ae30c2e7038b023f2fa9de2ec213c6', 1, '2021-07-30 22:35:48', '0000-00-00 00:00:00'),
(2, 'pengecekan', 'Al Ivol', 'alivol@gmail.com', '21232f297a57a5a743894a0e4a801fc3', NULL, 2, '2021-07-12 11:51:06', '0000-00-00 00:00:00'),
(3, 'pengadaan', 'Nindi Arnelti', 'nindi@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '', 3, '2021-07-12 11:51:06', '0000-00-00 00:00:00'),
(4, 'umum', 'Feby Wulandari', 'feby@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '', 4, '2021-07-13 18:52:52', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(5) NOT NULL,
  `deskripsi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `deskripsi`) VALUES
(1, 'Bagian Pendataan'),
(2, 'Bagian Pengecekan'),
(3, 'Bagian Pengadaan'),
(4, 'Bagian Umum');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id_status` int(5) NOT NULL,
  `deskripsi_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id_status`, `deskripsi_status`) VALUES
(0, 'Menunggu Konfirmasi'),
(1, 'Diterima'),
(2, 'Ditolak');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD UNIQUE KEY `nup` (`nup`),
  ADD UNIQUE KEY `kode_barang` (`kode_barang`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pengadaan`
--
ALTER TABLE `pengadaan`
  ADD PRIMARY KEY (`id_pengadaan`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `pengecekan`
--
ALTER TABLE `pengecekan`
  ADD PRIMARY KEY (`id_pengecekan`);

--
-- Indexes for table `pengecekan_detail`
--
ALTER TABLE `pengecekan_detail`
  ADD PRIMARY KEY (`id_pengecekan_detail`),
  ADD KEY `barang` (`barang`),
  ADD KEY `pengecekan` (`pengecekan`),
  ADD KEY `kondisi` (`kondisi`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `role` (`role`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=224;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengadaan`
--
ALTER TABLE `pengadaan`
  MODIFY `id_pengadaan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pengecekan`
--
ALTER TABLE `pengecekan`
  MODIFY `id_pengecekan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pengecekan_detail`
--
ALTER TABLE `pengecekan_detail`
  MODIFY `id_pengecekan_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=294;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pengadaan`
--
ALTER TABLE `pengadaan`
  ADD CONSTRAINT `pengadaan_ibfk_1` FOREIGN KEY (`status`) REFERENCES `status` (`id_status`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengecekan_detail`
--
ALTER TABLE `pengecekan_detail`
  ADD CONSTRAINT `pengecekan_detail_ibfk_1` FOREIGN KEY (`barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengecekan_detail_ibfk_2` FOREIGN KEY (`pengecekan`) REFERENCES `pengecekan` (`id_pengecekan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengecekan_detail_ibfk_3` FOREIGN KEY (`kondisi`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
