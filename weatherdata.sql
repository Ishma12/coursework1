-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2022 at 04:49 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `weatherdetails`
--

-- --------------------------------------------------------

--
-- Table structure for table `weatherdata`
--

CREATE TABLE `weatherdata` (
  `id` int(10) NOT NULL,
  `weather` varchar(25) NOT NULL,
  `temperature` float NOT NULL,
  `wind` float NOT NULL,
  `datetimes` datetime NOT NULL,
  `speed` float NOT NULL,
  `humidity` int(20) NOT NULL,
  `weather_city` varchar(20) NOT NULL,
  `pressure` int(20) NOT NULL,
  `icon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `weatherdata`
--

INSERT INTO `weatherdata` (`id`, `weather`, `temperature`, `wind`, `datetimes`, `speed`, `humidity`, `weather_city`, `pressure`, `icon`) VALUES
(29, 'heavy intensity rain', 19.44, 0.45, '2022-01-12 04:40:24', 0.45, 95, 'Miami', 1023, '10n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `weatherdata`
--
ALTER TABLE `weatherdata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `weatherdata`
--
ALTER TABLE `weatherdata`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
