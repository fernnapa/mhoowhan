-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2019 at 11:16 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project61_g20`
--

-- --------------------------------------------------------

--
-- Table structure for table `allocate`
--

CREATE TABLE `allocate` (
  `ac_id` int(11) NOT NULL,
  `ac_title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ac_dep` int(11) NOT NULL,
  `ac_tname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ac_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ac_position` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ac_empid` int(11) NOT NULL,
  `ac_typeR` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ac_emp` int(11) NOT NULL,
  `ac_date` date NOT NULL,
  `ac_status` int(11) NOT NULL,
  `ac_note` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ac_head` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ac_hd_position` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ac_head_dc` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ac_dc_position` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `allocate`
--

INSERT INTO `allocate` (`ac_id`, `ac_title`, `ac_dep`, `ac_tname`, `ac_name`, `ac_position`, `ac_empid`, `ac_typeR`, `ac_emp`, `ac_date`, `ac_status`, `ac_note`, `ac_head`, `ac_hd_position`, `ac_head_dc`, `ac_dc_position`) VALUES
(1, 'เดชฐิพงศ์ เลิศไกร', 16, 'นาย', 'เดชฐิพงศ์ เลิศไกร', 'เจ้าหน้าที่วิเคราะห์ระบบคอมพิวเตอร์', 243018, '', 249003, '2019-02-08', 2, '', '', '', '', ''),
(2, 'เดชฐิพงศ์ เลิศไกร', 16, 'นาย', 'เดชฐิพงศ์ เลิศไกร', 'เจ้าหน้าที่วิเคราะห์ระบบคอมพิวเตอร์', 243018, '', 249003, '2019-02-08', 2, '', '', '', '', ''),
(3, 'เดชฐิพงศ์ เลิศไกร', 3, 'นาย', 'เดชฐิพงศ์ เลิศไกร', 'เจ้าหน้าที่วิเคราะระบบคอมพิวเตอร์', 237150, '', 249003, '2019-02-08', 2, '', '', '', '', ''),
(4, 'เดชฐิพงศ์ เลิศไกร', 3, 'นาย', 'เดชฐิพงศ์ เลิศไกร', 'เจ้าหน้าที่วิเคราะระบบคอมพิวเตอร์', 237150, '', 249003, '2019-02-08', 2, '', '', '', '', ''),
(5, 'เดชฐิพงศ์ เลิศไกร', 3, 'นาย', 'เดชฐิพงศ์ เลิศไกร', 'เจ้าหน้าที่วิเคราะระบบคอมพิวเตอร์', 237150, '', 249003, '2019-02-08', 2, '', '', '', '', ''),
(6, 'รุ่งระวี ไทยธวัช', 5, 'น.ส.', 'รุ่งระวี ไทยธวัช', '-', 144029, '', 249003, '2019-02-08', 2, '', '', '', '', ''),
(7, 'ตุลชัย ทิพาวช', 5, 'นาย', 'ตุลชัย ทิพาวช', '-', 144029, '', 249003, '2019-02-08', 2, '', '', '', '', ''),
(8, 'พิมลมาศ วงศ์อัศวนฤมล', 5, 'น.ส.', 'พิมลมาศ วงศ์อัศวนฤมล', '-', 144029, '', 249003, '2019-02-08', 2, '', '', '', '', ''),
(9, 'พันทิพย์ ปิยะทัศนานนท์', 9, 'อ.ดร.', 'พันทิพย์ ปิยะทัศนานนท์', 'อาจารย์', 157011, '', 249003, '2019-02-08', 2, '', '', '', '', ''),
(10, 'ธิดารัตน์ อารีรักษ์', 9, 'ผศ.ดร.', 'ธิดารัตน์ อารีรักษ์', 'อาจารย์', 151022, '', 249003, '2019-02-08', 2, '', '', '', '', ''),
(11, 'เพื่อการศึกษาและปฎิบัติงาน', 2, 'นาย', 'ธีระพล ขจัดมลทิน', 'นักเทคโนโลยีการศึกษา', 242010, 'สำนักงาน', 249003, '2019-02-08', 2, '', 'ราตรี เวชวิริยกุล', '', 'ศ. ดร.สุขสันติ์ หอพิบูลสุข', 'ผู้อำนวยการศูนย์คอมพิวเตอร์'),
(12, 'เพื่อปฏิบัติงาน', 20, 'น.ส.', 'พลอยนภา จิตระวัง', 'สถาปนิก', 253004, 'อาคาร', 249003, '2019-02-08', 7, '', '', '', '', ''),
(13, 'เพื่อจัดทำสื่อการเรียนการสอน', 15, 'นาย', 'อภิเษก แตงอ่อน', 'พนักงานทั่วไป', 126, 'LAB', 249003, '2019-02-08', 7, '', 'ราตรี เวชวิริยกุล', 'หัวหน้าฝ่ายบริหารงานทั่วไป', '', ''),
(14, 'เพื่อปฎิบัติงาน', 32, 'Mr.', 'Apisak naja', 'ผู้ช่วย', 12211, 'สำนักงาน', 249003, '2019-02-08', 7, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `allocate_detail`
--

CREATE TABLE `allocate_detail` (
  `ald_id` int(11) NOT NULL,
  `ald_eq_id` int(11) NOT NULL,
  `ald_eq_barcode` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ald_eq_serial` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ald_con_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ald_type_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ald_status_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ac_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `allocate_detail`
