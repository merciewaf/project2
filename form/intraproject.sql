-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 09, 2018 at 01:19 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `intraproject`
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
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `DEPARMENT_NAME` varchar(255) DEFAULT NULL,
  `NOTES` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='datatable demo table' AUTO_INCREMENT=7 ;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `DEPARMENT_NAME`, `NOTES`) VALUES
(1, 'jk', 'KK1'),
(2, 'hg', 'VV'),
(4, 'vg', 'dfg'),
(5, 'gift', 'mwangome'),
(6, 'jeddy', 'mwangome');

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
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `notes` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `designation`
--


-- --------------------------------------------------------

--
-- Table structure for table `glaction`
--

CREATE TABLE IF NOT EXISTS `glaction` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Names` varchar(10) NOT NULL,
  `Sections` varchar(100) NOT NULL,
  `Notes` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `glaction`
--


-- --------------------------------------------------------

--
-- Table structure for table `glrequest`
--

CREATE TABLE IF NOT EXISTS `glrequest` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Names` varchar(10) NOT NULL,
  `Sections` varchar(100) NOT NULL,
  `Notes` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `glrequest`
--


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
  `user_id` int(11) NOT NULL,
  `user_name` varchar(25) NOT NULL,
  `user_email` varchar(60) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `joining_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users1`
--

INSERT INTO `tbl_users1` (`user_id`, `user_name`, `user_email`, `user_password`, `joining_date`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', '2016-08-13 12:16:54');
