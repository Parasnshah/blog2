-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2019 at 06:00 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` int(10) UNSIGNED NOT NULL,
  `log_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `subject_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` int(11) DEFAULT NULL,
  `causer_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `properties` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_id`, `subject_type`, `causer_id`, `causer_type`, `properties`, `created_at`, `updated_at`) VALUES
(1, 'default', 'LoggedIn', NULL, NULL, 1, 'App\\User', '[]', '2019-08-26 12:47:15', '2019-08-26 12:47:15'),
(2, 'default', 'LoggedIn', NULL, NULL, 1, 'App\\User', '[]', '2019-08-26 12:48:22', '2019-08-26 12:48:22'),
(3, 'default', 'LoggedIn', NULL, NULL, 1, 'App\\User', '[]', '2019-11-01 04:12:27', '2019-11-01 04:12:27'),
(4, 'default', 'LoggedIn', NULL, NULL, 1, 'App\\User', '[]', '2019-11-16 09:47:16', '2019-11-16 09:47:16'),
(5, 'default', 'LoggedIn', NULL, NULL, 1, 'App\\User', '[]', '2019-11-19 10:23:13', '2019-11-19 10:23:13'),
(6, 'default', 'LoggedIn', NULL, NULL, 1, 'App\\User', '[]', '2019-11-22 10:00:36', '2019-11-22 10:00:36'),
(7, 'default', 'LoggedIn', NULL, NULL, 2, 'App\\User', '[]', '2019-11-26 06:50:58', '2019-11-26 06:50:58'),
(8, 'default', 'LoggedIn', NULL, NULL, 2, 'App\\User', '[]', '2019-11-26 06:51:53', '2019-11-26 06:51:53'),
(9, 'default', 'LoggedIn', NULL, NULL, 2, 'App\\User', '[]', '2019-11-26 07:37:34', '2019-11-26 07:37:34'),
(10, 'default', 'LoggedIn', NULL, NULL, 2, 'App\\User', '[]', '2019-11-26 11:08:39', '2019-11-26 11:08:39'),
(11, 'default', 'LoggedIn', NULL, NULL, 2, 'App\\User', '[]', '2019-11-29 05:41:26', '2019-11-29 05:41:26'),
(12, 'default', 'LoggedIn', NULL, NULL, 2, 'App\\User', '[]', '2019-11-30 04:39:17', '2019-11-30 04:39:17'),
(13, 'default', 'LoggedIn', NULL, NULL, 2, 'App\\User', '[]', '2019-11-30 05:37:20', '2019-11-30 05:37:20'),
(14, 'default', 'LoggedIn', NULL, NULL, 2, 'App\\User', '[]', '2019-11-30 05:53:42', '2019-11-30 05:53:42'),
(15, 'default', 'LoggedIn', NULL, NULL, 2, 'App\\User', '[]', '2019-11-30 05:54:49', '2019-11-30 05:54:49'),
(16, 'default', 'LoggedIn', NULL, NULL, 2, 'App\\User', '[]', '2019-11-30 06:06:50', '2019-11-30 06:06:50'),
(17, 'default', 'LoggedIn', NULL, NULL, 2, 'App\\User', '[]', '2019-11-30 06:07:44', '2019-11-30 06:07:44'),
(18, 'default', 'LoggedIn', NULL, NULL, 2, 'App\\User', '[]', '2019-12-11 04:50:40', '2019-12-11 04:50:40'),
(19, 'default', 'LoggedIn', NULL, NULL, 24, 'App\\User', '[]', '2019-12-11 04:58:55', '2019-12-11 04:58:55');

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
(2, '2019_06_15_070621_add_mobile_user', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','in-active') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'in-active',
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `mobile`, `image`, `status`, `role`, `remember_token`, `created_at`, `created_from`, `updated_at`, `deleted_at`) VALUES
(1, 'paras', 'parasshah438@gmail.com', NULL, '$2y$10$UIzQ0z1/BMunWMjO40fdNOstEq6FlqjSMRAIedU6I3bJ0KrD838Qe', '8634985698', 'admins.jpg', 'in-active', 'admin', NULL, '2019-08-26 12:42:30', NULL, '2019-11-30 06:24:17', NULL),
(2, 'demo', 'demo@gmail.com', NULL, '$2y$10$MVdO6kfLmCRBTzCohsIbjOmx7fDPq3kz8/UmfH1wzJsHOAy4zR9yC', '9834985695', '236832.png', 'in-active', 'admin', NULL, '2019-11-02 07:40:03', NULL, '2019-11-30 06:23:57', NULL),
(3, 'test', 'test@gmail.com', NULL, '$2y$10$n0Ne.aurC7/ezkmUIgTLRuBJY.5rMkThcJCCzHggmytacQBXe1pyu', NULL, NULL, 'active', 'user', NULL, '2019-11-26 06:54:01', NULL, '2019-11-30 05:03:37', NULL),
(7, 'test', 'test123@gmail.com', NULL, '$2y$10$w8mZnS3J30pwWD9/TEXMLOCCp.iGdMZfz9S8XDdHimQIJuZM29gCK', NULL, NULL, 'active', 'user', NULL, '2019-11-26 09:42:31', NULL, '2019-11-30 05:03:49', NULL),
(8, 'demo', 'demo123@gmail.com', NULL, '$2y$10$klCt3l34iNE9fK0tsHKFl.xTNNK4SIpKlU23c4CRK8ebHv.72yv.O', NULL, NULL, 'active', 'user', NULL, '2019-11-26 09:44:00', NULL, '2019-11-30 05:03:45', NULL),
(9, 'dfg', 'df2@gmail.com', NULL, '$2y$10$BdaVjswuw/oSX.i38aKiouf3O1NtX6Hwb0/.BLJqH89Ee3/4zDg0S', NULL, NULL, 'active', 'user', NULL, '2019-11-26 09:46:08', NULL, '2019-11-30 05:03:42', NULL),
(10, 'sdf', 'sdfsdf@gmail.com', NULL, '$2y$10$KrJ5xtkDlKTtlY2yVxywl.XViIk0XT43zo88pN69mvqSS0M5mVxg.', NULL, NULL, 'active', 'user', NULL, '2019-11-26 09:46:27', NULL, '2019-11-30 05:04:01', NULL),
(11, 'dg', 'df@gmil.com', NULL, '$2y$10$S9YMJmvn9p5eaPpZMiMRUe3onioD/IE7UxFrywD95YHbRQilfkHfu', NULL, NULL, 'active', 'user', NULL, '2019-11-26 09:48:51', NULL, '2019-11-30 05:03:59', NULL),
(12, 'zasdf', 'asdasd@gmail.com', NULL, '$2y$10$oLB.UKBlaY/UmeGF/hqMBucL14Bu3ekFu8QGOg5biyZ6R7RKnThka', NULL, NULL, 'active', 'user', NULL, '2019-11-26 09:49:03', NULL, '2019-11-30 05:03:58', NULL),
(13, 'shdfsjh', 'hsdf@gmail.com', NULL, '$2y$10$.ipLsI0riHbFh2VEUk16Nu0IXHHosNepW/.k0QNBPiwY7q/I907t6', NULL, NULL, 'active', 'user', NULL, '2019-11-26 09:49:14', NULL, '2019-11-30 05:03:58', NULL),
(14, 'asdb', 'ksbdk@gmail.com', NULL, '$2y$10$jQAE.j1.8jgBVU7x175SLeTaXbkpVYFeNfDJIj4gb7aQiz05yCZYW', '9834985698', '13_404_Error.png', 'active', 'user', NULL, '2019-11-26 10:04:32', NULL, '2019-11-30 05:03:57', NULL),
(15, 'sdfsbdlb', 'klbsklb@gmail.co', NULL, '$2y$10$PO4vf.jt1Hyn9gVOnCALM.A0PCcjk4KrwRBTUJNOOIoC6ZP/A0foK', '9845985687', '796854.jpg', 'active', 'user', NULL, '2019-11-26 10:04:46', NULL, '2019-11-30 05:03:56', NULL),
(16, 'jay', 'jaypatel@gmail.com', NULL, '$2y$10$81fA/c6z.XIGlNJlpGyNzerxhybvjvGXo3r8RBQqKyaCg9tDfq0EO', '9898120235', '767277.jpg', 'active', 'user', NULL, '2019-11-26 10:04:56', NULL, '2019-11-30 05:03:55', NULL),
(17, 'sona', 'sona@gmail.com', NULL, '$2y$10$DZcVNA6bXPQTshI3A/9ghO02KpULHph4OlNWnJtNtT6Z5YxYMHwnK', '9898120234', 'food.jpg', 'active', 'user', NULL, '2019-11-26 10:10:39', NULL, '2019-11-30 05:03:37', NULL),
(18, 'dgd', 'fgdgd@gmail.com', NULL, '$2y$10$T8qf3/7GzXea5GOwkeLq1.GDQE48gyLdVjH3NOoRiPwN6H7AyZzdG', NULL, NULL, 'in-active', 'user', NULL, '2019-11-26 10:10:49', NULL, '2019-11-26 10:10:55', '2019-11-26 10:10:55'),
(19, 'sdkfjbqkj', 'dfgkdf@gmail.com', NULL, '$2y$10$mNbJUT.OfQEZGzx37OvYre/KHE/Iajo9jy/SPuh9rRFCIJfHmDOvi', NULL, NULL, 'in-active', 'user', NULL, '2019-11-26 10:32:41', NULL, '2019-11-26 11:12:42', '2019-11-26 11:12:42'),
(20, 'dfg', 'dfg@gmail.com', NULL, '$2y$10$expOHnEQs1mp.HE1iG0AvuYtnsQTqFOAJSfRXct.ym7gir3KatLGO', NULL, NULL, 'in-active', 'user', NULL, '2019-11-26 10:32:55', NULL, '2019-11-26 11:12:42', '2019-11-26 11:12:42'),
(21, 'asdk', 'sbdkf@gmail.com', NULL, '$2y$10$TXyqVn7G3Hp54pmT6lGySOos4lC2DEZo1.sMmNX41YcxN/OggFxvK', NULL, NULL, 'in-active', 'user', NULL, '2019-11-26 10:33:05', NULL, '2019-11-26 11:12:09', '2019-11-26 11:12:09'),
(22, 'asdkasbdk', 'kjbaskbsda@gmail.com', NULL, '$2y$10$dwIsvg5Vx.8gLeY1r0uoI.bjooBSSn9r4RDZ6KO5fG4NuxEVOEu5i', NULL, NULL, 'in-active', 'user', NULL, '2019-11-26 10:33:15', NULL, '2019-11-29 06:10:49', '2019-11-29 06:10:49'),
(23, 'kajal', 'kajal@gmail.com', NULL, '$2y$10$rVmhQoD7Ky00xK7fhs7u2OTf954h20y63lySb0PRNQ.kes5eesEdW', '9845906789', NULL, 'active', 'user', NULL, '2019-11-29 09:59:04', NULL, '2019-12-11 04:50:53', '2019-12-11 04:50:53'),
(24, 'riddhi', 'riddhi@gmail.com', NULL, '$2y$10$zCbZy6dQcq2XNyFCXwLm0ek07OPbmKXLU6OWHwIUpivhyFJaUC.xm', '9834985699', NULL, 'active', 'user', NULL, '2019-11-29 10:02:50', NULL, '2019-11-30 05:03:39', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_log_log_name_index` (`log_name`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
