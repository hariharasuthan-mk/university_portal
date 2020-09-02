-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2020 at 04:28 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_university_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `author_id` bigint(20) UNSIGNED DEFAULT NULL,
  `university_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `duration`, `status`, `author_id`, `university_id`, `department_id`, `created_at`, `updated_at`) VALUES
(7, 'Devops CSK 1year', '1 Year', 'yes', 15, 3, 14, '2020-08-01 15:54:22', '2020-08-20 10:42:27'),
(8, 'Devops CSK 6 months', '6 months', 'yes', 15, 3, 14, '2020-08-05 15:54:32', '2020-08-20 10:42:54'),
(9, 'Data Science  1 Year', '1 year', 'yes', 5, 6, 1, '2020-08-06 15:54:43', '2020-08-28 03:19:39'),
(10, 'Data Science  6 month', '6 month', 'yes', 5, 6, 1, '2020-08-06 15:54:54', '2020-08-20 10:54:53'),
(11, 'Mechcronics 1 year', '1 year', 'yes', 5, 6, 3, '2020-08-12 15:55:04', '2020-08-20 22:25:49'),
(12, 'Mechcronics 2years', '2 years', 'yes', 5, 6, 3, '2020-08-18 15:55:15', '2020-08-20 10:54:46'),
(18, 'mechatronics level 2', '2 Year', 'yes', 5, 6, 3, '2020-08-20 12:38:26', '2020-08-28 03:20:25'),
(19, 'Course 1 depo2', '2 month', 'yes', 15, 3, 15, '2020-08-21 01:21:48', '2020-08-21 01:21:48'),
(20, 'Course 2 depo2', '2 month', 'yes', 15, 3, 15, '2020-08-21 01:22:10', '2020-08-21 01:22:10'),
(21, 'Course 1 depo1', '1 year', 'yes', 15, 3, 14, '2020-08-21 01:22:26', '2020-08-21 01:22:26'),
(22, 'Course 2 depo1', '1 month', 'yes', 15, 3, 14, '2020-08-21 01:22:44', '2020-08-21 03:41:34'),
(23, 'Mongodb-1', '1 year', 'yes', 15, 3, 2, '2020-08-23 00:06:47', '2020-08-23 00:06:47'),
(24, 'Mongodb-2', '1 year', 'yes', 15, 3, 2, '2020-08-23 00:06:58', '2020-08-23 00:06:58'),
(25, 'Mongodb-3', '1 year', 'yes', 15, 3, 2, '2020-08-23 00:07:10', '2020-08-23 00:07:10'),
(26, 'Planning Primavera', '6 Month', 'yes', 5, 6, 22, '2020-08-28 00:55:21', '2020-08-28 00:55:21'),
(27, 'Heavy engineering', '6 month', 'yes', 5, 6, 22, '2020-08-28 04:06:14', '2020-08-28 04:06:14');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `university_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `university_id`, `created_at`, `updated_at`) VALUES
(1, 'Computer Engineering', 6, '2020-08-10 11:39:37', '2020-08-25 11:49:09'),
(2, 'DBMS IIT Madras', 3, '2020-08-10 11:39:37', '2020-08-14 03:54:07'),
(3, 'Mech Engineering', 6, '2020-08-10 11:39:37', '2020-08-25 11:48:49'),
(4, 'Bombay department-1', 1, '2020-08-03 13:03:46', '2020-08-17 02:57:15'),
(5, 'Department-1', 6, '2020-08-03 13:03:46', '2020-08-31 06:21:15'),
(14, 'IIT Madras - Department-1', 3, '2020-08-11 07:07:42', '2020-08-11 07:09:20'),
(15, 'IIT Madras - Department-2', 3, '2020-08-11 07:08:45', '2020-08-11 07:09:35'),
(16, 'Mechanical Usmania', 13, '2020-08-14 04:32:35', '2020-08-25 11:26:37'),
(17, 'Department-tanjore-1', 12, '2020-08-25 11:25:18', '2020-08-25 11:25:31'),
(18, 'Department-tanjore-2', 12, '2020-08-25 11:25:39', '2020-08-25 11:25:39'),
(19, 'Department-tanjore-3', 12, '2020-08-25 11:25:46', '2020-08-25 11:25:46'),
(20, 'Electrical Usmania', 13, '2020-08-25 11:26:59', '2020-08-25 11:26:59'),
(22, 'Electrical Engineering', 6, '2020-08-28 00:53:37', '2020-08-28 00:54:03'),
(24, 'a', 6, '2020-08-31 06:11:31', '2020-08-31 06:11:31');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author_by` bigint(20) UNSIGNED NOT NULL,
  `assigned_to` bigint(20) UNSIGNED NOT NULL,
  `batch_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `name`, `file_path`, `author_by`, `assigned_to`, `batch_id`, `created_at`, `updated_at`) VALUES
