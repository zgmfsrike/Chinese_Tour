-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2017 at 12:59 PM
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

INSERT INTO `member` (`id`, `username`, `password`, `first_name`, `middle_name`, `last_name`, `dob`, `phone`, `email`, `address`, `city`, `province`, `zipcode`, `occupation`, `salary`, `active`, `hash`) VALUES
(1, 'asdfghj', '$2y$10$nEshXXiYm0orI2SyEXKVnO3V7S4KOOA45tRQCTdRNRAAwE34/Eedi', 'asdf', 'asdf', 'asdf', '2017-10-13', '252626281', 'nayzaa200@hotmail.com', '241 moo.9 subdis.Sansai luang, dis.Sansai', 'CMCMCMCM', 'ChiangMai-', '50210', 1, 1, 1, '4edaa105d5f53590338791951e38c3ad'),
(2, 'arg', '$2y$10$F0LXFo4FDyWBrpxqrewTe.Cy/pV7OPdxgcOpfIZ4wcu.2iIzRFZz6', 'sssssweqweqwwdsassdadasdsada', 'ssssssdadsadad', 'sssss', '2017-11-16', '846256256', 'zgmfDWSDAike@gmail.com', '88/8, suthepssssss', 'chiangmaisssss', 'chiangmai', '50200', 8, 7, 1, '60495b4e033e9f60b32a6607b587aadd'),
(3, 'zgs', '$2y$10$CejQHB/fqabZdEalId8JGeXlqseQk9I.xttanIWpWD3m9ycXrx6dG', 'kritsanah', 'NB', 'supphasri', '2017-10-17', '846256256', 'zgm@gmail.com', '88/8, suthep', 'chiangmai', 'chiangmai', '50200', 4, 2, 0, '6ef80bb237adf4b6f77d0700e1255907'),
(4, 'grz', '$2y$10$uetDwuJUcuMqU8vDyqyDy.JMnKkKUxeLO31bQnfpy8rgd4DAyoG42', 'aaaaaaaa', 'aaaaaaaa', 'aaaaaaaa', '2017-10-10', '846256256', 'zgmfse@gmail.com', '88/8, suthep', 'chiangmai', 'chiangmai', '50200', 8, 2, 0, '6915849303a3fe93657587cb9c469f00'),
(5, 'GGEZ', '$2y$10$TsD3Od.FXijgWx68tWa9K.ZTrD3oiYqXXGeGKP8uEiwj8DfBcgGiq', 'gsfd', 'qweqweqweq', 'refrdfdfd', '2017-10-26', '846256256', 'zgmfsrikawddszsade@gmail.com', '88/8, suthep', 'chiangmai', 'chiangmai', '50200', 4, 4, 1, 'acff1af62d0f91f4be73f4857552d70c'),
(6, 'ameno', '$2y$10$lZ8TAsiAeCgYYGdSsx9cr.zLhgj7rOIZ0v.dDnmlkhVz35hncLdDO', 'kritsanah', 'sadasd', 'supphasri', '2017-10-13', '846256256', 'zgmfsdsasdsada@gmail.com', '88/8, suthep', 'chiangmai', 'ccccccc', '50200', 7, 7, 0, 'fa1e9c965314ccd7810fb5ea838303e5'),
(7, 'asdasd', '$2y$10$7JqVCiZzbBBYw5a4oIkM1OzkVQTweu8XUadF8qJA0uFt/uA9bfs8a', 'fname', 'mname', 'sname', '2017-10-11', '2525255525', 'nayzaa2010@hotmail.com', 'addressadress', 'fhghgh', 'hgjgjhj', '25353', 8, 8, 1, '77edbe5f897a5dbcde49d31bec1537b8'),
(8, 'zzaa', '$2y$10$0VWOCtO2nPRjr.CvbnynXu0Slw/GgKmQRsemlofqbfHj26JKdr9yK', 'kritsanah', 'GZ', 'supphasri', '2017-10-13', '846256256', 'zgmfstdwaike@gmail.com', '88/8, suthep', 'chiangmai', 'chiangmai', '50200', 6, 6, 0, 'd79c6256b9bdac53a55801a066b70da3'),
(9, 'xxy', '$2y$10$ZokpWRmxXDnkGw39/.Pqwed95vRUiBgy8PWkE.ZrYFNa362oM09OO', 'sada', 'qwdq', 'dsad', '2017-10-13', '846256256', 'zgmfstiwdqdke@gmail.com', '88/8, suthep', 'chiangmai', 'asd', '50200', 7, 7, 0, '765d5fb115a9f6a3e0b23b80a5b2e4c4'),
(10, 'xxm', '$2y$10$YKUnze/pZiZ3hd3hzsYpFeojBSCOaRE1wGE2iQaLjahcSr7lQ93Q.', 'wqsdsadad', 'sdasdsdadasdadsadasdas', 'wswadasdasdasdasdadasdsad', '2017-10-13', '846256256', 'zgmfstisdasasdake@gmail.com', '1231', 'asda', 'sdsds', '50000', 2, 7, 1, '606c90a06173d69682feb83037a68fec'),
(11, 'gggr', '1235555', 'asdawwwwwww', 'asdasda', 'asdadasda', '2017-10-13', '846256256', 'zsdsds@gmail.com', 'asdad', 'dadasdasd', 'adadasd', '12312', 6, 4, 0, 'fb09f481d40c4d3c0861a46bd2dc52c0'),
(12, 'nbz', '$2y$10$roweeiiGK3yvitoTjK4TjO8XkSbTzFPx8gRiQSLvWlH2Z5C23s.5G', 'nbzzz', 'nbz', 'ssss', '2017-10-17', '846256256', 'zgmfstike@gmail.com', '88/8, suthep', 'chiangmai', 'chainmai', '50200', 1, 6, 1, '495dabfd0ca768a3c3abd672079f48b6');

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
  `tour_name` varchar(50) NOT NULL,
  `tour_description` varchar(50) NOT NULL,
  `rating` int(11) NOT NULL,
  `tour_type_id` int(11) NOT NULL,
  `vehicle_type_id` int(11) NOT NULL,
  `accommodation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tour`
