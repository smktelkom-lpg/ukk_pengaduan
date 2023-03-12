-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2023 at 11:00 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukk_pengaduan`
--

-- --------------------------------------------------------

--
-- Table structure for table `masyarakat`
--

CREATE TABLE `masyarakat` (
  `id_masyarakat` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `masyarakat`
--

INSERT INTO `masyarakat` (`id_masyarakat`, `nik`, `nama`, `username`, `password`, `telp`) VALUES
(1, '2147483647', 'Wahyu', 'wahyu', '$2y$10$BdcuN73Oka1TjDwoWh6mse7EIKp2kHB89p0RtDZxpK2fRvyfEOMf6', '2147483647'),
(2, '1810018291829181', 'Rezza Alvionita', 'rezza', '$2y$10$7QzMAXEd8hjE5/R7fTJcuORS7LhHjbOSX0MEhhcr/fL8qJvYiTrAa', '089829829822'),
(3, '', '', '', '$2y$10$fE2D71uRp/tEGRNv6tIewOnEAoLUTZrz50.MZJKotGiwBXjgp0OEK', ''),
(4, '1234', 'Admin', 'admin', '$2y$10$0jyFJ9IG1UjkO9Oed2ZLqOuejyuRkF3UYqg71w1iRcwra7mpB3Pn.', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `tgl_pengaduan` date NOT NULL,
  `nik` varchar(16) NOT NULL,
  `isi_laporan` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` enum('0','1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `tgl_pengaduan`, `nik`, `isi_laporan`, `foto`, `status`) VALUES
(1, '2023-03-12', '1810018291829181', 'sa', '20230312', '2'),
(2, '2023-03-12', '1810018291829181', 'sassa', '20230312', '2'),
(3, '2023-03-12', '1810018291829181', 'assaas', '20230312_3.jpg', '2'),
(4, '2023-03-12', '2147483647', 'Lorem ipsum dolor si amet', '20230312_4.jpg', '2'),
(5, '2023-03-12', '2147483647', 'asas2222', '20230312_5.jpg', '1'),
(6, '2023-03-12', '2147483647', 'dsadsa', '20230312_6.png', '0'),
(7, '2023-03-12', '2147483647', 'sdsas', '20230312_7.jpg', '1'),
(8, '2023-03-12', '2147483647', 'sdas', '20230312_8.jpg', '2'),
(9, '2023-03-12', '2147483647', 'ssasa', '20230312_9.jpg', '2'),
(10, '2023-03-12', '2147483647', 'sasasa222', '20230312_10.jpg', '2'),
(11, '2023-03-12', '2147483647', 'asasa', '20230312_11.jpg', '0'),
(12, '2023-03-12', '2147483647', 'assaas', '20230312_12.jpg', '0'),
(13, '2023-03-12', '2147483647', 'asas', '20230312_13.jpg', '0'),
(14, '2023-03-12', '2147483647', 'asas', '20230312_14.jpg', '0');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `level` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `telp`, `level`) VALUES
(1, 'Admin', 'admin', '$2y$10$0jyFJ9IG1UjkO9Oed2ZLqOuejyuRkF3UYqg71w1iRcwra7mpB3Pn.', '217281728', 'admin'),
(3, 'Hidayat', 'petugas', '$2y$10$adO4RHgpMkY07Kc56/W/4.TN4c7spGywQhZYZ/m0KfwhfVkXnmwl6', '231231231', 'admin'),
(6, 'Wahyu Rahmat Hidayat', 'wahyu1122', '$2y$10$S0bmLjMLESlXKTwu5YNiO.Vp2xW6.LwlJrb/GO52orfeHIsFquqO2', '082185903635', 'petugas');

-- --------------------------------------------------------

--
-- Table structure for table `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id_tanggapan` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `tgl_tanggapan` date NOT NULL,
  `tanggapan` text NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tanggapan`
--

INSERT INTO `tanggapan` (`id_tanggapan`, `id_pengaduan`, `tgl_tanggapan`, `tanggapan`, `id_petugas`) VALUES
(4, 3, '2023-03-12', 'asasa', 1),
(5, 4, '2023-03-12', 'aaa', 1),
(6, 9, '2023-03-12', '5353', 1),
(7, 2, '2023-03-12', 'oke', 1),
(8, 1, '2023-03-12', 'ya', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`id_masyarakat`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `masyarakat`
--
ALTER TABLE `masyarakat`
  MODIFY `id_masyarakat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
