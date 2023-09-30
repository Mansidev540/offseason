-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2023 at 07:17 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `offseason`
--

-- --------------------------------------------------------

--
-- Table structure for table `athlete`
--

CREATE TABLE `athlete` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `athlete_name` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip_code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `athlete`
--

INSERT INTO `athlete` (`id`, `athlete_name`, `user_id`, `school_name`, `phone_no`, `gender`, `dob`, `address`, `city`, `state`, `zip_code`, `created_at`, `updated_at`, `image`) VALUES
(1, 'BRAXTON CHATMAN', '13', 'Football', '90909000', 'female', '2023-06-22', 'Gujatat', 'test', 'Delhi', '2222', '2023-06-18 07:22:40', '2023-08-29 23:20:09', 'eHCily0kNqbdMxHD.png'),
(2, 'test', '14', 'Basball', '90909090', 'female', '2023-06-24', 'Delhi', 'test', 'Delhi', '2222', '2023-06-23 05:45:09', '2023-06-23 05:45:09', '');

-- --------------------------------------------------------

--
-- Table structure for table `club`
--

CREATE TABLE `club` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `club_name` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip_code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `club`
--

INSERT INTO `club` (`id`, `club_name`, `user_id`, `phone_no`, `address`, `city`, `state`, `zip_code`, `created_at`, `updated_at`, `image`) VALUES
(1, 'cover all base', '11', '89898989898', 'test', 'rajkot', 'Delhi', '11111', '2023-06-15 06:20:57', '2023-08-29 23:10:23', 'vygQQsgWNUYIqY6t.png'),
(2, 'test club', '15', '69898989898', 'test', 'test', 'Delhi', '11111', '2023-07-11 01:07:04', '2023-07-11 01:07:04', '');

-- --------------------------------------------------------

--
-- Table structure for table `club_calender`
--

CREATE TABLE `club_calender` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `club_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `member_id` varchar(255) NOT NULL,
  `roster_id` varchar(255) NOT NULL,
  `service_id` varchar(255) NOT NULL,
  `rental_id` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `trainer_rate` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `schedule` int(10) DEFAULT NULL,
  `booking_rate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `club_calender`
--

INSERT INTO `club_calender` (`id`, `date`, `time`, `club_id`, `user_id`, `member_id`, `roster_id`, `service_id`, `rental_id`, `duration`, `trainer_rate`, `total`, `created_at`, `updated_at`, `schedule`, `booking_rate`) VALUES
(10, '09/15/2023', '9:00AM', '1', '11', '2', '1', '3', '4', '1', '80', '109', '2023-09-22 07:38:07', '2023-09-22 07:38:07', NULL, '9'),
(13, '09/15/2023', '9:00AM', '1', '11', '2', '1', '3', '7', '1', '80', '165', '2023-09-26 05:47:12', '2023-09-26 05:47:12', NULL, '15');

-- --------------------------------------------------------

--
-- Table structure for table `club_module`
--

CREATE TABLE `club_module` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone_no` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zip_code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `card_name` varchar(255) DEFAULT NULL,
  `card_no` varchar(255) DEFAULT NULL,
  `valid_date` varchar(255) DEFAULT NULL,
  `sec_code` varchar(255) DEFAULT NULL,
  `billing_zip_code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `user_id`, `name`, `phone_no`, `address`, `city`, `state`, `zip_code`, `created_at`, `updated_at`, `card_name`, `card_no`, `valid_date`, `sec_code`, `billing_zip_code`) VALUES
