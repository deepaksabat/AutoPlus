-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2017 at 05:07 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `autoplus_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `vehicle_company_id` int(11) NOT NULL,
  `vehicle_modal_id` int(11) NOT NULL,
  `vehicle_types_id` int(11) NOT NULL,
  `washing_plan_id` int(11) NOT NULL,
  `status_id` int(11) DEFAULT NULL,
  `appointment_date` date NOT NULL,
  `vehicle_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_frame` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appx_hour` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `user_id`, `vehicle_company_id`, `vehicle_modal_id`, `vehicle_types_id`, `washing_plan_id`, `status_id`, `appointment_date`, `vehicle_no`, `time_frame`, `appx_hour`, `remark`, `created_at`, `updated_at`) VALUES
(2, 1, 2, 2, 2, 2, 2, '2017-10-31', 'asdkljas askld', 'afternoon', '2 hrs', 'new car', '2017-10-30 18:51:28', '2017-10-30 18:51:28'),
(3, 2, 1, 2, 1, 1, 3, '2017-10-31', 'asdksald askld', 'afternoon', '2hrs', 'askl djasdsssss', '2017-10-30 18:53:25', '2017-10-30 18:53:25'),
(5, 1, 1, 2, 2, 3, NULL, '1970-01-01', NULL, 'evening', NULL, NULL, '2017-10-30 19:36:44', '2017-10-30 19:36:44');

-- --------------------------------------------------------

--
-- Table structure for table `appointment_users`
--

CREATE TABLE `appointment_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `appointment_id` int(10) UNSIGNED NOT NULL,
  `discount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `advance` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method_id` int(11) DEFAULT NULL,
  `remark` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointment_users`
--

INSERT INTO `appointment_users` (`id`, `user_id`, `appointment_id`, `discount`, `advance`, `payment_method_id`, `remark`, `created_at`, `updated_at`) VALUES
(2, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 1, 5, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `dtl` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `img`, `user_id`, `date`, `dtl`, `created_at`, `updated_at`) VALUES
(1, 'Maecenas vestibulum mollis diamster egestas', '1507970936blog-01.jpg', 1, '2017-10-17', 'Lorem ipsum dolor sit amet consectetuer adipisci elit aenean commodo ligula eget dolor aenean cum sociis natoque penatibus et magnis.', '2017-10-14 15:48:56', '2017-10-18 12:58:52'),
(2, 'Maecenas vestibulum mollis diamster egestas', '1508306449blog-02.jpg', 1, '2017-09-06', 'Lorem ipsum dolor sit amet consectetuer adipisci elit aenean commodo ligula eget dolor aenean cum sociis natoque penatibus et magnis.', '2017-10-18 13:00:49', '2017-10-18 13:00:49'),
(3, 'Maecenas vestibulum mollis diamster egestas', '1508306478blog-03.jpg', 1, '2017-09-18', 'Lorem ipsum dolor sit amet consectetuer adipisci elit aenean commodo ligula eget dolor aenean cum sociis natoque penatibus et magnis.', '2017-10-18 13:01:18', '2017-10-18 13:01:18');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `image`, `created_at`, `updated_at`) VALUES
(1, '1507971865client-01.png', '2017-10-14 16:04:25', '2017-10-14 16:04:25'),
(2, '1508306563client-02.png', '2017-10-18 13:02:43', '2017-10-18 13:02:43'),
(3, '1508306570client-03.png', '2017-10-18 13:02:50', '2017-10-18 13:02:50'),
(4, '1508306577client-04.png', '2017-10-18 13:02:57', '2017-10-18 13:02:57'),
(5, '1508306583client-05.png', '2017-10-18 13:03:03', '2017-10-18 13:03:03'),
(6, '1508306590client-06.png', '2017-10-18 13:03:10', '2017-10-18 13:03:10');

-- --------------------------------------------------------

--
-- Table structure for table `company_socials`
--

