-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2025 at 05:36 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shatcoksa`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `action` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'engr.mubashir.se@example.com', '$2y$12$kEQ.4fHqlR.0Q9MKpR5Rje82TF0E46vb566b0e1qGABUJPAZv8kBa', NULL, '2025-10-22 10:09:39', '2025-10-22 10:09:39'),
(2, 'Super Admin', 'admin@shatcoksa.com', '$2y$12$K8AvwzUIi/OC/gyI4cACv.0klQ.JD0uvV8cw1iCA1eCl8Cr3ZjmL2', NULL, '2025-10-23 08:28:05', '2025-10-23 08:28:05');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `status`, `created_at`, `updated_at`) VALUES
(2, 'ub', 'ac', 0, '2025-10-29 09:24:18', '2025-10-29 09:24:29'),
(3, 'are you serious', 'yes', 1, '2025-11-06 05:31:24', '2025-11-06 05:31:24');

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `inquiry_service_id` int(11) DEFAULT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`id`, `name`, `email`, `phone`, `inquiry_service_id`, `message`, `created_at`, `updated_at`) VALUES
(2, 'ewhrw', 'dsfasdddsafads2@gmail.com', 'd', 3, 'dhfjdfkh', '2025-10-29 08:19:01', '2025-10-29 08:19:01'),
(3, 'Muhammad Mubashir', 'muhammadmubashir501681@gmail.com', '234', 2, 'jdfsh', '2025-10-29 08:19:24', '2025-10-29 08:19:24'),
(4, 'weqrasd', 'dhskjfhdkfs@gmail.com', '3245466446323', 6, 'dsfsdfag', '2025-11-05 06:47:39', '2025-11-05 06:47:39'),
(5, 'john doe', 'abc@gmail.com', '+12345678', 10, 'test', '2025-11-06 05:13:52', '2025-11-06 05:13:52'),
(6, 'Muhammad Mubashir', 'admin@shatcoksa.com', '3400501681', NULL, 'jsdfakhjksahjfdskhhdhjsddsfahjSend Message\r\nContact Information\r\nYou can also reach us directly through the following details:\r\n\r\ninfo@shatco.com\r\n+966 123 456 789\r\nRiyadh, Saudi Arabia\r\nOffice Hours\r\nSunday – Thursday: 9:00 AM – 6:00 PM\r\n\r\nFriday & Saturday: ClosedSend Message\r\nContact Information\r\nYou can also reach us directly through the following details:\r\n\r\ninfo@shatco.com\r\n+966 123 456 789\r\nRiyadh, Saudi Arabia\r\nOffice Hours\r\nSunday – Thursday: 9:00 AM – 6:00 PM\r\n\r\nFriday & Saturday: ClosedSend Message\r\nContact Information\r\nYou can also reach us directly through the following details:\r\n\r\ninfo@shatco.com\r\n+966 123 456 789\r\nRiyadh, Saudi Arabia\r\nOffice Hours\r\nSunday – Thursday: 9:00 AM – 6:00 PM\r\n\r\nFriday & Saturday: ClosedSend Message\r\nContact Information\r\nYou can also reach us directly through the following details:\r\n\r\ninfo@shatco.com\r\n+966 123 456 789\r\nRiyadh, Saudi Arabia\r\nOffice Hours\r\nSunday – Thursday: 9:00 AM – 6:00 PM\r\n\r\nFriday & Saturday: ClosedSend Message\r\nContact Information\r\nYou can also reach us directly through the following details:\r\n\r\ninfo@shatco.com\r\n+966 123 456 789\r\nRiyadh, Saudi Arabia\r\nOffice Hours\r\nSunday – Thursday: 9:00 AM – 6:00 PM\r\n\r\nFriday & Saturday: ClosedSend Message\r\nContact Information\r\nYou can also reach us directly through the following details:\r\n\r\ninfo@shatco.com\r\n+966 123 456 789\r\nRiyadh, Saudi Arabia\r\nOffice Hours\r\nSunday – Thursday: 9:00 AM – 6:00 PM\r\n\r\nFriday & Saturday: ClosedSend Message\r\nContact Information\r\nYou can also reach us directly through the following details:\r\n\r\ninfo@shatco.com\r\n+966 123 456 789\r\nRiyadh, Saudi Arabia\r\nOffice Hours\r\nSunday – Thursday: 9:00 AM – 6:00 PM\r\n\r\nFriday & Saturday: Closed Send Message\r\nContact Information\r\nYou can also reach us directly through the following details:\r\n\r\ninfo@shatco.com\r\n+966 123 456 789\r\nRiyadh, Saudi Arabia\r\nOffice Hours\r\nSunday – Thursday: 9:00 AM – 6:00 PM\r\n\r\nFriday & Saturday: ClosedbfhdjhSend Message\r\nContact Information\r\nYou can also reach us directly through the following details:\r\n\r\ninfo@shatco.com\r\n+966 123 456 789\r\nRiyadh, Saudi Arabia\r\nOffice Hours\r\nSunday – Thursday: 9:00 AM – 6:00 PM\r\n\r\nFriday & Saturday: Closedjfdj', '2025-11-06 05:15:57', '2025-11-06 05:15:57'),
(7, 'Muhammad Mubashir', 'abc@gmail.com', '094546645662', 6, 'fsdgfsdds', '2025-11-06 06:07:20', '2025-11-06 06:07:20');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_10_22_134629_create_service_categories_table', 2),
(5, '2025_10_22_134630_create_service_media_table', 2),
(6, '2025_10_22_134630_create_services_table', 2),
(7, '2025_10_22_134631_create_inquiries_table', 2),
(8, '2025_10_22_134631_create_testimonials_table', 2),
(9, '2025_10_22_134632_create_faqs_table', 2),
(10, '2025_10_22_134632_create_pages_table', 2),
(11, '2025_10_22_134633_create_settings_table', 2),
(12, '2025_10_22_134634_create_activity_logs_table', 2),
(13, '2025_10_22_140024_create_admins_table', 2),
(14, '2025_10_22_140648_create_admins_table', 3),
(15, '2025_10_22_140648_create_service_categories_table', 3),
(16, '2025_10_22_140649_create_services_table', 3),
(17, '2025_10_22_140650_create_service_media_table', 3),
(18, '2025_10_22_140651_create_inquiries_table', 3),
(19, '2025_10_22_140651_create_testimonials_table', 3),
(20, '2025_10_22_140652_create_pages_table', 3),
(21, '2025_10_22_140653_create_faqs_table', 3),
(22, '2025_10_22_140654_create_activity_logs_table', 3),
(23, '2025_10_22_140654_create_settings_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` longtext DEFAULT NULL,
  `status` text DEFAULT 'draft',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `short_description` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_category_id`, `title`, `slug`, `short_description`, `description`, `icon`, `thumbnail`, `is_featured`, `created_at`, `updated_at`) VALUES
(6, 5, 'Residential Power Systems', 'residential-power-systems', 'We specialize in delivering innovative power solutions tailored to residential and commercial needs. From electrical infrastructure to smart grid systems, we ensure efficiency, reliability, and safety', 'Residential Power Systems werWe specialize in delivering innovative power solutions tailored to residential and commercial needs. From electrical infrastructure to smart grid systems, we ensure efficiency, reliability, and safetyWe specialize in delivering innovative power solutions tailored to residential and commercial needs. From electrical infrastructure to smart grid systems, we ensure efficiency, reliability, and safety', NULL, 'assests/images/projects/power.webp', 0, '2025-11-05 05:36:12', '2025-11-08 07:15:35'),
(12, 6, 'Tailored electrical solutions for homes.', 'tailored-electrical-solutions-for-homes', 'Tailored electrical solutions for homes.', NULL, NULL, 'services/1762604170_telecom-service.webp', 0, '2025-11-08 07:15:57', '2025-11-08 07:16:10');

-- --------------------------------------------------------

--
-- Table structure for table `service_categories`
--

CREATE TABLE `service_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_categories`
--

INSERT INTO `service_categories` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(5, 'Power Solution $ Services', 'power-solution-services', NULL, '2025-11-05 05:34:03', '2025-11-05 05:34:03'),
(6, 'Low Current Solutions & Services', 'low-current-solutions-services', NULL, '2025-11-05 05:34:17', '2025-11-08 07:06:51'),
(7, 'ICT Solution $ Services', 'ict-solution-services', NULL, '2025-11-05 05:34:43', '2025-11-05 05:34:43'),
(8, 'IOT Solution $ Services', 'iot-solution-services', NULL, '2025-11-05 05:35:03', '2025-11-05 05:35:03'),
(11, 'MEP Services', 'mep-services', NULL, '2025-11-08 07:08:18', '2025-11-08 07:08:18'),
(12, 'Solar Solutions', 'solar-solutions', NULL, '2025-11-08 07:08:32', '2025-11-08 07:08:32'),
(13, 'Telecom Services', 'telecom-services', NULL, '2025-11-08 07:08:48', '2025-11-08 07:08:48');

-- --------------------------------------------------------

--
-- Table structure for table `service_media`
--

CREATE TABLE `service_media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `type` enum('image','video') NOT NULL DEFAULT 'image',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('kW26APFrr0eLeKqog7Yk07pS0MYMPt7YFPphu8PH', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiR1NqSTRaSll0MllxQU81ZEliNm1NaVh6QTlVYm9FZ0M1aVBGam5CNCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9zZXJ2aWNlcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NToiYWRtaW4iO086ODoic3RkQ2xhc3MiOjc6e3M6MjoiaWQiO2k6MjtzOjQ6Im5hbWUiO3M6MTE6IlN1cGVyIEFkbWluIjtzOjU6ImVtYWlsIjtzOjE5OiJhZG1pbkBzaGF0Y29rc2EuY29tIjtzOjg6InBhc3N3b3JkIjtzOjYwOiIkMnkkMTIkSzhBdnd6VUlpL09DL2d5STRjQUN2LjBrbFEuSkQwdXZWOGN3MWlDQTFlQ2w4Q3IzWmptTDIiO3M6MTQ6InJlbWVtYmVyX3Rva2VuIjtOO3M6MTA6ImNyZWF0ZWRfYXQiO3M6MTk6IjIwMjUtMTAtMjMgMTM6Mjg6MDUiO3M6MTA6InVwZGF0ZWRfYXQiO3M6MTk6IjIwMjUtMTAtMjMgMTM6Mjg6MDUiO319', 1762953032),
('TD2b2BrlqYK0STupOCiYD6CSJH3C1CtWDaY0Gsgf', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSE5lOWhwdWFhT04wcGZuVkFFSHJjNnl1V2c2a284ZXNlYVp4bEN3ZCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1OiJhZG1pbiI7Tzo4OiJzdGRDbGFzcyI6Nzp7czoyOiJpZCI7aToyO3M6NDoibmFtZSI7czoxMToiU3VwZXIgQWRtaW4iO3M6NToiZW1haWwiO3M6MTk6ImFkbWluQHNoYXRjb2tzYS5jb20iO3M6ODoicGFzc3dvcmQiO3M6NjA6IiQyeSQxMiRLOEF2d3pVSWkvT0MvZ3lJNGNBQ3YuMGtsUS5KRDB1dlY4Y3cxaUNBMWVDbDhDcjNaam1MMiI7czoxNDoicmVtZW1iZXJfdG9rZW4iO047czoxMDoiY3JlYXRlZF9hdCI7czoxOToiMjAyNS0xMC0yMyAxMzoyODowNSI7czoxMDoidXBkYXRlZF9hdCI7czoxOToiMjAyNS0xMC0yMyAxMzoyODowNSI7fX0=', 1762956091),
('yZ5lYseiHWZteAC3Apu1wT2Sqnr2xuq8d2ziMXSU', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidEhTRVltUmpFUXkzNUE0dGdhNWt2NTBnZ3ZnT20yWUV6UGZPWGRJTSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9zZXJ2aWNlcyI7czo1OiJyb3V0ZSI7czoyMDoiYWRtaW4uc2VydmljZXMuaW5kZXgiO31zOjU6ImFkbWluIjtPOjg6InN0ZENsYXNzIjo3OntzOjI6ImlkIjtpOjI7czo0OiJuYW1lIjtzOjExOiJTdXBlciBBZG1pbiI7czo1OiJlbWFpbCI7czoxOToiYWRtaW5Ac2hhdGNva3NhLmNvbSI7czo4OiJwYXNzd29yZCI7czo2MDoiJDJ5JDEyJEs4QXZ3elVJaS9PQy9neUk0Y0FDdi4wa2xRLkpEMHV2VjhjdzFpQ0ExZUNsOENyM1pqbUwyIjtzOjE0OiJyZW1lbWJlcl90b2tlbiI7TjtzOjEwOiJjcmVhdGVkX2F0IjtzOjE5OiIyMDI1LTEwLTIzIDEzOjI4OjA1IjtzOjEwOiJ1cGRhdGVkX2F0IjtzOjE5OiIyMDI1LTEwLTIzIDEzOjI4OjA1Ijt9fQ==', 1762955957);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(2, 'site_name', 'shatco', '2025-10-29 10:19:41', '2025-11-10 04:10:35'),
(3, 'email', 'muhammadmubashir501681@gmail.com', '2025-10-29 10:19:41', '2025-11-06 05:45:57'),
(4, 'phone', '12345678', '2025-10-29 10:19:41', '2025-11-06 07:49:21'),
(5, 'whatsapp', '+923400501681', '2025-10-29 10:19:41', '2025-11-05 11:24:18'),
(6, 'facebook', 'https://www.facebook.com/', '2025-10-29 10:19:41', '2025-11-06 08:28:00'),
(7, 'instagram', 'https://www.instagram.com/', '2025-10-29 10:19:41', '2025-11-05 11:24:18'),
(8, 'twitter', 'https://www.twitter.com/', '2025-10-29 10:19:41', '2025-11-06 08:28:17'),
(9, 'linkedin', 'https://www.linkedin.com/', '2025-10-29 10:19:41', '2025-11-05 11:24:18'),
(10, 'logo', 'uploads/settings/logo_1761757902.jpg', '2025-10-29 10:21:55', '2025-10-29 12:11:42'),
(11, 'services_intro', 'Explore our specialized solutions designed to meet your needs.', '2025-11-06 07:42:44', '2025-11-06 07:42:44'),
(12, 'testimonials_intro', 'Hear from our satisfied clients who trust our expertise and professionalism.', '2025-11-06 07:45:07', '2025-11-06 07:45:07'),
(13, 'faqs_intro', 'Find answers to the most common questions about our services and solutions.', '2025-11-06 07:46:10', '2025-11-06 07:46:10');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `designation`, `message`, `image`, `status`, `created_at`, `updated_at`) VALUES
(23, 'dsf', 'gds', 'dfdg', 'testimonials/1762362590_power.webp', 1, '2025-11-05 12:09:50', '2025-11-05 12:09:50'),
(24, 'john doe', 'manager', 'how can i know', 'testimonials/1762423588_iot.webp', 1, '2025-11-06 05:06:28', '2025-11-06 05:06:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_logs_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `services_slug_unique` (`slug`),
  ADD KEY `services_service_category_id_foreign` (`service_category_id`);

--
-- Indexes for table `service_categories`
--
ALTER TABLE `service_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `service_categories_slug_unique` (`slug`);

--
-- Indexes for table `service_media`
--
ALTER TABLE `service_media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_media_service_id_foreign` (`service_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `service_categories`
--
ALTER TABLE `service_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `service_media`
--
ALTER TABLE `service_media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD CONSTRAINT `activity_logs_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_service_category_id_foreign` FOREIGN KEY (`service_category_id`) REFERENCES `service_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `service_media`
--
ALTER TABLE `service_media`
  ADD CONSTRAINT `service_media_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
