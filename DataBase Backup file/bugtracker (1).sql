-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2021 at 01:58 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bugtracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `projectid` bigint(20) UNSIGNED NOT NULL,
  `modelid` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`projectid`, `modelid`) VALUES
(13, 18),
(15, 18),
(15, 19),
(15, 23),
(15, 24),
(15, 1),
(12, 18),
(16, 18),
(16, 19),
(16, 24),
(13, 24),
(12, 24),
(13, 19),
(12, 23);

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
(6, '2014_10_12_000000_create_users_table', 1),
(7, '2014_10_12_100000_create_password_resets_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2021_03_15_202357_create_tickets_table', 1),
(10, '2021_03_15_210118_create_permission_tables', 1),
(11, '2021_03_27_114656_create_projects_table', 2),
(12, '2021_03_27_120037_add_projectname_to_tickets_table', 3),
(13, '2021_04_16_102712_create_profiles_table', 4),
(14, '2021_04_16_203324_add_submittedby_to_tickets', 5),
(15, '2014_10_12_200000_update_users_table', 6),
(16, '2021_04_24_105646_add_submittedby_to_tickets_table', 7),
(17, '2021_04_24_111815_add_createdby_to_projects_table', 8),
(18, '2021_04_24_112437_create__model_has_project_table', 9),
(19, '2021_04_24_113325_add_assignedto_to_tickets_table', 10),
(20, '2021_04_24_121926_add_id_tomodelhasproject_table', 11),
(21, '2021_04_24_204047_add_projectid_to-ticketstable', 12),
(22, '2021_04_25_110259_change_modelhasprojecttable_name', 13);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 20),
(2, 'App\\Models\\User', 18),
(2, 'App\\Models\\User', 24),
(2, 'App\\Models\\User', 26),
(2, 'App\\Models\\User', 29),
(3, 'App\\Models\\User', 19),
(3, 'App\\Models\\User', 23),
(3, 'App\\Models\\User', 32);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('tarchichi124@gmail.com', '$2y$10$0Y0bOF0vE9p.REJP7MWRd.a/FVeul6kqTcj4jBceuTdgc4Zk5oDsG', '2021-04-16 08:20:18');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', '2021-03-27 08:36:58', '2021-03-27 08:36:58'),
(2, 'role-create', 'web', '2021-03-27 08:36:58', '2021-03-27 08:36:58'),
(3, 'role-edit', 'web', '2021-03-27 08:36:58', '2021-03-27 08:36:58'),
(4, 'role-delete', 'web', '2021-03-27 08:36:58', '2021-03-27 08:36:58'),
(5, 'user-list', 'web', '2021-03-27 08:36:58', '2021-03-27 08:36:58'),
(6, 'user-create', 'web', '2021-03-27 08:36:58', '2021-03-27 08:36:58'),
(7, 'user-edit', 'web', '2021-03-27 08:36:58', '2021-03-27 08:36:58'),
(8, 'user-delete', 'web', '2021-03-27 08:36:58', '2021-03-27 08:36:58'),
(9, 'ticket-list', 'web', '2021-03-27 08:36:58', '2021-03-27 08:36:58'),
(10, 'ticket-create', 'web', '2021-03-27 08:36:58', '2021-03-27 08:36:58'),
(11, 'ticket-edit', 'web', '2021-03-27 08:36:58', '2021-03-27 08:36:58'),
(12, 'ticket-delete', 'web', '2021-03-27 08:36:59', '2021-03-27 08:36:59'),
(13, 'project-list', 'web', '2021-03-27 08:36:59', '2021-03-27 08:36:59'),
(14, 'project-create', 'web', '2021-03-27 08:36:59', '2021-03-27 08:36:59'),
(15, 'project-edit', 'web', '2021-03-27 08:36:59', '2021-03-27 08:36:59'),
(16, 'project-delete', 'web', '2021-03-27 08:36:59', '2021-03-27 08:36:59');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user.png',
  `Nationality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Area` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Building` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `floor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` int(11) NOT NULL,
  `phone` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `image`, `Nationality`, `city`, `Area`, `street`, `Building`, `floor`, `mobile`, `phone`, `created_at`, `updated_at`) VALUES
(1, 1, '1622369850-.png', 'lebanese', 'taalabaya', 'bekaa', 'al reef', 'building', 'first', 76823486, 8507338, NULL, '2021-06-05 05:21:39'),
(4, 18, '1622371066-.png', 'lebanese', 'taalabaya', 'bekaa', 'al reef', 'na', 'first', 76823486, 8507338, '2021-05-08 15:15:58', '2021-05-30 07:37:46'),
(5, 19, 'Koala.png', 'lebanese', 'taalabaya', 'bekaa', 'al reef', 'na', 'first', 12345678, 12345678, '2021-05-08 15:17:12', '2021-05-08 15:17:12'),
(10, 23, 'Koala.png', 'lebanese', 'zahle', 'bekaa', 'liberty street', 'building', 'first', 76823486, 8507338, '2021-05-08 16:57:04', '2021-06-05 05:22:11'),
(11, 24, 'Koala.png', 'Syrian', 'Damascus', 'Damascus', 'na', 'na', 'na', 11311331, 23131313, '2021-05-09 09:06:54', '2021-06-05 05:25:01');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ProjectName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `createdby` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `ProjectName`, `Description`, `created_at`, `updated_at`, `createdby`) VALUES
(12, 'SMS', 'this is a management system for a school', '2021-05-09 09:18:33', '2021-06-05 05:13:48', 1),
(13, 'gym web app', 'this is an online system to manage gym membership', '2021-05-11 07:51:08', '2021-06-05 05:12:31', 1),
(15, 'clothing store', 'this is an ecommerce web app', '2021-05-12 10:35:41', '2021-06-05 05:11:50', 1),
(16, 'health app', 'this app will track health properties of the user', '2021-06-04 16:55:59', '2021-06-05 05:11:11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2021-03-27 08:36:59', '2021-03-27 08:36:59'),
(2, 'developer', 'web', '2021-03-27 08:36:59', '2021-03-27 08:36:59'),
(3, 'tester', 'web', '2021-03-27 08:37:00', '2021-03-27 08:37:00');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
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
(9, 2),
(9, 3),
(10, 2),
(10, 3),
(11, 1),
(11, 2),
(12, 1),
(13, 1),
(13, 2),
(13, 3),
(14, 1),
(15, 1),
(16, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Bugname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Priority` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `solution` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `submittedby` bigint(20) UNSIGNED NOT NULL,
  `assignedto` bigint(20) UNSIGNED DEFAULT NULL,
  `projectid` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `Bugname`, `Priority`, `Description`, `status`, `solution`, `created_at`, `updated_at`, `submittedby`, `assignedto`, `projectid`) VALUES