--

INSERT INTO `allocate_detail` (`ald_id`, `ald_eq_id`, `ald_eq_barcode`, `ald_eq_serial`, `ald_con_name`, `ald_type_name`, `ald_status_name`, `ac_id`) VALUES
(1, 21, '﻿PC69-2560-200', 'SGH713Q86K', '2560', 'Computer', 'จัดสรร', 1),
(2, 22, 'PC69-2560-201', 'SGH713Q88Z', '2560', 'Computer', 'จัดสรร', 2),
(3, 23, 'PC69-2560-610', 'SGH713Q8DJ', '2560', 'Computer', 'จัดสรร', 3),
(4, 24, 'PC69-2560-611', 'SGH713Q8DX', '2560', 'Computer', 'จัดสรร', 4),
(5, 25, 'PC69-2560-612', 'SGH713Q8DM', '2560', 'Computer', 'จัดสรร', 5),
(6, 26, 'PC69-2560-772', 'SGH713Q80K', '2560', 'Computer', 'จัดสรร', 6),
(7, 27, 'PC69-2560-773', 'SGH713QCQV', '2560', 'Computer', 'จัดสรร', 7),
(8, 28, 'PC69-2560-774', 'SGH713Q80F', '2560', 'Computer', 'จัดสรร', 8),
(9, 29, 'AIO69-2560-001A', 'SGH717SMJ0', '2560', 'Computer', 'จัดสรร', 9),
(10, 30, 'AIO69-2560-002A', 'SGH717SMKD', '2560', 'Computer', 'จัดสรร', 10),
(11, 11, 'NB69-2560-001', 'SGH713QCVC', '2560', 'Notebook', 'จัดสรร', 11),
(12, 13, 'NB69-2560-003', 'SGH713QCVB', '2560', 'Notebook', 'จัดสรร', 11),
(13, 12, 'NB69-2560-002', 'SGH713QCVA', '2560', 'Notebook', 'รอดำเนินการ', 12),
(14, 14, 'NB69-2560-004', 'SGH713QCVI', '2560', 'Notebook', 'รอดำเนินการ', 12),
(15, 1, '﻿SC88-2560-020', 'SGH716RL5V', '2560', 'Scanner', 'รอดำเนินการ', 13),
(16, 20, 'PC70-2561-005', '36N8MP6', '2561', 'Computer', 'รอดำเนินการ', 13),
(17, 15, 'NB69-2560-005', 'SGH713QCVP', '2560', 'Notebook', 'รอดำเนินการ', 14);

