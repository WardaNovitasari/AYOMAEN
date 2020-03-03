-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2019 at 03:22 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tempat`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_tempat`
--

CREATE TABLE IF NOT EXISTS `tb_tempat` (
`id` int(11) NOT NULL,
  `nama_tempat` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `lng` double DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tb_tempat`
--

INSERT INTO `tb_tempat` (`id`, `nama_tempat`, `lat`, `lng`) VALUES
(4, 'IT TELKOM', -7.4347887, 109.2499611),
(5, 'Rajawali Bioskop', -7.4327038, 109.2423173),
(6, 'Baturraden', -7.302423, 109.2228783),
(7, 'Rumah Anjas', 1.058929, 103.9349948),
(8, 'Sekretariat Tarung Derajat Satlat Baturaden', -7.378266, 109.241158);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_tempat`
--
ALTER TABLE `tb_tempat`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_tempat`
--
ALTER TABLE `tb_tempat`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
