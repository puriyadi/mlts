-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2020 at 01:35 PM
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

--
-- Dumping data for table `apps_mst_employees`
--

INSERT INTO `apps_mst_employees` (`empl_id`, `empl_fullname`, `empl_shortname`, `empl_placebirth`, `empl_birthday`, `empl_gender`, `doc_id`, `empl_on_id`, `empl_address_on_id`, `empl_address_current`, `empl_phone1`, `empl_phone2`, `empl_phone3`, `empl_handphone1`, `empl_handphone2`, `empl_handphone3`, `empl_hobbies`, `relg_id`, `empl_blood`, `empl_email1`, `empl_email2`, `empl_email3`, `empl_photo`, `empl_start_work`, `empl_resign`, `empl_resign_date`, `password`, `active`, `create_by`, `update_by`, `created_at`, `updated_at`) VALUES
('K001', 'HARTONO', 'Har', 'Bagan', '1990-01-01', 'P', 'KTP', '23425345345', 'VIT', 'VIT', '4234234', '8787', NULL, '23423423423', '2432423', NULL, 'Nonton', 'Khatolik', 'A', 'yang_ya_long89@yahoo.co.id', 'yang_ya_long89@yahoo.co.id', NULL, NULL, '2020-01-07', 'N', NULL, NULL, 'Y', 'yalong', NULL, '2020-12-02 11:05:18', '2020-12-02 11:05:18');

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
('K001', '10', 'sqlyog', NULL, NULL, NULL);

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
(49, '2020_12_19_112921_create_apps_mst_empl_branchs_table', 16);

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

--
-- Dumping data for table `ord_mst_customers`
--

INSERT INTO `ord_mst_customers` (`cust_id`, `branch_id`, `cust_name`, `cust_address`, `cust_phone1`, `cust_phone2`, `cust_phone3`, `cust_fax1`, `cust_fax2`, `cust_fax3`, `cust_handphone1`, `cust_handphone2`, `cust_handphone3`, `cust_pic`, `term_id`, `ppn_flag`, `active`, `create_by`, `update_by`, `created_at`, `updated_at`) VALUES
('10C0001', '10', 'MARUNDA CENTER,PT', 'JL. MARUNDA CENTER NO.2', '12', '13', '14', 'HAR', '22', '23', NULL, '89', '87', 'budi', NULL, NULL, 'Y', 'SQLYOG', 'yalong', NULL, '2020-11-24 13:35:35');

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

--
-- Dumping data for table `trc_mst_drivers`
--

INSERT INTO `trc_mst_drivers` (`drv_id`, `empl_id`, `drv_name`, `drv_handphone`, `imei_handphone`, `phone_id`, `active`, `create_by`, `update_by`, `created_at`, `updated_at`) VALUES
('DRV001', 'K001', 'HARTONO', '23423423423', NULL, NULL, 'Y', 'yalong', NULL, '2020-12-02 11:07:35', '2020-12-02 11:07:35'),
('DRV002', 'K003', 'HARTONO YANG1', '234234234231', NULL, NULL, 'Y', 'yalong', 'yalong', '2020-11-07 06:39:41', '2020-11-10 01:52:54');

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

--
-- Dumping data for table `trc_mst_driver_branchs`
--

INSERT INTO `trc_mst_driver_branchs` (`drv_id`, `branch_id`, `create_by`, `update_by`, `created_at`, `updated_at`) VALUES
('DRV001', '10', 'yalong', NULL, '2020-12-02 11:07:35', '2020-12-02 11:07:35'),
('DRV002', '11', 'yalong', 'yalong', '2020-11-07 06:39:41', '2020-11-10 01:52:54');

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

--
-- Dumping data for table `trc_mst_vehicles`
--

INSERT INTO `trc_mst_vehicles` (`vhc_id`, `vhc_name`, `vhc_plat_no`, `vhc_year`, `vhc_cc`, `vhc_machine_no`, `vhc_frame_no`, `vhc_color`, `vhc_count_ban`, `remark`, `is_asset`, `active`, `create_by`, `update_by`, `created_at`, `updated_at`) VALUES
('V001', 'HINO 1928', 'B1928UJX', 2010, 6500, 'GDFGD23423', 'ASDASFSGDFVXCVC', 'HIJAU', 12, NULL, NULL, 'Y', 'yalong', NULL, '2020-11-14 06:42:58', '2020-11-14 06:42:58'),
('V002', 'HINO 1929', 'B1929UUU', 2020, 6000, 'KSFDJNFSJKN', 'SJKDFSKJDNFS', 'HITAM', 12, NULL, NULL, 'Y', 'yalong', NULL, '2020-11-14 07:12:13', '2020-11-14 07:12:13');

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

--
-- Dumping data for table `trc_mst_vehicle_branchs`
--

INSERT INTO `trc_mst_vehicle_branchs` (`vhc_id`, `branch_id`, `create_by`, `update_by`, `created_at`, `updated_at`) VALUES
('V001', '10', 'yalong', NULL, '2020-11-14 06:42:58', '2020-11-14 06:42:58'),
('V002', '11', 'yalong', NULL, '2020-11-14 07:12:13', '2020-11-14 07:12:13');

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

