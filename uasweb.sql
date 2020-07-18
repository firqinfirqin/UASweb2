-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 17, 2020 at 06:56 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uasweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `padang`
--

CREATE TABLE `padang` (
  `no_menu` int(13) NOT NULL,
  `menu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `padang`
--

INSERT INTO `padang` (`no_menu`, `menu`, `harga`) VALUES
(1, 'Paket nasi sate padang', 40000);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(13) NOT NULL,
  `nama` varchar(42) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(42) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_resto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `makanan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga` int(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `nama`, `no_hp`, `email`, `jenis_resto`, `makanan`, `harga`) VALUES
(20, 'iyoy', '085891728757', 'iyoy@iyoy.com', 'Warteg Kharisma', 'Paket nasi tempe orek, Kentang balado, oseng-oseng, tongkol', 30000),
(21, 'iyoy2', '08589172777', 'iyoy@iyoy2.com', 'Soto Ayam Ndelik', 'Paket Nasi Soto ayam plus mendoan', 35000),
(22, 'iyoy3', '085891728758', 'iyoy@iyoy3.com', 'Restoran Padang Sederhana', 'Paket nasi sate padang', 40000);

-- --------------------------------------------------------

--
-- Table structure for table `soto`
--

CREATE TABLE `soto` (
  `no_menu` int(13) NOT NULL,
  `menu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `soto`
--

INSERT INTO `soto` (`no_menu`, `menu`, `harga`) VALUES
(1, 'Paket Nasi Soto ayam plus mendoan', 35000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lvl` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `lvl`) VALUES
('admin', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `wt`
--

CREATE TABLE `wt` (
  `no_menu` int(13) NOT NULL,
  `menu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wt`
--

INSERT INTO `wt` (`no_menu`, `menu`, `harga`) VALUES
(1, 'Paket nasi tempe orek, Kentang balado, oseng-oseng, tongkol', 30000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `padang`
--
ALTER TABLE `padang`
  ADD PRIMARY KEY (`no_menu`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `soto`
--
ALTER TABLE `soto`
  ADD PRIMARY KEY (`no_menu`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `wt`
--
ALTER TABLE `wt`
  ADD PRIMARY KEY (`no_menu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
