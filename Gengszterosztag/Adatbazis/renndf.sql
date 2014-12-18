-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Hoszt: 127.0.0.1
-- Létrehozás ideje: 2014. Dec 18. 08:58
-- Szerver verzió: 5.6.17
-- PHP verzió: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Adatbázis: `renndf`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `po_products`
--

CREATE TABLE IF NOT EXISTS `po_products` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `pname` varchar(50) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `purchase` int(11) NOT NULL,
  `memo` varchar(255) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- A tábla adatainak kiíratása `po_products`
--

INSERT INTO `po_products` (`sid`, `pname`, `purchase`, `memo`) VALUES
(1, 'Bolognai spagetti', 1050, ''),
(2, 'Babgulyás', 570, ''),
(3, 'Pizza', 850, ''),
(4, 'Rántott hús menü', 1250, ''),
(5, 'Halászlé', 480, ''),
(6, 'Gyros', 1390, ''),
(7, 'Hamburger', 800, ''),
(8, 'Saláta', 350, '');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `po_users`
--

CREATE TABLE IF NOT EXISTS `po_users` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `mail` varchar(30) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `pwd` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- A tábla adatainak kiíratása `po_users`
--

INSERT INTO `po_users` (`sid`, `login`, `mail`, `pwd`) VALUES
(1, 'admin', 'awdwa@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'hhjhgjh', '', 'bfd59291e825b5f2bbf1eb76569f8fe7'),
(3, 'Filkor', '', 'bfd59291e825b5f2bbf1eb76569f8fe7');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
