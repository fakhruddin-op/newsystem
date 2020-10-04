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

-- Dumping structure for table newsystem.forgotpassword
CREATE TABLE IF NOT EXISTS `forgotpassword` (
  `reset_id` int(50) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `reser_token` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`reset_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table newsystem.forgotpassword: ~0 rows (approximately)
/*!40000 ALTER TABLE `forgotpassword` DISABLE KEYS */;
/*!40000 ALTER TABLE `forgotpassword` ENABLE KEYS */;

-- Dumping structure for table newsystem.orderbook
CREATE TABLE IF NOT EXISTS `orderbook` (
  `idbook` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(50) NOT NULL DEFAULT '0',
  `ownerid` int(11) NOT NULL DEFAULT '0',
  `price` varchar(50) DEFAULT NULL,
  `bookname` varchar(50) DEFAULT NULL,
  `bookcodesubject` varchar(50) DEFAULT NULL,
  `bookcover` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`idbook`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- Dumping data for table newsystem.orderbook: ~15 rows (approximately)
/*!40000 ALTER TABLE `orderbook` DISABLE KEYS */;
INSERT INTO `orderbook` (`idbook`, `status`, `ownerid`, `price`, `bookname`, `bookcodesubject`, `bookcover`) VALUES
	(2, '0', 3, '123', 'bm', 'bws124', NULL),
	(3, '0', 3, '123', 'bm', 'bws124', NULL),
	(4, '0', 0, '567', 'perd', 'mk', NULL),
	(5, '0', 0, '232133', 'sejarah', 'bws124', NULL),
	(6, '0', 0, '232133', 'sejarah', 'bws124', NULL),
	(7, '0', 0, '232133', 'sejarah', 'bws124', NULL),
	(8, '0', 0, '232133', 'sejarah', 'bws124', NULL),
	(9, '0', 0, '232133', 'sejarah', 'bws124', NULL),
	(10, '0', 0, '232133', 'sejarah', 'bws124', NULL),
	(11, '0', 0, '232133', 'sejarah', 'bws124', NULL),
	(12, '0', 0, '232133', 'sejarah', 'bws124', NULL),
	(13, '0', 0, '232133', 'sejarah', '123ed', NULL),
	(14, '0', 0, '12321', 'bm', 'bws124', NULL),
	(15, '0', 0, '123456', 'bm', 'll', NULL),
	(16, '0', 3, '232133', 'sejarah', 'bws124', NULL),
	(17, '0', 4, '232133', 'sejarah', 'bws124', NULL),
	(18, '0', 6, '232133', 'sejarah', 'bws124', NULL),
	(19, '0', 3, '1234567', 'sejarah', 'rty34', NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table newsystem.user: ~6 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `email`, `username`, `password`, `accesslevel`, `imagefile`, `contact`) VALUES
	(0, 'abu@gmail.com', 'abu', '202cb962ac59075b964b07152d234b70', 'public', NULL, NULL),
	(1, 'ali@gmail.com', 'ali', '202cb962ac59075b964b07152d234b70', 'admin', NULL, NULL),
	(2, 'exp@gmail.com', 'ahmad', '123', 'user', NULL, '1234'),
	(3, 'samsul@gmail.com', 'samsul', '81dc9bdb52d04dc20036dbd8313ed055', 'seller', NULL, NULL),
	(4, 'mustapa@gmail.com', 'mustapa', '81dc9bdb52d04dc20036dbd8313ed055', 'seller', NULL, ''),
	(5, 'jebat@gmail.com', 'jebat', '81dc9bdb52d04dc20036dbd8313ed055', 'seller', NULL, ''),
	(6, 'aiman@gmail.com', 'aiman', '81dc9bdb52d04dc20036dbd8313ed055', 'seller', NULL, '912345567'),
	(7, 'kamal@gmail.com', 'kamal', '81dc9bdb52d04dc20036dbd8313ed055', 'seller', NULL, '0123456'),
	(8, 'lolo@gmail.com', 'lolo', '81dc9bdb52d04dc20036dbd8313ed055', 'seller', NULL, '0195664556');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
