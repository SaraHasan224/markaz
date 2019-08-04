-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2019 at 10:31 PM
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
(10, 'Services', '28555.jpg', '2019-07-05 22:11:10', '2019-08-04 15:30:25', NULL),
(11, 'Pret', '23964.jpg', '2019-07-20 22:24:59', '2019-08-03 10:46:15', '2019-08-03 10:46:15'),
(12, 'Pret 1', '97601.jpg', '2019-08-03 19:07:01', '2019-08-03 19:11:05', '2019-08-03 19:11:05'),
(13, 'Motor Cycles edited', '89054.jpg', '2019-08-03 19:22:35', '2019-08-03 19:24:27', '2019-08-03 19:24:27'),
(14, 'Jewellery deleted', '10802.png', '2019-08-04 07:47:22', '2019-08-04 07:47:38', '2019-08-04 07:47:38'),
(15, 'hairdok', '53364.jpg', '2019-08-04 11:12:50', '2019-08-04 11:13:08', '2019-08-04 11:13:08');

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
  `component_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_logs`
--

INSERT INTO `event_logs` (`id`, `component`, `component_image`, `operation`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'User : Sara Hasan', '41864.jpg', 'logged in', 1, '2019-08-04 12:40:43', '2019-08-04 12:40:43', NULL),
(2, 'Store : Alkaram', '94092.jpg', 'added', 1, '2019-08-04 12:49:35', '2019-08-04 12:49:35', NULL),
(3, 'Store : Gul Ahmed', '3980.png', 'added', 1, '2019-08-04 12:51:48', '2019-08-04 12:51:48', NULL),
(4, 'Store : Khaadi', '95021.png', 'added', 1, '2019-08-04 12:53:55', '2019-08-04 12:53:55', NULL),
(5, 'Store : Limelight', '15178.png', 'added', 1, '2019-08-04 12:55:52', '2019-08-04 12:55:52', NULL),
(6, 'Store : MariaB', '33193.png', 'added', 1, '2019-08-04 12:57:17', '2019-08-04 12:57:17', NULL),
(7, 'Store : NishatLinen', '74630.png', 'added', 1, '2019-08-04 12:58:34', '2019-08-04 12:58:34', NULL),
(8, 'Store : Sapphire', '85820.png', 'added', 1, '2019-08-04 12:59:39', '2019-08-04 12:59:39', NULL),
(9, 'Store : Dawlance', '39014.png', 'added', 1, '2019-08-04 13:01:18', '2019-08-04 13:01:18', NULL),
(10, 'Store : Samsung', '29198.png', 'added', 1, '2019-08-04 13:03:11', '2019-08-04 13:03:11', NULL),
(11, 'Store : Orient', '13380.jpg', 'added', 1, '2019-08-04 13:05:03', '2019-08-04 13:05:03', NULL),
(12, 'Store : Cinepex', '88058.jpg', 'added', 1, '2019-08-04 13:06:45', '2019-08-04 13:06:45', NULL),
(13, 'Store : Nueplex', '70243.jpg', 'added', 1, '2019-08-04 13:07:56', '2019-08-04 13:07:56', NULL),
(14, 'Store : SuperSpace', '76459.png', 'added', 1, '2019-08-04 13:09:15', '2019-08-04 13:09:15', NULL),
(15, 'User : Sara Hasan', '41864.jpg', 'logged in', 1, '2019-08-04 14:25:20', '2019-08-04 14:25:20', NULL),
(16, 'Store : Delzia', '65403.png', 'added', 1, '2019-08-04 14:51:41', '2019-08-04 14:51:41', NULL),
(17, 'Store : Ginsoy', '53234.jpg', 'added', 1, '2019-08-04 14:55:40', '2019-08-04 14:55:40', NULL),
(18, 'Store : Hardees', '72928.jpeg', 'added', 1, '2019-08-04 14:58:17', '2019-08-04 14:58:17', NULL),
(19, 'Store : Hobnob', '13832.jpg', 'added', 1, '2019-08-04 15:01:17', '2019-08-04 15:01:17', NULL),
(20, 'Store : KFC', '57412.png', 'added', 1, '2019-08-04 15:09:00', '2019-08-04 15:09:00', NULL),
(21, 'Store : Maha Ali Bintory Make up Artist', '17903.jpg', 'added', 1, '2019-08-04 15:13:25', '2019-08-04 15:13:25', NULL),
(22, 'Store : Pengs Saloon and Spa', '50297.png', 'added', 1, '2019-08-04 15:16:43', '2019-08-04 15:16:43', NULL),
(23, 'Store : Habitt', '58219.jpg', 'added', 1, '2019-08-04 15:21:04', '2019-08-04 15:21:04', NULL),
(24, 'Store : Index Furniture', '98538.jpg', 'added', 1, '2019-08-04 15:24:17', '2019-08-04 15:24:17', NULL),
(25, 'Store : Hashmani Eye Hospital', '84412.jpg', 'added', 1, '2019-08-04 15:28:17', '2019-08-04 15:28:17', NULL),
(26, 'Store : Aga Khan University Hospital', '57161.jpg', 'added', 1, '2019-08-04 15:30:00', '2019-08-04 15:30:00', NULL),
(27, 'Category : Self Care', '28555.jpg', 'edited', 1, '2019-08-04 15:30:25', '2019-08-04 15:30:25', NULL),
(28, 'Category : Services', '28555.jpg', 'edited successfully', 1, '2019-08-04 15:30:25', '2019-08-04 15:30:25', NULL),
(29, 'Store : Anees Hussain Aptitude', '20669.jpg', 'added', 1, '2019-08-04 15:33:01', '2019-08-04 15:33:01', NULL),
(30, 'Store : Pakistan International Airline', '64912.jpg', 'added', 1, '2019-08-04 15:36:47', '2019-08-04 15:36:47', NULL),
(31, 'Store : Batoota.pk', '87680.jpg', 'added', 1, '2019-08-04 15:38:00', '2019-08-04 15:38:00', NULL),
(32, 'User : Sara Hasan', '41864.jpg', 'logged in', 1, '2019-08-04 19:08:36', '2019-08-04 19:08:36', NULL),
(33, 'Tag : Fast Food', NULL, 'added', 1, '2019-08-04 19:39:28', '2019-08-04 19:39:28', NULL),
(34, 'Tag : Chinese Cuisine', NULL, 'added', 1, '2019-08-04 19:39:40', '2019-08-04 19:39:40', NULL),
(35, 'Tag : Unstitched Collection', NULL, 'added', 1, '2019-08-04 19:39:50', '2019-08-04 19:39:50', NULL),
(36, 'Tag : Pret Wear', NULL, 'added', 1, '2019-08-04 19:39:59', '2019-08-04 19:39:59', NULL),
(37, 'Tag : Eid Collection', NULL, 'added', 1, '2019-08-04 19:40:05', '2019-08-04 19:40:05', NULL),
(38, 'Tag : Black friday sale', NULL, 'added', 1, '2019-08-04 19:40:10', '2019-08-04 19:40:10', NULL),
(39, 'Promotion : Clearance Sale (10% Off)', '55053.jpg', 'added', 1, '2019-08-04 19:45:20', '2019-08-04 19:45:20', NULL),
(40, 'Promotion : Black Friday Sale', '36191.jpg', 'added', 1, '2019-08-04 19:48:35', '2019-08-04 19:48:35', NULL),
(41, 'Promotion : The Amazing Sale', '9403.jpg', 'added', 1, '2019-08-04 19:51:46', '2019-08-04 19:51:46', NULL),
(42, 'Promotion : Clearance Sale (10% Off)', '63286.jpg', 'added', 1, '2019-08-04 19:55:25', '2019-08-04 19:55:25', NULL),
(43, 'FAQ : Why should I use MARKAZ?', NULL, 'added', 1, '2019-08-04 20:09:33', '2019-08-04 20:09:33', NULL),
(44, 'FAQ : What type of promotion can I do with MARKAZ?', NULL, 'added', 1, '2019-08-04 20:09:47', '2019-08-04 20:09:47', NULL),
(45, 'FAQ : How the customers will know about my sales or discount offers?', NULL, 'added', 1, '2019-08-04 20:10:01', '2019-08-04 20:10:01', NULL),
(46, 'FAQ : How can I create future events?', NULL, 'added', 1, '2019-08-04 20:10:31', '2019-08-04 20:10:31', NULL),
(47, 'FAQ : How can I see my customers approaching me through this platform?', NULL, 'added', 1, '2019-08-04 20:10:46', '2019-08-04 20:10:46', NULL),
(48, 'FAQ : Do I need to pay every time when I create any promotion?', NULL, 'added', 1, '2019-08-04 20:11:00', '2019-08-04 20:11:00', NULL),
(49, 'FAQ : What is the payment criteria?', NULL, 'added', 1, '2019-08-04 20:11:12', '2019-08-04 20:11:12', NULL),
(50, 'FAQ : How can I get registered on your application?', NULL, 'added', 1, '2019-08-04 20:11:24', '2019-08-04 20:11:24', NULL),
(51, 'Promotion : Clearance Sale (10% Off)', NULL, 'eddited', 1, '2019-08-04 20:30:41', '2019-08-04 20:30:41', NULL);

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
(1, 'Why should I use MARKAZ?', 'MARKAZ allows brands or companies to catch great number of customers by posting promotional stuff on our web-panel and the notification of these promotions will be sent to the customers when they enter in a specified radius. You can get those customers in who want to avail your discount offers but somehow they miss them but through this application they will be automatically reminded about your promotional stuff (discount offers or sales) when they are nearby your store or outlet.', 0, 1, '2019-08-04 20:09:33', '2019-08-04 20:09:33', NULL),
(2, 'What type of promotion can I do with MARKAZ?', 'You are allowed to post stuff regarding discount offers, sales, new policies of your brand etc or any kind of promotional stuff.', 0, 1, '2019-08-04 20:09:47', '2019-08-04 20:09:47', NULL),
(3, 'How the customers will know about my sales or discount offers?', 'You will have to specify the radius while creating a promotion in terms of longitude and latitude. These longitude and latitude will be used by the google geo-fence API to calculate radius. The use of GPS to create a virtual geographic boundary, enabling software to trigger a response when a mobile device enters or leaves a particular area.', 0, 1, '2019-08-04 20:10:01', '2019-08-04 20:10:01', NULL),
(4, 'How can I create future events?', 'You can create your future events by creating a promotion available in our web-panel.', 0, 1, '2019-08-04 20:10:31', '2019-08-04 20:10:31', NULL),
(5, 'How can I see my customers approaching me through this platform?', 'MARKAZ displays the graph of users of particular brand or outlet. You can see your followers too.', 0, 1, '2019-08-04 20:10:46', '2019-08-04 20:10:46', NULL),
(6, 'Do I need to pay every time when I create any promotion?', 'No, you don’t need to pay every time when you create a promotion. You will be charged only once at the time of registration.', 0, 1, '2019-08-04 20:11:00', '2019-08-04 20:11:00', NULL),
(7, 'What is the payment criteria?', 'Payment criteria will depend on the selection of your longitude and latitude parameters. Payment will increase as the diameter of the circle increases.', 0, 1, '2019-08-04 20:11:12', '2019-08-04 20:11:12', NULL),
(8, 'How can I get registered on your application?', 'You can register on our application by making an account on our application in which you have to specify your company name, password, email, address etc. After making an account, you can log in and perform certain activities like adding posts, removing posts, editing posts, maintaining your profile and can see analytics of your users.', 0, 1, '2019-08-04 20:11:24', '2019-08-04 20:11:24', NULL),
(9, 'Why should I use MARKAZ?', 'MARKAZ allows brands or companies to catch great number of customers by posting promotional stuff on our web-panel and the notification of these promotions will be sent to the customers when they enter in a specified radius. You can get those customers in who want to avail your discount offers but somehow they miss them but through this application they will be automatically reminded about your promotional stuff (discount offers or sales) when they are nearby your store or outlet.', 1, 1, '2019-08-04 20:09:33', '2019-08-04 20:09:33', NULL),
(10, 'What type of promotion can I do with MARKAZ?', 'You are allowed to post stuff regarding discount offers, sales, new policies of your brand etc or any kind of promotional stuff.', 1, 1, '2019-08-04 20:09:47', '2019-08-04 20:09:47', NULL),
(11, 'How the customers will know about my sales or discount offers?', 'You will have to specify the radius while creating a promotion in terms of longitude and latitude. These longitude and latitude will be used by the google geo-fence API to calculate radius. The use of GPS to create a virtual geographic boundary, enabling software to trigger a response when a mobile device enters or leaves a particular area.', 2, 1, '2019-08-04 20:10:01', '2019-08-04 20:10:01', NULL),
(12, 'How can I create future events?', 'You can create your future events by creating a promotion available in our web-panel.', 2, 1, '2019-08-04 20:10:31', '2019-08-04 20:10:31', NULL),
(13, 'How can I see my customers approaching me through this platform?', 'MARKAZ displays the graph of users of particular brand or outlet. You can see your followers too.', 3, 1, '2019-08-04 20:10:46', '2019-08-04 20:10:46', NULL),
(14, 'Do I need to pay every time when I create any promotion?', 'No, you don’t need to pay every time when you create a promotion. You will be charged only once at the time of registration.', 3, 1, '2019-08-04 20:11:00', '2019-08-04 20:11:00', NULL),
(15, 'What is the payment criteria?', 'Payment criteria will depend on the selection of your longitude and latitude parameters. Payment will increase as the diameter of the circle increases.', 4, 1, '2019-08-04 20:11:12', '2019-08-04 20:11:12', NULL),
(16, 'How can I get registered on your application?', 'You can register on our application by making an account on our application in which you have to specify your company name, password, email, address etc. After making an account, you can log in and perform certain activities like adding posts, removing posts, editing posts, maintaining your profile and can see analytics of your users.', 4, 1, '2019-08-04 20:11:24', '2019-08-04 20:11:24', NULL);

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
(1, 5, 1, 1, NULL, NULL, NULL),
(2, 6, 2, 1, NULL, NULL, NULL),
(3, 5, 3, 1, NULL, NULL, NULL),
(4, 19, 10, 1, NULL, NULL, NULL),
(5, 7, 4, 1, NULL, NULL, NULL),
(6, 18, 11, 1, NULL, NULL, NULL),
(7, 8, 5, 1, NULL, NULL, NULL),
(8, 17, 12, 1, NULL, NULL, NULL),
(9, 9, 6, 1, NULL, NULL, NULL),
(10, 16, 13, 1, NULL, NULL, NULL),
(11, 10, 7, 1, NULL, NULL, NULL),
(12, 15, 14, 1, NULL, NULL, NULL),
(13, 11, 8, 1, NULL, NULL, NULL),
(14, 14, 15, 1, NULL, NULL, NULL),
(15, 12, 9, 1, NULL, NULL, NULL),
(16, 13, 16, 1, NULL, NULL, NULL),
(17, 5, 17, 1, NULL, NULL, NULL),
(18, 19, 24, 1, NULL, NULL, NULL),
(19, 7, 18, 1, NULL, NULL, NULL),
(20, 18, 25, 1, NULL, NULL, NULL),
(21, 8, 19, 1, NULL, NULL, NULL),
(22, 17, 26, 1, NULL, NULL, NULL),
(23, 9, 20, 1, NULL, NULL, NULL),
(24, 16, 27, 1, NULL, NULL, NULL),
(25, 10, 21, 1, NULL, NULL, NULL),
(26, 15, 3, 1, NULL, NULL, NULL),
(27, 11, 22, 1, NULL, NULL, NULL),
(28, 14, 1, 1, NULL, NULL, NULL),
(29, 12, 23, 1, NULL, NULL, NULL),
(30, 13, 2, 1, NULL, NULL, NULL),
(31, 40, 3, 1, NULL, NULL, NULL),
(32, 33, 10, 1, NULL, NULL, NULL),
(33, 39, 4, 1, NULL, NULL, NULL),
(34, 32, 11, 1, NULL, NULL, NULL),
(35, 38, 5, 1, NULL, NULL, NULL),
(36, 31, 12, 1, NULL, NULL, NULL),
(37, 37, 6, 1, NULL, NULL, NULL),
(38, 30, 13, 1, NULL, NULL, NULL),
(39, 36, 7, 1, NULL, NULL, NULL),
(40, 29, 14, 1, NULL, NULL, NULL),
(41, 35, 8, 1, NULL, NULL, NULL),
(42, 28, 15, 1, NULL, NULL, NULL),
(43, 34, 9, 1, NULL, NULL, NULL),
(44, 27, 16, 1, NULL, NULL, NULL),
(45, 1, 19, 1, NULL, NULL, NULL),
(46, 15, 24, 1, NULL, NULL, NULL),
(47, 2, 20, 1, NULL, NULL, NULL),
(48, 16, 25, 1, NULL, NULL, NULL),
(49, 3, 21, 1, NULL, NULL, NULL),
(50, 17, 26, 1, NULL, NULL, NULL),
(51, 4, 22, 1, NULL, NULL, NULL),
(52, 18, 27, 1, NULL, NULL, NULL),
(53, 1, 17, 1, NULL, NULL, NULL),
(54, 14, 24, 1, NULL, NULL, NULL),
(55, 2, 18, 1, NULL, NULL, NULL),
(56, 13, 25, 1, NULL, NULL, NULL),
(57, 3, 19, 1, NULL, NULL, NULL),
(58, 12, 26, 1, NULL, NULL, NULL),
(59, 4, 20, 1, NULL, NULL, NULL),
(60, 11, 27, 1, NULL, NULL, NULL),
(61, 5, 21, 1, NULL, NULL, NULL),
(62, 10, 3, 1, NULL, NULL, NULL),
(63, 6, 22, 1, NULL, NULL, NULL),
(64, 9, 1, 1, NULL, NULL, NULL),
(65, 7, 23, 1, NULL, NULL, NULL),
(66, 8, 2, 1, NULL, NULL, NULL),
(67, 40, 27, 1, NULL, NULL, NULL),
(68, 9, 10, 1, NULL, NULL, NULL),
(69, 39, 26, 1, NULL, NULL, NULL),
(70, 8, 11, 1, NULL, NULL, NULL),
(71, 38, 25, 1, NULL, NULL, NULL),
(72, 7, 12, 1, NULL, NULL, NULL),
(73, 37, 24, 1, NULL, NULL, NULL),
(74, 6, 13, 1, NULL, NULL, NULL),
(75, 36, 23, 1, NULL, NULL, NULL),
(76, 4, 14, 1, NULL, NULL, NULL),
(77, 35, 22, 1, NULL, NULL, NULL),
(78, 5, 15, 1, NULL, NULL, NULL),
(79, 34, 21, 1, NULL, NULL, NULL),
(80, 3, 16, 1, NULL, NULL, NULL),
(81, 1, 10, 1, NULL, NULL, NULL),
(82, 2, 24, 1, NULL, NULL, NULL),
(83, 2, 19, 1, NULL, NULL, NULL),
(84, 1, 25, 1, NULL, NULL, NULL),
(85, 3, 18, 1, NULL, NULL, NULL),
(86, 21, 26, 1, NULL, NULL, NULL),
(87, 4, 17, 1, NULL, NULL, NULL),
(88, 19, 27, 1, NULL, NULL, NULL),
(89, 1, 16, 1, NULL, NULL, NULL),
(90, 20, 24, 1, NULL, NULL, NULL),
(91, 2, 15, 1, NULL, NULL, NULL),
(92, 22, 25, 1, NULL, NULL, NULL),
(93, 3, 14, 1, NULL, NULL, NULL),
(94, 23, 26, 1, NULL, NULL, NULL),
(95, 4, 13, 1, NULL, NULL, NULL),
(96, 24, 27, 1, NULL, NULL, NULL),
(97, 5, 12, 1, NULL, NULL, NULL),
(98, 25, 3, 1, NULL, NULL, NULL),
(99, 6, 11, 1, NULL, NULL, NULL),
(100, 26, 1, 1, NULL, NULL, NULL),
(101, 7, 10, 1, NULL, NULL, NULL),
(102, 27, 2, 1, NULL, NULL, NULL);

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
(1, '14020.jpg', '2019-08-04 19:45:20', '2019-08-04 19:45:20', NULL),
(2, '87368.jpg', '2019-08-04 19:45:20', '2019-08-04 19:45:20', NULL),
(3, '45732.jpg', '2019-08-04 19:45:20', '2019-08-04 19:45:20', NULL),
(4, '90135.jpg', '2019-08-04 19:45:20', '2019-08-04 19:45:20', NULL),
(5, '86533.jpg', '2019-08-04 19:45:20', '2019-08-04 19:45:20', NULL),
(6, '20143.jpg', '2019-08-04 19:45:20', '2019-08-04 19:45:20', NULL),
(7, '72697.jpg', '2019-08-04 19:45:20', '2019-08-04 19:45:20', NULL),
(8, '31640.jpg', '2019-08-04 19:45:20', '2019-08-04 19:45:20', NULL),
(9, '13495.jpg', '2019-08-04 19:45:20', '2019-08-04 19:45:20', NULL),
(10, '87273.jpg', '2019-08-04 19:45:20', '2019-08-04 19:45:20', NULL),
(11, '64106.jpg', '2019-08-04 19:45:20', '2019-08-04 19:45:20', NULL),
(12, '70880.jpg', '2019-08-04 19:45:20', '2019-08-04 19:45:20', NULL),
(13, '8982.jpg', '2019-08-04 19:48:34', '2019-08-04 19:48:34', NULL),
(14, '71415.jpg', '2019-08-04 19:48:34', '2019-08-04 19:48:34', NULL),
(15, '6417.jpg', '2019-08-04 19:48:35', '2019-08-04 19:48:35', NULL),
(16, '58825.jpg', '2019-08-04 19:48:35', '2019-08-04 19:48:35', NULL),
(17, '65374.jpg', '2019-08-04 19:48:35', '2019-08-04 19:48:35', NULL),
(18, '61278.jpg', '2019-08-04 19:51:46', '2019-08-04 19:51:46', NULL),
(19, '26132.jpg', '2019-08-04 19:51:46', '2019-08-04 19:51:46', NULL),
(20, '88277.jpg', '2019-08-04 19:51:46', '2019-08-04 19:51:46', NULL),
(21, '27519.jpg', '2019-08-04 19:51:46', '2019-08-04 19:51:46', NULL),
(22, '79084.jpg', '2019-08-04 19:51:46', '2019-08-04 19:51:46', NULL),
(23, '61122.jpg', '2019-08-04 19:51:46', '2019-08-04 19:51:46', NULL),
(24, '71705.jpg', '2019-08-04 19:51:46', '2019-08-04 19:51:46', NULL),
(25, '20556.jpg', '2019-08-04 19:55:25', '2019-08-04 19:55:25', NULL),
(26, '85307.jpg', '2019-08-04 19:55:25', '2019-08-04 19:55:25', NULL),
(27, '74877.jpg', '2019-08-04 19:55:25', '2019-08-04 19:55:25', NULL),
(28, '29834.jpg', '2019-08-04 19:55:25', '2019-08-04 19:55:25', NULL),
(29, '97821.jpg', '2019-08-04 19:55:25', '2019-08-04 19:55:25', NULL);

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
  `total` int(11) NOT NULL DEFAULT '0',
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

