-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2017 at 04:11 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `barcode`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `mail_address` varchar(255) NOT NULL,
  `web_address` varchar(255) NOT NULL,
  `sim_code` varchar(3) NOT NULL,
  `reg_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `address`, `contact_no`, `mail_address`, `web_address`, `sim_code`, `reg_date`) VALUES
(1, 'Grameen Phone', 'Dhaka', '017788888', 'gp@mail.com', 'gp.com', '017', '2017-12-08'),
(2, 'Robi', 'Uttara', '01888888888', 'robi@mail.com', 'robi.com', '018', '2017-11-18'),
(3, 'Banglalink', 'Khilkhet', '01999999999', 'bl@mail.com', 'bl.com', '019', '2017-11-18'),
(4, 'Airtel', 'nai', 'nai', 'nai', 'nai', '016', '2017-11-19');

-- --------------------------------------------------------

--
-- Table structure for table `generated_sim`
--

CREATE TABLE `generated_sim` (
  `sim_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `pincode` int(11) NOT NULL,
  `pukcode` int(11) NOT NULL,
  `date` date NOT NULL,
  `generatedby` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `generated_sim`
--

INSERT INTO `generated_sim` (`sim_id`, `order_id`, `number`, `pincode`, `pukcode`, `date`, `generatedby`) VALUES
(1, 1, 1, 1756, 3030, '2017-12-16', '1'),
(2, 1, 2, 8312, 8633, '2017-12-16', '1'),
(3, 1, 3, 4833, 6561, '2017-12-16', '1'),
(4, 1, 4, 6207, 6547, '2017-12-16', '1'),
(5, 1, 5, 8874, 2990, '2017-12-16', '1'),
(6, 1, 6, 2131, 2177, '2017-12-16', '1'),
(7, 1, 7, 7354, 3778, '2017-12-16', '1'),
(8, 1, 8, 8611, 7583, '2017-12-16', '1'),
(9, 1, 9, 4345, 3186, '2017-12-16', '1');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `company_id` int(255) NOT NULL,
  `invoice_no` varchar(255) NOT NULL,
  `package` int(2) NOT NULL,
  `range_min` int(255) NOT NULL,
  `range_max` int(255) NOT NULL,
  `single_price` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `order_date` varchar(255) NOT NULL,
  `delivery_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `company_id`, `invoice_no`, `package`, `range_min`, `range_max`, `single_price`, `quantity`, `order_date`, `delivery_date`) VALUES
(1, 1, '1', 43, 1, 9, '457', 9, '12/14/2017', '12/16/2017');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentid` int(11) NOT NULL,
  `orderid` int(100) NOT NULL,
  `invoiceno` int(100) NOT NULL,
  `totalamount` varchar(100) NOT NULL,
  `payamount` varchar(100) NOT NULL,
  `paymentdate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL DEFAULT 'admin',
  `password` varchar(255) NOT NULL DEFAULT '123456',
  `role` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `Username`, `password`, `role`) VALUES
(1, 'admin', '123456', 0),
(2, 'admin', '123456', 0),
(3, 'sdfdsf', '123456', 0),
(4, 'test', '123456', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `generated_sim`
--
ALTER TABLE `generated_sim`
  ADD PRIMARY KEY (`sim_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `generated_sim`
--
ALTER TABLE `generated_sim`
  MODIFY `sim_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
