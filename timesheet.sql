-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2021 at 11:20 AM
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

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(2, 'App\\User', 1),
(3, 'App\\User', 1),
(4, 'App\\User', 1),
(4, 'App\\User', 2),
(5, 'App\\User', 1);

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
(1, 'App\\User', 1),
(2, 'App\\User', 2);

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
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Add Employee', 'web', '2021-09-05 21:08:01', '2021-09-05 21:08:01'),
(2, 'Edit Employee', 'web', '2021-09-05 21:08:33', '2021-09-05 21:08:33'),
(3, 'Delete Employee', 'web', '2021-09-05 21:08:39', '2021-09-05 21:08:39'),
(4, 'View Employee', 'web', '2021-09-05 21:36:25', '2021-09-05 21:36:25'),
(5, 'Actions Employee', 'web', '2021-09-06 00:04:38', '2021-09-06 00:04:38');

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
(1, 'rkg', 'Sinergi', NULL, NULL, '2021-09-03 02:48:16', '2021-09-03 02:48:16'),
(2, 'bSM', 'PI', NULL, NULL, '2021-09-05 19:25:55', '2021-09-05 19:25:55');

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
(1, 'rkg', 'Mki', 'Salak', NULL, NULL, NULL, NULL),
(2, 'bSM', 'Asd', 'Darajat', NULL, NULL, NULL, NULL);

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
(1, 'admin', 'web', '2021-08-30 21:54:10', '2021-08-30 21:54:10'),
(2, 'user', 'web', '2021-08-30 21:54:10', '2021-08-30 21:54:10');

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
(4, 2);

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
  `processed_datetime` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timesheet`
--

INSERT INTO `timesheet` (`id`, `namecode`, `project_location_code`, `work`, `mandays`, `absent`, `notes`, `processed_datetime`, `created_at`, `updated_at`) VALUES
(419, 'asd', 'Mki', 'x', NULL, NULL, NULL, '25-09-2021', '2021-09-17 00:50:31', '2021-09-17 00:50:31'),
(420, 'edi', 'Mki', 'x', 'x', NULL, NULL, '25-09-2021', '2021-09-17 00:50:32', '2021-09-17 00:50:45'),
(421, 'azi', 'Mki', 'x', NULL, NULL, NULL, '25-09-2021', '2021-09-17 00:50:32', '2021-09-17 00:50:32'),
(422, 'dsa', 'Asd', 'x', NULL, NULL, NULL, '26-09-2021', '2021-09-17 01:47:21', '2021-09-17 01:47:21'),
(423, 'dew', 'Asd', 'x', NULL, NULL, NULL, '26-09-2021', '2021-09-17 01:47:21', '2021-09-17 01:47:21'),
(424, 'dev', 'Asd', NULL, 'x', NULL, NULL, '26-09-2021', '2021-09-17 01:47:21', '2021-09-17 01:47:21');

-- --------------------------------------------------------

--
-- Table structure for table `timesheet_action`
--

CREATE TABLE `timesheet_action` (
  `id` int(11) NOT NULL,
  `project_location_code` varchar(191) NOT NULL,
  `processed_datetime` varchar(191) NOT NULL,
  `processed_by` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timesheet_action`
--

INSERT INTO `timesheet_action` (`id`, `project_location_code`, `processed_datetime`, `processed_by`, `created_at`, `updated_at`) VALUES
(199, 'Mki', '25-09-2021', 'Admin SST', '2021-09-17 00:50:32', '2021-09-17 00:50:32'),
(200, 'Mki', '25-09-2021', 'Admin SST', '2021-09-17 00:50:32', '2021-09-17 00:50:32'),
(201, 'Mki', '25-09-2021', 'Admin SST', '2021-09-17 00:50:32', '2021-09-17 00:50:32'),
(202, 'Asd', '26-09-2021', 'Admin SST', '2021-09-17 01:47:21', '2021-09-17 01:47:21'),
(203, 'Asd', '26-09-2021', 'Admin SST', '2021-09-17 01:47:21', '2021-09-17 01:47:21'),
(204, 'Asd', '26-09-2021', 'Admin SST', '2021-09-17 01:47:21', '2021-09-17 01:47:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `name_employee` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namecode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `handphone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name_employee`, `namecode`, `email`, `position_code`, `address`, `handphone`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin SST', 'asd', 'admin@sst.test', '3', 'Titan', '08', '$2y$10$KGuT4CR3x/GH.Q8BA7XFduFqG8lCcQ9Rzlwal.O8mADk1lwKVE1U6', 'J8RZ4zp6xTHCLJq4s9kTPTk6NTRRzQ6a3ntWHOSk52WZNn1vMCOwT7hrgp0K', '2021-08-30 21:54:10', '2021-08-30 21:54:10'),
(2, 2, 'User SST', 'dsa', 'user@sst.test', '2', 'Arum', '081', '$2y$10$4UJJd070hNucIdVmQsMl8.Fblql2yvVxGHLq1R9DagWRXOiJVtoaS', 'l0yNdxRrfZqVWuVli3H53umjQkvo92nX4NcPvhYC8liftTqXYwJMuQM8CD0F', '2021-08-30 21:54:10', '2021-08-30 21:54:10'),
(3, 2, 'Edo', 'edi', 'edo@sst.id', '1', 'PCI', '089', '', NULL, NULL, NULL),
(4, 2, 'Azir', 'azi', 'azir@sst.id', '2', 'Ciracas', '086', '', NULL, NULL, NULL),
(5, 2, 'Dewa', 'dew', 'dewa@sst.id', '1', 'Kop', '085', '', NULL, NULL, NULL),
(6, 2, 'Devi', 'dev', 'devi@sst.id', '2', 'Ciruas', '20', '', NULL, NULL, NULL);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `project_absents`
--
ALTER TABLE `project_absents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_locations`
--
ALTER TABLE `project_locations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `timesheet`
--
ALTER TABLE `timesheet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=425;

--
-- AUTO_INCREMENT for table `timesheet_action`
--
ALTER TABLE `timesheet_action`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
