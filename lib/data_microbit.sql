-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2022 at 10:37 AM
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
  `infor_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `microbits`
--

CREATE TABLE `microbits` (
  `microbit_id` int(3) NOT NULL,
  `microbit_name` varchar(50) NOT NULL,
  `AIO_key` varchar(32) NOT NULL,
  `ada_username` varchar(50) NOT NULL,
  `temperature_lower` float NOT NULL,
  `temperature_upper` float NOT NULL,
  `microbit_owner` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `microbits`
--

INSERT INTO `microbits` (`microbit_id`, `microbit_name`, `AIO_key`, `ada_username`, `temperature_lower`, `temperature_upper`, `microbit_owner`) VALUES
(1, 'Máy thử 1', 'aio_cQRc06NHwMqbSNco1meWomF5HecD', 'DuyThinh141592', 32, 32, 1);

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
(1, 'khaizinam', '1', 'khaizinam@gmail.com');

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
  MODIFY `infor_num` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `microbits`
--
ALTER TABLE `microbits`
  MODIFY `microbit_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
