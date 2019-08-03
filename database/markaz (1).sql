-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2019 at 10:04 AM
-- Server version: 5.7.24
-- PHP Version: 7.3.6

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
(10, 'Self Care', '28555.jpg', '2019-07-05 22:11:10', '2019-07-05 22:11:10', NULL),
(11, 'Pret', '23964.jpg', '2019-07-20 22:24:59', '2019-07-20 22:24:59', NULL);

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
(41, 'Store', 'Limelight', NULL, 'Added', 4, NULL, '2019-07-06 00:27:52', '2019-07-06 00:27:52', NULL),
(42, 'Promotions', 'Clearance Sale (10% Off)', NULL, 'Added', 4, 2, '2019-07-06 03:25:25', '2019-07-06 03:25:25', NULL),
(43, 'Promotions', 'Clearance Sale (10% Off)', NULL, 'Added', 4, 2, '2019-07-06 03:40:37', '2019-07-06 03:40:37', NULL),
(44, 'Promotions', 'Clearance Sale (10% Off)', NULL, 'Deleted', 4, NULL, '2019-07-06 03:40:53', '2019-07-06 03:40:53', NULL),
(45, 'Promotions', 'Clearance Sale (10% Off)', NULL, 'Added', 4, 2, '2019-07-06 03:42:59', '2019-07-06 03:42:59', NULL),
(46, 'Promotions', 'Electronics & Appliances 10% Off on selected items', NULL, 'Added', 4, 1, '2019-07-06 11:31:31', '2019-07-06 11:31:31', NULL),
(47, 'Promotions', 'Mid Season Sale Up to 30% Off', NULL, 'Added', 4, 2, '2019-07-06 11:37:01', '2019-07-06 11:37:01', NULL),
(48, 'Store', 'Hardees', NULL, 'Updated', 4, 1, '2019-07-06 11:57:57', '2019-07-06 11:57:57', NULL),
(49, 'Store', 'Hardees', NULL, 'Updated', 4, 1, '2019-07-06 11:58:47', '2019-07-06 11:58:47', NULL),
(50, 'Store', 'Hardees', NULL, 'Updated', 4, 1, '2019-07-06 11:59:45', '2019-07-06 11:59:45', NULL),
(51, 'Users', 'Sara Hasan', '68281.jpg', 'Logged In', 1, NULL, '2019-07-06 23:40:39', '2019-07-06 23:40:39', NULL),
(52, 'Users', 'Usman Siddiqui', '21385.jpg', 'Logged In', 4, NULL, '2019-07-06 23:47:36', '2019-07-06 23:47:36', NULL),
(53, 'Users', 'Sara Hasan', '68281.jpg', 'Logged In', 1, NULL, '2019-07-07 02:16:32', '2019-07-07 02:16:32', NULL),
(54, 'Users', 'Usman Siddiqui', '21385.jpg', 'Logged In', 4, NULL, '2019-07-07 02:20:57', '2019-07-07 02:20:57', NULL),
(55, 'Users', 'Usman Siddiqui', '21385.jpg', 'Logged In', 4, NULL, '2019-07-07 04:37:34', '2019-07-07 04:37:34', NULL),
(56, 'Store', 'Hardees', NULL, 'Updated', 4, 1, '2019-07-07 08:19:29', '2019-07-07 08:19:29', NULL),
(57, 'Users', 'Sara Hasan', '68281.jpg', 'Logged In', 1, NULL, '2019-07-07 10:20:09', '2019-07-07 10:20:09', NULL),
(58, 'Users', 'Sara Hasan', '68281.jpg', 'Logged In', 1, NULL, '2019-07-07 10:24:13', '2019-07-07 10:24:13', NULL),
(59, 'Users', 'Sara Hasan', '68281.jpg', 'Logged In', 1, NULL, '2019-07-07 10:25:14', '2019-07-07 10:25:14', NULL),
(60, 'Users', 'Sara Hasan', '68281.jpg', 'Logged In', 1, NULL, '2019-07-07 10:26:12', '2019-07-07 10:26:12', NULL),
(61, 'Users', 'Sara Hasan', '68281.jpg', 'Logged In', 1, NULL, '2019-07-07 10:27:01', '2019-07-07 10:27:01', NULL),
(62, 'Users', 'Sara Hasan', '68281.jpg', 'Logged In', 1, NULL, '2019-07-07 10:27:53', '2019-07-07 10:27:53', NULL),
(63, 'Users', 'Sara Hasan', '68281.jpg', 'Logged In', 1, NULL, '2019-07-07 10:29:59', '2019-07-07 10:29:59', NULL),
(64, 'Users', 'Sara Hasan', '68281.jpg', 'Logged In', 1, NULL, '2019-07-07 10:34:25', '2019-07-07 10:34:25', NULL),
(65, 'Users', 'Sara Hasan', '68281.jpg', 'Logged In', 1, NULL, '2019-07-07 10:37:25', '2019-07-07 10:37:25', NULL),
(66, 'Users', 'Sara Hasan', '68281.jpg', 'Logged In', 1, NULL, '2019-07-07 10:38:36', '2019-07-07 10:38:36', NULL),
(67, 'Users', 'Usman Siddiqui', '21385.jpg', 'Logged In', 4, NULL, '2019-07-07 12:01:22', '2019-07-07 12:01:22', NULL),
(68, 'Users', 'Sara Hasan', '68281.jpg', 'Logged In', 1, NULL, '2019-07-07 12:45:49', '2019-07-07 12:45:49', NULL),
(69, 'Users', 'Sara Hasan', '68281.jpg', 'Logged In', 1, NULL, '2019-07-07 12:59:56', '2019-07-07 12:59:56', NULL),
(70, 'Users', 'Hamza Khan', '20243.jpg', 'Added', 1, NULL, '2019-07-07 13:02:22', '2019-07-07 13:02:22', NULL),
(71, 'Users', 'Seerat Khan', '93100.jpg', 'Added', 1, NULL, '2019-07-07 13:03:33', '2019-07-07 13:03:33', NULL),
(72, 'Users', 'Shajia Khan', '48622.jpg', 'Added', 1, NULL, '2019-07-07 13:05:17', '2019-07-07 13:05:17', NULL),
(73, 'Users', 'Ramsha Khan', '81689.jpg', 'Added', 1, NULL, '2019-07-07 13:06:03', '2019-07-07 13:06:03', NULL),
(74, 'Users', 'Amad Khan', '59452.jpg', 'Added', 1, NULL, '2019-07-07 13:06:33', '2019-07-07 13:06:33', NULL),
(75, 'Users', 'Sadiq Khan', '24092.jpg', 'Added', 1, NULL, '2019-07-07 13:07:02', '2019-07-07 13:07:02', NULL),
(76, 'Users', 'Kiran Khan', '81581.jpg', 'Added', 1, NULL, '2019-07-07 13:07:33', '2019-07-07 13:07:33', NULL),
(77, 'Users', 'Shah Jahan Khan', '98561.jpg', 'Added', 1, NULL, '2019-07-07 13:08:09', '2019-07-07 13:08:09', NULL),
(78, 'Users', 'Shahrukh Khan', '49682.jpg', 'Added', 1, NULL, '2019-07-07 13:08:45', '2019-07-07 13:08:45', NULL),
(79, 'Users', 'Farrukh Khan', '11096.jpg', 'Added', 1, NULL, '2019-07-07 13:09:18', '2019-07-07 13:09:18', NULL),
(80, 'Users', 'Farah Naeem', '67874.jpg', 'Added', 1, NULL, '2019-07-07 13:09:54', '2019-07-07 13:09:54', NULL),
(81, 'Users', 'Hina Mahmood', '73969.jpg', 'Added', 1, NULL, '2019-07-07 13:10:26', '2019-07-07 13:10:26', NULL),
(82, 'Users', 'Saad Naeem', '69918.jpg', 'Added', 1, NULL, '2019-07-07 13:11:02', '2019-07-07 13:11:02', NULL),
(83, 'Users', 'Hamid Mir', '60813.jpg', 'Added', 1, NULL, '2019-07-07 13:11:42', '2019-07-07 13:11:42', NULL),
(84, 'Users', 'Khuwala Javed', '86019.jpg', 'Added', 1, NULL, '2019-07-07 13:12:30', '2019-07-07 13:12:30', NULL),
(85, 'Users', 'Jawad Ahmed', '58802.jpg', 'Added', 1, NULL, '2019-07-07 13:13:05', '2019-07-07 13:13:05', NULL),
(86, 'Users', 'Maham Arif', '9127.jpg', 'Added', 1, NULL, '2019-07-07 13:13:53', '2019-07-07 13:13:53', NULL),
(87, 'Users', 'Kashaf Yousuf', '79107.jpg', 'Added', 1, NULL, '2019-07-07 13:14:24', '2019-07-07 13:14:24', NULL),
(88, 'Users', 'Tariq Khan', '87644.jpg', 'Added', 1, NULL, '2019-07-07 13:15:00', '2019-07-07 13:15:00', NULL),
(89, 'Users', 'Komal Fatima', '38172.jpg', 'Added', 1, NULL, '2019-07-07 13:15:34', '2019-07-07 13:15:34', NULL),
(90, 'Users', 'Yumna Zaidi', '29888.jpg', 'Added', 1, NULL, '2019-07-07 13:16:13', '2019-07-07 13:16:13', NULL),
(91, 'Users', 'Kulsoom Usmani', '94783.jpg', 'Added', 1, NULL, '2019-07-07 13:16:45', '2019-07-07 13:16:45', NULL),
(92, 'Users', 'Talat Hussain', '54343.jpg', 'Added', 1, NULL, '2019-07-07 13:17:18', '2019-07-07 13:17:18', NULL),
(93, 'Users', 'Talha Nadeem', '69935.jpg', 'Added', 1, NULL, '2019-07-07 13:17:55', '2019-07-07 13:17:55', NULL),
(94, 'Users', 'Kashaf Nazir', 'user_default.png', 'Logged In', 36, NULL, '2019-07-07 13:38:48', '2019-07-07 13:38:48', NULL),
(95, 'Store', 'Rochester Cafe & Grill', NULL, 'Added', 39, NULL, '2019-07-07 14:01:11', '2019-07-07 14:01:11', NULL),
(96, 'Users', 'Sara Hasan', '68281.jpg', 'Logged In', 1, NULL, '2019-07-07 14:03:09', '2019-07-07 14:03:09', NULL),
(97, 'Users', 'Sara Hasan', '68281.jpg', 'Logged In', 1, NULL, '2019-07-20 04:51:54', '2019-07-20 04:51:54', NULL),
(98, 'Users', 'Sara Hasan', '68281.jpg', 'Logged In', 1, NULL, '2019-07-20 09:54:00', '2019-07-20 09:54:00', NULL),
(99, 'Users', 'Sara Hasan', '68281.jpg', 'Logged In', 1, NULL, '2019-07-20 22:22:59', '2019-07-20 22:22:59', NULL),
(100, 'Users', 'Sara Hasan', '68281.jpg', 'Logged In', 1, NULL, '2019-08-03 01:57:42', '2019-08-03 01:57:42', NULL),
(101, 'Users', 'Usman Siddiqui', '21385.jpg', 'Logged In', 4, NULL, '2019-08-03 02:28:05', '2019-08-03 02:28:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `title`, `description`, `store_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 'Lorem Ipsum has been the industry', 'Vasste jaan bhi dun', 1, 1, '2019-06-02 14:56:22', '2019-06-02 16:02:43', NULL);

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
(1, 4, 1, 1, '2019-07-26 05:20:00', '2019-07-10 04:39:00', NULL);

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

--
-- Dumping data for table `media_images`
--

INSERT INTO `media_images` (`id`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '24476.jpg', '2019-07-06 03:42:57', '2019-07-06 03:42:57', NULL),
(2, '59768.jpg', '2019-07-06 03:42:57', '2019-07-06 03:42:57', NULL),
(3, '14811.jpg', '2019-07-06 03:42:57', '2019-07-06 03:42:57', NULL),
(4, '18578.jpg', '2019-07-06 03:42:57', '2019-07-06 03:42:57', NULL),
(5, '59489.png', '2019-07-06 03:42:57', '2019-07-06 03:42:57', NULL),
(6, '36690.jpg', '2019-07-06 03:42:58', '2019-07-06 03:42:58', NULL),
(7, '49072.jpg', '2019-07-06 03:42:58', '2019-07-06 03:42:58', NULL),
(8, '77024.png', '2019-07-06 03:42:58', '2019-07-06 03:42:58', NULL),
(9, '73223.jpg', '2019-07-06 03:42:58', '2019-07-06 03:42:58', NULL),
(10, '44012.jpg', '2019-07-06 03:42:58', '2019-07-06 03:42:58', NULL),
(11, '58098.jpg', '2019-07-06 11:31:31', '2019-07-06 11:31:31', NULL),
(12, '65174.jpg', '2019-07-06 11:31:31', '2019-07-06 11:31:31', NULL),
(13, '93059.jpg', '2019-07-06 11:31:31', '2019-07-06 11:31:31', NULL),
(14, '55609.jpg', '2019-07-06 11:31:31', '2019-07-06 11:31:31', NULL),
(15, '46605.jpg', '2019-07-06 11:31:31', '2019-07-06 11:31:31', NULL),
(16, '31377.jpg', '2019-07-06 11:31:31', '2019-07-06 11:31:31', NULL),
(17, '57187.jpg', '2019-07-06 11:31:31', '2019-07-06 11:31:31', NULL),
(18, '3821.jpg', '2019-07-06 11:31:31', '2019-07-06 11:31:31', NULL),
(19, '42740.jpg', '2019-07-06 11:31:31', '2019-07-06 11:31:31', NULL),
(20, '57230.jpg', '2019-07-06 11:31:31', '2019-07-06 11:31:31', NULL),
(21, '21789.jpg', '2019-07-06 11:37:00', '2019-07-06 11:37:00', NULL),
(22, '56378.jpg', '2019-07-06 11:37:00', '2019-07-06 11:37:00', NULL),
(23, '96622.jpg', '2019-07-06 11:37:00', '2019-07-06 11:37:00', NULL),
(24, '75078.jpg', '2019-07-06 11:37:00', '2019-07-06 11:37:00', NULL),
(25, '51249.jpg', '2019-07-06 11:37:01', '2019-07-06 11:37:01', NULL),
(26, '46928.jpg', '2019-07-06 11:37:01', '2019-07-06 11:37:01', NULL),
(27, '55683.jpg', '2019-07-06 11:37:01', '2019-07-06 11:37:01', NULL),
(28, '77610.jpg', '2019-07-06 11:37:01', '2019-07-06 11:37:01', NULL),
(29, '8632.jpg', '2019-07-06 11:37:01', '2019-07-06 11:37:01', NULL),
(30, '71455.jpg', '2019-07-06 11:37:01', '2019-07-06 11:37:01', NULL);

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
(67, '2019_05_27_161418_create_categories_table', 9),
(68, '2019_05_27_161508_create_tags_table', 9),
(69, '2019_02_28_171441_create_stores_table', 10),
(71, '2019_02_28_181002_create_promotions_table', 11),
(73, '2019_07_07_060549_create_store_ratings_table', 12);

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
(37, 'App\\User', 1),
(1, 'App\\User', 30),
(2, 'App\\User', 30),
(3, 'App\\User', 30),
(4, 'App\\User', 30),
(5, 'App\\User', 30),
(6, 'App\\User', 30),
(7, 'App\\User', 30),
(8, 'App\\User', 30),
(9, 'App\\User', 30),
(10, 'App\\User', 30),
(11, 'App\\User', 30),
(12, 'App\\User', 30),
(13, 'App\\User', 30),
(14, 'App\\User', 30),
(15, 'App\\User', 30),
(16, 'App\\User', 30),
(17, 'App\\User', 30),
(18, 'App\\User', 30),
(19, 'App\\User', 30),
(20, 'App\\User', 30),
(21, 'App\\User', 30),
(22, 'App\\User', 30),
(23, 'App\\User', 30),
(24, 'App\\User', 30),
(25, 'App\\User', 30),
(26, 'App\\User', 30),
(27, 'App\\User', 30),
(28, 'App\\User', 30),
(29, 'App\\User', 30),
(30, 'App\\User', 30),
(31, 'App\\User', 30),
(32, 'App\\User', 30),
(33, 'App\\User', 30),
(34, 'App\\User', 30),
(35, 'App\\User', 30),
(36, 'App\\User', 30),
(37, 'App\\User', 30),
(1, 'App\\User', 31),
(2, 'App\\User', 31),
(3, 'App\\User', 31),
(4, 'App\\User', 31),
(5, 'App\\User', 31),
(6, 'App\\User', 31),
(7, 'App\\User', 31),
(8, 'App\\User', 31),
(9, 'App\\User', 31),
(10, 'App\\User', 31),
(11, 'App\\User', 31),
(12, 'App\\User', 31),
(13, 'App\\User', 31),
(14, 'App\\User', 31),
(15, 'App\\User', 31),
(16, 'App\\User', 31),
(17, 'App\\User', 31),
(18, 'App\\User', 31),
(19, 'App\\User', 31),
(20, 'App\\User', 31),
(21, 'App\\User', 31),
(22, 'App\\User', 31),
(23, 'App\\User', 31),
(24, 'App\\User', 31),
(25, 'App\\User', 31),
(26, 'App\\User', 31),
(27, 'App\\User', 31),
(28, 'App\\User', 31),
(29, 'App\\User', 31),
(30, 'App\\User', 31),
(31, 'App\\User', 31),
(32, 'App\\User', 31),
(33, 'App\\User', 31),
(34, 'App\\User', 31),
(35, 'App\\User', 31),
(36, 'App\\User', 31),
(37, 'App\\User', 31),
(1, 'App\\User', 32),
(2, 'App\\User', 32),
(3, 'App\\User', 32),
(4, 'App\\User', 32),
(5, 'App\\User', 32),
(6, 'App\\User', 32),
(7, 'App\\User', 32),
(8, 'App\\User', 32),
(9, 'App\\User', 32),
(10, 'App\\User', 32),
(11, 'App\\User', 32),
(12, 'App\\User', 32),
(13, 'App\\User', 32),
(14, 'App\\User', 32),
(15, 'App\\User', 32),
(16, 'App\\User', 32),
(17, 'App\\User', 32),
(18, 'App\\User', 32),
(19, 'App\\User', 32),
(20, 'App\\User', 32),
(21, 'App\\User', 32),
(22, 'App\\User', 32),
(23, 'App\\User', 32),
(24, 'App\\User', 32),
(25, 'App\\User', 32),
(26, 'App\\User', 32),
(27, 'App\\User', 32),
(28, 'App\\User', 32),
(29, 'App\\User', 32),
(30, 'App\\User', 32),
(31, 'App\\User', 32),
(32, 'App\\User', 32),
(33, 'App\\User', 32),
(34, 'App\\User', 32),
(35, 'App\\User', 32),
(36, 'App\\User', 32),
(37, 'App\\User', 32),
(1, 'App\\User', 33),
(2, 'App\\User', 33),
(3, 'App\\User', 33),
(4, 'App\\User', 33),
(5, 'App\\User', 33),
(6, 'App\\User', 33),
(7, 'App\\User', 33),
(8, 'App\\User', 33),
(9, 'App\\User', 33),
(10, 'App\\User', 33),
(11, 'App\\User', 33),
(12, 'App\\User', 33),
(13, 'App\\User', 33),
(14, 'App\\User', 33),
(15, 'App\\User', 33),
(16, 'App\\User', 33),
(17, 'App\\User', 33),
(18, 'App\\User', 33),
(19, 'App\\User', 33),
(20, 'App\\User', 33),
(21, 'App\\User', 33),
(22, 'App\\User', 33),
(23, 'App\\User', 33),
(24, 'App\\User', 33),
(25, 'App\\User', 33),
(26, 'App\\User', 33),
(27, 'App\\User', 33),
(28, 'App\\User', 33),
(29, 'App\\User', 33),
(30, 'App\\User', 33),
(31, 'App\\User', 33),
(32, 'App\\User', 33),
(33, 'App\\User', 33),
(34, 'App\\User', 33),
(35, 'App\\User', 33),
(36, 'App\\User', 33),
(37, 'App\\User', 33),
(1, 'App\\User', 34),
(2, 'App\\User', 34),
(3, 'App\\User', 34),
(4, 'App\\User', 34),
(5, 'App\\User', 34),
(6, 'App\\User', 34),
(7, 'App\\User', 34),
(8, 'App\\User', 34),
(9, 'App\\User', 34),
(10, 'App\\User', 34),
(11, 'App\\User', 34),
(12, 'App\\User', 34),
(13, 'App\\User', 34),
(14, 'App\\User', 34),
(15, 'App\\User', 34),
(16, 'App\\User', 34),
(17, 'App\\User', 34),
(18, 'App\\User', 34),
(19, 'App\\User', 34),
(20, 'App\\User', 34),
(21, 'App\\User', 34),
(22, 'App\\User', 34),
(23, 'App\\User', 34),
(24, 'App\\User', 34),
(25, 'App\\User', 34),
(26, 'App\\User', 34),
(27, 'App\\User', 34),
(28, 'App\\User', 34),
(29, 'App\\User', 34),
(30, 'App\\User', 34),
(31, 'App\\User', 34),
(32, 'App\\User', 34),
(33, 'App\\User', 34),
(34, 'App\\User', 34),
(35, 'App\\User', 34),
(36, 'App\\User', 34),
(37, 'App\\User', 34),
(1, 'App\\User', 35),
(2, 'App\\User', 35),
(3, 'App\\User', 35),
(4, 'App\\User', 35),
(5, 'App\\User', 35),
(6, 'App\\User', 35),
(7, 'App\\User', 35),
(8, 'App\\User', 35),
(9, 'App\\User', 35),
(10, 'App\\User', 35),
(11, 'App\\User', 35),
(12, 'App\\User', 35),
(13, 'App\\User', 35),
(14, 'App\\User', 35),
(15, 'App\\User', 35),
(16, 'App\\User', 35),
(17, 'App\\User', 35),
(18, 'App\\User', 35),
(19, 'App\\User', 35),
(20, 'App\\User', 35),
(21, 'App\\User', 35),
(22, 'App\\User', 35),
(23, 'App\\User', 35),
(24, 'App\\User', 35),
(25, 'App\\User', 35),
(26, 'App\\User', 35),
(27, 'App\\User', 35),
(28, 'App\\User', 35),
(29, 'App\\User', 35),
(30, 'App\\User', 35),
(31, 'App\\User', 35),
(32, 'App\\User', 35),
(33, 'App\\User', 35),
(34, 'App\\User', 35),
(35, 'App\\User', 35),
(36, 'App\\User', 35),
(37, 'App\\User', 35),
(1, 'App\\User', 36),
(2, 'App\\User', 36),
(3, 'App\\User', 36),
(4, 'App\\User', 36),
(5, 'App\\User', 36),
(6, 'App\\User', 36),
(7, 'App\\User', 36),
(8, 'App\\User', 36),
(9, 'App\\User', 36),
(10, 'App\\User', 36),
(11, 'App\\User', 36),
(12, 'App\\User', 36),
(13, 'App\\User', 36),
(14, 'App\\User', 36),
(15, 'App\\User', 36),
(16, 'App\\User', 36),
(17, 'App\\User', 36),
(18, 'App\\User', 36),
(19, 'App\\User', 36),
(20, 'App\\User', 36),
(21, 'App\\User', 36),
(22, 'App\\User', 36),
(23, 'App\\User', 36),
(24, 'App\\User', 36),
(25, 'App\\User', 36),
(26, 'App\\User', 36),
(27, 'App\\User', 36),
(28, 'App\\User', 36),
(29, 'App\\User', 36),
(30, 'App\\User', 36),
(31, 'App\\User', 36),
(32, 'App\\User', 36),
(33, 'App\\User', 36),
(34, 'App\\User', 36),
(35, 'App\\User', 36),
(36, 'App\\User', 36),
(37, 'App\\User', 36),
(1, 'App\\User', 37),
(2, 'App\\User', 37),
(3, 'App\\User', 37),
(5, 'App\\User', 37),
(6, 'App\\User', 37),
(7, 'App\\User', 37),
(8, 'App\\User', 37),
(10, 'App\\User', 37),
(11, 'App\\User', 37),
(12, 'App\\User', 37),
(13, 'App\\User', 37),
(15, 'App\\User', 37),
(16, 'App\\User', 37),
(17, 'App\\User', 37),
(18, 'App\\User', 37),
(20, 'App\\User', 37),
(21, 'App\\User', 37),
(22, 'App\\User', 37),
(23, 'App\\User', 37),
(25, 'App\\User', 37),
(26, 'App\\User', 37),
(27, 'App\\User', 37),
(28, 'App\\User', 37),
(30, 'App\\User', 37),
(31, 'App\\User', 37),
(32, 'App\\User', 37),
(33, 'App\\User', 37),
(35, 'App\\User', 37),
(36, 'App\\User', 37),
(37, 'App\\User', 37),
(1, 'App\\User', 38),
(2, 'App\\User', 38),
(3, 'App\\User', 38),
(5, 'App\\User', 38),
(6, 'App\\User', 38),
(7, 'App\\User', 38),
(8, 'App\\User', 38),
(10, 'App\\User', 38),
(11, 'App\\User', 38),
(12, 'App\\User', 38),
(13, 'App\\User', 38),
(15, 'App\\User', 38),
(16, 'App\\User', 38),
(17, 'App\\User', 38),
(18, 'App\\User', 38),
(20, 'App\\User', 38),
(21, 'App\\User', 38),
(22, 'App\\User', 38),
(23, 'App\\User', 38),
(25, 'App\\User', 38),
(26, 'App\\User', 38),
(27, 'App\\User', 38),
(28, 'App\\User', 38),
(30, 'App\\User', 38),
(31, 'App\\User', 38),
(32, 'App\\User', 38),
(33, 'App\\User', 38),
(35, 'App\\User', 38),
(36, 'App\\User', 38),
(37, 'App\\User', 38),
(1, 'App\\User', 39),
(2, 'App\\User', 39),
(3, 'App\\User', 39),
(5, 'App\\User', 39),
(6, 'App\\User', 39),
(7, 'App\\User', 39),
(8, 'App\\User', 39),
(10, 'App\\User', 39),
(11, 'App\\User', 39),
(12, 'App\\User', 39),
(13, 'App\\User', 39),
(15, 'App\\User', 39),
(16, 'App\\User', 39),
(17, 'App\\User', 39),
(18, 'App\\User', 39),
(20, 'App\\User', 39),
(21, 'App\\User', 39),
(22, 'App\\User', 39),
(23, 'App\\User', 39),
(25, 'App\\User', 39),
(26, 'App\\User', 39),
(27, 'App\\User', 39),
(28, 'App\\User', 39),
(30, 'App\\User', 39),
(31, 'App\\User', 39),
(32, 'App\\User', 39),
(33, 'App\\User', 39),
(35, 'App\\User', 39),
(36, 'App\\User', 39),
(37, 'App\\User', 39);

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
  `radius` int(11) NOT NULL,
  `location` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` double NOT NULL,
  `latitude` double NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` int(11) NOT NULL DEFAULT '0',
  `store_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`id`, `title`, `description`, `start_time`, `end_time`, `radius`, `location`, `longitude`, `latitude`, `image`, `payment_status`, `store_id`, `tag_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Clearance Sale (10% Off)', 'Unstitched Lawn Suits Collection 2019 Online in Pakistan', '2019-07-05 19:00:00', '2019-07-12 18:00:00', 0, 'FB Indus-Area Block 21 Block 21 Gulberg Town, Karachi, Karachi City, Sindh, Pakistan', 67.08807753029146, 24.9338977802915, '2953.jpg', 0, 2, 1, '2019-07-06 03:42:58', '2019-07-06 03:42:58', NULL),
(2, 'Electronics & Appliances 10% Off on selected items', 'From your living room, your kitchen to your office/business, METRO provides you best-value solutions tailored according to your personal and professional needs.', '2019-06-28 19:30:00', '2019-06-29 21:00:00', 0, 'NA-Class 190-219, OKEWARI near، Safari Park، University Rd, Gulshan-e-Iqbal, Karachi, Karachi City, Sindh 73500, Pakistan', 67.10634183029151, 24.9229225802915, '27126.jpg', 0, 1, 1, '2019-07-06 11:31:31', '2019-07-06 11:31:31', NULL),
(3, 'Mid Season Sale Up to 30% Off', 'On entire bill', '2019-06-22 19:00:00', '2019-07-05 19:00:00', 0, 'Zamzama Blvd, Phase V Zamzama Commercial Area Phase 5 Karachi, Karachi City, Sindh 75500, Pakistan', 67.04230543029144, 24.8183283302915, '43284.jpg', 0, 2, 1, '2019-07-06 11:37:01', '2019-07-06 11:37:01', NULL);

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
(1, 1, '1', '2019-07-06 03:42:59', '2019-07-06 03:42:59', NULL),
(2, 1, '2', '2019-07-06 03:42:59', '2019-07-06 03:42:59', NULL),
(3, 1, '3', '2019-07-06 03:42:59', '2019-07-06 03:42:59', NULL),
(4, 1, '4', '2019-07-06 03:42:59', '2019-07-06 03:42:59', NULL),
(5, 1, '5', '2019-07-06 03:42:59', '2019-07-06 03:42:59', NULL),
(6, 1, '6', '2019-07-06 03:42:59', '2019-07-06 03:42:59', NULL),
(7, 1, '7', '2019-07-06 03:42:59', '2019-07-06 03:42:59', NULL),
(8, 1, '8', '2019-07-06 03:42:59', '2019-07-06 03:42:59', NULL),
(9, 1, '9', '2019-07-06 03:42:59', '2019-07-06 03:42:59', NULL),
(10, 1, '10', '2019-07-06 03:42:59', '2019-07-06 03:42:59', NULL),
(11, 2, '11', '2019-07-06 11:31:31', '2019-07-06 11:31:31', NULL),
(12, 2, '12', '2019-07-06 11:31:32', '2019-07-06 11:31:32', NULL),
(13, 2, '13', '2019-07-06 11:31:32', '2019-07-06 11:31:32', NULL),
(14, 2, '14', '2019-07-06 11:31:32', '2019-07-06 11:31:32', NULL),
(15, 2, '15', '2019-07-06 11:31:32', '2019-07-06 11:31:32', NULL),
(16, 2, '16', '2019-07-06 11:31:32', '2019-07-06 11:31:32', NULL),
(17, 2, '17', '2019-07-06 11:31:32', '2019-07-06 11:31:32', NULL),
(18, 2, '18', '2019-07-06 11:31:32', '2019-07-06 11:31:32', NULL),
(19, 2, '19', '2019-07-06 11:31:32', '2019-07-06 11:31:32', NULL),
(20, 2, '20', '2019-07-06 11:31:32', '2019-07-06 11:31:32', NULL),
(21, 3, '21', '2019-07-06 11:37:01', '2019-07-06 11:37:01', NULL),
(22, 3, '22', '2019-07-06 11:37:01', '2019-07-06 11:37:01', NULL),
(23, 3, '23', '2019-07-06 11:37:01', '2019-07-06 11:37:01', NULL),
(24, 3, '24', '2019-07-06 11:37:01', '2019-07-06 11:37:01', NULL),
(25, 3, '25', '2019-07-06 11:37:01', '2019-07-06 11:37:01', NULL),
(26, 3, '26', '2019-07-06 11:37:01', '2019-07-06 11:37:01', NULL),
(27, 3, '27', '2019-07-06 11:37:02', '2019-07-06 11:37:02', NULL),
(28, 3, '28', '2019-07-06 11:37:02', '2019-07-06 11:37:02', NULL),
(29, 3, '29', '2019-07-06 11:37:02', '2019-07-06 11:37:02', NULL),
(30, 3, '30', '2019-07-06 11:37:02', '2019-07-06 11:37:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `promotion_rating`
--

CREATE TABLE `promotion_rating` (
  `id` int(10) UNSIGNED NOT NULL,
  `rating` float NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `promotion_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promotion_rating`
--

INSERT INTO `promotion_rating` (`id`, `rating`, `user_id`, `promotion_id`, `created_at`, `updated_at`) VALUES
(1, 5, 5, 1, '2019-07-07 03:03:09', '2019-07-07 03:03:09'),
(2, 5, 4, 1, '2019-07-07 03:03:42', '2019-07-07 03:03:42'),
(3, 4.5, 1, 1, '2019-07-07 03:04:24', '2019-07-07 03:04:24');

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
(2, 'Store Admin', 'web', '2019-06-25 23:11:28', '2019-06-25 23:11:28'),
(4, 'Application User', '', NULL, NULL);

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
(2, 2, 'https://www.facebook.com/limelight.pret/', NULL, 'https://www.instagram.com/limelight.pret/', '2019-07-06 00:27:52', '2019-07-06 00:27:52', NULL),
(3, 3, NULL, NULL, NULL, '2019-07-07 14:01:11', '2019-07-07 14:01:11', NULL);

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
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `stores` (`id`, `name`, `cover`, `image`, `address`, `telephone`, `website`, `emailaddress`, `tagline`, `description`, `latitude`, `longitude`, `user_id`, `category_id`, `views`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Hardees', '11469.jpg', '61988.png', 'hardees near Karachi City, Pakistan', 'GUEST RESPONSE LINE \r\n(877) 799-STAR (7827) \r\nMon. - Fri. \r\n5:00 a.m. - 11:00 p.m. Central \r\n\r\nCORPORATE OFFICE \r\nCKE RESTAURANTS HOLDINGS, INC. \r\n6700 Tower Circle, Suite 1000 \r\nFranklin, TN 37067', 'https://www.hardees.com/', 'FOR MEDIA INQUIRIES \r\nmediarelations@ckr.com', 'Tastes like America', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 24.79581513, 67.04972838, 4, 2, 1, 1, '2019-07-05 22:39:25', '2019-07-07 08:19:29', NULL),
(2, 'Limelight', '49340.jpg', '26012.png', 'LIMELIGHT، Karachi, Pakistan', 'Telephone:\r\n+92311-1222681\r\nMonday to Saturday from 09:30 am to 11:00 pm PKT', 'https://www.limelight.pk/', 'Email\r\nOnline@limelight.pk\r\nEmail us for enquiries about online purchase & stores', 'Shop from exclusive range of new arrivals & latest trends clothing for women in Pakistan', 'It all started in 2010 with debonair textures, flairy cutlines and swanky fabrics. With more than 55 stores nationwide Limelight offers various product lines that can click anyone’s heart. Our product range started from women’s formal & casual wear, moving to kids and men’s wear. Limelight’s clothing line includes both stitched and unstitched fabrics so that our customers can choose and adopt the styles of their own. The product portfolio further extends to bottoms, bags, clutches, wallets, wraps, sleepwear, jewellery and accessories. We specialize in embellishments that are incorporated in multiple product lines like shirts & bags.  We strategize to bring colours of east and west; showcasing traditional clothing and western wear side by side for multiple tastes out there. Our goal is to cater fashionistas of all ages. Fresh stock is sent to stores multiples times each week.  We plan to grow both with new stores and online, in existing as well as new markets to make good quality fashion accessible for local and international customers. Limelight’s philosophy is to transform wardrobes by providing high quality products in affordable prices that are exquisite one of a kind pieces!', 24.93389778, 67.08807753, 4, 3, 1, 1, '2019-07-06 00:27:52', '2019-07-06 00:27:52', NULL),
(3, 'Rochester Cafe & Grill', '83522.jpg', '59194.png', 'Rochester Cafe & Grill, Karachi, Pakistan', '(021) 34302133', 'https://www.facebook.com/rochestercafeandgrill/?rf=1060572597313077', '4D، Sindhi Muslim Cooperative Housing Society Block A Sindhi Muslim CHS (SMCHS), Karachi, Karachi City, Sindh 75100', 'Tastes like America', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make', 24.86423013, 67.05640418, 39, 2, 1, 1, '2019-07-07 14:01:11', '2019-07-07 14:01:11', NULL),
(4, 'Fettuccine', '11469.jpg', '61988.png', 'hardees near Karachi City, Pakistan', 'GUEST RESPONSE LINE \r\n(877) 799-STAR (7827) \r\nMon. - Fri. \r\n5:00 a.m. - 11:00 p.m. Central \r\n\r\nCORPORATE OFFICE \r\nCKE RESTAURANTS HOLDINGS, INC. \r\n6700 Tower Circle, Suite 1000 \r\nFranklin, TN 37067', 'https://www.hardees.com/', 'FOR MEDIA INQUIRIES \r\nmediarelations@ckr.com', 'Tastes like America', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 24.79581513, 67.04972838, 4, 2, 1, 1, '2019-07-05 22:39:25', '2019-07-07 08:19:29', NULL),
(5, 'Gul Ahmed', '49340.jpg', '26012.png', 'LIMELIGHT، Karachi, Pakistan', 'Telephone:\r\n+92311-1222681\r\nMonday to Saturday from 09:30 am to 11:00 pm PKT', 'https://www.limelight.pk/', 'Email\r\nOnline@limelight.pk\r\nEmail us for enquiries about online purchase & stores', 'Shop from exclusive range of new arrivals & latest trends clothing for women in Pakistan', 'It all started in 2010 with debonair textures, flairy cutlines and swanky fabrics. With more than 55 stores nationwide Limelight offers various product lines that can click anyone’s heart. Our product range started from women’s formal & casual wear, moving to kids and men’s wear. Limelight’s clothing line includes both stitched and unstitched fabrics so that our customers can choose and adopt the styles of their own. The product portfolio further extends to bottoms, bags, clutches, wallets, wraps, sleepwear, jewellery and accessories. We specialize in embellishments that are incorporated in multiple product lines like shirts & bags.  We strategize to bring colours of east and west; showcasing traditional clothing and western wear side by side for multiple tastes out there. Our goal is to cater fashionistas of all ages. Fresh stock is sent to stores multiples times each week.  We plan to grow both with new stores and online, in existing as well as new markets to make good quality fashion accessible for local and international customers. Limelight’s philosophy is to transform wardrobes by providing high quality products in affordable prices that are exquisite one of a kind pieces!', 24.93389778, 67.08807753, 4, 3, 1, 1, '2019-07-06 00:27:52', '2019-07-06 00:27:52', NULL),
(6, 'Sobremessa', '83522.jpg', '59194.png', 'Rochester Cafe & Grill, Karachi, Pakistan', '(021) 34302133', 'https://www.facebook.com/rochestercafeandgrill/?rf=1060572597313077', '4D، Sindhi Muslim Cooperative Housing Society Block A Sindhi Muslim CHS (SMCHS), Karachi, Karachi City, Sindh 75100', 'Tastes like America', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make', 24.86423013, 67.05640418, 39, 2, 1, 1, '2019-07-07 14:01:11', '2019-07-07 14:01:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `store_rating`
--

CREATE TABLE `store_rating` (
  `id` int(10) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `store_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `support`
--

INSERT INTO `support` (`id`, `first_name`, `last_name`, `store_id`, `subject`, `email`, `description`, `response`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Sara', 'Hasan', 1, 'Problem', 'sara122@gmail.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 1, '2019-07-02 19:00:00', NULL, NULL),
(2, 'Sara', 'Hasan', 2, 'Problem', 'sara122@gmail.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 1, '2019-07-02 06:00:00', NULL, NULL);

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
(1, 'Pret', NULL, '2019-07-06 00:00:31', '2019-07-06 00:00:31', NULL),
(2, 'Unstitched Collection', NULL, '2019-07-06 11:20:40', '2019-07-06 11:20:40', NULL),
(3, 'Eid Collection', NULL, '2019-07-06 11:21:27', '2019-07-06 11:21:27', NULL),
(4, 'Samsung', NULL, '2019-07-06 11:21:33', '2019-07-06 11:21:33', NULL),
(5, 'Apple', NULL, '2019-07-06 11:21:40', '2019-07-06 11:21:40', NULL),
(6, 'Fast Food', NULL, '2019-07-06 11:21:48', '2019-07-06 11:21:48', NULL);

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
(1, 'sarahasan224@gmail.com', '$2y$10$AGlcLD1fNxbYFups1EL9..JsJHm7IRfVytCfmzbmab5v.PdmqKUj2', 'Sara Hasan', 1, '03452099689', '68281.jpg', NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6Ly9tYXJrYXoudGVzdC91c2VyL3NpZ25pbndlYiIsImlhdCI6MTU2NDgxNTQ2MiwiZXhwIjoxNTY0ODE5MDYyLCJuYmYiOjE1NjQ4MTU0NjIsImp0aSI6IkZTeGE5R3ZxbXRtZXVxSGMifQ.JdPYwe_RHQYZzChfj3GECqe5Xt60mLDPTg3DmH33tq4', '2019-06-29 12:20:48', '2019-08-03 01:57:42', NULL),
(4, 'usmaan.siddiqui@gmail.com', '$2y$10$zDcSnc8frOHhc8pEoRwLxOQodz1kDW1NNsc7yu7jKYeXv4c6d3v22', 'Usman Siddiqui', 2, '900770', '21385.jpg', NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjQsImlzcyI6Imh0dHA6Ly9tYXJrYXoudGVzdC91c2VyL3NpZ25pbndlYiIsImlhdCI6MTU2NDgxNzI4NSwiZXhwIjoxNTY0ODIwODg1LCJuYmYiOjE1NjQ4MTcyODUsImp0aSI6Im42MXNhaEFtdjNVNU03YTcifQ.6VM2YSkayGT6QRLCaVAUmJiMPIot3DJcOn-_Z-VKIuk', '2019-06-29 12:34:06', '2019-08-03 02:28:05', NULL),
(5, 'sara@clickysoft.com', '$2y$10$Z74xXYL.IN3eRNW9DrPxV.YxEjCSv01A1pwuHWQx6CWHwb2Xs2.z.', 'Sara Lawrence', 4, '090078601', 'user_default.png', NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjUsImlzcyI6Imh0dHA6Ly9tYXJrYXoudGVzdC9hcGkvdXNlci9zaWduaW4iLCJpYXQiOjE1NjI0OTEzMTEsImV4cCI6MTU2MjQ5NDkxMSwibmJmIjoxNTYyNDkxMzExLCJqdGkiOiJCeWlvSFhKUWFxTmw5aUZrIn0.Wlw5Q9NB3XvUsOkQtpriwyxp01QMFp1cQMFk1701-vM', '2019-07-07 02:50:06', '2019-07-07 04:21:51', NULL),
(6, 'hamza@gmail.com', '$2y$10$xbx.zq1LQKWc7nHH7DYSyuxtmXMNypsXH5EwUWFGxMeYvqnmcJ/iC', 'Hamza Khan', 4, '03009263363', '20243.jpg', NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjYsImlzcyI6Imh0dHA6Ly9tYXJrYXoudGVzdC9hZGQtdXNlciIsImlhdCI6MTU2MjUyMjU0MSwiZXhwIjoxNTYyNTI2MTQxLCJuYmYiOjE1NjI1MjI1NDEsImp0aSI6InBJV25WQ2ppVUlJV0Vwa3gifQ.F7-RWmjWOuqX6hJ_5Xa-akQCZ8Ys9qip59a2Y94U8Qg', '2019-07-07 13:02:21', '2019-07-07 13:02:21', NULL),
(7, 'seerat@gmail.com', '$2y$10$oY2n3HSIjY8GbzwefuQqyusXy.duB91Qp.bKVCc92OOYM17OIvyKm', 'Seerat Khan', 4, '0330017726', '93100.jpg', NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjcsImlzcyI6Imh0dHA6Ly9tYXJrYXoudGVzdC9hZGQtdXNlciIsImlhdCI6MTU2MjUyMjYxMywiZXhwIjoxNTYyNTI2MjEzLCJuYmYiOjE1NjI1MjI2MTMsImp0aSI6IkZpeXkyZVcxaUoxOXdqejEifQ.BfpEU1kZA6i1GOlQPoWARvTTknUuRxpHXizKsHP9gzU', '2019-07-07 13:03:33', '2019-07-07 13:03:33', NULL),
(8, 'shajia@gmail.com', '$2y$10$efsyIuTtuREm.4nm0VGIPOwdR8l0YSDxeYLkI5WBsaXjsqYNU2ZQ2', 'Shajia Khan', 4, '03353773882', '48622.jpg', NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjgsImlzcyI6Imh0dHA6Ly9tYXJrYXoudGVzdC9hZGQtdXNlciIsImlhdCI6MTU2MjUyMjcxNywiZXhwIjoxNTYyNTI2MzE3LCJuYmYiOjE1NjI1MjI3MTcsImp0aSI6Im0yUHF6Mm9CbDdXSzc5TjEifQ.7afxPYvhS3cD4jJ37C6XmYYSV_D1m_UaK7BLgKILPNU', '2019-07-07 13:05:17', '2019-07-07 13:05:17', NULL),
(9, 'Rammsha@gmail.com', '$2y$10$XclATWglWov12MzmOhNh1OXpelZUrUn7HanSld7F2QebzFbQ9zUWW', 'Ramsha Khan', 4, '73647647747', '81689.jpg', NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjksImlzcyI6Imh0dHA6Ly9tYXJrYXoudGVzdC9hZGQtdXNlciIsImlhdCI6MTU2MjUyMjc2MywiZXhwIjoxNTYyNTI2MzYzLCJuYmYiOjE1NjI1MjI3NjMsImp0aSI6ImRLa1psWmEwMXhrejdhd2cifQ.O5QlvESQfss1ycTG-XOSv7fHbcl2Ty98Q6CYG8OMzPo', '2019-07-07 13:06:03', '2019-07-07 13:06:03', NULL),
(10, 'Amad@gmail.com', '$2y$10$fe6bXjPOsESGah9.LQH7i.ATr1x1aE3pRDZscQT/8ob3DvnAncsIK', 'Amad Khan', 4, '897091425.00', '59452.jpg', NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEwLCJpc3MiOiJodHRwOi8vbWFya2F6LnRlc3QvYWRkLXVzZXIiLCJpYXQiOjE1NjI1MjI3OTMsImV4cCI6MTU2MjUyNjM5MywibmJmIjoxNTYyNTIyNzkzLCJqdGkiOiJHUlVhNFhMbDluaU8xYXpVIn0.4AD_kRe9VDg49fj4aLK9rwv0xCXCMSORIxWs0PkN_eo', '2019-07-07 13:06:33', '2019-07-07 13:06:33', NULL),
(11, 'Sadiq@gmail.com', '$2y$10$OHx/YDbP3P5n3JALT7.k/.9.g0kAN1kTx.QPX80yhp.VJi8twYKFG', 'Sadiq Khan', 4, '56066438091.00', '24092.jpg', NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjExLCJpc3MiOiJodHRwOi8vbWFya2F6LnRlc3QvYWRkLXVzZXIiLCJpYXQiOjE1NjI1MjI4MjIsImV4cCI6MTU2MjUyNjQyMiwibmJmIjoxNTYyNTIyODIyLCJqdGkiOiJQcVRFRlFpRVFnd3FlcjJiIn0.fTU-_zc5mmyojYgtzuae2MhTlMY9m1Z2zX-3-sq6u0I', '2019-07-07 13:07:02', '2019-07-07 13:07:02', NULL),
(12, 'Kiran@gmail.com', '$2y$10$LOvV5XcgHKplRosWHuGVVuwZVocHA0WyRQ3pZ//H5Da/baU9jS6K6', 'Kiran Khan', 4, '245678109911.00', '81581.jpg', NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEyLCJpc3MiOiJodHRwOi8vbWFya2F6LnRlc3QvYWRkLXVzZXIiLCJpYXQiOjE1NjI1MjI4NTMsImV4cCI6MTU2MjUyNjQ1MywibmJmIjoxNTYyNTIyODUzLCJqdGkiOiJPT1VnMjNYbDhIWTlxN0dNIn0.J0q7ysPwRVpf13jeqGb2sLqX5lRTBueYp-TPGwty6FQ', '2019-07-07 13:07:33', '2019-07-07 13:07:33', NULL),
(13, 'ss@hotmail.com', '$2y$10$FxtGgxeGrfA3xXOTQYR6ReqTdAJYwLU2CgcHW5CntX.cA/GvCYvdW', 'Shah Jahan Khan', 4, '03452079226', '98561.jpg', NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEzLCJpc3MiOiJodHRwOi8vbWFya2F6LnRlc3QvYWRkLXVzZXIiLCJpYXQiOjE1NjI1MjI4ODksImV4cCI6MTU2MjUyNjQ4OSwibmJmIjoxNTYyNTIyODg5LCJqdGkiOiJZRENOcG1KS3dyVlVBc0ZCIn0.6XJm3MQIGdQqjY7U_zEJFE7dE4H4PyfXzOgb0EMZDp4', '2019-07-07 13:08:09', '2019-07-07 13:08:09', NULL),
(14, 'sk@gmail.com', '$2y$10$EpmOw.5MiDGT.nQs9JxdduJDPh/4rDJrMBJ4kOHUwKJHphBkCoyvm', 'Shahrukh Khan', 4, '03422776825', '49682.jpg', NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjE0LCJpc3MiOiJodHRwOi8vbWFya2F6LnRlc3QvYWRkLXVzZXIiLCJpYXQiOjE1NjI1MjI5MjUsImV4cCI6MTU2MjUyNjUyNSwibmJmIjoxNTYyNTIyOTI1LCJqdGkiOiJ2REF5cjBLTzFpYzdwbGpOIn0.ycTCq5lJMoehYmDiB9mUNXbf8uy4GVe1nW_PNi2YGmQ', '2019-07-07 13:08:45', '2019-07-07 13:08:45', NULL),
(15, 'farukhkhan@hotmail.com', '$2y$10$3DJm54f2RIPafkFBr4xkge6xOUnyGLqf9Hu/66/WkYMRFovUaKupC', 'Farrukh Khan', 4, '03432316651', '11096.jpg', NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjE1LCJpc3MiOiJodHRwOi8vbWFya2F6LnRlc3QvYWRkLXVzZXIiLCJpYXQiOjE1NjI1MjI5NTcsImV4cCI6MTU2MjUyNjU1NywibmJmIjoxNTYyNTIyOTU3LCJqdGkiOiJCYzlrNGJCQWFDajFjWUNxIn0.ZQus542Q5dlTK_TtGHvtNRY0TIuuqIEgRxenJHdpujE', '2019-07-07 13:09:17', '2019-07-07 13:09:17', NULL),
(16, 'farhannaeem@gmail.com', '$2y$10$A5b1e9286uIh6izprti/WukOuOrIhe6F8dXGd9/p38w26icHaASIu', 'Farah Naeem', 4, '263565454654', '67874.jpg', NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjE2LCJpc3MiOiJodHRwOi8vbWFya2F6LnRlc3QvYWRkLXVzZXIiLCJpYXQiOjE1NjI1MjI5OTQsImV4cCI6MTU2MjUyNjU5NCwibmJmIjoxNTYyNTIyOTk0LCJqdGkiOiIxV3JvYW9CQ05PU0VYR3M1In0.fjGoljx_EA7ok58AqMFgII1vSqHH_uWGrkrpcvf167A', '2019-07-07 13:09:53', '2019-07-07 13:09:54', NULL),
(17, 'hinamahmood@gmail.com', '$2y$10$eR/VydC7y4sgR6eKtpGtLOdtnPyldM.x8pW7aup3QC68rto0JzHT6', 'Hina Mahmood', 4, '0378734746564', '73969.jpg', NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjE3LCJpc3MiOiJodHRwOi8vbWFya2F6LnRlc3QvYWRkLXVzZXIiLCJpYXQiOjE1NjI1MjMwMjYsImV4cCI6MTU2MjUyNjYyNiwibmJmIjoxNTYyNTIzMDI2LCJqdGkiOiJNMGx3dWFEV2I1bXlLaGJaIn0.cAxz2MbBzEqV25BKn-IdrcO2qZkjvZC6EmUMRLZMA2M', '2019-07-07 13:10:26', '2019-07-07 13:10:26', NULL),
(18, 'saadnaeem@gmail.com', '$2y$10$tU3ykEMtd1WmAx/f1HbJXezgiWgmAhR98vSv/gPWBojsA5CsVJADG', 'Saad Naeem', 4, '03774767565', '69918.jpg', NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjE4LCJpc3MiOiJodHRwOi8vbWFya2F6LnRlc3QvYWRkLXVzZXIiLCJpYXQiOjE1NjI1MjMwNjIsImV4cCI6MTU2MjUyNjY2MiwibmJmIjoxNTYyNTIzMDYyLCJqdGkiOiJmU1FaTnRYTFJpREVsaDhOIn0.tBq_QCQcyr9JxaN_elY77YhZRoIiyl0ONob4tR-KFNo', '2019-07-07 13:11:02', '2019-07-07 13:11:02', NULL),
(19, 'hamid@gmail.com', '$2y$10$NXb29rr7XjZ/c9r4IDpoq.jduLHmBww.hZpfxbQ2p8EnFpku3HLKi', 'Hamid Mir', 4, '0923356644774', '60813.jpg', NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjE5LCJpc3MiOiJodHRwOi8vbWFya2F6LnRlc3QvYWRkLXVzZXIiLCJpYXQiOjE1NjI1MjMxMDIsImV4cCI6MTU2MjUyNjcwMiwibmJmIjoxNTYyNTIzMTAyLCJqdGkiOiJFS0FSWXhIM1BpS01VR1o5In0.9DxmwRONUeXB7QcgEhKA8cU4zUaQxe67FGxam4HY2oI', '2019-07-07 13:11:42', '2019-07-07 13:11:42', NULL),
(20, 'khuala@gmail.com', '$2y$10$yr1ALSHRQVypKtEv1DCPouO1SnnSHkz4tphDqGX/REnRfVMSfDGSG', 'Khuwala Javed', 4, '090078601', '86019.jpg', NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjIwLCJpc3MiOiJodHRwOi8vbWFya2F6LnRlc3QvYWRkLXVzZXIiLCJpYXQiOjE1NjI1MjMxNTAsImV4cCI6MTU2MjUyNjc1MCwibmJmIjoxNTYyNTIzMTUwLCJqdGkiOiI4ZWg5UGJOZmdSa0w5VUV4In0.-WhfsbEppvOx5BwWit1-M7Rk3TW1V9g9Mig6jae5zzE', '2019-07-07 13:12:30', '2019-07-07 13:12:30', NULL),
(21, 'jawad@gmail.com', '$2y$10$.rQEV8ksG.PiN02p50EcFurU3LJ0kfaU/EwAeWmY.82XHO60p7Jva', 'Jawad Ahmed', 4, '03356644774', '58802.jpg', NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjIxLCJpc3MiOiJodHRwOi8vbWFya2F6LnRlc3QvYWRkLXVzZXIiLCJpYXQiOjE1NjI1MjMxODUsImV4cCI6MTU2MjUyNjc4NSwibmJmIjoxNTYyNTIzMTg1LCJqdGkiOiJQUzNrQWlUVDdwR3VzVnpxIn0.9NSbOspey0yijT6fPATNfalwThuWqvUlNWOm3s7UJyk', '2019-07-07 13:13:05', '2019-07-07 13:13:05', NULL),
(22, 'maham@gmail.com', '$2y$10$5e/5GeeN1VBaK.P/es1I3O/DmoC3nXaK2xbs69VxEVakYt3AOF8C6', 'Maham Arif', 4, '03356644774', '9127.jpg', NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjIyLCJpc3MiOiJodHRwOi8vbWFya2F6LnRlc3QvYWRkLXVzZXIiLCJpYXQiOjE1NjI1MjMyMzMsImV4cCI6MTU2MjUyNjgzMywibmJmIjoxNTYyNTIzMjMzLCJqdGkiOiJncGtuc2VsSzF1RWcxcnBFIn0.vRXuRblgP5Fz6P0Vdoz2G9rNLpJCtoT_LRwgIYagT78', '2019-07-07 13:13:53', '2019-07-07 13:13:53', NULL),
(23, 'kashan@gmail.com', '$2y$10$Hlea617oYKyTYGCJkHfXo.7gZUgr7KAqhZeycUf5e0TN7hInWIx4e', 'Kashaf Yousuf', 4, '090078601', '79107.jpg', NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjIzLCJpc3MiOiJodHRwOi8vbWFya2F6LnRlc3QvYWRkLXVzZXIiLCJpYXQiOjE1NjI1MjMyNjQsImV4cCI6MTU2MjUyNjg2NCwibmJmIjoxNTYyNTIzMjY0LCJqdGkiOiJYN0FUd1BwbkZiSTlmb0ZsIn0.hh9bi46rI0necfMpteGE51_MlU-RT1vM-58VmPI01ZY', '2019-07-07 13:14:24', '2019-07-07 13:14:24', NULL),
(24, 'tariq@gmail.com', '$2y$10$pOzqAqNwbhZroWrFO9bJVez3gR42GVi1uYkGdJJ/goy9zbX00i2JK', 'Tariq Khan', 4, '03356644774', '87644.jpg', NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjI0LCJpc3MiOiJodHRwOi8vbWFya2F6LnRlc3QvYWRkLXVzZXIiLCJpYXQiOjE1NjI1MjMzMDAsImV4cCI6MTU2MjUyNjkwMCwibmJmIjoxNTYyNTIzMzAwLCJqdGkiOiJkRmpKN05Tb2kzUnV5ZEJTIn0.24O8Bdpu7oj06iVQXy9ODYGmEOqhJFVX9IMLivbokkk', '2019-07-07 13:15:00', '2019-07-07 13:15:00', NULL),
(25, 'komal@gmail.com', '$2y$10$tmqqgksvPgbFxfa6jud.SuHr9wJNPDNXS.J41RkCoaEaZmlrq8v1y', 'Komal Fatima', 4, '03356644774', '38172.jpg', NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjI1LCJpc3MiOiJodHRwOi8vbWFya2F6LnRlc3QvYWRkLXVzZXIiLCJpYXQiOjE1NjI1MjMzMzQsImV4cCI6MTU2MjUyNjkzNCwibmJmIjoxNTYyNTIzMzM0LCJqdGkiOiI0RTExU3FzRWpUaGNUVFpzIn0.VZyB8Otzy7mbMezSa59DINM9XcBlJ-K1JUHC5_p0lr4', '2019-07-07 13:15:34', '2019-07-07 13:15:34', NULL),
(26, 'yumna@gmail.com', '$2y$10$I5LcbnJDPvuvzICE75X6ZOklYJtRMRLqL.T1HNE6s3i/ImnaEhXEK', 'Yumna Zaidi', 4, '03356644774', '29888.jpg', NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjI2LCJpc3MiOiJodHRwOi8vbWFya2F6LnRlc3QvYWRkLXVzZXIiLCJpYXQiOjE1NjI1MjMzNzMsImV4cCI6MTU2MjUyNjk3MywibmJmIjoxNTYyNTIzMzczLCJqdGkiOiJRRjV6a3ZTU1RxT1dSbVo0In0.Bfg6KM8axyOBfYZ4PKDGSTEJbYsR2m8T5taKd1bJUhQ', '2019-07-07 13:16:12', '2019-07-07 13:16:13', NULL),
(27, 'kulsoom@gmail.com', '$2y$10$jRpuHg9bH2VMLgBKapsKqOQmTTG.wqOFS0xntncpd78xiVQN4Y716', 'Kulsoom Usmani', 4, '03356644774', '94783.jpg', NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjI3LCJpc3MiOiJodHRwOi8vbWFya2F6LnRlc3QvYWRkLXVzZXIiLCJpYXQiOjE1NjI1MjM0MDUsImV4cCI6MTU2MjUyNzAwNSwibmJmIjoxNTYyNTIzNDA1LCJqdGkiOiJUSG4yRkpJTXhITHB2U0ptIn0.kzwuTBTl6FJumF0dX8zfA8zIu_mdXN7KBhg9VVxafXU', '2019-07-07 13:16:45', '2019-07-07 13:16:45', NULL),
(29, 'talha@gmail.com', '$2y$10$3tc1V7t6xCEE0eUkkUtOhOhfviE.L1yFcMtKLGiwfU4s6Vh/OM5ui', 'Talha Nadeem', 4, '03356644774', '69935.jpg', NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjI5LCJpc3MiOiJodHRwOi8vbWFya2F6LnRlc3QvYWRkLXVzZXIiLCJpYXQiOjE1NjI1MjM0NzUsImV4cCI6MTU2MjUyNzA3NSwibmJmIjoxNTYyNTIzNDc1LCJqdGkiOiJyRnBTa1ZGM0NadEpkN255In0.mmxWtbE_HcURTCh-QH80ycwZ7P3AZC93uzaH0YAABYk', '2019-07-07 13:17:55', '2019-07-07 13:17:55', NULL),
(39, 'kashafnazir24@gmail.coma', '$2y$10$/dMVfW1rTdGqgrxCDZy9c.68oW9CiSpUHaxxNbEYn3Lu/N/1wh2Mi', 'Kashaf Nazir', 2, '123456', 'user_default.png', NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjM5LCJpc3MiOiJodHRwOi8vbWFya2F6LnRlc3QvdXNlci9zaWdudXB3ZWIiLCJpYXQiOjE1NjI1MjUwMjUsImV4cCI6MTU2MjUyODYyNSwibmJmIjoxNTYyNTI1MDI1LCJqdGkiOiJzSHdaSXBuRkZoTUE1U0NzIn0.qsA5uwuWIPtTlKvwNotBVhjOChDdXdh5AhmXWjjSSng', '2019-07-07 13:43:44', '2019-07-07 13:43:45', NULL);

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
  ADD KEY `promotions_tag_id_foreign` (`tag_id`);

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
-- Indexes for table `promotion_rating`
--
ALTER TABLE `promotion_rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_user_id_foreign` (`user_id`),
  ADD KEY `user_promotion_id_foreign` (`promotion_id`);

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
-- Indexes for table `store_rating`
--
ALTER TABLE `store_rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_user_id_foreign` (`user_id`),
  ADD KEY `user_store_id_foreign` (`store_id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `device_tokens`
--
ALTER TABLE `device_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_logs`
--
ALTER TABLE `event_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `followers`
--
ALTER TABLE `followers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `media_images`
--
ALTER TABLE `media_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `promotion_comments`
--
ALTER TABLE `promotion_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `promotion_media`
--
ALTER TABLE `promotion_media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `promotion_rating`
--
ALTER TABLE `promotion_rating`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `social_stores`
--
ALTER TABLE `social_stores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `store_rating`
--
ALTER TABLE `store_rating`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

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
