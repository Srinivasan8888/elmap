-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 27, 2023 at 08:52 AM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elmap`
--

-- --------------------------------------------------------

--
-- Table structure for table `flowmeter`
--

CREATE TABLE `flowmeter` (
  `s.no` int(11) NOT NULL,
  `id` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL,
  `lat` varchar(22) NOT NULL,
  `long` varchar(22) NOT NULL,
  `timestamp` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `s.no` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`s.no`, `email`, `pass`) VALUES
(1, 'srinivasan@xyma.in', 'I7Y+5S3Y17P3xydko3M+Ow==');

-- --------------------------------------------------------

--
-- Table structure for table `loginact`
--

CREATE TABLE `loginact` (
  `s.no` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `datetime` datetime NOT NULL,
  `mac` varchar(20) NOT NULL,
  `identity` varchar(100) NOT NULL,
  `hashkey` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `flowmeter`
--
ALTER TABLE `flowmeter`
  ADD PRIMARY KEY (`s.no`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`s.no`,`email`);

--
-- Indexes for table `loginact`
--
ALTER TABLE `loginact`
  ADD PRIMARY KEY (`s.no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `flowmeter`
--
ALTER TABLE `flowmeter`
  MODIFY `s.no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `s.no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `loginact`
--
ALTER TABLE `loginact`
  MODIFY `s.no` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
