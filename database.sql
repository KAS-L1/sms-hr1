-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 05, 2025 at 09:10 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms_hr1`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `user_id` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `contact` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'default.png',
  `role` enum('Admin','Teacher','Student') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'Student',
  `status` enum('Active','Inactive','Pending') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `firstname`, `lastname`, `username`, `password`, `email`, `email_verified_at`, `address`, `contact`, `image`, `role`, `status`, `created_at`, `updated_at`, `last_login`) VALUES
(1, '123456', 'Admin', 'Master', 'admin', '$2y$10$EYJl305XbK7KXSNq7oNsH.0AbiHx5Fz2FX7mfkh5UZhdbHciKKf32', 'admin@gmail.com', NULL, 'Et sunt sint dolorem', '09082546789', 'default.png', 'Admin', 'Active', '2025-01-30 18:54:31', '2025-03-05 07:33:25', '2025-03-05 15:33:25'),
(2, 'TCH-001', 'Teacher', 'Account', 'teacher01', '$2y$10$EYJl305XbK7KXSNq7oNsH.0AbiHx5Fz2FX7mfkh5UZhdbHciKKf32', 'teacher@gmail.com', NULL, 'Iure eos itaque cupi', '02002202484', 'default.png', 'Teacher', 'Active', '2025-01-30 18:56:54', '2025-03-05 07:21:12', '2025-03-04 13:38:45'),
(3, 'STD-001', 'Student', 'Account', 'student01', '$2y$10$EYJl305XbK7KXSNq7oNsH.0AbiHx5Fz2FX7mfkh5UZhdbHciKKf32', 'student@gmail,com', NULL, 'Inventore eius molli', '9944039575', 'default.png', 'Student', 'Active', '2025-01-30 19:03:10', '2025-03-05 07:34:45', '2025-03-05 15:34:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
