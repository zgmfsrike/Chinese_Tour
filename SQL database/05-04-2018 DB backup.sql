-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2018 at 03:18 AM
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
(21, 'test123', '$2y$10$KhKIip3efms9anoED8lG2OIoChQrpSDpQez/oSbH9HYrfZSaSVco2', 'yangza', 'hooho', 'tamutami', '1968-11-06', 65, '817648822', 'zxcc@gma.com', 'chrrewburry #431', 'testcity\'\'\'\'\'', 'fsdfasdf\'\'\'', '521523', 3, 4, 1, '6e62a992c676f611616097dbea8ea030');

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
  `short_description` varchar(200) CHARACTER SET utf8 NOT NULL,
  `content` varchar(1000) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news_ch`
--

INSERT INTO `news_ch` (`news_id`, `create_date`, `last_edit_date`, `topic`, `short_description`, `content`) VALUES
(2, '2018-03-29', '2018-03-29', 'topic ch1', 'ch1', 'ch1'),
(3, '2018-03-29', NULL, 'ch', 'ch', 'ch'),
(4, '2018-03-29', NULL, '新闻 1', '新闻 3', '新闻 2'),
(5, '2018-04-03', NULL, 'c', 'c', 'c');

-- --------------------------------------------------------

--
-- Table structure for table `news_en`
--

CREATE TABLE `news_en` (
  `news_id` int(11) NOT NULL,
  `create_date` date NOT NULL,
  `last_edit_date` date DEFAULT NULL,
  `topic` varchar(50) CHARACTER SET utf8 NOT NULL,
  `short_description` varchar(200) CHARACTER SET utf8 NOT NULL,
  `content` varchar(1000) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news_en`
--

INSERT INTO `news_en` (`news_id`, `create_date`, `last_edit_date`, `topic`, `short_description`, `content`) VALUES
(2, '2018-03-29', '2018-03-29', 'topic en1', 'en1', 'en1'),
(3, '2018-03-29', NULL, 'en', 'en', 'en'),
(4, '2018-03-29', NULL, 'News en', 'News description en', 'News content en'),
(5, '2018-04-03', NULL, 'e', 'e', 'e');

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
(2, 'img_2_1.jpg', 1),
(2, 'img_2_1.jpg', 1),
(3, 'img_3_1.jpg', 1),
(4, 'img_4_1.jpg', 1),
(4, 'img_4_2.jpg', 2),
(5, 'img_5_1.jpg', 1),
(5, 'img_5_2.jpg', 2);

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

-- --------------------------------------------------------

--
-- Table structure for table `news_th`
--

CREATE TABLE `news_th` (
  `news_id` int(11) NOT NULL,
  `create_date` date NOT NULL,
  `last_edit_date` date DEFAULT NULL,
  `topic` varchar(50) CHARACTER SET utf8 NOT NULL,
  `short_description` varchar(200) CHARACTER SET utf8 NOT NULL,
  `content` varchar(1000) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news_th`
--

INSERT INTO `news_th` (`news_id`, `create_date`, `last_edit_date`, `topic`, `short_description`, `content`) VALUES
(2, '2018-03-29', '2018-03-29', 'topic th1', 'th1', 'th1'),
(3, '2018-03-29', NULL, 'th', 'th', 'th'),
(4, '2018-03-29', NULL, 'ข่าวสาร 1', 'ข่าวสาร 3', 'ข่าวสาร 2'),
(5, '2018-04-03', NULL, 't', 't', 't');

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
(6, 'title', 'About Us', '关于我们', 'เกี่ยวกับเรา');

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
(12, 'manage', 'Manage', 'Manage', 'จัดการ');

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
(4, 'announcement_content', 'English announcement', 'Chinese announcement', 'Thai announcement');

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
(3, 5),
(4, 1),
(4, 2),
(4, 4),
(4, 5),
(1, 1),
(1, 2),
(1, 4),
(1, 5);

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
  `rating` decimal(10,0) NOT NULL DEFAULT '100'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tour_ch`
--

INSERT INTO `tour_ch` (`tour_id`, `tour_description`, `highlight`, `region`, `province`, `price`, `max_customer`, `rating`) VALUES
(1, 'ch tour1', 'ch tour', 'ch tour', 'ch tour', '50', 70, '100');

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
  `rating` decimal(10,0) NOT NULL DEFAULT '100'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tour_en`
--

INSERT INTO `tour_en` (`tour_id`, `tour_description`, `highlight`, `region`, `province`, `price`, `max_customer`, `rating`) VALUES
(1, 'en tour1', 'en tour', 'en tour', 'en tour', '60', 70, '100');

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
(3, '3_1.jpg', '3_2.jpg', '', '', '', '', '', '', '', ''),
(4, '', '', '', '', '', '', '', '', '', ''),
(1, '1_1.jpg', '1_2.jpg', '', '', '', '', '', '', '', '');

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
(12, 3, '', '2025-03-03', '2018-07-19', '', ''),
(13, 3, '', '2018-05-17', '2018-05-25', '', ''),
(14, 3, '', '2018-02-23', '2018-02-26', '', ''),
(15, 3, '', '2018-02-23', '2018-02-24', '', ''),
(16, 4, '', '2020-03-03', '2018-03-24', '', ''),
(17, 4, '', '2018-03-16', '2018-03-17', '', ''),
(20, 1, '', '2018-04-12', '2018-04-21', '', ''),
(21, 1, '', '2018-04-21', '2018-04-28', '', '');

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
  `rating` decimal(10,0) NOT NULL DEFAULT '100'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tour_th`
--

INSERT INTO `tour_th` (`tour_id`, `tour_description`, `highlight`, `region`, `province`, `price`, `max_customer`, `rating`) VALUES
(1, 'th tour1', 'th tour', 'th tour', 'th tour', '80', 70, '100');

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
(3, 3),
(3, 4),
(3, 5),
(3, 6),
(4, 1),
(4, 2),
(4, 3),
(4, 5),
(4, 6),
(1, 1),
(1, 2),
(1, 4),
(1, 5),
(1, 6);

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
(4, 1),
(4, 2),
(4, 4),
(1, 1),
(1, 2),
(1, 4);

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
-- Indexes for table `tour_round`
--
ALTER TABLE `tour_round`
  ADD PRIMARY KEY (`tour_round_id`);

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
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `news_en`
--
ALTER TABLE `news_en`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `news_th`
--
ALTER TABLE `news_th`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `occupation`
--
ALTER TABLE `occupation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `page_about`
--
ALTER TABLE `page_about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `page_footer`
--
ALTER TABLE `page_footer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `page_header`
--
ALTER TABLE `page_header`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `page_index`
--
ALTER TABLE `page_index`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tour_ch`
--
ALTER TABLE `tour_ch`
  MODIFY `tour_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tour_en`
--
ALTER TABLE `tour_en`
  MODIFY `tour_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tour_round`
--
ALTER TABLE `tour_round`
  MODIFY `tour_round_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tour_schedule`
--
ALTER TABLE `tour_schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tour_th`
--
ALTER TABLE `tour_th`
  MODIFY `tour_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