CREATE TABLE `company_socials` (
  `id` int(10) UNSIGNED NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_site` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_socials`
--

INSERT INTO `company_socials` (`id`, `link`, `social_site`, `social_icon`, `created_at`, `updated_at`) VALUES
(1, '#', 'Facebook', 'fa-facebook', '2017-10-27 18:13:59', '2017-10-27 18:15:14'),
(2, '#', 'Google', 'fa-google-plus', '2017-10-27 18:17:32', '2017-10-27 18:17:32'),
(3, '#', 'Twitter', 'fa-twitter', '2017-10-27 18:17:48', '2017-10-27 18:21:10'),
(4, '#', 'Pinterest', 'fa-pinterest', '2017-10-27 18:18:10', '2017-10-27 18:18:10');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `c_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `logo_two` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `c_name`, `logo`, `mobile`, `phone`, `address`, `email`, `website`, `created_at`, `updated_at`, `logo_two`) VALUES
(6, 'Auto Plus - Car Wash & Car Repair', 'logo.png', '+1234567890', '+1234567890', 'Washington D.C.', 'info@company.com', 'www.carwash.com', '2017-10-16 11:44:02', '2017-10-16 11:44:02', 'logo-white.png');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(10) UNSIGNED NOT NULL,
  `symbol` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `symbol`, `country`, `code`, `created_at`, `updated_at`) VALUES
(1, '$', 'USA', 'US', '2017-10-14 12:45:41', '2017-10-14 12:45:41');

-- --------------------------------------------------------

--
-- Table structure for table `facts`
--

CREATE TABLE `facts` (
  `id` int(10) UNSIGNED NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` int(11) NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `facts`
--

INSERT INTO `facts` (`id`, `icon`, `number`, `detail`, `created_at`, `updated_at`) VALUES
(1, 'fa-truck', 1025, 'Vehicle Washed', '2017-10-14 15:15:21', '2017-10-14 15:15:21'),
(2, 'fa-car', 850, 'Car Washed', '2017-10-18 11:33:30', '2017-10-18 11:33:30'),
(3, 'fa-smile-o', 780, 'Happy Customers', '2017-10-18 11:34:00', '2017-10-18 11:34:00'),
(4, 'fa-coffee', 500, 'Cup of Coffee', '2017-10-18 11:34:24', '2017-10-18 11:34:24');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` int(10) UNSIGNED NOT NULL,
  `gallery_img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `gallery_img`, `created_at`, `updated_at`) VALUES
(1, '1507963670gallery-01.jpg', '2017-10-14 13:47:50', '2017-10-14 13:47:50'),
(2, '1507963872gallery-02.jpg', '2017-10-14 13:51:12', '2017-10-14 13:51:12'),
(3, '1507963879gallery-03.jpg', '2017-10-14 13:51:19', '2017-10-14 13:51:19'),
(4, '1507963887gallery-04.jpg', '2017-10-14 13:51:27', '2017-10-14 13:51:27'),
(5, '1507963911gallery-05.jpg', '2017-10-14 13:51:38', '2017-10-14 13:51:51'),
(6, '1508301091gallery-06.jpg', '2017-10-18 11:31:31', '2017-10-18 11:31:31'),
(8, '15083092371507963670gallery-01.jpg', '2017-10-18 13:47:17', '2017-10-18 13:47:17'),
(9, '15083092551507963879gallery-03.jpg', '2017-10-18 13:47:35', '2017-10-18 13:47:35');

-- --------------------------------------------------------

--
-- Table structure for table `maps`
--

