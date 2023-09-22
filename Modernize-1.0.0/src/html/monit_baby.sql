-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2023 at 09:34 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monit_baby`
--

-- --------------------------------------------------------

--
-- Table structure for table `babies`
--

CREATE TABLE `babies` (
  `id` int(11) NOT NULL,
  `baby_name` varchar(255) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `birth_date` date NOT NULL,
  `mother_name` varchar(255) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `mother_id` int(11) DEFAULT NULL,
  `father_id` int(11) DEFAULT NULL,
  `health_institution` varchar(255) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `sector` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `babies`
--

INSERT INTO `babies` (`id`, `baby_name`, `gender`, `birth_date`, `mother_name`, `father_name`, `mother_id`, `father_id`, `health_institution`, `district`, `sector`) VALUES
(14, 'x', 'male', '2023-08-23', 'tatastacy', 'harrun', 178971231, 2147483647, 'kabgayi', 'muhanga', 'nyamabuye'),
(15, 'jjess', 'female', '2023-08-26', 'jessica', 'joshua', 2147483647, 2147483647, 'mbc - hospital', 'muhanga', 'nyamabuye'),
(16, 'june ', 'female', '2023-08-26', 'April', 'john', 2147483647, 2147483647, 'mbc', 'nyarygenge', 'nyamirambo');

-- --------------------------------------------------------

--
-- Table structure for table `durations`
--

CREATE TABLE `durations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `durations`
--

INSERT INTO `durations` (`id`, `name`) VALUES
(1, '1-10 days'),
(2, '1-6 weeks'),
(3, '1-10 weeks'),
(4, '1-14 weeks'),
(5, '1-9 months'),
(6, '1-12 years');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `permission_id` int(11) NOT NULL,
  `permission_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`permission_id`, `permission_name`) VALUES
(1, 'access_overview'),
(2, 'update_vaccine'),
(3, 'insert_baby');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'admin'),
(2, 'doc'),
(3, 'nurse');

-- --------------------------------------------------------

--
-- Table structure for table `role_permission_mapping`
--

CREATE TABLE `role_permission_mapping` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role_permission_mapping`
--

INSERT INTO `role_permission_mapping` (`role_id`, `permission_id`) VALUES
(2, 1),
(2, 2),
(3, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `role`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin123', 'admin'),
(5, 'doc', 'doc@gmail.com', 'doc123', 'doc'),
(6, 'nurse', 'nurse@gmail.com', 'kigali', 'nurse'),
(15, 'yo', 'zawahwi@gmail.com', 'kigali10', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `vaccines_new`
--

CREATE TABLE `vaccines_new` (
  `id` int(11) NOT NULL,
  `vaccine_name` varchar(255) DEFAULT NULL,
  `date_administered` date DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `nurse_name` varchar(255) DEFAULT NULL,
  `health_institution` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `baby_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vaccines_new`
--

INSERT INTO `vaccines_new` (`id`, `vaccine_name`, `date_administered`, `duration`, `nurse_name`, `health_institution`, `description`, `baby_name`) VALUES
(43, 'BCG', '2023-08-29', '1-10 days', 'becky', 'kabgayi', 'one', 'jjess'),
(44, 'OPV', '2023-08-29', '1-6 weeks', 'becky', 'faisal hospital', 'two', 'jjess'),
(45, 'BCG', '2023-08-29', '1-10 days', 'jjjjioe', 'faisal-hospital', 'one', 'june '),
(47, 'BCG', '2023-08-29', '1-10 days', 'jenifer', 'faisal-hospital', '1', 'x'),
(48, 'OPV', '2023-08-29', '1-6 weeks', 'becky', 'faisal hospital', '2', 'x'),
(49, 'D3 OPV', '2023-08-29', '1-10 weeks', 'becky', 'faisal', '3', 'x'),
(50, 'D4 OPV', '2023-08-29', '1-14 weeks', 'jjjjioe', 'kabgayi', '4', 'x'),
(51, 'M & R', '2023-08-29', '1-9 months', 'becky', 'faisal-hospital', '5', 'x'),
(52, 'HPV', '2023-08-29', '1-12 years', 'becky', 'faisal hospital', '6', 'x');

-- --------------------------------------------------------

--
-- Table structure for table `vaccine_names`
--

CREATE TABLE `vaccine_names` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vaccine_names`
--

INSERT INTO `vaccine_names` (`id`, `name`) VALUES
(1, 'BCG'),
(2, 'OPV'),
(3, 'D3 OPV'),
(4, 'D4 OPV'),
(5, 'M & R'),
(6, 'HPV');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `babies`
--
ALTER TABLE `babies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `durations`
--
ALTER TABLE `durations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`permission_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `role_permission_mapping`
--
ALTER TABLE `role_permission_mapping`
  ADD PRIMARY KEY (`role_id`,`permission_id`),
  ADD KEY `permission_id` (`permission_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `vaccines_new`
--
ALTER TABLE `vaccines_new`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vaccine_names`
--
ALTER TABLE `vaccine_names`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `babies`
--
ALTER TABLE `babies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `durations`
--
ALTER TABLE `durations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `permission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `vaccines_new`
--
ALTER TABLE `vaccines_new`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `vaccine_names`
--
ALTER TABLE `vaccine_names`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `role_permission_mapping`
--
ALTER TABLE `role_permission_mapping`
  ADD CONSTRAINT `role_permission_mapping_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`),
  ADD CONSTRAINT `role_permission_mapping_ibfk_2` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`permission_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