-- --------------------------------------------------------

--
-- Table structure for table `a_status`
--

CREATE TABLE `a_status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `a_status`
--

INSERT INTO `a_status` (`status_id`, `status_name`) VALUES
(1, 'รอจัดสรร'),
(2, 'จัดสรร'),
(3, 'ยืม - คืน'),
(5, 'รอดำเนินการ'),
(6, 'รออนุมัติ '),
(7, 'รอตรวจสอบ'),
(8, 'ไม่ผ่านการตรวจสอบ'),
(10, 'อนุมัติ'),
(11, 'ไม่อนุมัติ'),
(12, 'หมดอายุยืม-คืน');

-- --------------------------------------------------------

--
-- Table structure for table `backup_contract`
--

CREATE TABLE `backup_contract` (
  `buc_id` int(20) NOT NULL,
  `buc_barcode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `buc_serial` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `buc_type_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `buc_con_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `buc_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `backup_permit`
--

CREATE TABLE `backup_permit` (
  `bu_id` int(20) NOT NULL,
  `bu_pm_id` int(20) NOT NULL,
  `bu_pm_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bu_userTname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bu_username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bu_pm_userno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bu_pm_position` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bu_pm_dep` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bu_pm_TypeR` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bu_pm_firstdate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bu_pm_enddate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bu_pm_empno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bu_pm_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bu_pm_eq_id` int(20) NOT NULL,
  `bu_pm_barcode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bu_pm_serial` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bu_pmd_con_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pmd_type_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bu_pm_date_refund` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `backup_permit`
--

INSERT INTO `backup_permit` (`bu_id`, `bu_pm_id`, `bu_pm_name`, `bu_userTname`, `bu_username`, `bu_pm_userno`, `bu_pm_position`, `bu_pm_dep`, `bu_pm_TypeR`, `bu_pm_firstdate`, `bu_pm_enddate`, `bu_pm_empno`, `bu_pm_date`, `bu_pm_eq_id`, `bu_pm_barcode`, `bu_pm_serial`, `bu_pmd_con_name`, `pmd_type_name`, `bu_pm_date_refund`) VALUES
(1, 1, 'เพื่อการเรียนการสอน', 'อ.ดร.', 'Menglim Hoy', '161034', 'อาจารย์', 'สำนักวิชาวิศวกรรมศาสตร์', ' LAB', '2018-11-01', '2019-02-07', '249003', '2019-02-08', 15, 'NB69-2560-005', 'SGH713QCVP', '2560', 'Notebook', '2019-02-08'),
(2, 1, 'เพื่อการเรียนการสอน', 'อ.ดร.', 'Menglim Hoy', '161034', 'อาจารย์', 'สำนักวิชาวิศวกรรมศาสตร์', ' LAB', '2018-11-01', '2019-02-07', '249003', '2019-02-08', 6, 'PC69-2560-001', 'SGH713QCNN', '2560', 'Computer', '2019-02-08');

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--

CREATE TABLE `contract` (
  `con_id` int(11) NOT NULL,
  `con_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `con_des` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `con_exp` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contract`
--

INSERT INTO `contract` (`con_id`, `con_name`, `con_des`, `con_exp`) VALUES
(1, '2560', 'สัญญาเช่าปี 2560', '2021-01-31'),
(2, '2561', 'สัญญาเช่าปี 2561', '2022-12-31'),
(3, '2562', 'สัญญาเช่าปี 2562', '2022-12-30');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dep_id` int(11) NOT NULL,
  `dep_no` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `dep_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `lat` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `lng` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dep_id`, `dep_no`, `dep_name`, `lat`, `lng`) VALUES
