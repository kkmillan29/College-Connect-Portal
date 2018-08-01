-- phpMyAdmin SQL Dump
-- version 4.4.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 30, 2018 at 01:31 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.10RC1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `svceconnect`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `aid` int(10) NOT NULL,
  `admin` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `admin`, `password`) VALUES
(1, 'cseadmin', 'cseadmin123');

-- --------------------------------------------------------

--
-- Table structure for table `adminmsg`
--

CREATE TABLE IF NOT EXISTS `adminmsg` (
  `from` varchar(20) NOT NULL,
  `title` varchar(30) NOT NULL,
  `message` tinytext NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminmsg`
--

INSERT INTO `adminmsg` (`from`, `title`, `message`, `time`) VALUES
('  Tabrez Ansari', 'fsd', 'ffdfsdfsd', '2016-10-10 05:36:42');

-- --------------------------------------------------------

--
-- Table structure for table `appt`
--

CREATE TABLE IF NOT EXISTS `appt` (
  `aid` varchar(20) NOT NULL,
  `frm` varchar(20) NOT NULL,
  `pupus` varchar(30) NOT NULL,
  `adate` date NOT NULL,
  `usn` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tme` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appt`
--

INSERT INTO `appt` (`aid`, `frm`, `pupus`, `adate`, `usn`, `status`, `time`, `tme`) VALUES
('1ve15cs061/7708', '  Tabrez Ansari', 'Fee Consigmnet', '2016-10-26', '1ve15cs061', 'Pending', '2016-10-10 05:05:46', '');

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE IF NOT EXISTS `assignment` (
  `aid` varchar(20) NOT NULL,
  `title` varchar(20) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `doc` date NOT NULL,
  `subdate` date NOT NULL,
  `sec` varchar(20) NOT NULL,
  `sem` varchar(20) NOT NULL,
  `branch` varchar(10) NOT NULL,
  `sub` varchar(40) NOT NULL,
  `from` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`aid`, `title`, `desc`, `doc`, `subdate`, `sec`, `sem`, `branch`, `sub`, `from`) VALUES
('CO1', 'hindi', 'hello', '2016-10-05', '2016-10-19', 'A', '3', 'CSE', 'CO', 'fdf');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `name` char(20) NOT NULL,
  `message` tinytext NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip` char(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`name`, `message`, `time`, `ip`) VALUES
('   Tabrez Ansari', 'Just joins the chat!', '2016-10-11 09:40:24', '127.0.0.1'),
('   Tabrez Ansari', 'hi bro', '2016-10-11 09:40:28', '127.0.0.1'),
('   Tabrez Ansari', 'hi komal kant', '2016-10-11 09:40:56', '127.0.0.1'),
('   Tabrez Ansari', 'fsfsd', '2016-10-11 09:41:19', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE IF NOT EXISTS `guest` (
  `aid` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `adress` varchar(50) NOT NULL,
  `purpose` varchar(30) NOT NULL,
  `adate` date NOT NULL,
  `time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `otp` varchar(6) NOT NULL,
  `confirm` int(10) NOT NULL,
  `status` varchar(20) NOT NULL,
  `tme` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `nid` int(10) NOT NULL,
  `title` varchar(40) NOT NULL,
  `date` date NOT NULL,
  `desc` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`nid`, `title`, `date`, `desc`) VALUES
(1, 'College Remain Close', '2016-10-07', 'This Navratri College remain close. from 09/10/2016 to 13/10/2016');

-- --------------------------------------------------------

--
-- Table structure for table `notifys`
--

CREATE TABLE IF NOT EXISTS `notifys` (
  `nid` int(10) NOT NULL,
  `title` varchar(40) NOT NULL,
  `date` date NOT NULL,
  `desc` varchar(500) NOT NULL,
  `usn` varchar(10) NOT NULL,
  `from` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pm`
--

CREATE TABLE IF NOT EXISTS `pm` (
  `id` varchar(10) NOT NULL,
  `id2` varchar(10) NOT NULL,
  `title` varchar(256) NOT NULL,
  `user1` varchar(20) NOT NULL,
  `user2` varchar(20) NOT NULL,
  `message` text NOT NULL,
  `timestamp` int(10) NOT NULL,
  `user1read` varchar(3) NOT NULL,
  `user2read` varchar(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ppt`
--

CREATE TABLE IF NOT EXISTS `ppt` (
  `aid` varchar(20) NOT NULL,
  `title` varchar(25) NOT NULL,
  `desc` varchar(200) NOT NULL,
  `sec` varchar(20) NOT NULL,
  `sem` varchar(20) NOT NULL,
  `branch` varchar(10) NOT NULL,
  `sub` varchar(20) NOT NULL,
  `from` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ppt`
--

INSERT INTO `ppt` (`aid`, `title`, `desc`, `sec`, `sem`, `branch`, `sub`, `from`) VALUES
('DSA1', 'DMS Notes ', 'Module 1&2 Notes', 'A', '3', 'CSE', 'DSA', 'Balaji K');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE IF NOT EXISTS `result` (
  `usn` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `branch` varchar(3) NOT NULL,
  `sem` varchar(10) NOT NULL,
  `sec` varchar(5) NOT NULL,
  `sub1` varchar(10) NOT NULL,
  `sub2` varchar(10) NOT NULL,
  `sub3` varchar(10) NOT NULL,
  `sub4` varchar(10) NOT NULL,
  `sub5` varchar(10) NOT NULL,
  `sub6` varchar(10) NOT NULL,
  `lab1` varchar(10) NOT NULL,
  `lab2` varchar(10) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`usn`, `name`, `branch`, `sem`, `sec`, `sub1`, `sub2`, `sub3`, `sub4`, `sub5`, `sub6`, `lab1`, `lab2`, `type`) VALUES
('1ve15cs060', 'Tabrez Ansari', 'CSE', '3', 'A', '545', '5', '5', '5', '55', '5', '5', '5', '1ia');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `Reg_No` varchar(11) NOT NULL,
  `Name` varchar(45) DEFAULT NULL,
  `Batch` varchar(45) DEFAULT NULL,
  `sem` varchar(20) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `Password` varchar(45) DEFAULT NULL,
  `Street` varchar(60) DEFAULT NULL,
  `City` varchar(45) DEFAULT NULL,
  `State` varchar(45) DEFAULT NULL,
  `Contact_No` varchar(15) DEFAULT NULL,
  `Country` varchar(45) DEFAULT NULL,
  `qus` varchar(20) DEFAULT NULL,
  `Dept_Id` int(11) DEFAULT NULL,
  `sec` varchar(10) NOT NULL,
  `branch` varchar(3) NOT NULL,
  `created` int(2) NOT NULL,
  `vercode` varchar(6) NOT NULL,
  `reg` int(2) NOT NULL,
  `blocked` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Reg_No`, `Name`, `Batch`, `sem`, `Email`, `Password`, `Street`, `City`, `State`, `Contact_No`, `Country`, `qus`, `Dept_Id`, `sec`, `branch`, `created`, `vercode`, `reg`, `blocked`) VALUES
('1ve15cs061', 'Tabrez Ansari', '2015', '3', 'tabrezsvce@gmail.com', 'MTIz', 'Vidya Nagar Cross', 'Bangalore', 'Karnataka', '8050793813', 'India', NULL, NULL, 'A', 'CSE', 1, '727991', 1, 0),
('1ve15cs065', NULL, NULL, NULL, 'yawarali144@gmail.com', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', 0, '775074', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `aid` int(10) NOT NULL,
  `user` varchar(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `branch` varchar(10) NOT NULL,
  `password` varchar(40) NOT NULL,
  `otp` varchar(8) NOT NULL,
  `activate` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`aid`, `user`, `name`, `email`, `phone`, `branch`, `password`, `otp`, `activate`) VALUES
(2, '11CS11', 'Murli Mohan', 'madhu.gowda.j@gmail.com', '8866557744', 'CSE', 'MTIzNDU=', '287424', 1),
(3, 'df', 'fdf', 'dfd', 'fd', 'fd', 'MTIz', '440984', 0),
(4, 'sfd', 'fd', 'tabrezsvce@gmail.com', 'tdfdd', 'fd', 'MTIz', '017859', 1),
(7, '11cs12', 'fdf', 'fdf', 'df', 'fdf', 'MTIz', '787948', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usnver`
--

CREATE TABLE IF NOT EXISTS `usnver` (
  `frm` varchar(30) NOT NULL,
  `usn` varchar(10) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usnver`
--

INSERT INTO `usnver` (`frm`, `usn`, `time`) VALUES
('hello', 'hello', '2016-10-11 07:15:04'),
('fdsf', 'fdffsdf', '2016-10-11 07:24:35'),
('fdfsdf', 'fdfsd', '2016-10-11 07:26:21'),
('fsdfsdff', 'fdsdfsd', '2016-10-11 07:26:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`nid`);

--
-- Indexes for table `notifys`
--
ALTER TABLE `notifys`
  ADD PRIMARY KEY (`nid`);

--
-- Indexes for table `ppt`
--
ALTER TABLE `ppt`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Reg_No`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`aid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `nid` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `notifys`
--
ALTER TABLE `notifys`
  MODIFY `nid` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `aid` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