INSERT INTO `promotions` (`id`, `title`, `description`, `start_time`, `end_time`, `radius`, `location`, `longitude`, `latitude`, `image`, `total`, `payment_status`, `store_id`, `tag_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Clearance Sale (10% Off)', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2019-08-04 19:00:00', '2019-08-07 11:00:00', 2000, 'Building 39C, Khayaban-e-Seher, D.H.A Phase 6 Shahbaz Commercial Area Phase 6 Defence Housing Authority, Karachi, Karachi City, Sindh 75500, Pakistan', 67.05094933029147, 24.7958296802915, '55053.jpg', 0, 0, 1, 4, '2019-08-04 19:45:20', '2019-08-04 20:30:41', NULL),
(2, 'Black Friday Sale', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2019-08-04 19:00:00', '2019-08-12 18:00:00', 10000, 'Landhi Industrial Area Rd, Landhi Town, Karachi, Karachi City, Sindh, Pakistan', 67.21624278029151, 24.8459569302915, '36191.jpg', 5000, 0, 2, 6, '2019-08-04 19:48:35', '2019-08-04 19:48:35', NULL),
(3, 'The Amazing Sale', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2019-08-04 19:00:00', '2019-08-14 18:00:00', 2000, 'Royal Apartments، Shop No 9A،، KDA Scheme #1 KDA Scheme 1, Karachi, Karachi City, Sindh, Pakistan', 67.09187983029153, 24.88387343029151, '9403.jpg', 0, 0, 3, 5, '2019-08-04 19:51:46', '2019-08-04 19:51:46', NULL),
(4, 'Clearance Sale (10% Off)', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2019-08-04 19:00:00', '2019-08-09 18:00:00', 2000, 'shop name samsung Plot 16 – C, Zamzama Commercial، Lane 2, D.H.A Phase 6 Bukhari Commercial Area Phase 6 Defence Housing Authority, Karachi, Karachi City, Sindh 75500, Pakistan', 67.06532953029148, 24.7955338302915, '63286.jpg', 0, 0, 9, 6, '2019-08-04 19:55:25', '2019-08-04 19:55:25', NULL);

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

--
-- Dumping data for table `promotion_comments`
--

INSERT INTO `promotion_comments` (`id`, `comment`, `user_id`, `promotion_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '6', 1, '2019-08-01 04:09:21', NULL, NULL),
(2, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '5', 1, '2019-08-02 05:06:00', NULL, NULL),
(3, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '6', 2, '2019-08-01 04:09:21', NULL, NULL),
(4, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '5', 2, '2019-08-02 05:06:00', NULL, NULL),
(5, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '7', 2, '2019-08-01 04:09:21', NULL, NULL),
(6, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '6', 2, '2019-08-02 05:06:00', NULL, NULL),
(7, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '6', 3, '2019-08-01 04:09:21', NULL, NULL),
(8, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '5', 3, '2019-08-02 05:06:00', NULL, NULL),
(9, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '7', 3, '2019-08-01 04:09:21', NULL, NULL),
(10, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '6', 3, '2019-08-02 05:06:00', NULL, NULL),
(11, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '6', 4, '2019-08-01 04:09:21', NULL, NULL),
(12, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '5', 4, '2019-08-02 05:06:00', NULL, NULL),
(13, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '7', 4, '2019-08-01 04:09:21', NULL, NULL),
(14, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '6', 4, '2019-08-02 05:06:00', NULL, NULL);

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
(1, 1, '1', '2019-08-04 19:45:20', '2019-08-04 19:45:20', NULL),
(2, 1, '2', '2019-08-04 19:45:20', '2019-08-04 19:45:20', NULL),
(3, 1, '3', '2019-08-04 19:45:21', '2019-08-04 19:45:21', NULL),
(4, 1, '4', '2019-08-04 19:45:21', '2019-08-04 19:45:21', NULL),
(5, 1, '5', '2019-08-04 19:45:21', '2019-08-04 19:45:21', NULL),
(6, 1, '6', '2019-08-04 19:45:21', '2019-08-04 19:45:21', NULL),
(7, 1, '7', '2019-08-04 19:45:21', '2019-08-04 19:45:21', NULL),
(8, 1, '8', '2019-08-04 19:45:21', '2019-08-04 19:45:21', NULL),
(9, 1, '9', '2019-08-04 19:45:21', '2019-08-04 19:45:21', NULL),
(10, 1, '10', '2019-08-04 19:45:21', '2019-08-04 19:45:21', NULL),
(11, 1, '11', '2019-08-04 19:45:21', '2019-08-04 19:45:21', NULL),
(12, 1, '12', '2019-08-04 19:45:21', '2019-08-04 19:45:21', NULL),
(13, 2, '13', '2019-08-04 19:48:35', '2019-08-04 19:48:35', NULL),
(14, 2, '14', '2019-08-04 19:48:35', '2019-08-04 19:48:35', NULL),
(15, 2, '15', '2019-08-04 19:48:35', '2019-08-04 19:48:35', NULL),
(16, 2, '16', '2019-08-04 19:48:35', '2019-08-04 19:48:35', NULL),
(17, 2, '17', '2019-08-04 19:48:35', '2019-08-04 19:48:35', NULL),
(18, 3, '18', '2019-08-04 19:51:46', '2019-08-04 19:51:46', NULL),
(19, 3, '19', '2019-08-04 19:51:46', '2019-08-04 19:51:46', NULL),
(20, 3, '20', '2019-08-04 19:51:46', '2019-08-04 19:51:46', NULL),
(21, 3, '21', '2019-08-04 19:51:46', '2019-08-04 19:51:46', NULL),
(22, 3, '22', '2019-08-04 19:51:46', '2019-08-04 19:51:46', NULL),
(23, 3, '23', '2019-08-04 19:51:46', '2019-08-04 19:51:46', NULL),
(24, 3, '24', '2019-08-04 19:51:46', '2019-08-04 19:51:46', NULL),
(25, 4, '25', '2019-08-04 19:55:25', '2019-08-04 19:55:25', NULL),
(26, 4, '26', '2019-08-04 19:55:25', '2019-08-04 19:55:25', NULL),
(27, 4, '27', '2019-08-04 19:55:25', '2019-08-04 19:55:25', NULL),
(28, 4, '28', '2019-08-04 19:55:25', '2019-08-04 19:55:25', NULL),
(29, 4, '29', '2019-08-04 19:55:25', '2019-08-04 19:55:25', NULL);

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
(1, 4.5, 5, 1, NULL, NULL),
(2, 3.25, 6, 1, NULL, NULL),
(3, 5, 5, 1, NULL, NULL),
(4, 3, 6, 1, NULL, NULL),
(5, 4.5, 6, 1, NULL, NULL),
(6, 3.25, 19, 1, NULL, NULL),
(7, 4.75, 7, 2, NULL, NULL),
(8, 3.75, 18, 2, NULL, NULL),
(9, 4.5, 8, 2, NULL, NULL),
(10, 3, 17, 2, NULL, NULL),
(11, 4, 9, 3, NULL, NULL),
(12, 3, 16, 3, NULL, NULL),
(13, 4.5, 10, 3, NULL, NULL),
(14, 2.75, 14, 3, NULL, NULL),
(15, 2, 11, 4, NULL, NULL),
(16, 1.25, 13, 4, NULL, NULL),
(17, 1.5, 15, 4, NULL, NULL),
(18, 4.25, 12, 4, NULL, NULL);

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
(1, 1, 'adsddfdsdg', 'ssdsa', 'assdfffgdfczcx', '2019-08-04 12:49:35', '2019-08-04 12:49:35', NULL),
(2, 2, 'www.facebook.com', 'adsdas', 'adsfsdfsdsdsf', '2019-08-04 12:51:48', '2019-08-04 12:51:48', NULL),
(3, 3, 'sahdshdja', 'jassdauw', 'asdfsd', '2019-08-04 12:53:55', '2019-08-04 12:53:55', NULL),
(4, 4, 'qqwed', 'sfsfsfsdww', 'dsfsdfsad', '2019-08-04 12:55:52', '2019-08-04 12:55:52', NULL),
(5, 5, 'ssddsdasda', 'sasdas', 'asdsfasd', '2019-08-04 12:57:17', '2019-08-04 12:57:17', NULL),
(6, 6, 'sfczsdczxcs', 'cvvbdffd', 'sfdfdgrgfcv', '2019-08-04 12:58:34', '2019-08-04 12:58:34', NULL),
(7, 7, 'xzfefascxc', 'sfsafsads', 'cxdvdfescs', '2019-08-04 12:59:39', '2019-08-04 12:59:39', NULL),
(8, 8, 'cxczxcxcz', 'asfdczsds', 'cfxcxbfb', '2019-08-04 13:01:18', '2019-08-04 13:01:18', NULL),
(9, 9, 'asawdad', 'fewwesds', 'adsfsfdsfs', '2019-08-04 13:03:11', '2019-08-04 13:03:11', NULL),
(10, 10, 'sdsdsdd', 'asdfsdasd', 'sdasdsdsd', '2019-08-04 13:05:03', '2019-08-04 13:05:03', NULL),
(11, 11, 'cfvxvxxz', 'sadefsds', 'szdvfdfwef', '2019-08-04 13:06:45', '2019-08-04 13:06:45', NULL),
(12, 12, 'ajsdasuduaw', 'dsdfsdas', 'asdasddasa', '2019-08-04 13:07:56', '2019-08-04 13:07:56', NULL),
(13, 13, 'dfgdfvxcf', 'gadadasdXa', 'dfdgdffdrgd', '2019-08-04 13:09:15', '2019-08-04 13:09:15', NULL),
(14, 14, 'https://www.facebook.com/DeliziaPK/', NULL, NULL, '2019-08-04 14:51:41', '2019-08-04 14:51:41', NULL),
(15, 15, 'https://www.facebook.com/Ginsoy', 'https://twitter.com/ginsoychinese', 'https://instagram.com/ginsoyextreme', '2019-08-04 14:55:40', '2019-08-04 14:55:40', NULL),
(16, 16, NULL, NULL, NULL, '2019-08-04 14:58:17', '2019-08-04 14:58:17', NULL),
(17, 17, 'https://www.facebook.com/hobnob.bakeries/', NULL, NULL, '2019-08-04 15:01:17', '2019-08-04 15:01:17', NULL),
(18, 18, NULL, NULL, NULL, '2019-08-04 15:09:00', '2019-08-04 15:09:00', NULL),
(19, 19, 'https://www.facebook.com/MABintory/', NULL, NULL, '2019-08-04 15:13:25', '2019-08-04 15:13:25', NULL),
(20, 20, 'https://www.facebook.com/pengsalon/', NULL, NULL, '2019-08-04 15:16:43', '2019-08-04 15:16:43', NULL),
(21, 21, 'https://www.facebook.com/HabittHomeStore/', 'https://twitter.com/habitthomestore', 'https://www.instagram.com/habitthomestore/', '2019-08-04 15:21:04', '2019-08-04 15:21:04', NULL),
(22, 22, 'https://www.facebook.com/IndexPakistan/', NULL, 'https://www.instagram.com/indexfurniturepakistan/', '2019-08-04 15:24:17', '2019-08-04 15:24:17', NULL),
(23, 23, NULL, NULL, NULL, '2019-08-04 15:28:17', '2019-08-04 15:28:17', NULL),
(24, 24, NULL, NULL, NULL, '2019-08-04 15:30:00', '2019-08-04 15:30:00', NULL),
(25, 25, NULL, NULL, NULL, '2019-08-04 15:33:01', '2019-08-04 15:33:01', NULL),
(26, 26, NULL, NULL, NULL, '2019-08-04 15:36:47', '2019-08-04 15:36:47', NULL),
(27, 27, NULL, NULL, NULL, '2019-08-04 15:38:00', '2019-08-04 15:38:00', NULL);

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
(1, 'Alkaram', '18439.jpg', '94092.jpg', 'LuckyOne Mall, Rashid Minhas Road, Karachi, Pakistan', '03345671234', 'www.alkaram.com', 'alkaram@email.com', 'Fashion World', 'adsgffff', 24.93375983, 67.08812058, 34, 4, 1, 1, '2019-08-04 12:49:35', '2019-08-04 12:49:35', NULL),
(2, 'Gul Ahmed', '70003.jpg', '3980.png', 'LuckyOne Mall, Rashid Minhas Road, Karachi, Pakistan', '03341234627', 'www.gulahmed.com', 'gulahmed@email.com', 'Fashion World', 'assdfdsdsdghhs', 24.93375983, 67.08812058, 39, 3, 1, 1, '2019-08-04 12:51:48', '2019-08-04 12:51:48', NULL),
(3, 'Khaadi', '6092.jpg', '95021.png', 'LuckyOne Mall, Rashid Minhas Road, Karachi, Pakistan', '012237287811', 'www.khaadi.com', 'khaadi@email.com', 'Fashion World', 'asdasjasj', 24.93375983, 67.08812058, 40, 3, 1, 1, '2019-08-04 12:53:55', '2019-08-04 12:53:55', NULL),
(4, 'Limelight', '76404.jpg', '15178.png', 'Haidry Chowk, Naya Nagar, Mira Road, Mira Bhayandar, Maharashtra', '02434434774', 'www.limelight.com', 'sdsdgsdf', 'Fashion World', 'sasfdd', 19.28845528, 72.86153228, 4, 3, 1, 1, '2019-08-04 12:55:52', '2019-08-04 12:55:52', NULL),
(5, 'MariaB', '1973.jpg', '33193.png', 'Haidry Chowk, Naya Nagar, Mira Road, Mira Bhayandar, Maharashtra', '0232384831', 'www,mariab.com', 'mariab@email.com', 'Fashion', 'asdsdgdf', 19.28845528, 72.86153228, 39, 3, 1, 1, '2019-08-04 12:57:17', '2019-08-04 12:57:17', NULL),
(6, 'NishatLinen', '62529.jpg', '74630.png', 'Haidry Chowk, Naya Nagar, Mira Road, Mira Bhayandar, Maharashtra', '03492341231', 'www,nishatLinen.com', 'nishatlinen@email.com', 'Fashion World', 'asdgsddgsds', 19.28845528, 72.86153228, 40, 3, 1, 1, '2019-08-04 12:58:34', '2019-08-04 12:58:34', NULL),
(7, 'Sapphire', '33034.jpg', '85820.png', 'Haidry Chowk, Naya Nagar, Mira Road, Mira Bhayandar, Maharashtra', '24364564', 'www.sapphire.com', 'www.sapphire.com', 'Fashion World', 'dsdgdgerfwe', 19.28845528, 72.86153228, 4, 3, 1, 1, '2019-08-04 12:59:39', '2019-08-04 12:59:39', NULL),
(8, 'Dawlance', '28999.jpg', '39014.png', 'Maskan Chowrangi Bus Stop, Allama Shabbir Ahmed Usmani Road, Karachi, Pakistan', '', 'www.dawlance.com', 'dawlance@email.com', 'Make Life Easy', 'dsfswasjkasdj', 24.93621243, 67.10662388, 4, 9, 1, 1, '2019-08-04 13:01:18', '2019-08-04 13:01:18', NULL),
(9, 'Samsung', '79288.jpg', '29198.png', 'Maskan Chowrangi Bus Stop, Allama Shabbir Ahmed Usmani Road, Karachi, Pakistan', '1324334', 'www.samsung.com', 'samsungemail.com', 'Make Life Easy', 'dsadassdfsad', 24.93621243, 67.10662388, 39, 9, 1, 1, '2019-08-04 13:03:11', '2019-08-04 13:03:11', NULL),
(10, 'Orient', '38411.jpg', '13380.jpg', 'NED Maskan, Abul Hasan Isphahani Road, Karachi, Pakistan', '121234234', 'www.orient.com', 'orient@emailcom', 'Make Life Easy', 'asjdhkasdjakd', 24.93572078, 67.10702068, 40, 9, 1, 1, '2019-08-04 13:05:03', '2019-08-04 13:05:03', NULL),
(11, 'Cinepex', '42673.jpg', '88058.jpg', 'Maskan Apartments, Karachi, Pakistan', '1233535', 'www.cinepex.com', 'cinepex@email.com', 'Entertain Yourself', 'sdhsuadasj', 24.93611383, 67.10532068, 4, 9, 1, 1, '2019-08-04 13:06:45', '2019-08-04 13:06:45', NULL),
(12, 'Nueplex', '61779.jpg', '70243.jpg', 'Maskan Chowrangi Bus Stop, Allama Shabbir Ahmed Usmani Road, Karachi, Pakistan', '132334423', 'www.nueplex.com', 'nueplex@email.com', 'Entertain Yourself', 'dkaidajsduwadi', 24.93621243, 67.10662388, 39, 5, 1, 1, '2019-08-04 13:07:56', '2019-08-04 13:07:56', NULL),
(13, 'SuperSpace', '18725.jpg', '76459.png', 'Maskan Chowrangi Bus Stop, Allama Shabbir Ahmed Usmani Road, Karachi, Pakistan', '134235345', 'www.superspace.com', 'superspace@email.com', 'Entertain Yourself', 'dzsfsfasd', 24.93621243, 67.10662388, 40, 5, 1, 1, '2019-08-04 13:09:15', '2019-08-04 13:09:15', NULL),
(14, 'Delzia', '12897.jpg', '65403.png', 'Delizia Bakery, Bahadur Shah Zafar Road, Karachi, Pakistan', '0321-2888305\r\n 0345-4775500', 'http://delizia.pk/product-category/cakes/', 'orders@delizia.pk', 'Quality makes the difference', '27-E, Shahbaz Commercial, Khayaban-e-Seher, Karachi.', 24.88489283, 67.06944733, 4, 2, 1, 1, '2019-08-04 14:51:41', '2019-08-04 14:51:41', NULL),
(15, 'Ginsoy', '24060.jpg', '53234.jpg', 'Ginsoy-Extreme Chinese, Captain Fareed Bukhari Shaheed Road, Karachi, Pakistan', '0334-3555606 (For corporate inquiries)', 'https://ginsoy.com/', 'FOR COMPLAINTS\r\n complaints@ginsoy.com', 'Extreme Chinese', 'Life’s good when you get to live the finest Chinese experience with top quality food served in a pleasant environment. At Ginsoy we promise you this and much more. As the “Extreme Chinese” name suggests, Ginsoy was created with an inspiration to bring unique, striking and flavorful Chinese cuisine to Pakistan.', 24.86538213, 67.05625188, 39, 2, 1, 1, '2019-08-04 14:55:40', '2019-08-04 14:55:40', NULL),
(16, 'Hardees', '5804.jpg', '72928.jpeg', 'Hardee\'s, Khayaban-e-Shahbaz, Karachi, Pakistan', 'GUEST RESPONSE LINE \r\n(877) 799-STAR (7827) \r\nMon. - Fri. \r\n5:00 a.m. - 11:00 p.m. Central', 'https://www.hardees.com/', 'GUEST RESPONSE LINE \r\n(877) 799-STAR (7827) \r\nMon. - Fri. \r\n5:00 a.m. - 11:00 p.m. Central', 'Tastes like America', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting', 24.79581428, 67.04972753, 40, 2, 1, 1, '2019-08-04 14:58:17', '2019-08-04 14:58:17', NULL),
(17, 'Hobnob', '57549.jpg', '13832.jpg', 'Hobnob Bakery Khadda Market, Karachi City, Karachi, Pakistan', 'Call & Order Now Karachi\r\n021-111-462-662\r\nDelivery timings (9:45 am to 10:45 pm', 'https://www.hobnob.pk/', 'info@hobnob.pk', 'Tastes like America', 'Established in 1998, Hobnob revolutionized the concept of the bakery chain in Karachi by introducing a culture of innovation in product development and providing easy access with branches in every neighborhood across the city. Over the last 20 years we’ve expanded to become the largest bakery retail network in the city and we’re not done yet – in fact, we’re growing every day!', 24.81437488, 67.05270898, 4, 2, 1, 1, '2019-08-04 15:01:17', '2019-08-04 15:01:17', NULL),
(18, 'KFC', '93022.jpg', '57412.png', 'kfc near Clifton Beach, Pakistan', 'KFC Regional Office\r\n27-A, Ali Block,\r\nBarkat Market, New Garden Town, \r\nLahore, Pakistan.\r\nPh#: 0425884570', 'https://www.kfcpakistan.com/', NULL, 'It\'s finger licking good', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting', 24.82814923, 67.04854213, 39, 2, 1, 1, '2019-08-04 15:09:00', '2019-08-04 15:09:00', NULL),
(19, 'Maha Ali Bintory Make up Artist', '13754.jpg', '17903.jpg', 'Maha Ali Bintory, Lane 5, Karachi, Pakistan', '0320 2000127', 'https://deskgram.net/maha.ali.bintory', NULL, 'Best makeup artiist in K-Town', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting', 24.80288098, 67.07475678, 40, 10, 1, 1, '2019-08-04 15:13:25', '2019-08-04 15:13:25', NULL),
(20, 'Pengs Saloon and Spa', '92592.jpg', '50297.png', 'Peng\'s Salon Bukhari Commercial, Karachi, Pakistan', 'Peng\'s DHA 021 - 35890568\r\nPeng\'s Clifton 021 - 35838588\r\nPeng’s Bukhari 021 - 35343505\r\nPeng’s MACHS 021 - 34390011', 'https://www.pengs.com.pk/', NULL, 'K-Town specialist', 'Pick one service from each category and make your own customized deal of 3 services for just Rs 7,500/-\r\n\r\nThis deal is valid at all our branches till 31st July 2019.\r\n\r\nCall us to book an appointment now!\r\n\r\nPeng\'s DHA 021 - 35890568\r\nPeng\'s Clifton 021 - 35838588\r\nPeng’s Bukhari 021 - 35343505\r\nPeng’s MACHS 021 - 34390011', 24.79454678, 67.06943778, 4, 10, 1, 1, '2019-08-04 15:16:43', '2019-08-04 15:16:43', NULL),
(21, 'Habitt', '64033.jpg', '58219.jpg', 'Habitt, Shahrah-e-Faisal Service Road North, Karachi, Pakistan', '(021) 111-422-488', 'https://www.habitt.com/', 'info@habitt.com', 'A one-stop complete home solution', 'From our home to yours, we provide a complete home solution. Dating back to 2001 when “Habitt – The complete home store” revolutionized the industry of home and interior décor in Pakistan, we have come a long way since and are just getting started. Our time and effort in wisely selecting high quality merchandise locally and from across the globe to be available for the public of Pakistan ensures us the gratification of true customer loyalty. We strive to serve our customers with cost-effective, quality products and customer service that outshines industry standards.\r\n\r\nFormed with the purpose of bringing together a complete home store for the people of Pakistan, Habitt is truly a one stop solution for all home needs promising superior quality and value for money. We also ensure our staff provides the utmost customer service experience so that you are delighted and always welcomed to be back. We strive on not just building a customer data base, but to build customer loyalty. After all, having a family of thousands of customers we are proud to see the number constantly increasing at a positive rate.', 24.86705888, 67.07868118, 39, 8, 1, 1, '2019-08-04 15:21:04', '2019-08-04 15:21:04', NULL),
(22, 'Index Furniture', '58850.jpeg', '98538.jpg', 'Index Furniture, Karachi, Pakistan', 'Index Pakistan (Pvt.) Ltd. Mansoor Tower, G5/5 block 8 Clifton \r\nKarachi - PK \r\nTel: 02135374078', 'https://www.indexfurniture.com.pk/', 'Email: eorder@indexfurniture.com.pk', 'With a commitment to delivering high quality furniture and home accessories', 'Index Furniture is a Thai Brand that has been in operation for over 30 years. Index Furniture delivers a wide range of high-quality furniture and home accessory items for all forms of modern life.This brand has reached global and national acceptance of the Furniture Group Index and has received the Superbrands “WINNER” Thailand Brand Award in 2005, the Outstanding Exporter Award in 2006, and the Prime Minister’s Export Award for Outstanding Exportin 2008. \r\n\r\nThis is in recognition of a solid guarantee of outstanding product quality, and continuous efforts to present design and functionality of furniture in new forms.The brand is a world leader in world-class designs. We obtained sole distribution rights for Pakistan and introduced our founding showroom in Karachi, 2006. Over the course of a decade, we’ve expanded our presence nationwide into Islamabad (2014), Rawalpindi (2015) and Lahore (2016). \r\n\r\nWith a commitment to delivering high quality furniture and home accessories, IndexFurniture answers all modern lifestyle’s with function and designing all categories of living.', 24.83262598, 67.03574368, 40, 8, 1, 1, '2019-08-04 15:24:17', '2019-08-04 15:24:17', NULL),
(23, 'Hashmani Eye Hospital', '69357.jpg', '84412.jpg', 'Hashmanis Hospital, Khaliq-uz-Zaman Road, Karachi, Pakistan', 'Tel # +9221 32781410 - 11, +9221 32780335, \r\n+9221 32781124, +9221 37791152, +9221 37791153 \r\nFax # +9221 32787115', 'http://www.hashmanis.com.pk/', NULL, 'Tastes like America', 'Hashmanis Hospital - the name that has stood for excellence in eye care since decades, has moved to a new, state-of-the-art facility. Our new home is one of the most advanced eye hospitals ever constructed in Karachi', 24.83088358, 67.04208903, 4, 7, 1, 1, '2019-08-04 15:28:17', '2019-08-04 15:28:17', NULL),
(24, 'Aga Khan University Hospital', '54799.jpg', '57161.jpg', 'Aga Khan University Hospital, Karachi, Pakistan', 'Aga Khan University Hospital, Karachi\r\nStadium Road, P.O. Box 3500\r\nKarac​​​hi 74800, Pakistan\r\nTel: +92 21 111-911-911\r\nFax: +92 21 3493 4294, 3493 2095', 'https://hospitals.aku.edu/Pages/default.aspx', 'Email: ​akuh.information​@aku.edu​', 'lorem ipsum', 'Aga Khan University Hospitals in Karachi, Pakistan and Nairobi, Kenya are private, not-for-profit institutions providing high quality health care. The Main Hospitals serve as the principal sites for clinical training for the University\'s Medical Colleges and Schools of Nursing and Midwifery in Pakistan and East Africa', 24.89696090, 67.08161550, 39, 7, 1, 1, '2019-08-04 15:30:00', '2019-08-04 15:30:00', NULL),
(25, 'Anees Hussain Aptitude', '91147.jpg', '20669.jpg', 'Anees Hussain, Karachi, Pakistan', '1500s', 'http://www.aneeshussain.com/', NULL, 'lorem ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting', 24.91845808, 67.09848018, 40, 6, 1, 1, '2019-08-04 15:33:01', '2019-08-04 15:33:01', NULL),
(26, 'Pakistan International Airline', '71385.jpg', '64912.jpg', 'pakistan international airlines', '(021) 111 786 786', 'https://www.limelight.pk/', NULL, 'Fashion World', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting', 24.91823648, 67.16138463, 4, 4, 1, 1, '2019-08-04 15:36:47', '2019-08-04 15:36:47', NULL),
(27, 'Batoota.pk', '79997.jpg', '87680.jpg', 'Batoota Games, 24th Main Road, R.K Colony, Manjunath Colony, 2nd Phase, Phase III JP Nagar, Bengaluru, Karnataka, India', '090078601', 'https://www.gulahmedshop.com/', NULL, 'Fashion World', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting', 12.91487038, 77.58733328, 39, 4, 1, 1, '2019-08-04 15:38:00', '2019-08-04 15:38:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `store_rating`
--

CREATE TABLE `store_rating` (
  `id` int(10) UNSIGNED NOT NULL,
  `rating` float NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `store_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `store_rating`
--

INSERT INTO `store_rating` (`id`, `rating`, `user_id`, `store_id`, `created_at`, `updated_at`) VALUES
(1, 4.3, 5, 5, NULL, NULL),
(2, 5, 4, 6, NULL, NULL),
(3, 5, 6, 7, NULL, NULL),
(4, 2.5, 7, 8, NULL, NULL),
(5, 4, 5, 1, NULL, NULL),
(6, 5, 4, 2, NULL, NULL),
(7, 5, 6, 3, NULL, NULL),
(8, 2, 7, 4, NULL, NULL),
(9, 4, 5, 9, NULL, NULL),
(10, 5, 4, 10, NULL, NULL),
(11, 5, 6, 11, NULL, NULL),
(12, 2, 7, 12, NULL, NULL),
(13, 4, 5, 13, NULL, NULL),
(14, 5, 4, 14, NULL, NULL),
(15, 5, 6, 15, NULL, NULL),
(16, 2, 7, 16, NULL, NULL),
(17, 5, 4, 17, NULL, NULL),
(18, 5, 6, 18, NULL, NULL),
(19, 2, 7, 19, NULL, NULL),
(20, 4, 5, 20, NULL, NULL),
(21, 5, 4, 21, NULL, NULL),
(22, 5, 6, 22, NULL, NULL),
(23, 2, 7, 23, NULL, NULL),
(24, 4, 5, 24, NULL, NULL),
(25, 5, 4, 25, NULL, NULL),
(26, 5, 6, 26, NULL, NULL),
(27, 2, 7, 27, NULL, NULL),
(28, 4.7, 8, 5, NULL, NULL),
(29, 3, 9, 6, NULL, NULL),
(30, 5, 10, 7, NULL, NULL),
(31, 2.5, 11, 8, NULL, NULL),
(32, 4, 12, 1, NULL, NULL),
(33, 5, 13, 2, NULL, NULL),
(34, 5, 14, 3, NULL, NULL),
(35, 2, 15, 4, NULL, NULL),
(36, 4, 16, 9, NULL, NULL),
(37, 3.7, 17, 10, NULL, NULL),
(38, 5, 18, 11, NULL, NULL),
(39, 2.75, 19, 12, NULL, NULL),
(40, 4.25, 19, 13, NULL, NULL),
(41, 5, 18, 14, NULL, NULL),
(42, 4, 17, 15, NULL, NULL),
(43, 3, 16, 16, NULL, NULL),
(44, 4, 15, 17, NULL, NULL),
(45, 3, 14, 18, NULL, NULL),
(46, 4.5, 13, 19, NULL, NULL),
(47, 2.8, 12, 20, NULL, NULL),
(48, 1.5, 11, 21, NULL, NULL),
(49, 3.2, 10, 22, NULL, NULL),
(50, 3.5, 9, 23, NULL, NULL),
(51, 5, 8, 24, NULL, NULL),
(52, 1.9, 21, 25, NULL, NULL),
(53, 4, 22, 26, NULL, NULL),
(54, 2.75, 23, 27, NULL, NULL);

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
(1, 'John', 'Dow', 24, 'What is Lorem Ipsum?', 'sarahassan.art@gmail.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', NULL, 1, '2019-08-04 19:30:46', '2019-08-04 19:30:46', NULL),
(2, 'John', 'Doe', 2, 'What is Lorem Ipsum?', 'sarahassan1234@gmail.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', NULL, 1, '2019-08-04 19:34:28', '2019-08-04 19:34:28', NULL),
(3, 'John', 'Doe', 1, 'What is Lorem Ipsum?', 'sarahassan1234@gmail.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', NULL, 1, '2019-08-04 19:34:41', '2019-08-04 19:34:41', NULL),
(4, 'John', 'Doe', 3, 'What is Lorem Ipsum?', 'sarahassan1234@gmail.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', NULL, 1, '2019-08-04 19:34:47', '2019-08-04 19:34:47', NULL),
(5, 'John', 'Doe', 4, 'What is Lorem Ipsum?', 'sarahassan1234@gmail.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', NULL, 1, '2019-08-04 19:34:52', '2019-08-04 19:34:52', NULL),
(6, 'Sunaina', 'Asif', 1, 'What is Lorem Ipsum?', 'sarahassan1234@gmail.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', NULL, 1, '2019-08-04 19:36:09', '2019-08-04 19:36:09', NULL),
(7, 'Sunaina', 'Asif', 2, 'What is Lorem Ipsum?', 'sarahassan1234@gmail.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', NULL, 1, '2019-08-04 19:36:14', '2019-08-04 19:36:14', NULL),
(8, 'Sunaina', 'Asif', 3, 'What is Lorem Ipsum?', 'sarahassan1234@gmail.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', NULL, 1, '2019-08-04 19:36:18', '2019-08-04 19:36:18', NULL),
(9, 'Sunaina', 'Asif', 4, 'What is Lorem Ipsum?', 'sarahassan1234@gmail.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', NULL, 1, '2019-08-04 19:36:28', '2019-08-04 19:36:28', NULL);

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
(1, 'Fast Food', NULL, '2019-08-04 19:39:28', '2019-08-04 19:39:28', NULL),
(2, 'Chinese Cuisine', NULL, '2019-08-04 19:39:40', '2019-08-04 19:39:40', NULL),
(3, 'Unstitched Collection', NULL, '2019-08-04 19:39:50', '2019-08-04 19:39:50', NULL),
(4, 'Pret Wear', NULL, '2019-08-04 19:39:59', '2019-08-04 19:39:59', NULL),
(5, 'Eid Collection', NULL, '2019-08-04 19:40:05', '2019-08-04 19:40:05', NULL),
(6, 'Black friday sale', NULL, '2019-08-04 19:40:10', '2019-08-04 19:40:10', NULL);

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
(1, 'sarahasan224@gmail.com', '$2y$10$AGlcLD1fNxbYFups1EL9..JsJHm7IRfVytCfmzbmab5v.PdmqKUj2', 'Sara Hasan', 1, '03452099689', '41864.jpg', NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6Ly9tYXJrYXoudGVzdC91c2VyL3NpZ25pbndlYiIsImlhdCI6MTU2NDk0NTcxNiwiZXhwIjoxNTY0OTQ5MzE2LCJuYmYiOjE1NjQ5NDU3MTYsImp0aSI6Im1mYk5FRnNwOGR5d2g3NEwifQ.JnrmNiMyJOkGIloEE8wzBpSSUM0P8fH8W_n-e5nx4Ek', '2019-06-29 12:20:48', '2019-08-04 19:08:36', NULL),
(4, 'usmaan.siddiqui@gmail.com', '$2y$10$zDcSnc8frOHhc8pEoRwLxOQodz1kDW1NNsc7yu7jKYeXv4c6d3v22', 'Usman Siddiqui', 2, '900770', '21385.jpg', NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjQsImlzcyI6Imh0dHA6Ly9tYXJrYXoudGVzdC91c2VyL3NpZ25pbndlYiIsImlhdCI6MTU2NDkyMTY0NywiZXhwIjoxNTY0OTI1MjQ3LCJuYmYiOjE1NjQ5MjE2NDcsImp0aSI6IlF3RE9DdzVXZ0NYSG16RkUifQ.XVCxGKGA7EnXsl6hVZsMl4eXnitYs64SlEyGbPP_6CA', '2019-06-29 12:34:06', '2019-08-04 12:27:27', NULL),
(5, 'sara@clickysoft.com', '$2y$10$Z74xXYL.IN3eRNW9DrPxV.YxEjCSv01A1pwuHWQx6CWHwb2Xs2.z.', 'Sara Lawrence', 4, '090078601', 'user_default.png', NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjUsImlzcyI6Imh0dHA6Ly9tYXJrYXoudGVzdC9hcGkvdXNlci9zaWduaW4iLCJpYXQiOjE1NjI0OTEzMTEsImV4cCI6MTU2MjQ5NDkxMSwibmJmIjoxNTYyNDkxMzExLCJqdGkiOiJCeWlvSFhKUWFxTmw5aUZrIn0.Wlw5Q9NB3XvUsOkQtpriwyxp01QMFp1cQMFk1701-vM', '2019-07-07 02:50:06', '2019-07-07 04:21:51', NULL),
(6, 'hamza@gmail.com', '$2y$10$xbx.zq1LQKWc7nHH7DYSyuxtmXMNypsXH5EwUWFGxMeYvqnmcJ/iC', 'Hamza Khan', 4, '03009263363', '20243.jpg', NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjYsImlzcyI6Imh0dHA6Ly9tYXJrYXoudGVzdC9hZGQtdXNlciIsImlhdCI6MTU2MjUyMjU0MSwiZXhwIjoxNTYyNTI2MTQxLCJuYmYiOjE1NjI1MjI1NDEsImp0aSI6InBJV25WQ2ppVUlJV0Vwa3gifQ.F7-RWmjWOuqX6hJ_5Xa-akQCZ8Ys9qip59a2Y94U8Qg', '2019-07-07 13:02:21', '2019-07-07 13:02:21', NULL),
(7, 'seerat@gmail.com', '$2y$10$oY2n3HSIjY8GbzwefuQqyusXy.duB91Qp.bKVCc92OOYM17OIvyKm', 'Seerat Khan', 4, '03300177266', '93100.jpg', NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjcsImlzcyI6Imh0dHA6Ly9tYXJrYXoudGVzdC9hZGQtdXNlciIsImlhdCI6MTU2MjUyMjYxMywiZXhwIjoxNTYyNTI2MjEzLCJuYmYiOjE1NjI1MjI2MTMsImp0aSI6IkZpeXkyZVcxaUoxOXdqejEifQ.BfpEU1kZA6i1GOlQPoWARvTTknUuRxpHXizKsHP9gzU', '2019-07-07 13:03:33', '2019-08-03 19:28:31', NULL),
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
(24, 'tariq@gmail.com', '$2y$10$pOzqAqNwbhZroWrFO9bJVez3gR42GVi1uYkGdJJ/goy9zbX00i2JK', 'Tariq Jamal', 4, '03356644774', '87644.jpg', NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjI0LCJpc3MiOiJodHRwOi8vbWFya2F6LnRlc3QvYWRkLXVzZXIiLCJpYXQiOjE1NjI1MjMzMDAsImV4cCI6MTU2MjUyNjkwMCwibmJmIjoxNTYyNTIzMzAwLCJqdGkiOiJkRmpKN05Tb2kzUnV5ZEJTIn0.24O8Bdpu7oj06iVQXy9ODYGmEOqhJFVX9IMLivbokkk', '2019-07-07 13:15:00', '2019-08-04 11:15:30', NULL),
(25, 'komal@gmail.com', '$2y$10$tmqqgksvPgbFxfa6jud.SuHr9wJNPDNXS.J41RkCoaEaZmlrq8v1y', 'Komal Fatima', 4, '03356644774', '38172.jpg', NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjI1LCJpc3MiOiJodHRwOi8vbWFya2F6LnRlc3QvYWRkLXVzZXIiLCJpYXQiOjE1NjI1MjMzMzQsImV4cCI6MTU2MjUyNjkzNCwibmJmIjoxNTYyNTIzMzM0LCJqdGkiOiI0RTExU3FzRWpUaGNUVFpzIn0.VZyB8Otzy7mbMezSa59DINM9XcBlJ-K1JUHC5_p0lr4', '2019-07-07 13:15:34', '2019-07-07 13:15:34', NULL),
(26, 'yumna@gmail.com', '$2y$10$I5LcbnJDPvuvzICE75X6ZOklYJtRMRLqL.T1HNE6s3i/ImnaEhXEK', 'Yumna Zaidi', 4, '03356644774', '29888.jpg', NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjI2LCJpc3MiOiJodHRwOi8vbWFya2F6LnRlc3QvYWRkLXVzZXIiLCJpYXQiOjE1NjI1MjMzNzMsImV4cCI6MTU2MjUyNjk3MywibmJmIjoxNTYyNTIzMzczLCJqdGkiOiJRRjV6a3ZTU1RxT1dSbVo0In0.Bfg6KM8axyOBfYZ4PKDGSTEJbYsR2m8T5taKd1bJUhQ', '2019-07-07 13:16:12', '2019-07-07 13:16:13', NULL),
(27, 'kulsoom@gmail.com', '$2y$10$jRpuHg9bH2VMLgBKapsKqOQmTTG.wqOFS0xntncpd78xiVQN4Y716', 'Kulsoom Usmani', 4, '03356644774', '94783.jpg', NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjI3LCJpc3MiOiJodHRwOi8vbWFya2F6LnRlc3QvYWRkLXVzZXIiLCJpYXQiOjE1NjI1MjM0MDUsImV4cCI6MTU2MjUyNzAwNSwibmJmIjoxNTYyNTIzNDA1LCJqdGkiOiJUSG4yRkpJTXhITHB2U0ptIn0.kzwuTBTl6FJumF0dX8zfA8zIu_mdXN7KBhg9VVxafXU', '2019-07-07 13:16:45', '2019-07-07 13:16:45', NULL),
(29, 'talha@gmail.com', '$2y$10$3tc1V7t6xCEE0eUkkUtOhOhfviE.L1yFcMtKLGiwfU4s6Vh/OM5ui', 'Talha Nadeem', 4, '03356644774', '69935.jpg', NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjI5LCJpc3MiOiJodHRwOi8vbWFya2F6LnRlc3QvYWRkLXVzZXIiLCJpYXQiOjE1NjI1MjM0NzUsImV4cCI6MTU2MjUyNzA3NSwibmJmIjoxNTYyNTIzNDc1LCJqdGkiOiJyRnBTa1ZGM0NadEpkN255In0.mmxWtbE_HcURTCh-QH80ycwZ7P3AZC93uzaH0YAABYk', '2019-07-07 13:17:55', '2019-07-07 13:17:55', NULL),
(39, 'kashafnazir24@gmail.com', '$2y$10$/dMVfW1rTdGqgrxCDZy9c.68oW9CiSpUHaxxNbEYn3Lu/N/1wh2Mi', 'Kashaf Nazir', 2, '03352916717', '53634.png', NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjM5LCJpc3MiOiJodHRwOi8vbWFya2F6LnRlc3QvdXNlci9zaWduaW53ZWIiLCJpYXQiOjE1NjQ5MjE4NDQsImV4cCI6MTU2NDkyNTQ0NCwibmJmIjoxNTY0OTIxODQ0LCJqdGkiOiJhZ3NtUFEyd0Q5UDFQdEFxIn0.hqgFopBtq16PfmsqmLkDVb62PxgBDiB-FEVzySshYyE', '2019-07-07 13:43:44', '2019-08-04 12:30:44', NULL),
(40, 'rukhsanasaud@gmail.com', '$2y$10$di.GisZHvAV4K/ukdxNsPuoc.7/R1aIrFfuyLWhrqzRERR2isFwI.', 'Rukhsana Saud', 2, '090078601', '10179.jpg', NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjQwLCJpc3MiOiJodHRwOi8vbWFya2F6LnRlc3QvYWRkLXVzZXIiLCJpYXQiOjE1NjQ4NDc2NjcsImV4cCI6MTU2NDg1MTI2NywibmJmIjoxNTY0ODQ3NjY3LCJqdGkiOiJ5NzJYSWlZYThaZThaTzlnIn0.NcPEpTv0ByYVmlzhlJnAScI-pu_EmGGyOLKCmlcuySY', '2019-08-03 10:54:27', '2019-08-03 10:54:27', NULL),
(41, 'sarahasan24@gmail.com', '$2y$10$rRB/QZP1cgeP7.1zdVqigOQQCGdl106y0WCNHkkiXcC6QCsnXX.MO', 'Aniqa Amir', 4, '090078601', '20662.png', NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjQxLCJpc3MiOiJodHRwOi8vbWFya2F6LnRlc3QvYWRkLXVzZXIiLCJpYXQiOjE1NjQ5MDQ5MjAsImV4cCI6MTU2NDkwODUyMCwibmJmIjoxNTY0OTA0OTIwLCJqdGkiOiJoU1d0aVVYb1M1elQ3STBzIn0.oZXORyVdiK7CeMSuisHNaAwPoIBwwfzRT3vizU_CH6w', '2019-08-04 07:48:40', '2019-08-04 07:49:08', NULL);

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
  ADD KEY `user_user_id_foreign` (`user_id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `device_tokens`
--
ALTER TABLE `device_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_logs`
--
ALTER TABLE `event_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `followers`
--
ALTER TABLE `followers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `media_images`
--
ALTER TABLE `media_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `promotion_comments`
--
ALTER TABLE `promotion_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `promotion_media`
--
ALTER TABLE `promotion_media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `promotion_rating`
--
ALTER TABLE `promotion_rating`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `social_stores`
--
ALTER TABLE `social_stores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `store_rating`
--
ALTER TABLE `store_rating`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

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