--
-- Dumping data for table `trc_mst_vehicle_docs`
--

INSERT INTO `trc_mst_vehicle_docs` (`vhc_id`, `doc_id`, `doc_name`, `type`, `owner_id`, `doc_no`, `doc_exp_date`, `remark`, `create_by`, `update_by`, `created_at`, `updated_at`) VALUES
('V001', 'DV001', 'STNK HINO 1928', 'Perusahaan', 'L5B', '11', '2020-12-30', NULL, 'yalong', NULL, '2020-11-14 06:43:24', '2020-11-14 06:43:24'),
('V001', 'DV002', 'KIR HINO 1928', 'Perusahaan', 'L5B', '12', '2020-12-31', NULL, 'yalong', NULL, '2020-11-14 06:43:50', '2020-11-14 06:43:50'),
('V002', 'DV001', 'STNK HINO 1989', 'Perusahaan', 'L5B', '111', '2020-11-30', 'SDFSDFSDFS', 'yalong', NULL, '2020-11-14 07:12:36', '2020-11-14 07:12:36'),
('V002', 'DV002', 'KIR HINO 1989', 'Perusahaan', 'L5B', '12', '2020-11-23', 'KIRI', 'yalong', NULL, '2020-11-14 07:13:02', '2020-11-14 07:13:02');

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

--
-- Dumping data for table `trc_trn_driver_hist_jobs`
--

INSERT INTO `trc_trn_driver_hist_jobs` (`sched_id`, `line`, `seqno`, `empl_id`, `si_id`, `status`, `date_action`, `create_by`, `created_at`, `updated_at`) VALUES
('10SCH01', 1, 1, 'K001', 'SI01A', 'Receive', '2020-12-22 19:28:49', 'K001', '2020-12-22 12:28:49', '2020-12-22 12:28:49');

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

--
-- Dumping data for table `trc_trn_order_status`
--

INSERT INTO `trc_trn_order_status` (`id`, `sched_id`, `line`, `si_id`, `is_public`, `jobtime`, `description`, `create_by`, `created_at`, `updated_at`) VALUES
(19, '10SCH01', '1', 'SI01A', 'Y', '2020-12-22 19:28:48', 'Job Siap Dijalankan Sopir', 'K001', '2020-12-22 12:28:48', '2020-12-22 12:28:48');

-- --------------------------------------------------------

--
-- Table structure for table `trc_trn_schedule_dtls`
--

