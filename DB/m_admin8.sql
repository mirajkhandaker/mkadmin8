-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2021 at 11:10 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `m_admin7`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `name`, `description`, `created_by`, `updated_by`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Index', 'Index of module', 1, 1, 1, NULL, '2020-01-24 12:52:00', '2020-12-05 09:32:13'),
(2, 'Create', NULL, 1, 1, 1, NULL, '2020-01-24 12:52:10', '2020-01-24 12:52:10'),
(3, 'Edit', NULL, 1, 1, 1, NULL, '2020-01-24 12:52:20', '2020-03-02 15:23:32'),
(4, 'Delete', NULL, 1, 1, 1, NULL, '2020-01-24 12:52:30', '2020-01-24 12:52:30'),
(5, 'Change password', NULL, 1, 1, 1, NULL, '2020-01-24 12:52:39', '2020-01-24 12:52:39'),
(6, 'Password reset', NULL, 1, 1, 1, NULL, '2020-01-24 12:52:50', '2020-01-24 12:52:50'),
(7, 'Print', NULL, 1, 1, 1, NULL, '2020-01-24 12:53:01', '2020-01-24 12:53:01'),
(8, 'Details', NULL, 1, 1, 1, NULL, '2020-01-24 12:53:12', '2020-01-24 12:53:12');

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
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(22, '2014_10_12_000000_create_users_table', 1),
(23, '2014_10_12_100000_create_password_resets_table', 1),
(24, '2019_08_19_000000_create_failed_jobs_table', 1),
(25, '2020_01_17_040304_create_activities_table', 1),
(26, '2020_01_17_040924_create_modules_table', 1),
(27, '2020_01_17_041254_create_module_to_activities_table', 1),
(28, '2020_01_17_041749_create_module_to_roles_table', 1),
(29, '2020_01_17_041946_create_module_to_users_table', 1),
(30, '2020_01_17_042141_create_roles_table', 1),
(31, '2020_01_18_111739_add_created_by_to_roles', 1),
(41, '2021_06_01_171209_create_site_settings_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `description`, `status`, `deleted_at`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Role Management', NULL, 1, NULL, 1, 1, '2020-01-24 12:53:44', '2020-12-05 09:05:04'),
(2, 'Role Access Control', NULL, 1, NULL, 1, 1, '2020-01-24 12:54:32', '2020-01-24 12:54:32'),
(3, 'User Access Control', NULL, 1, NULL, 1, 1, '2020-01-24 12:54:59', '2020-01-24 12:54:59'),
(4, 'Module Management', NULL, 1, NULL, 1, 1, '2020-01-24 12:55:37', '2020-01-24 12:55:37'),
(5, 'Activity Management', NULL, 1, NULL, 1, 1, '2020-01-24 12:55:58', '2020-01-24 12:55:58'),
(6, 'Admin Panel User', NULL, 1, NULL, 1, 1, '2020-01-24 12:58:53', '2020-01-24 12:58:53'),
(10, 'Site Setting', NULL, 1, NULL, 1, 1, '2021-07-14 03:08:07', '2021-07-14 03:08:07');

-- --------------------------------------------------------

--
-- Table structure for table `module_to_activities`
--

