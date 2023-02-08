-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.30 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Volcando datos para la tabla bikeroll.courses: ~2 rows (aproximadamente)
REPLACE INTO `courses` (`id`, `title`, `url`, `description`, `elevation`, `map_image`, `max_participants`, `km`, `date`, `start_point`, `poster_url`, `sponsorship_price`, `photos_id`, `created_at`, `updated_at`) VALUES
	(25, 'Cursaje con imagen!', 'urlpersonalizada', 'descripcion', 123, '1675776791.jpg', 20, 20, '2023-09-02 12:12:00', 'Vallcarca', 'poster.com', 120, '1', '2023-02-07 12:33:11', '2023-02-07 13:03:12');

-- Volcando datos para la tabla bikeroll.failed_jobs: ~0 rows (aproximadamente)

-- Volcando datos para la tabla bikeroll.migrations: ~0 rows (aproximadamente)
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(6, '2014_10_12_000000_create_users_table', 1),
	(7, '2014_10_12_100000_create_password_resets_table', 1),
	(8, '2019_08_19_000000_create_failed_jobs_table', 1),
	(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(10, '2023_02_01_044249_create_projects_table', 1),
	(11, '2023_02_03_083215_create_permission_tables', 1),
	(13, '2023_02_03_115356_create_courses', 2),
	(17, '2023_02_03_084024_create_roles', 3),
	(18, '2023_02_07_113510_roles', 3),
	(19, '2023_02_07_113622_fresh', 3),
	(20, '2023_02_07_113747_2023_02_03_084024_create_roles', 3),
	(21, 'create_courses', 3);

-- Volcando datos para la tabla bikeroll.model_has_permissions: ~0 rows (aproximadamente)

-- Volcando datos para la tabla bikeroll.model_has_roles: ~1 rows (aproximadamente)
REPLACE INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(1, 'App\\Models\\User', 1);

-- Volcando datos para la tabla bikeroll.password_resets: ~0 rows (aproximadamente)

-- Volcando datos para la tabla bikeroll.permissions: ~0 rows (aproximadamente)

-- Volcando datos para la tabla bikeroll.personal_access_tokens: ~0 rows (aproximadamente)

-- Volcando datos para la tabla bikeroll.projects: ~0 rows (aproximadamente)

-- Volcando datos para la tabla bikeroll.roles: ~1 rows (aproximadamente)
REPLACE INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'web', '2023-02-07 10:37:06', '2023-02-07 10:37:06');

-- Volcando datos para la tabla bikeroll.role_has_permissions: ~0 rows (aproximadamente)

-- Volcando datos para la tabla bikeroll.users: ~1 rows (aproximadamente)
REPLACE INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Aleksandr Baikalov', 'asederado@gmail.com', NULL, '$2y$10$qxGgOKZvxOcR2NRCKVvn/eQUicq8o1oaG3mnLaJ017txtmxpVt.1m', NULL, '2023-02-07 10:37:39', '2023-02-07 10:37:39');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
