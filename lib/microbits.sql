-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2022 at 08:48 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_microbit`
--

-- --------------------------------------------------------

--
-- Table structure for table `microbits`
--

CREATE TABLE `microbits` (
  `microbit_id` int(3) NOT NULL,
  `microbit_name` varchar(50) NOT NULL,
  `AIO_key` varchar(12) NOT NULL,
  `AIO_key_2` varchar(16) NOT NULL,
  `ada_username` varchar(50) NOT NULL,
  `humi_lower` float NOT NULL,
  `humi_upper` float NOT NULL,
  `microbit_owner` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `microbits`
--

INSERT INTO `microbits` (`microbit_id`, `microbit_name`, `AIO_key`, `AIO_key_2`, `ada_username`, `humi_lower`, `humi_upper`, `microbit_owner`) VALUES
(1, 'Máy thử 1', 'BIAI74HrNYGA', 'CXXPRvrWxUallSXx', 'DuyThinh141592', 32, 32, 1),
(7, 'khaiiznam', 'IAI74HrNYGAC', 'CXXPRvrWxUallSXx', 'DuyThinh141592', 25, 35, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `microbits`
--
ALTER TABLE `microbits`
  ADD PRIMARY KEY (`microbit_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `microbits`
--
ALTER TABLE `microbits`
  MODIFY `microbit_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
