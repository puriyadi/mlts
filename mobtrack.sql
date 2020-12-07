-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2020 at 12:41 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mobtrack`
--

-- --------------------------------------------------------

--
-- Table structure for table `apps_mst_branchs`
--

CREATE TABLE `apps_mst_branchs` (
  `branch_id` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_address` varchar(4000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_phone1` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_phone2` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_phone3` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_phone4` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_phone5` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_fax1` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_fax2` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_fax3` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_fax4` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_fax5` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_handphone1` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_handphone2` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_handphone3` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_handphone4` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_handphone5` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_email1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_email2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_email3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_email4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_email5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_parent` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_longitute` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_by` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `update_by` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `apps_mst_branchs`
--

INSERT INTO `apps_mst_branchs` (`branch_id`, `branch_name`, `branch_address`, `branch_phone1`, `branch_phone2`, `branch_phone3`, `branch_phone4`, `branch_phone5`, `branch_fax1`, `branch_fax2`, `branch_fax3`, `branch_fax4`, `branch_fax5`, `branch_handphone1`, `branch_handphone2`, `branch_handphone3`, `branch_handphone4`, `branch_handphone5`, `branch_email1`, `branch_email2`, `branch_email3`, `branch_email4`, `branch_email5`, `branch_pic`, `branch_parent`, `branch_longitute`, `branch_latitude`, `active`, `create_by`, `update_by`, `created_at`, `updated_at`) VALUES
('01', 'Head Office', 'Jl. Bandengan Selatan 80 Blok B No.19', '02166654068', '02166654069', NULL, NULL, NULL, '02166654065', '02166654067', NULL, NULL, NULL, '081238124823', '081238124822', NULL, NULL, NULL, 'ho@lintaslimabenua.com', 'ho2@lintaslimabenua.com', NULL, NULL, NULL, 'Warni', '', NULL, NULL, 'Y', 'yalong', NULL, '2020-10-23 03:05:23', '2020-10-23 03:05:23'),
('10', 'Marunda', 'Jl. Marunda Center Blok A No. 1', '02121312', '02121313', NULL, NULL, NULL, '02121314', '02121315', NULL, NULL, NULL, '01284923', '01284924', NULL, NULL, NULL, 'marunda@lintaslimabenua.com', 'marunda2@lintaslimabenua.com', NULL, NULL, NULL, 'Leoni', '01', NULL, NULL, 'Y', 'yalong', NULL, '2020-10-23 03:16:43', '2020-10-23 03:16:43'),
('11', 'Curug', 'Jl. Curug Raya No. 100', '034023042', '034023043', NULL, NULL, NULL, '034023044', '034023045', NULL, NULL, NULL, '203482394832', '203482394834', NULL, NULL, NULL, 'curug1@lintaslimabenua.com', 'curug2@lintaslimabenua.com', NULL, NULL, NULL, 'Ramdan', '01', NULL, NULL, 'Y', 'yalong', NULL, '2020-10-23 03:17:38', '2020-10-23 03:17:38');

-- --------------------------------------------------------

--
-- Table structure for table `apps_mst_employees`
--

CREATE TABLE `apps_mst_employees` (
  `empl_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `empl_fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `empl_shortname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `empl_placebirth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `empl_birthday` date DEFAULT NULL,
  `empl_gender` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doc_id` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `empl_on_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `empl_address_on_id` varchar(4000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `empl_address_current` varchar(4000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `empl_phone1` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `empl_phone2` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `empl_phone3` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `empl_handphone1` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `empl_handphone2` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `empl_handphone3` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `empl_hobbies` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relg_id` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `empl_blood` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `empl_email1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `empl_email2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `empl_email3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `empl_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `empl_start_work` date DEFAULT NULL,
  `empl_resign` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `empl_resign_date` date DEFAULT NULL,
  `active` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_by` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `update_by` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `apps_mst_employees`
--

INSERT INTO `apps_mst_employees` (`empl_id`, `empl_fullname`, `empl_shortname`, `empl_placebirth`, `empl_birthday`, `empl_gender`, `doc_id`, `empl_on_id`, `empl_address_on_id`, `empl_address_current`, `empl_phone1`, `empl_phone2`, `empl_phone3`, `empl_handphone1`, `empl_handphone2`, `empl_handphone3`, `empl_hobbies`, `relg_id`, `empl_blood`, `empl_email1`, `empl_email2`, `empl_email3`, `empl_photo`, `empl_start_work`, `empl_resign`, `empl_resign_date`, `active`, `create_by`, `update_by`, `created_at`, `updated_at`) VALUES
('K001', 'HARTONO', 'HAR', 'Baganapi', '1990-01-01', 'P', 'KTP', '23425345345', 'VILLA TANGERANG', 'VILLA TANGERANG', '4234234', '8787', NULL, '23423423423', '2432423', NULL, 'Nonton', 'Khatolik', 'A', 'yang_ya_long89@yahoo.co.id', 'yang_ya_long89@yahoo.co.id', NULL, 'public/img/MztPWBo2wUmMRGI6H96rsM3VreXWjADZjkIwb2gF.jpeg', '2020-01-07', 'N', NULL, 'Y', 'yalong', NULL, '2020-11-01 23:10:00', '2020-11-01 23:10:00'),
('K002', 'HARTONO', 'Har', 'Tangerang', '1968-01-01', 'W', 'KTP', '23425345345', 'Villa Tangerang', 'Villa Tangerang', '4234234', '8787', NULL, '23423423423', '2432423', NULL, 'Nonton', 'Islam', 'A', 'yang_ya_long89@yahoo.co.id', 'yang_ya_long89@yahoo.co.id', NULL, NULL, '2019-12-03', 'N', NULL, 'Y', 'yalong', NULL, '2020-11-01 23:30:50', '2020-11-01 23:30:50'),
('K003', 'HARTONO', 'Api', 'Tangerang', '1990-01-01', 'P', 'KTP', '23425345345', 'Vika Tangerang', 'Vika Tangerang', '34234234', '1111111112', NULL, '23423423423', '2432423', NULL, 'Nonton', 'Kristen', 'A', 'yang_ya_long89@yahoo.co.id', 'yang_ya_long89@yahoo.co.id', NULL, 'public/img/QarPPlzb6CUjteVOTGOyKAS7YVitegTXzSqFISo2.png', '2019-12-03', 'N', NULL, 'Y', 'yalong', NULL, '2020-11-01 23:31:32', '2020-11-01 23:31:32'),
('K004', 'HARTONO', 'Api', 'Bagan', '1990-01-15', 'W', 'KTP', '34534534', 'Tangerang', 'Tangerang', '4234234', '8787', NULL, '23423423423', '2432423', NULL, 'Nonton', 'Kristen', 'A', 'yang_ya_long89@yahoo.co.id', 'yang_ya_long89@yahoo.co.id', NULL, 'public/img/7LmBTUbqJdtgmtJsN1yKIwOUAzwFLdeQPttaM4VE.jpeg', '2019-12-03', 'N', NULL, 'Y', 'yalong', NULL, '2020-11-01 23:34:16', '2020-11-01 23:34:16'),
('K005', 'HARTONO', 'Har', 'Bagan', '1989-12-31', 'P', 'KTP', '23425345345', 'Tangeang', 'Tangeang', '4234234', '8787', NULL, '23423423423', '2432423', NULL, 'Nonton', 'Kristen', 'O', 'yang_ya_long89@yahoo.co.id', 'yang_ya_long89@yahoo.co.id', NULL, 'public/img/OfMwcGrHuiyT9du4rJMjbILGfRikYwPFSXmc6HLh.jpeg', '2019-12-03', 'N', NULL, 'Y', 'yalong', NULL, '2020-11-01 23:39:27', '2020-11-01 23:39:27');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
(13, '2014_10_12_000000_create_users_table', 1),
(14, '2014_10_12_100000_create_password_resets_table', 1),
(15, '2019_08_19_000000_create_failed_jobs_table', 1),
(16, '2020_10_12_073831_add_username_to_users_table', 1),
(17, '2020_10_16_142647_create_apps_mst_branch_table', 1),
(18, '2020_10_21_172646_create_apps_mst_employees_table', 1);

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Hartono Yang', 'yalong', NULL, '$2y$10$ZiUA0BwlBv4nBHxACR8/I.b.gP65Xcf57Re86TApEANg3PGo06yT2', NULL, '2020-10-23 03:03:30', '2020-10-23 03:03:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apps_mst_branchs`
--
ALTER TABLE `apps_mst_branchs`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `apps_mst_employees`
--
ALTER TABLE `apps_mst_employees`
  ADD PRIMARY KEY (`empl_id`);

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
  ADD UNIQUE KEY `users_username_unique` (`username`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