(1, '3020000', 'ศูนย์เครื่องมือวิทยาศาสตร์และเทคโนโลยี', '14.8771198', '102.0150082'),
(2, '3070000', 'ศูนย์นวัตกรรมและเทคโนโลยีการศึกษา', '14.8751268', '102.0187935'),
(3, '3040700', 'ห้องปฏิบัติการคอมพิวเตอร์', '14.8773821', '102.019147'),
(4, '1020000', 'สำนักวิชาเทคโนโลยีสังคม', '14.8789486', '102.0186142'),
(5, '4010000', 'เทคโนธานี', '14.876643', '102.0203723'),
(6, '4000100', 'ฟาร์มมหาวิทยาลัย', '14.8898457', '102.0046529'),
(7, '1070000', 'สำนักวิชาวิศวกรรมศาสตร์', '14.8788808', '102.0185519'),
(8, '0020200', 'ส่วนสารบรรณและนิติการ', '14.8787264', '102.0160486'),
(9, '1010000', 'สำนักวิชาวิทยาศาสตร์', '14.8787484', '102.0185993'),
(10, '1030000', 'สำนักวิชาเทคโนโลยีการเกษตร', '14.879301', '102.0195561'),
(11, '1060000', 'สำนักวิชาแพทยศาสตร์', '14.8793009', '102.0157259'),
(12, '0021100', 'สถานกีฬาและสุขภาพ', '14.8801425', '102.0208932'),
(13, '1100000', 'สำนักวิชาสาธารณสุขศาสตร์', '14.8782181', '102.0174985'),
(14, '1080000', 'สำนักวิชาพยาบาลศาสตร์', '14.8786606', '102.0191212'),
(15, '0020900', 'ส่วนกิจการนักศึกษา', '14.8846142', '102.0133704'),
(16, '3040000', 'ศูนย์คอมพิวเตอร์', '14.8777519', '102.0171463'),
(17, '0020400', 'ส่วนการเงินและบัญชี', '14.8792188', '102.0179657'),
(18, '3010000', 'ศูนย์บรรณสารและสื่อการศึกษา', '14.8784221', '102.0135227'),
(19, '0030100', 'สำนักงานสภามหาวิทยาลัย', '14.8788163', '102.0190332'),
(20, '0020500', 'ส่วนอาคารสถานที่', '14.879839', '102.0196746'),
(21, '0020100', 'ส่วนส่งเสริมวิชาการ', '14.8795968', '102.0204155'),
(22, '0020600', 'ส่วนพัสดุ', '14.8781371', '102.019103'),
(23, '0020700', 'ส่วนแผนงาน', '14.8781371', '102.019103'),
(24, '0021000\r\n', 'ส่วนประชาสัมพันธ์', '14.8772039', '102.0193873'),
(25, '0021400', 'สถานพัฒนาคณาจารย์', '14.8798107', '102.0191386'),
(26, '0021500\r\n', 'สถานส่งเสริมและพัฒนาระบบสารสนเทศเพื่อการจัดการ', '14.8791611', '102.0194642'),
(27, '0021700', 'ส่วนบริหารสินทรัพย์', '14.8788474', '102.0190225'),
(28, '0021800', 'โครงการจัดตั้งศูนย์ปฏิบัติการวิจัยรังสีรักษาจากโบรอนจับยึดนิวตรอน', '14.872189', '102.0217882'),
(29, '0021200', 'หน่วยประสานงาน มทส. กทม.', '13.756198', '100.5326992'),
(30, '2010000\r\n', 'สถาบันวิจัยและพัฒนา\r\n', '14.876224', '102.0172201'),
(31, '0020000', 'สำนักงานอธิการบดี', '14.8782236', '102.0170141'),
(32, '0020300', 'ส่วนการเจ้าหน้าที่', '14.8806775', '102.0170397'),
(33, '0030200\r\n', 'หน่วยตรวจสอบภายใน\r\n', '14.8792227', '102.0186194'),
(34, '3030000\r\n', 'ศูนย์บริการการศึกษา\r\n', '14.8792752', '102.0195949'),
(35, '3080000\r\n', 'ศูนย์สหกิจศึกษาและพัฒนาอาชีพ\r\n', '14.8814744', '102.013366'),
(36, '3060000\r\n', 'ศูนย์กิจการนานาชาติ\r\n', '14.878213', '102.018513'),
(37, '0021900\r\n', 'โรงเรียนสุรวิวัฒน์\r\n', '14.8744473', '102.0287921'),
(38, '3040009\r\n', 'AUAP', '14.8798014', '102.0175956'),
(39, '4000200\r\n', 'สุรสัมมนาคาร\r\n', '14.8762854', '102.0228066');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_no` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `emp_fname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `emp_lname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `emp_position` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `emp_tel` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `emp_mail` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `emp_pic` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `emp_user` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `emp_pass` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `emp_status` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_no`, `emp_id`, `emp_fname`, `emp_lname`, `emp_position`, `emp_tel`, `emp_mail`, `emp_pic`, `emp_user`, `emp_pass`, `emp_status`) VALUES
(1, 5870547, 'นภาพร', 'เมืองสิทธิ์', 'ผู้ดูแลระบบ', '1234', 'napa@sut.ac.th', '111.jpg', 'admin', '1234', 'admin'),
(2, 249003, 'พนัชธนัญ', 'สระแกทอง', 'เจ้าหน้าที่บริหารทั่วไป', '4806', 'tang@sut.ac.th', 'female1-512.png', 'user1', '1234', 'member'),
(3, 237006, 'ราตรี', 'เวชวิริยกุล', 'หัวหน้าฝ่ายบริหารงานทั่วไป', '4800', 'ratree@sut.ac.th', '22.jpg', 'user2', '1234', 'head'),
(4, 110000, 'ศ. ดร.สุขสันติ์', 'หอพิบูลสุข', 'ผู้อำนวยการศูนย์คอมพิวเตอร์', '4693,4322', 'suksun@sut.ac.th', 'Suksun Horpibulsuk.jpg', 'user3', '1234', 'leader');

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `eq_id` int(11) NOT NULL,
  `eq_barcode` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `eq_serial` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `eq_status` int(11) DEFAULT NULL,
  `eq_tor` int(11) DEFAULT NULL,
  `eq_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`eq_id`, `eq_barcode`, `eq_serial`, `eq_status`, `eq_tor`, `eq_date`) VALUES
(1, '﻿SC88-2560-020', 'SGH716RL5V', 5, 5, '2019-02-08'),
(2, 'SC88-2560-021', 'SGH717SNN1', 1, 5, '2019-02-08'),
(3, 'SC88-2560-022', 'SGH717SNG4', 1, 5, '2019-02-08'),
(4, 'SC88-2560-023', 'SGH717SNGJ', 1, 5, '2019-02-08'),
(5, 'SC88-2560-024', 'SGH716RL29', 5, 5, '2019-02-08'),
(6, 'PC69-2560-001', 'SGH713QCNN', 1, 3, '2019-02-08'),
(7, 'PC69-2560-002', 'SGH713QCNG', 5, 3, '2019-02-08'),
(8, 'PC69-2560-003', 'SGH713QCNA', 5, 3, '2019-02-08'),
(9, 'PC69-2560-004', 'SGH713QCND', 5, 3, '2019-02-08'),
(10, 'PC69-2560-005', 'SGH713QCNE', 5, 3, '2019-02-08'),
(11, 'NB69-2560-001', 'SGH713QCVC', 2, 4, '2019-02-08'),
(12, 'NB69-2560-002', 'SGH713QCVA', 5, 4, '2019-02-08'),
(13, 'NB69-2560-003', 'SGH713QCVB', 2, 4, '2019-02-08'),
(14, 'NB69-2560-004', 'SGH713QCVI', 5, 4, '2019-02-08'),
(15, 'NB69-2560-005', 'SGH713QCVP', 5, 4, '2019-02-08'),
(16, 'PC70-2561-001', '36N8MP2', 1, 7, '2019-02-08'),
(17, 'PC70-2561-002', '36N8MP3', 5, 7, '2019-02-08'),
(18, 'PC70-2561-003', '36N8MP4', 1, 7, '2019-02-08'),
(19, 'PC70-2561-004', '36N8MP5', 1, 7, '2019-02-08'),
(20, 'PC70-2561-005', '36N8MP6', 5, 7, '2019-02-08'),
(21, '﻿PC69-2560-200', 'SGH713Q86K', 2, 3, '2019-02-08'),
(22, 'PC69-2560-201', 'SGH713Q88Z', 2, 3, '2019-02-08'),
(23, 'PC69-2560-610', 'SGH713Q8DJ', 2, 3, '2019-02-08'),
(24, 'PC69-2560-611', 'SGH713Q8DX', 2, 3, '2019-02-08'),
(25, 'PC69-2560-612', 'SGH713Q8DM', 2, 3, '2019-02-08'),
(26, 'PC69-2560-772', 'SGH713Q80K', 2, 3, '2019-02-08'),
(27, 'PC69-2560-773', 'SGH713QCQV', 2, 3, '2019-02-08'),
(28, 'PC69-2560-774', 'SGH713Q80F', 2, 3, '2019-02-08'),
(29, 'AIO69-2560-001A', 'SGH717SMJ0', 2, 3, '2019-02-08'),
(30, 'AIO69-2560-002A', 'SGH717SMKD', 2, 3, '2019-02-08');

-- --------------------------------------------------------

--
-- Table structure for table `permit`
--

CREATE TABLE `permit` (
  `pm_id` int(20) NOT NULL,
  `pm_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pm_userTname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pm_username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pm_userno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pm_position` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pm_dep` int(50) NOT NULL,
  `pm_TypeR` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pm_firstdate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pm_enddate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pm_empno` int(50) NOT NULL,
  `pm_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pm_status` int(11) NOT NULL,
  `pm_note` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pm_head` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `pm_hd_position` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `pm_head_dc` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `pm_dc_position` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `pm_date_refund` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pm_date_analys` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permit`
