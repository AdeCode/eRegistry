-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2020 at 09:57 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_registry_sita2019`
--

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(10) UNSIGNED NOT NULL,
  `file_no` varchar(45) NOT NULL,
  `file_title` varchar(300) NOT NULL,
  `file_volume` varchar(45) NOT NULL,
  `opened_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `opened_by` int(10) UNSIGNED NOT NULL,
  `movement_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `dispatcher` varchar(70) NOT NULL DEFAULT 'pending',
  `receiver` varchar(70) NOT NULL DEFAULT 'pending',
  `dept` varchar(300) NOT NULL DEFAULT 'pending',
  `location` varchar(45) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `file_no`, `file_title`, `file_volume`, `opened_date`, `opened_by`, `movement_date`, `dispatcher`, `receiver`, `dept`, `location`) VALUES
(1, 'ICT/AD/799T', 'IBM WEST AFRICA LIMITED', '1', '2019-09-24 11:03:05', 6, '2019-09-24 11:13:21', 'ENGR. INNOCENT ', 'MRS OLUGBODE', 'Registry', 'I'),
(2, 'ICT/AD/569', 'RENOVATION OF OFFICE', '1', '2019-09-24 11:29:17', 3, '2019-09-24 12:23:45', 'MR TOSIN ', 'OLAJORIN AC', 'Registry', 'R'),
(3, 'ICT/AD/688T', 'RENOVATION OF SITA PREMISES', '1', '2019-09-24 11:30:15', 3, '2019-09-24 12:21:39', 'OLAJORIN A C ', 'MRS AYETAN', 'Planning and IT Innovation', 'Out of carbinet'),
(4, 'ICT/AD/688', 'RENOVATION OF SITA HQ PREMISES & BUILDINGS', '1', '2019-09-24 11:31:55', 3, '2019-09-24 12:19:54', 'OLAJORIN A C ', 'ENGR..OMOSOWONE', 'Engineering and IT Infrastructures', 'Out of carbinet'),
(5, 'ICT/AD/455/VOL II', 'RESIDENCY CARD PROJECT', '2', '2019-09-24 11:38:18', 3, '2019-09-24 12:18:00', 'OLAJORIN A CAROLINE ', 'MRS ODERINDE', 'Civic Data Management', 'Out of carbinet'),
(6, 'ICT/AD/247', 'MATTERS AFFECTING INTERNAL AUDIT SECTION', '1', '2019-09-24 11:40:57', 5, '2019-09-24 12:05:54', 'MRS ODERINDE ', 'MRS OLUGBODE', 'Registry', 'M'),
(7, 'ICT/AD/295', 'MAINTENANCE OF COMPUTERS', '1', '2019-09-24 11:41:45', 5, '2019-09-24 12:05:17', 'MRS ODERINDE ', 'MRS OLUGBODE', 'Registry', 'M'),
(8, 'ICT/AD/751', 'MATTERS AFFECTING DISEASES AND VIRUS CONTROL', '1', '2019-09-24 11:42:43', 5, '2019-09-24 12:06:30', 'MRS ODERINDE ', 'MRS OLUGBODE', 'Registry', 'M'),
(9, 'ICT/AD/310T', 'MAINTENANCE & MGT OF NETWORK INFRASTRUCTURE', '1', '2019-09-24 11:44:38', 5, '2019-09-24 12:10:23', 'MRS OLUGBODE ', 'MRS OLUBUKOLA', 'Software Development', 'Out of carbinet'),
(10, 'ICT/AD/588', 'MATTERS AFFECTING TEMPORARY STAFF', '1', '2019-09-24 11:45:29', 5, '2019-09-24 12:11:14', 'MRS OLUGBODE ', 'MRS OLUBUKOLA', 'Software Development', 'Out of carbinet'),
(11, 'ICT/AD/514', 'CORRESPONDENCE WITH TEACHING SERVICE COMMISSION', '1', '2019-09-24 11:47:44', 4, '2019-09-24 12:25:29', 'MISS ADELUSI ', 'MISS SUNMOLA', 'Registry', 'C'),
(12, 'ICT/AD/711', 'CORRESPONDENCE ON HEALTH INSURANCE COMMISSION', '1', '2019-09-24 11:48:28', 4, '2019-09-24 12:33:11', 'MISS SUNMOLA ', 'MISS ADELUSI', 'Planning and IT Innovation', 'Out of carbinet'),
(13, 'ICT/AD/563T', 'CORRESPONDENCE WITH MINISTRY OF WORKS', '1', '2019-09-24 11:49:06', 4, '2019-09-24 12:32:32', 'MISS SUNMOLA ', 'MISS AKINSEYE', 'Engineering and IT Infrastructures', 'Out of carbinet'),
(14, 'ICT/AD/738', '2014 CAPITAL PROJECTS OFFICE EQUIPMENT HQRTS', '1', '2019-09-24 11:50:14', 4, '2019-09-24 12:31:36', 'MISS SUNMOLA ', 'MRS OLALEYE', 'Finance and Administration', 'Out of carbinet'),
(15, 'ICT/237', 'CORRESPONDENCE WITH OCEANIC BANK', '1', '2019-09-24 11:50:47', 4, '2019-09-24 12:26:20', 'MR WOLE ', 'MISS SUNMOLA', 'Registry', 'C'),
(16, 'ICT/AD/741', 'FIELD WORK', '1', '2019-09-24 11:55:30', 6, '0000-00-00 00:00:00', 'pending', 'pending', 'pending', 'pending'),
(17, 'ICT/AD/470', 'FOUNDATION LECTURE', '1', '2019-09-24 11:57:48', 6, '0000-00-00 00:00:00', 'pending', 'pending', 'pending', 'pending'),
(18, 'ICT/AD/747', 'FINANCIAL ASSISTANCE', '1', '2019-09-24 11:59:44', 6, '0000-00-00 00:00:00', 'pending', 'pending', 'pending', 'pending'),
(19, 'ICT/AD/519T1', 'FLAG - OFF OF KAADI IGBE-AYO', '1', '2019-09-24 12:02:44', 6, '0000-00-00 00:00:00', 'pending', 'pending', 'pending', 'pending'),
(20, 'ICT/AD/674T', 'WEB ADMINISTRATION', '1', '2019-09-24 14:12:52', 7, '2019-09-24 14:17:30', 'DUPE ', 'MRS ATANLOGUN', 'Registry', 'W');

-- --------------------------------------------------------

--
-- Table structure for table `incoming_mails`
--

CREATE TABLE `incoming_mails` (
  `id` int(10) UNSIGNED NOT NULL,
  `ref_no` varchar(45) NOT NULL,
  `title` varchar(300) NOT NULL,
  `mail_from` varchar(300) NOT NULL,
  `dispatcher` varchar(70) NOT NULL,
  `receiver` varchar(70) NOT NULL,
  `date_reception` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `dispatcher4charging` varchar(70) NOT NULL DEFAULT 'pending',
  `receiver4charging` varchar(70) NOT NULL DEFAULT 'pending',
  `office4charging` varchar(300) NOT NULL DEFAULT 'pending',
  `date4charging` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `dispatcherAfterCharging` varchar(70) NOT NULL DEFAULT 'pending',
  `receiverAfterCharging` varchar(70) NOT NULL DEFAULT 'pending',
  `dateAfterCharging` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `stage_status` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `file_no` varchar(45) NOT NULL DEFAULT 'pending',
  `file_volume` varchar(45) NOT NULL DEFAULT 'pending',
  `file_page_no` varchar(45) NOT NULL DEFAULT 'pending',
  `type` varchar(45) NOT NULL DEFAULT 'mail'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `incoming_mails`
--

INSERT INTO `incoming_mails` (`id`, `ref_no`, `title`, `mail_from`, `dispatcher`, `receiver`, `date_reception`, `dispatcher4charging`, `receiver4charging`, `office4charging`, `date4charging`, `dispatcherAfterCharging`, `receiverAfterCharging`, `dateAfterCharging`, `stage_status`, `file_no`, `file_volume`, `file_page_no`, `type`) VALUES
(1, 'TSCA 1693/17', 'RE:MAITENANCE OF TESCOM WEBSITE', 'OFFICE OF THE CHAIRMAN ONDO STATE', 'MR. TUNDE', 'MRS. ATANLOGUN', '2019-09-24 10:43:09', 'pending', 'pending', 'pending', '0000-00-00 00:00:00', 'pending', 'pending', '0000-00-00 00:00:00', 5, 'ICT/AD/514', '1', '5', 'Memo'),
(2, 'MJ/DCL/19/49', 'RE: REQUEST FOR BRIEF', 'MINISTRY OF JUSTICE', 'MR OWOLABI', 'MRS ATANLOGUN', '2019-09-24 12:28:47', 'MRS ATANLOGUN', 'PA TO SSA', 'SSA Office', '2019-09-24 12:30:04', 'MRS OLORUNTOBA', 'MRS OLUGBODE', '2019-09-24 14:06:21', 4, 'pending', 'pending', 'pending', 'Memo'),
(3, 'ODCDC/AD/106/76', 'Request For The Release Of Fund', 'MINISTRY OF FINANCE', 'MR. AFOLAYAN', 'MRS. ATANLOGUN', '2019-09-24 13:22:11', 'pending', 'pending', 'pending', '0000-00-00 00:00:00', 'pending', 'pending', '0000-00-00 00:00:00', 99, 'pending', 'pending', 'pending', 'Circular'),
(4, 'ICT/AD/674T/27', 'PROCUREMENT OF ESSENTIAL OFFICE ITEMS', 'MIN. OF FINANCE', 'MR. TUNDE', 'MRS. OLAJORIN', '2019-09-24 13:50:54', 'MRS OLAJORIN', 'MRSO LORUNTOBA', 'PS Office', '2019-09-24 13:53:17', 'MRS OLORUNTOBA', 'MRS OLUGBODE', '2019-09-24 14:06:21', 5, 'ICT/AD/674T', '1', '27', 'Circular');

-- --------------------------------------------------------

--
-- Table structure for table `leave_application`
--

CREATE TABLE `leave_application` (
  `id` int(11) NOT NULL,
  `leave_type` varchar(30) NOT NULL,
  `leave_start_date` datetime NOT NULL,
  `leave_end_date` datetime NOT NULL,
  `status` varchar(20) NOT NULL,
  `Staff_id` varchar(10) NOT NULL,
  `date_of_application` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leave_application`
