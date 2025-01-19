-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2024 at 07:54 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fitness_center`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `class_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `classname` varchar(100) NOT NULL,
  `approved` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `name`, `email`, `phone`, `class_date`, `created_at`, `classname`, `approved`) VALUES
(1, 'danusha Pasan', 'danushapasan@gmail.com', '772003317', '2024-10-29', '2024-11-15 18:07:46', '', 1),
(2, 'danusha Pasan', 'danushapasan@gmail.com', '772003317', '2024-11-14', '2024-11-15 18:21:33', 'BODY PUMP', 1),
(3, 'danusha Pasan', 'danushapasan@gmail.com', '772003317', '2024-11-30', '2024-11-15 18:44:09', 'KICKBOXING', 1),
(4, 'danusha Pasan', 'danushapasan@gmail.com', '772003317', '2024-11-07', '2024-11-15 18:45:57', 'BODY PUMP', 1),
(5, 'danusha Pasan', 'danushapasan@gmail.com', '772003317', '2024-11-29', '2024-11-15 18:46:30', 'KICKBOXING', 1),
(6, 'danusha Pasan', 'danushapasan@gmail.com', '772003317', '2024-11-14', '2024-11-15 19:33:44', 'BODY PUMP', 0),
(7, 'danusha Pasan', 'danushapasan@gmail.com', '772003317', '2024-11-21', '2024-11-15 20:28:04', 'BODY PUMP', 0);

-- --------------------------------------------------------

--
-- Table structure for table `class_schedule`
--

