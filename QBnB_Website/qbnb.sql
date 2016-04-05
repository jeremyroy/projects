-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2016 at 05:13 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qbnb`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `property_ID` int(11) NOT NULL,
  `street_addr` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `postalCode` varchar(20) DEFAULT NULL,
  `apt_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`property_ID`, `street_addr`, `city`, `province`, `country`, `postalCode`, `apt_no`) VALUES
(3, '233 William Street', 'Kingston', 'Ontario', 'Canada', 'K7L2E5', NULL),
(4, '259 Orchard Heights Blvd', 'Toronto', 'Ontario', 'Canada', 'L4G4Y6', 0),
(5, '123 blank st.', 'Toronto', 'Ontario', 'Canada', 'L3Y 8W4', 420),
(6, '123 Sunny Dr.', 'Toronto', 'Ontario', 'Canada', 'l9g5u8', 4),
(7, '56 Hops Dr.', 'Toronto', 'Ontario', 'Canada', 'L3Y 8W4', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_ID` int(11) NOT NULL,
  `consumer_ID` int(11) NOT NULL,
  `property_ID` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` enum('Confirmed','Rejected','Requested','Canceled') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_ID`, `consumer_ID`, `property_ID`, `start_date`, `end_date`, `status`) VALUES
(0, 2, 5, '2016-05-20', '2019-05-22', 'Rejected'),
(4, 2, 6, '2016-04-14', '2016-04-15', 'Confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_ID` int(11) NOT NULL,
  `member_ID` int(11) NOT NULL,
  `property_ID` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment_date` date NOT NULL,
  `comment_time` time NOT NULL,
  `member_comment` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_ID`, `member_ID`, `property_ID`, `rating`, `comment_date`, `comment_time`, `member_comment`) VALUES
(3, 3, 3, 3, '2019-07-19', '13:46:00', 'Horrible Accomidations!'),
(4, 2, 3, 3, '2016-03-31', '12:04:01', 'It was ok...'),
(7, 2, 3, 5, '2016-03-31', '12:11:10', 'I loved it!'),
(8, 2, 3, 3, '2016-03-31', '12:13:49', 'Testing Comments!'),
(9, 2, 5, 2, '2016-03-31', '12:14:02', 'first comment'),
(10, 2, 5, 0, '2016-03-31', '02:35:37', 'another comment');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `district_ID` int(11) NOT NULL,
  `district_name` varchar(20) NOT NULL,
  `points_of_interest` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`district_ID`, `district_name`, `points_of_interest`) VALUES
(1, 'The Hollows', 'The Merchant Pub'),
(2, 'Etobicoke', 'Rob Ford'),
(3, 'The Ghetto', 'Th Shaq, Malarcans Trail, New Merry Market, Campus OneStop, Stoolies, Aberdeen Street'),
(4, 'North York', NULL),
(6, 'York-Crosstown', NULL),
(7, 'West End', NULL),
(8, 'Uptown', NULL),
(9, 'Midtown', NULL),
(10, 'Downtown', NULL),
(11, 'East York', NULL),
(12, 'East End', NULL),
(13, 'Scarborough', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_ID` int(11) NOT NULL,
  `fName` varchar(30) NOT NULL,
  `minit` char(1) DEFAULT NULL,
  `lName` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `gradYear` int(11) DEFAULT NULL,
  `faculty` varchar(20) DEFAULT NULL,
  `degType` varchar(10) DEFAULT NULL,
  `password` varchar(30) NOT NULL,
  `admin` tinyint(4) NOT NULL,
  `phonenum` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_ID`, `fName`, `minit`, `lName`, `email`, `gradYear`, `faculty`, `degType`, `password`, `admin`, `phonenum`) VALUES
(2, 'Jeremy', 'F', 'Roy', 'jeremy.roy@live.ca', 2018, 'Engineering', 'BSc. Comp ', 'password1234', 1, '4165702059'),
(3, 'Kelsey', 'P', 'Cook', 'example3@gmail.com', 2017, 'Engineering', 'BSc. Compu', 'password12344', 0, ''),
(6, 'Andrew', 'P', 'Stroz', 'example1@gmail.com', 2017, 'Engineering', 'localhost', 'password123', 0, '9057271226'),
(7, 'Yolo', 'P', 'Jones', 'yolo@jones.com', 2017, 'yeah...', 'nope', '123', 0, '123456789'),
(8, 'Im', 'A', 'Baker', 'ni@nay.com', 3023, '123', 'DJF', '123', 0, '1234567890');

