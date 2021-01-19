-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2021 at 04:07 PM
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
('01', 'Head Office', 'Jl. Bandengan Selatan 80 Blok B No.19', '02166654068', '02166654069', NULL, NULL, NULL, '02166654065', '02166654067', NULL, NULL, NULL, '081238124823', '081238124822', NULL, NULL, NULL, 'cs@lintaslimabenua.com', 'cs1@lintaslimabenua.com', NULL, NULL, NULL, 'Warni', NULL, NULL, NULL, 'Y', 'yalong', NULL, '2020-10-23 03:05:23', '2020-12-25 03:07:53'),
('10', 'Marunda', 'Jl. Marunda Center Blok A No. 1', '02121312', '02121313', NULL, NULL, NULL, '02121314', '02121315', NULL, NULL, NULL, '01284923', '01284924', NULL, NULL, NULL, 'marunda@lintaslimabenua.com', 'marunda2@lintaslimabenua.com', NULL, NULL, NULL, 'Leoni', '01', NULL, NULL, 'Y', 'yalong', NULL, '2020-10-23 03:16:43', '2020-10-23 03:16:43'),
('11', 'Curug', 'Jl. Curug Raya No. 100', '034023042', '034023043', NULL, NULL, NULL, '034023044', '034023045', NULL, NULL, NULL, '203482394832', '203482394834', NULL, NULL, NULL, 'curug1@lintaslimabenua.com', 'curug2@lintaslimabenua.com', NULL, NULL, NULL, 'Ramdan', '01', NULL, NULL, 'Y', 'yalong', NULL, '2020-10-23 03:17:38', '2020-10-23 03:17:38'),
('12', 'Karawang', 'Jl. Karawang Barat No. 1', '021111111', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, '08123333333', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, 'Belum Ada', '01', NULL, NULL, 'Y', 'yalong', NULL, '2020-12-25 03:06:50', '2020-12-25 03:06:50'),
('13', 'Subang', 'Jl. Subang', '021423423', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, '0842342121231', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, 'Belum Ada', '01', NULL, NULL, 'Y', 'yalong', NULL, '2020-12-25 03:07:18', '2020-12-25 03:07:18');

-- --------------------------------------------------------

--
-- Table structure for table `apps_mst_documents`
--

