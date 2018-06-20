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

-- Volcando estructura para tabla inventario_informatico.bitacoras
CREATE TABLE IF NOT EXISTS `bitacoras` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_equipo` int(10) unsigned DEFAULT NULL,
  `id_tipo_servicio` int(10) unsigned DEFAULT NULL,
  `descripcion` varchar(3000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bitacoras_id_equipo_foreign` (`id_equipo`),
  KEY `bitacoras_id_tipo_servicio_foreign` (`id_tipo_servicio`),
  CONSTRAINT `bitacoras_id_equipo_foreign` FOREIGN KEY (`id_equipo`) REFERENCES `equipment` (`id`),
  CONSTRAINT `bitacoras_id_tipo_servicio_foreign` FOREIGN KEY (`id_tipo_servicio`) REFERENCES `services` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla inventario_informatico.bitacoras: ~0 rows (aproximadamente)
DELETE FROM `bitacoras`;
/*!40000 ALTER TABLE `bitacoras` DISABLE KEYS */;
/*!40000 ALTER TABLE `bitacoras` ENABLE KEYS */;

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
	(22, '250304', '250304', '2018-06-15 22:39:34', '2018-06-18 16:28:10'),
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla inventario_informatico.direccions: ~2 rows (aproximadamente)
DELETE FROM `direccions`;
/*!40000 ALTER TABLE `direccions` DISABLE KEYS */;
INSERT INTO `direccions` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
	(1, 'Dinamica', '2018-06-17 19:00:47', '2018-06-17 19:00:48'),
	(2, 'Sin internet', '2018-06-17 19:01:01', '2018-06-17 19:01:02');
/*!40000 ALTER TABLE `direccions` ENABLE KEYS */;

-- Volcando estructura para tabla inventario_informatico.domains
CREATE TABLE IF NOT EXISTS `domains` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla inventario_informatico.domains: ~0 rows (aproximadamente)
DELETE FROM `domains`;
/*!40000 ALTER TABLE `domains` DISABLE KEYS */;
INSERT INTO `domains` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
	(1, 'isss.gob.sv', '2018-06-17 19:01:38', '2018-06-17 19:01:39');
/*!40000 ALTER TABLE `domains` ENABLE KEYS */;

