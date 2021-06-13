-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2021 at 04:49 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wedding`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_decoration`
--

CREATE TABLE `tabel_decoration` (
  `id_decoration` int(3) NOT NULL,
  `nama_decoration` varchar(20) NOT NULL,
  `gambar_decoration` varchar(20) NOT NULL,
  `biaya_decoration` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_decoration`
--

INSERT INTO `tabel_decoration` (`id_decoration`, `nama_decoration`, `gambar_decoration`, `biaya_decoration`) VALUES
(1, 'Flower Lighting', 'decoration1.jpg', 10000000),
(2, 'White and Green', 'decoration2.jpg', 1000000),
(3, 'Floral Gardenia', 'decoration3.jpg', 2000000),
(4, 'Red Rose Design', 'decoration4.jpg', 15000000),
(5, 'Royal Bouquet', 'decoration5.jpg', 5000000),
(6, 'Lavender Classy', 'decoration6.jpg', 3000000),
(7, 'Fairy Tale', 'decoration7.jpg', 2500000),
(8, 'White Glowing', 'decoration8.jpg', 7000000),
(9, 'Sparkling Night', 'decoration9.jpg', 9000000);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_detail_order`
--

CREATE TABLE `tabel_detail_order` (
  `id_order` int(3) NOT NULL,
  `id_login` int(3) NOT NULL,
  `id_paket` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_detail_order`
--

INSERT INTO `tabel_detail_order` (`id_order`, `id_login`, `id_paket`) VALUES
(1, 2, 1),
(2, 2, 1),
(3, 2, 5),
(4, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_detail_paket`
--

CREATE TABLE `tabel_detail_paket` (
  `id_paket` int(3) NOT NULL,
  `id_kota` int(3) NOT NULL,
  `id_photographer` int(3) NOT NULL,
  `id_decoration` int(3) NOT NULL,
  `id_sovernir` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_detail_paket`
--

INSERT INTO `tabel_detail_paket` (`id_paket`, `id_kota`, `id_photographer`, `id_decoration`, `id_sovernir`) VALUES
(1, 1, 1, 1, 1),
(2, 1, 4, 4, 4),
(3, 1, 7, 7, 7),
(4, 2, 2, 2, 2),
(5, 2, 5, 5, 5),
(6, 2, 8, 8, 8),
(7, 3, 3, 3, 3),
(8, 3, 6, 6, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_kota`
--

CREATE TABLE `tabel_kota` (
  `id_kota` int(3) NOT NULL,
  `nama_kota` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_kota`
--

INSERT INTO `tabel_kota` (`id_kota`, `nama_kota`) VALUES
(1, 'Makassar'),
(2, 'Korea'),
(3, 'Jepang');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_login`
--

CREATE TABLE `tabel_login` (
  `id_login` int(3) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_login`
--

INSERT INTO `tabel_login` (`id_login`, `username`, `password`, `email`) VALUES
(2, 'Paramita', '123', 'paramitaaditung@yahoo.com'),
(3, 'Mimi', '1234567890', 'hemayuaditung@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_login_level`
--

CREATE TABLE `tabel_login_level` (
  `id_login` int(3) NOT NULL,
  `level` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_login_level`
--

INSERT INTO `tabel_login_level` (`id_login`, `level`) VALUES
(2, 'user'),
(3, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_order`
--

CREATE TABLE `tabel_order` (
  `id_order` int(3) NOT NULL,
  `tanggal_pesan` datetime NOT NULL,
  `total_biaya` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_order`
--

INSERT INTO `tabel_order` (`id_order`, `tanggal_pesan`, `total_biaya`) VALUES
(1, '2021-06-10 00:45:48', 13100000),
(2, '2021-06-10 00:46:44', 13100000),
(3, '2021-06-10 00:48:02', 8010000),
(4, '2021-06-10 22:02:53', 8010000);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_paket`
--

CREATE TABLE `tabel_paket` (
  `id_paket` int(3) NOT NULL,
  `nama_paket` varchar(20) NOT NULL,
  `biaya_paket` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_paket`
--

INSERT INTO `tabel_paket` (`id_paket`, `nama_paket`, `biaya_paket`) VALUES
(1, 'Diamond Luxury', 13100000),
(2, 'Classic Elegant', 16150000),
(3, 'Simply Unique', 4005000),
(4, 'Silver Package', 3020000),
(5, 'Gold Wedding', 8010000),
(6, 'Miny Bless', 9030000),
(7, 'Royal Family', 4525000),
(8, 'Middle Package', 6550000);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_photographer`
--

CREATE TABLE `tabel_photographer` (
  `id_photographer` int(3) NOT NULL,
  `nama_photographer` varchar(20) NOT NULL,
  `gambar_photographer` varchar(20) NOT NULL,
  `biaya_photographer` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_photographer`
--

INSERT INTO `tabel_photographer` (`id_photographer`, `nama_photographer`, `gambar_photographer`, `biaya_photographer`) VALUES
(1, 'Ian Alaric', 'foto1.png', 3000000),
(2, 'Kartorius W. Gozali', 'foto2.png', 2000000),
(3, 'Samuel M. Liem', 'foto3.png', 2500000),
(4, 'Reny E. Malioy', 'foto4.png', 1000000),
(5, 'Trofan P. Pranata', 'foto5.png', 3000000),
(6, 'Putra Alexander', 'foto6.png', 3500000),
(7, 'Paquita Madonza', 'foto7.png', 1500000),
(8, 'Luis Figo W.', 'foto8.png', 2000000),
(9, 'Aaron W. Kusuma', 'foto9.png', 3000000);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_sovernir`
--

CREATE TABLE `tabel_sovernir` (
  `id_sovernir` int(3) NOT NULL,
  `nama_sovernir` varchar(20) NOT NULL,
  `gambar_sovernir` varchar(20) NOT NULL,
  `biaya_sovernir` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_sovernir`
--

INSERT INTO `tabel_sovernir` (`id_sovernir`, `nama_sovernir`, `gambar_sovernir`, `biaya_sovernir`) VALUES
(1, 'Glossy Jar', 'sovernir1.jpg', 100000),
(2, 'Custom Bag', 'sovernir2.jpg', 20000),
(3, 'Design Glass', 'sovernir3.jpg', 25000),
(4, 'Heart Liontin', 'sovernir4.jpg', 150000),
(5, 'Colorful Fan', 'sovernir5.jpg', 10000),
(6, 'Cutie Tumbler', 'sovernir6.jpg', 50000),
(7, 'Wonderful Pen', 'sovernir7.jpg', 5000),
(8, 'Smally Shoes', 'sovernir8.jpg', 30000),
(9, 'Healthy Mask', 'sovernir9.jpg', 15000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_decoration`
--
ALTER TABLE `tabel_decoration`
  ADD PRIMARY KEY (`id_decoration`);

--
-- Indexes for table `tabel_detail_order`
--
ALTER TABLE `tabel_detail_order`
  ADD KEY `tabel_order_id_order_fk` (`id_order`),
  ADD KEY `tabel_login_id_login_fk2` (`id_login`),
  ADD KEY `tabel_detail_paket_id_paket_fk` (`id_paket`);

--
-- Indexes for table `tabel_detail_paket`
--
ALTER TABLE `tabel_detail_paket`
  ADD KEY `tabel_paket_id_paket_fk` (`id_paket`),
  ADD KEY `tabel_kota_id_kota_fk` (`id_kota`),
  ADD KEY `tabel_photographer_id_photographer_fk` (`id_photographer`),
  ADD KEY `tabel_decoration_id_decoration_fk` (`id_decoration`),
  ADD KEY `tabel_sovernir_id_sovernir_fk` (`id_sovernir`);

--
-- Indexes for table `tabel_kota`
--
ALTER TABLE `tabel_kota`
  ADD PRIMARY KEY (`id_kota`);

--
-- Indexes for table `tabel_login`
--
ALTER TABLE `tabel_login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `tabel_login_level`
--
ALTER TABLE `tabel_login_level`
  ADD KEY `tabel_login_id_login_fk` (`id_login`);

--
-- Indexes for table `tabel_order`
--
ALTER TABLE `tabel_order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `tabel_paket`
--
ALTER TABLE `tabel_paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `tabel_photographer`
--
ALTER TABLE `tabel_photographer`
  ADD PRIMARY KEY (`id_photographer`);

--
-- Indexes for table `tabel_sovernir`
--
ALTER TABLE `tabel_sovernir`
  ADD PRIMARY KEY (`id_sovernir`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_decoration`
--
ALTER TABLE `tabel_decoration`
  MODIFY `id_decoration` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tabel_kota`
--
ALTER TABLE `tabel_kota`
  MODIFY `id_kota` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tabel_login`
--
ALTER TABLE `tabel_login`
  MODIFY `id_login` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tabel_order`
--
ALTER TABLE `tabel_order`
  MODIFY `id_order` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tabel_paket`
--
ALTER TABLE `tabel_paket`
  MODIFY `id_paket` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tabel_photographer`
--
ALTER TABLE `tabel_photographer`
  MODIFY `id_photographer` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tabel_sovernir`
--
ALTER TABLE `tabel_sovernir`
  MODIFY `id_sovernir` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tabel_detail_order`
--
ALTER TABLE `tabel_detail_order`
  ADD CONSTRAINT `tabel_detail_paket_id_paket_fk` FOREIGN KEY (`id_paket`) REFERENCES `tabel_detail_paket` (`id_paket`),
  ADD CONSTRAINT `tabel_login_id_login_fk2` FOREIGN KEY (`id_login`) REFERENCES `tabel_login` (`id_login`),
  ADD CONSTRAINT `tabel_order_id_order_fk` FOREIGN KEY (`id_order`) REFERENCES `tabel_order` (`id_order`);

--
-- Constraints for table `tabel_detail_paket`
--
ALTER TABLE `tabel_detail_paket`
  ADD CONSTRAINT `tabel_decoration_id_decoration_fk` FOREIGN KEY (`id_decoration`) REFERENCES `tabel_decoration` (`id_decoration`),
  ADD CONSTRAINT `tabel_kota_id_kota_fk` FOREIGN KEY (`id_kota`) REFERENCES `tabel_kota` (`id_kota`),
  ADD CONSTRAINT `tabel_paket_id_paket_fk` FOREIGN KEY (`id_paket`) REFERENCES `tabel_paket` (`id_paket`),
  ADD CONSTRAINT `tabel_photographer_id_photographer_fk` FOREIGN KEY (`id_photographer`) REFERENCES `tabel_photographer` (`id_photographer`),
  ADD CONSTRAINT `tabel_sovernir_id_sovernir_fk` FOREIGN KEY (`id_sovernir`) REFERENCES `tabel_sovernir` (`id_sovernir`);

--
-- Constraints for table `tabel_login_level`
--
ALTER TABLE `tabel_login_level`
  ADD CONSTRAINT `tabel_login_id_login_fk` FOREIGN KEY (`id_login`) REFERENCES `tabel_login` (`id_login`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
