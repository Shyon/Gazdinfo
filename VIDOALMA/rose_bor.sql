-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2014 at 01:18 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bor`
--

-- --------------------------------------------------------

--
-- Table structure for table `rose_bor`
--

CREATE TABLE IF NOT EXISTS `rose_bor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nev` varchar(100) DEFAULT NULL,
  `tipus` varchar(20) DEFAULT NULL,
  `ar` varchar(50) DEFAULT NULL,
  `alkoholtartalom` varchar(50) DEFAULT NULL,
  `urtartalom` varchar(50) DEFAULT NULL,
  `evjarat` year(4) DEFAULT NULL,
  `borvidek` varchar(50) DEFAULT NULL,
  `darab` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `rose_bor`
--

INSERT INTO `rose_bor` (`id`, `nev`, `tipus`, `ar`, `alkoholtartalom`, `urtartalom`, `evjarat`, `borvidek`, `darab`) VALUES
(1, 'Kékfrankos Rosé', 'száraz', '1450', '11', '0,75', 2014, 'Sopron', '40'),
(2, 'Vinatus Dunántúli Rosé', 'száraz', '1200', '11,5', '0,75', 2013, 'Dunántúli', '20'),
(3, 'Kékfrankos-Merlot Rosé', 'száraz', '1350', '12', '0,75', 2014, 'Eger', '45'),
(4, 'Polgár Zoltán Villányi Rosé', 'száraz', '1300', '11', '0,75', 2014, 'Villány', '37'),
(5, 'Mészáros Pál Szekszárdi Pinot Noir Rosé', 'száraz', '1400', '13', '0,75', 2014, 'Szekszárdi', '35');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
