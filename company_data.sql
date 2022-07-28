-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2022 at 09:12 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `company_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `industry_id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contactPerson_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unique_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `strength` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loopholes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scopes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `user_id`, `industry_id`, `company_name`, `company_address`, `contactPerson_name`, `designation`, `contact_number`, `email`, `unique_id`, `strength`, `loopholes`, `scopes`, `created_at`, `updated_at`) VALUES
(3, 7, 2, 'Bong Digital Solutions', 'House: 48, Road: 8, Block: D', 'Forhad Hossain', 'MD', '+8801307770431', 'bongdigitalsolutions@gmail.com', 'BongDigitalSolutions2bongdigitalsolutions@gmail.com', 'test', 'test', 'test', '2022-01-17 04:47:50', '2022-01-17 04:47:50'),
(5, 1, 11, 'Delgado Preston Associates', 'Curtis Cherry Trading', 'Lev Richmond', 'Dolore irure est eni', '154', 'tujy@mailinator.com', 'DelgadoPrestonAssociates11tujy@mailinator.com', 'Neque eum qui dignis', 'Debitis quo amet do', 'Deserunt aperiam cor', '2022-01-17 06:17:22', '2022-01-17 06:17:22'),
(6, 1, 11, 'Golden Tran Co', 'Barlow Mack Traders', 'Zenaida Mays', 'Voluptas vero necess', '726', 'finalupomo@mailinator.com', 'GoldenTranCo11finalupomo@mailinator.com', 'Distinctio Cupidata', 'Aut veniam incidunt', 'A repudiandae vel do', '2022-01-18 07:10:34', '2022-01-18 07:10:34'),
(7, 7, 11, 'Conrad and Acosta LLC', 'Harrell and Blackwell Inc', 'Quon Wynn', 'Natus pariatur Nam', '578', 'xakisovat@mailinator.com', 'ConradandAcostaLLC11xakisovat@mailinator.com', 'Id et quod debitis', 'Recusandae Ut eum e', 'Quo voluptatibus fug', '2022-01-18 07:12:16', '2022-01-18 07:12:16');

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
-- Table structure for table `industries`
--

CREATE TABLE `industries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `industry_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `industries`
--

INSERT INTO `industries` (`id`, `industry_name`, `created_at`, `updated_at`) VALUES
(2, 'IT Company', '2022-01-15 22:30:51', '2022-01-15 22:30:51'),
(11, 'Health (Hospitals & Diagnostics)', '2022-01-17 06:16:37', '2022-01-20 00:05:07'),
(13, 'E-Commerce', '2022-01-20 00:05:19', '2022-01-20 00:05:19'),
(14, 'FMCG', '2022-01-20 00:05:28', '2022-01-20 00:05:28'),
(15, 'Automobile', '2022-01-20 00:05:37', '2022-01-20 00:05:37'),
(16, 'Education', '2022-01-20 00:05:43', '2022-01-20 00:05:43'),
(17, 'Food', '2022-01-20 00:05:50', '2022-01-20 00:05:50'),
(18, 'Entertainment', '2022-01-20 00:05:58', '2022-01-20 00:05:58'),
(19, 'Textiles', '2022-01-20 00:06:04', '2022-01-20 00:06:04'),
(20, 'Fashion', '2022-01-20 00:06:12', '2022-01-20 00:06:12'),
(21, 'Real Estate', '2022-01-20 00:06:23', '2022-01-20 00:06:23'),
(22, 'MFS ( Mobile Financial Service)', '2022-01-20 00:06:31', '2022-01-20 00:06:31'),
(23, 'ITES', '2022-01-20 00:06:52', '2022-01-20 00:06:52'),
(24, 'Telecommunication', '2022-01-20 00:07:00', '2022-01-20 00:07:00'),
(25, 'Electronics', '2022-01-20 00:07:05', '2022-01-20 00:07:05'),
(26, 'Home Appliances', '2022-01-20 00:07:14', '2022-01-20 00:07:14'),
(27, 'Furniture & Interior Designing', '2022-01-20 00:07:21', '2022-01-20 00:07:21'),
(28, 'Transportation & Accessories', '2022-01-20 00:07:28', '2022-01-20 00:07:28'),
(29, 'Gas & Non-Metallic Products', '2022-01-20 00:07:35', '2022-01-20 00:07:35'),
(30, 'Petroleum, Chemical & Plastic', '2022-01-20 00:07:42', '2022-01-20 00:07:42'),
(31, 'Footwear', '2022-01-20 00:07:51', '2022-01-20 00:07:51'),
(32, 'Iron, Steel & Metal Products', '2022-01-20 00:07:59', '2022-01-20 00:07:59'),
(33, 'Paper, Printing & Publishing', '2022-01-20 00:08:08', '2022-01-20 00:08:08'),
(34, 'Airlines', '2022-01-20 00:09:00', '2022-01-20 00:09:00'),
(35, 'Banks', '2022-01-20 00:09:09', '2022-01-20 00:09:09'),
(36, 'NBFIS (Non-Bank Financial Services)', '2022-01-20 00:09:17', '2022-01-20 00:09:17'),
(37, 'Finance Organization', '2022-01-20 00:09:24', '2022-01-20 00:09:24'),
(38, 'Government Agencies', '2022-01-20 00:09:31', '2022-01-20 00:09:31'),
(39, 'Pharmaceuticals', '2022-01-20 00:09:39', '2022-01-20 00:09:39');

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
(5, '2022_01_13_102003_create_industries_table', 2),
(6, '2022_01_16_062758_create_companies_table', 3);

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
('salmanhossain.shm@gmail.com', '$2y$10$WT8kbAdB1C5RieKoDtCK0.13Ilwn0wOPQ0NFS2ye4xkK7bLsMV72C', '2022-01-13 01:12:50');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
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

INSERT INTO `users` (`id`, `name`, `role`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Salman Hossain', 'admin', 'salmanhossain.shm@gmail.com', NULL, '$2y$10$toYHiSHO.4nABk4BSsKLkesgEz9HVnxale3ie8.o3tjOV3ktM.9te', NULL, '2022-01-11 03:39:10', '2022-07-19 03:39:33'),
(7, 'test user', 'user', 'test@gmail.com', NULL, '$2y$10$eZitZ1e3RPI9Wmvked2Cpen9biZDnr54XO4uNCQwcms2quAnw/nky', NULL, '2022-01-13 00:10:00', '2022-01-17 06:19:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `companies_user_id_foreign` (`user_id`),
  ADD KEY `companies_industries_id_foreign` (`industry_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `industries`
--
ALTER TABLE `industries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `industries`
--
ALTER TABLE `industries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_industries_id_foreign` FOREIGN KEY (`industry_id`) REFERENCES `industries` (`id`),
  ADD CONSTRAINT `companies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
