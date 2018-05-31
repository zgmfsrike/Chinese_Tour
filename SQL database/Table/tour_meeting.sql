-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2018 at 10:39 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

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
-- Table structure for table `tour_meeting`
--

CREATE TABLE `tour_meeting` (
  `id` int(11) NOT NULL,
  `style` int(11) NOT NULL,
  `plan` varchar(5) NOT NULL,
  `title` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `pdf` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tour_meeting`
--

INSERT INTO `tour_meeting` (`id`, `style`, `plan`, `title`, `price`, `pdf`) VALUES
(1, 1, 'a', 'Meeting 1 A', 300, '1_a.pdf'),
(2, 1, 'b', 'Meeting 1 B', 500, '1_b.pdf'),
(3, 1, 'c', 'Meeting 1 C', 500, '1_c.pdf'),
(4, 2, 'a', 'Meeting 2 A', 500, '2_a.pdf'),
(5, 2, 'b', 'Meeting 2 B', 500, '2_b.pdf'),
(6, 2, 'c', 'Meeting 2 C', 600, '2_c.pdf'),
(7, 3, 'a', 'Meeting 3 A', 500, '3_a.pdf'),
(8, 3, 'b', 'Meeting 3 B', 300, '3_b.pdf'),
(9, 3, 'c', 'Meeting 3 C', 350, '3_c.pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tour_meeting`
--
ALTER TABLE `tour_meeting`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tour_meeting`
--
ALTER TABLE `tour_meeting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
