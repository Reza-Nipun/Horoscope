-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 26, 2021 at 10:04 AM
-- Server version: 8.0.25-0ubuntu0.20.04.1
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_horoscope`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_07_24_074142_create_zodiac_signs_table', 1),
(5, '2021_07_24_075319_create_zodiac_scores_table', 1),
(6, '2021_07_24_081747_create_zodiac_day_ratings_table', 2);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nipun', 'nipunsarker56@gmail.com', NULL, '$2y$10$vKZs5/guAojsnWG32pk3BOxXhNwrIidIclDl48JyirOSmMmhV6zti', 1, NULL, '2021-07-24 02:15:13', '2021-07-24 02:15:13');

-- --------------------------------------------------------

--
-- Table structure for table `zodiac_day_ratings`
--

CREATE TABLE `zodiac_day_ratings` (
  `id` bigint UNSIGNED NOT NULL,
  `zodiac_sign_id` bigint UNSIGNED NOT NULL,
  `zodiac_date` date NOT NULL,
  `day_score` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `zodiac_scores`
--

CREATE TABLE `zodiac_scores` (
  `id` bigint UNSIGNED NOT NULL,
  `color_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zodiac_scores`
--

INSERT INTO `zodiac_scores` (`id`, `color_code`, `created_at`, `updated_at`) VALUES
(1, '#ff0000', NULL, NULL),
(2, '#ff5500', NULL, NULL),
(3, '#ff8000', NULL, NULL),
(4, '#ffaa00', NULL, NULL),
(5, '#ffd500', NULL, NULL),
(6, '#ffff00', NULL, NULL),
(7, '#d5ff00', NULL, NULL),
(8, '#aaff00', NULL, NULL),
(9, '#80ff00', NULL, NULL),
(10, '#00ff00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `zodiac_signs`
--

CREATE TABLE `zodiac_signs` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zodiac_signs`
--

INSERT INTO `zodiac_signs` (`id`, `name`, `code`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'AQUARIUS', 'AQUARIUS', 'January 20 - February 18', 'aquarius.jpg', NULL, NULL),
(2, 'PISCES', 'PISCES', 'February 19 - March 20', 'pisces.jpg', NULL, NULL),
(3, 'ARIES', 'ARIES', 'March 21 - April 19', 'aries.jpg', NULL, NULL),
(4, 'TAURUS', 'TAURUS', 'April 20 - May 20', 'taurus.jpg', NULL, NULL),
(5, 'GEMINI', 'GEMINI', 'May 21 - June 20', 'gemini.jpg', NULL, NULL),
(6, 'CANCER', 'CANCER', 'June 21 - July 22', 'cancer.jpg', NULL, NULL),
(7, 'LEO', 'LEO', 'July 23 - August 22', 'leo.jpg', NULL, NULL),
(8, 'VIRGO', 'VIRGO', 'August 23 – September 22', 'virgo.jpg', NULL, NULL),
(9, 'LIBRA', 'LIBRA', 'September 23 - October 22', 'libra.jpg', NULL, NULL),
(10, 'SCORPIO', 'SCORPIO', 'October 23 - November 21', 'scorpio.jpg', NULL, NULL),
(11, 'SAGITTARIUS', 'SAGITTARIUS', 'November 22 - December 21', 'sagittarius.jpg', NULL, NULL),
(12, 'CAPRICORN', 'CAPRICORN', 'December 22 - January 19', 'capricorn.jpg', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `zodiac_day_ratings`
--
ALTER TABLE `zodiac_day_ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `zodiac_day_ratings_zodiac_sign_id_foreign` (`zodiac_sign_id`),
  ADD KEY `zodiac_day_ratings_day_score_foreign` (`day_score`);

--
-- Indexes for table `zodiac_scores`
--
ALTER TABLE `zodiac_scores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zodiac_signs`
--
ALTER TABLE `zodiac_signs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `zodiac_day_ratings`
--
ALTER TABLE `zodiac_day_ratings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `zodiac_scores`
--
ALTER TABLE `zodiac_scores`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `zodiac_signs`
--
ALTER TABLE `zodiac_signs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `zodiac_day_ratings`
--
ALTER TABLE `zodiac_day_ratings`
  ADD CONSTRAINT `zodiac_day_ratings_day_score_foreign` FOREIGN KEY (`day_score`) REFERENCES `zodiac_scores` (`id`),
  ADD CONSTRAINT `zodiac_day_ratings_zodiac_sign_id_foreign` FOREIGN KEY (`zodiac_sign_id`) REFERENCES `zodiac_signs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
