-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 23, 2018 at 02:01 PM
-- Server version: 5.5.10
-- PHP Version: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bizoft`
--

-- --------------------------------------------------------

--
-- Table structure for table `cdesk`
--

CREATE TABLE IF NOT EXISTS `cdesk` (
  `ReportTO` varchar(255) NOT NULL,
  `Section` varchar(255) NOT NULL,
  `ReporTime` date NOT NULL,
  `Action` varchar(255) NOT NULL,
  `ActionBY` varchar(255) NOT NULL,
  `ActionTime` datetime NOT NULL,
  `Feedback` varchar(255) NOT NULL,
  `FeedbackTime` datetime NOT NULL,
  `Rdate` date NOT NULL,
  `Rtime` datetime NOT NULL,
  `personnel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cdesk`
--


-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `ID` int(11) NOT NULL,
  `Dept` varchar(255) NOT NULL,
  `Desc` varchar(255) NOT NULL,
  `UserCode` varchar(255) NOT NULL,
  `Rdate` datetime NOT NULL,
  `Rtime` datetime NOT NULL,
  `Reaction` varchar(11) NOT NULL,
  `ReactBy` varchar(11) NOT NULL,
  `ReactDate` datetime NOT NULL,
  `ReactTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--


-- --------------------------------------------------------

--
-- Table structure for table `crudtable`
--

CREATE TABLE IF NOT EXISTS `crudtable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `favjob` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `crudtable`
--

INSERT INTO `crudtable` (`id`, `firstname`, `lastname`, `email`, `favjob`) VALUES
(6, 'mercy', 'wafula', 'mrc@gmail.com', 'web developer'),
(23, 'Mahesh', 'lahash', 'MaheshParashar@tutorialspoint.', 'developer'),
(28, 'mercy', 'Wafula', 'mrcwafula@gmail.com', 'dev'),
(29, 'my name', 'is', 'MaheshParashar@tutorialspoint.', 'dev');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `dep_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `department_name` varchar(255) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`dep_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='datatable demo table' AUTO_INCREMENT=18 ;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`dep_id`, `department_name`, `notes`) VALUES
(13, 'Beverage', 'deals with all the soft drinks'),
(14, 'Beverage', 'deals with all the soft drinks'),
(15, 'catering', 'all about cooking'),
(17, 'restaurant', 'new one');

-- --------------------------------------------------------

--
-- Table structure for table `deptanalysis`
--

CREATE TABLE IF NOT EXISTS `deptanalysis` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Department` varchar(10) NOT NULL,
  `SetARTime` varchar(100) NOT NULL,
  `TotalIssues` varchar(100) NOT NULL,
  `ActualARTime` varchar(10) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `deptanalysis`
--


-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE IF NOT EXISTS `designation` (
  `desig_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `desig_name` varchar(250) NOT NULL,
  `notes` varchar(100) NOT NULL,
  PRIMARY KEY (`desig_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`desig_id`, `desig_name`, `notes`) VALUES
(3, 'news', 'news'),
(4, 'new', 'news'),
(5, 'accountant', ''),
(6, 'Receptionist', '');

-- --------------------------------------------------------

--
-- Table structure for table `glrequest`
--

