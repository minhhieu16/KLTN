-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2020 at 02:07 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `timesheet`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_timesheet`
--

CREATE TABLE `detail_timesheet` (
  `id_detail` int(11) NOT NULL,
  `id_timesheet` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `id_task` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_mon` date NOT NULL,
  `time_mon` float NOT NULL DEFAULT '0',
  `date_tue` date NOT NULL,
  `time_tue` float NOT NULL DEFAULT '0',
  `date_wed` date NOT NULL,
  `time_wed` float NOT NULL DEFAULT '0',
  `date_thu` date NOT NULL,
  `time_thu` float DEFAULT '0',
  `date_fri` date NOT NULL,
  `time_fri` float NOT NULL DEFAULT '0',
  `date_sat` date NOT NULL,
  `time_sat` float NOT NULL DEFAULT '0',
  `date_sun` date NOT NULL,
  `time_sun` float NOT NULL DEFAULT '0',
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `detail_timesheet`
--

INSERT INTO `detail_timesheet` (`id_detail`, `id_timesheet`, `id_project`, `id_task`, `id_user`, `date_mon`, `time_mon`, `date_tue`, `time_tue`, `date_wed`, `time_wed`, `date_thu`, `time_thu`, `date_fri`, `time_fri`, `date_sat`, `time_sat`, `date_sun`, `time_sun`, `is_active`) VALUES
(1, 1, 1, 1, 1, '2020-04-06', 0, '2020-04-07', 0, '2020-04-08', 0, '2020-04-09', 0, '2020-04-10', 0, '2020-04-11', 0, '2020-04-12', 0, 1),
(2, 1, 1, 3, 1, '2020-04-06', 0, '2020-04-07', 0, '2020-04-08', 0, '2020-04-09', 0, '2020-04-10', 0, '2020-04-11', 0, '2020-04-12', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id_project` int(11) NOT NULL,
  `name_project` text COLLATE utf8_unicode_ci NOT NULL,
  `id_user_project` int(11) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id_project`, `name_project`, `id_user_project`, `is_active`) VALUES
(1, 'RoR Internship Training Program', 2, 1),
(2, 'BESTARION Website', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id_task` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `name_task` text COLLATE utf8_unicode_ci NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id_task`, `id_project`, `name_task`, `is_active`) VALUES
(1, 1, 'Beyond the Rails basics', 1),
(2, 1, 'Case study 1: build an full Rails web application', 1),
(3, 1, 'Build an Rails web application to resolve a real problem', 1),
(4, 1, 'Internship Program Feb_2020', 1),
(5, 1, 'Perform training & supporting & coaching', 1),
(6, 1, 'Review & evaluation', 1),
(7, 1, 'Teem Meeting', 1),
(8, 1, 'Theory test', 1),
(9, 2, 'Application fields', 1),
(10, 2, 'Blog', 1),
(11, 2, 'Client testimonials', 1),
(12, 2, 'Contact Us - After submitting email, it refreshes the page without any message', 1),
(13, 2, 'Our Team', 1),
(14, 2, 'Success stories', 1),
(15, 2, 'Taọ một trang Thank you page sau khi submit thông tin ở phần Contact us ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `timesheet`
--

CREATE TABLE `timesheet` (
  `id_timesheet` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `approved_by` int(11) DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `rejected_by` int(11) DEFAULT NULL,
  `total_time` int(11) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `timesheet`
--

INSERT INTO `timesheet` (`id_timesheet`, `id_user`, `start_date`, `end_date`, `approved_by`, `date_modified`, `note`, `rejected_by`, `total_time`, `is_active`) VALUES
(1, 1, '2020-04-06', '2020-04-12', NULL, NULL, NULL, NULL, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `failed_login` int(3) DEFAULT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `first_name`, `last_name`, `role`, `last_login`, `failed_login`, `is_active`) VALUES
(1, 'duynt@bestarion.com', '123456', 'Thanh Duy', 'Nguyen', '0', NULL, NULL, 1),
(2, 'hieuam@bestarion.com', '123456', 'Hieu', 'AM', '1', NULL, NULL, 1),
(3, 'admin@bestarion.com', '123456', 'Admin', NULL, '2', NULL, NULL, 1),
(4, 'user1@bestarion.com', '123456', 'User 1', NULL, '0', NULL, NULL, 1),
(5, 'user2@bestarion.com', '123456', 'User 2', NULL, '0', NULL, NULL, 1),
(6, 'mana1@bestarion.com', '123456', 'Manager 1', NULL, '1', NULL, NULL, 1),
(7, 'mana2@bestarion.com', '123456', 'Manager 2', NULL, '1', NULL, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_timesheet`
--
ALTER TABLE `detail_timesheet`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_task` (`id_task`),
  ADD KEY `id_project` (`id_project`),
  ADD KEY `id_timesheet` (`id_timesheet`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id_project`),
  ADD KEY `id_user_project` (`id_user_project`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id_task`),
  ADD KEY `id_project` (`id_project`);

--
-- Indexes for table `timesheet`
--
ALTER TABLE `timesheet`
  ADD PRIMARY KEY (`id_timesheet`),
  ADD KEY `approved_by` (`approved_by`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `rejected_by` (`rejected_by`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_timesheet`
--
ALTER TABLE `detail_timesheet`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id_project` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id_task` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `timesheet`
--
ALTER TABLE `timesheet`
  MODIFY `id_timesheet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_timesheet`
--
ALTER TABLE `detail_timesheet`
  ADD CONSTRAINT `detail_timesheet_ibfk_1` FOREIGN KEY (`id_timesheet`) REFERENCES `timesheet` (`id_timesheet`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_timesheet_ibfk_2` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_timesheet_ibfk_3` FOREIGN KEY (`id_task`) REFERENCES `task` (`id_task`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_timesheet_ibfk_4` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`id_user_project`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `timesheet`
--
ALTER TABLE `timesheet`
  ADD CONSTRAINT `timesheet_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `timesheet_ibfk_2` FOREIGN KEY (`approved_by`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `timesheet_ibfk_3` FOREIGN KEY (`rejected_by`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