(33, '1598715698_sample.pdf', 'studentfiles/1598715698_sample.pdf', 3, 12, 11, '2020-08-29 10:11:38', '2020-08-29 10:11:38'),
(34, '1598780125_sample.pdf', 'studentfiles/1598780125_sample.pdf', 3, 12, 12, '2020-08-30 04:05:25', '2020-08-30 04:05:25'),
(35, NULL, 'studentfiles/1599053828_sample.pdf', 3, 12, 13, '2020-09-02 08:07:08', '2020-09-02 08:07:08');

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
(3, '2020_08_08_094455_create_permission_tables', 1),
(4, '2020_08_08_094548_create_products_table', 1),
(5, '2020_08_10_084305_create_university_table', 2),
(6, '2020_08_10_114256_create_university-member_table', 3),
(7, '2020_08_10_115413_create_university-member_table', 4),
(8, '2020_08_11_094001_create_state_table', 5),
(9, '2020_08_11_113737_create_department_table', 6),
(10, '2020_08_11_125550_create_student_table', 7),
(11, '2020_08_11_135750_create_studentbatch_table', 8),
(12, '2020_08_11_141720_create_studentbatchhistory_table', 9),
(13, '2020_08_11_144742_create_studentbatchhistory_table', 10),
(14, '2020_08_11_145155_create_studentbatchhistory_table', 11),
(15, '2020_08_12_055502_create_courses_table', 12),
(16, '2020_08_12_070719_create_studentbatch_table', 13),
(17, '2020_08_12_071357_create_studentbatchhistory_table', 14),
(18, '2020_08_12_072108_create_courses_table', 15),
(19, '2020_08_12_072503_create_courseshistory_table', 16),
(20, '2020_08_12_074839_create_courseshistory_table', 17),
(21, '2020_08_12_080407_create_studentbatchhistory_table', 18),
(22, '2020_08_12_080830_create_studentbatchhistory_table', 19),
(23, '2020_08_12_081112_create_studentbatchhistory_table', 20),
(24, '2020_08_12_081500_create_studentbatchhistory_table', 21),
(25, '2020_08_12_151859_create_studentbatch_table', 22),
(26, '2020_08_12_152357_create_studentbatchhistory_table', 23),
(27, '2020_08_13_150039_create_studentbatch_table', 24),
(28, '2020_08_14_105811_create_student_table', 25),
(29, '2020_08_14_110206_create_student_table', 26),
(30, '2020_08_14_111053_create_student_table', 27),
(31, '2020_08_17_133117_create_course_table', 28),
(32, '2020_08_17_134215_create_course_table', 29),
(33, '2020_08_17_134621_create_course_table', 30),
(34, '2020_08_17_134849_create_course_table', 31),
(35, '2020_08_20_145715_create_course_table', 32),
(36, '2020_08_21_101859_create_student_table', 33),
(37, '2020_08_21_102100_create_student_table', 34),
(38, '2020_08_21_102416_create_student_table', 35),
(39, '2020_08_23_074242_create_files_table', 36),
(40, '2020_08_23_095045_create_files_table', 37),
(41, '2020_08_23_100302_create_files_table', 38),
(42, '2020_08_24_052205_create_files_table', 39),
(43, '2020_08_24_082148_create_files_table', 40),
(44, '2020_08_24_082635_create_files_table', 41),
(45, '2020_08_24_094020_create_files_table', 42),
(46, '2020_08_24_094855_create_files_table', 43),
(47, '2020_08_25_062917_create_studentbatch2_table', 44),
(48, '2020_08_26_093407_create_studentbatch2_table', 45),
(49, '2020_08_26_093713_create_studentbatch_table', 46),
(50, '2020_08_26_104826_create_results_table', 47),
(51, '2020_08_26_124143_create_results_table', 48),
(52, '2020_08_26_160542_create_results_table', 49),
(53, '2020_08_27_061739_create_results_table', 50),
(56, '2020_09_02_072613_create_category_table', 51),
(57, '2020_09_02_141915_create_table1_table', 52);

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
(1, 'App\\User', 1),
(2, 'App\\User', 5),
(2, 'App\\User', 15),
(3, 'App\\User', 3),
(3, 'App\\User', 4),
(3, 'App\\User', 13),
(4, 'App\\User', 10),
(4, 'App\\User', 11),
(4, 'App\\User', 12);

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
(1, 'role-list', 'web', '2020-08-08 06:55:24', '2020-08-08 06:55:24'),
(2, 'role-create', 'web', '2020-08-08 06:55:24', '2020-08-08 06:55:24'),
(3, 'role-edit', 'web', '2020-08-08 06:55:24', '2020-08-08 06:55:24'),
(4, 'role-delete', 'web', '2020-08-08 06:55:24', '2020-08-08 06:55:24'),
(9, 'university-list', 'web', '2020-08-10 09:26:44', '2020-08-10 09:26:44'),
(10, 'university-create', 'web', '2020-08-09 09:28:20', '2020-08-09 09:28:20'),
(11, 'university-edit', 'web', '2020-08-09 09:28:20', '2020-08-09 09:28:20'),
(12, 'university-delete', 'web', '2020-08-09 09:29:20', '2020-08-09 09:29:20'),
(17, 'state-list', 'web', '2020-08-10 10:35:07', '2020-08-10 10:35:07'),
(18, 'state-create', 'web', '2020-08-10 10:35:07', '2020-08-10 10:35:07'),
(19, 'state-edit', 'web', '2020-08-10 10:35:07', '2020-08-10 10:35:07'),
(20, 'state-delete', 'web', '2020-08-10 10:35:07', '2020-08-10 10:35:07'),
(21, 'department-list', 'web', '2020-08-03 13:03:46', '2020-08-03 13:03:46'),
(22, 'department-create', 'web', '2020-08-03 13:03:46', '2020-08-03 13:03:46'),
(23, 'department-edit', 'web', '2020-08-03 13:03:46', '2020-08-03 13:03:46'),
(24, 'department-delete', 'web', '2020-08-03 13:03:46', '2020-08-03 13:03:46'),
(25, 'studentbatch-list', 'web', '2020-08-13 09:59:55', '2020-08-13 09:59:55'),
(26, 'studentbatch-create', 'web', '2020-08-13 10:00:48', '2020-08-13 10:00:48'),
(27, 'studentbatch-edit', 'web', '2020-08-13 10:00:48', '2020-08-13 10:00:48'),
(28, 'studentbatch-delete', 'web', '2020-08-13 10:00:48', '2020-08-13 10:00:48'),
(29, 'course-list', 'web', '2020-08-16 14:15:04', '2020-08-16 14:15:04'),
(30, 'course-create', 'web', '2020-08-16 14:15:04', '2020-08-16 14:15:04'),
(31, 'course-edit', 'web', '2020-08-16 14:15:04', '2020-08-16 14:15:04'),
(32, 'course-delete', 'web', '2020-08-16 14:15:04', '2020-08-16 14:15:04'),
(33, 'studentbatchhistory-list', 'web', '2020-08-19 13:48:22', '2020-08-19 13:48:22'),
(34, 'studentbatchhistory-create', 'web', '2020-08-19 13:48:22', '2020-08-19 13:48:22'),
(35, 'studentbatchhistory-edit', 'web', '2020-08-19 13:48:22', '2020-08-19 13:48:22'),
(36, 'studentbatchhistory-delete', 'web', '2020-08-19 13:48:22', '2020-08-19 13:48:22'),
(37, 'files-list', 'web', '2020-08-23 06:00:47', '2020-08-03 16:29:14'),
(38, 'files-create', 'web', '2020-08-23 06:00:47', '2020-08-23 06:00:47'),
(39, 'files-delete', 'web', '2020-08-23 06:00:47', '2020-08-03 16:29:14'),
(40, 'files-edit', 'web', '2020-08-23 06:00:47', '2020-08-23 06:00:47'),
(41, 'student-list', 'web', '2020-08-24 13:32:32', '2020-08-24 13:32:32'),
(42, 'student-create', 'web', '2020-08-24 13:32:32', '2020-08-24 13:32:32'),
(43, 'student-edit', 'web', '2020-08-24 13:32:32', '2020-08-24 13:32:32'),
(44, 'student-delete', 'web', '2020-08-24 13:32:32', '2020-08-24 13:32:32'),
(46, 'result-list', 'web', '2020-08-25 15:57:09', '2020-08-25 15:57:09'),
(47, 'result-create', 'web', '2020-08-25 15:57:09', '2020-08-25 15:57:09'),
(48, 'result-edit', 'web', '2020-08-25 15:57:09', '2020-08-25 15:57:09'),
(49, 'result-delete', 'web', '2020-08-25 15:57:09', '2020-08-25 15:57:09'),
(50, 'user-list', 'web', '2020-08-28 15:54:24', '2020-08-28 15:54:24'),
(51, 'user-create', 'web', '2020-08-28 15:54:24', '2020-08-28 15:54:24'),
(52, 'user-edit', 'web', '2020-08-28 15:54:24', '2020-08-28 15:54:24'),
(53, 'user-delete', 'web', '2020-08-28 15:54:24', '2020-08-28 15:54:24');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `finallist` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`finallist`)),
  `batch_id` bigint(20) UNSIGNED NOT NULL,
  `author_id` bigint(20) UNSIGNED NOT NULL,
  `requested_to` bigint(20) UNSIGNED NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `finallist`, `batch_id`, `author_id`, `requested_to`, `body`, `publish`, `course_id`, `created_at`, `updated_at`) VALUES