CREATE TABLE `class_schedule` (
  `id` int(11) NOT NULL,
  `day` varchar(10) NOT NULL,
  `time_slot` varchar(20) NOT NULL,
  `class_name` varchar(50) NOT NULL,
  `instructor` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_schedule`
--

INSERT INTO `class_schedule` (`id`, `day`, `time_slot`, `class_name`, `instructor`) VALUES
(4, 'Monday', '6.00am -10.00am', 'Hirun', ''),
(5, 'Monday', '6.00am -10.00am', 'danusha', ''),
(6, 'Tuesday', '6.00am -10.00am', 'danusha', ''),
(7, 'Monday', '6.00am -10.00am', 'cardio', 'danusha'),
(8, 'Friday', '6.00am -10.00am', 'bodypump', 'danusha'),
(9, 'Monday', '6.00am -10.00am', 'muscel', 'kavindu'),
(10, 'Monday', '6.00am -10.00am', 'bodypump', 'kavindu');

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `city` varchar(100) NOT NULL,
  `membership_package` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`id`, `username`, `email`, `gender`, `city`, `membership_package`, `created_at`) VALUES
(1, 'Danusha', 'danushapasan@gmail.com', 'Male', 'yakkala', 'ghfgh', '2024-11-15 20:03:45'),
(2, 'Danusha', 'danushapasan@gmail.com', 'Male', 'yakkala', 'Premium', '2024-11-15 20:10:10'),
(3, '', 'danushapasan@gmail.com', 'Male', 'Gampaha', 'Silver', '2024-11-15 20:20:18'),
(4, 'danusha Pasan', 'danushapasan@gmail.com', 'Male', 'Gampaha', 'Silver', '2024-11-15 20:20:40'),
(5, 'hfgfghdfgdfg', 'danushapasan@gmail.com', 'Male', 'Gampaha', 'Silver', '2024-11-15 20:21:09'),
(6, 'danusha Pasan', 'danushapasan@gmail.com', 'Male', 'Gampaha', 'Silver', '2024-11-15 20:27:31');

-- --------------------------------------------------------

--
-- Table structure for table `queries`
--

CREATE TABLE `queries` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `queries`
--

INSERT INTO `queries` (`id`, `name`, `email`, `subject`, `message`, `submitted_at`) VALUES
(1, 'danusha Pasan', 'danushapasan@gmail.com', 'dfg', 'dfgfb xfcgbfg', '2024-10-30 11:33:08'),
(2, 'danusha Pasan', 'danushapasfan@gmail.com', 'adsdfsfzadsf', 'sadfaSFaSWFDawsfrawsfaswf', '2024-11-05 10:42:32'),
(3, 'danusha Pasan', 'danushapafgsfan@gmail.com', 'adsdfsfzadsf', 'sadfaSFaSWFDawsfrawsfaswf', '2024-11-05 10:44:13');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `fristname` varchar(50) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `nic` varchar(10) NOT NULL,
  `age` int(2) NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `fristname`, `lastname`, `nic`, `age`, `gender`, `email`, `password`) VALUES
(27, 'Kaveesha', 'Gunasekara', '2003568444', 25, 'Male', 'kaveeshagunasekara@gmail.com', '$2y$10$igZMUETHsa9Hsp/xOotOou6ulYHb5Yh6uwHnnBTMMHOythwejTIoC'),
(28, 'Buddisha', 'Pasindu', '1998400225', 30, 'Male', 'buddisha@gmail.com', '$2y$10$asXeznN94k8YpgCcEHBBJerck/cxmE/SfTxfYQARDdY9DHPs3xL2a'),
(30, '', 'Pasan', '5145143213', 50, 'Male', 'danjhjhjushapasan@gmail.com', '$2y$10$KJUgO7vC1e6CfG4UPyQY3uvt9rCRVRTnw81SkPA8S95hr4JNycefi'),
(31, '', 'gdfgdfg', '6145616515', 20, 'Male', 'dxdfgdsfganusfgxdfghapasan@gmail.com', '$2y$10$I2TpZIAQvz5ufP5n76QrbOWq4h946oAaVVisC9BcAGgUHr.Pzu0ce'),
(32, '', 'zsdfasf', 'sdfzdfxzdf', 20, 'Male', 'zsdfsdfdaddsanushapasan@gmail.com', '$2y$10$KXF3Fnr1sYkRw4A6xuH2L.yPS594qKuDo/iZ4q8DhLVFg67s9XyNW'),
(33, '', 'sdfgdfxsg', '6545454', 20, 'Male', 'asfsdfsdfdanushapasan@gmail.com', '$2y$10$.pvhdmLtgb409ckPFYwhl.cwhsN9YrCdv7ODitLZ3QevKz8rLLc8S'),
(34, 'danushaaaaa', 'Pasan', '5145143213', 50, 'Male', 'danushapasan@gmail.com', '$2y$10$6E2T/qWTmXOcYOxvILq76eImcrSiJaEyHCADeEcFNcqjzFLFUXGFG'),
(35, 'danusha', 'Pasan', '5145143213', 50, 'Male', 'danushapasan@gmail.com', '$2y$10$6ABtU0N2B11pNeD5.AjmaetZbPiDwfQgok01i5/1fTdffw8hCdsR2'),
(36, 'danusha', 'Pasan', '5145143213', 50, 'Male', 'danushapasan@gmail.com', '$2y$10$od1nm3zF7lMr8LA8rZaYYuQI6xBnu3YYhyqLPq/EkU0q4ZAfznjbC'),
(37, 'danusha', 'Pasan', '5145143213', 50, 'Male', 'danushapasan@gmail.com', '$2y$10$SwDRMMK498ua39HbFRqEH.PVz.a0CpnEsAcRJgHMUB5Zr6FGqOJdC'),
(38, 'danusha', 'Pasan', '5145143213', 50, 'Male', 'danushapasan@gmail.com', '$2y$10$mAUjXdrww7bgKQ/0ktJbReF9isz18CzgvkWVE7xFbr/IzVoWslblO');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `city` varchar(50) DEFAULT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `city`, `gender`, `password`, `created_at`) VALUES
(3, 'Danusha', 'danushapasan@gmail.com', 'yakkala', 'male', '$2y$10$5/frc/mn2uc184IkwdOCl.W3SEP8XsVKP4JeY.mS96PLSE4PNMgWe', '2024-10-30 09:34:41'),
(4, 'Danushapasan', 'danushapasaan@gmail.com', 'yakkala', 'female', '$2y$10$sHl1a3ajoI9yVhzgaS2U/uJcWA3u50bir82E18siLXAoMaGnHKj4q', '2024-10-30 09:54:14'),
(5, 'Danllusha', 'danusllhapasan@gmail.com', 'yakkala', 'male', '$2y$10$5r3J0w94OA8pB7SBycgNE.zDnUlbF5RXCWg5CqIRy47N4lnNPOH9q', '2024-10-30 10:24:05'),
(9, 'zdsfzsdzs', 'danushapankmsan@gmail.com', 'yakkala', 'other', '$2y$10$6dMCFUcUSpxdwHSvpvt51.Xr5h9Tc4wRhqTxTPcUHO1cM4gaTJKvS', '2024-11-02 16:37:50'),
(10, 'fg', 'fgfg@gmail.com', 'dfdf', 'male', '$2y$10$DEUL3UCoQ14hc3BfUkyOFexEVopX.F.NE7Z7NvNIiSH4y/2xmJDU.', '2024-11-02 16:38:58'),
(12, 'Danusha', 'danushapahhsan@gmail.com', 'yakkala', 'male', '$2y$10$ZJEXwCnvdTLqUM39n2kaBetau.YJAiIF2iUiCwCtsSloXfL34sN5G', '2024-11-13 16:33:21'),
(13, 'Danusha', 'danushghghapasan@gmail.com', 'jk', 'female', '$2y$10$IWdrzVgI1u6EHrKBwhN3d.reheY1YU4JUnalweIyfBNQ.zRl2Wxyq', '2024-11-15 17:47:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_schedule`
--
ALTER TABLE `class_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `queries`
--
ALTER TABLE `queries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `class_schedule`
--
ALTER TABLE `class_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `queries`
--
ALTER TABLE `queries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
