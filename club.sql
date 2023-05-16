-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 16, 2023 at 07:58 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `club`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_name`, `password`) VALUES
(1, 'admin', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `id` int(10) NOT NULL,
  `club_name` varchar(20) NOT NULL,
  `event` text NOT NULL,
  `date` varchar(20) NOT NULL,
  `file` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`id`, `club_name`, `event`, `date`, `file`) VALUES
(16, 'Robotics', '2nd event of robotics club', '2023-04-26', 'files/event1.pdf'),
(20, 'Robotics', '3rd robotics event', '2023-04-30', 'files/event3.pdf'),
(22, 'Robotics', 'new robotics club event', '2023-10-18', 'files/event2.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

CREATE TABLE `clubs` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `club_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `club_1`
--

CREATE TABLE `club_1` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `club_name` varchar(20) NOT NULL DEFAULT 'eee'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `club_1`
--

INSERT INTO `club_1` (`id`, `user_id`, `user_name`, `club_name`) VALUES
(12, 1681859112, 'redoy', 'eee'),
(13, 1683101518, 'robin', 'eee'),
(14, 1663535484, 'naim', 'eee'),
(16, 1696842688, 'sifat', 'eee');

-- --------------------------------------------------------

--
-- Table structure for table `club_2`
--

CREATE TABLE `club_2` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `club_name` varchar(20) NOT NULL DEFAULT 'app'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `club_2`
--

INSERT INTO `club_2` (`id`, `user_id`, `user_name`, `club_name`) VALUES
(11, 1663535484, 'naim', 'app'),
(12, 1683232530, 'musa', 'app'),
(13, 1681859112, 'redoy', 'app');

-- --------------------------------------------------------

--
-- Table structure for table `club_3`
--

CREATE TABLE `club_3` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `club_name` varchar(20) NOT NULL DEFAULT 'Robotics'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `club_3`
--

INSERT INTO `club_3` (`id`, `user_id`, `user_name`, `club_name`) VALUES
(7, 1663535484, 'naim', 'Robotics'),
(13, 1683232530, 'musa', 'Robotics'),
(15, 1681859112, 'redoy', 'Robotics'),
(18, 1696842688, 'sifat', 'Robotics');

-- --------------------------------------------------------

--
-- Table structure for table `group_message`
--

CREATE TABLE `group_message` (
  `group_id` int(10) NOT NULL,
  `group_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `group_message`
--

INSERT INTO `group_message` (`group_id`, `group_name`) VALUES
(101, 'eee'),
(102, 'app'),
(103, 'robotics');

-- --------------------------------------------------------

--
-- Table structure for table `join_req`
--

CREATE TABLE `join_req` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `club` varchar(20) NOT NULL,
  `code` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `join_req`
--

INSERT INTO `join_req` (`id`, `user_id`, `user_name`, `club`, `code`) VALUES
(71, 1683232530, 'musa', 'eee', 1693074526),
(75, 1683101518, 'robin', 'robotics', 1690783665);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(10) NOT NULL,
  `from_id` int(10) NOT NULL,
  `msg_time` datetime NOT NULL,
  `text` text NOT NULL,
  `group_id` int(11) NOT NULL,
  `from_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `from_id`, `msg_time`, `text`, `group_id`, `from_name`) VALUES
(1234, 1740668089, '2023-04-16 19:52:00', 'hi', 103, 'mehedi'),
(1259, 1683232530, '2017-04-23 09:41:36', 'hello', 103, 'musa'),
(1260, 1683232530, '2017-04-23 09:41:44', 'ok', 103, 'musa'),
(1261, 1682201531, '2017-04-23 09:52:42', 'hello', 103, 'redoy'),
(1262, 1682201531, '2017-04-23 09:52:45', 'hi', 103, 'redoy'),
(1263, 1681859112, '2017-04-23 09:59:48', 'hello', 103, 'redoy'),
(1264, 1681859112, '2017-04-23 09:59:54', 'hi', 103, 'redoy'),
(1265, 1683232530, '2002-05-23 12:04:03', 'hi naim', 102, 'musa'),
(1266, 1663535484, '2003-05-23 02:35:39', 'ewr', 103, 'naim'),
(1267, 1683173973, '2003-05-23 02:49:48', 'hello', 102, 'labib'),
(1268, 1683797956, '2003-05-23 03:15:17', 'hi', 101, 'ejaz'),
(1269, 1696842688, '2003-05-23 07:45:31', 'hello', 103, 'sifat');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(10) NOT NULL,
  `club_id` int(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `club1` varchar(10) NOT NULL DEFAULT 'no',
  `club2` varchar(10) NOT NULL DEFAULT 'no',
  `club3` varchar(10) NOT NULL DEFAULT 'no',
  `president` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `user_name`, `password`, `email`, `department`, `phone`, `date`, `club1`, `club2`, `club3`, `president`) VALUES
(27, 1663535484, 'naim', '4534', 'naim@gmail.com', 'cse', '6746456', '2023-05-03 08:39:08', 'yes', 'yes', 'yes', NULL),
(48, 1683232530, 'musa', '453345', 'musa@gmail.com', 'cse', '667777', '2023-05-01 18:03:23', 'no', 'yes', 'yes', 'app'),
(50, 1680651957, 'rifat', '4343', 'rifat@gmail.com', 'cse', '2341234', '2023-05-03 13:48:29', 'yes', 'yes', 'yes', NULL),
(52, 1681859112, 'redoy', '2222', 'redoy@gmail.com', 'cse', '234234', '2023-05-03 08:33:31', 'yes', 'yes', 'yes', 'eee'),
(53, 1683101518, 'robin', '6767', 'robin@gmail.com', 'eee', '343243124', '2023-05-03 07:06:40', 'yes', 'no', 'no', NULL),
(56, 9775527496, 'ejaz', '4444', 'ejaz@gmail.com', 'cse', '123123123', '2023-05-03 13:17:16', 'no', 'no', 'no', NULL),
(57, 1696842688, 'sifat', '9999', 'sifat@gmail.com', 'cse', '213123', '2023-05-03 13:48:29', 'yes', 'no', 'yes', 'robotics');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `club_name` (`club_name`),
  ADD KEY `date` (`date`);

--
-- Indexes for table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `club_name` (`club_name`);

--
-- Indexes for table `club_1`
--
ALTER TABLE `club_1`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_name` (`user_name`);

--
-- Indexes for table `club_2`
--
ALTER TABLE `club_2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_name` (`user_name`);

--
-- Indexes for table `club_3`
--
ALTER TABLE `club_3`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_name` (`user_name`);

--
-- Indexes for table `group_message`
--
ALTER TABLE `group_message`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `join_req`
--
ALTER TABLE `join_req`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `club_id` (`club_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_name` (`user_name`),
  ADD KEY `date` (`date`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `club_1`
--
ALTER TABLE `club_1`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `club_2`
--
ALTER TABLE `club_2`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `club_3`
--
ALTER TABLE `club_3`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `join_req`
--
ALTER TABLE `join_req`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1270;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
