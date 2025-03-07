-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 07, 2025 at 11:06 AM
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
-- Database: `sms_hr1`
--

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `job_id` char(15) COLLATE utf8mb3_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `school` enum('MV Campus','Main Campus','Bulacan Campus') CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `location` enum('Mv - Topaz Millionaires Village Novaliches, Quezon City, Metro Manila','Main - Quirino Hwy, Novaliches, Quezon City, Metro Manila','Bulacan - Quirino Hwy, San Jose del Monte City, Bulacan') CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `image` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'default.png',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `job_id` (`job_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `job_id`, `title`, `school`, `location`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(8, 'JOB-4205', 'Enrollment', 'MV Campus', 'Mv - Topaz Millionaires Village Novaliches, Quezon City, Metro Manila', 'Enrollment Mv Campus', 'JOB-4205-67cad0fdecbf9.jpg', 1, '2025-03-07 18:57:01', '2025-03-07 18:57:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` char(20) COLLATE utf8mb3_unicode_ci NOT NULL,
  `firstname` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `address` text COLLATE utf8mb3_unicode_ci,
  `contact` varchar(20) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `age` int NOT NULL,
  `gender` enum('Male','Female') COLLATE utf8mb3_unicode_ci NOT NULL,
  `image` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT 'default.png',
  `role` enum('Admin','Employee') COLLATE utf8mb3_unicode_ci DEFAULT 'Employee',
  `position` enum('Professor','Cashier','Staff','Clerk','Admin','Manager','Guard') COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `status` enum('Active','Inactive','Pending') COLLATE utf8mb3_unicode_ci DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `firstname`, `lastname`, `username`, `password`, `email`, `email_verified_at`, `address`, `contact`, `age`, `gender`, `image`, `role`, `position`, `status`, `created_at`, `updated_at`, `last_login`) VALUES