CREATE TABLE `trc_trn_schedule_dtls` (
  `sched_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `line` int(11) NOT NULL,
  `si_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buss_unit` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `depo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cust_id` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `line_cust` int(11) DEFAULT NULL,
  `cust_address` varchar(4000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pickup_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pickup_contact` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pickup_address` varchar(4000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dest_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dest_contact` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'OP=>Open, AS=>Assign, RJ=>ReceiveJob, OG=>OutGarasi, AD=>ArriveDepo, OD=>OutDepo, AP=>ArrivePickup, LP=>LoadingPickup, OP=>OutPickup, AU=>ArriveUnloading, UL=>Unloading, OU=>OutUnloading, CL=>Close',
  `create_by` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `update_by` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trc_trn_schedule_dtls`
--

INSERT INTO `trc_trn_schedule_dtls` (`sched_id`, `line`, `si_id`, `buss_unit`, `depo`, `cust_id`, `line_cust`, `cust_address`, `pickup_name`, `pickup_contact`, `pickup_address`, `dest_name`, `dest_contact`, `dest_address`, `latitude_pickup`, `longitude_pickup`, `latitude_dest`, `longitude_dest`, `cont_id`, `cont_no`, `padlock`, `seal_no`, `drv_id`, `vhc_id`, `amount`, `assign_driver`, `receive_assign`, `status`, `create_by`, `update_by`, `created_at`, `updated_at`) VALUES
('10SCH01', 1, 'SI01A', 'IMPORT', 'STARPIAA', '10C0001', NULL, 'JL. MARUNDA CENTER NO.2A', 'Tanjung Priok', 'BUDIA', 'Tj. Priok, Jl. Raya Pelabuhan No.9, Tj. Priok, Kota Jkt Utara, Daerah Khusus Ibukota Jakarta 14310, Indonesia', 'Marunda Center', 'AHMADAT', 'Pantai Makmur, Tarumajaya, Bekasi, West Java 17212, Indonesia', '-6.1076897', '106.883342', '-6.098889400000001', '106.9782064', '20F', '124323421', 'N', '13SFSD1231A', 'DRV001', 'V001', 150000, 'Y', 'Y', 'RJ', 'yalong', 'K001', '2020-11-17 11:00:09', '2020-12-22 12:28:48'),
('10SCH01', 2, 'SI01', 'IMPORT', 'STARPIA', '10C0001', NULL, 'JL. MARUNDA CENTER NO.2', 'Tanjung Priok', 'BUDI', 'Tj. Priok, Jl. Raya Pelabuhan No.9, Tj. Priok, Kota Jkt Utara, Daerah Khusus Ibukota Jakarta 14310, Indonesia', 'PT. Lintas Lima Benua', 'WARNI', 'Jl. Bandengan Selatan 80/ B19, RT.1, Pejagalan, Kec. Penjaringan, Kota Jkt Utara, Daerah Khusus Ibukota Jakarta 14450, Indonesia', '-6.1076897', '106.883342', '-6.1376132', '106.7949714', '20F', '12121', 'N', '534534', 'DRV002', 'V002', 1120000, 'Y', NULL, '', 'yalong', 'yalong', '2020-11-18 08:00:55', '2020-11-21 08:21:11'),
('10SCH02', 1, '10SI01A', 'EXPORT', 'STARPIAT', '10C0001', NULL, 'JL. MARUNDA CENTER NO.2', 'Tanjung Priok', 'AKIONG', 'Tanjung Priok, North Jakarta City, Jakarta, Indonesia', 'PT Chin Haur Indonesia', 'LEONI', 'Jl. Raya Curug Km.2 Kp. Cisereh, Kadu Jaya, Kec. Curug, Tangerang, Banten 15810, Indonesia', '-6.1320555', '106.8714848', '-6.2395521', '106.5619721', '20F', '12314', 'N', '43534', 'DRV001', 'V002', 1500000, 'Y', NULL, '', 'yalong', 'yalong', '2020-11-19 05:47:54', '2020-11-21 08:51:12');

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

--
-- Dumping data for table `trc_trn_schedule_hdrs`
--

INSERT INTO `trc_trn_schedule_hdrs` (`sched_id`, `sched_date`, `branch_id`, `grand_total`, `payment_id`, `create_by`, `update_by`, `created_at`, `updated_at`) VALUES
('10SCH01', '2020-12-23', '10', NULL, NULL, 'yalong', 'yalong', '2020-11-17 11:00:09', '2020-11-18 08:01:19'),
('10SCH02', '2020-11-02', '10', NULL, NULL, 'yalong', NULL, '2020-11-19 05:47:54', '2020-11-19 05:47:54');

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

--
-- Dumping data for table `trc_trn_schedule_tracks`
--

INSERT INTO `trc_trn_schedule_tracks` (`sched_id`, `line`, `receivejob_time`, `receivejob_lat`, `receivejob_long`, `outgarasi_time`, `outgarasi_lat`, `outgarasi_long`, `arrivedepo_time`, `arrivedepo_lat`, `arrivedepo_long`, `outdepo_time`, `outdepo_lat`, `outdepo_long`, `arrivepickup_time`, `arrivepickup_lat`, `arrivepickup_long`, `loadpickup_time`, `loadpickup_lat`, `loadpickup_long`, `outpickup_time`, `outpickup_lat`, `outpickup_long`, `arriveunload_time`, `arriveunload_lat`, `arriveunload_long`, `unload_time`, `unload_lat`, `unload_long`, `outunload_time`, `outunload_lat`, `outunload_long`, `close_time`, `close_lat`, `close_long`, `created_at`, `updated_at`) VALUES
('10SCH01', 1, '2020-12-22 19:28:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-22 12:28:49', '2020-12-22 12:28:49');

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
(1, 'Hartono Yang', 'yalong', NULL, '$2y$10$ZiUA0BwlBv4nBHxACR8/I.b.gP65Xcf57Re86TApEANg3PGo06yT2', NULL, '2020-10-23 03:03:30', '2020-12-11 15:41:17', 'Karyawan', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xOTIuMTY4LjEwMC4xNzU6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTYwNzcwMTI3NywiZXhwIjoxNjA3NzA0ODc3LCJuYmYiOjE2MDc3MDEyNzcsImp0aSI6IldPS2Mycm9QdkI5WGpJN0UiLCJzdWIiOjEsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.qQvas2Oy0Xp2WGbcnfDQm9yY51AagSVlbY2_quyRQ3c'),
(2, 'HARTONO', 'K001', NULL, '$2y$10$VEpcpifHo4.iIRhGFFRl.u9BWn0JQqEjw4mKAxAn.RxNgZ6Kv29B6', NULL, '2020-12-02 11:05:18', '2020-12-22 12:19:00', 'Driver', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTYwODYzOTU0MCwiZXhwIjoxNjA4NjQzMTQwLCJuYmYiOjE2MDg2Mzk1NDAsImp0aSI6IjlGVmE3c2JlcFlhazZ2Q0wiLCJzdWIiOjIsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.Yg2S7vQOZ753CSmLIXtxMyEF0WzEhfBmZ9WQ32RKk1o');

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
('yalong', '01', '', 'yalong', NULL, '2020-11-24 14:51:32'),
('K001', '10', 'yalong', 'yalong', '2020-12-02 11:16:34', '2020-12-02 11:19:18');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `trc_trn_order_status`
--
ALTER TABLE `trc_trn_order_status`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
