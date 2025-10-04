/*
SQLyog Community
MySQL - 8.0.30 : Database - remas
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`remas` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `remas`;

/*Table structure for table `cache` */

DROP TABLE IF EXISTS `cache`;

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `cache` */

/*Table structure for table `cache_locks` */

DROP TABLE IF EXISTS `cache_locks`;

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `cache_locks` */

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `job_batches` */

DROP TABLE IF EXISTS `job_batches`;

CREATE TABLE `job_batches` (
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

/*Data for the table `job_batches` */

/*Table structure for table `jobs` */

DROP TABLE IF EXISTS `jobs`;

CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `jobs` */

/*Table structure for table `kegiatans` */

DROP TABLE IF EXISTS `kegiatans`;

CREATE TABLE `kegiatans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_drive_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `kegiatans` */

insert  into `kegiatans`(`id`,`judul`,`deskripsi`,`gambar`,`google_drive_link`,`tanggal`,`waktu`,`lokasi`,`is_active`,`created_at`,`updated_at`) values 
(1,'Riyayan Remaja Masjid Al-Falaah','Menyambung silaturahmi dengan masyarakat dan saling maaf maafan.',NULL,'https://drive.google.com/drive/folders/1P2GZ33Zr9poJCikW4d-1nNFqqkn18_o0?usp=drive_link','2025-10-09','19:30:00','Masjid Al-Falaah',1,'2025-10-04 02:49:57','2025-10-04 02:49:57'),
(6,'Takbiran 2025','Kegiatan Tahunan Remaja Masjid Al-Falaah',NULL,'https://drive.google.com/drive/folders/1jOQAJ1T9E9PR9VHQapi7aq_10qkY6m3S?usp=drive_link','2025-03-28','07:00:00','Masjid Al-Falaah,Manisrenggo,kec kota, kota kediri',1,'2025-10-04 03:31:31','2025-10-04 03:42:15');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'0001_01_01_000000_create_users_table',1),
(2,'0001_01_01_000001_create_cache_table',1),
(3,'0001_01_01_000002_create_jobs_table',1),
(4,'2025_10_03_062322_create_kegiatans_table',2),
(5,'2025_10_04_000000_add_google_drive_link_to_kegiatans_table',3);

/*Table structure for table `password_reset_tokens` */

DROP TABLE IF EXISTS `password_reset_tokens`;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_reset_tokens` */

/*Table structure for table `sessions` */

DROP TABLE IF EXISTS `sessions`;

CREATE TABLE `sessions` (
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

/*Data for the table `sessions` */

insert  into `sessions`(`id`,`user_id`,`ip_address`,`user_agent`,`payload`,`last_activity`) values 
('2qYOcUtXP9Urmpu4lqUnUKmUUnlQd20tHGIbSLNJ',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.104.3 Chrome/138.0.7204.235 Electron/37.3.1 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiS3RseUc2Y1FGaUJtVmUwSVVsSFRQUGZ6eFRPc1BpcFY2ZENnVHNaMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTAzOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAva2VnaWF0YW4/aWQ9MmMyNTAxNzItNThmZi00ZDUzLTllOTktMjM2MjA1MzYzZmJkJnZzY29kZUJyb3dzZXJSZXFJZD0xNzU5NTQ2NjUyMTY0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1759546653),
('3P2RBHwWySY2ozXldnF8PcNXyw5NyNSIOZ1clhjc',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.104.3 Chrome/138.0.7204.235 Electron/37.3.1 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiSzF2aFNZblEzUWw2em5nVkpEeDl2VUg5OXNobFNFTHR4OG1PeEhLNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTAzOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAva2VnaWF0YW4/aWQ9MmMyNTAxNzItNThmZi00ZDUzLTllOTktMjM2MjA1MzYzZmJkJnZzY29kZUJyb3dzZXJSZXFJZD0xNzU5NTQ0NzI5Njc1Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1759544731),
('AE1TILfc7j5jghEufAHe7ohpWHQofbbMrqYBheH2',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.104.3 Chrome/138.0.7204.235 Electron/37.3.1 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiSHRFZlJ6Q3dxVFlGOXRiRXRSdTFhaXJURFo4dDUwcWNWVFVFSFNDUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTAzOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAva2VnaWF0YW4/aWQ9MmMyNTAxNzItNThmZi00ZDUzLTllOTktMjM2MjA1MzYzZmJkJnZzY29kZUJyb3dzZXJSZXFJZD0xNzU5NTQ2Mjc3MTkzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1759546278),
('Btt38mXH6FutTmQbYwYukEvNEIHiOoU3dFRHXFoa',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.104.3 Chrome/138.0.7204.235 Electron/37.3.1 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiR0RGYXp1WjJGcUVsUzIzdTFVSjFJWFBzUEh6TU9IdFV1bjZ1VWp3TCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTAwOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvbG9naW4/aWQ9MmMyNTAxNzItNThmZi00ZDUzLTllOTktMjM2MjA1MzYzZmJkJnZzY29kZUJyb3dzZXJSZXFJZD0xNzU5NTQ3OTU5MjI3Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1759547960),
('e2op70la4LEKsJZPEbPkrSldtagW5QiUONBjVNZ8',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.104.3 Chrome/138.0.7204.235 Electron/37.3.1 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoibndST2xoUUdwTm5UUHpSY1huMzhIajZlTzdLekdKdFJVbjFGNkpkQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTAzOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAva2VnaWF0YW4/aWQ9MmMyNTAxNzItNThmZi00ZDUzLTllOTktMjM2MjA1MzYzZmJkJnZzY29kZUJyb3dzZXJSZXFJZD0xNzU5NTQzOTcwMjgxIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1759543972),
('GtLrd4i2apfl3ziZETog71DLfTnBQYrtEsBYJTtf',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.104.3 Chrome/138.0.7204.235 Electron/37.3.1 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoicFlsSmM3Rkk5R041RFJXS2tDNkU5YW9OamVmZFE0VU0wWUVCNVVmdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTAzOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAva2VnaWF0YW4/aWQ9MmMyNTAxNzItNThmZi00ZDUzLTllOTktMjM2MjA1MzYzZmJkJnZzY29kZUJyb3dzZXJSZXFJZD0xNzU5NTQ3Mjc3NTA0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1759547278),
('h0hB3xBPPWk79LSVPC7hjZBdztfWN8I8NglDJJ2P',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.104.3 Chrome/138.0.7204.235 Electron/37.3.1 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiMk81aHRBS3F0dWk2ckZkWmREQm50N0FtZ0QwbWE2R3ZOSjI3S3pTayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTAzOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAva2VnaWF0YW4/aWQ9NzlmZjBjYTAtYjU2OS00MWM4LTgwYTMtM2NkMzQ0ZjlhNTJiJnZzY29kZUJyb3dzZXJSZXFJZD0xNzU5NTQ5MTI1NTA0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1759549126),
('iy7uoE4o4Pp8PHBa58BhIcAlcMozIpvK8ef4Difa',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.104.3 Chrome/138.0.7204.235 Electron/37.3.1 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoib1N3TTF0V1c1N1lVV0I2S2V6bmZzZHJPN2dDNWxnTktzSW10eVprNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTAzOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAva2VnaWF0YW4/aWQ9MmMyNTAxNzItNThmZi00ZDUzLTllOTktMjM2MjA1MzYzZmJkJnZzY29kZUJyb3dzZXJSZXFJZD0xNzU5NTQ2MDkwNDc5Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1759546091),
('q5lXZL1assHqwag6k2PdQx2BlmFWEnAijqqyBKNx',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.104.3 Chrome/138.0.7204.235 Electron/37.3.1 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiMENYakl2UUZnQUhTZDZZWVVBbDJiNnlid2ZSRGEyaVFBOWVSMzc0MiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTAzOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAva2VnaWF0YW4/aWQ9MmMyNTAxNzItNThmZi00ZDUzLTllOTktMjM2MjA1MzYzZmJkJnZzY29kZUJyb3dzZXJSZXFJZD0xNzU5NTQ2NjA2Nzc5Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1759546608),
('qOMgBYcKJj5grbwPiCfjEO1397bj107fGLXLYGto',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.104.3 Chrome/138.0.7204.235 Electron/37.3.1 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiUHBNSW9pZVoxRGVFcWdOeG9Zd3RTQTNPMkpsVUtmcU9zS2tGM01hUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTAzOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAva2VnaWF0YW4/aWQ9MmMyNTAxNzItNThmZi00ZDUzLTllOTktMjM2MjA1MzYzZmJkJnZzY29kZUJyb3dzZXJSZXFJZD0xNzU5NTQ3OTQ2MDc0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1759547948),
('r5fLtc4zsS5wvso1amdAmvIz0dVsGNUCnGVjexea',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.104.3 Chrome/138.0.7204.235 Electron/37.3.1 Safari/537.36','YToyOntzOjY6Il90b2tlbiI7czo0MDoicnlGTlo0R3lEblZFWGFUa2FHYVB1SEFiNFp3M0VJMzI5YWtneVVvTSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1759547998),
('rY3XDevngADUSGQlZuvm34FcKUAgzaikErD7uqu2',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWVU2dkdDQnNSbHB5a2FjaktCUUtFUjhQcVhINnJXdGM2NFN0bDVDaiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==',1759551388),
('VdOICccAKUuSeA7vIuHdb82WVDdQCC4bprvKaF5X',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.104.3 Chrome/138.0.7204.235 Electron/37.3.1 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiYnNzUVdmUWRIcWdoYUpVYkhIUThwcXZCRkJOajdQWXBQNFFKSFF1QiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTAzOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAva2VnaWF0YW4/aWQ9NzlmZjBjYTAtYjU2OS00MWM4LTgwYTMtM2NkMzQ0ZjlhNTJiJnZzY29kZUJyb3dzZXJSZXFJZD0xNzU5NTQ4NDgyNzYwIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1759548484);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values 
(1,'Admin REMAS','admin@remas.com',NULL,'$2y$12$REuy8mMRJpPOBjdQqmW9/O917EIr/rz/RzrGeYhF3DwW2ahclySwS',NULL,'2025-10-04 03:17:43','2025-10-04 03:17:43'),
(2,'Super Admin','admin@localhost.com',NULL,'$2y$12$936Vq0Apo/0FB0uKKq.W4ej5uMeoBTGwNirqThUnABesKb2TfUsX.',NULL,'2025-10-04 04:41:24','2025-10-04 04:41:24'),
(3,'Faishal Arrasyid','faishalarrasyid21@gmail.com',NULL,'$2y$12$r8caZsjT5FDNfCHrlcf09.CoK1Pr99/J.rxAQJLJ.dM37C5KM4Sy.',NULL,'2025-10-04 04:44:58','2025-10-04 04:44:58');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