CREATE TABLE `maps` (
  `id` int(10) UNSIGNED NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_09_02_183504_create_washing_plans_table', 1),
(4, '2017_09_02_183601_create_vehicle_types_table', 1),
(5, '2017_09_02_183621_create_teams_table', 1),
(6, '2017_09_02_183722_create_social_teams_table', 1),
(7, '2017_09_02_183743_create_team_tasks_table', 1),
(8, '2017_09_04_042235_create_statuses_table', 1),
(9, '2017_09_04_043711_create_appointments_table', 1),
(10, '2017_09_04_044501_create_payments_table', 1),
(11, '2017_09_04_044553_create_washing_plan_includes_table', 1),
(12, '2017_09_04_044945_create_payment_modes_table', 1),
(13, '2017_09_04_045011_create_services_table', 1),
(14, '2017_09_04_045042_create_galleries_table', 1),
(15, '2017_09_04_045100_create_facts_table', 1),
(16, '2017_09_04_045819_create_testimonials_table', 1),
(17, '2017_09_04_050108_create_maps_table', 1),
(18, '2017_09_04_050221_create_opening_hours_table', 1),
(19, '2017_09_04_050403_create_company_socials_table', 1),
(20, '2017_09_04_050502_create_currencies_table', 1),
(21, '2017_09_04_054959_create_clients_table', 1),
(22, '2017_09_23_170127_create_washing_prices_table', 1),
(23, '2017_09_25_161215_create_blogs_table', 1),
(24, '2017_09_26_155246_create_vehicle_companies_table', 1),
(25, '2017_09_26_155423_create_vehicle_modals_table', 1),
(26, '2017_10_14_100754_create_team_tasks_table', 2),
(27, '2017_10_15_034647_create_payments_table', 3),
(28, '2017_10_15_114415_create_contacts_table', 4),
(29, '2017_10_15_121509_create_contacts_table', 5),
(30, '2017_10_17_091908_create_appointment_user_table', 6),
(31, '2017_10_17_094134_create_appointment_user_table', 7),
(32, '2017_10_17_094915_create_appointment_user_table', 8),
(33, '2017_10_17_095317_create_appointment_users_table', 9),
(34, '2017_10_17_112232_create_appointment_user_table', 10),
(35, '2017_10_17_115027_create_appointment_users_table', 11),
(36, '2017_10_17_121200_create_appointment_users_table', 12),
(37, '2017_10_27_102924_create_social_teams_table', 13),
(38, '2017_10_27_105735_create_company_socials_table', 14),
(39, '2017_10_27_161809_create_appointment_users_table', 15),
(40, '2017_10_27_162652_create_appointments_table', 16),
(41, '2017_10_30_072432_add_logo_two_col_in_contact_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `opening_hours`
--

CREATE TABLE `opening_hours` (
  `id` int(10) UNSIGNED NOT NULL,
  `day` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opening_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `closing_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `opening_hours`
--

INSERT INTO `opening_hours` (`id`, `day`, `opening_time`, `closing_time`, `created_at`, `updated_at`) VALUES
(1, 'Monday', '09:00 AM', '08:00 PM', '2017-10-14 16:31:55', '2017-10-24 18:28:49'),
(2, 'Tuesday', '09:00 AM', '08:00 PM', '2017-10-18 13:03:49', '2017-10-27 16:42:59'),
(3, 'Wednesday', '09:00 AM', '08:00 PM', '2017-10-18 13:04:04', '2017-10-27 16:43:03'),
(4, 'Thursday', '09:00 AM', '08:00 PM', '2017-10-18 13:04:13', '2017-10-27 16:43:07'),
(5, 'Friday', '09:00 AM', '08:00 PM', '2017-10-18 13:05:00', '2017-10-27 16:43:10'),
(6, 'Saturday', '09:00 AM', '08:00 PM', '2017-10-18 13:05:10', '2017-10-27 16:43:12'),
(7, 'Sunday', '-', '-', '2017-10-18 13:05:21', '2017-10-18 13:05:21');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('jhon@info.com', '$2y$10$fUNz3TehKDjlykLitNmHZ.N7rPX5lx6P/HufToAOvYcrkVy5mavRS', '2017-10-29 16:10:43'),
('admin@info.com', '$2y$10$PKxWhyb3iNgL79XjmeWys.myhne2fEn61k/a8eTQr4ScFTHVIIy4a', '2017-10-30 01:06:05');

-- --------------------------------------------------------

--
-- Table structure for table `payment_modes`
--

CREATE TABLE `payment_modes` (
  `id` int(10) UNSIGNED NOT NULL,
  `mode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_modes`
--

INSERT INTO `payment_modes` (`id`, `mode`, `created_at`, `updated_at`) VALUES
(1, 'Cash', '2017-10-14 12:38:21', '2017-10-14 12:38:21'),
(2, 'Cheque', '2017-10-14 13:14:01', '2017-10-14 13:14:01');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `icon`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, '1507962334service-01.png', 'Vehicle Hand Wash', 'Lorem ipsum dolor sit amet cons elit aenean commodo ligula egetetsg cum sociis natoque enatib..', '2017-10-14 13:25:34', '2017-10-14 13:28:55'),
(2, '1508243756service-02.png', 'Headlight Lens Restoration', 'Lorem ipsum dolor sit amet cons elit aenean commodo ligula egetetsg cum sociis natoque enatib.', '2017-10-17 19:35:56', '2017-10-18 11:26:04'),
(3, '1508300901service-03.png', 'Scratch Removal', 'Lorem ipsum dolor sit amet cons elit aenean commodo ligula egetetsg cum sociis natoque enatib.', '2017-10-18 11:28:21', '2017-10-18 11:28:21'),
(4, '1508300916service-04.png', 'Tar Removal', 'Lorem ipsum dolor sit amet cons elit aenean commodo ligula egetetsg cum sociis natoque enatib.', '2017-10-18 11:28:36', '2017-10-18 11:28:36'),
(5, '1508300930service-05.png', 'Odor Elimination', 'Lorem ipsum dolor sit amet cons elit aenean commodo ligula egetetsg cum sociis natoque enatib.', '2017-10-18 11:28:50', '2017-10-18 11:28:50'),
(6, '1508300944service-06.png', 'Engine Cleaning', 'Lorem ipsum dolor sit amet cons elit aenean commodo ligula egetetsg cum sociis natoque enatib.', '2017-10-18 11:29:04', '2017-10-18 11:29:04'),
(7, '1508300977service-07.png', 'Hazardous Cleaning', 'Lorem ipsum dolor sit amet cons elit aenean commodo ligula egetetsg cum sociis natoque enatib.', '2017-10-18 11:29:37', '2017-10-18 11:29:37'),
(8, '1508300999service-08.png', 'Valet Service', 'Lorem ipsum dolor sit amet cons elit aenean commodo ligula egetetsg cum sociis natoque enatib.', '2017-10-18 11:29:59', '2017-10-18 11:29:59');

-- --------------------------------------------------------

--
-- Table structure for table `social_teams`
--

CREATE TABLE `social_teams` (
  `id` int(10) UNSIGNED NOT NULL,
  `team_id` int(10) UNSIGNED NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_teams`
--

INSERT INTO `social_teams` (`id`, `team_id`, `url`, `social`, `social_icon`, `created_at`, `updated_at`) VALUES
(1, 1, '#', 'Facebook', 'fa-facebook', '2017-10-27 17:38:44', '2017-10-27 17:41:13'),
(2, 1, '#', 'Google', 'fa-google', '2017-10-30 19:02:55', '2017-10-30 19:02:55'),
(3, 1, '#', 'Twitter', 'fa-twitter', '2017-10-30 19:03:10', '2017-10-30 19:03:10'),
(4, 1, '#', 'Pinterest', 'fa-pinterest', '2017-10-30 19:03:21', '2017-10-30 19:03:21'),
(5, 2, '#', 'Facebook', 'fa-facebook', '2017-10-30 19:03:35', '2017-10-30 19:03:35'),
(6, 2, '#', 'Twitter', 'fa-twitter', '2017-10-30 19:03:51', '2017-10-30 19:03:51'),
(7, 2, '#', 'Google', 'fa-google', '2017-10-30 19:04:03', '2017-10-30 19:04:03'),
(8, 2, '#', 'Pinterest', 'fa-pinterest', '2017-10-30 19:04:14', '2017-10-30 19:04:14'),
(9, 5, '#', 'Facebook', 'fa-facebook', '2017-10-30 19:04:29', '2017-10-30 19:04:29'),
(10, 5, '#', 'Twitter', 'fa-twitter', '2017-10-30 19:04:40', '2017-10-30 19:04:40'),
(11, 5, '#', 'Google', 'fa-google', '2017-10-30 19:04:51', '2017-10-30 19:04:51'),
(12, 5, '#', 'Pinterest', 'fa-pinterest', '2017-10-30 19:05:02', '2017-10-30 19:05:02'),
(13, 6, '#', 'Facebook', 'fa-facebook', '2017-10-30 19:05:14', '2017-10-30 19:05:14'),
(14, 6, '#', 'Twitter', 'fa-twitter', '2017-10-30 19:05:30', '2017-10-30 19:05:30'),
(15, 6, '#', 'Google', 'fa-google', '2017-10-30 19:05:40', '2017-10-30 19:05:40'),
(16, 6, '#', 'Pinterest', 'fa-pinterest', '2017-10-30 19:05:51', '2017-10-30 19:05:51'),
(17, 7, '#', 'Facebook', 'fa-facebook', '2017-10-30 19:06:06', '2017-10-30 19:06:06'),
(18, 7, '#', 'Twitter', 'fa-twitter', '2017-10-30 19:06:20', '2017-10-30 19:06:20'),
(19, 7, '#', 'Google', 'fa-google', '2017-10-30 19:06:36', '2017-10-30 19:06:36'),
(20, 7, '#', 'Pinterest', 'fa-pinterest', '2017-10-30 19:06:47', '2017-10-30 19:06:47'),
(21, 8, '#', 'Facebook', 'fa-facebook', '2017-10-30 19:07:01', '2017-10-30 19:07:01'),
(22, 8, '#', 'Twitter', 'fa-twitter', '2017-10-30 19:07:21', '2017-10-30 19:07:21'),
(23, 8, '#', 'Google', 'fa-google', '2017-10-30 19:07:55', '2017-10-30 19:07:55'),
(24, 8, '#', 'Pinterest', 'fa-pinterest', '2017-10-30 19:08:13', '2017-10-30 19:08:13'),
(25, 9, '#', 'Facebook', 'fa-facebook', '2017-10-30 19:08:27', '2017-10-30 19:08:27'),
(26, 9, '#', 'Instagram', 'fa-instagram', '2017-10-30 19:08:37', '2017-10-30 19:08:37'),
(27, 9, '#', 'Google', 'fa-google', '2017-10-30 19:09:00', '2017-10-30 19:09:00'),
(28, 9, '#', 'You Tube', 'fa-youtube', '2017-10-30 19:09:32', '2017-10-30 19:09:32'),
(29, 10, '#', 'Facebook', 'fa-facebook', '2017-10-30 19:09:44', '2017-10-30 19:09:44'),
(30, 10, '#', 'Google', 'fa-google', '2017-10-30 19:10:00', '2017-10-30 19:10:00'),
(31, 10, '#', 'You Tube', 'fa-youtube', '2017-10-30 19:10:13', '2017-10-30 19:10:13'),
(32, 10, '#', 'Github', 'fa-github', '2017-10-30 19:10:25', '2017-10-30 19:10:25');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'start', '2017-10-14 12:52:33', '2017-10-14 12:54:44'),
(2, 'pending', '2017-10-14 12:54:35', '2017-10-14 12:54:35'),
(3, 'complete', '2017-10-14 12:54:51', '2017-10-14 12:54:58');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(10) UNSIGNED NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date NOT NULL,
  `post` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `join_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `photo`, `name`, `email`, `sex`, `mobile`, `phone`, `dob`, `post`, `address`, `status`, `join_date`, `created_at`, `updated_at`) VALUES
(1, '1509007033team-01.jpg', 'Sarah Johnson', 'sarah@gmail.com', 'F', '+1 1234567980', NULL, '1994-01-01', 'Mechanic', 'New York', 'A', '2017-10-11', '2017-10-10 14:04:20', '2017-10-26 15:37:59'),
(2, '1508301367team-02.jpg', 'Jhon Doe', 'jhon@info.com', 'M', '+1234567890', NULL, '1990-02-06', 'Mechanic', 'New York', 'A', '2015-02-17', '2017-10-18 11:36:07', '2017-10-18 11:36:07'),
(5, '1508301691team-03.jpg', 'Sarah Johnson', 'sarah2@gmail.com', 'F', '+123456789', NULL, '1993-01-20', 'Mechanic', 'London', 'A', '2017-10-18', '2017-10-18 11:41:12', '2017-10-18 11:41:31'),
(6, '1508301867team-04.jpg', 'Mark Dwayne', 'mark@gmail.com', 'M', '+1279880007', '+1227667908', '1993-02-03', 'Mechanic', 'New York', 'A', '2017-10-20', '2017-10-18 11:44:27', '2017-10-18 11:44:27'),
(7, '1508301954team-05.jpg', 'Sarah Johnson', 'sarah3@gmail.com', 'F', '+1234567899', NULL, '1990-06-11', 'Mechanic', 'London', 'D', '2017-10-18', '2017-10-18 11:45:54', '2017-10-18 12:06:36'),
(8, '1508302091team-06.jpg', 'Sarah Clark', 'clark@gmail.com', 'F', '+1323287909', NULL, '1991-07-23', 'Mechanic', 'New York', 'D', '2017-10-24', '2017-10-18 11:48:11', '2017-10-18 11:48:11'),
(9, '1508302204team-07.jpg', 'Jhon Doe', 'jhon2@info.com', 'M', '+1644567890', NULL, '1987-10-22', 'Mechanic', 'London', 'D', '2017-10-04', '2017-10-18 11:50:04', '2017-10-18 11:50:04'),
(10, '1508302264team-08.jpg', 'Mark Dwayne', 'mark2@gmail.com', 'M', '+1248859698', NULL, '1993-10-07', 'Mechanic', 'London', 'D', '2017-10-19', '2017-10-18 11:51:04', '2017-10-18 11:51:04');

-- --------------------------------------------------------

--
-- Table structure for table `team_tasks`
--

CREATE TABLE `team_tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `team_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `task` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team_tasks`
--

INSERT INTO `team_tasks` (`id`, `team_id`, `user_id`, `task`, `status_id`, `created_at`, `updated_at`) VALUES
(2, 1, 2, 'Car Wash Cleaned', 1, '2017-10-14 17:10:37', '2017-10-17 19:39:06');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `image`, `post`, `detail`, `created_at`, `updated_at`) VALUES
(1, 'Sarah Casaro', '1508307063testimonials-client-01.jpg', 'Mechanic', '“ Curabitur ligula sapien tincidunt non euismod vitae posuere imperdiet leo maecenas malesuada praesent congue erat at massa sed cursus turpis vitae tortor donec posuere vulputate arcu phasellus accumsan cursus velit vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia. ”', '2017-10-18 13:11:03', '2017-10-18 13:11:03'),
(2, 'Smith Casaro', '1508307080testimonials-client-02.jpg', 'Mechanic', '“ Curabitur ligula sapien tincidunt non euismod vitae posuere imperdiet leo maecenas malesuada praesent congue erat at massa sed cursus turpis vitae tortor donec posuere vulputate arcu phasellus accumsan cursus velit vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia. ”', '2017-10-18 13:11:20', '2017-10-18 13:11:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` char(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `role` char(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `photo`, `name`, `email`, `password`, `sex`, `dob`, `mobile`, `phone`, `address`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '1507606503avatar04.png', 'admin', 'admin@info.com', '$2y$10$vN9eeJLziHe4bEqYtCS9MewYfZW7H/UhwTGFzfYLSxMEIBSil4XCm', 'M', '1990-12-31', '+91 1234567890', NULL, 'New York', 'A', '56b6chTPCL9JoIw6CLRy4HZxyhUbk0YM7N30NxVS6Kvy759VV425bEZRyhfd', '2017-10-09 15:59:45', '2017-10-29 23:45:57'),
(2, '1507539799avatar5.png', 'Jhon Doe', 'jhon@info.com', '$2y$10$3bxELT.dOSPOPP0oHhU.xe3Z13w.7X2w.LssVYWKoA98yMUT9zcbO', 'M', '1990-10-09', '+91 231-5643-133', NULL, 'London, UK', 'S', 'ae47k3LXI4aPaT7C6sBKjQtAjOl2E0sfEm9bUFegUJFXHVjjdmn1KzdQaBSJ', '2017-10-09 16:03:19', '2017-10-17 15:23:28');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_companies`
--

CREATE TABLE `vehicle_companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `vehicle_company` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicle_companies`
--

INSERT INTO `vehicle_companies` (`id`, `vehicle_company`, `created_at`, `updated_at`) VALUES
(1, 'Tata', '2017-10-13 13:34:40', '2017-10-13 13:34:40'),
(2, 'Honda', '2017-10-13 13:35:06', '2017-10-13 13:35:06');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_modals`
--

CREATE TABLE `vehicle_modals` (
  `id` int(10) UNSIGNED NOT NULL,
  `vehicle_modal` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehicle_company_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicle_modals`
--

INSERT INTO `vehicle_modals` (`id`, `vehicle_modal`, `vehicle_company_id`, `created_at`, `updated_at`) VALUES
(1, 'modal 1 (Tata)', 1, '2017-10-13 13:35:47', '2017-10-13 13:35:47'),
(2, 'modal 2 (Tata)', 1, '2017-10-13 13:36:04', '2017-10-13 13:36:04'),
(3, 'modal 1 (Honda)', 2, '2017-10-13 13:36:24', '2017-10-13 13:36:24'),
(4, 'modal 2 (Honda)', 2, '2017-10-13 13:36:39', '2017-10-13 13:36:39');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_types`
--

CREATE TABLE `vehicle_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicle_types`
--

INSERT INTO `vehicle_types` (`id`, `icon`, `type`, `created_at`, `updated_at`) VALUES
(1, 'icon-1', 'Regular Car', '2017-10-09 16:07:52', '2017-10-30 01:30:39'),
(2, 'icon-2', 'Medium Car', '2017-10-09 16:08:13', '2017-10-14 11:41:22'),
(3, 'icon-3', 'Compact Suv', '2017-10-09 16:08:41', '2017-10-14 11:41:36'),
(4, 'icon-4', 'Mini Van', '2017-10-09 16:08:59', '2017-10-14 11:41:46'),
(5, 'icon-5', 'Pickup Truck', '2017-10-09 16:09:13', '2017-10-14 11:41:52'),
(6, 'icon-6', 'Cargo Truck', '2017-10-09 16:09:31', '2017-10-14 11:41:59');

-- --------------------------------------------------------

--
-- Table structure for table `washing_plans`
--

CREATE TABLE `washing_plans` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `washing_plans`
--

INSERT INTO `washing_plans` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Basic Plan', '2017-10-09 16:18:51', '2017-10-09 16:18:51'),
(2, 'Deluxe Washing', '2017-10-09 16:19:01', '2017-10-09 16:19:01'),
(3, 'Ultimate Washing', '2017-10-09 16:19:13', '2017-10-09 16:19:13'),
(4, 'Super Washing', '2017-10-09 16:19:25', '2017-10-30 20:01:50');

-- --------------------------------------------------------

--
-- Table structure for table `washing_plan_includes`
--

CREATE TABLE `washing_plan_includes` (
  `id` int(10) UNSIGNED NOT NULL,
  `washing_plan_id` int(10) UNSIGNED NOT NULL,
  `washing_plan_include` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `washing_plan_includes`
--

INSERT INTO `washing_plan_includes` (`id`, `washing_plan_id`, `washing_plan_include`, `created_at`, `updated_at`) VALUES
(1, 1, 'Exterior Hand Wash', '2017-10-09 16:40:31', '2017-10-14 17:12:50'),
(2, 1, 'Towel Hand Dry', '2017-10-09 16:41:33', '2017-10-09 16:41:33'),
(3, 1, 'Wheel Shines', '2017-10-09 16:41:47', '2017-10-30 19:59:35'),
(4, 2, 'Exterior Hand Wash', '2017-10-09 16:42:00', '2017-10-09 16:42:00'),
(5, 2, 'Towel Hand Dry', '2017-10-09 16:42:09', '2017-10-09 16:42:09'),
(6, 2, 'Wheel Shine', '2017-10-09 16:42:20', '2017-10-09 16:42:41'),
(7, 2, 'Tire Dressing', '2017-10-09 16:42:51', '2017-10-09 16:42:51'),
(8, 2, 'Window In & Out', '2017-10-09 16:43:01', '2017-10-09 16:43:01'),
(9, 2, 'Sealer Hand Wax', '2017-10-09 16:43:09', '2017-10-09 16:43:29'),
(10, 3, 'Exterior Hand Wash', '2017-10-09 16:43:41', '2017-10-09 16:43:41'),
(11, 3, 'Towel Hand Dry', '2017-10-09 16:43:51', '2017-10-09 16:43:51'),
(12, 3, 'Wheel Shine', '2017-10-09 16:45:24', '2017-10-09 16:45:24'),
(13, 3, 'Tire Dressing', '2017-10-09 16:45:33', '2017-10-09 16:45:33'),
(14, 3, 'Window In & Out', '2017-10-09 16:47:01', '2017-10-09 16:47:01'),
(15, 3, 'Sealer Hand Wax', '2017-10-09 16:47:16', '2017-10-09 16:47:16'),
(16, 3, 'Interior Vacuum', '2017-10-09 16:47:26', '2017-10-09 16:47:26'),
(17, 3, 'Door Shut’s & Plastics', '2017-10-09 16:47:34', '2017-10-09 16:47:34'),
(18, 3, 'Dashboard Clean', '2017-10-09 16:48:03', '2017-10-10 17:24:55'),
(19, 4, 'Exterior Hand Wash', '2017-10-09 16:49:17', '2017-10-09 16:49:17'),
(20, 4, 'Towel Hand Dry', '2017-10-09 16:49:24', '2017-10-09 16:49:44'),
(21, 4, 'Wheel Shine', '2017-10-09 16:50:27', '2017-10-09 16:50:27'),
(22, 4, 'Tire Dressing', '2017-10-09 16:50:41', '2017-10-09 16:50:41'),
(23, 4, 'Window In & Out', '2017-10-09 16:50:50', '2017-10-09 16:50:50'),
(24, 4, 'Sealer Hand Wax', '2017-10-09 16:50:59', '2017-10-09 16:50:59'),
(25, 4, 'Interior Vacuum', '2017-10-09 16:51:07', '2017-10-09 16:51:07'),
(26, 4, 'Door Shut’s & Plastics', '2017-10-09 16:51:17', '2017-10-09 16:51:17'),
(27, 4, 'Dashboard Clean', '2017-10-09 16:51:25', '2017-10-09 16:51:25'),
(28, 4, 'Air Freshener', '2017-10-09 16:51:37', '2017-10-09 16:51:37'),
(29, 4, 'Triple Coat Hand Wax', '2017-10-09 16:51:46', '2017-10-09 16:51:46');

-- --------------------------------------------------------

--
-- Table structure for table `washing_prices`
--

CREATE TABLE `washing_prices` (
  `id` int(10) UNSIGNED NOT NULL,
  `washing_plan_id` int(11) NOT NULL,
  `vehicle_type_id` int(11) NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `washing_prices`
--

INSERT INTO `washing_prices` (`id`, `washing_plan_id`, `vehicle_type_id`, `price`, `duration`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '$50', '25 mins', '2017-10-09 16:57:26', '2017-10-14 17:24:31'),
(2, 2, 1, '$69.00', '45 Mins', '2017-10-09 16:58:12', '2017-10-09 16:58:12'),
(3, 3, 1, '$89.00', '90 Mins', '2017-10-09 17:01:24', '2017-10-09 17:01:24'),
(4, 4, 1, '$109.00', '100 Mins', '2017-10-09 17:01:43', '2017-10-09 17:01:43'),
(5, 1, 2, '$50.00', '20 Mins', '2017-10-09 17:03:05', '2017-10-09 17:03:05'),
(6, 2, 2, '$70.00', '45 Mins', '2017-10-09 17:03:36', '2017-10-09 17:03:36'),
(7, 3, 2, '$90.00', '70 Mins', '2017-10-09 17:04:00', '2017-10-09 17:04:00'),
(8, 4, 2, '$110.00', '110 Mins', '2017-10-09 17:04:32', '2017-10-09 17:04:32'),
(9, 1, 3, '$45.00', '30 Mins', '2017-10-09 17:04:51', '2017-10-09 17:04:51'),
(10, 2, 3, '$70.00', '60 Mins', '2017-10-09 17:05:07', '2017-10-09 17:05:07'),
(11, 3, 3, '$90.00', '80 Mins', '2017-10-09 17:05:57', '2017-10-12 14:21:19'),
(12, 4, 3, '$120.00', '110 Mins', '2017-10-09 17:06:16', '2017-10-09 17:06:16'),
(13, 1, 4, '$50.00', '30 Mins', '2017-10-09 17:06:37', '2017-10-09 17:06:37'),
(14, 2, 4, '$60.00', '40 Mins', '2017-10-09 17:06:59', '2017-10-09 17:06:59'),
(15, 3, 4, '$70.00', '60 Mins', '2017-10-09 17:07:17', '2017-10-09 17:07:17'),
(16, 4, 4, '$90.00', '90 Mins', '2017-10-09 17:08:06', '2017-10-09 17:08:06'),
(17, 1, 5, '$45.00', '25 Mins', '2017-10-09 17:08:29', '2017-10-09 17:08:29'),
(18, 2, 5, '$60.00', '45 Mins', '2017-10-09 17:10:04', '2017-10-09 17:10:04'),
(19, 3, 5, '$70.00', '80 Mins', '2017-10-09 17:11:09', '2017-10-09 17:11:09'),
(20, 4, 5, '$100.00', '90 Mins', '2017-10-09 17:11:28', '2017-10-09 17:11:28'),
(21, 1, 6, '$60', '45 Mins', '2017-10-09 17:11:45', '2017-10-09 17:11:45'),
(22, 2, 6, '$80.00', '60 Mins', '2017-10-09 17:12:09', '2017-10-09 17:12:09'),
(23, 3, 6, '$100.00', '100 Mins', '2017-10-09 17:12:29', '2017-10-09 17:12:29'),
(24, 4, 6, '$125.00', '120 Mins', '2017-10-09 17:12:50', '2017-10-09 17:12:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointments_user_id_foreign` (`user_id`);

--
-- Indexes for table `appointment_users`
--
ALTER TABLE `appointment_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointment_users_user_id_foreign` (`user_id`),
  ADD KEY `appointment_users_appointment_id_foreign` (`appointment_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_socials`
--
ALTER TABLE `company_socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `currencies_symbol_unique` (`symbol`),
  ADD UNIQUE KEY `currencies_country_unique` (`country`),
  ADD UNIQUE KEY `currencies_code_unique` (`code`);

--
-- Indexes for table `facts`
--
ALTER TABLE `facts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maps`
--
ALTER TABLE `maps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opening_hours`
--
ALTER TABLE `opening_hours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_modes`
--
ALTER TABLE `payment_modes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_teams`
--
ALTER TABLE `social_teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `social_teams_team_id_foreign` (`team_id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teams_email_unique` (`email`),
  ADD UNIQUE KEY `teams_mobile_unique` (`mobile`),
  ADD UNIQUE KEY `teams_photo_unique` (`photo`);

--
-- Indexes for table `team_tasks`
--
ALTER TABLE `team_tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `testimonials_image_unique` (`image`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`),
  ADD UNIQUE KEY `users_photo_unique` (`photo`);

--
-- Indexes for table `vehicle_companies`
--
ALTER TABLE `vehicle_companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_modals`
--
ALTER TABLE `vehicle_modals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehicle_modals_vehicle_company_id_foreign` (`vehicle_company_id`);

--
-- Indexes for table `vehicle_types`
--
ALTER TABLE `vehicle_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `washing_plans`
--
ALTER TABLE `washing_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `washing_plan_includes`
--
ALTER TABLE `washing_plan_includes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `washing_plan_includes_washing_plan_id_foreign` (`washing_plan_id`);

--
-- Indexes for table `washing_prices`
--
ALTER TABLE `washing_prices`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `appointment_users`
--
ALTER TABLE `appointment_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `company_socials`
--
ALTER TABLE `company_socials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `facts`
--
ALTER TABLE `facts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `maps`
--
ALTER TABLE `maps`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `opening_hours`
--
ALTER TABLE `opening_hours`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `payment_modes`
--
ALTER TABLE `payment_modes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `social_teams`
--
ALTER TABLE `social_teams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `team_tasks`
--
ALTER TABLE `team_tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `vehicle_companies`
--
ALTER TABLE `vehicle_companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `vehicle_modals`
--
ALTER TABLE `vehicle_modals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `vehicle_types`
--
ALTER TABLE `vehicle_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `washing_plans`
--
ALTER TABLE `washing_plans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `washing_plan_includes`
--
ALTER TABLE `washing_plan_includes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `washing_prices`
--
ALTER TABLE `washing_prices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `appointment_users`
--
ALTER TABLE `appointment_users`
  ADD CONSTRAINT `appointment_users_appointment_id_foreign` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointment_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `social_teams`
--
ALTER TABLE `social_teams`
  ADD CONSTRAINT `social_teams_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vehicle_modals`
--
ALTER TABLE `vehicle_modals`
  ADD CONSTRAINT `vehicle_modals_vehicle_company_id_foreign` FOREIGN KEY (`vehicle_company_id`) REFERENCES `vehicle_companies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `washing_plan_includes`
--
ALTER TABLE `washing_plan_includes`
  ADD CONSTRAINT `washing_plan_includes_washing_plan_id_foreign` FOREIGN KEY (`washing_plan_id`) REFERENCES `washing_plans` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