(26, 'home button', 'MEDIUM', 'home button not working', 'SOLVED', 'change href', '2021-05-12 07:42:15', '2021-05-16 16:56:35', 18, 18, 12),
(28, 'app crashing', 'HIGH', 'app not opening', 'INPROGRESS', NULL, '2021-05-16 15:04:09', '2021-06-05 05:35:48', 18, 18, 13),
(30, 'not responsive', 'HIGH', 'not viewable on mobile devices', 'SOLVED', 'kadaldklalkdlkda', '2021-05-23 15:02:15', '2021-05-27 15:43:10', 24, 18, 15),
(31, 'kldnad', 'HIGH', 'maskdjkj', 'child', NULL, '2021-05-23 15:02:27', '2021-05-23 15:02:27', 24, 1, 15),
(33, 'ksdkjdj', 'HIGH', 'jakdjkslkjdad', 'NEW', NULL, '2021-05-24 06:38:55', '2021-05-24 06:38:55', 18, 1, 15),
(34, 'njcnjncsa', 'HIGH', 'jakdjkslkjdad', 'NEW', NULL, '2021-05-27 16:24:24', '2021-05-27 16:24:24', 18, 1, 13),
(35, 'dnajndjsdn', 'HIGH', 'knkn', 'NEW', NULL, '2021-05-27 16:24:40', '2021-05-27 16:24:40', 18, 1, 15),
(37, 'oijsdajdiasd', 'HIGH', 'kknnasdad', 'NEW', NULL, '2021-05-28 07:29:52', '2021-05-28 07:29:52', 18, 1, 13),
(38, 'prices', 'HIGH', 'price conversion to lira not working', 'INPROGRESS', NULL, '2021-05-29 07:53:20', '2021-06-05 05:34:44', 19, 18, 15),
(40, 'not responsive', 'HIGH', 'not working on phones', 'INPROGRESS', NULL, '2021-05-30 07:27:49', '2021-06-05 05:34:35', 19, 18, 15),
(41, 'not responsive', 'HIGH', 'not working on tablets', 'INPROGRESS', NULL, '2021-05-30 07:28:01', '2021-06-05 05:33:19', 19, 18, 15),
(42, 'clothes pictures', 'HIGH', 'pictures not displayed properly', 'INPROGRESS', NULL, '2021-05-30 07:28:59', '2021-06-05 05:32:58', 19, 18, 15),
(44, 'button not working', 'HIGH', 'back button not working', 'SOLVED', 'change the href', '2021-06-04 15:35:34', '2021-06-05 05:32:19', 19, 18, 15),
(47, 'test1', 'HIGH', 'test1', 'NEW', NULL, '2021-06-05 05:53:30', '2021-06-05 05:53:30', 19, 1, 15);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'tarek', 'admin@gmail.com', NULL, '$2y$10$xy7aToBo3aftIy965hPfzemO2ziy8xd41PAMn5QEGIDzQ/aNjmwai', NULL, '2021-03-27 08:54:26', '2021-05-08 15:18:34'),
(18, 'ali', 'developer@gmail.com', NULL, '$2y$10$PJ4ziEdL0ufe.OK/tF8gBO0ficPCGtcXUSqBE14qmVAptT79BCmRa', NULL, '2021-05-08 15:14:19', '2021-05-08 15:17:47'),
(19, 'samer', 'tester@gmail.com', NULL, '$2y$10$ISvul2ndCNz9QG76mtGcbuRLX9Nys344GyThS40O3DtDgsug/I6wG', NULL, '2021-05-08 15:16:44', '2021-05-08 15:18:07'),
(23, 'hassan', 'tarchichi124@gmail.com', NULL, '$2y$10$IdbIQHldTG.d/FwnP/vaY.xraYYZW2iIv/VQqNxflcGCC4Jjh0pDu', NULL, '2021-05-08 16:56:47', '2021-05-08 16:56:47'),
(24, 'mohamad', 'mohamad@gmail.com', NULL, '$2y$10$BF12hvA2VqK8lh5Mero9w.GGaMSQZTfvILkyTq5fc8ewz6frnSC3q', NULL, '2021-05-09 09:06:31', '2021-06-05 05:23:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD KEY `modelhasproject_projectid_foreign` (`projectid`),
  ADD KEY `modelhasproject_modelid_foreign` (`modelid`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiles_user_id_foreign` (`user_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ProjectName` (`ProjectName`),
  ADD KEY `projects_createdby_foreign` (`createdby`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_submittedby_foreign` (`submittedby`),
  ADD KEY `tickets_assignedto_foreign` (`assignedto`),
  ADD KEY `tickets_projectid_foreign` (`projectid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `modelhasproject_modelid_foreign` FOREIGN KEY (`modelid`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `modelhasproject_projectid_foreign` FOREIGN KEY (`projectid`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_createdby_foreign` FOREIGN KEY (`createdby`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_assignedto_foreign` FOREIGN KEY (`assignedto`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tickets_projectid_foreign` FOREIGN KEY (`projectid`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tickets_submittedby_foreign` FOREIGN KEY (`submittedby`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