(2, '11', 'text', '099090000', 'text1', 'text', 'Rajasthan', '7878787', '2023-09-04 04:57:06', '2023-09-04 05:13:57', 'text', '878787878787', '2023-09-06', '8', '787878'),
(3, '11', NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-04 04:59:56', '2023-09-04 04:59:56', 'text', '900909090', '2023-09-29', '123', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `member_wallet`
--

CREATE TABLE `member_wallet` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_06_07_110224_add_column_to_users', 2),
(6, '2023_06_15_053141_create_club_table', 3),
(7, '2023_06_15_053207_create_athlete_table', 3),
(8, '2023_06_23_055829_create_rental_table', 4),
(9, '2023_06_23_055908_create_service_table', 4),
(12, '2023_06_29_041610_create_club_module_table', 5),
(13, '2023_07_05_093848_create_opration_table', 5),
(14, '2023_07_28_122041_create_member_table', 6),
(15, '2023_07_28_123453_create_member_wallet_table', 6),
(16, '2023_08_30_042359_add_column_to_club', 7),
(17, '2023_08_30_042444_add_column_to_athlete', 7),
(18, '2023_09_04_095601_add_column_to_member', 8),
(19, '2023_09_06_061210_create_schedule_table', 9),
(20, '2023_09_08_115639_add_column_schedule_table', 10),
(21, '2023_09_11_102310_create_club_calender_table', 11),
(22, '2023_09_12_040507_create_trainer_calender_table', 12),
(23, '2023_09_25_164558_add_stripe_id_to_user_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `opration`
--

CREATE TABLE `opration` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `club_id` varchar(255) NOT NULL,
  `club_fee` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `monday_status` varchar(255) NOT NULL,
  `monday_open_time` varchar(255) NOT NULL,
  `monday_close_time` varchar(255) NOT NULL,
  `tuesday_status` varchar(255) NOT NULL,
  `tuesday_open_time` varchar(255) NOT NULL,
  `tuesday_close_time` varchar(255) NOT NULL,
  `wednesday_status` varchar(255) NOT NULL,
  `wednesday_open_time` varchar(255) NOT NULL,
  `wednesday_close_time` varchar(255) NOT NULL,
  `thursday_status` varchar(255) NOT NULL,
  `thursday_open_time` varchar(255) NOT NULL,
  `thursday_close_time` varchar(255) NOT NULL,
  `friday_status` varchar(255) NOT NULL,
  `friday_open_time` varchar(255) NOT NULL,
  `friday_close_time` varchar(255) NOT NULL,
  `saturday_status` varchar(255) NOT NULL,
  `saturday_open_time` varchar(255) NOT NULL,
  `saturday_close_time` varchar(255) NOT NULL,
  `sunday_status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `opration`
--

INSERT INTO `opration` (`id`, `club_id`, `club_fee`, `rate`, `monday_status`, `monday_open_time`, `monday_close_time`, `tuesday_status`, `tuesday_open_time`, `tuesday_close_time`, `wednesday_status`, `wednesday_open_time`, `wednesday_close_time`, `thursday_status`, `thursday_open_time`, `thursday_close_time`, `friday_status`, `friday_open_time`, `friday_close_time`, `saturday_status`, `saturday_open_time`, `saturday_close_time`, `sunday_status`, `created_at`, `updated_at`) VALUES
(2, '1', '20', '80', 'open', '8:00 AM', '8:00 AM', 'open', '8:00 AM', '8:00 AM', 'open', '8:00 AM', '8:00 AM', 'open', '8:00 AM', '8:00 AM', 'open', '8:00 AM', '8:00 AM', 'open', '8:00 AM', '8:00 AM', 'closed', '2023-09-24 05:26:07', '2023-09-24 05:26:07');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rental`
--

CREATE TABLE `rental` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `club_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rental`
--

INSERT INTO `rental` (`id`, `name`, `image`, `price`, `user_id`, `club_id`, `created_at`, `updated_at`) VALUES
(4, 'Cage 1', '1He7qiGzIjMLRZOB.png', '20', 11, 1, '2023-06-23 07:04:51', '2023-09-22 05:56:20'),
(7, 'Cage 2', 'oMzDUKnoyZG8yeuH.png', '70', 11, 1, '2023-06-23 10:23:34', '2023-09-22 05:56:10'),
(8, 'Cage 3', 'jwSy2xOQ090TrkpA.png', '50', 11, 1, '2023-09-22 05:56:34', '2023-09-22 05:56:34');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `club_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `member_id` varchar(255) DEFAULT NULL,
  `booking_rate` varchar(255) DEFAULT NULL,
  `available` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `club_id`, `user_id`, `date`, `time`, `created_at`, `updated_at`, `member_id`, `booking_rate`, `available`) VALUES
(4, '1', '13', '09/15/2023', '9:00AM,3:00PM,4:00PM,9:00PM,10:00PM', '2023-09-17 05:47:02', '2023-09-19 06:37:07', NULL, '80', 'on'),
(6, '1', '13', '09/16/2023', '8:00AM,10:00AM,4:00PM,9:00PM,10:00PM', '2023-09-17 05:49:36', '2023-09-17 05:49:36', NULL, '84', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `club_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `name`, `user_id`, `club_id`, `created_at`, `updated_at`) VALUES
(3, 'test', 11, 1, '2023-06-23 10:22:48', '2023-06-23 10:22:48'),
(4, 'test2', 11, 1, '2023-06-23 10:23:08', '2023-06-23 10:23:08');

-- --------------------------------------------------------

--
-- Table structure for table `trainer_calender`
--

CREATE TABLE `trainer_calender` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `club_calender_id` varchar(255) NOT NULL,
  `net` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trainer_calender`
--

INSERT INTO `trainer_calender` (`id`, `user_id`, `club_calender_id`, `net`, `created_at`, `updated_at`, `deleted_at`) VALUES
(15, '13', '10', '57.6', '2023-09-29 23:46:47', '2023-09-29 23:46:47', NULL),
(16, '13', '13', '57.6', '2023-09-29 23:47:05', '2023-09-29 23:47:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `l_name` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `stripe_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `l_name`, `phone_no`, `role`, `stripe_id`) VALUES
(10, 'chirag', 'chiragthakkar356@gmail.com', NULL, '$2y$10$FKbvohiiWtIfFV3cnKuuDOqyJ3VEz3R1DVVNLOpdKqT5hbe5yDMo.', NULL, '2023-06-08 08:12:03', '2023-06-08 08:12:03', 'thakkar', '123456', 'club', NULL),
(11, 'mansi 4', 'mansi.dev540@gmail.com', NULL, '$2y$10$xP/gwyMQ2l9JxMetDKfTWejTWEAGSxgBgxZR2paUZx3cL.fkDeYU2', NULL, '2023-06-15 06:16:24', '2023-09-26 01:26:20', 'govani1', '89898989898', 'club', 'cus_Ohv1djBQ2CyXqd'),
(13, 'BRAXTON1', 'test1@gmail.com', NULL, '$2y$10$8t8ImTL47dNw4BQWbxrfZOfXYP0ChTNZ5iEG14dTZO8HI91e3JPKe', NULL, '2023-06-18 07:18:39', '2023-06-23 10:26:43', 'CHATMAN', '9000909089', 'athelet', NULL),
(14, 'test', 'test2@gmail.com', NULL, '$2y$10$mxVQFwcO6ESc5bBFYw1X3O0e3LZ9qqAU.Jra4lN2tu3u.WLqtDzEa', NULL, '2023-06-23 05:44:07', '2023-06-23 05:45:46', 'test 1', '909090901', 'athelet', NULL),
(15, 'test', 'test1010@gmail.com', NULL, '$2y$10$nUaU2jfcJ6aSn8i0b8jArOIXkts.jsZw8E/64udkWs6NHTo2uTWf6', NULL, '2023-07-11 01:05:36', '2023-07-11 01:05:36', 'test', '89898989898', 'club', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `athlete`
--
ALTER TABLE `athlete`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `club`
--
ALTER TABLE `club`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `club_calender`
--
ALTER TABLE `club_calender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `club_module`
--
ALTER TABLE `club_module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_wallet`
--
ALTER TABLE `member_wallet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opration`
--
ALTER TABLE `opration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rental`
--
ALTER TABLE `rental`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainer_calender`
--
ALTER TABLE `trainer_calender`
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
-- AUTO_INCREMENT for table `athlete`
--
ALTER TABLE `athlete`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `club`
--
ALTER TABLE `club`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `club_calender`
--
ALTER TABLE `club_calender`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `club_module`
--
ALTER TABLE `club_module`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `member_wallet`
--
ALTER TABLE `member_wallet`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `opration`
--
ALTER TABLE `opration`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rental`
--
ALTER TABLE `rental`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `trainer_calender`
--
ALTER TABLE `trainer_calender`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
