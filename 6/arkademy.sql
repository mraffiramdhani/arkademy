-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.6-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for arkademy
CREATE DATABASE IF NOT EXISTS `arkademy` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `arkademy`;

-- Dumping structure for table arkademy.cashier
CREATE TABLE IF NOT EXISTS `cashier` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table arkademy.cashier: ~0 rows (approximately)
/*!40000 ALTER TABLE `cashier` DISABLE KEYS */;
INSERT IGNORE INTO `cashier` (`id`, `name`) VALUES
	(1, 'Pevita Pearce'),
	(2, 'Raisa Andriana'),
	(3, 'M.Raffi Ramdhani');
/*!40000 ALTER TABLE `cashier` ENABLE KEYS */;

-- Dumping structure for table arkademy.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table arkademy.category: ~0 rows (approximately)
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT IGNORE INTO `category` (`id`, `name`) VALUES
	(1, 'Food'),
	(2, 'Drink');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;

-- Dumping structure for table arkademy.product
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `id_category` int(10) NOT NULL,
  `id_cashier` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_product_category` (`id_category`),
  KEY `FK_product_cashier` (`id_cashier`),
  CONSTRAINT `FK_product_cashier` FOREIGN KEY (`id_cashier`) REFERENCES `cashier` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_product_category` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table arkademy.product: ~0 rows (approximately)
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT IGNORE INTO `product` (`id`, `name`, `price`, `id_category`, `id_cashier`) VALUES
	(1, 'Latte', 10000.00, 2, 1),
	(2, 'Cake', 20000.00, 1, 2),
	(3, 'Brownies', 50000.00, 1, 3);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
