-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2026 at 05:52 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alumni_sys`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE `alumni` (
  `alumni_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `graduation_year` year(4) DEFAULT NULL,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `current_job` varchar(150) DEFAULT NULL,
  `company_name` varchar(150) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`alumni_id`, `user_id`, `graduation_year`, `department_id`, `current_job`, `company_name`, `designation`, `created_at`, `updated_at`) VALUES
(1, 1, '2011', 9, 'Job Title 1', 'Hidaya institute', NULL, NULL, '2026-02-06 01:58:24'),
(2, 2, '2024', 3, 'Job Title 2', 'Hidaya institute', 'web developer', NULL, '2026-02-04 12:45:41'),
(3, 3, '2013', 9, 'Job Title 3', 'Hidaya institute', 'hr manager', NULL, '2026-02-07 11:58:23'),
(4, 4, '2014', 2, 'Job Title 4', 'Hidaya institute', NULL, NULL, '2026-02-04 12:45:41'),
(5, 5, '2015', 1, 'Job Title 5', 'Hidaya institute', NULL, NULL, '2026-02-04 12:45:41'),
(6, 6, '2016', 1, 'Job Title 6', 'Hidaya institute', NULL, NULL, '2026-02-04 12:45:41'),
(7, 7, '2017', 8, 'Job Title 7', 'Hidaya institute', NULL, NULL, '2026-02-04 12:45:41'),
(8, 8, '2018', 7, 'Job Title 8', 'Hidaya institute', NULL, NULL, '2026-02-04 12:45:41'),
(9, 9, '2019', 10, 'Job Title 9', 'Hidaya institute', NULL, NULL, '2026-02-04 12:45:41'),
(10, 10, '2020', 4, 'Job Title 10', 'Hidaya institute', NULL, NULL, '2026-02-04 12:45:41'),
(11, 11, '2014', 1, NULL, 'Hidaya institute', NULL, '2026-02-04 03:19:16', '2026-02-04 12:45:41'),
(12, 12, '2022', 2, NULL, 'Hidaya institute', NULL, '2026-02-04 03:20:16', '2026-02-04 12:45:41'),
(13, 13, '2024', 4, NULL, NULL, NULL, '2026-02-05 02:56:33', '2026-02-05 02:56:33'),
(14, 14, '2020', 6, NULL, NULL, NULL, '2026-02-06 01:59:07', '2026-02-06 01:59:29'),
(15, 15, '2025', 2, NULL, NULL, NULL, '2026-02-07 14:21:28', '2026-02-07 14:21:28');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `faculty` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`department_id`, `department_name`, `faculty`, `created_at`, `updated_at`) VALUES
(1, 'Department 1', NULL, NULL, NULL),
(2, 'Department 2', NULL, NULL, NULL),
(3, 'Department 3', NULL, NULL, NULL),
(4, 'Department 4', NULL, NULL, NULL),
(5, 'Department 5', NULL, NULL, NULL),
(6, 'Department 6', NULL, NULL, NULL),
(7, 'Department 7', NULL, NULL, NULL),
(8, 'Department 8', NULL, NULL, NULL),
(9, 'Department 9', NULL, NULL, NULL),
(10, 'Department 10', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `event_name` varchar(150) NOT NULL,
  `description` text DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `location` varchar(150) DEFAULT NULL,
  `organizer` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_name`, `description`, `event_date`, `location`, `organizer`, `created_at`, `updated_at`) VALUES
(1, 'Event 1', 'Description for event 1', '2026-01-30', NULL, NULL, NULL, NULL),
(2, 'Event 2', 'Description for event 2', '2026-01-31', NULL, NULL, NULL, NULL),
(3, 'Event 3', 'Description for event 3', '2026-02-01', NULL, NULL, NULL, NULL),
(4, 'Event 4', 'Description for event 4', '2026-02-02', NULL, NULL, NULL, NULL),
(5, 'Event 5', 'Description for event 5', '2026-02-03', NULL, NULL, NULL, NULL),
(6, 'Event 6', 'Description for event 6', '2026-02-04', NULL, NULL, NULL, NULL),
(7, 'Event 7', 'Description for event 7', '2026-02-05', NULL, NULL, NULL, NULL),
(8, 'Event 8', 'Description for event 8', '2026-02-06', NULL, NULL, NULL, NULL),
(9, 'Event 9', 'Description for event 9', '2026-02-07', NULL, NULL, NULL, NULL),
(10, 'Event 10', 'Description for event 10', '2026-02-08', NULL, NULL, NULL, NULL),
(11, 'phd seminar', 'The  final  phd seminar  of xyz is held  on the date given above \r\nwe appreate the presense of out studetns and  alumni in the seminar', '2026-02-21', 'main semianr  haal', 'dr yasir arfaat', '2026-02-07 04:29:50', '2026-02-07 04:29:50'),
(12, 'phd seminar', 'The final phd seminar of abc...xyz is held on the date given above we appreate the presense of out studetns and alumni in the seminar', '2026-02-24', 'main semianr  haal', 'imcs faculty', '2026-02-07 05:05:27', '2026-02-07 15:35:11');

-- --------------------------------------------------------

--
-- Table structure for table `event_participants`
--

CREATE TABLE `event_participants` (
  `participant_id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_participants`
--

INSERT INTO `event_participants` (`participant_id`, `event_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 10, 3, NULL, NULL),
(2, 7, 4, NULL, NULL),
(3, 2, 9, NULL, NULL),
(4, 9, 4, NULL, NULL),
(5, 9, 3, NULL, NULL),
(6, 8, 3, NULL, NULL),
(7, 10, 3, NULL, NULL),
(8, 9, 3, NULL, NULL),
(9, 6, 10, NULL, NULL),
(10, 1, 10, NULL, NULL),
(11, 3, 2, '2026-02-01 16:39:24', NULL);

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
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `group_name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_id`, `group_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Group 1', 'This is group number 1', NULL, NULL),
(2, 'Group 2', 'This is group number 2', NULL, NULL),
(3, 'Group 3', 'This is group number 3', NULL, NULL),
(4, 'Group 4', 'This is group number 4', NULL, NULL),
(5, 'Group 5', 'This is group number 5', NULL, NULL),
(6, 'Group 6', 'This is group number 6', NULL, NULL),
(7, 'Group 7', 'This is group number 7', NULL, NULL),
(8, 'Group 8', 'This is group number 8', NULL, NULL),
(9, 'Group 9', 'This is group number 9', NULL, NULL),
(10, 'Group 10', 'This is group number 10', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `group_members`
--

CREATE TABLE `group_members` (
  `group_member_id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `group_members`
