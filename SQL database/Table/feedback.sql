-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2018 at 11:03 AM
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
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `feedback_id` varchar(50) NOT NULL,
  `tour_round_id` int(11) NOT NULL,
  `group_member_ref` varchar(50) NOT NULL,
  `feedback_version` int(11) NOT NULL,
  `answer_1` int(1) NOT NULL,
  `answer_2` int(1) NOT NULL,
  `answer_3` int(1) NOT NULL,
  `answer_4` int(1) NOT NULL,
  `answer_5` int(1) NOT NULL,
  `answer_6` int(1) NOT NULL,
  `answer_7` int(1) NOT NULL,
  `answer_8` int(1) NOT NULL,
  `answer_9` int(1) NOT NULL,
  `answer_10` int(1) NOT NULL,
  `answer_11` int(1) NOT NULL,
  `answer_12` int(1) NOT NULL,
  `answer_13` int(1) NOT NULL,
  `answer_14` int(1) NOT NULL,
  `answer_15` int(1) NOT NULL,
  `comment` varchar(300) CHARACTER SET utf8 NOT NULL,
  `enable` int(1) NOT NULL DEFAULT '1',
  `expiry_date` int(11) NOT NULL,
  `filled_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback_question`
--

CREATE TABLE `feedback_question` (
  `id` int(11) NOT NULL,
  `version` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `question` varchar(300) CHARACTER SET utf8 NOT NULL,
  `enable` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback_question`
--

INSERT INTO `feedback_question` (`id`, `version`, `question_id`, `question`, `enable`) VALUES
(1, 1, 1, 'q1', 0),
(2, 1, 2, 'q2', 1),
(5, 3, 1, 'test', 1),
(6, 4, 1, 'test', 0),
(7, 4, 2, 'q2', 1),
(8, 4, 3, 'q3', 0),
(9, 4, 4, 'q4', 0),
(10, 4, 5, 'q5', 1),
(11, 4, 6, 'q6', 0),
(12, 4, 7, 'q6', 0),
(13, 4, 8, 'q6', 0),
(14, 4, 9, 'fdsq6', 1),
(15, 4, 10, 'q6', 0),
(16, 4, 11, 'q6', 0),
(17, 4, 12, 'q6', 0),
(18, 4, 13, 'q6', 0),
(19, 4, 14, 'q6', 1),
(20, 4, 15, 'q6', 0),
(21, 5, 1, 'testffdsa', 1),
(22, 5, 2, 'q2', 1),
(23, 5, 3, 'q3', 1),
(24, 5, 4, 'q4', 1),
(25, 5, 5, 'q5fdsa', 0),
(26, 5, 6, 'q6', 0),
(27, 5, 7, 'q6', 0),
(28, 5, 8, 'q6fdsa', 0),
(29, 5, 9, 'fdsq6', 0),
(30, 5, 10, 'q6', 0),
(31, 5, 11, 'q6fdsaf', 0),
(32, 5, 12, 'q6', 0),
(33, 5, 13, 'q6', 0),
(34, 5, 14, 'q6dsa', 0),
(35, 5, 15, 'q6', 0),
(36, 6, 1, 'testffdsa', 1),
(37, 6, 2, 'q2', 1),
(38, 6, 3, 'q3', 1),
(39, 6, 4, 'q4', 1),
(40, 6, 5, 'q5fdsa', 0),
(41, 6, 6, 'q6', 0),
(42, 6, 7, 'q6', 0),
(43, 6, 8, 'q6fdsa', 0),
(44, 6, 9, 'fdsq6', 0),
(45, 6, 10, 'q6', 0),
(46, 6, 11, 'q6fdsaf', 0),
(47, 6, 12, 'q6', 0),
(48, 6, 13, 'q6', 0),
(49, 6, 14, 'q6dsa', 0),
(50, 6, 15, 'q6', 0),
(51, 7, 1, 'testffdsa', 1),
(52, 7, 2, 'q2', 1),
(53, 7, 3, 'q3', 1),
(54, 7, 4, 'q4', 1),
(55, 7, 5, 'q5fdsa', 0),
(56, 7, 6, 'q6', 0),
(57, 7, 7, 'q6', 0),
(58, 7, 8, 'q6fdsa', 0),
(59, 7, 9, 'fdsq6', 0),
(60, 7, 10, 'q6', 0),
(61, 7, 11, 'q6fdsaf', 0),
(62, 7, 12, 'q6', 0),
(63, 7, 13, 'q6', 0),
(64, 7, 14, 'q6dsa', 0),
(65, 7, 15, 'q6', 0),
(66, 8, 1, 'testffdsa', 1),
(67, 8, 2, 'q2', 1),
(68, 8, 3, 'q3', 1),
(69, 8, 4, 'q4', 1),
(70, 8, 5, 'q5fdsa', 0),
(71, 8, 6, 'q6', 0),
(72, 8, 7, 'q6', 0),
(73, 8, 8, 'q6fdsa', 0),
(74, 8, 9, 'fdsq6', 0),
(75, 8, 10, 'q6', 0),
(76, 8, 11, 'q6fdsaf', 0),
(77, 8, 12, 'q6', 0),
(78, 8, 13, 'q6', 0),
(79, 8, 14, 'q6dsa', 1),
(80, 8, 15, 'q6', 1),
(81, 9, 1, 'testffdsa', 1),
(82, 9, 2, 'q2', 1),
(83, 9, 3, 'q3', 1),
(84, 9, 4, 'q4', 1),
(85, 9, 5, 'q5fdsa', 0),
(86, 9, 6, 'q6', 0),
(87, 9, 7, 'q6ดกหฟดก', 0),
(88, 9, 8, 'q6fdsa', 0),
(89, 9, 9, 'fdsq6', 0),
(90, 9, 10, 'q6', 0),
(91, 9, 11, 'q6fdsaf', 0),
(92, 9, 12, 'q6', 0),
(93, 9, 13, 'q6', 0),
(94, 9, 14, 'q6dsa', 1),
(95, 9, 15, 'q6', 1),
(96, 10, 1, 'testffdsa', 1),
(97, 10, 2, 'q2', 1),
(98, 10, 3, 'q3', 1),
(99, 10, 4, 'q4', 1),
(100, 10, 5, 'q5fdsa', 0),
(101, 10, 6, 'q6', 0),
(102, 10, 7, 'q6ดกหฟดก', 0),
(103, 10, 8, 'q6fdsa', 0),
(104, 10, 9, 'fdsq6', 0),
(105, 10, 10, 'q6', 0),
(106, 10, 11, 'q6fdsaf', 0),
(107, 10, 12, 'q6', 0),
(108, 10, 13, 'q6', 0),
(109, 10, 14, 'q6dsa', 1),
(110, 10, 15, 'q6', 1),
(111, 11, 1, 'testffdsa', 1),
(112, 11, 2, 'q2', 1),
(113, 11, 3, 'q3', 1),
(114, 11, 4, 'q4', 1),
(115, 11, 5, 'q5fdsa', 0),
(116, 11, 6, 'q6', 0),
(117, 11, 7, 'q6ดกหฟดก', 0),
(118, 11, 8, 'q6fdsa', 0),
(119, 11, 9, 'fdsq6', 0),
(120, 11, 10, 'q6', 0),
(121, 11, 11, 'q6fdsaf', 0),
(122, 11, 12, 'q6', 0),
(123, 11, 13, 'q6', 0),
(124, 11, 14, 'q6dsa', 1),
(125, 11, 15, 'q6', 1),
(126, 12, 1, 'testffdsa', 1),
(127, 12, 2, 'q2', 1),
(128, 12, 3, 'q3', 1),
(129, 12, 4, 'q4', 1),
(130, 12, 5, 'q5fdsa', 0),
(131, 12, 6, 'q6', 0),
(132, 12, 7, 'q6ดกหฟดก', 0),
(133, 12, 8, 'q6fdsa', 0),
(134, 12, 9, 'fdsq6', 0),
(135, 12, 10, 'q6', 0),
(136, 12, 11, 'q6fdsaf', 0),
(137, 12, 12, 'q6', 0),
(138, 12, 13, 'q6', 0),
(139, 12, 14, 'q6dsa', 1),
(140, 12, 15, 'q6', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback_question`
--
ALTER TABLE `feedback_question`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback_question`
--
ALTER TABLE `feedback_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
