-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2021 at 07:54 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `details` varchar(2900) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `phone`, `image`, `password`, `address`, `details`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@yahoo.com', '01749800971', 'pngtree-beautiful-admin-roles-line-vector-icon-png-image_1992804 (1).jpg', '123456789', '24, Hrishikesh Dash Len, Luxmibazar, Sutrapur', 'Another Update Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', NULL, '2021-04-27 05:44:14');

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `video_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `course_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `video` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `video_title`, `course_id`, `video`, `created_at`, `updated_at`) VALUES
(2, 'Introduction', '8', '1619610615.MKV', '2021-04-28 05:50:15', '2021-04-28 05:50:15');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guardians`
--

CREATE TABLE `guardians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `icons`
--

CREATE TABLE `icons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `icons`
--

INSERT INTO `icons` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'fa-window-restore', NULL, NULL),
(2, 'fa-window-maximize', NULL, NULL),
(3, 'fa-wifi', NULL, NULL),
(4, 'window-close', NULL, NULL),
(5, 'fa-warning', NULL, NULL),
(6, 'fa-volume-up', NULL, NULL),
(7, 'fa-volume-control-phone', NULL, NULL),
(8, 'fa-video-camera', NULL, NULL),
(9, 'fa-users', NULL, NULL),
(10, 'fa-user-plus', NULL, NULL),
(11, 'fa-user', NULL, NULL),
(12, 'fa-upload', NULL, NULL),
(13, 'fa-university', NULL, NULL),
(14, 'fa-tv', NULL, NULL),
(15, 'fa-trophy', NULL, NULL),
(16, 'fa-trash', NULL, NULL),
(17, 'fa-times', NULL, NULL),
(18, 'fa-thumbs-up', NULL, NULL),
(19, 'fa-thumbs-down', NULL, NULL),
(20, 'fa-television', NULL, NULL),
(21, 'fa-taxi', NULL, NULL),
(22, 'fa-tasks', NULL, NULL),
(23, 'fa-tablet', NULL, NULL),
(24, 'fa-support', NULL, NULL),
(25, 'fa-square', NULL, NULL),
(26, 'fa-smile-o', NULL, NULL),
(27, 'fa-sign-in', NULL, NULL),
(28, 'fa-shopping-cart', NULL, NULL),
(29, 'fa-server', NULL, NULL),
(30, 'fa-rss', NULL, NULL),
(31, 'fa-random', NULL, NULL),
(32, 'fa-print', NULL, NULL),
(33, 'fa-power-off', NULL, NULL),
(34, 'fa-random', NULL, NULL),
(35, 'fa-refresh', NULL, NULL),
(36, 'fa-question', NULL, NULL),
(37, 'fa-print', NULL, NULL),
(38, 'fa-power-off', NULL, NULL),
(39, 'fa-plus-square', NULL, NULL),
(40, 'fa-plus', NULL, NULL),
(41, 'fa-plug', NULL, NULL),
(42, 'fa-print', NULL, NULL),
(43, 'fa-plane', NULL, NULL),
(44, 'fa-pie-chart', NULL, NULL),
(45, 'fa-photo', NULL, NULL),
(46, 'fa-phone', NULL, NULL),
(47, 'fa-percent', NULL, NULL),
(48, 'fa-pencil', NULL, NULL),
(49, 'fa-music', NULL, NULL),
(50, 'fa-mobile', NULL, NULL),
(51, 'fa-male', NULL, NULL),
(52, 'fa-laptop', NULL, NULL),
(53, 'fa-key', NULL, NULL),
(54, 'fa-institution', NULL, NULL),
(55, 'fa-info', NULL, NULL),
(56, 'fa-legal', NULL, NULL),
(57, 'fa-heart', NULL, NULL),
(58, 'fa-headphones', NULL, NULL),
(59, 'fa-slideshare', NULL, NULL),
(60, 'fa-picture-o', NULL, NULL),
(61, 'fa-connectdevelop', NULL, NULL),
(62, 'fa-desktop', NULL, NULL),
(63, 'fa-grav', NULL, NULL),
(64, 'fa-snowflake-o', NULL, NULL),
(65, 'fa-language', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_02_06_144340_create_admins_table', 1),
(5, '2021_02_06_144648_create_guardians_table', 1),
(6, '2021_02_06_144824_create_students_table', 1),
(7, '2021_02_06_145006_create_teachers_table', 1),
(8, '2021_02_09_082352_create_languages_table', 1),
(9, '2021_02_15_095821_create_teachercategories_table', 1),
(10, '2021_03_04_081200_create_teachersubcategories_table', 1),
(11, '2021_03_04_093637_create_icons_table', 1),
(12, '2021_03_07_085724_create_teacherchildcategories_table', 2),
(13, '2021_03_07_120108_create_teachercourses_table', 3),
(14, '2021_03_08_060517_create_teachercourses_table', 4),
(15, '2021_03_10_060824_create_teacherlanguages_table', 5),
(16, '2021_03_11_101826_create_teacherquestions_table', 6),
(17, '2021_03_14_063442_create_teacheranswers_table', 7),
(18, '2021_03_14_065008_create_teacheranswers_table', 8),
(19, '2021_03_14_074111_create_teacherannouncements_table', 9),
(20, '2021_03_14_115024_create_teacherblogs_table', 10),
(21, '2021_03_18_105302_create_teacherfeaturedcourses_table', 11),
(22, '2021_03_24_095940_create_students_table', 12),
(23, '2021_03_26_051441_create_socialdatas_table', 13),
(24, '2021_04_13_053127_create_tokens_table', 14),
(25, '2021_04_15_050915_create_zooms_table', 14),
(26, '2021_04_28_035417_create_contents_table', 15);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `socialdatas`
--

CREATE TABLE `socialdatas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `socialdatas`
--