--

INSERT INTO `group_members` (`group_member_id`, `group_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 4, 1, NULL, NULL),
(2, 9, 8, NULL, NULL),
(3, 3, 3, NULL, NULL),
(4, 9, 9, NULL, NULL),
(5, 4, 1, NULL, NULL),
(6, 10, 10, NULL, NULL),
(7, 8, 7, NULL, NULL),
(8, 5, 8, NULL, NULL),
(9, 5, 1, NULL, NULL),
(10, 1, 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `location` varchar(255) NOT NULL,
  `job_type` varchar(255) NOT NULL,
  `salary_range` varchar(255) DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`job_id`, `user_id`, `category_id`, `title`, `company_name`, `description`, `location`, `job_type`, `salary_range`, `deadline`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Laravel Backend Developer', 'TechSolutions PK', 'Expert in Laravel and MySQL required.', 'Karachi', 'Full-time', '60k - 90k', '2026-01-20', 'Active', '2026-01-29 04:03:50', '2026-01-27 20:33:31'),
(2, 3, 4, 'UI/UX Design Intern', 'Creative Agency', 'Learning opportunity for fresh designers.', 'Remote', 'Remote Internship', '15k - 20k', '2026-02-17', 'Active', '2026-01-29 04:03:50', '2026-02-02 20:33:24'),
(3, 3, 1, 'software developer', 'tech soul', 'array:10  \r\n\r\ntoken    yY4DpPRfxjDnVIOehP3BGOwerx5KbGZmhgqylwCw\"', 'karachi', 'Remote', '39k', '2026-03-22', 'Active', '2026-02-03 00:57:22', NULL),
(4, 1, 3, 'laravel developer', 'tech soul', 'we need an experienced web develoer', 'karachi', 'Part-time', '40k', '2026-02-13', 'Active', '2026-02-05 03:24:20', '2026-02-05 03:24:20'),
(5, 1, 3, 'laravel developers', 'TechSolutions PK', 'job os posted for laravel develoeprs', 'Hyderabad, Hyderābād, Sindh, PAK', 'Part-time', '39k', '2026-02-19', 'Active', '2026-02-05 07:36:06', '2026-02-05 07:36:06'),
(6, 1, 2, 'python dev', 'infinity', 'we  need  an experienced python develoepr', 'karachi hyd', 'Remote', '70k', '2026-02-14', 'Active', '2026-02-06 02:01:13', '2026-02-06 02:01:13'),
(7, 1, 1, 'juinio laravel interns', 'tech soul', 'we naed  a laravel intern', 'karachi', 'Internship', '39k', '2026-02-18', 'Active', '2026-02-07 15:53:14', '2026-02-07 15:53:14');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_applications`
--

CREATE TABLE `job_applications` (
  `application_id` bigint(20) UNSIGNED NOT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `applied_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_applications`
--

INSERT INTO `job_applications` (`application_id`, `job_id`, `user_id`, `applied_at`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2026-01-29 04:03:50', '2026-01-29 04:03:50', NULL),
(2, 3, 3, '2026-01-29 04:03:50', '2026-01-29 04:03:50', NULL),
(3, 3, 4, '2026-01-29 04:03:50', '2026-01-29 04:03:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_categories`
--

CREATE TABLE `job_categories` (
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_categories`
--

INSERT INTO `job_categories` (`category_id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Software Development', NULL, NULL),
(2, 'Data Science', NULL, NULL),
(3, 'Digital Marketing', NULL, NULL),
(4, 'Graphic Designing', NULL, NULL),
(5, 'Human Resources', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `login_logs`
--

CREATE TABLE `login_logs` (
  `log_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(50) DEFAULT NULL,
  `device_info` varchar(255) DEFAULT NULL,
  `login_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `login_logs`
--

INSERT INTO `login_logs` (`log_id`, `user_id`, `ip_address`, `device_info`, `login_time`, `created_at`, `updated_at`) VALUES
(1, 1, '192.168.1.1', NULL, '2026-01-29 09:03:50', '2026-01-29 04:03:50', '2026-01-29 04:03:50'),
(2, 2, '192.168.1.2', NULL, '2026-01-29 09:03:50', '2026-01-29 04:03:50', '2026-01-29 04:03:50'),
(3, 3, '192.168.1.3', NULL, '2026-01-29 09:03:50', '2026-01-29 04:03:50', '2026-01-29 04:03:50'),
(4, 4, '192.168.1.4', NULL, '2026-01-29 09:03:50', '2026-01-29 04:03:50', '2026-01-29 04:03:50'),
(5, 5, '192.168.1.5', NULL, '2026-01-29 09:03:50', '2026-01-29 04:03:50', '2026-01-29 04:03:50'),
(6, 6, '192.168.1.6', NULL, '2026-01-29 09:03:50', '2026-01-29 04:03:50', '2026-01-29 04:03:50'),
(7, 7, '192.168.1.7', NULL, '2026-01-29 09:03:50', '2026-01-29 04:03:50', '2026-01-29 04:03:50'),
(8, 8, '192.168.1.8', NULL, '2026-01-29 09:03:50', '2026-01-29 04:03:50', '2026-01-29 04:03:50'),
(9, 9, '192.168.1.9', NULL, '2026-01-29 09:03:50', '2026-01-29 04:03:50', '2026-01-29 04:03:50'),
(10, 10, '192.168.1.10', NULL, '2026-01-29 09:03:50', '2026-01-29 04:03:50', '2026-01-29 04:03:50');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `receiver_id` bigint(20) UNSIGNED NOT NULL,
  `message_text` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `sender_id`, `receiver_id`, `message_text`, `created_at`, `updated_at`) VALUES
(1, 1, 7, 'This is test message 1', '2026-01-29 04:03:50', '2026-01-29 04:03:50'),
(2, 8, 3, 'This is test message 2', '2026-01-29 04:03:50', '2026-01-29 04:03:50'),
(3, 10, 2, 'This is test message 3', '2026-01-29 04:03:50', '2026-01-29 04:03:50'),
(4, 3, 8, 'This is test message 4', '2026-01-29 04:03:50', '2026-01-29 04:03:50'),
(5, 3, 6, 'This is test message 5', '2026-01-29 04:03:50', '2026-01-29 04:03:50'),
(6, 7, 8, 'This is test message 6', '2026-01-29 04:03:50', '2026-01-29 04:03:50'),
(7, 7, 7, 'This is test message 7', '2026-01-29 04:03:50', '2026-01-29 04:03:50'),
(8, 10, 3, 'This is test message 8', '2026-01-29 04:03:50', '2026-01-29 04:03:50'),
(9, 2, 2, 'This is test message 9', '2026-01-29 04:03:50', '2026-01-29 04:03:50'),
(10, 7, 9, 'This is test message 10', '2026-01-29 04:03:50', '2026-01-29 04:03:50');

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
(1, '0001_01_01_000002_create_jobs_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2025_09_22_081140_create_user_roles_table', 1),
(4, '2025_09_22_081145_create_users_table', 1),
(5, '2025_09_22_081232_create_departments_table', 1),
(6, '2025_09_22_081234_create_alumni_table', 1),
(7, '2025_09_22_081236_create_groups_table', 1),
(8, '2025_09_22_081238_create_group_members_table', 1),
(9, '2025_09_22_081240_create_events_table', 1),
(10, '2025_09_22_081242_create_event_participants_table', 1),
(11, '2025_09_22_081243_create_login_logs_table', 1),
(12, '2025_09_22_081318_create_messages_table', 1),
(13, '2025_09_22_111946_create_sessions_table', 1),
(14, '2025_10_16_065227_create_cache_table', 1),
(15, '2026_01_29_080702_create_job_categories_table', 1),
(16, '2026_01_29_080808_create_job_table', 1),
(17, '2026_01_29_080854_create_job_applications_table', 1),
(18, '2026_01_29_080933_create_news_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `event_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `title`, `content`, `event_id`, `created_at`, `updated_at`) VALUES
(1, 'Annual Alumni Meetup 2026', 'Join us for the grand alumni gathering next month will se you there insha allah.', NULL, '2026-01-29 04:03:50', '2026-02-06 03:30:51'),
(2, 'New Placement Drive', 'Top Tech companies are visiting for recruitment on Monday.', NULL, '2026-01-29 04:03:50', NULL),
(3, 'kashmir day holiday', 'its to inform you all student thst \r\nthe university shall remain closed on 5 of feb \r\nthanks', NULL, '2026-02-04 19:00:00', '2026-02-06 04:18:47'),
(4, 'urs mela holidy on monday', 'on monday  it will be holiday duw to urs mubarak', NULL, '2026-02-08 19:00:00', '2026-02-07 15:10:07');

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
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('EWkYVgG36xqzdACppvN4BU1DZAleP2b9wA9J1XZn', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMjJ2VVZGdTJxbUpQblI4Skc4d1lmRVZOMUcwY1k1a3FDU3dIZ2lCNyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9sb2dpbiI7czo1OiJyb3V0ZSI7czo1OiJsb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1770566372),
('H3r1khBJkz1Vln7Fo0hYQTXNqvh3zKjkGe4ELoJB', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia3ByT0U1WE5HY21JSUttZWkwMG95V0FpSzV2b0hXM1h2OFo0aHZiciI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1770566381),
('Xe3ZgAL7sFtTRUfCl5w3aPZ3Dox8J6fG6ouAfcQP', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNU9lSFZ4cmJGSks2NWtkSjJCN0Nxb052QzI4S3RZcEFMZk5jdEdZMCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0NjoiaHR0cDovL2xvY2FsaG9zdDo4MDAwL2FsdW1uaS1hZG1pbi9hZG1pbi1pbmRleCI7fX0=', 1770566859);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `gender` enum('Male','Female','Other') DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `address` text DEFAULT NULL,
  `profile_photo` varchar(255) DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `phone_number`, `gender`, `dob`, `address`, `profile_photo`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 'First1', 'Last1', 'admin@gmail.com', '$2y$12$FePdqt8RRpQju.ug4LcyIu92soSlP81r3Y0IoYNKfV3SJ66sq.wOO', '0300-000001', 'Female', '1991-01-01', 'Address 1', NULL, 1, NULL, '2026-02-06 01:58:24'),
(2, 'shafiq', 'ali', 'std@gmail.com', '$2y$12$TJlWcYCW5JgeNfa/T8W1XOM3Z2VmxXLDYrnRnvD4QyyTAHJsf46.a', '0300-000002', 'Male', '1992-01-01', 'Address 2', NULL, 2, NULL, NULL),
(3, 'hr', 'sania', 'hrsania@gmail.com', '$2y$12$Sxv3tbndCL5pFzZykQprWORi7qPIoFdiHrTxAx7s5NRLZVf40IO3.', '0300-000003', 'Female', '1993-01-01', 'sindh univerisity hostel', NULL, 3, NULL, '2026-02-07 11:58:23'),
(4, 'First4', 'Last4', 'user4@gmail.com', '$2y$12$qKkdJOjruwXE3N9h4DyHl.P9zUnZbKEQ50nyxg5Te2pb.nzMfO8qS', '0300-000004', 'Male', '1994-01-01', 'Address 4', NULL, 2, NULL, NULL),
(5, 'First5', 'Last5', 'user5@gmail.com', '$2y$12$GPR4ZLsMrZDMO0bwQNaYS.G6ULOutMh4Y04iqnK1UO.tEXpdsEmbC', '0300-000005', 'Female', '1995-01-01', 'Address 5', NULL, 2, NULL, '2026-02-07 15:35:42'),
(6, 'First6', 'Last6', 'user6@gmail.com', '$2y$12$HNyIKQkIe944.xeetZ0fkOST5MCxO7Pvp.STy1HaFk.NG.KWIC73a', '0300-000006', 'Male', '1996-01-01', 'Address 6', NULL, 1, NULL, NULL),
(7, 'First7', 'Last7', 'user7@gmail.com', '$2y$12$YYxnikpzdLtQ8uf9mh7AkOWjzSThU5Uvw3zaJufQbKE0obxIFHT2C', '0300-000007', 'Female', '1997-01-01', 'Address 7', NULL, 4, NULL, NULL),
(8, 'First8', 'Last8', 'user8@gmail.com', '$2y$12$vqP92yrOyya61M23xAUJqe3z51/7pjU1wYuJI8wYjSn09RCUdEPum', '0300-000008', 'Male', '1998-01-01', 'Address 8', NULL, 5, NULL, NULL),
(9, 'First9', 'Last9', 'user9@gmail.com', '$2y$12$lYVtI9nLAd/MQ8o3IClhF.dulijPvnwN3RolWB3AlRPOcG9OGKo/y', '0300-000009', 'Female', '1999-01-01', 'Address 9', NULL, 5, NULL, NULL),
(10, 'First10', 'Last10', 'user10@gmail.com', '$2y$12$d6wyCNRNM4mJq25r9GsHEeCEc9605gRW6UyDtIAzIowe3UuBHSAiW', '0300-0000010', 'Male', '2000-01-01', 'Address 10', NULL, 2, NULL, '2026-02-06 01:36:44'),
(11, 'kashif', 'ali', 'kashif@gmail.com', '$2y$12$Cul9TRXtjXyi./4DFGWEp.GawdY5raDj/HYUzcSuiu2AKei/843sO', NULL, NULL, NULL, NULL, NULL, 2, '2026-02-04 03:19:14', '2026-02-04 03:19:14'),
(12, 'fazal', 'khan', 'fazal@gmail.com', '$2y$12$wI8X7I8uiZQ0rzozWnjrLOBp4gpQRmKoUTH8tNmssXN3WMTKd58qy', NULL, NULL, NULL, NULL, NULL, 2, '2026-02-04 03:20:16', '2026-02-04 03:20:16'),
(13, 'Muhammad', 'irfan', 'irfan@gmail.com', '$2y$12$0uEfSFwhEpZjMttnabIGB.jFxO4XR4cJ/1UOaWC8O9/LCFFW578QK', NULL, NULL, NULL, NULL, NULL, 2, '2026-02-05 02:56:33', '2026-02-05 02:56:33'),
(14, 'farzand', 'ali', 'farzand@gmail.com', '$2y$12$A4/s1MsiJQmi9FzjIASmQe/FXdvl9FAVbr2rC6DBMiXdFa6HAuZqK', NULL, NULL, NULL, NULL, NULL, 2, '2026-02-06 01:59:07', '2026-02-07 15:41:43'),
(15, 'kishan', 'kumar', 'kishan@gmail.com', '$2y$12$Xxn9RU7KGrbE.aEahGJK5u5Z3d36nFic2JXscdeNNp0Oeny5DsxlO', NULL, NULL, NULL, NULL, NULL, 2, '2026-02-07 14:21:28', '2026-02-07 14:21:28');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `organizer` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`role_id`, `role_name`, `description`, `organizer`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, 'sir kAMRAN  brohi', NULL, NULL),
(2, 'Student', NULL, 'sir kAMRAN  brohi', NULL, NULL),
(3, 'Recruiter', NULL, 'sir kAMRAN  brohi', NULL, NULL),
(4, 'Faculty', NULL, 'sir kAMRAN  brohi', NULL, NULL),
(5, 'Staff', NULL, 'sir kAMRAN  brohi', NULL, NULL),
(6, 'Guest', NULL, 'sir kAMRAN  brohi', NULL, NULL),
(7, 'Moderator', NULL, 'sir kAMRAN  brohi', NULL, NULL),
(8, 'Support', NULL, 'sir kAMRAN  brohi', NULL, NULL),
(9, 'Manager', NULL, 'sir kAMRAN  brohi', NULL, NULL),
(11, 'peon', NULL, 'sir kAMRAN  brohi', '2026-02-06 01:27:35', '2026-02-06 01:27:35'),
(12, 'director', NULL, 'sir kAMRAN  brohi', '2026-02-06 01:57:47', '2026-02-06 01:57:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`alumni_id`),
  ADD KEY `alumni_user_id_foreign` (`user_id`),
  ADD KEY `alumni_department_id_foreign` (`department_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `event_participants`
--
ALTER TABLE `event_participants`
  ADD PRIMARY KEY (`participant_id`),
  ADD KEY `event_participants_event_id_foreign` (`event_id`),
  ADD KEY `event_participants_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `group_members`
--
ALTER TABLE `group_members`
  ADD PRIMARY KEY (`group_member_id`),
  ADD KEY `group_members_group_id_foreign` (`group_id`),
  ADD KEY `group_members_user_id_foreign` (`user_id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `job_user_id_foreign` (`user_id`),
  ADD KEY `job_category_id_foreign` (`category_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD PRIMARY KEY (`application_id`),
  ADD KEY `job_applications_job_id_foreign` (`job_id`),
  ADD KEY `job_applications_user_id_foreign` (`user_id`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_categories`
--
ALTER TABLE `job_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `login_logs`
--
ALTER TABLE `login_logs`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `login_logs_user_id_foreign` (`user_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `messages_sender_id_foreign` (`sender_id`),
  ADD KEY `messages_receiver_id_foreign` (`receiver_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alumni`
--
ALTER TABLE `alumni`
  MODIFY `alumni_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `department_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `event_participants`
--
ALTER TABLE `event_participants`
  MODIFY `participant_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `group_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `group_members`
--
ALTER TABLE `group_members`
  MODIFY `group_member_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `job_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_applications`
--
ALTER TABLE `job_applications`
  MODIFY `application_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `job_categories`
--
ALTER TABLE `job_categories`
  MODIFY `category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `login_logs`
--
ALTER TABLE `login_logs`
  MODIFY `log_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `role_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alumni`
--
ALTER TABLE `alumni`
  ADD CONSTRAINT `alumni_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`department_id`),
  ADD CONSTRAINT `alumni_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `event_participants`
--
ALTER TABLE `event_participants`
  ADD CONSTRAINT `event_participants_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `event_participants_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `group_members`
--
ALTER TABLE `group_members`
  ADD CONSTRAINT `group_members_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `group_members_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `job_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `job_categories` (`category_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `job_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD CONSTRAINT `job_applications_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `job` (`job_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `job_applications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `login_logs`
--
ALTER TABLE `login_logs`
  ADD CONSTRAINT `login_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `messages_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `user_roles` (`role_id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