--

INSERT INTO `permit` (`pm_id`, `pm_name`, `pm_userTname`, `pm_username`, `pm_userno`, `pm_position`, `pm_dep`, `pm_TypeR`, `pm_firstdate`, `pm_enddate`, `pm_empno`, `pm_date`, `pm_status`, `pm_note`, `pm_head`, `pm_hd_position`, `pm_head_dc`, `pm_dc_position`, `pm_date_refund`, `pm_date_analys`) VALUES
(2, 'เพื่อจัดทำการสอน', 'น.ส.', 'บุญญาพร  จูมลี', '000431', 'พนักงานที่ปรึกษา', 21, ' สำนักงาน', '2018-10-02', '2019-07-31', 249003, '2019-02-08', 8, 'เครื่องถูกยืม', 'ราตรี เวชวิริยกุล', 'หัวหน้าฝ่ายบริหารงานทั่วไป', '', '', '', '2019-02-08'),
(3, 'เพื่อปฎิบัติงาน', 'นาง', 'ทันใจ สมศักดิ์', '236085', 'เจ้าหน้าที่บริหารงานทั่วไป', 20, ' สำนักงาน', '2019-02-22', '2019-06-30', 249003, '2019-02-08', 7, '', '', '', '', '', '', '2019-02-08'),
(4, 'เพื่อปฏิบัติงาน', 'อ.ดร.', 'พนา เกศทอง', '12345', 'เจ้าหน้าที่ห้องทดลอง', 5, ' LAB', '2019-02-08', '2019-08-09', 249003, '2019-02-08', 7, '', '', '', '', '', '', '2019-02-08');

