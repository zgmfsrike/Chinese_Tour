-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2018 at 12:08 PM
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
-- Table structure for table `page_static_convention`
--

CREATE TABLE `page_static_convention` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `english` varchar(100) CHARACTER SET utf8 NOT NULL,
  `chinese` varchar(100) CHARACTER SET utf8 NOT NULL,
  `thai` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_static_convention`
--

INSERT INTO `page_static_convention` (`id`, `name`, `english`, `chinese`, `thai`) VALUES
(1, 'title', 'Meeting Tours', '会议旅游', 'การจัดประชุมองค์กรณ์'),
(2, 'type1', 'Package for New Employee training Meeting + Travelling (6 days)', '新员工培训会议 + 旅游（6天）', 'การฝึกอบรมลูกจ้าง (6วัน)'),
(3, 'type2', 'Package for New Product introduction meeting + Travelling (6 days)', '新产品介绍会议 + 旅游（6天）', 'การประชุมแนะนำสินค้าใหม่ (6วัน)'),
(4, 'type3', 'Package for department meeting + Travelling (6 Days)', '部门会议 + 旅游（6天）', 'การประชุมหน่วยงาน (6วัน)');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `page_static_convention`
--
ALTER TABLE `page_static_convention`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `page_static_convention`
--
ALTER TABLE `page_static_convention`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
