-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2018 at 02:20 AM
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
-- Table structure for table `booking_session`
--

CREATE TABLE `booking_session` (
  `time` datetime NOT NULL,
  `reference_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `booking_status`
--

CREATE TABLE `booking_status` (
  `id` int(11) NOT NULL,
  `status_en` varchar(100) CHARACTER SET utf8 NOT NULL,
  `status_ch` varchar(100) CHARACTER SET utf8 NOT NULL,
  `status_th` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

--
-- Dumping data for table `departure_location`
--

INSERT INTO `departure_location` (`departure_id`, `departure_en`, `departure_ch`, `departure_th`, `price`) VALUES
(1, 'Default', 'Default', 'Default', 0),
(2, 'Airport', '飞机场', 'สนามบิน', 300);

-- --------------------------------------------------------

--
-- Table structure for table `dropoff_location`
--

CREATE TABLE `dropoff_location` (
  `dropoff_id` int(11) NOT NULL,
  `dropoff_en` varchar(50) CHARACTER SET utf8 NOT NULL,
  `dropoff_ch` varchar(50) CHARACTER SET utf8 NOT NULL,
  `dropoff_th` varchar(50) CHARACTER SET utf8 NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dropoff_location`
--

INSERT INTO `dropoff_location` (`dropoff_id`, `dropoff_en`, `dropoff_ch`, `dropoff_th`, `price`) VALUES
(1, 'Default', 'Default', 'Default', 0),
(2, 'Airport', '飞机场', 'สนามบิน', 300);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `feedback_id` varchar(50) NOT NULL,
  `tour_round_id` int(11) NOT NULL,
  `group_member_ref` varchar(50) NOT NULL,
  `tour_round_member_id` int(11) NOT NULL,
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
(105, 7, 15, 'adasadadasd', 0),
(106, 8, 1, 'Question 1', 1),
(107, 8, 2, 'Question 2', 1),
(108, 8, 3, 'Question 3', 1),
(109, 8, 4, 'Question 4', 1),
(110, 8, 5, 'Question 5', 1),
(111, 8, 6, 'Question 6', 1),
(112, 8, 7, 'Question 7', 1),
(113, 8, 8, 'Question 8', 1),
(114, 8, 9, 'Question 9', 1),
(115, 8, 10, 'Question 10', 1),
(116, 8, 11, 'Question 11', 1),
(117, 8, 12, 'Question 12', 1),
(118, 8, 13, 'Question 13', 1),
(119, 8, 14, 'Question 14', 1),
(120, 8, 15, 'Question 15', 1),
(121, 9, 1, 'Question 1', 1),
(122, 9, 2, 'Question 2', 1),
(123, 9, 3, 'Question 3', 1),
(124, 9, 4, 'Question 4', 0),
(125, 9, 5, 'Question 5', 0),
(126, 9, 6, 'Question 6', 0),
(127, 9, 7, 'Question 7', 0),
(128, 9, 8, 'Question 8', 0),
(129, 9, 9, 'Question 9', 0),
(130, 9, 10, 'Question 10', 0),
(131, 9, 11, 'Question 11', 0),
(132, 9, 12, 'Question 12', 0),
(133, 9, 13, 'Question 13', 0),
(134, 9, 14, 'Question 14', 0),
(135, 9, 15, 'Question 15', 0);

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

-- --------------------------------------------------------

--
-- Table structure for table `news_image`
--

CREATE TABLE `news_image` (
  `news_id` int(11) NOT NULL,
  `news_image` varchar(100) NOT NULL,
  `img_index` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `short_description` text CHARACTER SET utf8 NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `english` text CHARACTER SET utf8 NOT NULL,
  `chinese` text CHARACTER SET utf8 NOT NULL,
  `thai` text CHARACTER SET utf8 NOT NULL
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
(7, 'about_content', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mo\'\r\nllis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,\r\n\r\n', 'Lorem ipsum dolite amet、consectetuer adipiscing elit。 Aeneanコモディティ・ライクラ・エド・ダラー。 Aeneanマッサ。お母さんのお母さんのお母さんのお母さん、お母さんのお母さん、ナスケルの尻尾。ドネカの女王フェリス、ウルトラスーツ、プメンテスク、プレティウムキス、セム。 Nullaは結果としてenimを結果しました。ドネッペはちょうどいい、フリンジラ、アリケート、悪い、アーク。 enim justo、rhoncus ut、imperdiet a、venenatis vitae、justoで。 Nullam dictum felis eu pede mollis pretium。整数tincidunt。 Cras dapibus。 Vivamus elementum semis nisi。 Aeneanはeleifend tellusを怒らせる。 Aenean leo ligula、eu porttitor、その結果、eleifend ac、enim。 Aliquam lorem ante、dapibus in、viverra quis、feugiat a、tellus。 Phasellus viverraはあなたの母国語ではありません。 Quisque rutrum。 Aenean imperdiet。エイリアンの超時代の声。 Curabitur ullamcorper ultricies nisi。 Nam eget dui。 Etiam rhoncus。マセナスの誕生日、誕生日、誕生日、誕生日、誕生日、誕生日、 Nam quam nunc、blandit vel、luctus pulvinar、hendrerit id、lorem。マセナズ・オブ・オデオとテンシドント・テンポス。 Donec vitae sapien ut libero venenatis faucibus。 Nullam quis ante。エチオームはオルセー、エロス・フォシバス・ティンシドントと呼ばれています。 Duis leo。セダンフリンジマウリは座っているニブ。 Donec sodales sagittis magna。セド、レオ、ビベンドゥムソデールズ、オーグヴェリットカーサスヌンク、\r\n', 'Lorem Ipsum บังคับ Amet นั่ง, consectetuer adipiscing Elit. Aenean commodo ไมโครโฟน Eget บังคับ. Aenean Massa. Cum sociis natoque penatibus et magnis โรค parturient Montes, Mus ridiculus nascetur. แบบพกพาแมว Quam, ultricies NEC, pellentesque สหภาพยุโรปราคาที่โฟน, SEM. Nulla consequat มาสซ่าโฟน enim. แบบพกพากะเทย Justo, หรือ fringilla, aliquet NEC, vulputate Eget, Arcu. ใน enim Justo, rhoncus UT, imperdiet มีประวัติ venenatis, Justo. Nullam ภาษิตแมวสหภาพยุโรปกะเทย Mollis ราคาที่. จำนวนเต็ม tincidunt. Cras dapibus. vivamus ELEMENTUM Semper ค้างคา. Aenean vulputate eleifend เทลลัส. Aenean สิงห์ไมโครโฟน, porttitor สหภาพยุโรป consequat ประวัติ, eleifend AC, enim. แบ่งปัน lorem ante, dapibus ใน viverra โฟน, feugiat ที่เทลลัส. Phasellus viverra nulla UT Metus varius ปั๊ม. Quisque rutrum. Aenean imperdiet. Etiam ultricies ค้างคาหรือ augue. Curabitur ullamcorper ultricies ค้างคา. น้ำ Eget dui. Etiam rhoncus. Maecenas Tempus, เทลลัส Eget condimentum rhoncus, SEM Quam Semper Libero, Amet นั่ง adipiscing SEM วัด sed ไม่มี. N นวิธีการในขณะนี้, blandit หรือ, luctus วอลเลย์บอล, สำนัก id, lorem. Maecenas มิได้ Odio et ante tincidunt Tempus. แบบพกพาประวัติ sapien ยูทาห์ Libero venenatis faucibus. Nullam โฟน ante. Etiam Amet นั่ง Orci Eget อยู่ faucibus tincidunt. Duis สิงห์. Sed fringilla มาร์ท Amet นั่งอะแดปเตอร์. แบบพกพา sodales sagittis นา. consequat SED, ราศีสิงห์ Eget Bibendum sodales, augue velit ซัสในขณะนี้,');

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
  `english` text CHARACTER SET utf8 NOT NULL,
  `chinese` text CHARACTER SET utf8 NOT NULL,
  `thai` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_index`
--

INSERT INTO `page_index` (`id`, `name`, `english`, `chinese`, `thai`) VALUES
(1, 'title', 'Chiang Mai Hong Thai', '清迈宏泰旅游公司商业领域', 'บริษัท เชียงใหม่หงส์ไทย ทัวร์'),
(2, 'announcement', 'Announcement', '布告', 'ประกาศ'),
(3, 'news', 'News', '新闻', 'ข่าวสาร'),
(4, 'announcement_content', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,\r\n\r\n', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,\r\n\r\n', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,\r\n\r\n'),
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
-- Table structure for table `page_static_business`
--

CREATE TABLE `page_static_business` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `english` varchar(100) CHARACTER SET utf8 NOT NULL,
  `chinese` varchar(100) CHARACTER SET utf8 NOT NULL,
  `thai` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_static_business`
--

INSERT INTO `page_static_business` (`id`, `name`, `english`, `chinese`, `thai`) VALUES
(1, 'title', 'Business Tours', '商务旅游', 'การประชุมเชิงธุรกิจ'),
(2, 'type1', 'Inspect the international school + travelling (6 days)', '考察国际学校 + 旅游（6天）', 'ตรวจสอบโรงเรียนนานาชาติ (6วัน)'),
(3, 'type2', 'Inspect the apartment that Chinese Liked + Travelling (6 days)', '考察中国人喜欢的公寓 + 旅游（6天）', 'ตรวจสอบคอนโดมิเนียมที่คนจีนชอบ (6วัน)'),
(4, 'type3', 'Inspect the hotel + travelling (6 Days)', '考察酒店 + 旅游（6天）', 'ตรวจสอบโรงแรม (6วัน)');

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
(1, 'title', 'Convention Tours', '专题会晤旅游', 'การประชุมนานาชาติ'),
(2, 'type1', 'Thai language teaching experience exchange meeting + travelling (6 days)', '泰语教学经验交流会 + 旅游（6天）', 'ประชุมแลกเปลี่ยนประสบการณ์การเรียนการสอนภาษาไทย (6วัน)'),
(3, 'type2', ' Development and research antianaphylaxis maquillage meeting + Travelling (6 days)', '抗过敏性化妆品研究 & 发展会议 + 旅行（6天）', 'ประชุมการพัฒนาเครื่องสำอางที่รักษาผิวแพ้ง่าย (6วัน)'),
(4, 'type3', 'Cataract surgery research meeting + Travelling (6 Days)', '白内障手术细节研究会议 + 旅行（6天）', 'ประชุมแลกเปลี่ยนรายละเอียดทำการผ่าตัดต้อกระจก (6วัน)');

-- --------------------------------------------------------

--
-- Table structure for table `page_static_exhibition`
--

CREATE TABLE `page_static_exhibition` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `english` varchar(100) CHARACTER SET utf8 NOT NULL,
  `chinese` varchar(100) CHARACTER SET utf8 NOT NULL,
  `thai` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_static_exhibition`
--

INSERT INTO `page_static_exhibition` (`id`, `name`, `english`, `chinese`, `thai`) VALUES
(1, 'title', 'Exhibition Tours', '会展旅游', 'การจัดแสดงสินค้า'),
(2, 'type1', 'Exhibition 5 Days + travelling (9 days)', '会展 5 天 + 旅行 （9 天)', 'งานแสดงนิทรรศการ 5 วัน + ท่องเที่ยว (9วัน)'),
(3, 'type2', 'Exhibition 7 Days + travelling (11 days)', '会展 7 天 + 旅行 （11 天)', 'งานแสดงนิทรรศการ 7 วัน + ท่องเที่ยว (11วัน)'),
(4, 'type3', 'Exhibition 9 Days + travelling (13 Days)', '会展 9 天 + 旅行 （13 天）', 'งานแสดงนิทรรศการ 9 วัน + ท่องเที่ยว (13วัน)'),
(5, 'type4', 'Exhibition 10 Days + travelling (14 Days)', '会展 10 天 + 旅行 （14 天）', 'งานแสดงนิทรรศการ 10 วัน + ท่องเที่ยว (14วัน)');

-- --------------------------------------------------------

--
-- Table structure for table `page_static_incentive`
--

CREATE TABLE `page_static_incentive` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `english` varchar(100) CHARACTER SET utf8 NOT NULL,
  `chinese` varchar(100) CHARACTER SET utf8 NOT NULL,
  `thai` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_static_incentive`
--

INSERT INTO `page_static_incentive` (`id`, `name`, `english`, `chinese`, `thai`) VALUES
(1, 'title', 'Incentive Tours', '奖励旅游', 'ท่องเที่ยวเพื่อเป็นรางวัล'),
(2, 'type1', 'New employee award party + travelling (6 days)', '新员工奖励旅游 （6 天）A 计划', 'การมอบรางวัลให้กับพนักงานเข้ามาใหม่ (6วัน)'),
(3, 'type2', 'Company sale department award party + travelling (6 Days )', '公司销售部门奖励旅游 （6 天·）B 计划', 'การมอบรางวัลให้กับหน่วยงานฝ่ายการขาย (6วัน)'),
(4, 'type3', ' Company department employee award party + Travelling (6 days)', '公司部门员工奖励旅游 （6 天）C 计划', 'การมอบรางวัลให้กับพนักงานหน่วยงาน (6วัน)');

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
(1, 'title', 'Meeting Tours', '会议旅游', 'การจัดประชุมองค์กร'),
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

-- --------------------------------------------------------

--
-- Table structure for table `tour_tour_type`
--

CREATE TABLE `tour_tour_type` (
  `tour_id` int(11) NOT NULL,
  `tour_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for table `page_static_business`
--
ALTER TABLE `page_static_business`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_static_convention`
--
ALTER TABLE `page_static_convention`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_static_exhibition`
--
ALTER TABLE `page_static_exhibition`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_static_incentive`
--
ALTER TABLE `page_static_incentive`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departure_location`
--
ALTER TABLE `departure_location`
  MODIFY `departure_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dropoff_location`
--
ALTER TABLE `dropoff_location`
  MODIFY `dropoff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback_question`
--
ALTER TABLE `feedback_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

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
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news_en`
--
ALTER TABLE `news_en`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news_th`
--
ALTER TABLE `news_th`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `page_static_business`
--
ALTER TABLE `page_static_business`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `page_static_convention`
--
ALTER TABLE `page_static_convention`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `page_static_exhibition`
--
ALTER TABLE `page_static_exhibition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `page_static_incentive`
--
ALTER TABLE `page_static_incentive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tour_ch`
--
ALTER TABLE `tour_ch`
  MODIFY `tour_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tour_en`
--
ALTER TABLE `tour_en`
  MODIFY `tour_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tour_meeting`
--
ALTER TABLE `tour_meeting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tour_round`
--
ALTER TABLE `tour_round`
  MODIFY `tour_round_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tour_round_member`
--
ALTER TABLE `tour_round_member`
  MODIFY `tour_round_member_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tour_schedule`
--
ALTER TABLE `tour_schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tour_th`
--
ALTER TABLE `tour_th`
  MODIFY `tour_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