-- --------------------------------------------------------

--
-- Table structure for table `permit_detail`
--

CREATE TABLE `permit_detail` (
  `pmd_id` int(20) NOT NULL,
  `pmd_eq_id` int(20) NOT NULL,
  `pmd_eq_barcode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pmd_eq_serial` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pmd_con_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pmd_type_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pmd_status_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `per_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permit_detail`
--

INSERT INTO `permit_detail` (`pmd_id`, `pmd_eq_id`, `pmd_eq_barcode`, `pmd_eq_serial`, `pmd_con_name`, `pmd_type_name`, `pmd_status_name`, `per_id`) VALUES
(3, 8, 'PC69-2560-003', 'SGH713QCNA', '2560', 'Computer', 'รอดำเนินการ', 2),
(4, 10, 'PC69-2560-005', 'SGH713QCNE', '2560', 'Computer', 'รอดำเนินการ', 2),
(5, 17, 'PC70-2561-002', '36N8MP3', '2561', 'Computer', 'รอดำเนินการ', 2),
(6, 7, 'PC69-2560-002', 'SGH713QCNG', '2560', 'Computer', 'รอดำเนินการ', 3),
(7, 9, 'PC69-2560-004', 'SGH713QCND', '2560', 'Computer', 'รอดำเนินการ', 3),
(8, 5, 'SC88-2560-024', 'SGH716RL29', '2560', 'Scanner', 'รอดำเนินการ', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tor`
--

CREATE TABLE `tor` (
  `tor_id` int(11) NOT NULL,
  `tor_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `tor_des` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `tor_type` int(11) NOT NULL,
  `tor_contract` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tor`
--

INSERT INTO `tor` (`tor_id`, `tor_name`, `tor_des`, `tor_type`, `tor_contract`) VALUES
(1, 'TOR1', 'เครื่องคอมพิวเตอร์ All in one จำนวน 300 เครื่อง', 1, 1),
(3, 'TOR2', 'เครื่องคอมพิวเตอร์ จำนวน 200 เครื่อง พร้อมอุปกรณ์', 2, 1),
(4, 'TOR3', 'เครื่อง Notebook จำนวน 100 เครื่อง', 3, 1),
(5, 'TOR4', 'เครื่อง Scanner จำนวน 50 เครื่อง', 4, 1),
(6, 'TOR5', 'เครื่องคอมพิวเตอร์ All in one จำนวน 200 เครื่อง', 1, 2),
(7, 'TOR6', 'เครื่องอคมพิวเตอร์ จำนวน 150 เครื่อง', 2, 2),
(8, 'TOR7', 'เครื่องคอมพิวเตอร์ Notebook จำนวน 100 เครื่อง', 3, 3),
(9, 'TOR8', 'เครื่องคอมพิวเตอร์ จำนวน 200 เครื่อง พร้อมอุปกรณ์', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `type_eq`
--

CREATE TABLE `type_eq` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `type_eq`
--

INSERT INTO `type_eq` (`type_id`, `type_name`) VALUES
(1, 'All in one'),
(2, 'Computer'),
(3, 'Notebook'),
(4, 'Scanner');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allocate`
--
ALTER TABLE `allocate`
  ADD PRIMARY KEY (`ac_id`),
  ADD KEY `ac_dep` (`ac_dep`),
  ADD KEY `ac_status` (`ac_status`);

--
-- Indexes for table `allocate_detail`
--
ALTER TABLE `allocate_detail`
  ADD PRIMARY KEY (`ald_id`),
  ADD KEY `ac_id` (`ac_id`);

--
-- Indexes for table `a_status`
--
ALTER TABLE `a_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `backup_contract`
--
ALTER TABLE `backup_contract`
  ADD PRIMARY KEY (`buc_id`);

--
-- Indexes for table `backup_permit`
--
ALTER TABLE `backup_permit`
  ADD PRIMARY KEY (`bu_id`);

--
-- Indexes for table `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`con_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dep_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_no`,`emp_id`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`eq_id`,`eq_barcode`),
  ADD KEY `eq_tor` (`eq_tor`),
  ADD KEY `eq_status` (`eq_status`);

--
-- Indexes for table `permit`
--
ALTER TABLE `permit`
  ADD PRIMARY KEY (`pm_id`),
  ADD KEY `pm_status` (`pm_status`),
  ADD KEY `pm_dep` (`pm_dep`);

--
-- Indexes for table `permit_detail`
--
ALTER TABLE `permit_detail`
  ADD PRIMARY KEY (`pmd_id`),
  ADD KEY `per_id` (`per_id`);

--
-- Indexes for table `tor`
--
ALTER TABLE `tor`
  ADD PRIMARY KEY (`tor_id`),
  ADD KEY `tor_ibfk_1` (`tor_type`),
  ADD KEY `tor_contract` (`tor_contract`);

--
-- Indexes for table `type_eq`
--
ALTER TABLE `type_eq`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allocate`
--
ALTER TABLE `allocate`
  MODIFY `ac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `allocate_detail`
--
ALTER TABLE `allocate_detail`
  MODIFY `ald_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `a_status`
--
ALTER TABLE `a_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `backup_contract`
--
ALTER TABLE `backup_contract`
  MODIFY `buc_id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `backup_permit`
--
ALTER TABLE `backup_permit`
  MODIFY `bu_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `contract`
--
ALTER TABLE `contract`
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `eq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `permit`
--
ALTER TABLE `permit`
  MODIFY `pm_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `permit_detail`
--
ALTER TABLE `permit_detail`
  MODIFY `pmd_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tor`
--
ALTER TABLE `tor`
  MODIFY `tor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `type_eq`
--
ALTER TABLE `type_eq`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `allocate`
--
ALTER TABLE `allocate`
  ADD CONSTRAINT `allocate_ibfk_1` FOREIGN KEY (`ac_dep`) REFERENCES `department` (`dep_id`),
  ADD CONSTRAINT `allocate_ibfk_2` FOREIGN KEY (`ac_status`) REFERENCES `a_status` (`status_id`);

--
-- Constraints for table `allocate_detail`
--
ALTER TABLE `allocate_detail`
  ADD CONSTRAINT `allocate_detail_ibfk_1` FOREIGN KEY (`ac_id`) REFERENCES `allocate` (`ac_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `equipment`
--
ALTER TABLE `equipment`
  ADD CONSTRAINT `equipment_ibfk_1` FOREIGN KEY (`eq_tor`) REFERENCES `tor` (`tor_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `equipment_ibfk_2` FOREIGN KEY (`eq_status`) REFERENCES `a_status` (`status_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permit`
--
ALTER TABLE `permit`
  ADD CONSTRAINT `permit_ibfk_1` FOREIGN KEY (`pm_status`) REFERENCES `a_status` (`status_id`),
  ADD CONSTRAINT `permit_ibfk_2` FOREIGN KEY (`pm_dep`) REFERENCES `department` (`dep_id`);

--
-- Constraints for table `permit_detail`
--
ALTER TABLE `permit_detail`
  ADD CONSTRAINT `permit_detail_ibfk_1` FOREIGN KEY (`per_id`) REFERENCES `permit` (`pm_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tor`
--
ALTER TABLE `tor`
  ADD CONSTRAINT `tor_ibfk_1` FOREIGN KEY (`tor_type`) REFERENCES `type_eq` (`type_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tor_ibfk_2` FOREIGN KEY (`tor_contract`) REFERENCES `contract` (`con_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tor_ibfk_3` FOREIGN KEY (`tor_contract`) REFERENCES `contract` (`con_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
