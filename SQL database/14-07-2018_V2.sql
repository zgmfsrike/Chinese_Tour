-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2018 at 09:17 AM
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
-- Table structure for table `accommodation`
--

CREATE TABLE `accommodation` (
  `accommodation_id` int(11) NOT NULL,
  `accommodation_level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accommodation`
--

INSERT INTO `accommodation` (`accommodation_id`, `accommodation_level`) VALUES
(1, '1-star'),
(2, '2-star'),
(3, '3-star'),
(4, '4-star'),
(5, '5-star');

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id`, `username`, `password`, `first_name`, `middle_name`, `last_name`, `email`) VALUES
(1, 'admin', '$2y$10$sH4s3Gur3w6xrPcKpj8/beZoyuEgbWpxHCJaN90yZfALeKhsEs2ku', 'admin', 'admin', 'admin', 'admin');

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
-- Table structure for table `departure_location`
--

CREATE TABLE `departure_location` (
  `departure_id` int(11) NOT NULL,
  `departure_en` varchar(50) CHARACTER SET utf8 NOT NULL,
  `departure_ch` varchar(50) CHARACTER SET utf8 NOT NULL,
  `departure_th` varchar(50) CHARACTER SET utf8 NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dropoff_location`
--

CREATE TABLE `dropoff_location` (
  `dropoff_id` int(11) NOT NULL,
  `dropoff_en` varchar(50) CHARACTER SET utf8 NOT NULL,
  `dropoff_ch` varchar(50) CHARACTER SET utf8 NOT NULL,
  `dropoff_th` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `expiry_date` date NOT NULL,
  `filled_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `feedback_id`, `tour_round_id`, `group_member_ref`, `feedback_version`, `answer_1`, `answer_2`, `answer_3`, `answer_4`, `answer_5`, `answer_6`, `answer_7`, `answer_8`, `answer_9`, `answer_10`, `answer_11`, `answer_12`, `answer_13`, `answer_14`, `answer_15`, `comment`, `enable`, `expiry_date`, `filled_date`) VALUES
(6, 'da91b308', 38, 'cc401112', 6, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'feedback 1', 1, '2018-07-07', '2018-07-02'),
(7, '41887bf5', 39, '54aecabe', 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 1, '2018-07-08', '0000-00-00'),
(8, 'f3116e86', 39, '54aecabe', 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 1, '2018-07-08', '0000-00-00'),
(9, '440caf82', 39, '001714e8', 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 1, '2018-07-08', '0000-00-00'),
(10, '1a9a86ec', 38, 'cc401112', 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 1, '2018-07-08', '0000-00-00'),
(11, '60c6bae9', 38, 'cb212982', 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 1, '2018-07-08', '0000-00-00'),
(12, '567c623c', 39, '54aecabe', 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 1, '2018-07-08', '0000-00-00'),
(13, 'c8329f24', 39, '54aecabe', 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 1, '2018-07-08', '0000-00-00'),
(14, '0d2f4b47', 39, '001714e8', 6, 1, 2, 2, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa ', 1, '2018-07-08', '2018-07-03');

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
(1, 1, 1, 'q1', 1),
(2, 1, 2, 'q2', 1),
(3, 1, 3, 'q3', 1),
(4, 1, 4, 'qq', 1),
(5, 1, 5, 'qsd', 1),
(6, 1, 6, 'sad', 0),
(7, 1, 7, 'asdas', 0),
(8, 1, 8, 'asda', 0),
(9, 1, 9, 'see', 0),
(10, 1, 10, 'asdww', 0),
(11, 1, 11, 'asdasda', 0),
(12, 1, 12, 'dx', 0),
(13, 1, 13, 'as', 0),
(14, 1, 14, 'axsd', 0),
(15, 1, 15, 'adasadadasd', 0),
(16, 2, 1, 'q1', 1),
(17, 2, 2, 'q2', 1),
(18, 2, 3, 'q3', 1),
(19, 2, 4, 'qq', 1),
(20, 2, 5, 'qsd', 1),
(21, 2, 6, 'sad', 1),
(22, 2, 7, 'asdas', 1),
(23, 2, 8, 'asda', 0),
(24, 2, 9, 'see', 0),
(25, 2, 10, 'asdww', 0),
(26, 2, 11, 'asdasda', 0),
(27, 2, 12, 'dx', 0),
(28, 2, 13, 'as', 0),
(29, 2, 14, 'axsd', 0),
(30, 2, 15, 'adasadadasd', 0),
(31, 3, 1, 'q1', 1),
(32, 3, 2, 'q2', 1),
(33, 3, 3, 'q3', 0),
(34, 3, 4, 'qq', 0),
(35, 3, 5, 'qsd', 0),
(36, 3, 6, 'sad', 0),
(37, 3, 7, 'asdas', 0),
(38, 3, 8, 'asda', 0),
(39, 3, 9, 'see', 0),
(40, 3, 10, 'asdww', 0),
(41, 3, 11, 'asdasda', 0),
(42, 3, 12, 'dx', 0),
(43, 3, 13, 'as', 0),
(44, 3, 14, 'axsd', 0),
(45, 3, 15, 'adasadadasd', 0),
(46, 4, 1, 'เนเน่ จะผ่านไหม', 1),
(47, 4, 2, 'Do nae nae pass pre project', 1),
(48, 4, 3, 'q3', 0),
(49, 4, 4, 'qq', 0),
(50, 4, 5, 'qsd', 0),
(51, 4, 6, 'sad', 0),
(52, 4, 7, 'asdas', 0),
(53, 4, 8, 'asda', 0),
(54, 4, 9, 'see', 0),
(55, 4, 10, 'asdww', 0),
(56, 4, 11, 'asdasda', 0),
(57, 4, 12, 'dx', 0),
(58, 4, 13, 'as', 0),
(59, 4, 14, 'axsd', 0),
(60, 4, 15, 'adasadadasd', 0),
(61, 5, 1, 'เนเน่ จะผ่านไหม', 1),
(62, 5, 2, 'Do nae nae pass pre project', 1),
(63, 5, 3, 'q3', 1),
(64, 5, 4, 'q', 1),
(65, 5, 5, 'qsd', 0),
(66, 5, 6, 'sad', 0),
(67, 5, 7, 'asdas', 0),
(68, 5, 8, 'asda', 0),
(69, 5, 9, 'see', 0),
(70, 5, 10, 'asdww', 0),
(71, 5, 11, 'asdasda', 0),
(72, 5, 12, 'dx', 0),
(73, 5, 13, 'as', 0),
(74, 5, 14, 'axsd', 0),
(75, 5, 15, 'adasadadasd', 0),
(76, 6, 1, 'เนเน่ จะไม่ผ่านใช่ไม๊', 1),
(77, 6, 2, 'Do nae nae pass pre project', 1),
(78, 6, 3, 'q3', 1),
(79, 6, 4, 'q', 1),
(80, 6, 5, 'qsd', 0),
(81, 6, 6, 'sad', 0),
(82, 6, 7, 'asdas', 0),
(83, 6, 8, 'asda', 0),
(84, 6, 9, 'see', 0),
(85, 6, 10, 'asdww', 0),
(86, 6, 11, 'asdasda', 0),
(87, 6, 12, 'dx', 0),
(88, 6, 13, 'as', 0),
(89, 6, 14, 'axsd', 0),
(90, 6, 15, 'adasadadasd', 0),
(91, 7, 1, 'Question 1', 1),
(92, 7, 2, 'Question 2', 1),
(93, 7, 3, 'Question 3', 1),
(94, 7, 4, 'Question 4', 1),
(95, 7, 5, 'Question 5', 0),
(96, 7, 6, 'Question 6', 0),
(97, 7, 7, 'Question 7', 0),
(98, 7, 8, 'Question 8', 0),
(99, 7, 9, 'Question 9', 0),
(100, 7, 10, 'Question 110', 0),
(101, 7, 11, 'asdasda', 0),
(102, 7, 12, 'dx', 0),
(103, 7, 13, 'as', 0),
(104, 7, 14, 'axsd', 0),
(105, 7, 15, 'adasadadasd', 0);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `country_code` int(11) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `zipcode` varchar(6) NOT NULL,
  `occupation` int(11) NOT NULL,
  `salary` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `hash` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `username`, `password`, `first_name`, `middle_name`, `last_name`, `dob`, `country_code`, `phone`, `email`, `address`, `city`, `province`, `zipcode`, `occupation`, `salary`, `active`, `hash`) VALUES
(1, 'asdfghj', '$2y$10$nEshXXiYm0orI2SyEXKVnO3V7S4KOOA45tRQCTdRNRAAwE34/Eedi', 'asdf', 'asdf', 'asdf', '2017-10-13', 66, '252626281', 'nayzaa200@hotmail.com', '241 moo.9 subdis.Sansai luang, dis.Sansai', 'CMCMCMCM', 'ChiangMai-', '50210', 1, 4, 1, '4edaa105d5f53590338791951e38c3ad'),
(2, 'arg', '$2y$10$F0LXFo4FDyWBrpxqrewTe.Cy/pV7OPdxgcOpfIZ4wcu.2iIzRFZz6', 'TestOK', 'OK', 'fine', '2017-12-27', 66, '151651622313212', 'zgmfstike@gmail.com', '88/8, suthep213131', 'chiangmaisssss', 'chiangmai', '50201', 1, 1, 1, '60495b4e033e9f60b32a6607b587aadd'),
(3, 'zgs', '$2y$10$CejQHB/fqabZdEalId8JGeXlqseQk9I.xttanIWpWD3m9ycXrx6dG', 'kritsanah', 'NB', 'supphasri', '2017-10-17', 66, '846256256', 'zgm@gmail.com', '88/8, suthep', 'chiangmai', 'chiangmai', '50200', 4, 2, 0, '6ef80bb237adf4b6f77d0700e1255907'),
(4, 'grz', '$2y$10$uetDwuJUcuMqU8vDyqyDy.JMnKkKUxeLO31bQnfpy8rgd4DAyoG42', 'aaaaaaaa', 'aaaaaaaa', 'aaaaaaaa', '2017-10-10', 66, '846256256', 'zgmfse@gmail.com', '88/8, suthep', 'chiangmai', 'chiangmai', '50200', 8, 2, 0, '6915849303a3fe93657587cb9c469f00'),
(5, 'GGEZ', '$2y$10$TsD3Od.FXijgWx68tWa9K.ZTrD3oiYqXXGeGKP8uEiwj8DfBcgGiq', 'gsfd', 'qweqweqweq', 'refrdfdfd', '2017-10-26', 66, '846256256', 'zgmfsrikawddszsade@gmail.com', '88/8, suthep', 'chiangmai', 'chiangmai', '50200', 4, 4, 1, 'acff1af62d0f91f4be73f4857552d70c'),
(6, 'ameno', '$2y$10$lZ8TAsiAeCgYYGdSsx9cr.zLhgj7rOIZ0v.dDnmlkhVz35hncLdDO', 'kritsanah', 'sadasd', 'supphasri', '2017-10-13', 66, '846256256', 'zgmfsdsasdsada@gmail.com', '88/8, suthep', 'chiangmai', 'ccccccc', '50200', 7, 7, 0, 'fa1e9c965314ccd7810fb5ea838303e5'),
(7, 'asdasd', '$2y$10$7JqVCiZzbBBYw5a4oIkM1OzkVQTweu8XUadF8qJA0uFt/uA9bfs8a', 'fname', 'mname', 'sname', '2017-10-11', 66, '2525255525', 'nayzaa2010@hotmail.com', 'addressadress', 'fhghgh', 'hgjgjhj', '25353', 8, 8, 1, '77edbe5f897a5dbcde49d31bec1537b8'),
(8, 'zzaa', '$2y$10$0VWOCtO2nPRjr.CvbnynXu0Slw/GgKmQRsemlofqbfHj26JKdr9yK', 'kritsanah', 'GZ', 'supphasri', '2017-10-13', 66, '846256256', 'zgmfstdwaike@gmail.com', '88/8, suthep', 'chiangmai', 'chiangmai', '50200', 6, 6, 0, 'd79c6256b9bdac53a55801a066b70da3'),
(9, 'xxy', '$2y$10$ZokpWRmxXDnkGw39/.Pqwed95vRUiBgy8PWkE.ZrYFNa362oM09OO', 'sada', 'qwdq', 'dsad', '2017-10-13', 66, '846256256', 'zgmfstiwdqdke@gmail.com', '88/8, suthep', 'chiangmai', 'asd', '50200', 7, 7, 0, '765d5fb115a9f6a3e0b23b80a5b2e4c4'),
(10, 'xxm', '$2y$10$YKUnze/pZiZ3hd3hzsYpFeojBSCOaRE1wGE2iQaLjahcSr7lQ93Q.', 'wqsdsadad', 'sdasdsdadasdadsadasdas', 'wswadasdasdasdasdadasdsad', '2017-10-13', 66, '846256256', 'zgmfstisdasasdake@gmail.com', '1231', 'asda', 'sdsds', '50000', 2, 7, 1, '606c90a06173d69682feb83037a68fec'),
(11, 'gggr', '1235555', 'asdawwwwwww', 'asdasda', 'asdadasda', '2017-10-13', 66, '846256256', 'zgmfsrisdasdsadasdake@gmail.com', 'asdad', 'dadasdasd', 'adadasd', '12312', 6, 4, 0, 'fb09f481d40c4d3c0861a46bd2dc52c0'),
(12, 'nbz', '$2y$10$roweeiiGK3yvitoTjK4TjO8XkSbTzFPx8gRiQSLvWlH2Z5C23s.5G', 'nbzzz', 'nbz', 'ssss', '2017-10-17', 66, '846256256', 'zgm121212121fstike@gmail.com', '88/8, suthep', 'chiangmai', 'chainmai', '50200', 1, 6, 1, '495dabfd0ca768a3c3abd672079f48b6'),
(13, 'kkez', '$2y$10$sSEnSIz6lQuKhm4kpAbDKeFaGVbXSLbe0TfAWRys7w6tXaXkBompq', 'sada', 'asdadas', 'asdasdasd', '2017-10-04', 49, '846256256', 'sdasdaske@gmail.com', 'wewq', 'qweqweqe', 'eqweqwe', '46544', 4, 3, 1, '51be2fed6c55f5aa0c16ff14c140b187'),
(14, 'cxzcxc', '$2y$10$Hk38fJGyJhA8KYa3Tt899Ooz9YhRJc9LPijZTw7S9gZWVhrgzYGFK', 'zzczxczx', 'zxczczx', 'czcxzczxczxcz', '2017-10-13', 66, '484998999', 'zgmfs13ewreeertike@gmail.cotm', '1111', 'sw', 'wwa', '12345', 2, 6, 0, '7f018eb7b301a66658931cb8a93fd6e8'),
(15, 'ffff', '$2y$10$cYuOpX4op2r4oJR63/5L.ONUE584Nl9tY5aStSB6fxQki0BZDF7C2', 'kritsanah', '', 'supphasri', '2017-10-28', 66, '846256256', 'zgmfsradadasdadsaike@gmail.com', '88/8, suthep', 'chiangmai', 'chiangmai', '50200', 4, 4, 1, '95d309f0b035d97f69902e7972c2b2e6'),
(16, 'ggh', '$2y$10$VMdOWysq4Y8Nowf/ZUu51uvL7c0paMy8MYeCoB460J6Jxoskl1xSS', 'asdasda', 'sdadasd', 'asdasd', '2017-08-13', 515, '32123131323', 'sadasd@sdasd.com', 'dasdasd', 'dsdasdsa', 'adsdasd', '44451', 3, 2, 0, '30f8f6b940d1073d8b6a5eebc46dd6e5'),
(17, 'gghasdadsada', '$2y$10$Yi.nFFf1pqafoqtZqD37huIbkEDOwF5ZRsWIO1JOteOmLC0w1YVGi', 'asdasda', 'sdadasd', 'asdasd', '2017-08-13', 515, '32123131323', 'zgmfsriasdasdasdasdsadaske@gmail.com', 'dasdasd', 'dsdasdsa', 'adsdasd', '44451', 3, 2, 0, '487d4c6a324446b3fa45b30cfcee5337'),
(18, 'dsxfhd2', '$2y$10$1eI0dk2xfvHo.JSxHcQ0SuGvJjvp/4CyFlxZLlktkSPGjqT5vtuI2', 'asdasda', 'sdadasd', 'asdasd', '2017-08-13', 515, '32123131323', 'zgmfsssssrike@gmail.com', 'dasdasd', 'dsdasdsa', 'adsdasd', '44451', 3, 2, 0, '17ed8abedc255908be746d245e50263a'),
(19, 'dsxfhd2sda', '$2y$10$0pBOIXsmLhfQwyin3ScyAOKxofxaVlky4HAqeC2b295vagISlCcDa', 'asdasda', 'sdadasd', 'asdasd', '2017-08-13', 515, '32123131323', 'zgmfsrike@gmail.com', 'dasdasd', 'dsdasdsa', 'adsdasd', '44451', 3, 2, 0, 'd77f00766fd3be3f2189c843a6af3fb2'),
(20, 'dsxfhd2sdasada', '$2y$10$MS1auNUOhx9dqNaDfZJOwONinlXw1BtJ2kapha7YevLY4biRru4Vq', 'asdasda', 'sdadasd', 'asdasd', '2017-08-13', 515, '32123131323', 'zgmfstikdasdasde@gmail.com', 'dasdasd', 'dsdasdsa', 'adsdasd', '44451', 3, 2, 0, '453fadbd8a1a3af50a9df4df899537b5'),
(21, 'test123', '$2y$10$KhKIip3efms9anoED8lG2OIoChQrpSDpQez/oSbH9HYrfZSaSVco2', 'yangza', 'hooho', 'tamutami', '1968-11-06', 65, '817648822', 'zxcc@gma.com', 'chrrewburry #431', 'testcity\'\'\'\'\'', 'fsdfasdf\'\'\'', '521523', 3, 4, 1, '6e62a992c676f611616097dbea8ea030'),
(22, 'ddd', '$2y$10$LUGQCMyPhJTvc9rrICGK6.H6QmM5BDqXn6dd85XHURXZ93cbDt38O', 'sadasd', 'asdasdas', 'asdasdasda', '2018-05-09', 123, '123123', 'yangzxcc2@gmail.com', 'asdasd', 'asdasdsa', 'dadad', '123131', 3, 2, 0, '3fc0a5dc1f5757c71b88be8adbfd10e9'),
(26, 'asdas', '$2y$10$IQNHj/8ogmQEW5xQpoFKJuWzsxuuuD4I6UAUAh8QXtNy8qtF1H9ZC', 'sadassdas', 'asdadasd', 'asdadas', '2018-05-23', 123, '213123123123', 'zgmfe@gmail.com', 'adadasdasdad', 'Chiangmai', 'ChiangMai', '50200', 1, 2, 0, 'd77f00766fd3be3f2189c843a6af3fb2'),
(27, 'zxcc', '$2y$10$VzwABtKj.mHXw9xmWicT8eNFiscuH.SK/DWOf.rDjCoCjy86bEPNG', 'kritsanah', 'roommuengsutheppuvaraplace', 'suppasree', '2018-05-17', 66, '846256256', 'zgmf@gmail.com', '88/8 room 409 mueng suthep puvaraplace', 'Chiangmai', 'ChiangMai', '50200', 1, 3, 0, '350a3797caea1668d227c8cbe52c793e'),
(28, 'dewa', '$2y$10$IlIbHegZIeZXXD6etD/DU.yyoklO2yp12oeh4I80PtwXy9gNenX/S', 'kritsanahasdasds', '', 'suppasreeasdasdasd', '1970-01-01', 66, '0846256256', 'zgmfstike@gmail.com', '88/8 room 409 mueng suthep puvaraplace', 'Chiangmai', 'ChiangMai', '50200', 1, 2, 0, 'f21e255f89e0f258accbe4e984eef486');

-- --------------------------------------------------------

--
-- Table structure for table `message_ch`
--

CREATE TABLE `message_ch` (
  `id` int(11) NOT NULL,
  `keyword` varchar(50) NOT NULL,
  `head` varchar(100) CHARACTER SET utf8 NOT NULL,
  `body` varchar(300) CHARACTER SET utf8 NOT NULL,
  `btn_text` varchar(50) CHARACTER SET utf8 NOT NULL,
  `btn_link` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message_ch`
--

INSERT INTO `message_ch` (`id`, `keyword`, `head`, `body`, `btn_text`, `btn_link`) VALUES
(1, 'session_expired', 'Session Expired', 'Please login agian', '登录', 'login.php');

-- --------------------------------------------------------

--
-- Table structure for table `message_dummy`
--

CREATE TABLE `message_dummy` (
  `id` int(11) NOT NULL,
  `keyword` varchar(50) NOT NULL,
  `head` varchar(100) CHARACTER SET utf8 NOT NULL,
  `body` varchar(300) CHARACTER SET utf8 NOT NULL,
  `btn_text` varchar(50) CHARACTER SET utf8 NOT NULL,
  `btn_link` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message_dummy`
--

INSERT INTO `message_dummy` (`id`, `keyword`, `head`, `body`, `btn_text`, `btn_link`) VALUES
(1, 'id', '%s %s', '%s', 'เข้าสู่ระบบ', 'login.php');

-- --------------------------------------------------------

--
-- Table structure for table `message_en`
--

CREATE TABLE `message_en` (
  `id` int(11) NOT NULL,
  `keyword` varchar(50) NOT NULL,
  `head` varchar(100) CHARACTER SET utf8 NOT NULL,
  `body` varchar(300) CHARACTER SET utf8 NOT NULL,
  `btn_text` varchar(50) CHARACTER SET utf8 NOT NULL,
  `btn_link` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message_en`
--

INSERT INTO `message_en` (`id`, `keyword`, `head`, `body`, `btn_text`, `btn_link`) VALUES
(1, 'session_expired', 'Session Expired', 'Please login again', 'Login', 'login.php');

-- --------------------------------------------------------

--
-- Table structure for table `message_th`
--

CREATE TABLE `message_th` (
  `id` int(11) NOT NULL,
  `keyword` varchar(50) NOT NULL,
  `head` varchar(100) CHARACTER SET utf8 NOT NULL,
  `body` varchar(300) CHARACTER SET utf8 NOT NULL,
  `btn_text` varchar(50) CHARACTER SET utf8 NOT NULL,
  `btn_link` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message_th`
--

INSERT INTO `message_th` (`id`, `keyword`, `head`, `body`, `btn_text`, `btn_link`) VALUES
(1, 'session_expired', 'เซสชั่นหมดอายุ', 'กรุณาเข้าสู่ระบบอีกครั้ง', 'เข้าสู่ระบบ', 'login.php');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `create_date` date NOT NULL,
  `last_edit_date` date DEFAULT NULL,
  `topic` varchar(50) NOT NULL,
  `short_description` varchar(200) NOT NULL,
  `content` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `news_ch`
--

CREATE TABLE `news_ch` (
  `news_id` int(11) NOT NULL,
  `create_date` date NOT NULL,
  `last_edit_date` date DEFAULT NULL,
  `topic` varchar(50) CHARACTER SET utf8 NOT NULL,
  `short_description` text CHARACTER SET utf8 NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news_ch`
--

INSERT INTO `news_ch` (`news_id`, `create_date`, `last_edit_date`, `topic`, `short_description`, `content`) VALUES
(1, '2018-07-03', NULL, 'news_test', 'news_test', 'news_test'),
(2, '2018-07-03', '2018-07-14', 'CCCC', 'A suicide bomber has killed at least 128 people at a campaign rally in south-western Pakistan - the deadliest attack in the country since 2014.\r\n\r\nA local candidate was among the dead in the Mastung town, police say. So-called Islamic State (IS) claimed the attack.\r\nA suicide bomber has killed at least 128 people at a campaign rally in south-western Pakistan - the deadliest attack in the country since 2014.\r\n\r\nA local candidate was among the dead in the Mastung town, police say. So-called Islamic State (IS) claimed the attack.\r\n\r\nEarlier, a bomb attack on a similar rally in the northern town of Bannu killed four people. The attacks come ahead of general elections on 25 July.\r\n\r\nMeanwhile, former PM Nawaz Sharif was arrested after flying home from the UK.\r\n\r\nSharif and his daughter Maryam were taken into custody by officials from the National Accountability Bureau (NAB) after landing in the northern city of Lahore. They were then put on a chartered plane bound for Pakistan\'s capital Islamabad.\r\n\r\nThey were later transferred to a local prison.', 'A suicide bomber has killed at least 128 people at a campaign rally in south-western Pakistan - the deadliest attack in the country since 2014.\r\n\r\nA local candidate was among the dead in the Mastung town, police say. So-called Islamic State (IS) claimed the attack.\r\nA suicide bomber has killed at least 128 people at a campaign rally in south-western Pakistan - the deadliest attack in the country since 2014.\r\n\r\nA local candidate was among the dead in the Mastung town, police say. So-called Islamic State (IS) claimed the attack.\r\n\r\nEarlier, a bomb attack on a similar rally in the northern town of Bannu killed four people. The attacks come ahead of general elections on 25 July.\r\n\r\nMeanwhile, former PM Nawaz Sharif was arrested after flying home from the UK.\r\n\r\nSharif and his daughter Maryam were taken into custody by officials from the National Accountability Bureau (NAB) after landing in the northern city of Lahore. They were then put on a chartered plane bound for Pakistan\'s capital Islamabad.\r\n\r\nThey were later transferred to a local prison.\r\n\r\nA suicide bomber has killed at least 128 people at a campaign rally in south-western Pakistan - the deadliest attack in the country since 2014.\r\n\r\nA local candidate was among the dead in the Mastung town, police say. So-called Islamic State (IS) claimed the attack.\r\nA suicide bomber has killed at least 128 people at a campaign rally in south-western Pakistan - the deadliest attack in the country since 2014.\r\n\r\nA local candidate was among the dead in the Mastung town, police say. So-called Islamic State (IS) claimed the attack.\r\n\r\nEarlier, a bomb attack on a similar rally in the northern town of Bannu killed four people. The attacks come ahead of general elections on 25 July.\r\n\r\nMeanwhile, former PM Nawaz Sharif was arrested after flying home from the UK.\r\n\r\nSharif and his daughter Maryam were taken into custody by officials from the National Accountability Bureau (NAB) after landing in the northern city of Lahore. They were then put on a chartered plane bound for Pakistan\'s capital Islamabad.\r\n\r\nThey were later transferred to a local prison.\r\n\r\nA suicide bomber has killed at least 128 people at a campaign rally in south-western Pakistan - the deadliest attack in the country since 2014.\r\n\r\nA local candidate was among the dead in the Mastung town, police say. So-called Islamic State (IS) claimed the attack.\r\nA suicide bomber has killed at least 128 people at a campaign rally in south-western Pakistan - the deadliest attack in the country since 2014.\r\n\r\nA local candidate was among the dead in the Mastung town, police say. So-called Islamic State (IS) claimed the attack.\r\n\r\nEarlier, a bomb attack on a similar rally in the northern town of Bannu killed four people. The attacks come ahead of general elections on 25 July.\r\n\r\nMeanwhile, former PM Nawaz Sharif was arrested after flying home from the UK.\r\n\r\nSharif and his daughter Maryam were taken into custody by officials from the National Accountability Bureau (NAB) after landing in the northern city of Lahore. They were then put on a chartered plane bound for Pakistan\'s capital Islamabad.\r\n\r\nThey were later transferred to a local prison.\r\n\r\nA suicide bomber has killed at least 128 people at a campaign rally in south-western Pakistan - the deadliest attack in the country since 2014.\r\n\r\nA local candidate was among the dead in the Mastung town, police say. So-called Islamic State (IS) claimed the attack.\r\nA suicide bomber has killed at least 128 people at a campaign rally in south-western Pakistan - the deadliest attack in the country since 2014.\r\n\r\nA local candidate was among the dead in the Mastung town, police say. So-called Islamic State (IS) claimed the attack.\r\n\r\nEarlier, a bomb attack on a similar rally in the northern town of Bannu killed four people. The attacks come ahead of general elections on 25 July.\r\n\r\nMeanwhile, former PM Nawaz Sharif was arrested after flying home from the UK.\r\n\r\nSharif and his daughter Maryam were taken into custody by officials from the National Accountability Bureau (NAB) after landing in the northern city of Lahore. They were then put on a chartered plane bound for Pakistan\'s capital Islamabad.\r\n\r\nThey were later transferred to a local prison.');

-- --------------------------------------------------------

--
-- Table structure for table `news_en`
--

CREATE TABLE `news_en` (
  `news_id` int(11) NOT NULL,
  `create_date` date NOT NULL,
  `last_edit_date` date DEFAULT NULL,
  `topic` varchar(50) CHARACTER SET utf8 NOT NULL,
  `short_description` text CHARACTER SET utf8 NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news_en`
--

INSERT INTO `news_en` (`news_id`, `create_date`, `last_edit_date`, `topic`, `short_description`, `content`) VALUES
(1, '2018-07-03', NULL, 'news_test', 'news_test', 'news_test'),
(2, '2018-07-03', '2018-07-14', 'New Aj', 'A suicide bomber has killed at least 128 people at a campaign rally in south-western Pakistan - the deadliest attack in the country since 2014.\r\n\r\nA local candidate was among the dead in the Mastung town, police say. So-called Islamic State (IS) claimed the attack.\r\nA suicide bomber has killed at least 128 people at a campaign rally in south-western Pakistan - the deadliest attack in the country since 2014.\r\n\r\nA local candidate was among the dead in the Mastung town, police say. So-called Islamic State (IS) claimed the attack.\r\n\r\nEarlier, a bomb attack on a similar rally in the northern town of Bannu killed four people. The attacks come ahead of general elections on 25 July.\r\n\r\nMeanwhile, former PM Nawaz Sharif was arrested after flying home from the UK.\r\n\r\nSharif and his daughter Maryam were taken into custody by officials from the National Accountability Bureau (NAB) after landing in the northern city of Lahore. They were then put on a chartered plane bound for Pakistan\'s capital Islamabad.\r\n\r\nThey were later transferred to a local prison.\r\n', 'ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `news_image`
--

CREATE TABLE `news_image` (
  `news_id` int(11) NOT NULL,
  `news_image` varchar(100) NOT NULL,
  `img_index` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news_image`
--

INSERT INTO `news_image` (`news_id`, `news_image`, `img_index`) VALUES
(1, 'img_1_1.jpg', 1),
(2, 'img_2_1.jpg', 1),
(2, 'img_2_2.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `news_pdf`
--

CREATE TABLE `news_pdf` (
  `news_id` int(11) NOT NULL,
  `news_pdf` varchar(100) NOT NULL,
  `pdf_name` varchar(100) NOT NULL,
  `pdf_index` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news_pdf`
--

INSERT INTO `news_pdf` (`news_id`, `news_pdf`, `pdf_name`, `pdf_index`) VALUES
(2, 'pdf_2_1.pdf', 'Preproject_Proposal-2.pdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news_th`
--

CREATE TABLE `news_th` (
  `news_id` int(11) NOT NULL,
  `create_date` date NOT NULL,
  `last_edit_date` date DEFAULT NULL,
  `topic` varchar(50) CHARACTER SET utf8 NOT NULL,
  `short_description` text CHARACTER SET utf8 NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news_th`
--

INSERT INTO `news_th` (`news_id`, `create_date`, `last_edit_date`, `topic`, `short_description`, `content`) VALUES
(1, '2018-07-03', NULL, 'news_test', 'news_test', 'news_test'),
(2, '2018-07-03', '2018-07-14', 'ฟฟฟฟฟฟฟ', 'A suicide bomber has killed at least 128 people at a campaign rally in south-western Pakistan - the deadliest attack in the country since 2014.\r\n\r\nA local candidate was among the dead in the Mastung town, police say. So-called Islamic State (IS) claimed the attack.\r\nA suicide bomber has killed at least 128 people at a campaign rally in south-western Pakistan - the deadliest attack in the country since 2014.\r\n\r\nA local candidate was among the dead in the Mastung town, police say. So-called Islamic State (IS) claimed the attack.\r\n\r\nEarlier, a bomb attack on a similar rally in the northern town of Bannu killed four people. The attacks come ahead of general elections on 25 July.\r\n\r\nMeanwhile, former PM Nawaz Sharif was arrested after flying home from the UK.\r\n\r\nSharif and his daughter Maryam were taken into custody by officials from the National Accountability Bureau (NAB) after landing in the northern city of Lahore. They were then put on a chartered plane bound for Pakistan\'s capital Islamabad.\r\n\r\nThey were later transferred to a local prison.\r\n\r\n\r\nA suicide bomber has killed at least 128 people at a campaign rally in south-western Pakistan - the deadliest attack in the country since 2014.\r\n\r\nA local candidate was among the dead in the Mastung town, police say. So-called Islamic State (IS) claimed the attack.\r\nA suicide bomber has killed at least 128 people at a campaign rally in south-western Pakistan - the deadliest attack in the country since 2014.\r\n\r\nA local candidate was among the dead in the Mastung town, police say. So-called Islamic State (IS) claimed the attack.\r\n\r\nEarlier, a bomb attack on a similar rally in the northern town of Bannu killed four people. The attacks come ahead of general elections on 25 July.\r\n\r\nMeanwhile, former PM Nawaz Sharif was arrested after flying home from the UK.\r\n\r\nSharif and his daughter Maryam were taken into custody by officials from the National Accountability Bureau (NAB) after landing in the northern city of Lahore. They were then put on a chartered plane bound for Pakistan\'s capital Islamabad.\r\n\r\nThey were later transferred to a local prison.', 'A suicide bomber has killed at least 128 people at a campaign rally in south-western Pakistan - the deadliest attack in the country since 2014.\r\n\r\nA local candidate was among the dead in the Mastung town, police say. So-called Islamic State (IS) claimed the attack.\r\nA suicide bomber has killed at least 128 people at a campaign rally in south-western Pakistan - the deadliest attack in the country since 2014.\r\n\r\nA local candidate was among the dead in the Mastung town, police say. So-called Islamic State (IS) claimed the attack.\r\n\r\nEarlier, a bomb attack on a similar rally in the northern town of Bannu killed four people. The attacks come ahead of general elections on 25 July.\r\n\r\nMeanwhile, former PM Nawaz Sharif was arrested after flying home from the UK.\r\n\r\nSharif and his daughter Maryam were taken into custody by officials from the National Accountability Bureau (NAB) after landing in the northern city of Lahore. They were then put on a chartered plane bound for Pakistan\'s capital Islamabad.\r\n\r\nThey were later transferred to a local prison.\r\n\r\n\r\nA suicide bomber has killed at least 128 people at a campaign rally in south-western Pakistan - the deadliest attack in the country since 2014.\r\n\r\nA local candidate was among the dead in the Mastung town, police say. So-called Islamic State (IS) claimed the attack.\r\nA suicide bomber has killed at least 128 people at a campaign rally in south-western Pakistan - the deadliest attack in the country since 2014.\r\n\r\nA local candidate was among the dead in the Mastung town, police say. So-called Islamic State (IS) claimed the attack.\r\n\r\nEarlier, a bomb attack on a similar rally in the northern town of Bannu killed four people. The attacks come ahead of general elections on 25 July.\r\n\r\nMeanwhile, former PM Nawaz Sharif was arrested after flying home from the UK.\r\n\r\nSharif and his daughter Maryam were taken into custody by officials from the National Accountability Bureau (NAB) after landing in the northern city of Lahore. They were then put on a chartered plane bound for Pakistan\'s capital Islamabad.\r\n\r\nThey were later transferred to a local prison.\r\n\r\nEarlier, a bomb attack on a similar rally in the northern town of Bannu killed four people. The attacks come ahead of general elections on 25 July.\r\n\r\nMeanwhile, former PM Nawaz Sharif was arrested after flying home from the UK.\r\n\r\nSharif and his daughter Maryam were taken into custody by officials from the National Accountability Bureau (NAB) after landing in the northern city of Lahore. They were then put on a chartered plane bound for Pakistan\'s capital Islamabad.\r\n\r\nThey were later transferred to a local prison.\r\n\r\nThe three-term PM was ousted last year after a corruption investigation. Last week he was sentenced in absentia to 10 years in prison.\r\n\r\nHe has accused Pakistan\'s powerful security establishment of conspir');

-- --------------------------------------------------------

--
-- Table structure for table `occupation`
--

CREATE TABLE `occupation` (
  `id` int(11) NOT NULL,
  `name_en` varchar(100) CHARACTER SET utf8 NOT NULL,
  `name_ch` varchar(100) CHARACTER SET utf8 NOT NULL,
  `name_th` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `occupation`
--

INSERT INTO `occupation` (`id`, `name_en`, `name_ch`, `name_th`) VALUES
(0, 'Other', 'Other', 'อื่นๆ'),
(1, 'Business Owner', 'Business Owner', 'เจ้าของธุรกิจ'),
(2, 'Employee', 'Employee', 'พนักงานจ้าง'),
(3, 'University Lecturer', 'University Lecturer', 'อาจารย์มหาวิทยาลัย'),
(4, 'Manager', 'Manager', 'ผู้จัดการ'),
(5, 'Government Officer', 'Government Officer', 'ข้าราชการ'),
(6, 'Doctor', 'Doctor', 'หมอ'),
(7, 'Researcher', 'Researcher', 'นักวิจัย'),
(8, 'Store Owner', 'Store Owner', 'เจ้าของร้านขายของ');

-- --------------------------------------------------------

--
-- Table structure for table `page_about`
--

CREATE TABLE `page_about` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `english` varchar(50) CHARACTER SET utf8 NOT NULL,
  `chinese` varchar(50) CHARACTER SET utf8 NOT NULL,
  `thai` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_about`
--

INSERT INTO `page_about` (`id`, `name`, `english`, `chinese`, `thai`) VALUES
(1, 'name', 'Chiangmai Hong Thai Business Consultant', '清迈宏泰旅游公司商业领域', 'บริษัท เชียงใหม่ หงส์ไทย บิสซิเนส แอนด์ คอนซัลแตนท์ เอ็นเตอร์ไพรซ์ จำกัด'),
(2, 'contact', 'Contact Us', '联系方式', 'ติดต่อเรา'),
(3, 'wechat', 'WeChat : 591198421 or HTCE888', '微信: 591198421 或 HTCE888', 'WeChat : 591198421 หรือ HTCE888'),
(4, 'tel', 'Tel: 081-025-0351', '电话号码: 081-025-0351', 'เบอร์โทรติดต่อ: 081-025-0351'),
(5, 'email', 'Email: chiangmaihongthai@hotmail.com', '邮箱: chiangmaihongthai@hotmail.com', 'Email: chiangmaihongthai@hotmail.com'),
(6, 'title', 'About Us', '关于我们', 'เกี่ยวกับเรา'),
(7, 'about_content', 'en', 'ch', 'th');

-- --------------------------------------------------------

--
-- Table structure for table `page_admin_login`
--

CREATE TABLE `page_admin_login` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `english` varchar(50) CHARACTER SET utf8 NOT NULL,
  `chinese` varchar(50) CHARACTER SET utf8 NOT NULL,
  `thai` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_admin_login`
--

INSERT INTO `page_admin_login` (`id`, `name`, `english`, `chinese`, `thai`) VALUES
(1, 'username', 'Username', '用户名', 'ชื่อผู้ใช้งาน'),
(2, 'password', 'Password', '密码', 'รหัสผ่าน'),
(3, 'forgot_password', 'Forgot your password', '忘记密码', 'ลืมรหัสผ่าน'),
(4, 'login', 'Login (Admin)', '登录 (Admin)', 'ลงชื่อเข้าใช้ (Admin)'),
(5, 'btn_login', 'Login', '登录', 'ลงชื่อเข้าใช้'),
(6, 'title', 'Login', '登录', 'ลงชื่อเข้าใช้'),
(1, 'username', 'Username', '用户名', 'ชื่อผู้ใช้งาน'),
(2, 'password', 'Password', '密码', 'รหัสผ่าน'),
(3, 'forgot_password', 'Forgot your password', '忘记密码', 'ลืมรหัสผ่าน'),
(4, 'login', 'Login (Admin)', '登录 (Admin)', 'ลงชื่อเข้าใช้ (Admin)'),
(5, 'btn_login', 'Login', '登录', 'ลงชื่อเข้าใช้'),
(6, 'title', 'Login', '登录', 'ลงชื่อเข้าใช้');

-- --------------------------------------------------------

--
-- Table structure for table `page_change_email`
--

CREATE TABLE `page_change_email` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `english` varchar(50) CHARACTER SET utf8 NOT NULL,
  `chinese` varchar(50) CHARACTER SET utf8 NOT NULL,
  `thai` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_change_email`
--

INSERT INTO `page_change_email` (`id`, `name`, `english`, `chinese`, `thai`) VALUES
(1, 'title', 'Change Email', 'Change Email', 'เปลี่ยนอีเมล'),
(2, 'change_email', 'Change Email', 'Change Email', 'เปลี่ยนอีเมล'),
(3, 'email', 'Email', 'Email', 'อีเมล'),
(4, 'email_placeholder', 'Enter your new Email', 'Enter your new Email', 'อีเมลใหม่'),
(5, 'confirm_email', 'Confirm Email', 'Confirm Email', 'ยืนยันอีเมลใหม่'),
(6, 'confirm_email_placeholder', 'Confirm your Email', 'Confirm your Email', 'ยืนยันอีเมลใหม่'),
(7, 'email_match', 'Email Match', 'Email Match', 'อีเมลตรงกัน'),
(8, 'email_not_match', 'Email Do Not Match', 'Email Do Not Match', 'อีเมลไม่ตรงกัน'),
(9, 'save', 'Save', 'Save', 'บันทึก'),
(10, 'cancel', 'Cancel', 'Cancel', 'ยกเลิก');

-- --------------------------------------------------------

--
-- Table structure for table `page_change_password`
--

CREATE TABLE `page_change_password` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `english` varchar(50) CHARACTER SET utf8 NOT NULL,
  `chinese` varchar(50) CHARACTER SET utf8 NOT NULL,
  `thai` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_change_password`
--

INSERT INTO `page_change_password` (`id`, `name`, `english`, `chinese`, `thai`) VALUES
(1, 'title', 'Change Password', 'Change Password', 'เปลี่ยนรหัสผ่าน'),
(2, 'change_password', 'Change Password', 'Change Password', 'เปลี่ยนรหัสผ่าน'),
(3, 'password', 'Password', 'Password', 'รหัสผ่าน'),
(4, 'password_placeholder', 'Current Password', 'Current Password', 'รหัสผ่านปัจจุบัน'),
(5, 'new_password', 'New Password', 'New Password', 'รหัสผ่านใหม่'),
(6, 'new_password_placeholder', 'Please enter new password', 'Please enter new password', 'กรอกรหัสผ่านใหม่'),
(7, 'confirm_password', 'Confirm Password', 'Confirm Password', 'ยืนยันรหัสผ่าน'),
(8, 'confirm_password_placeholder', 'Confirm your new password', 'Confirm your new password', 'ยืนยันรหัสผ่านใหม่'),
(9, 'save', 'Save', 'Save', 'บันทึก'),
(10, 'cancel', 'Cancel', 'Cancel', 'ยกเลิก');

-- --------------------------------------------------------

--
-- Table structure for table `page_edit_profile`
--

CREATE TABLE `page_edit_profile` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `english` varchar(50) CHARACTER SET utf8 NOT NULL,
  `chinese` varchar(50) CHARACTER SET utf8 NOT NULL,
  `thai` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_edit_profile`
--

INSERT INTO `page_edit_profile` (`id`, `name`, `english`, `chinese`, `thai`) VALUES
(1, 'account_info', 'Account information', '账号信息', 'ข้อมูลเกี่ยวกับบัญชี'),
(2, 'confirm_password', 'Confirm password', '再次确认密码', 'ยืนยันรหัสผ่าน'),
(3, 'personal_info', 'Personal information', '个人信息', 'ข้อมูลส่วนบุคคล'),
(4, 'first_name', 'First name', '姓氏', 'ชื่อ'),
(5, 'middle_name', 'Middle name', '名字的中间的那个字', 'ชื่อกลาง'),
(6, 'last_name', 'Last name', '名字的最后一个字', 'นามสกุล'),
(7, 'birth', 'Birthday', '出生日期', 'วันเกิด'),
(8, 'occupation', 'Occupation', '职业', 'อาชีพ'),
(9, 'salary', 'Salary', '收入', 'รายได้'),
(10, 'mail', 'E-mail', '邮箱号', 'E-mail'),
(11, 'country_code', 'Country code', '城市编码', 'รหัสประเทศ'),
(12, 'tel', 'Telephone Number', '电话号码', 'หมายเลขโทรศัพท์'),
(13, 'address', 'Address', '地址', 'ที่อยุ่'),
(14, 'city', 'City', '城市', 'เมือง'),
(15, 'province', 'Province', '省份', 'จังหวัด'),
(16, 'zipcode', 'Zipcode', '邮政编码', 'รหัสไปรษณีย์'),
(17, 'cancel', 'Cancel', '取消', 'ยกเลิก'),
(18, 'save', 'Save', '保存', 'บันทึก'),
(19, 'register', 'Save', '注册', 'สมัครสมาชิก'),
(20, 'username', 'Username', '用户名', 'ชื่อผู้ใช้งาน'),
(21, 'password', 'Password', '密码', 'รหัสผ่าน'),
(22, 'title', 'Edit profile', 'Edit profile', 'แก้ไขข้อมูลสมาชิก'),
(23, 'please_select', 'Please select', 'Please select', 'โปรดเลือก'),
(24, 'profile', 'Profile', 'Profile', 'ข้อมูลส่วนตัว');

-- --------------------------------------------------------

--
-- Table structure for table `page_footer`
--

CREATE TABLE `page_footer` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `english` varchar(100) CHARACTER SET utf8 NOT NULL,
  `chinese` varchar(50) CHARACTER SET utf8 NOT NULL,
  `thai` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_footer`
--

INSERT INTO `page_footer` (`id`, `name`, `english`, `chinese`, `thai`) VALUES
(1, 'contact', 'Contact Us', '联系方式', 'ติดต่อเรา'),
(2, 'wechat', 'WeChat : 591198421 or HTCE888', '微信: 591198421 或 HTCE888', 'WeChat : 591198421 หรือ HTCE888'),
(3, 'tel', 'Tel: 081-025-0351', '电话号码: 081-025-0351', 'เบอร์โทรติดต่อ: 081-025-0351'),
(4, 'email', 'Email: chiangmaihongthai@hotmail.com', '邮箱: chiangmaihongthai@hotmail.com', 'Email: chiangmaihongthai@hotmail.com'),
(5, 'address_cont', 'Chiang Mai Hong Thai Sri  Don Chai road  Phra Singha  Distrct Aurmphoe Mueang Chiang Mai Thailand', '泰国清迈八佛区席东差路 清迈宏泰旅游公司', 'ถนนศรีดอนชัย ตำบลพระสิงห์ อำเภอเมือง จังหวัดเชียงใหม่ ประเทศไทย'),
(6, 'address', 'Address', '地址', 'ที่อยู่'),
(7, 'name', 'Chiang Mai Hong Thai', '清迈宏泰旅游公司商业领域', 'เชียงใหม่ หงส์ไทย ทัวร์'),
(8, 'wechat_qr', 'WeChat QR code', '微信: 二维码', 'WeChat QR code');

-- --------------------------------------------------------

--
-- Table structure for table `page_header`
--

CREATE TABLE `page_header` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `english` varchar(50) CHARACTER SET utf8 NOT NULL,
  `chinese` varchar(50) CHARACTER SET utf8 NOT NULL,
  `thai` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_header`
--

INSERT INTO `page_header` (`id`, `name`, `english`, `chinese`, `thai`) VALUES
(1, 'home', 'Home', '主页', 'หน้าหลัก'),
(2, 'meeting', 'Meeting Tour', '会议旅游', 'การจัดประชุมองค์กร'),
(3, 'incentive', 'Incentive Tour', '奖励旅游', 'ท่องเที่ยวเพื่อเป็นรางวัล'),
(4, 'convention', 'Convention Tour', '专题会晤旅游', 'การประชุมนานาชาติ'),
(5, 'exhibition', 'Exhibition Tour', '会展旅游', 'งานจัดแสดงสินค้า'),
(6, 'business', 'Business Tour', '商务旅游', 'การประชุมเชิงธุรกิจ'),
(7, 'about', 'About Us', '关于我们', 'เกี่ยวกับเรา'),
(8, 'login', 'Sign In', '登录', 'ลงชื่อเข้าใช้'),
(9, 'register', 'Register', '注册', 'สมัครสมาชิก'),
(10, 'logout', 'Sign Out', '登出', 'ออกจากระบบ'),
(11, 'name', 'Chiangmai HongThai', '清迈宏泰旅游公司商业领域', 'เชียงใหม่ หงส์ไทย ทัวร์'),
(12, 'manage', 'Manage', 'Manage', 'จัดการ'),
(13, 'other', 'Other Tours', '其他旅游', 'ทัวร์อื่นๆ');

-- --------------------------------------------------------

--
-- Table structure for table `page_index`
--

CREATE TABLE `page_index` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `english` varchar(50) CHARACTER SET utf8 NOT NULL,
  `chinese` varchar(50) CHARACTER SET utf8 NOT NULL,
  `thai` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_index`
--

INSERT INTO `page_index` (`id`, `name`, `english`, `chinese`, `thai`) VALUES
(1, 'title', 'Chiang Mai Hong Thai', '清迈宏泰旅游公司商业领域', 'บริษัท เชียงใหม่หงส์ไทย ทัวร์'),
(2, 'announcement', 'Announcement', '布告', 'ประกาศ'),
(3, 'news', 'News', '新闻', 'ข่าวสาร'),
(4, 'announcement_content', 'English English English English English English En', 'Chinese English English English English English En', 'Thai t English English English English English Eng'),
(5, 'readmore', 'Read More', 'Read More', 'Read More');

-- --------------------------------------------------------

--
-- Table structure for table `page_login`
--

CREATE TABLE `page_login` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `english` varchar(50) CHARACTER SET utf8 NOT NULL,
  `chinese` varchar(50) CHARACTER SET utf8 NOT NULL,
  `thai` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_login`
--

INSERT INTO `page_login` (`id`, `name`, `english`, `chinese`, `thai`) VALUES
(1, 'username', 'Username', '用户名', 'ชื่อผู้ใช้งาน'),
(2, 'password', 'Password', '密码', 'รหัสผ่าน'),
(5, 'forgot_password', 'Forgot your password', '忘记密码', 'ลืมรหัสผ่าน'),
(6, 'login', 'Login', '登录', 'ลงชื่อเข้าใช้'),
(7, 'register', 'Register', '注册', 'สมัครสมาชิก'),
(8, 'title', 'Login (Admin)', '登录 (Admin)', 'ลงชื่อเข้าใช้ (Admin)');

-- --------------------------------------------------------

--
-- Table structure for table `page_profile`
--

CREATE TABLE `page_profile` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `english` varchar(50) CHARACTER SET utf8 NOT NULL,
  `chinese` varchar(50) CHARACTER SET utf8 NOT NULL,
  `thai` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_profile`
--

INSERT INTO `page_profile` (`id`, `name`, `english`, `chinese`, `thai`) VALUES
(1, 'title', 'Edit profile', 'Edit profile', 'แก้ไขข้อมูลสมาชิก'),
(2, 'profile', 'Profile', 'Profile', 'ข้อมูลส่วนตัว'),
(3, 'account_info', 'Account information', '账号信息', 'ข้อมูลเกี่ยวกับบัญชี'),
(4, 'personal_info', 'Personal information', '个人信息', 'ข้อมูลส่วนบุคคล'),
(5, 'username', 'Username', '用户名', 'ชื่อผู้ใช้'),
(6, 'first_name', 'First name', '姓氏', 'ชื่อ'),
(7, 'middle_name', 'Middle name', '名字的中间的那个字', 'ชื่อกลาง'),
(8, 'last_name', 'Last name', '名字的最后一个字', 'นามสกุล'),
(9, 'birth', 'Birthday', '出生日期', 'วันเกิด'),
(10, 'tel', 'Contact No.', '电话号码', 'หมายเลขโทรศัพท์'),
(11, 'edit_profile', 'Edit Profile', 'Edit Profile', 'แก้ไขข้อมูล'),
(12, 'change_password', 'Change Password', 'Change Password', 'เปลี่ยนรหัสผ่าน'),
(13, 'change_email', 'Change Email', 'Change Email', 'เปลี่ยนอีเมล');

-- --------------------------------------------------------

--
-- Table structure for table `page_register`
--

CREATE TABLE `page_register` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `english` varchar(50) CHARACTER SET utf8 NOT NULL,
  `chinese` varchar(50) CHARACTER SET utf8 NOT NULL,
  `thai` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_register`
--

INSERT INTO `page_register` (`id`, `name`, `english`, `chinese`, `thai`) VALUES
(1, 'account_info', 'Account information', '账号信息', 'ข้อมูลเกี่ยวกับบัญชี'),
(2, 'confirm_password', 'Confirm password', '再次确认密码', 'ยืนยันรหัสผ่าน'),
(3, 'personal_info', 'Personal information', '个人信息', 'ข้อมูลส่วนบุคคล'),
(4, 'first_name', 'First name', '姓氏', 'ชื่อ'),
(5, 'middle_name', 'Middle name', '名字的中间的那个字', 'ชื่อกลาง'),
(6, 'last_name', 'Last name', '名字的最后一个字', 'นามสกุล'),
(7, 'birth', 'Birthday', '出生日期', 'วันเกิด'),
(8, 'occupation', 'Occupation', '职业', 'อาชีพ'),
(9, 'salary', 'Salary', '收入', 'รายได้'),
(10, 'mail', 'E-mail', '邮箱号', 'E-mail'),
(11, 'country_code', 'Country code', '城市编码', 'รหัสประเทศ'),
(12, 'tel', 'Telephone Number', '电话号码', 'หมายเลขโทรศัพท์'),
(13, 'address', 'Address', '地址', 'ที่อยุ่'),
(14, 'city', 'City', '城市', 'เมือง'),
(15, 'province', 'Province', '省份', 'จังหวัด'),
(16, 'zipcode', 'Zipcode', '邮政编码', 'รหัสไปรษณีย์'),
(17, 'cancel', 'Cancel', '取消', 'ยกเลิก'),
(18, 'signup', 'Sign Up', '保存', 'ลงทะเบียน'),
(19, 'register', 'Save', '注册', 'สมัครสมาชิก'),
(20, 'username', 'Username', '用户名', 'ชื่อผู้ใช้งาน'),
(21, 'password', 'Password', '密码', 'รหัสผ่าน'),
(22, 'title', 'Registration', '注册', 'สมัครสมาชิก'),
(23, 'please_select', 'Please select', 'Please select', 'โปรดเลือก');

-- --------------------------------------------------------

--
-- Table structure for table `page_static_meeting`
--

CREATE TABLE `page_static_meeting` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `english` varchar(100) CHARACTER SET utf8 NOT NULL,
  `chinese` varchar(100) CHARACTER SET utf8 NOT NULL,
  `thai` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_static_meeting`
--

INSERT INTO `page_static_meeting` (`id`, `name`, `english`, `chinese`, `thai`) VALUES
(1, 'title', 'Meeting Tours', '会议旅游', 'การจัดประชุมองค์กรณ์'),
(2, 'type1', 'Package for New Employee training Meeting + Travelling (6 days)', '新员工培训会议 + 旅游（6天）', 'การฝึกอบรมลูกจ้าง (6วัน)'),
(3, 'type2', 'Package for New Product introduction meeting + Travelling (6 days)', '新产品介绍会议 + 旅游（6天）', 'การประชุมแนะนำสินค้าใหม่ (6วัน)'),
(4, 'type3', 'Package for department meeting + Travelling (6 Days)', '部门会议 + 旅游（6天）', 'การประชุมหน่วยงาน (6วัน)');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(11) NOT NULL,
  `name_en` varchar(100) CHARACTER SET utf8 NOT NULL,
  `name_ch` varchar(100) CHARACTER SET utf8 NOT NULL,
  `name_th` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `name_en`, `name_ch`, `name_th`) VALUES
(1, '0 - 10,000 THB/month', '0 - 10,000 CNY/month', '0 - 10,000 บาท/เดือน'),
(2, '10,001 - 15,000 THB/month', '10,001 - 15,000 THB/month', '10,001 - 15,000 THB/month'),
(3, '15,001 - 20,000 THB/month', '15,001 - 20,000 THB/month', '15,001 - 20,000 THB/month'),
(4, '20,001 - 25,000 THB/month', '20,001 - 25,000 THB/month', '20,001 - 25,000 THB/month'),
(5, '25,001 - 30,000 THB/month', '25,001 - 30,000 THB/month', '25,001 - 30,000 THB/month'),
(6, '30,001 - 35,000 THB/month', '30,001 - 35,000 THB/month', '30,001 - 35,000 THB/month'),
(7, '35,001 - 40,000 THB/month', '35,001 - 40,000 THB/month', '35,001 - 40,000 THB/month'),
(8, 'more than 40,001 THB/month', 'more than 40,001 THB/month', 'มากกว่า 40,001 บาท/เดือน');

-- --------------------------------------------------------

--
-- Table structure for table `tour_accommodation`
--

CREATE TABLE `tour_accommodation` (
  `tour_id` int(11) NOT NULL,
  `accommodation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tour_accommodation`
--

INSERT INTO `tour_accommodation` (`tour_id`, `accommodation_id`) VALUES
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(3, 5),
(4, 1),
(4, 2),
(4, 4),
(4, 5),
(1, 1),
(1, 2),
(1, 4),
(1, 5),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(3, 1),
(4, 4),
(16, 1),
(17, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tour_booking_history`
--

CREATE TABLE `tour_booking_history` (
  `id` int(11) NOT NULL,
  `reference_code` varchar(50) NOT NULL,
  `member_id` int(11) NOT NULL,
  `tour_round_id` int(11) NOT NULL,
  `departure_id` int(11) NOT NULL,
  `dropoff_id` int(11) NOT NULL,
  `net_price` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `uploaded_file` varchar(50) NOT NULL,
  `booking_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `note` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tour_booking_history`
--

INSERT INTO `tour_booking_history` (`id`, `reference_code`, `member_id`, `tour_round_id`, `departure_id`, `dropoff_id`, `net_price`, `status`, `uploaded_file`, `booking_date`, `expiry_date`, `note`) VALUES
(14, 'cc401112', 2, 40, 0, 0, 0, 3, 'cc401112.jpg', '2018-07-02', '0000-00-00', ''),
(15, 'cb212982', 2, 40, 0, 0, 0, 1, '', '2018-07-03', '0000-00-00', ''),
(16, '54aecabe', 2, 40, 0, 0, 0, 1, '', '2018-07-03', '0000-00-00', ''),
(18, '001714e8', 2, 39, 0, 0, 0, 3, '001714e8.jpg', '2018-07-03', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `tour_ch`
--

CREATE TABLE `tour_ch` (
  `tour_id` int(11) NOT NULL,
  `tour_description` varchar(300) CHARACTER SET utf8 NOT NULL,
  `highlight` varchar(300) CHARACTER SET utf8 NOT NULL,
  `region` varchar(100) CHARACTER SET utf8 NOT NULL,
  `province` varchar(100) CHARACTER SET utf8 NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `max_customer` int(11) NOT NULL,
  `rating` decimal(10,0) NOT NULL DEFAULT '100',
  `available_seat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tour_ch`
--

INSERT INTO `tour_ch` (`tour_id`, `tour_description`, `highlight`, `region`, `province`, `price`, `max_customer`, `rating`, `available_seat`) VALUES
(16, 'tour_test', 'somewhere', 'Northern', 'Chiang Mai', '123', 2, '100', 0),
(17, 'tour_test2', 'tour_test2', 'Northern', 'Chiang Mai', '123', 10, '100', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tour_en`
--

CREATE TABLE `tour_en` (
  `tour_id` int(11) NOT NULL,
  `tour_description` varchar(300) CHARACTER SET utf8 NOT NULL,
  `highlight` varchar(300) CHARACTER SET utf8 NOT NULL,
  `region` varchar(100) CHARACTER SET utf8 NOT NULL,
  `province` varchar(100) CHARACTER SET utf8 NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `max_customer` int(11) NOT NULL,
  `rating` decimal(10,0) NOT NULL DEFAULT '100',
  `available_seat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tour_en`
--

INSERT INTO `tour_en` (`tour_id`, `tour_description`, `highlight`, `region`, `province`, `price`, `max_customer`, `rating`, `available_seat`) VALUES
(16, 'tour_test', 'somewhere', 'Northern', 'Chiang Mai', '123', 2, '100', 0),
(17, 'tour_test2', 'tour_test2', 'Northern', 'Chiang Mai', '123', 10, '100', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tour_image`
--

CREATE TABLE `tour_image` (
  `tour_id` int(11) NOT NULL,
  `img1` varchar(20) NOT NULL,
  `img2` varchar(20) NOT NULL,
  `img3` varchar(20) NOT NULL,
  `img4` varchar(20) NOT NULL,
  `img5` varchar(20) NOT NULL,
  `img6` varchar(20) NOT NULL,
  `img7` varchar(20) NOT NULL,
  `img8` varchar(20) NOT NULL,
  `img9` varchar(20) NOT NULL,
  `img10` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tour_image`
--

INSERT INTO `tour_image` (`tour_id`, `img1`, `img2`, `img3`, `img4`, `img5`, `img6`, `img7`, `img8`, `img9`, `img10`) VALUES
(2, '2_1.jpg', '', '', '', '', '', '', '', '', ''),
(3, '3_1.jpg', '3_2.jpg', '', '', '', '', '', '', '', ''),
(4, '', '', '', '', '', '', '', '', '', ''),
(1, '1_1.jpg', '', '', '', '', '', '', '', '', ''),
(2, '', '', '', '', '', '', '', '', '', ''),
(3, '', '', '', '', '', '', '', '', '', ''),
(4, '', '', '', '', '', '', '', '', '', ''),
(16, '16_1.jpg', '', '', '', '', '', '', '', '', ''),
(17, '17_1.jpg', '', '', '', '', '', '', '', '', '');

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

-- --------------------------------------------------------

--
-- Table structure for table `tour_round`
--

CREATE TABLE `tour_round` (
  `tour_round_id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `trip_status` varchar(50) NOT NULL,
  `start_date_time` date NOT NULL,
  `end_date_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tour_round`
--

INSERT INTO `tour_round` (`tour_round_id`, `tour_id`, `trip_status`, `start_date_time`, `end_date_time`) VALUES
(38, 16, '', '2018-07-03', '2018-07-03'),
(39, 17, '', '2018-07-03', '2018-07-03'),
(40, 17, '', '2018-07-03', '2018-09-03');

-- --------------------------------------------------------

--
-- Table structure for table `tour_round_member`
--

CREATE TABLE `tour_round_member` (
  `tour_round_member_id` int(11) NOT NULL,
  `reference_code` varchar(200) NOT NULL,
  `first_name` varchar(60) NOT NULL,
  `middle_name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `dob` date NOT NULL,
  `country_code` int(11) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `address` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `city` varchar(60) NOT NULL,
  `province` varchar(60) NOT NULL,
  `zipcode` int(11) NOT NULL,
  `passport_id` varchar(50) NOT NULL,
  `reservation_age` varchar(50) NOT NULL,
  `avoid_food` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tour_round_member`
--

INSERT INTO `tour_round_member` (`tour_round_member_id`, `reference_code`, `first_name`, `middle_name`, `last_name`, `dob`, `country_code`, `phone`, `email`, `address`, `city`, `province`, `zipcode`, `passport_id`, `reservation_age`, `avoid_food`) VALUES
(21, 'cc401112', 'kritsanah', '', 'suppasree', '2018-07-02', 66, 846256256, 'zgmfstike@gmail.com', '88/8 room 409 mueng suthep puvaraplace', 'Chiangmai', 'ChiangMai', 50200, '1929900553039', 'Adult', ''),
(22, 'cb212982', 'kritsanahwdsadadasd', '', 'supphasri', '2018-07-02', 66, 846256256, 'zgmfsasdasdsadike@gmail.com', '88/8, suthep', 'mueng', 'ChiangMai', 50200, '1929900553039', 'Child', ''),
(23, '54aecabe', 'naenae', 'naenae', 'naenae', '2018-07-12', 555, 846256256, 'zgmfsrike@gmail.com', '88/8 room 409 mueng suthep puvaraplace', 'Chiangmai', 'Chiangmai', 50200, 'asdasdasd', 'Child', ''),
(24, '54aecabe', 'aaaa', 'aaaa', 'aaaaaaa', '2018-03-22', 555, 846256256, 'zgmfstike@gmail.cotm', '1111', 'sw', 'wwa', 12345, '5555555555555555', 'Adult', 'chicker'),
(25, '001714e8', 'kritsanah', 'aaaa', 'suppasree', '2018-03-22', 555, 846256256, 'zgmfstike@gmail.com', '88/8 room 409 mueng suthep puvaraplace', 'Chiangmai', 'ChiangMai', 50200, '1929900553039', 'Adult', 'fish');

-- --------------------------------------------------------

--
-- Table structure for table `tour_schedule`
--

CREATE TABLE `tour_schedule` (
  `schedule_id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `file_name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tour_th`
--

CREATE TABLE `tour_th` (
  `tour_id` int(11) NOT NULL,
  `tour_description` varchar(300) CHARACTER SET utf8 NOT NULL,
  `highlight` varchar(300) CHARACTER SET utf8 NOT NULL,
  `region` varchar(100) CHARACTER SET utf8 NOT NULL,
  `province` varchar(100) CHARACTER SET utf8 NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `max_customer` int(11) NOT NULL,
  `rating` decimal(10,0) NOT NULL DEFAULT '100',
  `available_seat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tour_th`
--

INSERT INTO `tour_th` (`tour_id`, `tour_description`, `highlight`, `region`, `province`, `price`, `max_customer`, `rating`, `available_seat`) VALUES
(16, 'tour_test', 'somewhere', 'Northern', 'Chiang Mai', '123', 2, '100', 0),
(17, 'tour_test2', 'tour_test2', 'Northern', 'Chiang Mai', '123', 10, '100', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tour_tour_type`
--

CREATE TABLE `tour_tour_type` (
  `tour_id` int(11) NOT NULL,
  `tour_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tour_tour_type`
--

INSERT INTO `tour_tour_type` (`tour_id`, `tour_type_id`) VALUES
(16, 1),
(17, 1),
(17, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tour_type`
--

CREATE TABLE `tour_type` (
  `tour_type_id` int(11) NOT NULL,
  `tour_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tour_type`
--

INSERT INTO `tour_type` (`tour_type_id`, `tour_type`) VALUES
(1, 'Casual'),
(2, 'Meeting'),
(3, 'Incentive'),
(4, 'Convention'),
(5, 'Exhibition'),
(6, 'Business');

-- --------------------------------------------------------

--
-- Table structure for table `tour_vehicle_type`
--

CREATE TABLE `tour_vehicle_type` (
  `tour_id` int(11) NOT NULL,
  `vehicle_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tour_vehicle_type`
--

INSERT INTO `tour_vehicle_type` (`tour_id`, `vehicle_type_id`) VALUES
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(4, 1),
(4, 2),
(4, 4),
(1, 1),
(1, 2),
(1, 4),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(3, 1),
(4, 1),
(16, 1),
(17, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_type`
--

CREATE TABLE `vehicle_type` (
  `vehicle_type_id` int(11) NOT NULL,
  `vehicle_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle_type`
--

INSERT INTO `vehicle_type` (`vehicle_type_id`, `vehicle_type`) VALUES
(1, '4-seat'),
(2, '9-seat'),
(3, '14-seat'),
(4, 'VIP');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accommodation`
--
ALTER TABLE `accommodation`
  ADD PRIMARY KEY (`accommodation_id`);

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_status`
--
ALTER TABLE `booking_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departure_location`
--
ALTER TABLE `departure_location`
  ADD PRIMARY KEY (`departure_id`);

--
-- Indexes for table `dropoff_location`
--
ALTER TABLE `dropoff_location`
  ADD PRIMARY KEY (`dropoff_id`);

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
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_ch`
--
ALTER TABLE `message_ch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_dummy`
--
ALTER TABLE `message_dummy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_en`
--
ALTER TABLE `message_en`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_th`
--
ALTER TABLE `message_th`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `news_ch`
--
ALTER TABLE `news_ch`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `news_en`
--
ALTER TABLE `news_en`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `news_image`
--
ALTER TABLE `news_image`
  ADD KEY `news_id` (`news_id`);

--
-- Indexes for table `news_pdf`
--
ALTER TABLE `news_pdf`
  ADD KEY `news_id` (`news_id`);

--
-- Indexes for table `news_th`
--
ALTER TABLE `news_th`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `occupation`
--
ALTER TABLE `occupation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_about`
--
ALTER TABLE `page_about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_change_email`
--
ALTER TABLE `page_change_email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_change_password`
--
ALTER TABLE `page_change_password`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_edit_profile`
--
ALTER TABLE `page_edit_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_footer`
--
ALTER TABLE `page_footer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_header`
--
ALTER TABLE `page_header`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_index`
--
ALTER TABLE `page_index`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_login`
--
ALTER TABLE `page_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_profile`
--
ALTER TABLE `page_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_register`
--
ALTER TABLE `page_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_static_meeting`
--
ALTER TABLE `page_static_meeting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_accommodation`
--
ALTER TABLE `tour_accommodation`
  ADD KEY `tour_id` (`tour_id`) USING BTREE,
  ADD KEY `accommodation_id` (`accommodation_id`);

--
-- Indexes for table `tour_booking_history`
--
ALTER TABLE `tour_booking_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_ch`
--
ALTER TABLE `tour_ch`
  ADD PRIMARY KEY (`tour_id`);

--
-- Indexes for table `tour_en`
--
ALTER TABLE `tour_en`
  ADD PRIMARY KEY (`tour_id`);

--
-- Indexes for table `tour_meeting`
--
ALTER TABLE `tour_meeting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_round`
--
ALTER TABLE `tour_round`
  ADD PRIMARY KEY (`tour_round_id`);

--
-- Indexes for table `tour_round_member`
--
ALTER TABLE `tour_round_member`
  ADD PRIMARY KEY (`tour_round_member_id`);

--
-- Indexes for table `tour_schedule`
--
ALTER TABLE `tour_schedule`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `tour_th`
--
ALTER TABLE `tour_th`
  ADD PRIMARY KEY (`tour_id`);

--
-- Indexes for table `tour_type`
--
ALTER TABLE `tour_type`
  ADD PRIMARY KEY (`tour_type_id`);

--
-- Indexes for table `vehicle_type`
--
ALTER TABLE `vehicle_type`
  ADD PRIMARY KEY (`vehicle_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `booking_status`
--
ALTER TABLE `booking_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `departure_location`
--
ALTER TABLE `departure_location`
  MODIFY `departure_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dropoff_location`
--
ALTER TABLE `dropoff_location`
  MODIFY `dropoff_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `feedback_question`
--
ALTER TABLE `feedback_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `message_ch`
--
ALTER TABLE `message_ch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `message_dummy`
--
ALTER TABLE `message_dummy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `message_en`
--
ALTER TABLE `message_en`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `message_th`
--
ALTER TABLE `message_th`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `news_ch`
--
ALTER TABLE `news_ch`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `news_en`
--
ALTER TABLE `news_en`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `news_th`
--
ALTER TABLE `news_th`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `occupation`
--
ALTER TABLE `occupation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `page_about`
--
ALTER TABLE `page_about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `page_footer`
--
ALTER TABLE `page_footer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `page_header`
--
ALTER TABLE `page_header`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `page_index`
--
ALTER TABLE `page_index`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `page_login`
--
ALTER TABLE `page_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `page_profile`
--
ALTER TABLE `page_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `page_register`
--
ALTER TABLE `page_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `page_static_meeting`
--
ALTER TABLE `page_static_meeting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tour_booking_history`
--
ALTER TABLE `tour_booking_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tour_ch`
--
ALTER TABLE `tour_ch`
  MODIFY `tour_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tour_en`
--
ALTER TABLE `tour_en`
  MODIFY `tour_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tour_meeting`
--
ALTER TABLE `tour_meeting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tour_round`
--
ALTER TABLE `tour_round`
  MODIFY `tour_round_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `tour_round_member`
--
ALTER TABLE `tour_round_member`
  MODIFY `tour_round_member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `tour_schedule`
--
ALTER TABLE `tour_schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tour_th`
--
ALTER TABLE `tour_th`
  MODIFY `tour_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
