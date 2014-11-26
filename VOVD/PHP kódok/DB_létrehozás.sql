CREATE DATABASE IF NOT EXISTS `Webkereses` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `Webkereses`;

CREATE TABLE IF NOT EXISTS `Felhasznalo` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nev` varchar(50) NOT NULL,
  `felhasznalo` varchar(50) NOT NULL,
  `jelszo` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
)

CREATE TABLE IF NOT EXISTS `Kereses` (
  `kerid` int(10) NOT NULL AUTO_INCREMENT,
  `felhasznalo` varchar(50) NOT NULL,
  `url` varchar(500) NOT NULL,
  `kerszov` varchar(30) NOT NULL,
  `datum` date,
  PRIMARY KEY (`kerid`)
)
