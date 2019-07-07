-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 26, 2019 at 01:14 AM
-- Server version: 5.1.37
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tb_ujian`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_asuransi`
--

CREATE TABLE IF NOT EXISTS `jenis_asuransi` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `jenis_asuransi` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `jenis_asuransi`
--

INSERT INTO `jenis_asuransi` (`id`, `jenis_asuransi`) VALUES
(1, 'Asuransi jiwa'),
(2, 'Asuransi umum');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_benefit`
--

CREATE TABLE IF NOT EXISTS `jenis_benefit` (
  `id_benefit` smallint(6) NOT NULL AUTO_INCREMENT,
  `jenis_benefit` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_benefit`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `jenis_benefit`
--

INSERT INTO `jenis_benefit` (`id_benefit`, `jenis_benefit`) VALUES
(1, 'Meninggal'),
(2, 'Cacat Tetap'),
(3, 'PHK');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_perusahaan`
--

CREATE TABLE IF NOT EXISTS `jenis_perusahaan` (
  `id_perusahaan` smallint(6) NOT NULL AUTO_INCREMENT,
  `jenis_perusahaan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_perusahaan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `jenis_perusahaan`
--

INSERT INTO `jenis_perusahaan` (`id_perusahaan`, `jenis_perusahaan`) VALUES
(1, 'Bank'),
(2, 'Non Bank');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_up`
--

CREATE TABLE IF NOT EXISTS `jenis_up` (
  `title_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `jenis_up` varchar(50) NOT NULL,
  PRIMARY KEY (`title_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `jenis_up`
--

INSERT INTO `jenis_up` (`title_id`, `jenis_up`) VALUES
(1, 'Menurun'),
(2, 'Tetap');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE IF NOT EXISTS `tb_transaksi` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(30) NOT NULL,
  `title_id` smallint(6) NOT NULL,
  `id` smallint(6) NOT NULL,
  `id_benefit` smallint(6) NOT NULL,
  `id_perusahaan` smallint(6) NOT NULL,
  PRIMARY KEY (`emp_id`),
  KEY `title_id` (`title_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=94 ;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`emp_id`, `f_name`, `title_id`, `id`, `id_benefit`, `id_perusahaan`) VALUES
(89, 'AJK', 1, 1, 1, 1),
(90, 'AJK', 2, 2, 2, 2),
(91, 'AJK', 2, 1, 3, 1),
(92, 'AJK', 1, 2, 2, 2),
(93, 'AJK', 2, 1, 1, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `employee_title` FOREIGN KEY (`title_id`) REFERENCES `jenis_up` (`title_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
