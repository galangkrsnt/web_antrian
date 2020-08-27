-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2020 at 02:02 PM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_antrian`
--

-- --------------------------------------------------------

--
-- Table structure for table `antrian`
--

CREATE TABLE IF NOT EXISTS `antrian` (
`id_antrian` int(12) NOT NULL,
  `id_mahasiswa` int(12) NOT NULL,
  `id_loket` int(12) NOT NULL,
  `id_jadwalAntrian` int(12) NOT NULL,
  `tgl_antrian` date DEFAULT NULL,
  `status_antrian` varchar(15) NOT NULL,
  `total_antrian` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `jadwalantrian`
--

CREATE TABLE IF NOT EXISTS `jadwalantrian` (
`id_jadwalAntrian` int(12) NOT NULL,
  `id_mahasiswa` int(12) NOT NULL,
  `id_loket` int(12) NOT NULL,
  `tgl_ambil` date DEFAULT NULL,
  `tgl_antri` date DEFAULT NULL,
  `tgl_akhir` date DEFAULT NULL,
  `status_antrian` varchar(15) NOT NULL,
  `total_antrian` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
`level_id` int(2) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `loket`
--

CREATE TABLE IF NOT EXISTS `loket` (
`id_Loket` int(12) NOT NULL,
  `no_Loket` varchar(3) NOT NULL,
  `nama_Loket` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
`id_mahasiswa` int(12) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(15) NOT NULL,
  `nim` int(9) NOT NULL,
  `nama_mahasiswa` varchar(100) NOT NULL,
  `email_mahasiswa` varchar(100) NOT NULL,
  `jur_mahasiswa` varchar(30) NOT NULL,
  `notelp_mahasiswa` int(14) NOT NULL,
  `level_id` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `petugasloket`
--

CREATE TABLE IF NOT EXISTS `petugasloket` (
`id_petugas` int(12) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(15) NOT NULL,
  `nama_petugas` varchar(100) NOT NULL,
  `level_id` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `antrian`
--
ALTER TABLE `antrian`
 ADD PRIMARY KEY (`id_antrian`), ADD KEY `FK_mahasiswa` (`id_mahasiswa`), ADD KEY `FK_loket` (`id_loket`), ADD KEY `FK_jadwalAntrian` (`id_jadwalAntrian`);

--
-- Indexes for table `jadwalantrian`
--
ALTER TABLE `jadwalantrian`
 ADD PRIMARY KEY (`id_jadwalAntrian`), ADD KEY `FK_mahasiswa` (`id_mahasiswa`), ADD KEY `FK_loket` (`id_loket`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
 ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `loket`
--
ALTER TABLE `loket`
 ADD PRIMARY KEY (`id_Loket`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
 ADD PRIMARY KEY (`id_mahasiswa`), ADD KEY `FK_login` (`level_id`);

--
-- Indexes for table `petugasloket`
--
ALTER TABLE `petugasloket`
 ADD PRIMARY KEY (`id_petugas`), ADD KEY `FK_login` (`level_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `antrian`
--
ALTER TABLE `antrian`
MODIFY `id_antrian` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jadwalantrian`
--
ALTER TABLE `jadwalantrian`
MODIFY `id_jadwalAntrian` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
MODIFY `level_id` int(2) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `loket`
--
ALTER TABLE `loket`
MODIFY `id_Loket` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
MODIFY `id_mahasiswa` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `petugasloket`
--
ALTER TABLE `petugasloket`
MODIFY `id_petugas` int(12) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `antrian`
--
ALTER TABLE `antrian`
ADD CONSTRAINT `FK_antrian1` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`) ON UPDATE CASCADE,
ADD CONSTRAINT `FK_antrian2` FOREIGN KEY (`id_loket`) REFERENCES `loket` (`id_Loket`) ON UPDATE CASCADE,
ADD CONSTRAINT `FK_antrian3` FOREIGN KEY (`id_jadwalAntrian`) REFERENCES `jadwalantrian` (`id_jadwalAntrian`) ON UPDATE CASCADE;

--
-- Constraints for table `jadwalantrian`
--
ALTER TABLE `jadwalantrian`
ADD CONSTRAINT `FK_jadwalAntrian1` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`) ON UPDATE CASCADE,
ADD CONSTRAINT `FK_jadwalAntrian2` FOREIGN KEY (`id_loket`) REFERENCES `loket` (`id_Loket`) ON UPDATE CASCADE;

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
ADD CONSTRAINT `FK_mahasiswa1` FOREIGN KEY (`level_id`) REFERENCES `login` (`level_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `petugasloket`
--
ALTER TABLE `petugasloket`
ADD CONSTRAINT `FK_petugasLoket1` FOREIGN KEY (`level_id`) REFERENCES `login` (`level_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
