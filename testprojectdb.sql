-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2016 at 07:48 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testprojectdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_ID` int(11) NOT NULL,
  `Name` varchar(30) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_ID`, `Name`, `type`) VALUES
(1, 'electronic_equipment', 'GOODS');

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE IF NOT EXISTS `offer` (
  `Offer_ID` int(11) NOT NULL,
  `User_ID` int(11) DEFAULT NULL,
  `category_ID` int(11) DEFAULT NULL,
  `Type` varchar(20) DEFAULT NULL,
  `offer_Date` date DEFAULT NULL,
  `Number_of_slots` int(11) DEFAULT NULL,
  `avilable_slots` int(11) DEFAULT NULL,
  `price_per_one` decimal(18,2) DEFAULT NULL,
  `discount` decimal(18,2) DEFAULT NULL,
  `Last_amount` decimal(18,2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offer`
--

INSERT INTO `offer` (`Offer_ID`, `User_ID`, `category_ID`, `Type`, `offer_Date`, `Number_of_slots`, `avilable_slots`, `price_per_one`, `discount`, `Last_amount`) VALUES
(1, 2, 1, 'CONFIRMED', '2016-02-22', 10, 10, '28500.00', '2000.00', '26500.00');

-- --------------------------------------------------------

--
-- Table structure for table `offer_image`
--

CREATE TABLE IF NOT EXISTS `offer_image` (
  `image_ID` int(11) NOT NULL,
  `Offer_ID` int(11) DEFAULT NULL,
  `Type` varchar(20) DEFAULT NULL,
  `position` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `offer_spec`
--

CREATE TABLE IF NOT EXISTS `offer_spec` (
  `spec_ID` int(11) NOT NULL,
  `Offer_ID` int(11) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE IF NOT EXISTS `user_detail` (
  `User_ID` int(11) NOT NULL,
  `Type` varchar(20) DEFAULT NULL,
  `First_name` varchar(14) DEFAULT NULL,
  `Last_name` varchar(20) DEFAULT NULL,
  `Address_no` varchar(10) DEFAULT NULL,
  `Address_street` varchar(20) DEFAULT NULL,
  `Address_city` varchar(20) DEFAULT NULL,
  `Credit_card_number` int(16) DEFAULT NULL,
  `Contact` int(10) DEFAULT NULL,
  `Email_address` varchar(30) NOT NULL,
  `Password` varchar(64) DEFAULT NULL,
  `Acount_status` varchar(20) NOT NULL DEFAULT 'PENDING'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`User_ID`, `Type`, `First_name`, `Last_name`, `Address_no`, `Address_street`, `Address_city`, `Credit_card_number`, `Contact`, `Email_address`, `Password`, `Acount_status`) VALUES
(1, 'CUSTOMER', 'Lahiru', 'Rangitha', '123/4,', 'Wataddara', 'Veyangoda', 12312312, 332243532, 'lahirupathiranalr@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'ACTIVE'),
(2, 'SELLER', 'Kamal', 'Perera', 'Abans', 'Kadawatha road', 'Kelaniya', 31323122, 31324234, 'abanskelaniya@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'PENDING'),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pipi@gmail.com', 'bcb15f821479b4d5772bd0ca866c00ad5f926e3580720659cc80d39c9d09802a', 'ACTIVE'),
(4, '', '', '', '', '', '', 0, 0, 'danush@gmail.com', 'bcb15f821479b4d5772bd0ca866c00ad5f926e3580720659cc80d39c9d09802a', 'PENDING');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_ID`);

--
-- Indexes for table `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`Offer_ID`),
  ADD KEY `User_ID` (`User_ID`),
  ADD KEY `category_ID` (`category_ID`);

--
-- Indexes for table `offer_image`
--
ALTER TABLE `offer_image`
  ADD PRIMARY KEY (`image_ID`),
  ADD KEY `Offer_ID` (`Offer_ID`);

--
-- Indexes for table `offer_spec`
--
ALTER TABLE `offer_spec`
  ADD PRIMARY KEY (`spec_ID`),
  ADD KEY `Offer_ID` (`Offer_ID`);

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`User_ID`),
  ADD UNIQUE KEY `Email_address` (`Email_address`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `offer`
--
ALTER TABLE `offer`
  MODIFY `Offer_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `offer_image`
--
ALTER TABLE `offer_image`
  MODIFY `image_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `offer_spec`
--
ALTER TABLE `offer_spec`
  MODIFY `spec_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_detail`
--
ALTER TABLE `user_detail`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `offer`
--
ALTER TABLE `offer`
  ADD CONSTRAINT `offer_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user_detail` (`User_ID`),
  ADD CONSTRAINT `offer_ibfk_2` FOREIGN KEY (`category_ID`) REFERENCES `category` (`category_ID`);

--
-- Constraints for table `offer_image`
--
ALTER TABLE `offer_image`
  ADD CONSTRAINT `offer_image_ibfk_1` FOREIGN KEY (`Offer_ID`) REFERENCES `offer` (`Offer_ID`);

--
-- Constraints for table `offer_spec`
--
ALTER TABLE `offer_spec`
  ADD CONSTRAINT `offer_spec_ibfk_1` FOREIGN KEY (`Offer_ID`) REFERENCES `offer` (`Offer_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
