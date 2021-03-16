-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 16, 2021 at 09:06 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cash_register`
--

-- --------------------------------------------------------

--
-- Table structure for table `current_states`
--

DROP TABLE IF EXISTS `current_states`;
CREATE TABLE IF NOT EXISTS `current_states` (
  `current_state_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `drink_id` bigint(20) UNSIGNED NOT NULL,
  `transferred_quantity` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `purchase_quantity` decimal(8,2) NOT NULL,
  PRIMARY KEY (`current_state_id`),
  KEY `current_states_id_drink_foreign` (`drink_id`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `current_states`
--

INSERT INTO `current_states` (`current_state_id`, `drink_id`, `transferred_quantity`, `created_at`, `updated_at`, `purchase_quantity`) VALUES
(11, 3, '34.00', '2021-02-24 14:33:03', '2021-02-24 14:33:03', '0.00'),
(10, 2, '1.00', '2021-02-24 14:32:55', '2021-02-24 14:32:55', '0.00'),
(13, 1, '0.25', '2021-02-24 16:38:22', '2021-02-24 16:38:22', '0.00'),
(14, 4, '8.30', '2021-02-24 17:29:50', '2021-02-24 17:29:50', '0.10'),
(15, 5, '0.55', '2021-02-24 17:30:10', '2021-02-24 17:30:10', '0.00'),
(16, 6, '1.10', '2021-02-24 17:30:25', '2021-02-24 17:30:25', '0.00'),
(17, 7, '1.10', '2021-02-24 17:30:40', '2021-02-24 17:30:40', '0.00'),
(18, 8, '0.75', '2021-02-24 17:30:50', '2021-02-24 17:30:50', '0.00'),
(19, 9, '0.85', '2021-02-24 17:31:02', '2021-02-24 17:31:02', '0.00'),
(20, 11, '1.80', '2021-02-24 17:31:17', '2021-02-24 17:31:17', '0.00'),
(21, 60, '62.00', '2021-02-24 17:32:06', '2021-02-24 17:32:06', '0.00'),
(22, 15, '25.20', '2021-02-24 17:32:29', '2021-02-24 17:32:29', '0.00'),
(23, 17, '52.00', '2021-02-24 17:32:39', '2021-02-24 17:32:39', '0.00'),
(24, 19, '20.00', '2021-02-24 17:32:52', '2021-02-24 17:32:52', '0.00'),
(25, 20, '23.00', '2021-02-24 17:33:05', '2021-02-24 17:33:05', '0.00'),
(26, 21, '16.00', '2021-02-24 17:33:16', '2021-02-24 17:33:16', '0.00'),
(27, 22, '6356.00', '2021-02-24 17:33:39', '2021-02-24 17:33:39', '0.00'),
(28, 23, '25.00', '2021-02-24 17:33:51', '2021-02-24 17:33:51', '0.00'),
(29, 24, '66.00', '2021-02-24 17:34:00', '2021-02-24 17:34:00', '0.00'),
(30, 25, '10.00', '2021-02-24 17:34:11', '2021-02-24 17:34:11', '0.00'),
(31, 26, '0.53', '2021-02-24 17:34:22', '2021-02-24 17:34:22', '0.00'),
(32, 27, '1.04', '2021-02-24 17:34:36', '2021-02-24 17:34:36', '0.00'),
(33, 28, '0.95', '2021-02-24 17:34:46', '2021-02-24 17:34:46', '0.00'),
(34, 29, '0.50', '2021-02-24 17:34:58', '2021-02-24 17:34:58', '0.00'),
(35, 31, '0.24', '2021-02-24 17:35:18', '2021-02-24 17:35:18', '0.00'),
(36, 32, '0.60', '2021-02-24 17:35:28', '2021-02-24 17:35:28', '0.00'),
(37, 33, '0.40', '2021-02-24 17:35:40', '2021-02-24 17:35:40', '0.00'),
(38, 34, '0.60', '2021-02-24 17:35:51', '2021-02-24 17:35:51', '0.00'),
(39, 35, '0.50', '2021-02-24 17:36:02', '2021-02-24 17:36:02', '0.00'),
(40, 37, '4.00', '2021-02-24 17:36:13', '2021-02-24 17:36:13', '0.00'),
(41, 61, '44.00', '2021-02-24 17:38:27', '2021-02-24 17:38:27', '0.00'),
(42, 40, '23.00', '2021-02-24 17:38:38', '2021-02-24 17:38:38', '0.00'),
(43, 41, '10.00', '2021-02-24 17:39:11', '2021-02-24 17:39:11', '0.00'),
(44, 42, '12.00', '2021-02-24 17:39:27', '2021-02-24 17:39:27', '0.00'),
(45, 43, '56.00', '2021-02-24 17:39:39', '2021-02-24 17:39:39', '0.00'),
(46, 44, '15.00', '2021-02-24 17:39:46', '2021-02-24 17:39:46', '0.00'),
(47, 46, '46.00', '2021-02-24 17:40:05', '2021-02-24 17:40:05', '0.00'),
(48, 48, '9.00', '2021-02-24 17:40:29', '2021-02-24 17:40:29', '0.00'),
(49, 52, '2.00', '2021-02-24 17:40:44', '2021-02-24 17:40:44', '0.00'),
(50, 53, '12.00', '2021-02-24 17:40:56', '2021-02-24 17:40:56', '0.00'),
(51, 54, '55.00', '2021-02-24 17:41:07', '2021-02-24 17:41:07', '0.00'),
(52, 55, '39.00', '2021-02-24 17:41:23', '2021-02-24 17:41:23', '0.00'),
(53, 56, '23.00', '2021-02-24 17:41:39', '2021-02-24 17:41:39', '0.00'),
(54, 57, '4.00', '2021-02-24 17:42:15', '2021-02-24 17:42:15', '0.00'),
(55, 58, '18.00', '2021-02-24 17:42:29', '2021-02-24 17:42:29', '0.00'),
(56, 59, '8.00', '2021-02-24 17:42:38', '2021-02-24 17:42:38', '0.00'),
(58, 65, '1.80', '2021-03-10 17:09:30', '2021-03-10 17:09:30', '0.00'),
(59, 64, '1.50', '2021-03-16 07:26:02', '2021-03-16 07:26:02', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `drinks`
--

DROP TABLE IF EXISTS `drinks`;
CREATE TABLE IF NOT EXISTS `drinks` (
  `drink_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `measure_id` bigint(20) UNSIGNED NOT NULL,
  `drink_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manufacturer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_price` decimal(8,2) NOT NULL,
  `sold_price` decimal(8,2) NOT NULL,
  `drink_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'flash-royal.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`drink_id`),
  KEY `drinks_id_measure_foreign` (`measure_id`)
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `drinks`
--

INSERT INTO `drinks` (`drink_id`, `measure_id`, `drink_name`, `manufacturer`, `purchase_price`, `sold_price`, `drink_image`, `created_at`, `updated_at`) VALUES
(6, 3, 'Badel Brendi', 'Badel', '2200.00', '110.00', '1615290779.png', '2021-02-24 16:53:02', '2021-03-09 10:52:59'),
(4, 4, 'Vino', 'Vinarija Čoka', '600.00', '60.00', '1615291663.png', '2021-02-24 16:50:55', '2021-03-09 11:07:43'),
(5, 3, 'Vinjak', 'Rubin', '2200.00', '110.00', '1615290807.png', '2021-02-24 16:51:46', '2021-03-09 10:53:27'),
(7, 3, 'Vodka', 'Smirnoff', '2200.00', '110.00', 'flash-royal.jpg ', '2021-02-24 16:54:25', '2021-02-24 16:54:25'),
(8, 3, 'Rakije', 'Domaće rakije', '2200.00', '0.00', 'flash-royal.jpg ', '2021-02-24 16:55:10', '2021-02-24 16:55:10'),
(9, 3, 'Pelinkovac Gorki ', 'Gorki List', '2200.00', '0.00', 'flash-royal.jpg ', '2021-02-24 16:57:06', '2021-02-24 16:57:06'),
(10, 3, 'Vermut', 'Rubin', '2200.00', '0.00', 'flash-royal.jpg ', '2021-02-24 16:57:43', '2021-02-24 16:57:43'),
(11, 3, 'Likeri', 'Razni Likeri', '140.00', '0.00', 'flash-royal.jpg ', '2021-02-24 16:58:06', '2021-02-24 16:58:06'),
(60, 6, 'Coca Cola, Fanta', 'Coca Cola', '0.00', '0.00', 'flash-royal.jpg ', '2021-02-24 17:31:51', '2021-02-24 17:31:51'),
(14, 4, 'Točeni Pepsi', 'Pepsi', '100.00', '0.00', 'flash-royal.jpg ', '2021-02-24 16:59:55', '2021-02-24 16:59:55'),
(15, 4, 'Soda', 'Soda', '100.00', '0.00', 'flash-royal.jpg ', '2021-02-24 17:00:47', '2021-02-24 17:00:47'),
(16, 3, 'Bailey\'s', 'Baileys', '0.00', '0.00', '1615291012.jpg', '2021-02-24 17:02:27', '2021-03-09 10:56:52'),
(17, 7, 'Jelen 0.5', 'Apatinska Pivara', '130.00', '130.00', '1615373984.png', '2021-02-24 17:03:00', '2021-03-10 09:59:44'),
(18, 6, 'Lav 0.33', 'Lav', '150.00', '0.00', 'flash-royal.jpg ', '2021-02-24 17:03:40', '2021-02-24 17:03:40'),
(19, 7, 'Lav 0.5', 'Lav', '130.00', '130.00', '1615398242.png', '2021-02-24 17:03:56', '2021-03-10 16:44:02'),
(20, 6, 'Jelen 0.33', 'Apatinska Pivara', '150.00', '0.00', 'flash-royal.jpg ', '2021-02-24 17:04:18', '2021-02-24 17:04:18'),
(21, 1, 'Domaća Kafa', 'Amigo Kafa', '90.00', '0.00', 'flash-royal.jpg ', '2021-02-24 17:05:40', '2021-02-24 17:05:40'),
(22, 7, 'Espresso', 'Doncafe', '110.00', '0.00', 'flash-royal.jpg ', '2021-02-24 17:07:04', '2021-02-24 17:07:04'),
(23, 7, 'Nes', 'Nescafe', '110.00', '0.00', 'flash-royal.jpg ', '2021-02-24 17:08:04', '2021-02-24 17:08:04'),
(24, 7, 'Čaj', 'Razni Čajevi', '100.00', '0.00', 'flash-royal.jpg ', '2021-02-24 17:08:27', '2021-02-24 17:08:27'),
(25, 7, 'Topla Čokolada', 'Dr.Oetker', '140.00', '0.00', 'flash-royal.jpg ', '2021-02-24 17:09:21', '2021-02-24 17:09:21'),
(26, 3, 'Viljamovka', 'Takovo', '5000.00', '0.00', 'flash-royal.jpg ', '2021-02-24 17:10:19', '2021-02-24 17:10:19'),
(27, 3, 'Whisky', 'Jack Daniels,Ballantines', '5000.00', '0.00', 'flash-royal.jpg ', '2021-02-24 17:12:28', '2021-02-24 17:12:28'),
(28, 3, 'Jagermeister', 'jagermeister', '5000.00', '0.00', 'flash-royal.jpg ', '2021-02-24 17:12:58', '2021-02-24 17:12:58'),
(29, 3, 'Tequila', 'Agavita', '5000.00', '0.00', 'flash-royal.jpg ', '2021-02-24 17:13:48', '2021-02-24 17:13:48'),
(30, 4, 'Sangrija', 'Vinarija Čoka', '0.00', '0.00', 'flash-royal.jpg ', '2021-02-24 17:14:33', '2021-02-24 17:14:33'),
(31, 3, 'Smirnof', 'Smirnof', '5000.00', '0.00', 'flash-royal.jpg ', '2021-02-24 17:15:30', '2021-02-24 17:15:30'),
(32, 3, 'Puschkin', 'Puschkin', '3000.00', '0.00', 'flash-royal.jpg ', '2021-02-24 17:15:57', '2021-02-24 17:15:57'),
(33, 3, 'Keglevich', 'Keglevich', '3000.00', '0.00', 'flash-royal.jpg ', '2021-02-24 17:16:26', '2021-02-24 17:16:26'),
(34, 3, 'Absinthe', 'Absinthe', '3000.00', '0.00', 'flash-royal.jpg ', '2021-02-24 17:16:55', '2021-02-24 17:16:55'),
(35, 3, 'Jack Daniels', 'Jack Daniels', '6000.00', '0.00', 'flash-royal.jpg ', '2021-02-24 17:17:25', '2021-02-24 17:17:25'),
(36, 3, 'Metaxa', 'Metaxa', '0.00', '0.00', 'flash-royal.jpg ', '2021-02-24 17:17:39', '2021-02-24 17:17:39'),
(37, 1, 'Fresh Pivo', 'Apatinska Pivara', '0.00', '0.00', 'flash-royal.jpg ', '2021-02-24 17:18:12', '2021-02-24 17:18:12'),
(61, 6, 'Golf, Next', 'Sokovi', '0.00', '0.00', 'flash-royal.jpg ', '2021-02-24 17:37:40', '2021-02-24 17:37:40'),
(40, 6, 'Guarana', 'Guarana', '140.00', '0.00', 'flash-royal.jpg ', '2021-02-24 17:19:15', '2021-02-24 17:19:15'),
(41, 6, 'Red Bull', 'Red Bull', '0.00', '0.00', 'flash-royal.jpg ', '2021-02-24 17:19:28', '2021-02-24 17:19:28'),
(42, 5, 'Cockta, Limona', 'Sokovi', '0.00', '0.00', 'flash-royal.jpg ', '2021-02-24 17:20:13', '2021-02-24 17:20:13'),
(43, 5, 'Knjaz, Rosa', 'Vode', '0.00', '0.00', 'flash-royal.jpg ', '2021-02-24 17:20:34', '2021-02-24 17:20:34'),
(44, 6, 'Somersby', 'Somersby', '0.00', '0.00', 'flash-royal.jpg ', '2021-02-24 17:21:01', '2021-02-24 17:21:01'),
(45, 1, 'Točeni Staropramen', 'Staropramen', '0.00', '0.00', 'flash-royal.jpg ', '2021-02-24 17:21:27', '2021-02-24 17:21:27'),
(46, 6, 'Tuborg 0.33', 'Tuborg', '0.00', '0.00', 'flash-royal.jpg ', '2021-02-24 17:21:55', '2021-02-24 17:21:55'),
(47, 1, 'Staropramen 0.5', 'Staropramen', '0.00', '0.00', 'flash-royal.jpg ', '2021-02-24 17:22:26', '2021-02-24 17:22:26'),
(48, 1, 'Cedevita', 'Cedevita', '0.00', '0.00', 'flash-royal.jpg ', '2021-02-24 17:22:50', '2021-02-24 17:22:50'),
(49, 1, 'Točeni Tuborg', 'Tuborg', '0.00', '0.00', 'flash-royal.jpg ', '2021-02-24 17:23:14', '2021-02-24 17:23:14'),
(50, 3, 'Kurakao', 'Kurakao', '0.00', '0.00', 'flash-royal.jpg ', '2021-02-24 17:23:41', '2021-02-24 17:23:41'),
(51, 3, 'Phinlandia', 'Phinlandia', '0.00', '0.00', 'flash-royal.jpg ', '2021-02-24 17:24:10', '2021-02-24 17:24:10'),
(52, 1, 'Jelen Cool', 'Apatinska Pivara', '0.00', '0.00', 'flash-royal.jpg ', '2021-02-24 17:24:29', '2021-02-24 17:24:29'),
(53, 6, 'Corona', 'Corona', '0.00', '0.00', 'flash-royal.jpg ', '2021-02-24 17:24:49', '2021-02-24 17:24:49'),
(54, 1, 'Stella Artois', 'Stella Artois', '0.00', '0.00', 'flash-royal.jpg ', '2021-02-24 17:25:13', '2021-02-24 17:25:13'),
(55, 6, 'Crni Đorđe', 'Crni Đorđe', '0.00', '0.00', 'flash-royal.jpg ', '2021-02-24 17:25:44', '2021-02-24 17:25:44'),
(56, 6, 'Kronenbourg', 'Kronenbourg', '0.00', '0.00', 'flash-royal.jpg ', '2021-02-24 17:26:39', '2021-02-24 17:26:39'),
(57, 6, 'Vinjak Cola', 'Rubin', '0.00', '0.00', 'flash-royal.jpg ', '2021-02-24 17:27:21', '2021-02-24 17:27:21'),
(58, 1, 'Zaječarsko', 'Zaječarsko', '0.00', '0.00', 'flash-royal.jpg ', '2021-02-24 17:28:18', '2021-02-24 17:28:18'),
(59, 6, 'Gin Tonic', 'Gin Tonic', '0.00', '0.00', 'flash-royal.jpg ', '2021-02-24 17:28:50', '2021-02-24 17:28:50'),
(64, 1, 'Test', 'TestTestTest', '50.00', '105.00', 'flash-royal.jpg ', '2021-03-02 17:59:26', '2021-03-02 17:59:26'),
(65, 1, 'TestTestTest', 'TestTestTest', '30.00', '56.00', 'flash-royal.jpg ', '2021-03-02 18:01:46', '2021-03-02 18:01:46');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `measures`
--

DROP TABLE IF EXISTS `measures`;
CREATE TABLE IF NOT EXISTS `measures` (
  `id_measure` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `measure` decimal(8,2) NOT NULL,
  `measure_per_bottle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_measure`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `measures`
--

INSERT INTO `measures` (`id_measure`, `name`, `measure`, `measure_per_bottle`, `created_at`, `updated_at`) VALUES
(1, '0.5L (flaša)', '0.50', 'kom', '2021-02-24 09:52:38', '2021-02-24 09:52:38'),
(3, '0.05L (čašica)', '0.05', '1/1', '2021-02-24 09:52:52', '2021-02-24 09:52:52'),
(5, '0.25 L (flaša)', '0.25', 'kom', '2021-02-24 16:48:25', '2021-02-24 16:48:25'),
(4, '0.2L (čaša)', '0.20', '1/1', '2021-02-24 14:12:55', '2021-02-24 14:12:55'),
(6, '0.33 L (flaša)', '0.33', 'kom', '2021-02-24 16:48:46', '2021-02-24 16:48:46'),
(7, '1 šolja (kafa, čaj)', '1.00', 'kom', '2021-02-24 17:05:16', '2021-02-24 17:05:16'),
(9, '0.1L', '0.10', 'kom', '2021-03-16 07:14:33', '2021-03-16 07:14:33');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_02_20_132656_create_drinks_table', 1),
(5, '2021_02_22_113444_create_measures_table', 1),
(6, '2021_02_22_113955_create_current_states_table', 1),
(7, '2021_02_22_114246_create_solds_table', 1),
(8, '2021_02_24_103716_remove_id_measure_from_current_states', 1),
(9, '2021_02_24_135419_add_quantiity_to_current_states', 2),
(10, '2021_02_24_163355_modifying_solds_table', 3),
(11, '2021_02_24_164236_modifying_quantity_type_current_states', 4),
(12, '2021_02_25_113358_create_prices_table', 5),
(13, '2021_02_25_114123_add_id_price_to_drinks_table', 5),
(14, '2021_02_25_171237_drop_prices_table', 5),
(15, '2021_02_25_171559_add_two_columns_to_drinks_table', 5),
(16, '2021_02_25_173039_drop_column_id_price_from_drinks_table', 5),
(17, '2021_02_26_181210_drop_id_drink_and_quantity_from_solds_table', 5),
(18, '2021_02_26_181628_add_id_current_state_to_solds_table', 5),
(19, '2021_02_28_111720_add_image_column_to_drinks_table', 5),
(20, '2021_02_28_112019_modifying_drink_image_column_type_drinks_table', 5),
(21, '2021_03_02_101053_add_id_user_column_to_solds_table', 5),
(22, '2021_03_03_112609_create_sales_table', 6),
(23, '2021_03_03_114257_drop_id_current_state_and_id_user_columns_from_solds_and_add_id_sale_to_solds', 7),
(24, '2021_03_06_143304_rename_quantity_column_and_add_purchase_quantity_drink_to_current_states_table', 8),
(25, '2021_03_06_173607_add_on_sale_column_to_sale_table', 9),
(26, '2021_03_08_112137_change_id_drink_to_drink_id_and_id_measure_to_measure_id_in_drinks_table', 10),
(27, '2021_03_08_120101_change_id_current_state_to_current_state_id_and_id_drink_to_drink_id_in_current_states_table', 11),
(28, '2021_03_08_123107_change_id_sale_to_sale_id_change_id_current_state_to_current_state_id_and_id_user_to_user_id_in_sales_table', 12),
(29, '2021_03_09_111443_add_name_column_to_measures_table', 13),
(33, '2021_03_09_114401_delete_measure_column_in_measures_table', 14),
(35, '2021_03_09_114546_add_measure_column_with_decimal_type_in_measures_table', 15),
(36, '2021_03_10_175745_add_default_value_to_drink_image_in_drinks_table', 16),
(37, '2021_03_12_094708_add_measure_per_bottle_column_in_measures_table', 17),
(39, '2021_03_15_152850_change_name_column_to_drink_name_in_drinks_table', 18);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
CREATE TABLE IF NOT EXISTS `sales` (
  `sale_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `current_state_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `on_sale` tinyint(1) NOT NULL,
  PRIMARY KEY (`sale_id`),
  KEY `sales_id_current_state_foreign` (`current_state_id`),
  KEY `sales_id_user_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=99 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sale_id`, `current_state_id`, `user_id`, `created_at`, `updated_at`, `on_sale`) VALUES
(1, 14, 1, '2021-03-09 11:07:49', '2021-03-09 11:07:49', 1),
(2, 14, 1, '2021-03-10 09:53:07', '2021-03-10 09:53:07', 1),
(4, 22, 1, '2021-03-10 09:56:54', '2021-03-10 09:56:54', 1),
(5, 22, 1, '2021-03-10 09:56:58', '2021-03-10 09:56:58', 1),
(6, 22, 1, '2021-03-10 09:56:59', '2021-03-10 09:56:59', 1),
(18, 23, 1, '2021-03-10 10:00:38', '2021-03-10 10:00:38', 1),
(17, 23, 1, '2021-03-10 10:00:37', '2021-03-10 10:00:37', 1),
(16, 23, 1, '2021-03-10 10:00:37', '2021-03-10 10:00:37', 1),
(15, 23, 1, '2021-03-10 10:00:36', '2021-03-10 10:00:36', 1),
(14, 23, 1, '2021-03-10 10:00:35', '2021-03-10 10:00:35', 1),
(21, 23, 1, '2021-03-10 10:02:37', '2021-03-10 10:02:37', 1),
(20, 23, 1, '2021-03-10 10:02:34', '2021-03-10 10:02:34', 1),
(22, 23, 1, '2021-03-10 10:02:38', '2021-03-10 10:02:38', 1),
(36, 15, 1, '2021-03-12 11:14:30', '2021-03-12 11:14:30', 1),
(38, 16, 1, '2021-03-12 11:15:28', '2021-03-12 11:15:28', 1),
(39, 16, 1, '2021-03-12 11:15:28', '2021-03-12 11:15:28', 1),
(37, 15, 1, '2021-03-12 11:14:43', '2021-03-12 11:14:43', 1),
(40, 16, 1, '2021-03-12 11:15:38', '2021-03-12 11:15:38', 1),
(41, 24, 1, '2021-03-12 11:21:55', '2021-03-12 11:21:55', 1),
(42, 24, 1, '2021-03-12 11:21:56', '2021-03-12 11:21:56', 1),
(48, 17, 1, '2021-03-12 11:33:20', '2021-03-12 11:33:20', 1),
(47, 17, 1, '2021-03-12 11:33:11', '2021-03-12 11:33:11', 1),
(46, 17, 1, '2021-03-12 11:33:00', '2021-03-12 11:33:00', 1),
(49, 17, 1, '2021-03-12 11:33:21', '2021-03-12 11:33:21', 1),
(50, 15, 1, '2021-03-15 13:59:07', '2021-03-15 13:59:07', 1),
(51, 16, 1, '2021-03-15 13:59:08', '2021-03-15 13:59:08', 1),
(52, 14, 1, '2021-03-15 13:59:20', '2021-03-15 13:59:20', 1),
(55, 14, 1, '2021-03-15 16:03:24', '2021-03-15 16:03:24', 1),
(56, 14, 1, '2021-03-15 16:24:34', '2021-03-15 16:24:34', 1),
(57, 15, 1, '2021-03-15 16:24:36', '2021-03-15 16:24:36', 1),
(58, 14, 1, '2021-03-15 16:44:47', '2021-03-15 16:44:47', 1),
(87, 14, 1, '2021-03-16 07:50:42', '2021-03-16 07:50:42', 1),
(86, 14, 1, '2021-03-16 07:50:42', '2021-03-16 07:50:42', 1),
(85, 14, 1, '2021-03-16 07:50:41', '2021-03-16 07:50:41', 1),
(84, 14, 1, '2021-03-16 07:50:33', '2021-03-16 07:50:33', 1),
(83, 14, 1, '2021-03-16 07:50:32', '2021-03-16 07:50:32', 1),
(82, 14, 1, '2021-03-16 07:50:13', '2021-03-16 07:50:13', 1),
(81, 14, 1, '2021-03-16 07:50:11', '2021-03-16 07:50:11', 1),
(80, 15, 1, '2021-03-16 07:47:59', '2021-03-16 07:47:59', 1),
(68, 15, 1, '2021-03-16 07:41:40', '2021-03-16 07:41:40', 1),
(78, 14, 1, '2021-03-16 07:45:05', '2021-03-16 07:45:05', 1),
(77, 16, 1, '2021-03-16 07:44:58', '2021-03-16 07:44:58', 1),
(75, 14, 1, '2021-03-16 07:44:51', '2021-03-16 07:44:51', 1),
(76, 15, 1, '2021-03-16 07:44:54', '2021-03-16 07:44:54', 1),
(89, 14, 1, '2021-03-16 07:51:37', '2021-03-16 07:51:37', 1),
(97, 14, 1, '2021-03-16 07:53:51', '2021-03-16 07:53:51', 1),
(96, 14, 1, '2021-03-16 07:53:50', '2021-03-16 07:53:50', 1);

-- --------------------------------------------------------

--
-- Table structure for table `solds`
--

DROP TABLE IF EXISTS `solds`;
CREATE TABLE IF NOT EXISTS `solds` (
  `id_sold` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_sale` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_sold`),
  KEY `solds_id_sale_foreign` (`id_sale`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `solds`
--

INSERT INTO `solds` (`id_sold`, `id_sale`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL),
(2, 2, NULL, NULL),
(3, 3, NULL, NULL),
(4, 4, NULL, NULL),
(5, 5, NULL, NULL),
(6, 6, NULL, NULL),
(7, 7, NULL, NULL),
(8, 8, NULL, NULL),
(9, 10, NULL, NULL),
(10, 11, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Daniel', 'iamsingler@gmail.com', NULL, '$2y$10$7r6UdvD2G738zDDS5GJqL.I4lkZm3jiuGEXmMF/IK5QIL/nwAreSO', NULL, '2021-02-24 09:52:05', '2021-02-24 09:52:05');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
