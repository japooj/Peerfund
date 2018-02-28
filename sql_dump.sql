-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2018 at 05:30 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pfg`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci NOT NULL,
  `level` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `email`, `username`, `password`, `level`) VALUES
(1, 'admin', '', 'admin', '123456', '');

-- --------------------------------------------------------

--
-- Table structure for table `gh_entry`
--

CREATE TABLE `gh_entry` (
  `user_id` int(11) NOT NULL,
  `amount` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `id` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gh_entry`
--

INSERT INTO `gh_entry` (`user_id`, `amount`, `status`, `id`, `updated_at`) VALUES
(3, '1000', '0', 2, '2018-02-27 13:12:39'),
(3, '200', '0', 3, '2018-02-27 13:22:22'),
(3, '200', '1', 4, '2018-02-27 13:22:26'),
(3, '500', '1', 5, '2018-02-27 13:22:31');

-- --------------------------------------------------------

--
-- Table structure for table `payment_proofs`
--

CREATE TABLE `payment_proofs` (
  `id` int(50) NOT NULL,
  `user_id` int(150) NOT NULL,
  `payment_type` varchar(150) NOT NULL,
  `payment_name` varchar(150) NOT NULL,
  `transactionid` int(150) NOT NULL,
  `amount` varchar(150) NOT NULL,
  `comments` text NOT NULL,
  `status` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accounts`
--

CREATE TABLE `tbl_accounts` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `serial_no` varchar(150) NOT NULL,
  `balance` varchar(150) NOT NULL,
  `status` varchar(10) NOT NULL,
  `payment_type` varchar(150) NOT NULL,
  `bank_type` varchar(150) NOT NULL,
  `acct_type` varchar(150) NOT NULL,
  `acct_number` varchar(150) NOT NULL,
  `acct_name` varchar(150) NOT NULL,
  `branch_code` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_accounts`
--

INSERT INTO `tbl_accounts` (`id`, `user_id`, `serial_no`, `balance`, `status`, `payment_type`, `bank_type`, `acct_type`, `acct_number`, `acct_name`, `branch_code`) VALUES
(1, 1, '', '', '', '', '', 'MobileMoney', 'boy', 'jdfjd', ''),
(2, 2, '', '', '', '', '', 'MobileMoney', 'jsjds', 'kofi', ''),
(3, 3, '', '', '', '', '', 'MobileMoney', 'kkksd', 'disdfifu', ''),
(4, 4, '', '', '', '', '', 'MobileMoney', '999090909', 'hjfhf', ''),
(5, 5, '', '', '', '', '', 'MobileMoney', '0200902221', 'osei', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_address`
--

CREATE TABLE `tbl_address` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(40) NOT NULL,
  `state` varchar(40) NOT NULL,
  `zipcode` varchar(150) NOT NULL,
  `country` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_address`
--

INSERT INTO `tbl_address` (`id`, `user_id`, `address`, `city`, `state`, `zipcode`, `country`) VALUES
(1, 1, '', '', '', '', 'GH'),
(2, 2, '', '', '', '', 'GH'),
(3, 3, '', '', '', '', 'GH'),
(4, 4, '', '', '', '', 'GH'),
(5, 5, '', '', '', '', 'GH');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_messages`
--

CREATE TABLE `tbl_messages` (
  `id` int(11) NOT NULL,
  `user_id` int(50) NOT NULL,
  `title` text NOT NULL,
  `body` text NOT NULL,
  `mdate` datetime DEFAULT CURRENT_TIMESTAMP,
  `level` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE `tbl_news` (
  `id` int(50) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_referrals`
--

CREATE TABLE `tbl_referrals` (
  `id` int(50) NOT NULL,
  `userid` int(50) NOT NULL,
  `parent_id` int(50) NOT NULL,
  `username` varchar(150) NOT NULL,
  `phone` varchar(150) NOT NULL,
  `amount` varchar(150) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_referrals`
--

INSERT INTO `tbl_referrals` (`id`, `userid`, `parent_id`, `username`, `phone`, `amount`, `date`, `status`) VALUES
(1, 1, 2, 'tsatsaboli', '0244915213', '10', '2018-02-19 02:29:29', 'approved'),
(2, 1, 2, 'tsatsaboli', '0244915213', '10', '2018-02-19 02:29:29', 'approved'),
(3, 1, 2, 'tsatsaboli', '0244915213', '10', '2018-02-19 02:29:29', 'approved'),
(4, 1, 2, 'tsatsaboli', '0244915213', '20', '2018-02-19 02:29:29', 'approved'),
(5, 1, 2, 'tsatsaboli', '0244915213', '10', '2018-02-19 02:29:29', 'approved'),
(6, 0, 5, 'me', '02009022221', '20', '0000-00-00 00:00:00', 'approved'),
(7, 1, 2, 'tsatsaboli', '0244915213', '10', '2018-02-20 02:08:35', 'Pending'),
(8, 1, 2, 'tsatsaboli', '0244915213', '20', '2018-02-20 02:25:24', 'Pending'),
(9, 0, 5, 'me', '02009022221', '10', '0000-00-00 00:00:00', 'approved'),
(10, 0, 5, 'me', '02009022221', '20', '0000-00-00 00:00:00', 'approved'),
(11, 0, 5, 'me', '02009022221', '10', '0000-00-00 00:00:00', 'approved'),
(12, 0, 5, 'me', '02009022221', '20', '0000-00-00 00:00:00', 'approved'),
(13, 0, 5, 'me', '02009022221', '10', '0000-00-00 00:00:00', 'approved'),
(14, 1, 2, 'tsatsaboli', '0244915213', '10', '2018-02-26 02:48:06', 'Pending'),
(15, 0, 5, 'me', '02009022221', '20', '2018-02-26 08:52:50', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_support`
--

CREATE TABLE `tbl_support` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `reason` text NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaction`
--

CREATE TABLE `tbl_transaction` (
  `id` int(10) NOT NULL,
  `user_id` varchar(150) NOT NULL,
  `tx_no` varchar(20) NOT NULL,
  `tx_type` varchar(10) NOT NULL,
  `donation_amount` double NOT NULL,
  `dream_amount` double NOT NULL,
  `mature_on` varchar(150) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `period` varchar(150) NOT NULL,
  `status` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transaction`
--

INSERT INTO `tbl_transaction` (`id`, `user_id`, `tx_no`, `tx_type`, `donation_amount`, `dream_amount`, `mature_on`, `date`, `period`, `status`) VALUES
(34, '5', 'PH151967477014', 'PH', 800, 400, 'Feb 26, 2018', '2018-02-26 08:52:50', '5', 'processing'),
(35, '4', 'PH15196785734', 'RC', 1800, 1000, 'Mar 05, 2018', '2018-02-26 09:56:13', '0', 'pending'),
(36, '5', 'PH15196785734', 'PH', 300, 500, 'Mar 07, 2018', '2018-02-26 23:24:25', '2', 'confirmed'),
(37, '1', 'PH15197214408', 'RC', 1000, 200, 'Mar 07, 2018', '2018-02-27 09:50:40', '2', 'confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(10) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `username` varchar(150) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `is_active` varchar(10) NOT NULL,
  `utype` varchar(10) NOT NULL,
  `pics` varchar(200) NOT NULL,
  `bdate` varchar(100) NOT NULL,
  `referral_by` varchar(150) NOT NULL,
  `referral_code` varchar(150) NOT NULL,
  `original_referral_by` varchar(150) NOT NULL,
  `ip` varchar(150) NOT NULL,
  `comments` text NOT NULL,
  `activation` varchar(150) NOT NULL,
  `code` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `fname`, `lname`, `username`, `pwd`, `email`, `phone`, `gender`, `is_active`, `utype`, `pics`, `bdate`, `referral_by`, `referral_code`, `original_referral_by`, `ip`, `comments`, `activation`, `code`) VALUES
(1, 'tsatsaboli dd', 'tsatsaboli dd', 'tsatsaboli dd', '*6BB4837EB74329105EE4568DDA7DC67ED2CA2AD9', '0244915213dddd', '0244915213 ddd', '', 'True', '', '', '2018-02-16 19:58:44', '', 'mahony', '', '::1', '', '', ''),
(2, 'tsatsaboli ddd', 'tsatsaboli', 'tsatsaboli', '*6BB4837EB74329105EE4568DDA7DC67ED2CA2AD9', '0244915213', '0244915213', '', 'True', '', '', '2018-02-16 20:00:07', '', 'tsatsaboli', 'mahony', '::1', '', '', ''),
(3, 'bollege aaa', 'bollege', 'bollege', '*6BB4837EB74329105EE4568DDA7DC67ED2CA2AD9', '0240488850', '0244915213', '', 'True', '', '', '2018-02-16 20:01:10', '', 'bollege', 'tsatsaboli', '::1', '', '', ''),
(4, 'yysh', 'hsdsdh', 'uuhs', '*6BB4837EB74329105EE4568DDA7DC67ED2CA2AD9', 'ghh@gmail.com', '0200902221', '', 'True', '', '', '2018-02-18 08:13:19', '', 'uuhs', '', '::1', '', '', ''),
(5, 'mmme', 'mme', 'me', '*6BB4837EB74329105EE4568DDA7DC67ED2CA2AD9', 'me@gmail.com', '02009022221', '', 'True', '', '', '2018-02-19 02:22:02', '', 'me@gmail.com', '', '::1', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `message` text NOT NULL,
  `approval` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `token` varchar(500) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `upgrade_requests`
--

CREATE TABLE `upgrade_requests` (
  `user_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `approval` text NOT NULL,
  `id` int(11) NOT NULL,
  `updated_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upgrade_requests`
--

INSERT INTO `upgrade_requests` (`user_id`, `parent_id`, `approval`, `id`, `updated_at`) VALUES
(5, 1, 'pending', 12, '2018-02-28 01:46:14'),
(3, 5, 'pending', 13, '2018-03-01 12:22:54'),
(3, 1, 'pending', 14, '2018-03-01 12:31:28');

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_requests`
--

CREATE TABLE `withdraw_requests` (
  `user_id` int(11) NOT NULL,
  `approval` text NOT NULL,
  `id` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `withdraw_requests`
--

INSERT INTO `withdraw_requests` (`user_id`, `approval`, `id`, `updated_at`) VALUES
(5, '0', 5, '2018-02-26 09:58:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `gh_entry`
--
ALTER TABLE `gh_entry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_proofs`
--
ALTER TABLE `payment_proofs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_address`
--
ALTER TABLE `tbl_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_messages`
--
ALTER TABLE `tbl_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_referrals`
--
ALTER TABLE `tbl_referrals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_support`
--
ALTER TABLE `tbl_support`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upgrade_requests`
--
ALTER TABLE `upgrade_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraw_requests`
--
ALTER TABLE `withdraw_requests`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `gh_entry`
--
ALTER TABLE `gh_entry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `payment_proofs`
--
ALTER TABLE `payment_proofs`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_address`
--
ALTER TABLE `tbl_address`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_messages`
--
ALTER TABLE `tbl_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_referrals`
--
ALTER TABLE `tbl_referrals`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tbl_support`
--
ALTER TABLE `tbl_support`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `upgrade_requests`
--
ALTER TABLE `upgrade_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `withdraw_requests`
--
ALTER TABLE `withdraw_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