(11, '[\"5\",\"7\",\"9\"]', 12, 3, 3, 'pass', 'yes', 8, '2020-08-30 04:06:05', '2020-08-30 04:06:37');

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
(1, 'Superadmin', 'web', '2020-08-08 05:41:13', '2020-08-08 05:41:13'),
(2, 'Universityadmin', 'web', '2020-08-08 05:49:10', '2020-08-13 23:33:27'),
(3, 'TP', 'web', '2020-08-08 06:04:19', '2020-08-08 06:04:19'),
(4, 'SNO', 'web', '2020-08-08 07:04:51', '2020-08-08 07:04:51');

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
(1, 4),
(2, 1),
(3, 1),
(4, 1),
(9, 1),
(9, 2),
(9, 3),
(9, 4),
(10, 1),
(11, 1),
(12, 1),
(17, 1),
(17, 2),
(17, 3),
(17, 4),
(18, 1),
(18, 2),
(19, 1),
(19, 2),
(20, 1),
(20, 2),
(21, 1),
(21, 2),
(21, 3),
(21, 4),
(22, 1),
(22, 2),
(23, 1),
(23, 2),
(24, 1),
(25, 1),
(25, 2),
(25, 3),
(25, 4),
(26, 3),
(27, 4),
(29, 2),
(29, 3),
(30, 2),
(31, 2),
(32, 2),
(33, 1),
(34, 1),
(34, 2),
(34, 3),
(34, 4),
(35, 1),
(35, 4),
(36, 1),
(37, 1),
(37, 2),
(37, 3),
(37, 4),
(38, 3),
(39, 3),
(40, 3),
(41, 1),
(41, 2),
(41, 3),
(41, 4),
(42, 1),
(42, 3),
(44, 1),
(46, 1),
(46, 2),
(46, 3),
(46, 4),
(47, 4),
(48, 2),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `state`, `author_id`, `created_at`, `updated_at`) VALUES
(2, 'Assam', 1, '2020-08-03 07:21:49', '2020-08-03 07:21:49'),
(3, 'Bihar', 1, '2020-08-03 07:21:49', '2020-08-03 07:21:49'),
(4, 'Chhattisgarh', 1, '2020-08-03 07:21:49', '2020-08-03 07:21:49'),
(5, 'Goa', 1, '2020-08-11 05:26:58', '2020-08-11 05:26:58'),
(6, 'Gujarat', 1, '2020-08-11 05:27:20', '2020-08-11 05:27:20'),
(7, 'Haryana', 1, '2020-08-11 05:27:31', '2020-08-11 05:27:31'),
(8, 'Himachal Pradesh', 1, '2020-08-11 05:27:40', '2020-08-11 05:27:40'),
(9, 'Jammu and Kashmir', 1, '2020-08-11 05:27:54', '2020-08-11 05:27:54'),
(10, 'Jharkhand', 1, '2020-08-11 05:28:06', '2020-08-11 05:28:06'),
(11, 'Karnataka', 1, '2020-08-11 05:28:15', '2020-08-11 05:28:15'),
(12, 'Kerala', 1, '2020-08-11 05:28:27', '2020-08-11 05:28:27'),
(13, 'Madhya Pradesh', 1, '2020-08-11 05:29:00', '2020-08-11 05:29:00'),
(14, 'Maharashtra', 1, '2020-08-11 05:29:12', '2020-08-11 05:29:12'),
(15, 'Manipur', 1, '2020-08-11 05:29:23', '2020-08-11 05:29:23'),
(16, 'Meghalaya', 1, '2020-08-11 05:29:34', '2020-08-11 05:29:34'),
(17, 'Tamil Nadu', 1, '2020-08-11 05:29:58', '2020-08-11 05:29:58'),
(18, 'Mizoram', 1, '2020-08-11 05:30:15', '2020-08-11 05:30:15'),
(19, 'Nagaland', 1, '2020-08-11 05:30:30', '2020-08-11 05:30:30'),
(20, 'Odisha', 1, '2020-08-11 05:30:40', '2020-08-11 05:30:40'),
(21, 'Punjab', 1, '2020-08-11 05:30:47', '2020-08-11 05:30:47'),
(22, 'Rajasthan', 1, '2020-08-11 05:30:55', '2020-08-11 05:30:55'),
(23, 'Sikkim', 1, '2020-08-11 05:31:03', '2020-08-11 05:31:03'),
(24, 'Telangana', 1, '2020-08-11 05:31:11', '2020-08-11 05:31:11'),
(25, 'Tripura', 1, '2020-08-11 05:31:19', '2020-08-11 05:31:19');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` enum('male','female') COLLATE utf8mb4_unicode_ci NOT NULL,
  `university_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `fullname`, `sex`, `university_id`, `department_id`, `created_at`, `updated_at`) VALUES
