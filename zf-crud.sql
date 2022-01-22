-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 22, 2022 at 06:23 PM
-- Server version: 8.0.27-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zf-crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id` int NOT NULL,
  `artist` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `carbrand`
--

CREATE TABLE `carbrand` (
  `brandid` int NOT NULL,
  `brandname` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `carbrand`
--

INSERT INTO `carbrand` (`brandid`, `brandname`) VALUES
(1, 'Maruti suzki'),
(2, 'BMW'),
(3, 'Hundayee'),
(4, 'MG Moter');

-- --------------------------------------------------------

--
-- Table structure for table `cardetails`
--

CREATE TABLE `cardetails` (
  `id` int NOT NULL,
  `brandid` int DEFAULT NULL,
  `areamilage` varchar(200) NOT NULL,
  `engine` varchar(200) NOT NULL,
  `fueltype` varchar(200) NOT NULL,
  `settingcapicity` varchar(200) NOT NULL,
  `bodytype` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cardetails`
--

INSERT INTO `cardetails` (`id`, `brandid`, `areamilage`, `engine`, `fueltype`, `settingcapicity`, `bodytype`) VALUES
(4, 1, '3', 'asdasdasd', 'asdasd', '5', 'asdasdasd'),
(6, 2, '45', 'asdasdasd', 'asdasd', 'asdasda', 'asdasdasd'),
(7, 1, '1', 'adasdasd', 'asdasdasd', 'asdasd', 'asdasda'),
(9, 1, '1', 'sdfsdfsdf', 'sfsf', 'sfsfs', 'fsfs'),
(12, 1, '54', 'ddd', 'ssss', 'ddd', 'dddd'),
(18, 1, '45', 'pppp', 'pppp', 'ppp', 'ppp'),
(19, 1, '11', 'pppp', 'pppp', 'ppp', 'ppp'),
(20, 1, '10', 'pppp', 'pppp', 'ppp', 'ppp');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carbrand`
--
ALTER TABLE `carbrand`
  ADD PRIMARY KEY (`brandid`);

--
-- Indexes for table `cardetails`
--
ALTER TABLE `cardetails`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `carbrand`
--
ALTER TABLE `carbrand`
  MODIFY `brandid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cardetails`
--
ALTER TABLE `cardetails`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
