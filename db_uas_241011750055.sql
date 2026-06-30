-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for db_uas_241011750055
CREATE DATABASE IF NOT EXISTS `db_uas_241011750055` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_uas_241011750055`;

-- Dumping structure for table db_uas_241011750055.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_uas_241011750055.cache: ~0 rows (approximately)

-- Dumping structure for table db_uas_241011750055.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_uas_241011750055.cache_locks: ~0 rows (approximately)

-- Dumping structure for table db_uas_241011750055.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_uas_241011750055.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table db_uas_241011750055.galleries
CREATE TABLE IF NOT EXISTS `galleries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `kategori` enum('Hotel','Kamar','Fasilitas','Restoran','Lainnya') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_uas_241011750055.galleries: ~1 rows (approximately)
INSERT INTO `galleries` (`id`, `judul`, `foto`, `deskripsi`, `kategori`, `created_at`, `updated_at`) VALUES
	(1, 'Kamar Suite Terbaru', '1782790313_gallery2.jpg', 'Ruang istirahat modern yang dirancang untuk kenyamanan maksimal Anda setelah hari yang panjang', 'Kamar', '2026-06-29 20:31:53', '2026-06-29 21:18:23'),
	(2, 'Kamar terbaik keluarga', '1782793796_twinroom.jpg', 'Twin Bed: Dua Kasur Terpisah untuk Privasi EkstraKamar tipe Twin Bed (atau sering disebut Twin Room) menyediakan dua tempat tidur tunggal (single bed) yang terpisah di dalam satu ruangan.', 'Kamar', '2026-06-29 21:29:56', '2026-06-29 22:55:54');

