-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2017 at 06:53 AM
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
(1, 'asdfghj', '$2y$10$nEshXXiYm0orI2SyEXKVnO3V7S4KOOA45tRQCTdRNRAAwE34/Eedi', 'asdf', 'asdf', 'asdf', '2017-10-13', 66, '252626281', 'nayzaa200@hotmail.com', '241 moo.9 subdis.Sansai luang, dis.Sansai', 'CMCMCMCM', 'ChiangMai-', '50210', 1, 1, 1, '4edaa105d5f53590338791951e38c3ad'),
(2, 'arg', '$2y$10$F0LXFo4FDyWBrpxqrewTe.Cy/pV7OPdxgcOpfIZ4wcu.2iIzRFZz6', 'sssssweqweqwwdsassdadasdsada', 'ssssssdadsadad', 'sssss', '2017-11-16', 66, '846256256', 'zgmfDWSDAike@gmail.com', '88/8, suthepssssss', 'chiangmaisssss', 'chiangmai', '50200', 8, 7, 1, '60495b4e033e9f60b32a6607b587aadd'),
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
(15, 'ffff', '$2y$10$cYuOpX4op2r4oJR63/5L.ONUE584Nl9tY5aStSB6fxQki0BZDF7C2', 'kritsanah', '', 'supphasri', '2017-10-28', 66, '846256256', 'zgmfsrike@gmail.com', '88/8, suthep', 'chiangmai', 'chiangmai', '50200', 4, 4, 1, '95d309f0b035d97f69902e7972c2b2e6');

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

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `create_date`, `last_edit_date`, `topic`, `short_description`, `content`) VALUES
(1, '2017-12-16', NULL, 'test1', 'sadsadsadsad', ''),
(7, '2017-12-17', NULL, 'sdadasd', 'adasdasdaasdads', ''),
(8, '2017-12-17', NULL, 'sdadasd', 'adasdasdaasdads', ''),
(9, '2017-12-17', NULL, 'sdadasd', 'adasdasdaasdads', ''),
(10, '2017-12-17', NULL, 'PDF UPLOAD', 'adasdasdaasdads', ''),
(11, '2017-12-17', NULL, 'PDF UPLOAD', 'adasdasdaasdads', ''),
(12, '2017-12-17', NULL, 'IMG UPLOAD', 'adasdasdaasdads', ''),
(13, '2017-12-17', NULL, 'Test All upload', 'adasdasdaasdads', ''),
(14, '2017-12-20', NULL, 'fdsafsd', 'fdsafsdfasdf', ''),
(15, '2017-12-20', NULL, 'fdsafsd', 'fsdafsdfas', '');

-- --------------------------------------------------------

--
-- Table structure for table `news_image`
--

