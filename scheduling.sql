-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2022 at 08:08 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scheduling`
--

-- --------------------------------------------------------

--
-- Table structure for table `credentials`
--

CREATE TABLE `credentials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purpose` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `payment_proof_filename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `decline_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scheduled_date` date DEFAULT NULL,
  `status` enum('pending','scheduled','declined') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `credential_type` enum('Barangay Clearance','Barangay ID','Barangay Certificate') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Barangay Clearance',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `credentials`
--

INSERT INTO `credentials` (`id`, `purpose`, `user_id`, `payment_proof_filename`, `decline_reason`, `scheduled_date`, `status`, `credential_type`, `created_at`, `updated_at`) VALUES
(8, 'Educational Assisstance', 6, NULL, NULL, NULL, 'pending', 'Barangay Clearance', '2022-09-28 18:42:48', '2022-09-28 18:42:48'),
(9, 'Educational Assisstance', 6, 'https://firebasestorage.googleapis.com/v0/b/manuyodos-b8edc.appspot.com/o/109i6enHcTsf4cygXx86?alt=media&token=b72d1a40-54d1-4a06-877c-97230a51ec23', NULL, '2022-10-14', 'scheduled', 'Barangay ID', '2022-10-01 03:23:35', '2022-10-01 03:23:35'),
(10, 'Job Application', 6, NULL, NULL, NULL, 'pending', 'Barangay Clearance', '2022-10-01 03:24:03', '2022-10-01 03:24:03'),
(11, 'Educational Assisstance', 6, NULL, NULL, NULL, 'pending', 'Barangay Clearance', '2022-10-01 03:34:16', '2022-10-01 03:34:16'),
(12, 'Educational Assisstance', 6, NULL, NULL, NULL, 'pending', 'Barangay Certificate', '2022-10-01 03:34:20', '2022-10-01 03:34:20'),
(13, 'Job Application', 6, 'https://firebasestorage.googleapis.com/v0/b/manuyodos-b8edc.appspot.com/o/UH19rrsDrNiJhPnRFv1j?alt=media&token=8584ba81-2ef3-4562-869f-2c2296869697', NULL, NULL, 'pending', 'Barangay ID', '2022-10-01 03:34:32', '2022-10-01 03:34:32');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `venue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purpose` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_name`, `date`, `venue`, `purpose`, `event_filename`, `created_at`, `updated_at`) VALUES
(5, 'Barangay Peace and Order', '2022-09-08', 'Manuyo Dos Covered Court', 'Educational Assisstance', 'https://firebasestorage.googleapis.com/v0/b/manuyodos-b8edc.appspot.com/o/2OaQ6LqYOOz1cVQNjRyx?alt=media&token=5c0ae5bc-c857-40d3-8985-6488b065a4db', '2022-09-28 02:03:25', '2022-09-28 02:03:25'),
(6, 'Clean & Green', '2022-10-19', 'Chico Street2', 'Clean', 'https://firebasestorage.googleapis.com/v0/b/manuyodos-b8edc.appspot.com/o/QG4Jgw9ucYgqnRJP4l4a?alt=media&token=d787b263-7dd1-45b4-9951-95a0e0b0f135', '2022-10-01 03:29:07', '2022-10-02 15:48:50');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_09_15_064101_create_officials_table', 1),
(6, '2022_09_16_061955_create_events_table', 1),
(7, '2022_09_21_063430_create_credentials_table', 1),
(8, '2022_09_22_003312_create_permits_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `officials`
--

CREATE TABLE `officials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position_level` int(11) NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `civilStatus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cellphone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userType` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `officials`
--

INSERT INTO `officials` (`id`, `first_name`, `last_name`, `profile_filename`, `birthdate`, `position`, `position_level`, `department`, `civilStatus`, `cellphone_number`, `userType`, `email`, `address`, `password`, `created_at`, `updated_at`, `remember_token`) VALUES
(14, 'Mark', 'Nery', 'https://firebasestorage.googleapis.com/v0/b/manuyodos-b8edc.appspot.com/o/CZ2478JlIINka3EszBZn?alt=media&token=3d9d5c4b-03c0-4d66-8dfc-fad62f9d90d1', '2022-09-24', 'Punong Barangay', 1, ' ', 'single', '+6399398322288', 'admin', 'nery@gmail.com', '3039-C Chromium St. , Brgy. San Nicolas 3 ,Platinumville Cmpnd., Greenvalley', '$2y$10$rlhUFpfRM/PMhTtZ5GG5n.AOsZ45q./PYIv7J3lKZJ6.CxrG20eXi', '2022-09-28 01:40:59', '2022-09-28 01:40:59', 'FDWrrsJLaTJfhEGCYfi6JS3YIZpa8xBKGqSTDkXA7O9S0IWnfQj8h9UZzi0e'),
(15, 'Jocelyn ', 'Mesa', 'https://firebasestorage.googleapis.com/v0/b/manuyodos-b8edc.appspot.com/o/dwwtnvvFrGT2DeO1fYzR?alt=media&token=21dfe5c7-59cb-4379-91bd-d5bb87673cd8', '2022-10-11', 'Chairman', 2, 'Livelihood & Education', 'Married', '+6399398322288', 'admin', 'mesa@gmail.com', '3039-C Chromium St. , Brgy. San Nicolas 3 ,Platinumville Cmpnd., Greenvalley', '$2y$10$vqYKP6uohLxey1/nHVAiauCB9dCtZPELLCjohxlDFbywZTr3QL3Ki', '2022-10-01 03:27:30', '2022-10-01 03:27:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permits`
--

