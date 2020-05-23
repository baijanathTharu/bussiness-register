-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2020 at 07:50 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projects`
--

-- --------------------------------------------------------

--
-- Table structure for table `bussiness_record`
--

CREATE TABLE `bussiness_record` (
  `record_id` int(11) NOT NULL,
  `record_name` varchar(255) NOT NULL,
  `record_address` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `record_date_id` int(11) NOT NULL,
  `record_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bussiness_record`
--

INSERT INTO `bussiness_record` (`record_id`, `record_name`, `record_address`, `quantity`, `rate`, `cost`, `record_date_id`, `record_time`) VALUES
(8, 'Sold Pancakes', 'Parasi', 20, 20, 400, 2047, '2020-05-22 23:11:55'),
(9, 'Bought Pan Cakes', 'Manjhariya', 5, 20, 100, 2047, '2020-05-22 23:14:04'),
(11, 'Noodles', 'Kathmandu', 50, 20, 1000, 2048, '2020-05-22 23:48:57'),
(12, 'Sold Cakes', 'Parasi', 20, 200, 4000, 2047, '2020-05-23 09:26:23'),
(13, 'Test', 'Parasi', 20, 15, -300, 2047, '2020-05-23 09:37:22'),
(15, 'Sold Oranges', 'Parasi', 20, 20, 400, 2048, '2020-05-23 10:02:05'),
(16, 'Bought Machineries', 'Kathmandu', 1, 50000, 50000, 2048, '2020-05-23 10:03:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bussiness_record`
--
ALTER TABLE `bussiness_record`
  ADD PRIMARY KEY (`record_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bussiness_record`
--
ALTER TABLE `bussiness_record`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