CREATE TABLE `news_image` (
  `news_id` int(11) NOT NULL,
  `news_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news_image`
--

INSERT INTO `news_image` (`news_id`, `news_image`) VALUES
(1, '0'),
(12, 'img_5a363cd9c86c1.png'),
(13, 'img_5a363d24004e5.png'),
(13, 'img_5a363d24014f4.jpg'),
(13, 'img_5a363d24033f2.jpg'),
(14, 'img_5a39b8cfdd741.jpg'),
(14, 'img_5a39b8cfdf15d.jpg'),
(14, 'img_5a39b8cfdf742.jpg'),
(14, 'img_5a39b8cfe12de.jpg'),
(14, 'img_5a39b8cfe19cb.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `news_pdf`
--

CREATE TABLE `news_pdf` (
  `news_id` int(11) NOT NULL,
  `news_pdf` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news_pdf`
--

INSERT INTO `news_pdf` (`news_id`, `news_pdf`) VALUES
(1, ''),
(11, 'pdf_5a363cb339e76.pdf'),
(13, 'pdf_5a363d240423d.pdf'),
(13, 'pdf_5a363d2404f2b.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `occupation`
--

CREATE TABLE `occupation` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `occupation`
--

INSERT INTO `occupation` (`id`, `name`) VALUES
(1, 'Business Owner'),
(2, 'Employee'),
(3, 'University Lecturer'),
(4, 'Manager'),
(5, 'Government officer'),
(6, 'Doctor'),
(7, 'Researcher'),
(8, 'Store Owner');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tour`
--

CREATE TABLE `tour` (
  `tour_id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `highlight` varchar(300) NOT NULL,
  `region` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `max_customer` int(11) NOT NULL,
  `rating` decimal(10,0) NOT NULL DEFAULT '5'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tour`
--

INSERT INTO `tour` (`tour_id`, `name`, `highlight`, `region`, `province`, `price`, `max_customer`, `rating`) VALUES
(1, 'fdsafsd', 'fdsafsd', 'fdsafs', 'fdsafsd', '5', 52, '5'),
(2, 'fdsafsd', 'fdsafsd', 'fdsafs', 'fdsafsd', '5', 52, '5'),
(3, 'fdsafsd', 'fdsafsd', 'fdsafs', 'fdsafsd', '5', 52, '5'),
(4, 'fdsafsd', 'fdsafsd', 'fdsafs', 'fdsafsd', '5', 52, '5'),
(5, 'fdsafsd', 'fdsafsd', 'fdsafs', 'fdsafsd', '5', 52, '5'),
(6, 'fdsafsd', 'fdsafsd', 'fdsafs', 'fdsafsd', '5', 52, '5'),
(7, 'fdsafsd', 'fdsafsd', 'fdsafs', 'fdsafsd', '5', 52, '5'),
(8, 'fdsafsd', 'fdsafsd', 'fdsafs', 'fdsafsd', '5', 52, '5'),
(9, 'fdsafsd', '', 'fdsafs', 'fdsafsd', '5', 52, '5'),
(10, 'fdsafsd', 'fdsafsd', 'fdsafs', 'fdsafsd', '5', 52, '5'),
(11, 'fdsafsd', 'fdsafsd', 'fdsafs', 'fdsafsd', '5', 52, '5'),
(12, 'fdsafsd', 'fdsafsd', 'fdsafs', 'fdsafsd', '5', 52, '5'),
(13, 'fdsafsd', 'fdsafsd', 'fdsafs', 'fdsafsd', '5', 52, '5'),
(14, 'fdsafsd', 'fdsafsd', 'fdsafs', 'fdsafsd', '5', 52, '5'),
(15, 'fdsafdf', 'fdsafdsfdsa', 'dsafsdf', 'fdsafsdf', '151', 15, '5'),
(16, 'fdsafds', 'fdsafdsfa', 'fdsfads', 'fdsafsdf', '6', 1, '5'),
(17, 'fdsafsdfdf', 'fffff', 'ffffffff', 'ffffffff', '3', 61, '5'),
(18, 'fdsafsdfdf', 'fffff', 'ffffffff', 'ffffffff', '3', 61, '5'),
(19, 'fdsafsdfdf', 'fffff', 'ffffffff', 'ffffffff', '3', 61, '5'),
(20, 'fdsafsdfdf', 'fffff', 'ffffffff', 'ffffffff', '3', 61, '5'),
(21, 'aaa', 'aaaaa', 'a', 'aaaa', '1', 1, '5'),
(22, 'aaa', 'aaaaa', 'a', 'aaaa', '1', 1, '5'),
(23, 'aaa', 'aaaaa', 'a', 'aaaa', '1', 1, '5'),
(24, 'fdsaaaa', 'fdsaffff', 'asdff', 'fasdf', '5', 6, '5'),
(25, 'fdsaaaa', 'fdsaffff', 'asdff', 'fasdf', '5', 6, '5'),
(26, 'fdsaaaa', 'fdsaffff', 'asdff', 'fasdf', '5', 6, '5'),
(27, 'fdsaaaa', 'fdsaffff', 'asdff', 'fasdf', '5', 6, '5'),
(28, 'fdsaaaa', 'fdsaffff', 'asdff', 'fasdf', '5', 6, '5'),
(29, 'fdsaaaa', 'fdsaffff', 'asdff', 'fasdf', '5', 6, '5'),
(30, 'fdsaaaa', 'fdsaffff', 'asdff', 'fasdf', '5', 6, '5'),
(31, 'fdsaaaa', 'fdsaffff', 'asdff', 'fasdf', '5', 6, '5'),
(32, 'fdsaaaa', 'fdsaffff', 'asdff', 'fasdf', '5', 6, '5'),
(33, 'fdsaaaa', 'fdsaffff', 'asdff', 'fasdf', '5', 6, '5'),
(34, 'fdsaaaa', 'fdsaffff', 'asdff', 'fasdf', '5', 6, '5'),
(35, 'aaaaaaaaa', 'fdsafsdfdasdf', 'fasdfa', 'fdsadff', '6', 5, '5'),
(36, 'aaaaaaaaa', 'fdsafsdfdasdf', 'fasdfa', 'fdsadff', '6', 5, '5'),
(37, 'aaaaaaaaa', 'fdsafsdfdasdf', 'fasdfa', 'fdsadff', '6', 5, '5'),
(38, 'aaaaaaaaa', 'fdsafsdfdasdf', 'fasdfa', 'fdsadff', '6', 5, '5'),
(39, 'aaaaaaaaa', 'fdsafsdfdasdf', 'fasdfa', 'fdsadff', '6', 5, '5'),
(40, 'ddddd', 'dddddd', 'ddddd', 'dddddd', '5000', 13, '5'),
(41, 'ddddd', 'dddddd', 'ddddd', 'dddddd', '5000', 13, '5'),
(42, 'ddddd', 'dddddd', 'ddddd', 'dddddd', '5000', 13, '5'),
(43, 'ddddd', 'dddddd', 'ddddd', 'dddddd', '5000', 13, '5');

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
(40, 1),
(40, 2),
(41, 3),
(41, 4),
(42, 3),
(42, 4),
(43, 3),
(43, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tour_image`
--

CREATE TABLE `tour_image` (
  `img_id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `img_number` int(11) NOT NULL,
  `path` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tour_round`
--

CREATE TABLE `tour_round` (
  `tour_round_id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `trip_status` varchar(50) NOT NULL,
  `start_date_time` date NOT NULL,
  `end_date_time` date NOT NULL,
  `departure_point` varchar(50) NOT NULL,
  `drop_off_point` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tour_round`
--

INSERT INTO `tour_round` (`tour_round_id`, `tour_id`, `trip_status`, `start_date_time`, `end_date_time`, `departure_point`, `drop_off_point`) VALUES
(1, 1, 'Active', '2017-10-11', '2017-11-21', 'CNX', 'BKK'),
(2, 1, 'Pending', '2017-10-01', '2017-10-10', 'CNX', 'CEI'),
(3, 2, 'Active', '2017-09-20', '2017-10-01', 'HDY', 'HKT'),
(4, 2, 'Active', '2017-09-25', '2017-10-05', 'HDY', 'DMK'),
(5, 3, 'Active', '2017-07-10', '2017-07-20', 'TST', 'TDX'),
(6, 42, '', '2017-12-15', '2017-12-12', '', ''),
(7, 43, '', '2017-12-15', '2017-12-12', '', ''),
(8, 43, '', '2017-12-08', '2017-12-06', '', ''),
(9, 43, '', '2017-12-15', '2017-12-22', '', ''),
(10, 43, '', '2017-12-23', '2017-12-28', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tour_round_member`
--

CREATE TABLE `tour_round_member` (
  `tour_round_member_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `tour_round_id` int(11) NOT NULL,
  `passport_id` varchar(50) NOT NULL,
  `reservation_age` varchar(50) NOT NULL,
  `avoid_food` varchar(50) NOT NULL,
  `group_member` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tour_round_member`
--

INSERT INTO `tour_round_member` (`tour_round_member_id`, `id`, `tour_round_id`, `passport_id`, `reservation_age`, `avoid_food`, `group_member`) VALUES
(1, 1, 1, 'AA1122589', 'Adult', '-', 1),
(2, 2, 1, 'AA1122479', 'Adult', 'Pork', 1),
(3, 3, 1, 'AA1232479', 'Adult', '-', 2),
(4, 4, 2, 'AA0022479', 'Children', '-', 1),
(5, 5, 3, 'AA0232479', 'Adult', 'SeaFood', 1),
(6, 6, 4, 'AA5232470', 'Children', 'Fish', 2),
(7, 7, 5, 'AA5236470', 'Adult', 'Tuna', 3),
(8, 12, 5, 'AA5233571', 'Adult', '-', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tour_schedule`
--

CREATE TABLE `tour_schedule` (
  `schedule_id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `path` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tour_schedule`
--

INSERT INTO `tour_schedule` (`schedule_id`, `tour_id`, `path`) VALUES
(1, 22, 'pdf/pdf_5a39dece2f328.pdf'),
(2, 23, 'pdf/pdf_5a39e646e2f07.pdf'),
(3, 24, 'pdf/pdf_5a39eb2fc059f.pdf'),
(4, 25, 'pdf/pdf_5a39eb9b0c4d5.pdf'),
(5, 26, 'pdf/pdf_5a39ebd168a03.pdf'),
(6, 27, 'pdf/pdf_5a39ec1eecc86.pdf'),
(7, 28, 'pdf/pdf_5a39ec22691a3.pdf'),
(8, 29, 'pdf/pdf_5a39ec34bde44.pdf'),
(9, 30, 'pdf/pdf_5a39ec3df3d7f.pdf'),
(10, 31, 'pdf/pdf_5a39ec5b45e1d.pdf'),
(11, 32, 'pdf/pdf_5a39ec7a490ad.pdf'),
(12, 33, 'pdf/pdf_5a39ec82026d4.pdf'),
(13, 34, 'pdf/pdf_5a39ec83d1f9f.pdf'),
(14, 35, 'pdf/pdf_5a39eca1e47c5.pdf'),
(15, 36, 'pdf/pdf_5a39efcb7aecf.pdf'),
(16, 37, 'pdf/pdf_5a39efdd906a8.pdf'),
(17, 38, 'pdf/pdf_5a39f0fd3a67d.pdf'),
(18, 39, 'pdf/pdf_5a39f2587a4fb.pdf'),
(19, 40, 'pdf/pdf_5a39f3b6b7a30.pdf'),
(20, 41, 'pdf/pdf_5a39f3d537f7e.pdf'),
(21, 42, 'pdf/pdf_5a39f9bd8669a.pdf'),
(22, 43, 'pdf/pdf_5a39f9e4cd19c.pdf');

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
(38, 1),
(38, 2),
(38, 3),
(38, 4),
(38, 5),
(38, 6),
(39, 1),
(39, 5),
(39, 6),
(39, 1),
(39, 5),
(39, 6),
(39, 1),
(39, 5),
(39, 6),
(40, 1),
(40, 2),
(41, 1),
(41, 2),
(42, 1),
(42, 2),
(43, 1),
(43, 2);

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
(40, 2),
(40, 3),
(41, 2),
(41, 3),
(42, 2),
(42, 3),
(43, 2),
(43, 3);

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
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
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
-- Indexes for table `occupation`
--
ALTER TABLE `occupation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour`
--
ALTER TABLE `tour`
  ADD PRIMARY KEY (`tour_id`);

--
-- Indexes for table `tour_image`
--
ALTER TABLE `tour_image`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `tour_round`
--
ALTER TABLE `tour_round`
  ADD PRIMARY KEY (`tour_round_id`),
  ADD KEY `tour_id` (`tour_id`);

--
-- Indexes for table `tour_round_member`
--
ALTER TABLE `tour_round_member`
  ADD PRIMARY KEY (`tour_round_member_id`),
  ADD KEY `id` (`id`),
  ADD KEY `tour_round_id` (`tour_round_id`);

--
-- Indexes for table `tour_schedule`
--
ALTER TABLE `tour_schedule`
  ADD PRIMARY KEY (`schedule_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `occupation`
--
ALTER TABLE `occupation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tour`
--
ALTER TABLE `tour`
  MODIFY `tour_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `tour_image`
--
ALTER TABLE `tour_image`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tour_round`
--
ALTER TABLE `tour_round`
  MODIFY `tour_round_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tour_round_member`
--
ALTER TABLE `tour_round_member`
  MODIFY `tour_round_member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tour_schedule`
--
ALTER TABLE `tour_schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `news_pdf`
--
ALTER TABLE `news_pdf`
  ADD CONSTRAINT `news_pdf_ibfk_1` FOREIGN KEY (`news_id`) REFERENCES `news` (`news_id`);

--
-- Constraints for table `tour_round`
--
ALTER TABLE `tour_round`
  ADD CONSTRAINT `tour_round_ibfk_1` FOREIGN KEY (`tour_id`) REFERENCES `tour` (`tour_id`);

--
-- Constraints for table `tour_round_member`
--
ALTER TABLE `tour_round_member`
  ADD CONSTRAINT `tour_round_member_ibfk_1` FOREIGN KEY (`id`) REFERENCES `member` (`id`),
  ADD CONSTRAINT `tour_round_member_ibfk_2` FOREIGN KEY (`tour_round_id`) REFERENCES `tour_round` (`tour_round_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
