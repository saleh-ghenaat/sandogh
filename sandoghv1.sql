-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2024 at 10:04 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sandoghv1`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_informations`
--

CREATE TABLE `account_informations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mojoodi` decimal(20,0) NOT NULL,
  `name` varchar(255) NOT NULL,
  `tedad_vam` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_access` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `body` text NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `author_id` bigint(20) UNSIGNED NOT NULL,
  `commentable_id` bigint(20) UNSIGNED NOT NULL,
  `commentable_type` varchar(255) NOT NULL,
  `seen` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 => unseen, 1 => seen',
  `approved` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 => not approved, 1 => approved',
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `hesabkols`
--

CREATE TABLE `hesabkols` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hesab_kol` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hesabkols`
--

INSERT INTO `hesabkols` (`id`, `hesab_kol`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 45110000, NULL, '2023-10-01 04:51:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `body` text NOT NULL,
  `author_id` bigint(20) UNSIGNED NOT NULL,
  `seen` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 => unseen , 1 => seen',
  `receiver_id` bigint(20) UNSIGNED DEFAULT NULL,
  `reference_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `body`, `author_id`, `seen`, `receiver_id`, `reference_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(13, 'سلام خسته نباشید', 2, 1, 1, NULL, '2024-11-03 15:04:26', '2024-11-03 17:26:52', NULL),
(14, 'یه سوال داشتم', 2, 1, 1, NULL, '2024-11-03 15:04:40', '2024-11-03 17:26:52', NULL),
(15, 'سلام تشکر', 1, 1, 2, NULL, '2024-11-03 15:05:48', '2024-11-03 17:25:06', NULL),
(16, 'درخدمتم', 1, 1, 2, NULL, '2024-11-03 15:05:58', '2024-11-03 17:25:06', NULL),
(17, 'چطور میتونم رمز عبور رو عوض کنم', 2, 1, 1, NULL, '2024-11-03 15:07:25', '2024-11-03 17:26:52', NULL),
(18, 'در سایدبار به قسمت تغییر رمز عبور مراجعه کنید', 1, 1, 2, NULL, '2024-11-03 15:29:12', '2024-11-03 17:25:06', NULL),
(19, 'متوجه شدید', 1, 1, 2, NULL, '2024-11-03 15:41:29', '2024-11-03 17:25:06', NULL),
(20, 'بله تشکر', 2, 1, 1, NULL, '2024-11-03 16:28:17', '2024-11-03 17:26:52', NULL),
(21, 'خواهش میکنم', 1, 0, NULL, NULL, '2024-11-03 17:08:09', '2024-11-03 17:08:09', NULL),
(22, 'خواهش میکنم', 1, 1, 2, NULL, '2024-11-03 17:23:40', '2024-11-03 17:25:06', NULL),
(23, 'خواهش میکنم', 1, 1, 2, NULL, '2024-11-03 17:24:10', '2024-11-03 17:25:06', NULL),
(24, 'سپاس', 2, 1, 1, NULL, '2024-11-03 17:25:06', '2024-11-03 17:26:52', NULL);

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_08_01_075829_create_sessions_table', 1),
(7, '2021_08_06_134109_create_comments_table', 1),
(8, '2021_08_07_144900_create_ticket_categories_table', 1),
(9, '2022_03_10_194506_create_notifications_table', 1),
(10, '2022_08_29_142747_create_account_informations_table', 1),
(11, '2022_08_29_143242_create_vams_table', 1),
(12, '2022_08_31_180735_create_pardakhtihas_table', 1),
(13, '2023_10_01_064736_create_hesabkols_table', 2),
(16, '2024_11_02_132903_add_ticket_id_to_chats', 4);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pardakhtihas`
--

CREATE TABLE `pardakhtihas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tarikh` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `code_peygiri` decimal(20,0) NOT NULL,
  `mablagh_ghest` decimal(20,0) NOT NULL,
  `shahriye` decimal(20,0) NOT NULL,
  `image` text NOT NULL,
  `ghabele_taiid` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1 => taiid, 0 => taiid_nashode',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `vam_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` text NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_categories`