-- Volcando estructura para tabla inventario_informatico.equipment
CREATE TABLE IF NOT EXISTS `equipment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_tipo_equipo` int(10) unsigned DEFAULT NULL,
  `id_nivel` int(10) unsigned DEFAULT NULL,
  `ubicacion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_centro_costo` int(10) unsigned DEFAULT NULL,
  `id_usuario` int(10) unsigned DEFAULT NULL,
  `numero_inventario` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_marca` int(10) unsigned DEFAULT NULL,
  `modelo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serie` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marca_modelo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `velocidad` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hdd` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_cd` int(10) unsigned DEFAULT NULL,
  `sistema_operativo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `licencia_sistema` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `office` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `licencia_office` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sistemas_institucionales` varchar(3000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otro_software` varchar(3000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre_equipo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_direccionip` int(10) unsigned DEFAULT NULL,
  `id_dominio` int(10) unsigned DEFAULT NULL,
  `fecha_adquisicion` date DEFAULT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  `id_estado_equipo` int(10) unsigned DEFAULT NULL,
  `observaciones` varchar(3000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `equipment_id_tipo_equipo_foreign` (`id_tipo_equipo`),
  KEY `equipment_id_nivel_foreign` (`id_nivel`),
  KEY `equipment_id_centro_costo_foreign` (`id_centro_costo`),
  KEY `equipment_id_usuario_foreign` (`id_usuario`),
  KEY `equipment_id_marca_foreign` (`id_marca`),
  KEY `equipment_id_cd_foreign` (`id_cd`),
  KEY `equipment_id_direccionip_foreign` (`id_direccionip`),
  KEY `equipment_id_dominio_foreign` (`id_dominio`),
  KEY `equipment_id_estado_equipo_foreign` (`id_estado_equipo`),
  CONSTRAINT `equipment_id_cd_foreign` FOREIGN KEY (`id_cd`) REFERENCES `perifericos` (`id`),
  CONSTRAINT `equipment_id_centro_costo_foreign` FOREIGN KEY (`id_centro_costo`) REFERENCES `departments` (`id`),
  CONSTRAINT `equipment_id_direccionip_foreign` FOREIGN KEY (`id_direccionip`) REFERENCES `direccions` (`id`),
  CONSTRAINT `equipment_id_dominio_foreign` FOREIGN KEY (`id_dominio`) REFERENCES `domains` (`id`),
  CONSTRAINT `equipment_id_estado_equipo_foreign` FOREIGN KEY (`id_estado_equipo`) REFERENCES `estates` (`id`),
  CONSTRAINT `equipment_id_marca_foreign` FOREIGN KEY (`id_marca`) REFERENCES `marcas` (`id`),
  CONSTRAINT `equipment_id_nivel_foreign` FOREIGN KEY (`id_nivel`) REFERENCES `nivels` (`id`),
  CONSTRAINT `equipment_id_tipo_equipo_foreign` FOREIGN KEY (`id_tipo_equipo`) REFERENCES `equipmentypes` (`id`),
  CONSTRAINT `equipment_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `miusers` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla inventario_informatico.equipment: ~9 rows (aproximadamente)
DELETE FROM `equipment`;
/*!40000 ALTER TABLE `equipment` DISABLE KEYS */;
INSERT INTO `equipment` (`id`, `id_tipo_equipo`, `id_nivel`, `ubicacion`, `id_centro_costo`, `id_usuario`, `numero_inventario`, `id_marca`, `modelo`, `serie`, `marca_modelo`, `velocidad`, `ram`, `hdd`, `id_cd`, `sistema_operativo`, `licencia_sistema`, `office`, `licencia_office`, `sistemas_institucionales`, `otro_software`, `nombre_equipo`, `id_direccionip`, `id_dominio`, `fecha_adquisicion`, `fecha_vencimiento`, `id_estado_equipo`, `observaciones`, `created_at`, `updated_at`) VALUES
	(1, 4, 10, '3º Nivel - Procedimientos de Cardiología Psicología', 6, 1, '1111', 1, '1111', '111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-18', '2018-06-18', 1, NULL, '2018-06-18 01:54:31', '2018-06-18 01:54:31'),
	(2, 1, 19, 'sssssss', 1, 6, '23123123', 2, '2', '222', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-18', '2018-06-18', 2, NULL, '2018-06-18 02:06:52', '2018-06-18 02:06:52'),
	(3, 2, 14, 'Informatica', 2, 2, '2222', 1, 'adadasd', '111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-05-29', '2018-06-18', 4, NULL, '2018-06-18 02:18:16', '2018-06-18 02:18:16'),
	(4, 2, 14, 'Informatica', 2, 2, '2222', 1, 'adadasd', '111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-05-29', '2018-06-18', 4, NULL, '2018-06-18 02:20:35', '2018-06-18 02:20:35'),
	(5, 2, 14, '3º Nivel - Procedimientos de Cardiología Psicología', 2, 5, '2222', 1, 'adadasd', '222', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-18', '2018-06-18', 4, NULL, '2018-06-18 02:21:49', '2018-06-18 02:21:49'),
	(6, 2, 17, '3º Nivel - Procedimientos de Cardiología Psicología', 1, 2, '2323', 1, 'dad', '222', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-18', '2018-06-18', 2, NULL, '2018-06-18 02:23:04', '2018-06-18 02:23:04'),
	(7, 2, 17, '3º Nivel - Procedimientos de Cardiología Psicología', 1, 2, '2323', 1, 'dad', '222', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-18', '2018-06-18', 2, NULL, '2018-06-18 02:23:33', '2018-06-18 02:23:33'),
	(8, 3, 17, '3º Nivel - Procedimientos de Cardiología Psicología', 2, 2, '231231323', 2, '1111', '111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-19', '2018-06-19', 2, NULL, '2018-06-19 16:51:38', '2018-06-19 16:51:38'),
	(9, 2, 17, 'Mi ubicacion', 2, 6, '2222', 2, 'mio', 'mio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-19', '2018-06-19', 4, 'Necesita disco duro', '2018-06-19 16:53:36', '2018-06-19 16:53:36');
/*!40000 ALTER TABLE `equipment` ENABLE KEYS */;

-- Volcando estructura para tabla inventario_informatico.equipmentypes
CREATE TABLE IF NOT EXISTS `equipmentypes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla inventario_informatico.equipmentypes: ~4 rows (aproximadamente)
DELETE FROM `equipmentypes`;
/*!40000 ALTER TABLE `equipmentypes` DISABLE KEYS */;
INSERT INTO `equipmentypes` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
	(1, 'Laptop', '2018-06-17 18:59:55', '2018-06-17 18:59:56'),
	(2, 'Escaner', '2018-06-17 19:00:05', '2018-06-17 19:00:06'),
	(3, 'Teclado', '2018-06-17 19:00:25', '2018-06-17 19:00:26'),
	(4, 'Computadora de Escritorio', NULL, NULL);
/*!40000 ALTER TABLE `equipmentypes` ENABLE KEYS */;

-- Volcando estructura para tabla inventario_informatico.estates
CREATE TABLE IF NOT EXISTS `estates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla inventario_informatico.estates: ~4 rows (aproximadamente)
DELETE FROM `estates`;
/*!40000 ALTER TABLE `estates` DISABLE KEYS */;
INSERT INTO `estates` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
	(1, 'Optimo', '2018-06-17 18:58:05', '2018-06-17 18:58:06'),
	(2, 'Bueno', '2018-06-17 18:58:23', '2018-06-17 18:58:24'),
	(3, 'Regular', '2018-06-17 18:58:32', '2018-06-17 18:58:33'),
	(4, 'Dañado', '2018-06-17 18:58:46', '2018-06-17 18:58:47');
/*!40000 ALTER TABLE `estates` ENABLE KEYS */;

-- Volcando estructura para tabla inventario_informatico.marcas
CREATE TABLE IF NOT EXISTS `marcas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla inventario_informatico.marcas: ~3 rows (aproximadamente)
DELETE FROM `marcas`;
/*!40000 ALTER TABLE `marcas` DISABLE KEYS */;
INSERT INTO `marcas` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
	(1, 'DELL', '2018-06-17 19:02:02', '2018-06-17 19:02:03'),
	(2, 'HP', '2018-06-17 19:02:10', '2018-06-17 19:02:11'),
	(3, 'EPSON', '2018-06-17 19:02:17', '2018-06-17 19:02:18');
/*!40000 ALTER TABLE `marcas` ENABLE KEYS */;

-- Volcando estructura para tabla inventario_informatico.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla inventario_informatico.migrations: ~12 rows (aproximadamente)
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
	(10, '2018_06_16_012540_create_perifericos_table', 2),
	(11, '2018_06_17_183942_create_nivels_table', 3),
	(12, '2018_06_17_184845_create_equipment_table', 3),
	(13, '2018_06_19_175928_create_services_table', 4),
	(14, '2018_06_19_175956_create_bitacoras_table', 5);
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla inventario_informatico.miusers: ~3 rows (aproximadamente)
DELETE FROM `miusers`;
/*!40000 ALTER TABLE `miusers` DISABLE KEYS */;
INSERT INTO `miusers` (`id`, `nombre`, `id_department`, `created_at`, `updated_at`) VALUES
	(1, 'Martiza Aquino', 12, '2018-06-17 19:02:43', '2018-06-17 19:02:44'),
	(2, 'Reina Chávez', 7, '2018-06-17 19:03:45', '2018-06-17 19:03:46'),
	(5, 'Cesar Flores', 8, '2018-06-17 19:04:12', '2018-06-17 19:04:13'),
	(6, ' Lic. Alba Yanira Paz', 6, '2018-06-18 01:33:04', '2018-06-18 01:33:05');
/*!40000 ALTER TABLE `miusers` ENABLE KEYS */;

-- Volcando estructura para tabla inventario_informatico.nivels
CREATE TABLE IF NOT EXISTS `nivels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla inventario_informatico.nivels: ~18 rows (aproximadamente)
DELETE FROM `nivels`;
/*!40000 ALTER TABLE `nivels` DISABLE KEYS */;
INSERT INTO `nivels` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
	(1, '7 Nivel - Consulta Externa', '2018-06-17 19:04:58', '2018-06-17 19:04:59'),
	(2, '6 Nivel - Administrativo', '2018-06-17 19:05:13', '2018-06-17 19:05:14'),
	(3, '6 Nivel - Consulta Externa', '2018-06-17 19:05:27', '2018-06-17 19:05:28'),
	(4, '5 Nivel - Consulta Externa', '2018-06-17 19:05:43', '2018-06-17 19:05:44'),
	(5, '5 Nivel - Rayos X', '2018-06-17 19:05:57', '2018-06-17 19:05:58'),
	(6, '4 Nivel - Consulta Externa', '2018-06-17 19:06:08', '2018-06-17 19:06:09'),
	(7, '4 Nivel - Procedimientos', '2018-06-17 19:06:18', '2018-06-17 19:06:20'),
	(8, '3 Nivel - Punto Seguro', '2018-06-17 19:04:58', '2018-06-17 19:06:32'),
	(9, '3 Nivel - Farmacia', '2018-06-17 19:07:05', '2018-06-17 19:07:06'),
	(10, '3 Nivel - Procedimientos', '2018-06-17 19:07:18', '2018-06-17 19:07:19'),
	(11, '2 Nivel - Laboratorio Clínico', '2018-06-17 19:07:30', '2018-06-17 19:07:31'),
	(12, '2 Nivel - Procedimientos', '2018-06-17 19:07:45', '2018-06-17 19:07:46'),
	(13, '1 Nivel - Bodega de Laboratorio Clínico', '2018-06-17 19:08:15', '2018-06-17 19:08:16'),
	(14, '1 Nivel - Almacén de Artículos Generales e Insumos', '2018-06-17 19:08:27', '2018-06-17 19:08:28'),
	(15, '1 Nivel - Central de Esterilización', '2018-06-17 19:08:39', '2018-06-17 19:08:39'),
	(16, '1 Nivel - Servicios Generales', '2018-06-17 19:08:49', '2018-06-17 19:08:50'),
	(17, '1 Nivel - Archivo Clínico', '2018-06-17 19:08:59', '2018-06-17 19:09:00'),
	(18, '1 Nivel - Mantenimiento', '2018-06-17 19:09:09', '2018-06-17 19:09:10'),
	(19, '1 Nivel - Informática', '2018-06-17 19:09:18', '2018-06-17 19:09:19'),
	(20, '7 Nivel -Administrativo', '2018-06-17 19:09:27', '2018-06-17 19:09:28');
/*!40000 ALTER TABLE `nivels` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla inventario_informatico.perifericos: ~2 rows (aproximadamente)
DELETE FROM `perifericos`;
/*!40000 ALTER TABLE `perifericos` DISABLE KEYS */;
INSERT INTO `perifericos` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
	(1, 'CD', '2018-06-17 19:09:52', '2018-06-17 19:09:53'),
	(2, 'DVD', '2018-06-17 19:09:57', '2018-06-17 19:09:58');
/*!40000 ALTER TABLE `perifericos` ENABLE KEYS */;

-- Volcando estructura para tabla inventario_informatico.services
CREATE TABLE IF NOT EXISTS `services` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla inventario_informatico.services: ~0 rows (aproximadamente)
DELETE FROM `services`;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
/*!40000 ALTER TABLE `services` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla inventario_informatico.users: ~2 rows (aproximadamente)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Gerardo Orellana', 'gerard.gt2009@gmail.com', '$2y$10$lPrWJ0ytU6OPUpiN0MdxEOE4BB3q1RPI8/VMQafoFSb2kom2zLcYe', 'A4D9RrtAeZNPwmELqCMnclILj4eGSi5caRY7j7HpeFv4UOmivKtBIYvkVLY4', '2018-06-14 17:35:57', '2018-06-14 17:35:57'),
	(2, 'Sergio Leon', 'sergio.leon@isss.com.sv', '$2y$10$jFFZ..eRt1EnI6VkpRI6/utpTE/w4WtBxOxfxrD701jsXFQPyVp92', '3MAjgKeAc2bKj3w3VFBMulukjroIm4MTJK8vvyAayP1pFeno1k7gqweNIHl8', '2018-06-16 03:20:34', '2018-06-16 03:20:34');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
