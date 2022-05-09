-- Adminer 4.8.1 MySQL 8.0.27-0ubuntu0.20.04.1 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

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


DROP TABLE IF EXISTS `formfield_options`;
CREATE TABLE `formfield_options` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `formfield_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `formfield_options_formfield_id_foreign` (`formfield_id`),
  CONSTRAINT `formfield_options_formfield_id_foreign` FOREIGN KEY (`formfield_id`) REFERENCES `formfields` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `formfield_options` (`id`, `name`, `value`, `formfield_id`) VALUES
(3,	'India',	'India',	3),
(4,	'USA',	'USA',	3),
(5,	'China',	'China',	3);

DROP TABLE IF EXISTS `formfields`;
CREATE TABLE `formfields` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userform_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `formfields_userform_id_foreign` (`userform_id`),
  CONSTRAINT `formfields_userform_id_foreign` FOREIGN KEY (`userform_id`) REFERENCES `userforms` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `formfields` (`id`, `title`, `type`, `userform_id`, `created_at`, `updated_at`) VALUES
(1,	'Name',	'text',	1,	'2022-05-09 02:27:04',	'2022-05-09 02:27:04'),
(2,	'Age',	'number',	1,	'2022-05-09 02:27:11',	'2022-05-09 02:27:11'),
(3,	'Country',	'select',	1,	'2022-05-09 02:27:38',	'2022-05-09 02:27:38');

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(11,	'2014_10_12_000000_create_users_table',	1),
(12,	'2014_10_12_100000_create_password_resets_table',	1),
(13,	'2019_08_19_000000_create_failed_jobs_table',	1),
(14,	'2019_12_14_000001_create_personal_access_tokens_table',	1),
(15,	'2022_05_08_070654_create_userforms_table',	1),
(20,	'2022_05_08_080521_create_formfields_table',	2),
(21,	'2022_05_08_081518_create_form_submitted_table',	2);

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `submitted_form`;
CREATE TABLE `submitted_form` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `userform_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `submitted_form_userform_id_foreign` (`userform_id`),
  CONSTRAINT `submitted_form_userform_id_foreign` FOREIGN KEY (`userform_id`) REFERENCES `userforms` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `submitted_form` (`id`, `userform_id`, `created_at`, `updated_at`) VALUES
(1,	1,	'2022-05-09 02:50:33',	'2022-05-09 02:50:33');

DROP TABLE IF EXISTS `submitted_form_fields`;
CREATE TABLE `submitted_form_fields` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `submitted_form_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `submitted_form_fields_submitted_form_id_foreign` (`submitted_form_id`),
  CONSTRAINT `submitted_form_fields_submitted_form_id_foreign` FOREIGN KEY (`submitted_form_id`) REFERENCES `submitted_form` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `submitted_form_fields` (`id`, `name`, `value`, `submitted_form_id`) VALUES
(1,	'Name',	'James',	1),
(2,	'Age',	'21',	1),
(3,	'Country',	'India',	1);

DROP TABLE IF EXISTS `userforms`;
CREATE TABLE `userforms` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `userforms` (`id`, `title`, `content`, `created_at`, `updated_at`) VALUES
(1,	'Contact',	'Please contact',	'2022-05-08 17:43:05',	'2022-05-08 17:43:05');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	'Thomas',	'thomas@userform.test',	NULL,	'$2y$10$qZCPDxPCMiPtGNFQcwfBdez04oCGaNSL37aCXT/vzwgHrJDkVPQnK',	NULL,	'2022-05-08 17:42:44',	'2022-05-08 17:42:44');

-- 2022-05-09 03:34:31
