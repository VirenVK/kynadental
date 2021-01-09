-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2020 at 06:47 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exafinance`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('3g7ir13g1udbd9r01kbhupjhp0qi2so6', '127.0.0.1', 1574013224, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537343031333232343b),
('6pmkkhbj158te1kjn8cjatla6q0f4dt4', '127.0.0.1', 1574151996, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537343134353531373b),
('6ua9u496grmil50f7hh1fgfvmlvd5ioq', '::1', 1577987601, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537373938373432303b),
('7h71rgd10073dh44ostb7pkeaj349esf', '::1', 1578245450, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537383234353435303b),
('a8uuogjupkl8gimal0irdsouqiogtok4', '127.0.0.1', 1575911154, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537353931313135343b),
('av2k2sff6hdcstv5c09rkmuukknvi2v8', '127.0.0.1', 1574159377, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537343135393337373b),
('crqngklnj2k1h9cti4dn53hobp6s4nd5', '::1', 1578245436, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537383234353330373b),
('ip3icu0q5sod2s39v55hd38u9sc1nhkd', '127.0.0.1', 1574090992, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537343039303939323b),
('ng96kdeo0uuou060a9eai8n5vhcsklvd', '127.0.0.1', 1574008491, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537343030383439313b),
('o023qrq2p8o98tp78mbmqueu7js5ah2o', '::1', 1578245406, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537383234353339303b),
('pva4g13buo82k0bifus72p2gur26s6qp', '::1', 1578246409, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537383234363430393b),
('q2sa1cspq1kcnn7o0tcghkr9hun10ada', '127.0.0.1', 1574022410, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537343032323431303b);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id_department` int(11) NOT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` int(11) NOT NULL DEFAULT 0,
  `dept_code` char(10) DEFAULT NULL,
  `name` varchar(85) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0-Deleted,1-Active,2-InActive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id_department`, `modified_at`, `modified_by`, `dept_code`, `name`, `status`) VALUES