INSERT INTO `socialdatas` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'student', '2021-03-25 23:30:40', '2021-03-25 23:30:40'),
(2, 'student', '2021-03-25 23:33:39', '2021-03-25 23:33:39'),
(3, 'teacher', '2021-03-25 23:35:10', '2021-03-25 23:35:10'),
(4, 'teacher', '2021-03-28 07:23:23', '2021-03-28 07:23:23'),
(5, 'teacher', '2021-03-28 07:24:23', '2021-03-28 07:24:23'),
(6, 'teacher', '2021-04-05 02:53:23', '2021-04-05 02:53:23'),
(7, 'teacher', '2021-04-05 06:25:21', '2021-04-05 06:25:21'),
(8, 'teacher', '2021-04-05 21:00:48', '2021-04-05 21:00:48'),
(9, 'teacher', '2021-04-05 23:53:57', '2021-04-05 23:53:57'),
(10, 'teacher', '2021-04-06 00:01:22', '2021-04-06 00:01:22'),
(11, 'teacher', '2021-04-06 00:26:05', '2021-04-06 00:26:05'),
(12, 'teacher', '2021-04-20 06:11:02', '2021-04-20 06:11:02'),
(13, 'teacher', '2021-04-20 06:12:39', '2021-04-20 06:12:39'),
(14, 'teacher', '2021-04-28 06:15:13', '2021-04-28 06:15:13');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `last_name`, `password`, `gender`, `email`, `phone`, `country`, `address`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Student', NULL, '123456789a', NULL, 'Student@yahoo.com', '01751720590', NULL, NULL, NULL, '2021-03-24 04:17:33', '2021-03-24 04:17:33'),
(3678738632209931, 'Shuvo Bhowmik', NULL, NULL, NULL, 'shuvobhowmik_cse11uits@yahoo.com', NULL, NULL, NULL, '3678738632209931.jpg', '2021-03-25 00:39:51', '2021-03-25 00:39:51'),
(18446744073709551615, 'Shuvo Bhowmik', NULL, NULL, NULL, 'shuvobhowmik21bengal@gmail.com', NULL, NULL, NULL, '105480194344057881385.jpg', '2021-03-25 01:11:47', '2021-03-25 01:11:47');

