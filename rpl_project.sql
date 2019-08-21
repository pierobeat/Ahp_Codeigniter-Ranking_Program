-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2019 at 03:33 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rpl_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `analisa_krit`
--

CREATE TABLE `analisa_krit` (
  `kriteria_x` varchar(2) NOT NULL,
  `nilai_krit` float NOT NULL,
  `hasil_analis` double NOT NULL,
  `kriteria_y` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `analisa_krit`
--

INSERT INTO `analisa_krit` (`kriteria_x`, `nilai_krit`, `hasil_analis`, `kriteria_y`) VALUES
('1', 1, 0, '1'),
('1', 4, 0, '2'),
('1', 1, 0, '3'),
('1', 2, 0, '4'),
('1', 0.33, 0, '5'),
('1', 1, 0, '6'),
('2', 0.25, 0, '1'),
('2', 1, 0, '2'),
('2', 0.1, 0, '3'),
('2', 0.2, 0, '4'),
('2', 1, 0, '5'),
('2', 3, 0, '6'),
('3', 1, 0, '1'),
('3', 10, 0, '2'),
('3', 1, 0, '3'),
('3', 1, 0, '4'),
('3', 1, 0, '5'),
('3', 1, 0, '6'),
('4', 0.5, 0, '1'),
('4', 5, 0, '2'),
('4', 1, 0, '3'),
('4', 1, 0, '4'),
('4', 1, 0, '5'),
('4', 1, 0, '6'),
('5', 3.0303, 0, '1'),
('5', 1, 0, '2'),
('5', 1, 0, '3'),
('5', 1, 0, '4'),
('5', 1, 0, '5'),
('5', 0.1, 0, '6'),
('6', 1, 0, '1'),
('6', 0.333333, 0, '2'),
('6', 1, 0, '3'),
('6', 1, 0, '4'),
('6', 10, 0, '5'),
('6', 1, 0, '6');

-- --------------------------------------------------------

--
-- Table structure for table `detail_karyawan`
--

CREATE TABLE `detail_karyawan` (
  `id_kriteria` int(3) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `nilai_kriteria` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_karyawan`
--

INSERT INTO `detail_karyawan` (`id_kriteria`, `id_karyawan`, `nilai_kriteria`) VALUES
(1, 2, 80),
(2, 2, 100),
(3, 2, 100),
(4, 2, 80),
(5, 2, 80),
(6, 2, 40),
(1, 3, 40),
(2, 3, 20),
(3, 3, 40),
(4, 3, 100),
(5, 3, 20),
(6, 3, 20),
(1, 1, 20),
(2, 1, 60),
(3, 1, 100),
(4, 1, 80),
(5, 1, 60),
(6, 1, 80);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nama_karyawan` text NOT NULL,
  `nilai` int(11) NOT NULL,
  `final_nilai` decimal(8,6) NOT NULL,
  `final_total` decimal(8,6) NOT NULL,
  `created_by` text NOT NULL,
  `ip_access` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama_karyawan`, `nilai`, `final_nilai`, `final_total`, `created_by`, `ip_access`) VALUES
(1, 'John Pantau', 67, '2.645000', '0.000000', '', ''),
(2, 'Nico Robin', 80, '4.391000', '0.000000', '', ''),
(3, 'Ujang', 40, '1.965000', '0.000000', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(3) NOT NULL,
  `nama_kriteria` text NOT NULL,
  `jumlah_kriteria` decimal(18,10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`, `jumlah_kriteria`) VALUES
(1, 'Lama Berpolitik', '3.1951600000'),
(2, 'Integritas Sosial', '2.0493100000'),
(3, 'Reputasi di Masyarakat', '1.3541900000'),
(4, 'Keaktifan Berorganisasi', '1.1080000000'),
(5, 'catatan Kriminal', '0.7064000000'),
(6, 'Kesesuaian dengan Tim', '0.5881500000');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `jum_nilai` double NOT NULL,
  `ket_nilai` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `jum_nilai`, `ket_nilai`) VALUES
(1, 5, 'Mutlak Sangat Penting'),
(2, 4, 'Mendekati Sangat Penting'),
(3, 3, 'Lebih Penting'),
(4, 2, 'Sedikit Lebih Penting'),
(5, 1, 'Sama Penting'),
(6, 0.33, 'Sedikit Kurang Penting'),
(7, 0.2, 'Kurang Penting'),
(8, 0.1, 'Mutlak Tidak Penting');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_karyawan`
--

CREATE TABLE `nilai_karyawan` (
  `id_nilK` int(3) NOT NULL,
  `valu_nilK` int(3) NOT NULL,
  `krit_nilK` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_karyawan`
--

INSERT INTO `nilai_karyawan` (`id_nilK`, `valu_nilK`, `krit_nilK`) VALUES
(1, 100, 'Sangat Baik'),
(2, 80, 'Baik'),
(3, 60, 'Cukup'),
(4, 40, 'Buruk'),
(5, 20, 'Sangat Buruk');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id_user`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_karyawan`
--
ALTER TABLE `detail_karyawan`
  ADD KEY `FK_ID_KARYAWAN` (`id_karyawan`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
