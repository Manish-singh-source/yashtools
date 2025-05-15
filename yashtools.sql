-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2025 at 11:27 AM
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
  `slug` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `banner_image`, `created_at`, `updated_at`, `banner_title`, `banner_description`, `status`, `slug`) VALUES
(4, '1739771474.png', '2025-02-17 00:21:14', '2025-02-18 00:39:14', 'dummy  content', 'something something', '1', 'ff'),
(5, '1739771706.png', '2025-02-17 00:25:06', '2025-02-18 00:39:59', 'edited banner url', 'sdloeokn sdfs s', '0', 'aa'),
(6, '1739858014.png', '2025-02-18 00:23:34', '2025-02-19 01:19:49', 'something', 'sadf sdf', '0', 'banner-1739858014'),
(7, '1739947833.png', '2025-02-18 00:23:53', '2025-02-19 01:20:33', 'something44 sdf', 'asdf asdf sdf', '1', 'banner-1739858033');

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
  `brand_slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_image`, `created_at`, `updated_at`, `brand_slug`) VALUES
(9, 'HGT', '1739970586.png', '2025-02-19 07:39:46', '2025-02-19 07:39:46', 'hgt');

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
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `part_number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `category_slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_image`, `created_at`, `updated_at`, `category_slug`) VALUES
(7, 'CARBIDE END MILLS', '1739970378.png', '2025-02-19 07:36:18', '2025-02-19 07:36:18', 'carbide-end-mills');

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `enquiry_id` int(11) NOT NULL,
  `status` enum('dismissed','confirmed','delivered','payment_received') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `part_number` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enquiries`
--

INSERT INTO `enquiries` (`id`, `customer_id`, `enquiry_id`, `status`, `created_at`, `updated_at`, `quantity`, `part_number`) VALUES
(1, 1, 90001, 'confirmed', NULL, '2025-02-22 02:41:59', 0, NULL),
(2, 2, 90002, 'dismissed', NULL, '2025-02-18 07:59:32', 0, NULL),
(3, 3, 90003, 'payment_received', NULL, '2025-02-18 07:59:23', 0, NULL),
(4, 4, 90004, 'payment_received', NULL, NULL, 0, NULL),
(5, 1, 90005, 'dismissed', NULL, '2025-02-18 07:59:12', 0, NULL),
(6, 2, 90006, 'dismissed', NULL, NULL, 0, NULL),
(7, 3, 90007, 'delivered', NULL, NULL, 0, NULL),
(8, 4, 90008, 'delivered', NULL, '2025-02-21 06:15:32', 0, NULL),
(9, 5, 90009, 'confirmed', NULL, NULL, 0, NULL),
(10, 5, 90010, 'dismissed', NULL, NULL, 0, NULL),
(11, 2, 90011, 'confirmed', NULL, NULL, 0, NULL),
(12, 2, 90012, 'confirmed', NULL, NULL, 0, NULL),
(13, 1, 90013, 'confirmed', NULL, NULL, 0, NULL),
(14, 3, 90014, 'confirmed', NULL, NULL, 0, NULL),
(15, 1, 90015, 'confirmed', NULL, NULL, 0, NULL),
(16, 3, 90016, 'confirmed', NULL, NULL, 0, NULL),
(17, 1, 90017, 'confirmed', NULL, NULL, 0, NULL),
(18, 18, 90018, 'confirmed', '2025-02-24 02:22:57', '2025-02-24 02:24:35', 2, 'QBN 0106');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry_products`
--

CREATE TABLE `enquiry_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `enquiry_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enquiry_products`
--

INSERT INTO `enquiry_products` (`id`, `enquiry_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2025-02-17 09:42:11', '2025-02-17 09:42:43'),
(2, 2, 2, NULL, NULL),
(3, 2, 5, NULL, NULL),
(4, 2, 6, NULL, NULL),
(5, 1, 1, NULL, NULL),
(6, 2, 2, NULL, NULL),
(7, 3, 3, NULL, NULL),
(8, 4, 1, NULL, NULL),
(9, 5, 2, NULL, NULL),
(10, 6, 3, NULL, NULL),
(11, 7, 1, NULL, NULL),
(12, 18, 10, '2025-02-24 02:22:57', '2025-02-24 02:22:57');

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
  `event_slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `events_title`, `events_description`, `events_image`, `events_date`, `events_tag`, `created_at`, `updated_at`, `event_slug`) VALUES
