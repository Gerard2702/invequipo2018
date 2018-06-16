-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.32-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para inventario_informatico
CREATE DATABASE IF NOT EXISTS `inventario_informatico` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `inventario_informatico`;

-- Volcando estructura para tabla inventario_informatico.departments
CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `centro_costo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ubicacion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla inventario_informatico.departments: ~24 rows (aproximadamente)
DELETE FROM `departments`;
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
INSERT INTO `departments` (`id`, `centro_costo`, `ubicacion`, `created_at`, `updated_at`) VALUES
	(1, '537209', '537209', '2018-06-12 08:33:17', '2018-06-15 15:02:15'),
	(2, '537205', '537205', '2018-06-12 08:34:31', '2018-06-15 18:25:32'),
	(3, '537210', '537210', '2018-06-12 12:23:12', '2018-06-12 12:23:12'),
	(4, '537B04', '537B04', '2018-06-12 12:25:09', '2018-06-14 19:45:34'),
	(5, '537208', '537208', '2018-06-14 19:31:59', '2018-06-14 19:45:19'),
	(6, '537802', '537802', '2018-06-14 19:52:58', '2018-06-14 19:52:58'),
	(7, '537001', '537001', '2018-06-15 18:54:13', '2018-06-15 20:05:29'),
	(8, '537101', '537101', '2018-06-15 19:03:18', '2018-06-15 19:03:18'),
	(9, '537107', '537107', '2018-06-15 19:04:12', '2018-06-15 19:04:12'),
	(10, '537B02', '537B02', '2018-06-15 19:09:20', '2018-06-15 19:09:20'),
	(11, '537303', '537303', '2018-06-15 19:20:00', '2018-06-15 19:20:00'),
	(12, '537206', '537206', '2018-06-15 22:09:53', '2018-06-16 02:19:29'),
	(13, '537207', '537207', '2018-06-15 22:10:41', '2018-06-15 22:10:41'),
	(14, '537307', '537307', '2018-06-15 22:14:57', '2018-06-15 22:14:57'),
	(15, '537A04', '537A04', '2018-06-15 22:17:59', '2018-06-15 22:17:59'),
	(16, '537302', '537302', '2018-06-15 22:22:36', '2018-06-15 22:22:36'),
	(18, '537308', '537308', '2018-06-15 22:30:26', '2018-06-15 22:30:26'),
	(19, '537B03', '537B03', '2018-06-15 22:31:56', '2018-06-15 22:31:56'),
	(20, '537A08', '537A08', '2018-06-15 22:34:09', '2018-06-15 22:34:09'),
	(21, '537103', '537103', '2018-06-15 22:36:32', '2018-06-15 22:36:32'),
	(22, '250304', '250304', '2018-06-15 22:39:34', '2018-06-16 03:10:26'),
	(23, '537102', '537102', '2018-06-15 22:39:58', '2018-06-15 22:39:58'),
	(24, '537109', '537109', '2018-06-15 22:41:45', '2018-06-15 22:41:45'),
	(27, '537006', 'Informatica', '2018-06-16 03:12:09', '2018-06-16 03:12:39');
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;

-- Volcando estructura para tabla inventario_informatico.direccions
CREATE TABLE IF NOT EXISTS `direccions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla inventario_informatico.direccions: ~0 rows (aproximadamente)
DELETE FROM `direccions`;
/*!40000 ALTER TABLE `direccions` DISABLE KEYS */;
/*!40000 ALTER TABLE `direccions` ENABLE KEYS */;

-- Volcando estructura para tabla inventario_informatico.domains
CREATE TABLE IF NOT EXISTS `domains` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla inventario_informatico.domains: ~0 rows (aproximadamente)
DELETE FROM `domains`;
/*!40000 ALTER TABLE `domains` DISABLE KEYS */;
/*!40000 ALTER TABLE `domains` ENABLE KEYS */;

-- Volcando estructura para tabla inventario_informatico.equipmentypes
CREATE TABLE IF NOT EXISTS `equipmentypes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla inventario_informatico.equipmentypes: ~0 rows (aproximadamente)
DELETE FROM `equipmentypes`;
/*!40000 ALTER TABLE `equipmentypes` DISABLE KEYS */;
/*!40000 ALTER TABLE `equipmentypes` ENABLE KEYS */;

-- Volcando estructura para tabla inventario_informatico.estates
CREATE TABLE IF NOT EXISTS `estates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla inventario_informatico.estates: ~0 rows (aproximadamente)
DELETE FROM `estates`;
/*!40000 ALTER TABLE `estates` DISABLE KEYS */;
/*!40000 ALTER TABLE `estates` ENABLE KEYS */;

-- Volcando estructura para tabla inventario_informatico.marcas
CREATE TABLE IF NOT EXISTS `marcas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla inventario_informatico.marcas: ~0 rows (aproximadamente)
DELETE FROM `marcas`;
/*!40000 ALTER TABLE `marcas` DISABLE KEYS */;
/*!40000 ALTER TABLE `marcas` ENABLE KEYS */;

-- Volcando estructura para tabla inventario_informatico.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla inventario_informatico.migrations: ~10 rows (aproximadamente)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2018_06_12_072920_create_departments_table', 1),
	(4, '2018_06_16_000610_create_equipmentypes_table', 2),
	(5, '2018_06_16_000728_create_miusers_table', 2),
	(6, '2018_06_16_012438_create_direccions_table', 2),
	(7, '2018_06_16_012457_create_domains_table', 2),
	(8, '2018_06_16_012513_create_estates_table', 2),
	(9, '2018_06_16_012527_create_marcas_table', 2),
	(10, '2018_06_16_012540_create_perifericos_table', 2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Volcando estructura para tabla inventario_informatico.miusers
CREATE TABLE IF NOT EXISTS `miusers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_department` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `miusers_id_department_foreign` (`id_department`),
  CONSTRAINT `miusers_id_department_foreign` FOREIGN KEY (`id_department`) REFERENCES `departments` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla inventario_informatico.miusers: ~0 rows (aproximadamente)
DELETE FROM `miusers`;
/*!40000 ALTER TABLE `miusers` DISABLE KEYS */;
/*!40000 ALTER TABLE `miusers` ENABLE KEYS */;

-- Volcando estructura para tabla inventario_informatico.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla inventario_informatico.password_resets: ~0 rows (aproximadamente)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Volcando estructura para tabla inventario_informatico.perifericos
CREATE TABLE IF NOT EXISTS `perifericos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla inventario_informatico.perifericos: ~0 rows (aproximadamente)
DELETE FROM `perifericos`;
/*!40000 ALTER TABLE `perifericos` DISABLE KEYS */;
/*!40000 ALTER TABLE `perifericos` ENABLE KEYS */;

-- Volcando estructura para tabla inventario_informatico.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla inventario_informatico.users: ~0 rows (aproximadamente)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Gerardo Orellana', 'gerard.gt2009@gmail.com', '$2y$10$lPrWJ0ytU6OPUpiN0MdxEOE4BB3q1RPI8/VMQafoFSb2kom2zLcYe', 'wOIx1nkInBSWbG6aSPOS01PXrY9TOxUGrPjD3Q43hvypog9M0Nqq0SHoEfUp', '2018-06-14 17:35:57', '2018-06-14 17:35:57');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