-- Dumping structure for table db_uas_241011750055.hotel_rooms
CREATE TABLE IF NOT EXISTS `hotel_rooms` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_kamar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_kamar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kamar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe_kamar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_per_malam` decimal(12,2) NOT NULL,
  `fasilitas` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kapasitas_orang` int NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Tersedia','Terisi','Cleaning','Maintenance') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Tersedia',
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `hotel_rooms_id_kamar_unique` (`id_kamar`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_uas_241011750055.hotel_rooms: ~0 rows (approximately)
INSERT INTO `hotel_rooms` (`id`, `id_kamar`, `nomor_kamar`, `nama_kamar`, `tipe_kamar`, `harga_per_malam`, `fasilitas`, `kapasitas_orang`, `foto`, `status`, `deskripsi`, `created_at`, `updated_at`) VALUES
	(1, 'DLX10101', '101', 'Delux Room', 'Deluxe', 800000.00, '', 3, '1782743592_deluxroom.jpg', 'Tersedia', 'Kamar Deluxe adalah tipe kamar hotel premium yang lebih luas daripada kamar standar. Kamar ini menawarkan fasilitas yang lebih lengkap, seperti area tempat duduk, tempat tidur lebih besar, kulkas mini, dan pemandangan yang bagus. Kamar ini cocok untuk liburan nyaman', '2026-06-29 07:33:12', '2026-06-29 18:39:09'),
	(4, 'STD201201', '201', 'Standard Room', 'Standard', 650000.00, '', 3, '1782783519_standar_room.jpg', 'Tersedia', 'Standard Room adalah tipe kamar hotel paling dasar dengan harga paling terjangkau. Kamar ini sangat cocok untuk tamu yang ingin menginap dengan bujet terbatas.', '2026-06-29 18:38:39', '2026-06-29 18:38:39'),
	(5, 'EXE301301', '301', 'Executif Room', 'Executive', 1500000.00, '', 3, '1782783707_executif_room.jpg', 'Terisi', 'Executive Room adalah tipe kamar hotel premium yang dirancang khusus untuk kenyamanan maksimal dan mobilitas. Kamar ini lebih besar dari tipe standar atau deluxe. Ruangan ini dilengkapi area kerja khusus dan akses eksklusif ke lounge VIP. Kamar ini sangat cocok untuk pebisnis atau liburan mewah.', '2026-06-29 18:41:47', '2026-06-29 21:30:47'),
	(6, 'JNR401401', '401', 'Junior Suite', 'Junior Suite', 500000.00, '', 2, '1782783822_junior_suite.jpg', 'Tersedia', 'Junior Suite Room adalah tipe kamar hotel mewah yang lebih besar dari kamar standar. Kamar ini menggabungkan area tidur dan area duduk di ruangan yang luas atau dipisahkan oleh partisi. Fasilitasnya meliputi kasur ukuran king, sofa santai, TV pintar, dan kamar mandi premium.', '2026-06-29 18:43:42', '2026-06-29 18:43:42'),
	(7, 'SUT501501', '501', 'Suite Room (Bedroom)', 'Suite', 1750000.00, '', 2, '1782783979_suiteroom_bedroom.jpg', 'Tersedia', 'Suite Room adalah tipe kamar hotel paling premium dan luas yang berfungsi layaknya sebuah apartemen mewah. Kamar ini memiliki area tidur, ruang tamu terpisah, dan fasilitas eksklusif seperti dapur mini yang cocok untuk tamu yang mengutamakan privasi dan kenyamanan ekstra.', '2026-06-29 18:46:19', '2026-06-29 18:46:19'),
	(8, 'TWN601601', '601', 'Twin Room', 'Deluxe', 1000000.00, 'AC, Internet, Sarapan pagi, Kulkas, Water Compliment', 2, '1782784160_twinroom.jpg', 'Tersedia', 'Twin room adalah kamar hotel yang berisi dua tempat tidur terpisah (biasanya kasur ukuran single) dalam satu ruangan yang sama. Kamar ini dirancang khusus untuk dua tamu yang ingin berbagi kamar tetapi menginginkan tempat tidurnya masing-masing.', '2026-06-29 18:49:20', '2026-06-30 00:18:50'),
	(13, 'FAM701701', '701', 'Familly Rooms', 'Family', 2000000.00, 'AC, Internet, Kamar Mandi, Sarapan pagi (2 orang)', 4, '1782804625_familyrooms.jpg', 'Tersedia', 'Family Room adalah tipe kamar hotel yang dirancang khusus untuk liburan bersama keluarga. Kamar ini berukuran lebih luas dari kamar standar dan dapat menampung 3 hingga 4 orang sekaligus.', '2026-06-30 00:30:25', '2026-06-30 00:30:25');

-- Dumping structure for table db_uas_241011750055.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` smallint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_uas_241011750055.jobs: ~0 rows (approximately)

-- Dumping structure for table db_uas_241011750055.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_uas_241011750055.job_batches: ~0 rows (approximately)

-- Dumping structure for table db_uas_241011750055.messages
CREATE TABLE IF NOT EXISTS `messages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subjek` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pesan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Belum Dibaca','Sudah Dibaca') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Belum Dibaca',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_uas_241011750055.messages: ~1 rows (approximately)
INSERT INTO `messages` (`id`, `nama`, `email`, `subjek`, `pesan`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'cecep rukmana', 'cecep.roekmana@gmail.com', 'test', 'test', 'Sudah Dibaca', '2026-06-29 21:06:53', '2026-06-29 22:02:15'),
	(2, 'ephot', 'ephotcr@gmail.com', 'Family Room', 'Family room masih tersedia atau sudah full ya?', 'Belum Dibaca', '2026-06-29 21:12:52', '2026-06-29 21:12:52'),
	(3, 'cecep rukmana', 'cecep.roekmana@gmail.com', 'ada diskon', 'apakah sedang ada diskon untuk delux room ?', 'Belum Dibaca', '2026-06-29 21:15:38', '2026-06-29 21:15:38'),
	(4, 'Yudhi', 'yudhi@gmail.com', 'Ada diskon Executife Room', 'Halo, apakah sedang ada diskon untuk kamar executife nya?\r\n\r\nYudhi', 'Belum Dibaca', '2026-06-30 00:00:23', '2026-06-30 00:00:23'),
	(5, 'Yudhi', 'yudhi@gmail.com', 'Ada diskon Executife Room', 'Mau tanya, apakah ada diskon kamar executive nya?\r\n\r\nTerima kasih,\r\nYudhi', 'Belum Dibaca', '2026-06-30 00:13:48', '2026-06-30 00:13:48'),
	(6, 'Ardi', 'ardi@gmail.com', 'Ada diskon ruang meeting', 'Halo, saya mau tanya, apakah ada diskon untuk ruang meetingnya?\r\n\r\nTerima kasih,\r\nArdi', 'Belum Dibaca', '2026-06-30 00:40:09', '2026-06-30 00:40:09');

-- Dumping structure for table db_uas_241011750055.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_uas_241011750055.migrations: ~1 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2026_06_29_060004_create_hotel_rooms_table', 1),
	(5, '2026_06_30_030728_create_galleries_table', 2),
	(6, '2026_06_30_040053_create_messages_table', 3),
	(7, '2026_06_30_050705_add_fasilitas_to_hotel_rooms_table', 4);

-- Dumping structure for table db_uas_241011750055.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_uas_241011750055.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table db_uas_241011750055.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_uas_241011750055.sessions: ~1 rows (approximately)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('Yk4jyu317K7HVWyTsuQaN3CBpqKVS9criEKg7NQv', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJrQTVNRWNzdDRySmRwRDZFY0VYOXFVU1Jka3FVdnhoQmFRYXczaFJLIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDAiLCJyb3V0ZSI6ImhvbWUifX0=', 1782805736);

-- Dumping structure for table db_uas_241011750055.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_uas_241011750055.users: ~0 rows (approximately)
INSERT INTO `users` (`id`, `name`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Administrator', 'admin', '$2y$12$AAeGYl3sTelkk7/PU3iIAOPxuB/FGdXEbZXhjb8fi1ums44LPbLw2', NULL, '2026-06-29 07:48:43', '2026-06-29 07:48:43');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