(1, 'Tech Conference 2025', 'A gathering of tech enthusiasts to discuss the future of technology.', '1739774910.png', '2025-03-15', 'Technology', NULL, '2025-02-17 01:18:30', 'tech-conference-2025'),
(2, 'Digital Marketing Summit', 'Learn the latest trends in digital marketing from industry experts.', 'digital_marketing.jpg', '2025-04-10', 'Marketing', NULL, NULL, 'digital-marketing-summit'),
(3, 'Startup Expo 2025', 'Showcase your startup and connect with investors.', 'startup_expo.jpg', '2025-06-20', 'Business', NULL, NULL, 'startup-expo-2025'),
(4, 'AI & Machine Learning Workshop', 'Hands-on workshop on AI and ML for beginners and experts.', 'ai_ml_workshop.jpg', '2025-07-05', 'Artificial Intelligence', NULL, NULL, 'ai-machine-learning-workshop');

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favourites`
--

INSERT INTO `favourites` (`id`, `user_id`, `product_id`, `status`, `created_at`, `updated_at`) VALUES
(27, '18', '10', '1', '2025-02-21 07:24:12', '2025-02-21 07:24:12');

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
(66, '0001_01_01_000000_create_users_table', 2),
(67, '0001_01_01_000001_create_cache_table', 2),
(68, '0001_01_01_000002_create_jobs_table', 2),
(69, '2025_02_06_094708_create_user_details_table', 2),
(70, '2025_02_07_112236_create_categories_table', 2),
(71, '2025_02_07_114028_create_sub_categories_table', 2),
(72, '2025_02_07_114828_create_products_table', 2),
(73, '2025_02_07_120023_create_enquiry_table', 2),
(74, '2025_02_07_120639_create_orders_tracks', 2),
(75, '2025_02_07_121256_create_events_table', 2),
(76, '2025_02_08_060825_create_banners_table', 2),
(77, '2025_02_08_072719_update_categories_table', 2),
(78, '2025_02_10_060426_create_brands_table', 2),
(79, '2025_02_11_094922_update_products_table', 2),
(80, '2025_02_11_100618_update_banners_table', 2),
(81, '2025_02_12_094156_update_categories_table', 2),
(82, '2025_02_12_100651_update_sub_categories_table', 2),
(83, '2025_02_12_102318_update_brands_table', 2),
(84, '2025_02_12_104153_update_products_table', 2),
(85, '2025_02_13_060831_update_products_table', 2),
(86, '2025_02_14_092113_update_products_table', 2),
(87, '2025_02_15_070959_update_banners_table', 2),
(88, '2025_02_15_092451_update_categories_table', 2),
(89, '2025_02_15_094323_update_sub_categories_table', 2),
(90, '2025_02_15_094731_update_brands_table', 2),
(91, '2025_02_15_094856_update_products_table', 2),
(92, '2025_02_15_094949_update_events_table', 2),
(93, '2025_02_15_122934_create_favourites_table', 3),
(94, '2025_02_17_053040_update_banners_table', 4),
(95, '2025_02_17_071710_create_enquiries_table', 4),
(96, '2025_02_17_093646_create_enquiry_products_table', 5),
(97, '2025_02_17_093925_update_enquiries_table', 6),
(98, '2025_02_19_051030_update_orders_tracks_table', 7),
(99, '2025_02_20_055620_update_products_table', 8),
(100, '2025_02_20_072949_update_products_table', 8),
(101, '2025_02_20_132634_update_favourites_table', 9),
(102, '2025_02_21_120104_update_enquiries_table', 9),
(103, '2025_02_22_054632_create_carts_table', 9),
(104, '2025_02_22_064345_update_carts_table', 9);

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
  `invoice_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders_tracks`
--

INSERT INTO `orders_tracks` (`id`, `enquiry_id`, `courier_name`, `courier_number`, `courier_website`, `created_at`, `updated_at`, `invoice_file`) VALUES
(1, '90002', 'demo', '987234', 'http://127.0.0.1:8000/single-product/wrench-set', '2025-02-19 00:15:02', '2025-02-19 00:15:02', '1739943902.pdf'),
(2, '90003', 'sdf', '234', 'http://127.0.0.1:8000/order-details/3', '2025-02-19 00:36:18', '2025-02-19 00:36:18', '1739945178.pdf'),
(3, '90001', 'HGT fdhf', '8898884', 'https://www.figma.com/', '2025-02-19 05:56:02', '2025-02-19 06:00:53', '1739964362.pdf');

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
  `product_optional_pdf` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_quantity`, `product_price`, `product_dispatch`, `product_discription`, `product_specs`, `product_catalouge`, `product_pdf`, `product_drawing`, `product_thumbain`, `product_brand_id`, `product_category_id`, `product_sub_category_id`, `product_arrivals`, `product_sale`, `created_at`, `updated_at`, `status`, `product_slug`, `product_optional_pdf`) VALUES