CREATE TABLE `module_to_activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module_id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `module_to_activities`
--

INSERT INTO `module_to_activities` (`id`, `module_id`, `activity_id`, `status`, `deleted_at`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(5, 2, 2, 1, NULL, 1, 1, '2020-01-24 12:54:32', '2020-01-24 12:54:32'),
(6, 2, 4, 1, NULL, 1, 1, '2020-01-24 12:54:32', '2020-01-24 12:54:32'),
(7, 2, 3, 1, NULL, 1, 1, '2020-01-24 12:54:32', '2020-01-24 12:54:32'),
(8, 2, 1, 1, NULL, 1, 1, '2020-01-24 12:54:32', '2020-01-24 12:54:32'),
(9, 3, 2, 1, NULL, 1, 1, '2020-01-24 12:54:59', '2020-01-24 12:54:59'),
(10, 3, 4, 1, NULL, 1, 1, '2020-01-24 12:54:59', '2020-01-24 12:54:59'),
(11, 3, 3, 1, NULL, 1, 1, '2020-01-24 12:54:59', '2020-01-24 12:54:59'),
(12, 3, 1, 1, NULL, 1, 1, '2020-01-24 12:54:59', '2020-01-24 12:54:59'),
(13, 4, 2, 1, NULL, 1, 1, '2020-01-24 12:55:37', '2020-01-24 12:55:37'),
(14, 4, 4, 1, NULL, 1, 1, '2020-01-24 12:55:37', '2020-01-24 12:55:37'),
(15, 4, 3, 1, NULL, 1, 1, '2020-01-24 12:55:37', '2020-01-24 12:55:37'),
(16, 4, 1, 1, NULL, 1, 1, '2020-01-24 12:55:37', '2020-01-24 12:55:37'),
(17, 5, 2, 1, NULL, 1, 1, '2020-01-24 12:55:58', '2020-01-24 12:55:58'),
(18, 5, 4, 1, NULL, 1, 1, '2020-01-24 12:55:58', '2020-01-24 12:55:58'),
(19, 5, 3, 1, NULL, 1, 1, '2020-01-24 12:55:58', '2020-01-24 12:55:58'),
(20, 5, 1, 1, NULL, 1, 1, '2020-01-24 12:55:58', '2020-01-24 12:55:58'),
(25, 6, 5, 1, NULL, 1, 1, '2020-01-24 13:07:39', '2020-01-24 13:07:39'),
(26, 6, 2, 1, NULL, 1, 1, '2020-01-24 13:07:39', '2020-01-24 13:07:39'),
(27, 6, 4, 1, NULL, 1, 1, '2020-01-24 13:07:39', '2020-01-24 13:07:39'),
(28, 6, 6, 1, NULL, 1, 1, '2020-01-24 13:07:39', '2020-01-24 13:07:39'),
(29, 6, 3, 1, NULL, 1, 1, '2020-01-24 13:07:39', '2020-01-24 13:07:39'),
(30, 6, 1, 1, NULL, 1, 1, '2020-01-24 13:07:39', '2020-01-24 13:07:39'),
(50, 1, 2, 1, NULL, 1, 1, '2020-12-05 09:05:04', '2020-12-05 09:05:04'),
(51, 1, 4, 1, NULL, 1, 1, '2020-12-05 09:05:04', '2020-12-05 09:05:04'),
(52, 1, 3, 1, NULL, 1, 1, '2020-12-05 09:05:04', '2020-12-05 09:05:04'),
(53, 1, 1, 1, NULL, 1, 1, '2020-12-05 09:05:04', '2020-12-05 09:05:04'),
(54, 10, 3, 1, NULL, 1, 1, '2021-07-14 03:08:07', '2021-07-14 03:08:07');

-- --------------------------------------------------------

--
-- Table structure for table `module_to_roles`
--

CREATE TABLE `module_to_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `module_to_roles`
--

