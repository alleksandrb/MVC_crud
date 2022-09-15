-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 14, 2022 at 09:38 PM
-- Server version: 5.7.34
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `keep`
--

-- --------------------------------------------------------

--
-- Table structure for table `call_cost`
--

CREATE TABLE `call_cost` (
  `id` int(11) NOT NULL,
  `sender_operator` int(11) NOT NULL,
  `recipient_operator` int(11) NOT NULL,
  `cost` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `call_cost`
--

INSERT INTO `call_cost` (`id`, `sender_operator`, `recipient_operator`, `cost`) VALUES
(1, 1, 2, 27),
(2, 2, 1, 30),
(3, 2, 3, 35),
(4, 3, 2, 25),
(5, 3, 1, 15),
(6, 1, 3, 20),
(9, 1, 1, 3),
(11, 2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `call_log`
--

CREATE TABLE `call_log` (
  `id` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `recipient` int(11) NOT NULL,
  `start_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `call_duration` bigint(20) NOT NULL,
  `cost` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `call_log`
--

INSERT INTO `call_log` (`id`, `sender`, `recipient`, `start_time`, `end_time`, `call_duration`, `cost`) VALUES
(1, 3, 2, '2022-12-12 10:30:30', '2022-12-12 10:35:30', 300, 125),
(7, 3, 1, '2022-12-25 11:34:54', '2022-12-25 11:43:14', 500, 90),
(8, 3, 1, '2022-12-27 09:20:20', '2022-12-27 09:28:40', 500, 135),
(11, 18, 2, '2022-12-24 11:40:54', '2022-12-24 11:48:06', 432, 16),
(12, 2, 3, '2022-12-27 09:33:21', '2022-12-27 09:50:01', 1000, 595),
(13, 3, 18, '2022-12-27 09:45:23', '2022-12-27 09:52:03', 400, 175);

-- --------------------------------------------------------

--
-- Table structure for table `operator`
--

CREATE TABLE `operator` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `operator`
--

INSERT INTO `operator` (`id`, `name`) VALUES
(1, 'Mts'),
(2, 'Megafon'),
(3, 'Beeline');

-- --------------------------------------------------------

--
-- Table structure for table `telephone`
--

CREATE TABLE `telephone` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `phone_number` bigint(20) NOT NULL,
  `operator_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `telephone`
--

INSERT INTO `telephone` (`id`, `user_id`, `phone_number`, `operator_id`) VALUES
(1, 1, 79892378888, 1),
(2, 2, 79888987654, 2),
(3, 3, 79274547324, 3),
(13, 17, 79271234653, 1),
(14, 18, 73234789734, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `surname` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `surname`) VALUES
(1, 'alex', 'bash'),
(2, 'oleg', 'koro'),
(3, 'julia', 'bash'),
(17, 'valera', 'frien'),
(18, 'jacob', 'monah');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `call_cost`
--
ALTER TABLE `call_cost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `call_log`
--
ALTER TABLE `call_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `telephone`
--
ALTER TABLE `telephone`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone_number` (`phone_number`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `call_cost`
--
ALTER TABLE `call_cost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `call_log`
--
ALTER TABLE `call_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `operator`
--
ALTER TABLE `operator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `telephone`
--
ALTER TABLE `telephone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