(10, 'Ball nose for Hardened Steels HRC65 - QBN', '0', '8500', 'Same Days', 'HGT’s QBN is a solid carbide ball nose end mill with special angle ground for high-hardness workpieces up to HRC65. It applies to materials such as hardened steel, high/low alloy steel, cast steel, tool steel and cast iron. It is coated with nAcoB coating that offers excellent heat and friction resistance. Thus, it is suitable for high hard steel for dry cutting.\r\nFeatures - \r\nQMG Special Micro Grain Carbide\r\n2-flute end mill\r\nFeatures a 30° helix angle\r\nnAcoB coating high hard steel for dry cutting \r\nApplication - \r\nApplicable for finishing, semi-finishing and profiling processes\r\nConsumer electronics\r\nAutomotive parts\r\nSemiconductor\r\nMedical device\r\nAerospace parts\r\nDie and Mold\r\nPrecision molding\r\nRecommended Cutting Condition Hardened Steels:\r\nHRC30: S45C, FC, FCD, SCM, S50C, SKS\r\nHRC50: SCr, SNCM, SKD11, SKD61, NAK80\r\nHRC60: SKD11\r\nCheck out the specifications, and feel free to', '1740137668.xlsx', '1740046570.pdf', '1740046570.pdf', '1740046259.webp', '1740046937.png', '9', '7', '8', '', '', '2025-02-20 04:40:59', '2025-02-21 06:04:28', '1', 'ball-nose-for-hardened-steels-hrc65-qbn', NULL),
(11, 'Square for Hardened Steels HRC65 – QEB', '0', '6500', 'Same Days', 'HGT’s QEB is a solid carbide square end mill with special angle ground for high-hardness workpieces up to HRC65. It applies to materials such as hardened steel, high/low alloy steel, cast steel, tool steel and cast iron. It is coated with ALTiN coating that offers excellent heat and friction resistance. Thus, it is suitable for high hard steel for dry cutting.\r\nFeatures - \r\nQMG Special Micro Grain Carbide\r\n4-flute end mill\r\nFeatures a 45° helix angle\r\nALTiN coating high hard steel for dry cutting \r\nApplication - \r\nApplicable for finishing, semi-finishing and side milling processes\r\nConsumer electronics\r\nAutomotive parts\r\nSemiconductor\r\nMedical device\r\nAerospace parts\r\nDie and Mold\r\nPrecision molding\r\nRecommended Cutting Condition Hardened Steels:\r\nHRC30: S45C, FC, FCD, SCM, S50C, SKS\r\nHRC50: SCr, SNCM, SKD11, SKD61, NAK80\r\nHRC60: SKD11\r\nCheck out the specifications, and feel free to contact us for technical support and further details.', '1740138994.xlsx', '1740138994.pdf', '1740138994.pdf', '1740138994.webp', '1740139207.png', '9', '7', '8', '', '', '2025-02-21 06:26:34', '2025-02-21 06:30:07', '1', 'square-for-hardened-steels-hrc65-qeb', NULL),
(12, 'Square for Hardened Steels HRC65 - QEBN', '0', '5000', 'Same Days', 'Flat end mills, or square end mills, can work in demanding environments. They have cutting edges that are both wear-resistant and high-precision. As a result, they excel at improving processing efficiency and accuracy. They serve as versatile end mills suitable for various applications, including face milling, shoulder milling, slotting, and side milling.\r\nHGT\'s QEBN Solid Carbide 4 Flute Square End Mill is designed for workpiece hardness up to HRC65. This high-performance tool can be effectively employed on materials such as hardened steel, cast iron, low/high alloy steel, cast steel, and tool steel. It features a heat-resistant nAcoB coating, making it particularly well-suited for dry machining, although it\'s not recommended for wet machining. \r\nFeatures - \r\n4 Flute Square End Mill for workpiece hardness up to HRC65.\r\n45° helix angle design\r\nHeat-resistant nAcoB coating\r\nApplication - \r\nPrecision molds\r\nSemiconductor\r\nAutomotive and motorcycle parts\r\nAerospace parts\r\nElectronic communications\r\nWatches and glasses\r\nSports equipment\r\nMedical equipment\r\nRecommended Cutting Material and Hardness\r\nHRC30: S45C, FC, FCD, SCM, S50C, SKS…\r\nHRC50: SCr, SNCM, SKD11, SKD61, NAK80…\r\nHRC60: SKD11\r\nCheck out the specifications, and feel free to contact us for technical support and further details.', '1740139637.xlsx', '1740139638.pdf', '1740139638.pdf', '1740139638.webp', '1740139728.png', '9', '7', '8', '', '', '2025-02-21 06:37:18', '2025-02-21 06:38:48', '1', 'square-for-hardened-steels-hrc65-qebn', NULL),
(13, 'Ball Nose for Hardened Steels HRC70 - V70B', '0', '563', 'Same Days', 'HGT’s V70B is a solid carbide ball end mill with special angle ground for high-hardness workpieces up to HRC70. It applies to materials such as hardened steel, high/low alloy steel, cast steel, and tool steel. It is coated with i-plus new coating that offers excellent heat and friction resistance. Thus, it is suitable for dry cutting at high speed.\r\nBall nose end mills, also called ball end mills or ball cutters, are cutting tools with distinct rounded noses that enable them to create round-bottomed grooves during milling operations. They are used for various milling operations such as profiling, drilling shallow holes, pocketing, cutting slots, and forming rounded features. They are often employed in applications that require complex, multi-dimensional shapes.\r\nFeatures - \r\nVMG Special Micro Grain Carbide: High hardness, rigidity, and bending resistance\r\n2-flute end mill\r\nFeatures a 30° helix angle\r\ni-plus new coating for good heat and friction resistance\r\nApplication - \r\nApplicable for profiling, semi-finishing, and finishing processes\r\nConsumer electronics\r\nAutomotive parts\r\nSemiconductor\r\nMedical device\r\nAerospace parts\r\nDie and Mold\r\nPrecision molding\r\nRecommended Cutting Condition Hardened Steels:\r\nHRC55: SKD61, SKT4\r\nHRC65: SKD11, SKH51\r\nHRC70: SKH, HAP\r\nCheck out the specifications, and feel free to contact us for technical support and further details.', '1740140064.xlsx', '1740140064.pdf', '1740140064.pdf', '1740140064.webp', '1740140128.png', '9', '7', '9', '', '', '2025-02-21 06:44:24', '2025-02-21 06:45:28', '1', 'ball-nose-for-hardened-steels-hrc70-v70b', NULL),
(14, 'Corner Radius for Hardened Steels HRC70 - V70R', '0', '5500', 'Same Days', 'HGT’s V70R is a solid carbide corner radius end mill with special angle ground for high-hardness workpieces up to HRC70. It applies to materials such as hardened steel, high/low alloy steel, cast steel, and tool steel. It is coated with i-plus new coating that offers excellent heat and friction resistance. Thus, it is suitable for dry cutting at high speed.\r\nFeatures - \r\nVMG Special Micro Grain Carbide: High hardness, rigidity, and bending resistance\r\n4-flute end mill\r\nFeatures a 30°helix angle\r\ni-plus new coating for good heat and friction resistance\r\nApplication - \r\nApplicable for profiling, semi-finishing, and finishing processes\r\nConsumer electronics\r\nAutomotive parts\r\nSemiconductor\r\nMedical device\r\nAerospace parts\r\nDie and Mold\r\nPrecision molding\r\nRecommended Cutting Condition Hardened Steels:\r\nHRC55: SKD61, SKT4\r\nHRC65: SKD11, SKH51\r\nHRC70: SKS, SKH\r\nCheck out the specifications, and feel free to contact us for technical support and further details.', '1740141275.xlsx', '1740141275.pdf', '1740141275.pdf', '1740141275.webp', '1740141275.png', '9', '7', '9', '', '', '2025-02-21 07:04:35', '2025-02-21 07:04:46', '1', 'corner-radius-for-hardened-steels-hrc70-v70r', NULL),
(15, 'Square for Hardened Steels HRC70 - V70E', '0', '500', 'Same Days', 'Flat end mills, or square end mills, can work in demanding environments. They have cutting edges that are both wear-resistant and high-precision. As a result, they excel at improving processing efficiency and accuracy. They serve as versatile end mills suitable for various applications, including face milling, shoulder milling, slotting, and side milling.\r\nHGT’s V70E is a solid carbide square end mill with special angle ground for high-hardness workpieces up to HRC70. It applies to materials such as hardened steel, high/low alloy steel, cast steel, and tool steel. It is coated with i-plus new coating that offers excellent heat and friction resistance. Thus, it is suitable for dry cutting at high speed.\r\nFeatures - \r\nVMG Special Micro Grain Carbide: High hardness, rigidity, and bending resistance\r\n6-flute end mill\r\nFeatures a 45° helix angle\r\ni-plus new coating for good heat and friction resistance\r\nApplication - \r\nApplicable for side milling process\r\nConsumer electronics\r\nAutomotive parts\r\nSemiconductor\r\nMedical device\r\nAerospace parts\r\nDie and Mold\r\nPrecision molding\r\nRecommended Cutting Condition Hardened Steels:\r\nHRC55: SKD61, SKT4\r\nHRC65: SKD11\r\nHRC70: SKS, SKH\r\nCheck out the specifications, and feel free to contact us for technical support and further details.', '1740141581.xlsx', '1740141581.pdf', '1740141581.pdf', '1740141581.webp', '1740141581.png', '9', '7', '9', '', '', '2025-02-21 07:09:41', '2025-02-21 07:09:55', '1', 'square-for-hardened-steels-hrc70-v70e', NULL);

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
  `subcategory_slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `sub_category_name`, `sub_category_image`, `created_at`, `updated_at`, `subcategory_slug`) VALUES
(8, '7', 'MAGIC CUT - HARDENED MATERIALS 65 HRC', '1739970465.png', '2025-02-19 07:37:45', '2025-02-19 07:37:45', 'magic-cut-hardened-materials-65-hrc'),
(9, '7', 'V70 - HARDENED MATERIALS 70 HRC', '1739970498.png', '2025-02-19 07:38:18', '2025-02-19 07:38:18', 'v70-hardened-materials-70-hrc');

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
  `status` enum('active','inactive','banned') NOT NULL DEFAULT 'active',
  `role` enum('customer','admin','superadmin') NOT NULL DEFAULT 'customer',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `email`, `mobile_number`, `profile`, `password`, `status`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Manish Singh', 'Manish', 'abc@gmail.com', '7039553407', NULL, '$2y$12$FICx0lH29CF6pW5k4w1Gu.5iWtUAMYHgnXKyh3uXhEgp0BUKjKcQ.', 'active', 'customer', NULL, '2025-02-17 05:46:41'),
(2, 'Rohit Sharma', 'Rohit', 'rohit@gmail.com', '70395534079', NULL, '$2y$12$FICx0lH29CF6pW5k4w1Gu.5iWtUAMYHgnXKyh3uXhEgp0BUKjKcQ.', 'active', 'customer', NULL, NULL),
(3, 'Priya Mehta', 'Priya', 'priya@gmail.com', '70395534080', NULL, '$2y$12$FICx0lH29CF6pW5k4w1Gu.5iWtUAMYHgnXKyh3uXhEgp0BUKjKcQ.', 'active', 'customer', NULL, NULL),
(4, 'Amit Kumar', 'Amit', 'amit@gmail.com', '70395534081', NULL, '$2y$12$FICx0lH29CF6pW5k4w1Gu.5iWtUAMYHgnXKyh3uXhEgp0BUKjKcQ.', 'active', 'customer', NULL, NULL),
(5, 'Neha Gupta', 'Neha', 'neha@gmail.com', '70395534082', NULL, '$2y$12$FICx0lH29CF6pW5k4w1Gu.5iWtUAMYHgnXKyh3uXhEgp0BUKjKcQ.', 'banned', 'customer', NULL, '2025-02-17 07:52:58'),
(6, 'Vikas Yadav', 'Vikas', 'vikas@gmail.com', '7039553408', NULL, '$2y$12$FICx0lH29CF6pW5k4w1Gu.5iWtUAMYHgnXKyh3uXhEgp0BUKjKcQ.', 'active', 'customer', NULL, '2025-02-17 06:26:35'),
(7, 'Anjali Verma', 'Anjali', 'anjali@gmail.com', '70395534084', NULL, '$2y$12$FICx0lH29CF6pW5k4w1Gu.5iWtUAMYHgnXKyh3uXhEgp0BUKjKcQ.', 'active', 'customer', NULL, NULL),
(15, NULL, 'saurabh', 'support@technofra.com', NULL, NULL, '$2y$12$hHTd.2Ik5RXw7jhAkygQX.MN4osEUYzOfxP3C9a8HR.kBqu5LnPR.', 'active', 'superadmin', '2025-02-15 04:33:07', '2025-02-15 04:33:07'),
(17, 'govind', NULL, 'support2@technofra.com', '8080721003', '1739773648.png', '$2y$12$Vg5imV06pMWrO4nfeFQk2uqiv6/94vxvwovWq6LviBDFZdR/1tUa2', 'active', 'admin', '2025-02-17 00:57:28', '2025-02-17 00:57:28'),
(18, 'govind', NULL, 'manish@technofra.com', '8080721003', NULL, '$2y$12$SgtP0q1OhsbjNnTxoOP8PetzE4N587dHvidwuqo.C/V1FhAmxH1Je', 'active', 'customer', '2025-02-19 05:57:58', '2025-02-19 05:57:58'),
(31, 'Technofra', NULL, 'itwebdeveloper7@gmail.com', '8080803374', NULL, '$2y$12$hWbv112fF5CISoB5428WaOm2OVpb4Vzie6yN9dx461GLu2yGEsqW2', 'active', 'customer', '2025-02-21 05:33:33', '2025-02-21 05:33:33');

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `company_name`, `company_address`, `city`, `state`, `country`, `pincode`, `gstin`, `created_at`, `updated_at`) VALUES
(2, 6, 'snainfotech pvt.ltd.', '17, Navyug Industrial Estate,Vazir Glass Factory Lane, Off. Andheri-Kurla Road, Andheri (E), Mumbai – 59', 'Mumbai', 'maharashtra', 'India', '400059', 'Mumbai', '2025-02-17 06:29:25', '2025-02-17 06:29:25'),
(3, 18, 'Technofra', 'police chowky', 'Mumbai', 'Maharashtra', 'India', '400067', '424523', '2025-02-19 05:57:58', '2025-02-19 05:57:58'),
(16, 31, 'Technofra', 'Office No. 501, 5th Floor, Ghanshyam Enclave, Next To Laljipada Police Station, Laljipada, Link Road, Kandivali (West), Mumbai - 400067. Maharashtra - India', 'Mumbai', 'Maharashtra', 'India', '400067', '424523', '2025-02-21 05:33:33', '2025-02-21 05:33:33');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `enquiry_products`
--
ALTER TABLE `enquiry_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favourites`
--
ALTER TABLE `favourites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `orders_tracks`
--
ALTER TABLE `orders_tracks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `user_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
