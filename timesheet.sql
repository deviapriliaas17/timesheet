-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2021 at 11:23 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `timesheet`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `handphone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `position_code`, `employee_code`, `address`, `handphone`, `created_at`, `updated_at`) VALUES
(4, 'Dimas', '1', '8sg', 'PCI', '092832103', '2021-09-03 00:49:58', '2021-09-03 00:49:58'),
(5, 'Raynaldo', '2', 'p9b', 'PCI', '231231', '2021-09-03 02:40:46', '2021-09-03 02:40:46'),
(6, 'edo', '2', '9UP', 'malang', '23123123', '2021-09-05 19:21:34', '2021-09-05 19:21:34'),
(7, 'asda', '1', 'g2n', 'asdad', 'asdada', '2021-09-06 02:27:24', '2021-09-06 02:27:24');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2021_08_23_023317_create_projects_table', 1),
(4, '2021_08_23_023340_create_project_locations_table', 1),
(5, '2021_08_23_023356_create_project_pics_table', 1),
(6, '2021_08_23_023411_create_employees_table', 1),
(7, '2021_08_23_023431_create_project_absents_table', 1),
(8, '2021_08_23_024314_create_project_location_employees_table', 1),
(9, '2021_08_23_025415_create_positions_table', 1),
(10, '2021_08_31_042848_create_permission_tables', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\User', 2),
(2, 'App\\User', 22),
(17, 'App\\User', 1),
(17, 'App\\User', 16);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `category`, `guard_name`, `created_at`, `updated_at`) VALUES
(10, 'Create Timesheet', 'Timesheet', 'web', '2021-09-26 23:35:06', '2021-09-26 23:35:06'),
(11, 'View Timesheet', 'Timesheet', 'web', '2021-09-26 23:34:40', '2021-09-27 19:56:19'),
(12, 'Edit Timesheet', 'Timesheet', 'web', '2021-09-26 23:35:15', '2021-09-26 23:35:15'),
(13, 'View Summary', 'Summary', 'web', '2021-09-26 23:35:25', '2021-09-26 23:35:25'),
(14, 'Create Employee', 'Employee', 'web', '2021-09-26 23:35:41', '2021-09-26 23:35:41'),
(15, 'View Employee', 'Employee', 'web', '2021-09-26 23:35:52', '2021-09-26 23:35:52'),
(16, 'Edit Employee', 'Employee', 'web', '2021-09-26 23:36:05', '2021-09-26 23:36:05'),
(17, 'Delete Employee', 'Employee', 'web', '2021-09-26 23:36:12', '2021-09-26 23:36:12'),
(18, 'Create Project', 'Project', 'web', '2021-09-26 23:36:24', '2021-09-26 23:36:24'),
(19, 'View Project', 'Project', 'web', '2021-09-26 23:36:34', '2021-09-26 23:36:34'),
(20, 'Edit Project', 'Project', 'web', '2021-09-26 23:36:45', '2021-09-26 23:36:45'),
(21, 'Delete Project', 'Project', 'web', '2021-09-26 23:36:58', '2021-09-26 23:36:58'),
(22, 'Create Project Location', 'Project Location', 'web', '2021-09-26 23:37:05', '2021-09-26 23:37:05'),
(23, 'View Project Location', 'Project Location', 'web', '2021-09-26 23:37:19', '2021-09-26 23:37:19'),
(24, 'Edit Project Location', 'Project Location', 'web', '2021-09-26 23:37:27', '2021-09-26 23:37:27'),
(25, 'Delete Project Location', 'Project Location', 'web', '2021-09-26 23:37:35', '2021-09-26 23:37:35'),
(26, 'Create Role', 'Role', 'web', '2021-09-26 23:37:55', '2021-09-26 23:37:55'),
(27, 'View Role', 'Role', 'web', NULL, NULL),
(28, 'Edit Role', 'Role', 'web', '2021-09-26 23:38:12', '2021-09-26 23:38:12'),
(29, 'Delete Role', 'Role', 'web', '2021-09-26 23:38:19', '2021-09-26 23:38:19'),
(31, 'Create Permission', 'Permission', 'web', '2021-09-26 23:38:28', '2021-09-26 23:38:28'),
(32, 'View Permission', 'Permission', 'web', '2021-09-26 23:38:38', '2021-09-26 23:38:38'),
(33, 'Edit Permission', 'Permission', 'web', '2021-09-26 23:39:38', '2021-09-26 23:39:38'),
(34, 'Delete Permission', 'Permission', 'web', '2021-09-26 23:39:43', '2021-09-26 23:39:43');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_position` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `name_position`, `created_at`, `updated_at`) VALUES
(1, 'PIC', NULL, NULL),
(2, 'Cataloguer', NULL, NULL),
(3, 'Administrator', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_code`, `project_name`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'rkg', 'Sinergi', NULL, NULL, '2021-09-03 02:48:16', '2021-09-24 00:14:53'),
(2, 'bSM', 'PI', NULL, NULL, '2021-09-05 19:25:55', '2021-09-23 02:41:04'),
(12, 'Vcy', 'Sampoerna Mild', NULL, NULL, '2021-09-30 00:11:57', '2021-09-30 00:12:15');

-- --------------------------------------------------------

--
-- Table structure for table `project_absents`
--

CREATE TABLE `project_absents` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_absents_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_location_employee_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mandays` int(11) DEFAULT NULL,
  `workdays` int(11) DEFAULT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date DEFAULT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_locations`
--

CREATE TABLE `project_locations` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_location_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_locations`
--

INSERT INTO `project_locations` (`id`, `project_code`, `project_location_code`, `location_name`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'rkg', 'Mki', 'Salak', NULL, NULL, NULL, '2021-09-24 00:46:11'),
(2, 'bSM', 'Asd', 'Darajat', NULL, NULL, NULL, '2021-09-24 00:21:15'),
(8, 'Vcy', 'e2a5p', 'Makassar', NULL, NULL, '2021-09-30 00:14:16', '2021-09-30 00:14:16');

-- --------------------------------------------------------

--
-- Table structure for table `project_location_employees`
--

CREATE TABLE `project_location_employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_location_employee_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_location_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_pics`
--

CREATE TABLE `project_pics` (
  `id` int(10) UNSIGNED NOT NULL,
  `pic_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namecode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_location_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(2, 'user', 'web', '2021-08-30 21:54:10', '2021-08-30 21:54:10'),
(17, 'admin', 'web', '2021-09-28 20:55:54', '2021-09-28 20:55:54');

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
(10, 2),
(10, 17),
(11, 2),
(11, 17),
(12, 2),
(12, 17),
(13, 2),
(13, 17),
(14, 2),
(14, 17),
(15, 2),
(15, 17),
(16, 2),
(16, 17),
(17, 2),
(17, 17),
(18, 2),
(18, 17),
(19, 2),
(19, 17),
(20, 2),
(20, 17),
(21, 2),
(21, 17),
(22, 2),
(22, 17),
(23, 2),
(23, 17),
(24, 2),
(24, 17),
(25, 2),
(25, 17),
(26, 2),
(26, 17),
(27, 2),
(27, 17),
(28, 2),
(28, 17),
(29, 2),
(29, 17),
(31, 2),
(31, 17),
(32, 2),
(32, 17),
(33, 2),
(33, 17),
(34, 2),
(34, 17);

-- --------------------------------------------------------

--
-- Table structure for table `timesheet`
--

CREATE TABLE `timesheet` (
  `id` int(11) NOT NULL,
  `namecode` varchar(191) NOT NULL,
  `project_location_code` varchar(191) NOT NULL,
  `work` varchar(10) DEFAULT NULL,
  `mandays` varchar(10) DEFAULT NULL,
  `absent` varchar(10) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `processed_datetime` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timesheet`
--

INSERT INTO `timesheet` (`id`, `namecode`, `project_location_code`, `work`, `mandays`, `absent`, `notes`, `processed_datetime`, `created_at`, `updated_at`) VALUES
(437, 'asd', 'Mki', 'x', NULL, NULL, NULL, '2021-09-25', '2021-09-19 19:55:51', '2021-09-19 19:55:51'),
(438, 'edi', 'Mki', 'x', NULL, NULL, NULL, '2021-09-25', '2021-09-19 19:55:51', '2021-09-19 19:55:51'),
(439, 'azi', 'Mki', 'x', 'x', NULL, NULL, '2021-09-25', '2021-09-19 19:55:51', '2021-09-29 21:27:49'),
(440, 'dsa', 'Asd', 'x', 'x', NULL, NULL, '2021-09-26', '2021-09-19 19:56:22', '2021-09-19 19:56:22'),
(441, 'dew', 'Asd', NULL, NULL, 'x', NULL, '2021-09-26', '2021-09-19 19:56:22', '2021-09-19 19:56:22'),
(442, 'dev', 'Asd', NULL, 'x', NULL, NULL, '2021-09-26', '2021-09-19 19:56:23', '2021-09-19 19:56:23'),
(443, 'asd', 'Mki', 'x', NULL, NULL, NULL, '2021-09-27', '2021-09-19 20:05:44', '2021-09-19 20:05:44'),
(444, 'edi', 'Mki', NULL, 'x', NULL, NULL, '2021-09-27', '2021-09-19 20:05:44', '2021-09-19 20:05:44'),
(445, 'azi', 'Mki', NULL, NULL, 'x', NULL, '2021-09-27', '2021-09-19 20:05:45', '2021-09-19 20:05:45'),
(446, 'dsa', 'Asd', 'x', NULL, NULL, NULL, '2021-09-27', '2021-09-20 01:48:34', '2021-09-20 01:48:34'),
(447, 'dew', 'Asd', 'x', 'x', NULL, NULL, '2021-09-27', '2021-09-20 01:48:35', '2021-09-20 01:48:35'),
(448, 'dev', 'Asd', NULL, 'x', NULL, NULL, '2021-09-27', '2021-09-20 01:48:35', '2021-09-20 01:48:35'),
(449, 'dsa', 'Asd', 'x', NULL, NULL, NULL, '2021-09-25', '2021-09-29 21:27:31', '2021-09-29 21:27:31'),
(450, 'dew', 'Asd', 'x', NULL, NULL, NULL, '2021-09-25', '2021-09-29 21:27:31', '2021-09-29 21:27:31'),
(451, 'dev', 'Asd', NULL, 'x', NULL, NULL, '2021-09-25', '2021-09-29 21:27:31', '2021-09-29 21:27:31');

-- --------------------------------------------------------

--
-- Table structure for table `timesheet_action`
--

CREATE TABLE `timesheet_action` (
  `id` int(11) NOT NULL,
  `project_location_code` varchar(191) NOT NULL,
  `processed_datetime` date NOT NULL,
  `processed_by` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timesheet_action`
--

INSERT INTO `timesheet_action` (`id`, `project_location_code`, `processed_datetime`, `processed_by`, `created_at`, `updated_at`) VALUES
(211, 'Mki', '2021-09-25', 'Admin SST', '2021-09-19 19:55:51', '2021-09-19 19:55:51'),
(212, 'Mki', '2021-09-25', 'Admin SST', '2021-09-19 19:55:52', '2021-09-19 19:55:52'),
(213, 'Mki', '2021-09-25', 'Admin SST', '2021-09-19 19:55:52', '2021-09-19 19:55:52'),
(214, 'Asd', '2021-09-26', 'Admin SST', '2021-09-19 19:56:23', '2021-09-19 19:56:23'),
(215, 'Asd', '2021-09-26', 'Admin SST', '2021-09-19 19:56:24', '2021-09-19 19:56:24'),
(216, 'Asd', '2021-09-26', 'Admin SST', '2021-09-19 19:56:24', '2021-09-19 19:56:24'),
(217, 'Mki', '2021-09-27', 'Admin SST', '2021-09-19 20:05:46', '2021-09-19 20:05:46'),
(218, 'Mki', '2021-09-27', 'Admin SST', '2021-09-19 20:05:46', '2021-09-19 20:05:46'),
(219, 'Mki', '2021-09-27', 'Admin SST', '2021-09-19 20:05:46', '2021-09-19 20:05:46'),
(220, 'Asd', '2021-09-27', 'Admin SST', '2021-09-20 01:48:35', '2021-09-20 01:48:35'),
(221, 'Asd', '2021-09-27', 'Admin SST', '2021-09-20 01:48:35', '2021-09-20 01:48:35'),
(222, 'Asd', '2021-09-27', 'Admin SST', '2021-09-20 01:48:35', '2021-09-20 01:48:35'),
(223, 'Asd', '2021-09-25', 'User SST', '2021-09-29 21:27:31', '2021-09-29 21:27:31'),
(224, 'Asd', '2021-09-25', 'User SST', '2021-09-29 21:27:31', '2021-09-29 21:27:31'),
(225, 'Asd', '2021-09-25', 'User SST', '2021-09-29 21:27:31', '2021-09-29 21:27:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_employee` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namecode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user.jpg',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name_employee`, `namecode`, `email`, `position_code`, `address`, `contact`, `avatar`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin SST', 'asd', 'admin@sst.test', '3', 'Titan', '08', '1632899954.png', '$2y$10$cmhApClvfgAclBn3nwEs1eB9BwqGj1DN3nIr/Dn5ne09BgwGntHeq', 'HXCORXN62X785Sa0NTlsC5bLEC7HWpPrEY9P0krFvR7hJOEZDVsUJWmVJXoW', '2021-08-30 21:54:10', '2021-09-29 02:19:33'),
(2, 'User SST', 'dsa', 'user@sst.test', '2', 'Arum', '081', '1632369122.jpg', '$2y$10$4UJJd070hNucIdVmQsMl8.Fblql2yvVxGHLq1R9DagWRXOiJVtoaS', 'XUsQOGOGa11fA5RhaeAiOhU73OGbzXDxT0eSo4GJ1TKG9QOaFwCbEa7PbjNT', '2021-08-30 21:54:10', '2021-08-30 21:54:10'),
(3, 'Edo', 'edi', 'edo@sst.id', '1', 'PCI', '089', '1632369122.jpg', '', NULL, NULL, NULL),
(4, 'Azir', 'azi', 'azir@sst.id', '2', 'Ciracas', '086', '1632369122.jpg', '', NULL, NULL, NULL),
(5, 'Dewa', 'dew', 'dewa@sst.id', '1', 'Kop', '085', '1632369122.jpg', '', NULL, NULL, NULL),
(6, 'Devi', 'dev', 'devi@sst.id', '2', 'Ciruas', '20', '1632369122.jpg', '', NULL, NULL, NULL),
(10, 'test', 'bLiVy', 'test@gmail.com', NULL, NULL, NULL, 'user.jpg', '$2y$10$WLGt3YlFexezlHYZ1dSGd.RnPAo1IogZp9I.UI26Mpm1f.YvpZGuW', '5IoYmAt7buaABzfUEzUKUYRYspkkQNvt6bhJL5XrZWzA0fOZgNsRICsCUF99', '2021-09-28 02:18:33', '2021-09-28 02:18:33'),
(16, 'cek', 'jMqqW', 'cek@gmail.com', '2', 'cek', '231233', 'user.jpg', '$2y$10$77Ya2sKhg8oKLUVQuOvAUends0mx7JIewJ1iatj7CjAPx9uVPd4MS', NULL, '2021-09-28 23:14:24', '2021-09-29 02:18:31'),
(22, 'Nescafe Mocha', 'asAkv', 'nescafe23@gmail.com', '2', 'Alfamart Titan Arum', '123456781', '1632985825.jpg', '$2y$10$Q//1pIp8OGzz6svz3rcEjugEfwELVrFg5LqmtcELMDOrBMBQNkNxG', NULL, '2021-09-30 00:09:10', '2021-09-30 00:10:25');

-- --------------------------------------------------------

--
-- Table structure for table `user_project_locations`
--

CREATE TABLE `user_project_locations` (
  `id` int(11) NOT NULL,
  `namecode` varchar(191) NOT NULL,
  `project_location_code` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_project_locations`
--

INSERT INTO `user_project_locations` (`id`, `namecode`, `project_location_code`, `created_at`, `updated_at`) VALUES
(13, 'asd', 'Mki', NULL, NULL),
(14, 'dsa', 'Asd', NULL, NULL),
(15, 'edi', 'Mki', NULL, NULL),
(16, 'azi', 'Mki', NULL, NULL),
(17, 'dew', 'Asd', NULL, NULL),
(18, 'dev', 'Asd', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
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
  ADD KEY `model_has_permissions_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_absents`
--
ALTER TABLE `project_absents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_locations`
--
ALTER TABLE `project_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_location_employees`
--
ALTER TABLE `project_location_employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_pics`
--
ALTER TABLE `project_pics`
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
-- Indexes for table `timesheet`
--
ALTER TABLE `timesheet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timesheet_action`
--
ALTER TABLE `timesheet_action`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_project_locations`
--
ALTER TABLE `user_project_locations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `project_absents`
--
ALTER TABLE `project_absents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_locations`
--
ALTER TABLE `project_locations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `project_location_employees`
--
ALTER TABLE `project_location_employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_pics`
--
ALTER TABLE `project_pics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `timesheet`
--
ALTER TABLE `timesheet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=452;

--
-- AUTO_INCREMENT for table `timesheet_action`
--
ALTER TABLE `timesheet_action`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_project_locations`
--
ALTER TABLE `user_project_locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
