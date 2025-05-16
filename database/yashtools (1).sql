-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2025 at 07:04 AM
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
-- Database: `yashtools`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `banner_image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `banner_title` varchar(255) DEFAULT NULL,
  `banner_description` varchar(255) DEFAULT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `slug` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `banner_image`, `created_at`, `updated_at`, `banner_title`, `banner_description`, `status`, `slug`, `deleted_at`) VALUES
(1, '1742204968.png', '2025-03-17 04:19:28', '2025-03-17 04:22:07', 'Welcome To Yashtools', 'Welcome to our site.', '1', 'banner-1742204968', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `brand_image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `brand_slug` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_image`, `created_at`, `updated_at`, `brand_slug`, `deleted_at`) VALUES
(1, 'HGT', '1742196813.png', '2025-03-15 04:31:28', '2025-03-17 02:03:33', 'hgt', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('356a192b7913b04c54574d18c28d46e6395428ab', 'i:1;', 1742215577),
('356a192b7913b04c54574d18c28d46e6395428ab:timer', 'i:1742215577;', 1742215577),
('5c785c036466adea360111aa28563bfd556b5fba', 'i:1;', 1743596925),
('5c785c036466adea360111aa28563bfd556b5fba:timer', 'i:1743596925;', 1743596925),
('77de68daecd823babbb58edb1c8e14d7106e83bb', 'i:2;', 1742370016),
('77de68daecd823babbb58edb1c8e14d7106e83bb:timer', 'i:1742370016;', 1742370016),
('c1dfd96eea8cc2b62785275bca38ac261256e278', 'i:2;', 1742387798),
('c1dfd96eea8cc2b62785275bca38ac261256e278:timer', 'i:1742387798;', 1742387798),
('da4b9237bacccdf19c0760cab7aec4a8359010b0', 'i:1;', 1742217647),
('da4b9237bacccdf19c0760cab7aec4a8359010b0:timer', 'i:1742217647;', 1742217647);

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
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `part_number` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `status`, `created_at`, `updated_at`, `part_number`, `deleted_at`) VALUES
(1, '2', '1', '1', '2025-03-17 04:35:42', '2025-03-17 04:36:15', 'CDBC056', '2025-03-17 04:36:15'),
(2, '2', '4', '1', '2025-03-17 04:36:00', '2025-03-17 04:36:15', 'DB 0104', '2025-03-17 04:36:15'),
(3, '2', '23', '1', '2025-03-17 06:40:27', '2025-03-17 07:38:08', 'SGBB 1010', '2025-03-17 07:38:08'),
(4, '2', '3', '1', '2025-03-17 07:48:22', '2025-03-17 07:48:32', 'CD 025', '2025-03-17 07:48:32'),
(5, '2', '5', '1', '2025-03-17 23:38:16', '2025-03-22 05:21:19', 'DEA 1010', '2025-03-22 05:21:19');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_slug` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_image`, `created_at`, `updated_at`, `category_slug`, `deleted_at`) VALUES
(1, 'SOLID CARBIDE END MILLS', '1742196245.png', '2025-03-15 04:21:07', '2025-03-17 01:54:05', 'solid-carbide-end-mills', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `enquiry_id` varchar(255) NOT NULL,
  `status` enum('pending','dismissed','confirmed','delivered','payment_received') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `part_number` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enquiries`
--

INSERT INTO `enquiries` (`id`, `customer_id`, `enquiry_id`, `status`, `created_at`, `updated_at`, `quantity`, `part_number`, `deleted_at`) VALUES
(1, 2, 'YASH2025030001', 'confirmed', '2025-03-17 04:36:15', '2025-03-17 04:38:49', 2, 'CDBC056', NULL),
(2, 2, 'YASH2025030001', 'pending', '2025-03-17 04:36:15', '2025-03-17 04:36:15', 3, 'DB 0104', NULL),
(3, 2, 'YASH2025030002', 'pending', '2025-03-17 05:17:52', '2025-03-17 05:17:52', 1, 'CDCC 030', NULL),
(4, 2, 'YASH2025030003', 'pending', '2025-03-17 05:51:15', '2025-03-17 05:51:15', 1, 'TOB F 03025.3', NULL),
(5, 2, 'YASH2025030004', 'pending', '2025-03-17 06:39:57', '2025-03-17 06:39:57', 1, 'CDCC 036', NULL),
(8, 2, 'YASH2025030007', 'payment_received', '2025-03-17 07:48:32', '2025-03-19 05:05:36', 1, 'CD 024', NULL),
(9, 2, 'YASH2025030008', 'delivered', '2025-03-17 07:51:52', '2025-03-19 07:38:45', 1, 'DEA 0606', NULL),
(10, 2, 'YASH2025030009', 'payment_received', '2025-03-17 07:53:22', '2025-03-19 05:35:26', 1, 'DEA 0808', NULL),
(11, 2, 'YASH2025030010', 'pending', '2025-03-19 00:52:08', '2025-03-19 00:52:08', 1, 'QBN 0303', NULL),
(12, 2, 'YASH2025030011', 'pending', '2025-03-22 05:21:19', '2025-03-22 05:21:19', 1, 'DEA 0808', NULL),
(13, 2, 'ENQUIRY001', 'pending', '2025-03-29 01:28:41', '2025-03-29 01:28:41', 1, 'EX2SRD 1605', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `enquiry_products`
--

CREATE TABLE `enquiry_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `enquiry_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enquiry_products`
--

INSERT INTO `enquiry_products` (`id`, `enquiry_id`, `product_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, '2025-03-17 04:36:15', '2025-03-17 04:36:15', NULL),
(2, 2, 4, '2025-03-17 04:36:15', '2025-03-17 04:36:15', NULL),
(3, 3, 2, '2025-03-17 05:17:52', '2025-03-17 05:17:52', NULL),
(4, 4, 9, '2025-03-17 05:51:15', '2025-03-17 05:51:15', NULL),
(5, 5, 2, '2025-03-17 06:39:57', '2025-03-17 06:39:57', NULL),
(6, 6, 23, '2025-03-17 07:38:08', '2025-03-19 00:36:14', '2025-03-19 00:36:14'),
(7, 7, 3, '2025-03-17 07:41:29', '2025-03-19 00:36:14', '2025-03-19 00:36:14'),
(8, 8, 3, '2025-03-17 07:48:32', '2025-03-17 07:48:32', NULL),
(9, 9, 5, '2025-03-17 07:51:52', '2025-03-17 07:51:52', NULL),
(10, 10, 5, '2025-03-17 07:53:22', '2025-03-17 07:53:22', NULL),
(11, 11, 28, '2025-03-19 00:52:08', '2025-03-19 00:52:08', NULL),
(12, 12, 5, '2025-03-22 05:21:19', '2025-03-22 05:21:19', NULL),
(13, 13, 35, '2025-03-29 01:28:41', '2025-03-29 01:28:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `events_title` varchar(255) NOT NULL,
  `events_description` varchar(255) NOT NULL,
  `events_image` varchar(255) NOT NULL,
  `events_date` varchar(255) NOT NULL,
  `events_tag` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `event_slug` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `events_title`, `events_description`, `events_image`, `events_date`, `events_tag`, `created_at`, `updated_at`, `event_slug`, `deleted_at`) VALUES