--

INSERT INTO `leave_application` (`id`, `leave_type`, `leave_start_date`, `leave_end_date`, `status`, `Staff_id`, `date_of_application`) VALUES
(51, 'casual leave', '2020-01-20 01:00:00', '2020-01-23 01:00:00', 'Approved', 'OD/001', '2020-01-19 16:34:35'),
(61, 'annual leave', '2020-02-03 01:00:00', '2020-02-13 01:00:00', 'Approved', 'OD/002', '2020-01-21 16:09:43'),
(62, 'maternity leave', '2020-02-14 01:00:00', '2020-03-02 01:00:00', 'Approved', 'OD/002', '2020-01-21 16:12:54');

-- --------------------------------------------------------

--
-- Table structure for table `leave_approved`
--

CREATE TABLE `leave_approved` (
  `id` int(11) NOT NULL,
  `Staff_id` varchar(10) NOT NULL,
  `type` varchar(20) NOT NULL,
  `days_taken` int(2) NOT NULL,
  `days_left` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leave_approved`
--

INSERT INTO `leave_approved` (`id`, `Staff_id`, `type`, `days_taken`, `days_left`) VALUES
(7, 'OD/003', 'casual leave', 6, 18),
(8, 'OD/001', 'casual leave', 3, 17),
(11, 'OD/002', 'annual leave', 9, 11);

-- --------------------------------------------------------

--
-- Table structure for table `outgoing_mails`
--

CREATE TABLE `outgoing_mails` (
  `id` int(10) UNSIGNED NOT NULL,
  `ref_no` varchar(45) NOT NULL,
  `title` varchar(300) NOT NULL,
  `mail_from` varchar(300) NOT NULL,
  `mail_to` varchar(300) NOT NULL,
  `dispatcher` varchar(70) NOT NULL,
  `receiver` varchar(70) NOT NULL,
  `date_dispatch` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `stage_status` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `file_no` varchar(45) NOT NULL DEFAULT 'pending',
  `file_volume` varchar(45) NOT NULL DEFAULT 'pending',
  `file_page_no` varchar(45) NOT NULL DEFAULT 'pending',
  `type` varchar(45) NOT NULL DEFAULT 'mail'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `outgoing_mails`
--

INSERT INTO `outgoing_mails` (`id`, `ref_no`, `title`, `mail_from`, `mail_to`, `dispatcher`, `receiver`, `date_dispatch`, `stage_status`, `file_no`, `file_volume`, `file_page_no`, `type`) VALUES
(1, 'ODCDC/AD/106/76', 'Request For The Release Of Fund', 'PLANNING', 'MINISTRY OF FINANCE', 'MRS. ATANLOGUN', 'MR. AFOLAYAN', '2019-09-24 13:22:11', 0, 'pending', 'pending', 'pending', 'Circular');

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `id` int(11) NOT NULL,
  `Staff_id` varchar(10) NOT NULL,
  `Staff_name` varchar(70) NOT NULL,
  `first_appointment` datetime NOT NULL,
  `Present_appointment` datetime NOT NULL,
  `Present_post` varchar(100) NOT NULL,
  `Grade_level` int(2) NOT NULL,
  `Duty_post` varchar(30) NOT NULL,
  `Cadre` varchar(20) NOT NULL,
  `D_O_B` datetime NOT NULL,
  `Home_town` varchar(30) NOT NULL,
  `LG` varchar(30) NOT NULL,
  `Gender` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`id`, `Staff_id`, `Staff_name`, `first_appointment`, `Present_appointment`, `Present_post`, `Grade_level`, `Duty_post`, `Cadre`, `D_O_B`, `Home_town`, `LG`, `Gender`) VALUES
(1, 'OD/001', 'Omosetan Omorele', '2019-12-17 00:00:00', '2019-12-18 00:00:00', 'Chief Driver', 7, 'Akure', 'Driver', '1990-12-09 00:00:00', 'Akoko', 'Akure-South', 'male'),
(2, '001', 'OLUMBE AKINKUGBE', '2017-01-04 00:00:00', '2017-01-04 00:00:00', 'Senior Special Asst. To Mr. Gov.', 0, 'Akure', 'Political', '0000-00-00 00:00:00', 'Ondo', 'Ondo-West', 'male'),
(3, '002', 'ADEMO ADEGBOYE', '2011-12-06 00:00:00', '2017-01-01 00:00:00', 'Chief Driver/Mech III', 7, 'Akure', 'Driver', '1977-03-19 00:00:00', 'Ondo', 'Ondo West', 'male'),
(4, 'OD/002', 'Bamidele Opeyemi', '2015-02-06 00:00:00', '2019-10-01 00:00:00', 'Technical Officer', 7, 'Akure', 'Prog. Analyst', '1985-02-05 00:00:00', 'Ikene', 'Akure South', 'male'),
(5, 'OD/003', 'Olugbode Atinuke Esther', '1999-12-01 00:00:00', '2016-01-01 00:00:00', 'Technical Officer', 7, 'Akure', 'Prog. Analyst', '1980-02-02 00:00:00', 'Akoko', 'Akure South', 'female'),
(6, 'OD/022', 'Adeola Yemisi', '2017-05-17 00:00:00', '2019-09-12 00:00:00', 'Director', 9, 'Akure', 'Admin', '1989-02-02 00:00:00', 'Idanre', 'Akure South', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(300) NOT NULL COMMENT 'always use a unique identifier such as email, phone number etc',
  `Staff_id` varchar(10) NOT NULL,
  `password` varchar(300) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `sex` varchar(45) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `role` varchar(300) NOT NULL COMMENT 'Developer, Admin or User',
  `status` varchar(10) NOT NULL COMMENT 'active or inactive',
  `photo` varchar(300) NOT NULL DEFAULT 'avatar.png' COMMENT 'passport photograph url',
  `date_created` varchar(30) NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `Staff_id`, `password`, `fullname`, `sex`, `phone`, `role`, `status`, `photo`, `date_created`, `created_by`) VALUES
(3, 'aarinolacaroline@yahoo.com', '', 'sunkanmi', 'Olajorin Arinola Caroline', 'female', '08062310033', 'users', 'active', 'avatar.png', '20190920', 1),
(11, 'adeola@gmail.com', '', 'password', 'Adeola Yemisi', 'male', '08077447755', 'users', 'active', 'avatar.png', ' 2020-01-21 16:18:37 ', 1),
(1, 'admin_opedethanks@gmail.com', '', 'opeyemi', 'Bamidele Opeyemi', 'male', '08079672497', 'admin', 'active', 'avatar.png', '20190601', 1),
(6, 'folasadeatanlogun@gmail.com', '', 'olajide', 'Atanlogun Folasade', 'female', '08036500289', 'users', 'active', 'avatar.png', '20190924', 1),
(9, 'isola@gmail.com', 'OD/001', 'password', 'Isola Oladele', 'male', '08066559966', 'admin', 'active', 'avatar.png', ' 2019-12-23 11:57:51 ', 1),
(10, 'oluwaseun@gmail.com', '', 'password', 'Oluwaseun Olaosebikan', 'male', '08055665566', 'users', 'active', 'avatar.png', ' 2020-01-21 11:34:57 ', 1),
(12, 'omoh@gmail.com', 'OD/015', 'password', 'Kehinde Omoh', 'female', '08077447777', 'users', 'active', 'avatar.png', ' 2020-01-21 16:32:58 ', 1),
(8, 'omosetan@gmail.com', '', 'password', 'Omosetan Omorele', 'male', '08055662266', 'users', 'active', 'avatar.png', ' 2019-12-17 11:18:04 ', 1),
(2, 'opedethanks@gmail.com', 'OD/002', 'opeyemi', 'Bamidele Opeyemi', 'male', '08079672497', 'users', 'active', 'avatar.png', '20190601', 1),
(7, 'salewayemi@yahoo.com', '', 'bukola82', 'OLUBUKOLA OMOSALEWA', 'female', '07062051204', 'users', 'active', 'avatar.png', '20190924', 1),
(5, 'tinugold18@gmail.com', 'OD/003', 'jomiloju', 'Olugbode Atinuke Estfer', 'female', '08062803353', 'users', 'active', 'avatar.png', '20190924', 1),
(4, 'yinkasunmola@gmail.com', 'OD/005', 'yinka', 'Sunmola Adeyinka', 'female', '08063121944', 'users', 'active', 'avatar.png', '20190924', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incoming_mails`
--
ALTER TABLE `incoming_mails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_application`
--
ALTER TABLE `leave_application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_approved`
--
ALTER TABLE `leave_approved`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outgoing_mails`
--
ALTER TABLE `outgoing_mails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`) USING BTREE,
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `incoming_mails`
--
ALTER TABLE `incoming_mails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `leave_application`
--
ALTER TABLE `leave_application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `leave_approved`
--
ALTER TABLE `leave_approved`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `outgoing_mails`
--
ALTER TABLE `outgoing_mails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
