-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2021 at 10:13 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arm_controller`
--

-- --------------------------------------------------------

--
-- Table structure for table `basedirection`
--

CREATE TABLE `basedirection` (
  `direction` varchar(10) NOT NULL,
  `id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `basedirection`
--

INSERT INTO `basedirection` (`direction`, `id`) VALUES
('backward', 1);

-- --------------------------------------------------------

--
-- Table structure for table `controller`
--

CREATE TABLE `controller` (
  `ID` int(8) NOT NULL,
  `Name` varchar(64) NOT NULL,
  `Value` int(255) NOT NULL,
  `TimeStamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `controller`
--

INSERT INTO `controller` (`ID`, `Name`, `Value`, `TimeStamp`) VALUES
(0, 'Status', 1, '2021-06-27 04:57:06'),
(1, 'Maotor1', 10, '2021-06-21 03:57:17'),
(2, 'Maotor2', 0, '2021-06-20 07:22:23'),
(3, 'Maotor3', 0, '2021-06-20 07:22:29'),
(4, 'Maotor4', 0, '2021-06-20 07:22:34'),
(5, 'Maotor5', 0, '2021-06-20 07:22:38'),
(6, 'Maotor6', 0, '2021-06-20 07:22:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `controller`
--
ALTER TABLE `controller`
  ADD PRIMARY KEY (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