--

INSERT INTO `tour` (`tour_id`, `tour_name`, `tour_description`, `rating`, `tour_type_id`, `vehicle_type_id`, `accommodation_id`) VALUES
(1, 'tour1', 'taaaaaaaa', 5, 1, 1, 5),
(2, 'tour2', 'ttttsa', 5, 5, 1, 5),
(3, 'tour3', 'tour33333333', 3, 3, 3, 3);

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
(5, 3, 'Active', '2017-07-10', '2017-07-20', 'TST', 'TDX');

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
(5, 5, 3, 'AA0232479', 'Adult', 'SeaFood', 1);

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
  ADD PRIMARY KEY (`tour_id`),
  ADD KEY `tour_type_id` (`tour_type_id`),
  ADD KEY `vehicle_type_id` (`vehicle_type_id`,`accommodation_id`),
  ADD KEY `accommodation_id` (`accommodation_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
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
  MODIFY `tour_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tour_round`
--
ALTER TABLE `tour_round`
  MODIFY `tour_round_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tour_round_member`
--
ALTER TABLE `tour_round_member`
  MODIFY `tour_round_member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tour`
--
ALTER TABLE `tour`
  ADD CONSTRAINT `tour_ibfk_1` FOREIGN KEY (`tour_type_id`) REFERENCES `tour_type` (`tour_type_id`),
  ADD CONSTRAINT `tour_ibfk_2` FOREIGN KEY (`vehicle_type_id`) REFERENCES `vehicle_type` (`vehicle_type_id`),
  ADD CONSTRAINT `tour_ibfk_3` FOREIGN KEY (`accommodation_id`) REFERENCES `accommodation` (`accommodation_id`);

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