CREATE TABLE `permits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_proof_filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `decline_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scheduled_date` date DEFAULT NULL,
  `status` enum('pending','scheduled','declined') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permits`
--

INSERT INTO `permits` (`id`, `user_id`, `business_location`, `business_type`, `business_name`, `payment_proof_filename`, `decline_reason`, `scheduled_date`, `status`, `created_at`, `updated_at`) VALUES
(4, '6', '3039-C Chromium St. , Brgy. San Nicolas 3 ,Platinumville Cmpnd., Greenvalley', 'Barber Shop', 'Biglang Gwapo', 'https://firebasestorage.googleapis.com/v0/b/manuyodos-b8edc.appspot.com/o/1QxCCXtMOT1SK5L1Aqja?alt=media&token=e7f57280-fabb-444e-86d9-d9df175ec9b5', 'ID is not addressed on Manuyo Dos', NULL, 'declined', '2022-10-01 03:24:26', '2022-10-01 03:24:26');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `proof_id_filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cellphone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_verified_as_resident` tinyint(1) NOT NULL DEFAULT 0,
  `userType` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
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

INSERT INTO `users` (`id`, `address`, `profile_filename`, `first_name`, `last_name`, `birthdate`, `proof_id_filename`, `cellphone_number`, `is_verified_as_resident`, `userType`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, '3039-C Chromium St. , Brgy. San Nicolas 3 ,Platinumville Cmpnd., Greenvalley', 'https://firebasestorage.googleapis.com/v0/b/manuyodos-b8edc.appspot.com/o/fnZoRorFMowYkr6PnRUQ?alt=media&token=76d7d4f2-b89d-459a-b7b5-04c2955760fd', 'John', 'Songalia', '2000-01-01', 'https://firebasestorage.googleapis.com/v0/b/manuyodos-b8edc.appspot.com/o/F7eend1XV8HifBIaAb7P?alt=media&token=ba8efe4d-064b-4ef2-9e9c-f56aa84aa4c4', '+639398322288', 0, 'user', 'songaliajohnpaul@gmail.com', NULL, '$2y$10$xP1WaY9iUjku/XSPp5TMbeE1hu5HwFu3LoZ1hx.IgXd2Oc4vhWp92', '6imdxfNAFQdu6qtI5xyxJupu7VTxoqTKudIdUgwaf31JiAbXvpgTspcj7EVy', '2022-09-28 01:51:07', '2022-09-28 01:51:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `credentials`
--
ALTER TABLE `credentials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `officials`
--
ALTER TABLE `officials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permits`
--
ALTER TABLE `permits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `credentials`
--
ALTER TABLE `credentials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `officials`
--
ALTER TABLE `officials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `permits`
--
ALTER TABLE `permits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