(1, '123456', 'Admin', 'Master', 'admin', '$2y$10$HHVPawSz/SCO9h7T9KEs3e0fwIwr61cXv1aVhvJysndw18QL1xNI.', 'admin@gmail.com', NULL, 'Et sunt sint dolorem', '09082546789', 18, 'Male', '123456-67c99acbd9f20.png', 'Admin', 'Admin', 'Active', '2025-01-30 18:54:31', '2025-03-07 10:41:12', '2025-03-07 18:41:12'),
(2, 'EMP-001', 'Genevieve', 'Oneill', 'cashier01', '$2y$10$EYJl305XbK7KXSNq7oNsH.0AbiHx5Fz2FX7mfkh5UZhdbHciKKf32', 'dajoteze@mailinator.com', NULL, 'Voluptatem Molestia', '09082546789', 20, 'Female', 'EMP-001-67c9934e16b1c.png', 'Employee', 'Clerk', 'Inactive', '2025-01-30 18:56:54', '2025-03-06 12:21:34', '2025-03-06 20:20:28'),
(16, '118113', 'Timothy', 'Gilmore', 'cyxynatok', '$2y$10$Hz57f8Q4ybTKF.aB6MNg4.bWlwdT0c1MWMwE.YDlzE6ePc93oxtcm', 'hadyn@mailinator.com', NULL, 'Quia qui neque lorem', '09082546789', 30, 'Male', 'default.png', 'Employee', 'Cashier', 'Pending', '2025-03-06 03:52:23', '2025-03-06 08:35:50', NULL),
(17, '111908', 'Candace', 'Wolf', 'canabax', '$2y$10$ORNbdNb4tGnJ51gVZqGzc.o25Wo7IC5PXWVNxeJ03vpxSnj0Opa4q', 'mevucynuxi@mailinator.com', NULL, 'Omnis aliqua Est o', '09082546789', 45, 'Male', 'default.png', 'Employee', 'Professor', 'Active', '2025-03-06 03:53:00', '2025-03-06 02:18:37', '2025-03-06 17:18:37'),
(18, 'EMP3940', 'Daria', 'Bailey', 'hifovexaq', '$2y$10$pZLrQXXIp8pomcRksMdeY.TegPxo8wbr4zG9ey1wyALneo5dzgWV2', 'nitane@mailinator.com', NULL, 'Corporis maxime prae', '02002202484', 42, 'Male', 'default.png', 'Employee', 'Cashier', 'Active', '2025-03-06 09:28:27', '2025-03-06 09:28:44', NULL),
(19, 'EMP3711', 'Serena', 'Anthony', 'rudejotac', '$2y$10$H0Dx2tjYKuhUlNsgzhnvY.fr4gBFKb6SS7PiqnkPT2IQZcL712Dm.', 'pubasimimu@mailinator.com', NULL, 'Quia sit esse sit', '02002202484', 31, 'Male', 'default.png', 'Employee', 'Professor', 'Active', '2025-03-06 09:32:27', '2025-03-06 02:40:53', '2025-03-06 17:37:41'),
(20, 'EMP-7017', 'Reuben', 'Cooke', 'jidir', '$2y$10$lMdF/0CoyDEPIH1mdeWgUOtcBzwA5HQY4xRMD2W8G.wthc5Nm1NJu', 'dekawegixe@mailinator.com', NULL, 'Anim quos minim volu', '091234123412', 27, 'Male', 'default.png', 'Employee', 'Cashier', 'Pending', '2025-03-06 09:50:51', '2025-03-06 02:51:12', '2025-03-06 17:51:12'),
(21, 'EMP-9859', 'Unity', 'Cox', 'pyges', '$2y$10$HGj1H1HQzQts0I.f4t8y8eKUs..n.rJ6pPFseDIGQAunDvCcNRzNy', 'ravog@mailinator.com', NULL, 'Ullamco earum maiore', '02002202484', 93, 'Male', 'default.png', 'Employee', 'Professor', 'Pending', '2025-03-06 09:51:42', '2025-03-06 02:51:58', '2025-03-06 17:51:58'),
(22, 'EMP-3666', 'Jose', 'Marichan', 'emp1josemarichan', '$2y$10$wGba75MuaUFLsGctD/T57OhCYAKRJULZbsYrM81QDI2JZBMk.s7WG', 'josemarichan01@gmail.com', NULL, 'Quezon City', '09451920493', 32, 'Male', 'default.png', 'Employee', 'Staff', 'Pending', '2025-03-06 10:36:33', '2025-03-06 03:42:03', '2025-03-06 18:42:02'),
(23, 'EMP-8573', 'Jan', 'Meralco', 'emp2janmeralco', '$2y$10$kynKYkZrk9JPdIke6fhQS.XGA4ctuUvga9VAjQlKOZ7Pyl4Tmj3ZG', 'janmeralco02@gmail.com', NULL, 'Quezon City', '096776767674', 48, 'Male', 'default.png', 'Employee', 'Staff', 'Pending', '2025-03-06 10:46:15', '2025-03-06 05:54:00', '2025-03-06 20:54:00'),
(24, 'EMP-5425', 'Michelle ', 'Santido', 'emp3michellesantido', '$2y$10$rHgaqATshAJW8V.uNdI/DeH9N./EStlxS1M1vGxk02JaOqCLhPTSW', 'michellesantido03@gmail.com', NULL, 'Quezon City', '096776767674', 31, 'Female', 'default.png', 'Employee', 'Staff', 'Pending', '2025-03-06 10:47:22', '2025-03-06 03:54:04', '2025-03-06 18:54:03'),
(25, 'EMP-4276', 'Kayzee', 'Khane', 'emp4kayzeekhane', '$2y$10$xTb2PNv9N.GMIdzTo1WGZuxdk/6v1AZQLgY8p/aRlNeLhvX9vN4X2', 'kayzeekhane04@gmail.com', NULL, 'Quezon City', '096776767674', 28, 'Male', 'default.png', 'Employee', 'Professor', 'Active', '2025-03-06 10:48:41', '2025-03-06 03:53:05', '2025-03-06 18:52:46'),
(26, 'EMP-9601', 'Angel', 'Santino', 'emp06angelsantino', '$2y$10$td7rmWTVTuA6Gl1VkENnO.Ykip.rSlZN9NaMHTJB/vYMD7KNrFaaK', 'angelsantino06@gmail.com', NULL, 'Quezon City', '096776767674', 27, 'Female', 'default.png', 'Employee', 'Staff', 'Active', '2025-03-06 10:50:33', '2025-03-06 12:12:57', '2025-03-06 18:51:53'),
(27, 'EMP-8291', 'Jose ', 'Marichan', 'josemari', '$2y$10$xrJDpDv.xAETnu4ovyvCbONeUAJ.dHJ4d74QAqQCowGYN031bmyxe', 'josem@gmail.com', NULL, '52 Batasan Hills ST', '093242342423', 32, 'Male', 'default.png', 'Employee', 'Staff', 'Pending', '2025-03-06 12:53:50', '2025-03-06 12:53:50', NULL),
(28, 'EMP-7155', 'Jan', 'Meralco', 'Janmeral', '$2y$10$WqhY0zMthFwwP5wbBqKd5ezlR6LB/PVdot5a88X39TkY.W9/lL2r2', 'janm@gmail.com', NULL, '52 bagong silang ST', '0923256211231', 48, 'Male', 'default.png', 'Employee', 'Staff', 'Pending', '2025-03-06 12:55:34', '2025-03-06 12:55:34', NULL),
(29, 'EMP-9773', 'Henrick', 'Marco', 'emp5henrickmarco', '$2y$10$7wLj/x/zWkFcKye.VhNaFO9LKsVq39yHIvZCHu5nqdMIUk6CmUgGy', 'henrickmarco05@gmail.com', NULL, 'QUEZON CITY', '09451920493', 43, 'Male', 'default.png', 'Employee', 'Guard', 'Pending', '2025-03-06 12:56:14', '2025-03-06 05:58:27', '2025-03-06 20:57:05');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