CREATE TABLE `apps_mst_documents` (
  `doc_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc_type` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_by` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `update_by` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_by` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `update_by` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `apps_mst_empl_branchs`
--

CREATE TABLE `apps_mst_empl_branchs` (
  `empl_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_id` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_by` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `update_by` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `apps_mst_empl_branchs`
--

INSERT INTO `apps_mst_empl_branchs` (`empl_id`, `branch_id`, `create_by`, `update_by`, `created_at`, `updated_at`) VALUES
('apin', '10', 'yalong', NULL, '2021-01-19 15:01:57', '2021-01-19 15:01:57'),
('fadel', '10', 'yalong', NULL, '2021-01-19 15:02:01', '2021-01-19 15:02:01'),
('irfan', '10', 'yalong', NULL, '2021-01-19 15:02:04', '2021-01-19 15:02:04'),
('yalong', '01', 'yalong', NULL, '2021-01-19 15:02:19', '2021-01-19 15:02:19');

-- --------------------------------------------------------

--
-- Table structure for table `counters`
--

CREATE TABLE `counters` (
  `code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_id` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `month` int(11) DEFAULT NULL,
  `digit` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `counters`
--

INSERT INTO `counters` (`code`, `branch_id`, `year`, `month`, `digit`, `created_at`, `updated_at`) VALUES
('K', '01', 2020, NULL, 3, '2020-12-25 03:17:01', '2020-12-25 03:34:57'),
('V', '01', 2020, NULL, 2, '2020-12-25 04:45:03', '2020-12-25 05:05:26'),
('S', '01', 2020, NULL, 1, '2020-12-25 05:10:30', '2020-12-25 05:10:30'),
('C', '01', 2020, NULL, 1, '2020-12-25 06:18:10', '2020-12-25 06:18:10'),
('SCH', '10', 2020, 12, 1, '2020-12-25 07:11:53', '2020-12-25 07:11:53'),
('SCH', '10', 2021, 1, 1, '2021-01-13 16:00:31', '2021-01-13 16:00:31'),
('V', '01', 2021, NULL, 1, '2021-01-19 15:05:04', '2021-01-19 15:05:04');

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
(18, '2020_10_21_172646_create_apps_mst_employees_table', 1),
(19, '2020_11_06_093941_create_table_trc_mst_drivers_table', 2),
(20, '2020_11_06_094316_create_trc_mst_driver_branchs_table', 2),
(21, '2020_11_07_122112_add_unique_to_empl_code', 3),
(22, '2020_11_07_140331_create_trc_mst_vehicles_table', 4),
(23, '2020_11_07_140356_create_trc_mst_vehicle_branchs_table', 4),
(24, '2020_11_07_140424_create_trc_mst_vehicle_docs_table', 4),
(25, '2020_11_07_140444_create_trc_mst_vehicle_hist_docs_table', 4),
(26, '2020_11_07_142016_create_trc_mst_vehicle_mut_branchs_table', 4),
(27, '2020_11_10_180737_create_apps_mst_documents_table', 5),
(31, '2020_11_13_064924_create_ord_mst_documents_table', 6),
(32, '2020_11_14_155758_create_trc_trn_schedule_hdrs_table', 6),
(35, '2020_11_14_160100_create_trc_trn_schedule_dtls_table', 7),
(37, '2020_11_17_101026_create_ord_mst_containers_table', 8),
(38, '2020_11_17_151353_create_ord_mst_customers_table', 9),
(39, '2020_11_23_232039_create_user_branchs_table', 10),
(40, '2020_12_09_185820_add_field_status_schedule_dtls_table', 11),
(44, '2020_12_09_190837_create_table_trc_trn_order_status_table', 12),
(45, '2020_12_11_230341_create_trc_trn_schedule_tracks_table', 13),
(47, '2020_12_12_135909_create_trc_trn_driver_hist_jobs_table', 14),
(48, '2020_12_17_173551_create_counters_table', 15),
(49, '2020_12_19_112921_create_apps_mst_empl_branchs_table', 16),
(50, '2021_01_12_141748_add_field_to_trc_trn_schedule_dtls_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `ord_mst_containers`
--

CREATE TABLE `ord_mst_containers` (
  `cont_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cont_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cont_length` double(8,2) DEFAULT NULL,
  `cont_width` double(8,2) DEFAULT NULL,
  `cont_height` double(8,2) DEFAULT NULL,
  `active` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_by` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `update_by` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ord_mst_containers`
--

INSERT INTO `ord_mst_containers` (`cont_id`, `cont_name`, `cont_length`, `cont_width`, `cont_height`, `active`, `create_by`, `update_by`, `created_at`, `updated_at`) VALUES
('20F', '20 FEET', 20.00, 10.00, 15.00, 'Y', 'sqlyog', 'yalong', NULL, '2020-11-23 07:47:46'),
('40F', '40 FEET', 40.00, 50.00, 60.00, 'Y', 'yalong', NULL, '2020-11-23 07:56:04', '2020-11-23 07:56:04'),
('45F', '45 FEET', 45.00, 55.00, 65.00, 'Y', 'yalong', NULL, '2020-11-23 07:57:58', '2020-11-23 07:57:58'),
('WB', 'WINGBOX', 100.00, 20.00, 150.00, 'Y', 'yalong', NULL, '2020-11-23 07:58:15', '2020-11-23 07:58:15');

-- --------------------------------------------------------

--
-- Table structure for table `ord_mst_customers`
--

CREATE TABLE `ord_mst_customers` (
  `cust_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cust_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cust_address` varchar(4000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cust_phone1` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cust_phone2` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cust_phone3` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cust_fax1` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cust_fax2` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cust_fax3` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cust_handphone1` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cust_handphone2` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cust_handphone3` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cust_pic` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term_id` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ppn_flag` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_by` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `update_by` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ord_mst_documents`
--

CREATE TABLE `ord_mst_documents` (
  `doc_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc_type` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(4000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_by` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `update_by` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ord_mst_documents`
--

INSERT INTO `ord_mst_documents` (`doc_id`, `doc_name`, `doc_type`, `remark`, `active`, `create_by`, `update_by`, `created_at`, `updated_at`) VALUES
('DV001', 'BPKB', 'VC', 'BPKB', 'Y', 'SQLYOG', NULL, NULL, NULL),
('DV002', 'KIR', 'VC', 'KIR', 'Y', 'SQLYOG', NULL, NULL, NULL),
('DV003', 'STNK', 'VC', 'STNK', 'Y', 'SQLYOG', NULL, NULL, NULL);

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
-- Table structure for table `trc_mst_drivers`
--

CREATE TABLE `trc_mst_drivers` (
  `drv_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `empl_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `drv_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `drv_handphone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imei_handphone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_by` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `update_by` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trc_mst_driver_branchs`
--

CREATE TABLE `trc_mst_driver_branchs` (
  `drv_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_by` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `update_by` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trc_mst_vehicles`
--

CREATE TABLE `trc_mst_vehicles` (
  `vhc_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vhc_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vhc_plat_no` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vhc_year` int(11) DEFAULT NULL,
  `vhc_cc` int(11) DEFAULT NULL,
  `vhc_machine_no` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vhc_frame_no` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vhc_color` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vhc_count_ban` int(11) DEFAULT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_asset` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_by` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `update_by` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trc_mst_vehicle_branchs`
--

CREATE TABLE `trc_mst_vehicle_branchs` (
  `vhc_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_by` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `update_by` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trc_mst_vehicle_docs`
--

CREATE TABLE `trc_mst_vehicle_docs` (
  `vhc_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc_no` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doc_exp_date` date DEFAULT NULL,
  `remark` varchar(4000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_by` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `update_by` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trc_mst_vehicle_hist_docs`
--

CREATE TABLE `trc_mst_vehicle_hist_docs` (
  `vhc_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `line` int(11) NOT NULL,
  `doc_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc_no` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doc_exp_date` date DEFAULT NULL,
  `remark` varchar(4000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_by` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `update_by` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trc_mst_vehicle_mut_branchs`
--

CREATE TABLE `trc_mst_vehicle_mut_branchs` (
  `vhc_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `line` int(11) NOT NULL,
  `branch_id_old` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_id_new` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mutation_date` date NOT NULL,
  `create_by` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `update_by` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trc_trn_driver_hist_jobs`
--

CREATE TABLE `trc_trn_driver_hist_jobs` (
  `sched_id` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `line` int(11) NOT NULL,
  `seqno` int(11) NOT NULL,
  `empl_id` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `si_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Receive/Refuse',
  `date_action` datetime NOT NULL,
  `create_by` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trc_trn_order_status`
--

CREATE TABLE `trc_trn_order_status` (
  `id` int(10) UNSIGNED NOT NULL,
  `sched_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `line` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `si_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_public` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jobtime` datetime NOT NULL,
  `description` varchar(4000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_by` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trc_trn_schedule_dtls`
--

CREATE TABLE `trc_trn_schedule_dtls` (
  `sched_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `line` int(11) NOT NULL,
  `si_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buss_unit` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `depo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cust_id` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `line_cust` int(11) DEFAULT NULL,
  `cust_address` varchar(4000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pickup_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pickup_contact` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pickup_contact_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pickup_address` varchar(4000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dest_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dest_contact` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dest_contact_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dest_address` varchar(4000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude_pickup` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude_pickup` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude_dest` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude_dest` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cont_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cont_no` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `padlock` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seal_no` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `drv_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vhc_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `assign_driver` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receive_assign` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'NW=>New, AS=>Assign, RJ=>ReceiveJob, OG=>OutGarasi, AD=>ArriveDepo, OD=>OutDepo, AP=>ArrivePickup, LP=>LoadingPickup, OP=>OutPickup, AU=>ArriveUnloading, UL=>Unloading, OU=>OutUnloading, CL=>Close',
  `create_by` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `update_by` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trc_trn_schedule_hdrs`
--

CREATE TABLE `trc_trn_schedule_hdrs` (
  `sched_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sched_date` date NOT NULL,
  `branch_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grand_total` int(11) DEFAULT NULL,
  `payment_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_by` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `update_by` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trc_trn_schedule_tracks`
--

CREATE TABLE `trc_trn_schedule_tracks` (
  `sched_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `line` int(11) NOT NULL,
  `receivejob_time` datetime DEFAULT NULL,
  `receivejob_lat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receivejob_long` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `outgarasi_time` datetime DEFAULT NULL,
  `outgarasi_lat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `outgarasi_long` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `arrivedepo_time` datetime DEFAULT NULL,
  `arrivedepo_lat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `arrivedepo_long` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `outdepo_time` datetime DEFAULT NULL,
  `outdepo_lat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `outdepo_long` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `arrivepickup_time` datetime DEFAULT NULL,
  `arrivepickup_lat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `arrivepickup_long` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loadpickup_time` datetime DEFAULT NULL,
  `loadpickup_lat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loadpickup_long` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `outpickup_time` datetime DEFAULT NULL,
  `outpickup_lat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `outpickup_long` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `arriveunload_time` datetime DEFAULT NULL,
  `arriveunload_lat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `arriveunload_long` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unload_time` datetime DEFAULT NULL,
  `unload_lat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unload_long` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `outunload_time` datetime DEFAULT NULL,
  `outunload_lat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `outunload_long` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `close_time` datetime DEFAULT NULL,
  `close_lat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `close_long` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_token` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `api_token`) VALUES
(1, 'Hartono', 'yalong', NULL, '$2y$10$vWd3wBsqjNG5DYEb7oe39ug2KBd7dwVq.tMQt8yEvhLPNyF62tIQy', NULL, '2021-01-19 14:55:33', '2021-01-19 14:55:33', 'HO', NULL),
(2, 'Apin', 'apin', NULL, '$2y$10$FbZtI7lu.SeFhpNwA8X6GelKwgexLdW7swsnDOgb8zP5IqDrimS9a', NULL, '2021-01-19 14:57:46', '2021-01-19 14:57:46', 'Cabang', NULL),
(3, 'Fadel', 'fadel', NULL, '$2y$10$GjlxPPelkx2uq23WBoMWxOX4Y1myoxARFM3OJfQdtTGKwSrxLssWC', NULL, '2021-01-19 14:58:35', '2021-01-19 14:58:35', 'Cabang', NULL),
(4, 'Irfan', 'irfan', NULL, '$2y$10$F.BWtnMgKn5iriLppYs5o.SgSsEgPt7RwWRiKz3wUIjZZqiJNM16C', NULL, '2021-01-19 14:59:18', '2021-01-19 14:59:18', 'Cabang', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_branchs`
--

CREATE TABLE `user_branchs` (
  `username` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_by` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `update_by` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_branchs`
--

INSERT INTO `user_branchs` (`username`, `branch_id`, `create_by`, `update_by`, `created_at`, `updated_at`) VALUES
('apin', '10', 'yalong', NULL, '2021-01-19 15:01:57', '2021-01-19 15:01:57'),
('fadel', '10', 'yalong', NULL, '2021-01-19 15:02:01', '2021-01-19 15:02:01'),
('irfan', '10', 'yalong', NULL, '2021-01-19 15:02:04', '2021-01-19 15:02:04'),
('yalong', '01', 'yalong', NULL, '2021-01-19 15:02:19', '2021-01-19 15:02:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apps_mst_branchs`
--
ALTER TABLE `apps_mst_branchs`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `apps_mst_documents`
--
ALTER TABLE `apps_mst_documents`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `apps_mst_employees`
--
ALTER TABLE `apps_mst_employees`
  ADD PRIMARY KEY (`empl_id`);

--
-- Indexes for table `apps_mst_empl_branchs`
--
ALTER TABLE `apps_mst_empl_branchs`
  ADD PRIMARY KEY (`empl_id`,`branch_id`);

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
-- Indexes for table `ord_mst_containers`
--
ALTER TABLE `ord_mst_containers`
  ADD PRIMARY KEY (`cont_id`);

--
-- Indexes for table `ord_mst_customers`
--
ALTER TABLE `ord_mst_customers`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `ord_mst_documents`
--
ALTER TABLE `ord_mst_documents`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `trc_mst_drivers`
--
ALTER TABLE `trc_mst_drivers`
  ADD PRIMARY KEY (`drv_id`),
  ADD UNIQUE KEY `trc_mst_drivers_empl_id_unique` (`empl_id`);

--
-- Indexes for table `trc_mst_driver_branchs`
--
ALTER TABLE `trc_mst_driver_branchs`
  ADD PRIMARY KEY (`drv_id`);

--
-- Indexes for table `trc_mst_vehicles`
--
ALTER TABLE `trc_mst_vehicles`
  ADD PRIMARY KEY (`vhc_id`);

--
-- Indexes for table `trc_mst_vehicle_branchs`
--
ALTER TABLE `trc_mst_vehicle_branchs`
  ADD PRIMARY KEY (`vhc_id`);

--
-- Indexes for table `trc_mst_vehicle_docs`
--
ALTER TABLE `trc_mst_vehicle_docs`
  ADD PRIMARY KEY (`vhc_id`,`doc_id`);

--
-- Indexes for table `trc_mst_vehicle_hist_docs`
--
ALTER TABLE `trc_mst_vehicle_hist_docs`
  ADD PRIMARY KEY (`vhc_id`,`doc_id`,`line`);

--
-- Indexes for table `trc_mst_vehicle_mut_branchs`
--
ALTER TABLE `trc_mst_vehicle_mut_branchs`
  ADD PRIMARY KEY (`vhc_id`,`line`);

--
-- Indexes for table `trc_trn_driver_hist_jobs`
--
ALTER TABLE `trc_trn_driver_hist_jobs`
  ADD PRIMARY KEY (`sched_id`,`line`,`seqno`);

--
-- Indexes for table `trc_trn_order_status`
--
ALTER TABLE `trc_trn_order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trc_trn_schedule_dtls`
--
ALTER TABLE `trc_trn_schedule_dtls`
  ADD PRIMARY KEY (`sched_id`,`line`);

--
-- Indexes for table `trc_trn_schedule_hdrs`
--
ALTER TABLE `trc_trn_schedule_hdrs`
  ADD PRIMARY KEY (`sched_id`);

--
-- Indexes for table `trc_trn_schedule_tracks`
--
ALTER TABLE `trc_trn_schedule_tracks`
  ADD PRIMARY KEY (`sched_id`,`line`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `trc_trn_order_status`
--
ALTER TABLE `trc_trn_order_status`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
