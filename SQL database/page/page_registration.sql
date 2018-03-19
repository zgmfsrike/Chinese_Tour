-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2018 at 11:14 AM
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
-- Table structure for table `page_registration`
--

CREATE TABLE `page_registration` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `english` varchar(50) CHARACTER SET utf8 NOT NULL,
  `chinese` varchar(50) CHARACTER SET utf8 NOT NULL,
  `thai` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_registration`
--

INSERT INTO `page_registration` (`id`, `name`, `english`, `chinese`, `thai`) VALUES
(1, 'account_info', 'Account information', '账号信息', 'ข้อมูลเกี่ยวกับบัญชี'),
(2, 'confirm_password', 'Confirm password', '再次确认密码', 'ยืนยันรหัสผ่าน'),
(3, 'personal_info', 'Personal information', '个人信息', 'ข้อมูลส่วนบุคคล'),
(4, 'first_name', 'First name', '姓氏', 'ชื่อ'),
(5, 'middle_name', 'Middle name', '名字的中间的那个字', 'ชื่อกลาง'),
(6, 'last_name', 'Last name', '名字的最后一个字', 'นามสกุล'),
(7, 'birth ', 'Birthday', '出生日期', 'วันเกิด'),
(8, 'occupation', 'Occupation', '职业', 'อาชีพ'),
(9, 'salary', 'Salary', '收入', 'รายได้'),
(10, 'mail', 'E-mail', '邮箱号', 'E-mail'),
(11, 'country_code', 'Country code', '城市编码', 'รหัสประเทศ'),
(12, 'tel_number', 'Telephone Number', '电话号码', 'หมายเลขโทรศัพท์'),
(13, 'address', 'Address', '地址', 'ที่อยุ่'),
(14, 'city', 'City', '城市', 'เมือง'),
(15, 'province', 'Province', '省份', 'จังหวัด'),
(16, 'zipcode', 'Zipcode', '邮政编码', 'รหัสไปรษณีย์'),
(17, 'cancel', 'Cancel', '取消', 'ยกเลิก'),
(18, 'save', 'Save', '保存', 'บันทึก'),
(19, 'register', 'Register', '注册', 'สมัครสมาชิก'),
(20, 'username', 'Username', '用户名', 'ชื่อผู้ใช้งาน'),
(21, 'password', 'Password', '密码', 'รหัสผ่าน');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `page_registration`
--
ALTER TABLE `page_registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `page_registration`
--
ALTER TABLE `page_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
