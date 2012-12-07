-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 02, 2012 at 10:13 AM
-- Server version: 5.1.53
-- PHP Version: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `id_no` varchar(30) NOT NULL,
  `balance` int(30) NOT NULL,
  `location` text NOT NULL,
  `phone` varchar(30) NOT NULL,
  `message` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id_no`, `balance`, `location`, `phone`, `message`) VALUES
('22098675', 109000, 'machakos', '+254724456748', 'tender'),
('29758373', 505000, 'kariokor', '+254734524557', 'council');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE IF NOT EXISTS `exams` (
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `admno` varchar(20) NOT NULL,
  `course` text NOT NULL,
  PRIMARY KEY (`admno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`firstname`, `lastname`, `admno`, `course`) VALUES
('moses', 'kioko', 'iu/10/1234', 'bict'),
('wilson', 'kamande', 'iu/10/6754', 'dict'),
('minnie', 'cutie', 'iu/10/4657', 'cict'),
('fiona', 'fin', 'iu/10/3456', 'dict');

-- --------------------------------------------------------

--
-- Table structure for table `messagein`
--

CREATE TABLE IF NOT EXISTS `messagein` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `SendTime` datetime DEFAULT NULL,
  `ReceiveTime` datetime DEFAULT NULL,
  `MessageFrom` varchar(80) DEFAULT NULL,
  `MessageTo` varchar(80) DEFAULT NULL,
  `SMSC` varchar(80) DEFAULT NULL,
  `MessageText` text,
  `MessageType` varchar(20) DEFAULT NULL,
  `MessagePDU` text,
  `Gateway` varchar(80) DEFAULT NULL,
  `UserId` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `messagein`
--


-- --------------------------------------------------------

--
-- Table structure for table `messagelog`
--

CREATE TABLE IF NOT EXISTS `messagelog` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `SendTime` datetime DEFAULT NULL,
  `ReceiveTime` datetime DEFAULT NULL,
  `StatusCode` int(11) DEFAULT NULL,
  `StatusText` varchar(80) DEFAULT NULL,
  `MessageTo` varchar(80) DEFAULT NULL,
  `MessageFrom` varchar(80) DEFAULT NULL,
  `MessageText` text,
  `MessageType` varchar(20) DEFAULT NULL,
  `MessageId` varchar(80) DEFAULT NULL,
  `ErrorCode` varchar(20) DEFAULT NULL,
  `ErrorText` varchar(80) DEFAULT NULL,
  `Gateway` varchar(80) DEFAULT NULL,
  `MessagePDU` text,
  `UserId` varchar(80) DEFAULT NULL,
  `UserInfo` text,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `messagelog`
--

INSERT INTO `messagelog` (`Id`, `SendTime`, `ReceiveTime`, `StatusCode`, `StatusText`, `MessageTo`, `MessageFrom`, `MessageText`, `MessageType`, `MessageId`, `ErrorCode`, `ErrorText`, `Gateway`, `MessagePDU`, `UserId`, `UserInfo`) VALUES
(1, '2012-12-02 11:10:03', NULL, 200, NULL, '+254727038986', NULL, 'test its from the server', NULL, '+254727038986:23', NULL, NULL, NULL, NULL, NULL, NULL),
(2, '2012-12-02 12:59:46', NULL, 200, NULL, '+254710700952', NULL, 'this is goes straight to your phone', NULL, '+254710700952:25', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messageout`
--

CREATE TABLE IF NOT EXISTS `messageout` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `MessageTo` varchar(80) DEFAULT NULL,
  `MessageFrom` varchar(80) DEFAULT NULL,
  `MessageText` text,
  `MessageType` varchar(20) DEFAULT NULL,
  `Gateway` varchar(80) DEFAULT NULL,
  `UserId` varchar(80) DEFAULT NULL,
  `UserInfo` text,
  `Priority` int(11) DEFAULT NULL,
  `Scheduled` datetime DEFAULT NULL,
  `IsSent` tinyint(1) NOT NULL DEFAULT '0',
  `IsRead` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `messageout`
--

INSERT INTO `messageout` (`Id`, `MessageTo`, `MessageFrom`, `MessageText`, `MessageType`, `Gateway`, `UserId`, `UserInfo`, `Priority`, `Scheduled`, `IsSent`, `IsRead`) VALUES
(1, '0720264382', '+254727038986', 'Hac\r\n \r\n', NULL, NULL, NULL, NULL, NULL, '2012-12-02 10:58:59', 0, 0),
(2, '0720264382', '+254727038986', 'Please call me thank you.', NULL, NULL, NULL, NULL, NULL, '2012-12-02 11:00:17', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `msg`
--

CREATE TABLE IF NOT EXISTS `msg` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `message` varchar(500) NOT NULL,
  `sender` int(22) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `msg`
--

INSERT INTO `msg` (`id`, `message`, `sender`) VALUES
(1, 'tender', 2147483647),
(2, '22098675 -- +254724456748 of machakos<br>', 2147483647),
(3, 'tender', 0),
(4, 'Have a bussy blessd nite!', 2147483647),
(5, '', 0),
(6, 'Tender', 2147483647),
(7, 'tender', 0),
(8, '22098675 -- +254724456748 of m', 0),
(9, 'tender', 2147483647),
(10, '22098675 -- +254724456748 of m', 2147483647),
(11, 'council', 2147483647),
(12, '29758373 -- +254734524557 of k', 2147483647),
(13, 'tender', 2147483647),
(14, '22098675 -- +254724456748 of machakos<br>', 2147483647),
(15, 'tender', 2147483647),
(16, '22098675 -- +254724456748 of machakos<br>', 2147483647),
(17, 'tender', 2147483647),
(18, '22098675 -- +254724456748 of machakos<br>', 2147483647),
(19, 'tender', 0),
(20, '22098675 -- +254724456748 of machakos<br>', 0),
(21, 'delivered', 723890975),
(22, 'No One Found', 2147483647),
(23, 'tender', 2147483647),
(24, '22098675 -- +254724456748 of machakos<br>', 2147483647),
(25, 'No One Found', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `admno` varchar(20) NOT NULL,
  `course` text NOT NULL,
  `gender` text NOT NULL,
  `age` int(4) NOT NULL,
  `town` varchar(15) NOT NULL,
  PRIMARY KEY (`admno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`firstname`, `lastname`, `admno`, `course`, `gender`, `age`, `town`) VALUES
('moses', 'kioko', 'iu/11/1234', 'bict', 'male', 36, 'nairobi'),
('gret', 'wef', 'iu/11/3456', 'cict', 'male', 10, 'nakuru');

-- --------------------------------------------------------

--
-- Table structure for table `ushahidi`
--

CREATE TABLE IF NOT EXISTS `ushahidi` (
  `from` int(18) NOT NULL,
  `message` varchar(40) NOT NULL,
  `timestamp` int(20) NOT NULL,
  `messageid` varchar(20) NOT NULL,
  `to` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ushahidi`
--