(1, 'DHARUN', 'A DHARUN', 'male', 3, 14, '2020-08-20 10:25:03', '2020-08-20 10:25:03'),
(2, 'ADITH', 'ADITH HARI NARAYANA', 'male', 3, 14, '2020-08-20 10:25:03', '2020-08-20 10:25:03'),
(3, 'ANGELIN BLESSY M J ', 'ANGELIN BLESSY M J ', 'female', 3, 14, '2020-08-20 10:25:03', '2020-08-20 10:25:03'),
(4, 'ANUMEENA', 'ANUMEENA SORNA', 'female', 3, 14, '2020-08-20 10:25:03', '2020-08-20 10:25:03'),
(5, 'ANUSHA S', 'ANUSHA S', 'female', 3, 14, '2020-08-20 10:30:03', '2020-08-20 10:30:03'),
(6, 'ARUTSELVAN D', 'ARUTSELVAN D', 'male', 6, 3, '2020-08-20 10:30:03', '2020-08-20 10:30:03'),
(7, 'BANNA VENKATESH', 'BANNA VENKATESH', 'male', 3, 14, '2020-08-20 10:30:03', '2020-08-20 10:30:03'),
(8, 'CHARUMATHI P R', 'CHARUMATHI P R', 'female', 6, 3, '2020-08-20 10:30:03', '2020-08-20 10:30:03'),
(9, 'D SUDESHNA', 'BANNA VENKATESH', 'female', 3, 14, '2020-08-20 10:30:03', '2020-08-20 10:30:03'),
(10, 'DAMARLA KUVALAYA DATTA', 'CHARUMATHI P R', 'male', 6, 3, '2020-08-20 10:30:03', '2020-08-20 10:30:03'),
(11, 'R PRAVEEN ', 'R PRAVEEN', 'male', 3, 15, '2020-08-20 10:34:57', '2020-08-20 10:34:57'),
(12, 'RAJARSHI MAJI', 'RAJARSHI MAJI', 'male', 3, 15, '2020-08-20 10:34:57', '2020-08-20 10:34:57'),
(13, 'RONGALI RAHITYA ', 'RONGALI RAHITYA', 'male', 3, 15, '2020-08-20 10:34:57', '2020-08-20 10:34:57'),
(14, 'RUPESH GUPTA', 'RUPESH GUPTA', 'male', 3, 15, '2020-08-20 10:34:57', '2020-08-20 10:34:57'),
(15, 'SRIVATSAN. R ', 'SRIVATSAN. R', 'male', 3, 15, '2020-08-20 10:34:57', '2020-08-20 10:34:57'),
(16, 'SURENDAR KOTTE ', 'THOTA ADITYA VIVEK', 'male', 3, 15, '2020-08-20 10:34:57', '2020-08-20 10:34:57'),
(17, 'VENKATESH MOHAN', 'VENKATESH MOHAN', 'male', 3, 15, '2020-08-20 10:34:57', '2020-08-20 10:34:57'),
(18, 'VISWANADHAPALLI SAI KIRAN', 'VISWANADHAPALLI SAI KIRAN', 'male', 3, 15, '2020-08-20 10:34:57', '2020-08-20 10:34:57'),
(19, 'S MADHAN', 'S MADHAN', 'male', 3, 15, '2020-08-20 10:34:57', '2020-08-20 10:34:57'),
(20, 'SAVANA RAMYA', 'SAVANA RAMYA', 'female', 3, 15, '2020-08-20 10:34:57', '2020-08-20 10:34:57'),
(21, 'SRIVATSAN', 'SRIVATSAN', 'male', 3, 15, '2020-08-20 10:34:57', '2020-08-20 10:34:57'),
(22, 'SURENDAR KOTTE', 'SURENDAR KOTTE', 'female', 3, 15, '2020-08-20 10:34:57', '2020-08-20 10:34:57'),
(23, 'DAMARLA KUVALAYA DATTA', 'DAMARLA KUVALAYA DATTA', 'male', 3, 15, '2020-08-20 10:34:57', '2020-08-20 10:34:57'),
(24, 'DIWATE ABHISHEK', 'DIWATE ABHISHEK', 'female', 3, 15, '2020-08-20 10:34:57', '2020-08-20 10:34:57'),
(25, 'GARAPATI DURGA VENU', 'DAMARLA KUVALAYA DATTA', 'male', 3, 15, '2020-08-20 10:34:57', '2020-08-20 10:34:57'),
(26, 'IMMARAJU SHARON BEAULAH CHRISTINA', 'IMMARAJU SHARON BEAULAH CHRISTINA', 'female', 3, 15, '2020-08-20 10:34:57', '2020-08-20 10:34:57'),
(27, 'THOTA ADITYA VIVEK', 'THOTA ADITYA VIVEK', 'male', 6, 3, '2020-08-03 13:03:46', '2020-08-03 16:29:14'),
(28, 'S PRAKASH ', 'S PRAKASH ', 'male', 6, 3, '2020-08-20 10:41:15', '2020-08-04 16:32:22'),
(29, 'S YASHWANTH', 'S YASHWANTH', 'male', 6, 3, '2020-08-03 13:03:46', '2020-08-03 16:29:14'),
(30, 'SAVANA RAMYA', 'SAVANA RAMYA', 'male', 6, 3, '2020-08-20 10:41:15', '2020-08-04 16:32:22'),
(31, 'ADITH samon', 'ADITH samon', 'male', 3, 2, '2020-08-21 05:20:06', '2020-08-21 05:20:06'),
(32, 'ADITH samon2', 'ADITH samon2', 'male', 3, 2, '2020-08-21 05:20:06', '2020-08-21 05:20:06'),
(33, 'ADITH jamth', 'ADITH jamth', 'male', 3, 2, '2020-08-21 05:20:06', '2020-08-21 05:20:06'),
(34, 'vaithi', 'vaithi', 'male', 3, 2, '2020-08-21 05:20:06', '2020-08-21 05:20:06'),
(35, 'Guhan', 'Guhan rav', 'male', 6, 1, '2020-08-03 13:03:46', '2020-08-03 16:29:14'),
(36, 'Rav Kumar', 'Rav Kumar', 'male', 6, 1, '2020-08-03 13:03:46', '2020-08-03 13:03:46'),
(37, 'Gowri', 'Gowri', 'female', 6, 1, '2020-08-03 13:03:46', '2020-08-03 16:29:14'),
(38, 'Kumari', 'Kumari', 'female', 6, 1, '2020-08-03 13:03:46', '2020-08-03 13:03:46'),
(39, 'Gowri khan', 'Gowri', 'female', 6, 1, '2020-08-03 13:03:46', '2020-08-03 16:29:14'),
(40, 'Visva Kumar ', 'Visva Kumar', 'male', 6, 1, '2020-08-03 13:03:46', '2020-08-03 13:03:46'),
(41, 'Chakravarthy', 'Chakravarthy RAM', 'male', 3, 2, '2020-08-03 13:03:46', '2020-08-03 16:29:14'),
(45, 'Sukukumar', 'Sukukumar m', 'male', 13, 20, '2020-08-25 11:54:57', '2020-08-25 11:54:57'),
(46, 'Shashikanth', 'Shashikanth.D', 'male', 13, 16, '2020-08-25 11:56:41', '2020-08-25 11:56:41'),
(47, 'Farukh', 'Farukh M', 'male', 13, 16, '2020-08-25 11:57:09', '2020-08-25 11:57:09'),
(48, 'loream ipsam', 'loream ipsam full name', 'female', 3, 2, '2020-08-27 05:13:14', '2020-08-27 05:13:14'),
(49, 'hamavera', 'Hamavera V', 'male', 6, 22, '2020-08-28 00:56:46', '2020-08-28 00:56:46'),
(50, 'hemanth bajaj', 'hemanth bajaj khnaa', 'male', 6, 22, '2020-08-28 00:57:32', '2020-08-28 00:57:32'),
(51, 'Amit', 'Amit Meghanani', 'male', 6, 22, '2020-08-28 01:01:53', '2020-08-28 01:01:53'),
(52, 'Nirabhra', 'Nirabhra Mandal', 'male', 6, 22, '2020-08-28 01:02:19', '2020-08-28 01:02:19'),
(53, 'Sai Pavan', 'Polisetty Sai Pavan', 'male', 6, 22, '2020-08-28 01:03:05', '2020-08-28 01:03:05'),
(54, 'Puneet Kumar', 'Puneet Kumar', 'male', 6, 22, '2020-08-28 01:03:24', '2020-08-28 01:03:24'),
(55, 'Sagnik Kumar', 'Sagnik Kumar', 'male', 6, 22, '2020-08-28 01:03:41', '2020-08-28 01:03:41'),
(56, 'Ahmad Arfeen', 'Ahmad Arfeen', 'male', 6, 22, '2020-08-28 01:03:56', '2020-08-28 01:03:56'),
(57, 'Deep Bhasker Patel', 'Deep Bhasker Patel', 'male', 6, 22, '2020-08-28 01:04:21', '2020-08-28 01:04:21'),
(58, 'test123', 'test123 fdy', 'male', 6, 22, '2020-08-28 04:06:58', '2020-08-28 04:06:58'),
(59, 'ramnivas', 'ramnivas Kumar', 'male', 3, 15, '2020-09-02 08:05:42', '2020-09-02 08:05:42'),
(60, 'kumarram', 'kumarram', 'male', 3, 15, '2020-09-02 08:09:09', '2020-09-02 08:09:09');

