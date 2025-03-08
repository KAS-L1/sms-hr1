-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 05, 2025 at 01:00 AM
-- Server version: 8.0.40
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `contact` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'default.png',
  `role` enum('Admin','Manager','Vendor','Auditor','Procurement Manager','Vendor Manager') COLLATE utf8mb4_unicode_ci DEFAULT 'Vendor',
  `status` enum('Active','Inactive','Pending') COLLATE utf8mb4_unicode_ci DEFAULT 'Pending',
  `company` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `first_name`, `last_name`, `username`, `password`, `email`, `email_verified_at`, `address`, `contact`, `picture`, `role`, `status`, `company`, `category_id`, `created_at`, `updated_at`, `last_login`) VALUES
(1, 116088, 'Kasl', 'Master', 'admin', '$2y$10$dp2/MAobH2wWvX24MxGnBew6hSReJ.H4rGTslAIyuF8E5r4TmhNx.', 'kasl.54370906@gmail.com', NULL, 'Et sunt sint dolorem', '09082546789', '116088-67c5bc7d26076.png', 'Admin', 'Active', 'Mack and Guerrero Plc', 0, '2025-01-30 18:54:31', '2025-03-04 13:24:53', '2025-03-04 21:24:52'),
(2, 113225, 'Sara', 'Lamb', 'procurement', '$2y$10$dp2/MAobH2wWvX24MxGnBew6hSReJ.H4rGTslAIyuF8E5r4TmhNx.', 'tavukyko@mailinator.com', NULL, 'Iure eos itaque cupi', '02002202484', 'default.png', 'Procurement Manager', 'Active', 'Oliver White Associates', 0, '2025-01-30 18:56:54', '2025-03-03 22:38:45', '2025-03-04 13:38:45'),
(3, 117525, 'Chloe', 'Key', 'vendor.manager', '$2y$10$dp2/MAobH2wWvX24MxGnBew6hSReJ.H4rGTslAIyuF8E5r4TmhNx.', 'pepetir@mailinator.com', NULL, 'Inventore eius molli', '9944039575', 'default.png', 'Vendor Manager', 'Active', 'Zimmerman Hayes Plc', 0, '2025-01-30 19:03:10', '2025-03-03 07:26:37', '2025-03-03 22:26:37'),
(4, 111404, 'Freya', 'Hewitt', 'vendor01', '$2y$10$mXf80z4I80WPI210/yb64evSin8YUSUcxy0icrizpMwPvfMordq6O', 'qagonofoc@mailinator.com', NULL, 'Minus aut error accu', '09945039685', 'default.png', 'Vendor', 'Active', 'Torres and Odom Co', 0, '2025-01-30 19:06:15', '2025-02-16 12:01:39', '2025-02-16 20:01:38'),
(5, 116862, 'Ora', 'Jackson', 'vendor02', '$2y$10$cZZfnUZc26niZ60mP.4q5OcTZ9CQRAWryxLddoS/..VaDgUF8ddiC', 'tipikixih@mailinator.com', NULL, 'Mollit et aliquip te', '56', 'default.png', 'Vendor', 'Active', 'England Guy Plc', 440789, '2025-01-30 19:26:37', '2025-03-03 07:24:58', '2025-03-03 22:24:58'),
(6, 119417, 'Kylie', 'Price', 'vendor03', '$2y$10$b.uQLOq6cGRrRA88kZbzEuDjd6RhbsuwvR4nzkIQC/byTb2jmkIdS', 'dodiwybame@mailinator.com', NULL, 'Voluptatem atque mag', '16', 'default.png', 'Vendor', 'Active', 'Harper and Pacheco Trading', 441015, '2025-01-30 19:27:45', '2025-02-25 23:33:29', '2025-02-26 14:33:29'),
(7, 116128, 'Jason', 'Walter', 'vendor04', '$2y$10$rMBVz2LTlGLVwF9as77wSuVRfKsGh6cPoA0XoVR6AERXakEla20gu', 'hitapo@mailinator.com', NULL, 'Tempore ipsam offic', '96', 'default.png', 'Manager', 'Pending', 'Terrell and Guthrie Co', 0, '2025-01-31 19:05:46', '2025-02-13 13:16:38', NULL),
(8, 114460, 'Tatum', 'Shepherd', 'NANO', '$2y$10$cFSx4eLWdnnXL8dmKk2uZOQEl.NWC9HelwPQ5k4yPPWIyMMuz8tMS', 'xomyzuhi@mailinator.com', NULL, 'Nemo sunt omnis dolo', '31', 'default.png', 'Vendor', 'Pending', 'Burns and Dominguez Traders', 0, '2025-02-10 11:32:14', '2025-02-10 04:32:15', NULL),
(9, 117350, 'Uriah', 'Scott', 'sohupafyz', '$2y$10$ByQiOGT4NIFtsEMtbXrXPuMkGdo6y8E08dbgzY39qiC721OscWFGq', 'hitypawyru@mailinator.com', NULL, 'Quis at et ea non si', 'Saepe quasi quaerat ', 'default.png', 'Auditor', 'Active', 'Ochoa Shaffer LLC', 0, '2025-02-13 09:48:07', '2025-02-23 10:42:17', NULL),
(10, 118042, 'Noelani', 'Valentine', 'sheshe', '$2y$10$FaNH2n4bJy4dGuLIHtvml.XJzriQf0V.ea0jfuGUh9rT3UBeRU3wu', 'cexuqawi@mailinator.com', NULL, 'Provident fugiat o', '98', 'default.png', 'Vendor', 'Pending', 'Willis and Mays Traders', 0, '2025-02-15 01:49:10', '2025-02-14 18:49:10', NULL),
(11, 117873, 'Neil', 'Vazquez', 'duzyme', '$2y$10$QeAfpHjS7U0Fl9mzEdQMyO.4VcoOhbHUhX7qymPQZErD.jJ8T78Ve', 'cotoboj@mailinator.com', NULL, 'Voluptates qui verit', '92', 'default.png', 'Vendor', 'Pending', 'Ruiz Delaney Trading', 0, '2025-02-15 01:49:31', '2025-02-14 18:49:31', NULL),
(12, 119737, 'Janna', 'Bowers', 'dumdum', '$2y$10$3rdPalj39hbYDLFF3j7AAeCxNIrWOXsWslfLVwKVlAThYFSkPKocm', 'dumdumaccacc001@gmail.com', NULL, 'Non nihil dolor exce', '23', 'default.png', 'Vendor', 'Pending', 'Melton Velez Traders', 0, '2025-02-15 01:50:33', '2025-02-14 18:50:33', NULL),
(13, 115249, 'Brendan', 'Vang', 'man', '$2y$10$sh8vtNLl7jurAmVL1CYey.z5PBZvMHItlmNjm45WLBppBIrVUNjKe', 'kasl090603@gmail.com', NULL, 'Expedita fugiat exc', '87', 'default.png', 'Vendor', 'Pending', 'Gibson Summers Co', 0, '2025-02-15 01:51:27', '2025-02-14 18:51:27', NULL),
(14, 113242, 'Ciara', 'Horton', 'pinur', '$2y$10$B1T9n2TDiWg1eWVTOzO1s.GjgGttGLkgZbwmV7F52GkAjE6LI5D3i', 'dovodoloqo@mailinator.com', NULL, 'Excepteur quibusdam', '96', 'default.png', 'Auditor', 'Active', 'Drake and Bender Traders', 440699, '2025-02-15 05:50:04', '2025-03-03 07:26:04', '2025-03-03 22:26:04'),
(15, 116205, 'Sheila', 'Velasco', 'GoodHomes', '$2y$10$GZIhvj3o3SrsNlGSQJYPz.dIUGoNgZItem58sUSepmK6rSrEOE7GO', 'valkyrievee00@gmail.com', NULL, '575 F. Dulalia', '9325288236', 'default.png', 'Vendor', 'Active', 'GoodHomes Cleaning Product', 441004, '2025-02-25 15:31:48', '2025-02-25 08:47:15', '2025-02-25 23:47:15');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