(1, 'Real Madrid Leyendas vs Barça Legends | Football Match', 'Real Madrid Leyendas vs Barça Legends | Football Match', '1742366417.jpeg', '2025-03-23', 'Football Match', '2025-03-19 01:10:17', '2025-03-19 01:14:33', 'real-madrid-leyendas-vs-barca-legends-football-match', '2025-03-19 01:14:33');

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
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favourites`
--

INSERT INTO `favourites` (`id`, `user_id`, `product_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2', '1', '1', '2025-03-17 04:41:21', '2025-03-17 05:00:42', '2025-03-17 05:00:42');

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
(37, '2025_02_07_114332_create_brand_table', 1),
(38, '2025_02_07_114733_create_banner_table', 1),
(73, '2025_02_07_120023_create_enquiry_table', 2),
(184, '2025_03_06_092926_create_notifications_table', 6),
(208, '0001_01_01_000000_create_users_table', 7),
(209, '0001_01_01_000001_create_cache_table', 7),
(210, '0001_01_01_000002_create_jobs_table', 7),
(211, '2025_02_06_094708_create_user_details_table', 7),
(212, '2025_02_07_112236_create_categories_table', 7),
(213, '2025_02_07_114028_create_sub_categories_table', 7),
(214, '2025_02_07_114828_create_products_table', 7),
(215, '2025_02_07_120639_create_orders_tracks', 7),
(216, '2025_02_07_121256_create_events_table', 7),
(217, '2025_02_08_060825_create_banners_table', 7),
(218, '2025_02_08_072719_update_categories_table', 7),
(219, '2025_02_10_060426_create_brands_table', 7),
(220, '2025_02_11_094922_update_products_table', 7),
(221, '2025_02_11_100618_update_banners_table', 7),
(222, '2025_02_12_094156_update_categories_table', 7),
(223, '2025_02_12_100651_update_sub_categories_table', 7),
(224, '2025_02_12_102318_update_brands_table', 7),
(225, '2025_02_12_104153_update_products_table', 7),
(226, '2025_02_13_060831_update_products_table', 7),
(227, '2025_02_14_092113_update_products_table', 7),
(228, '2025_02_15_070959_update_banners_table', 7),
(229, '2025_02_15_092451_update_categories_table', 7),
(230, '2025_02_15_094323_update_sub_categories_table', 7),
(231, '2025_02_15_094731_update_brands_table', 7),
(232, '2025_02_15_094856_update_products_table', 7),
(233, '2025_02_15_094949_update_events_table', 7),
(234, '2025_02_15_122934_create_favourites_table', 7),
(235, '2025_02_17_053040_update_banners_table', 7),
(236, '2025_02_17_071710_create_enquiries_table', 7),
(237, '2025_02_17_093646_create_enquiry_products_table', 7),
(238, '2025_02_17_093925_update_enquiries_table', 7),
(239, '2025_02_19_051030_update_orders_tracks_table', 7),
(240, '2025_02_20_055620_update_products_table', 7),
(241, '2025_02_20_072949_update_products_table', 7),
(242, '2025_02_20_132634_update_favourites_table', 7),
(243, '2025_02_21_120104_update_enquiries_table', 7),
(244, '2025_02_22_054632_create_carts_table', 7),
(245, '2025_02_22_064345_update_carts_table', 7),
(246, '2025_03_04_064458_update_enquiries_table', 7),
(247, '2025_03_06_060822_update_users_table', 7),
(248, '2025_03_06_105219_create_notifications_table', 7),
(249, '2025_03_08_053556_update_banners_table', 7),
(250, '2025_03_08_054801_update_categories_table', 7),
(251, '2025_03_08_054922_update_sub_categories_table', 7),
(252, '2025_03_08_055746_update_brands_table', 7),
(253, '2025_03_08_055835_update_carts_table', 7),
(254, '2025_03_08_055905_update_enquiries_table', 7),
(255, '2025_03_08_055943_update_enquiry_products_table', 7),
(256, '2025_03_08_060019_update_events_table', 7),
(257, '2025_03_08_060053_update_favourites_table', 7),
(258, '2025_03_08_060139_update_notifications_table', 7),
(259, '2025_03_08_060211_update_orders_tracks_table', 7),
(260, '2025_03_08_060251_update_products_table', 7),
(261, '2025_03_08_060336_update_users_table', 7),
(262, '2025_03_08_060421_update_user_details_table', 7),
(263, '2025_03_11_091038_update_enquiries_table', 7),
(264, '2025_03_12_053235_create_morph_histories_table', 7),
(265, '2025_03_12_132408_create_pos_table', 7),
(266, '2025_03_13_120957_create_morph_statuses_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `morph_histories`
--

CREATE TABLE `morph_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `modifiable_type` varchar(255) NOT NULL,
  `modifiable_id` bigint(20) UNSIGNED NOT NULL,
  `action` enum('deleted','updated','restored') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `morph_histories`
--

INSERT INTO `morph_histories` (`id`, `admin_id`, `modifiable_type`, `modifiable_id`, `action`, `created_at`, `updated_at`) VALUES
(1, 1, 'App\\Models\\Product', 3, 'updated', '2025-03-15 04:57:28', '2025-03-15 04:57:28'),
(2, 1, 'App\\Models\\Product', 9, 'updated', '2025-03-15 05:23:09', '2025-03-15 05:23:09'),
(3, 1, 'App\\Models\\Product', 14, 'updated', '2025-03-15 05:53:20', '2025-03-15 05:53:20'),
(4, 1, 'App\\Models\\Product', 19, 'updated', '2025-03-15 05:59:45', '2025-03-15 05:59:45'),
(5, 1, 'App\\Models\\Product', 36, 'updated', '2025-03-15 07:15:24', '2025-03-15 07:15:24'),
(6, 1, 'App\\Models\\Product', 48, 'updated', '2025-03-16 23:51:29', '2025-03-16 23:51:29'),
(7, 1, 'App\\Models\\Product', 51, 'updated', '2025-03-17 00:01:37', '2025-03-17 00:01:37'),
(8, 1, 'App\\Models\\Product', 1, 'updated', '2025-03-17 00:14:38', '2025-03-17 00:14:38'),
(9, 1, 'App\\Models\\Product', 2, 'updated', '2025-03-17 00:16:29', '2025-03-17 00:16:29'),
(10, 1, 'App\\Models\\Product', 3, 'updated', '2025-03-17 00:16:51', '2025-03-17 00:16:51'),
(11, 1, 'App\\Models\\Product', 4, 'updated', '2025-03-17 00:20:31', '2025-03-17 00:20:31'),
(12, 1, 'App\\Models\\Product', 5, 'updated', '2025-03-17 00:20:45', '2025-03-17 00:20:45'),
(13, 1, 'App\\Models\\Product', 6, 'updated', '2025-03-17 00:20:57', '2025-03-17 00:20:57'),
(14, 1, 'App\\Models\\Product', 7, 'updated', '2025-03-17 00:21:19', '2025-03-17 00:21:19'),
(15, 1, 'App\\Models\\Product', 10, 'updated', '2025-03-17 00:24:29', '2025-03-17 00:24:29'),
(16, 1, 'App\\Models\\Product', 9, 'updated', '2025-03-17 00:24:48', '2025-03-17 00:24:48'),
(17, 1, 'App\\Models\\Product', 8, 'updated', '2025-03-17 00:25:09', '2025-03-17 00:25:09'),
(18, 1, 'App\\Models\\Product', 11, 'updated', '2025-03-17 00:30:08', '2025-03-17 00:30:08'),
(19, 1, 'App\\Models\\Product', 11, 'updated', '2025-03-17 00:31:56', '2025-03-17 00:31:56'),
(20, 1, 'App\\Models\\Product', 11, 'deleted', '2025-03-17 00:33:02', '2025-03-17 00:33:02'),
(21, 1, 'App\\Models\\Product', 12, 'updated', '2025-03-17 00:35:10', '2025-03-17 00:35:10'),
(22, 1, 'App\\Models\\Product', 13, 'updated', '2025-03-17 00:40:42', '2025-03-17 00:40:42'),
(23, 1, 'App\\Models\\Product', 15, 'updated', '2025-03-17 00:43:42', '2025-03-17 00:43:42'),
(24, 1, 'App\\Models\\Product', 16, 'updated', '2025-03-17 00:45:24', '2025-03-17 00:45:24'),
(25, 1, 'App\\Models\\Product', 17, 'updated', '2025-03-17 00:46:57', '2025-03-17 00:46:57'),
(26, 1, 'App\\Models\\Product', 18, 'updated', '2025-03-17 00:48:41', '2025-03-17 00:48:41'),
(27, 1, 'App\\Models\\Product', 19, 'updated', '2025-03-17 00:50:41', '2025-03-17 00:50:41'),
(28, 1, 'App\\Models\\Product', 20, 'updated', '2025-03-17 00:52:02', '2025-03-17 00:52:02'),
(29, 1, 'App\\Models\\Product', 21, 'updated', '2025-03-17 00:53:27', '2025-03-17 00:53:27'),
(30, 1, 'App\\Models\\Product', 22, 'updated', '2025-03-17 00:54:38', '2025-03-17 00:54:38'),
(31, 1, 'App\\Models\\Product', 14, 'updated', '2025-03-17 00:55:53', '2025-03-17 00:55:53'),
(32, 1, 'App\\Models\\Product', 23, 'updated', '2025-03-17 01:01:29', '2025-03-17 01:01:29'),
(33, 1, 'App\\Models\\Product', 24, 'updated', '2025-03-17 01:03:06', '2025-03-17 01:03:06'),
(34, 1, 'App\\Models\\Product', 25, 'updated', '2025-03-17 01:04:42', '2025-03-17 01:04:42'),
(35, 1, 'App\\Models\\Product', 26, 'updated', '2025-03-17 01:05:54', '2025-03-17 01:05:54'),
(36, 1, 'App\\Models\\Product', 27, 'updated', '2025-03-17 01:07:02', '2025-03-17 01:07:02'),
(37, 1, 'App\\Models\\Product', 28, 'updated', '2025-03-17 01:08:53', '2025-03-17 01:08:53'),
(38, 1, 'App\\Models\\Product', 29, 'updated', '2025-03-17 01:10:14', '2025-03-17 01:10:14'),
(39, 1, 'App\\Models\\Product', 30, 'updated', '2025-03-17 01:19:05', '2025-03-17 01:19:05'),
(40, 1, 'App\\Models\\Product', 30, 'updated', '2025-03-17 01:19:57', '2025-03-17 01:19:57'),
(41, 1, 'App\\Models\\Product', 31, 'updated', '2025-03-17 01:21:12', '2025-03-17 01:21:12'),
(42, 1, 'App\\Models\\Product', 32, 'updated', '2025-03-17 01:27:06', '2025-03-17 01:27:06'),
(43, 1, 'App\\Models\\Product', 33, 'updated', '2025-03-17 01:27:57', '2025-03-17 01:27:57'),
(44, 1, 'App\\Models\\Product', 34, 'updated', '2025-03-17 01:28:58', '2025-03-17 01:28:58'),
(45, 1, 'App\\Models\\Product', 35, 'updated', '2025-03-17 01:29:55', '2025-03-17 01:29:55'),
(46, 1, 'App\\Models\\Product', 36, 'updated', '2025-03-17 01:31:23', '2025-03-17 01:31:23'),
(47, 1, 'App\\Models\\Product', 37, 'updated', '2025-03-17 01:33:22', '2025-03-17 01:33:22'),
(48, 1, 'App\\Models\\Product', 38, 'updated', '2025-03-17 01:34:31', '2025-03-17 01:34:31'),
(49, 1, 'App\\Models\\Product', 39, 'updated', '2025-03-17 01:36:05', '2025-03-17 01:36:05'),
(50, 1, 'App\\Models\\Product', 40, 'updated', '2025-03-17 01:37:29', '2025-03-17 01:37:29'),
(51, 1, 'App\\Models\\Product', 41, 'updated', '2025-03-17 01:38:47', '2025-03-17 01:38:47'),
(52, 1, 'App\\Models\\Product', 42, 'updated', '2025-03-17 01:40:34', '2025-03-17 01:40:34'),
(53, 1, 'App\\Models\\Product', 43, 'updated', '2025-03-17 01:41:53', '2025-03-17 01:41:53'),
(54, 1, 'App\\Models\\Product', 44, 'updated', '2025-03-17 01:43:32', '2025-03-17 01:43:32'),
(55, 1, 'App\\Models\\Product', 45, 'updated', '2025-03-17 01:45:04', '2025-03-17 01:45:04'),
(56, 1, 'App\\Models\\Product', 46, 'updated', '2025-03-17 01:46:23', '2025-03-17 01:46:23'),
(57, 1, 'App\\Models\\Product', 47, 'updated', '2025-03-17 01:47:42', '2025-03-17 01:47:42'),
(58, 1, 'App\\Models\\Product', 48, 'updated', '2025-03-17 01:48:58', '2025-03-17 01:48:58'),
(59, 1, 'App\\Models\\Product', 49, 'updated', '2025-03-17 01:50:34', '2025-03-17 01:50:34'),
(60, 1, 'App\\Models\\Product', 50, 'updated', '2025-03-17 01:51:31', '2025-03-17 01:51:31'),
(61, 1, 'App\\Models\\Product', 51, 'updated', '2025-03-17 01:52:14', '2025-03-17 01:52:14'),
(62, 1, 'App\\Models\\Product', 52, 'updated', '2025-03-17 01:53:04', '2025-03-17 01:53:04'),
(63, 1, 'App\\Models\\Product', 5, 'updated', '2025-03-17 02:07:45', '2025-03-17 02:07:45'),
(64, 1, 'App\\Models\\Product', 5, 'updated', '2025-03-17 02:08:35', '2025-03-17 02:08:35'),
(65, 1, 'App\\Models\\Product', 1, 'updated', '2025-03-17 02:10:06', '2025-03-17 02:10:06'),
(66, 1, 'App\\Models\\Product', 2, 'updated', '2025-03-17 02:10:50', '2025-03-17 02:10:50'),
(67, 1, 'App\\Models\\Product', 3, 'updated', '2025-03-17 02:11:20', '2025-03-17 02:11:20'),
(68, 1, 'App\\Models\\Product', 4, 'updated', '2025-03-17 02:12:17', '2025-03-17 02:12:17'),
(69, 1, 'App\\Models\\Product', 6, 'updated', '2025-03-17 02:12:57', '2025-03-17 02:12:57'),
(70, 1, 'App\\Models\\Product', 7, 'updated', '2025-03-17 02:13:25', '2025-03-17 02:13:25'),
(71, 1, 'App\\Models\\Product', 10, 'updated', '2025-03-17 02:13:53', '2025-03-17 02:13:53'),
(72, 1, 'App\\Models\\Product', 9, 'updated', '2025-03-17 02:14:16', '2025-03-17 02:14:16'),
(73, 1, 'App\\Models\\Product', 8, 'updated', '2025-03-17 02:14:37', '2025-03-17 02:14:37'),
(74, 1, 'App\\Models\\Product', 12, 'updated', '2025-03-17 02:14:45', '2025-03-17 02:14:45'),
(75, 1, 'App\\Models\\Product', 53, 'updated', '2025-03-17 02:15:46', '2025-03-17 02:15:46'),
(76, 1, 'App\\Models\\Product', 53, 'updated', '2025-03-17 04:32:36', '2025-03-17 04:32:36');

-- --------------------------------------------------------

--
-- Table structure for table `morph_statuses`
--

CREATE TABLE `morph_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `enquiry_id` varchar(255) NOT NULL,
  `statusable_type` varchar(255) NOT NULL,
  `statusable_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `morph_statuses`
--

INSERT INTO `morph_statuses` (`id`, `enquiry_id`, `statusable_type`, `statusable_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'YASH2025030001', 'App\\Models\\Enquiry', 1, 'confirmed', '2025-03-17 04:38:49', '2025-03-17 04:38:49'),
(2, 'YASH2025030009', 'App\\Models\\Enquiry', 10, 'confirmed', '2025-03-18 01:00:50', '2025-03-18 01:00:50'),
(3, 'YASH2025030007', 'App\\Models\\Enquiry', 8, 'delivered', '2025-03-18 06:34:03', '2025-03-18 06:34:03'),
(4, 'YASH2025030007', 'App\\Models\\Enquiry', 8, 'payment_received', '2025-03-19 05:05:36', '2025-03-19 05:05:36'),
(5, 'YASH2025030009', 'App\\Models\\Enquiry', 10, 'payment_received', '2025-03-19 05:35:26', '2025-03-19 05:35:26'),
(6, 'YASH2025030008', 'App\\Models\\Enquiry', 9, 'delivered', '2025-03-19 07:38:45', '2025-03-19 07:38:45');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
('00c05965-6f6b-42db-b7c1-823c446abafd', 'App\\Notifications\\EnquiryNotification', 'App\\Models\\User', 2, '{\"order_id\":\"YASH2025030008\",\"message\":\"A New Enquiry Added!\"}', '2025-03-18 06:02:23', '2025-03-17 07:51:59', '2025-03-17 07:51:59', NULL),
('04db01ce-7ad4-4372-acbc-973de01ad564', 'App\\Notifications\\EnquiryNotification', 'App\\Models\\User', 2, '{\"order_id\":\"ENQUIRY001\",\"message\":\"A New Enquiry Added!\"}', NULL, '2025-03-29 01:28:48', '2025-03-29 01:28:48', NULL),
('218f6256-2b55-46b9-b9ff-699230e5f266', 'App\\Notifications\\EnquiryNotification', 'App\\Models\\User', 2, '{\"order_id\":\"YASH2025030007\",\"message\":\"A New Enquiry Added!\"}', '2025-03-18 06:03:28', '2025-03-17 07:48:39', '2025-03-17 07:48:39', NULL),
('38a6afa6-f9f9-47cd-a2e0-fced6f0a782a', 'App\\Notifications\\EnquiryNotification', 'App\\Models\\User', 2, '{\"order_id\":\"YASH2025030003\",\"message\":\"A New Enquiry Added!\"}', '2025-03-22 05:14:06', '2025-03-17 05:51:24', '2025-03-17 05:51:24', NULL),
('44f28240-8bd0-4b78-b84d-47b9de6a7315', 'App\\Notifications\\EnquiryNotification', 'App\\Models\\User', 2, '{\"order_id\":\"YASH2025030011\",\"message\":\"A New Enquiry Added!\"}', NULL, '2025-03-22 05:21:26', '2025-03-22 05:21:26', NULL),
('54dd744d-3f98-41c2-b87a-dfb4f061c0ab', 'App\\Notifications\\EnquiryNotification', 'App\\Models\\User', 2, '{\"order_id\":\"YASH2025030004\",\"message\":\"A New Enquiry Added!\"}', '2025-03-18 06:06:30', '2025-03-17 06:40:05', '2025-03-17 06:40:05', NULL),
('94ad8c4c-9bba-493c-9bad-b8c9f85c0b2b', 'App\\Notifications\\EnquiryNotification', 'App\\Models\\User', 2, '{\"order_id\":\"YASH2025030006\",\"message\":\"A New Enquiry Added!\"}', '2025-03-18 06:03:03', '2025-03-17 07:41:36', '2025-03-17 07:41:36', NULL),
('c2071f94-7680-40ec-9072-46a63a649be8', 'App\\Notifications\\EnquiryNotification', 'App\\Models\\User', 2, '{\"order_id\":\"YASH2025030009\",\"message\":\"A New Enquiry Added!\"}', '2025-03-18 05:57:09', '2025-03-17 07:53:28', '2025-03-17 07:53:28', NULL),
('e5b55185-ef14-447b-b582-b72171b937a5', 'App\\Notifications\\EnquiryNotification', 'App\\Models\\User', 2, '{\"order_id\":\"YASH2025030005\",\"message\":\"A New Enquiry Added!\"}', '2025-03-18 06:04:48', '2025-03-17 07:38:16', '2025-03-17 07:38:16', NULL),
('fe079056-4c65-4022-854d-dc50a36977d3', 'App\\Notifications\\EnquiryNotification', 'App\\Models\\User', 2, '{\"order_id\":\"YASH2025030010\",\"message\":\"A New Enquiry Added!\"}', '2025-03-19 05:53:01', '2025-03-19 00:52:14', '2025-03-19 00:52:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders_tracks`
--

CREATE TABLE `orders_tracks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `enquiry_id` varchar(255) NOT NULL,
  `courier_name` varchar(255) NOT NULL,
  `courier_number` varchar(255) NOT NULL,
  `courier_website` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `invoice_file` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders_tracks`
--

INSERT INTO `orders_tracks` (`id`, `enquiry_id`, `courier_name`, `courier_number`, `courier_website`, `created_at`, `updated_at`, `invoice_file`, `deleted_at`) VALUES
(1, 'YASH2025030001', 'HGT', '8898884', 'https://www.figma.com/', '2025-03-17 04:40:00', '2025-03-17 04:40:00', '1742206200.pdf', NULL),
(2, 'YASH2025030009', 'HGT', '8898884', 'https://www.figma.com/', '2025-03-18 01:01:25', '2025-03-18 01:01:25', '1742279485.pdf', NULL),
(3, 'YASH2025030007', 'HGT', '8898884', 'https://www.figma.com/', '2025-03-18 01:22:34', '2025-03-18 01:22:34', '1742280754.pdf', NULL);

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
-- Table structure for table `pos`
--

CREATE TABLE `pos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `po_file` varchar(255) NOT NULL,
  `enquiry_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pos`
--

INSERT INTO `pos` (`id`, `po_file`, `enquiry_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1742280670.pdf', 'YASH2025030007', '2025-03-18 01:21:10', '2025-03-18 01:21:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_quantity` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_dispatch` varchar(255) NOT NULL,
  `product_discription` text NOT NULL,
  `product_specs` text DEFAULT NULL,
  `product_catalouge` varchar(255) DEFAULT NULL,
  `product_pdf` varchar(255) DEFAULT NULL,
  `product_drawing` varchar(255) DEFAULT NULL,
  `product_thumbain` varchar(255) NOT NULL,
  `product_brand_id` varchar(255) NOT NULL,
  `product_category_id` varchar(255) NOT NULL,
  `product_sub_category_id` varchar(255) NOT NULL,
  `product_arrivals` varchar(255) DEFAULT NULL,
  `product_sale` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `product_slug` varchar(255) NOT NULL,
  `product_optional_pdf` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_quantity`, `product_price`, `product_dispatch`, `product_discription`, `product_specs`, `product_catalouge`, `product_pdf`, `product_drawing`, `product_thumbain`, `product_brand_id`, `product_category_id`, `product_sub_category_id`, `product_arrivals`, `product_sale`, `created_at`, `updated_at`, `status`, `product_slug`, `product_optional_pdf`, `deleted_at`) VALUES
(1, 'Internal coolant solid carbide drills 5xD - CDBC', '1', '1', 'Same Days', '<p>HGT’s CDBC is a solid carbide drill with special angle ground for high-hardness workpieces. It applies to materials such as hardened steel, high/low alloy steel, cast steel, tool steel and cast iron. It is coated with i8 coating that offers excellent heat and friction resistance. Thus, it is suitable for high hard steel for dry and wet cutting.</p><p><strong>Features -&nbsp;</strong></p><ul><li>MG Special Micro Grain Carbide</li><li>DIN Code – DIN 6537</li><li>Features a 30° helix angle</li><li>Shank Diament Tolerance – h6</li><li>Cutting Flute Tolerance – h7</li><li>Tip Angle – 140°</li><li>i8 coating – High Hard Steel for Dry and Wet Cutting</li><li>Drill Type – 5*D&nbsp;</li></ul><p>&nbsp;</p><p><strong>Application -</strong>&nbsp;</p><ul><li>Applicable for finishing and semi-finishing processes</li><li>Consumer electronics</li><li>Automotive parts</li><li>Semiconductor</li><li>Medical device</li><li>Aerospace parts</li><li>Die and Mold</li><li>Precision molding</li></ul><p>&nbsp;</p><p><strong>Recommended Cutting Conditions -&nbsp;</strong></p><ul><li>HRC35 - S45C, FC, FCD, SCM, S50C, SKS …</li><li>HRC45 - SCr, SNCM, SKD11, SKD61, NAK80 …</li><li>HRC55 - SKD11</li></ul><p>&nbsp;</p><p>Check out the specifications, and feel free to contact us for technical support and further details.</p>', '1742033422.xlsx', '1742033422.pdf', '1742033422.pdf', '1742033422.webp', '1742190278.png', '1', '1', '1', 'new', '', '2025-03-15 04:40:22', '2025-03-17 02:10:06', '1', 'internal-coolant-solid-carbide-drills-5xd-cdbc', NULL, NULL),
(2, 'Internal coolant solid carbide drills 8xD - CDCC', '1', '1', 'Same Days', '<p>HGT’s CDCC is a solid carbide drill with special angle ground for high-hardness workpieces. It applies to materials such as hardened steel, high/low alloy steel, cast steel, tool steel and cast iron. It is coated with i8 coating that offers excellent heat and friction resistance. Thus, it is suitable for high hard steel for dry and wet cutting.</p><p><strong>Features -&nbsp;</strong></p><ul><li>MG Special Micro Grain Carbide</li><li>DIN Code – DIN 6537</li><li>Features a 30° helix angle</li><li>Shank Diament Tolerance – h6</li><li>Cutting Flute Tolerance – h7</li><li>Tip Angle – 140°</li><li>i8 coating – High Hard Steel for Dry and Wet Cutting</li><li>Drill Type – 8*D&nbsp;</li></ul><p><strong>Application -</strong>&nbsp;</p><ul><li>Applicable for finishing and semi-finishing processes</li><li>Consumer electronics</li><li>Automotive parts</li><li>Semiconductor</li><li>Medical device</li><li>Aerospace parts</li><li>Die and Mold</li><li>Precision molding</li></ul><p><strong>Recommended Cutting Conditions -</strong></p><ul><li>HRC35 - S45C, FC, FCD, SCM, S50C, SKS …</li><li>HRC45 - SCr, SNCM, SKD61, NAK80 …</li><li>HRC55 - SKD11&nbsp;</li></ul><p>Check out the specifications, and feel free to contact us for technical support and further details.</p>', '1742033994.xlsx', '1742033995.pdf', '1742033995.pdf', '1742033995.webp', '1742190389.png', '1', '1', '1', 'new', '', '2025-03-15 04:49:55', '2025-03-17 02:10:50', '1', 'internal-coolant-solid-carbide-drills-8xd-cdcc', NULL, NULL),
(3, 'SOLID CARBIDE DRILLS 3xD - CD', '1', '1', 'Same Days', '<p>HGT’s CD is a solid carbide drill with special angle ground for high-hardness workpieces. It applies to materials such as hardened steel, high/low alloy steel, cast steel, tool steel and cast iron. It is coated with TiaLN coating that offers excellent heat and friction resistance. Thus, it is suitable for general steel for wet cutting.</p><p><strong>Features -&nbsp;</strong></p><ul><li>MG Special Micro Grain Carbide</li><li>DIN code - DIN 6537</li><li>Features a 30° helix angle</li><li>Shank Diament Tolerance – h6</li><li>Cutting Flute Tolerance – h7</li><li>Tip Angle – 120°, 140°</li><li>TIaLN coating general steel for wet cutting</li><li>Drill Type – 3*D&nbsp;</li></ul><p><strong>Application -&nbsp;</strong></p><ul><li>Applicable for finishing, semi-finishing processes</li><li>Consumer electronics</li><li>Automotive parts</li><li>Semiconductor</li><li>Medical device</li><li>Aerospace parts</li><li>Die and Mold</li><li>Precision molding</li></ul><p>Check out the specifications, and feel free to contact us for technical support and further details.</p>', '1742034331.xlsx', '1742034331.pdf', '1742034331.pdf', '1742034331.webp', '1742190411.png', '1', '1', '1', 'new', '', '2025-03-15 04:55:31', '2025-03-17 02:11:20', '1', 'solid-carbide-drills-3xd-cd', NULL, NULL),
(4, 'DB', '1', '1', 'Same Days', '<p>HGT’s DB is a solid carbide ball nose end mill with special angle ground for high-hardness. It applies to materials such as aluminum alloy, copper alloys and non-metallic alloys.&nbsp;</p><p><strong>Features -&nbsp;</strong></p><ul><li>MG Special Micro Grain Carbide</li><li>2-flute end mill</li><li>Features a 45° helix angle</li></ul><p><strong>Application -&nbsp;</strong></p><ul><li>Applicable for finishing and profiling processes</li><li>Consumer electronics</li><li>Automotive parts</li><li>Semiconductor</li><li>Medical device</li><li>Aerospace parts</li><li>Die and Mold</li><li>Precision molding</li></ul><p><strong>Recommended Cutting Condition Hardened Steels:</strong></p><ul><li>Aluminum: 1070</li><li>Aluminum Alloy: 2014/4032/5052/6061/7075&nbsp;</li><li>Aluminum Alloy: AC85</li></ul><p>Check out the specifications, and feel free to contact us for technical support and further details.</p>', '1742034907.xlsx', '1742034907.pdf', '1742034907.pdf', '1742034907.webp', '1742190631.png', '1', '1', '2', 'new', '', '2025-03-15 05:05:07', '2025-03-17 02:12:17', '1', 'db', NULL, NULL),
(5, 'DEA', '1', '1', 'Same Days', '<p>HGT’s DEA is a solid carbide square end mill with special angle ground for high-hardness. It applies to materials such as aluminum alloy, copper alloys and non-metallic alloys.&nbsp;</p><p><strong>Features -&nbsp;</strong></p><ul><li>MG Special Micro Grain Carbide</li><li>2-flute end mill</li><li>Features a 55° helix angle</li></ul><p><strong>Application -</strong>&nbsp;</p><ul><li>Applicable for finishing, planning, slotting and side cutting processes</li><li>Consumer electronics</li><li>Automotive parts</li><li>Semiconductor</li><li>Medical device</li><li>Aerospace parts</li><li>Die and Mold</li><li>Precision molding</li></ul><p><strong>Recommended Cutting Condition Hardened Steels:</strong></p><ul><li>Aluminum: 1070</li><li>Aluminum Alloy: 2014/4032/5052/6061/7075&nbsp;</li><li>Aluminum Alloy: AC85</li></ul><p>Check out the specifications, and feel free to contact us for technical support and further details.</p>', '1742035352.xlsx', '1742035353.pdf', '1742035353.pdf', '1742035353.webp', '1742190645.png', '1', '1', '2', 'new', '', '2025-03-15 05:12:33', '2025-03-17 02:08:35', '1', 'dea', NULL, NULL),
(6, 'DEC', '1', '1', 'Same Days', '<p>HGT’s DEC is a solid carbide square end mill with special angle ground for high-hardness. It applies to materials such as aluminum alloy, copper alloys and non-metallic alloys.&nbsp;</p><p><strong>Features -&nbsp;</strong></p><ul><li>MG Special Micro Grain Carbide</li><li>3-flute end mill</li><li>Features a 55° helix angle</li></ul><p><strong>Application -&nbsp;</strong></p><ul><li>Applicable for finishing, planning, slotting and side cutting&nbsp; processes</li><li>Consumer electronics</li><li>Automotive parts</li><li>Semiconductor</li><li>Medical device</li><li>Aerospace parts</li><li>Die and Mold</li><li>Precision molding</li></ul><p><strong>Recommended Cutting Condition Hardened Steels:</strong></p><ul><li>Aluminum: 1070</li><li>Aluminum Alloy: 2014/4032/5052/6061/7075&nbsp;</li><li>Aluminum Alloy: AC85</li></ul><p>Check out the specifications, and feel free to contact us for technical support and further details.</p>', '1742035464.xlsx', '1742035464.pdf', '1742035464.pdf', '1742035464.webp', '1742190657.png', '1', '1', '2', 'new', '', '2025-03-15 05:14:24', '2025-03-17 02:12:57', '1', 'dec', NULL, NULL),
(7, 'DEL', '1', '1', 'Same Days', '<p>HGT’s DEL is a solid carbide long flute square end mill with special angle ground for high-hardness. It applies to materials such as aluminum alloy, copper alloys and non-metallic alloys.&nbsp;</p><p><strong>Features -&nbsp;</strong></p><ul><li>MG Special Micro Grain Carbide</li><li>3-flute end mill</li><li>Features a 55° helix angle</li></ul><p><strong>Application -&nbsp;</strong></p><ul><li>Applicable for finishing, planning, slotting and side cutting processes</li><li>Consumer electronics</li><li>Automotive parts</li><li>Semiconductor</li><li>Medical device</li><li>Aerospace parts</li><li>Die and Mold</li><li>Precision molding</li></ul><p><strong>Recommended Cutting Condition Hardened Steels:</strong></p><ul><li>Aluminum: 1070</li><li>Aluminum Alloy: 2014/4032/5052/6061/7075&nbsp;</li><li>Aluminum Alloy: AC85</li></ul><p>Check out the specifications, and feel free to contact us for technical support and further details.</p>', '1742035548.xlsx', '1742035549.pdf', '1742035549.pdf', '1742035549.webp', '1742190679.png', '1', '1', '2', 'new', '', '2025-03-15 05:15:49', '2025-03-17 02:13:25', '1', 'del', NULL, NULL),
(8, 'TCBF', '1', '1', 'Same Days', '<p>HGT’s TCBF is a solid carbide long neck ball nose end mill for composites. From crafting implants that demand the highest precision to manufacturing crowns, bridges, and partials, our dental end mills are versatile tools that elevate dental mold and medical equipment manufacturing. HGT provides a line of carbide end mills developed for dental use - DEN.pro series. They provide optimized solutions for various materials including CoCr., Titanium, Zirconium Oxide, PMMA, and Wax. Dental end mills are available in various sizes, geometries, and coatings.&nbsp;</p><p><strong>Features -&nbsp;</strong></p><ul><li>GMG Special Micro Grain Carbide</li><li>2-flute end mill</li><li>Features a 30° helix angle</li><li>Diamond Coating – Graphite, Zirconium Oxide&nbsp;</li></ul><p><strong>Application -&nbsp;</strong></p><ul><li>Applicable for finishing, semi-finishing and profiling processes</li><li>Consumer electronics</li><li>Automotive parts</li><li>Semiconductor</li><li>Medical device</li><li>Aerospace parts</li><li>Die and Mold</li><li>Precision molding</li></ul><p>Check out the specifications, and feel free to contact us for technical support and further details.</p>', '1742035819.xlsx', '1742035819.pdf', '1742035819.pdf', '1742035819.webp', '1742190909.png', '1', '1', '3', 'new', '', '2025-03-15 05:20:19', '2025-03-17 02:14:37', '1', 'tcbf', NULL, NULL),
(9, 'TOBF', '1', '1', 'Same Days', '<p>HGT’s TOBF is a solid carbide long neck ball nose end mill with special angle ground for high-hardness. From crafting implants that demand the highest precision to manufacturing crowns, bridges, and partials, our dental end mills are versatile tools that elevate dental mold and medical equipment manufacturing. HGT provides a line of carbide end mills developed for dental use - DEN.pro series. They provide optimized solutions for various materials including CoCr., Titanium, Zirconium Oxide, PMMA, and Wax. Dental end mills are available in various sizes, geometries, and coatings.&nbsp;</p><p><strong>Features -&nbsp;</strong></p><ul><li>GMG Special Micro Grain Carbide</li><li>2-flute end mill</li><li>Features a 30° helix angle</li><li>Diamond Coating – Graphite, Zirconium Oxide&nbsp;</li></ul><p><strong>Application -&nbsp;</strong></p><ul><li>Applicable for finishing, semi-finishing and profiling processes</li><li>Consumer electronics</li><li>Automotive parts</li><li>Semiconductor</li><li>Medical device</li><li>Aerospace parts</li><li>Die and Mold</li><li>Precision molding</li></ul><p>Check out the specifications, and feel free to contact us for technical support and further details.</p>', '1742035901.xlsx', '1742035901.pdf', '1742035901.pdf', '1742035901.webp', '1742190887.png', '1', '1', '3', 'new', '', '2025-03-15 05:21:41', '2025-03-17 02:14:16', '1', 'tobf', NULL, NULL),
(10, 'TTFA', '1', '1', 'Same Days', '<p>HGT’s TTFA is a solid carbide long neck square end mill with special angle ground for high-hardness. From crafting implants that demand the highest precision to manufacturing crowns, bridges, and partials, our dental end mills are versatile tools that elevate dental mold and medical equipment manufacturing. HGT provides a line of carbide end mills developed for dental use - DEN.pro series. They provide optimized solutions for various materials including CoCr., Titanium, Zirconium Oxide, PMMA, and Wax. Dental end mills are available in various sizes, geometries, and coatings.&nbsp;</p><p><strong>Features -&nbsp;</strong></p><ul><li>TMG Special Micro Grain Carbide</li><li>For CoCr, Titanium</li><li>2-flute end mill</li><li>Features a 35° helix angle</li><li>G300 Coating – Tough Material – Titanium Alloy, Nickel Alloy, Stainless Steel and Heat Resistance Alloy&nbsp;</li></ul><p><strong>Application -&nbsp;</strong></p><ul><li>Applicable for finishing, semi-finishing and slotting processes</li><li>Consumer electronics</li><li>Automotive parts</li><li>Semiconductor</li><li>Medical device</li><li>Aerospace parts</li><li>Die and Mold</li><li>Precision molding</li></ul><p>Check out the specifications, and feel free to contact us for technical support and further details.</p>', '1742035974.xlsx', '1742035975.pdf', '1742035975.pdf', '1742035975.webp', '1742190869.png', '1', '1', '3', 'new', '', '2025-03-15 05:22:55', '2025-03-17 02:13:53', '1', 'ttfa', NULL, NULL),
(11, 'BA', '1', '1', 'Same Days', '<p>HGT’s BB is a solid carbide ball nose end mill with special angle ground for high-hardness workpieces up to HRC55. It applies to materials such as high/low alloy steel, cast steel, tool steel and cast iron. It is coated with TiaLN coating that offers excellent heat and friction resistance. Thus, it is suitable for general steel for wet cutting.</p><p><strong>Features -&nbsp;</strong></p><ul><li>MG Special Micro Grain Carbide</li><li>4-flute end mill</li><li>Features a 30° helix angle</li><li>TIaLN coating general steel for wet cutting&nbsp;</li></ul><p>&nbsp;</p><p>Application -&nbsp;</p><ul><li>Applicable for finishing, semi-finishing and profiling processes</li><li>Consumer electronics</li><li>Automotive parts</li><li>Semiconductor</li><li>Medical device</li><li>Aerospace parts</li><li>Die and Mold</li><li>Precision molding</li></ul><p>&nbsp;</p><p>Recommended Cutting Condition Hardened Steels:</p><ul><li>HRC30: S45C, FC, FCD, SCM, S50C, SKS …</li><li>HRC50: SCr, SNCM, SKD11, SKD61, NAK80 …</li><li>HRC60: SKD11</li></ul><p>&nbsp;</p><p>Check out the specifications, and feel free to contact us for technical support and further details.</p>', '1742037118.xlsx', '1742037118.pdf', '1742037118.pdf', '1742037118.webp', '1742191316.png', '1', '1', '4', '', '', '2025-03-15 05:41:58', '2025-03-17 00:33:02', '1', 'ba', NULL, '2025-03-17 00:33:02'),
(12, 'BA', '1', '1', 'Same Days', '<p>HGT’s BA is a solid carbide ball nose end mill with special angle ground for high-hardness workpieces up to HRC55. It applies to materials such as high/low alloy steel, cast steel, tool steel and cast iron. It is coated with TiaLN coating that offers excellent heat and friction resistance. Thus, it is suitable for general steel for wet cutting.</p><p><strong>Features -&nbsp;</strong></p><ul><li>MG Special Micro Grain Carbide</li><li>2-flute end mill</li><li>Features a 30° helix angle</li><li>TIaLN coating general steel for wet cutting&nbsp;</li></ul><p>&nbsp;</p><p><strong>Application -</strong>&nbsp;</p><ul><li>Applicable for finishing, semi-finishing and profiling processes</li><li>Consumer electronics</li><li>Automotive parts</li><li>Semiconductor</li><li>Medical device</li><li>Aerospace parts</li><li>Die and Mold</li><li>Precision molding</li></ul><p>&nbsp;</p><p>Recommended Cutting Condition Hardened Steels:</p><ul><li>HRC30: S45C, FC, FCD, SCM, S50C, SKS …</li><li>HRC50: SCr, SNCM, SKD11, SKD61, NAK80 …</li><li>HRC60: SKD11</li></ul><p>&nbsp;</p><p>Check out the specifications, and feel free to contact us for technical support and further details.</p>', NULL, '1742037201.pdf', '1742037201.pdf', '1742037201.webp', '1742191510.png', '1', '1', '4', 'new', '', '2025-03-15 05:43:21', '2025-03-17 00:35:10', '1', 'ba', NULL, NULL),
(13, 'BF', '1', '1', 'Same Days', '<p>HGT’s BF is a solid carbide long neck ball nose end mill with special angle ground for high-hardness workpieces up to HRC55. It applies to materials such as high/low alloy steel, cast steel, tool steel and cast iron. It is coated with TiaLN coating that offers excellent heat and friction resistance. Thus, it is suitable for general steel for wet cutting.</p><p><strong>Features -&nbsp;</strong></p><ul><li>MG Special Micro Grain Carbide</li><li>2-flute end mill</li><li>Features a 30° helix angle</li><li>TIaLN coating general steel for wet cutting&nbsp;</li></ul><p>&nbsp;</p><p><strong>Application -</strong>&nbsp;</p><ul><li>Applicable for finishing, semi-finishing and profiling processes</li><li>Consumer electronics</li><li>Automotive parts</li><li>Semiconductor</li><li>Medical device</li><li>Aerospace parts</li><li>Die and Mold</li><li>Precision molding</li></ul><p>&nbsp;</p><p><strong>Recommended Cutting Condition Hardened Steels:</strong></p><p>S45C, FC, FCD, SCM, S50C, SKS, SCr, SNCM, SKD11, SKD61, NAK80, SKD11</p><p>Check out the specifications, and feel free to contact us for technical support and further details.</p>', '1742037317.xlsx', '1742037318.pdf', '1742037318.pdf', '1742037318.webp', '1742191842.png', '1', '1', '4', '', '', '2025-03-15 05:45:18', '2025-03-17 00:40:42', '1', 'bf', NULL, NULL),
(14, 'BM', '1', '1', 'Same Days', '<p>HGT’s BM is a solid carbide micro diameter ball nose end mill with special angle ground for high-hardness workpieces up to HRC55. It applies to materials such as high/low alloy steel, cast steel, tool steel and cast iron. It is coated with TiaLN coating that offers excellent heat and friction resistance. Thus, it is suitable for general steel for wet cutting.</p><p><strong>Features -&nbsp;</strong></p><ul><li>MG Special Micro Grain Carbide</li><li>2-flute end mill</li><li>Features a 30° helix angle</li><li>TIaLN coating general steel for wet cutting&nbsp;</li></ul><p>&nbsp;</p><p>Application -&nbsp;</p><ul><li>Applicable for finishing, semi-finishing and profiling processes</li><li>Consumer electronics</li><li>Automotive parts</li><li>Semiconductor</li><li>Medical device</li><li>Aerospace parts</li><li>Die and Mold</li><li>Precision molding</li></ul><p>&nbsp;</p><p><strong>Recommended Cutting Condition Hardened Steels:</strong></p><ul><li>HRC30: S45C, FC, FCD, SCM, S50C, SKS …</li><li>HRC50: SCr, SNCM, SKD11, SKD61, NAK80 …</li><li>HRC60: SKD11</li></ul><p>&nbsp;</p><p>Check out the specifications, and feel free to contact us for technical support and further details.</p>', '1742037418.xlsx', '1742037418.pdf', '1742037418.pdf', '1742037418.webp', '1742192753.png', '1', '1', '4', '', '', '2025-03-15 05:46:58', '2025-03-17 00:55:53', '1', 'bm', NULL, NULL),
(15, 'BS', '1', '1', 'Same Days', '<p>HGT’s BS is a solid carbide small shank ball nose end mill with special angle ground for high-hardness workpieces up to HRC55. It applies to materials such as high/low alloy steel, cast steel, tool steel and cast iron. It is coated with TiaLN coating that offers excellent heat and friction resistance. Thus, it is suitable for general steel for wet cutting.</p><p><strong>Features -&nbsp;</strong></p><ul><li>MG Special Micro Grain Carbide</li><li>2-flute end mill</li><li>Features a 30° helix angle</li><li>TIaLN coating general steel for wet cutting&nbsp;</li></ul><p>&nbsp;</p><p><strong>Application -</strong>&nbsp;</p><ul><li>Applicable for finishing, semi-finishing and profiling processes</li><li>Consumer electronics</li><li>Automotive parts</li><li>Semiconductor</li><li>Medical device</li><li>Aerospace parts</li><li>Die and Mold</li><li>Precision molding</li></ul><p>&nbsp;</p><p><strong>Recommended Cutting Condition Hardened Steels:</strong></p><ul><li>HRC30: S45C, FC, FCD, SCM, S50C, SKS …</li><li>HRC50: SCr, SNCM, SKD11, SKD61, NAK80 …</li><li>HRC60: SKD11</li></ul><p>&nbsp;</p><p>Check out the specifications, and feel free to contact us for technical support and further details.</p>', '1742037546.xlsx', '1742037546.pdf', '1742037546.pdf', '1742037546.webp', '1742192022.png', '1', '1', '4', '', '', '2025-03-15 05:49:06', '2025-03-17 00:43:42', '1', 'bs', NULL, NULL),
(16, 'EB', '1', '1', 'Same Days', '<p>HGT’s EB is a solid carbide square end mill with special angle ground for high-hardness workpieces up to HRC55. It applies to materials such as high/low alloy steel, cast steel, tool steel and cast iron. It is coated with TiaLN coating that offers excellent heat and friction resistance. Thus, it is suitable for general steel for wet cutting.</p><p><strong>Features -&nbsp;</strong></p><ul><li>MG Special Micro Grain Carbide</li><li>4-flute end mill</li><li>Features a 35° helix angle</li><li>TIaLN coating general steel for wet cutting&nbsp;</li></ul><p>&nbsp;</p><p><strong>Application -</strong>&nbsp;</p><ul><li>Applicable for finishing, semi-finishing, side cutting and planing processes</li><li>Consumer electronics</li><li>Automotive parts</li><li>Semiconductor</li><li>Medical device</li><li>Aerospace parts</li><li>Die and Mold</li><li>Precision molding</li></ul><p>&nbsp;</p><p><strong>Recommended Cutting Condition Hardened Steels:</strong></p><ul><li>HRC30: S45C, FC, FCD, SCM, S50C, SKS …</li><li>HRC50: SCr, SNCM, SKD11, SKD61, NAK80 …</li><li>HRC60: SKD11</li></ul><p>&nbsp;</p><p>Check out the specifications, and feel free to contact us for technical support and further details.</p>', '1742037706.xlsx', '1742037706.pdf', '1742037706.pdf', '1742037706.webp', '1742192124.png', '1', '1', '4', '', '', '2025-03-15 05:51:46', '2025-03-17 00:45:24', '1', 'eb', NULL, NULL),
(17, 'EFA', '1', '1', 'Same Days', '<p>HGT’s EFA is a solid carbide long neck square end mill with special angle ground for high-hardness workpieces up to HRC55. It applies to materials such as high/low alloy steel, cast steel, tool steel and cast iron. It is coated with TiaLN coating that offers excellent heat and friction resistance. Thus, it is suitable for general steel for wet cutting.</p><p><strong>Features -&nbsp;</strong></p><ul><li>MG Special Micro Grain Carbide</li><li>2-flute end mill</li><li>Features a 35° helix angle</li><li>TIaLN coating general steel for wet cutting&nbsp;</li></ul><p>&nbsp;</p><p><strong>Application -</strong>&nbsp;</p><ul><li>Applicable for finishing, semi-finishing and slotting processes</li><li>Consumer electronics</li><li>Automotive parts</li><li>Semiconductor</li><li>Medical device</li><li>Aerospace parts</li><li>Die and Mold</li><li>Precision molding</li></ul><p>&nbsp;</p><p><strong>Recommended Cutting Condition Hardened Steels:</strong></p><p>S45C, FC, FCD, SCM, S50C, SKS, SCr, SNCM, SKD11, SKD61, NAK80, SKD11</p><p>Check out the specifications, and feel free to contact us for technical support and further details.</p>', '1742037790.xlsx', '1742037790.pdf', '1742037790.pdf', '1742037790.webp', '1742192217.png', '1', '1', '4', '', '', '2025-03-15 05:53:10', '2025-03-17 00:46:57', '1', 'efa', NULL, NULL),
(18, 'ELB', '1', '1', 'Same Days', '<p>HGT’s ELB is a solid carbide long shank square end mill with special angle ground for high-hardness workpieces up to HRC55. It applies to materials such as high/low alloy steel, cast steel, tool steel and cast iron. It is coated with TiaLN coating that offers excellent heat and friction resistance. Thus, it is suitable for general steel for wet cutting.</p><p><strong>Features -&nbsp;</strong></p><ul><li>MG Special Micro Grain Carbide</li><li>4-flute end mill</li><li>Features a 35° helix angle</li><li>TIaLN coating general steel for wet cutting&nbsp;</li></ul><p>&nbsp;</p><p><strong>Application -</strong>&nbsp;</p><ul><li>Applicable for finishing, semi-finishing, side cutting and planing processes</li><li>Consumer electronics</li><li>Automotive parts</li><li>Semiconductor</li><li>Medical device</li><li>Aerospace parts</li><li>Die and Mold</li><li>Precision molding</li></ul><p>&nbsp;</p><p><strong>Recommended Cutting Condition Hardened Steels:</strong></p><ul><li>HRC30: S45C, FC, FCD, SCM, S50C, SKS …</li><li>HRC50: SCr, SNCM, SKD11, SKD61, NAK80 …</li><li>HRC60: SKD11</li></ul><p>&nbsp;</p><p>Check out the specifications, and feel free to contact us for technical support and further details.</p>', '1742038052.xlsx', '1742038052.pdf', '1742038052.pdf', '1742038052.webp', '1742192321.png', '1', '1', '4', '', '', '2025-03-15 05:57:32', '2025-03-17 00:48:41', '1', 'elb', NULL, NULL),
(19, 'ELD', '1', '1', 'Same Days', '<p>HGT’s ELD is a solid carbide long flute square end mill with special angle ground for high-hardness workpieces up to HRC55. It applies to materials such as high/low alloy steel, cast steel, tool steel and cast iron. It is coated with TiaLN coating that offers excellent heat and friction resistance. Thus, it is suitable for general steel for wet cutting.</p><p><strong>Features -&nbsp;</strong></p><ul><li>MG Special Micro Grain Carbide</li><li>4-flute end mill</li><li>Features a 35° helix angle</li><li>TIaLN coating general steel for wet cutting&nbsp;</li></ul><p>&nbsp;</p><p><strong>Application -</strong>&nbsp;</p><ul><li>Applicable for finishing, semi-finishing, side cutting and planing processes</li><li>Consumer electronics</li><li>Automotive parts</li><li>Semiconductor</li><li>Medical device</li><li>Aerospace parts</li><li>Die and Mold</li><li>Precision molding</li></ul><p>&nbsp;</p><ul><li><strong>Recommended Cutting Condition Hardened Steels:</strong></li><li>HRC30: S45C, FC, FCD, SCM, S50C, SKS …</li><li>HRC50: SCr, SNCM, SKD11, SKD61, NAK80 …</li><li>HRC60: SKD11</li></ul><p>&nbsp;</p><p>Check out the specifications, and feel free to contact us for technical support and further details.</p>', '1742038167.xlsx', '1742038167.pdf', '1742038167.pdf', '1742038167.webp', '1742192441.png', '1', '1', '4', '', '', '2025-03-15 05:59:27', '2025-03-17 00:50:41', '1', 'eld', NULL, NULL),
(20, 'EM', '1', '1', 'Same Days', '<p>HGT’s EM is a solid carbide micro diameter square end mill with special angle ground for high-hardness workpieces up to HRC55. It applies to materials such as high/low alloy steel, cast steel, tool steel and cast iron. It is coated with TiaLN coating that offers excellent heat and friction resistance. Thus, it is suitable for general steel for wet cutting.</p><p><strong>Features -&nbsp;</strong></p><ul><li>MG Special Micro Grain Carbide</li><li>2-flute end mill</li><li>Features a 35° helix angle</li><li>TIaLN coating general steel for wet cutting&nbsp;</li></ul><p>&nbsp;</p><p><strong>Application -</strong>&nbsp;</p><ul><li>Applicable for finishing, semi-finishing and slotting processes</li><li>Consumer electronics</li><li>Automotive parts</li><li>Semiconductor</li><li>Medical device</li><li>Aerospace parts</li><li>Die and Mold</li><li>Precision molding</li></ul><p>&nbsp;</p><p><strong>Recommended Cutting Condition Hardened Steels:</strong></p><ul><li>HRC30: S45C, FC, FCD, SCM, S50C, SKS …</li><li>HRC50: SCr, SNCM, SKD11, SKD61, NAK80 …</li><li>HRC60: SKD11</li></ul><p>&nbsp;</p><p>Check out the specifications, and feel free to contact us for technical support and further details.</p>', '1742038290.xlsx', '1742038290.pdf', '1742038290.pdf', '1742038290.webp', '1742192522.png', '1', '1', '4', '', '', '2025-03-15 06:01:30', '2025-03-17 00:52:02', '1', 'em', NULL, NULL),
(21, 'ERB', '1', '1', 'Same Days', '<p>HGT’s ERB is a solid carbide corner radius end mill with special angle ground for high-hardness workpieces up to HRC55. It applies to materials such as high/low alloy steel, cast steel, tool steel and cast iron. It is coated with TiaLN coating that offers excellent heat and friction resistance. Thus, it is suitable for general steel for wet cutting.</p><p><strong>Features -&nbsp;</strong></p><ul><li>MG Special Micro Grain Carbide</li><li>4-flute end mill</li><li>Features a 35° helix angle</li><li>TIaLN coating general steel for wet cutting&nbsp;</li></ul><p>&nbsp;</p><p><strong>Application -</strong>&nbsp;</p><ul><li>Applicable for finishing, semi-finishing, side cutting and profiling processes</li><li>Consumer electronics</li><li>Automotive parts</li><li>Semiconductor</li><li>Medical device</li><li>Aerospace parts</li><li>Die and Mold</li><li>Precision molding</li></ul><p>&nbsp;</p><p><strong>Recommended Cutting Condition Hardened Steels:</strong></p><ul><li>HRC30: S45C, FC, FCD, SCM, S50C, SKS …</li><li>HRC50: SCr, SNCM, SKD11, SKD61, NAK80 …</li><li>HRC60: SKD11</li></ul><p>&nbsp;</p><p>Check out the specifications, and feel free to contact us for technical support and further details.</p>', '1742038401.xlsx', '1742038401.pdf', '1742038401.pdf', '1742038401.webp', '1742192607.png', '1', '1', '4', '', '', '2025-03-15 06:03:21', '2025-03-17 00:53:27', '1', 'erb', NULL, NULL),
(22, 'ERC', '1', '1', 'Same Days', '<p>HGT’s ERC is a solid carbide long shank corner radius end mill with special angle ground for high-hardness workpieces up to HRC55. It applies to materials such as high/low alloy steel, cast steel, tool steel and cast iron. It is coated with TiaLN coating that offers excellent heat and friction resistance. Thus, it is suitable for general steel for wet cutting.</p><p><strong>Features -&nbsp;</strong></p><ul><li>MG Special Micro Grain Carbide</li><li>4-flute end mill</li><li>Features a 35° helix angle</li><li>TIaLN coating general steel for wet cutting&nbsp;</li></ul><p>&nbsp;</p><p><strong>Application -</strong>&nbsp;</p><ul><li>Applicable for finishing, semi-finishing, side cutting and profiling processes</li><li>Consumer electronics</li><li>Automotive parts</li><li>Semiconductor</li><li>Medical device</li><li>Aerospace parts</li><li>Die and Mold</li><li>Precision molding</li></ul><p>&nbsp;</p><p><strong>Recommended Cutting Condition Hardened Steels:</strong></p><ul><li>HRC30: S45C, FC, FCD, SCM, S50C, SKS …</li><li>HRC50: SCr, SNCM, SKD11, SKD61, NAK80 …</li><li>HRC60: SKD11</li></ul><p>&nbsp;</p><p>Check out the specifications, and feel free to contact us for technical support and further details.</p>', '1742038539.xlsx', '1742038539.pdf', '1742038539.pdf', '1742038539.webp', '1742192678.png', '1', '1', '4', '', '', '2025-03-15 06:05:39', '2025-03-17 00:54:38', '1', 'erc', NULL, NULL),
(23, 'SGBB', '1', '1', 'Same Days', '<p>HGT’s SGBB is a solid carbide ball nose end mill with special angle ground for high-hardness. HGT offers a comprehensive range of diamond-coated end mills specially designed for graphite cutting. Machining graphite poses unique challenges due to its soft, abrasive, and brittle nature. HGT proudly offers carbide end mills with CVD diamond coating to ensure effective graphite machining, which provides exceptional abrasion resistance, maximizes tool life, and enhances overall performance. Made from GMG carbide material, these end mills offer perfect anti-vibration properties, ensuring stability during machining. With HGT\'s carbide end mill for graphite, you can be confident of achieving precise and high-quality graphite machining results. It applies to materials such as aluminum alloy, copper alloys and non-metallic alloys.&nbsp;</p><p><strong>Features -&nbsp;</strong></p><ul><li>GMG Special Micro Grain Carbide</li><li>4-flute end mill</li><li>Features a 35° helix angle</li><li>Diamond Coating – Graphite, Zirconium Oxide&nbsp;</li></ul><p>&nbsp;</p><p><strong>Application -</strong>&nbsp;</p><ul><li>Applicable for finishing, semi-finishing and profiling processes</li><li>Consumer electronics</li><li>Automotive parts</li><li>Semiconductor</li><li>Medical device</li><li>Aerospace parts</li><li>Die and Mold</li><li>Precision molding</li><li>&nbsp;</li><li>Check out the specifications, and feel free to contact us for technical support and further details.</li></ul>', '1742039734.xlsx', '1742039734.pdf', '1742039734.pdf', '1742039734.webp', '1742193089.png', '1', '1', '5', '', '', '2025-03-15 06:25:34', '2025-03-17 01:01:29', '1', 'sgbb', NULL, NULL),
(24, 'SGBF', '1', '1', 'Same Days', '<p>HGT’s SGBF is a solid carbide ball nose end mill with special angle ground for high-hardness. HGT offers a comprehensive range of diamond-coated end mills specially designed for graphite cutting. Machining graphite poses unique challenges due to its soft, abrasive, and brittle nature. HGT proudly offers carbide end mills with CVD diamond coating to ensure effective graphite machining, which provides exceptional abrasion resistance, maximizes tool life, and enhances overall performance. Made from GMG carbide material, these end mills offer perfect anti-vibration properties, ensuring stability during machining. With HGT\'s carbide end mill for graphite, you can be confident of achieving precise and high-quality graphite machining results. It applies to materials such as aluminum alloy, copper alloys and non-metallic alloys.&nbsp;</p><p><strong>Features -&nbsp;</strong></p><ul><li>GMG Special Micro Grain Carbide</li><li>4-flute end mill</li><li>Features a 35° helix angle</li><li>Diamond Coating – Graphite, Zirconium Oxide&nbsp;</li></ul><p>&nbsp;</p><p><strong>Application -</strong>&nbsp;</p><ul><li>Applicable for finishing, semi-finishing and profiling processes</li><li>Consumer electronics</li><li>Automotive parts</li><li>Semiconductor</li><li>Medical device</li><li>Aerospace parts</li><li>Die and Mold</li><li>Precision molding</li></ul><p>&nbsp;</p><p>Check out the specifications, and feel free to contact us for technical support and further details.</p>', NULL, '1742039817.pdf', '1742039817.pdf', '1742039817.webp', '1742193186.png', '1', '1', '5', '', '', '2025-03-15 06:26:57', '2025-03-17 01:03:06', '1', 'sgbf', NULL, NULL),
(25, 'SGBS', '1', '1', 'Same Days', '<p>HGT’s SGBS is a solid carbide ball nose end mill with special angle ground for high-hardness. HGT offers a comprehensive range of diamond-coated end mills specially designed for graphite cutting. Machining graphite poses unique challenges due to its soft, abrasive, and brittle nature. HGT proudly offers carbide end mills with CVD diamond coating to ensure effective graphite machining, which provides exceptional abrasion resistance, maximizes tool life, and enhances overall performance. Made from GMG carbide material, these end mills offer perfect anti-vibration properties, ensuring stability during machining. With HGT\'s carbide end mill for graphite, you can be confident of achieving precise and high-quality graphite machining results. It applies to materials such as aluminum alloy, copper alloys and non-metallic alloys.&nbsp;</p><p><strong>Features -&nbsp;</strong></p><ul><li>GMG Special Micro Grain Carbide</li><li>2-flute end mill</li><li>Features a 30° helix angle</li><li>Diamond Coating – Graphite, Zirconium Oxide&nbsp;</li></ul><p>&nbsp;</p><p><strong>Application -</strong>&nbsp;</p><ul><li>Applicable for finishing, semi-finishing and profiling processes</li><li>Consumer electronics</li><li>Automotive parts</li><li>Semiconductor</li><li>Medical device</li><li>Aerospace parts</li><li>Die and Mold</li><li>Precision molding</li></ul><p>&nbsp;</p><p>Check out the specifications, and feel free to contact us for technical support and further details.</p>', '1742039922.xlsx', '1742039923.pdf', '1742039923.pdf', '1742039923.webp', '1742193282.png', '1', '1', '5', '', '', '2025-03-15 06:28:43', '2025-03-17 01:04:42', '1', 'sgbs', NULL, NULL),
(26, 'SGEB', '1', '1', 'Same Days', '<p>HGT’s SGEB is a solid carbide ball nose end mill with special angle ground for high-hardness. HGT offers a comprehensive range of diamond-coated end mills specially designed for graphite cutting. Machining graphite poses unique challenges due to its soft, abrasive, and brittle nature. HGT proudly offers carbide end mills with CVD diamond coating to ensure effective graphite machining, which provides exceptional abrasion resistance, maximizes tool life, and enhances overall performance. Made from GMG carbide material, these end mills offer perfect anti-vibration properties, ensuring stability during machining. With HGT\'s carbide end mill for graphite, you can be confident of achieving precise and high-quality graphite machining results. It applies to materials such as aluminum alloy, copper alloys and non-metallic alloys.&nbsp;</p><p><strong>Features -&nbsp;</strong></p><ul><li>GMG Special Micro Grain Carbide</li><li>4-flute end mill</li><li>Features a 45° helix angle</li><li>Diamond Coating – Graphite, Zirconium Oxide&nbsp;</li></ul><p>&nbsp;</p><p><strong>Application -</strong>&nbsp;</p><ul><li>Applicable for finishing, semi-finishing, planning and side cutting processes</li><li>Consumer electronics</li><li>Automotive parts</li><li>Semiconductor</li><li>Medical device</li><li>Aerospace parts</li><li>Die and Mold</li><li>Precision molding</li></ul><p>&nbsp;</p><p>Check out the specifications, and feel free to contact us for technical support and further details.</p>', NULL, '1742040024.pdf', '1742040024.pdf', '1742040024.webp', '1742193354.png', '1', '1', '5', '', '', '2025-03-15 06:30:24', '2025-03-17 01:05:54', '1', 'sgeb', NULL, NULL),
(27, 'SGES', '1', '1', 'Same Days', '<p>HGT’s SGES is a solid carbide ball nose end mill with special angle ground for high-hardness. HGT offers a comprehensive range of diamond-coated end mills specially designed for graphite cutting. Machining graphite poses unique challenges due to its soft, abrasive, and brittle nature. HGT proudly offers carbide end mills with CVD diamond coating to ensure effective graphite machining, which provides exceptional abrasion resistance, maximizes tool life, and enhances overall performance. Made from GMG carbide material, these end mills offer perfect anti-vibration properties, ensuring stability during machining. With HGT\'s carbide end mill for graphite, you can be confident of achieving precise and high-quality graphite machining results. It applies to materials such as aluminum alloy, copper alloys and non-metallic alloys.&nbsp;</p><p><strong>Features -&nbsp;</strong></p><ul><li>GMG Special Micro Grain Carbide</li><li>4-flute end mill</li><li>Features a 30° helix angle</li><li>Diamond Coating – Graphite, Zirconium Oxide&nbsp;</li></ul><p>&nbsp;</p><p>Application -&nbsp;</p><ul><li>Applicable for finishing, semi-finishing and slotting processes</li><li>Consumer electronics</li><li>Automotive parts</li><li>Semiconductor</li><li>Medical device</li><li>Aerospace parts</li><li>Die and Mold</li><li>Precision molding</li></ul><p>&nbsp;</p><p>Check out the specifications, and feel free to contact us for technical support and further details.</p>', '1742040212.xlsx', '1742040212.pdf', '1742040212.pdf', '1742040212.webp', '1742193422.png', '1', '1', '5', '', '', '2025-03-15 06:33:32', '2025-03-17 01:07:02', '1', 'sges', NULL, NULL),
(28, 'Ball nose for Hardened Steels HRC65 - QBN', '1', '1', 'Same Days', '<p>HGT’s QBN is a solid carbide ball nose end mill with special angle ground for high-hardness workpieces up to HRC65. It applies to materials such as hardened steel, high/low alloy steel, cast steel, tool steel and cast iron. It is coated with nAcoB coating that offers excellent heat and friction resistance. Thus, it is suitable for high hard steel for dry cutting.</p><p><strong>Features -&nbsp;</strong></p><ul><li>QMG Special Micro Grain Carbide</li><li>2-flute end mill</li><li>Features a 30° helix angle</li><li>nAcoB coating high hard steel for dry cutting&nbsp;</li></ul><p>&nbsp;</p><p><strong>Application -</strong>&nbsp;</p><ul><li>Applicable for finishing, semi-finishing and profiling processes</li><li>Consumer electronics</li><li>Automotive parts</li><li>Semiconductor</li><li>Medical device</li><li>Aerospace parts</li><li>Die and Mold</li><li>Precision molding</li></ul><p>&nbsp;</p><p><strong>Recommended Cutting Condition Hardened Steels:</strong></p><ul><li>HRC30: S45C, FC, FCD, SCM, S50C, SKS</li><li>HRC50: SCr, SNCM, SKD11, SKD61, NAK80</li><li>HRC60: SKD11</li></ul><p>&nbsp;</p><p>Check out the specifications, and feel free to contact us for technical support and further details.</p>', '1742041273.xlsx', '1742041273.pdf', '1742041273.pdf', '1742041273.webp', '1742193532.png', '1', '1', '6', '', '', '2025-03-15 06:51:13', '2025-03-17 01:08:53', '1', 'ball-nose-for-hardened-steels-hrc65-qbn', NULL, NULL),
(29, 'Corner Radius for Hardened Steels HRC65 – QRD', '1', '1', 'Same Days', '<p>HGT’s QRD is a solid carbide corner radius end mill with special angle ground for high-hardness workpieces up to HRC65. It applies to materials such as hardened steel, high/low alloy steel, cast steel, tool steel and cast iron. It is coated with ALTiN coating that offers excellent heat and friction resistance. Thus, it is suitable for high hard steel for dry cutting.</p><p><strong>Features -&nbsp;</strong></p><ul><li>QMG Special Micro Grain Carbide</li><li>4-fluteS end mill</li><li>Features a 35° helix angle</li><li>ALTiN coating high hard steel for dry cutting&nbsp;</li></ul><p>&nbsp;</p><p><strong>Application -</strong>&nbsp;</p><ul><li>Applicable for side cutting process</li><li>Consumer electronics</li><li>Automotive parts</li><li>Semiconductor</li><li>Medical device</li><li>Aerospace parts</li><li>Die and Mold</li><li>Precision molding</li></ul><p>&nbsp;</p><p><strong>Recommended Cutting Condition Hardened Steels:</strong></p><ul><li>HRC30: S45C, FC, FCD, SCM, S50C, SKS …</li><li>HRC50: SCr, SNCM, SKD11, SKD61, NAK80 …</li><li>HRC60: SKD11S</li></ul><p>&nbsp;</p><p>Check out the specifications, and feel free to contact us for technical support and further details.</p><p>&nbsp;</p>', '1742041385.xlsx', '1742041385.pdf', '1742041385.pdf', '1742041385.webp', '1742193614.png', '1', '1', '6', '', '', '2025-03-15 06:53:05', '2025-03-17 01:10:14', '1', 'corner-radius-for-hardened-steels-hrc65-qrd', NULL, NULL),
(30, 'LONG SHANK - CORNER RADIUS FOR HARDENED STEELS HRC65 - QERC', '1', '1', 'Same Days', '<p>A corner radius end mill, also known as a bull-nose or&nbsp;<strong>corner rounding end mill</strong>, is a flexible tool to create rounded corners, fillets, and radii at the bottom of a milled shoulder. Its primary purposes also include performing finishing tasks, such as removing burrs or sharp edges. This tool effectively replaces sharp corners with rounded profiles, promoting even distribution of cutting forces across the corner. This not only helps prevent wear and chipping but also extends the tool\'s functional lifespan. You\'ll be able to enjoy a longer tool life and complete your projects more efficiently. HGT’s long shank corner radius end mills come in various diameter sizes and lengths to meet clients\' requirements.<br>Our corner radius end mills are suitable for machining various materials, such as hardened steel, cast iron, low/high alloy steel, cast steel, and tool steel. They are coated with ALTiN, making them practical for cutting hardened steel. They are applicable for both dry and wet cutting processes, typically ranging from HRC45 to HRC65.</p><p><strong>Features</strong></p><ul><li>Crafted from high-performance K10-K20 grade solid carbide</li><li>4-flute end mill</li><li>Features a 35° helix angle</li><li>Equipped with ALTiN coating for an extended tool life</li><li>Long shank for better reach and clearance&nbsp;</li></ul><p>&nbsp;</p><p><strong>Application</strong></p><ul><li>Applicable for profiling, semi-finishing, and finishing processes</li><li>Consumer electronics</li><li>Automotive parts</li><li>Semiconductor</li><li>Fastener</li><li>Plumbing hardware</li><li>Medical equipment</li><li>Aerospace parts</li><li>Precision molding</li></ul><p>&nbsp;</p><p><strong>Recommended Cutting Condition –</strong>&nbsp;</p><ul><li>HRC30: S45C, FC, FCD, SCM, S50C, SKS …</li><li>HRC50: SCr, SNCM, SKD11, SKD61, NAK80 …<br>HRC60: SKD11</li></ul><p>&nbsp;</p><p>Check out the specifications, and feel free to&nbsp;contact us&nbsp;for technical support and further details.</p>', '1742041505.xlsx', '1742041505.pdf', '1742041505.pdf', '1742041505.webp', '1742194197.png', '1', '1', '6', '', '', '2025-03-15 06:55:05', '2025-03-17 01:19:57', '1', 'long-shank-corner-radius-for-hardened-steels-hrc65-qerc', NULL, NULL),
(31, 'Square for Hardened Steels HRC65 – QEB', '1', '1', 'Same Days', '<p>HGT’s QEB is a solid carbide square end mill with special angle ground for high-hardness workpieces up to HRC65. It applies to materials such as hardened steel, high/low alloy steel, cast steel, tool steel and cast iron. It is coated with ALTiN coating that offers excellent heat and friction resistance. Thus, it is suitable for high hard steel for dry cutting.</p><p><strong>Features -&nbsp;</strong></p><ul><li>QMG Special Micro Grain Carbide</li><li>4-flute end mill</li><li>Features a 45° helix angle</li><li>ALTiN coating high hard steel for dry cutting&nbsp;</li></ul><p>&nbsp;</p><p><strong>Application -</strong>&nbsp;</p><ul><li>Applicable for finishing, semi-finishing and side milling processes</li><li>Consumer electronics</li><li>Automotive parts</li><li>Semiconductor</li><li>Medical device</li><li>Aerospace parts</li><li>Die and Mold</li><li>Precision molding</li></ul><p>&nbsp;</p><p><strong>Recommended Cutting Condition Hardened Steels:</strong></p><ul><li>HRC30: S45C, FC, FCD, SCM, S50C, SKS</li><li>HRC50: SCr, SNCM, SKD11, SKD61, NAK80</li><li>HRC60: SKD11</li></ul><p>&nbsp;</p><p>Check out the specifications, and feel free to contact us for technical support and further details.</p>', '1742041590.xlsx', '1742041590.pdf', '1742041590.pdf', '1742041590.webp', '1742194272.png', '1', '1', '6', '', '', '2025-03-15 06:56:30', '2025-03-17 01:21:12', '1', 'square-for-hardened-steels-hrc65-qeb', NULL, NULL),
(32, 'SQUARE FOR HARDENED STEELS HRC65 - QEBN', '1', '1', 'Same Days', '<p><strong>Flat end mills</strong>, or&nbsp;<strong>square end mills</strong>, can work in demanding environments. They have cutting edges that are both wear-resistant and high-precision. As a result, they excel at improving processing efficiency and accuracy. They serve as versatile end mills suitable for various applications, including face milling, shoulder milling, slotting, and side milling.<br>HGT\'s QEBN Solid Carbide 4 Flute Square End Mill is designed for workpiece hardness up to HRC65. This high-performance tool can be effectively employed on materials such as hardened steel, cast iron, low/high alloy steel, cast steel, and tool steel. It features a heat-resistant nAcoB coating, making it particularly well-suited for dry machining, although it\'s not recommended for wet machining.&nbsp;</p><p><strong>Features -&nbsp;</strong></p><ul><li>4 Flute Square End Mill for workpiece hardness up to HRC65.</li><li>45° helix angle design</li><li>Heat-resistant nAcoB coating</li></ul><p>&nbsp;</p><p><strong>Application -</strong>&nbsp;</p><ul><li>Precision molds</li><li>Semiconductor</li><li>Automotive and motorcycle parts</li><li>Aerospace parts</li><li>Electronic communications</li><li>Watches and glasses</li><li>Sports equipment</li><li>Medical equipment</li></ul><p>&nbsp;</p><p><strong>Recommended Cutting Material and Hardness</strong></p><ul><li>HRC30: S45C, FC, FCD, SCM, S50C, SKS…</li><li>HRC50: SCr, SNCM, SKD11, SKD61, NAK80…</li><li>HRC60: SKD11</li></ul><p>&nbsp;</p><p>Check out the specifications, and feel free to contact us for technical support and further details.</p>', '1742041689.xlsx', '1742041689.pdf', '1742041689.pdf', '1742041689.webp', '1742194626.png', '1', '1', '6', '', '', '2025-03-15 06:58:09', '2025-03-17 01:27:06', '1', 'square-for-hardened-steels-hrc65-qebn', NULL, NULL),
(33, 'EX2CS', '1', '1', 'Same Days', '<p>HGT’s EX2CS is a carbide shank.</p><p>Check out the specifications, and feel free to contact us for technical support and further details.</p>', '1742042097.xlsx', '1742042098.pdf', '1742042098.pdf', '1742042098.webp', '1742194677.png', '1', '1', '7', '', '', '2025-03-15 07:04:58', '2025-03-17 01:27:57', '1', 'ex2cs', NULL, NULL),
(34, 'EX2SB', '1', '1', 'Same Days', '<p>HGT’s EX2SB is a ball nose shank. It applies to materials such as hardened steel, high/low alloy steel, cast steel, tool steel and cast iron.&nbsp;</p><p><strong>Features -&nbsp;</strong></p><ul><li>SMG Special Micro Grain Carbide</li><li>2-flute end mill</li><li>Features a 30° helix angle</li><li>Work Material Hardness – HRC 60</li><li>i8 Coating - High Hard Steel for Dry and Wet Cutting</li><li>Applicable for Finishing, semi-finishing and profiling processes</li></ul><p>&nbsp;</p><p>Check out the specifications, and feel free to contact us for technical support and further details.</p>', '1742042179.xlsx', '1742042179.pdf', '1742042179.pdf', '1742042179.webp', '1742194738.png', '1', '1', '7', '', '', '2025-03-15 07:06:19', '2025-03-17 01:28:58', '1', 'ex2sb', NULL, NULL);
INSERT INTO `products` (`id`, `product_name`, `product_quantity`, `product_price`, `product_dispatch`, `product_discription`, `product_specs`, `product_catalouge`, `product_pdf`, `product_drawing`, `product_thumbain`, `product_brand_id`, `product_category_id`, `product_sub_category_id`, `product_arrivals`, `product_sale`, `created_at`, `updated_at`, `status`, `product_slug`, `product_optional_pdf`, `deleted_at`) VALUES
(35, 'EX2SRD', '1', '1', 'Same Days', '<p>HGT’s EX2SRD is a corner radius end mill. It applies to materials such as hardened steel, high/low alloy steel, cast steel, tool steel and cast iron.</p><p><strong>Features -&nbsp;</strong></p><ul><li>SMG Special Micro Grain Carbide</li><li>4-flute end mill</li><li>Features a 45° helix angle</li><li>Work Material Hardness – HRC 60</li><li>i8 Coating - High Hard Steel for Dry and Wet Cutting</li><li>Applicable for Finishing, semi-finishing, profiling and side cutting processes</li></ul><p>&nbsp;</p><p>Check out the specifications, and feel free to contact us for technical support and further details.</p>', '1742042267.xlsx', '1742042267.pdf', '1742042267.pdf', '1742042267.webp', '1742194795.png', '1', '1', '7', '', '', '2025-03-15 07:07:47', '2025-03-17 01:29:55', '1', 'ex2srd', NULL, NULL),
(36, 'CRA', '1', '1', 'Same Days', '<p>HGT’s CRA is a solid carbide reamer with special angle ground for high-hardness. It applies to materials such as Hardened Steel, Low alloy steel, High alloy steel, cast steel, tool steel and cast iron.</p><p><strong>Features -&nbsp;</strong></p><ul><li>MG Special Micro Grain Carbide</li><li>Features a 7° helix angle</li></ul><p>&nbsp;</p><p><strong>Application -</strong>&nbsp;</p><ul><li>Applicable for finishing purpose</li><li>Consumer electronics</li><li>Automotive parts</li><li>Semiconductor</li><li>Medical device</li><li>Aerospace parts</li><li>Die and Mold</li><li>Precision molding</li></ul><p>&nbsp;</p><p><strong>Recommended Cutting Condition&nbsp;–</strong></p><ul><li>HRC40 – Carbon Steels, Alloy Steels</li><li>HRC45 – Alloy Steels, Tool Steelsssss &nbsp;</li></ul><p>&nbsp;</p><p>Check out the specifications, and feel free to contact us for technical support and further details.</p>', '1742042419.xlsx', '1742042419.pdf', '1742042419.pdf', '1742042419.webp', '1742194883.png', '1', '1', '8', '', '', '2025-03-15 07:10:19', '2025-03-17 01:31:23', '1', 'cra', NULL, NULL),
(37, 'EMT', '1', '1', 'Same Days', '<p>HGT’s EMT is a solid carbide internal threading with special angle ground for high-hardness workpieces up to HRC55. It applies to materials such as high/low alloy steel, cast steel, tool steel, cast iron, stainless steel, high temp. alloys, titanium and Ti alloys, aluminum alloy, copper alloys and non-metallic alloys. It is coated with G100 coating that offers excellent heat and friction resistance. Thus, it is suitable for general steel for wet cutting. Thread mills are rotary tools used to craft internal and external threads with precision. They can produce high-quality threaded components.<br>HGT\'s T.pro Series thread mills are durable and versatile for threading on materials with hardness ranging from HRC55 to HRC60. The mills have a new design that optimizes chip removal, ensuring smoother and more efficient operations. HGT offers straight and helical flute designs with straight coolant holes to address temperature concerns, reduce cutting forces, and facilitate superior chip removal.&nbsp;</p><p><strong>Features -&nbsp;</strong></p><ul><li>MG Special Micro Grain Carbide</li><li>G100 coating general steel for wet cutting&nbsp;</li></ul><p>&nbsp;</p><p><strong>Application -</strong>&nbsp;</p><ul><li>Applicable for finishing, semi-finishing processes</li><li>Consumer electronics</li><li>Automotive parts</li><li>Semiconductor</li><li>Medical device</li><li>Aerospace parts</li><li>Die and Mold</li><li>Precision molding</li></ul><p>&nbsp;</p><p>Check out the specifications, and feel free to contact us for technical support and further details.</p>', '1742043396.xlsx', '1742043396.pdf', '1742043396.pdf', '1742043396.webp', '1742195002.png', '1', '1', '10', '', '', '2025-03-15 07:26:36', '2025-03-17 01:33:22', '1', 'emt', NULL, NULL),
(38, 'EMTW', '1', '1', 'Same Days', '<p>HGT’s EMTW is a solid carbide internal threading helical flutes with special angle ground for high-hardness workpieces up to HRC60. It applies to materials such as high/low alloy steel, cast steel, tool steel, cast iron, stainless steel, high temp. alloys, titanium and Ti alloys, aluminum alloy, copper alloys and non-metallic alloys. It is coated with G100 coating that offers excellent heat and friction resistance. Thus, it is suitable for general steel for wet cutting. Thread mills are rotary tools used to craft internal and external threads with precision. They can produce high-quality threaded components.<br>HGT\'s T.pro Series thread mills are durable and versatile for threading on materials with hardness ranging from HRC55 to HRC60. The mills have a new design that optimizes chip removal, ensuring smoother and more efficient operations. HGT offers straight and helical flute designs with straight coolant holes to address temperature concerns, reduce cutting forces, and facilitate superior chip removal.&nbsp;</p><p><strong>Features -&nbsp;</strong></p><ul><li>SMG Special Micro Grain Carbide</li><li>G100 coating general steel for wet cutting&nbsp;</li></ul><p>&nbsp;</p><p><strong>Application -</strong>&nbsp;</p><ul><li>Applicable for finishing and semi-finishing processes</li><li>Consumer electronics</li><li>Automotive parts</li><li>Semiconductor</li><li>Medical device</li><li>Aerospace parts</li><li>Die and Mold</li><li>Precision molding</li></ul><p>&nbsp;</p><p>Check out the specifications, and feel free to contact us for technical support and further details.</p>', '1742043482.xlsx', '1742043482.pdf', '1742043482.pdf', '1742043482.webp', '1742195071.png', '1', '1', '10', '', '', '2025-03-15 07:28:02', '2025-03-17 01:34:31', '1', 'emtw', NULL, NULL),
(39, 'Ball Nose for Hardened Steels HRC70 - V70B', '1', '1', 'Same Days', '<p><strong>Description&nbsp;</strong>&nbsp;</p><p>HGT’s V70B is a solid carbide ball end mill with special angle ground for high-hardness workpieces up to HRC70. It applies to materials such as hardened steel, high/low alloy steel, cast steel, and tool steel. It is coated with i-plus new coating that offers excellent heat and friction resistance. Thus, it is suitable for dry cutting at high speed.</p><p>Ball nose end mills, also called ball end mills or ball cutters, are cutting tools with distinct rounded noses that enable them to create round-bottomed grooves during milling operations. They are used for various milling operations such as profiling, drilling shallow holes, pocketing, cutting slots, and forming rounded features. They are often employed in applications that require complex, multi-dimensional shapes.</p><p><strong>Features -&nbsp;</strong></p><ul><li>VMG Special Micro Grain Carbide: High hardness, rigidity, and bending resistance</li><li>2-flute end mill</li><li>Features a 30° helix angle</li><li>i-plus new coating for good heat and friction resistance</li></ul><p>&nbsp;</p><p><strong>Application -</strong>&nbsp;</p><ul><li>Applicable for profiling, semi-finishing, and finishing processes</li><li>Consumer electronics</li><li>Automotive parts</li><li>Semiconductor</li><li>Medical device</li><li>Aerospace parts</li><li>Die and Mold</li><li>Precision molding</li></ul><p>&nbsp;</p><p><strong>Recommended Cutting Condition Hardened Steels:</strong></p><ul><li>HRC55: SKD61, SKT4</li><li>HRC65: SKD11, SKH51</li><li>HRC70: SKH, HAP</li></ul><p>&nbsp;</p><p>Check out the specifications, and feel free to contact us for technical support and further details.</p>', '1742043736.xlsx', '1742043737.pdf', '1742043737.pdf', '1742043737.webp', '1742195165.png', '1', '1', '11', '', '', '2025-03-15 07:32:17', '2025-03-17 01:36:05', '1', 'ball-nose-for-hardened-steels-hrc70-v70b', NULL, NULL),
(40, 'Corner Radius for Hardened Steels HRC70 - V70R', '1', '1', 'Same Days', '<p>HGT’s V70R is a solid carbide&nbsp;<strong>corner radius</strong> <strong>end mill</strong>&nbsp;with special angle ground for high-hardness workpieces up to HRC70. It applies to materials such as hardened steel, high/low alloy steel, cast steel, and tool steel. It is coated with i-plus new coating that offers excellent heat and friction resistance. Thus, it is suitable for dry cutting at high speed.</p><p><strong>Features -&nbsp;</strong></p><ul><li>VMG Special Micro Grain Carbide: High hardness, rigidity, and bending resistance</li><li>4-flute end mill</li><li>Features a 30°helix angle</li><li>i-plus new coating for good heat and friction resistance</li></ul><p>&nbsp;</p><p><strong>Application -</strong>&nbsp;</p><ul><li>Applicable for profiling, semi-finishing, and finishing processes</li><li>Consumer electronics</li><li>Automotive parts</li><li>Semiconductor</li><li>Medical device</li><li>Aerospace parts</li><li>Die and Mold</li><li>Precision molding</li></ul><p>&nbsp;</p><ul><li><strong>Recommended Cutting Condition Hardened Steels:</strong><br>HRC55: SKD61, SKT4<br>HRC65: SKD11, SKH51<br>HRC70: SKS, SKH</li></ul><p>&nbsp;</p><p>Check out the specifications, and feel free to contact us&nbsp;for technical support and further details.&nbsp;</p>', '1742043861.xlsx', '1742043861.pdf', '1742043861.pdf', '1742043861.webp', '1742195249.png', '1', '1', '11', '', '', '2025-03-15 07:34:21', '2025-03-17 01:37:29', '1', 'corner-radius-for-hardened-steels-hrc70-v70r', NULL, NULL),
(41, 'Square for Hardened Steels HRC70 - V70E', '1', '1', 'Same Days', '<p><strong>Flat end mills</strong>, or <strong>square end mills</strong>, can work in demanding environments. They have cutting edges that are both wear-resistant and high-precision. As a result, they excel at improving processing efficiency and accuracy. They serve as versatile end mills suitable for various applications, including face milling, shoulder milling, slotting, and side milling.</p><p>HGT’s V70E is a solid carbide square end mill with special angle ground for high-hardness workpieces up to HRC70. It applies to materials such as hardened steel, high/low alloy steel, cast steel, and tool steel. It is coated with i-plus new coating that offers excellent heat and friction resistance. Thus, it is suitable for dry cutting at high speed.</p><p><strong>Features -&nbsp;</strong></p><ul><li>VMG Special Micro Grain Carbide: High hardness, rigidity, and bending resistance</li><li>6-flute end mill</li><li>Features a 45° helix angle</li><li>i-plus new coating for good heat and friction resistance</li></ul><p>&nbsp;</p><p><strong>Application -</strong>&nbsp;</p><ul><li>Applicable for side milling process</li><li>Consumer electronics</li><li>Automotive parts</li><li>Semiconductor</li><li>Medical device</li><li>Aerospace parts</li><li>Die and Mold</li><li>Precision molding</li></ul><p>&nbsp;</p><p><strong>Recommended Cutting Condition Hardened Steels:</strong></p><ul><li>HRC55: SKD61, SKT4</li><li>HRC65: SKD11</li><li>HRC70: SKS, SKH</li></ul><p>&nbsp;</p><p>Check out the specifications, and feel free to contact us for technical support and further details.</p>', '1742043944.xlsx', '1742043944.pdf', '1742043944.pdf', '1742043944.webp', '1742195327.png', '1', '1', '11', '', '', '2025-03-15 07:35:44', '2025-03-17 01:38:47', '1', 'square-for-hardened-steels-hrc70-v70e', NULL, NULL),
(42, 'Ball nose for high speed cutting & high hardness cutting - SB', '1', '1', 'Same Days', '<p>HGT’s SB is a solid carbide ball nose end mill with special angle ground for high-hardness workpieces up to HRC60. It applies to materials such as hardened steel, high/low alloy steel, cast steel, tool steel and cast iron. It is coated with ALTiN coating that offers excellent heat and friction resistance. Thus, it is suitable for high hard steel for dry cutting.</p><p><strong>Features -&nbsp;</strong></p><ul><li>SMG Special Micro Grain Carbide</li><li>2-flute end mill</li><li>Features a 30° helix angle</li><li>ALTiN coating high hard steel for dry cutting&nbsp;</li></ul><p>&nbsp;</p><p><strong>Application -</strong>&nbsp;</p><ul><li>Applicable for finishing, semi-finishing and profiling processes</li><li>Consumer electronics</li><li>Automotive parts</li><li>Semiconductor</li><li>Medical device</li><li>Aerospace parts</li><li>Die and Mold</li><li>Precision molding</li></ul><p>&nbsp;</p><p><strong>Recommended Cutting Condition Hardened Steels:</strong></p><ul><li>HRC30: S45C, FC, FCD, SCM, S50C, SKS …</li><li>HRC50: SCr, SNCM, SKD11, SKD61, NAK80 …</li><li>HRC60: SKD11</li></ul><p>&nbsp;</p><p>Check out the specifications, and feel free to contact us for technical support and further details.</p>', '1742044975.xlsx', '1742044975.pdf', '1742044975.pdf', '1742044975.webp', '1742195434.png', '1', '1', '9', '', '', '2025-03-15 07:52:55', '2025-03-17 01:40:34', '1', 'ball-nose-for-high-speed-cutting-high-hardness-cutting-sb', NULL, NULL),
(43, 'Ball nose for high speed cutting & high hardness cutting - SBB', '1', '1', 'Same Days', '<p>HGT’s SBB is a solid carbide ball nose end mill with special angle ground for high-hardness workpieces up to HRC60. It applies to materials such as hardened steel, high/low alloy steel, cast steel, tool steel and cast iron. It is coated with ALTiN coating that offers excellent heat and friction resistance. Thus, it is suitable for high hard steel for dry cutting.</p><p><strong>Features -&nbsp;</strong></p><ul><li>SMG Special Micro Grain Carbide</li><li>4-flute end mill</li><li>Features a 30° helix angle</li><li>ALTiN coating high hard steel for dry cutting&nbsp;</li></ul><p>&nbsp;</p><p><strong>Application -</strong>&nbsp;</p><ul><li>Applicable for finishing, semi-finishing and profiling processes</li><li>Consumer electronics</li><li>Automotive parts</li><li>Semiconductor</li><li>Medical device</li><li>Aerospace parts</li><li>Die and Mold</li><li>Precision molding</li></ul><p>&nbsp;</p><p><strong>Recommended Cutting Condition Hardened Steels:</strong></p><ul><li>HRC30: S45C, FC, FCD, SCM, S50C, SKS …</li><li>HRC50: SCr, SNCM, SKD11, SKD61, NAK80 …</li><li>HRC60: SKD11</li></ul><p>&nbsp;</p><p>Check out the specifications, and feel free to contact us for technical support and further details.</p>', '1742045079.xlsx', '1742045079.pdf', '1742045079.pdf', '1742045079.webp', '1742195513.png', '1', '1', '9', '', '', '2025-03-15 07:54:39', '2025-03-17 01:41:53', '1', 'ball-nose-for-high-speed-cutting-high-hardness-cutting-sbb', NULL, NULL),
(44, 'Long shank / Ball nose for high speed cutting & high hardness cutting - SBLS. SBLM. SBLL', '1', '1', 'Same Days', '<p>HGT’s SBLS.M.L is a solid carbide long shank ball nose end mill with special angle ground for high-hardness workpieces up to HRC60. It applies to materials such as hardened steel, high/low alloy steel, cast steel, tool steel and cast iron. It is coated with ALTiN coating that offers excellent heat and friction resistance. Thus, it is suitable for high hard steel for dry cutting.</p><p><strong>Features -&nbsp;</strong></p><ul><li>SMG Special Micro Grain Carbide</li><li>2-flute end mill</li><li>Features a 30° helix angle</li><li>ALTiN coating high hard steel for dry cutting&nbsp;</li></ul><p>&nbsp;</p><p><strong>Application -</strong>&nbsp;</p><ul><li>Applicable for finishing, semi-finishing and profiling processes</li><li>Consumer electronics</li><li>Automotive parts</li><li>Semiconductor</li><li>Medical device</li><li>Aerospace parts</li><li>Die and Mold</li><li>Precision molding</li></ul><p>&nbsp;</p><p><strong>Recommended Cutting Condition Hardened Steels:</strong></p><ul><li>HRC30: S45C, FC, FCD, SCM, S50C, SKS …</li><li>HRC50: SCr, SNCM, SKD11, SKD61, NAK80 …</li><li>HRC60: SKD11</li></ul><p>&nbsp;</p><p>Check out the specifications, and feel free to contact us for technical support and further details.</p>', '1742045203.xlsx', '1742045203.pdf', '1742045203.pdf', '1742045203.webp', '1742195612.png', '1', '1', '9', '', '', '2025-03-15 07:56:43', '2025-03-17 01:43:32', '1', 'long-shank-ball-nose-for-high-speed-cutting-high-hardness-cutting-sbls-sblm-sbll', NULL, NULL),
(45, 'Micro diameter / Ball nose for high speed cutting & high hardness cutting - SBM', '1', '1', 'Same Days', '<p>HGT’s SBM is a solid carbide ball nose end mill with special angle ground for high-hardness workpieces up to HRC60. It applies to materials such as hardened steel, high/low alloy steel, cast steel, tool steel and cast iron. It is coated with ALTiN coating that offers excellent heat and friction resistance. Thus, it is suitable for high hard steel for dry cutting.</p><p><strong>Features -&nbsp;</strong></p><ul><li>SMG Special Micro Grain Carbide</li><li>2-flute end mill</li><li>Features a 30° helix angle</li><li>ALTiN coating high hard steel for dry cutting&nbsp;</li></ul><p>&nbsp;</p><p><strong>Application -</strong>&nbsp;</p><ul><li>Applicable for finishing, semi-finishing and profiling processes</li><li>Consumer electronics</li><li>Automotive parts</li><li>Semiconductor</li><li>Medical device</li><li>Aerospace parts</li><li>Die and Mold</li><li>Precision molding</li></ul><p>&nbsp;</p><p><strong>Recommended Cutting Condition Hardened Steels:</strong></p><ul><li>HRC30: S45C, FC, FCD, SCM, S50C, SKS …</li><li>HRC50: SCr, SNCM, SKD11, SKD61, NAK80 …</li><li>HRC60: SKD11</li></ul><p>&nbsp;</p><p>Check out the specifications, and feel free to contact us for technical support and further details.</p>', '1742045299.xlsx', '1742045300.pdf', '1742045300.pdf', '1742045300.webp', '1742195704.png', '1', '1', '9', '', '', '2025-03-15 07:58:20', '2025-03-17 01:45:04', '1', 'micro-diameter-ball-nose-for-high-speed-cutting-high-hardness-cutting-sbm', NULL, NULL),
(46, 'Micro diameter / Square for high speed cutting & high hardness cutting - SEM', '1', '1', 'Same Days', '<p>HGT’s SEM is a solid carbide micro diameter square end mill with special angle ground for high-hardness workpieces up to HRC60. It applies to materials such as hardened steel, high/low alloy steel, cast steel, and tool steel.&nbsp;They are coated with ALTiN, making them practical for cutting hardened steel.&nbsp;</p><p><strong>Features -&nbsp;</strong></p><ul><li>SMG Special Micro Grain Carbide</li><li>2-flute end mill</li><li>Features a 35° helix angle</li><li>ALTiN coating for good heat and friction resistance</li></ul><p>&nbsp;</p><p><strong>Application -</strong>&nbsp;</p><ul><li>Applicable for Finishing, semi-finishing, side cutting and slotting processes&nbsp;</li><li>Consumer electronics</li><li>Automotive parts</li><li>Semiconductor</li><li>Medical device</li><li>Aerospace parts</li><li>Die and Mold</li><li>Precision molding</li></ul><p>&nbsp;</p><p><strong>Recommended Cutting Condition Hardened Steels:</strong></p><ul><li>HRC30: S45C, FC, FCD, SCM, S50C, SKS …</li><li>HRC: SCr, SNCM, SKD11, SKD61, NAK80 …</li><li>HRC60: SKD11</li></ul><p>&nbsp;</p><p>Check out the specifications, and feel free to contact us for technical support and further details.</p>', '1742045391.xlsx', '1742045391.pdf', '1742045391.pdf', '1742045391.webp', '1742195783.png', '1', '1', '9', '', '', '2025-03-15 07:59:51', '2025-03-17 01:46:23', '1', 'micro-diameter-square-for-high-speed-cutting-high-hardness-cutting-sem', NULL, NULL),
(47, 'SBF', '1', '1', 'Same Days', '<p>HGT’s SBF is a solid carbide long neck ball nose end mill with special angle ground for high-hardness workpieces up to HRC60. It applies to materials such as hardened steel, high/low alloy steel, cast steel, and tool steel. It is coated with ALTiN coating that offers excellent heat and friction resistance. Thus, it is suitable for high hard steel for dry cutting.</p><p><strong>Features -&nbsp;</strong></p><ul><li>SMG Special Micro Grain Carbide</li><li>2-flute end mill</li><li>Features a 30° helix angle</li><li>ALTiN coating high hard steel for dry cutting&nbsp;</li></ul><p>&nbsp;</p><p><strong>Application -</strong>&nbsp;</p><ul><li>Applicable for finishing, semi-finishing and profiling process</li><li>Consumer electronics</li><li>Automotive parts</li><li>Semiconductor</li><li>Medical device</li><li>Aerospace parts</li><li>Die and Mold</li><li>Precision molding</li></ul><p>&nbsp;</p><p><strong>Recommended Cutting Condition Hardened Steels:</strong></p><p>S45C, SCM, S50C, SKS, SCr, SNCM, SKD11, SKD61, NAK80</p><p>Check out the specifications, and feel free to contact us for technical support and further details.</p>', '1742045471.xlsx', '1742045471.pdf', '1742045471.pdf', '1742045471.webp', '1742195862.png', '1', '1', '9', '', '', '2025-03-15 08:01:11', '2025-03-17 01:47:42', '1', 'sbf', NULL, NULL),
(48, 'SELB', '1', '1', 'Same Days', '<p>HGT’s SELB is a solid carbide long shank square end mill with special angle ground for high-hardness workpieces up to HRC60. It applies to materials such as hardened steel, high/low alloy steel, cast steel, and tool steel. . It is coated with ALTiN coating that offers excellent heat and friction resistance. Thus, it is suitable for high hard steel for dry cutting.</p><p><strong>Features -&nbsp;</strong></p><ul><li>SMG Special Micro Grain Carbide</li><li>4-flute end mill</li><li>Features a 35° helix angle</li><li>ALTiN coating high hard steel for dry cutting&nbsp;</li><li>&nbsp;</li></ul><p><strong>Application -&nbsp;</strong></p><ul><li>Applicable for side cutting process</li><li>Consumer electronics</li><li>Automotive parts</li><li>Semiconductor</li><li>Medical device</li><li>Aerospace parts</li><li>Die and Mold</li><li>Precision molding</li><li>Recommended Cutting Condition Hardened Steels:</li><li>HRC30: S45C, FC, FCD, SCM, S50C, SKS …</li><li>HRC50: SCr, SNCM, SKD11, SKD61, NAK80 …</li><li>HRC60: SKD11</li></ul><p>&nbsp;</p><p>Check out the specifications, and feel free to contact us for technical support and further details.</p>', '1742188758.xlsx', '1742188889.pdf', '1742188758.pdf', '1742188758.webp', '1742195938.png', '1', '1', '9', '', '', '2025-03-16 23:49:18', '2025-03-17 01:48:58', '1', 'selb', NULL, NULL),
(49, 'SELD', '1', '1', 'Same Days', '<p><strong>Long flute carbide end mills</strong>&nbsp;are designed with an extended flute length (L1), making them well-suited for deep side milling operations. The additional length allows for more extended cuts and facilitates access to hard-to-reach areas. This also promotes efficient coolant flow and enhances chip evacuation. It minimizes chip accumulation, ensures effective material removal, and improves cutting performance and efficiency.HGT\'s long flute carbide end mills are equipped with ALTiN coating. ALTiN coating is suitable for hardened steel HRC45-65, both dry and wet cutting.</p><p>The fine grain size of 0.5 ensures precision and durability in various machining applications. Our four-fluted end mills are ideal for machining hard alloys and steel. SELD offers more cutting surfaces per rotation, which makes them highly efficient.&nbsp;</p><p><strong>Features</strong></p><ul><li>Extended Reach: Ideal for deep side milling, reaching areas that conventional end mills may struggle to access.</li><li>ALTiN Coating: The end mills feature ALTiN coating, making them suitable for cutting hardened steel in diverse machining conditions (HRC45-65).</li><li>Micro Grain Carbide: With 0.5 Micro Grain Carbide, these end mills offer the precision required for machining applications.</li><li>Four Flutes: Specifically designed for machining steel and other hard alloys, providing increased cutting surfaces for efficient metal removal.</li></ul><p>&nbsp;</p><p><strong>Applications</strong></p><ul><li>Applicable for Finishing, semi-finishing, planing, slotting, and side milling</li><li>Precision molds</li><li>Semiconductor</li><li>Automotive and motorcycle parts</li><li>Aerospace parts</li><li>Electronic communications</li><li>Watches and glasses</li><li>Sports equipment</li><li>Medical equipment</li><li>Recommended Cutting Condition</li><li>HRC30: S45C, FC, FCD, SCM, S50S, SKS …</li><li>HRC50: SCr, SNCM, SKD11, SKD61, NAK80 …</li><li>HRC60: SKD11</li><li>&nbsp;</li><li>Check out the specifications, and feel free to contact us for technical support and further details.</li></ul>', '1742189184.xlsx', '1742189184.pdf', '1742189184.pdf', '1742189184.webp', '1742196034.png', '1', '1', '9', '', '', '2025-03-16 23:56:24', '2025-03-17 01:50:34', '1', 'seld', NULL, NULL),
(50, 'SERC', '1', '1', 'Same Days', '<p>HGT’s SERC is a solid carbide square end mill with special angle ground for high-hardness workpieces up to HRC60. It applies to materials such as hardened steel, high/low alloy steel, cast steel, tool steel and cast iron. It is coated with ALTiN coating that offers excellent heat and friction resistance. Thus, it is suitable for high hard steel for dry cutting.&nbsp;HGT’s long shank corner radius end mills come in various diameter sizes and lengths to meet clients\' requirements.<br>Our corner radius end mills are suitable for machining various materials, such as hardened steel, cast iron, low/high alloy steel, cast steel, and tool steel. They are coated with ALTiN, making them practical for cutting hardened steel. They are applicable for both dry and wet cutting processes.</p><p><strong>Features</strong></p><ul><li>SMG Special Micro Grain Carbide</li><li>4-flute end mill</li><li>Features a 35° helix angle</li><li>Equipped with ALTiN coating for an extended tool life</li><li>Long shank for better reach and clearance&nbsp;</li></ul><p>&nbsp;</p><p><strong>Application</strong></p><ul><li>Applicable for profiling, semi-finishing, finishing and side cutting processes</li><li>Consumer electronics</li><li>Automotive parts</li><li>Semiconductor</li><li>Fastener</li><li>Plumbing hardware</li><li>Medical equipment</li><li>Aerospace parts</li><li>Precision molding</li></ul><p>&nbsp;</p><p><strong>Recommended Cutting Condition –&nbsp;</strong></p><ul><li>HRC30: S45C, FC, FCD, SCM, S50C, SKS …</li><li>HRC50: SCr, SNCM, SKD11, SKD61, NAK80 …<br>HRC60: SKD11</li><li>&nbsp;Check out the specifications, and feel free to&nbsp;contact us&nbsp;for technical support and further details.</li></ul>', '1742189359.xlsx', '1742189359.pdf', '1742189359.pdf', '1742189359.webp', '1742196090.png', '1', '1', '9', '', '', '2025-03-16 23:59:19', '2025-03-17 01:51:31', '1', 'serc', NULL, NULL),
(51, 'SHA', '1', '1', 'Same Days', '<p>HGT’s SHA is a solid carbide square end mill with special angle ground for high-hardness workpieces up to HRC60. It applies to materials such as hardened steel, high/low alloy steel, cast stee, tool steel and cast iron.&nbsp;HGT\'s carbide end mills are equipped with ALTiN coating. ALTiN coating is suitable for hardened steel, both dry and wet cutting.</p><p><strong>Features -&nbsp;</strong></p><ul><li>SMG Special Micro Grain Carbide</li><li>6-flute end mill</li><li>Features a 45° helix angle</li><li>ALTiN Coating</li></ul><p>&nbsp;</p><p><strong>Application -&nbsp;</strong></p><ul><li>Applicable for finishing and side cutting process</li><li>Consumer electronics</li><li>Automotive parts</li><li>Semiconductor</li><li>Medical device</li><li>Aerospace parts</li><li>Die and Mold</li><li>Precision molding</li></ul><p>&nbsp;</p><p><strong>Recommended Cutting Condition Hardened Steels:</strong></p><ul><li>HRC30: S45C, FC, FCD, SCM, S50S, SKS …</li><li>HRC50: SCr, SNCM, SKD11, SKD61, NAK80 …</li><li>HRC60: SKD11</li><li>&nbsp;</li><li>Check out the specifications, and feel free to contact us for technical support and further details.</li></ul>', '1742189476.xlsx', '1742189497.pdf', '1742189476.pdf', '1742189476.webp', '1742196134.png', '1', '1', '9', '', '', '2025-03-17 00:01:16', '2025-03-17 01:52:14', '1', 'sha', NULL, NULL),
(52, 'SRD', '1', '1', 'Same Days', '<p>HGT’s SRD is a solid carbide corner radius end mill with special angle ground for high-hardness workpieces up to HRC65. It applies to materials such as hardened steel, high/low alloy steel, cast steel, tool steel and cast iron. It is coated with ALTiN coating that offers excellent heat and friction resistance. Thus, it is suitable for high hard steel for dry cutting.</p><p><strong>Features -&nbsp;</strong></p><ul><li>SMG Special Micro Grain Carbide</li><li>4-flutes end mill</li><li>Features a 35° helix angle</li><li>ALTiN coating high hard steel for dry cutting&nbsp;</li></ul><p>&nbsp;</p><p><strong>Application -</strong>&nbsp;</p><ul><li>Applicable for finishing, semi-finishing, side cutting and profiling processes&nbsp;</li><li>Consumer electronics</li><li>Automotive parts</li><li>Semiconductor</li><li>Medical device</li><li>Aerospace parts</li><li>Die and Mold</li><li>Precision molding</li></ul><p>&nbsp;</p><p><strong>Recommended Cutting Condition Hardened Steels:</strong></p><ul><li>HRC30: S45C, FC, FCD, SCM, S50C, SKS …</li><li>HRC50: SCr, SNCM, SKD11, SKD61, NAK80 …</li><li>HRC60: SKD11S</li><li>&nbsp;</li></ul><p>Check out the specifications, and feel free to contact us for technical support and further details.</p>', '1742189602.xlsx', '1742189602.pdf', '1742189602.pdf', '1742189602.webp', '1742196184.png', '1', '1', '9', '', '', '2025-03-17 00:03:22', '2025-03-17 01:53:04', '1', 'srd', NULL, NULL),
(53, 'BB', '0', '1', 'Same Days', '<p>HGT’s BB is a solid carbide ball nose end mill with special angle ground for high-hardness workpieces up to HRC55. It applies to materials such as high/low alloy steel, cast steel, tool steel and cast iron. It is coated with TiaLN coating that offers excellent heat and friction resistance. Thus, it is suitable for general steel for wet cutting.</p><p><strong>Features -&nbsp;</strong></p><ul><li>MG Special Micro Grain Carbide</li><li>4-flute end mill</li><li>Features a 30° helix angle</li><li>TIaLN coating general steel for wet cutting&nbsp;</li></ul><p>&nbsp;</p><p><strong>Application -</strong>&nbsp;</p><ul><li>Applicable for finishing, semi-finishing and profiling processes</li><li>Consumer electronics</li><li>Automotive parts</li><li>Semiconductor</li><li>Medical device</li><li>Aerospace parts</li><li>Die and Mold</li><li>Precision molding</li></ul><p>&nbsp;</p><p><strong>Recommended Cutting Condition Hardened Steels:</strong></p><ul><li>HRC30: S45C, FC, FCD, SCM, S50C, SKS …</li><li>HRC50: SCr, SNCM, SKD11, SKD61, NAK80 …</li><li>HRC60: SKD11</li><li>&nbsp;</li></ul><p>Check out the specifications, and feel free to contact us for technical support and further details.</p>', '1742191700.xlsx', '1742191700.pdf', '1742191700.pdf', '1742191700.webp', '1742197546.png', '1', '1', '4', '', '', '2025-03-17 00:38:20', '2025-03-17 04:32:36', '1', 'bb', NULL, NULL);

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

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` varchar(255) NOT NULL,
  `sub_category_name` varchar(255) NOT NULL,
  `sub_category_image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `subcategory_slug` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `sub_category_name`, `sub_category_image`, `created_at`, `updated_at`, `subcategory_slug`, `deleted_at`) VALUES
(1, '1', 'CARBIDE DRILLS', '1742196385.png', '2025-03-15 04:21:53', '2025-03-17 01:56:25', 'carbide-drills', NULL),
(2, '1', 'D.MILL - FOR ALUMINIUM & COPPER CUTTING', '1742196433.png', '2025-03-15 04:22:56', '2025-03-17 01:57:13', 'dmill-for-aluminium-copper-cutting', NULL),
(3, '1', 'DENTAL APPLICATIONS', '1742196479.png', '2025-03-15 04:23:20', '2025-03-17 01:57:59', 'dental-applications', NULL),
(4, '1', 'EFFICIENCY MILLS - FOR ALLOY STEELS 55 HRC', '1742196514.png', '2025-03-15 04:23:49', '2025-03-17 01:58:34', 'efficiency-mills-for-alloy-steels-55-hrc', NULL),
(5, '1', 'G.PRO - FOR GRAPHITE CUTTING (DIAMOND COATED)', '1742196606.png', '2025-03-15 04:24:11', '2025-03-17 02:00:06', 'gpro-for-graphite-cutting-diamond-coated', NULL),
(6, '1', 'MAGIC CUT - HARDENED MATERIALS 65 HRC', '1742196650.png', '2025-03-15 04:28:14', '2025-03-17 02:00:50', 'magic-cut-hardened-materials-65-hrc', NULL),
(7, '1', 'MAGIC SHANK EXCHANGEABLE HEAD END MILLS', '1742196692.png', '2025-03-15 04:28:41', '2025-03-17 02:01:32', 'magic-shank-exchangeable-head-end-mills', NULL),
(8, '1', 'REAMING', '1742196726.png', '2025-03-15 04:29:09', '2025-03-17 02:02:06', 'reaming', NULL),
(9, '1', 'SUPER MILL - HIGH HARDNESS MATERIALS 60 HRC', '1742196759.png', '2025-03-15 04:29:33', '2025-03-17 02:02:39', 'super-mill-high-hardness-materials-60-hrc', NULL),
(10, '1', 'THREADING TOOLS', '1742196781.png', '2025-03-15 04:30:05', '2025-03-17 02:03:01', 'threading-tools', NULL),
(11, '1', 'V70 - HARDENED MATERIALS 70 HRC', '1742032842.webp', '2025-03-15 04:30:42', '2025-03-15 04:30:42', 'v70-hardened-materials-70-hrc', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_number` varchar(255) DEFAULT NULL,
  `profile` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email_verification_token` varchar(255) DEFAULT NULL,
  `email_verified` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `status` enum('active','inactive','banned') NOT NULL DEFAULT 'active',
  `role` enum('customer','admin','superadmin') NOT NULL DEFAULT 'customer',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `email`, `mobile_number`, `profile`, `password`, `password_reset_token`, `email_verification_token`, `email_verified`, `remember_token`, `status`, `role`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Technofra', 'saurabh', 'support@technofra.com', '8080721003', '1742038923.png', '$2y$12$99yrTpB8SzFPX.uSBfF5tO..lxhoM2KGjyK6ea2GP87CGWWj22796', NULL, NULL, 0, NULL, 'active', 'superadmin', '2025-03-15 03:45:44', '2025-03-19 02:07:25', NULL),
(2, 'govind', NULL, 'manish@technofra.com', '8080721003', NULL, '$2y$12$Ah08LD5aqxW1kQ2Pccx1kOwaAZiHPlg2/7FUMs48cstH4f2eoZg1O', NULL, NULL, 0, NULL, 'active', 'customer', '2025-03-17 02:05:35', '2025-03-19 01:30:56', NULL),
(3, 'Technofra', NULL, 'manish2@technofra.com', '8080803374', NULL, '$2y$12$Kz8fcbu59HJtMaBLYGVRCuf005YbI1G2lin41GyGQkAuIk8YbUSli', NULL, NULL, 0, NULL, 'banned', 'customer', '2025-03-19 01:36:55', '2025-03-19 02:08:56', NULL),
(5, 'Technofra', NULL, 'manish3@technofra.com', '8080803374', '1742369588.png', '$2y$12$HjtoGpHq0R7QEsORt0Pg1OVOLiWdJYkvOYNnK3ZS.BC2QmFukyBvO', NULL, NULL, 0, NULL, 'active', 'admin', '2025-03-19 02:03:08', '2025-03-19 02:03:08', NULL),
(6, 'govind', NULL, 'manish4@technofra.com', '8080721003', NULL, '$2y$12$3rMiM1PWz/ugUf/Lm3jcK.tZTaVDHkavK01tLK4ihiDg5pJ4P1V4W', NULL, NULL, 0, NULL, 'active', 'admin', '2025-03-19 03:41:31', '2025-03-19 03:41:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `gstin` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `company_name`, `company_address`, `city`, `state`, `country`, `pincode`, `gstin`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'Technofra', 'Shop No.2, Louis Palace, Tank Road, Orlem, Malad (West), Mumbai - 400 064. India', 'Mumbai', 'Maharashtra', 'India', '400067', '987987', '2025-03-17 02:05:35', '2025-03-19 02:13:05', NULL),
(2, 3, 'Technofra', 'Office No. 501, 5th Floor, Ghanshyam Enclave, Next To Laljipada Police Station, Laljipada, Link Road, Kandivali (West), Mumbai - 400067. Maharashtra - India', 'Mumbai', 'Maharashtra', 'India', '400067', '987987', '2025-03-19 01:36:55', '2025-03-19 01:36:55', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `banners_slug_unique` (`slug`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_brand_name_unique` (`brand_name`);

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
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_category_name_unique` (`category_name`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiry_products`
--
ALTER TABLE `enquiry_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `favourites` (`user_id`,`product_id`,`status`);

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
-- Indexes for table `morph_histories`
--
ALTER TABLE `morph_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `morph_histories_admin_id_foreign` (`admin_id`),
  ADD KEY `morph_histories_modifiable_type_modifiable_id_index` (`modifiable_type`,`modifiable_id`);

--
-- Indexes for table `morph_statuses`
--
ALTER TABLE `morph_statuses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `morph_statuses_statusable_type_statusable_id_index` (`statusable_type`,`statusable_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `orders_tracks`
--
ALTER TABLE `orders_tracks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pos`
--
ALTER TABLE `pos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sub_categories_category_id_sub_category_name_unique` (`category_id`,`sub_category_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_details_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `enquiry_products`
--
ALTER TABLE `enquiry_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favourites`
--
ALTER TABLE `favourites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=267;

--
-- AUTO_INCREMENT for table `morph_histories`
--
ALTER TABLE `morph_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `morph_statuses`
--
ALTER TABLE `morph_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders_tracks`
--
ALTER TABLE `orders_tracks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pos`
--
ALTER TABLE `pos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `morph_histories`
--
ALTER TABLE `morph_histories`
  ADD CONSTRAINT `morph_histories_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `user_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