-- --------------------------------------------------------

--
-- Table structure for table `studentbatch`
--

CREATE TABLE `studentbatch` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `batchname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `requested` bigint(20) UNSIGNED NOT NULL,
  `list` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`list`)),
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `studentbatch`
--

INSERT INTO `studentbatch` (`id`, `batchname`, `status`, `requested`, `list`, `course_id`, `created_at`, `updated_at`) VALUES
(12, 'sdfsdfsdfsd', 'yes', 3, '[\"1\",\"2\",\"3\",\"4\",\"5\",\"7\",\"9\"]', 8, '2020-08-30 04:05:25', '2020-08-30 04:05:52'),
(13, 'test batch sno1', 'no', 3, '[\"11\",\"12\",\"13\",\"14\",\"15\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\",\"23\",\"24\",\"25\",\"26\",\"59\"]', 19, '2020-09-02 08:07:08', '2020-09-02 08:07:08');

-- --------------------------------------------------------

--
-- Table structure for table `studentbatchhistory`
--

CREATE TABLE `studentbatchhistory` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `requested` bigint(20) UNSIGNED NOT NULL,
  `responded` bigint(20) UNSIGNED NOT NULL,
  `depo_id` bigint(20) UNSIGNED DEFAULT NULL,
  `batch_id` bigint(20) UNSIGNED NOT NULL,
  `batch_status` enum('batch_initiation','denied','inprogress','not_yet_started','waiting_for_approval','approved') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'waiting_for_approval',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `studentbatchhistory`
--

INSERT INTO `studentbatchhistory` (`id`, `subject`, `body`, `requested`, `responded`, `depo_id`, `batch_id`, `batch_status`, `created_at`, `updated_at`) VALUES
(81, 'sdfsdfsdfsdvf', 'sdfsdfsdv dfev', 3, 12, 14, 12, 'batch_initiation', '2020-08-30 04:05:25', '2020-08-30 04:05:25'),
(82, 'afsdf', 'sdfsvs vfdv', 3, 12, 14, 12, 'approved', '2020-08-30 04:05:52', '2020-08-30 04:05:52'),
(83, 'test batch sno1', 'test batch sno1', 3, 12, 15, 13, 'batch_initiation', '2020-09-02 08:07:09', '2020-09-02 08:07:09');

-- --------------------------------------------------------

--
-- Table structure for table `university`
--

CREATE TABLE `university` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_id` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `status` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `university`
--

