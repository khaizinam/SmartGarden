-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2022 at 10:52 AM
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
-- Table structure for table `general_infor`
--

CREATE TABLE `general_infor` (
  `infor_num` int(11) NOT NULL,
  `microbit_id` int(3) NOT NULL,
  `temperature` float NOT NULL,
  `huminity` float NOT NULL,
  `sec` varchar(2) NOT NULL,
  `year` varchar(4) NOT NULL,
  `month` varchar(2) NOT NULL,
  `day` varchar(2) NOT NULL,
  `hour` varchar(2) NOT NULL,
  `min` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `general_infor`
--

INSERT INTO `general_infor` (`infor_num`, `microbit_id`, `temperature`, `huminity`, `sec`, `year`, `month`, `day`, `hour`, `min`) VALUES
(6, 1, 23, 31, '19', '2022', '04', '21', '20', '07'),
(7, 19, 23, 31, '19', '2022', '04', '21', '20', '07'),
(8, 1, 20, 20, '14', '2022', '04', '17', '01', '02'),
(9, 1, 30.5, 29, '14', '2022', '04', '22', '10', '00'),
(10, 1, 31.4, 29.5, '14', '2022', '04', '22', '10', '30'),
(11, 1, 34.1, 28.6, '14', '2022', '04', '22', '11', '00'),
(12, 1, 35.5, 27.4, '14', '2022', '04', '22', '11', '30'),
(13, 1, 37.5, 25.1, '14', '2022', '04', '22', '12', '00'),
(14, 1, 37.6, 25.6, '14', '2022', '04', '22', '12', '30'),
(15, 1, 37.9, 26, '14', '2022', '04', '22', '13', '00'),
(16, 1, 37.5, 26.7, '14', '2022', '04', '22', '13', '30'),
(17, 1, 36.5, 26.9, '14', '2022', '04', '22', '14', '00'),
(18, 1, 36.1, 28, '14', '2022', '04', '22', '14', '30'),
(19, 1, 35.6, 28.5, '14', '2022', '04', '22', '15', '00'),
(20, 1, 34.1, 28.6, '14', '2022', '04', '22', '15', '30'),
(21, 1, 31.1, 30.3, '14', '2022', '04', '22', '16', '00'),
(22, 1, 30.9, 31.6, '14', '2022', '04', '22', '16', '30'),
(23, 1, 30.5, 35.7, '14', '2022', '04', '22', '17', '00'),
(24, 1, 30, 35.8, '14', '2022', '04', '22', '17', '30'),
(25, 1, 29.7, 36.1, '14', '2022', '04', '22', '18', '00'),
(26, 1, 29.7, 36.5, '14', '2022', '04', '22', '18', '30'),
(27, 1, 29.6, 37.8, '14', '2022', '04', '22', '19', '00'),
(28, 1, 28.1, 38.9, '14', '2022', '04', '22', '19', '30'),
(29, 1, 28, 39.4, '14', '2022', '04', '22', '20', '00'),
(30, 1, 28, 40.1, '14', '2022', '04', '22', '20', '30'),
(31, 1, 27.9, 40.2, '14', '2022', '04', '22', '21', '00'),
(32, 1, 27.8, 40.4, '14', '2022', '04', '22', '21', '30'),
(33, 1, 27.8, 42.1, '14', '2022', '04', '22', '22', '00'),
(34, 1, 27.7, 43.5, '14', '2022', '04', '22', '22', '30'),
(35, 1, 27.6, 44.1, '14', '2022', '04', '22', '23', '00'),
(36, 1, 27.5, 44.5, '14', '2022', '04', '22', '23', '30'),
(37, 1, 27, 45, '14', '2022', '04', '23', '00', '00'),
(38, 1, 27.1, 44.8, '14', '2022', '04', '23', '00', '30'),
(39, 1, 27.1, 44.2, '14', '2022', '04', '23', '01', '00'),
(40, 1, 27.2, 44.1, '14', '2022', '04', '23', '01', '30'),
(41, 1, 27.3, 42.6, '14', '2022', '04', '23', '02', '00'),
(42, 1, 27.5, 42.1, '14', '2022', '04', '23', '02', '30'),
(43, 1, 27.6, 40.5, '14', '2022', '04', '23', '03', '00'),
(44, 1, 27.7, 40.1, '14', '2022', '04', '23', '03', '30'),
(45, 1, 27.9, 39.4, '14', '2022', '04', '23', '04', '00'),
(46, 1, 28, 39.7, '14', '2022', '04', '23', '04', '30'),
(47, 1, 28.4, 38.5, '14', '2022', '04', '23', '05', '00'),
(48, 1, 28.5, 37.4, '14', '2022', '04', '23', '05', '30'),
(49, 1, 28.7, 36.4, '14', '2022', '04', '23', '06', '00'),
(50, 1, 28.9, 36.2, '14', '2022', '04', '23', '06', '30'),
(51, 1, 28.9, 36, '14', '2022', '04', '23', '07', '00'),
(52, 1, 29, 35.8, '14', '2022', '04', '23', '07', '30'),
(53, 1, 29.1, 35.4, '14', '2022', '04', '23', '08', '00'),
(54, 1, 29.4, 32.8, '14', '2022', '04', '23', '08', '30'),
(55, 1, 29.5, 31.9, '14', '2022', '04', '23', '09', '00'),
(56, 1, 29.7, 30, '14', '2022', '04', '23', '09', '30'),
(57, 1, 32, 29.5, '14', '2022', '04', '23', '10', '00'),
(58, 1, 30.5, 29.4, '14', '2022', '04', '23', '10', '30'),
(59, 1, 33.8, 27.2, '14', '2022', '04', '23', '11', '00'),
(60, 1, 35, 27, '14', '2022', '04', '23', '11', '30'),
(61, 1, 37.3, 25, '14', '2022', '04', '23', '12', '00'),
(62, 1, 38, 25.3, '14', '2022', '04', '23', '12', '30'),
(63, 1, 37.9, 25.8, '14', '2022', '04', '23', '13', '00'),
(64, 1, 37.9, 26, '14', '2022', '04', '23', '13', '30'),
(65, 1, 37.8, 26.9, '14', '2022', '04', '23', '14', '00'),
(66, 1, 36.5, 27, '14', '2022', '04', '23', '14', '30'),
(67, 1, 36.4, 28.4, '14', '2022', '04', '23', '15', '00'),
(68, 1, 35.7, 29.7, '14', '2022', '04', '23', '15', '30'),
(69, 1, 34.1, 30.5, '14', '2022', '04', '23', '16', '00'),
(70, 1, 33.9, 30.7, '14', '2022', '04', '23', '16', '30'),
(71, 1, 33.8, 32.6, '14', '2022', '04', '23', '17', '00'),
(72, 1, 32.7, 33.8, '14', '2022', '04', '23', '17', '30'),
(73, 1, 31.5, 34.7, '14', '2022', '04', '23', '18', '00'),
(74, 1, 30, 37.5, '14', '2022', '04', '23', '18', '30'),
(75, 1, 28.6, 38.1, '14', '2022', '04', '23', '19', '00'),
(76, 1, 28.4, 39.7, '14', '2022', '04', '23', '19', '30'),
(77, 1, 28.2, 39.8, '14', '2022', '04', '23', '20', '00'),
(78, 1, 28, 40.2, '14', '2022', '04', '23', '20', '30');

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
  `microbit_owner` int(3) NOT NULL,
  `key` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `microbits`
--

INSERT INTO `microbits` (`microbit_id`, `microbit_name`, `AIO_key`, `AIO_key_2`, `ada_username`, `humi_lower`, `humi_upper`, `microbit_owner`, `key`) VALUES
(1, 'Máy thử', 'BIAI74HrNYGA', 'CXXPRvrWxUallSXx', 'DuyThinh141592', 32, 32, 1, 'ok'),
(19, 'khai', 'BIAI74HrNYGA', 'CXXPRvrWxUallSXx', 'DuyThinh141592', 25, 35, 4, 'ok');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_password` varchar(30) NOT NULL,
  `user_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_email`) VALUES
(1, 'khaizinam', '1', 'khaizinam@gmail.com'),
(2, 'a', '1', ''),
(3, 'admin1', '1234', ''),
(4, 'huukhai', '1', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `general_infor`
--
ALTER TABLE `general_infor`
  ADD PRIMARY KEY (`infor_num`);

--
-- Indexes for table `microbits`
--
ALTER TABLE `microbits`
  ADD PRIMARY KEY (`microbit_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `general_infor`
--
ALTER TABLE `general_infor`
  MODIFY `infor_num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `microbits`
--
ALTER TABLE `microbits`
  MODIFY `microbit_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
