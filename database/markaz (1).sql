-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2019 at 02:30 PM
-- Server version: 5.7.24
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `markaz`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `store_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Pret', 1, 1, '2019-06-11 23:14:32', '2019-06-11 23:14:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `device_tokens`
--

CREATE TABLE `device_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `udid` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `type` enum('ios','android') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ios',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_logs`
--

CREATE TABLE `event_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `component` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `component_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `component_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `store_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_logs`
--

INSERT INTO `event_logs` (`id`, `component`, `component_name`, `component_image`, `operation`, `user_id`, `store_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'User', 'Sara Hasan', 'user_default.png', 'Logged In', 1, 1, '2019-06-12 14:38:10', '2019-06-12 14:38:10', NULL),
(2, 'Users', 'Usman Siddiqui', '664.png', 'Added', 1, 1, '2019-06-12 14:41:32', '2019-06-12 14:41:32', NULL),
(3, 'Users', 'Usman Siddiqui', '664.png', 'Deleted', 1, 1, '2019-06-12 14:42:43', '2019-06-12 14:42:43', NULL),
(4, 'Users', 'Usman Siddiqui', '664.png', 'Deleted', 1, 1, '2019-06-12 14:44:25', '2019-06-12 14:44:25', NULL),
(5, 'Users', 'Usman Siddiqui', '664.png', 'Deleted', 1, 1, '2019-06-12 14:45:11', '2019-06-12 14:45:11', NULL),
(6, 'Users', 'Usman Siddiqui', '664.png', 'Deleted', 1, 1, '2019-06-12 14:46:33', '2019-06-12 14:46:33', NULL),
(7, 'Users', 'Sara Hasan', 'user_default.png', 'Logged In', 1, 1, '2019-06-12 14:50:03', '2019-06-12 14:50:03', NULL),
(8, 'Users', 'kashaf nazir', '63472.png', 'Deleted', 1, 1, '2019-06-12 14:50:29', '2019-06-12 14:50:29', NULL),
(9, 'Users', 'Sara Hasan', 'user_default.png', 'Logged In', 1, 1, '2019-06-12 14:52:55', '2019-06-12 14:52:55', NULL),
(10, 'Users', 'Sara Hasan', 'user_default.png', 'Logged In', 1, 1, '2019-06-13 00:52:04', '2019-06-13 00:52:04', NULL),
(11, 'Users', 'Sara Hasan', 'user_default.png', 'Logged In', 1, NULL, '2019-06-13 01:58:41', '2019-06-13 01:58:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `store_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

CREATE TABLE `followers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `followers`
--

INSERT INTO `followers` (`id`, `user_id`, `store_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `media_images`
--

CREATE TABLE `media_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2019_02_27_014131_create_device_tokens_table', 1),
(5, '2019_03_23_115107_create_media_images_table', 1),
(7, '2019_03_24_065156_create_followers_table', 1),
(9, '2019_04_07_151529_create_support_table', 1),
(15, '2019_06_02_163219_create_faq_table', 1),
(20, '2019_06_09_133704_create_permission_tables', 3),
(24, '2014_10_12_000000_create_users_table', 4),
(25, '2019_02_28_171441_create_stores_table', 4),
(26, '2019_02_28_181002_create_promotions_table', 4),
(27, '2019_03_24_052642_create_promotion_medias_table', 4),
(28, '2019_03_25_053544_create_promoton_comments_table', 4),
(29, '2019_05_16_095801_create_promotion_categories_table', 4),
(30, '2019_05_16_100435_create_promotion_tags_table', 4),
(31, '2019_05_17_103513_create_social_media_table', 4),
(32, '2019_05_27_161418_create_categories_table', 5),
(33, '2019_05_27_161508_create_tags_table', 5),
(38, '2019_06_12_183457_create_logs_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(2, 'App\\User', 1),
(3, 'App\\User', 1),
(5, 'App\\User', 1),
(6, 'App\\User', 1),
(7, 'App\\User', 1),
(8, 'App\\User', 1),
(10, 'App\\User', 1),
(11, 'App\\User', 1),
(12, 'App\\User', 1),
(13, 'App\\User', 1),
(15, 'App\\User', 1),
(16, 'App\\User', 1),
(17, 'App\\User', 1),
(18, 'App\\User', 1),
(20, 'App\\User', 1),
(21, 'App\\User', 1),
(22, 'App\\User', 1),
(23, 'App\\User', 1),
(25, 'App\\User', 1),
(26, 'App\\User', 1),
(27, 'App\\User', 1),
(28, 'App\\User', 1),
(30, 'App\\User', 1),
(31, 'App\\User', 1),
(32, 'App\\User', 1),
(33, 'App\\User', 1),
(35, 'App\\User', 1),
(36, 'App\\User', 1),
(37, 'App\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'add user', 'web', '2019-06-11 21:23:06', '2019-06-11 21:23:06'),
(2, 'edit user', 'web', '2019-06-11 21:23:06', '2019-06-11 21:23:06'),
(3, 'soft delete user', 'web', '2019-06-11 21:23:06', '2019-06-11 21:23:06'),
(4, 'delete user', 'web', '2019-06-11 21:23:06', '2019-06-11 21:23:06'),
(5, 'view user', 'web', '2019-06-11 21:23:06', '2019-06-11 21:23:06'),
(6, 'add categories', 'web', '2019-06-11 21:23:06', '2019-06-11 21:23:06'),
(7, 'edit categories', 'web', '2019-06-11 21:23:06', '2019-06-11 21:23:06'),
(8, 'soft delete categories', 'web', '2019-06-11 21:23:06', '2019-06-11 21:23:06'),
(9, 'delete categories', 'web', '2019-06-11 21:23:06', '2019-06-11 21:23:06'),
(10, 'view categories', 'web', '2019-06-11 21:23:06', '2019-06-11 21:23:06'),
(11, 'add tags', 'web', '2019-06-11 21:23:06', '2019-06-11 21:23:06'),
(12, 'edit tags', 'web', '2019-06-11 21:23:06', '2019-06-11 21:23:06'),
(13, 'soft delete tags', 'web', '2019-06-11 21:23:06', '2019-06-11 21:23:06'),
(14, 'delete tags', 'web', '2019-06-11 21:23:06', '2019-06-11 21:23:06'),
(15, 'view tags', 'web', '2019-06-11 21:23:06', '2019-06-11 21:23:06'),
(16, 'add store', 'web', '2019-06-11 21:23:06', '2019-06-11 21:23:06'),
(17, 'edit store', 'web', '2019-06-11 21:23:06', '2019-06-11 21:23:06'),
(18, 'soft delete store', 'web', '2019-06-11 21:23:06', '2019-06-11 21:23:06'),
(19, 'delete store', 'web', '2019-06-11 21:23:06', '2019-06-11 21:23:06'),
(20, 'view store', 'web', '2019-06-11 21:23:06', '2019-06-11 21:23:06'),
(21, 'add franchise', 'web', '2019-06-11 21:23:06', '2019-06-11 21:23:06'),
(22, 'edit franchise', 'web', '2019-06-11 21:23:06', '2019-06-11 21:23:06'),
(23, 'soft delete franchise', 'web', '2019-06-11 21:23:06', '2019-06-11 21:23:06'),
(24, 'delete franchise', 'web', '2019-06-11 21:23:06', '2019-06-11 21:23:06'),
(25, 'view franchise', 'web', '2019-06-11 21:23:06', '2019-06-11 21:23:06'),
(26, 'add promotion', 'web', '2019-06-11 21:23:06', '2019-06-11 21:23:06'),
(27, 'edit promotion', 'web', '2019-06-11 21:23:06', '2019-06-11 21:23:06'),
(28, 'soft delete promotion', 'web', '2019-06-11 21:23:06', '2019-06-11 21:23:06'),
(29, 'delete promotion', 'web', '2019-06-11 21:23:06', '2019-06-11 21:23:06'),
(30, 'view promotion', 'web', '2019-06-11 21:23:06', '2019-06-11 21:23:06'),
(31, 'add faq', 'web', '2019-06-11 21:23:06', '2019-06-11 21:23:06'),
(32, 'edit faq', 'web', '2019-06-11 21:23:06', '2019-06-11 21:23:06'),
(33, 'soft delete faq', 'web', '2019-06-11 21:23:06', '2019-06-11 21:23:06'),
(34, 'delete faq', 'web', '2019-06-11 21:23:06', '2019-06-11 21:23:06'),
(35, 'view faq', 'web', '2019-06-11 21:23:07', '2019-06-11 21:23:07'),
(36, 'edit profile', 'web', '2019-06-11 21:23:07', '2019-06-11 21:23:07'),
(37, 'view profile', 'web', '2019-06-11 21:23:07', '2019-06-11 21:23:07');

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time` timestamp NOT NULL,
  `end_time` timestamp NOT NULL,
  `location` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` double NOT NULL,
  `latitude` double NOT NULL,
  `payment_status` tinyint(4) NOT NULL,
  `store_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promotion_categories`
--

CREATE TABLE `promotion_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `promotion_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promotion_comments`
--

CREATE TABLE `promotion_comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `promotion_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promotion_media`
--

CREATE TABLE `promotion_media` (
  `id` int(10) UNSIGNED NOT NULL,
  `promotion_id` int(11) NOT NULL,
  `media_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promotion_tags`
--

CREATE TABLE `promotion_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `promotion_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2019-06-09 08:48:35', '2019-06-09 08:48:35'),
(2, 'Store Admin', 'web', '2019-06-09 08:48:35', '2019-06-09 08:48:35'),
(3, 'Store Franchise', 'web', '2019-06-09 08:48:35', '2019-06-09 08:48:35'),
(4, 'Mobile User', 'web', '2019-06-09 08:48:35', '2019-06-09 08:48:35');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(1, 2),
(2, 2),
(3, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(10, 2),
(11, 2),
(12, 2),
(13, 2),
(15, 2),
(16, 2),
(17, 2),
(18, 2),
(20, 2),
(21, 2),
(22, 2),
(23, 2),
(25, 2),
(26, 2),
(27, 2),
(28, 2),
(30, 2),
(31, 2),
(32, 2),
(33, 2),
(35, 2),
(36, 2),
(37, 2),
(6, 3),
(10, 3),
(11, 3),
(15, 3),
(21, 3),
(25, 3),
(26, 3),
(30, 3),
(31, 3),
(32, 3),
(35, 3),
(36, 3),
(37, 3);

-- --------------------------------------------------------

--
-- Table structure for table `social_stores`
--

CREATE TABLE `social_stores` (
  `id` int(10) UNSIGNED NOT NULL,
  `store_id` int(11) NOT NULL,
  `facebook_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insta_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `telephone` text COLLATE utf8mb4_unicode_ci,
  `websitelink` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emailaddress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desciption` longtext COLLATE utf8mb4_unicode_ci,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(10,8) DEFAULT NULL,
  `views` int(11) NOT NULL DEFAULT '1',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `name`, `address`, `telephone`, `websitelink`, `emailaddress`, `desciption`, `latitude`, `longitude`, `views`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Tarzz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2019-06-11 22:06:45', '2019-06-11 22:06:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_id` int(10) UNSIGNED NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `response` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `title`, `store_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Laravel', 1, 1, '2019-06-11 23:17:14', '2019-06-11 23:17:14', NULL),
(2, '124', 1, 1, '2019-06-13 01:25:57', '2019-06-13 01:25:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(10) UNSIGNED DEFAULT NULL,
  `store_id` int(10) UNSIGNED DEFAULT NULL,
  `phone_number` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_pic` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user_default.png',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `access_token` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `role_id`, `store_id`, `phone_number`, `profile_pic`, `remember_token`, `access_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'sarahasan224@gmail.com', '$2y$10$kJM.S/tsHLTmFongbqpP8uUfMtIRicQA7xq6MwjAQl/p8rj7nc58e', 'Sara Hasan', 1, NULL, '03452099689', 'user_default.png', NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6Ly9tYXJrYXoudGVzdC91c2VyL3NpZ25pbndlYiIsImlhdCI6MTU2MDQwOTEyMSwiZXhwIjoxNTYwNDEyNzIxLCJuYmYiOjE1NjA0MDkxMjEsImp0aSI6InlMUzBYYmllQXloQWJOcXgifQ.P_Rw_6cmG0QMpC49g12mVqC6v8h0qDKguEIA6I9RoPI', '2019-06-11 22:06:45', '2019-06-13 01:58:41', NULL),
