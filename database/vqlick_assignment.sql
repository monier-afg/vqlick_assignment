-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 25, 2020 at 11:32 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vqlick_assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `item` varchar(255) NOT NULL,
  `selected` tinyint(1) NOT NULL DEFAULT 0,
  `last_update` int(11) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `item`, `selected`, `last_update`, `time`) VALUES
(5, 'item 1', 0, 1600956162, 1600956162),
(6, 'item 2', 1, 1600956654, 1600956654),
(7, 'item 4', 1, 1600956857, 1600956857),
(8, 'aaa', 1, 1600956917, 1600956917),
(9, 'vvv', 0, 1600956962, 1600956962),
(10, 'qqq', 0, 1600957018, 1600957018),
(11, 'ttt', 0, 1600957140, 1600957140),
(12, 'rrr', 0, 1600957167, 1600957167),
(13, 'uuu', 0, 1600957512, 1600957512),
(14, 'monier', 1, 1600958851, 1600958851),
(15, 'ahmed', 0, 1600960052, 1600960052),
(16, 'abcd', 1, 1600960121, 1600960121),
(17, 'monierr', 0, 1600962809, 1600962809);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