--

CREATE TABLE `ticket_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'user',
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `national_code` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `status`, `first_name`, `last_name`, `national_code`, `password`, `mobile`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'saleh', 'ghenaatpiishe', '2460366515', '$2y$10$5Jos6KqyWPNvPs.67DihbubyP9QXlQWbTaLHGUhAnIL0HgHwZ/qmu', '09172177835', 'pZpAZWxrS7mf1H4RpGzZSqLuCHAeHeO22O35hiuI5vF0BezfgTMLnSqjT2Af', '2023-02-28 16:23:00', '2023-02-28 16:23:00', NULL),
(2, 'user', 'sana', 'saberi', '2460390513', '$2y$10$Ge6rXCCstub86ynRNlS8mOAJCxYcJ.wqXBgQ0piAuaLN4U7s1nnBK', '09337300261', NULL, '2023-02-28 16:25:44', '2024-10-31 17:55:52', NULL),
(3, 'user', 'علی اکبر', 'قناعت پیشه', '2460244177', '$2y$10$CiG.WKjCVVQbC9Tbaj6MhOCw4PC7cEP79iRLM1efyvsLwBToAkiXO', '09190042334', NULL, '2023-05-27 11:25:43', '2023-05-27 11:25:43', NULL),
(5, 'user', 'مهرنوش', 'صحراییان', '2460146401', '$2y$10$J1qSEHwGsc1JfjE485QP5O36T5kzNRucdlDGx9D.RGbLX/DIF4Bz2', '09175817767', NULL, '2024-10-26 04:31:14', '2024-10-26 04:31:14', NULL),
(6, 'user', 'محمد', 'علیخانی', '0380992019', '$2y$10$uoX/tqantrrLTZomi0iQOOPprHi5Vo0/O9P5mkWEDM8wBfGNFwzFy', '09191592041', NULL, '2024-10-26 04:32:37', '2024-10-26 04:32:37', NULL),
(7, 'user', 'زهرا', 'صحراییان', '2470966310', '$2y$10$xL6ex.cSwARqwpKu3bwipuAmcaXkcoWCN7rh3PSrb3aawO/VPS.sS', '09376299903', NULL, '2024-10-26 04:33:23', '2024-10-26 04:33:23', NULL),
(8, 'user', 'امیر عباس', 'علیخانی', '2287073371', '$2y$10$OlVEF2zt5Qnrb8Rsc34Ct.PQbKMRizFMRJ98/4YwQXt.I.ox.DmO.', '09376299903', NULL, '2024-10-26 04:33:49', '2024-10-26 04:33:49', NULL),
(9, 'user', 'سید عباس', 'پشاپو', '2282364201', '$2y$10$co6otvFOQiarJTDumU5JEeJTTvS9FclfA6ZOp9BPwhMMQACYVQ68u', '09173094811', NULL, '2024-10-26 04:34:25', '2024-10-26 04:34:25', NULL),
(10, 'user', 'سیده زهره', 'پشاپو', '2283286336', '$2y$10$45PboAz5FsfeD4cmDVMp/ufgCrKVISReFCtdWOLIZiv0t2HLrCj6e', '09171196778', NULL, '2024-10-26 04:34:58', '2024-10-26 04:34:58', NULL),
(11, 'user', 'مژگان', 'قدسی زاده', '2471071368', '$2y$10$7TDqPN3HJ.F/L5L3y.JT..2y1jo2Q.uOXBKP.pkSdwOKvzGF0oV2a', '09178883970', NULL, '2024-10-26 04:35:44', '2024-10-26 04:35:44', NULL),
(12, 'user', 'جمشید', 'کوهی', '6559600998', '$2y$10$dugXLDzp4QIqIqhIeKJa.OiMndBK1OZdvpYUlAw8DpGyn7Hz.ml9O', '09173192462', NULL, '2024-10-26 04:36:24', '2024-10-26 04:36:24', NULL),
(13, 'user', 'مژده', 'صحراییان', '2471675441', '$2y$10$v.vTHr/MPv3lc/Y.a2QuRO0jUeR2mOuWErlpQzTEleTKx2uZrlJJC', '09172144003', NULL, '2024-10-26 04:37:00', '2024-10-26 04:37:00', NULL),
(14, 'user', 'صمد', 'نمکشناس', '2470717248', '$2y$10$e21tT6rX8lAmIEpTHmABEOws8iKkzKMN4bXB5uAZEdDOT9u1CpbYm', '09176160980', NULL, '2024-10-26 04:37:33', '2024-10-26 04:37:33', NULL),
(15, 'user', 'محمد یاسین', 'نمکشناس', '2460609825', '$2y$10$kelflWcpL6imQbOgvI5XquoVQ.cAlrHLsNDgtJtvGqdTJ7OoN7qRS', '09386429131', NULL, '2024-10-26 04:38:10', '2024-10-26 04:38:10', NULL),
(16, 'user', 'احسان', 'محسنیان فرد', '2470977258', '$2y$10$zR12DvmSUI/Cl.U2KwAwKuq.xtcKPmOi1bBZNQSA3432uZaTQ9ND2', '09172576581', NULL, '2024-10-26 04:38:52', '2024-10-26 04:38:52', NULL),
(17, 'user', 'علیرضا', 'محسنیان فرد', '2284650589', '$2y$10$X.cC/9GWNXJ9pssdh5au8OQxoQs5/JKsLXAJbowtLRrg2RUXg1btS', '09368031916', NULL, '2024-10-26 04:39:35', '2024-10-26 04:39:35', NULL),
(18, 'user', 'دریا', 'قناعت پیشه', '3381155301', '$2y$10$zZlO7QZWnjT/jCo.8r8E8.CWAkJ2E1ws6UHk9ebvOHP5pz1hQuh2a', '09366202321', NULL, '2024-10-26 04:40:55', '2024-10-26 04:40:55', NULL),
(19, 'user', 'سیما', 'قناعت پیشه', '2470755700', '$2y$10$Yz8pPZ8tfPt77ECH3knSK.Mwy8Z.REc0zUTSpofB4iKCtxExEfAiO', '09178916579', NULL, '2024-10-26 04:41:29', '2024-10-26 04:41:29', NULL),
(20, 'user', 'احترام', 'رشید پور', '2471074901', '$2y$10$uVAZqbgqNwvrt0r4M8Gx1OqrXp/tOLac9CTKcV8Aa2giAJFCoKiuS', '09928511897', NULL, '2024-10-26 04:42:11', '2024-10-26 04:42:11', NULL),
(21, 'user', 'محبوبه', 'حشمت نیا', '2471779441', '$2y$10$nJ3q8xuktPSn.I.Vd7xisuIVVTHAB6n2BNVTu3kb9Y8Bsu7NmiQHO', '09174527432', NULL, '2024-10-26 04:43:04', '2024-10-26 04:43:04', NULL),
(22, 'user', 'مهران', 'قناعت پیشه', '2470770602', '$2y$10$U4kQ6rQu8BuIfj9PkwZNAeNjPzxsLfkryHI2O22jl.wr7EEsljflu', '09173915832', NULL, '2024-10-26 04:43:37', '2024-10-26 04:43:37', NULL),
(23, 'user', 'زهره', 'صحراییان', '2299091904', '$2y$10$NpfJnsdoNSD94OIBqgoXHOpsfl0N/ZB0gPc1zEA4brP8eSz9cuOEK', '09177923361', NULL, '2024-10-26 04:44:16', '2024-10-26 04:44:16', NULL),
(24, 'user', 'نگین', 'قناعت پیشه', '2460452217', '$2y$10$/VZFonA2zi/pwl7gu0sh1u3/tbHtBM9eqd.WNoyoql.Qd23vCM.z.', '09397923361', NULL, '2024-10-26 04:44:42', '2024-10-26 04:44:42', NULL),
(25, 'user', 'مریم', 'قناعت پیشه', '2471741118', '$2y$10$ilY6scBiKVxedV.fVSPlSe5X/ny.DEPpS6y7qPi108rUnNcf8ZWXa', '09176383973', NULL, '2024-10-26 04:45:20', '2024-10-26 04:45:20', NULL),
(26, 'user', 'علی اکبر', 'سلمانی', '2063727163', '$2y$10$sKxQgKIKvMsV8TczFpMBNeuJ736oBvRV0k1N05Rps5eDSTVF79/8S', '09371276636', NULL, '2024-10-26 04:45:57', '2024-10-26 04:45:57', NULL),
(27, 'user', 'مائده', 'آقا بابا نتاج', '2064778101', '$2y$10$.LYo0LW3NdV4yYwsSIkKx.FHnHnQ.py./MAgH7BHazAI.k4cvuPki', '09036853045', NULL, '2024-10-26 04:46:55', '2024-10-26 04:46:55', NULL),
(28, 'user', 'امیر علی', 'سلمانی', '7640003857', '$2y$10$u39avDfZu18lrcOB3mA58eUVihQUcEjP1D53hhR0cJJg.xEStMk1a', '09118984535', NULL, '2024-10-26 04:47:31', '2024-10-26 04:47:31', NULL),
(29, 'user', 'خدیجه', 'نجاتی جهرمی', '2471027636', '$2y$10$tA6K77sH8El2GVFo3EwXY.7h8desGA/GWnrunSEleVLoKdaV5m0di', '09171903175', NULL, '2024-10-26 04:48:08', '2024-10-26 04:48:08', NULL),
(30, 'user', 'ایلیا', 'مهرشاد', '2460717407', '$2y$10$ELpkwSrNyMZQDwSycf6LvupI.eG6N.THdscvMFpBb5Xrb9mYWCiqm', '09171903175', NULL, '2024-10-26 04:48:58', '2024-10-26 04:48:58', NULL),
(31, 'user', 'رحمت', 'رشید پور جهرمی', '2471102344', '$2y$10$LCpPZEqIR/q7WiMZeaTNgeJ4CNXCxPorr.g6yoUu4gibN5FC6PlWm', '09171903175', NULL, '2024-10-26 04:49:29', '2024-10-26 04:49:29', NULL),
(32, 'user', 'الهه', 'قدسی زاده', '2471665403', '$2y$10$dWfW3oLqsHI2wryNjNZEX.M1HnwlxnYpOO3C3b849ZELdNi58r5uW', '09172288478', NULL, '2024-10-26 04:50:13', '2024-10-26 04:50:13', NULL),
(33, 'user', 'رویا', 'شاهین', '2471177557', '$2y$10$V5/1NP41BEkRN19hv.k00uALpa3grS0D0EnBlcu0.6vgPnRU3N5Em', '09173924918', NULL, '2024-10-26 04:50:48', '2024-10-26 04:50:48', NULL),
(34, 'user', 'علیرضا', 'مجتهدی', '2470900522', '$2y$10$9BRe4cQTb7eFliUhNnYaeuo56zeA5ARTnt4ZylLfWNUtDrbIgd5KG', '09179081033', NULL, '2024-10-26 04:51:25', '2024-10-26 04:51:25', NULL),
(35, 'user', 'سمانه', 'نبی زاده', '2741666876', '$2y$10$/k1L9vAnptWPDwVDCJtHIuvTF.8PXNdNVgEEBmRK1brdcLTlZJ1ii', '09164086561', NULL, '2024-10-26 04:51:56', '2024-10-26 04:51:56', NULL),
(36, 'user', 'مبینا', 'مجتهدی', '2460660571', '$2y$10$b3rUWIY69zuY1PzfHEai9O7y2.IltKn26hkgmagfmkHqRoZdQaEt.', '09936272578', NULL, '2024-10-26 04:52:31', '2024-10-26 04:52:31', NULL),
(37, 'user', 'مژگان', 'مهرشاد', '2471721672', '$2y$10$aI1Dnjj1aLEiwuBsE3U.teE8xu8dvrrnyNhWpc79hifmKpYpPL3iy', '09171908252', NULL, '2024-10-26 04:53:11', '2024-10-26 04:53:11', NULL),
(38, 'user', 'محمد', 'رحمانیان', '2470946700', '$2y$10$20LnUghzrEeP4.QssiQHGu8fEaxR.8RDqtoTGEEJVatB9jQ0sDCMm', '09171908252', NULL, '2024-10-26 04:54:06', '2024-10-26 04:54:06', NULL),
(39, 'user', 'مهرسا', 'رحمانیان', '2460949979', '$2y$10$4QMPQAm4T8EjfNCNHvqxL.L.qeJqOhAJQ385.nQ5lOFasnExF.jK.', '09171908252', NULL, '2024-10-26 04:54:43', '2024-10-26 04:54:43', NULL),
(40, 'user', 'علیرضا', 'نمکشناس', '2460187653', '$2y$10$eLZoz7Exyi2lkh2ZgGI7metyvGSKQmxy7N90uYqb66BB665eEv0Im', '09173919976', NULL, '2024-10-26 04:55:21', '2024-10-26 04:55:21', NULL),
(41, 'user', 'فاطمه', 'قدسی زاده', '2471035167', '$2y$10$kxiqXTS5Lp5H3gYd27XCxe1FQoQ4gvTRGArKrKYzBQaQSwHiejcBK', '09173919300', NULL, '2024-10-26 04:55:58', '2024-10-26 04:55:58', NULL),
(42, 'user', 'محمدرضا', 'قناعت پیشه', '2470774462', '$2y$10$XvWZbcboxyw7AR6OFSh1bOxWVJJLsttFdjf4DkG/.R1s4UP2rF5aq', '09177912508', NULL, '2024-10-26 04:56:40', '2024-10-26 04:56:40', NULL),
(43, 'user', 'زهره', 'طاهری', '1818257254', '$2y$10$OgPJtY2jA3GFdnNqa8UIleRT9DgIBw5NioAkmNZucYSYgjjvFjr7e', '09177912508', NULL, '2024-10-26 04:57:17', '2024-10-26 04:57:17', NULL),
(44, 'user', 'نیلوفر', 'قناعت پیشه', '2460453477', '$2y$10$zK51uqbD/rzRsIJzraOCNuDeUm5ZmdngGwnX0rzaIKYdZ4iBZoU0a', '09177912508', NULL, '2024-10-26 04:57:52', '2024-10-26 04:57:52', NULL),
(45, 'user', 'مریم', 'صبیح', '1899873252', '$2y$10$TQTOILZ46yAHTh8FkFg9sOJv5riitvVKgslh418hHHxF5T3ZQ7Fju', '09177271521', NULL, '2024-10-26 04:58:28', '2024-10-26 04:58:28', NULL),
(46, 'user', 'ایران', 'رشید پور جهرمی', '2471134203', '$2y$10$e76R8PwNpXKpryKr4u/LI.x7Rr45OyOV6/uDgZviHfOoL8t7KfUJe', '09360654114', NULL, '2024-10-26 04:59:14', '2024-10-26 04:59:14', NULL),
(47, 'user', 'سحر', 'خدمت', '2460160461', '$2y$10$3DIxIQBVVvy.Dvf.kpRm3OMYBt1cFV7RvNKo82l8u0HYobT3Prsbi', '09178960930', NULL, '2024-10-26 04:59:52', '2024-10-26 04:59:52', NULL),
(48, 'user', 'حسین', 'سلیمیان', '2298220824', '$2y$10$sKoxa/jEBtFOi2rB2n/4GuWgGAtPpiURUctm4nI9.xV8wz3Hdg7gq', '09132595288', NULL, '2024-10-26 05:00:35', '2024-10-26 05:00:35', NULL),
(49, 'user', 'زهرا', 'سبوئی جهرمی', '2470930871', '$2y$10$tLk8J8Lrt.jLfGdEhBXN.O3YHXD17axL8Uk3ITW3TNOxxMCDP9Sf2', '09139694251', NULL, '2024-10-26 05:01:18', '2024-10-26 05:01:18', NULL),
(50, 'user', 'ابوالفضل', 'مهرشاد', '2471715826', '$2y$10$OWn9jITnWSbq7rmYhhTfMuV4LNQOBafBJkXht1zwscYk9.ICKT54G', '09173924211', NULL, '2024-10-26 05:02:10', '2024-10-26 05:02:10', NULL),
(51, 'user', 'نجمه', 'قناعت پیشه', '2471065937', '$2y$10$ZdTFix3iaSbhWpHR2FLS3.XuihWp1tr8fapebX40Zzl8tYMPWksBi', '09364483202', NULL, '2024-10-26 05:02:43', '2024-10-26 05:02:43', NULL),
(54, 'user', 'Ali', 'Norouzi', '0110056371', '$2y$10$DqD0wYv2.0RBoJM4IViFLuUzinJXSoT0Pbc83EJrVMLqI0NeZDCJW', '09102429746', NULL, NULL, '2024-10-31 17:42:59', NULL),
(55, 'user', 'سعید', 'فلاحی نصب', '0110056372', '$2y$10$h.nCaidufSPRIycU1TpgxOUyFNEz0PDv6oWLmmS6Sp4crFLATBppK', '09102429745', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vams`
--

