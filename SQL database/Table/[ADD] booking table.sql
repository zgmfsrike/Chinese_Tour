-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2018 at 02:10 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chinese_tour`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_status`
--

CREATE TABLE `booking_status` (
  `id` int(11) NOT NULL,
  `status_en` varchar(30) CHARACTER SET utf8 NOT NULL,
  `status_ch` varchar(30) CHARACTER SET utf8 NOT NULL,
  `status_th` varchar(30) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_status`
--

INSERT INTO `booking_status` (`id`, `status_en`, `status_ch`, `status_th`) VALUES
(1, 'No payment', 'No payment', 'ยังไม่ได้ชำระ'),
(2, 'Pending', 'Pending', 'รอยืนยัน'),
(3, 'Confirmed', 'Confirmed', 'ยืนยันแล้ว'),
(4, 'Overdue', 'Overdue', 'เกินกำหนด');

-- --------------------------------------------------------

--
-- Table structure for table `tour_booking_history`
--

CREATE TABLE `tour_booking_history` (
  `id` int(11) NOT NULL,
  `reference_code` varchar(50) NOT NULL,
  `member_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `uploaded_file` varchar(50) NOT NULL,
  `booking_date` date NOT NULL,
  `expiry_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tour_booking_history`
--

INSERT INTO `tour_booking_history` (`id`, `reference_code`, `member_id`, `status`, `uploaded_file`, `booking_date`, `expiry_date`) VALUES
(1, 'abcdef', 1, 2, 'abcdef.jpg', '2018-06-14', '2018-06-21'),
(2, 'abcdf', 1, 1, '', '2018-06-14', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_status`
--
ALTER TABLE `booking_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_booking_history`
--
ALTER TABLE `tour_booking_history`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_status`
--
ALTER TABLE `booking_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tour_booking_history`
--
ALTER TABLE `tour_booking_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
