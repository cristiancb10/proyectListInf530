-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for proyectolist
CREATE DATABASE IF NOT EXISTS `proyectolist` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `proyectolist`;

-- Dumping structure for table proyectolist.task
CREATE TABLE IF NOT EXISTS `task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) NOT NULL,
  `due_day` date DEFAULT NULL,
  `completed` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id_user` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `task_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=latin1;

-- Dumping data for table proyectolist.task: ~35 rows (approximately)
/*!40000 ALTER TABLE `task` DISABLE KEYS */;
REPLACE INTO `task` (`id`, `description`, `due_day`, `completed`, `created_at`, `id_user`, `updated_at`) VALUES
	(6, 'jnoinlknkl', '2025-04-04', 0, '2025-04-24 02:08:35', NULL, '2025-05-01 03:35:12'),
	(7, 'bggkkbh', '2025-04-04', 0, '2025-04-24 02:09:49', NULL, '2025-05-01 03:35:12'),
	(8, 'nuevo1', '2025-04-05', 0, '2025-04-24 02:10:41', NULL, '2025-05-01 03:35:12'),
	(9, 'nuevo2', '2025-04-03', 0, '2025-04-24 02:12:23', NULL, '2025-05-01 03:35:12'),
	(10, 'vdvdvdsv', '2025-04-03', 0, '2025-04-24 02:16:36', NULL, '2025-05-01 03:35:12'),
	(11, 'gngfngfng', '2025-04-04', 0, '2025-04-24 02:27:22', NULL, '2025-05-01 03:35:12'),
	(12, 'hvgfcgvhjkb', '2025-04-03', 0, '2025-04-24 02:29:30', NULL, '2025-05-01 03:35:12'),
	(13, 'hvgfcgvhjkb', '2025-04-03', 0, '2025-04-24 02:30:26', NULL, '2025-05-01 03:35:12'),
	(14, 'nuevo6', '2025-04-03', 0, '2025-04-24 02:34:13', NULL, '2025-05-01 03:35:12'),
	(15, 'ngfngfn', '2025-04-04', 0, '2025-04-24 02:37:51', NULL, '2025-05-01 03:35:12'),
	(16, 'vdvdsvdsds nuevo', '2025-04-04', 0, '2025-04-24 02:38:56', NULL, '2025-05-01 03:35:12'),
	(17, 'vovo', '2025-04-13', 0, '2025-04-24 02:40:10', NULL, '2025-05-01 03:35:12'),
	(18, 'vdvds', '2025-04-03', 0, '2025-04-24 02:40:47', NULL, '2025-05-01 03:35:12'),
	(19, 'fdvdsvd', '2025-04-04', 0, '2025-04-24 02:47:26', NULL, '2025-05-01 03:35:12'),
	(20, 'bdfbdfd', '2025-04-04', 0, '2025-04-24 02:50:36', NULL, '2025-05-01 03:35:12'),
	(21, 'bdfbdfd', '2025-04-04', 0, '2025-04-24 02:51:20', NULL, '2025-05-01 03:35:12'),
	(22, 'bdfbdfd', '2025-04-04', 0, '2025-04-24 02:51:59', NULL, '2025-05-01 03:35:12'),
	(23, 'vdvdsdsvd', '2025-04-04', 0, '2025-04-24 02:52:06', NULL, '2025-05-01 03:35:12'),
	(24, 'vdvdsdsvd', '2025-04-04', 0, '2025-04-24 02:55:03', NULL, '2025-05-01 03:35:12'),
	(25, 'vdsvdds', '2025-04-18', 0, '2025-04-24 02:55:08', NULL, '2025-05-01 03:35:12'),
	(26, 'vdsvdds', '2025-04-18', 0, '2025-04-24 02:55:21', NULL, '2025-05-01 03:35:12'),
	(27, 'vddvdsb', '2025-04-04', 0, '2025-04-24 02:55:30', NULL, '2025-05-01 03:35:12'),
	(28, 'vddvdsb', '2025-04-04', 0, '2025-04-24 02:56:33', NULL, '2025-05-01 03:35:12'),
	(29, 'bsdbsd', '2025-04-03', 0, '2025-04-24 02:56:38', NULL, '2025-05-01 03:35:12'),
	(30, 'bsdbsd', '2025-04-03', 0, '2025-04-24 02:57:27', NULL, '2025-05-01 03:35:12'),
	(31, 'vdsvd', '2025-04-02', 0, '2025-04-24 02:57:32', NULL, '2025-05-01 03:35:12'),
	(32, 'vdsvd', '2025-04-02', 0, '2025-04-24 03:00:47', NULL, '2025-05-01 03:35:12'),
	(33, 'gdsdsgs', '2025-04-04', 0, '2025-04-24 03:00:58', NULL, '2025-05-01 03:35:12'),
	(34, 'gdsdsgs', '2025-04-04', 0, '2025-04-24 03:03:23', NULL, '2025-05-01 03:35:12'),
	(45, 'dvdsvdvdsvd', '2025-04-04', 0, '2025-04-24 03:34:33', NULL, '2025-05-01 03:35:12'),
	(46, 'nueva 20202', '2025-04-04', 0, '2025-04-24 03:37:07', NULL, '2025-05-01 03:35:12');
/*!40000 ALTER TABLE `task` ENABLE KEYS */;

-- Dumping structure for table proyectolist.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Dumping data for table proyectolist.users: ~3 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
	(11, 'cristian', 'cristiancocabjn@gmail.com', '123jkluio', '2025-05-01 03:57:08', '2025-05-01 03:57:08'),
	(12, 'koko', 'yoi@gmail.vom', '123456iop', '2025-05-01 03:57:22', '2025-05-01 03:57:22'),
	(13, 'poli', 'ypl@gmail.com', '1246poiu', '2025-05-01 03:57:41', '2025-05-01 03:57:41');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
