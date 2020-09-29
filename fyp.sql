-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for newsystem
CREATE DATABASE IF NOT EXISTS `newsystem` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `newsystem`;

-- Dumping structure for table newsystem.bookrequest
CREATE TABLE IF NOT EXISTS `bookrequest` (
  `ownerid` int(11) DEFAULT NULL,
  `idbbok` int(11) DEFAULT NULL,
  `requestid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table newsystem.bookrequest: ~0 rows (approximately)
/*!40000 ALTER TABLE `bookrequest` DISABLE KEYS */;
/*!40000 ALTER TABLE `bookrequest` ENABLE KEYS */;

-- Dumping structure for table newsystem.orderbook
CREATE TABLE IF NOT EXISTS `orderbook` (
  `idbook` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(50) NOT NULL DEFAULT '0',
  `ownerid` int(11) NOT NULL DEFAULT '0',
  `isbn` varchar(50) DEFAULT NULL,
  `bookname` varchar(50) DEFAULT NULL,
  `bookcodesubject` varchar(50) DEFAULT NULL,
  `bookcover` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`idbook`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- Dumping data for table newsystem.orderbook: ~22 rows (approximately)
/*!40000 ALTER TABLE `orderbook` DISABLE KEYS */;
INSERT INTO `orderbook` (`idbook`, `status`, `ownerid`, `isbn`, `bookname`, `bookcodesubject`, `bookcover`) VALUES
	(1, '0', 2, '232133', 'sejarah', 'bws124', NULL),
	(2, '0', 2, '232133', 'sejarah', 'bws124', NULL),
	(3, '0', 0, '123', 'bm', 'bws12445', NULL),
	(4, '0', 0, '123', 'bm', 'bws12445', NULL),
	(5, '0', 0, '232133', 'bm', '123ed', NULL),
	(6, '0', 0, '232133', 'bm', 'bws124', NULL),
	(7, '0', 0, '12321', 'sejarah', 'bws12445', NULL),
	(8, '0', 0, '12321', 'sejarah', 'bws12445', NULL),
	(9, '0', 0, '12321', 'sejarah', 'bws12445', NULL),
	(10, '0', 0, '123', 'sejarah', 'bws12445', NULL),
	(11, '0', 0, '123', 'sejarah', 'bws12445', NULL),
	(12, '0', 0, '232133', 'sejarah', 'bws124', NULL),
	(13, '0', 0, '232133', 'sejarah', 'bws124', NULL),
	(14, '0', 0, '232133', 'sejarah', 'bws124', NULL),
	(15, '0', 0, '12321', 'bm', 'bws12445', NULL),
	(16, '0', 0, '12321', 'bm', 'bws124', NULL),
	(17, '0', 0, '12321', 'bm', 'bws124', NULL),
	(18, '0', 0, '125', 'latihan', 'qwe23', NULL),
	(19, '0', 0, '125', 'latihan', 'qwe23', NULL),
	(20, '0', 0, '12321', 'sejarah', 'bws124', NULL),
	(21, '0', 0, '232133', 'sejarah', 'bws124', NULL),
	(22, '0', 0, '232133', 'latihan', 'bws124', '03-09-2020-10774e9a568a1541c49a847ec043cc3e1579855169-lg.jpg');
/*!40000 ALTER TABLE `orderbook` ENABLE KEYS */;

-- Dumping structure for table newsystem.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `accesslevel` varchar(50) DEFAULT NULL,
  `imagefile` varchar(50) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table newsystem.user: ~2 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `email`, `username`, `password`, `accesslevel`, `imagefile`, `contact`) VALUES
	(0, 'abu@gmail.com', 'abu', '123', 'user', NULL, NULL),
	(1, 'ali@gmail.com', 'ali', '202cb962ac59075b964b07152d234b70', 'admin', NULL, NULL),
	(2, 'exp@gmail.com', 'ahmad', NULL, 'user', NULL, NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
