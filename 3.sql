-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               10.7.3-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for social
DROP DATABASE IF EXISTS `social`;
CREATE DATABASE IF NOT EXISTS `social` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `social`;

-- Dumping structure for table social.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(25) DEFAULT NULL,
  `PP` varchar(255) DEFAULT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `active_now` varchar(50) DEFAULT NULL,
  `psw` varchar(1024) DEFAULT NULL,
  `BgColor` varchar(255) DEFAULT NULL,
  `BoxColor` varchar(255) DEFAULT NULL,
  `TextColor` varchar(255) DEFAULT NULL,
  `HoverColor` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table social.users: ~1 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `user_id`, `PP`, `user_name`, `active_now`, `psw`, `BgColor`, `BoxColor`, `TextColor`, `HoverColor`) VALUES
	(1, 1191, '16544738202021-12-09_16.58.02.png', 'nub', 'logged in', '$2y$10$hLG0lGr0HCjV6DM2HZo9Z.3WcbS.qz1ynuIy9vJhl9kFM8iWZNy8q', '#ffffff', '#dcdcdc', '#000000', '#ff0000');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table social.users_friends
DROP TABLE IF EXISTS `users_friends`;
CREATE TABLE IF NOT EXISTS `users_friends` (
  `friendID_fk` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `myID_fk` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table social.users_friends: ~0 rows (approximately)
/*!40000 ALTER TABLE `users_friends` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_friends` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