CREATE TABLE `vams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `mablagh_vam` decimal(20,0) NOT NULL DEFAULT 0,
  `tedad_aghsat` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 => dar hale anjam, 1 => etmam',
  `mablagh_ghest` decimal(20,0) NOT NULL DEFAULT 0,
  `baghimande_vam` decimal(20,0) NOT NULL DEFAULT 0,
  `baghimande_aghsat` decimal(20,0) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_informations`
--
ALTER TABLE `account_informations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_informations_user_id_foreign` (`user_id`),
  ADD KEY `account_informations_user_access_foreign` (`user_access`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_parent_id_foreign` (`parent_id`),
  ADD KEY `comments_author_id_foreign` (`author_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hesabkols`
--
ALTER TABLE `hesabkols`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_author_id_foreign` (`author_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `pardakhtihas`
--
ALTER TABLE `pardakhtihas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pardakhtihas_user_id_foreign` (`user_id`),
  ADD KEY `pardakhtihas_vam_id_foreign` (`vam_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `ticket_categories`
--
ALTER TABLE `ticket_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vams`
--
ALTER TABLE `vams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vams_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_informations`
--
ALTER TABLE `account_informations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hesabkols`
--
ALTER TABLE `hesabkols`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pardakhtihas`
--
ALTER TABLE `pardakhtihas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_categories`
--
ALTER TABLE `ticket_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `vams`
--
ALTER TABLE `vams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account_informations`
--
ALTER TABLE `account_informations`
  ADD CONSTRAINT `account_informations_user_access_foreign` FOREIGN KEY (`user_access`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `account_informations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comments_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `comments` (`id`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `pardakhtihas`
--
ALTER TABLE `pardakhtihas`
  ADD CONSTRAINT `pardakhtihas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pardakhtihas_vam_id_foreign` FOREIGN KEY (`vam_id`) REFERENCES `vams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vams`
--
ALTER TABLE `vams`
  ADD CONSTRAINT `vams_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