(1, '2019-09-12 00:00:00', 1, 'ADB', 'Admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `document_number`
--

CREATE TABLE `document_number` (
  `id_doc_num` int(11) NOT NULL,
  `doc_code` varchar(4) NOT NULL,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `num_prefix` char(4) DEFAULT NULL,
  `doc_num` int(11) NOT NULL,
  `is_active` tinyint(2) NOT NULL DEFAULT 1 COMMENT '0-Deleted,1-Active,2-InActive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `document_number`
--

INSERT INTO `document_number` (`id_doc_num`, `doc_code`, `date`, `num_prefix`, `doc_num`, `is_active`) VALUES
(1, 'EMP', '2020-01-02 23:17:22', 'E', 101, 1),
(2, 'USER', '2019-11-23 16:00:58', 'C', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_login` bigint(20) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `id_user` int(11) NOT NULL DEFAULT 0,
  `username` varchar(150) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `login_out_time` datetime DEFAULT NULL,
  `ci_session_id` varchar(150) DEFAULT NULL,
  `login_status` enum('ONLINE','OFFLINE') NOT NULL DEFAULT 'OFFLINE',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_login`, `created_at`, `id_user`, `username`, `password`, `last_login`, `login_out_time`, `ci_session_id`, `login_status`, `is_active`) VALUES
(1, '2019-03-31 00:00:00', 1, 'deepak@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2019-10-28 13:38:09', '2020-01-05 18:46:48', '', 'OFFLINE', 'Y'),
(2, '2019-09-27 13:43:35', 2, 'deepak.k@exalogic.co', 'e10adc3949ba59abbe56e057f20f883e', NULL, '2020-01-05 18:41:43', '', 'OFFLINE', 'Y'),
(3, '2019-09-27 13:43:43', 4, 'ahmedi@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, '2020-01-05 18:44:53', '', 'OFFLINE', 'Y'),
(4, '2020-01-02 18:47:58', 5, 'deepaksinghdelhi96@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, '2020-01-02 18:50:20', '', 'OFFLINE', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `master_country_state_city`
--

CREATE TABLE `master_country_state_city` (
  `id` int(11) NOT NULL,
  `id_parent` int(11) NOT NULL DEFAULT 0,
  `name` varchar(80) NOT NULL,
  `country_level` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_country_state_city`
--

INSERT INTO `master_country_state_city` (`id`, `id_parent`, `name`, `country_level`) VALUES
(1, 0, 'India', 1),
(2, 1, 'Karnataka', 2),
(3, 2, 'Bangalore', 3),
(4, 3, 'Mg road', 4),
(5, 1, 'UP', 2),
(6, 5, 'Lucknow', 3),
(7, 0, 'China', 1),
(8, 7, 'Beijing', 2),
(9, 8, 'Shanghai', 3),
(10, 9, 'Chinatown', 4),
(11, 0, 'Dubai', 1),
(12, 11, 'Dubai', 2),
(13, 12, 'Dubai', 3);

-- --------------------------------------------------------

--
-- Table structure for table `master_data`
--

CREATE TABLE `master_data` (
  `id` int(11) NOT NULL,
  `parent_code` char(15) DEFAULT NULL,
  `name` varchar(150) DEFAULT NULL,
  `is_active` enum('Y','N') DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `master_data`
--

INSERT INTO `master_data` (`id`, `parent_code`, `name`, `is_active`) VALUES
(29, 'LANGUAGE', 'English', 'Y'),
(30, 'CURRENCY', 'INR', 'Y'),
(31, 'LANGUAGE', 'Arabic', 'Y'),
(32, 'CURRENCY', 'Dirhams', 'Y'),
(33, 'TYPECMPNY', 'Company', 'Y'),
(34, 'TYPECMPNY', 'Association', 'Y'),
(35, 'STATUS', 'Active', 'Y'),
(36, 'PRDINDCTR', 'Default', 'Y'),
(37, 'SUB_PERIOD', 'Years', 'Y'),
(38, 'SUB_PERIOD', 'Quatar', 'Y'),
(39, 'SUB_PERIOD', 'Monthly', 'Y'),
(40, 'ACCOUNT_LEVEL', '1', 'Y'),
(41, 'ACCOUNT_LEVEL', '2', 'Y'),
(42, 'ACCOUNT_LEVEL', '3', 'Y'),
(43, 'ACCOUNT_LEVEL', '4', 'Y'),
(44, 'ACCOUNT_LEVEL', '5', 'Y'),
(45, 'ACCOUNT_TYPE', 'Sales', 'Y'),
(46, 'ACCOUNT_TYPE', 'Expenditure', 'Y'),
(47, 'ACCOUNT_TYPE', 'Other', 'Y'),
(48, 'PRDSTATUS', 'Unlocked', 'Y'),
(49, 'PRDSTATUS', 'Locked', 'Y'),
(50, 'TYPECMPNY', 'Community', 'Y'),
(51, 'BNKACTTYP', 'Saving Account', 'Y'),
(52, 'BNKACTTYP', 'Current Account', 'Y'),
(53, 'UNITYTYP', '1 BHK', 'Y'),
(54, 'UNITYTYP', '2 BHK', 'Y'),
(55, 'UNITYTYP', '3 BHK', 'Y'),
(56, 'UNITYTYP', '4 BHK', 'Y'),
(57, 'UNITYTYP', '5 BHK', 'Y'),
(58, 'VATCAT', 'Input Tax', 'Y'),
(59, 'VATCAT', 'Output Tax', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `master_data_category`
--

CREATE TABLE `master_data_category` (
  `id_data_category` int(11) NOT NULL,
  `category_code` char(15) DEFAULT NULL,
  `category_name` varchar(150) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_data_category`
--

INSERT INTO `master_data_category` (`id_data_category`, `category_code`, `category_name`, `modified_at`) VALUES
(5, 'LANGUAGE', 'LANGUAGE', '2019-08-27 19:46:42'),
(6, 'CURRENCY', 'CURRENCY', '2019-08-27 19:46:33'),
(7, 'TYPECMPNY', 'Type of company', '2019-08-27 19:46:33'),
(8, 'STATUS', 'Records Status', '2019-08-27 19:46:33'),
(9, 'PRDINDCTR', 'Period Indicator', '2019-03-31 00:00:00'),
(10, 'SUB_PERIOD', 'Sub Period', '2019-08-31 18:26:13'),
(11, 'ACCOUNT_LEVEL', 'Chart Of Account Levels', NULL),
(12, 'ACCOUNT_TYPE', 'Account Type', NULL),
(13, 'PRDSTATUS', 'Period Status', '2019-03-31 00:00:00'),
(14, 'BNKACTTYP', 'Bank Account Type', '2019-10-28 00:00:00'),
(15, 'UNITYTYP', 'Unit Type', '2019-10-28 00:00:00'),
(16, 'VATCAT', 'Vat Category', '2019-11-16 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(10) NOT NULL,
  `name` varchar(40) NOT NULL,
  `help_name` varchar(40) NOT NULL,
  `controller` varchar(50) NOT NULL,
  `method` varchar(50) DEFAULT NULL,
  `id_parent` int(10) NOT NULL,
  `level` smallint(1) NOT NULL,
  `display_orders` int(11) NOT NULL DEFAULT 1,
  `display_status` enum('Y','N') NOT NULL DEFAULT 'Y',
  `menu_icon` varchar(50) DEFAULT NULL,
  `is_active` enum('Y','N') DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `name`, `help_name`, `controller`, `method`, `id_parent`, `level`, `display_orders`, `display_status`, `menu_icon`, `is_active`) VALUES
(1, 'Dashboard', 'Emp', 'dashboard', 'index', 0, 0, 1, 'Y', 'dashboard', 'Y'),
(4, 'Roles', 'Emp', 'roles', 'allRoles', 0, 0, 15, 'Y', 'assignment_ind', 'Y'),
(8, 'Employee', 'Emp', 'employee', 'allEmployee', 0, 0, 12, 'Y', 'supervised_user_circle', 'Y'),
(9, 'Location Management', 'Emp', '#', '#', 0, 0, 13, 'Y', 'explore', 'Y'),
(14, 'All Country', 'Emp', 'csclmng', 'allCountry', 9, 1, 5, 'Y', NULL, 'Y'),
(15, 'All State', 'Emp', 'csclmng', 'allState', 9, 1, 6, 'Y', NULL, 'Y'),
(16, 'All City', 'Emp', 'csclmng', 'allCity', 9, 1, 7, 'Y', NULL, 'Y'),
(17, 'All Location', 'Emp', 'csclmng', 'allLocation', 9, 1, 8, 'Y', NULL, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `menu_permissions`
--

CREATE TABLE `menu_permissions` (
  `id_role` int(11) DEFAULT NULL,
  `id_menu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_permissions`
--

INSERT INTO `menu_permissions` (`id_role`, `id_menu`) VALUES
(1, 1),
(1, 4),
(1, 8),
(1, 9),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(2, 1),
(2, 8),
(2, 9),
(2, 14),
(2, 15),
(2, 16),
(2, 17),
(3, 1),
(3, 9),
(3, 14),
(3, 15),
(3, 16),
(3, 17);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id_role` int(11) NOT NULL,
  `id_department` int(11) NOT NULL DEFAULT 0,
  `role_code` varchar(75) NOT NULL,
  `role_name` varchar(75) NOT NULL,
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id_role`, `id_department`, `role_code`, `role_name`, `is_active`) VALUES
(1, 1, 'SUPADM', 'Super Admin', 'Y'),
(2, 1, 'ADM', 'Admin', 'Y'),
(3, 1, '', 'User', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT 0,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT 0,
  `id_user_type` int(11) DEFAULT 0,
  `id_department` int(11) DEFAULT 0,
  `user_code` char(15) DEFAULT NULL,
  `id_role` int(11) DEFAULT 0,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `user_icon` varchar(100) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `alternate_number` varchar(25) DEFAULT NULL,
  `gender` char(1) DEFAULT 'M',
  `dob` date DEFAULT NULL,
  `id_nationality` int(11) NOT NULL DEFAULT 0,
  `country1` varchar(100) DEFAULT NULL,
  `state1` varchar(100) DEFAULT NULL,
  `city1` varchar(100) DEFAULT NULL,
  `address1` varchar(225) DEFAULT NULL,
  `pin_code1` varchar(45) DEFAULT NULL,
  `address2` varchar(500) DEFAULT NULL,
  `country2` varchar(45) DEFAULT NULL,
  `state2` varchar(45) DEFAULT NULL,
  `city2` varchar(45) DEFAULT NULL,
  `pin_code2` varchar(45) DEFAULT NULL,
  `trn_no` char(25) DEFAULT NULL,
  `fax_no` char(25) DEFAULT NULL,
  `is_active` enum('Y','N') DEFAULT 'Y',
  `is_employee` enum('Y','N') DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `created_at`, `created_by`, `modified_at`, `modified_by`, `id_user_type`, `id_department`, `user_code`, `id_role`, `first_name`, `last_name`, `user_icon`, `email`, `phone`, `alternate_number`, `gender`, `dob`, `id_nationality`, `country1`, `state1`, `city1`, `address1`, `pin_code1`, `address2`, `country2`, `state2`, `city2`, `pin_code2`, `trn_no`, `fax_no`, `is_active`, `is_employee`) VALUES
(1, '2019-09-27 13:39:26', 1, '2019-03-31 00:00:00', 1, 1, 0, '99', 1, 'Deepak', 'Kumar', 'image/Blank-avatar.png', 'deepak@gmail.com', '9739557045', '0123456789', 'M', '2019-08-06', 1, '1', '2', '3', 'Bangalore', '560068', 'Bangalore', '1', '5', '6', '560068', NULL, NULL, 'Y', 'Y'),
(2, '2019-09-27 13:39:15', 1, NULL, 0, 2, 1, '100', 2, 'Deepak', 'K', 'Blank-avatar.png', 'deepak.k@gmail.com', '1234567890', '3216549870', 'M', '1996-03-06', 1, '1', '2', '3', 'Bangalore', '560024', 'Bangalore', '1', '2', '3', '781024', NULL, NULL, 'Y', 'Y'),
(4, '2019-09-27 13:39:52', 1, NULL, 0, 2, 1, '101', 2, 'ahmedi', 'M', 'Blank-avatar.png', 'ahmedi@gmail.com', '9876543278', '0123456775', 'M', '2019-08-08', 1, '1', '2', '3', 'Bangalore', '7810045', 'Bangalore', '1', '2', '3', '0124578', NULL, NULL, 'Y', 'Y'),
(5, '2020-01-02 18:47:22', 1, NULL, 0, 2, 1, 'E20101', 3, 'Deepak', 'Singh', 'Blank-avatar.png', 'deepaksinghdelhi96@gmail.com', '09031567372', '09031567372', 'M', '0000-00-00', 1, '1', '2', '3', 'GD Colony mayur Vihar Phase', '110096', 'JP Nagar 8th phase', '1', '2', '3', '560078', NULL, NULL, 'Y', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `users_type`
--

CREATE TABLE `users_type` (
  `id_user_type` int(11) NOT NULL,
  `name` varchar(85) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_type`
--

INSERT INTO `users_type` (`id_user_type`, `name`) VALUES
(1, 'Super Admin'),
(2, 'Admin'),
(3, 'Customer'),
(4, 'Vendor');

-- --------------------------------------------------------

--
-- Table structure for table `user_login_history`
--

CREATE TABLE `user_login_history` (
  `id` bigint(20) NOT NULL,
  `ip_address` varchar(35) NOT NULL,
  `id_user` int(11) NOT NULL DEFAULT 0,
  `logic_source` varchar(35) NOT NULL,
  `log_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login_history`
--

INSERT INTO `user_login_history` (`id`, `ip_address`, `id_user`, `logic_source`, `log_time`) VALUES
(1, '127.0.0.1', 1, 'Chrome 76.0.3809.132', '2019-10-28 13:23:28'),
(2, '127.0.0.1', 1, 'Chrome 76.0.3809.132', '2019-10-28 13:33:44'),
(3, '127.0.0.1', 1, 'Chrome 76.0.3809.132', '2019-10-28 13:36:42'),
(4, '127.0.0.1', 1, 'Chrome 76.0.3809.132', '2019-10-28 13:38:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id_department`);

--
-- Indexes for table `document_number`
--
ALTER TABLE `document_number`
  ADD PRIMARY KEY (`id_doc_num`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `master_country_state_city`
--
ALTER TABLE `master_country_state_city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_data`
--
ALTER TABLE `master_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_data_category`
--
ALTER TABLE `master_data_category`
  ADD PRIMARY KEY (`id_data_category`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `menu_permissions`
--
ALTER TABLE `menu_permissions`
  ADD KEY `id_role` (`id_role`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `users_type`
--
ALTER TABLE `users_type`
  ADD PRIMARY KEY (`id_user_type`);

--
-- Indexes for table `user_login_history`
--
ALTER TABLE `user_login_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `user_login_history_user_id` (`id_user`),
  ADD KEY `user_login_history_log_time` (`log_time`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id_department` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `document_number`
--
ALTER TABLE `document_number`
  MODIFY `id_doc_num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_login` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `master_country_state_city`
--
ALTER TABLE `master_country_state_city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `master_data`
--
ALTER TABLE `master_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `master_data_category`
--
ALTER TABLE `master_data_category`
  MODIFY `id_data_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users_type`
--
ALTER TABLE `users_type`
  MODIFY `id_user_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_login_history`
--
ALTER TABLE `user_login_history`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