CREATE TABLE IF NOT EXISTS `glrequest` (
  `glr_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `request` varchar(10) NOT NULL,
  `department` varchar(100) NOT NULL,
  `section` varchar(100) NOT NULL,
  `notes` varchar(100) NOT NULL,
  PRIMARY KEY (`glr_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `glrequest`
--

INSERT INTO `glrequest` (`glr_id`, `request`, `department`, `section`, `notes`) VALUES
(3, 'cold food', 'beverage', 'banquet', 'new');

-- --------------------------------------------------------

--
-- Table structure for table `gl_actions`
--

CREATE TABLE IF NOT EXISTS `gl_actions` (
  `act_id` int(100) NOT NULL AUTO_INCREMENT,
  `action_name` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `section` varchar(100) NOT NULL,
  `notes` text NOT NULL,
  PRIMARY KEY (`action_name`),
  KEY `act_id` (`act_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `gl_actions`
--

INSERT INTO `gl_actions` (`act_id`, `action_name`, `department`, `section`, `notes`) VALUES
(2, 'cold food', 'food ', 'kitchen', 'kindly improve your services');

-- --------------------------------------------------------

--
-- Table structure for table `gl_feedback`
--

CREATE TABLE IF NOT EXISTS `gl_feedback` (
  `glf_id` int(100) NOT NULL AUTO_INCREMENT,
  `feedback` varchar(100) NOT NULL,
  `notes` varchar(100) NOT NULL,
  PRIMARY KEY (`feedback`),
  KEY `glf_id` (`glf_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `gl_feedback`
--

INSERT INTO `gl_feedback` (`glf_id`, `feedback`, `notes`) VALUES
(2, 'Best', 'Above expectation'),
(3, 'Good', 'average');

-- --------------------------------------------------------

--
-- Table structure for table `guestlink`
--

CREATE TABLE IF NOT EXISTS `guestlink` (
  `gl_id` int(100) NOT NULL AUTO_INCREMENT,
  `source_name` varchar(100) NOT NULL,
  `request` varchar(100) NOT NULL,
  `section_name` varchar(100) NOT NULL DEFAULT '0',
  `department_name` varchar(100) NOT NULL,
  `receive_time` datetime NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `reported_time` datetime NOT NULL,
  `action_taken` varchar(250) NOT NULL,
  `staff_id` varchar(250) NOT NULL,
  `action_time` datetime NOT NULL,
  `feedback` varchar(200) NOT NULL,
  `feedback_time` datetime NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `actual_date` date NOT NULL,
  `notes` varchar(200) NOT NULL,
  PRIMARY KEY (`gl_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `guestlink`
--

INSERT INTO `guestlink` (`gl_id`, `source_name`, `request`, `section_name`, `department_name`, `receive_time`, `fullname`, `reported_time`, `action_taken`, `staff_id`, `action_time`, `feedback`, `feedback_time`, `user_name`, `actual_date`, `notes`) VALUES
(2, 'new source', 'cold food', 'new source', 'Beverage', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00', ''),
(3, 'new', 'cold food', 'new', 'Beverage', '2018-01-19 12:36:39', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00', ''),
(4, 'new', 'cold food', 'new', 'Beverage', '2018-01-19 12:38:30', 'Mercy Nasambu', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00', ''),
(5, 'new', 'cold food', 'new', 'Beverage', '2018-01-19 12:40:47', 'Mercy Nasambu', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00', ''),
(6, 'new source', 'cold food', 'new source', 'Beverage', '2018-01-19 12:45:59', 'Mercy Nasambu', '0000-00-00 00:00:00', 'cleared ', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00', ''),
(7, 'new', 'cold food', 'new', 'Beverage', '2018-01-19 12:53:32', 'Mercy Nasambu', '0000-00-00 00:00:00', 'done', '3', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00', ''),
(8, '569', 'cold food', '569', 'Beverage', '2018-01-19 14:51:56', 'Mercy Nasambu', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00', ''),
(9, 'new', 'cold food', 'new', 'catering', '2018-01-19 15:00:35', 'pick', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00', ''),
(10, 'new', 'cold food', 'new', 'restaurant', '2018-01-19 15:01:31', 'Mercy Nasambu', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00', ''),
(11, '569', 'cold food', '569', 'restaurant', '2018-01-20 13:24:50', 'Mercy Nasambu', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE IF NOT EXISTS `organization` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `address` varchar(11) NOT NULL,
  `phone` int(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`id`, `name`, `address`, `phone`) VALUES
(1, 'Testing', 'P.O Box 844', 711365789);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE IF NOT EXISTS `sections` (
  `sec_id` int(11) NOT NULL AUTO_INCREMENT,
  `section_name` varchar(100) NOT NULL,
  `dep_id` varchar(100) NOT NULL,
  `reaction_time` int(100) NOT NULL,
  `notes` varchar(100) NOT NULL,
  PRIMARY KEY (`section_name`),
  KEY `sec_id` (`sec_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`sec_id`, `section_name`, `dep_id`, `reaction_time`, `notes`) VALUES
(2, 'front desk', '13Beverage', 10, 'new'),
(10, 'nedsdd', '15', 4, 'nnnn'),
(3, 'section', '14Beverage', 23, '');

-- --------------------------------------------------------

--
-- Table structure for table `sources`
--

CREATE TABLE IF NOT EXISTS `sources` (
  `src_id` int(100) NOT NULL AUTO_INCREMENT,
  `source_name` varchar(200) NOT NULL,
  `notes` varchar(200) NOT NULL,
  PRIMARY KEY (`src_id`),
  UNIQUE KEY `source_name` (`source_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `sources`
--

INSERT INTO `sources` (`src_id`, `source_name`, `notes`) VALUES
(4, 'new', 'new'),
(5, 'new source', 'new'),
(6, '569', 'west wing');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `staff_id` int(250) NOT NULL AUTO_INCREMENT,
  `surname` varchar(250) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `dep_id` varchar(250) NOT NULL,
  `desig_id` varchar(250) NOT NULL,
  `extension` int(250) NOT NULL,
  `notes` varchar(259) NOT NULL,
  PRIMARY KEY (`staff_id`),
  KEY `staff_id` (`staff_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `surname`, `fullname`, `dep_id`, `desig_id`, `extension`, `notes`) VALUES
(3, 'Wafula', 'Mercy Nasambu', '13', '5', 456, 'notes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_email`, `user_password`) VALUES
(20, 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users1`
--

CREATE TABLE IF NOT EXISTS `tbl_users1` (
  `user_id` int(100) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(25) NOT NULL,
  `user_email` varchar(60) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `joining_date` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_users1`
--

INSERT INTO `tbl_users1` (`user_id`, `user_name`, `user_email`, `user_password`, `joining_date`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', '2018-01-17 11:13:14'),
(2, 'mercy', 'mrcwafula@gmail.com', 'mercy', '2018-01-17 11:19:38'),
(3, 'mercy', 'mrcwafula@gmail.com', 'mercy', '2018-01-17 11:31:02'),
(4, 'mercy', 'mrcwafula@gmail.com', 'mercy', '2018-01-17 11:45:17'),
(7, 'mass', 'mrcwafula@gmail.com', 'pass', '2018-01-17 12:30:57'),
(8, 'mercy', 'mrcwafula@gmail.com', 'mercy', '2018-01-17 12:41:03'),
(11, 'name', 'mrcwafula@gmail.com', 'pass', '2018-01-17 12:47:19'),
(12, 'mercie', 'mrcwafula@gmail.com', 'mercy', '2018-01-19 09:01:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userId` int(8) NOT NULL AUTO_INCREMENT,
  `userName` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `password`, `firstName`, `lastName`) VALUES
(4, 'mary', 'mary', 'mary', 'mary'),
(5, 'Jayson', 'jay', 'Jayson', 'Mukamani'),
(6, 'new', 'here', 'mnew', 'wen');
