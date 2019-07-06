-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 06, 2019 at 05:29 AM
-- Server version: 5.7.19
-- PHP Version: 7.1.20

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
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Pret', '98242.png', '2019-06-29 14:43:00', '2019-06-29 15:38:50', '2019-06-29 15:38:50'),
(2, 'Food', '62293.jpg', '2019-07-05 21:53:21', '2019-07-05 21:53:21', NULL),
(3, 'Clothing', '2428.jpg', '2019-07-05 21:54:09', '2019-07-05 22:03:59', NULL),
(4, 'Travel', '19912.jpg', '2019-07-05 21:55:05', '2019-07-05 21:55:05', NULL),
(5, 'Entertainment', '15461.jpg', '2019-07-05 22:04:50', '2019-07-05 22:04:50', NULL),
(6, 'Education', '29358.jpg', '2019-07-05 22:07:49', '2019-07-05 22:07:49', NULL),
(7, 'Health', '31296.jpg', '2019-07-05 22:08:04', '2019-07-05 22:08:04', NULL),
(8, 'Home Decor', '10414.png', '2019-07-05 22:08:57', '2019-07-05 22:08:57', NULL),
(9, 'Electronics', '30231.jpg', '2019-07-05 22:09:59', '2019-07-05 22:09:59', NULL),
(10, 'Self Care', '28555.jpg', '2019-07-05 22:11:10', '2019-07-05 22:11:10', NULL);

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
(1, 'Users', 'Sara Hasan', 'user_default.png', 'Logged In', 1, NULL, '2019-06-29 12:12:40', '2019-06-29 12:12:40', NULL),
(2, 'Users', 'Sara Hasan', 'user_default.png', 'Logged In', 1, NULL, '2019-06-29 12:17:34', '2019-06-29 12:17:34', NULL),
(3, 'Users', 'Sara Hasan', 'user_default.png', 'Logged In', 1, NULL, '2019-06-29 12:18:34', '2019-06-29 12:18:34', NULL),
(4, 'Users', 'Kashaf Nazir', '67470.jpg', 'Added', 1, NULL, '2019-06-29 12:32:21', '2019-06-29 12:32:21', NULL),
(5, 'Users', 'Kashaf Nazir', '26955.jpg', 'Added', 1, NULL, '2019-06-29 12:33:10', '2019-06-29 12:33:10', NULL),
(6, 'Users', 'Usman Siddiqui', '21385.jpg', 'Added', 1, NULL, '2019-06-29 12:34:06', '2019-06-29 12:34:06', NULL),
(7, 'Users', 'Kashaf Nazir', '26955.jpg', 'Deleted', 1, NULL, '2019-06-29 12:36:40', '2019-06-29 12:36:40', NULL),
(8, 'Users', 'Usman Siddiqui', '21385.jpg', 'Updated', 1, NULL, '2019-06-29 12:39:09', '2019-06-29 12:39:09', NULL),
(9, 'Users', 'Usman Siddiqui', '21385.jpg', 'Logged In', 4, NULL, '2019-06-29 12:44:31', '2019-06-29 12:44:31', NULL),
(10, 'Users', 'Usman Siddiqui', '21385.jpg', 'Logged In', 4, NULL, '2019-06-29 12:50:40', '2019-06-29 12:50:40', NULL),
(11, 'Users', 'Sara Hasan', 'user_default.png', 'Logged In', 1, NULL, '2019-06-29 12:53:16', '2019-06-29 12:53:16', NULL),
(12, 'Users', 'Usman Siddiqui', '21385.jpg', 'Logged In', 4, NULL, '2019-06-29 13:49:39', '2019-06-29 13:49:39', NULL),
(13, 'Users', 'Sara Hasan', '68281.jpg', 'Logged In', 1, NULL, '2019-06-29 15:24:53', '2019-06-29 15:24:53', NULL),
(14, 'Store', 'Limelight', NULL, 'Added', 1, NULL, '2019-06-29 16:06:57', '2019-06-29 16:06:57', NULL),
(15, 'Store', 'Limeligh', NULL, 'Added', 1, NULL, '2019-06-29 16:09:11', '2019-06-29 16:09:11', NULL),
(16, 'Users', 'Sara Hasan', '68281.jpg', 'Logged In', 1, NULL, '2019-06-30 01:55:32', '2019-06-30 01:55:32', NULL),
(17, 'Permission', 'Test', NULL, 'Added', 1, NULL, '2019-06-30 03:03:11', '2019-06-30 03:03:11', NULL),
(18, 'Permission', 'Test12123', NULL, 'Added', 1, NULL, '2019-06-30 03:05:12', '2019-06-30 03:05:12', NULL),
(19, 'Permission', 'We', NULL, 'Added', 1, NULL, '2019-06-30 03:06:00', '2019-06-30 03:06:00', NULL),
(20, 'Permission', 'abcwadsa', NULL, 'Added', 1, NULL, '2019-06-30 03:06:09', '2019-06-30 03:06:09', NULL),
(21, 'Users', 'Sara Hasan', '68281.jpg', 'Logged In', 1, NULL, '2019-06-30 09:23:10', '2019-06-30 09:23:10', NULL),
(22, 'Store', 'Limeligh', NULL, 'Deleted', 1, NULL, '2019-06-30 10:22:38', '2019-06-30 10:22:38', NULL),
(23, 'Store', 'Limelight', NULL, 'Deleted', 1, NULL, '2019-06-30 10:23:27', '2019-06-30 10:23:27', NULL),
(24, 'Users', 'Sara Hasan', '68281.jpg', 'Logged In', 1, NULL, '2019-07-05 21:22:09', '2019-07-05 21:22:09', NULL),
(25, 'Store', 'Hardees', NULL, 'Added', 1, NULL, '2019-07-05 22:39:26', '2019-07-05 22:39:26', NULL),
(26, 'Users', 'Sara Hasan', '68281.jpg', 'Logged In', 1, NULL, '2019-07-05 22:40:07', '2019-07-05 22:40:07', NULL),
(27, 'Users', 'Sara Hasan', '68281.jpg', 'Logged In', 1, NULL, '2019-07-05 22:40:27', '2019-07-05 22:40:27', NULL),
(28, 'Users', 'Sara Hasan', '68281.jpg', 'Logged In', 1, NULL, '2019-07-05 22:40:45', '2019-07-05 22:40:45', NULL),
(29, 'Store', 'Hardees', NULL, 'Updated', 1, 1, '2019-07-05 23:29:18', '2019-07-05 23:29:18', NULL),
(30, 'Store', 'Hardees', NULL, 'Updated', 1, 1, '2019-07-05 23:29:34', '2019-07-05 23:29:34', NULL),
(31, 'Users', 'Usman Siddiqui', '21385.jpg', 'Logged In', 4, NULL, '2019-07-05 23:43:52', '2019-07-05 23:43:52', NULL),
(32, 'Users', 'Usman Siddiqui', '21385.jpg', 'Logged In', 4, NULL, '2019-07-05 23:52:47', '2019-07-05 23:52:47', NULL),
(33, 'Users', 'Usman Siddiqui', '21385.jpg', 'Logged In', 4, NULL, '2019-07-05 23:55:19', '2019-07-05 23:55:19', NULL),
(34, 'Users', 'Usman Siddiqui', '21385.jpg', 'Logged In', 4, NULL, '2019-07-05 23:55:52', '2019-07-05 23:55:52', NULL),
(35, 'Users', 'Usman Siddiqui', '21385.jpg', 'Logged In', 4, NULL, '2019-07-05 23:56:50', '2019-07-05 23:56:50', NULL),
(36, 'Users', 'Sara Hasan', '68281.jpg', 'Logged In', 1, NULL, '2019-07-05 23:57:18', '2019-07-05 23:57:18', NULL),
(37, 'Users', 'Usman Siddiqui', '21385.jpg', 'Logged In', 4, NULL, '2019-07-05 23:57:39', '2019-07-05 23:57:39', NULL),
(38, 'Store', 'Hardees', NULL, 'Status Updated', 4, NULL, '2019-07-06 00:15:07', '2019-07-06 00:15:07', NULL),
(39, 'Store', 'Hardees', NULL, 'Status Updated', 4, NULL, '2019-07-06 00:16:01', '2019-07-06 00:16:01', NULL),
(40, 'Store', 'Hardees', NULL, 'Status Updated', 4, NULL, '2019-07-06 00:16:06', '2019-07-06 00:16:06', NULL),
(41, 'Store', 'Limelight', NULL, 'Added', 4, NULL, '2019-07-06 00:27:52', '2019-07-06 00:27:52', NULL);

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

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `title`, `description`, `user_id`, `store_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 'Lorem Ipsum has been the industry', 'Vasste jaan bhi dun', 5, 1, 1, '2019-06-02 14:56:22', '2019-06-02 16:02:43', NULL);

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
(38, '2019_02_27_014131_create_device_tokens_table', 1),
(41, '2019_03_23_115107_create_media_images_table', 1),
(42, '2019_03_24_052642_create_promotion_medias_table', 1),
(43, '2019_03_24_065156_create_followers_table', 1),
(44, '2019_03_25_053544_create_promoton_comments_table', 1),
(45, '2019_04_07_151529_create_support_table', 1),
(48, '2019_05_17_103513_create_social_media_table', 1),
(57, '2019_06_02_163219_create_faq_table', 4),
(58, '2019_06_09_133704_create_permission_tables', 5),
(60, '2019_06_12_183457_create_logs_table', 7),
(61, '2014_10_12_000000_create_users_table', 8),
(66, '2019_02_28_181002_create_promotions_table', 9),
(67, '2019_05_27_161418_create_categories_table', 9),
(68, '2019_05_27_161508_create_tags_table', 9),
(69, '2019_02_28_171441_create_stores_table', 10);

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
(4, 'App\\User', 1),
(5, 'App\\User', 1),
(6, 'App\\User', 1),
(7, 'App\\User', 1),
(8, 'App\\User', 1),
(9, 'App\\User', 1),
(10, 'App\\User', 1),
(11, 'App\\User', 1),
(12, 'App\\User', 1),
(13, 'App\\User', 1),
(14, 'App\\User', 1),
(15, 'App\\User', 1),
(16, 'App\\User', 1),
(17, 'App\\User', 1),
(18, 'App\\User', 1),
(19, 'App\\User', 1),
(20, 'App\\User', 1),
(21, 'App\\User', 1),
(22, 'App\\User', 1),
(23, 'App\\User', 1),
(24, 'App\\User', 1),
(25, 'App\\User', 1),
(26, 'App\\User', 1),
(27, 'App\\User', 1),
(28, 'App\\User', 1),
(29, 'App\\User', 1),
(30, 'App\\User', 1),
(31, 'App\\User', 1),
(32, 'App\\User', 1),
(33, 'App\\User', 1),
(34, 'App\\User', 1),
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
(1, 'App\\User', 1),
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
(1, 'add user', 'web', '2019-06-25 23:11:28', '2019-06-25 23:11:28'),
(2, 'edit user', 'web', '2019-06-25 23:11:28', '2019-06-25 23:11:28'),
(3, 'soft delete user', 'web', '2019-06-25 23:11:28', '2019-06-25 23:11:28'),
(4, 'delete user', 'web', '2019-06-25 23:11:28', '2019-06-25 23:11:28'),
(5, 'view user', 'web', '2019-06-25 23:11:28', '2019-06-25 23:11:28'),
(6, 'add categories', 'web', '2019-06-25 23:11:28', '2019-06-25 23:11:28'),
(7, 'edit categories', 'web', '2019-06-25 23:11:28', '2019-06-25 23:11:28'),
(8, 'soft delete categories', 'web', '2019-06-25 23:11:28', '2019-06-25 23:11:28'),
(9, 'delete categories', 'web', '2019-06-25 23:11:28', '2019-06-25 23:11:28'),
(10, 'view categories', 'web', '2019-06-25 23:11:28', '2019-06-25 23:11:28'),
(11, 'add tags', 'web', '2019-06-25 23:11:28', '2019-06-25 23:11:28'),
(12, 'edit tags', 'web', '2019-06-25 23:11:28', '2019-06-25 23:11:28'),
(13, 'soft delete tags', 'web', '2019-06-25 23:11:29', '2019-06-25 23:11:29'),
(14, 'delete tags', 'web', '2019-06-25 23:11:29', '2019-06-25 23:11:29'),
(15, 'view tags', 'web', '2019-06-25 23:11:29', '2019-06-25 23:11:29'),
(16, 'add store', 'web', '2019-06-25 23:11:29', '2019-06-25 23:11:29'),
(17, 'edit store', 'web', '2019-06-25 23:11:29', '2019-06-25 23:11:29'),
(18, 'soft delete store', 'web', '2019-06-25 23:11:29', '2019-06-25 23:11:29'),
(19, 'delete store', 'web', '2019-06-25 23:11:29', '2019-06-25 23:11:29'),
(20, 'view store', 'web', '2019-06-25 23:11:29', '2019-06-25 23:11:29'),
(21, 'add franchise', 'web', '2019-06-25 23:11:29', '2019-06-25 23:11:29'),
(22, 'edit franchise', 'web', '2019-06-25 23:11:29', '2019-06-25 23:11:29'),
(23, 'soft delete franchise', 'web', '2019-06-25 23:11:29', '2019-06-25 23:11:29'),
(24, 'delete franchise', 'web', '2019-06-25 23:11:29', '2019-06-25 23:11:29'),
(25, 'view franchise', 'web', '2019-06-25 23:11:29', '2019-06-25 23:11:29'),
(26, 'add promotion', 'web', '2019-06-25 23:11:29', '2019-06-25 23:11:29'),
(27, 'edit promotion', 'web', '2019-06-25 23:11:29', '2019-06-25 23:11:29'),
(28, 'soft delete promotion', 'web', '2019-06-25 23:11:29', '2019-06-25 23:11:29'),
(29, 'delete promotion', 'web', '2019-06-25 23:11:29', '2019-06-25 23:11:29'),
(30, 'view promotion', 'web', '2019-06-25 23:11:30', '2019-06-25 23:11:30'),
(31, 'add faq', 'web', '2019-06-25 23:11:30', '2019-06-25 23:11:30'),
(32, 'edit faq', 'web', '2019-06-25 23:11:30', '2019-06-25 23:11:30'),
(33, 'soft delete faq', 'web', '2019-06-25 23:11:30', '2019-06-25 23:11:30'),
(34, 'delete faq', 'web', '2019-06-25 23:11:30', '2019-06-25 23:11:30'),
(35, 'view faq', 'web', '2019-06-25 23:11:30', '2019-06-25 23:11:30'),
(36, 'edit profile', 'web', '2019-06-25 23:11:30', '2019-06-25 23:11:30'),
(37, 'view profile', 'web', '2019-06-25 23:11:30', '2019-06-25 23:11:30');

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
  `category_id` bigint(20) UNSIGNED NOT NULL,
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
  `media_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promotion_media`
--

INSERT INTO `promotion_media` (`id`, `promotion_id`, `media_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'clasp-01.jpg', NULL, NULL, NULL),
(2, 1, 'blue-4.jpg', NULL, NULL, NULL),
(3, 1, 'clasp-02.jpg', NULL, NULL, NULL),
(4, 1, 'clearance-pro.png', NULL, NULL, NULL),
(5, 1, '85485.jpg', '2019-06-02 07:43:05', '2019-06-02 07:43:05', NULL),
(6, 1, '4686.jpg', '2019-06-02 07:43:05', '2019-06-02 07:43:05', NULL),
(7, 1, '19904.jpg', '2019-06-02 07:43:05', '2019-06-02 07:43:05', NULL),
(8, 1, '21473.png', '2019-06-02 07:43:05', '2019-06-02 07:43:05', NULL),
(9, 2, '35208.jpg', '2019-06-02 07:47:09', '2019-06-02 07:47:09', NULL),
(10, 2, '46833.jpg', '2019-06-02 07:47:09', '2019-06-02 07:47:09', NULL),
(11, 3, '80271.jpg', '2019-06-02 07:54:44', '2019-06-02 07:54:44', NULL),
(12, 3, '17059.jpg', '2019-06-02 07:54:45', '2019-06-02 07:54:45', NULL),
(13, 3, '2996.jpg', '2019-06-02 07:54:45', '2019-06-02 07:54:45', NULL),
(14, 3, '76035.jpg', '2019-06-02 07:54:45', '2019-06-02 07:54:45', NULL),
(15, 3, '24142.jpg', '2019-06-02 07:54:45', '2019-06-02 07:54:45', NULL);

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
(1, 'Admin', 'web', '2019-06-25 23:11:28', '2019-06-25 23:11:28'),
(2, 'Store Admin', 'web', '2019-06-25 23:11:28', '2019-06-25 23:11:28');

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
(37, 2);

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