INSERT INTO `university` (`id`, `name`, `author_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Indian Institute of Technology Bombay', 1, 'yes', '2020-08-04 23:40:49', '2020-08-04 23:40:49'),
(2, 'Indian Institute of Technology Kanpur', 1, 'yes', '2020-08-04 23:40:49', '2020-08-04 23:40:49'),
(3, 'Indian Institute of Technology Madras', 1, 'yes', '2020-08-04 23:40:49', '2020-08-04 23:40:49'),
(4, 'Indian Institute of Technology Delhi', 1, 'yes', '2020-08-04 23:40:49', '2020-08-04 23:40:49'),
(5, 'Indian Institute of Technology Kharagpur', 1, 'yes', '2020-08-04 23:40:49', '2020-08-04 23:40:49'),
(6, 'Kerala University', 1, 'yes', '2020-08-04 23:40:49', '2020-08-04 23:40:49'),
(12, 'Tanjore', 1, 'yes', '2020-08-10 07:50:13', '2020-08-25 10:48:06'),
(13, 'Usmaniya University', 1, 'yes', '2020-08-10 10:10:51', '2020-08-25 10:47:46');

-- --------------------------------------------------------

--
-- Table structure for table `universitymember`
--

CREATE TABLE `universitymember` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `universitymember`
--

INSERT INTO `universitymember` (`id`, `university_id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(11, 6, 4, 'yes', '2020-08-11 02:40:07', '2020-08-11 02:40:07'),
(13, 3, 13, 'yes', '2020-08-14 01:55:29', '2020-08-14 01:55:29'),
(31, 6, 5, 'yes', '2020-08-17 02:46:41', '2020-08-17 02:46:41'),
(37, 3, 3, 'yes', '2020-08-17 03:00:12', '2020-08-17 03:00:12'),
(38, 6, 3, 'yes', '2020-08-17 03:00:12', '2020-08-17 03:00:12'),
(55, 3, 11, 'yes', '2020-08-20 11:27:43', '2020-08-20 11:27:43'),
(56, 6, 11, 'yes', '2020-08-20 11:27:43', '2020-08-20 11:27:43'),
(57, 3, 12, 'yes', '2020-08-20 11:32:11', '2020-08-20 11:32:11'),
(58, 6, 12, 'yes', '2020-08-20 11:32:12', '2020-08-20 11:32:12'),
(59, 13, 1, 'yes', '2020-08-28 03:55:23', '2020-08-28 03:55:23'),
(60, 1, 10, 'yes', '2020-08-29 10:28:54', '2020-08-29 10:28:54'),
(78, 3, 15, 'yes', '2020-08-31 05:27:16', '2020-08-31 05:27:16');

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
(1, 'Super Admin', 'superadmin@universityportal.com', NULL, '$2y$10$UX8brITPfjLjysdkNh6GMOxNOyQjL1KuwFWNR94WOqGCwC6alSDHC', 'SOpHoeYv0eqiueFHC11UCBi0aDeKVFsIoepQzjZLcx2L1JWsdUW58QCXFqLA', '2020-08-08 05:41:13', '2020-08-28 03:55:23'),
(3, 'Training Partner 1 Kerala Madras', 'tp_1_kerala@universityportal.com', NULL, '$2y$10$QCV/3leRy/TFVTbn/smjI.4FUkJPaEr8zYzudTFvtGVN.JkjE89I6', NULL, '2020-08-08 06:04:19', '2020-08-17 03:00:12'),
(4, 'Training Partner 2 Kerala', 'tp_2_kerala@universityportal.com', NULL, '$2y$10$S2m.7OROhvPqyVanL8k4e.3to.pBX3AjFMHYoF7ny0nG.3zOr2vp2', NULL, '2020-08-08 07:02:42', '2020-08-11 08:18:25'),
(5, 'Admin Kerala', 'admin_kerala@universityportal.com', NULL, '$2y$10$XH5nzuSrzuWY.6WQYvRdaO/vBnJVTbjAe7h9XnsxW51lL64FPmKGu', NULL, '2020-08-09 21:52:15', '2020-08-14 00:09:59'),
(10, 'SNO IITBombay', 'sno1_iitbombay@universityportal.com', NULL, '$2y$10$Js7Qy5VSGh7TidlCNZutkOK/QwomoOZ8FsK0sMBjanSdVbgkQeFqK', NULL, '2020-08-10 08:25:41', '2020-08-20 11:27:15'),
(11, 'Kerala IITM SNO 2', 'sno2_kerala1@universityportal.com', NULL, '$2y$10$DNxvE9gLzhO5B/iBjKJai.4PIgwNjlBhz1bke8JSrvTMwDt3oVJWW', NULL, '2020-08-10 08:29:52', '2020-08-20 11:27:43'),
(12, 'Kerala IITM SNO1', 'sno1_kerala1@universityportal.com', NULL, '$2y$10$Yll2NL6ja5EgHEb4w0IfOO75aE6NNLVJROvdleD4nxYf8G63VF/tW', NULL, '2020-08-11 00:10:17', '2020-08-20 11:32:12'),
(13, 'Training Partner 1 Madras', 'tp_1_madras@universityportal.com', NULL, '$2y$10$k/MEwz8KwRU76HoCtSUNYua3uzq0oBsFgft4MSiJQ9fKrUVhl2Z9W', NULL, '2020-08-14 01:55:29', '2020-08-14 03:49:01'),
(15, 'IIT MADRAS Univ Admin', 'hariharasuthan.m@marlabs.com', NULL, '$2y$10$ivIreQVdtnKG//yeZIw78e/B3xa5Npkclp0HL3BSKht.Oi.ogPW6a', NULL, '2020-08-17 04:48:18', '2020-08-31 04:57:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_author_id_foreign` (`author_id`),
  ADD KEY `course_university_id_foreign` (`university_id`),
  ADD KEY `course_department_id_foreign` (`department_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_university_id_foreign` (`university_id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `files_author_by_foreign` (`author_by`),
  ADD KEY `files_assigned_to_foreign` (`assigned_to`),
  ADD KEY `files_batch_id_foreign` (`batch_id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `results_batch_id_foreign` (`batch_id`),
  ADD KEY `results_author_id_foreign` (`author_id`),
  ADD KEY `results_requested_to_foreign` (`requested_to`),
  ADD KEY `results_course_id_foreign` (`course_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_university_id_foreign` (`university_id`),
  ADD KEY `student_department_id_foreign` (`department_id`);

--
-- Indexes for table `studentbatch`
--
ALTER TABLE `studentbatch`
  ADD PRIMARY KEY (`id`),
  ADD KEY `studentbatch_requested_foreign` (`requested`),
  ADD KEY `studentbatch_course_id_foreign` (`course_id`);

--
-- Indexes for table `studentbatchhistory`
--
ALTER TABLE `studentbatchhistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `university`
--
ALTER TABLE `university`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `universitymember`
--
ALTER TABLE `universitymember`
  ADD PRIMARY KEY (`id`),
  ADD KEY `universitymember_university_id_foreign` (`university_id`),
  ADD KEY `universitymember_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `studentbatch`
--
ALTER TABLE `studentbatch`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `studentbatchhistory`
--
ALTER TABLE `studentbatchhistory`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `university`
--
ALTER TABLE `university`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `universitymember`
--
ALTER TABLE `universitymember`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `course_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`),
  ADD CONSTRAINT `course_university_id_foreign` FOREIGN KEY (`university_id`) REFERENCES `university` (`id`);

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `department_university_id_foreign` FOREIGN KEY (`university_id`) REFERENCES `university` (`id`);

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_assigned_to_foreign` FOREIGN KEY (`assigned_to`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `files_author_by_foreign` FOREIGN KEY (`author_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `files_batch_id_foreign` FOREIGN KEY (`batch_id`) REFERENCES `studentbatch` (`id`);

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
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `results_batch_id_foreign` FOREIGN KEY (`batch_id`) REFERENCES `studentbatch` (`id`),
  ADD CONSTRAINT `results_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`),
  ADD CONSTRAINT `results_requested_to_foreign` FOREIGN KEY (`requested_to`) REFERENCES `users` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`),
  ADD CONSTRAINT `student_university_id_foreign` FOREIGN KEY (`university_id`) REFERENCES `university` (`id`);

--
-- Constraints for table `studentbatch`
--
ALTER TABLE `studentbatch`
  ADD CONSTRAINT `studentbatch_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`),
  ADD CONSTRAINT `studentbatch_requested_foreign` FOREIGN KEY (`requested`) REFERENCES `users` (`id`);

--
-- Constraints for table `universitymember`
--
ALTER TABLE `universitymember`
  ADD CONSTRAINT `universitymember_university_id_foreign` FOREIGN KEY (`university_id`) REFERENCES `university` (`id`),
  ADD CONSTRAINT `universitymember_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