INSERT INTO `module_to_roles` (`id`, `module_id`, `role_id`, `activity_id`, `status`, `deleted_at`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(264, 1, 2, 1, 1, NULL, NULL, NULL, NULL, NULL),
(265, 1, 2, 2, 1, NULL, NULL, NULL, NULL, NULL),
(266, 1, 2, 3, 1, NULL, NULL, NULL, NULL, NULL),
(267, 1, 2, 4, 1, NULL, NULL, NULL, NULL, NULL),
(268, 2, 2, 1, 1, NULL, NULL, NULL, NULL, NULL),
(269, 2, 2, 2, 1, NULL, NULL, NULL, NULL, NULL),
(270, 2, 2, 3, 1, NULL, NULL, NULL, NULL, NULL),
(271, 2, 2, 4, 1, NULL, NULL, NULL, NULL, NULL),
(272, 3, 2, 1, 1, NULL, NULL, NULL, NULL, NULL),
(273, 3, 2, 2, 1, NULL, NULL, NULL, NULL, NULL),
(274, 3, 2, 3, 1, NULL, NULL, NULL, NULL, NULL),
(275, 3, 2, 4, 1, NULL, NULL, NULL, NULL, NULL),
(276, 4, 2, 1, 1, NULL, NULL, NULL, NULL, NULL),
(277, 4, 2, 2, 1, NULL, NULL, NULL, NULL, NULL),
(278, 4, 2, 3, 1, NULL, NULL, NULL, NULL, NULL),
(279, 4, 2, 4, 1, NULL, NULL, NULL, NULL, NULL),
(280, 5, 2, 1, 1, NULL, NULL, NULL, NULL, NULL),
(281, 5, 2, 2, 1, NULL, NULL, NULL, NULL, NULL),
(282, 5, 2, 3, 1, NULL, NULL, NULL, NULL, NULL),
(283, 5, 2, 4, 1, NULL, NULL, NULL, NULL, NULL),
(284, 6, 2, 1, 1, NULL, NULL, NULL, NULL, NULL),
(285, 6, 2, 2, 1, NULL, NULL, NULL, NULL, NULL),
(286, 6, 2, 3, 1, NULL, NULL, NULL, NULL, NULL),
(287, 6, 2, 4, 1, NULL, NULL, NULL, NULL, NULL),
(288, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL),
(289, 1, 1, 2, 1, NULL, NULL, NULL, NULL, NULL),
(290, 1, 1, 3, 1, NULL, NULL, NULL, NULL, NULL),
(291, 1, 1, 4, 1, NULL, NULL, NULL, NULL, NULL),
(292, 2, 1, 1, 1, NULL, NULL, NULL, NULL, NULL),
(293, 2, 1, 2, 1, NULL, NULL, NULL, NULL, NULL),
(294, 2, 1, 3, 1, NULL, NULL, NULL, NULL, NULL),
(295, 2, 1, 4, 1, NULL, NULL, NULL, NULL, NULL),
(296, 3, 1, 1, 1, NULL, NULL, NULL, NULL, NULL),
(297, 3, 1, 2, 1, NULL, NULL, NULL, NULL, NULL),
(298, 3, 1, 3, 1, NULL, NULL, NULL, NULL, NULL),
(299, 3, 1, 4, 1, NULL, NULL, NULL, NULL, NULL),
(300, 4, 1, 1, 1, NULL, NULL, NULL, NULL, NULL),
(301, 4, 1, 2, 1, NULL, NULL, NULL, NULL, NULL),
(302, 4, 1, 3, 1, NULL, NULL, NULL, NULL, NULL),
(303, 4, 1, 4, 1, NULL, NULL, NULL, NULL, NULL),
(304, 5, 1, 1, 1, NULL, NULL, NULL, NULL, NULL),
(305, 5, 1, 2, 1, NULL, NULL, NULL, NULL, NULL),
(306, 5, 1, 3, 1, NULL, NULL, NULL, NULL, NULL),
(307, 5, 1, 4, 1, NULL, NULL, NULL, NULL, NULL),
(308, 6, 1, 1, 1, NULL, NULL, NULL, NULL, NULL),
(309, 6, 1, 2, 1, NULL, NULL, NULL, NULL, NULL),
(310, 6, 1, 3, 1, NULL, NULL, NULL, NULL, NULL),
(311, 6, 1, 4, 1, NULL, NULL, NULL, NULL, NULL),
(312, 6, 1, 5, 1, NULL, NULL, NULL, NULL, NULL),
(313, 6, 1, 6, 1, NULL, NULL, NULL, NULL, NULL),
(314, 10, 1, 3, 1, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `module_to_users`
--

CREATE TABLE `module_to_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `module_to_users`
--

INSERT INTO `module_to_users` (`id`, `module_id`, `user_id`, `activity_id`, `status`, `deleted_at`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(130, 1, 2, 1, 1, NULL, NULL, NULL, NULL, NULL),
(132, 1, 2, 2, 1, NULL, NULL, NULL, NULL, NULL),
(134, 1, 2, 3, 1, NULL, NULL, NULL, NULL, NULL),
(136, 1, 2, 4, 1, NULL, NULL, NULL, NULL, NULL),
(138, 2, 2, 1, 1, NULL, NULL, NULL, NULL, NULL),
(140, 2, 2, 2, 1, NULL, NULL, NULL, NULL, NULL),
(142, 2, 2, 3, 1, NULL, NULL, NULL, NULL, NULL),
(144, 2, 2, 4, 1, NULL, NULL, NULL, NULL, NULL),
(146, 3, 2, 1, 1, NULL, NULL, NULL, NULL, NULL),
(148, 3, 2, 2, 1, NULL, NULL, NULL, NULL, NULL),
(150, 3, 2, 3, 1, NULL, NULL, NULL, NULL, NULL),
(152, 3, 2, 4, 1, NULL, NULL, NULL, NULL, NULL),
(154, 4, 2, 1, 1, NULL, NULL, NULL, NULL, NULL),
(156, 4, 2, 2, 1, NULL, NULL, NULL, NULL, NULL),
(158, 4, 2, 3, 1, NULL, NULL, NULL, NULL, NULL),
(160, 4, 2, 4, 1, NULL, NULL, NULL, NULL, NULL),
(162, 5, 2, 1, 1, NULL, NULL, NULL, NULL, NULL),
(164, 5, 2, 2, 1, NULL, NULL, NULL, NULL, NULL),
(166, 5, 2, 3, 1, NULL, NULL, NULL, NULL, NULL),
(168, 5, 2, 4, 1, NULL, NULL, NULL, NULL, NULL),
(170, 6, 2, 1, 1, NULL, NULL, NULL, NULL, NULL),
(172, 6, 2, 2, 1, NULL, NULL, NULL, NULL, NULL),
(174, 6, 2, 3, 1, NULL, NULL, NULL, NULL, NULL),
(176, 6, 2, 4, 1, NULL, NULL, NULL, NULL, NULL),
(178, 7, 2, 1, 1, NULL, NULL, NULL, NULL, NULL),
(180, 7, 2, 2, 1, NULL, NULL, NULL, NULL, NULL),
(182, 7, 2, 3, 1, NULL, NULL, NULL, NULL, NULL),
(184, 7, 2, 4, 1, NULL, NULL, NULL, NULL, NULL),
(345, 1, 5, 1, 1, NULL, NULL, NULL, NULL, NULL),
(346, 1, 5, 2, 1, NULL, NULL, NULL, NULL, NULL),
(347, 1, 5, 3, 1, NULL, NULL, NULL, NULL, NULL),
(348, 1, 5, 4, 1, NULL, NULL, NULL, NULL, NULL),
(349, 2, 5, 1, 1, NULL, NULL, NULL, NULL, NULL),
(350, 2, 5, 2, 1, NULL, NULL, NULL, NULL, NULL),
(351, 2, 5, 3, 1, NULL, NULL, NULL, NULL, NULL),
(352, 2, 5, 4, 1, NULL, NULL, NULL, NULL, NULL),
(353, 3, 5, 1, 1, NULL, NULL, NULL, NULL, NULL),
(354, 3, 5, 2, 1, NULL, NULL, NULL, NULL, NULL),
(355, 3, 5, 3, 1, NULL, NULL, NULL, NULL, NULL),
(356, 3, 5, 4, 1, NULL, NULL, NULL, NULL, NULL),
(357, 4, 5, 1, 1, NULL, NULL, NULL, NULL, NULL),
(358, 4, 5, 2, 1, NULL, NULL, NULL, NULL, NULL),
(359, 4, 5, 3, 1, NULL, NULL, NULL, NULL, NULL),
(360, 4, 5, 4, 1, NULL, NULL, NULL, NULL, NULL),
(361, 5, 5, 1, 1, NULL, NULL, NULL, NULL, NULL),
(362, 5, 5, 2, 1, NULL, NULL, NULL, NULL, NULL),
(363, 5, 5, 3, 1, NULL, NULL, NULL, NULL, NULL),
(364, 5, 5, 4, 1, NULL, NULL, NULL, NULL, NULL),
(365, 6, 5, 1, 1, NULL, NULL, NULL, NULL, NULL),
(366, 6, 5, 2, 1, NULL, NULL, NULL, NULL, NULL),
(367, 6, 5, 3, 1, NULL, NULL, NULL, NULL, NULL),
(368, 6, 5, 4, 1, NULL, NULL, NULL, NULL, NULL),
(435, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL),
(436, 1, 1, 2, 1, NULL, NULL, NULL, NULL, NULL),
(437, 1, 1, 3, 1, NULL, NULL, NULL, NULL, NULL),
(438, 1, 1, 4, 1, NULL, NULL, NULL, NULL, NULL),
(439, 2, 1, 1, 1, NULL, NULL, NULL, NULL, NULL),
(440, 2, 1, 2, 1, NULL, NULL, NULL, NULL, NULL),
(441, 2, 1, 3, 1, NULL, NULL, NULL, NULL, NULL),
(442, 2, 1, 4, 1, NULL, NULL, NULL, NULL, NULL),
(443, 3, 1, 1, 1, NULL, NULL, NULL, NULL, NULL),
(444, 3, 1, 2, 1, NULL, NULL, NULL, NULL, NULL),
(445, 3, 1, 3, 1, NULL, NULL, NULL, NULL, NULL),
(446, 3, 1, 4, 1, NULL, NULL, NULL, NULL, NULL),
(447, 4, 1, 1, 1, NULL, NULL, NULL, NULL, NULL),
(448, 4, 1, 2, 1, NULL, NULL, NULL, NULL, NULL),
(449, 4, 1, 3, 1, NULL, NULL, NULL, NULL, NULL),
(450, 4, 1, 4, 1, NULL, NULL, NULL, NULL, NULL),
(451, 5, 1, 1, 1, NULL, NULL, NULL, NULL, NULL),
(452, 5, 1, 2, 1, NULL, NULL, NULL, NULL, NULL),
(453, 5, 1, 3, 1, NULL, NULL, NULL, NULL, NULL),
(454, 5, 1, 4, 1, NULL, NULL, NULL, NULL, NULL),
(455, 6, 1, 1, 1, NULL, NULL, NULL, NULL, NULL),
(456, 6, 1, 2, 1, NULL, NULL, NULL, NULL, NULL),
(457, 6, 1, 3, 1, NULL, NULL, NULL, NULL, NULL),
(458, 6, 1, 4, 1, NULL, NULL, NULL, NULL, NULL),
(459, 6, 1, 5, 1, NULL, NULL, NULL, NULL, NULL),
(460, 6, 1, 6, 1, NULL, NULL, NULL, NULL, NULL),
(461, 10, 1, 3, 1, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `info` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `info`, `status`, `deleted_at`, `updated_by`, `created_at`, `updated_at`, `created_by`) VALUES
(1, 'Super Admin', NULL, 1, NULL, 1, '2020-01-24 12:50:33', '2020-12-05 07:05:06', 1),
(2, 'Admin', NULL, 1, NULL, 1, '2020-01-24 12:50:48', '2020-01-24 12:50:48', NULL),
(3, 'Customer', NULL, 1, NULL, 1, '2020-03-03 05:13:42', '2020-03-03 05:13:42', 1),
(4, 'Test role', NULL, 0, '2020-11-23 08:56:47', 1, '2020-11-23 08:53:06', '2020-11-23 08:56:47', 1);

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_no` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_title` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(765) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(765) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copy_right` varchar(765) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alert_quantity` int(11) NOT NULL DEFAULT 5,
  `display_unit` int(11) DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `logo`, `icon`, `email`, `contact_no`, `site_title`, `meta_description`, `meta_keyword`, `copy_right`, `alert_quantity`, `display_unit`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'public/upload/site-setting/otPhjJpkiC2b4jAZABYy.png', 'public/upload/site-setting/821lt8b2T0V7ivyHno7b.png', 'thakurlemon@gmail.com', '01719287734', 'Inventory', 'Web Embed', 'Inventory', 'Inventory', 15000, 1, 1, 1, '2021-06-02 00:26:39', '2021-06-24 23:55:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `contact_no` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastLoginTime` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `email_verified_at`, `contact_no`, `photo`, `password`, `lastLoginTime`, `status`, `deleted_at`, `remember_token`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', 'admin@email.com', NULL, '01682234164', 'public/upload/portfolio-pic/f0pFrHvIHOApjaNZLlKi.jpg', '$2y$10$m4ZSPJRaz3C7chseDTpqCub3ZeN4Pn4IRfXFiifnbYN21hkP.4hbm', '2021-07-14 09:07:05', 1, NULL, 'i4XVxXFDrutMYh3a1TCUZ4yBuhp9s4OJEZZ8QI48LkdIaPT0kbQMCVc20YJB', 1, 1, '2020-01-18 10:14:02', '2021-07-14 03:07:05'),
(2, 1, 'Myles Key', 'jymyjopuny@mailinator.com', NULL, '123456', 'public/upload/rofile-pic/Vty0kqzBV9o3coKVIyqI.jpg', '$2y$10$lJHuiDyxiw/yq/.bfz01BeygTc9Tl0mZbAM0JS7NADJlVjXmBSsDK', NULL, 1, '2020-03-02 15:06:00', NULL, 1, 1, '2020-01-18 10:33:52', '2020-03-02 15:06:00'),
(3, 2, 'Phelan Brown', 'fynojewu@mailinator.com', NULL, '1465', 'public/upload/rofile-pic/IfhDPL9wVq1IPh6J4d4w.png', '$2y$10$BvWoKwT6Toe1WgiVuxutxufuaqhUb1VXiZKaRYsSyK6TQz3NcFVge', NULL, 1, '2020-01-24 14:39:51', NULL, 1, 1, '2020-01-18 10:37:14', '2020-01-24 14:39:51'),
(4, 2, 'Charlotte Villarreal', 'cusesohyko@mailinator.com', NULL, '12456', 'public/upload/rofile-pic/bcE7Fewm45VV3WtuoL0v.png', '$2y$10$2aF8MBYraBpAzxw/ye2bXuKieJp6FoBuVQBHL6YHbSN1CIouTQf9C', NULL, 1, '2020-03-02 15:06:04', NULL, 1, 1, '2020-01-18 10:48:36', '2020-03-02 15:06:04'),
(5, 2, 'miraj', 'miraj@email.com', NULL, '1465456', NULL, '$2y$10$gpyKgl1cj4Yh6qAEN/Z5ZOZ9Lkp75B.DgwLev./4CIHdGLG71m7iG', '2020-03-03 11:23:09', 1, NULL, NULL, 1, 1, '2020-03-02 15:06:56', '2020-03-03 05:23:09'),
(6, 1, 'Juliet Harrison', 'kazyx@mailinator.com', NULL, '123456874', NULL, '$2y$10$alGTDKUcytKoLnUFYyOWmer7EoXknY1911HsMCa496lq2LYV13JDK', NULL, 1, '2020-11-23 07:55:39', NULL, 1, 1, '2020-11-23 07:53:19', '2020-11-23 07:55:39'),
(7, 1, 'Tara Erickson', 'gobimohyja@mailinator.com', NULL, 'U146545', 'public/upload/portfolio-pic/sydBo3dqmxqmFgaRT3u3.png', '$2y$10$qgZrvHAaoziTx9EsRQKyN.RDRELo3StfBHsmTajQFOAyQ0/o/W1n2', NULL, 1, '2020-11-23 07:56:55', NULL, 1, 1, '2020-11-23 07:56:49', '2020-11-23 07:56:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module_to_activities`
--
ALTER TABLE `module_to_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module_to_roles`
--
ALTER TABLE `module_to_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module_to_users`
--
ALTER TABLE `module_to_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_contact_no_unique` (`contact_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `module_to_activities`
--
ALTER TABLE `module_to_activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `module_to_roles`
--
ALTER TABLE `module_to_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=315;

--
-- AUTO_INCREMENT for table `module_to_users`
--
ALTER TABLE `module_to_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=462;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
