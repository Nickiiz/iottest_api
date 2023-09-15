-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2023 at 10:51 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iottest_db`
--
CREATE DATABASE IF NOT EXISTS `iottest_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `iottest_db`;

-- --------------------------------------------------------

--
-- Table structure for table `room1_tb`
--

CREATE TABLE `room1_tb` (
  `id` int(11) NOT NULL,
  `airValue1` float NOT NULL,
  `airValue2` float NOT NULL,
  `airValue3` float NOT NULL,
  `roomDate` date NOT NULL,
  `roomTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room1_tb`
--

INSERT INTO `room1_tb` (`id`, `airValue1`, `airValue2`, `airValue3`, `roomDate`, `roomTime`) VALUES
(8, 22.25, 21.26, 22.32, '2003-06-01', '12:30:25'),
(9, 23.25, 25.26, 21.32, '2003-06-02', '11:30:25'),
(10, 24.25, 24.26, 23.32, '2003-06-03', '10:30:25');

-- --------------------------------------------------------

--
-- Table structure for table `room2_tb`
--

CREATE TABLE `room2_tb` (
  `id` int(11) NOT NULL,
  `airValue1` float NOT NULL,
  `airValue2` float NOT NULL,
  `airValue3` float NOT NULL,
  `roomDate` date NOT NULL,
  `roomTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room2_tb`
--

INSERT INTO `room2_tb` (`id`, `airValue1`, `airValue2`, `airValue3`, `roomDate`, `roomTime`) VALUES
(1, 22.25, 21.26, 21.32, '2003-06-04', '12:30:25'),
(2, 27.25, 25.26, 24.32, '2003-06-05', '11:30:25'),
(3, 22.25, 24.26, 23.32, '2003-06-06', '10:30:25');

-- --------------------------------------------------------

--
-- Table structure for table `room3_tb`
--

CREATE TABLE `room3_tb` (
  `id` int(11) NOT NULL,
  `airValue1` float NOT NULL,
  `airValue2` float NOT NULL,
  `airValue3` float NOT NULL,
  `roomDate` date NOT NULL,
  `roomTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room3_tb`
--

INSERT INTO `room3_tb` (`id`, `airValue1`, `airValue2`, `airValue3`, `roomDate`, `roomTime`) VALUES
(1, 22.25, 21.26, 22.32, '2003-06-07', '12:30:25'),
(2, 23.25, 25.26, 21.32, '2003-06-08', '11:30:25'),
(3, 24.25, 24.26, 23.32, '2003-06-09', '10:30:25');

-- --------------------------------------------------------

--
-- Table structure for table `user_tb`
--

CREATE TABLE `user_tb` (
  `userId` int(11) NOT NULL,
  `userFullname` varchar(50) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `userPassword` varchar(50) NOT NULL,
  `userStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_tb`
--

INSERT INTO `user_tb` (`userId`, `userFullname`, `userName`, `userPassword`, `userStatus`) VALUES
(1, 'สมบัติ ใจดี', 'sombat', '111111', 1),
(2, 'สมใจ มากมิตร', 'somjai', '222222', 1),
(3, 'สมหมาย รวยจัง', 'sommai', '333333', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `room1_tb`
--
ALTER TABLE `room1_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room2_tb`
--
ALTER TABLE `room2_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room3_tb`
--
ALTER TABLE `room3_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_tb`
--
ALTER TABLE `user_tb`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `room1_tb`
--
ALTER TABLE `room1_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `room2_tb`
--
ALTER TABLE `room2_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `room3_tb`
--
ALTER TABLE `room3_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_tb`
--
ALTER TABLE `user_tb`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