(2, 'sara@gmail.com', '$2y$10$ENUEVT0Oe4ez1jrl3HTG9eaXcvE0dlgVVWRhY82DDhADwWiSJxCi2', 'Sara Hasan', 4, NULL, '090078601', 'user_default.png', NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjIsImlzcyI6Imh0dHA6Ly9tYXJrYXoudGVzdC9hcGkvdXNlci9zaWdudXAiLCJpYXQiOjE1NjAzMDkwMTcsImV4cCI6MTU2MDMxMjYxNywibmJmIjoxNTYwMzA5MDE3LCJqdGkiOiJSaWFRMlQ4Ukt5QndUaW5nIn0.HeSeyprROYalsaE-vJ1-Jgv7vtjkGelwcps5W4mEc6Q', '2019-06-11 22:10:17', '2019-06-11 22:10:17', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_store_id_foreign` (`store_id`);

--
-- Indexes for table `device_tokens`
--
ALTER TABLE `device_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `device_tokens_user_id_foreign` (`user_id`);

--
-- Indexes for table `event_logs`
--
ALTER TABLE `event_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_user_id_foreign` (`user_id`),
  ADD KEY `user_store_id_foreign` (`store_id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faq_user_id_foreign` (`user_id`),
  ADD KEY `faq_store_id_foreign` (`store_id`);

--
-- Indexes for table `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media_images`
--
ALTER TABLE `media_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `promotions_store_id_foreign` (`store_id`);

--
-- Indexes for table `promotion_categories`
--
ALTER TABLE `promotion_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotion_comments`
--
ALTER TABLE `promotion_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotion_media`
--
ALTER TABLE `promotion_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotion_tags`
--
ALTER TABLE `promotion_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `social_stores`
--
ALTER TABLE `social_stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`id`),
  ADD KEY `support_store_id_foreign` (`store_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_store_id_foreign` (`store_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `user_roles_id_foreign` (`role_id`),
  ADD KEY `user_store_id_foreign` (`store_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `device_tokens`
--
ALTER TABLE `device_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_logs`
--
ALTER TABLE `event_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `followers`
--
ALTER TABLE `followers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `media_images`
--
ALTER TABLE `media_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `promotion_categories`
--
ALTER TABLE `promotion_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `promotion_comments`
--
ALTER TABLE `promotion_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `promotion_media`
--
ALTER TABLE `promotion_media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `promotion_tags`
--
ALTER TABLE `promotion_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `social_stores`
--
ALTER TABLE `social_stores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `support`
--
ALTER TABLE `support`
  ADD CONSTRAINT `support_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