--
-- Dumping data for table `social_stores`
--

INSERT INTO `social_stores` (`id`, `store_id`, `facebook_link`, `twitter_link`, `insta_link`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'https://www.facebook.com/hardees', 'https://twitter.com/hardees', 'https://www.instagram.com/hardees/', '2019-07-05 22:39:26', '2019-07-05 22:39:26', NULL),
(2, 2, 'https://www.facebook.com/limelight.pret/', NULL, 'https://www.instagram.com/limelight.pret/', '2019-07-06 00:27:52', '2019-07-06 00:27:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `telephone` text COLLATE utf8mb4_unicode_ci,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emailaddress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tagline` longtext COLLATE utf8mb4_unicode_ci,
  `latitude` double(15,8) DEFAULT NULL,
  `longitude` double(15,8) DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `views` int(11) NOT NULL DEFAULT '1',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `name`, `cover`, `image`, `address`, `telephone`, `website`, `emailaddress`, `tagline`, `latitude`, `longitude`, `user_id`, `category_id`, `views`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Hardees', '11469.jpg', '64507.jpg', 'hardees near Karachi City, Pakistan', 'GUEST RESPONSE LINE \r\n(877) 799-STAR (7827) \r\nMon. - Fri. \r\n5:00 a.m. - 11:00 p.m. Central \r\n\r\nCORPORATE OFFICE \r\nCKE RESTAURANTS HOLDINGS, INC. \r\n6700 Tower Circle, Suite 1000 \r\nFranklin, TN 37067', 'https://www.hardees.com/', 'FOR MEDIA INQUIRIES \r\nmediarelations@ckr.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 24.79581513, 67.04972838, 4, 2, 1, 1, '2019-07-05 22:39:25', '2019-07-06 00:16:06', NULL),
(2, 'Limelight', '49340.jpg', '26012.png', 'LIMELIGHT، Karachi, Pakistan', 'Telephone:\r\n+92311-1222681\r\nMonday to Saturday from 09:30 am to 11:00 pm PKT', 'https://www.limelight.pk/', 'Email\r\nOnline@limelight.pk\r\nEmail us for enquiries about online purchase & stores', 'It all started in 2010 with debonair textures, flairy cutlines and swanky fabrics. With more than 55 stores nationwide Limelight offers various product lines that can click anyone’s heart. Our product range started from women’s formal & casual wear, moving to kids and men’s wear. Limelight’s clothing line includes both stitched and unstitched fabrics so that our customers can choose and adopt the styles of their own. The product portfolio further extends to bottoms, bags, clutches, wallets, wraps, sleepwear, jewellery and accessories. We specialize in embellishments that are incorporated in multiple product lines like shirts & bags.\r\n\r\nWe strategize to bring colours of east and west; showcasing traditional clothing and western wear side by side for multiple tastes out there. Our goal is to cater fashionistas of all ages. Fresh stock is sent to stores multiples times each week.\r\n\r\nWe plan to grow both with new stores and online, in existing as well as new markets to make good quality fashion accessible for local and international customers. Limelight’s philosophy is to transform wardrobes by providing high quality products in affordable prices that are exquisite one of a kind pieces!', 24.93389778, 67.08807753, 4, 3, 1, 1, '2019-07-06 00:27:52', '2019-07-06 00:27:52', NULL);

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
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `title`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Pret', NULL, '2019-07-06 00:00:31', '2019-07-06 00:00:31', NULL);

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

INSERT INTO `users` (`id`, `email`, `password`, `name`, `role_id`, `phone_number`, `profile_pic`, `remember_token`, `access_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'sarahasan224@gmail.com', '$2y$10$AGlcLD1fNxbYFups1EL9..JsJHm7IRfVytCfmzbmab5v.PdmqKUj2', 'Sara Hasan', 1, '03452099689', '68281.jpg', NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6Ly9meXAudGVzdC91c2VyL3NpZ25pbndlYiIsImlhdCI6MTU2MjM4OTAzOCwiZXhwIjoxNTYyMzkyNjM4LCJuYmYiOjE1NjIzODkwMzgsImp0aSI6InA1dThNZjdNeHZtMXk3RGUifQ.kD5_gQKwLTXkmJlEAa6jdsnGkr1I_8_3stv39l7UHhc', '2019-06-29 12:20:48', '2019-07-05 23:57:18', NULL),
(4, 'usmaan.siddiqui@gmail.com', '$2y$10$zDcSnc8frOHhc8pEoRwLxOQodz1kDW1NNsc7yu7jKYeXv4c6d3v22', 'Usman Siddiqui', 2, '900770', '21385.jpg', NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjQsImlzcyI6Imh0dHA6Ly9meXAudGVzdC91c2VyL3NpZ25pbndlYiIsImlhdCI6MTU2MjM4OTA1OSwiZXhwIjoxNTYyMzkyNjU5LCJuYmYiOjE1NjIzODkwNTksImp0aSI6IjdnT1NNM2VMdGFYR0R2ZjIifQ.0X77bWWBkSCvUqFJUvb3HRAUsdglJfpCWGgqhdfetgs', '2019-06-29 12:34:06', '2019-07-05 23:57:39', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `promotions_store_id_foreign` (`store_id`),
  ADD KEY `promotions_category_id_foreign` (`category_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_user_id_foreign` (`user_id`),
  ADD KEY `user_category_id_foreign` (`category_id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `user_roles_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `device_tokens`
--
ALTER TABLE `device_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_logs`
--
ALTER TABLE `event_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `followers`
--
ALTER TABLE `followers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media_images`
--
ALTER TABLE `media_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `social_stores`
--
ALTER TABLE `social_stores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
