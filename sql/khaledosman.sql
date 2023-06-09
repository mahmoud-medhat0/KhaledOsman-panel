-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 25, 2023 at 07:23 PM
-- Server version: 8.0.24
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `khaledosman`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(512) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mahmoud Medhat', 'hetlarhhs@gmail.com', '$2y$10$izDEzcgH1amG3W98/v04c.Po8uycDWRmASPjj9/H7HlIvm7KhZslS', NULL, '2023-05-16 15:51:21', '2023-05-16 14:48:12');

-- --------------------------------------------------------

--
-- Table structure for table `codes`
--

CREATE TABLE `codes` (
  `id` int NOT NULL,
  `status` enum('0','1') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0',
  `code` char(8) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `admin_id` int NOT NULL,
  `student_id` int NOT NULL,
  `lesson_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `codes`
--

INSERT INTO `codes` (`id`, `status`, `code`, `created_at`, `updated_at`, `admin_id`, `student_id`, `lesson_id`) VALUES
(5, '0', '8n84m901', '2023-05-23 12:33:30', '2023-05-23 12:33:30', 1, 1, 26),
(6, '0', 'dhlzw2kk', '2023-05-23 12:33:41', '2023-05-23 12:33:41', 1, 1, 27),
(7, '1', '12345678', '2023-05-23 19:14:15', '2023-05-23 19:28:22', 1, 2, 26);

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `id` int NOT NULL,
  `title` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `path` varchar(256) NOT NULL,
  `duration` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `title`, `path`, `duration`, `created_at`, `updated_at`) VALUES
(26, 'test 1', 'private/uploads/1684514558.mp4', NULL, '2023-05-19 13:42:38', '2023-05-19 13:42:38'),
(27, 'test2', 'private/uploads/1684515088.mp4', NULL, '2023-05-19 13:51:28', '2023-05-19 13:51:28');

-- --------------------------------------------------------

--
-- Table structure for table `personal temps`
--

CREATE TABLE `personal temps` (
  `id` int NOT NULL,
  `student_id` int NOT NULL,
  `number` varchar(12) NOT NULL,
  `code` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int NOT NULL,
  `name` varchar(256) NOT NULL,
  `number` char(12) NOT NULL,
  `password` varchar(512) NOT NULL,
  `NationalID` char(17) NOT NULL,
  `gender` enum('f','m') NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `remember_token` varchar(256) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `number`, `password`, `NationalID`, `gender`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'jkgfnjo', '01148422820', '$2y$10$uQatKltx7oVICWNz7MGS2.wpsxeJziY.KPe/0JkY0Pc4Y3Un/VQOG', '12345678912345677', 'f', '0', NULL, '2023-05-19 10:49:16', '2023-05-23 12:41:58'),
(2, 'mahmoud medhat', '01091793274', '$2y$10$w5Y7JW7d05UsBvaOqKH54u.a7JmRDMbSpr9w0UlULbnuZw22Erj92', '30304050101693', 'f', '0', NULL, '2023-05-23 15:05:10', '2023-05-23 15:05:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `codes`
--
ALTER TABLE `codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `code_admin` (`admin_id`),
  ADD KEY `code_student` (`student_id`),
  ADD KEY `code_lesson` (`lesson_id`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal temps`
--
ALTER TABLE `personal temps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `codes`
--
ALTER TABLE `codes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `personal temps`
--
ALTER TABLE `personal temps`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `codes`
--
ALTER TABLE `codes`
  ADD CONSTRAINT `code_admin` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `code_student` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