-- --------------------------------------------------------

--
-- Table structure for table `rental_property`
--

CREATE TABLE `rental_property` (
  `property_ID` int(11) NOT NULL,
  `supplier_ID` int(11) NOT NULL,
  `property_name` varchar(50) DEFAULT NULL,
  `district_ID` int(11) NOT NULL,
  `house_type` varchar(20) DEFAULT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `num_bedroom` int(11) NOT NULL,
  `num_bathroom` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `extra_features` varchar(1024) DEFAULT NULL,
  `lat` decimal(10,8) DEFAULT NULL,
  `lng` decimal(11,8) DEFAULT NULL,
  `listed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rental_property`
--

INSERT INTO `rental_property` (`property_ID`, `supplier_ID`, `property_name`, `district_ID`, `house_type`, `description`, `num_bedroom`, `num_bathroom`, `price`, `extra_features`, `lat`, `lng`, `listed`) VALUES
(3, 3, 'Small Shack', 3, 'House', NULL, 4, 7, 100, NULL, '39.00000000', '49.00000000', 1),
(4, 2, 'Home', 2, 'House', '    ', 4, 4, 200, '', NULL, NULL, 0),
(5, 2, 'j-rizzy', 2, 'Appartment', '', 1, 1, 20, '', NULL, NULL, 1),
(6, 6, 'The Parv', 10, 'TownHouse', '                           ', 3, 3, 200, 'Pool', NULL, NULL, 1),
(7, 6, 'Sunnyside Garder', 2, 'Condo', '  ', 4, 3, 180, '', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `parent_ID` int(11) NOT NULL,
  `member_ID` int(11) NOT NULL,
  `reply_date` date NOT NULL,
  `reply_time` time NOT NULL,
  `member_reply` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`parent_ID`, `member_ID`, `reply_date`, `reply_time`, `member_reply`) VALUES
(3, 2, '2019-07-19', '13:55:00', 'Sorry you didn''t like it.  Could you please provide some constructive feedback.'),
(9, 2, '2016-03-31', '03:36:25', 'A reply to a comment!'),
(9, 2, '2016-03-31', '04:07:06', 'A reply to a comment!'),
(10, 2, '2016-03-31', '03:36:11', 'Yup, I see that.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`property_ID`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_ID`),
  ADD KEY `consumer_ID` (`consumer_ID`),
  ADD KEY `property_ID` (`property_ID`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_ID`),
  ADD KEY `property_ID` (`property_ID`),
  ADD KEY `member_ID` (`member_ID`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`district_ID`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_ID`);

--
-- Indexes for table `rental_property`
--
ALTER TABLE `rental_property`
  ADD PRIMARY KEY (`property_ID`),
  ADD KEY `district_ID` (`district_ID`),
  ADD KEY `supplier_ID` (`supplier_ID`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`parent_ID`,`member_ID`,`reply_date`,`reply_time`),
  ADD KEY `member_ID` (`member_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `district_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `rental_property`
--
ALTER TABLE `rental_property`
  MODIFY `property_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`property_ID`) REFERENCES `rental_property` (`property_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`consumer_ID`) REFERENCES `member` (`member_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`property_ID`) REFERENCES `rental_property` (`property_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`property_ID`) REFERENCES `rental_property` (`property_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`member_ID`) REFERENCES `member` (`member_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rental_property`
--
ALTER TABLE `rental_property`
  ADD CONSTRAINT `rental_property_ibfk_1` FOREIGN KEY (`district_ID`) REFERENCES `district` (`district_ID`),
  ADD CONSTRAINT `rental_property_ibfk_2` FOREIGN KEY (`supplier_ID`) REFERENCES `member` (`member_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reply`
--
ALTER TABLE `reply`
  ADD CONSTRAINT `reply_ibfk_1` FOREIGN KEY (`parent_ID`) REFERENCES `comments` (`comment_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reply_ibfk_2` FOREIGN KEY (`member_ID`) REFERENCES `member` (`member_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
