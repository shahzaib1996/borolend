-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2019 at 08:03 PM
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
-- Database: `db_cent`
--

-- --------------------------------------------------------

--
-- Table structure for table `apply_for_loan`
--

CREATE TABLE `apply_for_loan` (
  `aid` int(11) NOT NULL,
  `borrow_amount` bigint(20) NOT NULL,
  `rate` double NOT NULL,
  `time` varchar(50) NOT NULL,
  `payment` varchar(50) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `uid` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `a_check` varchar(50) NOT NULL DEFAULT '0',
  `paid` bigint(20) DEFAULT '0',
  `pending` bigint(20) NOT NULL DEFAULT '0',
  `sdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `borrower_business`
--

CREATE TABLE `borrower_business` (
  `id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(10) NOT NULL DEFAULT 'bb',
  `up_check` varchar(50) NOT NULL DEFAULT '0',
  `verify_status` varchar(50) NOT NULL DEFAULT '0',
  `city` varchar(100) NOT NULL DEFAULT '',
  `loan_check` varchar(10) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `borrower_individual`
--

CREATE TABLE `borrower_individual` (
  `id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(10) NOT NULL DEFAULT 'bi',
  `up_check` varchar(50) NOT NULL DEFAULT '0',
  `verify_status` varchar(50) NOT NULL DEFAULT '0',
  `city` varchar(100) NOT NULL DEFAULT '',
  `loan_check` varchar(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `borrower_profile`
--

CREATE TABLE `borrower_profile` (
  `uid` varchar(50) NOT NULL,
  `birth_date` date NOT NULL,
  `pcity` varchar(255) DEFAULT NULL,
  `pprovince` varchar(255) DEFAULT NULL,
  `paddress` varchar(255) DEFAULT NULL,
  `cnic` varchar(255) DEFAULT NULL,
  `passport` varchar(255) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `org_name` varchar(255) DEFAULT NULL,
  `org_address` varchar(255) DEFAULT NULL,
  `org_contact` varchar(255) DEFAULT NULL,
  `avg_income` varchar(255) DEFAULT NULL,
  `loan_purpose` varchar(255) DEFAULT NULL,
  `title_account` varchar(255) DEFAULT NULL,
  `account_number` varchar(255) DEFAULT NULL,
  `bank` varchar(255) DEFAULT NULL,
  `branch` varchar(255) DEFAULT NULL,
  `bcity` varchar(255) DEFAULT NULL,
  `bank_statement` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lender_individual`
--

CREATE TABLE `lender_individual` (
  `id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `type` varchar(10) NOT NULL DEFAULT 'li',
  `verify_status` varchar(255) NOT NULL DEFAULT '0',
  `up_check` varchar(255) NOT NULL DEFAULT '0',
  `city` varchar(100) NOT NULL DEFAULT '',
  `lend_check` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lender_org`
--

CREATE TABLE `lender_org` (
  `amount` int(255) NOT NULL,
  `firm_name` varchar(255) NOT NULL,
  `pan_card` varchar(255) NOT NULL,
  `cin` varchar(50) NOT NULL,
  `incorp_date` date NOT NULL,
  `dir_fname` varchar(255) NOT NULL,
  `dir_lname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `reg_add1` varchar(255) NOT NULL,
  `reg_add2` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `pin_code` int(11) NOT NULL,
  `comm_add1` varchar(255) NOT NULL,
  `comm_add2` varchar(255) NOT NULL,
  `comm_city` varchar(255) NOT NULL,
  `comm_state` varchar(255) NOT NULL,
  `comm_pincode` int(11) NOT NULL,
  `id` bigint(20) NOT NULL,
  `type` varchar(10) NOT NULL DEFAULT 'lo',
  `up_check` varchar(255) NOT NULL DEFAULT '0',
  `verify_status` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lender_profile`
--

CREATE TABLE `lender_profile` (
  `uid` varchar(50) NOT NULL,
  `birth_date` date DEFAULT NULL,
  `pcity` varchar(255) DEFAULT NULL,
  `pprovince` varchar(255) DEFAULT NULL,
  `paddress` varchar(255) DEFAULT NULL,
  `cnic` varchar(255) DEFAULT NULL,
  `passport` varchar(255) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `org_name` varchar(255) DEFAULT NULL,
  `org_address` varchar(255) DEFAULT NULL,
  `org_contact` varchar(255) DEFAULT NULL,
  `avg_income` varchar(255) DEFAULT NULL,
  `title_account` varchar(255) DEFAULT NULL,
  `account_number` varchar(255) DEFAULT NULL,
  `bank` varchar(255) DEFAULT NULL,
  `branch` varchar(255) DEFAULT NULL,
  `bcity` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lender_profile`
--

INSERT INTO `lender_profile` (`uid`, `birth_date`, `pcity`, `pprovince`, `paddress`, `cnic`, `passport`, `occupation`, `org_name`, `org_address`, `org_contact`, `avg_income`, `title_account`, `account_number`, `bank`, `branch`, `bcity`) VALUES
('li3', '2019-12-31', 'karachi', 'sindh', 'adad', '4210154879896', 'pic.png', 'asdad', 'adad', 'adasd', 'dad', 'adad', 'adsadsa', 'dsadas', 'adad', 'adad', 'adads');

-- --------------------------------------------------------

--
-- Table structure for table `lend_req`
--

CREATE TABLE `lend_req` (
  `lid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `lend_amount` bigint(20) NOT NULL,
  `rate` double NOT NULL,
  `time` varchar(255) NOT NULL,
  `payment` varchar(255) NOT NULL,
  `purpose` varchar(1000) NOT NULL,
  `l_check` varchar(50) NOT NULL DEFAULT '0',
  `sdate` datetime NOT NULL,
  `x` int(11) DEFAULT NULL,
  `y` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `live_feed`
--

CREATE TABLE `live_feed` (
  `id` int(255) NOT NULL,
  `f11` varchar(255) NOT NULL,
  `f121` varchar(255) NOT NULL,
  `f122` varchar(255) NOT NULL,
  `f21` varchar(255) NOT NULL,
  `f22` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `live_feed`
--

INSERT INTO `live_feed` (`id`, `f11`, `f121`, `f122`, `f21`, `f22`) VALUES
(1, '12.9', '17.2', '19.9', '18.7', '18.6'),
(2, '12.9', '17.2', '19.9', '18.7', '18.6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apply_for_loan`
--
ALTER TABLE `apply_for_loan`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `borrower_business`
--
ALTER TABLE `borrower_business`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `borrower_individual`
--
ALTER TABLE `borrower_individual`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `borrower_profile`
--
ALTER TABLE `borrower_profile`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `lender_individual`
--
ALTER TABLE `lender_individual`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lender_org`
--
ALTER TABLE `lender_org`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lender_profile`
--
ALTER TABLE `lender_profile`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `lend_req`
--
ALTER TABLE `lend_req`
  ADD PRIMARY KEY (`lid`);

--
-- Indexes for table `live_feed`
--
ALTER TABLE `live_feed`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apply_for_loan`
--
ALTER TABLE `apply_for_loan`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `borrower_business`
--
ALTER TABLE `borrower_business`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `borrower_individual`
--
ALTER TABLE `borrower_individual`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lender_individual`
--
ALTER TABLE `lender_individual`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lender_org`
--
ALTER TABLE `lender_org`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lend_req`
--
ALTER TABLE `lend_req`
  MODIFY `lid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `live_feed`
--
ALTER TABLE `live_feed`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