-- --------------------------------------------------------

--
-- Table structure for table `teacherannouncements`
--

CREATE TABLE `teacherannouncements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `announcement` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `course` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teacherannouncements`
--

INSERT INTO `teacherannouncements` (`id`, `announcement`, `course`, `status`, `created_at`, `updated_at`) VALUES
(1, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable Edit.', 'Art & Science of Drawing- Ultimate Drawing Course', 'Active', '2021-03-14 03:20:21', '2021-03-14 04:43:36'),
(3, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable Edit.', 'Art & Science of Drawing- Ultimate Drawing Course', 'Active', '2021-03-14 04:34:32', '2021-03-14 04:34:38');

-- --------------------------------------------------------

--
-- Table structure for table `teacheranswers`
--

CREATE TABLE `teacheranswers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `answer` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `question` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `course` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teacheranswers`
--

INSERT INTO `teacheranswers` (`id`, `answer`, `question`, `course`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Hair styling- The Ultimate Hair Course', 'Active', NULL, '2021-03-14 01:28:56');

-- --------------------------------------------------------

--
-- Table structure for table `teacherblogs`
--

CREATE TABLE `teacherblogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `headings` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `text` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `details` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `teacher_email` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teacherblogs`
--

INSERT INTO `teacherblogs` (`id`, `date`, `headings`, `text`, `image`, `details`, `teacher_email`, `created_at`, `updated_at`) VALUES
(6, '03/18/2021 2:03 PM', 'Web Developement Heading 5', 'Web Developement  Text 5', '16003748675 (1).jpg', 'Web Developement Details edit', 'shuvobhowmik21bengal@gmail.com', '2021-03-18 02:04:04', '2021-03-18 02:56:05');

-- --------------------------------------------------------

--
-- Table structure for table `teachercategories`
--

CREATE TABLE `teachercategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `featured` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `recent` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teachercategories`
--

INSERT INTO `teachercategories` (`id`, `name`, `featured`, `status`, `image`, `slug`, `icon`, `recent`, `created_at`, `updated_at`) VALUES
(12, 'Photography', 'Yes', 'Deactive', '160037493146 (1) (1).jpg', 'photography', 'fa-window-maximize', 'Yes', '2021-03-21 04:03:18', '2021-04-20 01:15:07'),
(13, 'Design', 'No', 'Active', '16003748675 (2).jpg', 'design', 'fa-desktop', 'Yes', '2021-03-21 05:03:01', '2021-04-20 01:19:04'),
(14, 'Health & Fitness', 'Yes', 'Active', '160037509091 (1).jpg', 'health-fitness', 'fa-warning', 'Yes', '2021-03-21 05:06:05', '2021-04-20 01:19:08'),
(15, 'Developement', 'Yes', 'Active', '160037514173 (2).jpg', 'developement', 'fa-volume-up', 'Yes', '2021-03-21 05:07:46', '2021-04-20 01:19:12'),
(16, 'Music', 'Yes', 'Active', 'download (1).png', 'music', 'fa-laptop', 'Yes', '2021-03-21 05:08:59', '2021-04-20 01:19:18'),
(17, 'LifeStyle', 'No', 'Deactive', 'download (2).png', 'lifestyle', 'fa-thumbs-down', 'Yes', '2021-03-21 05:10:21', '2021-04-20 01:19:23');

-- --------------------------------------------------------

--
-- Table structure for table `teacherchildcategories`
--

CREATE TABLE `teacherchildcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subcategory_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subcategory_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teacherchildcategories`
--

INSERT INTO `teacherchildcategories` (`id`, `title`, `category_name`, `category_id`, `subcategory_name`, `subcategory_id`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(11, 'All Web Design', 'Design', '13', 'web Design', '20', 'fa-video-camera', 'Deactive', '2021-03-21 05:27:36', '2021-04-01 02:19:15'),
(14, 'Photoshop', 'Design', '13', 'Graphic Design', '21', 'fa-tv', 'Active', '2021-03-21 05:31:56', '2021-04-01 01:32:03'),
(15, 'Fashion Design', 'Design', '13', 'Fashion', '22', 'fa-tasks', 'Active', '2021-03-21 05:32:46', '2021-03-21 05:32:46'),
(17, 'All Yoga', 'Health & Fitness', '14', 'Yoga', '29', 'fa-video-camera', 'Active', '2021-03-21 06:09:02', '2021-03-21 06:09:02'),
(18, 'All Music Software', 'Music', '16', 'Music Software', '30', 'fa-television', 'Active', '2021-03-21 06:27:25', '2021-03-21 06:27:25'),
(19, 'Drawing', 'LifeStyle', '17', 'art & craft', '31', 'fa-shopping-cart', 'Active', '2021-03-22 01:06:35', '2021-03-22 01:06:35'),
(20, 'Painting', 'LifeStyle', '17', 'art & craft', '31', 'fa-smile-o', 'Active', '2021-03-22 01:07:25', '2021-03-22 01:07:25'),
(21, 'java Script', 'Developement', '15', 'programing language', '25', 'fa-print', 'Active', '2021-03-22 01:47:29', '2021-03-22 01:47:29'),
(24, 'All Sports', 'Health & Fitness', '14', 'Sports', '34', 'fa-trophy', 'Active', '2021-04-02 19:55:26', '2021-04-02 19:55:26');

-- --------------------------------------------------------

--
-- Table structure for table `teachercourses`
--

CREATE TABLE `teachercourses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacher_email` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subcategory_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subcategory_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `childcategory_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `childcategory_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `language` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `refund_policy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `course_tag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `short_details` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `requirements` varchar(10000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `details` varchar(4000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pay_option` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `course_price` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `discount` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `upload_video` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `assignment_option` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `course_content` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `certificate_option` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `course_duration` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `featured` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bundle` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zoom` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `recent_course` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `intro_learn` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `full_link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teachercourses`
--

INSERT INTO `teachercourses` (`id`, `teacher_email`, `category_name`, `category_id`, `subcategory_name`, `subcategory_id`, `childcategory_name`, `childcategory_id`, `language`, `refund_policy`, `course_tag`, `title`, `slug`, `short_details`, `requirements`, `details`, `pay_option`, `course_price`, `discount`, `upload_video`, `url`, `image`, `assignment_option`, `course_content`, `certificate_option`, `course_duration`, `status`, `featured`, `bundle`, `zoom`, `recent_course`, `intro_learn`, `full_link`, `created_at`, `updated_at`) VALUES
(8, 'shuvobhowmik21bengal@gmail.com', 'Health & Fitness', '14', 'Yoga', '29', 'All Yoga', '17', 'English', 'Yes', 'All Yoga', 'Internationally Accredited Diploma in Yoga Training', 'internationally-accredited-diploma-in-yoga-training', 'Requirement edited', NULL, 'hellow details edited', 'Paid', '10000', NULL, '', 'VaoV1PrYft4', '1579688543yoga (1) (1).jpg', 'No', 'No', 'Yes', 'Month', 'Active', 'Yes', 'Yes', 'Yes', 'Yes', NULL, NULL, '2021-03-21 06:14:01', '2021-04-25 20:04:41'),
(9, 'shuvobhowmik21bengal@gmail.com', 'Music', '16', 'Music Software', '30', 'All Music Software', '18', 'English', 'No', 'Music Production with Mixing & Mastering', 'Music Production with Mixing & Mastering', 'music-production-with-mixing-mastering', 'Learning the tricks and techniques to mixing and mastering your songs', 'Focused on clients that need to show signs of improvement at their blending and acing inside Studio One', '<p>On the off chance that you need to improve your melody blends in Studio One, this is the ideal course for you! Figure out how to Mix and Master them inside Studio One This is a finished course showing you how to utilize every one of the apparatuses and', 'Paid', '30000', NULL, '', 'https://www.youtube.com/watch?v=ab_TBVZewoQ', '157976172453.jpg', 'Yes', 'Yes', 'Yes', 'Month', 'Active', 'Yes', 'No', 'Yes', NULL, NULL, NULL, '2021-03-21 06:32:57', '2021-04-21 05:05:21'),
(11, 'shuvobhowmik21bengal@gmail.com', 'LifeStyle', '17', 'art & craft', '31', 'Drawing', '19', 'English', 'No', 'art-science-of-drawing-ultimate-drawing-course', 'Art & Science of Drawing-  Ultimate Drawing Course', 'art-science-of-drawing-ultimate-drawing-course', 'Short Details is Updated', 'Requirements is Updated', '<p>Details of Art Science is Updated Data</p>', 'Paid', '10000', NULL, '', 'https://www.youtube.com/watch?v=ewMksAbgdBI', '157976281055 (2).jpg', 'Yes', 'Yes', 'Yes', 'Month', 'Deactive', 'Yes', 'No', NULL, NULL, NULL, NULL, '2021-03-22 01:10:55', '2021-04-20 23:46:46'),
(12, 'shuvobhowmik21bengal@gmail.com', 'Developement', '15', 'programing language', '25', 'java Script', '21', 'English', 'No', 'the-mordern-javascript-the-complete-guide', 'The Mordern JavaScript - The Complete Guide', 'the-mordern-javascript-the-complete-guide', 'Short Details of Modern Java Script', 'Requirements of Modern Java Script', '<p>Loream ipsum Dollor Sum amet update Data</p>', 'Free', '30000', NULL, '', 'https://www.youtube.com/watch?v=v_s7lpikWQU', '157976014948.jpg', 'Yes', 'Yes', 'Yes', 'Month', 'Deactive', 'Yes', 'Yes', NULL, NULL, NULL, NULL, '2021-03-22 01:49:38', '2021-04-20 20:20:28'),
(16, 'admin@yahoo.com', 'Design', '13', 'Fashion', '22', 'Fashion Design', '15', 'English', 'No', 'hellow-world', 'hellow world', 'hellow-world', 'hello world', 'hello requirement', '<p>hello world</p>', 'Paid', '800', NULL, '', '9XUY6SyGylM', 'shuvo.jpg', 'Yes', 'No', 'No', 'Month', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-24 18:22:59', '2021-04-24 18:22:59'),
(17, 'admin@yahoo.com', 'Health & Fitness', '14', 'Sports', '34', 'All Sports', '24', 'English', 'Yes', 'ultimate-boxing-training-professional-boxing-techniques', 'Ultimate Boxing Training: Professional Boxing Techniques', 'ultimate-boxing-training-professional-boxing-techniques', 'Legendary Fighter Reveals The Boxing Secrets That Pummel, Destroy, And Knockout Any Attacker Or Opponent Who Tries You!', 'No Experience Required: If you want to learn boxing mastery skills without wasting years in a boxing gym this is hand down the best way by learning the best boxing techniques - It Doesn’t Matter If You’re Short & Under-Sized Or Have Never Been In A Real Fight Or Boxing Match, You’ll Be Shocked By How Easy It Is To Execute These Devastating Boxing Moves…', 'Legendary Fighter And World Champion Reveals New Ultimate Boxing Training Secrets To Bullet Proof Fighting Skills...Including Dirty Boxing Moves that could get you banned in the ring! - If you would like to discover how to load any strike you throw with the EXPLOSIVE POWER of a sawed-off shotgun… - EVADE your opponents with the grace of Muhammad Ali’s footwork… - And BUILD a fortress-like defense with your arms that is impenetrable by anyone no matter how big they are..', 'Paid', '800', NULL, '', 'kbgkeTTSau8', '1579685773boxing (1).jpg', 'Yes', 'No', 'Yes', 'Month', NULL, NULL, NULL, NULL, 'Yes', '1. Be comfortable putting SQL and PostgreSQL on their resume\r\n2. Use SQL to perform data analysis\r\n3. Be confident while working with constraints and relating data tables\r\n4. Tons of exercises that will solidify your knowledge', 'https://www.youtube.com/watch?v=kbgkeTTSau8', '2021-04-24 19:55:04', '2021-04-27 19:37:57');

-- --------------------------------------------------------

--
-- Table structure for table `teacherfeaturedcourses`
--

CREATE TABLE `teacherfeaturedcourses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `featured_course_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `course_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `teacher_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teacherfeaturedcourses`
--

INSERT INTO `teacherfeaturedcourses` (`id`, `featured_course_name`, `course_id`, `teacher_email`, `created_at`, `updated_at`) VALUES
(5, 'Music Production with Mixing & Mastering', '9', 'shuvobhowmik21bengal@gmail.com', '2021-03-22 04:59:20', '2021-03-22 04:59:20');

-- --------------------------------------------------------

--
-- Table structure for table `teacherlanguages`
--

CREATE TABLE `teacherlanguages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teacherlanguages`
--

INSERT INTO `teacherlanguages` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Spanish', 'Enable', '2021-03-10 01:45:13', '2021-03-11 01:58:15'),
(4, 'Bangla', 'Enable', '2021-03-11 01:16:59', '2021-03-11 01:58:20'),
(6, 'Bangla', 'Enable', '2021-03-22 02:51:40', '2021-03-22 02:51:40');

-- --------------------------------------------------------

--
-- Table structure for table `teacherquestions`
--

CREATE TABLE `teacherquestions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `question` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `teacher_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teacherquestions`
--

INSERT INTO `teacherquestions` (`id`, `course_name`, `question`, `status`, `teacher_name`, `created_at`, `updated_at`) VALUES
(3, 'Art & Science of Drawing- Ultimate Drawing Course', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Active', 'shuvobhowmik21bengal@gmail.com', '2021-03-12 00:17:12', '2021-03-12 00:17:12');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(255) NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `details` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `resume` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `first_name`, `last_name`, `password`, `gender`, `email`, `phone`, `country`, `address`, `details`, `resume`, `status`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Jhon', NULL, '12345678', NULL, 'Jhondoe@yahoo.com', '01911219857', NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-06 00:24:53', '2021-04-06 00:24:53'),
(2, 'Shuvo Bhowmik', NULL, NULL, NULL, 'shuvobhowmik21bengal@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '105480194344057881385.jpg', '2021-04-06 00:26:07', '2021-04-06 00:26:07'),
(3, 'Shuvo Bhowmik', NULL, NULL, NULL, 'shuvobhowmik_cse11uits@yahoo.com', NULL, NULL, NULL, NULL, NULL, NULL, '3678738632209931.jpg', '2021-04-20 06:11:20', '2021-04-20 06:11:20');

-- --------------------------------------------------------

--
-- Table structure for table `teachersubcategories`
--

CREATE TABLE `teachersubcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` int(200) NOT NULL,
  `sub_category_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teachersubcategories`
--

INSERT INTO `teachersubcategories` (`id`, `category_name`, `category_id`, `sub_category_name`, `slug`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(20, 'Design', 13, 'web Design', 'web-design', 'fa-warning', 'Deactive', '2021-03-21 05:13:05', '2021-03-31 23:24:04'),
(21, 'Design', 13, 'Graphic Design', 'graphic-design', 'fa-warning', 'Active', '2021-03-21 05:14:32', '2021-03-21 05:14:32'),
(22, 'Design', 13, 'Fashion', 'fashion', 'fa-wifi', 'Active', '2021-03-21 05:15:03', '2021-03-21 05:15:03'),
(23, 'Developement', 15, 'web development', 'web-development', 'fa-server', 'Active', '2021-03-21 05:15:45', '2021-03-21 05:15:45'),
(24, 'Developement', 15, 'App Developement', 'app-developement', 'fa-window-maximize', 'Active', '2021-03-21 05:16:13', '2021-03-21 05:16:13'),
(25, 'Developement', 15, 'programing language', 'programing-language', 'fa-wifi', 'Active', '2021-03-21 05:20:52', '2021-03-21 05:22:43'),
(26, 'Developement', 15, 'Database', 'database', 'fa-desktop', 'Active', '2021-03-21 05:22:26', '2021-03-21 05:22:26'),
(28, 'Music', 16, 'Instruments', 'instruments', 'fa-user-plus', 'Deactive', '2021-03-21 05:24:20', '2021-03-21 05:24:20'),
(29, 'Health & Fitness', 14, 'Yoga', 'yoga', 'fa-taxi', 'Deactive', '2021-03-21 06:07:17', '2021-03-21 06:07:17'),
(30, 'Music', 16, 'Music Software', 'music-software', 'fa-trophy', 'Active', '2021-03-21 06:26:45', '2021-03-21 06:26:45'),
(31, 'LifeStyle', 17, 'art & craft', 'art-craft', 'fa-television', 'Deactive', '2021-03-22 01:05:12', '2021-03-22 01:05:12'),
(34, 'Health & Fitness', 14, 'Sports', 'sports', 'fa-thumbs-down', 'Enable', '2021-04-02 19:46:10', '2021-04-02 19:46:10');

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `zooms`
--

CREATE TABLE `zooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `meeting_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `owner_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meeting_topic` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meeting_url` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meeting_password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `start_time` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `course_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `zooms`
--

INSERT INTO `zooms` (`id`, `meeting_id`, `owner_id`, `meeting_topic`, `meeting_url`, `meeting_password`, `start_time`, `course_name`, `created_at`, `updated_at`) VALUES
(12, '71043539476', 'shuvobhowmik21bengal@gmail.com', 'Music harmonic part', 'https://us04web.zoom.us/j/71043539476?pwd=RHBjWlcvVnljcHFSeHVzT00wQ3FEZz09', '12345678', '2021-04-18T07:00:00Z', 'Music Production with Mixing & Mastering', NULL, NULL),
(13, '77400154193', 'shuvobhowmik21bengal@gmail.com', 'Gutenburg Page Builder', 'https://us04web.zoom.us/j/77400154193?pwd=ZkpBdTJnblVUS1BWLzFxNkpPNytldz09', '12345678', '2021-04-21T07:00:00Z', 'WordPress theme Development', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `guardians`
--
ALTER TABLE `guardians`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `icons`
--
ALTER TABLE `icons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
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
-- Indexes for table `socialdatas`
--
ALTER TABLE `socialdatas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacherannouncements`
--
ALTER TABLE `teacherannouncements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacheranswers`
--
ALTER TABLE `teacheranswers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacherblogs`
--
ALTER TABLE `teacherblogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachercategories`
--
ALTER TABLE `teachercategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacherchildcategories`
--
ALTER TABLE `teacherchildcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachercourses`
--
ALTER TABLE `teachercourses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacherfeaturedcourses`
--
ALTER TABLE `teacherfeaturedcourses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacherlanguages`
--
ALTER TABLE `teacherlanguages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacherquestions`
--
ALTER TABLE `teacherquestions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachersubcategories`
--
ALTER TABLE `teachersubcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `zooms`
--
ALTER TABLE `zooms`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guardians`
--
ALTER TABLE `guardians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `icons`
--
ALTER TABLE `icons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `socialdatas`
--
ALTER TABLE `socialdatas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9223372036854775807;

--
-- AUTO_INCREMENT for table `teacherannouncements`
--
ALTER TABLE `teacherannouncements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teacheranswers`
--
ALTER TABLE `teacheranswers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teacherblogs`
--
ALTER TABLE `teacherblogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `teachercategories`
--
ALTER TABLE `teachercategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `teacherchildcategories`
--
ALTER TABLE `teacherchildcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `teachercourses`
--
ALTER TABLE `teachercourses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `teacherfeaturedcourses`
--
ALTER TABLE `teacherfeaturedcourses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teacherlanguages`
--
ALTER TABLE `teacherlanguages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `teacherquestions`
--
ALTER TABLE `teacherquestions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teachersubcategories`
--
ALTER TABLE `teachersubcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `zooms`
--
ALTER TABLE `zooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
